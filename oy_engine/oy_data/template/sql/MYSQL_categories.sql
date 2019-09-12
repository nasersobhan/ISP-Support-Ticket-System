-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 07:35 AM
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
-- Table structure for table `sob_categories`
--

DROP TABLE IF EXISTS `sob_categories`;
CREATE TABLE IF NOT EXISTS `sob_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(150) NOT NULL,
  `cat_slug` varchar(150) NOT NULL,
  `cat_parent` int(11) NOT NULL DEFAULT '0',
  `cat_type` varchar(30) NOT NULL DEFAULT 'jobs',
  `cat_uid` int(11) NOT NULL DEFAULT '0',
  `cat_order` int(11) NOT NULL DEFAULT '0',
  `cat_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sob_categories`
--
ALTER TABLE `sob_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sob_categories`
--
ALTER TABLE `sob_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
