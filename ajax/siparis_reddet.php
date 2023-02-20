<?php
if($hesap->id == '')
	die();

if($hesap->tipi != 1)
	die();




$id 	= $gvn->rakam($_GET["id"]); 
$snc	 = $db->prepare("SELECT * FROM siparisler WHERE id=? ");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
die(); exit;
}

$db->query("UPDATE uyeler SET bakiye = bakiye+".$snc->toplam_tutar." WHERE id='".$snc->acid."'");

$urun	= $db->query("SELECT * FROM urunler WHERE id=".$snc->urun_id)->fetch(PDO::FETCH_OBJ);
$acc	= $db->query("SELECT adsoyad,id,email,bildirim FROM uyeler WHERE id=".$snc->acid)->fetch(PDO::FETCH_OBJ);


if($acc->bildirim == 0){
$text = 'Merhaba '.$acc->adsoyad.',<br />
Siparişini vermiş olduğunuz "'.$urun->baslik.'" adlı ürün reddedilmiştir.
';
$fonk->mail_gonder("Sipariş Reddedilmiştir",$acc->email,$text);
}



$db->query("UPDATE siparisler SET durum='2',sdurum='0' WHERE id=".$snc->id);
?><script>alert("Sipariş iptal edildi.");</script><?
$fonk->yonlendir("index.php?do=siparis&id=".$id,500);