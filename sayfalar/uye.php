<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }

if($hesap->tipi != 1){
header("Location:index.php");
die();
}

include "inc/header.php"; 

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM uyeler WHERE id=? AND tipi=0 ");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
header("Location:index.php?do=uyeler");
die(); exit;
}


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

      

      <br>
    
      <div class="row"><!-- /.col -->

        <div class="col-md-6 col-md-offset-3">

		  
		  
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=uye_duzenle&id=<?=$snc->id;?>" onsubmit="return false;" enctype="multipart/form-data">
                                        
										<div class="form-group">
                                            <label class="col-sm-3 control-label">Oluşt. Tarihi</label>
                                            <div class="col-sm-9">
											<? echo date("d.m.Y H:i",strtotime($snc->olusturma_tarih)); ?>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-3 control-label">Son Giriş Tarihi</label>
                                            <div class="col-sm-9">
											<? echo date("d.m.Y H:i",strtotime($snc->son_giris_tarih)); ?>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-3 control-label">IP Adresi</label>
                                            <div class="col-sm-9">
											<? echo $snc->ip; ?>
                                        </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label for="adsoyad" class="col-sm-3 control-label">Ad Soyad</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="adsoyad" name="adsoyad" value="<?=$snc->adsoyad;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="username" class="col-sm-3 control-label">Kullanıcı Adı</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="username" name="username"  value="<?=$snc->username;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">E-Posta</label>
                                            <div class="col-sm-9">
											<input type="email" class="form-control" id="email" name="email" value="<?=$snc->email;?>" placeholder="">
                                        </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="password" class="col-sm-3 control-label">Şifre</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="password" name="password" value="<?=$snc->password;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="telefon" class="col-sm-3 control-label">GSM</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="telefon" name="telefon" value="<?=$snc->telefon;?>" placeholder="Örn: 0599 999 99 99">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="bakiye" class="col-sm-3 control-label">Bakiye</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="bakiye" name="bakiye" value="<?=$gvn->para_str($snc->bakiye);?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                         <label for="permalink" class="col-sm-3 control-label">Hesap Durumu:</label>
                                         <div class="col-sm-9">
										 
										 <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="0" name="durum" <?=($snc->durum == 0) ? 'checked' : '';?> >
                                        <label for="inlineRadio1">Açık</label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="1" name="durum" <?=($snc->durum == 1) ? 'checked' : '';?> >
                                        <label for="inlineRadio2">Kapalı</label>
                                    </div>
									
										
                                         </div>
                                    </div>
			
			
			<div class="form-group">
			<div class="col-sm-12">
			<h2>Üyeye Özel Fiyatlandırma</h2>
			<p>Ürünlere fiyat belirlerken lütfen 1000x adete göre fiyat giriniz!</p>
			</div>
			</div>
			
			<?php
			 $ofiyatlar	= json_decode(base64_decode($snc->ozel_fiyatlar),1);
			 $query		= $db->query("SELECT * FROM urunler ORDER BY id ASC");
			 while($row	= $query->fetch(PDO::FETCH_OBJ)){
			 $tutar		= $ofiyatlar[$row->id];
			 ?>
			<div class="form-group">
				<div class="col-sm-10">
				<? echo $row->baslik;?>
				</div>
				
				<div class="col-sm-2">
				<input class="form-control" type="text" name="urunler[<?=$row->id;?>]" value="<?=($tutar != '') ? $gvn->para_str($tutar) : '';?>" />
				</div>
				</div>
			<?
			}
			?>
									
                                        
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