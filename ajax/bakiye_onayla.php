<?php
if($hesap->id == '')
	die();

if($hesap->tipi != 1)
	die(); 




$id 		= $gvn->rakam($_GET["id"]);
$gtutar		= $gvn->prakam($_GET["tutar"]);
$ghediye	= $gvn->prakam($_GET["hediye"]);
$tutar		= $gvn->para_int($gtutar);
$hediye		= $gvn->para_int($ghediye);

$snc	 = $db->prepare("SELECT * FROM bakiyeler WHERE id=? ");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);

if($snc->id == ""){
die(); exit;
}

$gonderen	= $db->query("SELECT adsoyad,id,email,bildirim FROM uyeler WHERE id=".$snc->acid)->fetch(PDO::FETCH_OBJ);

$tptutar		= $tutar;
$tptutar		+= $hediye;
$tptutar		= $gvn->para_int($tptutar);


$db->query("UPDATE uyeler SET bakiye=bakiye+".$tptutar." WHERE id=".$gonderen->id);
$db->query("UPDATE bakiyeler SET durum='1',sdurum='0',tutar='".$tutar."',hediye='".$hediye."' WHERE id=".$snc->id);


if($gonderen->bildirim == 0){
$text = 'Merhaba '.$gonderen->adsoyad.',<br />
'.$gvn->para_str($tutar).' TL tutarında bakiye talebiniz onaylanmıştır.
';
$fonk->mail_gonder("Bakiye Durumu",$gonderen->email,$text);
}


?><script>alert("Bakiye talebi onaylandı.");</script><?
$fonk->yonlendir("index.php?do=bakiye&id=".$id,500);