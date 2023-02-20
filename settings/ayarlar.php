<?php
/*
MySQL Connection Constant Variables 
*/
define("SERVER_HOST","localhost"); // Host IP veya Host Adresi 
define("DB_USERNAME","db.kulancıadı"); // MySQL Kullanıcı Adı
define("DB_PASSWORD","şifre"); // MySQL Parolası
define("DB_NAME","db.ismi"); // Veritabanı Adı
define("DB_CHARSET","utf8");
define("DEMO",false); // Demo aktif için true pasif için false;


/*
Php Technical Settings 
*/
error_reporting(0);


// TimeZone
date_default_timezone_set("Europe/Istanbul");

$php_ver			= substr(phpversion(),0,3);

if($php_ver < '5.4' ){
die("Yazılım en düşük  PHP 5.4 kadar desteklemektedir. Lütfen php versiyonunuzu yükseltin.");
}

require __DIR__."/baglanti.php";