<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }

include "inc/header.php"; 
$durum	= $gvn->rakam($_GET["durum"]);

if($hesap->tipi == 0 AND DEMO == false){
if($durum == ''){
$db->query("UPDATE bakiyeler SET sdurum='1' WHERE sdurum=0 AND acid=".$hesap->id);
}elseif($durum == 1){
$db->query("UPDATE bakiyeler SET sdurum='1' WHERE sdurum=0 AND durum=1 AND acid=".$hesap->id);
}elseif($durum == 2){
$db->query("UPDATE bakiyeler SET sdurum='1' WHERE sdurum=0 AND durum=2 AND acid=".$hesap->id);
}
}

?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Bakiyeler
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
      

<?php 
if (isset($_GET["durum"])) {
  $xs = 1;
}else{
  $xs = 0;
}
 ?>
      <ul class="nav nav-pills">
        <li><a href="index.php?do=bakiye_yukle">Bakiye Yükle</a></li>
        <li <?=($xs == 0) ? 'class="active"':''?>><a href="index.php?do=bakiyeler">Tüm Bakiye Talepleri</a></li>
        <li <?=($durum == 0 && $xs == 1) ? 'class="active"':''?>><a href="index.php?do=bakiyeler&durum=0">Bekleyen Bakiye Talepleri</a></li>
        <li <?=($durum == 1) ? 'class="active"':''?>><a href="index.php?do=bakiyeler&durum=1">Onaylanan Bakiye Talepleri <?=($bild1_d1 > 0 ) ? '<span class="badge btn-primary">'.$bild1_d1.'</span>' : ''; ?></a></li>
        <li <?=($durum == 2) ? 'class="active"':''?>><a href="index.php?do=bakiyeler&durum=2">İptal Edilen Bakiye Talepleri <?=($bild1_d2 > 0 ) ? '<span class="badge btn-primary">'.$bild1_d2.'</span>' : ''; ?></a></li>
      </ul>


      <br>
    
      <div class="row"><!-- /.col -->

        <div class="col-md-12">
		<? if($hesap->tipi != 1){ ?>
		<button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?do=bakiye_yukle';"><i class="fa fa-plus"></i> Yeni Bakiye Talebi</button>
		<br />
		<br />
		<? } ?>
		

		<?php
		if($hesap->tipi == 1 AND DEMO == false){
		$sil		= $gvn->rakam($_GET["sil"]);
		if($sil != ''){
		$silq		= $db->prepare("DELETE FROM bakiyeler WHERE id=?");
		$silq->execute(array($sil));
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		}
		
			 $drm	= '';
			 $drm	= ($durum == 0 AND $durum != '') ?  'durum=0': $drm;
			 $drm	= ($durum == 1) ?  'durum=1': $drm;
			 $drm	= ($durum == 2) ?  'durum=2': $drm;
			 
			 if($durum != ''){
			 $whr 	= ($hesap->tipi == 1) ? "WHERE ".$drm : "WHERE ".$drm." AND acid=".$hesap->id;
			 }else{
			 $whr 	= ($hesap->tipi == 1) ?  "" : "WHERE acid=".$hesap->id;
			 }
			 
			 
		$sql		= "SELECT * FROM bakiyeler ".$whr." ORDER BY durum ASC, id DESC";	 
		$qry		= $pagent->sql_query($sql,$gvn->rakam($_GET["git"]),500);
		$query 		= $db->query($qry['sql']);
		$adet		= $query->rowCount();
		$toplam		= $db->query($sql)->rowCount();
		if($toplam > 0 ){
		?>
          <table class="table table-bordered table-highlight akilli_liste">
            <thead>
              <tr>
                <th>#</th>
                <? if($hesap->tipi == 1){?><th>Gönderen</th><? } ?>
                <th>Gönderici Adı Soyadı</th>
                <th>Banka</th>
                <th>Tutar</th>
                <th>Hediye</th>
                <th>Oluşturulma Tarihi</th>
                <th>Durum</th>
                <? if($hesap->tipi == 1){ ?><th align="center" width="20%">Kontroller</th><? } ?>
              </tr>
            </thead>
            <tbody>
             
			 <?php
			 $i			= 0;
			 while($row	= $query->fetch(PDO::FETCH_OBJ)){
			 $i			+=1;
			 if($hesap->tipi == 1){
			 $gonderen	= $db->query("SELECT adsoyad,id FROM uyeler WHERE id=".$row->acid)->fetch(PDO::FETCH_OBJ);
			 }
			 $hediye	= $row->hediye;
			 ?>
			 <tr>
                <td><?=$i;?></td>
                <? if($hesap->tipi == 1){?><td><?=$gonderen->adsoyad;?></td><?}?>
                <td><?=$row->gadsoyad;?></td>
                <td><?=$row->banka;?></td>
                <td><?=$gvn->para_str($row->tutar)." TL";?></td>
                <td><?=($hediye == '') ? "<strong style='color:red'>Yok</strong>" : $gvn->para_str($hediye)." TL";?></td>
                <td><?=date("d.m.Y H:i",strtotime($row->tarih));?></td>
                <td><?php
	  if($row->durum == 0){
	  ?><strong style="color:#36F">Onay Bekleniyor</strong><?
	  }elseif($row->durum == 1){
	  ?><strong style="color:green">Onaylandı</strong><?
	  }elseif($row->durum == 2){
	  ?><strong>Reddedildi</strong><?
	  }
	  ?></td>
        
		<? if($hesap->tipi == 1){ ?><td>
		<button type="button" class="btn btn-info" onclick="window.location.href='index.php?do=bakiye&id=<?=$row->id;?>';"><i class="fa fa-eye"></i> Görüntüle</button>
		<? if($hesap->tipi == 1){?><button type="button" class="btn btn-primary" onclick="window.location.href='index.php?do=bakiyeler&sil=<?=$row->id;?>';"><i class="fa fa-trash-o"></i> Sil</button><? } ?>
		</td><? } ?>
              </tr>
			  <?
			 }
			 ?>
            </tbody>
          </table>              



<? }else{ ?>
<b style="color:#aa1818;">Herhangi bir bakiye talebi bulunmuyor.</b> <br />
<? } ?> 

<?php
if($toplam > 500){
echo $pagent->listele('index.php?do=bakiyeler&durum='.$durum.'&git=',$gvn->rakam($_GET["git"]),$qry['basdan'],$qry['kadar'],'btn-success',$query);
}
?>


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


<?php include "inc/footer.php"; ?>