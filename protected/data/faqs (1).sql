-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2014 at 02:07 AM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sfakhar1_motolao_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) unsigned NOT NULL,
  `type` enum('faq','term') DEFAULT NULL,
  `css_class` enum('primary','success','warning') DEFAULT NULL,
  `question` varchar(250) DEFAULT NULL,
  `answer` text,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `lang_id`, `type`, `css_class`, `question`, `answer`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 1, 'faq', NULL, 'WHAT MOTORBIKE ACTIVITIES DO YOU OFFER?', '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '2014-09-18 23:45:26', 1, '2014-09-27 01:16:29', 1, NULL),
(2, 1, 'faq', 'success', 'WHAT IS THE LENGTH OF YOUR TOUR?', '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '2014-09-27 01:16:53', 1, '2014-09-27 01:56:35', 1, NULL),
(3, 1, 'faq', 'warning', 'HOW FLEXIBLE ARE YOU WITH THE ITINERARY?', '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '2014-09-27 01:17:15', 1, '2014-09-27 01:56:58', 1, NULL),
(4, 1, 'faq', 'success', 'HOW MUCH RIDING EXPERIENCE DO I NEED TO GO ON YOUR TOURS?', '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '2014-09-27 01:17:37', 1, '2014-09-27 01:57:02', 1, NULL),
(5, 1, 'faq', 'success', 'IS THERE AN AGE RESTRICTION TO BE ABLE TO GO ON YOUR TOURS?', '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '2014-09-27 01:17:54', 1, '2014-09-27 01:57:05', 1, NULL),
(6, 1, 'faq', 'success', 'HOW FAR DO WE RIDE IN A DAY?', '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '2014-09-27 01:18:10', 1, '2014-09-27 01:58:05', 1, NULL),
(7, 1, 'faq', 'warning', 'I HAVE FIXED DATES, BUT CANNOT FIND TOUR DEPARTURE DATES ON YOUR SITE?', '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '2014-09-27 01:18:27', 1, '2014-09-27 01:57:10', 1, NULL),
(8, 1, 'faq', 'success', 'WHEN IS THE BEST TIME TO DRIVE A MOTORBIKE IN LAOS?', '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '2014-09-27 01:18:39', 1, '2014-09-27 01:58:01', 1, NULL),
(9, 1, 'faq', 'warning', 'WHAT DO I EAT ON THE TOURS?', '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '2014-09-27 01:18:52', 1, '2014-09-27 01:57:14', 1, NULL),
(10, 1, 'faq', 'warning', 'WHERE WILL I STAY DURING MY TOUR?', '<p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '2014-09-27 01:19:06', 1, '2014-09-27 01:57:18', 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
