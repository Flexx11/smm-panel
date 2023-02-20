<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();


if($hesap->tipi != 1){
die();
}


$baslik					= $gvn->html_temizle($_POST["baslik"]);
$icon					= $gvn->html_temizle($_POST["icon"]);
$sira					= $gvn->zrakam($_POST["sira"]);

if($fonk->bosluk_kontrol($baslik) == true)
	die($fonk->hata("Lütfen başlık yazınız!"));



try {
$ekle				= $db->prepare("INSERT INTO kategoriler SET baslik=?,sira=?,icon=? ");
$ekle->execute(array($baslik,$sira,$icon));
}catch(PDOException $e){
die($fonk->hata("Bir hata oluştu eklenemiyor!"));
}

$fonk->tamam("Başarıyla Eklendi!");
$fonk->yonlendir("index.php?do=kategoriler",2000);