-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 21 jun 2022 om 12:13
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easydrive4all`
--
CREATE DATABASE IF NOT EXISTS `easydrive4all` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `easydrive4all`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `license_plate` varchar(10) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `electric` int(1) NOT NULL,
  PRIMARY KEY (`license_plate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `cars`
--

INSERT INTO `cars` (`license_plate`, `brand`, `model`, `electric`) VALUES
('7FG21A', 'Audi', 'R8', 0),
('8GGE571', 'Hyundai', 'Santa Fe Sport', 0),
('AL46187', 'BMW', 'BMW3 Series 340xi', 1),
('JDLJ20', 'Ford', 'FordC-Max SEL', 1),
('QE1337', 'Nissan', 'Qashqai', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cars1`
--

DROP TABLE IF EXISTS `cars1`;
CREATE TABLE IF NOT EXISTS `cars1` (
  `license_plate` varchar(8) NOT NULL,
  `Type` varchar(25) NOT NULL,
  PRIMARY KEY (`license_plate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `cars1`
--

INSERT INTO `cars1` (`license_plate`, `Type`) VALUES
('90-KL-TR', 'Fiat 500'),
('AU-67-IO', 'Golf'),
('TH-78-KL', 'Ferrari'),
('YY-OP-78', 'Mercedes');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `instructors`
--

DROP TABLE IF EXISTS `instructors`;
CREATE TABLE IF NOT EXISTS `instructors` (
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `license_plate` varchar(10) NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_car_license_plate` (`license_plate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `instructors`
--

INSERT INTO `instructors` (`email`, `firstname`, `lastname`, `phonenumber`, `address`, `license_plate`) VALUES
('alexvos@gmail.com', 'Alex', 'Vos', 678965412, 'Stationstraat 34', '8GGE571'),
('harrydop@gmail.com', 'Harry', 'Dop', 643892150, 'Harrylaan 301', 'QE1337'),
('marinusmeijer@gmail.com', 'Marinus', 'Meijer', 684957652, 'hansandersstraat 23', 'JDLJ20'),
('matsvos@gmail.com', 'Mats', 'Vos', 631248585, 'Hendrickslaan12', 'AL46187'),
('pepijnveenstra@gmail.com', 'Pepijn', 'Veenstra', 645698712, 'Oranjestraat 152', '8GGE571');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `mileage`
--

DROP TABLE IF EXISTS `mileage`;
CREATE TABLE IF NOT EXISTS `mileage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `mileage` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_license_plate_car` (`car`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `mileage`
--

INSERT INTO `mileage` (`id`, `car`, `date`, `mileage`) VALUES
(43, 'YY-OP-78', '2022-06-21', 70802),
(44, 'TH-78-KL', '2022-05-19', 12670),
(45, 'AU-67-IO', '2022-05-20', 60345),
(46, '90-KL-TR', '2022-05-21', 21300),
(47, 'AU-67-IO', '2022-05-21', 60900);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `fk_car_license_plate` FOREIGN KEY (`license_plate`) REFERENCES `cars` (`license_plate`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `mileage`
--
ALTER TABLE `mileage`
  ADD CONSTRAINT `fk_license_plate_car` FOREIGN KEY (`car`) REFERENCES `cars1` (`license_plate`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
