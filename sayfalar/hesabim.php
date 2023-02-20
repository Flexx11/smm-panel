<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
include "inc/header.php";
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Hesap Ayarları
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

          <h4 class="heading">
            Hesap bilgilerinizi buradan düzenleyebilirsiniz.
          </h4>
		  
		  
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=hesabim" onsubmit="return false;" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label for="adsoyad" class="col-sm-3 control-label">Ad Soyad</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="adsoyad" name="adsoyad" value="<?=$hesap->adsoyad;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="username" class="col-sm-3 control-label">Kullanıcı Adı</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="username" name="username" disabled value="<?=$hesap->username;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">E-Posta</label>
                                            <div class="col-sm-9">
											<input type="email" class="form-control" id="email" name="email" value="<?=$hesap->email;?>" placeholder="">
                                        </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="password" class="col-sm-3 control-label">Yeni Şifreniz</label>
                                            <div class="col-sm-9">
											<input type="password" class="form-control" id="password" name="password" value="" placeholder="Değiştirecekseniz yazınız.">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="password_tekrar" class="col-sm-3 control-label">Yeni Şifreniz tekrar yazın</label>
                                            <div class="col-sm-9">
											<input type="password" class="form-control" id="password_tekrar" name="password_tekrar" value="" placeholder="Değiştirecekseniz yazınız.">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="telefon" class="col-sm-3 control-label">GSM</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="telefon" name="telefon" value="<?=$hesap->telefon;?>" placeholder="Örn: 0599 999 99 99">
                                        </div>
                                        </div>
										
										
										<div class="form-group">
                                         <label class="col-sm-3 control-label">Bildirimler</label>
                                         <div class="col-sm-9">
										 
										 <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="0" name="bildirim" <?=($hesap->bildirim == 0) ? 'checked' : ''; ?>>
                                        <label for="inlineRadio1">Açık</label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="1" name="bildirim" <?=($hesap->bildirim == 1) ? 'checked' : ''; ?>>
                                        <label for="inlineRadio2">Kapalı</label> <!--span style="margin-left:10px;font-size:13px;margin-top:5px;">(...)</span-->
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