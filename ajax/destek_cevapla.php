<?php
if($_POST){
if($hesap->id != ""){


$id 	= $gvn->rakam($_GET["id"]); 
$sart	= ($hesap->tipi != 1) ? "acid=".$hesap->id." AND " : '';


$destek = $db->prepare("SELECT * FROM destek_sistemi WHERE ".$sart." id=? ");
$destek->execute(array($id));
$destek	= $destek->fetch(PDO::FETCH_OBJ);



if($destek->id == ""){
die(); exit;
}

if($destek->durum == 2){
die(); exit;
}


$mesaj		= $gvn->mesaj(htmlspecialchars($_POST["mesaj"],ENT_QUOTES));

if($fonk->bosluk_kontrol($mesaj) == true){
die($fonk->hata("Lütfen bir şeyler yaz..."));
}elseif(strlen($mesaj) < 5){
die($fonk->hata("Lütfen bir şeyler yaz..."));
}


$durum 				= 0;
$goruldu 			= 1;
$mti				= 0;

$durum				= ($hesap->tipi == 1) ? 1 : 0;
$goruldu			= ($hesap->tipi == 1) ? 0 : 1;
$mti				= ($hesap->tipi == 1) ? 1 : 0;
$sdurum				= ($hesap->tipi == 1) ? 0 : 1;


try{

$msgck			= $db->prepare("INSERT INTO destek_cevaplar SET destek_id=?,mesaj=?,tarih=?,ip=?,mti=? ");
$msgck->execute(array($destek->id,$mesaj,$tarih,$fonk->IpAdresi(),$mti));
$db->query("UPDATE destek_sistemi SET durum='".$durum."',goruldu='".$goruldu."',sg_tarih='".$fonk->datetime()."',sdurum='".$sdurum."' WHERE id=".$destek->id);

$fonk->tamam("Mesaj Gönderildi.");

if($ayarlar->bildirim_email != ''){
$text			= '
Sayın Yönetici, <br />
Az önce <strong>'.$hesap->adsoyad.'</strong> adlı müşteriniz "'.$destek->konu.'" başlıklı destek talebine yanıt yazdı. <br />
Mesaj : <strong>'.$mesaj.'</strong> <br />
';
$fonk->mail_gonder('Destek Talebi Yanıtlandı!',$ayarlar->bildirim_email,$text);
}

if($ayarlar->bildirim_gsm != ''){
$text			= 'Sayın Yönetici,
Az önce '.$hesap->adsoyad.' adlı müşteriniz "'.$destek->konu.'" başlıklı destek talebine yanıt yazdı.';
$fonk->sms_gonder($ayarlar->bildirim_gsm,$text);
}


$fonk->yonlendir("index.php?do=destek&id=".$id,1);

}catch(PDOException $e){
die($fonk->hata("Bir hata oluştu mesaj gönderilemiyor."));
}


}
}
