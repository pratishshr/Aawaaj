-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2015 at 09:34 PM
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
-- Table structure for table `donations`
--

CREATE TABLE IF NOT EXISTS `donations` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `txn_id` int(11) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `item_number` int(11) NOT NULL,
  PRIMARY KEY (`pay_id`),
  KEY `item_number` (`item_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`pay_id`, `item_name`, `payment_amount`, `txn_id`, `payer_email`, `item_number`) VALUES
(1, 'check', 1000, 9, 'pratishshr@gmail.com', 36),
(2, 'check', 200, 9, 'sujanshr@gmail.com', 36),
(3, 'check', 200, 9, 'malakar@gmail.com', 36),
(4, 'check', 200, 9, 'romit@gmail.com', 36);

-- --------------------------------------------------------

--
-- Table structure for table `fundraiser`
--

CREATE TABLE IF NOT EXISTS `fundraiser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fundraiser_type` varchar(10) NOT NULL,
  `title` varchar(55) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '10000',
  `end_date` date NOT NULL,
  `description` varchar(175) NOT NULL,
  `image` varchar(100) NOT NULL,
  `video_url` varchar(500) DEFAULT NULL,
  `details` text NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `fundraiser`
--

INSERT INTO `fundraiser` (`id`, `fundraiser_type`, `title`, `amount`, `end_date`, `description`, `image`, `video_url`, `details`, `u_id`) VALUES
(36, 'non_profit', 'again teststest', 5000, '0000-00-00', 'TEST AGAIN THIS IS TEST', 'http://localhost/Aawaaj//fundraiser/campaign_images/6777248-best-hd-wallpapers.jpg', '', 'TEST AGAIN THIS IS TESTTEST AGAIN THIS IS TESTTEST AGAIN THIS IS TESTTEST AGAIN THIS IS TESTTEST AGAIN THIS IS TESTTEST AGAIN THIS IS TEST', 234),
(37, 'non_profit', 'check check', 80000, '0000-00-00', 'asdfasdf', 'http://aawaaj-pratishshr.rhcloud.com//fundraiser/campaign_images/intro-bg.jpg', 'http://www.youtube.com/embed/Hkn06J2HNk4', 'asdfasdf test test', 234),
(38, 'non_profit', 'check', 6506060, '0000-00-00', 'check check', 'http://aawaaj-pratishshr.rhcloud.com//fundraiser/campaign_images/intro-bg.jpg', 'http://www.youtube.com/embed/dqVrIBkhqOo', 'check checkcheck checkcheck checkcheck checkcheck checkcheck checkcheck checkcheck checkcheck checkcheck checkcheck checkcheck check', 234),
(39, 'non_profit', '', 0, '0000-00-00', '', 'http://aawaaj-pratishshr.rhcloud.com//fundraiser/campaign_images/', '', '', 234),
(40, 'non_profit', 'fundraiser', 10000000, '0000-00-00', 'fundraiser description', 'http://aawaaj-pratishshr.rhcloud.com//fundraiser/campaign_images/', 'http://www.youtube.com/embed/BU49KDMR1AY', 'details', 240),
(41, 'non_profit', '', 0, '0000-00-00', '', 'http://localhost/Aawaaj//fundraiser/campaign_images/', 'http://google.com', '', 234),
(43, 'non_profit', 'Yiniharulai Paisa chayo', 1000, '0000-00-00', 'Paisa chayo re yiniharu lai . .a. sf asdf ', 'http://localhost/Aawaaj//fundraiser/campaign_images/37ffc62f6a2937af2bca341471e4810cd84672ee48dde171', '', 'Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf Paisa chayo re yiniharu lai . .a. sf asdf ', 234),
(44, 'non_profit', 'Yiniharulai Paisa chayo', 5000, '0000-00-00', 'yiniharulai paisa chayo re alkdf;akldjf adf.a .df asdf/ asdf a', 'http://localhost/Aawaaj//fundraiser/campaign_images/photo.jpg', NULL, 'yiniharulai paisa chayo re alkdf;akldjf adf.a .df asdf/ asdf ayiniharulai paisa chayo re alkdf;akldjf adf.a .df asdf/ asdf ayiniharulai paisa chayo re alkdf;akldjf adf.a .df asdf/ asdf ayiniharulai paisa chayo re alkdf;akldjf adf.a .df asdf/ asdf ayiniharulai paisa chayo re alkdf;akldjf adf.a .df asdf/ asdf a', 234),
(45, 'non_profit', 'asdfasdf', 10000, '0000-00-00', '13123123', 'http://localhost/Aawaaj//fundraiser/campaign_images/2.1.jpg', '', 'asdfadsf', 234),
(46, 'non_profit', 'asdfasdf', 10000, '0000-00-00', '13123123', 'http://localhost/Aawaaj//fundraiser/campaign_images/2.1.jpg', '', 'asdfadsf', 234),
(47, 'non_profit', 'asdfasdf', 10000, '0000-00-00', '13123123', 'http://localhost/Aawaaj//fundraiser/campaign_images/2.1.jpg', 'http://asdfasdf.com', 'asdfadsf', 234),
(48, 'non_profit', 'check', 2000, '2016-12-12', '20check date', 'http://localhost/Aawaaj//fundraiser/campaign_images/6777248-best-hd-wallpapers.jpg', '', 'checkin date', 234),
(49, 'non_profit', 'check', 2000, '2016-12-12', '20check date', 'http://localhost/Aawaaj//fundraiser/campaign_images/6777248-best-hd-wallpapers.jpg', '', 'checkin date', 234);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `generaluser`
--

INSERT INTO `generaluser` (`gen_id`, `age`, `type`, `u_id`) VALUES
(15, 22, 'generalUser', 234),
(17, 21, 'generalUser', 240);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`p_id`, `password`, `u_id`) VALUES
(89, '$2y$12$hioOjjnBmCMxrXJ2cLcKiuFsJAMn4pC8td6RK.IeYo28ByVVKT252', 234),
(95, '$2y$12$63B7vglG481rr5TT24IQNuGCcWHb7CKdrYybeHA8PbEqF7wrEhiVS', 240);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `about` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `u_id`, `profile_photo`, `about`) VALUES
(1, 234, 'sharingan.jpg', 'Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People '),
(2, 240, 'disco_dancer_sajan.jpg', 'disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `last_name`, `contact_number`, `user_type`, `user_status`, `user_hash`) VALUES
(234, 'vanroshr@gmail.com', 'Pratish', 'Shrestha', 2147483647, 'generalUser', 1, '96601e150a9f349302964aa3ffd92afd'),
(240, 'kushalraj93@gmail.com', 'kushal', 'rajbhandari', 2147483647, 'generalUser', 1, 'fe99e03e9148d7a38d31424450633177');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`item_number`) REFERENCES `fundraiser` (`id`);

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
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `welfare`
--
ALTER TABLE `welfare`
  ADD CONSTRAINT `welfare_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
