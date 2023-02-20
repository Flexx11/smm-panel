<?php if($hesap->id != ""){ header("location:index.php"); die(); } ?>

	<!DOCTYPE HTML>
	<html lang="tr">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="utf-8">
		<title><?php echo $ayarlar->title; ?></title>
		<meta name="keywords" content="<?php echo $ayarlar->keywords; ?>"/>
		<meta name="description" content="<?php echo $ayarlar->description; ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<link rel="stylesheet" href="theme/assets/css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="theme/assets/css/custom.min.css">
		<link rel="stylesheet" href="theme/assets/css/hover.css">
		<link rel="stylesheet" href="theme/assets/css/intlTelInput.css">
		<link rel="stylesheet" href="../cdn.jsdelivr.net/sweetalert2/4.0.13/sweetalert2.css">
		<link rel="stylesheet" href="theme/assets/css/font-awesome.min.css">
		<link rel="icon" type="image/png" href="../www.instatakipci.com/ayarlar/img/favicon.png" />
		<script type="text/javascript" src="../code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="theme/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="theme/assets/js/intlTelInput.js"></script>



		<script type="text/javascript" src="assets/js/jquery-2.2.1.min.js"></script>
		


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
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="login">
				<h3 class="login-header"><i class="fa fa-instagram"></i> BAYİ PANELİ</h3>
				

				<form class="login-container" method="POST" action="ajax.php?do=giris" id="LoginForm" class="no-margin">

					<div id="LoginOutPut" style="display:none"></div>

					<input type="hidden" name="action" value="giris" />
					<fieldset>

						<div id="LoginOutPut" style="display:none"></div>





						<div class="form-group">

							<input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı">
						</div>
						<div class="form-group">
							<input type="password" class="form-control"  name="password" placeholder="Şifre">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-md btn-block btn-primary" onclick="AjaxFormS('LoginForm','LoginOutPut');"><i class="fa fa-sign-in"></i> Giriş Yap</button>

						</div>
						<div class="form-group">
							<a href="#bakımda" class="btn btn-md btn-block btn-primary">
								<i class="fa fa-key" aria-hidden="true"></i> Şifremi Unuttum
							</a>
						</div>
					</fieldset>
					<center>
					<div class="form-group">
						<div class="link">
							Hesabınız yok mu? <a href="index.php?do=kaydol">Kayıt Ol</a>
						</div>


					</div>

					<p style="text-align: center;"><strong>
					Whatsapp & Skypeyi lütfen çok acil durumlar için kullanın, destek almak için sistemdeki destek talebini kullanınız.</strong></p>
					<p style="text-align: center;"><span style="color: #339966;">

						<strong>Whatsapp: 05000000000 </strong></span></p><p style="text-align: center;"><span style="color: #0000ff;"><strong>Email :&nbsp;e posta@gmail.com</strong></span></p>


						<p style="text-align: center;"><span style="color: red;">

						<strong>Skype:Skype Adınız  </strong></span></p>

</center>
				</form>



			</div>
		</div>
	</div>
</div>
</body>

<? $fonk->ekstra(false,false,true); ?>
</html>