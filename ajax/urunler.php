<?php
if($hesap->id == '')
	die();

?><option value="">Seçiniz</option><?

$kategori_id		= $gvn->rakam($_GET["kategori_id"]);

$kontrol			= $db->prepare("SELECT * FROM urunler WHERE kategori_id=? AND durum=0");
$kontrol->execute(array($kategori_id));

if($kontrol->rowCount() < 1)
	die();



while($row			= $kontrol->fetch(PDO::FETCH_OBJ)){
?><option value="<?=$row->id;?>"><?=$row->baslik;?></option><?
}