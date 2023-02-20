<?php if($hesap->id != ""){ die(); }
if(!$_POST)
	die();


$email		= $gvn->eposta($_POST["email"]); 
$adsoyad	= $gvn->html_temizle($_POST["adsoyad"]);
$username	= $gvn->html_temizle($_POST["username"]);
$password	= $gvn->html_temizle($_POST["password"]);
$sozlesme	= $gvn->rakam($_POST["sozlesme"]);
$telefon	= $gvn->rakam($_POST["telefon"]);
$date		= $fonk->datetime();
$ip			= $fonk->IpAdresi();
$captcha=$_POST['g-recaptcha-response'];
// $answer		= $gvn->harf_rakam($_POST["answer"]);
// $kod		= $gvn->harf_rakam($_SESSION["security_code"]);


if($fonk->bosluk_kontrol($adsoyad) == true OR $fonk->bosluk_kontrol($email) == true OR $fonk->bosluk_kontrol($username) == true OR $fonk->bosluk_kontrol($password) == true)
	die($fonk->hata("Lütfen kayıt formunu eksiksiz doldurunuz!"));
	


// if($answer != $kod)
// 	die($fonk->hata("Güvenlik sorusunu hatalı girdiniz!"));




 else {

if($telefon != '' AND strlen($telefon) != 11)
	die($fonk->hata("Lütfen telefon numarasını 11 haneli olacak şekilde giriniz!"));


if(!$gvn->eposta_kontrol($email))
	die($fonk->hata("Geçersiz E-posta adresi"));

$kontrol	= $db->prepare("SELECT * FROM uyeler WHERE username=? OR email=? LIMIT 0,1");
$kontrol->execute(array($username,$email));
if($kontrol->rowCount() > 0)
	die($fonk->hata("Böyle bir hesap zaten mevcut."));

try {
$olustur		= $db->prepare("INSERT INTO uyeler SET username=?,password=?,email=?,adsoyad=?,olusturma_tarih=?,son_giris_tarih=?,ip=?,telefon=? ");
$olustur->execute(array($username,$password,$email,$adsoyad,$date,$date,$ip,$telefon));

}catch(PDOException $e){
	die($fonk->hata("Bir hata olştu kayıt olunamıyor!!!"));
}

$_SESSION["username"] = $username;
$_SESSION["password"] = $password;
$fonk->tamam("Başarıyla kayıt oldunuz, Giriş Yapılıyor...");
$fonk->yonlendir("index.php",2000);

}