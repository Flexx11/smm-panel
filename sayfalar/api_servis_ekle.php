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
        Api Servis Ekle
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

          
		  
		  
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=api_servis_ekle" onsubmit="return false;" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="api_id" class="col-sm-3 control-label">Api Seç</label>
                                            <div class="col-sm-9">
											<select class="form-control" id="api_id" name="api_id">
											<option value="">Seçiniz</option>
											<?php
											$select	= $db->query("SELECT * FROM apiler ORDER BY id DESC");
											while($row=$select->fetch(PDO::FETCH_OBJ)){
											?><option value="<?=$row->id;?>"><?=$row->adi;?></option><?
											}
											?>
											</select>
                                        </div>
                                        </div>
										
										
                                        <div class="form-group">
                                            <label for="adi" class="col-sm-3 control-label">Adı</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="adi" name="adi" value="" placeholder="">
                                        </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <label for="servis_no" class="col-sm-3 control-label">Servis No</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="servis_no" name="servis_no" value="" placeholder="Örn: 1">
                                        </div>
                                        </div>
										
							
			
                                        
									<div align="right">
                                        <button type="submit" class="btn btn-secondary" onclick=" AjaxFormS('forms','form_status');">Ekle</button>
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