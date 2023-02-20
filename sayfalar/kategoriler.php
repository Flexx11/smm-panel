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
          Kategoriler
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

		<?php
		$sil		= $gvn->rakam($_GET["sil"]);
		if($sil != '' AND $sil != 1 AND DEMO == false){
		$silq		= $db->prepare("DELETE FROM kategoriler WHERE id=?");
		$silq->execute(array($sil));
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		
		$sql		= "SELECT * FROM kategoriler ORDER BY sira ASC";
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
                <th>Başlık</th>
                <th>Sıra</th>
               <th align="center" width="20%">Kontroller</th>
              </tr>
            </thead>
            <tbody>
             
			 <?php
			 $i			= 0;
			 while($row	= $query->fetch(PDO::FETCH_OBJ)){
			 $i			+=1;
			 ?>
			 <tr>
                <td><?=$i;?></td>
				<td><? echo $row->baslik;?></td>
				<td><? echo $row->sira;?></td>
				<td>
				<button type="button" class="btn btn-info" onclick="window.location.href='index.php?do=kategori_duzenle&id=<?=$row->id;?>';"><i class="fa fa-eye"></i> Görüntüle</button>
				<button type="button" class="btn btn-primary" onclick="window.location.href='index.php?do=kategoriler&sil=<?=$row->id;?>';"><i class="fa fa-trash-o"></i> Sil</button>
				</td>
              </tr>
			  <?
			 }
			 ?>
            </tbody>
          </table>
		  <div id="uyeler_status"></div>

<? }else{ ?>
<b style="color:#aa1818;">Herhangi bir kategori bulunmuyor.</b> <br />
<? } ?> 

<?php
if($toplam > 500){
echo $pagent->listele('index.php?do=kategoriler&git=',$gvn->rakam($_GET["git"]),$qry['basdan'],$qry['kadar'],'btn-success',$query);
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