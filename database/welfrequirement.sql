-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2015 at 08:10 AM
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
-- Table structure for table `welfrequirement`
--

CREATE TABLE IF NOT EXISTS `welfrequirement` (
`welfreq_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `org_name` varchar(100) DEFAULT NULL,
  `welf_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `welfrequirement`
--
ALTER TABLE `welfrequirement`
 ADD PRIMARY KEY (`welfreq_id`), ADD KEY `fk_welfreq` (`welf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `welfrequirement`
--
ALTER TABLE `welfrequirement`
MODIFY `welfreq_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `welfrequirement`
--
ALTER TABLE `welfrequirement`
ADD CONSTRAINT `fk_welfreq` FOREIGN KEY (`welf_id`) REFERENCES `welfare` (`welf_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
