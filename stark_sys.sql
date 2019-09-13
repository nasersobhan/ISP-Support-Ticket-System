-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 06:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stark_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `sob_categories_oy`
--

CREATE TABLE `sob_categories_oy` (
  `cat_id` int(11) NOT NULL,
  `cat_slug` varchar(150) NOT NULL,
  `cat_uid` int(11) NOT NULL DEFAULT '0',
  `cat_pid` int(11) NOT NULL DEFAULT '0',
  `cat_parent` int(11) NOT NULL DEFAULT '0',
  `cat_name` varchar(150) NOT NULL,
  `cat_content` text,
  `cat_category` int(11) NOT NULL DEFAULT '0',
  `cat_type` varchar(30) NOT NULL DEFAULT 'jobs',
  `cat_section` varchar(50) NOT NULL DEFAULT 'ss',
  `cat_order` int(11) NOT NULL DEFAULT '0',
  `cat_avatar` int(11) NOT NULL DEFAULT '1482',
  `cat_cover` int(11) NOT NULL DEFAULT '1485',
  `cat_lang` varchar(10) NOT NULL DEFAULT 'en_US',
  `cat_hits` int(11) NOT NULL DEFAULT '0',
  `cat_utime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_status` int(11) NOT NULL DEFAULT '1',
  `cat_confirmed` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_categories_oy`
--

INSERT INTO `sob_categories_oy` (`cat_id`, `cat_slug`, `cat_uid`, `cat_pid`, `cat_parent`, `cat_name`, `cat_content`, `cat_category`, `cat_type`, `cat_section`, `cat_order`, `cat_avatar`, `cat_cover`, `cat_lang`, `cat_hits`, `cat_utime`, `cat_time`, `cat_status`, `cat_confirmed`) VALUES
(1254, 'Ù‡Ø±Ø§Øª1', 0, 0, 0, 'Ù‡Ø±Ø§Øª', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-11 10:42:25', '2019-09-11 10:42:25', 1, 0),
(1253, 'Ù…Ø²Ø§Ø±-Ø´Ø±ÛŒÙ1', 0, 0, 0, 'Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-08 09:20:50', '2019-09-08 09:20:50', 1, 0),
(1252, 'Ù†Ø§ØµØ±-Ú¯Ø±ÙˆÙ¾', 0, 0, 0, 'Ù†Ø§ØµØ± Ú¯Ø±ÙˆÙ¾', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-08 05:23:57', '2019-09-08 05:23:57', 1, 0),
(1210, 'gdfgdfg', 0, 0, 0, 'gdfgdfg', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 04:48:17', '2019-09-05 04:48:17', 1, 0),
(1211, 'dsfgsdfgdf', 0, 0, 0, 'dsfgsdfgdf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 04:57:37', '2019-09-05 04:57:37', 1, 0),
(1212, 'sfasf', 0, 0, 0, 'sfasf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 04:57:54', '2019-09-05 04:57:54', 1, 0),
(1213, 'asfdasdf', 0, 0, 0, 'asfdasdf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 04:57:56', '2019-09-05 04:57:56', 1, 0),
(1214, 'asdfasdf1', 0, 0, 0, 'asdfasdf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 04:57:58', '2019-09-05 04:57:58', 1, 0),
(1215, 'asfdsdf', 0, 0, 0, 'asfdsdf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 04:58:01', '2019-09-05 04:58:01', 1, 0),
(1216, 'sdfgsdfg', 0, 0, 0, 'sdfgsdfg', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 04:58:32', '2019-09-05 04:58:32', 1, 0),
(1217, 'sdfgsdfgd', 0, 0, 0, 'sdfgsdfgd', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 04:59:55', '2019-09-05 04:59:55', 1, 0),
(1218, 'zxcvzxcv', 0, 0, 0, 'zxcvzxcv', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:00:09', '2019-09-05 05:00:09', 1, 0),
(1219, 'zxcvxzcv', 0, 0, 0, 'zxcvxzcv', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:00:32', '2019-09-05 05:00:32', 1, 0),
(1220, 'asdfsadf2', 0, 0, 0, 'asdfsadf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:00:49', '2019-09-05 05:00:49', 1, 0),
(1221, 'sdfsdf', 0, 0, 0, 'sdfsdf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:07:10', '2019-09-05 05:07:10', 1, 0),
(1222, 'fsdfdsf', 0, 0, 0, 'fsdfdsf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:08:56', '2019-09-05 05:08:56', 1, 0),
(1223, 'kjhlk', 0, 0, 0, 'kjhlk', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:09:06', '2019-09-05 05:09:06', 1, 0),
(1224, 'sdfasfd', 0, 0, 0, 'sdfasfd', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:18:02', '2019-09-05 05:18:02', 1, 0),
(1225, 'dfgsdfgdsfg', 0, 0, 0, 'dfgsdfgdsfg', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:22:24', '2019-09-05 05:22:24', 1, 0),
(1226, 'sadfasdf1', 0, 0, 0, 'sadfasdf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:24:52', '2019-09-05 05:24:52', 1, 0),
(1227, 'sdfgsdfgdfg', 0, 0, 0, 'sdfgsdfgdfg', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:25:54', '2019-09-05 05:25:54', 1, 0),
(1228, 'dgdfg', 0, 0, 0, 'dgdfg', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:32:23', '2019-09-05 05:32:23', 1, 0),
(1229, 'asdasdas', 0, 0, 0, 'asdasdas', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:34:41', '2019-09-05 05:34:41', 1, 0),
(1230, 'asdfasfsd', 0, 0, 0, 'asdfasfsd', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:34:46', '2019-09-05 05:34:46', 1, 0),
(1231, 'fsadfsdf', 0, 0, 0, 'fsadfsdf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:34:55', '2019-09-05 05:34:55', 1, 0),
(1232, 'asdfasfd', 0, 0, 0, 'asdfasfd', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:35:55', '2019-09-05 05:35:55', 1, 0),
(1233, 'dfgsdfg', 0, 0, 0, 'dfgsdfg', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:37:00', '2019-09-05 05:37:00', 1, 0),
(1234, 'sadfsdf1', 0, 0, 0, 'sadfsdf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:38:02', '2019-09-05 05:38:02', 1, 0),
(1235, 'sdfgsdf', 0, 0, 0, 'sdfgsdf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:40:07', '2019-09-05 05:40:07', 1, 0),
(1236, 'asdfasf', 0, 0, 0, 'asdfasf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:41:10', '2019-09-05 05:41:10', 1, 0),
(1237, 'dfghdfg', 0, 0, 0, 'dfghdfg', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:42:48', '2019-09-05 05:42:48', 1, 0),
(1238, 'fgsdfgdsfg', 0, 0, 0, 'fgsdfgdsfg', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:42:56', '2019-09-05 05:42:56', 1, 0),
(1239, 'dsfgsdfgf', 0, 0, 0, 'dsfgsdfgf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:43:23', '2019-09-05 05:43:23', 1, 0),
(1240, 'sdfgsdfgf', 0, 0, 0, 'sdfgsdfgf', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:44:13', '2019-09-05 05:44:13', 1, 0),
(1241, 'fgsdfg', 0, 0, 0, 'fgsdfg', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:45:33', '2019-09-05 05:45:33', 1, 0),
(1242, 'asdfasdfd', 0, 0, 0, 'asdfasdfd', NULL, 0, 'currency', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-05 05:46:47', '2019-09-05 05:46:47', 1, 0),
(1243, 'Ø®Ø¯Ù…Ø§Øª-Ù…Ø´ØªØ±ÛŒØ§Ù†', 0, 0, 0, 'Ø®Ø¯Ù…Ø§Øª Ù…Ø´ØªØ±ÛŒØ§Ù†', NULL, 0, 'dep', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:12:13', '2019-09-05 06:12:13', 1, 0),
(1244, 'ÙØ±ÙˆØ´Ø§Øª', 0, 0, 0, 'ÙØ±ÙˆØ´Ø§Øª', NULL, 0, 'dep', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:12:23', '2019-09-05 06:12:23', 1, 0),
(1245, 'Ø§Ù†Ø¨Ø§Ø±-Ø¯Ø§Ø±ÛŒ-Ø§Ø³ØªØ§Ú©-', 0, 0, 0, 'Ø§Ù†Ø¨Ø§Ø± Ø¯Ø§Ø±ÛŒ (Ø§Ø³ØªØ§Ú©)', NULL, 0, 'dep', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:12:45', '2019-09-05 06:12:45', 1, 0),
(1246, 'ØªØ³Øª', 0, 0, 0, 'ØªØ³Øª ÙˆÛŒØ±Ø§ÛŒØ´', NULL, 0, 'dep', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:20:21', '2019-09-05 06:20:21', 100, 0),
(1250, 'Ù‡Ø±Ø§Øª-ØªØ®Ù†ÛŒÚ©ÛŒ', 0, 0, 0, 'Ù‡Ø±Ø§Øª ØªØ®Ù†ÛŒÚ©ÛŒ', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-07 09:46:28', '2019-09-07 09:46:28', 100, 0),
(1248, 'Ù‡Ø±Ø§Øª', 0, 0, 0, 'Ù‡Ø±Ø§Øª', NULL, 0, 'site', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:34:50', '2019-09-05 06:34:50', 1, 0),
(1249, 'Ú©Ø§Ø¨Ù„', 0, 0, 0, 'Ú©Ø§Ø¨Ù„', NULL, 0, 'site', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:34:54', '2019-09-05 06:34:54', 1, 0),
(1251, 'Ù…Ø²Ø§Ø±-Ø´Ø±ÛŒÙ', 0, 0, 0, 'Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ', NULL, 0, 'site', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-07 09:51:13', '2019-09-07 09:51:13', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sob_comments_oy`
--

CREATE TABLE `sob_comments_oy` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(40) NOT NULL,
  `com_email` varchar(60) NOT NULL,
  `com_comment` text NOT NULL,
  `com_id_post` varchar(255) NOT NULL,
  `com_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_customerinfo`
--

CREATE TABLE `sob_customerinfo` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_label` varchar(100) NOT NULL,
  `cus_contractnu` varchar(20) NOT NULL,
  `cus_bw` varchar(20) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_phone2` varchar(20) NOT NULL,
  `cus_address` text NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_sdate` date NOT NULL,
  `cus_edate` date NOT NULL,
  `cus_term` text NOT NULL,
  `cus_demoterm` text NOT NULL,
  `cus_servicecharge` varchar(50) NOT NULL,
  `cus_antenna` varchar(20) NOT NULL,
  `cus_router` varchar(20) NOT NULL,
  `cus_cable` varchar(20) NOT NULL,
  `cus_ip` varchar(20) NOT NULL,
  `cus_cid` varchar(20) NOT NULL,
  `cus_pppoename` varchar(35) NOT NULL,
  `cus_package` varchar(255) NOT NULL,
  `cus_installdate` date NOT NULL,
  `cus_activedate` date NOT NULL,
  `cus_usedaddress` text NOT NULL,
  `cus_usedantenna` varchar(255) NOT NULL,
  `cus_usedcable` varchar(255) NOT NULL,
  `cus_usedrouter` varchar(255) NOT NULL,
  `cus_usedjs` varchar(255) NOT NULL,
  `cus_ap` varchar(255) NOT NULL,
  `cus_signal` varchar(50) NOT NULL,
  `cus_ccq` varchar(50) NOT NULL,
  `cus_pppoeip` varchar(32) NOT NULL,
  `cus_localip` varchar(32) NOT NULL,
  `cus_publicip` varchar(32) NOT NULL,
  `cus_status` int(11) NOT NULL DEFAULT '1',
  `cus_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cus_uid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_datafiles_oy`
--

CREATE TABLE `sob_datafiles_oy` (
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
-- Table structure for table `sob_groups`
--

CREATE TABLE `sob_groups` (
  `gro_id` int(11) NOT NULL,
  `gro_title` varchar(200) NOT NULL,
  `gro_uid` int(11) NOT NULL,
  `gro_dep` varchar(50) NOT NULL,
  `gro_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gro_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_historyuser_oy`
--

CREATE TABLE `sob_historyuser_oy` (
  `his_id` int(11) NOT NULL,
  `his_uid` int(11) NOT NULL DEFAULT '0',
  `his_pass` varchar(255) NOT NULL,
  `his_refurl` varchar(255) NOT NULL,
  `his_ip` varchar(38) NOT NULL,
  `his_browser` varchar(100) NOT NULL,
  `his_ossystem` varchar(50) NOT NULL,
  `his_tbl` varchar(10) DEFAULT NULL,
  `his_sessionkey` varchar(150) NOT NULL,
  `his_pid` varchar(255) DEFAULT NULL,
  `his_status` int(3) NOT NULL DEFAULT '1',
  `his_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_historyuser_oy`
--

INSERT INTO `sob_historyuser_oy` (`his_id`, `his_uid`, `his_pass`, `his_refurl`, `his_ip`, `his_browser`, `his_ossystem`, `his_tbl`, `his_sessionkey`, `his_pid`, `his_status`, `his_time`) VALUES
(1, 19, '0', 'http://qatrasvr/?pg=impexp', '192.168.222.1', 'Chrome', 'Windows 10', NULL, 'fc72a8e8540fb320dcbb53883ff3264a', NULL, 1, '2016-11-05 08:04:42'),
(2, 19, '1', 'http://qatrasvr/?pg=account&user=signin', '192.168.222.1', 'Chrome', 'Windows 10', NULL, 'f0861ccea4ba7adc1902efa4baa93c38', NULL, 1, '2016-11-05 08:04:55'),
(3, 19, '1', 'http://qatrasvr/?pg=account&user=signin', '192.168.222.1', 'Chrome', 'Windows 10', NULL, '6b20a35b4d36057baa9b9a22ad356bdc', NULL, 1, '2016-11-12 04:12:23'),
(4, 19, '0', 'http://qatrasvr/?pg=settings', '192.168.222.1', 'Chrome', 'Windows 10', NULL, '6b20a35b4d36057baa9b9a22ad356bdc', NULL, 1, '2016-11-12 10:37:30'),
(5, 0, 'Faild Login', 'http://qatrasvr/?pg=account&user=signin', '192.168.222.1', 'Chrome', 'Windows 10', NULL, '', NULL, 1, '2016-11-12 10:37:32'),
(6, 19, '1', 'http://qatrasvr/?pg=account&user=signin', '192.168.222.1', 'Chrome', 'Windows 10', NULL, 'e2310fff016c427902327baad8bfa757', NULL, 1, '2016-11-12 10:37:39'),
(7, 0, 'Faild Login', 'http://qatrasvr/?pg=account&user=signin', '192.168.222.1', 'Chrome', 'Windows 10', NULL, '', NULL, 1, '2016-11-12 12:29:17'),
(8, 19, '1', 'http://qatrasvr/?pg=account&user=signin', '192.168.222.1', 'Chrome', 'Windows 10', NULL, 'ad6c06001e2ef8e07e8730e8d9185f48', NULL, 1, '2016-11-12 12:29:20'),
(9, 19, '1', 'http://qatrasvr/?pg=account&user=signin', '192.168.222.1', 'Chrome', 'Windows 10', NULL, 'a329ff22f00b71f2ea35e8f6e035e337', NULL, 1, '2016-11-13 03:10:44'),
(10, 19, '0', 'http://qatrasvr/?pg=impexp&eoe=2', '192.168.222.1', 'Chrome', 'Windows 10', NULL, 'a329ff22f00b71f2ea35e8f6e035e337', NULL, 1, '2016-11-13 10:25:50'),
(11, 19, '1', 'http://qatrasvr/?pg=account&user=signin', '192.168.222.1', 'Chrome', 'Windows 10', NULL, '35b0551a6a666870012fbd34ad5d5073', NULL, 1, '2016-11-13 10:27:02'),
(12, 19, '0', 'http://qatrasvr/', '192.168.222.1', 'Chrome', 'Windows 10', NULL, '35b0551a6a666870012fbd34ad5d5073', NULL, 1, '2016-11-13 10:28:27'),
(13, 19, '1', 'http://qatrasvr/?pg=account&user=signin', '192.168.222.1', 'Chrome', 'Windows 10', NULL, 'fcda3dea5dc3792d18d57819ffe5e057', NULL, 1, '2016-11-13 10:48:50'),
(14, 19, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.18.160.174', 'Chrome', 'Windows 10', NULL, 'c28d82d3cb78b9bdc640f9606099c8d1', NULL, 1, '2016-11-13 11:15:05'),
(15, 19, '0', 'http://qd.sobhansoft.com/?pg=users', '103.18.160.174', 'Chrome', 'Windows 10', NULL, 'c28d82d3cb78b9bdc640f9606099c8d1', NULL, 1, '2016-11-13 11:28:07'),
(16, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.18.160.174', 'Chrome', 'Windows 10', NULL, '36c198f2d208178fb2129f2456dfe9c0', NULL, 1, '2016-11-13 11:28:19'),
(17, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.18.160.174', 'Firefox', 'Windows 10', NULL, '5b5165cda6685dc212b21c97598aa0c1', NULL, 1, '2016-11-13 11:29:27'),
(18, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.18.160.174', 'Chrome', 'Windows 10', NULL, '05ca587d731dfde65a161826df03661c', NULL, 1, '2016-11-13 11:29:56'),
(19, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '110.36.181.198', 'Chrome', 'Windows 7', NULL, 'e238dbc5ec98c5b6e4fba551af32cbd4', NULL, 1, '2016-11-13 11:56:17'),
(20, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.58.15', 'Chrome', 'Windows 7', NULL, 'bea091ad9ae738fd5720b04856978901', NULL, 1, '2016-11-13 12:05:13'),
(21, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.38.20', 'Chrome', 'Windows 10', NULL, '5b023d108483736eed57ca412221799e', NULL, 1, '2016-11-13 12:14:37'),
(22, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '87.144.101.240', 'Chrome', 'Mac OS X', NULL, '158992d4b5e92a0ff70f960b45a077cc', NULL, 1, '2016-11-13 12:30:29'),
(23, 20, '0', 'http://qd.sobhansoft.com/?pg=mexp&eoe=5', '87.144.101.240', 'Chrome', 'Mac OS X', NULL, '158992d4b5e92a0ff70f960b45a077cc', NULL, 1, '2016-11-13 12:33:28'),
(24, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '196.195.249.250', 'Handheld Browser', 'iPhone', NULL, '308cf51e5d34d9478e8a79f2c1b58724', NULL, 1, '2016-11-13 13:24:32'),
(25, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.84.195', 'Handheld Browser', 'Android', NULL, '682bfd7da68009c7c2c43147bdb8ac0a', NULL, 1, '2016-11-13 13:53:58'),
(26, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.216.160.4', 'Chrome', 'Windows 8.1', NULL, '8eec4ec965573cccbb0ca569c4c26a86', NULL, 1, '2016-11-13 14:31:30'),
(27, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '74.118.82.155', 'Handheld Browser', 'Android', NULL, '92c6a1305abf6bb1bb4923b0896b9ab2', NULL, 1, '2016-11-13 14:52:05'),
(28, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.216.160.4', 'Firefox', 'Windows 8', NULL, '1be67f8ae06adc7dbf600846889d1bd3', NULL, 1, '2016-11-13 18:25:18'),
(29, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.18.160.174', 'Chrome', 'Windows 10', NULL, '44f33c690c1bc9981a0422422e449f6d', NULL, 1, '2016-11-14 03:21:44'),
(30, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.18.160.174', 'Firefox', 'Windows 10', NULL, 'b0ccd9b6089788f4288a4dffca10ffe5', NULL, 1, '2016-11-14 03:37:39'),
(31, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '45.126.253.66', 'Chrome', 'Windows 7', NULL, '75dec5bb5691bf05b564c3bdef41d2bf', NULL, 1, '2016-11-14 04:06:20'),
(32, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.216.160.4', 'Chrome', 'Windows 10', NULL, '2a4c700e96d1d1e70bac91dfdddce38a', NULL, 1, '2016-11-14 04:36:41'),
(33, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.28.132.62', 'Handheld Browser', 'Android', NULL, '617d2a2a19912321dc6543e3493ce3cb', NULL, 1, '2016-11-14 05:28:19'),
(34, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.64.50', 'Firefox', 'Windows 10', NULL, '2b2dca0d80a088fe0a40f4fe31826d46', NULL, 1, '2016-11-14 07:36:44'),
(35, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '119.59.86.50', 'Chrome', 'Windows 7', NULL, '3a1a27dcfe6d2b7e6844a80400f1cd32', NULL, 1, '2016-11-14 07:38:24'),
(36, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '131.188.6.20', 'Safari', 'Mac OS X', NULL, '4b87c171fb5d322cc9ff140d8c776546', NULL, 1, '2016-11-14 07:52:33'),
(37, 20, '0', 'http://qd.sobhansoft.com/?page=mlist', '131.188.6.20', 'Safari', 'Mac OS X', NULL, '4b87c171fb5d322cc9ff140d8c776546', NULL, 1, '2016-11-14 08:22:03'),
(38, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.73.220', 'Chrome', 'Windows 7', NULL, 'b2c782b003d02b039485ccb609ce76bf', NULL, 1, '2016-11-14 10:04:54'),
(39, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.216.160.4', 'Firefox', 'Windows 7', NULL, '3f05b4cc2bb1dc696a64a593589c4991', NULL, 1, '2016-11-14 10:36:21'),
(40, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '45.126.253.66', 'Chrome', 'Mac OS X', NULL, '6ff208febef1e5c612e4abde9baf6d44', NULL, 1, '2016-11-14 11:04:16'),
(41, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.216.160.4', 'Chrome', 'Windows 7', NULL, 'edbae636260bc2926ef86aeaba37f872', NULL, 1, '2016-11-14 11:35:14'),
(42, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '196.195.249.226', 'Handheld Browser', 'iPhone', NULL, '83d47ba2a6cd124183f6a5e211a046ba', NULL, 1, '2016-11-14 15:31:46'),
(43, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '196.195.249.249', 'Chrome', 'Windows 7', NULL, 'ddcca2074d3be041696322255298b1e4', NULL, 1, '2016-11-14 15:49:40'),
(44, 20, '0', 'http://qd.sobhansoft.com/', '196.195.249.249', 'Chrome', 'Windows 7', NULL, 'ddcca2074d3be041696322255298b1e4', NULL, 1, '2016-11-14 16:00:01'),
(45, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '74.118.82.160', 'Firefox', 'Windows 10', NULL, '661d5c4176236600cba99b05e99c37c2', NULL, 1, '2016-11-14 18:53:14'),
(46, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.38.20', 'Chrome', 'Windows 10', NULL, '77f52cdb62ab8bb3dff1dfbc9aec13ce', NULL, 1, '2016-11-15 05:13:53'),
(47, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.216.160.4', 'Handheld Browser', 'Android', NULL, '6c917b53cd1a3d8daa8114fe9aa8026e', NULL, 1, '2016-11-15 14:18:23'),
(48, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '163.47.160.184', 'Chrome', 'Windows 10', NULL, '2a29791bd4b20d8e9883ef37fe5943dd', NULL, 1, '2016-11-16 11:06:42'),
(49, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.45.42', 'Chrome', 'Windows 10', NULL, '06272581a4814a1a198ca9e79d4719b0', NULL, 1, '2016-11-17 04:46:54'),
(50, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '196.195.248.107', 'Handheld Browser', 'Android', NULL, '9524c667cd3133e28835050cfa56cf7f', NULL, 1, '2016-12-03 07:48:18'),
(51, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '42.111.111.35', 'Handheld Browser', 'iPhone', NULL, 'ea7f22445cc696821a8873f2688bc148', NULL, 1, '2016-12-23 14:01:05'),
(52, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '117.55.198.150', 'Chrome', 'Windows 10', NULL, '9c3fdaec83591e6f88fd3ba3a4a0d038', NULL, 1, '2017-01-17 08:55:30'),
(53, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.235.177.138', 'Chrome', 'Windows 8.1', NULL, '954d64e09de57957e23f5f856109189e', NULL, 1, '2017-01-17 13:15:29'),
(54, 20, '0', 'http://qd.sobhansoft.com/?pg=report&view=msearch', '103.235.177.138', 'Chrome', 'Windows 8.1', NULL, '954d64e09de57957e23f5f856109189e', NULL, 1, '2017-01-17 13:22:59'),
(55, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.235.177.138', 'Chrome', 'Windows 8.1', NULL, '460ad626e117bed6ee6399b46256aab4', NULL, 1, '2017-01-17 13:23:03'),
(56, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.77.114', 'Chrome', 'Windows 7', NULL, '8903ce7ac9c0142c8550250515e6db19', NULL, 1, '2017-02-15 14:15:03'),
(57, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '117.55.198.150', 'Chrome', 'Windows 10', NULL, '58f759df0785ecc0f348faf43b7c968e', NULL, 1, '2017-02-18 07:48:20'),
(58, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.222.137.242', 'Handheld Browser', 'Android', NULL, '8150d57931d771b9b1a760035f2630fb', NULL, 1, '2017-02-23 09:41:47'),
(59, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '117.55.198.150', 'Chrome', 'Windows 10', NULL, '7b0cc753fb394b318106a2775c462e8b', NULL, 1, '2017-02-23 09:42:15'),
(60, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.222.137.249', 'Handheld Browser', 'Android', NULL, 'bd67cfe10ecc9f962bac428c9cd8a303', NULL, 1, '2017-02-24 15:24:14'),
(61, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.222.143.243', 'Handheld Browser', 'Android', NULL, '8943e5dc80d2dd53c13ded23b06bf811', NULL, 1, '2017-02-24 16:04:46'),
(62, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '117.55.198.150', 'Chrome', 'Windows 10', NULL, 'f55a8eab18cb3fb7f598278f407b25c2', NULL, 1, '2017-02-27 08:39:43'),
(63, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '117.55.198.150', 'Chrome', 'Windows 10', NULL, '683d058cd6d4e2b07889b15099f62480', NULL, 1, '2017-03-06 06:33:19'),
(64, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.42.3.254', 'Handheld Browser', 'Android', NULL, 'c878a19ce1142714ee57ee10a08fe470', NULL, 1, '2017-03-13 12:20:51'),
(65, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '162.217.27.220', 'Handheld Browser', 'iPhone', NULL, 'b6fae125a98d32e4b27d5726eed86189', NULL, 1, '2017-04-04 17:16:16'),
(66, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.77.114', 'Handheld Browser', 'Android', NULL, 'b1219431a2a44f84e23bd8458a9e7c76', NULL, 1, '2017-04-04 17:19:17'),
(67, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.77.114', 'Firefox', 'Windows 7', NULL, 'a070db7751d606302dabfacebe1bf959', NULL, 1, '2017-04-04 17:21:41'),
(68, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.77.114', 'Handheld Browser', 'Android', NULL, '5af71cbc4cfa85230dcbdac8f35ab4a4', NULL, 1, '2017-04-05 05:17:01'),
(69, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.224.214.30', 'Chrome', 'Windows 10', NULL, '8d6381ca68a273cb6230403545bb80e0', NULL, 1, '2017-05-09 07:07:38'),
(70, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.67.152', 'Handheld Browser', 'Android', NULL, '969d534a9a9c573ffd5192f9c723f40e', NULL, 1, '2017-06-01 23:03:23'),
(71, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.67.153', 'Handheld Browser', 'Android', NULL, '91481675cd04f645f94a4ad2a7765f6f', NULL, 1, '2017-06-03 22:50:35'),
(72, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.67.153', 'Firefox', 'Windows 10', NULL, '8883d250a73c498d244f387564ec0a9b', NULL, 1, '2017-06-04 02:18:21'),
(73, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '117.55.198.150', 'Chrome', 'Windows 10', NULL, '539d9ace1638c60871ed6d24c6992ae7', NULL, 1, '2017-07-08 10:46:52'),
(74, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '203.215.33.86', 'Chrome', 'Windows 10', NULL, '8c0aabedfe6189e47c7f72e3a221ca7b', NULL, 1, '2017-07-10 07:16:19'),
(75, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '117.55.198.150', 'Chrome', 'Windows 10', NULL, 'c19f49ab01750f2f2eeabc82e6f9653c', NULL, 1, '2017-07-10 11:25:16'),
(76, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.53.26.5', 'Chrome', 'Windows 10', NULL, 'b7d774c49c84a8e7fbe65269c0d94076', NULL, 1, '2017-07-10 11:57:37'),
(77, 20, '0', 'http://qd.sobhansoft.com/?pg=settings', '103.53.26.5', 'Chrome', 'Windows 10', NULL, 'b7d774c49c84a8e7fbe65269c0d94076', NULL, 1, '2017-07-10 11:59:14'),
(78, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.53.26.5', 'Chrome', 'Windows 10', NULL, 'b4c0b33482806eceafe9020a7ad6dae7', NULL, 1, '2017-07-10 11:59:17'),
(79, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '74.118.82.172', 'Handheld Browser', 'iPhone', NULL, 'a883242d5843157c60b6b411611318b2', NULL, 1, '2017-07-10 14:27:32'),
(80, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.216.160.80', 'Chrome', 'Windows 8.1', NULL, '052e88d2ab3c93b144fc7733965c6440', NULL, 1, '2017-07-10 16:56:09'),
(81, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.38.220', 'Chrome', 'Windows 10', NULL, 'c0f900a5615a701c2502940074ad126c', NULL, 1, '2017-07-11 05:30:24'),
(82, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '117.55.198.150', 'Chrome', 'Windows 10', NULL, '23301d1c052899a3d9f5891a4e6a4440', NULL, 1, '2017-07-12 05:35:29'),
(83, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '117.55.198.150', 'Chrome', 'Windows 10', NULL, '4704675d3d49a1492fef4c3012c7cc00', NULL, 1, '2017-07-12 12:51:01'),
(84, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.53.26.5', 'Chrome', 'Windows 8.1', NULL, 'a9349dcf56677ece2c17816ca9da3cc0', NULL, 1, '2017-07-15 06:46:03'),
(85, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.53.26.5', 'Chrome', 'Windows 10', NULL, '11b9f77097751774a1967e5890afff84', NULL, 1, '2017-07-18 05:10:32'),
(86, 20, '0', 'http://qd.sobhansoft.com/', '103.53.26.5', 'Chrome', 'Windows 10', NULL, '11b9f77097751774a1967e5890afff84', NULL, 1, '2017-07-18 05:16:26'),
(87, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.28.132.3', 'Handheld Browser', 'Android', NULL, '53ec6250d868c61cfb8e13b0354c2eae', NULL, 1, '2017-08-03 05:21:03'),
(88, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.216.160.81', 'Handheld Browser', 'iPhone', NULL, '20b024729b1357d3e1c49666466088f6', NULL, 1, '2017-08-03 05:38:22'),
(89, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '137.59.121.27', 'Handheld Browser', 'Android', NULL, '88bafdaae252601212fb07c96f603ab8', NULL, 1, '2017-08-06 10:55:51'),
(90, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '117.55.198.150', 'Chrome', 'Windows 10', NULL, 'db88e78072d0bb1870b38254ab4d9266', NULL, 1, '2017-08-08 09:50:18'),
(91, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '146.185.152.207', 'Handheld Browser', 'Android', NULL, '859fa39368dea4b7e03692e6212b0d8a', NULL, 1, '2017-08-09 05:10:25'),
(92, 20, '0', 'http://qd.sobhansoft.com/', '146.185.152.207', 'Handheld Browser', 'Android', NULL, '859fa39368dea4b7e03692e6212b0d8a', NULL, 1, '2017-08-09 05:11:52'),
(93, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.18.162.194', 'Chrome', 'Windows 10', NULL, '225691aed3899c817975c4434b387e25', NULL, 1, '2017-08-09 05:22:40'),
(94, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.67.156', 'Handheld Browser', 'Android', NULL, 'f931b4d6b9df8b35b07ae856c3075677', NULL, 1, '2017-08-09 05:42:52'),
(95, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '115.99.237.70', 'Chrome', 'Windows 10', NULL, '119a63f6fd0a9890b364d74caaa1cdb2', NULL, 1, '2017-08-09 15:38:44'),
(96, 0, '0', 'http://qd.sobhansoft.com/', '115.99.237.70', 'Chrome', 'Windows 10', NULL, '', NULL, 1, '2017-08-09 18:37:34'),
(97, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.216.160.80', 'Chrome', 'Windows 8.1', NULL, '717a8494871ed4c07e65f4ad8d493fbb', NULL, 1, '2017-08-11 01:56:51'),
(98, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.235.176.2', 'Chrome', 'Windows 7', NULL, '5a08950a9254666b00baf763200a0149', NULL, 1, '2017-08-15 07:51:55'),
(99, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.12.96.251', 'Firefox', 'Windows 10', NULL, '1701ecf44c374968093ece65630b094f', NULL, 1, '2017-08-15 08:49:17'),
(100, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.67.152', 'Handheld Browser', 'Android', NULL, 'bed80eb4bf5f924741a40520b139c8b6', NULL, 1, '2017-08-18 06:36:12'),
(101, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.28.132.95', 'Handheld Browser', 'Android', NULL, '16805fc8e40ba5abd62529d3225f4c33', NULL, 1, '2017-08-26 19:07:41'),
(102, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.67.157', 'Handheld Browser', 'Android', NULL, 'e41cacc5552485a9d032e928083531b4', NULL, 1, '2017-08-27 02:28:26'),
(103, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.67.154', 'Handheld Browser', 'Android', NULL, '325a6557af3dd490f555494ca0804881', NULL, 1, '2017-08-27 09:41:39'),
(104, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.235.176.2', 'Chrome', 'Windows 7', NULL, '74b4b9e846f61cda2209597ab437b945', NULL, 1, '2017-09-04 06:39:04'),
(105, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.235.176.2', 'Chrome', 'Windows 7', NULL, '6b7b7d4364cfb6a02a52cd7c1529cea8', NULL, 1, '2017-09-04 08:53:22'),
(106, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.235.176.2', 'Chrome', 'Windows 7', NULL, '4ee358e7e805d6710c8e2a55d5163ace', NULL, 1, '2017-09-04 11:28:50'),
(107, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.235.176.2', 'Chrome', 'Windows 7', NULL, '5f26643c08ef07aa7f5320c0870ace8d', NULL, 1, '2017-10-14 11:15:29'),
(108, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.216.160.250', 'Chrome', 'Windows 10', NULL, '0ae94e2ce449dea3ed117ce8f32bccee', NULL, 1, '2017-10-17 09:19:53'),
(109, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '78.185.213.16', 'Handheld Browser', 'Android', NULL, '81b4b951aa3f4ecf1435013a93115b71', NULL, 1, '2017-10-29 20:00:27'),
(110, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.215.211.106', 'Chrome', 'Windows 10', NULL, '464bc781c5f5adf3b57e8b99c0453dd2', NULL, 1, '2018-01-14 04:26:38'),
(111, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.215.211.106', 'Chrome', 'Windows 10', NULL, '8b9071fc6bd384182f9af859f6c35246', NULL, 1, '2018-01-23 09:56:15'),
(112, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.84.243', 'Handheld Browser', 'iPhone', NULL, '12d2e4f06cdee3cd2800b175a4441321', NULL, 1, '2018-01-23 10:01:30'),
(113, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.94.84.195', 'Handheld Browser', 'iPhone', NULL, '435edbc1c68f9cd73f186e3fc8f5884f', NULL, 1, '2018-01-23 10:14:26'),
(114, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.215.211.106', 'Chrome', 'Windows 10', NULL, '881447544c178a0c1467ef00364438b8', NULL, 1, '2018-01-23 10:28:30'),
(115, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.42.137', 'Firefox', 'Mac OS X', NULL, '3e04b53e74f5cf35084e1c767f351b05', NULL, 1, '2018-01-25 23:04:07'),
(116, 20, '0', 'http://qd.sobhansoft.com/?pg=settings', '175.106.42.137', 'Firefox', 'Mac OS X', NULL, '3e04b53e74f5cf35084e1c767f351b05', NULL, 1, '2018-01-25 23:26:33'),
(117, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.42.137', 'Firefox', 'Mac OS X', NULL, 'c300a7c4b335c2d909019c8cc94921b8', NULL, 1, '2018-01-25 23:31:19'),
(118, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.45.183', 'Firefox', 'Windows 10', NULL, '2b060ac03c6d6286164e24cb8481ae2c', NULL, 1, '2018-01-27 05:38:23'),
(119, 20, '0', 'http://qd.sobhansoft.com/', '175.106.45.183', 'Firefox', 'Windows 10', NULL, '2b060ac03c6d6286164e24cb8481ae2c', NULL, 1, '2018-01-27 05:44:28'),
(120, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.45.183', 'Firefox', 'Windows 10', NULL, 'ae63093b1a76d5c142b9f1ae132b76b1', NULL, 1, '2018-01-27 05:44:48'),
(121, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.215.211.106', 'Chrome', 'Windows 10', NULL, '9233cd67410561167e3421023181d6ed', NULL, 1, '2018-01-27 06:47:24'),
(122, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.45.183', 'Firefox', 'Windows 10', NULL, 'ebb76106b572ab897f3733ea0e730367', NULL, 1, '2018-01-27 07:18:50'),
(123, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.215.211.106', 'Chrome', 'Windows 10', NULL, '36988b445cb0ed27f812c0bf469fd36b', NULL, 1, '2018-01-28 05:36:38'),
(124, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '163.47.160.7', 'Firefox', 'Windows 10', NULL, '00ea6a6629cd5a6725a50259807e9404', NULL, 1, '2018-01-28 05:57:11'),
(125, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.215.211.106', 'Chrome', 'Windows 10', NULL, '8f9254f970ee2e799a53d4f5656f3310', NULL, 1, '2018-01-28 07:13:52'),
(126, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '163.47.162.56', 'Firefox', 'Windows 10', NULL, '6cffcd4ab817db37e6b3be509663df99', NULL, 1, '2018-01-28 09:21:29'),
(127, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '163.47.161.23', 'Firefox', 'Windows 10', NULL, '06b39ffe7ef41c1877b78fca50956851', NULL, 1, '2018-01-30 13:01:46'),
(128, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '163.47.162.48', 'Firefox', 'Windows 10', NULL, '08ed5fa211ec1d47ac7971e5097f3a8c', NULL, 1, '2018-02-01 04:19:36'),
(129, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.45.109', 'Firefox', 'Windows 10', NULL, '43866e4b621b71ecebee336e68f4a984', NULL, 1, '2018-02-03 04:27:15'),
(130, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '163.47.161.168', 'Firefox', 'Windows 10', NULL, '0781c49a8583d8f762570c2c734f7bc4', NULL, 1, '2018-02-21 06:34:22'),
(131, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '163.47.160.23', 'Firefox', 'Windows 10', NULL, '1df30e8503253a0d85dec3f18d86df1d', NULL, 1, '2018-03-03 08:14:09'),
(132, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.17.60.101', 'Firefox', 'Windows 10', NULL, 'fcd3f603a7b392b1bdff0cbc411e57d8', NULL, 1, '2018-03-03 10:59:11'),
(133, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.215.211.106', 'Chrome', 'Windows 10', NULL, 'f3e18375dbc2cf16d76cb4b6cf270d4b', NULL, 1, '2018-03-24 11:46:48'),
(134, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.215.211.106', 'Chrome', 'Windows 10', NULL, '162af156dba5f30474f9572f0b3f05c7', NULL, 1, '2018-04-22 07:18:17'),
(135, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '2.223.40.223', 'Handheld Browser', 'Android', NULL, '8b34921018fa15bc538f6d3436017239', NULL, 1, '2018-04-22 07:19:38'),
(136, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.215.211.106', 'Chrome', 'Windows 10', NULL, '0464b986e5cbb9dbd4536ed2868213c1', NULL, 1, '2018-04-22 07:19:59'),
(137, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '2.223.40.223', 'Handheld Browser', 'Android', NULL, 'd4231f1d288a287056490a6dfa5365ba', NULL, 1, '2018-04-22 07:21:47'),
(138, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, 'bb60c02f15d8a334b8ab082c2b127e6f', NULL, 1, '2018-11-20 14:11:27'),
(139, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, '3ce0fa1e8b294a8adb1c2c463d8eb724', NULL, 1, '2018-11-20 16:03:10'),
(140, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.39.156', 'Handheld Browser', 'iPhone', NULL, 'a0e5a7253aeeb530f399a63bb2a29d3a', NULL, 1, '2018-11-21 08:46:49'),
(141, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.39.156', 'Chrome', 'Windows 10', NULL, '8c043dd33323a479b77198c02c56fad0', NULL, 1, '2018-11-21 10:29:37'),
(142, 20, '0', 'http://qd.sobhansoft.com/', '175.106.39.156', 'Chrome', 'Windows 10', NULL, '8c043dd33323a479b77198c02c56fad0', NULL, 1, '2018-11-21 11:13:40'),
(143, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, '0f97611fa398a4a801ff680b23ae9073', NULL, 1, '2018-11-21 15:27:51'),
(144, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, '97db0b6ca25cbcdd3b386a306d4302ea', NULL, 1, '2018-12-07 09:20:12'),
(145, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, 'd79e333e7766c6eee0ff0411705b0111', NULL, 1, '2018-12-08 09:31:31'),
(146, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '78.190.54.185', 'Chrome', 'Mac OS X', NULL, '9ef0e8c6d6f34f62fa70f6ee36b758f6', NULL, 1, '2018-12-08 19:42:18'),
(147, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, 'ad1aaace9888a47acfefa79e8dec9c0f', NULL, 1, '2018-12-09 06:19:03'),
(148, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, '020002de3bdab9304dfca9cd07db09c2', NULL, 1, '2018-12-09 08:14:12'),
(149, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, '9505c016fc67415ae0e109db58f8c98a', NULL, 1, '2018-12-11 05:42:53'),
(150, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, 'c360eea9df742e2bfb961e3537d3f582', NULL, 1, '2018-12-11 08:00:15'),
(151, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, '3d856f32e2b57c80192f8db146f28982', NULL, 1, '2018-12-13 06:51:24'),
(152, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, '7e8693ad15df8b881a1de0e080e95593', NULL, 1, '2018-12-18 06:28:34'),
(153, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.13.64.154', 'Chrome', 'Windows 7', NULL, '729c287003f63ebe14135b2cd072bb8f', NULL, 1, '2018-12-18 09:01:03'),
(154, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.222.143.251', 'Handheld Browser', 'iPhone', NULL, '3af297b9dc2c3dd9aa80a7d4c2adcc78', NULL, 1, '2018-12-18 09:08:48'),
(155, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, '14bb4ea4177a3fd310561fb4883783d3', NULL, 1, '2018-12-18 09:08:57'),
(156, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.222.143.251', 'Handheld Browser', 'iPhone', NULL, 'a4a58fda32e466483a39e0e6c3e8db53', NULL, 1, '2018-12-18 09:21:04'),
(157, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.112', 'Chrome', 'Windows 10', NULL, '8ec0fccf2f4c07e80eb4d84703d334f3', NULL, 1, '2018-12-18 09:24:56'),
(158, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '180.222.137.250', 'Handheld Browser', 'iPhone', NULL, 'b57a16e8d715622642ec5532ec9d5912', NULL, 1, '2018-12-18 09:44:04'),
(159, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.53.169', 'Chrome', 'Mac OS X', NULL, '48653993f4e8dfb41a0fc295b55353c7', NULL, 1, '2018-12-20 06:28:41'),
(160, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '196.195.246.30', 'Chrome', 'Windows 10', NULL, '44cd400baa55669c15a45559ac066399', NULL, 1, '2018-12-20 08:35:20'),
(161, 20, '0', 'http://qd.sobhansoft.com/?fbclid=IwAR20WyI22wqUnwiptg54i9DRyiL2P58IYMVRTHlLFoSaCArRQLMjexyI2Ys', '196.195.246.30', 'Chrome', 'Windows 10', NULL, '44cd400baa55669c15a45559ac066399', NULL, 1, '2018-12-20 08:36:18'),
(162, 0, '0', '', '196.195.246.30', 'Chrome', 'Windows 10', NULL, '', NULL, 1, '2018-12-20 08:36:21'),
(163, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '59.153.127.25', 'Handheld Browser', 'Android', NULL, 'b94ed7971336567a5c62e61a9eb45c6e', NULL, 1, '2018-12-20 21:28:39'),
(164, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '196.195.251.144', 'Chrome', 'Windows 10', NULL, '282920044063668aa7a0f85400839d2a', NULL, 1, '2018-12-22 04:48:59'),
(165, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.53.24.129', 'Chrome', 'Windows 10', NULL, '5ed743663dd3e1a9712b59759eeb16a2', NULL, 1, '2018-12-23 15:15:10'),
(166, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.53.24.129', 'Chrome', 'Windows 10', NULL, 'eae53ab0ee45f0a31fc7c95ce04d8fde', NULL, 1, '2018-12-29 12:17:08'),
(167, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.106.182.126', 'Chrome', 'Windows 10', NULL, '2e614bcd2b43714143c2f168f5cfd1ee', NULL, 1, '2018-12-30 23:00:26'),
(168, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '195.181.169.134', 'Chrome', 'Mac OS X', NULL, '635c472982363b712664dd0d5a5fc571', NULL, 1, '2019-01-02 10:59:56'),
(169, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '175.106.36.14', 'Chrome', 'Windows 10', NULL, 'cd7a2ddfe7220980c072973355913848', NULL, 1, '2019-01-22 06:46:55'),
(170, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '157.41.100.5', 'Chrome', 'Windows 10', NULL, '064f7aae2c8c95dde3ab5f5d40a4fc51', NULL, 1, '2019-01-25 05:20:02'),
(171, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.160', 'Chrome', 'Windows 7', NULL, '3bba7bc32e5cc5c731b76c4b0dcd0161', NULL, 1, '2019-01-28 08:41:04'),
(172, 20, '0', 'http://qd.sobhansoft.com/', '103.119.24.160', 'Chrome', 'Windows 7', NULL, '3bba7bc32e5cc5c731b76c4b0dcd0161', NULL, 1, '2019-01-28 08:52:49'),
(173, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '58.44.144.241', 'Chrome', 'Windows 10', NULL, 'c775272ed499f281ace301ddaee69ef3', NULL, 1, '2019-04-03 12:43:07'),
(174, 20, '0', 'http://qd.sobhansoft.com/', '58.44.144.241', 'Chrome', 'Windows 10', NULL, 'c775272ed499f281ace301ddaee69ef3', NULL, 1, '2019-04-03 12:44:20'),
(175, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '58.44.144.241', 'Chrome', 'Windows 10', NULL, '8e44ea3d04c3bdb0d80f645b2a73b1be', NULL, 1, '2019-04-03 12:44:22'),
(176, 20, '1', 'http://qd.sobhansoft.com/?pg=account&user=signin', '103.119.24.253', 'Chrome', 'Windows 10', NULL, '9912386155ead5d7e2c90e877da7a972', NULL, 1, '2019-09-04 10:07:21'),
(177, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, 'f025635357088b860ed08d8a113fd0c4', NULL, 1, '2019-09-04 10:55:39'),
(178, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '179b60db54df47e7fe12f8025392989b', NULL, 1, '2019-09-04 11:38:50'),
(179, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '571d2d47e573e980159b7aae7379903d', NULL, 1, '2019-09-04 11:49:26'),
(180, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '7e8d86c23806783b925e7f8ed5c56455', NULL, 1, '2019-09-05 04:08:05'),
(181, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, 'e93e9dcd72cdd8e4e94cf89e96eaa047', NULL, 1, '2019-09-05 07:32:24'),
(182, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, 'a4aa424c9d0aedf06a62d03df03c1510', NULL, 1, '2019-09-05 07:32:48'),
(183, 20, '0', 'http://stark.test/?pg=users', '127.0.0.1', 'Chrome', 'Windows 10', NULL, 'a4aa424c9d0aedf06a62d03df03c1510', NULL, 1, '2019-09-05 07:33:32'),
(184, 26, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '1bff9e7535cd8a10005dbe649456704e', NULL, 1, '2019-09-05 07:33:39'),
(185, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '2a6a8fae83a07d6630bef69550f9fad2', NULL, 1, '2019-09-05 07:34:23'),
(186, 20, '0', 'http://stark.test/?pg=categories&t=site', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '2a6a8fae83a07d6630bef69550f9fad2', NULL, 1, '2019-09-08 09:47:23'),
(187, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '97ef7074fa8ad5f2eba55dfaeac4a363', NULL, 1, '2019-09-08 09:47:28'),
(188, 20, '0', 'http://stark.test/?pg=inbox&id=153', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '97ef7074fa8ad5f2eba55dfaeac4a363', NULL, 1, '2019-09-08 09:54:44'),
(189, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '08e791ed4847e4d602a8b4b007c18c27', NULL, 1, '2019-09-08 09:54:48'),
(190, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, 'a37da9c4398ef0856405e2b38366951a', NULL, 1, '2019-09-13 14:17:09'),
(191, 26, 'Password wrong', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '', NULL, 1, '2019-09-13 14:54:34'),
(192, 26, 'Password wrong', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '', NULL, 1, '2019-09-13 14:55:02'),
(193, 29, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, 'b8a8cfe88887b05fbe7205b5febf1366', NULL, 1, '2019-09-13 14:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `sob_impexp`
--

CREATE TABLE `sob_impexp` (
  `imp_id` int(11) NOT NULL,
  `imp_uid` int(11) NOT NULL DEFAULT '0',
  `imp_status` int(11) NOT NULL DEFAULT '1',
  `imp_date` date NOT NULL,
  `imp_sdate` varchar(12) NOT NULL,
  `imp_eoe` int(11) NOT NULL,
  `imp_koo` int(11) NOT NULL,
  `imp_amount` float NOT NULL DEFAULT '0',
  `imp_price` float NOT NULL DEFAULT '0',
  `imp_trucknum` int(15) NOT NULL DEFAULT '0',
  `imp_drivername` varchar(255) DEFAULT NULL,
  `imp_total` int(20) NOT NULL DEFAULT '0',
  `imp_dis` text NOT NULL,
  `imp_name` varchar(255) NOT NULL,
  `imp_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imp_stat` int(1) NOT NULL DEFAULT '0',
  `imp_st` int(1) NOT NULL DEFAULT '0',
  `imp_m_name` varchar(255) NOT NULL DEFAULT '0',
  `imp_m_price` float NOT NULL DEFAULT '0',
  `imp_m_total` float NOT NULL DEFAULT '0',
  `imp_o_name` varchar(255) NOT NULL DEFAULT '0',
  `imp_o_price` float NOT NULL DEFAULT '0',
  `imp_o_amont` float NOT NULL DEFAULT '0',
  `imp_o_total` float NOT NULL DEFAULT '0',
  `imp_t_cname` varchar(255) NOT NULL DEFAULT '0',
  `imp_t_price` float NOT NULL DEFAULT '0',
  `imp_t_total` float NOT NULL DEFAULT '0',
  `imp_s_amont` float NOT NULL DEFAULT '0',
  `imp_s_total` float NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_impexp`
--

INSERT INTO `sob_impexp` (`imp_id`, `imp_uid`, `imp_status`, `imp_date`, `imp_sdate`, `imp_eoe`, `imp_koo`, `imp_amount`, `imp_price`, `imp_trucknum`, `imp_drivername`, `imp_total`, `imp_dis`, `imp_name`, `imp_time`, `imp_stat`, `imp_st`, `imp_m_name`, `imp_m_price`, `imp_m_total`, `imp_o_name`, `imp_o_price`, `imp_o_amont`, `imp_o_total`, `imp_t_cname`, `imp_t_price`, `imp_t_total`, `imp_s_amont`, `imp_s_total`) VALUES
(27045, 19, 1, '2016-10-24', '1395-08-03', 2, 3, 1400, 135, 45455, '4Ø³ÛŒØ¨', 189000, 'Ø³ÛŒØ¨Ø³', '1160', '2016-11-13 06:21:06', 0, 1022, '1110', 4, 4800, '966', 6, 200, 1200, '1158', 2, 2400, 1200, 162000),
(27044, 19, 1, '2016-10-23', '1395-08-02', 2, 2, 2000, 120, 12442, '11', 240000, 'Ø³ÛŒØ¨Ø³', '1159', '2016-11-13 06:20:13', 0, 1023, '1110', 1, 1800, '966', 12, 200, 2400, '967', 1, 1800, 1800, 216000),
(27043, 19, 1, '2016-10-22', '1395-08-01', 2, 1, 1000, 110, 9000, 'Ø§Ø­Ù…Ø¯', 110000, '', '1157', '2016-11-13 06:19:24', 0, 1022, '965', 5, 4500, '966', 5, 100, 500, '1158', 1124, 1011600, 900, 99000),
(27046, 19, 1, '2016-10-25', '1395-08-04', 2, 1, 5060, 100, 99, 'Ø³ÛŒØ¨ÛŒØ¨', 506000, 'Ø³ÛŒØ¨Ø³ÛŒØ¨', '1161', '2016-11-13 06:21:58', 0, 1024, '1008', 5, 25000, '966', 9, 60, 540, '1158', 12, 60000, 5000, 500000),
(27047, 19, 1, '2016-10-26', '1395-08-05', 2, 1, 1000, 105, 121, '121', 105000, 'Ø³ÛŒØ¨', '1135', '2016-11-13 06:22:47', 0, 1025, '1008', 12, 12000, '966', 0, 0, 0, '1158', 5, 5000, 1000, 105000),
(27048, 19, 1, '2016-10-23', '1395-08-02', 1, 1, 500, 135, 0, NULL, 67500, 'ÛŒØ¨Ø³ÛŒØ¨', '1162', '2016-11-13 06:23:39', 0, 1022, '0', 0, 0, '0', 0, 0, 0, '0', 0, 0, 499, 67365),
(27049, 19, 1, '2016-10-24', '1395-08-03', 1, 2, 600, 140, 0, NULL, 84000, 'Ø³ÛŒØ¨', '1115', '2016-11-13 06:24:01', 0, 1023, '0', 0, 0, '0', 0, 0, 0, '0', 0, 0, 600, 84000),
(27050, 19, 1, '2016-10-25', '1395-08-04', 1, 3, 5900, 160, 0, NULL, 944000, 'ÛŒØ¨Ø³ÛŒ', '1163', '2016-11-13 06:24:26', 0, 1024, '0', 0, 0, '0', 0, 0, 0, '0', 0, 0, 5900, 944000),
(27054, 20, 1, '2018-01-31', '1396-11-11', 2, 1, 50, 5, 2535, 'ddddd', 250, 'jhfhgkcffgfvg', '1176', '2018-02-01 04:27:42', 0, 1023, '1177', 2, 140, '1178', 4, -20, -80, '45', 789, 55230, 70, 140),
(27055, 20, 1, '2018-01-31', '1396-11-11', 1, 1166, 3, 30, 0, NULL, 10500, '', '1179', '2018-02-01 04:31:35', 0, 1024, '0', 0, 0, '0', 0, 0, 0, '0', 0, 0, 456, 13680),
(27056, 20, 1, '2018-01-31', '1396-11-11', 1, 1, 1, 67, 0, NULL, 67, 'Thanks', '1180', '2018-02-01 04:32:44', 0, 1022, '0', 0, 0, '0', 0, 0, 0, '0', 0, 0, 1, 67),
(27057, 20, 1, '2018-12-29', '1397-10-08', 2, 1, 25000, 14, 22545, 'Ø­Ø³ÛŒÙ†', 350000, 'Ø³ÛŒØ¨Ø³ÛŒØ¨', '1161', '2018-12-29 12:19:07', 0, 1022, '1110', 12, 300000, '1184', 2, 0, 0, '1185', 42, 1050000, 25000, 350000),
(27058, 20, 1, '2018-12-29', '1397-10-08', 1, 1, 1424, 12, 0, NULL, 17088, 'Ø³ÛŒØ¨Ø³', '1186', '2018-12-29 12:19:44', 0, 1022, '0', 0, 0, '0', 0, 0, 0, '0', 0, 0, 4555, 54660),
(27059, 20, 1, '2018-12-29', '1397-10-08', 2, 1, 124444, 45, 454545, '45', 5599980, 'ÛŒØ³Ø¨', '45', '2018-12-29 12:21:10', 0, 1023, '1187', 454, 206116, '1188', 45, 123990, 5579550, '1189', 44, 19976, 454, 20430),
(27060, 20, 1, '2019-01-01', '1397-10-10', 2, 1, 444555, 445, 4, '5', 197826975, '45', '1190', '2018-12-29 12:21:30', 0, 1024, '45', 45, 2025, '4', 54, 444510, 24003500, '4', 54, 2430, 45, 20025);

-- --------------------------------------------------------

--
-- Table structure for table `sob_infouser_oy`
--

CREATE TABLE `sob_infouser_oy` (
  `inf_id` int(11) NOT NULL,
  `inf_name` varchar(50) DEFAULT NULL,
  `inf_sname` varchar(40) DEFAULT NULL,
  `inf_about` text,
  `inf_dob` date DEFAULT NULL,
  `inf_phone` double DEFAULT NULL,
  `inf_gender` varchar(8) DEFAULT 'Male',
  `inf_avatar` int(11) NOT NULL DEFAULT '1483',
  `inf_cover` int(11) NOT NULL DEFAULT '1485',
  `inf_martialstat` varchar(30) NOT NULL DEFAULT 'Single',
  `inf_hcity` int(11) DEFAULT NULL,
  `inf_hcountry` varchar(11) DEFAULT NULL,
  `inf_ccity` int(11) DEFAULT NULL,
  `inf_ccountry` varchar(11) DEFAULT NULL,
  `inf_email` varchar(255) DEFAULT NULL,
  `inf_status` int(11) NOT NULL DEFAULT '1',
  `inf_lang` varchar(10) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_infouser_oy`
--

INSERT INTO `sob_infouser_oy` (`inf_id`, `inf_name`, `inf_sname`, `inf_about`, `inf_dob`, `inf_phone`, `inf_gender`, `inf_avatar`, `inf_cover`, `inf_martialstat`, `inf_hcity`, `inf_hcountry`, `inf_ccity`, `inf_ccountry`, `inf_email`, `inf_status`, `inf_lang`) VALUES
(19, 'Naser', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'naser@sobhansoft.com', 1, 'fa_AF'),
(20, 'Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'demo@sobhansoft.com', 1, 'fa_AF'),
(21, 'fawad', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'fawadjoyaa@gmail.com', 1, 'en'),
(22, 'ahmad', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'ahmad@gmail.com', 1, 'en'),
(23, 'sdfgsdfg', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'afghanict@outlook.com', 1, 'en'),
(24, 'sdfgsdfgddd', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'sdfsdfs@sfsf.com', 1, 'en'),
(25, 'Ù†Ø§ØµØ±', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'nasersofbhan@outlook.com', 1, 'en'),
(26, 'Ù†Ø§ØµØ± Ø³Ø¨Ø­Ø§Ù†', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'me@nasersobhan.com', 1, 'fa_AF'),
(27, '', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'aham@gma.com', 1, 'en'),
(28, '', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'demo@demo.com', 1, 'en'),
(29, 'Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'test@test.com', 1, 'fa_AF');

-- --------------------------------------------------------

--
-- Table structure for table `sob_langs`
--

CREATE TABLE `sob_langs` (
  `lan_id` int(11) NOT NULL,
  `lan_pid` int(11) NOT NULL,
  `lan_rid` int(11) NOT NULL,
  `lan_lang` varchar(15) NOT NULL DEFAULT 'en_US'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_like`
--

CREATE TABLE `sob_like` (
  `lik_id` int(11) NOT NULL,
  `lik_uid` int(11) NOT NULL,
  `lik_url` varchar(255) NOT NULL,
  `lik_pid` int(11) NOT NULL DEFAULT '0',
  `lik_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_location_oy`
--

CREATE TABLE `sob_location_oy` (
  `loc_id` int(11) UNSIGNED NOT NULL,
  `loc_iso` varchar(50) DEFAULT NULL,
  `loc_local_name` varchar(255) DEFAULT NULL,
  `loc_type` char(2) DEFAULT NULL,
  `loc_in_location` int(11) UNSIGNED DEFAULT NULL,
  `loc_geo_lat` double(18,11) DEFAULT NULL,
  `loc_geo_lng` double(18,11) DEFAULT NULL,
  `loc_db_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sob_message`
--

CREATE TABLE `sob_message` (
  `mes_id` int(11) NOT NULL,
  `mes_uid` int(11) NOT NULL,
  `mes_tid` int(11) NOT NULL,
  `mes_title` varchar(255) NOT NULL,
  `mes_body` text NOT NULL,
  `mes_read` int(11) NOT NULL DEFAULT '0',
  `mes_group` int(11) NOT NULL DEFAULT '0',
  `mes_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mes_status` int(11) NOT NULL DEFAULT '1',
  `mes_parent` int(11) NOT NULL DEFAULT '0',
  `mes_type` varchar(10) NOT NULL DEFAULT 'chat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_message`
--

INSERT INTO `sob_message` (`mes_id`, `mes_uid`, `mes_tid`, `mes_title`, `mes_body`, `mes_read`, `mes_group`, `mes_time`, `mes_status`, `mes_parent`, `mes_type`) VALUES
(153, 20, 19, 'Ø¹Ù†ÙˆØ§Ù†ÛŒ Ù…Ø³ÛŒØ¬', ' Ø¨Ø§ Ú©Ù…Ú© Ø¢Ù† Ù…ÛŒ ØªÙˆØ§Ù†ÛŒØ¯ Ø·Ø±Ø­ Ù‡Ø§ÛŒÛŒ Ù¾ÛŒØ§Ø¯Ù‡ Ú©Ù†ÛŒØ¯ Ú©Ù‡ Ø¨Ù‡ Ø±Ø§Ø­ØªÛŒ Ø¯Ø± Ù…ÙˆØ¨Ø§ÛŒÙ„ Ù‡Ø§ Ùˆ ØªØ¨Ù„Øª Ù‡Ø§ Ùˆ Ø±Ø§ÛŒØ§Ù†Ù‡ Ù‡Ø§ Ùˆ Ù‡Ù…ÛŒÙ†Ø·ÙˆØ± Ø¯Ø± ØªÙ…Ø§Ù…ÛŒ Ù…Ø±ÙˆØ±Ú¯Ø±Ù‡Ø§ÛŒ Ø±ÙˆØ² Ø¯Ù†ÛŒØ§ Ø¨Ù‡ Ø¯Ø±Ø³ØªÛŒ Ù†Ù…Ø§ÛŒØ´ Ø¯Ø§Ø¯Ù‡ Ø´ÙˆØ¯. Ø¨Ø±Ø§ÛŒ Ø§Ø³ØªÙØ§Ø¯Ù‡ ØªÙˆÛŒÛŒØªØ± Ø¯Ø± Ù¾Ø±ÙˆÚ˜Ù‡ Ù‡Ø§ÛŒ ÙˆØ¨ ÙØ§Ø±Ø³ÛŒ Ù…ÛŒ ØªÙˆØ§Ù†ÛŒØ¯ Ø§Ø² Ø§ÛŒÙ† ÙØ§ÛŒÙ„ Ø§Ø³ØªÙØ§Ø¯Ù‡ Ù†Ù…Ø§ÛŒÛŒØ¯. Ø¯Ø± Ø¢ÛŒÙ†Ø¯Ù‡ Ù†Ø³Ø®Ù‡ ÛŒ Ú©Ø§Ù…Ù„ØªØ±ÛŒ Ø§Ø² Ø§ÛŒÙ† ÙØ±ÛŒÙ… ÙˆØ±Ú© Ø¨ÛŒ Ù†Ø¸ÛŒØ± Ø±Ø§ Ø¯Ø± Ø§Ø®ØªÛŒØ§Ø± Ø´Ù…Ø§ Ù‚Ø±Ø§Ø± Ø®ÙˆØ§Ù‡ÛŒÙ… Ø¯Ø§Ø¯.\r\n\r\n[ Ø§ÛŒÙ† Ù¾Ø³Øª ØªÚ©Ù…ÛŒÙ„ Ù…ÛŒ Ø´ÙˆØ¯', 1, 1, '2019-09-08 06:47:01', 1, 0, 'message'),
(154, 20, 20, 'Ø¹Ù†ÙˆØ§Ù†ÛŒ Ù…Ø³ÛŒØ¬', ' Ø¨Ø§ Ú©Ù…Ú© Ø¢Ù† Ù…ÛŒ ØªÙˆØ§Ù†ÛŒØ¯ Ø·Ø±Ø­ Ù‡Ø§ÛŒÛŒ Ù¾ÛŒØ§Ø¯Ù‡ Ú©Ù†ÛŒØ¯ Ú©Ù‡ Ø¨Ù‡ Ø±Ø§Ø­ØªÛŒ Ø¯Ø± Ù…ÙˆØ¨Ø§ÛŒÙ„ Ù‡Ø§ Ùˆ ØªØ¨Ù„Øª Ù‡Ø§ Ùˆ Ø±Ø§ÛŒØ§Ù†Ù‡ Ù‡Ø§ Ùˆ Ù‡Ù…ÛŒÙ†Ø·ÙˆØ± Ø¯Ø± ØªÙ…Ø§Ù…ÛŒ Ù…Ø±ÙˆØ±Ú¯Ø±Ù‡Ø§ÛŒ Ø±ÙˆØ² Ø¯Ù†ÛŒØ§ Ø¨Ù‡ Ø¯Ø±Ø³ØªÛŒ Ù†Ù…Ø§ÛŒØ´ Ø¯Ø§Ø¯Ù‡ Ø´ÙˆØ¯. Ø¨Ø±Ø§ÛŒ Ø§Ø³ØªÙØ§Ø¯Ù‡ ØªÙˆÛŒÛŒØªØ± Ø¯Ø± Ù¾Ø±ÙˆÚ˜Ù‡ Ù‡Ø§ÛŒ ÙˆØ¨ ÙØ§Ø±Ø³ÛŒ Ù…ÛŒ ØªÙˆØ§Ù†ÛŒØ¯ Ø§Ø² Ø§ÛŒÙ† ÙØ§ÛŒÙ„ Ø§Ø³ØªÙØ§Ø¯Ù‡ Ù†Ù…Ø§ÛŒÛŒØ¯. Ø¯Ø± Ø¢ÛŒÙ†Ø¯Ù‡ Ù†Ø³Ø®Ù‡ ÛŒ Ú©Ø§Ù…Ù„ØªØ±ÛŒ Ø§Ø² Ø§ÛŒÙ† ÙØ±ÛŒÙ… ÙˆØ±Ú© Ø¨ÛŒ Ù†Ø¸ÛŒØ± Ø±Ø§ Ø¯Ø± Ø§Ø®ØªÛŒØ§Ø± Ø´Ù…Ø§ Ù‚Ø±Ø§Ø± Ø®ÙˆØ§Ù‡ÛŒÙ… Ø¯Ø§Ø¯.\r\n\r\n[ Ø§ÛŒÙ† Ù¾Ø³Øª ØªÚ©Ù…ÛŒÙ„ Ù…ÛŒ Ø´ÙˆØ¯', 1, 1, '2019-09-08 06:47:01', 1, 0, 'message'),
(155, 20, 26, 'Ø¹Ù†ÙˆØ§Ù†ÛŒ Ù…Ø³ÛŒØ¬', ' Ø¨Ø§ Ú©Ù…Ú© Ø¢Ù† Ù…ÛŒ ØªÙˆØ§Ù†ÛŒØ¯ Ø·Ø±Ø­ Ù‡Ø§ÛŒÛŒ Ù¾ÛŒØ§Ø¯Ù‡ Ú©Ù†ÛŒØ¯ Ú©Ù‡ Ø¨Ù‡ Ø±Ø§Ø­ØªÛŒ Ø¯Ø± Ù…ÙˆØ¨Ø§ÛŒÙ„ Ù‡Ø§ Ùˆ ØªØ¨Ù„Øª Ù‡Ø§ Ùˆ Ø±Ø§ÛŒØ§Ù†Ù‡ Ù‡Ø§ Ùˆ Ù‡Ù…ÛŒÙ†Ø·ÙˆØ± Ø¯Ø± ØªÙ…Ø§Ù…ÛŒ Ù…Ø±ÙˆØ±Ú¯Ø±Ù‡Ø§ÛŒ Ø±ÙˆØ² Ø¯Ù†ÛŒØ§ Ø¨Ù‡ Ø¯Ø±Ø³ØªÛŒ Ù†Ù…Ø§ÛŒØ´ Ø¯Ø§Ø¯Ù‡ Ø´ÙˆØ¯. Ø¨Ø±Ø§ÛŒ Ø§Ø³ØªÙØ§Ø¯Ù‡ ØªÙˆÛŒÛŒØªØ± Ø¯Ø± Ù¾Ø±ÙˆÚ˜Ù‡ Ù‡Ø§ÛŒ ÙˆØ¨ ÙØ§Ø±Ø³ÛŒ Ù…ÛŒ ØªÙˆØ§Ù†ÛŒØ¯ Ø§Ø² Ø§ÛŒÙ† ÙØ§ÛŒÙ„ Ø§Ø³ØªÙØ§Ø¯Ù‡ Ù†Ù…Ø§ÛŒÛŒØ¯. Ø¯Ø± Ø¢ÛŒÙ†Ø¯Ù‡ Ù†Ø³Ø®Ù‡ ÛŒ Ú©Ø§Ù…Ù„ØªØ±ÛŒ Ø§Ø² Ø§ÛŒÙ† ÙØ±ÛŒÙ… ÙˆØ±Ú© Ø¨ÛŒ Ù†Ø¸ÛŒØ± Ø±Ø§ Ø¯Ø± Ø§Ø®ØªÛŒØ§Ø± Ø´Ù…Ø§ Ù‚Ø±Ø§Ø± Ø®ÙˆØ§Ù‡ÛŒÙ… Ø¯Ø§Ø¯.\r\n\r\n[ Ø§ÛŒÙ† Ù¾Ø³Øª ØªÚ©Ù…ÛŒÙ„ Ù…ÛŒ Ø´ÙˆØ¯', 1, 1, '2019-09-08 06:47:01', 1, 0, 'message'),
(157, 20, 20, 'Ù¾Ø§Ø³Ø®: Ø¹Ù†ÙˆØ§Ù†ÛŒ Ù…Ø³ÛŒØ¬', ' Ø¨Ø§ Ú©Ù…Ú© Ø¢Ù† Ù…ÛŒ ØªÙˆØ§Ù†ÛŒØ¯ Ø·Ø±Ø­ Ù‡Ø§ÛŒÛŒ Ù¾ÛŒØ§Ø¯Ù‡ Ú©Ù†ÛŒØ¯ Ú©Ù‡ Ø¨Ù‡ Ø±Ø§Ø­ØªÛŒ Ø¯Ø± Ù…ÙˆØ¨Ø§ÛŒÙ„ Ù‡Ø§ Ùˆ ØªØ¨Ù„Øª Ù‡Ø§ Ùˆ Ø±Ø§ÛŒØ§Ù†Ù‡ Ù‡Ø§ Ùˆ\r\n Ù‡Ù…ÛŒÙ†Ø·ÙˆØ± Ø¯Ø± ØªÙ…Ø§Ù…ÛŒ Ù…Ø±ÙˆØ±Ú¯Ø±Ù‡Ø§ÛŒ Ø±ÙˆØ² Ø¯Ù†ÛŒØ§ Ø¨Ù‡ Ø¯Ø±Ø³ØªÛŒ Ù†Ù…Ø§ÛŒØ´ Ø¯Ø§Ø¯Ù‡ Ø´ÙˆØ¯. \r\nØ¨Ø±Ø§ÛŒ Ø§Ø³ØªÙØ§Ø¯Ù‡ ØªÙˆÛŒÛŒØªØ± Ø¯Ø± Ù¾Ø±ÙˆÚ˜Ù‡ Ù‡Ø§ÛŒ ÙˆØ¨ ÙØ§Ø±Ø³ÛŒ Ù…ÛŒ ØªÙˆØ§Ù†ÛŒØ¯ Ø§Ø² Ø§ÛŒÙ† ÙØ§ÛŒÙ„ Ø§Ø³ØªÙØ§Ø¯Ù‡ Ù†Ù…Ø§ÛŒÛŒØ¯. Ø¯Ø± Ø¢ÛŒÙ†Ø¯Ù‡ Ù†Ø³Ø®Ù‡ ÛŒ Ú©Ø§Ù…Ù„ØªØ±ÛŒ Ø§Ø² Ø§ÛŒÙ† ÙØ±ÛŒÙ… ÙˆØ±Ú© Ø¨ÛŒ Ù†Ø¸ÛŒØ± Ø±Ø§ Ø¯Ø± Ø§Ø®ØªÛŒØ§Ø± Ø´Ù…Ø§ Ù‚Ø±Ø§Ø± Ø®ÙˆØ§Ù‡ÛŒÙ… Ø¯Ø§Ø¯.\r\n\r\n[ Ø§ÛŒÙ† Ù¾Ø³Øª ØªÚ©Ù…ÛŒÙ„ Ù…ÛŒ Ø´ÙˆØ¯', 1, 0, '2019-09-08 06:49:37', 1, 0, 'message'),
(158, 20, 20, 'Ù¾Ø§Ø³Ø®: Ø¹Ù†ÙˆØ§Ù†ÛŒ Ù…Ø³ÛŒØ¬', '', 1, 0, '2019-09-08 06:56:02', 1, 0, 'message'),
(159, 20, 19, 'mymodule_feeds_presave not running', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 0, '2019-09-11 06:08:37', 1, 0, 'message'),
(160, 20, 20, 'mymodule_feeds_presave not running', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 0, '2019-09-11 06:08:37', 1, 0, 'message'),
(161, 20, 26, 'mymodule_feeds_presave not running', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 0, '2019-09-11 06:08:37', 1, 0, 'message'),
(162, 20, 19, 'Ø®ÛŒÙ„ÛŒ Ú©Ø§Ø±Ù‡', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨\r\nØ´Ø³\r\nÛŒØ¨Ø´\r\nØ³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 06:10:14', 1, 0, 'message'),
(163, 20, 20, 'Ø®ÛŒÙ„ÛŒ Ú©Ø§Ø±Ù‡', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨\r\nØ´Ø³\r\nÛŒØ¨Ø´\r\nØ³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 1252, '2019-09-11 06:10:14', 1, 0, 'message'),
(164, 20, 26, 'Ø®ÛŒÙ„ÛŒ Ú©Ø§Ø±Ù‡', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨\r\nØ´Ø³\r\nÛŒØ¨Ø´\r\nØ³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 06:10:14', 1, 0, 'message'),
(165, 20, 19, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´.Ø³ÛŒØ¨\r\nØ´\r\nØ³ÛŒ\r\nØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´\r\nØ³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 06:58:29', 1, 0, 'message'),
(166, 20, 20, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´.Ø³ÛŒØ¨\r\nØ´\r\nØ³ÛŒ\r\nØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´\r\nØ³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 1252, '2019-09-11 06:58:29', 1, 0, 'message'),
(167, 20, 26, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´.Ø³ÛŒØ¨\r\nØ´\r\nØ³ÛŒ\r\nØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´\r\nØ³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 06:58:29', 1, 0, 'message'),
(168, 20, 19, 'Ø®ÛŒÙ„ÛŒ Ú©Ø§Ø±Ù‡', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´\r\nØ³ÛŒØ¨\r\nØ´\r\nØ³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:05:18', 1, 0, 'message'),
(169, 20, 20, 'Ø®ÛŒÙ„ÛŒ Ú©Ø§Ø±Ù‡', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´\r\nØ³ÛŒØ¨\r\nØ´\r\nØ³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 1252, '2019-09-11 07:05:18', 1, 0, 'message'),
(170, 20, 26, 'Ø®ÛŒÙ„ÛŒ Ú©Ø§Ø±Ù‡', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´\r\nØ³ÛŒØ¨\r\nØ´\r\nØ³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:05:19', 1, 0, 'message'),
(171, 20, 19, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´\r\nØ³ÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:39:58', 1, 0, 'message'),
(172, 20, 20, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´\r\nØ³ÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 1252, '2019-09-11 07:39:58', 1, 0, 'message'),
(173, 20, 26, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´\r\nØ³ÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:39:58', 1, 0, 'message'),
(174, 20, 19, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:41:34', 1, 0, 'message'),
(175, 20, 20, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 1252, '2019-09-11 07:41:34', 1, 0, 'message'),
(176, 20, 26, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:41:34', 1, 0, 'message'),
(177, 20, 19, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:41:41', 1, 0, 'message'),
(178, 20, 20, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 1252, '2019-09-11 07:41:41', 1, 0, 'message'),
(179, 20, 26, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:41:41', 1, 0, 'message'),
(180, 20, 19, 'Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:46:59', 1, 0, 'message'),
(181, 20, 20, 'Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 1252, '2019-09-11 07:46:59', 1, 0, 'message'),
(182, 20, 26, 'Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:46:59', 1, 0, 'message'),
(183, 20, 19, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:48:36', 1, 0, 'message'),
(184, 20, 20, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 1252, '2019-09-11 07:48:36', 1, 0, 'message'),
(185, 20, 26, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 'Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1252, '2019-09-11 07:48:36', 1, 0, 'message'),
(186, 20, 20, 'Ù¾Ø§Ø³Ø®: mymodule_feeds_presave not running', 'ÛŒØ³Ø¨Ù„Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„Ø³ÛŒÙ„', 1, 0, '2019-09-11 07:58:24', 1, 0, 'message'),
(187, 20, 20, 'Ù¾Ø§Ø³Ø®: mymodule_feeds_presave not running', 'Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 0, '2019-09-11 07:58:49', 1, 0, 'message'),
(188, 20, 19, 'Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´', 'Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´\r\nØ³ÛŒØ¨Ø³ÛŒØ¨', 1, 1252, '2019-09-11 09:56:06', 1, 0, 'message'),
(189, 20, 20, 'Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´', 'Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´\r\nØ³ÛŒØ¨Ø³ÛŒØ¨', 1, 1252, '2019-09-11 09:56:06', 1, 0, 'message'),
(190, 20, 26, 'Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´', 'Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒ\r\nØ¨\r\nØ´Ø³ÛŒ\r\nØ¨Ø´\r\nØ³ÛŒØ¨Ø³ÛŒØ¨', 0, 1252, '2019-09-11 09:56:06', 1, 0, 'message'),
(191, 20, 26, 'Ø³ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³ÛŒ', 'Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 0, '2019-09-11 10:44:58', 1, 0, 'message'),
(192, 20, 26, 'Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³', 'ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ\r\nØ¨Ø´\r\nØ³ÛŒØ¨\r\nØ´\r\nØ³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 0, '2019-09-11 10:45:41', 1, 0, 'message'),
(193, 20, 19, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 0, '2019-09-11 10:46:17', 1, 0, 'message'),
(194, 20, 20, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 0, '2019-09-11 10:46:17', 1, 0, 'message'),
(195, 20, 26, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 0, '2019-09-11 10:46:17', 1, 0, 'message'),
(196, 20, 20, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 1, 0, '2019-09-11 10:46:32', 1, 0, 'message'),
(197, 20, 26, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒ', 0, 0, '2019-09-11 10:46:32', 1, 0, 'message'),
(198, 20, 20, 'Ù¾Ø§Ø³Ø®: Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³', '', 1, 0, '2019-09-11 11:00:58', 1, 0, 'message'),
(199, 20, 1253, 'groupchat-1253', 'sadfasdf', 0, 1253, '2019-09-13 14:48:27', 1, 1253, 'message'),
(200, 20, 1253, 'groupchat-1253', 'fdgsdfgdsfg', 0, 1253, '2019-09-13 14:49:04', 1, 1253, 'message'),
(201, 20, 1253, 'groupchat-1253', 'dfsgsdfgdsg', 0, 1253, '2019-09-13 14:49:06', 1, 1253, 'message'),
(202, 20, 1253, 'groupchat-1253', 'sdfgsdfgf', 0, 1253, '2019-09-13 14:49:07', 1, 1253, 'message'),
(203, 20, 1253, 'groupchat-1253', 'Ù†Ù‡ Ø³ÙˆÙ†Ø§ Ø¨Ø¯Ø±Ø¯ Ù†Ù…ÛŒØ®ÙˆØ±Ù‡ Ø¨Ø±ÛŒÙ… Ø®ÙˆØ¯Ù‡ Ø´Ù…Ø§ Ø±ÙˆØ² Ø¬Ù…Ø¹Ù‡ Ù…ÛŒÙ„Ù‡ Ù‡ÙØªÙ‡ Ú¯Ø°Ø´ØªÙ‡ Ø¨Ú†Ù‡ Ù‡Ø§ ØªÛŒÙ… 3 Ø±ÙØªÙ† Ú©Ø±Ø® Ø®ÛŒÙ„ÛŒ Ø­Ø§Ù„ Ú©Ø±Ø¯Ù† Ù…ÛŒÚ¯Ù… Ø§ÛŒ ÙˆÙ‚Øª Ø³Ø§Ù„ Ø®ÛŒÙ„ÛŒ Ù‡ÙˆØ§ Ø®ÙˆØ¨ÛŒ Ù‡Ø³Øª', 0, 1253, '2019-09-13 14:53:49', 1, 1253, 'message'),
(204, 29, 1253, 'groupchat-1253', 'dfgsdfgsdg', 0, 1253, '2019-09-13 14:57:32', 1, 1253, 'message'),
(205, 29, 1253, 'groupchat-1253', 'Ø³Ù„Ø§Ù… Ø¨Ø± ØªÙˆ', 0, 1253, '2019-09-13 14:57:38', 1, 1253, 'message'),
(206, 20, 1253, 'groupchat-1253', 'fgdsfgsdf', 0, 1253, '2019-09-13 15:27:42', 1, 1253, 'message'),
(207, 20, 1253, 'groupchat-1253', 'sdfgsdfg', 0, 1253, '2019-09-13 15:27:46', 1, 1253, 'message'),
(208, 20, 1253, 'groupchat-1253', 'sdfgsdfg', 0, 1253, '2019-09-13 15:27:47', 1, 1253, 'message'),
(209, 20, 1253, 'groupchat-1253', 'fgsdfgdsfg', 0, 1253, '2019-09-13 15:28:58', 1, 1253, 'message'),
(210, 20, 1253, 'groupchat-1253', 'sdfgsdf', 0, 1253, '2019-09-13 15:29:33', 1, 1253, 'message'),
(211, 20, 1253, 'groupchat-1253', 'sdfgsdfgd', 0, 1253, '2019-09-13 15:30:32', 1, 1253, 'message'),
(212, 20, 1253, 'groupchat-1253', 'fdgsdfg', 0, 1253, '2019-09-13 15:31:30', 1, 1253, 'message'),
(213, 20, 1253, 'groupchat-1253', 'sadfsadf', 0, 1253, '2019-09-13 15:32:42', 1, 1253, 'message'),
(214, 20, 1253, 'groupchat-1253', '', 0, 1253, '2019-09-13 15:36:37', 1, 1253, 'message'),
(215, 20, 1253, 'groupchat-1253', '', 0, 1253, '2019-09-13 15:37:41', 1, 1253, 'message'),
(216, 20, 1253, 'groupchat-1253', 'dfghdfghdfhg', 0, 1253, '2019-09-13 15:37:51', 1, 1253, 'message'),
(217, 20, 1253, 'groupchat-1253', 'dfhgdfhg', 0, 1253, '2019-09-13 15:37:55', 1, 1253, 'message'),
(218, 20, 1253, 'groupchat-1253', 'fsdfsfd', 0, 1253, '2019-09-13 15:39:03', 1, 1253, 'message'),
(219, 20, 1253, 'groupchat-1253', 'dasdasdasd', 0, 1253, '2019-09-13 15:39:10', 1, 1253, 'message'),
(220, 20, 1253, 'groupchat-1253', 'Ù…Ù† Ø§ÛŒÙ†Ø¬Ø§ Ù‡Ø³ØªÙ…', 0, 1253, '2019-09-13 15:39:19', 1, 1253, 'message'),
(221, 20, 1253, 'groupchat-1253', 'Ø§ÛŒÙ†Ø¬Ø§ Ù…Ù† Ù‡Ø³ØªÙ…', 0, 1253, '2019-09-13 15:39:27', 1, 1253, 'message'),
(222, 20, 1253, 'groupchat-1253', 'Ú†Ø±Ø§ Ø¨Ø§ÛŒØ¯ Ú©Ø§Ø± Ú©Ù†Ù… Ú©Ù‡ ', 0, 1253, '2019-09-13 15:39:35', 1, 1253, 'message'),
(223, 20, 1253, 'groupchat-1253', 'ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³', 0, 1253, '2019-09-13 15:39:44', 1, 1253, 'message'),
(224, 20, 1253, 'groupchat-1253', 'Ú†Ø·ÙˆØ±ÛŒ Ø§ÛŒÙ† Ú©Ø§Ø± Ù…ÛŒÚ©Ù†Ù‡ØŸ', 0, 1253, '2019-09-13 15:40:15', 1, 1253, 'message'),
(225, 20, 1253, 'groupchat-1253', 'Ú†ÛŒØŸ', 0, 1253, '2019-09-13 15:40:35', 1, 1253, 'message'),
(226, 20, 1253, 'groupchat-1253', 'Ø³Ø¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:40:45', 1, 1253, 'message'),
(227, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:40:47', 1, 1253, 'message'),
(228, 20, 1253, 'groupchat-1253', 'Ø³Ø¨Ù„ÛŒØ³Ø¨Ù„', 0, 1253, '2019-09-13 15:40:48', 1, 1253, 'message'),
(229, 20, 1253, 'groupchat-1253', 'Ø¨Ø³ÛŒÙ„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:40:49', 1, 1253, 'message'),
(230, 20, 1253, 'groupchat-1253', 'Ø³Ø¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:40:50', 1, 1253, 'message'),
(231, 20, 1253, 'groupchat-1253', 'Ø³Ø¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:40:51', 1, 1253, 'message'),
(232, 20, 1253, 'groupchat-1253', 'Ø³Ø¨ÛŒÙ„Ø¨ÛŒØ³Ù„', 0, 1253, '2019-09-13 15:40:52', 1, 1253, 'message'),
(233, 20, 1253, 'groupchat-1253', 'Ø³Ø¨Ù„ÛŒØ³Ø¨Ù„', 0, 1253, '2019-09-13 15:40:53', 1, 1253, 'message'),
(234, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:41:19', 1, 1253, 'message'),
(235, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:41:20', 1, 1253, 'message'),
(236, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:41:21', 1, 1253, 'message'),
(237, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:41:22', 1, 1253, 'message'),
(238, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„ÛŒØ³Ø¨Ù„', 0, 1253, '2019-09-13 15:41:23', 1, 1253, 'message'),
(239, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„ÛŒØ³Ø¨Ù„', 0, 1253, '2019-09-13 15:41:24', 1, 1253, 'message'),
(240, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„ÛŒØ³Ù„', 0, 1253, '2019-09-13 15:41:25', 1, 1253, 'message'),
(241, 20, 1253, 'groupchat-1253', 'Ø³Ø¨ÛŒÙ„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:41:26', 1, 1253, 'message'),
(242, 20, 1253, 'groupchat-1253', 'Ú†Ø±Ø§ Ø§ÛŒÙ†Ø·ÙˆØ±ÛŒÙ‡', 0, 1253, '2019-09-13 15:42:56', 1, 1253, 'message'),
(243, 20, 1253, 'groupchat-1253', 'Ù„ÛŒØ¨Ø³Ù„ÛŒ', 0, 1253, '2019-09-13 15:43:00', 1, 1253, 'message'),
(244, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:43:01', 1, 1253, 'message'),
(245, 20, 1253, 'groupchat-1253', 'ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:43:02', 1, 1253, 'message'),
(246, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:43:03', 1, 1253, 'message'),
(247, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„ÛŒØ³Ø¨Ù„', 0, 1253, '2019-09-13 15:43:04', 1, 1253, 'message'),
(248, 20, 1253, 'groupchat-1253', 'Ø³Ø¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:43:05', 1, 1253, 'message'),
(249, 20, 1253, 'groupchat-1253', 'Ø³Ø¨ÛŒÙ„Ø³ÛŒ', 0, 1253, '2019-09-13 15:43:06', 1, 1253, 'message'),
(250, 20, 1253, 'groupchat-1253', 'Ø³Ø¨ÛŒÙ„ÛŒØ³Ø¨Ù„', 0, 1253, '2019-09-13 15:43:07', 1, 1253, 'message'),
(251, 20, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:43:08', 1, 1253, 'message'),
(252, 29, 1253, 'groupchat-1253', 'Ú†ÛŒ Ù…ÛŒÚ¯ÛŒ ØªÙˆ ÙØ±Øª ÙØ±Øª Ù…Ø³Ø¬ Ù…ÛŒÚ©Ù†ÛŒØŸ', 0, 1253, '2019-09-13 15:43:37', 1, 1253, 'message'),
(253, 20, 1253, 'groupchat-1253', 'Ø´ÛŒØ¨Ø³ÛŒØ¨', 0, 1253, '2019-09-13 15:44:33', 1, 1253, 'message'),
(254, 20, 1253, 'groupchat-1253', 'Ø´Ø³ÛŒØ¨Ø³Ø´ÛŒØ¨', 0, 1253, '2019-09-13 15:44:35', 1, 1253, 'message'),
(255, 20, 1253, 'groupchat-1253', 'Ø´ÛŒØ³Ø¨Ø´Ø³ÛŒØ¨', 0, 1253, '2019-09-13 15:44:36', 1, 1253, 'message'),
(256, 29, 1253, 'groupchat-1253', 'Ú†ÛŒÚ©Ø§Ø± Ø®Ø§ Ø´Ø¯ØŸ', 0, 1253, '2019-09-13 15:45:08', 1, 1253, 'message'),
(257, 29, 1253, 'groupchat-1253', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1253, '2019-09-13 15:45:25', 1, 1253, 'message'),
(258, 29, 1253, 'groupchat-1253', 'Ø´ÛŒØ¨Ø³Ø´ÛŒ', 0, 1253, '2019-09-13 15:45:26', 1, 1253, 'message'),
(259, 29, 1253, 'groupchat-1253', 'Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨', 0, 1253, '2019-09-13 15:45:27', 1, 1253, 'message'),
(260, 29, 1253, 'groupchat-1253', 'Ø´Ø³ÛŒØ¨Ø³ÛŒØ¨', 0, 1253, '2019-09-13 15:45:28', 1, 1253, 'message'),
(261, 29, 1253, 'groupchat-1253', 'Ù…Ú†Ù… Ø¯Ú¯Ù‡', 0, 1253, '2019-09-13 15:45:44', 1, 1253, 'message'),
(262, 29, 1253, 'groupchat-1253', 'ÛŒØ³Ø´Ø¨Ø³ÛŒ', 0, 1253, '2019-09-13 15:45:48', 1, 1253, 'message'),
(263, 29, 1253, 'groupchat-1253', 'Ø´Ø³ÛŒØ¨Ø³ÛŒØ¨', 0, 1253, '2019-09-13 15:45:49', 1, 1253, 'message'),
(264, 29, 1253, 'groupchat-1253', 'Ø´Ø³ÛŒØ¨Ø³Ø´ÛŒØ¨', 0, 1253, '2019-09-13 15:45:50', 1, 1253, 'message'),
(265, 29, 1253, 'groupchat-1253', 'Ø´Ø³ÛŒØ¨Ø³ÛŒØ¨', 0, 1253, '2019-09-13 15:45:51', 1, 1253, 'message'),
(266, 29, 1253, 'groupchat-1253', 'Ø´ÛŒØ¨Ø´Ø³Ø¨ÛŒ', 0, 1253, '2019-09-13 15:48:17', 1, 1253, 'message'),
(267, 29, 1253, 'groupchat-1253', 'Ø´Ø³ÛŒØ¨Ø³Ø´ÛŒ', 0, 1253, '2019-09-13 15:48:19', 1, 1253, 'message'),
(268, 29, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:48:22', 1, 1253, 'message'),
(269, 29, 1253, 'groupchat-1253', 'Ø¨Ø³Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:48:54', 1, 1253, 'message'),
(270, 29, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:48:55', 1, 1253, 'message'),
(271, 29, 1253, 'groupchat-1253', 'Ø³Ø¨ÛŒÙ„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:48:56', 1, 1253, 'message'),
(272, 29, 1253, 'groupchat-1253', 'Ø³Ø¨ÛŒÙ„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:48:57', 1, 1253, 'message'),
(273, 29, 1253, 'groupchat-1253', 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:48:58', 1, 1253, 'message'),
(274, 29, 1253, 'groupchat-1253', 'Ø³Ø¨ÛŒÙ„Ø³ÛŒÙ„', 0, 1253, '2019-09-13 15:48:59', 1, 1253, 'message'),
(275, 29, 1253, 'groupchat-1253', 'Ø³Ø¨Ù„Ø³ÛŒØ¨Ù„', 0, 1253, '2019-09-13 15:49:00', 1, 1253, 'message'),
(276, 20, 1253, 'groupchat-1253', 'Ø³Ø´ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 1253, '2019-09-13 15:53:50', 1, 1253, 'message'),
(277, 20, 1253, 'groupchat-1253', 'Ø´Ø³ÛŒØ¨Ø³Ø´ÛŒØ¨', 0, 1253, '2019-09-13 15:53:52', 1, 1253, 'message'),
(278, 20, 1253, 'groupchat-1253', 'Ø´Ø³ÛŒØ¨Ø³ÛŒØ¨', 0, 1253, '2019-09-13 15:53:53', 1, 1253, 'message'),
(279, 20, 1253, 'groupchat-1253', 'Ø´ÛŒØ³Ø¨Ø³Ø´ÛŒØ¨', 0, 1253, '2019-09-13 15:53:54', 1, 1253, 'message'),
(280, 20, 1253, 'groupchat-1253', 'asdfasdfasd', 0, 1253, '2019-09-13 16:16:41', 1, 1253, 'message'),
(281, 20, 1253, 'groupchat-1253', 'sadfsadfsadf', 0, 1253, '2019-09-13 16:16:45', 1, 1253, 'message');

-- --------------------------------------------------------

--
-- Table structure for table `sob_money`
--

CREATE TABLE `sob_money` (
  `mon_id` int(11) NOT NULL,
  `mon_name` varchar(255) NOT NULL,
  `mon_rmoney` decimal(10,0) NOT NULL DEFAULT '0',
  `mon_account` int(11) NOT NULL DEFAULT '1147',
  `mon_rated` varchar(10) NOT NULL DEFAULT '0',
  `mon_doller` decimal(10,0) NOT NULL DEFAULT '0',
  `mon_discription` text NOT NULL,
  `mon_eoe` int(1) NOT NULL DEFAULT '1',
  `mon_mt` varchar(255) NOT NULL,
  `mon_sdate` date NOT NULL DEFAULT '1391-07-19',
  `mon_date` date NOT NULL DEFAULT '2012-10-10',
  `mon_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mon_stat` int(1) NOT NULL DEFAULT '0',
  `mon_uid` int(11) NOT NULL DEFAULT '0',
  `mon_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_notifications`
--

CREATE TABLE `sob_notifications` (
  `not_id` int(11) NOT NULL,
  `not_uid` int(11) NOT NULL,
  `not_title` varchar(255) NOT NULL,
  `not_type` varchar(50) NOT NULL,
  `not_url` varchar(500) NOT NULL,
  `not_status` int(11) NOT NULL DEFAULT '1',
  `not_seen` int(1) NOT NULL DEFAULT '0',
  `not_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_notifications`
--

INSERT INTO `sob_notifications` (`not_id`, `not_uid`, `not_title`, `not_type`, `not_url`, `not_status`, `not_seen`, `not_time`) VALUES
(29, 20, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '187', 2, 1, '2019-09-11 07:58:50'),
(30, 20, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙØ§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'group', '1253', 2, 1, '2019-09-11 08:04:08'),
(31, 20, 'Ø´Ù…Ø§ Ø§Ø² Ú¯Ø±ÙˆÙ¾ Ø­Ø°Ù Ø´Ø¯ÛŒØ¯Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ', 'group', '0', 2, 1, '2019-09-11 08:04:47'),
(32, 26, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙØ§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'group', '1253', 2, 0, '2019-09-11 08:06:18'),
(33, 20, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙØ§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'group', '1253', 2, 1, '2019-09-11 08:06:45'),
(34, 20, 'Ø´Ù…Ø§ Ø§Ø² Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø­Ø°Ù Ø´Ø¯ÛŒØ¯', 'group', '0', 2, 1, '2019-09-11 08:29:00'),
(35, 20, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'group', '1253', 2, 1, '2019-09-11 08:29:04'),
(36, 20, 'Ø´Ù…Ø§ Ø§Ø² Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø­Ø°Ù Ø´Ø¯ÛŒØ¯', 'group', '0', 2, 1, '2019-09-11 08:33:37'),
(37, 20, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'group', '1253', 2, 1, '2019-09-11 08:35:31'),
(38, 20, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'group', '1253', 2, 1, '2019-09-11 09:24:57'),
(39, 20, 'Ø´Ù…Ø§ Ø§Ø² Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø­Ø°Ù Ø´Ø¯ÛŒØ¯', 'group', '1253', 2, 1, '2019-09-11 09:28:59'),
(40, 19, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '188', 1, 0, '2019-09-11 09:56:06'),
(41, 20, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '189', 2, 1, '2019-09-11 09:56:06'),
(42, 26, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '190', 1, 0, '2019-09-11 09:56:06'),
(43, 26, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '191', 1, 0, '2019-09-11 10:44:58'),
(44, 26, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '192', 1, 0, '2019-09-11 10:45:41'),
(45, 19, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '193', 1, 0, '2019-09-11 10:46:17'),
(46, 20, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '194', 2, 1, '2019-09-11 10:46:17'),
(47, 26, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '195', 1, 0, '2019-09-11 10:46:17'),
(48, 20, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '196', 2, 1, '2019-09-11 10:46:32'),
(49, 26, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '197', 1, 0, '2019-09-11 10:46:32'),
(50, 20, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '198', 2, 1, '2019-09-11 11:00:58'),
(51, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '199', 1, 0, '2019-09-13 14:48:27'),
(52, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '200', 1, 0, '2019-09-13 14:49:04'),
(53, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '201', 1, 0, '2019-09-13 14:49:06'),
(54, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '202', 1, 0, '2019-09-13 14:49:07'),
(55, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '203', 1, 0, '2019-09-13 14:53:49'),
(56, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '204', 1, 0, '2019-09-13 14:57:32'),
(57, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '205', 1, 0, '2019-09-13 14:57:38'),
(58, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '206', 1, 0, '2019-09-13 15:27:42'),
(59, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '207', 1, 0, '2019-09-13 15:27:46'),
(60, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '208', 1, 0, '2019-09-13 15:27:47'),
(61, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '209', 1, 0, '2019-09-13 15:28:58'),
(62, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '210', 1, 0, '2019-09-13 15:29:33'),
(63, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '211', 1, 0, '2019-09-13 15:30:32'),
(64, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '212', 1, 0, '2019-09-13 15:31:30'),
(65, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '213', 1, 0, '2019-09-13 15:32:42'),
(66, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '214', 1, 0, '2019-09-13 15:36:37'),
(67, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '215', 1, 0, '2019-09-13 15:37:41'),
(68, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '216', 1, 0, '2019-09-13 15:37:51'),
(69, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '217', 1, 0, '2019-09-13 15:37:55'),
(70, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '218', 1, 0, '2019-09-13 15:39:03'),
(71, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '219', 1, 0, '2019-09-13 15:39:10'),
(72, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '220', 1, 0, '2019-09-13 15:39:19'),
(73, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '221', 1, 0, '2019-09-13 15:39:27'),
(74, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '222', 1, 0, '2019-09-13 15:39:35'),
(75, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '223', 1, 0, '2019-09-13 15:39:44'),
(76, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '224', 1, 0, '2019-09-13 15:40:15'),
(77, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '225', 1, 0, '2019-09-13 15:40:35'),
(78, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '226', 1, 0, '2019-09-13 15:40:45'),
(79, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '227', 1, 0, '2019-09-13 15:40:47'),
(80, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '228', 1, 0, '2019-09-13 15:40:48'),
(81, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '229', 1, 0, '2019-09-13 15:40:49'),
(82, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '230', 1, 0, '2019-09-13 15:40:50'),
(83, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '231', 1, 0, '2019-09-13 15:40:51'),
(84, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '232', 1, 0, '2019-09-13 15:40:52'),
(85, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '233', 1, 0, '2019-09-13 15:40:53'),
(86, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '234', 1, 0, '2019-09-13 15:41:19'),
(87, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '235', 1, 0, '2019-09-13 15:41:20'),
(88, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '236', 1, 0, '2019-09-13 15:41:21'),
(89, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '237', 1, 0, '2019-09-13 15:41:22'),
(90, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '238', 1, 0, '2019-09-13 15:41:23'),
(91, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '239', 1, 0, '2019-09-13 15:41:24'),
(92, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '240', 1, 0, '2019-09-13 15:41:25'),
(93, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '241', 1, 0, '2019-09-13 15:41:26'),
(94, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '242', 1, 0, '2019-09-13 15:42:56'),
(95, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '243', 1, 0, '2019-09-13 15:43:00'),
(96, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '244', 1, 0, '2019-09-13 15:43:01'),
(97, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '245', 1, 0, '2019-09-13 15:43:02'),
(98, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '246', 1, 0, '2019-09-13 15:43:03'),
(99, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '247', 1, 0, '2019-09-13 15:43:04'),
(100, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '248', 1, 0, '2019-09-13 15:43:05'),
(101, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '249', 1, 0, '2019-09-13 15:43:06'),
(102, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '250', 1, 0, '2019-09-13 15:43:07'),
(103, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '251', 1, 0, '2019-09-13 15:43:08'),
(104, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '252', 1, 0, '2019-09-13 15:43:37'),
(105, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '253', 1, 0, '2019-09-13 15:44:33'),
(106, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '254', 1, 0, '2019-09-13 15:44:35'),
(107, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '255', 1, 0, '2019-09-13 15:44:36'),
(108, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '256', 1, 0, '2019-09-13 15:45:08'),
(109, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '257', 1, 0, '2019-09-13 15:45:25'),
(110, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '258', 1, 0, '2019-09-13 15:45:26'),
(111, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '259', 1, 0, '2019-09-13 15:45:27'),
(112, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '260', 1, 0, '2019-09-13 15:45:28'),
(113, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '261', 1, 0, '2019-09-13 15:45:44'),
(114, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '262', 1, 0, '2019-09-13 15:45:48'),
(115, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '263', 1, 0, '2019-09-13 15:45:49'),
(116, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '264', 1, 0, '2019-09-13 15:45:50'),
(117, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '265', 1, 0, '2019-09-13 15:45:51'),
(118, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '266', 1, 0, '2019-09-13 15:48:17'),
(119, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '267', 1, 0, '2019-09-13 15:48:19'),
(120, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '268', 1, 0, '2019-09-13 15:48:22'),
(121, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '269', 1, 0, '2019-09-13 15:48:54'),
(122, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '270', 1, 0, '2019-09-13 15:48:55'),
(123, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '271', 1, 0, '2019-09-13 15:48:56'),
(124, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '272', 1, 0, '2019-09-13 15:48:57'),
(125, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '273', 1, 0, '2019-09-13 15:48:58'),
(126, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '274', 1, 0, '2019-09-13 15:48:59'),
(127, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', 'inbox', '275', 1, 0, '2019-09-13 15:49:00'),
(128, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '276', 1, 0, '2019-09-13 15:53:50'),
(129, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '277', 1, 0, '2019-09-13 15:53:52'),
(130, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '278', 1, 0, '2019-09-13 15:53:53'),
(131, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '279', 1, 0, '2019-09-13 15:53:54'),
(132, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '280', 1, 0, '2019-09-13 16:16:41'),
(133, 1253, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '281', 1, 0, '2019-09-13 16:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `sob_searchquery`
--

CREATE TABLE `sob_searchquery` (
  `sea_id` int(11) NOT NULL,
  `sea_uid` int(11) NOT NULL DEFAULT '0',
  `sea_pg` varchar(25) NOT NULL,
  `sea_key` varchar(150) NOT NULL,
  `sea_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_settings_oy`
--

CREATE TABLE `sob_settings_oy` (
  `set_id` int(11) NOT NULL,
  `set_uid` int(11) NOT NULL DEFAULT '0',
  `set_option` varchar(50) NOT NULL,
  `set_value` varchar(500) NOT NULL,
  `set_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `set_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_settings_oy`
--

INSERT INTO `sob_settings_oy` (`set_id`, `set_uid`, `set_option`, `set_value`, `set_time`, `set_status`) VALUES
(1, 19, 'currency', '9', '2016-11-13 11:56:03', 1),
(2, 0, 'sizetype', 'ØªÙ†', '2016-11-12 09:36:47', 1),
(3, 0, 'datetype', '2', '2016-11-13 11:47:22', 1),
(4, 0, 'footertxt', 'Ù†ÙˆØ´ØªÙ‡ Ù¾Ø§ Ø¨Ø±Ú¯ Ú†Ù¾', '2016-11-13 11:41:00', 1),
(5, 0, 'headertxt', 'Ù†ÙˆØ´ØªÙ‡ Ø³Ø± Ø¨Ø±Ú¯ Ú†Ø§Ù¾', '2016-11-13 11:41:00', 1),
(6, 0, 'update', '0', '2019-01-28 08:43:18', 1),
(8, 0, 'licence', '11245', '2016-11-13 09:58:57', 1),
(9, 0, 'TRIAL', '2019-12-03', '2018-05-28 05:46:56', 1),
(10, 0, 'ssmsg', 'Ø³Ø¨Ø­Ø§Ù†Ø³Ø§ÙØª Ù‡Ù…ÛŒØ´Ù‡ Ø¯Ø± Ù¾ÛŒ Ø¨Ø±Ù‚Ø±Ø§ÛŒ Ø§Ø±ØªØ¨Ø§Ø· Ø¨Ø§ Ù…Ø´ØªØ±ÛŒØ§Ù† Ø®ÙˆØ¯ Ù‡Ø³Øª ØªØ§ Ù‡ÛŒÚ† ÙˆÙ‚Øª Ø§Ø­Ø³Ø§Ø³ ØªÙ†Ù‡Ø§ Ù†Ú©Ù†Ù†Ø¯ Ùˆ Ø¨Ø¯Ø§Ù†Ù†Ø¯ Ø³Ø¨Ø­Ø§Ù†Ø³Ø§ÙØª Ù‡Ù…ÛŒØ´Ù‡ Ø¯Ø± Ú©Ù†Ø§Ø´Ø§Ù† Ù‡Ø³Øª Ùˆ Ø§Ø² Ù†Ø±Ù… Ø§ÙØ²Ø§Ø± Ù‡Ø§ÛŒ Ø®ÙˆØ¯ Ù¾Ø´ØªÛŒØ¨Ø§Ù†ÛŒ ØªØ®Ù†ÛŒÚ©ÛŒ Ù…ÛŒÚ©Ù†Ø¯.', '2018-12-18 09:25:00', 1),
(11, 0, 'companyname', 'Ù†Ø³Ø®Ù‡ Ø¢Ø²Ù…Ø§ÛŒØ´ÛŒ ØªØ­Øª ÙˆØ¨', '2016-11-13 11:44:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sob_statistics`
--

CREATE TABLE `sob_statistics` (
  `sta_id` int(11) NOT NULL,
  `sta_uid` int(11) NOT NULL DEFAULT '0',
  `sta_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sta_status` int(11) NOT NULL DEFAULT '1',
  `sta_ip` varchar(50) NOT NULL,
  `sta_browser` varchar(150) NOT NULL,
  `sta_os` varchar(150) NOT NULL,
  `sta_url` varchar(500) NOT NULL,
  `sta_ref` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_stc`
--

CREATE TABLE `sob_stc` (
  `stc_id` int(11) NOT NULL,
  `stc_name` varchar(255) NOT NULL,
  `stc_stat` int(11) NOT NULL DEFAULT '1',
  `stc_status` int(1) NOT NULL,
  `stc_uid` int(11) NOT NULL,
  `stc_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_stc`
--

INSERT INTO `sob_stc` (`stc_id`, `stc_name`, `stc_stat`, `stc_status`, `stc_uid`, `stc_time`) VALUES
(21, 'Ù…Ø®Ø²Ù† Ø¬Ø¯ÛŒØ¯', 1, 1, 1, '2016-07-12 03:25:06'),
(20, 'Ù…Ø®Ø²Ù† Ù…ÛŒÙ„ 78', 1, 1, 1, '2016-07-12 03:25:06'),
(12, 'Ù…Ø®Ø²Ù† Ø³Ø§Ø¨Ù‚', 1, 1, 1, '2016-07-12 03:25:06'),
(22, 'Ø¹Ù„ÛŒ Ø²Ø®ÛŒØ±Ù‡', 0, 1, 1, '2016-07-12 03:25:06'),
(23, 'Ø³Ø±Ø§Ø¬', 1, 1, 1, '2016-07-12 03:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `sob_tbl2rank_oy`
--

CREATE TABLE `sob_tbl2rank_oy` (
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
-- Table structure for table `sob_todolist`
--

CREATE TABLE `sob_todolist` (
  `tod_id` int(11) NOT NULL,
  `tod_uid` int(11) NOT NULL DEFAULT '0',
  `tod_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tod_status` int(11) NOT NULL DEFAULT '0',
  `tod_title` varchar(255) NOT NULL,
  `tod_note` text NOT NULL,
  `tod_edate` date NOT NULL,
  `tod_level` int(11) NOT NULL DEFAULT '0',
  `tod_groupshare` int(11) NOT NULL DEFAULT '0',
  `tod_type` varchar(10) NOT NULL DEFAULT 'user',
  `tod_category` varchar(50) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_todolist`
--

INSERT INTO `sob_todolist` (`tod_id`, `tod_uid`, `tod_time`, `tod_status`, `tod_title`, `tod_note`, `tod_edate`, `tod_level`, `tod_groupshare`, `tod_type`, `tod_category`) VALUES
(1, 20, '2019-09-08 11:05:14', 0, 'ÛŒÚ© Ú©Ø§Ø±ÛŒ Ø¯Ú¯Ù‡', 'Ù…Ú†Ù… ÙˆÙ„Ù„Ù‡', '2019-09-26', 2, 0, 'user', 'normal'),
(2, 20, '2019-09-08 11:15:07', 0, 'Skip an item from import feeds', 'asdfasdfasdf', '0000-00-00', 1, 0, 'user', 'normal'),
(3, 20, '2019-09-08 12:01:53', 0, 'fgsdfgsdfg', 'fgsdfgsdfg', '0000-00-00', 0, 0, 'user', 'normal'),
(4, 20, '2019-09-11 04:08:58', 0, 'Skip an item from import feeds', 'fghfgh', '2019-09-16', 1, 0, 'user', 'normal'),
(5, 20, '2019-09-13 16:04:14', 0, 'Ø®Ø¯Ù…Ø§Øª ØªØ®Ù†ÛŒÚ©ÛŒ', 'Ø´ÛŒØ¨Ø³ÛŒØ¨', '2019-09-13', 2, 1253, 'group', 'normal'),
(6, 20, '2019-09-13 16:07:02', 0, 'ÛŒÚ©ÛŒ Ø¨Ø±Ø§ÛŒ ØªØ³Øª', 'ÛŒØ¨Ø³Ø´ÛŒØ¨', '0000-00-00', 0, 1253, 'group', 'normal'),
(7, 20, '2019-09-13 16:07:28', 0, 'Ø·Ø²Ø°Ø¨ÛŒØ³Ù„Ø³ÛŒØ¨Ù„', '', '0000-00-00', 0, 1253, 'group', 'normal'),
(8, 20, '2019-09-13 16:07:40', 0, 'ÛŒØ³Ø¨Ù„Ø³ÛŒØ¨Ù„Ø³ÛŒÙ„', 'Ø³Ø¨ÛŒÙ„Ø³ÛŒØ¨Ù„', '0000-00-00', 2, 1253, 'group', 'normal'),
(9, 29, '2019-09-13 16:11:39', 0, 'Ø§ÛŒ Ù‡Ù… Ø§Ø² Ø·Ø±Ù Ù…Ù‡', 'ÛŒØ³Ø¨Ø³ÛŒØ¨ÛŒØ¨Ø³Ø¨', '0000-00-00', 0, 1253, 'group', 'normal'),
(10, 20, '2019-09-13 16:12:22', 0, 'Ø§Ù„ØªÙ„ØªÙ„ØªØ§', '', '0000-00-00', 0, 1253, 'group', 'normal'),
(11, 20, '2019-09-13 16:15:29', 0, 'ÛŒØ¨Ù„ÛŒØ¨Ù„ÛŒØ¨Ù„', 'ÛŒØ¨Ù„ÛŒØ¨Ù„ÛŒØ¨', '0000-00-00', 1, 1253, 'group', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `sob_ugroups`
--

CREATE TABLE `sob_ugroups` (
  `ugr_id` int(11) NOT NULL,
  `ugr_uid` int(11) NOT NULL,
  `ugr_userid` int(11) NOT NULL DEFAULT '0',
  `ugr_gid` int(11) NOT NULL,
  `ugr_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ugr_status` int(11) NOT NULL DEFAULT '1',
  `ugr_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_ugroups`
--

INSERT INTO `sob_ugroups` (`ugr_id`, `ugr_uid`, `ugr_userid`, `ugr_gid`, `ugr_time`, `ugr_status`, `ugr_comment`) VALUES
(28, 20, 19, 1252, '2019-09-08 05:52:32', 1, ''),
(29, 20, 20, 1252, '2019-09-08 05:52:35', 1, ''),
(30, 20, 26, 1252, '2019-09-08 05:52:37', 1, ''),
(32, 20, 26, 1253, '2019-09-11 08:06:18', 1, ''),
(35, 20, 20, 1253, '2019-09-11 08:35:31', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `sob_users`
--

CREATE TABLE `sob_users` (
  `sob_id` int(11) NOT NULL,
  `sob_user` varchar(30) NOT NULL,
  `sob_phone` varchar(150) NOT NULL,
  `sob_email` varchar(255) NOT NULL,
  `sob_name` varchar(50) DEFAULT NULL,
  `sob_password` varchar(255) NOT NULL,
  `sob_rank` int(1) NOT NULL DEFAULT '1',
  `sob_dep` int(11) NOT NULL DEFAULT '0',
  `sob_site` int(11) NOT NULL DEFAULT '0',
  `sob_title` varchar(500) NOT NULL,
  `sob_status` int(1) NOT NULL DEFAULT '1',
  `sob_token` varchar(250) NOT NULL,
  `sob_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_users`
--

INSERT INTO `sob_users` (`sob_id`, `sob_user`, `sob_phone`, `sob_email`, `sob_name`, `sob_password`, `sob_rank`, `sob_dep`, `sob_site`, `sob_title`, `sob_status`, `sob_token`, `sob_time`) VALUES
(19, 'admin', '0', 'nasersobhan@outlook.com', 'admin', '128d429f963d3366f2f31c3b923da66e', 99, 0, 0, '', 1, '0', '2016-10-20 10:04:13'),
(20, 'demo1234', '0797280900', 'demo@sobhansoft.com', 'Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', '6e9bece1914809fb8493146417e722f6', 99, 1243, 0, '', 1, '017f64b2234737be238c3133ffe19e8085fa0af038d17f5ec485df0a066f2a84', '2016-11-13 11:28:02'),
(21, 'fjoya', '0', 'fawadjoyaa@gmail.com', 'fawad', '49721ae36c2b52354c6a72df708032ea', 99, 0, 0, '', 100, '75c5dfe74643f61cb0b32e2f8f395b0eefa95013', '2016-11-14 04:08:47'),
(22, 'ahmad123', '0', 'ahmad@gmail.com', 'ahmad', 'e10adc3949ba59abbe56e057f20f883e', 99, 0, 0, '', 100, '4d1b9d93b1be28cd50b442733a60e7cfc297c5a2', '2018-02-01 05:21:18'),
(23, 'sdfgsdfg', '0', 'afghanict@outlook.com', 'sdfgsdfg', 'cde47ef73a184838340aafce4b402c97', 1, 0, 0, '', 100, '3535ca519a2a8d591dee72625b5dbc295002afca', '2019-09-05 06:02:52'),
(24, 'sdfsdf', '0', 'sdfsdfs@sfsf.com', 'sdfgsdfgddd', '42bdd7ef171ebfdfda2d3c6fefc81cdd', 1, 0, 0, '', 100, '13ea66fc6d848262dde77993639876ed94d00cb1', '2019-09-05 06:07:57'),
(25, 'naser2', '0', 'nasersofbhan@outlook.com', 'Ù†Ø§ØµØ±', 'b24331b1a138cde62aa1f679164fc62f', 1, 1243, 1248, '', 100, '1b6b3062d2ea328e35716cc525d12ea7ddd729b2', '2019-09-05 06:57:55'),
(26, 'nasersobhan', '0', 'me@nasersobhan.com', 'Ù†Ø§ØµØ± Ø³Ø¨Ø­Ø§Ù†', 'a906449d5769fa7361d7ecc6aa3f6d28', 1, 1243, 1248, '', 1, '4d03a00589a109965c2343b2582b0c600b1d283af79048002d03ada33eefb83a', '2019-09-05 07:33:27'),
(27, 'ahamadsha', '0', 'aham@gma.com', '', 'e99a18c428cb38d5f260853678922e03', 2, 1244, 1251, '', 100, 'cec788eea6e005ffd58da6aa958ebf79ffb1fe93', '2019-09-07 12:01:34'),
(28, 'demo200', '', 'demo@demo.com', '', 'e99a18c428cb38d5f260853678922e03', 2, 1245, 1251, '', 100, '7eca0bba7dc0aaf88e2384ebbc4082ecefbe4cba', '2019-09-08 04:08:42'),
(29, 'test1', '', 'test@test.com', 'Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', '128d429f963d3366f2f31c3b923da66e', 1, 1243, 1248, 'Tester', 1, '21ec427a41268c990d04b04ae6bef24768e718c76501696b1bb0add59c215f75', '2019-09-13 14:56:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sob_categories_oy`
--
ALTER TABLE `sob_categories_oy`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_slug` (`cat_slug`);

--
-- Indexes for table `sob_comments_oy`
--
ALTER TABLE `sob_comments_oy`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `sob_customerinfo`
--
ALTER TABLE `sob_customerinfo`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `sob_datafiles_oy`
--
ALTER TABLE `sob_datafiles_oy`
  ADD PRIMARY KEY (`dat_id`),
  ADD KEY `fk_data_files` (`dat_uid`);

--
-- Indexes for table `sob_groups`
--
ALTER TABLE `sob_groups`
  ADD PRIMARY KEY (`gro_id`);

--
-- Indexes for table `sob_historyuser_oy`
--
ALTER TABLE `sob_historyuser_oy`
  ADD PRIMARY KEY (`his_id`);

--
-- Indexes for table `sob_impexp`
--
ALTER TABLE `sob_impexp`
  ADD PRIMARY KEY (`imp_id`);

--
-- Indexes for table `sob_infouser_oy`
--
ALTER TABLE `sob_infouser_oy`
  ADD PRIMARY KEY (`inf_id`);

--
-- Indexes for table `sob_message`
--
ALTER TABLE `sob_message`
  ADD UNIQUE KEY `mes_id` (`mes_id`);

--
-- Indexes for table `sob_money`
--
ALTER TABLE `sob_money`
  ADD PRIMARY KEY (`mon_id`);

--
-- Indexes for table `sob_notifications`
--
ALTER TABLE `sob_notifications`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `sob_settings_oy`
--
ALTER TABLE `sob_settings_oy`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `sob_stc`
--
ALTER TABLE `sob_stc`
  ADD PRIMARY KEY (`stc_id`);

--
-- Indexes for table `sob_todolist`
--
ALTER TABLE `sob_todolist`
  ADD PRIMARY KEY (`tod_id`);

--
-- Indexes for table `sob_ugroups`
--
ALTER TABLE `sob_ugroups`
  ADD PRIMARY KEY (`ugr_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1255;

--
-- AUTO_INCREMENT for table `sob_customerinfo`
--
ALTER TABLE `sob_customerinfo`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sob_groups`
--
ALTER TABLE `sob_groups`
  MODIFY `gro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sob_historyuser_oy`
--
ALTER TABLE `sob_historyuser_oy`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `sob_impexp`
--
ALTER TABLE `sob_impexp`
  MODIFY `imp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27063;

--
-- AUTO_INCREMENT for table `sob_message`
--
ALTER TABLE `sob_message`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `sob_money`
--
ALTER TABLE `sob_money`
  MODIFY `mon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19831;

--
-- AUTO_INCREMENT for table `sob_notifications`
--
ALTER TABLE `sob_notifications`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `sob_settings_oy`
--
ALTER TABLE `sob_settings_oy`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sob_todolist`
--
ALTER TABLE `sob_todolist`
  MODIFY `tod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sob_ugroups`
--
ALTER TABLE `sob_ugroups`
  MODIFY `ugr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sob_users`
--
ALTER TABLE `sob_users`
  MODIFY `sob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
