-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 02:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kontaktus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `Full Name` text NOT NULL,
  `Email Address` text NOT NULL,
  `Username` text NOT NULL,
  `password` text NOT NULL,
  `Registered` text NOT NULL,
  `Rank` enum('1','2','','') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Full Name`, `Email Address`, `Username`, `password`, `Registered`, `Rank`) VALUES
(1, 'Riste Dimitrievski', 'riste@programming-hq.pro', 'Riste', 'afca37fd5fb47b91991a8d81af909007', '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `logovi`
--

CREATE TABLE IF NOT EXISTS `logovi` (
`id` int(11) NOT NULL,
  `IP` text NOT NULL,
  `Detalje` text NOT NULL,
  `datum` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logovi`
--

INSERT INTO `logovi` (`id`, `IP`, `Detalje`, `datum`) VALUES
(1, '::1', 'Neuspesni pokusaj da se uloguje na panelu', '20.03.2017'),
(2, '::1', 'Neuspesni pokusaj da se uloguje na panelu', '20.03.2017'),
(3, '::1', 'Neuspesni pokusaj da se uloguje na panelu', '20.03.2017'),
(4, '::1', 'Neuspesni pokusaj da se uloguje na panelu', '20.03.2017'),
(5, '::1', 'Neuspesni pokusaj da se uloguje na panelu', '21.03.2017');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `Client Email` text NOT NULL,
  `Subject` text NOT NULL,
  `Message` text NOT NULL,
  `Date` text NOT NULL,
  `Client IP` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `Client Email`, `Subject`, `Message`, `Date`, `Client IP`) VALUES
(1, 'test@gmail.com', 'Testr', 'hahah', '20.Mar.2017', '::1'),
(2, 'test@gmail.com', 'Riste', 'hahaaaa', '20.Mar.2017', '::1'),
(3, 'sadasdasd@gmail.com', 'sdadsa', 'dsadsadsa', '20.Mar.2017', '::1'),
(4, 'themrtutmr@gmail.com@gmail.com', 'Test', '222555254585', '20.Mar.2017', '::1'),
(5, 'ivicailles@gmail.com.com', 'Refund', '2025552', '20.Mar.2017', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logovi`
--
ALTER TABLE `logovi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logovi`
--
ALTER TABLE `logovi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
