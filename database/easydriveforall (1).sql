-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2022 at 12:35 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

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
-- Table structure for table `annulerenlessen`
--

DROP TABLE IF EXISTS `annulerenlessen`;
CREATE TABLE IF NOT EXISTS `annulerenlessen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `les` int(11) NOT NULL,
  `reden` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `les` (`les`)
) ENGINE=MyISAM AUTO_INCREMENT=2370 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annulerenlessen`
--

INSERT INTO `annulerenlessen` (`id`, `les`, `reden`) VALUES
(2343, 45, 'Corona'),
(2344, 50, 'griep'),
(2345, 52, 'voet bezeerd'),
(2364, 56, 'dood'),
(2362, 55, 'gebrokenbeen');

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

DROP TABLE IF EXISTS `auto`;
CREATE TABLE IF NOT EXISTS `auto` (
  `Kenteken` varchar(10) NOT NULL,
  `Model` varchar(50) NOT NULL,
  PRIMARY KEY (`Kenteken`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`Kenteken`, `Model`) VALUES
('AU-67-IO', 'Golf'),
('TH-78-KL', 'Ferrari'),
('90-KL-TR', 'Fiat 500'),
('YY-OP-78', 'Mercedes'),
('90-KL-TF', 'Fiat 600');

-- --------------------------------------------------------

--
-- Table structure for table `instructeur`
--

DROP TABLE IF EXISTS `instructeur`;
CREATE TABLE IF NOT EXISTS `instructeur` (
  `email` varchar(50) NOT NULL,
  `naam` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructeur`
--

INSERT INTO `instructeur` (`email`, `naam`) VALUES
('groen@mail.nl', 'groen'),
('konijn@google.com', 'konijn'),
('frasi@google.sp', 'frasi'),
('blauw@gmail.com', 'blauw'),
('paars@gmail.com', 'paars');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `instructoremail` varchar(100) NOT NULL,
  `instructorname` varchar(100) NOT NULL,
  `phonenumber` int(50) NOT NULL,
  `les_id` int(50) NOT NULL,
  PRIMARY KEY (`instructoremail`),
  KEY `les_id` (`les_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructoremail`, `instructorname`, `phonenumber`, `les_id`) VALUES
('instructor@gmail.com', 'instructor', 612344567, 1),
('instructor2@gmail.com', 'instructor2', 1612344569, 2),
('instructor3@gmail.com', 'henk', 600000000, 3),
('harry@gmail.com', 'harry', 600000005, 4),
('sherick@gmail.com', 'sherick', 612344569, 5);

-- --------------------------------------------------------

--
-- Table structure for table `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `woonplaats` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `straat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leerling`
--

INSERT INTO `leerling` (`id`, `naam`, `woonplaats`, `postcode`, `straat`) VALUES
(3, 'Konijn', 'Utrecht', '3590 UV', 'Laan 45'),
(4, 'slavink', 'nieuwegein', '3678 II', 'Overweg 7'),
(6, 'Otto', 'houten', '3822 AS', 'Groenlo 44'),
(2, 'Aron', 'Utrecht', '4215 PH', 'mooiestraat'),
(1, 'maric', 'Alphen', '5215 AL', 'Alphsestraat');

-- --------------------------------------------------------

--
-- Table structure for table `les`
--

DROP TABLE IF EXISTS `les`;
CREATE TABLE IF NOT EXISTS `les` (
  `les_id` int(11) NOT NULL AUTO_INCREMENT,
  `instructorname` varchar(50) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `lessondate` datetime NOT NULL,
  PRIMARY KEY (`les_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `les`
--

INSERT INTO `les` (`les_id`, `instructorname`, `studentname`, `lessondate`) VALUES
(1, 'instructor', 'student', '2022-06-21 20:25:30'),
(2, 'instructor2', 'student2', '2022-06-24 10:28:52'),
(3, 'instructor3', 'student3', '2022-06-30 08:56:36'),
(4, 'instructor4', 'student4', '2022-06-30 08:58:12'),
(5, 'instructor5', 'student5', '2022-07-20 08:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `lessen`
--

DROP TABLE IF EXISTS `lessen`;
CREATE TABLE IF NOT EXISTS `lessen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Datum` date NOT NULL,
  `leerling` int(11) NOT NULL,
  `instructeur` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'd',
  PRIMARY KEY (`id`),
  KEY `leerling` (`leerling`),
  KEY `instructeur` (`instructeur`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessen`
--

INSERT INTO `lessen` (`id`, `Datum`, `leerling`, `instructeur`, `status`) VALUES
(45, '2022-05-20', 3, 'groen@mail.nl', 'z'),
(46, '2022-05-20', 6, 'frasi@google.sp', 'd'),
(47, '2022-05-21', 4, 'konijn@google.com', 'd'),
(48, '2022-05-22', 6, 'frasi@google.sp', 'd'),
(49, '2022-05-22', 3, 'groen@mail.nl', 'd'),
(50, '2022-05-28', 4, 'konijn@google.com', 'd'),
(51, '2022-06-01', 3, 'konijn@google.com', 'd'),
(52, '2022-06-12', 3, 'groen@mail.nl', 'd'),
(53, '2022-06-22', 3, 'groen@mail.nl', 'd'),
(54, '2022-06-24', 4, 'konijn@google.com', 'd'),
(55, '2022-06-24', 3, 'groen@mail.nl', 'd'),
(56, '2022-06-28', 3, 'frasi@google.sp', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `mankement`
--

DROP TABLE IF EXISTS `mankement`;
CREATE TABLE IF NOT EXISTS `mankement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Auto` varchar(50) NOT NULL,
  `Datum` timestamp NOT NULL,
  `Mankement` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Auto` (`Auto`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mankement`
--

INSERT INTO `mankement` (`id`, `Auto`, `Datum`, `Mankement`) VALUES
(45, 'AU-67-IO', '2022-05-19 22:00:00', 'Rechter achterlicht kapot'),
(46, '90-KL-TR', '2022-05-20 22:00:00', 'Bumper ingedeukt'),
(47, 'AU-67-IO', '2022-05-20 22:00:00', 'Radio kapot'),
(48, 'AU-67-IU', '2022-06-09 22:00:00', 'test'),
(57, 'AU-67-IO', '2022-06-21 13:05:50', '5326531'),
(56, 'AU-67-IO', '2022-06-21 13:03:55', 'skljsl'),
(52, 'AU-67-IO', '2022-06-21 12:29:08', 'sdsfdsfljk'),
(53, 'AU-67-IO', '2022-06-21 12:29:17', 'gerrit'),
(54, 'AU-67-IO', '2022-06-21 12:49:21', 'saf'),
(55, 'TH-78-KL', '2022-06-21 12:49:55', 'asf'),
(58, 'AU-67-IO', '2022-06-21 13:15:57', 'achterlampie');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `studentemail` varchar(100) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `phonenumber` int(50) NOT NULL,
  `streetname` varchar(50) NOT NULL,
  `les_id` int(50) NOT NULL,
  PRIMARY KEY (`studentemail`),
  KEY `les_id` (`les_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentemail`, `studentname`, `phonenumber`, `streetname`, `les_id`) VALUES
('student@gmail.com', 'student', 612344569, 'studentstraat', 1),
('student2@gmail.com', 'student2', 600000001, 'student2straat', 2),
('studentemail3@gmail.com', 'student3', 612344569, 'student3straat', 3),
('studentemail4@gmail.com', 'student4', 1612344569, 'student4straat', 4),
('studentemail5@gmail.com', 'student4', 600000000, 'student5straat', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
