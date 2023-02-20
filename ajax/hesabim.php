<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();

$adsoyad				= $gvn->html_temizle($_POST["adsoyad"]); 
$email					= $gvn->eposta($_POST["email"]);
$password				= $gvn->html_temizle($_POST["password"]);
$password_tekrar		= $gvn->html_temizle($_POST["password_tekrar"]);
$bildirim				= $gvn->zrakam($_POST["bildirim"]);
$telefon				= $gvn->rakam($_POST["telefon"]);

if($fonk->bosluk_kontrol($adsoyad) == true OR $fonk->bosluk_kontrol($email) == true)
	die($fonk->hata("Ad soyad veya e-posta boş bırakmayınız!"));

if($password != ''){
if($password == $hesap->password){
die($fonk->hata("Girdiğiniz şifre mevcut şifreniz ile aynıdır."));
}
if($password_tekrar != $password){
die($fonk->hata("Şifreler bir biriyle uyuşmuyor!"));
}
try{
$updt				= $db->prepare("UPDATE uyeler SET password=? WHERE id=?");
$updt->execute(array($password,$hesap->id));
$_SESSION["password"] = $password;
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Ayarlar güncellenemiyor."));
}
}

if($email != '' AND $hesap->email != $email){
$kontrol	= $db->prepare("SELECT * FROM uyeler WHERE email=? LIMIT 0,1");
$kontrol->execute(array($email));
if($kontrol->rowCount() > 0){
	die($fonk->hata("Girdiğiniz e-posta başkası tarafından kullanılıyor."));
}
try{
$updt				= $db->prepare("UPDATE uyeler SET email=? WHERE id=?");
$updt->execute(array($email,$hesap->id));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Ayarlar güncellenemiyor."));
}
}

if($telefon != '' AND strlen($telefon) != 11)
	die($fonk->hata("Lütfen telefon numarasını 11 haneli olacak şekilde giriniz!"));



try{
$updt		= $db->prepare("UPDATE uyeler SET adsoyad=?,bildirim=?,telefon=? WHERE id=?");
$updt->execute(array($adsoyad,$bildirim,$telefon,$hesap->id));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Ayarlar güncellenemiyor."));
}

$fonk->tamam("Hesap ayarları başarıyla güncellendi.");
