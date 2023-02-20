<?php
if($hesap->id == '')
	die();

$urun = $_GET["urun"];
$miktar = $_GET["miktar"];

$d = $db->query("SELECT * FROM urunler WHERE id=".$urun)->fetch(PDO::FETCH_OBJ);


$ofiyat	= ($hesap->ozel_fiyatlar == '') ? null : json_decode($hesap->ozel_fiyatlar,1)[$d->id];  // Özel Adet başı fiyat
$fiyat	= ($ofiyat == '') ? $d->tutar : $ofiyat; // Özel Adet başı fiyat

echo ($fiyat / 1000 ) * $miktar." ₺";
?>