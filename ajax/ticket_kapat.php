<?php
if($hesap->id == '')
	die();

if($hesap->tipi != 1)
	die();




$id 		= $gvn->rakam($_GET["id"]);
$tarih		= $fonk->datetime();
$destek = $db->prepare("SELECT * FROM destek_sistemi WHERE id=? ");
$destek->execute(array($id));
$destek	= $destek->fetch(PDO::FETCH_OBJ);

if($destek->id == ""){
die(); exit;
}

$db->query("UPDATE destek_sistemi SET durum='2',sg_tarih='".$tarih."',sdurum='0' WHERE id=".$destek->id);
?><script>alert("Destek talebi kapatıldı.");</script><?
$fonk->yonlendir("index.php?do=destek_sistemi",2000);