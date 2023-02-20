<?php 
$GLOBALS["ndnrgvpz"] = "hesap";
$GLOBALS["qqqceiep"] = "spassword";
$GLOBALS["huwfmhignne"] = "susername";
$GLOBALS["osyxrevj"] = "dat";
$GLOBALS["kqnqdxvix"] = "snc";
$GLOBALS["adhhesw"] = "adrs";
$GLOBALS["tedfoeijlmyz"] = "dizin";
$GLOBALS["tplyusleoep"] = "domain";
$GLOBALS["esnefahvc"] = "kampanya";
$GLOBALS["lfmzvldorcby"] = "ayarlar";
$GLOBALS["bbblbfuk"] = "b";
$GLOBALS["omibfjhvp"] = "headers";
$GLOBALS["udnsrzbp"] = "mail_secure_stat";
$GLOBALS["jhgify"] = "a";
$GLOBALS["ikcizpbchug"] = "uri";
@ob_start();
@session_start();
header("Content-Type:text/html; Charset=utf8");
$dnwlpbjzttue = "ion";
$GLOBALS["bouyvlp"] = "spassword";
if( !function_exists("curl_init") ) 
{
    exit( "Sunucunuz'da \"CURL\" küüphanesi bulunmuyor. Lütfen hostinginize kurun." );
}

$GLOBALS["rhfeudoji"] = "fonk";
$GLOBALS["ntrbnck"] = "ion";
$uertnxdn = "gvn";
require("settings/ayarlar.php");
$GLOBALS["ujgimxvlwq"] = "mail_secure_stat";
require("library/guvenlik.php");
require("library/pagenate.php");
require("library/class.phpmailler.php");
$GLOBALS["ujktvtyodi"] = "pagent";
$ecbhgydelo = "adrs";
require("library/fonksiyonlar.php");
require("library/api.php");
${$GLOBALS["lfmzvldorcby"]} = $db->query("SELECT * FROM ayarlar ")->fetch(PDO::FETCH_OBJ);
${$uertnxdn} = new guvenlik();
${$GLOBALS["rhfeudoji"]} = new fonksiyonlar();
${$GLOBALS["ujktvtyodi"]} = new pagenate();
${$GLOBALS["udnsrzbp"]} = ($ayarlar->mail_secure != "" ? true : false);
define("MAIL_HOST", $ayarlar->mail_host);
define("MAIL_PORT", $ayarlar->mail_port);
define("MAIL_SECURE", ${$GLOBALS["ujgimxvlwq"]});
$GLOBALS["wrcbhonmtxr"] = "snc";
define("MAIL_SMTPSecure", $ayarlar->mail_secure);
$GLOBALS["lwbuva"] = "hesap";
define("MAIL_USER", $ayarlar->mail_username);
$elfiibxv = "spassword";
define("MAIL_PASSWORD", $ayarlar->mail_password);
define("SITE_ADI", $ayarlar->site_adi);
${$GLOBALS["esnefahvc"]} = array(  );
if( $ayarlar->kampanya1_tutar != 0 && $ayarlar->kampanya1_hediye != 0 ) 
{
    ${$GLOBALS["esnefahvc"]}[$ayarlar->kampanya1_tutar] = $ayarlar->kampanya1_hediye;
}

if( $ayarlar->kampanya2_tutar != 0 && $ayarlar->kampanya2_hediye != 0 ) 
{
    $GLOBALS["fwuucndtgyhb"] = "kampanya";
    ${$GLOBALS["fwuucndtgyhb"]}[$ayarlar->kampanya2_tutar] = $ayarlar->kampanya2_hediye;
}

if( $ayarlar->kampanya3_tutar != 0 && $ayarlar->kampanya3_hediye != 0 ) 
{
    ${$GLOBALS["esnefahvc"]}[$ayarlar->kampanya3_tutar] = $ayarlar->kampanya3_hediye;
}


${$GLOBALS["huwfmhignne"]} = $_SESSION["username"];
${$GLOBALS["bouyvlp"]} = $_SESSION["password"];
${$GLOBALS["lwbuva"]} = false;
if( $fonk->bosluk_kontrol(${$GLOBALS["huwfmhignne"]}) == false && $fonk->bosluk_kontrol(${$elfiibxv}) == false ) 
{
    $roudtvnxwp = "susername";
    $jqmenuupspf = "kontrol";
    ${$jqmenuupspf} = $db->prepare("SELECT * FROM uyeler WHERE username=? AND password=? AND durum=0 LIMIT 0,1");
    $kontrol->execute(array( ${$roudtvnxwp}, ${$GLOBALS["qqqceiep"]} ));
    if( 0 < $kontrol->rowCount() ) 
    {
        ${$GLOBALS["ndnrgvpz"]} = $kontrol->fetch(PDO::FETCH_OBJ);
    }

}

function curl_cek($uri, $post = NULL)
{
    $GLOBALS["nttderxzwko"] = "headers";
    $tvyymlea = "headers";
    $GLOBALS["psnewft"] = "a";
    $rbyuulm = "post";
    ${$GLOBALS["nttderxzwko"]} = array(  );
    $GLOBALS["vkzpiwxs"] = "a";
    ${$tvyymlea}[] = "user-agent:Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.124 Safari/537.36";
    $datmxwmdlwn = "a";
    $cjfkkeb = "timeout";
    $GLOBALS["fysekngm"] = "a";
    $GLOBALS["bmkrgqepy"] = "a";
    ${$cjfkkeb} = 5;
    ${$GLOBALS["psnewft"]} = curl_init();
    curl_setopt(${$GLOBALS["bmkrgqepy"]}, CURLOPT_URL, ${$GLOBALS["ikcizpbchug"]});
    curl_setopt(${$GLOBALS["fysekngm"]}, CURLOPT_REFERER, "http://" . $_SERVER["HTTP_HOST"]);
    if( ${$rbyuulm} != "" ) 
    {
        $qkpbjmfymdq = "a";
        $slawmdsu = "post";
        curl_setopt(${$GLOBALS["jhgify"]}, CURLOPT_POST, true);
        curl_setopt(${$qkpbjmfymdq}, CURLOPT_POSTFIELDS, ${$slawmdsu});
    }

    curl_setopt(${$datmxwmdlwn}, CURLOPT_HTTPHEADER, ${$GLOBALS["omibfjhvp"]});
    curl_setopt(${$GLOBALS["vkzpiwxs"]}, CURLOPT_RETURNTRANSFER, true);
    @curl_setopt(${$GLOBALS["jhgify"]}, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt(${$GLOBALS["jhgify"]}, CURLOPT_TIMEOUT, 3);
    ${$GLOBALS["bbblbfuk"]} = curl_exec(${$GLOBALS["jhgify"]});
    curl_close(${$GLOBALS["jhgify"]});
    return ${$GLOBALS["bbblbfuk"]};
}

