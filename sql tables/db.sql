-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2012 at 11:25 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nostone`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `dob` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `uname`, `password`, `email`, `first_name`, `last_name`, `dob`) VALUES
(3, 'alan', '66aac3f6df75722090a812c854b182a705995046', '', 'Alan', 'Layt', 0),
(4, 'test', 'test', 'test@test.com', 'test', 'test', 0),
(5, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@test.com', 'test', 'test', 2012),
(6, 'test', '66aac3f6df75722090a812c854b182a705995046', 'test@test.com', 'test', 'test', 2012),
(7, 'test', '66aac3f6df75722090a812c854b182a705995046', 'test@test.com', 'test', 'tetst', 2012),
(8, 'test2', '66aac3f6df75722090a812c854b182a705995046', 'test@test.com', 'test', 'tetst', 2012);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `key` text NOT NULL,
  `uid` int(11) NOT NULL,
  `ip` text NOT NULL,
  `loggedin` int(11) NOT NULL,
  `lastPing` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sid`, `key`, `uid`, `ip`, `loggedin`, `lastPing`) VALUES
(6, 'c08452bfebf7b33c9281a07fac17feafd73c9eb2', 6, '127.0.0.1', 1, 1352191025),
(7, '7440dd3202f5dbbf1a5af096cd3cc1de505d0bb2', 3, '127.0.0.1', 1, 1352196074),
(12, '642b74f00028650af63907d38235aaddde9c6016', 3, '127.0.0.1', 1, 1352197307);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
