<!DOCTYPE HTML>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <title><?php echo $ayarlar->title; ?></title>
  <meta name="keywords" content="<?php echo $ayarlar->keywords; ?>"/>
  <meta name="description" content="<?php echo $ayarlar->description; ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <link rel="stylesheet" href="assets/css/bootstrap.css" media="screen">
  <link rel="stylesheet" href="assets/css/custom.min.css">
  <link rel="stylesheet" href="assets/css/hover.css">
  <link rel="stylesheet" href="assets/css/intlTelInput.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/4.0.13/sweetalert2.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="icon" type="image/png" href="www.instatakipci.com/ayarlar/img/favicon.png" />
  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/intlTelInput.js"></script>



  <style>
  .navbar-login {
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
  }

  .navbar-login-session {
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
  }

  .icon-size {
    font-size: 87px;
  }

  @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
  body {background: #456;font-family: 'Open Sans', sans-serif;}
  .login { width: 400px;margin: 16px auto;font-size: 16px;}
  /* Reset top and bottom margins from certain elements */
  .login-header,.login p { margin-top: 0;margin-bottom: 0;}
  /* The triangle form is achieved by a CSS hack */
  .login-triangle {width: 0;margin-right: auto;margin-left: auto;border: 12px solid transparent;border-bottom-color: #28d;}
  .login-header {background: #28d;padding: 20px;font-size: 1.4em;font-weight: normal;text-align: center;text-transform: uppercase;color: #fff;}
  .login-container {background: #ebebeb;padding: 12px;}
  /* Every row inside .login-container is defined with p tags */
  .login p {padding: 12px;}
  .login input {box-sizing: border-box;display: block;width: 100%;border-width: 1px;border-style: solid;padding: 16px;outline: 0;font-family: inherit;font-size: 0.95em;}
  .login input[type="email"],.login input[type="password"] {background: #fff;border-color: #bbb;color: #555;}
  /* Text fields' focus effect */
  .login input[type="email"]:focus, .login input[type="password"]:focus {  border-color: #888;}
  .login input[type="submit"] {background: #28d;border-color: transparent;color: #fff;cursor: pointer;}
  .login input[type="submit"]:hover {background: #17c;}
  /* Buttons' focus effect */
  .login input[type="submit"]:focus {border-color: #05a;}
  @media all and (max-width:450px){
    .login {width: 95%;}
  }

  body > div.container{margin-top: 30px;}
</style>
</head>
<body>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">

          <li <?php echo ($p == '') ? 'class="active"' : '';?>>
            <a href="index.php">
              <i class="fa fa-dashboard"></i>
              Anasayfa
            </a>
          </li>


          <? if($hesap->tipi == 1){ ?>


          <li <?php echo ($p == 'ayarlar') ? 'class="active"' : '';?>>
            <a href="index.php?do=ayarlar">
              <i class="fa fa-cog"></i>
              Ayarlar
            </a>
          </li>


          <li <?php echo ($p == 'uyeler' OR $p == 'uye') ? 'class="active"' : '';?>>
            <a href="index.php?do=uyeler">
              <i class="fa fa-users"></i>
              Üyeler
            </a>
          </li>

          <?php
          $bild   = $db->query("SELECT id FROM siparisler WHERE durum=0")->rowCount();
          ?>
          <li class="dropdown <?php echo ($p == 'siparisler' OR $p == 'siparis') ? 'active' : '';?>">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
              <i class="fa fa-shopping-cart"></i>
              Siparişler
              <?=($bild > 0 ) ? '<span class="badge btn-primary">'.$bild.'</span>' : ''; ?>
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">   
              <li><a href="index.php?do=siparisler"><i class="fa fa-arrow-right nav-icon"></i> Tüm Siparişler</a></li>
              <li><a href="index.php?do=siparisler&durum=0"><i class="fa fa-arrow-right nav-icon"></i> Bekleyen Siparişler <?=($bild > 0 ) ? '<span class="badge btn-primary">'.$bild.'</span>' : ''; ?> </a></li>
              <li><a href="index.php?do=siparisler&durum=1"><i class="fa fa-arrow-right nav-icon"></i> Tamamlanan Siparişler</a></li>
              <li><a href="index.php?do=siparisler&durum=2"><i class="fa fa-arrow-right nav-icon"></i> İptal Edilen Siparişler</a></li>
            </ul>
          </li>


          <li class="dropdown <?php echo ($p == 'kategoriler' OR $p == 'urunler' OR $p == 'urun_ekle' OR $p == 'urun_duzenle' OR $p == 'kategori_ekle' OR $p == 'kategori_duzenle') ? 'active' : '';?>">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
              <i class="fa fa-gift"></i>
              Ürün İşlemleri
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              <li><a href="index.php?do=kategoriler"><i class="fa fa-arrow-right nav-icon"></i> Kategoriler </a></li>
              <li><a href="index.php?do=kategori_ekle"><i class="fa fa-arrow-right nav-icon"></i> Kategori Ekle </a></li>
              <li><a href="index.php?do=urunler"><i class="fa fa-arrow-right nav-icon"></i> Ürünler </a></li>
              <li><a href="index.php?do=urun_ekle"><i class="fa fa-arrow-right nav-icon"></i> Ürün Ekle </a></li>
            </ul>
          </li>


          <?php
          $bild1    = $db->query("SELECT id FROM bakiyeler WHERE durum=0")->rowCount();
          ?>
          <li class="dropdown <?php echo ($p == 'bakiye_yukle' OR $p == 'bakiyeler' OR $p == 'bakiye') ? 'active' : '';?>">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
              <i class="fa fa-money"></i>
              Bakiye İşlemleri
              <?=($bild1 > 0 ) ? '<span class="badge btn-primary">'.$bild1.'</span>' : ''; ?>
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              <li><a href="index.php?do=bakiyeler"><i class="fa fa-arrow-right nav-icon"></i> Tüm Bakiye Talepleri </a></li>
              <li><a href="index.php?do=bakiyeler&durum=0"><i class="fa fa-arrow-right nav-icon"></i> Bekleyen Bakiye Talepleri <?=($bild1 > 0 ) ? '<span class="badge btn-primary">'.$bild1.'</span>' : ''; ?></a></li>
              <li><a href="index.php?do=bakiyeler&durum=1"><i class="fa fa-arrow-right nav-icon"></i> Tamamlanan Bakiye Talepleri </a></li>
              <li><a href="index.php?do=bakiyeler&durum=2"><i class="fa fa-arrow-right nav-icon"></i> İptal Edilen Bakiye Talepleri </a></li>
            </ul>
          </li>


          <?php
          $bild2    = $db->query("SELECT id FROM destek_sistemi WHERE durum=0 ")->rowCount();
          ?>
          <li class="dropdown <?php echo ($p == 'yeni_destek_talebi' OR $p == 'destek_sistemi' OR $p == 'destek') ? 'active' : '';?>">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
              <i class="fa fa-comment"></i>
              Destek Sistemi
              <?=($bild2 > 0 ) ? '<span class="badge btn-primary">'.$bild2.'</span>' : ''; ?>
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">   
              <li><a href="index.php?do=destek_sistemi"><i class="fa fa-arrow-right nav-icon"></i> Tüm Destek Talepleri</a></li>
              <li><a href="index.php?do=destek_sistemi&durum=0"><i class="fa fa-arrow-right nav-icon"></i> Bekleyen Destek Talepleri <?=($bild2 > 0 ) ? '<span class="badge btn-primary">'.$bild2.'</span>' : ''; ?></a></li>
              <li><a href="index.php?do=destek_sistemi&durum=1"><i class="fa fa-arrow-right nav-icon"></i> Yanıtlanmış Destek Talepleri</a></li>
              <li><a href="index.php?do=destek_sistemi&durum=2"><i class="fa fa-arrow-right nav-icon"></i> Kapanmış Destek Talepleri</a></li>
            </ul>
          </li>


          <li class="dropdown <?php echo ($p == 'api_ekle' OR $p == 'api' OR $p == 'api_servis_ekle' OR $p == 'api_servis' OR $p == 'apiler' OR $p == 'api_servisler') ? 'active' : '';?>">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
              <i class="fa fa-chain-broken"></i>
              API 
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">   
              <li><a href="index.php?do=api_ekle"><i class="fa fa-arrow-right nav-icon"></i> Api Ekle</a></li>
              <li><a href="index.php?do=apiler"><i class="fa fa-arrow-right nav-icon"></i> Api Listesi</a></li>
              <li><a href="index.php?do=api_servis_ekle"><i class="fa fa-arrow-right nav-icon"></i> Api Servis Ekle</a></li>
              <li><a href="index.php?do=api_servisler"><i class="fa fa-arrow-right nav-icon"></i> Api Servisler</a></li>
            </ul>
          </li>  


          <? }elseif($hesap->tipi == 0){ ?>


          <?php
          $bild   = $db->query("SELECT id FROM siparisler WHERE sdurum=0 AND acid=".$hesap->id)->rowCount();
          $bild_d1  =  $db->query("SELECT id FROM siparisler WHERE sdurum=0 AND durum=1 AND acid=".$hesap->id)->rowCount();
          $bild_d2  =  $db->query("SELECT id FROM siparisler WHERE sdurum=0 AND durum=2 AND acid=".$hesap->id)->rowCount();
          $bild_d3  =  $db->query("SELECT id FROM siparisler WHERE sdurum=0 AND durum=3 AND acid=".$hesap->id)->rowCount();
          ?>

          <li <?php echo ($p == 'siparisler') ? 'class="active"' : '';?>>


            <a href="index.php?do=siparisler">
              <i class="fa fa-shopping-cart"></i>
              Siparişlerim
            </a>
          </li>




          <?php
          $bild   = $db->query("SELECT id FROM siparisler WHERE sdurum=0 AND acid=".$hesap->id)->rowCount();
          $bild_d1  =  $db->query("SELECT id FROM siparisler WHERE sdurum=0 AND durum=1 AND acid=".$hesap->id)->rowCount();
          $bild_d2  =  $db->query("SELECT id FROM siparisler WHERE sdurum=0 AND durum=2 AND acid=".$hesap->id)->rowCount();
          $bild_d3  =  $db->query("SELECT id FROM siparisler WHERE sdurum=0 AND durum=3 AND acid=".$hesap->id)->rowCount();
          ?>

          <li <?php echo ($p == 'yeni_siparis') ? 'class="active"' : '';?>>


            <a href="index.php?do=yeni_siparis">
              <i class="fa fa-plus"></i>
              Yeni Siparişler
            </a>
          </li>


          
<!-- 
          <ul class="dropdown-menu">   
            <li><a href="index.php?do=siparisler"><i class="fa fa-arrow-right nav-icon"></i> Tüm Siparişler</a></li>
            <li><a href="index.php?do=siparisler&durum=0"><i class="fa fa-arrow-right nav-icon"></i> Bekleyen Siparişler</a></li>
            <li><a href="index.php?do=siparisler&durum=1"><i class="fa fa-arrow-right nav-icon"></i> Tamamlanan Siparişler <?=($bild_d1 > 0 ) ? '<span class="badge btn-primary">'.$bild_d1.'</span>' : ''; ?></a></li>
            <li><a href="index.php?do=siparisler&durum=2"><i class="fa fa-arrow-right nav-icon"></i> İptal Edilen Siparişler <?=($bild_d2 > 0 ) ? '<span class="badge btn-primary">'.$bild_d2.'</span>' : ''; ?></a></li>
          </ul>
        </li> -->

        <?php
        $bild1    = $db->query("SELECT id FROM bakiyeler WHERE sdurum=0 AND acid=".$hesap->id)->rowCount();
        $bild1_d1 =  $db->query("SELECT id FROM bakiyeler WHERE sdurum=0 AND durum=1 AND acid=".$hesap->id)->rowCount();
        $bild1_d2 =  $db->query("SELECT id FROM bakiyeler WHERE sdurum=0 AND durum=2 AND acid=".$hesap->id)->rowCount();
        ?>

        <li <?php echo ($p == 'bakiye_yukle') ? 'class="active"' : '';?>>


          <a href="index.php?do=bakiye_yukle">
            <i class="fa fa-money"></i>
            Bakiye Yükle
          </a>
        </li>

        
        <!-- <li class="dropdown <?php echo ($p == 'bakiye_yukle' OR $p == 'bakiyeler' OR $p == 'bakiye') ? 'active' : '';?>">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
          <i class="fa fa-money"></i>
          Bakiye Yükle
      <?=($bild1 > 0 ) ? '<span class="badge btn-primary">'.$bild1.'</span>' : ''; ?>
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">   
            <li><a href="index.php?do=bakiye_yukle"><i class="fa fa-arrow-right nav-icon"></i> Bakiye Yükle </a> </li>
            <li><a href="index.php?do=bakiyeler"><i class="fa fa-arrow-right nav-icon"></i> Tüm Bakiye Talepleri </a></li>
      <li><a href="index.php?do=bakiyeler&durum=0"><i class="fa fa-arrow-right nav-icon"></i> Bekleyen Bakiye Talepleri</a></li>
            <li><a href="index.php?do=bakiyeler&durum=1"><i class="fa fa-arrow-right nav-icon"></i> Onaylanan Bakiye Talepleri <?=($bild1_d1 > 0 ) ? '<span class="badge btn-primary">'.$bild1_d1.'</span>' : ''; ?></a></li>
            <li><a href="index.php?do=bakiyeler&durum=2"><i class="fa fa-arrow-right nav-icon"></i> İptal Edilen Bakiye Talepleri <?=($bild1_d2 > 0 ) ? '<span class="badge btn-primary">'.$bild1_d2.'</span>' : ''; ?></a></li>
          </ul>
        </li> -->


        <?php
        $bild2    = $db->query("SELECT id FROM destek_sistemi WHERE sdurum=0 and acid=".$hesap->id)->rowCount();
        $bild2_d1 = $db->query("SELECT id FROM destek_sistemi WHERE sdurum=0 AND durum=1 and acid=".$hesap->id)->rowCount();
        $bild2_d2 = $db->query("SELECT id FROM destek_sistemi WHERE sdurum=0 AND durum=2 and acid=".$hesap->id)->rowCount();
        ?>
        <li class="dropdown <?php echo ($p == 'yeni_destek_talebi' OR $p == 'destek_sistemi') ? 'active' : '';?>">
          <a href="index.php?do=destek_sistemi&durum=0">
            <i class="fa fa-comment"></i>
            Destek Sistemi
            <?=($bild2 > 0 ) ? '<span class="badge btn-primary">'.$bild2.'</span>' : ''; ?>
            
          </a>

          <ul class="dropdown-menu">   
            <li><a href="index.php?do=yeni_destek_talebi"><i class="fa fa-arrow-right nav-icon"></i> Destek Talebi Oluştur</a></li>
            <li><a href="index.php?do=destek_sistemi"><i class="fa fa-arrow-right nav-icon"></i> Tüm Destek Talepleri</a></li>
            <li><a href="index.php?do=destek_sistemi&durum=0"><i class="fa fa-arrow-right nav-icon"></i> Bekleyen Destek Talepleri</a></li>
            <li><a href="index.php?do=destek_sistemi&durum=1"><i class="fa fa-arrow-right nav-icon"></i> Yanıtlanmış Destek Talepleri <?=($bild2_d1 > 0 ) ? '<span class="badge btn-primary">'.$bild2_d1.'</span>' : ''; ?></a></li>
            <li><a href="index.php?do=destek_sistemi&durum=2"><i class="fa fa-arrow-right nav-icon"></i> Kapanmış Destek Talepleri <?=($bild2_d2 > 0 ) ? '<span class="badge btn-primary">'.$bild2_d2.'</span>' : ''; ?></a></li>
          </ul>
        </li>


        <li <?php echo ($p == 'fiyatlar') ? 'class="active"' : '';?>>
          <a href="index.php?do=fiyatlar">
            <i class="fa fa-try"></i>
            Fiyatlar
          </a>
        </li>

        <li <?php echo ($p == 'sss') ? 'class="active"' : '';?>>
          <a href="index.php?do=sss">
            <i class="fa fa-question"></i>
            S.S.S
          </a>
        </li>

        <? } ?>


      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">
            <strong><i class="fa fa-user-circle"></i> <?=$hesap->adsoyad;?></strong>
            <i class="fa fa-chevron-down"></i>
          </a>
          <ul class="dropdown-menu" style="background: white!important;    text-align: -webkit-center;">
            <li>
              <div class="navbar-login navbar-login-session">
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-12" style="text-align: center;font-weight: 700;font-variant: small-caps;">
                      <p style="font-size: 20px;"><u><i class="fa fa-shopping-basket"></i><?php echo $ayarlar->title; ?></u></p>
                      <hr style="margin: 10px 0;">
                      <p>bakiyeniz : <?=$gvn->para_str($hesap->bakiye);?> <i class="fa fa-try"></i></p>
                      <hr style="margin: 10px 0;">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <p><a href="cikis.php" class="btn btn-danger btn-block">Çıkış yap</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>