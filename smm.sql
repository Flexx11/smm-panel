-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 26 Tem 2018, 22:38:52
-- Sunucu sürümü: 10.0.35-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `smmbayic_smm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `apiler`
--

CREATE TABLE `apiler` (
  `id` int(11) UNSIGNED NOT NULL,
  `adi` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `keyy` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `secret` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `api_servisler`
--

CREATE TABLE `api_servisler` (
  `id` int(11) UNSIGNED NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `api_id` int(11) DEFAULT NULL,
  `servis_no` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `servis_ekstra` text COLLATE utf8_turkish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `site_adi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `login_logo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `index_logo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `hesap_bilgileri` text COLLATE utf8_turkish_ci,
  `haber_duyuru` text COLLATE utf8_turkish_ci,
  `sss` text COLLATE utf8_turkish_ci,
  `kampanya1_tutar` int(11) DEFAULT '0',
  `kampanya1_hediye` int(11) DEFAULT '0',
  `kampanya2_tutar` int(11) DEFAULT '0',
  `kampanya2_hediye` int(11) DEFAULT '0',
  `kampanya3_tutar` int(11) DEFAULT '0',
  `kampanya3_hediye` int(11) DEFAULT '0',
  `mail_host` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mail_port` int(11) DEFAULT '0',
  `mail_secure` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mail_username` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mail_password` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `bildirim_email` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `bildirim_gsm` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_adi`, `login_logo`, `index_logo`, `slogan`, `title`, `keywords`, `description`, `hesap_bilgileri`, `haber_duyuru`, `sss`, `kampanya1_tutar`, `kampanya1_hediye`, `kampanya2_tutar`, `kampanya2_hediye`, `kampanya3_tutar`, `kampanya3_hediye`, `mail_host`, `mail_port`, `mail_secure`, `mail_username`, `mail_password`, `bildirim_email`, `bildirim_gsm`) VALUES
