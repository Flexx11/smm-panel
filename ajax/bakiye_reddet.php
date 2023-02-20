<?php
if($hesap->id == '')
	die();

if($hesap->tipi != 1)
	die();




$id 	= $gvn->rakam($_GET["id"]); 
$snc	 = $db->prepare("SELECT * FROM bakiyeler WHERE id=? ");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
die(); exit;
}


$gonderen	= $db->query("SELECT adsoyad,id,email,bildirim FROM uyeler WHERE id=".$snc->acid)->fetch(PDO::FETCH_OBJ);

if($gonderen->bildirim == 0){
$text = 'Merhaba '.$gonderen->adsoyad.',<br />
'.$gvn->para_str($snc->tutar).' TL tutarında bakiye talebiniz reddedilmiştir.';
$fonk->mail_gonder("Bakiye Durumu",$gonderen->email,$text);
}


$db->query("UPDATE bakiyeler SET durum='2',sdurum='0' WHERE id=".$snc->id);
?><script>alert("Bakiye talebi reddedildi.");</script><?
$fonk->yonlendir("index.php?do=bakiye&id=".$id,500);