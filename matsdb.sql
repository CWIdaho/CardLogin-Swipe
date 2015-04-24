-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2015 at 11:31 PM
-- Server version: 5.1.72-community
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `matsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `empid` varchar(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  PRIMARY KEY (`empid`),
  UNIQUE KEY `empid` (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(0, 'superuser'),
(1, 'admin'),
(2, 'staff'),
(3, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `studinst`
--

CREATE TABLE IF NOT EXISTS `studinst` (
  `studid` varchar(10) NOT NULL,
  `staffid` varchar(10) NOT NULL,
  PRIMARY KEY (`studid`,`staffid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studinst`
--

INSERT INTO `studinst` (`studid`, `staffid`) VALUES
('0089031', '72173'),
('0105996', '72173');

-- --------------------------------------------------------

--
-- Table structure for table `swipes`
--

CREATE TABLE IF NOT EXISTS `swipes` (
  `swipeid` bigint(255) NOT NULL AUTO_INCREMENT,
  `cwiid` varchar(10) NOT NULL,
  `location` varchar(10) NOT NULL,
  `swipedate` date DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `swipetype` char(1) DEFAULT NULL,
  PRIMARY KEY (`swipeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `swipes`
--

INSERT INTO `swipes` (`swipeid`, `cwiid`, `location`, `swipedate`, `timein`, `timeout`, `swipetype`) VALUES
(4, '0105996', 'APIN1402I1', '2015-04-23', '15:27:53', '16:42:53', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `cwiid` varchar(10) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  PRIMARY KEY (`cwiid`),
  UNIQUE KEY `cwiid` (`cwiid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`cwiid`, `fname`, `lname`, `email`, `password`) VALUES
('0049591', 'Jason', 'Abbruzzetti', 'jasonabbruzzetti@mycwi.cc', '58c5e817cd40296e8d797c6ebb8c6608'),
('0089031', 'Eileen', 'Chavez', 'eileenchavez@mycwi.cc', '44791b9470db00717475cd6aff88f42e'),
('0105996', 'David', 'Kemp', 'davidkemp@mycwi.cc', '44791b9470db00717475cd6aff88f42e'),
('0114847', 'Amanda', 'Williams', 'amywilliams2@mycwi.cc', '5f4dcc3b5aa765d61d8327deb882cf99'),
('72173', 'Jenny', 'Wokersien', 'jennywokersien@cwidaho.cc', '44791b9470db00717475cd6aff88f42e');

-- --------------------------------------------------------

--
-- Table structure for table `usersrole`
--

CREATE TABLE IF NOT EXISTS `usersrole` (
  `userid` varchar(10) NOT NULL,
  `roleid` int(10) NOT NULL,
  PRIMARY KEY (`userid`,`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersrole`
--

INSERT INTO `usersrole` (`userid`, `roleid`) VALUES
('0049591', 0),
('0089031', 3),
('0105996', 3),
('0114847', 1),
('72173', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
