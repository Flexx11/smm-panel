<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();


if($hesap->tipi != 1){
die();
}

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM kategoriler WHERE id=?");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
die(); exit;
}


$baslik					= $gvn->html_temizle($_POST["baslik"]);
$icon					= $gvn->html_temizle($_POST["icon"]);
$sira					= $gvn->zrakam($_POST["sira"]);
$durum					= $gvn->zrakam($_POST["durum"]);

if($fonk->bosluk_kontrol($baslik) == true)
	die($fonk->hata("Lütfen başlık yazınız!"));



try{
$updt		= $db->prepare("UPDATE kategoriler SET baslik=?,sira=?,durum=?, icon =? WHERE id=?");
$updt->execute(array($baslik,$sira,$durum, $icon, $snc->id));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Kategori güncellenemiyor."));
}

$fonk->tamam("Kategori başarıyla güncellendi.");
