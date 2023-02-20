<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
if($hesap->tipi != 1){
header("Location:index.php");
die();
}
include "inc/header.php"; 


?>
<div class="container">

  <div class="content">

    <div class="content-container">

      

      <div class="content-header">
        <h2 class="content-header-title">Ürün Listesi</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Anasayfa</a></li>
          <li class="active">Ürün Listesi</li>
        </ol>
      </div> <!-- /.content-header -->

      

      <br>
    
      <div class="row"><!-- /.col -->

        <div class="col-md-12">

		<?php
		$sil		= $gvn->rakam($_GET["sil"]);
		if($sil != '' AND DEMO == false){
		$silq		= $db->prepare("DELETE FROM urunler WHERE id=?");
		$silq->execute(array($sil));
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
		
		$sql		= "SELECT * FROM urunler ORDER BY id DESC";
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
                <th>Kategori</th>
                <th>Mn.Adet</th>
                <th>Mx.Adet</th>
                <th>Tutar</th>
               <th align="center" width="20%">Kontroller</th>
              </tr>
            </thead>
            <tbody>
             
			 <?php
			 $i			= 0;
			 while($row	= $query->fetch(PDO::FETCH_OBJ)){
			 $i			+=1;
			 $kat		= $db->query("SELECT baslik,id FROM kategoriler WHERE id=".$row->kategori_id)->fetch(PDO::FETCH_OBJ);
			 ?>
			 <tr>
                <td><?=$i;?></td>
				<td><? echo $row->baslik;?></td>
				<td><? echo $row->sira;?></td>
				<td><? echo $kat->baslik;?></td>
				<td><? echo $row->min_adet;?></td>
				<td><? echo $row->max_adet;?></td>
				<td><? echo $gvn->para_str($row->tutar);?> TL</td>
				<td>
				<button type="button" class="btn btn-info" onclick="window.location.href='index.php?do=urun_duzenle&id=<?=$row->id;?>';"><i class="fa fa-eye"></i> Görüntüle</button>
				<button type="button" class="btn btn-primary" onclick="window.location.href='index.php?do=urunler&sil=<?=$row->id;?>';"><i class="fa fa-trash-o"></i> Sil</button>
				</td>
              </tr>
			  <?
			 }
			 ?>
            </tbody>
          </table>
		  <div id="uyeler_status"></div>

<? }else{ ?>
<b style="color:#aa1818;">Herhangi bir ürün bulunmuyor.</b> <br />
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