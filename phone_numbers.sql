-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 27 May 2022, 14:14:20
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `phone_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `id` int(11) NOT NULL,
  `phone_number` varchar(56) COLLATE utf8mb4_turkish_ci NOT NULL,
  `isim` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `phone_numbers`
--

INSERT INTO `phone_numbers` (`id`, `phone_number`, `isim`) VALUES
(115, '+90 539 724 50 35', 'Mithat Can'),
(116, '+90 212 568 55 44', 'Mithat Can'),
(120, '+90 534 732 56 92', 'Mithat Can'),
(121, '+90 555 632 98 00', 'Oğuzcan'),
(122, '+90 312 904 50 22', 'Oğuzcan'),
(123, '+90 535 842 30 90', 'Mithat Can'),
(127, '+90 535 842 30 91', 'Mithat Can'),
(132, '+90 534 732 56 91', 'Mithat Can');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
