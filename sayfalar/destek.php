<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
include "inc/header.php";

$id 	= $gvn->rakam($_GET["id"]);
$sart	= ($hesap->tipi != 1) ? "acid=".$hesap->id." AND " : '';


$destek = $db->prepare("SELECT * FROM destek_sistemi WHERE ".$sart." id=? ");
$destek->execute(array($id));
$destek	= $destek->fetch(PDO::FETCH_OBJ);


if($destek->id == ""){
header("Location:index.php?do=destek_sistemi");
die(); exit;
}

$db->query("UPDATE destek_sistemi SET goruldu='1' WHERE id=".$destek->id);
if($hesap->tipi == 0){
$db->query("UPDATE destek_sistemi SET sdurum='1' WHERE id=".$destek->id);
}
$son_msj_id = $db->query("SELECT id FROM destek_cevaplar WHERE destek_id=".$destek->id." AND mti=1 ORDER BY id DESC")->fetch(PDO::FETCH_OBJ)->id;
$gonderen	= $db->query("SELECT adsoyad,id FROM uyeler WHERE id=".$destek->acid)->fetch(PDO::FETCH_OBJ);
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Destek Talebini İncele
          <div class="clear"></div>
        </div>
        <div class="panel-body">
          <style>
          .column-id {width:10%;}
          .column-subject {width:5%;}
          .column-message {width:20%;}
          .column-status {width:5%;}
          .column-created_at {width:15%;}
          .column-act {width:2%;}

          th,tr {text-align:center;}
        </style>
      

      <br>
    
      <div class="row"><!-- /.col -->

        <div class="col-md-12">
		  
<style type="text/css">
.yorum {
	float: left;
	width: 75%;
	background-color: #fffcc6;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 20px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	box-shadow: 0px 0px 15px #e3de88;
	margin-bottom: 20px;
}
.yorum h3 {
float: left;
width: 22%;
margin-right: 10px;
color: #aa6000;
font-size: 16px;
margin-top:0px;
line-height:normal;
}
.yorum h3 span {
font-size: 14px;
}
.yorum h4 {
float: right;
color: #403D00;
font-size: 15px;
width: 73%;
line-height:20px;
}
#admincevap {
	background-color: #DDF9FF;
	box-shadow: 0px 0px 15px #91c9d5;
	margin-left: 70px;
}
#admincevap h3 {
	color: #00829D;
	width: 150px;
}
#admincevap h3 span {
	color: #00829D;
}
#admincevap h4 {
	color: #00728A;
}
</style>




                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=destek_cevapla&id=<?=$destek->id;?>" onsubmit="return false;" enctype="multipart/form-data">
                                        
                                        
										
                                  <table width="75%" border="0">
  <tbody>

	<? if($hesap->tipi == 1){?>
   <tr>
    <td width="25%" height="30"><strong>Gönderen</strong></td>
    <td width="65%" height="30">: <? echo $gonderen->adsoyad; ?></td>
  </tr>
  <? } ?>
  
   <tr>
    <td width="25%" height="30"><strong>Konu</strong></td>
    <td width="65%" height="30">: <?=$destek->konu; ?></td>
  </tr>
  
  <tr>
    <td height="30"><strong>Eklenme Tarihi</strong></td>
    <td height="30">: <?=date('d.m.Y - H:i',strtotime($destek->tarih));?></td>
  </tr>
  
   <tr>
    <td height="30"><strong>Son Güncellenme Tarihi</strong></td>
    <td height="30">: <?=date('d.m.Y - H:i',strtotime($destek->sg_tarih));?></td>
  </tr>
  
</tbody></table>
<br/>



      <?php
	  $sql			= $db->query("SELECT * FROM destek_cevaplar WHERE destek_id=".$destek->id." ORDER BY id ASC");
	  while($row	= $sql->fetch(PDO::FETCH_OBJ)){
	  ?>
	<div class="yorum" <?=($row->mti == 1) ? 'id="admincevap"' : ''; ?>>
	<h3> <b><?=($row->mti == 1) ? 'Yetkili' : "Siz";?> </b><br>
	<span>
	Tarih: <?=date("d/m/Y H:i",strtotime($row->tarih));?>
	<br>
	IP: <?=$row->ip;?>	
	
	<? if($son_msj_id == $row->id AND $hesap->tipi == 1){ ?>
	<? if($destek->goruldu == 0){ ?><i class="fa fa-check" style="font-size:16px;color:grey"></i><? } ?>
	<? if($destek->goruldu == 1){ ?><i class="fa fa-check" style="font-size:16px;color:green"></i> Görüldü<? } ?>
	<? } ?>
	
	</span>
	</h3>

	<h4>
	<?=$row->mesaj;?>
	</h4>
	</div>
<? } ?>


<? if($destek->durum  != 2){ ?>

<textarea name="mesaj" class="textarea-autosize" style="width: 75%; height:150px;padding:10px;"></textarea>
<br />

<div style="clear:both;"></div>
<? if($hesap->tipi == 1){ ?><button type="button" class="btn btn-danger" style="margin-right:10px;" onClick="talep_kapat();">Talebi Kapat!</button><? } ?>
<button type="button" class="btn btn-success" style="" onclick=" AjaxFormS('forms','form_status');">Cevap Gönder</button>
<? } ?>

</form>

<div id="form_status"></div>


<script type="text/javascript">
function talep_kapat(){
if(confirm('Talep Kapatılacaktır. Onaylıyor musunuz?')){
ajaxHere('ajax.php?do=ticket_kapat&id=<?=$destek->id;?>','form_status');
}
}
</script>	
  
		  
		  
		  
        </div> <!-- /.col -->

      </div> <!-- /.row -->


      <br><br>


      <div class="row"><!-- /.col --><!-- /.col -->

      </div> <!-- /.row -->


      <br><br>

      <div class="row"><!-- /.col --><!-- /.col -->

      </div> <!-- /.row -->



    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div> <!-- /.container -->

<? include "inc/footer.php"; ?>