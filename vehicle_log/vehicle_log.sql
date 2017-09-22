-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2016 at 03:21 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vehicle_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE IF NOT EXISTS `fuel` (
  `fuel_id` int(5) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(5) NOT NULL,
  `type` varchar(15) NOT NULL,
  `cost` decimal(6,0) NOT NULL,
  `brand` varchar(15) NOT NULL,
  PRIMARY KEY (`fuel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12369 ;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`fuel_id`, `vehicle_id`, `type`, `cost`, `brand`) VALUES
(12368, 12361, 'Gasoline', '2', 'Bike Fuel'),
(12367, 12359, 'Gasoline', '12', 'QT'),
(12366, 12365, 'E80', '21', 'Sunco');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE IF NOT EXISTS `maintenance` (
  `maintenance_id` int(5) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(5) NOT NULL,
  `maint_cat` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `vendor` varchar(15) NOT NULL,
  `cost` decimal(6,0) NOT NULL,
  PRIMARY KEY (`maintenance_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12354 ;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenance_id`, `vehicle_id`, `maint_cat`, `date`, `vendor`, `cost`) VALUES
(12353, 12365, 'Windsheild Fix', '2015-02-15', 'Glasso', '123'),
(12352, 12365, 'Oil Change', '2016-04-13', 'Quick lube', '70');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_type`
--

CREATE TABLE IF NOT EXISTS `maintenance_type` (
  `maintenance_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `maintenance_cat` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oil`
--

CREATE TABLE IF NOT EXISTS `oil` (
  `oil_id` int(5) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(5) NOT NULL,
  `brand` varchar(12) NOT NULL,
  `weight` decimal(7,0) NOT NULL,
  `quantity` int(3) NOT NULL,
  PRIMARY KEY (`oil_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12367 ;

--
-- Dumping data for table `oil`
--

INSERT INTO `oil` (`oil_id`, `vehicle_id`, `brand`, `weight`, `quantity`) VALUES
(12359, 12365, 'Shell', '40', 13),
(12366, 12361, 'BP', '10', 78),
(12361, 12359, 'Mobil', '12', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
  `password_id` int(5) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL,
  `last_pw` varchar(20) NOT NULL,
  `pw_age` datetime NOT NULL,
  `date_changed` datetime NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`password_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100018 ;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`password_id`, `password`, `last_pw`, `pw_age`, `date_changed`, `user_id`) VALUES
(100006, 't', 'T', '2016-04-20 19:31:31', '2016-04-20 19:31:31', 100010),
(100010, 'check', 'n/a', '2016-04-13 19:55:56', '2016-04-13 19:55:56', 12345),
(100017, 'example', 'n/a', '2016-04-21 14:22:38', '2016-04-21 14:22:38', 100017),
(100016, 'demo', 'n/a', '2016-04-21 11:50:01', '2016-04-21 11:50:01', 100016),
(0, '4Dm1n', 'admin', '2016-04-20 00:00:00', '2016-04-20 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tire`
--

CREATE TABLE IF NOT EXISTS `tire` (
  `tire_id` int(5) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(5) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` varchar(7) NOT NULL,
  `brand` varchar(12) NOT NULL,
  `new_used` varchar(4) NOT NULL,
  PRIMARY KEY (`tire_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12358 ;

--
-- Dumping data for table `tire`
--

INSERT INTO `tire` (`tire_id`, `vehicle_id`, `type`, `size`, `brand`, `new_used`) VALUES
(12354, 12365, 'General', '12T', 'Michilin', 'New'),
(12356, 12359, 'Weather', '3d', 'Michilin', 'New'),
(12357, 12361, '1', '1f', 'Byke', 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  `password_id` varchar(15) NOT NULL,
  `first_name` varchar(12) NOT NULL,
  `last_name` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(5) NOT NULL,
  `admin_bool` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100018 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `state`, `zip`, `admin_bool`) VALUES
(100017, 'Example', '100017', '$Example', 'Example', 'ex@ex.com', '999-998-9898', 'example', 'There', 'EX', 99989, 0),
(100010, 'User', '100006', 't', 't', 't@t.com', '123-123-1232', 't', 't', 'tt', 12321, 0),
(0, 'Core Admin', '00000', 'Core', 'Admin', 'beatys@gvltec.edu', '000-000-0000', '00', 'NA', 'NA', 0, 1),
(100016, 'Stephen', '100016', '$Stephen', 'Beaty', 'beatys@my.gvltec.edu', '888-888-8888', '17 Place', 'Travelers Rest', 'SC', 29992, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `vehicle_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `type` varchar(10) NOT NULL,
  `make` varchar(10) NOT NULL,
  `model` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `current_mileage` int(7) NOT NULL,
  `oil_recommended` varchar(10) NOT NULL,
  `tire_size` varchar(5) NOT NULL,
  `vin` varchar(18) NOT NULL,
  `license_plate_no` varchar(7) NOT NULL,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12373 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `user_id`, `type`, `make`, `model`, `year`, `current_mileage`, `oil_recommended`, `tire_size`, `vin`, `license_plate_no`) VALUES
(12365, 100010, 'Car', 'Chrystler', 'Seabring', 2003, 45764, 'Synthetic', 'P205', '78231049810286735', '12Y43T4'),
(12359, 100010, 'Car', 'Toyota', 'Cartota', 3838, 55, '55', '55', '78787878787878787', 'Toy Car'),
(12361, 100010, 'Bike', 'Ninja', 'Ninja', 2012, 22, 'Synthetic', 'UL3', '12321232123212321', 'MC 3343'),
(12372, 100017, 'Example', 'Example', 'X Ample', 2222, 98799, 'X', 'X', '89898954545467878', 'X Amp');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type_static`
--

CREATE TABLE IF NOT EXISTS `vehicle_type_static` (
  `car` varchar(3) NOT NULL,
  `truck` varchar(3) NOT NULL,
  `van` varchar(3) NOT NULL,
  `suv` varchar(3) NOT NULL,
  `atv` varchar(3) NOT NULL,
  `bike` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
