<?php
if($hesap->id == '')
	die();


if(!$_GET)
	die();

$tutar			= $gvn->prakam($_POST["tutar"]); 
$tutar_int		= $gvn->para_int($tutar);
$tutar_str		= $gvn->para_str($tutar_int);
$hediye			= $gvn->para_int($kampanya[$tutar_int]);
$gadsoyad		= $gvn->html_temizle($_POST["gadsoyad"]);
$banka			= $gvn->html_temizle($_POST["banka"]);


if($tutar == '' OR $tutar == 0){
die();
}


$ekle			= $db->prepare("INSERT INTO bakiyeler SET acid=?,tutar=?,tarih=?,sdurum='1',hediye=?,gadsoyad=?,banka=? ");
$ekle->execute(array($hesap->id,$tutar_int,$fonk->datetime(),$hediye,$gadsoyad,$banka));

if($ayarlar->bildirim_email != ''){
$text			= '
Sayın Yönetici, <br />
Az önce <strong>'.$hesap->adsoyad.'</strong> adlı müşteriniz bakiye talebinde bulundu. <br />
Gönderici Adı Soyadı : <strong>'.$gadsoyad.'</strong> <br />
Banka Adı : <strong>'.$banka.'</strong> <br />
Tutar : <strong>'.$tutar.'</strong> <br />
';
$fonk->mail_gonder('Bakiye talebinde bulunuldu!',$ayarlar->bildirim_email,$text);
}

if($ayarlar->bildirim_gsm != ''){
$text			= 'Sayın Yönetici,
Az önce '.$hesap->adsoyad.' adlı müşteriniz bakiye talebinde bulundu.
Gönderici Adı Soyadı : '.$gadsoyad.'
Banka Adı : '.$banka.'
Tutar : '.$tutar.' TL
';
$fonk->sms_gonder($ayarlar->bildirim_gsm,$text);
}


?>
<script type="text/javascript">
$("#Div1").slideUp(500,function(){
$("#Div2").slideDown(500);
});
YukariCek();
</script>
<div id="Div2">

<div style="margin-bottom:10px;text-align:center;">
<i style="font-size:80px;color:green;" class="fa fa-check"></i>
<h2 style="color:green;font-weight:bold;">İşleminiz Tamamlandı</h2>
<br/>
<h4>Ödemeniz kontrol edilip daha sonra onaylanacaktır.</h4>
</div>

<hr />

</div>