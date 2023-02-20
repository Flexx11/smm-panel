<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }

if($hesap->tipi != 1){
header("Location:index.php");
die();
}

include "inc/header.php";

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM apiler WHERE id=?");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
header("Location:index.php?do=apiler");
die(); exit;
}


?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
         Api Düzenle
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

		  
		  
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=api_duzenle&id=<?=$snc->id;?>" onsubmit="return false;" enctype="multipart/form-data">
                                        
										 <div class="form-group">
                                            <label for="adi" class="col-sm-3 control-label">Api Adı</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="adi" name="adi" value="<?=$snc->adi;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="url" class="col-sm-3 control-label">Api URL</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="url" name="url" value="<?=$snc->url;?>" placeholder="örnek: http://domain/api/v2">
                                        </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="key" class="col-sm-3 control-label">Api Key</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="key" name="key" value="<?=$snc->keyy;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="secret" class="col-sm-3 control-label">Api Secret</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="secret" name="secret" value="<?=$snc->secret;?>" placeholder="Gerekli ise isteniyor ise ekleyiniz">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="username" class="col-sm-3 control-label">Api Username</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="username" name="username" value="<?=$snc->username;?>" placeholder="Gerekli ise isteniyor ise ekleyiniz">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="password" class="col-sm-3 control-label">Api Password</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="password" name="password" value="<?=$snc->password;?>" placeholder="Gerekli ise isteniyor ise ekleyiniz">
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