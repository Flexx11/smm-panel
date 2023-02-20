<?php
if(!$_POST)
	die();

if($hesap->id != "")
	die();

$username	= $gvn->html_temizle($_POST["username"]); 
$password	= $gvn->html_temizle($_POST["password"]);
$answer		= $gvn->harf_rakam($_POST["answer"]);
$kod		= $gvn->harf_rakam($_SESSION["security_code"]);

if($fonk->bosluk_kontrol($username) == true OR $fonk->bosluk_kontrol($password) == true)
	die($fonk->hata("Lütfen giriş bilgilerinizi girin."));


// if($answer != $kod)
	// die($fonk->hata("Güvenlik sorusunu hatalı girdiniz!"));


$kontrol	= $db->prepare("SELECT * FROM uyeler WHERE username=? AND password=? AND durum=0 LIMIT 0,1");
$kontrol->execute(array($username,$password));
if($kontrol->rowCount() > 0){
$hesap		= $kontrol->fetch(PDO::FETCH_OBJ);

try{
$updt		= $db->prepare("UPDATE uyeler SET son_giris_tarih=?,ip=? WHERE id=?");
$updt->execute(array($fonk->datetime(),$fonk->IpAdresi(),$hesap->id));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Giriş Yapılamıyor!"));
}

$_SESSION["username"] = $username;
$_SESSION["password"] = $password;
$fonk->yonlendir("index.php",50);

unset($_SESSION["security_code"]);

$fonk->tamam("Bilgileriniz Doğrulandı, Giriş Yapılıyor...");

}else
	die($fonk->hata("Bilgileriniz hatalı, Lütfen tekrar deneyiniz."));