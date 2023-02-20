<?php

Class pagenate {

function sql_query($sql,$git,$limit){ 
global $db,$gvn;
$git  	= $gvn->rakam($git);
$limit  = $gvn->rakam($limit);

	if(!is_numeric($git) or $git == 0 or $git < 1){
	$git = 1;
	}
	
	$qrr			= $db->query($sql);
	$count 			= $qrr->rowCount();
	$toplamsayfa    = ceil($count / $limit);
	$baslangic  = ($git-1)*$limit;
	if($git-5 < 1){
	$basdan 		= 1;
	}else{
	$basdan 		= $git-3;
	}
	if($git+5 > $toplamsayfa){
	
	$kadar 			= $toplamsayfa;
	
	}else{
	$kadar 			= $git+3;
	}
	
	if($git > $toplamsayfa){
	
	$git 		= $toplamsayfa;
	
	}
	
	if($git < 1){
	
	$git 		= 1;
	
	}
	

	return array(
	'sql' => $sql.' LIMIT '.$baslangic.','.$limit.' ',
	'basdan' => $basdan,
	'kadar' => $kadar,
	'baslangic' => $baslangic
	);
	
	}

function listele($base_url,$git,$basdan,$kadar,$active_class,$sorgu){
global $gvn;
$git 		= $gvn->rakam($git);

if($git == '' or $git == 0){
$git = 1;
}
if($kadar > 0 ){
?>
 <a class="btn btn-sm btn-info" href="<? echo $base_url; ?><? echo $git-1; ?>">Önceki</a>
 <?php
 for($i=$basdan; $i<=$kadar; $i++){
 if($i != ''){
 ?>
 <a class="btn btn-sm <? if($git == $i){ echo $active_class; }else{ echo "btn-info"; } ?>" href="<? echo $base_url; ?><? echo $i; ?>"><? echo $i; ?></a> 
 <?
 }
 }
 ?>
 <a class="btn btn-sm btn-info" href="<? echo $base_url; ?><? if($git+1 > $kadar ){ echo $kadar; }else{ echo $git+1; } ?>">Sonraki</a> 
<?

} // EĞER  VARSA LİSTELENECEK ÖĞLE
} // FONKSİYON KAPANIŞI






}
?>