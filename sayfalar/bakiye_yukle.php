<?php if($hesap->id == ""){ header("location:index.php?do=giris"); die(); }
include "inc/header.php";
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Bakiye Yükle
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

 <ul class="nav nav-pills">
        <li class="active"><a href="index.php?do=bakiye_yukle">Bakiye Yükle</a></li>
        <li><a href="index.php?do=bakiyeler">Tüm Bakiye Talepleri</a></li>
        <li><a href="index.php?do=bakiyeler&durum=0">Bekleyen Bakiye Talepleri</a></li>
        <li><a href="index.php?do=bakiyeler&durum=1">Onaylanan Bakiye Talepleri <?=($bild1_d1 > 0 ) ? '<span class="badge btn-primary">'.$bild1_d1.'</span>' : ''; ?></a></li>
        <li><a href="index.php?do=bakiyeler&durum=2">İptal Edilen Bakiye Talepleri <?=($bild1_d2 > 0 ) ? '<span class="badge btn-primary">'.$bild1_d2.'</span>' : ''; ?></a></li>
      </ul><hr>
       
        <div class="panel-body">

          <div class="alert alert-warning">
           İletişim İçin Whatsapp Telefon Numarası : 0500 000 0000.<br>
          </div>


          <div class="alert alert-success">
            Kredi Kartı/Havale ile anında bakiye yükleyebilirsiniz.<br>
            Bakiyeniz ödeme ardından anında eklenir.<br>
          </div>
           <div class="alert alert-danger">
           Not: Bildirim Atarken Banka İsmini Yazdıktan Sonra Ödedim Diyin. Sonrasında 3 - 5 Saniye Bekleyiniz. Bildirimi Geç Atmaktadır.<br>
          </div>


          <div id="iframediv"></div>
          <div class="col-md-6">
            <div id="output"></div>

             <div class="row" id="Odeme" style="display:none">
        <div class="col-md-12">
    <div id="BakiyeYukle_Status"></div>
        </div> <!-- /.col -->
      </div> <!-- /.row -->
            <form action="ajax.php?do=bakiye_istiyorum" method="post" id="BakiyeYukle" onsubmit="return false;">
              <div class="form-group">
                <label>Yüklenecek Tutar</label>
                <input type="text" name="tutar" class="form-control" placeholder="10.00" required="">
              </div>
              <div class="form-group">
                <label>Ödeme Yöntemi</label>
                <select name="paymethods" class="form-control">
                  <option value="card">Kredi Kartı</option>
                  <option value="eft">Havale,EFT ve ATM</option>
                </select>
              </div>
              <div class="form-group">
                <input type="button" id="BakiyeYukle" value="Bakiye Ekle" class="btn btn-primary" onclick="AjaxFormS('BakiyeYukle','BakiyeYukle_Status');">
              </div>
            </form>


          </div>


          <div class="col-md-6">
            <div class="alert alert-info">
              Minimum TL Yükleme Limiti : 10.00 <i class="fa fa-try"></i><br>
              Maximum TL Yükleme Limiti : 5000.00 <i class="fa fa-try"></i><br>
            </div>
            <div class="alert alert-danger" style="text-align:center;">
              <b>Havale Bildirimlerinizde ilk olarak havaleyi yapınız<br>daha sonra bildirim yapınız!<b>
            </b></b></div><b><b>
          </b></b></div><b><b>
        </b></b></div><b><b>
      </b></b></div><b><b>
    </b></b></div><b><b>
  </b></b></div><b><b>
</b></b></div>
    






     


      <div class="row" id="FormS">

        <div class="col-md-6 col-md-offset-2">
    
      <form action="ajax.php?do=bakiye_istiyorum" method="POST" id="BakiyeYukle">
         

         
      
              
               
                
                    
              
    
      <div class="row" id="Odeme" style="display:none">
        <div class="col-md-12">
    <div id="BakiyeYukle_Status"></div>
        </div> <!-- /.col -->
      </div> <!-- /.row -->
    
    

                      </ul>               
                    </div> <!-- /.pricing-body -->

                  </div> <!-- /.pricing -->

                </div> <!-- /.col -->

                  
              </div> <!-- /.row -->

              
            </div> <!-- /.col -->

          </div> <!-- /.row -->


        </div> <!-- /.col-md-12 -->

      </div> <!-- /.row -->


      




    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div> <!-- /.container -->




    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->

</div> <!-- /.container -->


<script type="text/javascript">
function BakiyeYukle(tutar){
$("#appendedInputButton").val(tutar);
$('html, body').animate({scrollTop: 100}, 500);
}

function OdemeIptal(){
$("#appendedInputButton").val('');
$("#Odeme").slideUp(500,function(){
$("#FormS").slideDown(500);
$('html, body').animate({scrollTop: 100}, 500);
});
}

function YukariCek(){
$('html, body').animate({scrollTop: 100}, 500);
}
</script>

<? include "inc/footer.php"; ?>