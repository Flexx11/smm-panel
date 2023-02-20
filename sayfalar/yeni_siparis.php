<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }

include "inc/header.php";

?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
         Yeni Sipariş Geç
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
	
	
            <div class="col-md-10 col-md-push-1">

              <div class="row">
                
				
                
              
                  
              </div> <!-- /.row -->


	</div><!-- /.col-md -->
	</div><!-- /.row -->
	



      <div class="row"><!-- /.col -->
		

        <div class="col-md-6 col-md-offset-3" id="SiparisFormuDiv">
          <h4 class="heading" style="text-align:center">
           Sipariş Ver
          </h4>
		  
		  
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=siparis_ver" onsubmit="return false;" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label for="kategori_id" class="col-sm-3 control-label">Kategori Seçin</label>
                                            <div class="col-sm-9">
											<select class="form-control" name="kategori_id" id="kategori_id" onchange="urunler_getir(this.options[this.selectedIndex].value);">
											<option value="">Seçiniz</option>
											<?php
											$sql		= $db->query("SELECT DISTINCT kategoriler.id,kategoriler.baslik FROM kategoriler INNER JOIN urunler ON kategoriler.id=urunler.kategori_id WHERE kategoriler.durum=0 AND urunler.durum=0 ORDER BY kategoriler.sira ASC");
											while($row	= $sql->fetch(PDO::FETCH_OBJ)){
											?><option value="<?=$row->id;?>"><?=$row->baslik;?></option><?
											}
											?>
											</select>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="urunler" class="col-sm-3 control-label">Ürün Seçin</label>
                                            <div class="col-sm-9">
											<select class="form-control" id="urunler" name="urun_id" onchange="ajaxHere('ajax.php?do=baglanti_miktar&id='+this.options[this.selectedIndex].value,'baglanti_miktar'); $('#baglanti_miktar').fadeIn(500);">
											<option value="">Önce Kategori Seçiniz...</option>
											</select>
                                        </div>
                                        </div>
										
										<div id="baglanti_miktar"></div>
										

									
									<div id="form_status"></div>
									
									</form>
									 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
									<script type="text/javascript">
									function urunler_getir(kategori){
									ajaxHere('ajax.php?do=urunler&kategori_id='+kategori,'urunler');
									$('#baglanti_miktar').fadeOut(500);
									}
									function isNumberKey(evt)
									{
									var value = $(this).index()
									var charCode = (evt.which) ? evt.which : event.keyCode;
									if (charCode > 31 && (charCode < 48 || charCode > 57))
									return false;
									return true;
									}


									$(document).on('change', '#miktar' ,function(){
										var urun = $("#urunler").val();
										var miktar = $("#miktar").val();
										ajaxHere('ajax.php?do=fiyat&urun='+urun+'&miktar='+miktar,'tutar');
									});
									</script>
		  
		  
        </div> <!-- /.col -->

        <div class="col-md-6 col-md-offset-3" id="SiparisTamam" style="display: none;">
        	<div class="alert alert-success">
			  <div style="margin-bottom:10px;text-align:center;">
				<i style="font-size:80px;color:green;" class="fa fa-check"></i>
				<h2 style="color:green;font-weight:bold;">İşleminiz Tamamlandı</h2>
				<br/>
				<h4>Siparişiniz oluşturuldu.</h4>
				<h4>Sipariş No : <span id="spno"></span></h4>
				<h4>Ürün : <span id="urun"></span></h4>
				<h4>Bağlantı : <span id="bglnt"></span></h4>
				<h4>Miktar : <span id="mktr"></span></h4>
				</div>
			</div>
        </div>

		<div class="col-md-6 col-md-offset-3" style="display:none;" id="SiparisTamams">
		<div style="margin-bottom:10px;text-align:center;">
		<i style="font-size:80px;color:green;" class="fa fa-check"></i>
		<h2 style="color:green;font-weight:bold;">İşleminiz Tamamlandı</h2>
		<br/>
		<h4>Siparişiniz kontrol edilip daha sonra onaylanacaktır.</h4>
		</div>
		</div> <!-- /.col -->
		

      </div> <!-- /.row -->




    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div> <!-- /.container -->
<?php include "inc/footer.php"; ?>