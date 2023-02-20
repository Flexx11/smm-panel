<?php if($hesap->id != ""){ header("location:index.php"); die(); } 


?> 
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
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
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
				<h3 class="login-header"><i class="fa fa-instagram"></i> Yeni Üyelik</h3>



				<form class="login-container" method="POST" action="ajax.php?do=kaydol" id="RegisterForm">



					<div id="RegisterOutPut"></div>


					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="E-Mail Adresi">
					</div>
					<div class="form-group">
						<input type="text" name="adsoyad" class="form-control" placeholder="İsim Soyisim">
					</div>

					<div class="form-group">
						<input type="text" name="username" class="hidden">
						<input type="text" name="username" class="form-control" placeholder="Kullanıcı Adı" autocomplete="off">
					</div>


					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Şifre">
					</div>



					<div class="form-group">
						<input type="text" class="form-control" placeholder="Telefon Numarası" id="phn" style="width: 376px;" maxlength="11">
						<input type="text" class="form-control hidden" name="telefon">
					</div>
				

					<div class="form-group">
						<button type="submit" id="register" class="btn btn-md btn-block btn-primary" onclick="AjaxFormS('RegisterForm','RegisterOutPut');"><i class="fa fa-user-plus" aria-hidden="true"></i> Kayıt Ol</button>
					</div>
					<center>
						<div class="form-group">
							<div class="link">
								Hesabınız var mı? <a href="index.php?do=giris">Giriş Yap</a>
							</div>
						</div></center>
					</form>
					<script type="text/javascript">
						$(document).on("click", "#register", function() {
							if ($("#phn").intlTelInput("isValidNumber"))
							{
								$.ajax({
									type: "POST",
									url: '',
									data: $("#register-form").serialize(),
									success: function(data)
									{
										res = $.parseJSON(data);
										$('#registererror').removeClass();
										$('#registererror').addClass('alert alert-'+res[0]);
										$('#registererror').html(res[1]);
										if ( res['redirect'] )
										{
											setTimeout(function()
												{window.location.href = res['redirect'];} , 2000);
										}

									}
								});
							}
							else
							{
								$('#registererror').removeClass();
								$('#registererror').addClass('alert alert-danger');
								$('#registererror').html('Lütfen geçerli bir numara giriniz.');
							}
						});
					</script>
					<script>
						$("#phn").intlTelInput({
							onlyCountries: ["tr"],
							autoPlaceholder: "aggressive",
							numberType: "MOBILE",
							nationalMode: true,
					utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js" // just for formatting/placeholders etc
				});

						$("#phn").keyup(function() {
							$("[name=phone]").val($("#phn").intlTelInput("getNumber"));
						});

					</script>
				</div>
			</div>
		</div>
	

		<div class="clear"></div>
	</div>
</body>
<? $fonk->ekstra(false,false,true); ?>

</html>