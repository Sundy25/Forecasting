-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.1
-- Generation Time: Jan 08, 2014 at 07:25 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forecasting`
--

-- --------------------------------------------------------

--
-- Table structure for table `forcasting`
--

CREATE TABLE IF NOT EXISTS `forcasting` (
  `row` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(100) DEFAULT NULL,
  `ma3` double DEFAULT NULL,
  `ma5` double DEFAULT NULL,
  `c` int(11) DEFAULT NULL,
  `ft` double DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `forcasting`
--

INSERT INTO `forcasting` (`row`, `bulan`, `ma3`, `ma5`, `c`, `ft`) VALUES
(1, 'januari', NULL, NULL, 160, 0),
(2, 'februari', NULL, NULL, 130, 160),
(3, 'Maret', NULL, NULL, 140, 151),
(4, 'April', 143.33333333333, NULL, 115, 147.7),
(5, 'Mei', 128.33333333333, NULL, 150, 137.89),
(6, 'Juni', 135, 139, 90, 141.523),
(7, 'Juli', 118.33333333333, 125, 115, 126.0661),
(8, 'Agustus', 118.33333333333, 122, 170, 122.74627),
(9, 'September', 125, 128, 160, 136.922389),
(10, 'Oktober', 148.33333333333, 137, 130, 143.8456723),
(11, 'november', 153.33333333333, 133, NULL, 139.69197061);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
