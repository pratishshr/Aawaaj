-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2015 at 12:04 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aawaaj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `image`) VALUES
(13, 'pratishshr', '$2y$12$V2wdyRmIsEI3VBGh3YulA.vE2X8lxfpdmiIhRP8qLk2bMJMPxL.a6', 'Pratish', 'Shrestha', 'pratishshr@gmail.com', 'http://localhost/Aawaaj/admin/images/pratish.jpg'),
(14, 'sujanshr', '$2y$12$nGxaz2omSoKiHZvIhc.oDuvOaEizXb/gyWzglUXrZm5VZgRkNSJQ2', 'Sujan', 'Shrestha', 'sujanshr@gmail.com', 'http://localhost/Aawaaj/admin/images/sujan.jpg'),
(15, 'malakar', '$2y$12$9FDhalJrICX4EkgNI5YEoe520AoVJ//D3awWpYs5M2qXLi15tuO9K', 'Sujan', 'Malakar', 'malakar@gmail.com', 'http://localhost/Aawaaj/admin/images/malakar.jpg'),
(16, 'romit', '$2y$12$/fofNDehYJb4YVgiwj.0ye7Nf1TUH77H5/sDVU14eiiNAyGnjm38a', 'Romit', 'Amgai', 'romitamgai@gmail.com', 'http://localhost/Aawaaj/admin/images/romit.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
