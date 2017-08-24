-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2016 at 10:07 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `glassesrus`
--
CREATE DATABASE IF NOT EXISTS `glassesrus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `glassesrus`;

-- --------------------------------------------------------

--
-- Table structure for table `appetizers`
--

CREATE TABLE IF NOT EXISTS `appetizers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(496) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `appetizers`
--

INSERT INTO `appetizers` (`ID`, `Name`, `Price`) VALUES
(22, 'Edamame ', 5),
(23, 'Chicken Wings', 7),
(24, 'Gyoza(Veggie)', 7),
(25, 'Gyoza(Pork)', 8),
(26, 'Hamachi Jalepeno', 13),
(27, 'Baked Mussels', 13),
(28, 'Tempura and Vegetables', 13),
(29, 'Tuna Tataki', 13),
(30, 'Hamachi Kama', 15);

-- --------------------------------------------------------

--
-- Table structure for table `crafts of sake`
--

CREATE TABLE IF NOT EXISTS `crafts of sake` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(4096) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `crafts of sake`
--

INSERT INTO `crafts of sake` (`ID`, `Name`, `Price`) VALUES
(1, 'Onikoroshi', 15),
(2, 'Otokyoma ', 13),
(3, 'Suishin ', 13),
(4, 'Junimai', 12),
(5, 'Nigori ', 18),
(6, 'Tyku ', 12);

-- --------------------------------------------------------

--
-- Table structure for table `japanese beer`
--

CREATE TABLE IF NOT EXISTS `japanese beer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(4096) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `japanese beer`
--

INSERT INTO `japanese beer` (`ID`, `Name`, `Price`) VALUES
(1, 'Sapporo ', 9),
(2, 'Kirin Ichiban', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nigiri/sashimi`
--

CREATE TABLE IF NOT EXISTS `nigiri/sashimi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(496) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `nigiri/sashimi`
--

INSERT INTO `nigiri/sashimi` (`ID`, `Name`, `Price`) VALUES
(1, 'Aji', 8),
(2, 'Albacore', 7),
(3, 'Ama Ebi', 8),
(4, 'Ebi', 7),
(5, 'Mutsu', 8),
(6, 'Toro', 8),
(7, 'Kani', 8),
(8, 'Sake', 8),
(9, 'Maguro', 7),
(10, 'Hamachi ', 5),
(11, 'Hirame ', 7),
(12, 'Suzuki', 7),
(13, 'Unagi', 8),
(14, 'Saba ', 6),
(15, 'Smoked Sake', 6),
(16, 'Ikura', 5),
(17, 'Tobiko', 5),
(18, 'Uni', 8),
(19, 'Hotate', 8),
(20, 'Kabashira ', 7),
(21, 'Hokkigai ', 8),
(22, 'Ika', 7),
(23, 'Tako', 7),
(24, 'Tamago', 6),
(25, 'Tai', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sushi roll`
--

CREATE TABLE IF NOT EXISTS `sushi roll` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(4096) NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `sushi roll`
--

INSERT INTO `sushi roll` (`ID`, `Name`, `Price`) VALUES
(1, 'California Roll', 7),
(2, 'Negihama', 7),
(3, 'Spicy Tuna Roll', 8),
(4, 'Spicy Salmon Roll', 8),
(5, 'Dynamite Roll', 8),
(6, 'Salmon Skin Roll', 8),
(7, 'Unagi Roll', 8),
(8, 'Boston Roll ', 9),
(9, 'Philadelphia Roll', 9),
(10, 'Spider Roll ', 12),
(11, 'Caterpillar Roll', 12),
(12, 'Crunchy Roll', 12),
(13, 'Alaskan Roll', 12),
(14, 'Tiger Roll', 13),
(15, 'Winter Roll', 13),
(16, 'Las Vegas Roll', 15),
(17, 'Pearl Roll', 15),
(18, 'Rainbow Roll', 15),
(19, 'Dragon Roll', 15),
(20, 'Number 9 Roll', 16),
(21, 'Sweet Heart Roll', 18),
(22, 'Godzilla Roll', 18),
(23, 'Mango Tuna Roll', 18),
(24, 'Seattle Roll', 18),
(25, 'Lobster Roll', 20),
(26, 'Fire Cracker Roll', 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
