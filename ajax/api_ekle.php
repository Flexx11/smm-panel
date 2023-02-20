<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();


if($hesap->tipi != 1){
die();
}


$adi					= $gvn->html_temizle($_POST["adi"]);
$url					= $gvn->html_temizle($_POST["url"]);
$key					= $gvn->html_temizle($_POST["key"]);
$secret					= $gvn->html_temizle($_POST["secret"]);
$username				= $gvn->html_temizle($_POST["username"]);
$password				= $gvn->html_temizle($_POST["password"]);


if($fonk->bosluk_kontrol($adi) == true OR $fonk->bosluk_kontrol($url) == true)
	die($fonk->hata("Lütfen adı ve url giriniz!"));



try {
$ekle				= $db->prepare("INSERT INTO apiler SET adi=?,url=?,keyy=?,secret=?,username=?,password=? ");
$ekle->execute(array($adi,$url,$key,$secret,$username,$password));
}catch(PDOException $e){
die($fonk->hata("Bir hata oluştu eklenemiyor! ".$e->getMessage()));
}

$fonk->tamam("Başarıyla Eklendi!");
$fonk->yonlendir("index.php?do=apiler",2000);