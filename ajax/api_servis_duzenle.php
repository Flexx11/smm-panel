<?php
if($hesap->id == '')
	die();


if(!$_POST)
	die();


if($hesap->tipi != 1){
die();
}

$id 	= $gvn->rakam($_GET["id"]);
$snc	 = $db->prepare("SELECT * FROM apiler WHERE id=?");
$snc->execute(array($id));
$snc	= $snc->fetch(PDO::FETCH_OBJ);


if($snc->id == ""){
die(); exit;
}


$api_id					= $gvn->zrakam($_POST["api_id"]);
$adi					= $gvn->html_temizle($_POST["adi"]);
$servis_no				= $gvn->html_temizle($_POST["servis_no"]);

if($fonk->bosluk_kontrol($api_id) == true OR $fonk->bosluk_kontrol($adi) == true OR $fonk->bosluk_kontrol($servis_no) == true)
	die($fonk->hata("Lütfen tüm alanları doldurunuz!"));




try{
$updt		= $db->prepare("UPDATE api_servisler SET api_id=?,adi=?,servis_no=? WHERE id=".$snc->id);
$updt->execute(array($api_id,$adi,$servis_no));
}catch(PDOEXception $e){
die($fonk->hata("Bir hata oluştu, Güncellenemiyor!"));
}

$fonk->tamam("Api servisi başarıyla güncellendi.");
