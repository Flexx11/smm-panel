<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }

if($hesap->tipi != 1){
header("Location:index.php");
die();
}

include "inc/header.php";

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM urunler WHERE id=?");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
header("Location:index.php?do=urunler");
die(); exit;
}


?>
<div class="container">

  <div class="content">

    <div class="content-container">

      

      <div class="content-header">
        <h2 class="content-header-title">Ürün Düzenle</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Anasayfa</a></li>
          <li><a href="index.php?do=urunler">Ürünler</a></li>
          <li class="active">Ürün Düzenle</li>
        </ol>
      </div> <!-- /.content-header -->

      

      <br>
    
      <div class="row"><!-- /.col -->

        <div class="col-md-6 col-md-offset-3">

		  
		  
                                    <form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?do=urun_duzenle&id=<?=$snc->id;?>" onsubmit="return false;" enctype="multipart/form-data">
                                        
										 <div class="form-group">
                                            <label for="baslik" class="col-sm-3 control-label">Başlık</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="baslik" name="baslik" value="<?=$snc->baslik;?>" placeholder="">
                                        </div>
                                        </div>

                    <div class="form-group">
                                            <label for="aciklama" class="col-sm-3 control-label">Açıklama</label>
                                            <div class="col-sm-9">
                      <textarea class="form-control" id="aciklama" name="aciklama"><?=$snc->aciklama;?></textarea>
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="baglanti_value" class="col-sm-3 control-label">Bağlantı Örnek gösterim</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="baglanti_value" name="baglanti_value" value="<?=$snc->baglanti_value;?>" placeholder="örnek: http://www.twitter.com/<username>">
                                        </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="sira" class="col-sm-3 control-label">Sıra</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="sira" name="sira" value="<?=$snc->sira;?>" placeholder="">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="kategori_id" class="col-sm-3 control-label">Kategori</label>
                                            <div class="col-sm-9">
											<select class="form-control" id="kategori_id" name="kategori_id">
											<option value="">Seçiniz</option>
											<?php
											$optn		= $db->query("SELECT baslik,id FROM kategoriler ORDER BY sira ASC")->fetchAll();
											foreach($optn as $kat){
											?><option value="<?=$kat['id'];?>" <?=($kat['id'] == $snc->kategori_id) ? 'selected' : '';?>><?=$kat['baslik'];?></option><?
											}
											?>
											</select>
                                        </div>
                                        </div> 
										
										<div class="form-group">
                                            <label class="col-sm-3 control-label">Kaç Adet</label>
                                            <div class="col-sm-3">
											<input type="text" class="form-control" name="min_adet" value="<?=$snc->min_adet;?>" placeholder="Min Adet">
                                        </div>
										
										 <div class="col-sm-3">
											<input type="text" class="form-control" name="max_adet" value="<?=$snc->max_adet;?>" placeholder="Max Adet">
                                        </div>
										
                                        </div>
										
										<div class="form-group">
                                            <label for="tutar" class="col-sm-3 control-label">1.000x Fiyat</label>
                                            <div class="col-sm-9">
											<input type="text" class="form-control" id="tutar" name="tutar" value="<?=$gvn->para_str($snc->tutar);?>" placeholder="Örn: 10,00">
                                        </div>
                                        </div>
										
										<div class="form-group">
                                         <label class="col-sm-3 control-label">Bağlantı Url Kontrolü:</label>
                                         <div class="col-sm-9">
										 
										 <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" name="baglanti_url_check" <?=($snc->baglanti_url_check == 1) ? 'checked' : ''; ?>>
                                        <label for="inlineRadio1">Açık</label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" id="inlineRadio2" value="0" name="baglanti_url_check" <?=($snc->baglanti_url_check == 0) ? 'checked' : ''; ?>>
                                        <label for="inlineRadio2">Kapalı</label> <!--span style="margin-left:10px;font-size:13px;margin-top:5px;">(...)</span-->
                                    </div>
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
									
									
									<div class="form-group">
                                            <label for="api_id" class="col-sm-3 control-label">Api Seç</label>
                                            <div class="col-sm-9">
											<select class="form-control" id="api_id" name="api_id" onchange="ajaxHere('ajax.php?do=api_servisler&api_id='+this.options[this.selectedIndex].value,'api_servis');">
											<option value="">Seçiniz</option>
											<option value="0" <?=($snc->api_id == 0) ? 'selected' : '';?>>Yok</option>
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
                                            <label for="api_servis" class="col-sm-3 control-label">Api Servisi Seç</label>
                                            <div class="col-sm-9">
											<select class="form-control" id="api_servis" name="api_servis">
											<option value="">Seçiniz</option>
											<option value="0" <?=($snc->api_servis == 0) ? 'selected' : '';?>>Yok</option>
											<?php
											$select	= $db->query("SELECT * FROM api_servisler WHERE api_id=".$snc->api_id." ORDER BY id DESC");
											while($row=$select->fetch(PDO::FETCH_OBJ)){
											?><option value="<?=$row->id;?>" <?=($row->id == $snc->api_servis) ? 'selected' : '';?>><?=$row->adi;?></option><?
											}
											?>
											</select>
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