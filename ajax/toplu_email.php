<?php

if($_POST){
if($hesap->id != "" AND $hesap->tipi != 0){

$konu				= $gvn->html_temizle($_POST["konu"]);
$gonderilenler		= $_POST["gonderilenler"];
$mesaj				= $_POST["mesaj"];

if($konu == "" OR $gonderilenler == '' OR $mesaj == ''){
die($fonk->hata('Lütfen boş bırakma!'));
}
$gidecekler			= explode("\n",$gonderilenler);

$i					= 0;
$ygidecekler		= array();
foreach($gidecekler as $eposta){
if($eposta != ""){
if(!in_array($ygidecekler,$eposta)){
$ygidecekler[] 		= $eposta;
$gndr				= $fonk->mail_gonder($konu,$eposta,$mesaj);
($gndr) ? $i+=1 : NULL;
}
}
} 


$gonder = true;

if($gonder){
$fonk->tamam("İşlem Başarıyla Gerçekleşti. ".$i." adet mail gönderildi.");
}else{
$fonk->hata("Mail gönderilemiyor.");
}


}
} 