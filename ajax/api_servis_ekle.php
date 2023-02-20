<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();


if($hesap->tipi != 1){
die();
}


$api_id					= $gvn->zrakam($_POST["api_id"]);
$adi					= $gvn->html_temizle($_POST["adi"]);
$servis_no				= $gvn->html_temizle($_POST["servis_no"]);


if($fonk->bosluk_kontrol($api_id) == true OR $fonk->bosluk_kontrol($adi) == true OR $fonk->bosluk_kontrol($servis_no) == true)
	die($fonk->hata("Lütfen tüm alanları doldurunuz!"));



try {
$ekle				= $db->prepare("INSERT INTO api_servisler SET api_id=?,adi=?,servis_no=? ");
$ekle->execute(array($api_id,$adi,$servis_no));
}catch(PDOException $e){
die($fonk->hata("Bir hata oluştu eklenemiyor! ".$e->getMessage()));
}

$fonk->tamam("Başarıyla Eklendi!");
$fonk->yonlendir("index.php?do=api_servisler",2000);