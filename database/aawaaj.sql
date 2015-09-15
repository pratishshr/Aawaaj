-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2015 at 07:42 AM
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
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `image`) VALUES
(13, 'pratishshr', '$2y$12$V2wdyRmIsEI3VBGh3YulA.vE2X8lxfpdmiIhRP8qLk2bMJMPxL.a6', 'Pratish', 'Shrestha', 'pratishshr@gmail.com', 'http://localhost/Aawaaj/admin/images/pratish.jpg'),
(14, 'sujanshr', '$2y$12$nGxaz2omSoKiHZvIhc.oDuvOaEizXb/gyWzglUXrZm5VZgRkNSJQ2', 'Sujan', 'Shrestha', 'sujanshr@gmail.com', 'http://localhost/Aawaaj/admin/images/sujan.jpg'),
(15, 'malakar', '$2y$12$9FDhalJrICX4EkgNI5YEoe520AoVJ//D3awWpYs5M2qXLi15tuO9K', 'Sujan', 'Malakar', 'malakar@gmail.com', 'http://localhost/Aawaaj/admin/images/malakar.jpg'),
(16, 'romit', '$2y$12$/fofNDehYJb4YVgiwj.0ye7Nf1TUH77H5/sDVU14eiiNAyGnjm38a', 'Romit', 'Amgai', 'romitamgai@gmail.com', 'http://localhost/Aawaaj/admin/images/romit.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE IF NOT EXISTS `donations` (
`pay_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `txn_id` int(11) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `item_number` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fundraiser`
--

CREATE TABLE IF NOT EXISTS `fundraiser` (
`id` int(11) NOT NULL,
  `fundraiser_type` varchar(10) NOT NULL,
  `title` varchar(55) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '10000',
  `end_date` date NOT NULL,
  `description` varchar(175) NOT NULL,
  `image` varchar(100) NOT NULL,
  `video_url` varchar(500) DEFAULT NULL,
  `details` text NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fundraiser`
--

INSERT INTO `fundraiser` (`id`, `fundraiser_type`, `title`, `amount`, `end_date`, `description`, `image`, `video_url`, `details`, `u_id`) VALUES
(52, 'non_profit', 'Need money for food', 100, '2016-01-01', 'Earthquake victims need money for food.', 'http://localhost/Aawaaj//fundraiser/campaign_images/default.jpg', '', 'Earthquake affected victims need money', 248);

-- --------------------------------------------------------

--
-- Table structure for table `generaluser`
--

CREATE TABLE IF NOT EXISTS `generaluser` (
`gen_id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `type` enum('generalUser') NOT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generaluser`
--

INSERT INTO `generaluser` (`gen_id`, `age`, `type`, `u_id`) VALUES
(22, NULL, 'generalUser', 248),
(23, NULL, 'generalUser', 252);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `name`, `doe`, `img`, `address`, `objective`, `type`, `u_id`) VALUES
(2, 'Rotaract Club of Kathmandu', '1996-11-06', 'http://localhost/Aawaaj//pictures/orgPictures/1rotaract.jpg', 'Thapathali, Kathmandu', 'To increase Professionalism and to serve the community', 'organization', 249);

-- --------------------------------------------------------

--
-- Table structure for table `otherorg`
--

CREATE TABLE IF NOT EXISTS `otherorg` (
`oorg_id` int(11) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otherorg`
--

INSERT INTO `otherorg` (`oorg_id`, `organization_name`, `project_id`) VALUES
(1, 'Rotaract Club of Lalitpur', 48);

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
`p_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`p_id`, `password`, `u_id`) VALUES
(103, '$2y$12$gKtRkTphZEwrCl2b7Z6nS.X.oLjfdnbUX.jRGiy4asfuI4Qd6KWcC', 248),
(104, '$2y$12$c7l8nceNMg7F3sxnswhVfezKj6mZa0AtT7epucSjNOXPvVgnZFaWS', 249),
(106, '$2y$12$PpTLQPktEXf/P0/FYKUUeOqOLA7/onnlEHYkMcV0eKsFKRullBoNW', 251),
(107, '$2y$12$POFpLWU7ZIx0bK/68xvy8u/TxeKz6oYbp6Pn3w63sj0LYbU9qq3TK', 252);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
`id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `u_id`, `profile_photo`, `about`) VALUES
(4, 248, 'default.jpg', 'This is the about section. Edit profile to change this section.'),
(5, 249, 'default.jpg', 'This is the about section. Edit profile to change this section.'),
(7, 252, 'default.jpg', 'This is the about section. Edit profile to change this section.');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`project_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `objectives` varchar(255) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `budget` int(11) DEFAULT NULL,
  `volunteer` int(11) NOT NULL,
  `banner_image` varchar(100) DEFAULT NULL,
  `project_proposal` varchar(100) DEFAULT NULL,
  `video_url` varchar(500) DEFAULT NULL,
  `detail` text NOT NULL,
  `status` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `start_date`, `end_date`, `title`, `objectives`, `short_desc`, `location`, `budget`, `volunteer`, `banner_image`, `project_proposal`, `video_url`, `detail`, `status`, `u_id`) VALUES
(48, '2010-01-01', '2016-01-01', 'Provide shelter to homeless', 'To provide shelter and food', 'we are rotaract clubs and we want to provide shelter', 'kalopul, kathmandu', 1000, 10, 'http://localhost/Aawaaj//profile/project_image/default.jpg', 'http://localhost/Aawaaj//profile/project_proposal/default.docx', '', 'We want to provide bla bla bla to bla bla bla', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
`requirement_id` int(11) NOT NULL,
  `requirement` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`requirement_id`, `requirement`, `project_id`) VALUES
(4, 'rice', 48),
(5, 'milk', 48);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_number` int(30) NOT NULL,
  `user_type` enum('generalUser','organization','welfare') NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `last_name`, `contact_number`, `user_type`, `user_status`, `user_hash`) VALUES
