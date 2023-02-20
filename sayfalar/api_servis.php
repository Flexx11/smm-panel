<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }

if($hesap->tipi != 1){
header("Location:index.php");
die();
}

include "inc/header.php";

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM api_servisler WHERE id=?");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
header("Location:index.php?do=api_servisler");
die(); exit;
}


?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
         Api Servisi Düzenle
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

        <div class="col-md-6 col-md-offset-3">

		  
		  
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=api_servis_duzenle&id=<?=$snc->id;?>" onsubmit="return false;" enctype="multipart/form-data">
                                        
									<div class="form-group">
                                            <label for="api_id" class="col-sm-3 control-label">Api Seç</label>
                                            <div class="col-sm-9">
											<select class="form-control" id="api_id" name="api_id">
											<option value="">Seçiniz</option>
											<?php
											$select	= $db->query("SELECT * FROM apiler ORDER BY id DESC");
											while($row=$select->fetch(PDO::FETCH_OBJ)){
											?><option value="<?=$row->id;?>" <?=($row->id == $snc->api_id) ? 'selected' : '';?>><?=$row->adi;?></option><?
											}
											?>
											</select>
                                        </div>
                                        </div>
										
										
                                        <div class="form-group">
                                            <label for="adi" class="col-sm-3 control-label">Adı</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="adi" name="adi" value="<?=$snc->adi;?>" placeholder="">
                                        </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <label for="servis_no" class="col-sm-3 control-label">Servis No</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="servis_no" name="servis_no" value="<?=$snc->servis_no;?>" placeholder="Örn: 1">
                                        </div>
                                        </div>
										
                                        
									<div align="right">
                                        <button type="submit" class="btn btn-secondary" onclick=" AjaxFormS('forms','form_status');">Güncelle</button>
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