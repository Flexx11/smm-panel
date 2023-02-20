<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
include "inc/header.php";

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM bakiyeler WHERE id=? ");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ); 


if($snc->id == ""){
header("Location:index.php?do=bakiyeler");
die(); exit;
}

$gonderen	= $db->query("SELECT adsoyad,id FROM uyeler WHERE id=".$snc->acid)->fetch(PDO::FETCH_OBJ);
$hediye		= $snc->hediye;
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Bakiye Taleb Detay
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

        <div class="col-md-8 col-md-offset-4">
		  
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

<table width="75%" border="0">
  <tbody>

	<? if($hesap->tipi == 1){?>
   <tr>
    <td width="25%" height="30"><strong>Gönderen</strong></td>
    <td width="65%" height="30">: <? echo $gonderen->adsoyad; ?></td>
  </tr>
  <? } ?>
  
  <tr>
    <td width="25%" height="30"><strong>Gönderici Adı Soyadı</strong></td>
    <td width="65%" height="30">: <? echo $snc->gadsoyad; ?></td>
  </tr>
  
   <tr>
    <td width="25%" height="30"><strong>Banka Adı</strong></td>
    <td width="65%" height="30">: <? echo $snc->banka; ?></td>
  </tr>
  
  <tr>
    <td width="25%" height="30"><strong>Tutar</strong></td>
    <td width="65%" height="30">: <input type="text" value="<?=$gvn->para_str($snc->tutar); ?>" id="tutar" <?=($snc->durum != 0) ? 'disabled' : '';?> size="8" style="text-align:center;" /> TL</td>
  </tr>
  
  <? if($hediye != ''){ ?>
   <tr>
    <td width="25%" height="30"><strong>Hediye</strong></td>
    <td width="65%" height="30">: <input type="text" value="<?=$gvn->para_str($hediye);?>" id="hediye" <?=($snc->durum != 0) ? 'disabled' : '';?> size="8" style="text-align:center;" /> TL</td>
  </tr>
  <? } ?>
  
  <tr>
    <td height="30"><strong>Oluşturma Tarihi</strong></td>
    <td height="30">: <?=date('d.m.Y - H:i',strtotime($snc->tarih));?></td>
  </tr>
  
   <tr>
    <td height="30"><strong>Durum</strong></td>
    <td height="30">: <?php
	  if($snc->durum == 0){
	  ?><strong style="color:#36F">Onay Bekleniyor</strong><?
	  }elseif($snc->durum == 1){
	  ?><strong style="color:green">Onaylandı</strong><?
	  }elseif($snc->durum == 2){
	  ?><strong>Reddedildi</strong><?
	  }
	  ?></td>
  </tr>
  
  
</tbody></table>
<div style="clear:both;"></div>
<br />

<? if($snc->durum == 0){ ?>

<button type="button" class="btn btn-success" style="margin-right:10px;" onClick="talep_onayla();">Talebi Onayla</button>
<button type="button" class="btn btn-danger" style="margin-right:10px;" onClick="talep_reddet();">Talebi Reddet!</button>
<? } ?>

<div id="snc_status"></div>

<script type="text/javascript">
function talep_reddet(){
if(confirm('Talep Reddedilecektir. Yapmak istiyor musunuz?')){
ajaxHere('ajax.php?do=bakiye_reddet&id=<?=$snc->id;?>','snc_status');
}
}

function talep_onayla(){
if(confirm('Talep Onaylanacaktır. Yapmak istiyor musunuz?')){
var tutar = $("#tutar").val();
var hediye = $("#hediye").val();
ajaxHere('ajax.php?do=bakiye_onayla&id=<?=$snc->id;?>&tutar='+tutar+'&hediye='+hediye,'snc_status');
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