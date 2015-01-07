-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2015 at 12:28 PM
-- Server version: 5.5.40-MariaDB-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sfakhar1_thepuzzle_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bsp_notify`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;


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

INSERT INTO `paypalsettings` (`id`, `Sandbox`, `DeveloperAccountEmail`, `ApplicationID`, `APIUsername`, `APIPassword`, `APISignature`, `APISubject`, `app_account_email`, `admin_user_id`,  `discount_offer_rate`, `timestamp`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(2, 1, 'deysumantra-facilitator.yahoo.com', 'APP-80W284485P519543T', 'deysumantra-facilitator_api1.yahoo.com', '1378735421', 'AFcWxV21C7fd0v3bYYYRCpSSRl31ATgmUuYcElyk1WPsZAJ0qaCzcJlu', NULL, 'deysumantra-facilitator@yahoo.com',  0, 0, '2013-09-07 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bsp_notify`
--
ALTER TABLE `bsp_notify`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
