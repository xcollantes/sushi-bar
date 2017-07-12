-- phpMyAdmin SQL Dump
-- version 3.3.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2013 at 02:38 PM
-- Server version: 5.1.44
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tunaCafe1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID` varchar(4) NOT NULL,
  `name` varchar(35) NOT NULL,
  `street` varchar(25) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `name`, `street`, `city`, `state`, `zip`) VALUES
('C001', 'Clifton', '1001 Main St.', 'Spokane', 'WA', '99224'),
('C002', 'Schbey', '1005 Rock Rd.', 'Liberty Lake', 'WA', '99109'),
('C003', 'Lingras', '2001 Woodland Ave.', 'Redmond', 'WA', '99356'),
('C004', 'Grove', '4070 Keystone Ave.', 'Redmond', 'WA', '99345'),
('C005', 'Parson', '5790 Division', 'Spokane', 'WA', '99224');

-- --------------------------------------------------------

--
-- Table structure for table `lineitem`
--

CREATE TABLE IF NOT EXISTS `lineitem` (
  `orderID` tinyint(4) NOT NULL,
  `productID` varchar(3) NOT NULL,
  `quantity` tinyint(3) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`orderID`,`productID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lineitem`
--


-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `orderdate` date NOT NULL,
  `customerID` varchar(4) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ID` varchar(3) NOT NULL,
  `name` varchar(15) NOT NULL,
  `description` varchar(35) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `QOH` int(3) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `name`, `description`, `price`, `QOH`) VALUES
('T01', 'Tuna Casserole', '', 9.95, 100),
('T02', 'Tuna Sandwich', '', 7.75, 100),
('T03', 'Tuna Pie', '', 8.65, 100),
('T04', 'Tuna Surprise', '', 8.65, 100),
('T05', 'Grilled Tuna', '', 9.95, 100);
