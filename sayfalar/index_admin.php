<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }

include "inc/header.php";

?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Üye Düzenle
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

<div class="row">
<div class="col-md-12">
<div align="center">
<center>LİSANS;</center>
<center>SINIRSIZ!</center>

<hr />
</div>
</div>
</div>

	<div class="row">
	
            <div class="col-md-10 col-md-push-1">

              <div class="row">
                
				
				<?php
				$toplmkznc	= $db->query("SELECT SUM(tutar) as tutar FROM bakiyeler WHERE durum=1")->fetch(PDO::FETCH_OBJ)->tutar;
				?>
                <div class="col-md-4 col-sm-6">
                  <div class="pricing-plan pricing-plan-secondary">
                    <div class="pricing-plan-header">
                      <h2 class="pricing-plan-title">TOPLAM KAZANÇ</h2>
                      <span class="pricing-plan-price" style="font-size:50px"><?=$gvn->para_str($toplmkznc);?> <i class="fa fa-try"></i>
				 </div> <!-- /.pricing-header -->
				 </div> <!-- /.pricing -->
                </div> <!-- /.col -->
				
				<?php
				$topsp		= $db->query("SELECT COUNT(id) as count FROM siparisler WHERE durum=1 ")->fetch(PDO::FETCH_OBJ)->count;
				?>
				<div class="col-md-4 col-sm-6">
                  <div class="pricing-plan pricing-plan-tertiary">
                    <div class="pricing-plan-header">
                      <h2 class="pricing-plan-title">TOPLAM SİPARİŞ</h2>
                      <span class="pricing-plan-price" style="font-size:50px"><?=$topsp;?> <i class="fa fa-shopping-cart"></i>

				 </div> <!-- /.pricing-header -->
				 </div> <!-- /.pricing -->
                </div> <!-- /.col -->
				
				
				<?php
				$topuye		= $db->query("SELECT COUNT(id) as cnt FROM uyeler ")->fetch(PDO::FETCH_OBJ)->cnt;
				?>
				<div class="col-md-4 col-sm-6">
                  <div class="pricing-plan">
                    <div class="pricing-plan-header">
                      <h2 class="pricing-plan-title">TOPLAM ÜYE</h2>
                      <span class="pricing-plan-price" style="font-size:50px"><?=$topuye;?> <i class="fa fa-group"></i>
				 </div> <!-- /.pricing-header -->
				 </div> <!-- /.pricing -->
                </div> <!-- /.col -->

        <?php
        $bugun = date("Y-m-d");
        $bgk   = $db->query("SELECT sum(toplam_tutar) as cnt FROM siparisler where date(tarih) = '$bugun'")->fetch(PDO::FETCH_OBJ)->cnt;
        ?>
        <div class="col-md-4 col-sm-6">
                  <div class="pricing-plan">
                    <div class="pricing-plan-header">
                      <h2 class="pricing-plan-title">BUGÜNKÜ KAZANÇ</h2>
                      <span class="pricing-plan-price" style="font-size:50px"><?=$bgk;?> <i class="fa fa-try"></i>
         </div> <!-- /.pricing-header -->
         </div> <!-- /.pricing -->
                </div> <!-- /.col -->


        <?php
        $bgk   = $db->query("SELECT count(id) as cnt FROM siparisler where date(tarih) = '$bugun'")->fetch(PDO::FETCH_OBJ)->cnt;
        ?>
        <div class="col-md-4 col-sm-6">
                  <div class="pricing-plan">
                    <div class="pricing-plan-header">
                      <h2 class="pricing-plan-title">BUGÜNKÜ SİPARİŞLER</h2>
                      <span class="pricing-plan-price" style="font-size:50px"><?=$bgk;?> <i class="fa fa-shopping-cart"></i>
         </div> <!-- /.pricing-header -->
         </div> <!-- /.pricing -->
                </div> <!-- /.col -->

        <?php
        $bgk   = $db->query("SELECT count(id) as cnt FROM uyeler where date(olusturma_tarih) = '$bugun'")->fetch(PDO::FETCH_OBJ)->cnt;
        ?>
        <div class="col-md-4 col-sm-6">
                  <div class="pricing-plan">
                    <div class="pricing-plan-header">
                      <h2 class="pricing-plan-title">BUGÜNKÜ ÜYELER</h2>
                      <span class="pricing-plan-price" style="font-size:50px"><?=$bgk;?> <i class="fa fa-users"></i>
         </div> <!-- /.pricing-header -->
         </div> <!-- /.pricing -->
                </div> <!-- /.col -->
				
        <?php
        $bgk   = $db->query("SELECT sum(bakiye) as cnt FROM uyeler")->fetch(PDO::FETCH_OBJ)->cnt;
        ?>
        <div class="col-md-4 col-sm-6">
                  <div class="pricing-plan">
                    <div class="pricing-plan-header">
                      <h2 class="pricing-plan-title">TOPLAM BAKİYE</h2>
                      <span class="pricing-plan-price" style="font-size:50px"><?=$bgk;?> <i class="fa fa-try"></i>
         </div> <!-- /.pricing-header -->
         </div> <!-- /.pricing -->
                </div> <!-- /.col -->
        <!-- Toplam Kazanç - Toplam Sipariş - Toplam Üye -  -->

                  
              </div> <!-- /.row -->


	</div><!-- /.col-md -->
	</div><!-- /.row -->
	




    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div> <!-- /.container -->
<?php include "inc/footer.php"; ?>