-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 14 jun 2022 om 14:56
-- Serverversie: 5.7.31
-- PHP-versie: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easydriveforall`
--
CREATE DATABASE IF NOT EXISTS `easydriveforall` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `easydriveforall`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lessonpackage`
--

DROP TABLE IF EXISTS `lessonpackage`;
CREATE TABLE IF NOT EXISTS `lessonpackage` (
  `lessonpackageid` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `packagename` varchar(200) NOT NULL,
  `packagedescription` varchar(200) NOT NULL,
  PRIMARY KEY (`lessonpackageid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lessonpackage`
--

INSERT INTO `lessonpackage` (`lessonpackageid`, `packagename`, `packagedescription`) VALUES
(1, 'Super Speed Package', 'For the experienced including 7 lessons'),
(2, 'Small Package', '15 Lessons for the quick studies'),
(3, 'Basic Package', '20 Lessons enough for the default learner'),
(4, 'Special Package', '25 Lessons, just in case'),
(5, 'Extra Package', '30 Lessons, for the ones who enjoy the company');

-- --------------------------------------------------------


--
-- Tabelstructuur voor tabel `visitor`
--

DROP TABLE IF EXISTS `visitor`;
CREATE TABLE IF NOT EXISTS `visitor` (
  `email` varchar(200) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `infix` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `lessonpackage` int(2) UNSIGNED NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `visitor`
--

INSERT INTO `visitor` (`email`, `firstname`, `infix`, `lastname`, `lessonpackage`) VALUES
('abe@info.org', 'Abe', 'Bejing', 'Li', 1),
('bee@info.org', 'Bee', 'Dodoma', 'Chang', 2),
('coen@info.org', 'Coen', 'Tokyo', 'Klomp', 3),
('dick@info.org', 'Dick', 'Dakar', 'Zen', 1),
('emanuel@info.org', 'Emanuel', 'Ridder', 'Europa', 2),
('frank@info.org', 'Frank', 'Bern', 'Smith', 2);

ALTER TABLE visitor
    ADD CONSTRAINT fk_visitor_lessonpackage_id
    FOREIGN KEY (lessonpackage)
    REFERENCES lessonpackage(lessonpackageid);

-- --------------------------------------------------------


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
