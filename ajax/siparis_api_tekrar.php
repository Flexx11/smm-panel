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

$db->query("UPDATE siparisler SET adurum='0',aresponse='',oid='0' WHERE id=".$snc->id);
?><script>alert("İstek sıraya alındı.");</script><?
$fonk->yonlendir("index.php?do=siparis&id=".$id,500);