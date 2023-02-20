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
          Site Ayarları
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

		  
		  
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=ayarlar" onsubmit="return false;" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="login_logo" class="col-sm-3 control-label">Giriş Logosu</label>
                                            <div class="col-sm-9">
											<input type="file" class="form-control" id="login_logo" name="login_logo">
											<br />
											<img src="img/<?=$ayarlar->login_logo;?>" id="login_logo_src" width="100" height="100" class="bg-success" />
											<p style="margin-left:10px;font-size:13px;margin-top:5px;">Yükleyeceğiniz görselin boyutları 100 x 100 px olmalıdır.</p>
                                        </div>
                                        </div> 
										
										<div class="form-group">
                                            <label for="index_logo" class="col-sm-3 control-label">Index Logosu</label>
                                            <div class="col-sm-9">
											<input type="file" class="form-control" id="index_logo" name="index_logo">
											<br />
											<img src="img/<?=$ayarlar->index_logo;?>" id="index_logo_src" width="193" height="60" class="bg-success" />
											<p style="margin-left:10px;font-size:13px;margin-top:5px;">Yükleyeceğiniz görselin boyutları 193 x 60 px olmalıdır.</p>
                                        </div>
                                        </div>
										
										
                                        <div class="form-group">
                                            <label for="site_adi" class="col-sm-3 control-label">Site Adı</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="site_adi" name="site_adi" value="<?=$ayarlar->site_adi;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="slogan" class="col-sm-3 control-label">Slogan</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="slogan" name="slogan" value="<?=$ayarlar->slogan;?>" placeholder="">
                                        </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="title" class="col-sm-3 control-label">Anasayfa Başlık (Title)</label>
											<div class="col-sm-9">
                                            <input type="text" class="form-control" id="title" name="title" value="<?=$ayarlar->title;?>">
                                        </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="keywords" class="col-sm-3 control-label">Anahtar Kelimeler (Keywords)</label>
                                            <div class="col-sm-9">
                                                <input name="keywords" id="keywords" class="form-control tags" value="<?=$ayarlar->keywords;?>">
                                        </div>
                                        </div>
										
										 <div class="form-group">
                                         <label for="description" class="col-sm-3 control-label">Site Açıklaması (Description)</label>
                                         <div class="col-sm-9">
										 <textarea class="form-control" rows="5" id="description" name="description"><?=$ayarlar->description;?></textarea>
                                         </div>
                                         </div>
										
										
										<div class="form-group">
                                            <label for="icerik1" class="col-sm-3 control-label">Banka Hesap Bilgileri</label>
                                            <div class="col-sm-9">
											<textarea class="form-control thetinymce" rows="10" id="icerik1" name="hesap_bilgileri" placeholder=""><? echo $ayarlar->hesap_bilgileri;?></textarea>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="icerik2" class="col-sm-3 control-label">Haber &amp; Duyurular</label>
                                            <div class="col-sm-9">
											<textarea class="form-control thetinymce" rows="10" id="icerik2" name="haber_duyuru" placeholder=""><? echo $ayarlar->haber_duyuru;?></textarea>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="icerik3" class="col-sm-3 control-label">S.S.S</label>
                                            <div class="col-sm-9">
											<textarea class="form-control thetinymce" rows="10" id="icerik3" name="sss" placeholder=""><? echo $ayarlar->sss;?></textarea>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="col-sm-12">
										<h3>Bildirim Ayarları</h3>
										<p>
										Yöneticiye ve Üyelere bildirim mesajları gönderir boş bırakırsanız bildirim göndermez!
										</p>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="bildirim_email" class="col-sm-3 control-label">Bildirim E-posta</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="bildirim_email" name="bildirim_email" value="<?=$ayarlar->bildirim_email;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="bildirim_gsm" class="col-sm-3 control-label">Bildirim GSM</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="bildirim_gsm" name="bildirim_gsm" value="<?=$ayarlar->bildirim_gsm;?>" placeholder="Örn: 5531231212">
                                        </div>
                                        </div> 
										
										
										<div class="form-group">
                                            <div class="col-sm-12">
										<h3>SMTP Mail Ayarları</h3>
										<p>
										Buraya mail hostunuzun bilgilerini giriniz. Bildirim ve hatırlatma için kullanılacaktır.
										</p>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="mail_host" class="col-sm-3 control-label">Host Adresi</label>
											<div class="col-sm-9">
                                            <input type="text" class="form-control" id="mail_host" name="mail_host" value="<?=$ayarlar->mail_host;?>" placeholder="Örn: mail.example.com">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="mail_port" class="col-sm-3 control-label">Port Numarası</label>
											<div class="col-sm-9">
                                            <input type="text" class="form-control" id="mail_port" name="mail_port" value="<?=$ayarlar->mail_port;?>">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="mail_secure" class="col-sm-3 control-label">Güvenli Bağlantı</label>
											<div class="col-sm-9">
                                            <select class="form-control" id="mail_secure" name="mail_secure">
											<option value="" <?=($ayarlar->mail_secure == '') ? 'selected' : '';?>>Yok</option>
											<option value="tls" <?=($ayarlar->mail_secure == 'tls') ? 'selected' : '';?>>TLS</option>
											<option value="ssl" <?=($ayarlar->mail_secure == 'ssl') ? 'selected' : '';?>>SSL</option>
											</select>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="mail_username" class="col-sm-3 control-label">Kullanıcı Adı(E-Posta)</label>
											<div class="col-sm-9">
                                            <input type="text" class="form-control" id="mail_username" name="mail_username" value="<?=$ayarlar->mail_username;?>" placeholder="Örn:noreplay@domain.com">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="mail_password" class="col-sm-3 control-label">Parola</label>
											<div class="col-sm-9">
                                            <input type="password" class="form-control" id="mail_password" name="mail_password" value="<?=$ayarlar->mail_password;?>">
                                        </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <div class="col-sm-12">
										<h3>Kampanya Ayarları</h3>
										<p>
										Eğer kutucuklara <strong>boş</strong> bırakırsanız bakiye yükle kısmında kampanyalar çıkmaz!
										<br />
										Lütfen tutarları noktasız ve virgülsüz şekilde giriniz sadece rakam olacak şekilde doldurunuz.
										</p>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                        <label class="col-sm-2 control-label">Kampanya 1</label>
										<div class="col-sm-3">
                                            <input type="text" class="form-control" id="kampanya1_tutar" name="kampanya1_tutar" value="<?=($ayarlar->kampanya1_tutar != 0) ? $ayarlar->kampanya1_tutar : '';?>" placeholder="Kampanya Tutarı">
											<br />
                                        </div>
										
										<div class="col-sm-3">
                                            <input type="text" class="form-control" id="kampanya1_hediye" name="kampanya1_hediye" value="<?=($ayarlar->kampanya1_hediye != 0) ? $ayarlar->kampanya1_hediye : '';?>" placeholder="Kampanya Hediye Tutarı">
											<br />
                                        </div>
										
                                        </div>
										
										
										<div class="form-group">
                                        <label class="col-sm-2 control-label">Kampanya 2</label>
										<div class="col-sm-3">
                                            <input type="text" class="form-control" id="kampanya2_tutar" name="kampanya2_tutar" value="<?=($ayarlar->kampanya2_tutar != 0) ? $ayarlar->kampanya2_tutar : '';?>" placeholder="Kampanya Tutarı">
											<br />
                                        </div>
										
										<div class="col-sm-3">
                                            <input type="text" class="form-control" id="kampanya2_hediye" name="kampanya2_hediye" value="<?=($ayarlar->kampanya2_hediye != 0) ? $ayarlar->kampanya2_hediye : '';?>" placeholder="Kampanya Hediye Tutarı">
											<br />
                                        </div>
										
                                        </div>
										
										
										<div class="form-group">
                                        <label class="col-sm-2 control-label">Kampanya 3</label>
										<div class="col-sm-3">
                                            <input type="text" class="form-control" id="kampanya3_tutar" name="kampanya3_tutar" value="<?=($ayarlar->kampanya3_tutar != 0) ? $ayarlar->kampanya3_tutar : '';?>" placeholder="Kampanya Tutarı">
											<br />
                                        </div>
										
										<div class="col-sm-3">
                                            <input type="text" class="form-control" id="kampanya3_hediye" name="kampanya3_hediye" value="<?=($ayarlar->kampanya3_hediye != 0) ? $ayarlar->kampanya3_hediye : '';?>" placeholder="Kampanya Hediye Tutarı">
											<br />
                                        </div>
										
                                        </div>
										
										
                                        
									<div align="right">
                                        <button type="submit" class="btn btn-secondary" onclick=" AjaxFormS2('forms','form_status',1);">Güncelle</button>
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