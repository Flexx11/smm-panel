<?php
if($hesap->id == "")
	die();
if(!$_POST)
	die();


$kategori_id		= $gvn->rakam($_POST["kategori_id"]);
$urun_id			= $gvn->rakam($_POST["urun_id"]);
$baglanti			= $gvn->html_temizle($_POST["baglanti"]);
$miktar				= $gvn->zrakam($_POST["miktar"]);

if($fonk->bosluk_kontrol($kategori_id) == true OR $fonk->bosluk_kontrol($urun_id) == true OR $fonk->bosluk_kontrol($baglanti) == true OR $miktar == 0)
	die($fonk->hata("Lütfen boş alan bırakmayın!"));

$kontrol	= $db->prepare("SELECT * FROM kategoriler WHERE id=?");
$kontrol->execute(array($kategori_id));

if($kontrol->rowCount() < 1)
	die($fonk->hata("Lütfen Kategori Seçiniz!"));
$kategori	= $kontrol->fetch(PDO::FETCH_OBJ);

$kontrol	= $db->prepare("SELECT * FROM urunler WHERE id=?");
$kontrol->execute(array($urun_id));

if($kontrol->rowCount() < 1)
	die($fonk->hata("Lütfen Ürün Seçiniz!"));

$urun	= $kontrol->fetch(PDO::FETCH_OBJ);
$min_miktar	= $urun->min_adet;
$max_miktar = $urun->max_adet;
if($miktar < $min_miktar OR $miktar > $max_miktar)
	die($fonk->hata("Miktar [Min: ".$min_miktar." & Max: ".$max_miktar."] adete kadar olmalıdır."));

if($urun->baglanti_url_check == 1)
	(!$gvn->url_kontrol($baglanti)) ? die($fonk->hata("Lütfen geçerli bir url adresi giriniz!")) : null;

if(strlen($baglanti) > 300)
	die($fonk->hata("Bağlantı adresi çok uzun..."));

$ofiyat	= ($hesap->ozel_fiyatlar == '') ? null : json_decode($hesap->ozel_fiyatlar,1)[$urun->id];  // Özel Adet başı fiyat
$fiyat	= ($ofiyat == '') ? $urun->tutar : $ofiyat; // Özel Adet başı fiyat
$ozel	= ($ofiyat == '') ? 0 : 1; // Özel fiyat olup olmadığını kontrol ediyoruz...
$fiyat	= $fiyat; // Adet başı fiyat
$ifiyat	= (($miktar * $fiyat) / 1000); //  İstenilen Fiyat
$ifiyat = $ifiyat; //  İstenilen Fiyat
$bakiye	= $hesap->bakiye;

if($bakiye < $ifiyat){
$kalan	 	= $gvn->para_str($gvn->para_int(($ifiyat - $bakiye)));
$istenilen	= $gvn->para_str($ifiyat);
die($fonk->hata("Yeterli Bakiye Bulunamıyor. Ürünü satın alabilmeniz için <strong>".$kalan." TL</strong>'ye daha ihtiyacınız var. Toplam ödemeniz gereken tutar : <strong>".$istenilen." TL</strong> dir.".$ifiyat));
}

$aynisiparis	= $db->query("SELECT * FROM siparisler WHERE acid=".$hesap->id." AND durum=0 ");

if($aynisiparis->rowCount() >= 3){ // Durumu onaylanmamış 3'den fazla sipariş varsa hata...
	die($fonk->hata("Onay bekleyen birden fazla siparişiniz olduğu için daha sonra tekrar deneyin."));
}

$tekrar	= $db->query("SELECT * FROM siparisler WHERE acid=".$hesap->id." AND urun_id = ".$urun->id." AND miktar = ".$miktar." AND baglanti = '".$baglanti."' AND durum=0 ");


if($tekrar->rowCount() > 0){ // Durumu onaylanmamış 3'den fazla sipariş varsa hata...
	die($fonk->hata("Bu sipariş zaten kayıt edildi."));
}

try {
$olustur		= $db->prepare("INSERT INTO siparisler SET acid=?,urun_id=?,ozel=?,miktar=?,baglanti=?,tutar=?,toplam_tutar=?,durum=?,tarih=?,sdurum=?");
$olustur->execute(array($hesap->id,$urun->id,$ozel,$miktar,$baglanti,$fiyat,$ifiyat,0,$fonk->datetime(),'0'));
$spno = $db->lastInsertId();
$db->query("UPDATE uyeler SET bakiye=bakiye-".$ifiyat." WHERE id=".$hesap->id);
}catch(PDOException $e){
	die($fonk->hata("Bir hata oluştu. Sipariş oluşturulamıyor. Yetkililere bildiriniz."));
}


if($ayarlar->bildirim_email != ''){
$text			= '
Sayın Yönetici, <br />
Az önce <strong>'.$hesap->adsoyad.'</strong> adlı müşteriniz yeni bir siparişte bulundu. <br />
Ürün: <strong>'.$urun->baslik.'</strong> <br />
Bağlantı: <strong>'.$baglanti.'</strong> <br />
Miktar: <strong>'.$miktar.'</strong> <br />
Tutar: <strong>'.$gvn->para_str($ifiyat).' TL</strong> <br />
';
$fonk->mail_gonder('Yeni Sipariş',$ayarlar->bildirim_email,$text);
}

if($ayarlar->bildirim_gsm != ''){
$text			= '
Sayın Yönetici, <br />
Az önce '.$hesap->adsoyad.' adlı müşteriniz yeni bir siparişte bulundu.
Ürün: '.$urun->baslik.'
Miktar: '.$miktar.'
Tutar: '.$gvn->para_str($ifiyat).' TL
';
$fonk->sms_gonder($ayarlar->bildirim_gsm,$text);
}


?>
<script type="text/javascript">
$("#SiparisFormuDiv").slideUp(500,function(){
	$("#spno").html("<?=$spno?>");
	$("#urun").html("<?=$urun->baslik?>");
	$("#bglnt").html("<?=$baglanti?>");
	$("#mktr").html("<?=$miktar?>");
$("#SiparisTamam").slideDown(500);
});
</script>