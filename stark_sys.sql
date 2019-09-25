-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 01:14 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

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
  `cat_uid` int(11) NOT NULL DEFAULT 0,
  `cat_pid` int(11) NOT NULL DEFAULT 0,
  `cat_parent` int(11) NOT NULL DEFAULT 0,
  `cat_name` varchar(150) NOT NULL,
  `cat_content` text DEFAULT NULL,
  `cat_category` int(11) NOT NULL DEFAULT 0,
  `cat_type` varchar(30) NOT NULL DEFAULT 'jobs',
  `cat_section` varchar(50) NOT NULL DEFAULT 'ss',
  `cat_order` int(11) NOT NULL DEFAULT 0,
  `cat_avatar` int(11) NOT NULL DEFAULT 1482,
  `cat_cover` int(11) NOT NULL DEFAULT 1485,
  `cat_lang` varchar(10) NOT NULL DEFAULT 'en_US',
  `cat_hits` int(11) NOT NULL DEFAULT 0,
  `cat_utime` timestamp NOT NULL DEFAULT current_timestamp(),
  `cat_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `cat_status` int(11) NOT NULL DEFAULT 1,
  `cat_confirmed` int(1) NOT NULL DEFAULT 0
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
(1243, 'Ø®Ø¯Ù…Ø§Øª-Ù…Ø´ØªØ±ÛŒØ§Ù†', 0, 0, 0, 'Ø®Ø¯Ù…Ø§Øª ØªØ®Ù†ÛŒÚ©ÛŒ', NULL, 0, 'dep', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:12:13', '2019-09-05 06:12:13', 1, 0),
(1244, 'ÙØ±ÙˆØ´Ø§Øª', 0, 0, 0, 'ÙØ±ÙˆØ´Ø§Øª', NULL, 0, 'dep', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:12:23', '2019-09-05 06:12:23', 1, 0),
(1245, 'Ø§Ù†Ø¨Ø§Ø±-Ø¯Ø§Ø±ÛŒ-Ø§Ø³ØªØ§Ú©-', 0, 0, 0, 'Ø§Ù†Ø¨Ø§Ø± Ø¯Ø§Ø±ÛŒ (Ø§Ø³ØªØ§Ú©)', NULL, 0, 'dep', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:12:45', '2019-09-05 06:12:45', 1, 0),
(1246, 'ØªØ³Øª', 0, 0, 0, 'ØªØ³Øª ÙˆÛŒØ±Ø§ÛŒØ´', NULL, 0, 'dep', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:20:21', '2019-09-05 06:20:21', 100, 0),
(1250, 'Ù‡Ø±Ø§Øª-ØªØ®Ù†ÛŒÚ©ÛŒ', 0, 0, 0, 'Ù‡Ø±Ø§Øª ØªØ®Ù†ÛŒÚ©ÛŒ', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-07 09:46:28', '2019-09-07 09:46:28', 100, 0),
(1248, 'Ù‡Ø±Ø§Øª', 0, 0, 0, 'Ù‡Ø±Ø§Øª', NULL, 0, 'site', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:34:50', '2019-09-05 06:34:50', 1, 0),
(1249, 'Ú©Ø§Ø¨Ù„', 0, 0, 0, 'Ú©Ø§Ø¨Ù„', NULL, 0, 'site', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-05 06:34:54', '2019-09-05 06:34:54', 1, 0),
(1251, 'Ù…Ø²Ø§Ø±-Ø´Ø±ÛŒÙ', 0, 0, 0, 'Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ', NULL, 0, 'site', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-07 09:51:13', '2019-09-07 09:51:13', 1, 0),
(1255, 'Ù†ÙˆØ±Ù…Ø§Ù„', 0, 0, 0, 'Ù†ÙˆØ±Ù…Ø§Ù„', NULL, 0, 'priority', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-13 18:28:26', '2019-09-13 18:28:26', 1, 0),
(1256, 'Ø¹Ø§Ø¬Ù„', 0, 0, 0, 'Ø¹Ø§Ø¬Ù„', NULL, 0, 'priority', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-13 18:28:29', '2019-09-13 18:28:29', 1, 0),
(1257, 'Ø®ÛŒÙ„ÛŒ-Ø¹Ø§Ø¬Ù„', 0, 0, 0, 'Ø®ÛŒÙ„ÛŒ Ø¹Ø§Ø¬Ù„', NULL, 0, 'priority', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-13 18:28:34', '2019-09-13 18:28:34', 1, 0),
(1258, 'Ø¶Ø¹ÛŒÙÛŒ-Ù†Øª', 0, 0, 0, 'Ø¶Ø¹ÛŒÙÛŒ Ù†Øª', NULL, 0, 'tickets', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-13 19:19:42', '2019-09-13 19:19:42', 1, 0),
(1259, 'Ù†Ø¨ÙˆØ¯-Ú©Ø§Ù…Ù„-Ù†Øª', 0, 0, 0, 'Ù†Ø¨ÙˆØ¯ Ú©Ø§Ù…Ù„ Ù†Øª', NULL, 0, 'tickets', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-13 19:20:06', '2019-09-13 19:20:06', 1, 0),
(1260, 'Ø¨Ø±Ø³ÛŒ-ÙˆØ³Ø§ÛŒÙ„', 0, 0, 0, 'Ø¨Ø±Ø³ÛŒ ÙˆØ³Ø§ÛŒÙ„', NULL, 0, 'tickets', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-13 19:20:19', '2019-09-13 19:20:19', 1, 0),
(1261, 'Ù†ØµØ¨-Ø¬Ø¯ÛŒØ¯', 0, 0, 0, 'Ù†ØµØ¨ Ø¬Ø¯ÛŒØ¯', NULL, 0, 'tickets', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-13 19:22:00', '2019-09-13 19:22:00', 100, 0),
(1262, 'Ú¯Ø±ÙˆÙ¾-ÛŒÚ©', 0, 0, 0, 'Ú¯Ø±ÙˆÙ¾ ÛŒÚ©', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-14 05:55:56', '2019-09-14 05:55:56', 1, 0),
(1263, 'Ú¯Ø±ÙˆÙ¾-Ø¯ÙˆÙ…', 0, 0, 0, 'Ú¯Ø±ÙˆÙ¾ Ø¯ÙˆÙ…', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-14 05:56:00', '2019-09-14 05:56:00', 1, 0),
(1264, 'ØªÛŒØ§Ø±Ù‡-Ø¯Ú¯Ù‡', 0, 0, 0, 'ØªÛŒØ§Ø±Ù‡ Ø¯Ú¯Ù‡', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-14 05:58:35', '2019-09-14 05:58:35', 1, 0),
(1265, 'ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 0, 0, 0, 'ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-14 06:01:55', '2019-09-14 06:01:55', 1, 0),
(1266, 'sadfasdf', 30, 0, 0, 'sadfasdf', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'en_US', 0, '2019-09-14 06:03:09', '2019-09-14 06:03:09', 1, 0),
(1267, 'Ø§Ù†ÛŒ-Ø§ÛŒØªÙ‡', 30, 0, 0, 'Ø§Ù†ÛŒ Ø§ÛŒØªÙ‡', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-14 06:05:30', '2019-09-14 06:05:30', 1, 0),
(1268, 'Ø¯Ø±Ø­Ø§Ù„-Ø§Ø¬Ø±Ø§Ø¡', 20, 0, 0, 'Ø¯Ø±Ø­Ø§Ù„ Ø§Ø¬Ø±Ø§Ø¡', NULL, 0, 'tickettags', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-14 07:50:02', '2019-09-14 07:50:02', 1, 0),
(1269, 'Ù…Ù†ØªØ¸Ø±-Ù…Ø´ØªØ±ÛŒ', 20, 0, 0, 'Ù…Ù†ØªØ¸Ø± Ù…Ø´ØªØ±ÛŒ', NULL, 0, 'tickettags', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-14 07:51:30', '2019-09-14 07:51:30', 1, 0),
(1270, 'Ø§Ù†Ø¬Ø§Ù…-Ø´Ø¯', 20, 0, 0, 'Ø§Ù†Ø¬Ø§Ù… Ø´Ø¯', NULL, 0, 'tickettags', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-14 07:51:39', '2019-09-14 07:51:39', 100, 0),
(1271, 'Ù…Ø­ÙˆÙ„-Ø´Ø¯-Ø¨Ù‡-ÙˆÙ‚Øª-Ø¯ÛŒÚ¯Ø±', 20, 0, 0, 'Ù…Ø­ÙˆÙ„ Ø´Ø¯ Ø¨Ù‡ ÙˆÙ‚Øª Ø¯ÛŒÚ¯Ø±', NULL, 0, 'tickettags', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-14 07:51:52', '2019-09-14 07:51:52', 1, 0),
(1272, 'Ú¯Ø±ÙˆÙ¾-Ù…Ù†', 20, 0, 0, 'Ú¯Ø±ÙˆÙ¾ Ù…Ù†', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-15 11:17:54', '2019-09-15 11:17:54', 1, 0),
(1273, 'Ø§Ø³ØªØ­Ù‚Ø§Ù‚ÛŒ', 20, 0, 0, 'Ø§Ø³ØªØ­Ù‚Ø§Ù‚ÛŒ', NULL, 0, 'leavetypes', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-17 09:29:36', '2019-09-17 09:29:36', 1, 0),
(1274, 'Ø§Ø³ØªØ¹Ù„Ø§Ø¬ÛŒ', 20, 0, 0, 'Ù…Ø±ÛŒØ¶ÛŒ', NULL, 0, 'leavetypes', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-17 09:29:44', '2019-09-17 09:29:44', 1, 0),
(1275, 'Ø¨Ø¯ÙˆÙ†-Ù…Ø¹Ø§Ø´', 20, 0, 0, 'Ø¨Ø¯ÙˆÙ† Ù…Ø¹Ø§Ø´', NULL, 0, 'leavetypes', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-17 09:29:51', '2019-09-17 09:29:51', 1, 0),
(1276, 'Ú¯Ø±ÙˆÙ¾-Ø¬Ø¯ÛŒØ¯-ØªØ³Øª', 20, 0, 0, 'Ú¯Ø±ÙˆÙ¾ Ø¬Ø¯ÛŒØ¯ ØªØ³Øª', NULL, 0, 'groups', 'ss', 0, 1482, 1485, 'fa_AF', 0, '2019-09-23 11:02:16', '2019-09-23 11:02:16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sob_comments_oy`
--

