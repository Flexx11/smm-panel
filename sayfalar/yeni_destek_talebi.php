<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
include "inc/header.php";
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Yeni Destek Talebi Oluştur
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
      
      

      <br><center>
    
      <div class="row"><!-- /.col -->

        <div class="col-md-12">

          <h4 class="heading">
          Siparişiniz için veya farklı bir konuda bilgi almak için destek sistemimizi kullanın.
          </h4>
		  
		  
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=yeni_destek_talebi" onsubmit="return false;" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label for="konu" class="col-sm-3 control-label">Konu</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="konu" name="konu" value="" placeholder="">
                                        </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <label for="mesaj" class="col-sm-3 control-label">Mesajınız</label>
                                            <div class="col-sm-9">
											<textarea class="form-control" rows="10" id="mesaj" name="mesaj" placeholder="Buraya bir şeyler yazın..."></textarea>
                                        </div>
                                        </div>
										
										
										
                                        
									<div align="right">
                                        <button type="submit" class="btn btn-secondary" onclick=" AjaxFormS('forms','form_status');">Gönder</button>
                                    </div>
									
									<div id="form_status"></div>
									
									</form>
		  
		  
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