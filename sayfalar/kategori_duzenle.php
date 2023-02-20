<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }

if($hesap->tipi != 1){
header("Location:index.php");
die();
}

include "inc/header.php";

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM kategoriler WHERE id=?");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
header("Location:index.php?do=kategoriler");
die(); exit;
}


?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Kategori Düzenle
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

		  
		  
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=kategori_duzenle&id=<?=$snc->id;?>" onsubmit="return false;" enctype="multipart/form-data">
                                        
										<div class="form-group">
                                            <label for="baslik" class="col-sm-3 control-label">Başlık</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="baslik" name="baslik" value="<?=$snc->baslik;?>" placeholder="">
                                        </div>
                                        </div>
										
                    <div class="form-group">
                                            <label for="baslik" class="col-sm-3 control-label">icon</label>
                                            <div class="col-sm-9">
                      <input type="text" class="form-control" id="icon" name="icon" value="<?=$snc->icon;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="sira" class="col-sm-3 control-label">Sıra</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="sira" name="sira" value="<?=$snc->sira;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                         <label for="permalink" class="col-sm-3 control-label">Sipariş Durumu:</label>
                                         <div class="col-sm-9">
										 
										 <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio3" value="0" name="durum" <?=($snc->durum == 0) ? 'checked' : '';?> >
                                        <label for="inlineRadio3">Açık</label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio4" value="1" name="durum" <?=($snc->durum == 1) ? 'checked' : '';?> >
                                        <label for="inlineRadio4">Kapalı</label>
                                    </div>
									
										
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