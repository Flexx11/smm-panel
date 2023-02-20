<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die(); 


if($hesap->tipi != 1){
die();
}

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM uyeler WHERE id=? AND tipi=0 ");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
die(); exit;
}


$adsoyad				= $gvn->html_temizle($_POST["adsoyad"]);
$username				= $gvn->html_temizle($_POST["username"]);
$email					= $gvn->eposta($_POST["email"]);
$password				= $gvn->html_temizle($_POST["password"]);
$bakiye					= $gvn->para_int($gvn->prakam($_POST["bakiye"]));
$durum					= $gvn->zrakam($_POST["durum"]);
$urunler				= $_POST["urunler"];
$telefon				= $gvn->rakam($_POST["telefon"]);

if($fonk->bosluk_kontrol($adsoyad) == true OR $fonk->bosluk_kontrol($email) == true OR $fonk->bosluk_kontrol($username) == true OR $fonk->bosluk_kontrol($password) == true)
	die($fonk->hata("Ad soyad veya e-posta boş bırakmayınız!"));

if($password != ''){
if($password != $snc->password){
try{
$updt				= $db->prepare("UPDATE uyeler SET password=? WHERE id=?");
$updt->execute(array($password,$snc->id));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Ayarlar güncellenemiyor."));
}
}
}

if($email != '' AND $snc->email != $email){
$kontrol	= $db->prepare("SELECT * FROM uyeler WHERE email=? LIMIT 0,1");
$kontrol->execute(array($email));
if($kontrol->rowCount() > 0){
	die($fonk->hata("Girdiğiniz e-posta başkası tarafından kullanılıyor."));
}
try{
$updt				= $db->prepare("UPDATE uyeler SET email=? WHERE id=?");
$updt->execute(array($email,$snc->id));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Ayarlar güncellenemiyor."));
}
}

if($username != '' AND $snc->username != $username){
$kontrol	= $db->prepare("SELECT * FROM uyeler WHERE username=? LIMIT 0,1");
$kontrol->execute(array($username));
if($kontrol->rowCount() > 0){
	die($fonk->hata("Girdiğiniz kullanıcı adı başkası tarafından kullanılıyor."));
}
try{
$updt				= $db->prepare("UPDATE uyeler SET username=? WHERE id=?");
$updt->execute(array($username,$snc->id));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Ayarlar güncellenemiyor."));
}
}

$urunler		= array_diff($urunler,array(""," "));
$products		= array();
foreach($urunler as $k=>$v){
$trns			= $gvn->prakam($v);
$trns			= $gvn->para_int($trns);
$products[$k] 	= $trns;
}
$ozel_fiyatlar	= json_encode($products);
// $ozel_fiyatlar	= base64_encode($ozel_fiyatlar);




try{
$updt		= $db->prepare("UPDATE uyeler SET adsoyad=?,bakiye=?,durum=?,ozel_fiyatlar=?,telefon=? WHERE id=?");
$updt->execute(array($adsoyad,$bakiye,$durum,$ozel_fiyatlar,$telefon,$snc->id));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Ayarlar güncellenemiyor."));
}

$fonk->tamam("Hesap ayarları başarıyla güncellendi.");
