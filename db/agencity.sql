-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2016 at 09:34 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agencity`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advisers`
--

CREATE TABLE IF NOT EXISTS `tbl_advisers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siret` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `socialreason` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tradename` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(130) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `civ` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `websiteurl` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `photo_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float NOT NULL DEFAULT '0',
  `lon` float NOT NULL DEFAULT '0',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_advisers`
--

INSERT INTO `tbl_advisers` (`id`, `siret`, `type`, `socialreason`, `tradename`, `address`, `cp`, `city`, `phone`, `fax`, `email`, `civ`, `firstname`, `lastname`, `websiteurl`, `photo_url`, `lat`, `lon`, `username`, `password`) VALUES
(1, '', 'Agence', 'Agencity - Bussy', 'Agencity - Bussy', '8 Place de la Liberation', '77600', 'Bussy-Saint-Georges 77600', '0164775203', '0164661892', 'bussy@agencity.com', '', 'JOEL', 'BONSERGENT', 'www.agencity.com', '', 48.836, 2.709, '', ''),
(2, '', 'Agence', 'Agencity - Torcy', 'Agencity - Torcy', '6 promenade du 7?me Art', '77200', 'Torcy 77200', '0164112015', '0164110601', 'torcy@agencity.com', '', 'PATRIK', 'DUPONT', 'www.agencity.com', '', 48.85, 2.65, '', ''),
(3, '', 'Agence', 'Agencity - Lognes', 'Agencity - Lognes', '3 cours des Lacs', '77185', 'Lognes 77185', '0160332952', '0160330218', 'lognes@agencity.com', '', 'FABIEN', 'STEPHAN', 'http://www.agencity.com', '', 48.839, 2.63, '', ''),
(4, '11', 'hkh', 'vh', 'vhj', 'vhhvh', 'lkhl', 'dist.jalna', '7767032118', 'kjbkjbkj', 'vgaikwad332@gmail.com', 'gvg', 'vvvvvvvv', 'Gaikwad Vishnu bhaurao', 'hhhh', '', 21, 66, '', 'asdfgh'),
(5, '34', 'nklj', 'bytkj', 'biy', 'hiujon', 'ginik', 'biu', 'bio', 'ini', 'bii', '432', 'Vishnu', 'Jadhav', 'xa', '', 33, 77, '0', 'vishnu'),
(6, '11', 'hkh', 'vh', 'vhj', 'vhhvh', 'lkhl', 'dist.jalna', '7767032118', 'kjbkjbkj', 'vgaikwad332@gmail.com', 'gvg', 'Vishnu', 'ggggg', 'hhhh', '', 21, 66, 'Vishnu ggggg', 'asdfcds');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE IF NOT EXISTS `tbl_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buy_or_rent` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `geolocation` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `isnew` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `type_of_property` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(8) NOT NULL,
  `surface_area` int(5) NOT NULL,
  `no_of_rooms` int(3) NOT NULL,
  `no_of_bedrooms` int(3) NOT NULL,
  `photo_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estate` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `particularites` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pieces` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `stationnment` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `aproximite` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `photo_url1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo_url2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo_url3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo_url4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ref` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float NOT NULL DEFAULT '0',
  `lon` float NOT NULL DEFAULT '0',
  `wc` int(20) NOT NULL,
  `salle_de_bain` int(20) NOT NULL,
  `construit_en` year(4) NOT NULL,
  `dpe` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ges` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prop_description` text COLLATE utf8_unicode_ci NOT NULL,
  `adv_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`id`, `buy_or_rent`, `city`, `zip`, `geolocation`, `isnew`, `type_of_property`, `price`, `surface_area`, `no_of_rooms`, `no_of_bedrooms`, `photo_url`, `estate`, `particularites`, `pieces`, `stationnment`, `aproximite`, `photo_url1`, `photo_url2`, `photo_url3`, `photo_url4`, `ref`, `lat`, `lon`, `wc`, `salle_de_bain`, `construit_en`, `dpe`, `ges`, `prop_description`, `adv_id`) VALUES
(1, 'Buy', 'Torcy 77200', '77200', '', 'Yes', 'Appartement', 50000, 65, 2, 2, '', 'Ascenseur', 'Terrain/jardin', 'WC séparés', 'Garage', 'Commerces', '', '', '', '', '12547879', 48.85, 2.65, 2, 2, 1975, '215', '76', 'dscalkn asddnlk alnakd andlkdc lkancalkc lknqlfnqfqfndgbb knbedinbnd elnvindsv', '1'),
(2, 'Rent', 'Lognes 77185', '77185', '', 'Yes', 'Appartement', 30000, 70, 2, 2, '', 'Ascenseur', 'Terrain/jardin', 'WC séparés', 'Garage', 'Commerces', '', '', '', '', '12547254', 48.839, 2.63, 0, 0, 0000, '', '', '', '2'),
(3, 'Buy', 'Pune', '77186', '', 'Yes', 'Appartement', 20000, 2000, 4, 2, 'photo_url/4.png', 'Digicode', 'Terrasse', 'WC Separes', 'Parking', 'Transports en commun', 'photo_url/5.png', 'photo_url/design.jpg', 'photo_url/ganttchart.png', 'photo_url/kartutwa.png', '12547992', 18.5204, 73.8567, 0, 0, 0000, '66', '', '', '2'),
(4, 'Buy', 'Jalna', '431502', '', 'Yes', 'Maison', 0, 0, 0, 0, '', 'Ascenseur', 'Terrain/Jardin', 'WC Separes', 'Garage', 'Commerces', '', '', '', '', '12547874', 19.6807, 75.9928, 2, 2, 1975, '63', '94', '', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
