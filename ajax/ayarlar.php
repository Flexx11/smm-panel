<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();

if($hesap->tipi != 1){ 
die();
}

$site_adi			= $gvn->html_temizle($_POST["site_adi"]);
$slogan				= $gvn->html_temizle($_POST["slogan"]);
$title				= $gvn->html_temizle($_POST["title"]);
$keywords			= $gvn->html_temizle($_POST["keywords"]);
$description		= $gvn->html_temizle($_POST["description"]);
$mail_host			= $gvn->html_temizle($_POST["mail_host"]);
$mail_port			= $gvn->zrakam($_POST["mail_port"]);
$mail_secure		= $gvn->html_temizle($_POST["mail_secure"]);
$mail_username		= $gvn->html_temizle($_POST["mail_username"]);
$mail_password		= $gvn->html_temizle($_POST["mail_password"]);
$hesap_bilgileri	= $_POST["hesap_bilgileri"];
$haber_duyuru		= $_POST["haber_duyuru"];
$sss				= $_POST["sss"];
$kampanya1_tutar	= $gvn->zrakam($_POST["kampanya1_tutar"]);
$kampanya2_tutar	= $gvn->zrakam($_POST["kampanya2_tutar"]);
$kampanya3_tutar	= $gvn->zrakam($_POST["kampanya3_tutar"]);
$kampanya1_hediye	= $gvn->zrakam($_POST["kampanya1_hediye"]);
$kampanya2_hediye	= $gvn->zrakam($_POST["kampanya2_hediye"]);
$kampanya3_hediye	= $gvn->zrakam($_POST["kampanya3_hediye"]);
$bildirim_email		= $gvn->html_temizle($_POST["bildirim_email"]);
$bildirim_gsm		= $gvn->rakam($_POST["bildirim_gsm"]);

if($fonk->bosluk_kontrol($site_adi) == true OR $fonk->bosluk_kontrol($title) == true){
die($fonk->hata("Lütfen site adını ve title sayfa başlığını yazınız!"));
}

$login_logo		= $_FILES["login_logo"];
$index_logo		= $_FILES["index_logo"];


if($login_logo['name'] != ''){
$adi			= "logo-login";
$uzanti			= $fonk->uzanti($login_logo["name"]);
$filename		= $adi.$uzanti;
$dizin			= "img/";
$yukle			= $fonk->resim_yukle($login_logo,$dizin,$adi);
if($yukle){
$dbsave			= $db->query("UPDATE ayarlar SET login_logo='".$filename."' ");
?><script type="text/javascript">
document.getElementById("login_logo_src").setAttribute("src", "<?=$dizin.$filename;?>?time=<?=time();?>");
</script>
<?
}else{
die($fonk->hata("Bir hata oluştu giriş logosu değiştirelemiyor. CHMOD ayarlarınızı yaptığınızdan emin olunuz!"));
}
}

if($index_logo['name'] != ''){
$adi			= "logo";
$uzanti			= $fonk->uzanti($index_logo["name"]);
$filename		= $adi.$uzanti;
$dizin			= "img/";
$yukle			= $fonk->resim_yukle($index_logo,$dizin,$adi);
if($yukle){
$dbsave			= $db->query("UPDATE ayarlar SET index_logo='".$filename."' ");
?><script type="text/javascript">
document.getElementById("index_logo_src").setAttribute("src", "<?=$dizin.$filename;?>?time=<?=time();?>");
</script>
<?
}else{ 
die($fonk->hata("Bir hata oluştu giriş logosu değiştirelemiyor. CHMOD ayarlarınızı yaptığınızdan emin olunuz!"));
}
}




try {
$updt				= $db->prepare("UPDATE ayarlar SET site_adi=?,slogan=?,title=?,keywords=?,description=?,hesap_bilgileri=?,haber_duyuru=?,sss=?,kampanya1_tutar=?,kampanya2_tutar=?,kampanya3_tutar=?,kampanya1_hediye=?,kampanya2_hediye=?,kampanya3_hediye=?,bildirim_email=?,bildirim_gsm=?,mail_host=?,mail_port=?,mail_secure=?,mail_username=?,mail_password=? ");
$updt->execute(array($site_adi,$slogan,$title,$keywords,$description,$hesap_bilgileri,$haber_duyuru,$sss,$kampanya1_tutar,$kampanya2_tutar,$kampanya3_tutar,$kampanya1_hediye,$kampanya2_hediye,$kampanya3_hediye,$bildirim_email,$bildirim_gsm,$mail_host,$mail_port,$mail_secure,$mail_username,$mail_password));


$fonk->tamam("Ayarlar Güncellendi.");

}catch(PDOException $e){
die($fonk->hata("Bir hata oluştu. ".$e->getMessage()));
}
