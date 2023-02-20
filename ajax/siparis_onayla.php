<?php
if($hesap->id == '')
	die(); 

if($hesap->tipi != 1)
	die();


$id						= $gvn->rakam($_GET["id"]);
$toplam_tutar			= $gvn->prakam($_GET["toplam_tutar"]);
$miktar					= $gvn->zrakam($_GET["miktar"]);
$start_count			= $gvn->zrakam($_GET["start_count"]);
$baglanti				= $gvn->html_temizle($_GET["baglanti"]);

$sorgula		= $db->prepare("SELECT acid,toplam_tutar,urun_id,miktar FROM siparisler WHERE id=?");
$sorgula->execute(array($id));
if($sorgula->rowCount() > 0){
$sprs			= $sorgula->fetch(PDO::FETCH_OBJ);
$acc			= $db->query("SELECT id,bakiye,adsoyad,email,bildirim FROM uyeler WHERE id=".$sprs->acid)->fetch(PDO::FETCH_OBJ);
$urun			= $db->query("SELECT * FROM urunler WHERE id=".$sprs->urun_id)->fetch(PDO::FETCH_OBJ);



$toplam_tutar	= $gvn->para_int($toplam_tutar);

if($acc->bakiye < $toplam_tutar){
$fonk->hata("Üyenin bakiyesi yetersiz olduğu için onaylanamıyor. <br /> Üyenin Bakiyesi: <strong>".$gvn->para_str($acc->bakiye)."</strong> TL dir.");
}else{

try{
$updt		= $db->prepare("UPDATE siparisler SET toplam_tutar=?,miktar=?,baglanti=?,durum=?,sdurum=?,start_count=? WHERE id=".$id);
$updt->execute(array($toplam_tutar,$miktar,$baglanti,'1','0',$start_count));
}catch(PDOException $e){
die($fonk->hata("Bir hata oluştu: ".$e->getMessage()));
}


$db->query("UPDATE uyeler SET bakiye=bakiye-".$toplam_tutar." WHERE id=".$acc->id);

if($acc->bildirim == 0){
$text = 'Merhaba '.$acc->adsoyad.',<br />
Siparişini vermiş olduğunuz "'.$urun->baslik.'" adlı ürün onaylanmıştır.
';
$fonk->mail_gonder("Sipariş Tamamlanmıştır",$acc->email,$text);
}


?><script>alert("Sipariş onaylandı.");</script><?
$fonk->yonlendir("index.php?do=siparis&id=".$id,500);


}
}