(248, 'rom_amgai@hotmail.com', 'Romit', 'Amgai', 123123123, 'generalUser', 1, '3c471e3b86dfc3a428364631ffef09fe'),
(249, 'rtrromitamgai@gmail.com', 'Romit', 'Amgai', 123123123, 'organization', 1, '2195c48231fa43bf9470b23e7648548d'),
(251, 'hawa@gmail.com', 'Romit', 'Amgai', 123123123, 'welfare', 1, '390744725ef64ffa05ba7b03f67959a8'),
(252, 'romit.amgai@gmail.com', 'Romit', 'Amgai', 123123123, 'generalUser', 0, '76b498de9df21acb821893eef2df4669');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `welfare`
--

INSERT INTO `welfare` (`welf_id`, `name`, `doe`, `img`, `address`, `service`, `objective`, `type`, `u_id`) VALUES
(2, 'Srijansil Bal Sewa', '2001-01-01', 'http://localhost/Aawaaj//profile/project_image/default.jpg', 'Kadaghari, Bhaktapur', 'Childrens', 'To serve the childrens', 'welfare', 251);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `welfrequirement`
--

INSERT INTO `welfrequirement` (`welfreq_id`, `title`, `description`, `end_date`, `status`, `org_name`, `welf_id`) VALUES
(3, 'We Need food', 'We need food to serve the childrens.', '2016-01-01', 1, '', 2),
(4, 'Food for childs', 'We will need 1 kg of food for the kids.', '2015-01-01', 1, '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
 ADD PRIMARY KEY (`pay_id`), ADD KEY `item_number` (`item_number`);

--
-- Indexes for table `fundraiser`
--
ALTER TABLE `fundraiser`
 ADD PRIMARY KEY (`id`), ADD KEY `u_id` (`u_id`);

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
-- Indexes for table `otherorg`
--
ALTER TABLE `otherorg`
 ADD PRIMARY KEY (`oorg_id`), ADD KEY `org_id` (`project_id`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
 ADD PRIMARY KEY (`p_id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`project_id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
 ADD PRIMARY KEY (`requirement_id`), ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `welfare`
--
ALTER TABLE `welfare`
 ADD PRIMARY KEY (`welf_id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `welfrequirement`
--
ALTER TABLE `welfrequirement`
 ADD PRIMARY KEY (`welfreq_id`), ADD KEY `fk_welfreq` (`welf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fundraiser`
--
ALTER TABLE `fundraiser`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `generaluser`
--
ALTER TABLE `generaluser`
MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `otherorg`
--
ALTER TABLE `otherorg`
MODIFY `oorg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
MODIFY `requirement_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT for table `welfare`
--
ALTER TABLE `welfare`
MODIFY `welf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `welfrequirement`
--
ALTER TABLE `welfrequirement`
MODIFY `welfreq_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
-- Constraints for table `otherorg`
--
ALTER TABLE `otherorg`
ADD CONSTRAINT `const_proj` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

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
-- Constraints for table `projects`
--
ALTER TABLE `projects`
ADD CONSTRAINT `cons_orgtoproj` FOREIGN KEY (`u_id`) REFERENCES `organization` (`org_id`);

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
ADD CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`);

--
-- Constraints for table `welfare`
--
ALTER TABLE `welfare`
ADD CONSTRAINT `welfare_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `welfrequirement`
--
ALTER TABLE `welfrequirement`
ADD CONSTRAINT `fk_welfreq` FOREIGN KEY (`welf_id`) REFERENCES `welfare` (`welf_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
