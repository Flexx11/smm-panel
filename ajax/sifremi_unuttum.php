<?php
if(!$_POST)
	die();

if($hesap->id != '')
	die();

$email		= $gvn->eposta($_POST["email"]); 
$cook		= $_COOKIE["sifre_hatirlatma"];
$answer		= $gvn->harf_rakam($_POST["answer"]);
$kod		= $gvn->harf_rakam($_SESSION["security_code"]);


if($fonk->bosluk_kontrol($email) == true)
	die($fonk->hata("Lütfen e-posta adresinizi girin."));


if($answer != $kod)
	die($fonk->hata("Güvenlik sorusunu hatalı girdiniz!"));



if($cook == 'y')
	die($fonk->hata("Az önce hatırlatma gönderdiniz. 15dk sonra tekrar deneyin."));

if(!$gvn->eposta_kontrol($email))
	die($fonk->hata("Geçersiz E-posta adresi"));



$kontrol	= $db->prepare("SELECT * FROM uyeler WHERE email=? AND durum=0 LIMIT 0,1");
$kontrol->execute(array($email));
if($kontrol->rowCount() > 0){
$hesap		= $kontrol->fetch(PDO::FETCH_OBJ);
$text		= 'Merhaba '.$hesap->adsoyad.', <br />
Az önce bilgilerinizi hatırlatılması için talep aldık. Eğer bunu siz istemediyseniz bu maili dikkate almayınız. <br />
Kullanıcı Adınız: '.$hesap->username.' <br />
Kullanıcı Şifreniz: '.$hesap->password.' <br /><br />
Bol Şans Dileriz...
';

$gonder		= $fonk->mail_gonder('Hesap Bilgileriniz',$hesap->email,$text);

if($gonder){
	$fonk->tamam("Bilgileriniz Doğrulandı,Hatırlatma e-postanıza gönderildi.");
	unset($_SESSION["security_code"]);
	setcookie("sifre_hatirlatma",'y',time()+60*15);
}else
	$fonk->hata("Maalesef e-posta gönderilemiyor. Yetkililere bildiriniz.");
}else
	die($fonk->hata("Bilgileriniz hatalı, Lütfen tekrar deneyiniz."));
