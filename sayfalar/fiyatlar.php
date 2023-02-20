<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
include "inc/header.php";

?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Fiyatlar
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
$uyeof		= json_decode(base64_decode($hesap->ozel_fiyatlar),1);
$i			= 0;
$sql		= $db->query("SELECT DISTINCT kategoriler.id,kategoriler.baslik, kategoriler.icon FROM kategoriler INNER JOIN urunler ON kategoriler.id=urunler.kategori_id WHERE kategoriler.durum=0 AND urunler.durum=0 ORDER BY kategoriler.sira ASC");
while($row	= $sql->fetch(PDO::FETCH_OBJ)){
?>
          <table class="table table-bordered table-highlight">
            <thead>
              <tr>
                <th colspan="5" style="font-size: 13pt; text-align: center"><i class="fa fa-<?=$row->icon?>"></i> <?=$row->baslik;?></th>
              </tr>
              <tr>
                <th>#</th>
                <th>Hizmet Adı</th>
                <th>Min Miktar</th>
                <th>Max Miktar</th>
                <th>Ücret</th>
              </tr>
            </thead>
            <tbody>

<?php
$sql2		= $db->query("SELECT baslik,min_adet,max_adet,tutar FROM urunler WHERE durum=0 AND kategori_id=".$row->id." ORDER BY sira ASC");
while($row2	= $sql2->fetch(PDO::FETCH_OBJ)){
$i			+=1;

$ofiyat		= ($hesap->ozel_fiyatlar == '') ? null : $uyeof[$row->id];  // Özel Adet başı fiyat
$fiyat		= ($ofiyat == '') ? $row2->tutar : $ofiyat; // Özel Adet başı fiyat
$ozel		= ($ofiyat == '') ? 0 : 1; // Özel fiyat olup olmadığını kontrol ediyoruz...
$fiyat		= $gvn->para_int($fiyat); // Adet başı fiyat

/*
$min_cekim	= (($row2->min_adet * $fiyat) / 1000);
$min_cekim  = $gvn->para_int($min_cekim);

$max_cekim	= (($row2->max_adet * $fiyat) / 1000);
$max_cekim  = $gvn->para_int($max_cekim);
*/

?>
<tr>
<td><?=$i;?></td>
<td><?=$row2->baslik;?></td>
<? /*
<td><?=$gvn->para_str($min_cekim);?> <i class="fa fa-try"></i></td>
<td><?=$gvn->para_str($max_cekim);?> <i class="fa fa-try"></i></td>
*/ ?>
<td width="5%"><?=$row2->min_adet;?></td>
<td width="5%"><?=$row2->max_adet;?></td>
<td <?=($ozel == 1) ? 'data-toggle="tooltip" title="Size Özel Fiyat"': ''; ?>>1000 adeti <?=$gvn->para_str($fiyat);?> <i class="fa fa-try"></i></td>
</tr>
<?
}
?>
</tbody>
          </table>
<?php
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

 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://use.fontawesome.com/1d622557cb.js"></script>

<?php include "inc/footer.php"; ?>