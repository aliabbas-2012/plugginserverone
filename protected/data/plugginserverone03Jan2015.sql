-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2015 at 11:56 PM
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
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('Disable','Enable') DEFAULT 'Disable',
  `sandbox` enum('Disable','Enable') DEFAULT 'Enable',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(7, 2, 0.00, 4, 'dollar', '2014-12-25 14:51:31', 1, '2014-12-25 14:51:31', 1, NULL),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `plugin_site_info`
--

INSERT INTO `plugin_site_info` (`id`, `user_id`, `pluggin_id`, `site_name`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 5, 1, 'test1.com', 0, '2014-12-26 16:42:34', 1, '2014-12-27 20:48:22', 0, NULL);

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
('m150103_155633_addUrlFieldInfPluggi', 1420300695);

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

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `ip_address`, `type`, `is_active`, `activation_key`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'admin', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '', 'admin', 1, NULL, 0, '2014-12-16 01:12:50', 1, '2014-12-16 01:12:50', 1, 'user insterted through console'),
(5, 'ali', 'ali', 'abbas', '0192023a7bbd73250516f069df18b500', 'itsgeniusstar@gmail.com', NULL, 'non-admin', 1, 'a7e862e69a217d8cbdc2f1c6fc833c5d07b84a5d', 0, '2014-12-27 20:48:17', 1, '2015-01-03 23:47:10', 5, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_plans`
--

INSERT INTO `user_plans` (`id`, `user_id`, `pluggin_site_info_id`, `pluggin_plan_id`, `payment_status`, `is_active`, `start_date`, `end_date`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 5, 1, 8, 0, 1, '2014-12-28 00:00:00', '2015-01-04 00:00:00', 0, '2014-12-28 11:56:46', 5, '2014-12-28 11:56:46', 5, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pluggin_plans`
--
ALTER TABLE `pluggin_plans`
  ADD CONSTRAINT `fk_plans` FOREIGN KEY (`plan`) REFERENCES `conf_plans` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
