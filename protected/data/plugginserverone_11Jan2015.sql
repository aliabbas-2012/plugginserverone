-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2015 at 06:22 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plugginserverone`
--

-- --------------------------------------------------------

--
-- Table structure for table `conf_misc`
--

DROP TABLE IF EXISTS `conf_misc`;
CREATE TABLE IF NOT EXISTS `conf_misc` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `param` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  `field_type` varchar(150) NOT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `conf_misc`
--

INSERT INTO `conf_misc` (`id`, `title`, `param`, `value`, `field_type`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'Date Format', 'dateformat', 'm/d/y', 'dropDown', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, NULL),
(2, 'Smtp', 'smtp', '1', 'dropDown', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conf_plans`
--

DROP TABLE IF EXISTS `conf_plans`;
CREATE TABLE IF NOT EXISTS `conf_plans` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  `duration` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `conf_plans`
--

INSERT INTO `conf_plans` (`id`, `name`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`, `duration`) VALUES
(1, '1', '2014-12-24 00:49:20', 1, '2014-12-28 16:09:24', 1, NULL, 'Weeks'),
(2, '2', '2014-12-25 01:18:12', 1, '2014-12-28 16:09:48', 1, NULL, 'Weeks'),
(3, '1', '2014-12-25 01:19:35', 1, '2014-12-28 16:10:00', 1, NULL, 'Months'),
(4, '2', '2014-12-25 01:19:41', 1, '2014-12-28 16:10:07', 1, NULL, 'Months'),
(5, '4', '2014-12-25 01:19:46', 1, '2014-12-28 16:10:15', 1, NULL, 'Months'),
(6, '6', '2014-12-25 01:19:58', 1, '2014-12-28 16:10:22', 1, NULL, 'Months'),
(7, '1', '2014-12-25 01:20:05', 1, '2014-12-28 16:10:33', 1, NULL, 'Years'),
(8, '2', '2014-12-25 01:20:10', 1, '2014-12-28 16:10:40', 1, NULL, 'Years'),
(9, '3', '2014-12-25 01:20:16', 1, '2014-12-28 16:10:48', 1, NULL, 'Years'),
(10, '5 ', '2014-12-25 01:20:25', 1, '2014-12-28 16:10:56', 1, NULL, 'Years'),
(11, '10', '2014-12-25 01:20:35', 1, '2014-12-28 16:11:07', 1, NULL, 'Years');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

DROP TABLE IF EXISTS `notify`;
CREATE TABLE IF NOT EXISTS `notify` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_plan_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `date_time` datetime DEFAULT '0000-00-00 00:00:00',
  `isview` int(1) NOT NULL DEFAULT '0',
  `user_type` enum('buyer','seller') COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_adaptive_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_user` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`Id`, `user_plan_id`, `user_id`, `date_time`, `isview`, `user_type`, `message`, `payment_adaptive_id`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(15, 9, 1, '0000-00-00 00:00:00', 0, 'seller', '[ali] purchasing  2 Months  <br/> Price : 20.00', '37', '2015-01-10 19:18:33', 5, '2015-01-10 19:18:33', 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment_paypall_adaptive`
--

DROP TABLE IF EXISTS `payment_paypall_adaptive`;
CREATE TABLE IF NOT EXISTS `payment_paypall_adaptive` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `payment_status` enum('initiated','paying','completed','cancelled') DEFAULT NULL,
  `amount` double(12,3) DEFAULT '0.000',
  `ip_address` varchar(50) NOT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `payment_paypall_adaptive`
--

INSERT INTO `payment_paypall_adaptive` (`id`, `seller_id`, `buyer_id`, `plan_id`, `payment_status`, `amount`, `ip_address`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(37, 1, 5, 9, 'completed', 20.000, '127.0.0.1', '2015-01-10 19:18:32', 5, '2015-01-11 00:19:15', 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment_paypall_adaptive_history`
--

DROP TABLE IF EXISTS `payment_paypall_adaptive_history`;
CREATE TABLE IF NOT EXISTS `payment_paypall_adaptive_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paypall_adaptive_id` int(11) unsigned NOT NULL,
  `payment_status` enum('initiated','paying','completed','cancelled') DEFAULT NULL,
  `amount` double(12,3) DEFAULT '0.000',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_paypall_adaptive_history` (`paypall_adaptive_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `payment_paypall_adaptive_history`
--

INSERT INTO `payment_paypall_adaptive_history` (`id`, `paypall_adaptive_id`, `payment_status`, `amount`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(5, 37, 'paying', 20.000, '2015-01-10 19:18:33', 5, '2015-01-10 19:18:33', 5),
(6, 37, 'paying', 20.000, '2015-01-10 19:18:33', 5, '2015-01-10 19:18:33', 5);

-- --------------------------------------------------------

--
-- Table structure for table `paypalresponse`
--

DROP TABLE IF EXISTS `paypalresponse`;
CREATE TABLE IF NOT EXISTS `paypalresponse` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_plan_id` int(11) DEFAULT NULL,
  `paypal_action_id` int(11) unsigned NOT NULL,
  `Ack` varchar(255) DEFAULT NULL,
  `Build` varchar(255) DEFAULT NULL,
  `CorrelationID` varchar(255) DEFAULT NULL,
  `Timestamp` varchar(255) DEFAULT NULL,
  `PayKey` varchar(255) DEFAULT NULL,
  `PaymentExecStatus` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `RedirectURL` text,
  `XMLRequest` text,
  `XMLResponse` text,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paypal_action_id` (`paypal_action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `paypalresponse`
--

INSERT INTO `paypalresponse` (`id`, `user_plan_id`, `paypal_action_id`, `Ack`, `Build`, `CorrelationID`, `Timestamp`, `PayKey`, `PaymentExecStatus`, `Status`, `RedirectURL`, `XMLRequest`, `XMLResponse`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 1, 13, 'Success', '13414382', '0fd23fef04870', '2015-01-08T12:35:45.372-08:00', 'AP-381818314D711094R', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-381818314D711094R', '', NULL, '2015-01-08 20:35:45', 1, '2015-01-08 20:35:45', 1),
(2, 1, 14, 'Success', '13414382', '34479940849a2', '2015-01-08T12:44:30.880-08:00', 'AP-6Y330720M31704105', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-6Y330720M31704105', '', NULL, '2015-01-08 20:44:31', 1, '2015-01-08 20:44:31', 1),
(3, 1, 16, 'Success', '13414382', '0205bb0b718dd', '2015-01-08T12:56:56.029-08:00', 'AP-7CM65206P3641234H', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-7CM65206P3641234H', '', NULL, '2015-01-08 20:56:56', 5, '2015-01-08 20:56:56', 5),
(4, 1, 17, 'Success', '13414382', 'e3b88d163f887', '2015-01-10T03:44:24.724-08:00', 'AP-3S987443JB1164322', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-3S987443JB1164322', '', NULL, '2015-01-10 11:44:24', 5, '2015-01-10 11:44:24', 5),
(5, 2, 18, 'Success', '13414382', 'ffd738db0e1a1', '2015-01-10T04:05:17.277-08:00', 'AP-6MX58338AF266164U', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-6MX58338AF266164U', '', NULL, '2015-01-10 12:05:17', 5, '2015-01-10 12:05:17', 5),
(6, 4, 23, 'Failure', '13414382', '789dbb965fd3e', '2015-01-10T08:42:33.321-08:00', '', '', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=', '', NULL, '2015-01-10 16:42:33', 5, '2015-01-10 16:42:33', 5),
(7, 4, 24, 'Failure', '13414382', 'c08e25b26cf3f', '2015-01-10T08:43:38.160-08:00', '', '', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=', '', NULL, '2015-01-10 16:43:38', 5, '2015-01-10 16:43:38', 5),
(8, 4, 26, 'Failure', '13414382', '238ba4e30b115', '2015-01-10T08:45:46.767-08:00', '', '', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=', '', NULL, '2015-01-10 16:45:48', 5, '2015-01-10 16:45:48', 5),
(9, 4, 30, 'Success', '13414382', '49bcf40821a10', '2015-01-10T08:47:15.019-08:00', 'AP-89C87419RR599610M', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-89C87419RR599610M', '', NULL, '2015-01-10 16:47:15', 5, '2015-01-10 16:47:15', 5),
(10, 4, 31, 'Success', '13414382', '56854469ce9ab', '2015-01-10T08:50:03.939-08:00', 'AP-6EX66845RS208661V', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-6EX66845RS208661V', '', NULL, '2015-01-10 16:50:04', 5, '2015-01-10 16:50:04', 5),
(11, 4, 32, 'Success', '13414382', '57d8445bf821d', '2015-01-10T08:53:28.067-08:00', 'AP-77D65912H36531643', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-77D65912H36531643', '', NULL, '2015-01-10 16:53:32', 5, '2015-01-10 16:53:32', 5),
(12, 5, 33, 'Success', '13414382', 'f947fbfe6cf3c', '2015-01-10T09:01:09.503-08:00', 'AP-37W592614E389412B', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-37W592614E389412B', '', NULL, '2015-01-10 17:01:09', 5, '2015-01-10 17:01:09', 5),
(13, 6, 34, 'Success', '13414382', '5b753d0d3edca', '2015-01-10T09:06:31.804-08:00', 'AP-9U0000233H002093L', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-9U0000233H002093L', '', NULL, '2015-01-10 17:06:32', 5, '2015-01-10 17:06:32', 5),
(14, 7, 35, 'Success', '13414382', 'daa4ebe0d566a', '2015-01-10T10:36:20.164-08:00', 'AP-9250633389711760R', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-9250633389711760R', '', NULL, '2015-01-10 18:36:20', 5, '2015-01-10 18:36:20', 5),
(15, 8, 36, 'Success', '13414382', '81452fd012277', '2015-01-10T10:49:01.353-08:00', 'AP-3UK23802KG219072B', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-3UK23802KG219072B', '', NULL, '2015-01-10 18:49:01', 5, '2015-01-10 18:49:01', 5),
(16, 9, 37, 'Success', '13414382', 'fb44fd0e4316a', '2015-01-10T11:18:35.451-08:00', 'AP-7K014227RN538373G', 'CREATED', '', 'https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=AP-7K014227RN538373G', '', NULL, '2015-01-10 19:18:35', 5, '2015-01-10 19:18:35', 5);

-- --------------------------------------------------------

--
-- Table structure for table `paypalsettings`
--

DROP TABLE IF EXISTS `paypalsettings`;
CREATE TABLE IF NOT EXISTS `paypalsettings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Sandbox` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `DeveloperAccountEmail` varchar(255) NOT NULL,
  `ApplicationID` varchar(255) NOT NULL,
  `APIUsername` varchar(255) NOT NULL,
  `APIPassword` varchar(255) NOT NULL,
  `APISignature` varchar(255) NOT NULL,
  `APISubject` varchar(255) DEFAULT NULL,
  `app_account_email` varchar(255) NOT NULL,
  `admin_user_id` int(11) NOT NULL,
  `discount_offer_rate` double DEFAULT '0',
  `timestamp` datetime NOT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `paypalsettings`
--

INSERT INTO `paypalsettings` (`id`, `Sandbox`, `DeveloperAccountEmail`, `ApplicationID`, `APIUsername`, `APIPassword`, `APISignature`, `APISubject`, `app_account_email`, `admin_user_id`, `discount_offer_rate`, `timestamp`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(2, 1, 'itsgeniusstar-developer@gmail.com', 'APP-80W284485P519543T', 'itsgeniusstar-developer_api1.gmail.com', '1401088137', 'ANEKhTFTD.ikjixPs3.0MlMtgLceAFcJsWcoNYOAUKoXb91IIPTvcUKT', '', 'itsgeniusstar-developer@gmail.com', 1, 0, '2013-09-07 00:00:00', '0000-00-00 00:00:00', 0, '2015-01-09 02:22:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plateform`
--

DROP TABLE IF EXISTS `plateform`;
CREATE TABLE IF NOT EXISTS `plateform` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `url` varchar(150) DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` text,
  `description` text,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `plateform`
--

INSERT INTO `plateform` (`id`, `name`, `image`, `parent`, `url`, `meta_title`, `meta_description`, `description`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'Wordpress', 'uwsz0trsxf.png', NULL, 'http-www-wordpress-org', 'test', 'test', '<p>test</p>', '2014-12-24 00:24:44', 1, '2015-01-03 20:32:08', 1, NULL),
(2, 'Joomla', '9jg3spagmo.png', NULL, 'www-url-com', 'test', '', '<h3>Joomla</h3>', '2015-01-03 14:34:16', 1, '2015-01-03 14:34:16', 1, NULL),
(3, 'Druppal', '69d15lfsta.png', NULL, 'www-url-com', 'test', '', '<h3>Druppal</h3>', '2015-01-03 14:34:37', 1, '2015-01-03 14:34:37', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pluggin`
--

DROP TABLE IF EXISTS `pluggin`;
CREATE TABLE IF NOT EXISTS `pluggin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` text,
  `description` text,
  `plateform_id` int(11) unsigned NOT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pluggin`
--

INSERT INTO `pluggin` (`id`, `name`, `url`, `meta_title`, `meta_description`, `description`, `plateform_id`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'wp 1', 'http://www.wordpress.org/wp1', 'test', 'test', '<p>test</p>', 1, '2014-12-24 00:27:36', 1, '2015-01-03 21:12:36', 1, NULL),
(2, 'wp 2', NULL, 'test', 'test', '<p>Test</p>', 1, '2014-12-25 13:25:59', 1, '2014-12-27 18:35:13', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pluggin_image`
--

DROP TABLE IF EXISTS `pluggin_image`;
CREATE TABLE IF NOT EXISTS `pluggin_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pluggin_id` int(11) unsigned NOT NULL,
  `is_default` tinyint(11) DEFAULT '0',
  `tag` varchar(150) DEFAULT NULL,
  `image_large` varchar(150) NOT NULL,
  `image_small` varchar(150) DEFAULT NULL,
  `image_detail` varchar(150) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pluggin_plans`
--

DROP TABLE IF EXISTS `pluggin_plans`;
CREATE TABLE IF NOT EXISTS `pluggin_plans` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pluggin_id` int(11) unsigned NOT NULL,
  `price` decimal(8,2) DEFAULT '0.00',
  `plan` int(11) unsigned NOT NULL,
  `currency` enum('dollar','Euro') DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`),
  KEY `fk_plans` (`plan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pluggin_plans`
--

INSERT INTO `pluggin_plans` (`id`, `pluggin_id`, `price`, `plan`, `currency`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(7, 2, 20.00, 4, 'dollar', '2014-12-25 14:51:31', 1, '2015-01-10 22:00:59', 1, NULL),
(8, 1, 255.00, 1, 'dollar', '2014-12-28 10:06:37', 1, '2014-12-28 10:06:37', 1, NULL),
(9, 1, 366.00, 2, 'dollar', '2014-12-28 10:06:46', 1, '2014-12-28 10:06:46', 1, NULL),
(10, 1, 254.00, 3, 'dollar', '2014-12-28 10:06:56', 1, '2014-12-28 10:06:56', 1, NULL),
(11, 1, 125.00, 5, 'dollar', '2014-12-28 10:07:06', 1, '2014-12-28 10:07:06', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plugin_site_info`
--

DROP TABLE IF EXISTS `plugin_site_info`;
CREATE TABLE IF NOT EXISTS `plugin_site_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `pluggin_id` int(11) unsigned DEFAULT NULL,
  `site_name` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `plugin_site_info`
--

INSERT INTO `plugin_site_info` (`id`, `user_id`, `pluggin_id`, `site_name`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 5, 1, 'test1.com', 0, '2014-12-26 16:42:34', 1, '2014-12-27 20:48:22', 0, NULL),
(2, 5, 2, 'test2.com', 0, '2015-01-02 18:47:26', 1, '2015-01-04 00:51:56', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

DROP TABLE IF EXISTS `tbl_migration`;
CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1418670842),
('m120708_142711_tbl_user', 1418675870),
('m120719_165411_add_adminUser', 1418675870),
('m120910_183824_add_column_user', 1418675872),
('m130129_155820_conf_mis', 1418675872),
('m140327_185137_addPaymentInformationInorderHistory', 1420661084),
('m140908_194312_plateforms', 1418675872),
('m140908_194537_pluggins', 1418675872),
('m140908_200446_conf_item', 1418675873),
('m140914_150310_PLugginImages', 1418675873),
('m141012_170033_addConf', 1418675873),
('m141223_193338_create_conf_plans', 1419363514),
('m141223_200152_add_pluggin_plans', 1419366192),
('m141226_173759_tbl_user_plans', 1419627530),
('m141226_174348_tbl_plugin_site_info', 1419627530),
('m141226_180504_tbl_payment_methods', 1419627530),
('m141228_094218_addUsersiteInfoIdinUserPlans', 1419759851),
('m141228_110029_addDurationinConfPLans', 1419764509),
('m150103_140446_addPhotoUploadPic', 1420294022),
('m150103_155633_addUrlFieldInfPluggi', 1420300695),
('m150104_154654_add_subPlans', 1420386747),
('m150108_204807_add_paypallemail', 1420750192),
('m150327_183558_addPaymentInformationInorder', 1420661419),
('m150327_185137_addPaymentInformationInorderHistory', 1420661420),
('m150327_203128_add_PaypallSettings', 1420662978);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `paypal_mail` varchar(50) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `type` enum('admin','non-admin') DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_key` varchar(50) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `paypal_mail`, `ip_address`, `type`, `is_active`, `activation_key`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'admin', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '', '', 'admin', 1, NULL, 0, '2014-12-16 01:12:50', 1, '2014-12-16 01:12:50', 1, 'user insterted through console'),
(5, 'ali', 'ali', 'abbas shah', '0192023a7bbd73250516f069df18b500', 'itsgeniusstar@gmail.com', 'itsgeniusstar_test9@gmail.com', NULL, 'non-admin', 1, 'a7e862e69a217d8cbdc2f1c6fc833c5d07b84a5d', 0, '2014-12-27 20:48:17', 1, '2015-01-09 01:53:01', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_plans`
--

DROP TABLE IF EXISTS `user_plans`;
CREATE TABLE IF NOT EXISTS `user_plans` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `pluggin_site_info_id` int(11) unsigned NOT NULL,
  `pluggin_plan_id` int(11) unsigned DEFAULT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_plans`
--

INSERT INTO `user_plans` (`id`, `user_id`, `pluggin_site_info_id`, `pluggin_plan_id`, `payment_status`, `is_active`, `start_date`, `end_date`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(9, 5, 2, 7, 1, 0, '2015-01-10 00:00:00', '2015-03-10 00:00:00', 0, '2015-01-10 19:18:32', 5, '2015-01-11 00:19:15', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_plans`
--

DROP TABLE IF EXISTS `user_sub_plans`;
CREATE TABLE IF NOT EXISTS `user_sub_plans` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pluggin_plan_id` int(11) unsigned DEFAULT NULL,
  `user_plan_id` int(11) unsigned DEFAULT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user_sub_plans`
--

INSERT INTO `user_sub_plans` (`id`, `pluggin_plan_id`, `user_plan_id`, `payment_status`, `is_active`, `start_date`, `end_date`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(15, 7, 9, 0, 0, '2015-01-10 00:00:00', '2015-03-10 00:00:00', 0, '2015-01-10 19:18:32', 5, '2015-01-10 19:18:32', 5, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_paypall_adaptive_history`
--
ALTER TABLE `payment_paypall_adaptive_history`
  ADD CONSTRAINT `fk_payment_paypall_adaptive_history` FOREIGN KEY (`paypall_adaptive_id`) REFERENCES `payment_paypall_adaptive` (`id`);

--
-- Constraints for table `pluggin_plans`
--
ALTER TABLE `pluggin_plans`
  ADD CONSTRAINT `fk_plans` FOREIGN KEY (`plan`) REFERENCES `conf_plans` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
