-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2015 at 05:04 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

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
(50, 'non_profit', 'hawa', 1000, '2016-01-01', 'hawa', 'http://localhost/Aawaaj//fundraiser/campaign_images/IMG_2019.JPG', '', 'hawa', 242),
(51, 'non_profit', 'bishrant lai paisa chaiyo', 10000, '2016-01-01', 'bishrant lai paisa chaiyo re to launch nepanime', 'http://localhost/Aawaaj//fundraiser/campaign_images/IMG_2019.JPG', 'http:/utube.com/embed/iaJDm1F538U', 'hawa', 242);

-- --------------------------------------------------------

--
-- Table structure for table `generaluser`
--

CREATE TABLE IF NOT EXISTS `generaluser` (
`gen_id` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `type` enum('generalUser') NOT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generaluser`
--

INSERT INTO `generaluser` (`gen_id`, `age`, `type`, `u_id`) VALUES
(15, 22, 'generalUser', 234),
(17, 21, 'generalUser', 240),
(18, NULL, 'generalUser', 241),
(19, NULL, 'generalUser', 243),
(20, NULL, 'generalUser', 244);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `name`, `doe`, `img`, `address`, `objective`, `type`, `u_id`) VALUES
(1, 'Rotaract Club of Kathmandu', '1996-11-06', 'http://localhost/Aawaaj//pictures/orgPictures/111665693_1162046073812294_3657191041260779426_n.jpg', 'Thapathali, Kathmandu', 'increase professionalism and community service', 'organization', 242);

-- --------------------------------------------------------

--
-- Table structure for table `otherorg`
--

CREATE TABLE IF NOT EXISTS `otherorg` (
  `oorg_id` int(11) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otherorg`
--

INSERT INTO `otherorg` (`oorg_id`, `organization_name`, `project_id`) VALUES
(0, 'hawa', 36);

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
`p_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`p_id`, `password`, `u_id`) VALUES
(89, '$2y$12$hioOjjnBmCMxrXJ2cLcKiuFsJAMn4pC8td6RK.IeYo28ByVVKT252', 234),
(95, '$2y$12$63B7vglG481rr5TT24IQNuGCcWHb7CKdrYybeHA8PbEqF7wrEhiVS', 240),
(96, '$2y$12$F64YPeFSEegcE/tsfsgHFu4S1sjtMqXkKsR/qdqwVA0dh18VKJ9Ve', 241),
(97, '$2y$12$kcKyaEE/EAeaCq0983uMbeIjmaU040U0uFm.kvSwrkH29eKWOEsR6', 242),
(98, '$2y$12$99jMWL65NhOGWzgcnsZtTO66fsLlGinA/cZhX8W889RSBuJ/JXgjG', 243),
(99, '$2y$12$eV45aQNN/OEekQURAcswo.1pY58GMt8ARukBD9UDUGxGkWo0olsDm', 244);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
`id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `u_id`, `profile_photo`, `about`) VALUES
(1, 234, 'sharingan.jpg', 'Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People Helping People '),
(2, 240, 'disco_dancer_sajan.jpg', 'disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer disco dancer ');

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `start_date`, `end_date`, `title`, `objectives`, `short_desc`, `location`, `budget`, `volunteer`, `banner_image`, `project_proposal`, `video_url`, `detail`, `status`, `u_id`) VALUES
(36, '2015-01-01', '2016-01-01', 'hawa', 'hawa', 'hawa', 'hawa', 1000, 10, 'http://localhost/Aawaaj//profile/project_image/default.jpg', 'http://localhost/Aawaaj//profile/project_proposal/default.docx', '', 'hawa', 1, 1),
(37, '2001-01-01', '2020-01-01', 'Test Project', 'test', 'test', 'test', 1000, 5, 'http://localhost/Aawaaj//profile/project_image/idea.png', 'http://localhost/Aawaaj//profile/project_proposal/ABSTRACT.docx', '', 'test', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `requirement_id` int(11) NOT NULL,
  `requirement` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`requirement_id`, `requirement`, `project_id`) VALUES
(0, 'hawa', 36);

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
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `last_name`, `contact_number`, `user_type`, `user_status`, `user_hash`) VALUES
(234, 'vanroshr@gmail.com', 'Pratish', 'Shrestha', 2147483647, 'generalUser', 1, '96601e150a9f349302964aa3ffd92afd'),
(240, 'kushalraj93@gmail.com', 'kushal', 'rajbhandari', 2147483647, 'generalUser', 1, 'fe99e03e9148d7a38d31424450633177'),
(241, 'rom_amgai@hotmail.com', 'Romit', 'Amgai', 123123123, 'generalUser', 1, '3c471e3b86dfc3a428364631ffef09fe'),
(242, 'rtrromitamgai@gmail.com', 'Romit', 'Amgai', 123123123, 'organization', 1, '2195c48231fa43bf9470b23e7648548d'),
(243, 'hawa@gmail.com', 'Romit', 'Amgai', 123123, 'generalUser', 1, '390744725ef64ffa05ba7b03f67959a8'),
(244, 'smsbmalakar@gmail.com', 'Sujan', 'Malakar', 123123123, 'generalUser', 0, 'a2fad0ea230cd9f98b60e07e34f13d71');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `generaluser`
--
ALTER TABLE `generaluser`
MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `welfare`
--
ALTER TABLE `welfare`
MODIFY `welf_id` int(11) NOT NULL AUTO_INCREMENT;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
