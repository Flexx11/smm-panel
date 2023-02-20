<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();


if($hesap->tipi != 1){
die();
}

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM urunler WHERE id=?");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
die(); exit;
}


$baslik					= $gvn->html_temizle($_POST["baslik"]);
$aciklama				= $gvn->html_temizle($_POST["aciklama"]);
$baglanti_value			= $gvn->html_temizle($_POST["baglanti_value"]);
$sira					= $gvn->zrakam($_POST["sira"]);
$kategori_id			= $gvn->zrakam($_POST["kategori_id"]);
$min_adet				= $gvn->zrakam($_POST["min_adet"]);
$max_adet				= $gvn->zrakam($_POST["max_adet"]);
$tutar					= $gvn->prakam($_POST["tutar"]);
$tutar_int				= $gvn->para_int($tutar);
$baglanti_url_check		= $gvn->zrakam($_POST["baglanti_url_check"]);
$durum					= $gvn->zrakam($_POST["durum"]);
$api_id					= $gvn->rakam($_POST["api_id"]);
$api_servis				= $gvn->rakam($_POST["api_servis"]);


if($fonk->bosluk_kontrol($baslik) == true OR $fonk->bosluk_kontrol($api_id) == true OR $fonk->bosluk_kontrol($api_servis) == true)
	die($fonk->hata("Lütfen başlık ve api seçiniz yazınız!"));



try{
$updt		= $db->prepare("UPDATE urunler SET baslik=?, aciklama = ?, sira=?,kategori_id=?,min_adet=?,max_adet=?,tutar=?,baglanti_url_check=?,baglanti_value=?,durum=?,api_id=?,api_servis=? WHERE id=".$snc->id);
$updt->execute(array($baslik,$aciklama, $sira,$kategori_id,$min_adet,$max_adet,$tutar,$baglanti_url_check,$baglanti_value,$durum,$api_id,$api_servis));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Kategori güncellenemiyor."));
}

$fonk->tamam("Ürün başarıyla güncellendi.");
