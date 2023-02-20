<?php if($hesap->id != ""){ header("location:index.php"); die(); } ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>

  <title><?php echo $ayarlar->title; ?></title> 
  <meta charset="utf-8">
  <meta name="keywords" content="<?=$ayarlar->keywords;?>">
  <meta name="description" content="<?=$ayarlar->description;?>">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
  <link rel="stylesheet" href="./css/font-awesome.min.css">
  <link rel="stylesheet" href="./js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- App CSS -->
  <link rel="stylesheet" href="./css/target-admin.css">
  <link rel="stylesheet" href="./css/custom.css">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body class="account-bg">

<div class="navbar">

  <div class="container">

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <i class="fa fa-cogs"></i>
      </button>

      <a class="navbar-brand navbar-brand-image" href="index.php">
        <img src="./img/<?=$ayarlar->index_logo;?>" alt="Site Logo">
      </a>

    </div> <!-- /.navbar-header -->

    <div class="navbar-collapse collapse">

      



       
        

      <ul class="nav navbar-nav navbar-right">   

        <li>
          <a href="index.php">
            <i class="fa fa-angle-double-left"></i> 
            &nbsp;Anasayfaya dön
          </a>
        </li> 

      </ul>
       

    </div> <!--/.navbar-collapse -->

  </div> <!-- /.container -->

</div> <!-- /.navbar -->

<hr class="account-header-divider">

<div class="account-wrapper">

  <div class="account-logo">
    <img src="./img/<?=$ayarlar->login_logo;?>" alt="Target Admin">
  </div>

    <div class="account-body">

      <h3 class="account-body-title">Şifreyi sıfırla!</h3>

      <h5 class="account-body-subtitle">Bilgilerinizi içeren bir mail alacaksınız.</h5>

      <form class="form account-form" method="POST" action="ajax.php?do=sifremi_unuttum" id="ForgetPassword">

        <div class="form-group">
          <label for="forgot-email" class="placeholder-hidden">E-mail Adresiniz</label>
          <input type="text" name="email" class="form-control" id="forgot-email" placeholder="Email Adresiniz" tabindex="1">
        </div> <!-- /.form-group -->
		
		<div class="form-group">
          <label for="answer" class="placeholder-hidden">Güvenlik Sorusu Cevabı</label>
		  <img src="captcha.php" width="100" style="height:60px;" class="form-control">
          <input type="text" name="answer" class="form-control" id="answer" placeholder="Güvenlik Sorusu Cevabı" tabindex="2">
        </div> <!-- /.form-group -->
		

        <div class="form-group">
          <button type="button" onclick="AjaxFormS('ForgetPassword','ForgetPasswordOutput');" class="btn btn-secondary btn-block btn-lg" tabindex="2">
            Şifremi Sıfırla&nbsp; <i class="fa fa-refresh"></i>
          </button>
        </div> <!-- /.form-group -->

        <div class="form-group">
          <a href="index.php"><i class="fa fa-angle-double-left"></i> &nbsp;Girişe Dön</a>
        </div> <!-- /.form-group -->
		
		<div id="ForgetPasswordOutput"></div>
		
      </form>

    </div> <!-- /.account-body -->

  </div> <!-- /.account-wrapper -->

  <script src="./js/libs/jquery-1.10.1.min.js"></script>
  <script src="./js/libs/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="./js/libs/bootstrap.min.js"></script>

  <!--[if lt IE 9]>
  <script src="./js/libs/excanvas.compiled.js"></script>
  <![endif]-->
  <!-- App JS -->
  <script src="./js/target-admin.js"></script>

  <!-- Ekstra -->
<? $fonk->ekstra(false,false,true); ?>


  

</body>
</html>