('smm-bayi', 'logo-login.png', 'logo.png', 'smm-bayi', 'smm-bayi', 'Anahtar Kelimeler,Anahtar Kelimeler,Anahtar Kelimeler', 'smm-bayi', '<div style=\"color: #333333; font-size: 16px; line-height: normal; text-align: center;\"><span style=\"font-size: 18px; font-weight: bold; line-height: 1.42857;\">GARANTİ BANKASI</span></div>\r\n<p style=\"line-height: normal; color: #333333; font-size: 16px;\"> </p>\r\n<div style=\"color: #333333; font-size: 16px; line-height: normal; text-align: center;\"><span style=\"line-height: 1.42857;\">Alıcı: </span><span style=\"line-height: 21.4285px;\">XXXXXX</span></div>\r\n<div style=\"text-align: center;\"><span style=\"line-height: 1.42857;\">Şube Adı: XXXXXX</span></div>\r\n<div style=\"text-align: center;\"><span style=\"line-height: 1.42857;\">Şube Kodu: </span><span style=\"line-height: 21.4285px;\">XXXXXX</span></div>\r\n<div style=\"text-align: center;\"><span style=\"line-height: 1.42857;\">Hesap No: </span><span style=\"line-height: 21.4285px;\">XXXXXX</span></div>\r\n<div style=\"text-align: center;\"><span style=\"line-height: 1.42857;\">TR87 0006 2002 0120 0006 </span><span style=\"line-height: 21.4285px;\">XXXXXX</span><span style=\"line-height: 1.42857;\"> 19</span></div>\r\n<p style=\"line-height: normal; color: #333333; font-size: 16px;\"> </p>\r\n<div style=\"color: #333333; font-size: 16px; line-height: normal; text-align: center;\"> </div>\r\n<div style=\"text-align: center;\"><span style=\"line-height: 1.42857;\">TÜRKİYE İŞ BANKASI</span></div>\r\n<p style=\"line-height: normal; color: #333333; font-size: 16px;\"> </p>\r\n<div style=\"color: #333333; font-size: 16px; line-height: normal; text-align: center;\"><span style=\"line-height: 21.4286px;\">Alıcı: </span><span style=\"line-height: 21.4285px;\">XXXXXX</span></div>\r\n<div style=\"text-align: center;\"><span style=\"line-height: 1.42857;\">Şube Adı: XXXXXX</span></div>\r\n<div style=\"text-align: center;\"><span style=\"line-height: 1.42857;\">Şube Kodu: </span><span style=\"line-height: 21.4285px;\">XXXXXX</span></div>\r\n<div style=\"text-align: center;\"><span style=\"line-height: 1.42857;\">Hesap No: </span><span style=\"line-height: 21.4285px;\">XXXXXX</span></div>\r\n<div style=\"text-align: center;\"><span style=\"line-height: 1.42857;\">TR87 0006 2002 0120 0006 </span><span style=\"line-height: 21.4285px;\">XXXXXX</span><span style=\"line-height: 1.42857;\"> 19</span></div>\r\n<p><br />                                                                                           smm-bayi.com</p>', '<p><img src=\"tinymce/plugins/emoticons/img/smiley-cry.gif\" alt=\"cry\" /><img src=\"tinymce/plugins/emoticons/img/smiley-cool.gif\" alt=\"cool\" /> Bu bir deneme duyurudur smm-bayi.com </p>', '<p>deneme smm-bayi.com </p>', 20, 5, 50, 10, 100, 25, '', 587, 'tls', 'admin', '12345', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bakiyeler`
--

CREATE TABLE `bakiyeler` (
  `id` int(11) UNSIGNED NOT NULL,
  `acid` int(11) DEFAULT '0',
  `tutar` varchar(25) COLLATE utf8_turkish_ci DEFAULT '0',
  `hediye` varchar(25) COLLATE utf8_turkish_ci DEFAULT '0',
  `gadsoyad` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `banka` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` datetime DEFAULT NULL,
  `durum` int(1) DEFAULT '0',
  `sdurum` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bakiyeler`
--

INSERT INTO `bakiyeler` (`id`, `acid`, `tutar`, `hediye`, `gadsoyad`, `banka`, `tarih`, `durum`, `sdurum`) VALUES
(12, 17, '10', '10', 'Rohat Can', 'papara', '2018-07-19 21:40:45', 1, 1),
(13, 17, '1', '0', 'Rohat Can', 'papara', '2018-07-19 21:46:20', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek_cevaplar`
--

CREATE TABLE `destek_cevaplar` (
  `id` int(11) UNSIGNED NOT NULL,
  `destek_id` int(11) DEFAULT '0',
  `mesaj` text COLLATE utf8_turkish_ci,
  `tarih` datetime DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mti` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek_sistemi`
--

CREATE TABLE `destek_sistemi` (
  `id` int(11) UNSIGNED NOT NULL,
  `konu` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `acid` int(11) DEFAULT '0',
  `tarih` datetime DEFAULT NULL,
  `sg_tarih` datetime DEFAULT NULL,
  `durum` int(1) DEFAULT '0',
  `goruldu` int(1) DEFAULT '0',
  `sdurum` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) UNSIGNED NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` int(11) DEFAULT '0',
  `durum` int(1) DEFAULT '0',
  `icon` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `baslik`, `sira`, `durum`, `icon`) VALUES
(1, 'Test', 1, 0, 'instagram');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `id` int(11) UNSIGNED NOT NULL,
  `acid` int(11) DEFAULT '0',
  `urun_id` int(11) DEFAULT '0',
  `ozel` int(1) DEFAULT '0',
  `miktar` int(11) DEFAULT '0',
  `baglanti` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tutar` decimal(8,2) DEFAULT '0.00',
  `toplam_tutar` decimal(8,2) DEFAULT '0.00',
  `durum` int(1) DEFAULT '0',
  `sdurum` int(1) DEFAULT '0',
  `tarih` datetime DEFAULT NULL,
  `aresponse` text COLLATE utf8_turkish_ci,
  `adurum` int(1) DEFAULT '0',
  `oid` int(11) DEFAULT '0',
  `start_count` int(11) DEFAULT '0',
  `iade` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `iade_tutar` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`id`, `acid`, `urun_id`, `ozel`, `miktar`, `baglanti`, `tutar`, `toplam_tutar`, `durum`, `sdurum`, `tarih`, `aresponse`, `adurum`, `oid`, `start_count`, `iade`, `iade_tutar`) VALUES
(12, 17, 1, 0, 1000, '34000', '5.00', '5.00', 1, 1, '2018-07-19 21:42:26', NULL, 0, 0, 0, '', '0.00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) UNSIGNED NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sira` int(11) DEFAULT '0',
  `kategori_id` int(11) DEFAULT '0',
  `min_adet` int(11) DEFAULT '0',
  `max_adet` int(11) DEFAULT '0',
  `tutar` decimal(8,2) DEFAULT '0.00',
  `baglanti_url_check` int(1) DEFAULT '0',
  `baglanti_value` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` int(1) DEFAULT '0',
  `api_id` int(11) DEFAULT '0',
  `api_servis` int(11) DEFAULT '0',
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `baslik`, `sira`, `kategori_id`, `min_adet`, `max_adet`, `tutar`, `baglanti_url_check`, `baglanti_value`, `durum`, `api_id`, `api_servis`, `aciklama`) VALUES
(1, 'Test ürün', 1, 1, 100, 1000, '5.00', 0, 'https://www.instagram.com/p/BZnRaTIjOA2/', 0, 0, 0, 'testtir bu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` varchar(30) COLLATE utf8_turkish_ci DEFAULT NULL,
  `adsoyad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `olusturma_tarih` datetime DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `son_giris_tarih` datetime DEFAULT NULL,
  `tipi` int(2) DEFAULT '0',
  `durum` int(1) DEFAULT '0',
  `bakiye` decimal(8,2) DEFAULT '0.00',
  `ozel_fiyatlar` text COLLATE utf8_turkish_ci,
  `bildirim` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `username`, `password`, `email`, `telefon`, `adsoyad`, `olusturma_tarih`, `ip`, `son_giris_tarih`, `tipi`, `durum`, `bakiye`, `ozel_fiyatlar`, `bildirim`) VALUES
(1, 'admin', '12345', 'admin@example.com', '', 'Administrator', '2016-07-07 00:00:00', '88.243.14.100', '2018-07-23 23:41:05', 1, 0, '39.25', NULL, 0),
(4, 'demo', 'demo', 'mdicoz34@gmail.com', '', 'Mesut Dinçer İçöz', '2016-07-30 07:16:42', '172.16.1.25', '2017-11-16 18:21:39', 0, 0, '0.00', '[]', 0),
(14, 'gtech', 'delgado2222', 'gtechwebtasarim@gmail.com', '05393600982', 'gokhan', '2017-11-14 21:22:30', '31.177.220.183', '2017-11-14 21:22:30', 0, 0, '0.00', NULL, 0),
(15, 'demomm', 'demommdemommdemomm', 'demomm@demomm.com', '05380000000', 'murat babacan', '2017-11-16 02:05:20', '95.13.147.88', '2017-11-16 02:05:20', 0, 0, '0.00', NULL, 0),
(16, 'safsafasf', '507600', 'info@teknokorsan.com', '', 'Dursun Can PEKŞEN', '2018-07-18 21:03:13', '31.223.6.182', '2018-07-18 21:03:13', 0, 0, '0.00', NULL, 0),
(17, 'rohat1can', '212121', 'bghrohat@gmail.com', '', 'Rohat Can', '2018-07-18 21:03:30', '88.243.14.100', '2018-07-24 22:00:10', 0, 0, '16.00', NULL, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `apiler`
--
ALTER TABLE `apiler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `api_servisler`
--
ALTER TABLE `api_servisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bakiyeler`
--
ALTER TABLE `bakiyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `destek_cevaplar`
--
ALTER TABLE `destek_cevaplar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `destek_sistemi`
--
ALTER TABLE `destek_sistemi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `apiler`
--
ALTER TABLE `apiler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `api_servisler`
--
ALTER TABLE `api_servisler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `bakiyeler`
--
ALTER TABLE `bakiyeler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `destek_cevaplar`
--
ALTER TABLE `destek_cevaplar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `destek_sistemi`
--
ALTER TABLE `destek_sistemi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
