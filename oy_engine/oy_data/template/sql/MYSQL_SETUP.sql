-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2015 at 07:09 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `sob_categories_oy`
--

CREATE TABLE IF NOT EXISTS `sob_categories_oy` (
  `cat_id` int(11) NOT NULL,
  `cat_uid` int(11) NOT NULL DEFAULT '0',
  `cat_name` varchar(150) NOT NULL,
  `cat_slug` varchar(150) NOT NULL,
  `cat_parent` int(11) NOT NULL DEFAULT '0',
  `cat_type` varchar(30) NOT NULL DEFAULT 'jobs',
  `cat_order` int(11) NOT NULL DEFAULT '0',
  `cat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cat_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_datafiles_oy`
--

CREATE TABLE IF NOT EXISTS `sob_datafiles_oy` (
  `dat_id` int(11) NOT NULL,
  `dat_uid` int(11) NOT NULL,
  `dat_url` varchar(255) NOT NULL,
  `dat_access` int(11) NOT NULL DEFAULT '1',
  `dat_type` varchar(15) NOT NULL,
  `dat_ext` varchar(5) NOT NULL,
  `dat_category` varchar(10) NOT NULL,
  `dat_title` varchar(50) NOT NULL DEFAULT 'Untitled',
  `dat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_historyuser_oy`
--

CREATE TABLE IF NOT EXISTS `sob_historyuser_oy` (
  `his_id` int(11) NOT NULL,
  `his_uid` int(11) NOT NULL DEFAULT '0',
  `his_pass` varchar(255) NOT NULL,
  `his_refurl` varchar(255) NOT NULL,
  `his_ip` varchar(38) NOT NULL,
  `his_browser` varchar(100) NOT NULL,
  `his_ossystem` varchar(50) NOT NULL,
  `his_tbl` varchar(10) DEFAULT NULL,
  `his_pid` int(11) NOT NULL DEFAULT '0',
  `his_status` int(3) NOT NULL DEFAULT '1',
  `his_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_infouser_oy`
--

CREATE TABLE IF NOT EXISTS `sob_infouser_oy` (
  `inf_id` int(11) NOT NULL,
  `inf_name` varchar(50) NOT NULL,
  `inf_sname` varchar(40) NOT NULL,
  `inf_dob` date NOT NULL,
  `inf_phone` double NOT NULL,
  `inf_gender` varchar(8) NOT NULL,
  `inf_avatar` int(11) NOT NULL DEFAULT '0',
  `inf_cover` int(11) NOT NULL,
  `inf_martialstat` varchar(30) NOT NULL DEFAULT 'Single',
  `inf_hcity` int(11) NOT NULL,
  `inf_hcountry` varchar(4) NOT NULL,
  `inf_ccity` int(11) NOT NULL,
  `inf_ccountry` varchar(4) NOT NULL,
  `inf_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_location_oy`
--

CREATE TABLE IF NOT EXISTS `sob_location_oy` (
  `loc_id` int(11) unsigned NOT NULL,
  `loc_iso` varchar(50) DEFAULT NULL,
  `loc_local_name` varchar(255) DEFAULT NULL,
  `loc_type` char(2) DEFAULT NULL,
  `loc_in_location` int(11) unsigned DEFAULT NULL,
  `loc_geo_lat` double(18,11) DEFAULT NULL,
  `loc_geo_lng` double(18,11) DEFAULT NULL,
  `loc_db_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sob_settings_oy`
--

CREATE TABLE IF NOT EXISTS `sob_settings_oy` (
  `set_id` int(11) NOT NULL,
  `set_uid` int(11) NOT NULL DEFAULT '0',
  `set_option` varchar(50) NOT NULL,
  `set_value` varchar(250) NOT NULL,
  `set_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `set_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_tbl2rank_oy`
--

CREATE TABLE IF NOT EXISTS `sob_tbl2rank_oy` (
  `tbl_id` int(11) NOT NULL,
  `tbl_name` varchar(50) NOT NULL,
  `tbl_action` int(1) NOT NULL DEFAULT '1',
  `tbl_rank` int(3) NOT NULL DEFAULT '1',
  `tbl_uid` int(11) NOT NULL DEFAULT '0',
  `tbl_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tbl_status` int(11) NOT NULL DEFAULT '1',
  `tbl_pid` int(11) NOT NULL DEFAULT '0',
  `tbl_owner` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_users`
--

CREATE TABLE IF NOT EXISTS `sob_users` (
  `sob_id` int(11) NOT NULL,
  `sob_user` varchar(30) NOT NULL,
  `sob_phone` varchar(150) NOT NULL,
  `sob_email` varchar(255) NOT NULL,
  `sob_name` varchar(50) DEFAULT NULL,
  `sob_password` varchar(255) NOT NULL,
  `sob_rank` int(1) NOT NULL DEFAULT '0',
  `sob_status` int(1) NOT NULL DEFAULT '1',
  `sob_token` varchar(250) NOT NULL,
  `sob_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sob_categories_oy`
--
ALTER TABLE `sob_categories_oy`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `sob_datafiles_oy`
--
ALTER TABLE `sob_datafiles_oy`
  ADD PRIMARY KEY (`dat_id`),
  ADD KEY `fk_data_files` (`dat_uid`);

--
-- Indexes for table `sob_historyuser_oy`
--
ALTER TABLE `sob_historyuser_oy`
  ADD PRIMARY KEY (`his_id`),
  ADD KEY `fk_sob_users_history` (`his_uid`);

--
-- Indexes for table `sob_infouser_oy`
--
ALTER TABLE `sob_infouser_oy`
  ADD UNIQUE KEY `inf_aid` (`inf_id`);

--
-- Indexes for table `sob_location_oy`
--
ALTER TABLE `sob_location_oy`
  ADD PRIMARY KEY (`loc_id`),
  ADD UNIQUE KEY `db_id` (`loc_db_id`);

--
-- Indexes for table `sob_settings_oy`
--
ALTER TABLE `sob_settings_oy`
  ADD PRIMARY KEY (`set_id`),
  ADD UNIQUE KEY `set_option` (`set_option`);

--
-- Indexes for table `sob_tbl2rank_oy`
--
ALTER TABLE `sob_tbl2rank_oy`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `sob_users`
--
ALTER TABLE `sob_users`
  ADD PRIMARY KEY (`sob_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sob_categories_oy`
--
ALTER TABLE `sob_categories_oy`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_datafiles_oy`
--
ALTER TABLE `sob_datafiles_oy`
  MODIFY `dat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_historyuser_oy`
--
ALTER TABLE `sob_historyuser_oy`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_location_oy`
--
ALTER TABLE `sob_location_oy`
  MODIFY `loc_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_settings_oy`
--
ALTER TABLE `sob_settings_oy`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_tbl2rank_oy`
--
ALTER TABLE `sob_tbl2rank_oy`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_users`
--
ALTER TABLE `sob_users`
  MODIFY `sob_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sob_datafiles_oy`
--
ALTER TABLE `sob_datafiles_oy`
  ADD CONSTRAINT `uid` FOREIGN KEY (`dat_uid`) REFERENCES `sob_users` (`sob_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
