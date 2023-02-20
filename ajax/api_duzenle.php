<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();


if($hesap->tipi != 1){
die();
}

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM apiler WHERE id=?");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
die(); exit;
}


$adi					= $gvn->html_temizle($_POST["adi"]);
$url					= $gvn->html_temizle($_POST["url"]);
$key					= $gvn->html_temizle($_POST["key"]);
$secret					= $gvn->html_temizle($_POST["secret"]);
$username				= $gvn->html_temizle($_POST["username"]);
$password				= $gvn->html_temizle($_POST["password"]);


if($fonk->bosluk_kontrol($adi) == true OR $fonk->bosluk_kontrol($url) == true)
	die($fonk->hata("Lütfen adı ve url giriniz!"));



try{
$updt		= $db->prepare("UPDATE apiler SET adi=?,url=?,keyy=?,secret=?,username=?,password=? WHERE id=".$snc->id);
$updt->execute(array($adi,$url,$key,$secret,$username,$password));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Güncellenemiyor!"));
}

$fonk->tamam("Api başarıyla güncellendi.");
