<?php
if($hesap->id == '')
	die();

?>
<option value="">Seçiniz</option>
<option value="0">Yok</option>
<?

$api_id				= $gvn->rakam($_GET["api_id"]);

$kontrol			= $db->prepare("SELECT * FROM api_servisler WHERE api_id=?");
$kontrol->execute(array($api_id));

if($kontrol->rowCount() < 1)
	die();



while($row			= $kontrol->fetch(PDO::FETCH_OBJ)){
?><option value="<?=$row->id;?>"><?=$row->adi;?></option><?
}