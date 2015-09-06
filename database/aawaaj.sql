-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2015 at 10:04 PM
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
-- Table structure for table `fundraiser`
--

CREATE TABLE IF NOT EXISTS `fundraiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fundraiser_type` varchar(10) NOT NULL,
  `title` varchar(55) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '10000',
  `description` varchar(175) NOT NULL,
  `image` varchar(100) NOT NULL,
  `video_url` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `fundraiser`
--

INSERT INTO `fundraiser` (`id`, `fundraiser_type`, `title`, `amount`, `description`, `image`, `video_url`, `details`, `u_id`) VALUES
(36, 'non_profit', 'again teststest', 850000, 'TEST AGAIN THIS IS TEST', 'http://localhost/Aawaaj//fundraiser/campaign_images/6777248-best-hd-wallpapers.jpg', '', 'TEST AGAIN THIS IS TESTTEST AGAIN THIS IS TESTTEST AGAIN THIS IS TESTTEST AGAIN THIS IS TESTTEST AGAIN THIS IS TESTTEST AGAIN THIS IS TEST', 234);

-- --------------------------------------------------------

--
-- Table structure for table `generaluser`
--

CREATE TABLE IF NOT EXISTS `generaluser` (
  `gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(11) DEFAULT NULL,
  `type` enum('generalUser') NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`gen_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `generaluser`
--

INSERT INTO `generaluser` (`gen_id`, `age`, `type`, `u_id`) VALUES
(15, NULL, 'generalUser', 234);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `doe` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL,
  `address` varchar(60) NOT NULL,
  `objective` text NOT NULL,
  `type` enum('organization') NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`org_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `name`, `doe`, `img`, `address`, `objective`, `type`, `u_id`) VALUES
(2, 'Rotaract', '1994-01-01', 'E:/wamp/www//Aawaaj/public/pictures/orgPictures/111840342_10200714849270344_1026442813_o.jpg', 'Rotaract', 'asdf', 'organization', 238);

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`p_id`, `password`, `u_id`) VALUES
(89, '$2y$12$hioOjjnBmCMxrXJ2cLcKiuFsJAMn4pC8td6RK.IeYo28ByVVKT252', 234),
(93, '$2y$12$GZEcOFM1N.tiB49w0T8gH.D/k7/BS4RfZsHHXJSAqfG5h8fWF0AQm', 238);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_number` int(30) NOT NULL,
  `user_type` enum('generalUser','organization','welfare') NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=239 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `last_name`, `contact_number`, `user_type`, `user_status`, `user_hash`) VALUES
(234, 'vanroshr@gmail.com', 'Pratish', 'Shrestha', 2147483647, 'generalUser', 1, '96601e150a9f349302964aa3ffd92afd'),
(238, 'org@org.com', 'Rotaract', 'org', 2147483647, 'organization', 1, 'b94308dd4591117626fd18796073be44');

-- --------------------------------------------------------

--
-- Table structure for table `welfare`
--

CREATE TABLE IF NOT EXISTS `welfare` (
  `welf_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `doe` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL,
  `address` varchar(60) NOT NULL,
  `service` varchar(30) NOT NULL,
  `objective` text NOT NULL,
  `type` enum('welfare') NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`welf_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fundraiser`
--
ALTER TABLE `fundraiser`
  ADD CONSTRAINT `fundraiser_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `generaluser`
--
ALTER TABLE `generaluser`
  ADD CONSTRAINT `generaluser_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `password_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `welfare`
--
ALTER TABLE `welfare`
  ADD CONSTRAINT `welfare_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
