-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2014 at 06:07 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` varchar(50) NOT NULL,
  `no_of_passengers` int(11) NOT NULL,
  `sitting_position` varchar(50) NOT NULL,
  `scheduled_destination` varchar(50) NOT NULL,
  `cost` int(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `passenger` varchar(50) NOT NULL,
  `ticket_status` varchar(50) NOT NULL,
  `booking_nature` varchar(50) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `route` (`scheduled_destination`),
  KEY `passenger` (`passenger`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_companies`
--

CREATE TABLE IF NOT EXISTS `bus_companies` (
  `reg_no` varchar(50) NOT NULL,
  `kra_pin` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `physical_address` varchar(100) NOT NULL,
  `postal_address` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  PRIMARY KEY (`reg_no`),
  UNIQUE KEY `kra_pin` (`kra_pin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_companies`
--

INSERT INTO `bus_companies` (`reg_no`, `kra_pin`, `company_name`, `physical_address`, `postal_address`, `telephone`) VALUES
('BC001', 'A000001', 'EASY COACH LTD', 'NAIROBI', 'P.O. Box 1000-0100 Nairobi', '0710502654');

-- --------------------------------------------------------

--
-- Table structure for table `bus_company_rating`
--

CREATE TABLE IF NOT EXISTS `bus_company_rating` (
  `rating_id` varchar(50) NOT NULL,
  `pricing` int(11) NOT NULL,
  `punctuality` int(11) NOT NULL,
  `customer_relations` int(11) NOT NULL,
  `road_discipline` int(11) NOT NULL,
  `overall` int(11) NOT NULL,
  `score` double NOT NULL,
  `bus_company` varchar(50) NOT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `bus_company` (`bus_company`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fleet`
--

CREATE TABLE IF NOT EXISTS `fleet` (
  `bus_reg_no` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `bus_company` varchar(50) NOT NULL,
  PRIMARY KEY (`bus_reg_no`),
  KEY `bus_company` (`bus_company`),
  KEY `bus_company_2` (`bus_company`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `bus_company_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`login_id`),
  KEY `user_id` (`user_id`,`bus_company_id`),
  KEY `bus_company_id` (`bus_company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `password`, `account_type`, `user_id`, `bus_company_id`) VALUES
(2, 'wahomekelvin@yahoo.com', 'wahome', 'PREMIUM USER', '29799900', NULL),
(3, 'sammiemwangi4@gmail.com', 'samuele', 'ADMIN', '29349805', NULL),
(4, 'easycoach@easycoach.co.ke', 'easycoach', 'BUS COMPANY', NULL, 'BC001'),
(5, 'trial@gmail.com', 'trial', 'PREMIUM USER', NULL, NULL),
(6, 'kevowahome@gmail.com', 'wellington', 'PREMIUM USER', NULL, NULL),
(7, 'oxygen@oxygen.co.ke', 'oxygen', 'BUS COMPANY', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_id` varchar(50) NOT NULL,
  `bus` varchar(50) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `price` int(50) NOT NULL,
  PRIMARY KEY (`schedule_id`),
  KEY `bus` (`bus`,`origin`,`destination`),
  KEY `origin` (`origin`),
  KEY `destination` (`destination`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE IF NOT EXISTS `stations` (
  `station_code` varchar(50) NOT NULL,
  `station_name` varchar(50) NOT NULL,
  PRIMARY KEY (`station_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_no` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_no`, `name`, `gender`, `mobile_no`) VALUES
('29349805', 'SAMMUEL MWANGI', 'MALE', '0717156850'),
('29799900', 'KELVIN WAHOME MACHARIA', 'MALE', '0710502654');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`passenger`) REFERENCES `users` (`id_no`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`scheduled_destination`) REFERENCES `schedule` (`schedule_id`);

--
-- Constraints for table `bus_company_rating`
--
ALTER TABLE `bus_company_rating`
  ADD CONSTRAINT `bus_company_rating_ibfk_1` FOREIGN KEY (`bus_company`) REFERENCES `bus_companies` (`reg_no`);

--
-- Constraints for table `fleet`
--
ALTER TABLE `fleet`
  ADD CONSTRAINT `fleet_ibfk_1` FOREIGN KEY (`bus_company`) REFERENCES `bus_companies` (`reg_no`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`bus_company_id`) REFERENCES `bus_companies` (`reg_no`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_no`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`bus`) REFERENCES `fleet` (`bus_reg_no`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`origin`) REFERENCES `stations` (`station_code`),
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`destination`) REFERENCES `stations` (`station_code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
