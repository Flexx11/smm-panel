<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();

$tutar			= $gvn->prakam($_POST["tutar"]);
$tutar_int		= $gvn->para_int($tutar);
$tutar_str		= $gvn->para_str($tutar_int);

if($tutar == '' OR $tutar == 0){
die();
}

?>
<script type="text/javascript">
$("#FormS").slideUp(500,function(){
$("#Odeme").slideDown(500);
});
</script>
<div id="Div1">
<h4 style="text-align:center;"><?=$tutar_str;?> <i class="fa fa-try"></i> Bakiye Ödemesi</h3>
<p align="center">
Ödemeyi aşağıdaki hesap numaralarımıza yaptıktan sonra aşağıdan  Ödedim veya İptal Seçeneğini seçin.
</p>
<? echo $ayarlar->hesap_bilgileri; ?>
<div style="clear:both;"></div>
<hr />

<form role="form" class="form-horizontal"  id="odedim_form" method="POST" action="ajax.php?do=bakiye_yukle" onsubmit="return false;">
<input type="hidden" name="tutar" value="<?=$tutar;?>" />
<div class="form-group">
<label for="gadsoyad" class="col-sm-3 control-label">Gönderici Adı Soyadı</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="gadsoyad" name="gadsoyad" value="<?=$hesap->adsoyad;?>" placeholder="">
</div>
</div>

<div class="form-group">
<label for="banka" class="col-sm-3 control-label">Banka Adı</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="banka" name="banka" value="" placeholder="">
</div>
</div> 


</form>
<script type="text/javascript">
function OdeddimButon() {
AjaxFormS('odedim_form','odeme_status'); 
}
</script>


<p align="center">
<button type="button" class="btn btn-success" style="margin-right:10px;" onclick="OdeddimButon();">Ödedim</button>
<button type="button" class="btn btn-danger" style="" onClick="OdemeIptal();">İptal</button>
</p>
</div>
<div id="odeme_status"></div>
<?