CREATE TABLE `sob_comments_oy` (
  `com_id` int(11) NOT NULL,
  `com_uid` int(11) NOT NULL,
  `com_comment` text NOT NULL,
  `com_id_post` varchar(255) NOT NULL,
  `com_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_comments_oy`
--

INSERT INTO `sob_comments_oy` (`com_id`, `com_uid`, `com_comment`, `com_id_post`, `com_time`) VALUES
(15, 20, 'gfsdgfsdfgsdfgsdfg', '9e30ad08a1df3a739beb6034066168fd', '2019-09-23 10:49:54'),
(16, 20, 'sdfgsdfgsdfg', '9e30ad08a1df3a739beb6034066168fd', '2019-09-23 10:49:56'),
(17, 20, 'sdfgsdfgsdf', '9e30ad08a1df3a739beb6034066168fd', '2019-09-23 10:49:59'),
(18, 20, 'ØªØ§Ù†Ù„Ø§ØªÙ†Ù„Ø§ØªÙ†', 'e4870903b1947eaca44cd78bcf9db13c', '2019-09-23 11:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `sob_customerinfo`
--

CREATE TABLE `sob_customerinfo` (
  `cus_id` int(11) NOT NULL,
  `cus_active` tinyint(11) NOT NULL DEFAULT 1,
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
  `cus_site` int(11) NOT NULL,
  `cus_pppoename` varchar(35) NOT NULL,
  `cus_package` varchar(255) NOT NULL,
  `cus_installdate` date NOT NULL,
  `cus_activedate` date NOT NULL,
  `cus_user` varchar(150) NOT NULL,
  `cus_password` varchar(255) NOT NULL,
  `cus_ap` varchar(255) NOT NULL,
  `cus_signal` varchar(50) NOT NULL,
  `cus_ccq` varchar(50) NOT NULL,
  `cus_pppoeip` varchar(32) NOT NULL,
  `cus_localip` varchar(32) NOT NULL,
  `cus_publicip` varchar(32) NOT NULL,
  `cus_status` int(11) NOT NULL DEFAULT 1,
  `cus_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `cus_uid` int(11) NOT NULL DEFAULT 0,
  `cus_reseller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_customerinfo`
--

INSERT INTO `sob_customerinfo` (`cus_id`, `cus_active`, `cus_name`, `cus_label`, `cus_contractnu`, `cus_bw`, `cus_phone`, `cus_phone2`, `cus_address`, `cus_email`, `cus_sdate`, `cus_edate`, `cus_term`, `cus_demoterm`, `cus_servicecharge`, `cus_antenna`, `cus_router`, `cus_cable`, `cus_ip`, `cus_cid`, `cus_site`, `cus_pppoename`, `cus_package`, `cus_installdate`, `cus_activedate`, `cus_user`, `cus_password`, `cus_ap`, `cus_signal`, `cus_ccq`, `cus_pppoeip`, `cus_localip`, `cus_publicip`, `cus_status`, `cus_time`, `cus_uid`, `cus_reseller`) VALUES
(1, 1, 'Ù…Ø­Ù…Ø¯ Ù†Ø§ØµØ± Ø³Ø¨Ø­Ø§Ù†', 'Ø®Ø§Ù„ÛŒ', '22234', '2MB', '0797280900', '1244775547', 'Ø´Ù‡Ø± Ú©Ø§Ø¨Ù„ Ú©Ù†Ø§Ø± Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø§Ùˆ Ø·Ø±Ù Ù‡Ø±Ø§Øª', 'm@n.com', '2019-09-15', '2019-09-10', 'asdfasdfasdf', 'sadfasdfasdf', '500', '4500', '3500', '25000', '50', '300', 0, 'sdfgsd', 'Ø¨ 51', '2019-09-19', '2019-09-28', '', '', '', '', '', '', '', '', 1, '2019-09-15 04:54:27', 0, 0),
(2, 1, 'Ø³Ø¹ÛŒØ¯ Ø´Ø§Ù‡3', 'Ø´Ø±Ú©Øª Ø®ÙˆØ¨', '4454', '2MB', '938838', '23423', 'sdfsdfsdf', 'saeedshah@domam.com', '2019-09-01', '2020-01-25', 'asdfas\r\ndf\r\nasd\r\nfa\r\nsdfas', 'asdfasdf\r\nas\r\ndfa\r\nsdf\r\nasdf', '500', 'Router 1', 'Trouter', '399M', '2334323', 'A15', 0, 'Admin1', '5GB', '2019-09-01', '2019-09-28', '', '', '200', '180', '255', '192.168.234.234', '23.43.3.43', '192.154.334.433', 1, '2019-09-17 09:57:53', 0, 0),
(3, 1, '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', 1248, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', 1, '2019-09-25 10:48:43', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sob_datafiles_oy`
--

CREATE TABLE `sob_datafiles_oy` (
  `dat_id` int(11) NOT NULL,
  `dat_uid` int(11) NOT NULL,
  `dat_url` varchar(255) NOT NULL,
  `dat_access` int(11) NOT NULL DEFAULT 1,
  `dat_type` varchar(15) NOT NULL,
  `dat_ext` varchar(5) NOT NULL,
  `dat_category` varchar(10) NOT NULL,
  `dat_title` varchar(50) NOT NULL DEFAULT 'Untitled',
  `dat_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `dat_status` int(11) NOT NULL DEFAULT 1
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
  `gro_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `gro_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_historyuser_oy`
--

CREATE TABLE `sob_historyuser_oy` (
  `his_id` int(11) NOT NULL,
  `his_uid` int(11) NOT NULL DEFAULT 0,
  `his_pass` varchar(255) NOT NULL,
  `his_refurl` varchar(255) NOT NULL,
  `his_ip` varchar(38) NOT NULL,
  `his_browser` varchar(100) NOT NULL,
  `his_ossystem` varchar(50) NOT NULL,
  `his_tbl` varchar(10) DEFAULT NULL,
  `his_sessionkey` varchar(150) NOT NULL,
  `his_pid` varchar(255) DEFAULT NULL,
  `his_status` int(3) NOT NULL DEFAULT 1,
  `his_time` timestamp NOT NULL DEFAULT current_timestamp()
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
(193, 29, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, 'b8a8cfe88887b05fbe7205b5febf1366', NULL, 1, '2019-09-13 14:56:21'),
(194, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, 'a90b8c7a1b7a7de664f257ec289d7342', NULL, 1, '2019-09-14 04:41:08'),
(195, 20, '0', 'http://stark.test/?pg=categories&t=site', '127.0.0.1', 'Chrome', 'Windows 10', NULL, 'a90b8c7a1b7a7de664f257ec289d7342', NULL, 1, '2019-09-14 05:05:34'),
(196, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '254b7d902617c8fac1b8b5526389ddbb', NULL, 1, '2019-09-14 05:05:37'),
(197, 30, 'Password wrong', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '', NULL, 1, '2019-09-14 05:26:08'),
(198, 30, 'Password wrong', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '', NULL, 1, '2019-09-14 05:26:16'),
(199, 30, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '8a685a878dfb19ec79b2a60d1090c3fd', NULL, 1, '2019-09-14 05:26:22'),
(200, 30, 'Password wrong', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '', NULL, 1, '2019-09-14 09:11:52'),
(201, 30, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '7d11cddc1ff34ec6f04e2fb4944ba7ff', NULL, 1, '2019-09-14 09:11:58'),
(202, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '1aaf7dd17c85eddb708bc8e65ace62d1', NULL, 1, '2019-09-14 12:02:38'),
(203, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, 'e0bfe1dd3c18b9ea3edadd0ac99de533', NULL, 1, '2019-09-17 04:26:35'),
(204, 20, '1', 'http://stark.test/?pg=account&user=signin', '127.0.0.1', 'Chrome', 'Windows 10', NULL, '8e5b81a8200aef668c4a02928d2feb3d', NULL, 1, '2019-09-22 10:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `sob_infouser_oy`
--

CREATE TABLE `sob_infouser_oy` (
  `inf_id` int(11) NOT NULL,
  `inf_name` varchar(50) DEFAULT NULL,
  `inf_sname` varchar(40) DEFAULT NULL,
  `inf_about` text DEFAULT NULL,
  `inf_dob` date DEFAULT NULL,
  `inf_phone` double DEFAULT NULL,
  `inf_gender` varchar(8) DEFAULT 'Male',
  `inf_avatar` int(11) NOT NULL DEFAULT 1483,
  `inf_cover` int(11) NOT NULL DEFAULT 1485,
  `inf_martialstat` varchar(30) NOT NULL DEFAULT 'Single',
  `inf_hcity` int(11) DEFAULT NULL,
  `inf_hcountry` varchar(11) DEFAULT NULL,
  `inf_ccity` int(11) DEFAULT NULL,
  `inf_ccountry` varchar(11) DEFAULT NULL,
  `inf_email` varchar(255) DEFAULT NULL,
  `inf_status` int(11) NOT NULL DEFAULT 1,
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
(29, 'Ú©Ø§Ø±Ø¨Ø± ØªØ³Øª', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'test@test.com', 1, 'fa_AF'),
(30, 'Ù…Ø¯ÛŒØ± Ø®Ø¯Ù…Ø§Øª Ù‡Ø±Ø§Øª', NULL, NULL, NULL, 0, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'mnt@sdfsdf.com', 1, 'fa_AF'),
(31, 'Ø³Ù„Ø§Ù… Ø®Ø§Ù† Ø­Ø§Ø¬ÛŒ', NULL, NULL, NULL, 797280900, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'techman@stark.af', 1, 'en'),
(32, 'ØºÙ„Ø§Ù… Ø´Ø§Ù‡', NULL, NULL, NULL, 797280900, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'techuser@stark.af', 1, 'en'),
(33, 'Ù‡Ù…Ø§ÛŒÙˆÙ† Ù¾ÙˆÙ¾Ù„Ø²ÛŒ', NULL, NULL, NULL, 797280900, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'techboss@stark.af', 1, 'en'),
(34, 'Ø³Ø¹ÛŒØ¯ Ø­Ù…ÛŒØ¯ÛŒ', NULL, NULL, NULL, 797280900, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'normal@stark.af', 1, 'en'),
(35, 'Ø­Ù„ÛŒÙ… Ø´Ø§Ù‡', NULL, NULL, NULL, 797280900, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'salesman@stark.af', 1, 'en'),
(36, 'ØºÙ„Ø§Ù… Ø´Ø§Ù‡ÛŒ Ø³Ù„ÛŒÙ…', NULL, NULL, NULL, 797280900, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'saleuser@stark.af', 1, 'en'),
(37, 'ØªØ³Øª Ú©Ø§Ø±Ø¨Ø± Ø¬Ø¯ÛŒØ¯', NULL, NULL, NULL, 8993943, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'usr@new.com', 1, 'en'),
(38, 'fdgsdfgsdfg', NULL, NULL, NULL, 797280900, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'nasersobhanf@outlook.com', 1, 'en'),
(39, 'sdfsdf', NULL, NULL, NULL, 797280900, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'sdfsd@sdfsd.com', 1, 'en'),
(40, 'sdfgsdfgsdf', NULL, NULL, NULL, 797280900, 'Male', 1483, 1485, 'Single', NULL, NULL, NULL, NULL, 'nasersobrthan@outlook.com', 1, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `sob_inventory`
--

CREATE TABLE `sob_inventory` (
  `inv_id` int(11) NOT NULL,
  `inv_name` varchar(255) NOT NULL,
  `inv_uid` int(11) NOT NULL,
  `inv_status` int(11) NOT NULL,
  `inv_type` int(11) NOT NULL,
  `inv_category` int(11) NOT NULL,
  `inv_price` float NOT NULL,
  `inv_number` int(11) NOT NULL DEFAULT 1,
  `inv_hid` int(11) NOT NULL,
  `inv_note` text NOT NULL,
  `inv_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `inv_site` int(11) NOT NULL,
  `inv_dep` int(11) NOT NULL,
  `inv_tower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `sob_leaves`
--

CREATE TABLE `sob_leaves` (
  `lea_id` int(11) NOT NULL,
  `lea_uid` int(11) NOT NULL,
  `lea_site` int(11) NOT NULL,
  `lea_dep` int(11) NOT NULL,
  `lea_date` date NOT NULL,
  `lea_fdate` date NOT NULL,
  `lea_edate` date NOT NULL,
  `lea_number` double NOT NULL,
  `lea_numtype` varchar(10) NOT NULL,
  `lea_type` int(11) NOT NULL,
  `lea_whywp` text NOT NULL,
  `lea_replacement` int(11) NOT NULL,
  `lea_replaceaccept` int(10) NOT NULL DEFAULT 0,
  `lea_accepted` tinyint(1) NOT NULL,
  `lea_auid` int(11) NOT NULL,
  `lea_whynotaccepted` text NOT NULL,
  `lea_accepteddate` date NOT NULL,
  `lea_status` int(11) NOT NULL DEFAULT 1,
  `lea_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_leaves`
--

INSERT INTO `sob_leaves` (`lea_id`, `lea_uid`, `lea_site`, `lea_dep`, `lea_date`, `lea_fdate`, `lea_edate`, `lea_number`, `lea_numtype`, `lea_type`, `lea_whywp`, `lea_replacement`, `lea_replaceaccept`, `lea_accepted`, `lea_auid`, `lea_whynotaccepted`, `lea_accepteddate`, `lea_status`, `lea_time`) VALUES
(3, 20, 1248, 1243, '2019-09-17', '2019-09-16', '2019-09-19', 454, 'day', 0, 'dfgdfg', 20, 2, 2, 0, 'DSfgsd fgs dfgsdf g', '0000-00-00', 1, '2019-09-17 06:48:49'),
(4, 20, 1248, 1243, '2019-09-17', '2019-09-19', '2019-09-20', 4, 'day', 2, 'sdfsfsdfsfd', 20, 1, 1, 20, '', '0000-00-00', 1, '2019-09-17 06:59:04'),
(5, 20, 1248, 1243, '2019-09-17', '2019-09-04', '2019-09-19', 343, 'day', 3, 'sdfsdfsdf', 20, 1, 0, 0, '', '0000-00-00', 1, '2019-09-17 06:59:48'),
(6, 26, 1248, 1243, '2019-09-17', '2019-09-03', '2019-09-12', 23423, 'day', 1274, 'sdfsdfsdf', 20, 0, 0, 0, '', '0000-00-00', 1, '2019-09-17 07:00:34'),
(7, 26, 1248, 1243, '2019-09-17', '2019-09-17', '2019-09-25', 456456, 'day', 1273, 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', 20, 1, 0, 0, '', '0000-00-00', 1, '2019-09-17 07:34:21'),
(8, 20, 1248, 1243, '2019-09-17', '2019-09-09', '2019-09-19', 34, 'day', 1, 'Ø³ÛŒØ¨Ø³ÛŒØ¨Ø³Ø¨', 20, 0, 0, 0, '', '0000-00-00', 1, '2019-09-17 07:34:58'),
(9, 20, 1248, 1243, '2019-09-18', '2019-09-09', '2019-09-18', 33, 'Ø±ÙˆØ²', 1274, 'Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 20, 0, 0, 0, '', '0000-00-00', 1, '2019-09-18 09:09:31'),
(10, 20, 1248, 1243, '2019-09-19', '2019-09-10', '2019-09-20', 34, 'Ø±ÙˆØ²', 1274, 'Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø³ÛŒØ¨', 3434, 0, 0, 0, '', '0000-00-00', 1, '2019-09-19 04:05:37');

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
  `mes_read` int(11) NOT NULL DEFAULT 0,
  `mes_group` int(11) NOT NULL DEFAULT 0,
  `mes_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `mes_status` int(11) NOT NULL DEFAULT 1,
  `mes_parent` int(11) NOT NULL DEFAULT 0,
  `mes_type` varchar(10) NOT NULL DEFAULT 'chat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_message`
--

INSERT INTO `sob_message` (`mes_id`, `mes_uid`, `mes_tid`, `mes_title`, `mes_body`, `mes_read`, `mes_group`, `mes_time`, `mes_status`, `mes_parent`, `mes_type`) VALUES
(320, 20, 29, 'groupchat-29', 'Ø³Ù„Ø§Ù…', 0, 29, '2019-09-17 10:18:09', 1, 29, 'message'),
(321, 20, 20, 'Ù¾ÛŒØ§Ù… Ø®ØµÙˆØµÛŒ Ø¨Ø±Ø§ÛŒØª', 'Input groups enable you to combine form controls and text on the same line. They are similar to button groups in the sense that  they allow you to align the elements flush against each other.', 1, 0, '2019-09-17 10:57:03', 1, 0, 'message'),
(322, 20, 1252, 'groupchat-1252', 'sdfsd', 0, 1252, '2019-09-17 11:16:25', 1, 1252, 'message'),
(323, 20, 1252, 'groupchat-1252', 'sdfsdfa', 0, 1252, '2019-09-17 11:16:26', 1, 1252, 'message'),
(324, 20, 1252, 'groupchat-1252', '', 0, 1252, '2019-09-17 11:16:26', 1, 1252, 'message'),
(325, 20, 1252, 'groupchat-1252', 'as', 0, 1252, '2019-09-17 11:16:26', 1, 1252, 'message'),
(326, 20, 1252, 'groupchat-1252', 'f', 0, 1252, '2019-09-17 11:16:26', 1, 1252, 'message'),
(327, 20, 1252, 'groupchat-1252', 'asd', 0, 1252, '2019-09-17 11:16:26', 1, 1252, 'message'),
(328, 20, 1252, 'groupchat-1252', '', 0, 1252, '2019-09-17 11:16:26', 1, 1252, 'message'),
(329, 20, 1252, 'groupchat-1252', 'df', 0, 1252, '2019-09-17 11:16:27', 1, 1252, 'message'),
(330, 20, 1252, 'groupchat-1252', 'as', 0, 1252, '2019-09-17 11:16:27', 1, 1252, 'message'),
(331, 20, 1252, 'groupchat-1252', '', 0, 1252, '2019-09-17 11:16:27', 1, 1252, 'message'),
(332, 20, 1252, 'groupchat-1252', 'df', 0, 1252, '2019-09-17 11:16:27', 1, 1252, 'message'),
(333, 20, 1252, 'groupchat-1252', 'as', 0, 1252, '2019-09-17 11:16:27', 1, 1252, 'message'),
(334, 20, 26, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 0, '2019-09-19 04:06:10', 1, 0, 'message'),
(335, 20, 20, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 1, 0, '2019-09-19 04:06:11', 1, 0, 'message'),
(336, 20, 29, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 0, '2019-09-19 04:06:11', 1, 0, 'message'),
(337, 20, 32, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 0, '2019-09-19 04:06:11', 1, 0, 'message'),
(338, 20, 36, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 0, 0, '2019-09-19 04:06:11', 1, 0, 'message'),
(339, 20, 20, 'Ù¾Ø§Ø³Ø®: Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø³ÛŒØ¨Ø§ÛŒØ¨Ù„Ø§ÛŒØ¨Ù„Ø§Ø¨Ù„Ø§', 1, 0, '2019-09-19 04:13:18', 1, 335, 'message'),
(340, 20, 20, 'Ù¾Ø§Ø³Ø®: Ù¾Ø§Ø³Ø®: Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'Ø¨Ù„Ø§Ù‚ÙØ«Ù‚ÙØº', 1, 0, '2019-09-19 04:15:37', 1, 339, 'message'),
(341, 20, 20, 'Ù¾Ø§Ø³Ø®: Ù¾Ø§Ø³Ø®: Ù¾Ø§Ø³Ø®: Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'gdfgsdfg', 1, 0, '2019-09-19 04:27:24', 1, 340, 'message'),
(342, 20, 1252, 'groupchat-1252', 'sdfgsdfg', 0, 1252, '2019-09-23 10:50:17', 1, 1252, 'message'),
(343, 20, 1252, 'groupchat-1252', '', 0, 1252, '2019-09-23 10:50:18', 1, 1252, 'message'),
(344, 20, 1252, 'groupchat-1252', 'fg', 0, 1252, '2019-09-23 10:50:18', 1, 1252, 'message'),
(345, 20, 1252, 'groupchat-1252', 'fgsdf', 0, 1252, '2019-09-23 10:50:18', 1, 1252, 'message'),
(346, 20, 1252, 'groupchat-1252', '', 0, 1252, '2019-09-23 10:50:18', 1, 1252, 'message'),
(347, 20, 1252, 'groupchat-1252', 'g', 0, 1252, '2019-09-23 10:50:18', 1, 1252, 'message'),
(348, 20, 1252, 'groupchat-1252', 'gsdf', 0, 1252, '2019-09-23 10:50:19', 1, 1252, 'message'),
(349, 20, 1252, 'groupchat-1252', 'gsdfgs', 0, 1252, '2019-09-23 10:50:19', 1, 1252, 'message'),
(350, 20, 1252, 'groupchat-1252', 'dfasdf', 0, 1252, '2019-09-24 11:54:51', 1, 1252, 'message'),
(351, 20, 1252, 'groupchat-1252', 'asdfasdfasfd', 0, 1252, '2019-09-24 11:54:53', 1, 1252, 'message'),
(352, 20, 1252, 'groupchat-1252', 'asdfasdfasdf', 0, 1252, '2019-09-24 11:54:54', 1, 1252, 'message'),
(353, 20, 1252, 'groupchat-1252', 'asdfasdfsdf', 0, 1252, '2019-09-24 11:54:56', 1, 1252, 'message');

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
  `not_label` varchar(50) NOT NULL,
  `not_color` varchar(15) NOT NULL,
  `not_status` int(11) NOT NULL DEFAULT 1,
  `not_seen` int(1) NOT NULL DEFAULT 0,
  `not_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_notifications`
--

INSERT INTO `sob_notifications` (`not_id`, `not_uid`, `not_title`, `not_type`, `not_url`, `not_label`, `not_color`, `not_status`, `not_seen`, `not_time`) VALUES
(251, 0, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø±Ø®ØµØªÛŒ</strong><br>Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ <br> Ø§Ø² 2019-09-19 ØªØ§   ', 'leave', '4', '', 'info', 1, 0, '2019-09-17 06:59:04'),
(252, 0, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø±Ø®ØµØªÛŒ</strong><br>Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ <br> Ø§Ø² 2019-09-04 ØªØ§ 2019-09-19  ', 'leave', '5', '', 'info', 1, 0, '2019-09-17 06:59:48'),
(253, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø±Ø®ØµØªÛŒ</strong><br>Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ <br> Ø§Ø² 2019-09-03 ØªØ§ 2019-09-12  ', 'leave', '6', '', 'info', 2, 1, '2019-09-17 07:00:34'),
(254, 36, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ</strong><br>Ø¨Ø±Ø§ÛŒ :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ <br> Ø§Ø² 2019-09-17 ØªØ§ 2019-09-25 Ø¨Ù…Ù‡ Ù…Ø¯Øª:   day', 'hr', '7', '', 'info', 1, 0, '2019-09-17 07:34:21'),
(255, 36, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ</strong><br>Ø¨Ø±Ø§ÛŒ :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ <br> Ø§Ø² 2019-09-09 ØªØ§ 2019-09-19 Ø¨Ù…Ù‡ Ù…Ø¯Øª:  34 day', 'hr', '8', '', 'info', 1, 0, '2019-09-17 07:34:58'),
(256, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ Ø´Ù…Ø§ Ù‚Ø¨ÙˆÙ„ Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ <br> Ø¨Ù…Ù‡ Ù…Ø¯Øª:   ', 'hr', '0', '', 'success', 2, 1, '2019-09-17 07:57:39'),
(257, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ Ø´Ù…Ø§ Ù‚Ø¨ÙˆÙ„ Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '0', '', 'success', 2, 1, '2019-09-17 07:58:15'),
(258, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ Ø´Ù…Ø§ Ù‚Ø¨ÙˆÙ„ Ù†Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '0', '', 'danger', 2, 1, '2019-09-17 07:58:58'),
(260, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ Ø´Ù…Ø§ Ù‚Ø¨ÙˆÙ„ Ù†Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '0', '', 'danger', 2, 1, '2019-09-17 08:04:58'),
(261, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ Ø´Ù…Ø§ Ù‚Ø¨ÙˆÙ„ Ù†Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '0', '', 'danger', 2, 1, '2019-09-17 08:07:52'),
(262, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ Ø´Ù…Ø§ Ù‚Ø¨ÙˆÙ„ Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '4', '', 'success', 2, 1, '2019-09-17 08:08:56'),
(263, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ Ø´Ù…Ø§ Ù‚Ø¨ÙˆÙ„ Ù†Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '4', '', 'danger', 2, 1, '2019-09-17 09:21:25'),
(264, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø±Ø®ØµØªÛŒ Ø´Ù…Ø§ Ø§Ø² Ø·Ø±Ù Ù…Ø¯ÛŒØ± Ù‚Ø¨ÙˆÙ„ Ù†Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '4', '', 'danger', 2, 1, '2019-09-17 09:24:14'),
(265, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ Ø´Ù…Ø§ Ù‚Ø¨ÙˆÙ„ Ø´Ø¯.</strong><br>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø±Ø®ØµØªÛŒ Ø¨Ù‡ Ù…Ø¯ÛŒØ± Ø§Ø±Ø³Ø§Ù„ Ø´Ø¯.<br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '5', '', 'success', 2, 1, '2019-09-17 09:25:55'),
(266, 20, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯ Ø´Ù…Ø§ Ø«Ø¨Øª Ø´Ø¯: ØªØ³Øª Ù†Øª ', 'ticket', '13', '', 'info', 2, 1, '2019-09-17 09:51:24'),
(267, 31, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯: ØªØ³Øª Ù†Øª ', 'ticket', '13', '', 'info', 1, 0, '2019-09-17 09:51:24'),
(268, 20, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ ØªÛŒÙ… Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:ØªØ³Øª Ù†Øª ', 'ticket', '13', '', 'info', 1, 1, '2019-09-17 09:51:38'),
(269, 29, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ ØªÛŒÙ… Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:ØªØ³Øª Ù†Øª ', 'ticket', '13', '', 'info', 1, 0, '2019-09-17 09:51:38'),
(270, 20, '<strong>ØªØ³Øª Ù†Øª </strong><br><strong>Ù¾ÛŒØ´Ø±ÙØª:</strong> 19%<br><strong>ÙˆØ¶Ø¹ÛŒØª:</strong> Ø¯Ø±Ø­Ø§Ù„ Ø§Ø¬Ø±Ø§Ø¡', 'ticket', '13', '', 'info', 2, 1, '2019-09-17 09:51:47'),
(271, 20, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯ Ø´Ù…Ø§ Ø«Ø¨Øª Ø´Ø¯: Ù†ØµØ¨ Ø¬Ø¯ÛŒØ¯ Ù…Ø´ØªØ±ÛŒ Ø³Ø¹ÛŒØ¯ Ø´Ø§Ù‡', 'ticket', '14', '', 'info', 1, 1, '2019-09-17 09:58:37'),
(272, 31, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯: Ù†ØµØ¨ Ø¬Ø¯ÛŒØ¯ Ù…Ø´ØªØ±ÛŒ Ø³Ø¹ÛŒØ¯ Ø´Ø§Ù‡', 'ticket', '14', '', 'info', 1, 0, '2019-09-17 09:58:37'),
(273, 20, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯ Ø´Ù…Ø§ Ø«Ø¨Øª Ø´Ø¯: ØªØ³Øª Ù†Øª', 'ticket', '15', '', 'info', 2, 1, '2019-09-17 10:05:17'),
(274, 31, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯: ØªØ³Øª Ù†Øª', 'ticket', '15', '', 'info', 1, 0, '2019-09-17 10:05:17'),
(275, 20, '<strong>ØªØ³Øª Ù†Øª </strong><br><strong>Ù¾ÛŒØ´Ø±ÙØª:</strong> 19%<br><strong>ÙˆØ¶Ø¹ÛŒØª:</strong> Ø¯Ø±Ø­Ø§Ù„ Ø§Ø¬Ø±Ø§Ø¡', 'ticket', '13', '', 'info', 2, 1, '2019-09-17 10:16:32'),
(276, 36, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾  Ø§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'groups', '29', '', 'info', 1, 0, '2019-09-17 10:17:34'),
(277, 29, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '320', '', 'info', 1, 0, '2019-09-17 10:18:09'),
(278, 20, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '321', '', 'info', 1, 1, '2019-09-17 10:57:03'),
(279, 20, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ ØªÛŒÙ… Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:Ù†ØµØ¨ Ø¬Ø¯ÛŒØ¯ Ù…Ø´ØªØ±ÛŒ Ø³Ø¹ÛŒØ¯ Ø´Ø§Ù‡', 'ticket', '14', '', 'info', 2, 1, '2019-09-17 11:08:57'),
(280, 29, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ ØªÛŒÙ… Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:Ù†ØµØ¨ Ø¬Ø¯ÛŒØ¯ Ù…Ø´ØªØ±ÛŒ Ø³Ø¹ÛŒØ¯ Ø´Ø§Ù‡', 'ticket', '14', '', 'info', 1, 0, '2019-09-17 11:08:57'),
(281, 20, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ ØªÛŒÙ… Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:ØªØ³Øª Ù†Øª', 'ticket', '15', '', 'info', 1, 1, '2019-09-17 11:09:06'),
(282, 29, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ ØªÛŒÙ… Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:ØªØ³Øª Ù†Øª', 'ticket', '15', '', 'info', 1, 0, '2019-09-17 11:09:06'),
(283, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '322', '', 'info', 1, 0, '2019-09-17 11:16:25'),
(284, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '323', '', 'info', 1, 0, '2019-09-17 11:16:26'),
(285, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '324', '', 'info', 1, 0, '2019-09-17 11:16:26'),
(286, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '325', '', 'info', 1, 0, '2019-09-17 11:16:26'),
(287, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '326', '', 'info', 1, 0, '2019-09-17 11:16:26'),
(288, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '327', '', 'info', 1, 0, '2019-09-17 11:16:26'),
(289, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '328', '', 'info', 1, 0, '2019-09-17 11:16:26'),
(290, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '329', '', 'info', 1, 0, '2019-09-17 11:16:27'),
(291, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '330', '', 'info', 1, 0, '2019-09-17 11:16:27'),
(292, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '331', '', 'info', 1, 0, '2019-09-17 11:16:27'),
(293, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '332', '', 'info', 1, 0, '2019-09-17 11:16:27'),
(294, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '333', '', 'info', 1, 0, '2019-09-17 11:16:27'),
(295, 20, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯ Ø´Ù…Ø§ Ø«Ø¨Øª Ø´Ø¯: ØªØ³Øª Ø¯ÛŒÚ¯Ø±', 'ticket', '16', '', 'info', 1, 1, '2019-09-17 11:16:54'),
(296, 31, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯: ØªØ³Øª Ø¯ÛŒÚ¯Ø±', 'ticket', '16', '', 'info', 1, 0, '2019-09-17 11:16:54'),
(297, 20, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯ Ø´Ù…Ø§ Ø«Ø¨Øª Ø´Ø¯: Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³ÛŒØ¨', 'ticket', '17', '', 'info', 1, 1, '2019-09-17 11:17:10'),
(298, 31, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯: Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³ÛŒØ¨', 'ticket', '17', '', 'info', 1, 0, '2019-09-17 11:17:10'),
(299, 20, '<strong>Ù†ØµØ¨ Ø¬Ø¯ÛŒØ¯ Ù…Ø´ØªØ±ÛŒ Ø³Ø¹ÛŒØ¯ Ø´Ø§Ù‡</strong><br><strong>Ù¾ÛŒØ´Ø±ÙØª:</strong> 65%<br><strong>ÙˆØ¶Ø¹ÛŒØª:</strong> Ø¯Ø±Ø­Ø§Ù„ Ø§Ø¬Ø±Ø§Ø¡', 'ticket', '14', '', 'info', 2, 1, '2019-09-17 11:17:37'),
(300, 20, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:ØªØ³Øª Ù†Øª', 'ticket', '15', '', 'info', 1, 1, '2019-09-17 11:17:41'),
(301, 20, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ ØªÛŒÙ… Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³ÛŒØ¨', 'ticket', '17', '', 'info', 1, 1, '2019-09-17 11:17:46'),
(302, 29, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ ØªÛŒÙ… Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³ÛŒØ¨', 'ticket', '17', '', 'info', 1, 0, '2019-09-17 11:17:46'),
(303, 20, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:ØªØ³Øª Ù†Øª', 'ticket', '15', '', 'info', 1, 1, '2019-09-17 11:17:52'),
(304, 20, '<strong>ØªØ³Øª Ù†Øª</strong><br><strong>Ù¾ÛŒØ´Ø±ÙØª:</strong> 90%<br><strong>ÙˆØ¶Ø¹ÛŒØª:</strong> Ø¯Ø±Ø­Ø§Ù„ Ø§Ø¬Ø±Ø§Ø¡', 'ticket', '15', '', 'info', 1, 1, '2019-09-17 11:17:57'),
(305, 20, '<strong>ØªØ³Øª Ù†Øª</strong><br><strong>Ù¾ÛŒØ´Ø±ÙØª:</strong> 14%<br><strong>ÙˆØ¶Ø¹ÛŒØª:</strong> Ø¯Ø±Ø­Ø§Ù„ Ø§Ø¬Ø±Ø§Ø¡', 'ticket', '15', '', 'info', 1, 1, '2019-09-17 11:18:02'),
(306, 20, '<strong>Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³ÛŒØ¨</strong><br><strong>Ù¾ÛŒØ´Ø±ÙØª:</strong> 46%<br><strong>ÙˆØ¶Ø¹ÛŒØª:</strong> Ø¯Ø±Ø­Ø§Ù„ Ø§Ø¬Ø±Ø§Ø¡', 'ticket', '17', '', 'info', 1, 1, '2019-09-17 11:18:07'),
(307, 20, '<strong>ØªØ³Øª Ù†Øª</strong><br><strong>Ù¾ÛŒØ´Ø±ÙØª:</strong> 43%<br><strong>ÙˆØ¶Ø¹ÛŒØª:</strong> Ø¯Ø±Ø­Ø§Ù„ Ø§Ø¬Ø±Ø§Ø¡', 'ticket', '15', '', 'info', 2, 1, '2019-09-17 11:18:12'),
(308, 0, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'groups', '1253', '', 'info', 1, 0, '2019-09-18 06:14:40'),
(309, 20, 'Ø´Ù…Ø§ Ø§Ø² Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø­Ø°Ù Ø´Ø¯ÛŒØ¯', 'groups', '1253', '', 'info', 2, 1, '2019-09-18 06:15:27'),
(310, 32, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'groups', '1253', '', 'info', 1, 0, '2019-09-18 06:15:55'),
(311, 32, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'groups', '1253', '', 'info', 1, 0, '2019-09-18 06:16:03'),
(312, 20, 'Ø´Ù…Ø§ Ø§Ø² Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø­Ø°Ù Ø´Ø¯ÛŒØ¯', 'groups', '1253', '', 'info', 1, 1, '2019-09-18 06:16:51'),
(313, 36, 'Ø´Ù…Ø§ Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ù…Ø²Ø§Ø± Ø´Ø±ÛŒÙ Ø§Ø¶Ø§ÙÙ‡ Ø´Ø¯ÛŒØ¯', 'groups', '1253', '', 'info', 1, 0, '2019-09-18 06:17:50'),
(314, 0, '<strong>ÙØ±Ù… Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ Ù¾Ø± Ø´Ø¯Ù‡ Ø§Ø³Øª.</strong><br>Ù†ÛŒØ§Ø² Ø¨Ù‡ ØªØ§ÛŒÛŒØ¯ ÛŒØ§ Ø±Ø¯ Ø´Ù…Ø§ Ø¯Ø§Ø±Ø¯..<br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '1', '', 'info', 1, 0, '2019-09-18 07:04:15'),
(315, 20, '<strong>ÙØ±Ù… Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ Ù¾Ø± Ø´Ø¯Ù‡ Ø§Ø³Øª.</strong><br>Ù†ÛŒØ§Ø² Ø¨Ù‡ ØªØ§ÛŒÛŒØ¯ ÛŒØ§ Ø±Ø¯ Ø´Ù…Ø§ Ø¯Ø§Ø±Ø¯..<br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '3', '', 'info', 1, 1, '2019-09-18 07:05:44'),
(316, 20, '<strong>Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ Ø´Ù…Ø§ Ø±Ø¯ Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'overtime', '', '', 'danger', 1, 1, '2019-09-18 07:06:16'),
(317, 20, '<strong>Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ Ø´Ù…Ø§ Ø±Ø¯ Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'overtime', '2', '', 'danger', 2, 1, '2019-09-18 07:06:36'),
(318, 20, '<strong>Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ Ø´Ù…Ø§ Ø±Ø¯ Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'overtime', '3', '', 'danger', 2, 1, '2019-09-18 07:06:49'),
(319, 20, '<strong>Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ Ø´Ù…Ø§ Ø±Ø¯ Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'overtime', '1', '', 'danger', 2, 1, '2019-09-18 07:07:46'),
(320, 20, '<strong>Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ Ø´Ù…Ø§ ØªØ§ÛŒÛŒØ¯ Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'overtime', '2', '', 'success', 2, 1, '2019-09-18 07:07:54'),
(321, 20, '<strong>ÙØ±Ù… Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ Ù¾Ø± Ø´Ø¯Ù‡ Ø§Ø³Øª.</strong><br>Ù†ÛŒØ§Ø² Ø¨Ù‡ ØªØ§ÛŒÛŒØ¯ ÛŒØ§ Ø±Ø¯ Ø´Ù…Ø§ Ø¯Ø§Ø±Ø¯..<br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '4', '', 'info', 2, 1, '2019-09-18 07:23:20'),
(322, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ</strong><br>Ø¨Ø±Ø§ÛŒ :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ <br> Ø§Ø² 2019-09-09 ØªØ§ 2019-09-18 Ø¨Ù…Ù‡ Ù…Ø¯Øª:  33 Ø±ÙˆØ²', 'hr', '9', '', 'info', 2, 1, '2019-09-18 09:09:31'),
(323, 20, '<strong>ÙØ±Ù… Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ Ù¾Ø± Ø´Ø¯Ù‡ Ø§Ø³Øª.</strong><br>Ù†ÛŒØ§Ø² Ø¨Ù‡ ØªØ§ÛŒÛŒØ¯ ÛŒØ§ Ø±Ø¯ Ø´Ù…Ø§ Ø¯Ø§Ø±Ø¯..<br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '5', '', 'info', 2, 1, '2019-09-18 09:09:45'),
(324, 20, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯ Ø´Ù…Ø§ Ø«Ø¨Øª Ø´Ø¯: Ø³Ø¨ÛŒØ´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'ticket', '18', '', 'info', 1, 1, '2019-09-18 09:09:55'),
(325, 31, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯: Ø³Ø¨ÛŒØ´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'ticket', '18', '', 'info', 1, 0, '2019-09-18 09:09:55'),
(326, 20, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯ Ø´Ù…Ø§ Ø«Ø¨Øª Ø´Ø¯: Ø®Ø±Ø§Ø¨Ù‡ Ù†Øª Ù…Ø§', 'ticket', '19', '', 'info', 2, 1, '2019-09-19 04:04:53'),
(327, 31, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯: Ø®Ø±Ø§Ø¨Ù‡ Ù†Øª Ù…Ø§', 'ticket', '19', '', 'info', 1, 0, '2019-09-19 04:04:53'),
(328, 3434, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ</strong><br>Ø¨Ø±Ø§ÛŒ :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ <br> Ø§Ø² 2019-09-10 ØªØ§ 2019-09-20 Ø¨Ù…Ù‡ Ù…Ø¯Øª:  34 Ø±ÙˆØ²', 'hr', '10', '', 'info', 1, 0, '2019-09-19 04:05:37'),
(329, 26, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '334', '', 'info', 1, 0, '2019-09-19 04:06:11'),
(330, 20, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '335', '', 'info', 2, 1, '2019-09-19 04:06:11'),
(331, 29, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '336', '', 'info', 1, 0, '2019-09-19 04:06:11'),
(332, 32, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '337', '', 'info', 1, 0, '2019-09-19 04:06:11'),
(333, 36, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '338', '', 'info', 1, 0, '2019-09-19 04:06:11'),
(334, 20, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '339', '', 'info', 1, 1, '2019-09-19 04:13:18'),
(335, 20, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '340', '', 'info', 2, 1, '2019-09-19 04:15:38'),
(336, 20, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '341', '', 'info', 1, 1, '2019-09-19 04:27:24'),
(337, 20, '<strong>Ø®Ø±Ø§Ø¨Ù‡ Ù†Øª Ù…Ø§</strong><br><strong>Ù¾ÛŒØ´Ø±ÙØª:</strong> 100% ', 'ticket', '19', '', 'success', 2, 1, '2019-09-19 12:02:02'),
(338, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '342', '', 'info', 1, 0, '2019-09-23 10:50:17'),
(339, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '343', '', 'info', 1, 0, '2019-09-23 10:50:18'),
(340, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '344', '', 'info', 1, 0, '2019-09-23 10:50:18'),
(341, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '345', '', 'info', 1, 0, '2019-09-23 10:50:18'),
(342, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '346', '', 'info', 1, 0, '2019-09-23 10:50:18'),
(343, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '347', '', 'info', 1, 0, '2019-09-23 10:50:18'),
(344, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '348', '', 'info', 1, 0, '2019-09-23 10:50:19'),
(345, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '349', '', 'info', 1, 0, '2019-09-23 10:50:19'),
(346, 20, 'Ø´Ù…Ø§ Ø§Ø² Ú¯Ø±ÙˆÙ¾ Ù†Ø§ØµØ± Ú¯Ø±ÙˆÙ¾ Ø­Ø°Ù Ø´Ø¯ÛŒØ¯', 'groups', '1252', '', 'info', 2, 1, '2019-09-23 11:58:44'),
(347, 20, 'ÙˆØ¸ÛŒÙÙ‡ Ø¨Ù‡ Ø´Ù…Ø§ Ù…Ø­ÙˆÙ„ Ø´Ø¯:Ø³Ø¨ÛŒØ´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 'ticket', '18', '', 'info', 1, 1, '2019-09-23 12:29:35'),
(348, 20, '<strong>Ø³Ø¨ÛŒØ´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨</strong><br><strong>Ù¾ÛŒØ´Ø±ÙØª:</strong> 21%<br><strong>ÙˆØ¶Ø¹ÛŒØª:</strong> Ø¯Ø±Ø­Ø§Ù„ Ø§Ø¬Ø±Ø§Ø¡', 'ticket', '18', '', 'info', 2, 1, '2019-09-23 12:29:50'),
(349, 20, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯ Ø´Ù…Ø§ Ø«Ø¨Øª Ø´Ø¯: ', 'ticket', '20', '', 'info', 1, 1, '2019-09-24 11:16:05'),
(350, 31, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯: ', 'ticket', '20', '', 'info', 1, 0, '2019-09-24 11:16:05'),
(351, 20, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯ Ø´Ù…Ø§ Ø«Ø¨Øª Ø´Ø¯: fghfdgh', 'ticket', '21', '', 'info', 1, 1, '2019-09-24 11:17:19'),
(352, 31, 'ØªÚ©Øª Ø¬Ø¯ÛŒØ¯: fghfdgh', 'ticket', '21', '', 'info', 1, 0, '2019-09-24 11:17:19'),
(353, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '350', '', 'info', 1, 0, '2019-09-24 11:54:51'),
(354, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '351', '', 'info', 1, 0, '2019-09-24 11:54:53'),
(355, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '352', '', 'info', 1, 0, '2019-09-24 11:54:54'),
(356, 1252, 'Ù¾ÛŒØ§Ù… Ø¬Ø¯ÛŒØ¯ Ø§Ø² Ø·Ø±Ù Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', 'inbox', '353', '', 'info', 1, 0, '2019-09-24 11:54:56'),
(357, 20, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ Ø´Ù…Ø§ Ù‚Ø¨ÙˆÙ„ Ù†Ø´Ø¯.</strong><br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '10', '', 'danger', 2, 1, '2019-09-25 05:30:27'),
(358, 26, '<strong>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ Ø´Ù…Ø§ Ù‚Ø¨ÙˆÙ„ Ø´Ø¯.</strong><br>Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø±Ø®ØµØªÛŒ Ø¨Ù‡ Ù…Ø¯ÛŒØ± Ø§Ø±Ø³Ø§Ù„ Ø´Ø¯.<br>Ø§Ø² Ø·Ø±Ù :Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡ ', 'hr', '7', '', 'success', 1, 0, '2019-09-25 06:42:04'),
(359, 20, '<strong>Ù†ØµØ¨ Ø¬Ø¯ÛŒØ¯ Ù…Ø´ØªØ±ÛŒ Ø³Ø¹ÛŒØ¯ Ø´Ø§Ù‡</strong><br><strong>Ù¾ÛŒØ´Ø±ÙØª:</strong> 84%<br><strong>ÙˆØ¶Ø¹ÛŒØª:</strong> Ø¯Ø±Ø­Ø§Ù„ Ø§Ø¬Ø±Ø§Ø¡', 'ticket', '14', '', 'info', 2, 1, '2019-09-25 09:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `sob_overtime`
--

CREATE TABLE `sob_overtime` (
  `ove_id` int(11) NOT NULL,
  `ove_uid` int(11) NOT NULL,
  `ove_site` int(11) NOT NULL,
  `ove_dep` int(11) NOT NULL,
  `ove_approve` int(11) NOT NULL DEFAULT 0,
  `ove_auid` int(11) NOT NULL,
  `ove_what` text NOT NULL,
  `ove_why` text NOT NULL,
  `ove_formtime` time NOT NULL,
  `ove_totime` time NOT NULL,
  `ove_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ove_status` int(11) NOT NULL DEFAULT 1,
  `ove_odate` date NOT NULL,
  `ove_adate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_overtime`
--

INSERT INTO `sob_overtime` (`ove_id`, `ove_uid`, `ove_site`, `ove_dep`, `ove_approve`, `ove_auid`, `ove_what`, `ove_why`, `ove_formtime`, `ove_totime`, `ove_time`, `ove_status`, `ove_odate`, `ove_adate`) VALUES
(1, 20, 1248, 1243, 2, 20, 'ghdfghdfh', 'fdghdfgh', '19:00:00', '23:59:00', '2019-09-18 06:42:24', 1, '2019-09-17', '2019-09-18'),
(2, 20, 1248, 1243, 1, 20, 'ÛŒØ¨Ù„Ø§ÛŒØ¨Ù„', 'Ø§ÛŒØ¨Ù„Ø§ÛŒØ¨Ù„Ø§', '07:44:00', '13:59:00', '2019-09-18 07:04:15', 1, '2019-09-10', '2019-09-18'),
(3, 20, 1248, 1243, 0, 20, 'ÛŒØ¨Ù„Ø§ÛŒØ¨Ù„', 'Ø§ÛŒØ¨Ù„Ø§ÛŒØ¨Ù„Ø§', '07:44:00', '13:59:00', '2019-09-18 07:05:44', 1, '2019-09-10', '2019-09-18'),
(4, 20, 1248, 1243, 0, 0, 'sdfasdf', 'sdfsadfsdf', '12:59:00', '12:59:00', '2019-09-18 07:23:20', 1, '2019-09-17', '0000-00-00'),
(5, 20, 1248, 1243, 0, 0, 'Ù„Ø¨Ø§ÛŒØ¨Ù„Ø§Ø¨ÛŒÙ„Ø§', 'ÛŒØ¨Ù„Ø§ÛŒØ¨Ù„Ø§', '23:00:00', '23:00:00', '2019-09-18 09:09:45', 1, '2019-09-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sob_permissions`
--

CREATE TABLE `sob_permissions` (
  `per_id` int(11) NOT NULL,
  `per_uid` int(11) NOT NULL,
  `per_allow` tinyint(1) NOT NULL DEFAULT 0,
  `per_type` varchar(15) NOT NULL DEFAULT 'view',
  `per_label` varchar(20) NOT NULL,
  `per_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_permissions`
--

INSERT INTO `sob_permissions` (`per_id`, `per_uid`, `per_allow`, `per_type`, `per_label`, `per_description`) VALUES
(71, 20, 1, 'view', 'ticket-add', ''),
(72, 20, 1, 'view', 'ticket-edit', ''),
(73, 20, 1, 'view', 'ticket-list', ''),
(74, 20, 1, 'view', 'customer-add', ''),
(75, 20, 1, 'view', 'customer-list', ''),
(76, 20, 1, 'view', 'customer-other', '');

-- --------------------------------------------------------

--
-- Table structure for table `sob_searchquery`
--

CREATE TABLE `sob_searchquery` (
  `sea_id` int(11) NOT NULL,
  `sea_uid` int(11) NOT NULL DEFAULT 0,
  `sea_pg` varchar(25) NOT NULL,
  `sea_key` varchar(150) NOT NULL,
  `sea_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_settings_oy`
--

CREATE TABLE `sob_settings_oy` (
  `set_id` int(11) NOT NULL,
  `set_uid` int(11) NOT NULL DEFAULT 0,
  `set_option` varchar(50) NOT NULL,
  `set_value` varchar(500) NOT NULL,
  `set_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `set_status` int(11) NOT NULL DEFAULT 1
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
(11, 0, 'companyname', 'Ù†Ø³Ø®Ù‡ Ø¢Ø²Ù…Ø§ÛŒØ´ÛŒ ØªØ­Øª ÙˆØ¨', '2016-11-13 11:44:24', 1),
(12, 0, 'techdep', '1243', '2019-09-14 05:23:01', 1),
(13, 0, 'salesdep', '1244', '2019-09-24 06:59:46', 1),
(14, 0, 'listsize', '20', '2019-09-25 09:16:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sob_stc`
--

CREATE TABLE `sob_stc` (
  `stc_id` int(11) NOT NULL,
  `stc_name` varchar(255) NOT NULL,
  `stc_stat` int(11) NOT NULL DEFAULT 1,
  `stc_status` int(1) NOT NULL,
  `stc_uid` int(11) NOT NULL,
  `stc_time` timestamp NOT NULL DEFAULT current_timestamp()
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
-- Table structure for table `sob_tickets`
--

CREATE TABLE `sob_tickets` (
  `tic_id` int(11) NOT NULL,
  `tic_title` varchar(255) NOT NULL,
  `tic_uid` int(11) NOT NULL DEFAULT 0,
  `tic_site` int(11) NOT NULL DEFAULT 0,
  `tic_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `tic_status` int(11) NOT NULL DEFAULT 1,
  `tic_cid` varchar(12) NOT NULL,
  `tic_priority` int(11) NOT NULL,
  `tic_body` text NOT NULL,
  `tic_type` int(11) NOT NULL DEFAULT 0,
  `tic_category` int(11) NOT NULL,
  `tic_sdate` datetime NOT NULL,
  `tic_ddate` datetime NOT NULL,
  `tic_tag` int(11) NOT NULL DEFAULT 0,
  `tic_assigned` varchar(12) NOT NULL,
  `tic_completenote` text NOT NULL,
  `tic_progress` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_tickets`
--

INSERT INTO `sob_tickets` (`tic_id`, `tic_title`, `tic_uid`, `tic_site`, `tic_time`, `tic_status`, `tic_cid`, `tic_priority`, `tic_body`, `tic_type`, `tic_category`, `tic_sdate`, `tic_ddate`, `tic_tag`, `tic_assigned`, `tic_completenote`, `tic_progress`) VALUES
(13, 'ØªØ³Øª Ù†Øª ', 20, 1248, '2019-09-17 09:51:24', 100, '1', 1256, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´\r\nØ³ÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³\r\nÛŒØ¨\r\nØ´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 2, 1259, '2019-09-17 14:21:38', '0000-00-00 00:00:00', 1268, 'g:1252', '', 19),
(14, 'Ù†ØµØ¨ Ø¬Ø¯ÛŒØ¯ Ù…Ø´ØªØ±ÛŒ Ø³Ø¹ÛŒØ¯ Ø´Ø§Ù‡', 20, 1248, '2019-09-17 09:58:37', 1, '2', 1255, 'hgfghd\r\nfgh\r\ndf\r\nfdgh\r\ndf\r\ngh\r\ndf\r\ng\r\ngh\r\ndf\r\nghdfghdfghdfgh', 1, 0, '2019-09-17 15:38:57', '0000-00-00 00:00:00', 1268, 'g:1252', '', 84),
(15, 'ØªØ³Øª Ù†Øª', 20, 1248, '2019-09-17 10:05:17', 1, '2', 1256, 'Ø³Ø´ÛŒØ¨Ø´Ø³Ø¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 2, 1260, '2019-09-17 15:47:52', '0000-00-00 00:00:00', 1268, '20', '', 43),
(16, 'ØªØ³Øª Ø¯ÛŒÚ¯Ø±', 20, 1248, '2019-09-17 11:16:54', 1, '2343', 1255, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 2, 1258, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0),
(17, 'Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³Ø´ÛŒØ¨Ø³ÛŒØ¨', 20, 1248, '2019-09-17 11:17:10', 1, '333', 1255, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 2, 1260, '2019-09-17 15:47:46', '0000-00-00 00:00:00', 1268, 'g:1272', '', 46),
(18, 'Ø³Ø¨ÛŒØ´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', 20, 1248, '2019-09-18 09:09:55', 1, '2', 1255, 'ÛŒØ¨Ø´Ø³ÛŒØ¨', 2, 1259, '2019-09-23 16:59:35', '0000-00-00 00:00:00', 1268, '20', '', 21),
(19, 'Ø®Ø±Ø§Ø¨Ù‡ Ù†Øª Ù…Ø§', 20, 1248, '2019-09-19 04:04:53', 1, '34', 1255, 'Ù†ØªØ§Ù†ØªØ§', 2, 1259, '2019-09-24 15:38:45', '2019-09-19 16:32:02', 0, 'g:1276', 'Ø·Ø¨Ù‚ Ù†ÛŒØ§Ø² Ø§Ù†Ø¬Ø§Ù… Ø´Ø¯.', 100),
(20, '', 20, 1248, '2019-09-24 11:16:05', 100, '', 1255, '', 2, 1258, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0),
(21, 'fghfdgh', 20, 1248, '2019-09-24 11:17:19', 1, 'dfghdfgh', 1255, 'fdghdfgh', 2, 1258, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sob_todolist`
--

CREATE TABLE `sob_todolist` (
  `tod_id` int(11) NOT NULL,
  `tod_uid` int(11) NOT NULL DEFAULT 0,
  `tod_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `tod_status` int(11) NOT NULL DEFAULT 0,
  `tod_title` varchar(255) NOT NULL,
  `tod_note` text NOT NULL,
  `tod_level` int(11) NOT NULL DEFAULT 0,
  `tod_groupshare` int(11) NOT NULL DEFAULT 0,
  `tod_type` varchar(10) NOT NULL DEFAULT 'user',
  `tod_category` varchar(50) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_todolist`
--

INSERT INTO `sob_todolist` (`tod_id`, `tod_uid`, `tod_time`, `tod_status`, `tod_title`, `tod_note`, `tod_level`, `tod_groupshare`, `tod_type`, `tod_category`) VALUES
(15, 20, '2019-09-16 04:54:46', 1, 'Ø§ÛŒØ¬Ø§Ø¯ Ø´Ø¯', '', 0, 0, 'user', 'normal'),
(17, 20, '2019-09-16 04:55:31', 1, 'Ø¬Ø¯ÛŒØ¯', '', 0, 0, 'user', 'normal'),
(19, 20, '2019-09-16 04:56:02', 1, 'Ø¬Ø¯ÛŒØ¯', '', 0, 0, 'user', 'normal'),
(20, 20, '2019-09-16 04:56:05', 1, 'Ø¬Ø¯ÛŒØ¯', '', 0, 0, 'user', 'normal'),
(21, 20, '2019-09-16 05:58:31', 1, 'Ø¨Ø§Ø² Ú©Ø±Ø¯Ù† Ù¾ÛŒØ§Ù…Ù‡Ø§ ØªÙˆØ³Ø· Ù…ÙˆØ¯Ø§Ù„', '', 0, 0, 'user', 'normal'),
(22, 20, '2019-09-16 05:59:48', 0, 'Ø§Ù†Ø¨Ø§Ø±', '', 0, 0, 'user', 'normal'),
(23, 20, '2019-09-16 06:00:15', 0, 'Ø§Ø±Ø³Ø§Ù„ Ø¯Ø±Ø®ÙˆØ§Ø³Øª Ø¨Ù‡ Ø§Ù†Ø¨Ø§Ø± Ø¯Ø§Ø± Ø¯Ø± ÙˆÙ‚Øª Ù…Ø´ØªØ±ÛŒ Ø¬Ø¯ÛŒØ¯', '', 0, 0, 'user', 'normal'),
(24, 20, '2019-09-16 06:13:10', 1, 'ØªØ³Øª Ù„ÛŒØ¨Ù„', '', 0, 0, 'user', 'normal'),
(25, 20, '2019-09-16 06:14:25', 1, 'ØªØ³Øª Ù„ÛŒØ¨Ù„', '', 0, 0, 'user', 'normal'),
(26, 20, '2019-09-16 06:30:02', 1, 'ØªØ³Ú© Ú¯Ø±ÙˆÙ¾ÛŒ Ø¬Ø¯ÛŒØ¯', '', 0, 0, 'user', 'normal'),
(27, 20, '2019-09-16 06:34:33', 1, 'Ù„ÛŒØ³Øª Ø¬Ø¯ÛŒØ¯', '', 0, 0, 'user', 'normal'),
(28, 20, '2019-09-16 06:34:50', 1, 'Ú†Ø±Ø§ Ù†Ù…ÛŒØ§Ø±Ù‡', '', 0, 0, 'user', 'normal'),
(29, 20, '2019-09-16 06:36:58', 0, 'Ú¯Ø±ÙˆÙ¾ Ø¯Ú¯Ù‡', '', 0, 35, 'user', 'normal'),
(30, 20, '2019-09-16 06:37:01', 1, 'Ø³Ø¨Ù„Ø³ÛŒØ¨Ù„', '', 0, 35, 'user', 'normal'),
(31, 20, '2019-09-16 06:37:02', 0, 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„Ø³', '', 0, 35, 'user', 'normal'),
(32, 20, '2019-09-16 06:37:04', 1, 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„', '', 0, 35, 'user', 'normal'),
(33, 20, '2019-09-16 06:37:06', 0, 'Ø³ÛŒØ¨Ù„Ø³ÛŒØ¨Ù„Ø³Ø¨Ù„', '', 0, 35, 'user', 'normal'),
(34, 20, '2019-09-16 07:21:39', 0, 'Ø¬Ø¯ÛŒØ¯', '', 0, 35, 'user', 'normal'),
(37, 20, '2019-09-16 10:53:54', 1, 'Ø¶Ù…ÛŒÙ…Ù‡ ØªÚ©Øª Ù‡Ø§', '', 0, 0, 'user', 'normal'),
(38, 20, '2019-09-16 10:54:25', 1, 'Ø®ÙˆØ§Ù†Ø¯Ù† Ù…Ø³Ø¬ ÙÙ‚Ø· ØªÙˆØ³Ø· Ø¯Ø±ÛŒØ§ÙØª Ú©Ù†Ù†Ø¯Ù‡', '', 0, 0, 'user', 'normal'),
(39, 20, '2019-09-16 11:01:42', 1, 'Ø§ÛŒØ¬Ø§Ø¯ Ø¨Ø³ØªÙ† Ø¯Ø± ØµÙˆØ±Øª Ù„ÙˆØ¯ Ø§Ø¬Ø§Ú©Ø³', '', 0, 0, 'user', 'normal'),
(40, 20, '2019-09-16 11:04:30', 1, 'ØªØ³Øª Ù†ÙˆØª Ø¯Ø§Ø±', 'Ø§ÛŒÙ† ØªØ³Øª Ù†ÙˆØª Ø¯Ø§Ø±Ø¯ Ùˆ Ø¨Ø§ÛŒØ¯ Ø¨Ù‡ Ù†Ù…Ø§ÛŒØ´ Ú¯Ø°Ø§Ø´ØªÙ‡ Ø´ÙˆØ¯ Ùˆ Ø§ÛŒÙ† Ø§ÙˆÙ„ÛŒØª Ø¨Ù†Ø¯ÛŒ Ù†ÛŒØ² Ø´Ø¯Ù‡ Ø§Ø³Øª Ù¾Ø³ Ø¨Ø§ÛŒØ¯ ÛŒÚ© Ø¬Ø§ÛŒÛŒ Ø¨Ø§Ø´Ø¯ Ú©Ù‡ Ø¯ÛŒØ¯Ù‡ Ø´ÙˆØ¯.', 2, 0, 'user', 'normal'),
(41, 20, '2019-09-16 11:16:44', 1, 'ØªØ³Øª Ø¯ÙˆÙ… Ø¨Ø±Ø§ÛŒ Ú©Ù… Ø§Ù‡Ù…ÛŒØª', 'Ù‡Ù…Ø±Ø§Ù‡ Ø¨Ø§ ÛŒÚ© ØªÚ©Ø³Øª Ú©ÙˆØªØ§Ù‡ Ùˆ ØªÙˆØ¶ÛŒØ­ Ø¢Ù† Ø¯Ø± Ø§ÛŒÙ†Ø¬Ø§', 1, 0, 'user', 'normal'),
(42, 20, '2019-09-16 12:09:04', 1, 'Ø§ÛŒØ¬Ø§Ø¯ Ú¯Ø±ÙˆÙ¾ Ø¯Ø± Ø®Ø§Ù†Ù‡', '', 0, 0, 'user', 'normal'),
(43, 20, '2019-09-17 05:45:51', 1, 'Ø«Ø¨Øª ÙØ±Ù… Ø±Ø®ØµØªÛŒ', '', 0, 0, 'user', 'normal'),
(44, 20, '2019-09-17 05:45:57', 1, 'Ø«Ø¨Øª ÙØ±Ù… Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ', '', 0, 0, 'user', 'normal'),
(45, 20, '2019-09-17 09:47:30', 1, 'Ø¬Ø¯ÛŒØ¯ Ø¨Ø±Ø§ÛŒ ØªØ³Øª', '', 0, 0, 'user', 'normal'),
(46, 20, '2019-09-17 09:48:37', 1, 'ÙˆÛŒØ±Ø§ÛŒØ´ todo Ù‡Ø§', '', 0, 0, 'user', 'normal'),
(47, 20, '2019-09-17 10:03:31', 1, 'ÙˆÛŒØ±Ø§ÛŒØ´ Ù…Ø´Ø®ØµØ§Øª Ù…Ø´ØªØ±ÛŒ', '', 0, 0, 'user', 'normal'),
(48, 20, '2019-09-17 10:18:24', 1, 'ØªÚ©ØªÙ‡Ø§ Ø¯Ø± Ú¯Ø±ÙˆÙ¾', '', 0, 0, 'user', 'normal'),
(49, 20, '2019-09-17 10:19:14', 0, 'ØªØ±Ù…ÛŒÙ… ÙØ±Ù… Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±Ø¨Ø±', '', 0, 29, 'user', 'normal'),
(50, 20, '2019-09-17 10:19:27', 0, 'Ø§Ø¬Ø§Ú©Ø³ Ú©Ø±Ø¯Ù† Ø§Ø±Ø³Ø§Ù„ Ù¾ÛŒØ§Ù… Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾ Ùˆ Ø´Ø®Øµ', '', 0, 29, 'user', 'normal'),
(51, 20, '2019-09-17 10:24:52', 1, 'ØªØ±Ù…ÛŒÙ… Ø§Ø¶Ø§ÙÙ‡ Ù†Ú©Ø±Ø¯Ù† Ø¯ÙˆØ¨Ø§Ø±Ù‡ Ú©Ø§Ø±Ø¨Ø± Ø¨Ù‡ Ú¯Ø±ÙˆÙ¾', '', 0, 0, 'user', 'normal'),
(52, 20, '2019-09-17 11:00:05', 1, 'ØªØ³Øª Ú©Ø§Ø±ÛŒÙ‡Ø§ÛŒ Ù‚Ø§Ø¨Ù„ Ø§Ø¬Ø±Ø§Ø¡', 'ØªØ³Øª Ù†ÙˆØª Ú©Ù‡ Ø¨Ø§ÛŒØ¯ ØªÙˆØ¶ÛŒØ­ Ø¯Ø§Ø¯Ù‡ Ø´ÙˆØ¯', 2, 0, 'user', 'normal'),
(53, 20, '2019-09-17 11:19:50', 1, 'Ø´Ù…Ø§Ø±Ù‡ Ú¯Ø±ÙˆÙ¾Ù‡Ø§ÛŒ Ø¯Ø± Ø®Ø§Ù†Ù‡', '', 0, 0, 'user', 'normal'),
(54, 20, '2019-09-17 11:22:34', 1, 'ÙˆÛŒØ±Ø§ÛŒØ´ Ú©Ø§Ø±Ø¨Ø±Ø§Ù†', '', 0, 0, 'user', 'normal'),
(55, 20, '2019-09-17 11:22:44', 1, 'Ø§ÛŒØ¬Ø§Ø¯ Ú©Ø§Ø±Ø¨Ø± Ø®Ø§Ù†Ù‡', '', 0, 0, 'user', 'normal'),
(56, 20, '2019-09-17 11:35:25', 1, 'Ù†Ù…Ø§ÛŒØ´ Ú©Ø§Ø±Ø¨Ø± Ø®Ø§Ù†Ù‡', '', 0, 0, 'user', 'normal'),
(57, 20, '2019-09-18 04:33:30', 1, 'ØªØ±Ù…ÛŒÙ… Ø±ÙˆØ² Ø³Ø§Ø¹Øª Ø¯Ø± Ø±Ø®ØµØªÛŒ ØªØ¨Ø¯ÛŒÙ„ Ø¨Ù‡ Ù…ØªÙ† ÙØ§Ø±Ø³ÛŒ', '', 0, 0, 'user', 'normal'),
(58, 20, '2019-09-18 05:41:33', 1, 'ÙˆÙ„ÛŒØ¯ÛŒØ´Ù†Ù‡Ø§', '', 0, 0, 'user', 'normal'),
(59, 20, '2019-09-18 07:23:59', 1, 'Ù„ÛŒÙ†Ú© Ù†ÙˆØªÛŒÙÛŒÚ©Ø´Ù†Ù‡Ø§', '', 0, 0, 'user', 'normal'),
(60, 20, '2019-09-18 12:03:34', 1, 'Ù„ÛŒØ³Øª Ù‡Ø§ (ØªÚ©ØªÙ‡Ø§  Ù…Ø´ØªØ±ÛŒ Ù‡Ø§)', '', 0, 0, 'user', 'normal'),
(61, 20, '2019-09-19 07:11:40', 1, 'Ø¯Ú©Ù…Ù‡ Ø­Ø°Ù Ø¨Ù‡ ÛŒÙˆØ²Ø±Ù„ÛŒØ³Øª Ø®Ø§Ù†Ù‡', '', 0, 0, 'user', 'normal'),
(62, 20, '2019-09-19 08:32:11', 1, 'Ø¬Ø³ØªØ¬Ùˆ Ùˆ Ù¾ÛŒØ¬ Ù†Ù…Ø¨Ø± Ù„ÛŒØ³ØªÙ‡Ø§', '', 0, 0, 'user', 'normal'),
(63, 20, '2019-09-19 11:55:45', 1, 'Ù„ÛŒØ³Øª Ù…Ø´ØªØ±ÛŒÙ‡Ø§', '', 0, 0, 'user', 'normal'),
(64, 20, '2019-09-21 07:48:12', 1, 'Ø¹Ù†ÙˆØ§Ù† ØµÙØ­Ø§Øª', '', 0, 0, 'user', 'normal'),
(65, 20, '2019-09-21 08:04:34', 1, 'Ù¾Ø±ÙˆÙØ§ÛŒÙ„ ', '', 0, 0, 'user', 'normal'),
(66, 20, '2019-09-21 09:16:22', 1, ' ØªØ±Ù…ÛŒÙ… Ø§Ø¬Ø§Ú©Ø³ Ø§Ø¨Ù„ Ú©ØªÚ¯ÙˆØ±ÛŒ Ù‡Ø§', '', 0, 0, 'user', 'normal'),
(67, 20, '2019-09-21 09:28:17', 1, 'Ù‚Ø¨ÙˆÙ„/Ø±Ø¯ Ø¬Ø§ÛŒÚ¯Ø²ÛŒÙ†ÛŒ ', '', 0, 0, 'user', 'normal'),
(68, 20, '2019-09-21 09:32:55', 1, 'Ù‚Ø¨ÙˆÙ„/Ø±Ø¯ Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ', '', 0, 0, 'user', 'normal'),
(69, 20, '2019-09-23 10:50:25', 0, 'sdfgsdf', '', 0, 1252, 'user', 'normal'),
(70, 20, '2019-09-23 10:50:26', 0, 'sdfgsdfg', '', 0, 1252, 'user', 'normal'),
(71, 20, '2019-09-23 10:50:28', 0, 'sdfgsdfgsdfg', '', 0, 1252, 'user', 'normal'),
(72, 20, '2019-09-23 10:50:29', 0, 'sdfgsdfgsdfg', '', 0, 1252, 'user', 'normal'),
(73, 20, '2019-09-23 10:50:31', 0, 'sdfgsdfgsd', '', 0, 1252, 'user', 'normal'),
(74, 20, '2019-09-23 10:50:32', 1, 'sdfgsdfgsdfg', '', 0, 1252, 'user', 'normal'),
(75, 20, '2019-09-23 10:50:34', 1, 'sdfgsdfgsdf', '', 0, 1252, 'user', 'normal'),
(76, 20, '2019-09-23 11:41:12', 1, 'ØªØµÙˆÛŒØ± Ø¨Ù‡ Ù¾Ø±ÙˆÙØ§ÛŒÙ„', '', 0, 0, 'user', 'normal'),
(77, 20, '2019-09-23 11:41:25', 1, 'ØªØ³Øª ØªØ³Ú© Ø§Ø¬Ø§Ú©Ø³', '', 0, 0, 'user', 'normal'),
(78, 20, '2019-09-23 11:43:17', 1, 'Ú†Ø±Ø§ Ø§ÛŒ Ú©Ø§Ø± Ù†Ù…ÛŒÚ©Ù†Ù‡', '', 0, 0, 'user', 'normal'),
(79, 20, '2019-09-23 11:48:38', 1, 'Ø®ÛŒÙ„ÛŒ Ú©Ø§Ø±Ù‡', 'dfghdfgh', 2, 0, 'user', 'normal'),
(80, 20, '2019-09-23 12:06:16', 1, 'dfgsdfg', '', 0, 1252, 'user', 'normal'),
(81, 20, '2019-09-24 07:45:37', 1, 'ØµÙØ­Ù‡ Ù¾ÛŒØ§Ù…Ù‡Ø§ Ø§Ù¾Ø¯ÛŒØª Ø¯ÛŒØ²Ø§ÛŒÙ†', '', 0, 0, 'user', 'normal'),
(82, 20, '2019-09-24 07:45:54', 1, 'Ø­Ø°Ù ÛŒÙˆØ²Ø± ØµÙØ­Ù‡ Ø®Ø§Ù†Ù‡', '', 0, 0, 'user', 'normal'),
(83, 20, '2019-09-24 07:48:08', 1, 'Ø³Ø¨ÛŒØ³', '', 0, 0, 'user', 'normal'),
(84, 20, '2019-09-24 11:18:31', 1, 'Ù…ÛŒÙ†Ùˆ Ø³Ù…Øª Ø±Ø§Ø³Øª Ù‡Ù…Ø±Ø§Ù‡ Ø¨Ø§ Ø§Ú©ØªÛŒÙˆ', '', 0, 0, 'user', 'normal'),
(85, 20, '2019-09-24 11:19:59', 1, 'Ø·Ø±Ø·Ø²', '', 0, 0, 'user', 'normal'),
(86, 20, '2019-09-24 11:44:16', 0, 'ÙÙ„ØªØ± Ù‡Ø§ Ù…Ø´ØªØ±ÛŒ Ù‡Ø§', '', 0, 0, 'user', 'normal'),
(87, 20, '2019-09-24 11:44:33', 1, 'Ù„ÛŒØ³Øª Ø±Ø®ØµØªÛŒ Ù‡Ø§', '', 0, 0, 'user', 'normal'),
(88, 20, '2019-09-24 11:44:40', 0, 'Ù„ÛŒØ³Øª Ø§Ø¶Ø§ÙÙ‡ Ú©Ø§Ø±ÛŒ Ù‡Ø§', '', 0, 0, 'user', 'normal'),
(89, 20, '2019-09-24 11:59:00', 1, 'sdfgsdfg', '', 0, 1252, 'user', 'normal'),
(90, 20, '2019-09-25 04:44:30', 1, 'ØªØ³Øª Ù„ÛŒØ³Øª Ù‡Ø§', '', 0, 0, 'user', 'normal'),
(91, 20, '2019-09-25 04:45:24', 0, 'Ø´Ø³ÛŒØ¨Ø´Ø³ÛŒØ¨', '', 0, 1252, 'user', 'normal'),
(92, 20, '2019-09-25 04:50:51', 1, 'ÛŒØ¨Ù„ÛŒØ³Ù„', '', 0, 0, 'user', 'normal'),
(93, 20, '2019-09-25 04:52:15', 1, 'dfgsdfg', '', 0, 0, 'user', 'normal'),
(94, 20, '2019-09-25 04:53:07', 1, 'asdfasdfasdf', '', 0, 0, 'user', 'normal'),
(95, 20, '2019-09-25 04:53:32', 1, 'sdfgsdfg', '', 0, 0, 'user', 'normal'),
(96, 20, '2019-09-25 04:54:37', 1, 'asdfasdf', '', 0, 0, 'user', 'normal'),
(97, 20, '2019-09-25 04:55:21', 1, 'dfsgsdfg', '', 0, 0, 'user', 'normal'),
(98, 20, '2019-09-25 04:57:19', 1, 'sdfgsdfg', '', 0, 0, 'user', 'normal'),
(99, 20, '2019-09-25 04:58:10', 1, 'sdfgsdfg', '', 0, 0, 'user', 'normal'),
(100, 20, '2019-09-25 04:59:29', 1, 'gsdfgsdfg', '', 0, 0, 'user', 'normal'),
(101, 20, '2019-09-25 04:59:59', 1, 'asdfasdf', '', 0, 0, 'user', 'normal'),
(102, 20, '2019-09-25 05:00:14', 1, 'sdfgsdfg', '', 0, 0, 'user', 'normal'),
(103, 20, '2019-09-25 05:00:16', 1, 'sdfgsdfg', '', 0, 0, 'user', 'normal'),
(104, 20, '2019-09-25 05:00:18', 1, 'sdfgsdfg', '', 0, 0, 'user', 'normal'),
(105, 20, '2019-09-25 05:00:20', 1, 'sdfgsdfgsdfg', '', 0, 0, 'user', 'normal'),
(106, 20, '2019-09-25 05:00:21', 1, 'sdfgsdgdfg', '', 0, 0, 'user', 'normal'),
(107, 20, '2019-09-25 05:00:23', 1, 'sdfgsdfgf', '', 0, 0, 'user', 'normal'),
(108, 20, '2019-09-25 05:00:28', 1, 'sdfgsdfg', '', 0, 0, 'user', 'normal'),
(109, 20, '2019-09-25 09:25:21', 1, 'Ù…Ø´Ø®ØµØ§Øª ØªØ®Ù†ÛŒÚ©ÛŒ Ù…Ø´ØªØ±ÛŒ', '', 0, 0, 'user', 'normal'),
(110, 20, '2019-09-25 10:43:06', 0, 'ÙÛŒÙ„ØªØ± ÛŒÙˆØ²Ø± Ù„ÛŒØ³Øª Ù‡Ø§', '', 0, 0, 'user', 'normal'),
(111, 20, '2019-09-25 10:58:35', 0, 'ØªØ±Ù…ÛŒÙ… ØµÙØ­Ù‡ ØªÙ†Ø¸ÛŒÙ…Ø§Øª', '', 0, 0, 'user', 'normal'),
(112, 20, '2019-09-25 11:00:48', 0, 'Ù¾Ø±ÙˆÙØ§ÛŒÙ„ Ú©Ø§Ø±Ø¨Ø±', '', 0, 0, 'user', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `sob_ugroups`
--

CREATE TABLE `sob_ugroups` (
  `ugr_id` int(11) NOT NULL,
  `ugr_uid` int(11) NOT NULL,
  `ugr_userid` int(11) NOT NULL DEFAULT 0,
  `ugr_gid` int(11) NOT NULL,
  `ugr_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ugr_status` int(11) NOT NULL DEFAULT 1,
  `ugr_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_ugroups`
--

INSERT INTO `sob_ugroups` (`ugr_id`, `ugr_uid`, `ugr_userid`, `ugr_gid`, `ugr_time`, `ugr_status`, `ugr_comment`) VALUES
(28, 20, 19, 1252, '2019-09-08 05:52:32', 1, ''),
(29, 20, 20, 1252, '2019-09-08 05:52:35', 1, ''),
(32, 20, 26, 1253, '2019-09-11 08:06:18', 1, ''),
(35, 20, 20, 1253, '2019-09-11 08:35:31', 1, ''),
(44, 20, 29, 1253, '2019-09-13 17:06:59', 1, ''),
(46, 20, 20, 1272, '2019-09-15 11:18:06', 1, ''),
(47, 20, 29, 1272, '2019-09-15 11:18:16', 1, ''),
(50, 20, 32, 1253, '2019-09-18 06:15:55', 1, ''),
(52, 20, 36, 1253, '2019-09-18 06:17:50', 1, '');

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
  `sob_rank` int(1) NOT NULL DEFAULT 1,
  `sob_dep` int(11) NOT NULL DEFAULT 0,
  `sob_site` int(11) NOT NULL DEFAULT 0,
  `sob_title` varchar(500) NOT NULL,
  `sob_status` int(1) NOT NULL DEFAULT 1,
  `sob_token` varchar(250) NOT NULL,
  `sob_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `sob_avatar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sob_users`
--

INSERT INTO `sob_users` (`sob_id`, `sob_user`, `sob_phone`, `sob_email`, `sob_name`, `sob_password`, `sob_rank`, `sob_dep`, `sob_site`, `sob_title`, `sob_status`, `sob_token`, `sob_time`, `sob_avatar`) VALUES
(20, 'demo1234', '0797280900', 'demo@sobhansoft.com', 'Ú©Ø§Ø±Ø¨Ø± Ù†Ù…ÙˆÙ†Ù‡', '6e9bece1914809fb8493146417e722f6', 99, 1243, 1248, 'ÙˆØ¨ Ù…Ø³ØªØ±', 1, '7baaedc9732e788047745c7173b9ae0a9a07eabccd15e7b7b0c6cc9daddafced', '2016-11-13 11:28:02', 'c1af549dcbd0fbe43f8a9d604b6c7070-SiteDown.jpg'),
(31, 'techman', '797280900', 'techman@stark.af', 'Ø³Ù„Ø§Ù… Ø®Ø§Ù† Ø­Ø§Ø¬ÛŒ', 'a906449d5769fa7361d7ecc6aa3f6d28', 2, 1243, 1248, 'Ù…Ø¯ÛŒØ± Ø®Ø¯Ù…Ø§Øª ØªØ®Ù†ÛŒÚ©ÛŒ', 1, '21479e9df84079aaa2d2dba623845c78e7279345', '2019-09-17 05:36:27', ''),
(32, 'techuser', '797280900', 'techuser@stark.af', 'ØºÙ„Ø§Ù… Ø´Ø§Ù‡', 'a906449d5769fa7361d7ecc6aa3f6d28', 1, 1243, 1248, 'Ú©Ø§Ø±Ù…Ù†Ø¯ Ø®Ø¯Ù…Ø§Øª ØªØ®Ù†ÛŒÚ©ÛŒ', 1, '96468b88f8e6df5738b5a3bb3fdff7a54f34f561', '2019-09-17 05:37:24', ''),
(33, 'techboss', '797280900', 'techboss@stark.af', 'Ù‡Ù…Ø§ÛŒÙˆÙ† Ù¾ÙˆÙ¾Ù„Ø²ÛŒ', 'a906449d5769fa7361d7ecc6aa3f6d28', 3, 1243, 1248, 'Ø±Ø¦ÛŒØ³ ØªØ®Ù†ÛŒÚ©ÛŒ', 1, 'f40bd3db6b12c806732b689d840620c52811593a', '2019-09-17 05:38:43', ''),
(34, 'normal', '797280900', 'normal@stark.af', 'Ø³Ø¹ÛŒØ¯ Ø­Ù…ÛŒØ¯ÛŒ', 'a906449d5769fa7361d7ecc6aa3f6d28', 1, 1243, 1248, 'Ú©Ø§Ø±Ù…Ù†Ø¯ Ø¹Ø§Ø¯ÛŒ', 1, '64ca5f96b030885baf2c04d9a19e627a70cfccae', '2019-09-17 05:39:28', '07b8c9df6418be15c776a105a332c7fe-SiteDown.jpg'),
(35, 'salesman', '797280900', 'salesman@stark.af', 'Ø­Ù„ÛŒÙ… Ø´Ø§Ù‡', 'a906449d5769fa7361d7ecc6aa3f6d28', 2, 1244, 1248, 'Ù…Ø¯ÛŒØ± ÙØ±ÙˆØ´Ø§Øª', 1, 'a969a038705870fcfea1297c7de8db675a3fc89a', '2019-09-17 05:40:17', ''),
(36, 'saleuser', '797280900', 'saleuser@stark.af', 'ØºÙ„Ø§Ù… Ø´Ø§Ù‡ÛŒ Ø³Ù„ÛŒÙ…', 'a906449d5769fa7361d7ecc6aa3f6d28', 1, 1244, 1248, 'Ú©Ø§Ø±Ù…Ù†Ø¯ ÙØ±ÙˆØ´Ø§Øª', 1, '2b5531aecc82ebb4d96eed008ba10e610fe5588b', '2019-09-17 05:41:10', '649acb778620e3baa540fd6a088c40af-SiteDown.jpg'),
(37, 'newuser', '0797280900', 'usr@new.com3', 'ØªØ³Øª Ú©Ø§Ø±Ø¨Ø± Ø¬Ø¯ÛŒØ¯2', 'a906449d5769fa7361d7ecc6aa3f6d28', 2, 1245, 1249, 'Ú©Ø§Ø±Ù…Ù†Ø¯ Ù…Ø²Ø§Ø±334', 1, '065461eb1e33340a72ae872724e5ab6978194014', '2019-09-17 11:28:01', 'cdec5a377ec69ef865499db21bbe92ad-Screenshot_39.png'),
(38, 'dsfgsdfgsdfg', '0797280900', 'nasersobhanf@outlook.com', 'fdgsdfgsdfg', 'c31e41940cd12cf9b24b0e528ab955bc', 1, 1243, 1248, '', 100, 'ad2aba6710d077acd1f2b085fe8f1fd9ee1cb74e', '2019-09-19 07:45:00', ''),
(39, 'sdfsdfssss', '797280900', 'sdfsd@sdfsd.com', 'sdfsdf', 'c31e41940cd12cf9b24b0e528ab955bc', 1, 1243, 1248, '', 100, 'a248dc063e901a646337dd6a775563019e35ff63', '2019-09-19 07:46:03', ''),
(40, 'gdsfgsdfgdddd', '797280900', 'nasersobrthan@outlook.com', 'sdfgsdfgsdf', 'c31e41940cd12cf9b24b0e528ab955bc', 1, 1243, 1248, 'asdfsadf', 100, '09f553f0dfcd724ca0856a2ab8c6fdf64a8f1e6e', '2019-09-19 07:46:30', '');

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
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `cus_cid` (`cus_cid`);

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
-- Indexes for table `sob_infouser_oy`
--
ALTER TABLE `sob_infouser_oy`
  ADD PRIMARY KEY (`inf_id`);

--
-- Indexes for table `sob_inventory`
--
ALTER TABLE `sob_inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `sob_leaves`
--
ALTER TABLE `sob_leaves`
  ADD PRIMARY KEY (`lea_id`);

--
-- Indexes for table `sob_message`
--
ALTER TABLE `sob_message`
  ADD UNIQUE KEY `mes_id` (`mes_id`);

--
-- Indexes for table `sob_notifications`
--
ALTER TABLE `sob_notifications`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `sob_overtime`
--
ALTER TABLE `sob_overtime`
  ADD PRIMARY KEY (`ove_id`);

--
-- Indexes for table `sob_permissions`
--
ALTER TABLE `sob_permissions`
  ADD PRIMARY KEY (`per_id`);

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
-- Indexes for table `sob_tickets`
--
ALTER TABLE `sob_tickets`
  ADD PRIMARY KEY (`tic_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1277;

--
-- AUTO_INCREMENT for table `sob_comments_oy`
--
ALTER TABLE `sob_comments_oy`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sob_customerinfo`
--
ALTER TABLE `sob_customerinfo`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sob_groups`
--
ALTER TABLE `sob_groups`
  MODIFY `gro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sob_historyuser_oy`
--
ALTER TABLE `sob_historyuser_oy`
  MODIFY `his_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `sob_inventory`
--
ALTER TABLE `sob_inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sob_leaves`
--
ALTER TABLE `sob_leaves`
  MODIFY `lea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sob_message`
--
ALTER TABLE `sob_message`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `sob_notifications`
--
ALTER TABLE `sob_notifications`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `sob_overtime`
--
ALTER TABLE `sob_overtime`
  MODIFY `ove_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sob_permissions`
--
ALTER TABLE `sob_permissions`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `sob_settings_oy`
--
ALTER TABLE `sob_settings_oy`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sob_tickets`
--
ALTER TABLE `sob_tickets`
  MODIFY `tic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sob_todolist`
--
ALTER TABLE `sob_todolist`
  MODIFY `tod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `sob_ugroups`
--
ALTER TABLE `sob_ugroups`
  MODIFY `ugr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sob_users`
--
ALTER TABLE `sob_users`
  MODIFY `sob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
