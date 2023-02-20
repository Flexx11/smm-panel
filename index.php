<?php include "functions.php";
$p			= $gvn->harf_rakam($_GET["do"]);
$pdir		= "sayfalar/";
$xp			= true;
$homefile	= ($hesap->tipi == 1) ? 'index_admin.php' : 'index.php';

if(empty($p)){
include $pdir.$homefile;
}elseif(file_exists($pdir.$p.'.php')){
include $pdir.$p.'.php';
}else{
$xp		= false;
include $pdir.$homefile;
}
