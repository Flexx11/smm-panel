<?php
if($hesap->id == '')
	die();


$id				= $gvn->rakam($_GET["id"]);

$kontrol			= $db->prepare("SELECT * FROM urunler WHERE id=?");
$kontrol->execute(array($id));

if($kontrol->rowCount() < 1)
	die();
$urun				= $kontrol->fetch(PDO::FETCH_OBJ);

?>
<div class="form-group">
	<label for="baglanti" class="col-sm-3 control-label">Açıklama</label>
		<div class="col-sm-9">
		<?=$urun->aciklama;?>
	</div>
</div>
<div class="form-group">
	<label for="baglanti" class="col-sm-3 control-label">Bağlantı(Link)</label>
	<div class="col-sm-9">
	<input type="text" class="form-control" id="baglanti" name="baglanti" value="" placeholder="<?=$urun->baglanti_value;?>">
</div>
</div>

<div class="form-group">
	<label for="miktar" class="col-sm-3 control-label">Miktar</label>
	<div class="col-sm-9">
	<input type="text" class="form-control" id="miktar" name="miktar" value="<?=$urun->min_adet;?>" placeholder="" maxlength="11" onkeypress="return isNumberKey(event)">
</div>
</div>
<div class="form-group">
	<label for="miktar" class="col-sm-3 control-label">Tutar</label>
	<div class="col-sm-9">
	<div align="right">
		<span id="tutar" style="float: left;"></span>
		<button type="submit" class="btn btn-secondary" onclick=" AjaxFormS('forms','form_status');">Oluştur</button>
		</div>
</div>
</div>


<script type="text/javascript">
	var urun = $("#urunler").val();
	var miktar = $("#miktar").val();
	ajaxHere('ajax.php?do=fiyat&urun='+urun+'&miktar='+miktar,'tutar');
</script>