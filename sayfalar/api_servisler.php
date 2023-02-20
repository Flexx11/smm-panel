<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
if($hesap->tipi != 1){
header("Location:index.php");
die();
}
include "inc/header.php"; 
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
        Api Servisleri
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
		<button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?do=api_servis_ekle';"><i class="fa fa-plus"></i> Yeni Api Servisi Ekle</button>
		<br />
		<br />
		

		<?php
		if($hesap->tipi == 1 AND DEMO == false){
		$sil		= $gvn->rakam($_GET["sil"]);
		if($sil != ''){
		$silq		= $db->prepare("DELETE FROM api_servisler WHERE id=?");
		$silq->execute(array($sil));
		
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		}
		
		
		$sql		= "SELECT * FROM api_servisler ORDER BY id DESC";	 
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
                <th>Api</th>
                <th>Adı</th>
                <th>Servis No</th>
                <th align="center" width="20%">Kontroller</th>
              </tr>
            </thead>
            <tbody>
             
			 <?php
			 $i			= 0;
			 while($row	= $query->fetch(PDO::FETCH_OBJ)){
			 $i			+=1;
			 $api		= $db->query("SELECT * FROM apiler WHERE id=".$row->api_id)->fetch(PDO::FETCH_OBJ);
			 ?>
			 <tr>
                <td><?=$i;?></td>
                <td><?=$api->adi;?></td>
                <td><?=$row->adi;?></td>
                <td><?=$row->servis_no;?></td>
				
		<td>
		<button type="button" class="btn btn-info" onclick="window.location.href='index.php?do=api_servis&id=<?=$row->id;?>';"><i class="fa fa-eye"></i> Görüntüle</button>
		<button type="button" class="btn btn-primary" onclick="window.location.href='index.php?do=api_servisler&sil=<?=$row->id;?>';"><i class="fa fa-trash-o"></i> Sil</button>
		</td>
              </tr>
			  <?
			 }
			 ?>
            </tbody>
          </table>              



<? }else{ ?>
<b style="color:#aa1818;">Herhangi bir api servisi eklenmedi!</b> <br />
<? } ?> 

<?php
if($toplam > 500){
echo $pagent->listele('index.php?do=apiler&git=',$gvn->rakam($_GET["git"]),$qry['basdan'],$qry['kadar'],'btn-success',$query);
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