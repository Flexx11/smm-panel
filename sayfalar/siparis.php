<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
include "inc/header.php";

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM siparisler WHERE id=? ");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
  header("Location:index.php?do=siparisler"); 
  die(); exit;
}

$gonderen	= $db->query("SELECT adsoyad,id FROM uyeler WHERE id=".$snc->acid)->fetch(PDO::FETCH_OBJ);
$urun		= $db->query("SELECT id,baslik,api_id,api_servis FROM urunler WHERE id=".$snc->urun_id)->fetch(PDO::FETCH_OBJ);
if($urun->api_id != 0){
  $db_api		= $db->query("SELECT url,keyy FROM apiler WHERE id=".$urun->api_id)->fetch(PDO::FETCH_OBJ);
  $api		= new Api($db_api->url,$db_api->keyy);
}

if($hesap->tipi != 1){
  if($snc->acid != $hesap->id){
    header("Location:index.php?do=siparisler");
    die(); exit;
  }
}



?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Sipariş Detay
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

                  <div class="col-md-8 col-md-offset-4">

                    <style type="text/css">
                    .yorum {
                     float: left;
                     width: 75%;
                     background-color: #fffcc6;
                     padding-top: 10px;
                     padding-right: 10px;
                     padding-bottom: 10px;
                     padding-left: 20px;
                     -webkit-border-radius: 4px;
                     -moz-border-radius: 4px;
                     border-radius: 4px;
                     box-shadow: 0px 0px 15px #e3de88;
                     margin-bottom: 20px;
                   }
                   .yorum h3 {
                    float: left;
                    width: 22%;
                    margin-right: 10px;
                    color: #aa6000;
                    font-size: 16px;
                    margin-top:0px;
                    line-height:normal;
                  }
                  .yorum h3 span {
                    font-size: 14px;
                  }
                  .yorum h4 {
                    float: right;
                    color: #403D00;
                    font-size: 15px;
                    width: 73%;
                    line-height:20px;
                  }
                  #admincevap {
                   background-color: #DDF9FF;
                   box-shadow: 0px 0px 15px #91c9d5;
                   margin-left: 70px;
                 }
                 #admincevap h3 {
                   color: #00829D;
                   width: 150px;
                 }
                 #admincevap h3 span {
                   color: #00829D;
                 }
                 #admincevap h4 {
                   color: #00728A;
                 }
               </style>

               <table width="75%" border="0">
                <tbody>

                 <? if($hesap->tipi == 1){?>
                 <tr>
                  <td width="25%" height="30"><strong>Üye</strong></td>
                  <td width="65%" height="30">: <? echo $gonderen->adsoyad; ?></td>
                </tr>
                <? } ?>

                <tr>
                  <td width="25%" height="30"><strong>Ürün</strong></td>
                  <td width="65%" height="30">: <?=$urun->baslik;?></td>
                </tr>


                <tr>
                  <td width="25%" height="30"><strong>Bağlantı</strong></td>
                  <td width="65%" height="30"> <input class="form-control" type="text" value="<?=$snc->baglanti; ?>" id="baglanti" <?=($snc->durum != 0 OR $hesap->tipi != 1) ? 'disabled' : '';?> size="50" style="" /><br /></td>
                </tr>

                <tr>
                  <td width="25%" height="30"><strong>Toplam Tutar</strong></td>
                  <td width="65%" height="30"><input class="form-control" type="text" value="<?=$gvn->para_str($snc->toplam_tutar); ?>" id="toplam_tutar" <?=($snc->durum != 0 OR $hesap->tipi != 1) ? 'disabled' : '';?> style="text-align:center; width:100px; float:none;" /><br /></td>
                </tr>

                <? if(($snc->durum == 1 AND $hesap->tipi == 0 AND $urun->api_id == 0) OR ($hesap->tipi == 1 AND $urun->api_id == 0)){ ?>
                <tr>
                  <td width="25%" height="30"><strong>Başlangıç Sayısı</strong></td>
                  <td width="65%" height="30"><input class="form-control" type="text" value="<?=$snc->start_count; ?>" id="start_count" <?=($snc->durum != 0 OR $hesap->tipi != 1) ? 'disabled' : '';?> style="text-align:center; width:100px; float:none;" /><br /></td> 
                </tr>
                <? } ?>

                <tr>
                  <td width="25%" height="30"><strong>Miktar</strong></td>
                  <td width="65%" height="30"><input class="form-control" type="text" value="<?=$snc->miktar; ?>" id="miktar" <?=($snc->durum != 0 OR $hesap->tipi != 1) ? 'disabled' : '';?> style="text-align:center; width:100px;" /><br /></td>
                </tr>

                <tr>
                  <td height="30"><strong>Oluşturma Tarihi</strong></td>
                  <td height="30">: <?=date('d.m.Y - H:i',strtotime($snc->tarih));?></td>
                </tr>

                <tr>
                  <td height="30"><strong>Durum</strong></td>
                  <td height="30">: <?php
                  if($snc->durum == 0){
                    ?><strong style="color:#36F">Bekleniyor</strong><?
                  }elseif($snc->durum == 1){
                    ?><strong style="color:green">Tamamlandı</strong><?
                  }elseif($snc->durum == 2){
                    ?><strong style="color: red">İptal Edildi</strong><?
                  }elseif($snc->durum == 3){
                    ?><strong style="color: #ce1af2">Kısmen Tamamlandı</strong><?
                  }
                  ?></td>
                </tr>
                <?php if($snc->durum == 3){ ?>
                <tr>
                  <td height="30"><strong>İade Bilgisi</strong></td> 
                  <td height="30">: <?=$snc->iade?> adet için <?=$snc->iade_tutar?> TL iade edildi.</td> 
                </tr>
                <?php } ?>


              </tbody></table>
              <div style="clear:both;"></div>
              <br />

              <? 
              if( $urun->api_id != 0){ ?>
              <h3>Sipariş Durumu</h3>
              <hr />
              <? 
              if($snc->adurum == 0){
                ?>
                <p>Sipariş henüz hazırlanmaktadır bekleyiniz.</p>
                <?
              }elseif($snc->adurum == 1){
                $status 	= $api->status($snc->oid);
                $baslangic	= $status->start_count;
                $kalan		= $status->remains;
                $masraf		= $status->charge;
                $hata		= $status->error;
                $sonuc		= $status->status;

                ?><div class="row">

                  <div class="col-md-3">
                    <br />
                    <h4 style="font-size:20px; color:#3E4D4D;">BAŞLAMA</h4>
                    <hr />
                    <strong style="font-size:30px;"><?=($hata != '') ? '0' : $baslangic;?></strong>
                  </div>
                  <div class="col-md-3">
                    <br />
                    <h4 style="font-size:20px; color:#3E4D4D;">KALAN</h4>
                    <hr />
                    <strong style="font-size:30px;"><?=($hata != '') ? '0' : $kalan;?></strong>
                  </div>

                  <div class="col-md-6">
                    <br />
                    <h4 style="font-size:20px; color:#3E4D4D;">DURUM</h4>
                    <hr />
                    <? if($hata != ''){ ?>
                    <strong style="color:#BD4B46; font-size:30px;"><i class="fa fa-exclamation-triangle"></i> API ÇALIŞMIYOR!</strong>
                    <? }elseif($sonuc == 'Pending'){ ?>
                    <strong style="color:#656A1A; font-size:30px;"><i class="fa fa-clock-o"></i> BEKLENİYOR</strong>
                    <? }elseif($sonuc == 'Processing'){ ?>
                    <strong style="color:#656A1A; font-size:30px;"><i class="fa fa-clock-o"></i> İŞLEME ALINDI</strong>
                    <? }elseif($sonuc == 'Completed'){ ?>
                    <strong style="color:#115723; font-size:30px;"><i class="fa fa-check"></i> TAMAMLANDI</strong>
                    <? }elseif($sonuc == 'Partial'){ ?>
                    <strong style="color:#115723; font-size:27px;"><i class="fa fa-check"></i> KISMEN TAMAMLANDI</strong>
                    <? }else{ ?>
                    <strong style="color:#BD4B46; font-size:30px;"><i class="fa fa-exclamation-triangle"></i> <?=$sonuc;?></strong>
                    <? } ?>

                  </div>

                </div>
                <? 
              } ?>

              <? 
            } ?>

            <? if($snc->durum == 1 AND $urun->api_id != 0 AND $snc->adurum == 2){ ?>
            <? if($hesap->tipi == 1){ ?>
            <p>
              Sipariş apiye iletildi fakat bir hata alındı hata metini; <br /> <strong><?=$snc->aresponse;?></strong>
              <hr />
              <button type="button" class="btn btn-info" style="" onClick="tekrar_kontrol();"><i class="fa fa-refresh"></i> Tekrar Kontrol Edilsin!</button>
              <br />
            </p>
            <? }else{ ?>
            <p>
              <strong style="color:red; font-size:18px;">Siparişiniz hazırlanamıyor! Yetkililere bildiriniz.</strong>
            </p>
            <? } ?>

            <? } ?>

            <? if($snc->durum == 0 AND $hesap->tipi == 1){ ?>

            <div class="row">
              <div class="col-md-3">
                <button type="button" class="btn btn-success" style="" onClick="talep_onayla();">Siparişi Onayla</button>
                <br />
                <br />
              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-danger" style="" onClick="talep_reddet();">Siparişi İptal Et!</button>
                <br />
              </div>
            </div>
            <? } ?>

            <div id="snc_status"></div>

            <script type="text/javascript">
              function talep_reddet(){
                if(confirm('Sipariş iptal edilecektir. Yapmak istiyor musunuz?')){
                  ajaxHere('ajax.php?do=siparis_reddet&id=<?=$snc->id;?>','snc_status');
                }
              }

              function tekrar_kontrol(){
                if(confirm('Sipariş apiye tekrar talep gönderecektir. Yapmak istiyor musunuz?')){
                  ajaxHere('ajax.php?do=siparis_api_tekrar&id=<?=$snc->id;?>','snc_status');
                }
              }

              function talep_onayla(){
                if(confirm('Sipariş onaylanacaktır. Yapmak istiyor musunuz?')){
                  var baglanti = $("#baglanti").val();
                  var toplam_tutar = $("#toplam_tutar").val();
                  var start_count = $("#start_count").val();
                  var miktar = $("#miktar").val();
                  ajaxHere('ajax.php?do=siparis_onayla&id=<?=$snc->id;?>&miktar='+miktar+'&toplam_tutar='+toplam_tutar+'&start_count='+start_count+'&baglanti='+baglanti,'snc_status');
                }
              }
            </script>	




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

  <? #include "inc/footer.php"; ?>