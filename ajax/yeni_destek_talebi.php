<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();


$konu			= $gvn->html_temizle($_POST["konu"]);
$mesaj			= $gvn->mesaj(htmlspecialchars($_POST["mesaj"],ENT_QUOTES));
$tarih			= $fonk->datetime();
$ip				= $fonk->IpAdresi();

if($fonk->bosluk_kontrol($konu) == true OR $fonk->bosluk_kontrol($mesaj) == true){
die($fonk->hata("Lütfen boş alan bırakmayınız!"));
}



try {
$olustur		= $db->prepare("INSERT INTO destek_sistemi SET acid=?,tarih=?,sg_tarih=?,konu=?,goruldu=?,sdurum=? ");
$olustur->execute(array($hesap->id,$tarih,$tarih,$konu,1,1));

$lid			= $db->lastInsertId();
$msgck			= $db->prepare("INSERT INTO destek_cevaplar SET destek_id=?,mesaj=?,tarih=?,ip=? ");
$msgck->execute(array($lid,$mesaj,$tarih,$ip));

$fonk->tamam("Destek talebiniz başarıyla oluşturuldu.");

if($ayarlar->bildirim_email != ''){
$text			= '
Sayın Yönetici, <br />
Az önce <strong>'.$hesap->adsoyad.'</strong> adlı müşteriniz yeni destek talebinde bulundu. <br />
Konu : <strong>'.$konu.'</strong> <br />
Mesaj : <strong>'.$mesaj.'</strong> <br />
';
$fonk->mail_gonder('Yeni Destek Talebi!',$ayarlar->bildirim_email,$text);
}

if($ayarlar->bildirim_gsm != ''){
$text			= 'Sayın Yönetici,
Az önce '.$hesap->adsoyad.' adlı müşteriniz yeni destek talebinde bulundu.
Konu : '.$konu.'
';
$fonk->sms_gonder($ayarlar->bildirim_gsm,$text);
}


$fonk->yonlendir("index.php?do=destek_sistemi",2000);

}catch(PDOException $e){
die($fonk->hata("Bir hata oluştu.".$e->getMessage()));
}
