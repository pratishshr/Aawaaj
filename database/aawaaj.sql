-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2015 at 02:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

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
-- Table structure for table `generaluser`
--

CREATE TABLE IF NOT EXISTS `generaluser` (
`gen_id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `type` enum('generalUser') NOT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generaluser`
--

INSERT INTO `generaluser` (`gen_id`, `age`, `type`, `u_id`) VALUES
(1, 20, 'generalUser', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
`org_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `doe` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL,
  `address` varchar(60) NOT NULL,
  `objective` text NOT NULL,
  `type` enum('organization') NOT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
`p_id` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`p_id`, `password`, `u_id`) VALUES
(1, 'RomitPass', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `user_type` enum('generalUser','organization','welfare') NOT NULL,
  `user_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `last_name`, `contact_number`, `user_type`, `user_status`) VALUES
(1, 'rom_amgai@hotmail.com', 'Romit', 'Amgai', 2147483647, 'generalUser', 1);

-- --------------------------------------------------------

--
-- Table structure for table `welfare`
--

CREATE TABLE IF NOT EXISTS `welfare` (
`welf_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `doe` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL,
  `address` varchar(60) NOT NULL,
  `service` varchar(30) NOT NULL,
  `objective` text NOT NULL,
  `type` enum('welfare') NOT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generaluser`
--
ALTER TABLE `generaluser`
 ADD PRIMARY KEY (`gen_id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
 ADD PRIMARY KEY (`org_id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
 ADD PRIMARY KEY (`p_id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `welfare`
--
ALTER TABLE `welfare`
 ADD PRIMARY KEY (`welf_id`), ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generaluser`
--
ALTER TABLE `generaluser`
MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `welfare`
--
ALTER TABLE `welfare`
MODIFY `welf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

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
