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
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) unsigned NOT NULL,
  `key` varchar(20) NOT NULL,
  `alt` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `image_large` varchar(150) DEFAULT NULL,
  `video_tag_embedded_code` text,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `lang_id`, `key`, `alt`, `title`, `image_large`, `video_tag_embedded_code`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 1, 'home', 'test', 'test', 'zc205mxcml.jpg', '', '2014-09-17 23:28:05', 1, '2014-09-24 23:56:43', 1, NULL),
(4, 2, 'home', 'sdsdds', 'dssd', '4f4gohwibe.jpg', '', '2014-09-18 00:26:00', 1, '2014-09-24 23:56:29', 1, NULL),
(5, 1, 'home', 'sfds', 'sdffds', '76pc6l0pkl.jpg', '', '2014-09-18 00:26:41', 1, '2014-09-24 23:56:12', 1, NULL),
(6, 1, 'gallery', 'Banner', 'Banner', 'mmavxj4fr2.jpg', '', '2014-09-24 23:48:44', 1, '2014-09-24 23:48:44', 1, NULL),
(7, 1, 'gallery', 'Banner 1', 'Banner 2', '4trg4e5shu.jpg', '', '2014-09-24 23:49:11', 1, '2014-09-24 23:49:11', 1, NULL),
(8, 1, 'gallery', 'Banner 3', 'Banner 3', 'sos24oezgu.jpg', '', '2014-09-24 23:49:46', 1, '2014-09-24 23:49:46', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `url`, `meta_title`, `meta_description`, `description`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, '4X4', NULL, '4x4', '4X4', '4X4', '<p>4X4</p>', '2014-09-13 18:59:47', 1, '2014-09-23 00:46:48', 1, ''),
(2, 'Bikes', NULL, 'bikes', 'Bikes', 'Bikes', '<p>Bikes</p>', '2014-09-13 19:00:07', 1, '2014-09-23 01:08:26', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `category_langs`
--

CREATE TABLE IF NOT EXISTS `category_langs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `lang_id` int(11) DEFAULT '0',
  `parent_id` int(11) DEFAULT '0',
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
-- Dumping data for table `category_langs`
--

INSERT INTO `category_langs` (`id`, `name`, `lang_id`, `parent_id`, `url`, `meta_title`, `meta_description`, `description`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'dsd', 2, 2, 'dssd', 'sdds', 'dsds', 'dsds', '2014-09-14 00:35:37', 1, '2014-09-14 00:35:37', 1, NULL),
(2, 'aa', 2, 2, 'dssd', 'sdds', 'dsdsds fds', 'dsds dsfsd ', '2014-09-14 01:00:50', 1, '2014-09-14 01:03:28', 1, NULL),
(3, 'dsd fdsfds', 2, 2, 'dssd', 'sdds', 'dsdsds fds dsdfs', 'dsds dsfsd ', '2014-09-14 01:01:00', 1, '2014-09-14 01:01:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conf_misc`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `conf_tour_types`
--

CREATE TABLE IF NOT EXISTS `conf_tour_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `conf_tour_types`
--

INSERT INTO `conf_tour_types` (`id`, `name`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'test', '2014-09-19 01:08:08', 1, '2014-09-19 01:12:11', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conf_tour_types_langs`
--

CREATE TABLE IF NOT EXISTS `conf_tour_types_langs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `lang_id` int(4) NOT NULL,
  `parent_id` int(4) NOT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `conf_tour_types_langs`
--

INSERT INTO `conf_tour_types_langs` (`id`, `name`, `lang_id`, `parent_id`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'test', 2, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, NULL),
(2, 'test a ', 3, 1, '2014-09-19 01:30:16', 0, '2014-09-19 01:59:29', 1, NULL),
(3, 'dsds aa', 3, 1, '2014-09-20 00:13:56', 1, '2014-09-20 00:17:27', 1, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `inner_slider`
--

CREATE TABLE IF NOT EXISTS `inner_slider` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) unsigned NOT NULL,
  `key` varchar(20) NOT NULL,
  `alt` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `image_large` varchar(150) DEFAULT NULL,
  `heading_box` varchar(150) DEFAULT NULL,
  `detail` text,
  `same_box` tinyint(1) DEFAULT '0',
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `inner_slider`
--

INSERT INTO `inner_slider` (`id`, `lang_id`, `key`, `alt`, `title`, `image_large`, `heading_box`, `detail`, `same_box`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 1, 'home', 'NEW BIKES ARRIVED!', 'NEW BIKES ARRIVED!', '98b3bl1c7v.png', 'NEW BIKES ARRIVED!', '<h4>The legendary Bullet 350 need no introduction. Now Bullet 350 is with all new Unit Construction Engine. We are proud to be the first and only tour company in Laos to provide these classic bikes.</h4>', 1, '2014-09-24 01:48:38', 1, '2014-09-27 01:00:56', 1, NULL),
(2, 1, 'home', 'NEW BIKES ARRIVED!', 'NEW BIKES ARRIVED!', '51cp9aymwq.png', 'NEW BIKES ARRIVED2!', '<h4>The legendary Bullet 350 need no introduction. Now Bullet 350 is with all new Unit Construction Engine. We are proud to be the first and only tour company in Laos to provide these classic bikes.</h4>', 1, '2014-09-24 01:49:22', 1, '2014-09-27 01:00:47', 1, NULL),
(3, 1, 'home', 'NEW BIKES ARRIVED!3', 'NEW BIKES ARRIVED!3', 'hg6wno75t8.png', 'NEW BIKES ARRIVED!3', '<h4>The legendary Bullet 350 need no introduction. Now Bullet 350 is with all new Unit Construction Engine. We are proud to be the first and only tour company in Laos to provide these classic bikes.</h4>', 1, '2014-09-24 01:51:50', 1, '2014-09-27 01:00:37', 1, NULL),
(4, 1, 'fleet', 'HONDA CRF250L 2014 1', 'HONDA CRF250L 2014 1', 'cbk6wa6ly5.png', 'HONDA CRF250L 2014 1', '<h4>The CRF250L is an awesome dual-sport machine that adds off-road capability to its on-road prowess. Honda CRF250L gives you a great upright seating position that&rsquo;s comfortable for longer rides, perfect for seeing your way through an urban traffic snarl or getting out on the trail. And if your town doesn&rsquo;t have enough money to fix those potholes or pavement patches, the CRF250L&rsquo;s long-travel suspension is built to handle them no problem.</h4>\r\n<h4>"Sure, the new CRF250L is super practical, offering great fuel economy. But even that&rsquo;s small potatoes compared to how much fun per gallon you&rsquo;ll have riding one.&rdquo;</h4>\r\n<h4 style="text-align: center;">www.powersports.honda.com</h4>', 0, '2014-09-27 01:08:07', 1, '2014-09-27 01:08:07', 1, NULL),
(5, 1, 'fleet', 'HONDA CRF250L 2014 2', 'HONDA CRF250L 2014 2', '11b6aqubt0.png', 'HONDA CRF250L 2014 2', '<h4>The CRF250L is an awesome dual-sport machine that adds off-road capability to its on-road prowess. Honda CRF250L gives you a great upright seating position that&rsquo;s comfortable for longer rides, perfect for seeing your way through an urban traffic snarl or getting out on the trail. And if your town doesn&rsquo;t have enough money to fix those potholes or pavement patches, the CRF250L&rsquo;s long-travel suspension is built to handle them no problem.</h4>\r\n<h4>"Sure, the new CRF250L is super practical, offering great fuel economy. But even that&rsquo;s small potatoes compared to how much fun per gallon you&rsquo;ll have riding one.&rdquo;</h4>\r\n<h4 style="text-align: center;">www.powersports1.honda.com</h4>', 0, '2014-09-27 01:09:35', 1, '2014-09-27 01:09:35', 1, NULL),
(6, 1, 'fleet', 'HONDA CRF250L 2014 3', 'HONDA CRF250L 2014 3', 'ido9dbusm6.png', 'HONDA CRF250L 2014 3', '<h4>The CRF250L is an awesome dual-sport machine that adds off-road capability to its on-road prowess. Honda CRF250L gives you a great upright seating position that&rsquo;s comfortable for longer rides, perfect for seeing your way through an urban traffic snarl or getting out on the trail. And if your town doesn&rsquo;t have enough money to fix those potholes or pavement patches, the CRF250L&rsquo;s long-travel suspension is built to handle them no problem.</h4>\r\n<h4>"Sure, the new CRF250L is super practical, offering great fuel economy. But even that&rsquo;s small potatoes compared to how much fun per gallon you&rsquo;ll have riding one.&rdquo;</h4>\r\n<h4 style="text-align: center;">www.powersports3.honda.com</h4>', 0, '2014-09-27 01:10:09', 1, '2014-09-27 01:10:09', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `lang_id` int(11) unsigned NOT NULL,
  `key` varchar(150) DEFAULT NULL,
  `value` longtext,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `category`, `lang_id`, `key`, `value`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, NULL, 1, 'dsds', 'dsds df', '2014-09-20 17:30:39', 1, '2014-09-24 00:09:50', 1, NULL),
(2, NULL, 1, 'dsds-fsdfds', 'dsds sddfs', '2014-09-20 17:31:30', 1, '2014-09-20 17:31:30', 1, NULL),
(3, NULL, 1, 'dsds-fsdfds', 'dsds sddfs', '2014-09-20 17:31:44', 1, '2014-09-20 17:31:44', 1, NULL),
(4, NULL, 1, 'dsds-fsdfds', 'dsds sddfs', '2014-09-20 17:32:39', 1, '2014-09-20 17:32:39', 1, NULL),
(5, NULL, 1, 'dsds-fsdfds', 'dsds sddfs', '2014-09-20 17:32:50', 1, '2014-09-20 17:32:50', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `code` varchar(4) DEFAULT NULL,
  `flag_img` varchar(50) DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_description` text,
  `description` text,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `flag_img`, `meta_title`, `meta_description`, `description`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'English', 'en', '', '', '', '', '2014-09-13 23:55:02', 1, '2014-09-13 23:55:02', 1, NULL),
(2, 'Deutsch', 'de', '', '', '', '', '2014-09-13 23:58:43', 1, '2014-09-13 23:58:43', 1, NULL),
(3, 'Spanisch', 'spa', '', '', '', '', '2014-09-13 23:59:40', 1, '2014-09-13 23:59:40', 1, NULL),
(4, 'test', 'test', '7.jpg', 'test', 'test', 'test', '2014-09-14 18:04:23', 1, '2014-09-14 18:19:47', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moto_dairy`
--

CREATE TABLE IF NOT EXISTS `moto_dairy` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) unsigned NOT NULL,
  `alt` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `image_large` varchar(150) DEFAULT NULL,
  `image_detail` varchar(150) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `moto_dairy`
--

INSERT INTO `moto_dairy` (`id`, `lang_id`, `alt`, `title`, `image_large`, `image_detail`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 1, 'test', 'test', 'sfxjgqpwza.jpg', 'detail_sfxjgqpwza.jpg', '2014-09-18 00:10:21', 1, '2014-09-18 00:21:12', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moto_gallery`
--

CREATE TABLE IF NOT EXISTS `moto_gallery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) unsigned NOT NULL,
  `alt` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `image_large` varchar(150) DEFAULT NULL,
  `image_detail` varchar(150) DEFAULT NULL,
  `video_tag_embedded_code` text,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `moto_gallery`
--

INSERT INTO `moto_gallery` (`id`, `lang_id`, `alt`, `title`, `image_large`, `image_detail`, `video_tag_embedded_code`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 1, 'test', 'test', 'dr25xoabxe.jpg', 'detail_dr25xoabxe.jpg', NULL, '2014-09-18 00:20:51', 1, '2014-09-18 00:21:55', 1, NULL),
(2, 1, 'test', 'sd', 'b8fmwhlotp.png', 'detail_b8fmwhlotp.png', NULL, '2014-09-24 00:02:53', 1, '2014-09-24 00:02:53', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) unsigned NOT NULL,
  `key` varchar(20) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `description` text,
  `meta_tag` text,
  `meta_description` text,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

CREATE TABLE IF NOT EXISTS `social_media_links` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) unsigned NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `meta_tag` text,
  `meta_description` text,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `social_media_links`
--

INSERT INTO `social_media_links` (`id`, `lang_id`, `title`, `url`, `image`, `meta_tag`, `meta_description`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 1, 'EMAIL', '', NULL, 'email.png', 'EMAIL', '2014-09-24 01:14:38', 1, '2014-09-24 01:24:57', 1, NULL),
(2, 1, 'SKYPE', '', NULL, 'skype.png', 'SKYPE', '2014-09-24 01:15:15', 1, '2014-09-24 01:25:35', 1, NULL),
(3, 1, 'FACEBOOK', '', NULL, 'fb.png', 'FACEBOOK', '2014-09-24 01:15:38', 1, '2014-09-24 01:25:45', 1, NULL),
(4, 1, 'GOOGLE', '', NULL, 'google.png', 'GOOGLE', '2014-09-24 01:16:01', 1, '2014-09-24 01:25:57', 1, NULL),
(5, 1, 'PINTREST', '', NULL, 'printrest.png', 'PINTREST', '2014-09-24 01:16:14', 1, '2014-09-24 01:26:12', 1, NULL),
(6, 1, 'FLICKR', '', NULL, 'flickr.png', 'FLICKR', '2014-09-24 01:16:35', 1, '2014-09-24 01:26:24', 1, NULL),
(7, 1, 'YOUTUBE', '', NULL, 'youtube.png', 'YOUTUBE', '2014-09-24 01:16:55', 1, '2014-09-24 01:26:34', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1410034492),
('m120708_142711_tbl_user', 1410034569),
('m120719_165411_add_adminUser', 1410034569),
('m120910_183824_add_column_user', 1410034571),
('m130129_155820_conf_mis', 1410034571),
('m140908_194312_categories', 1410206160),
('m140908_194537_tours', 1410206160),
('m140908_195612_categoryLangs', 1410206967),
('m140908_195621_TourLangs', 1410206967),
('m140908_200446_conf_item', 1410206968),
('m140913_184914_addColumnInLanguages', 1410634384),
('m140914_150310_TourImages', 1410708224),
('m140916_190838_banner', 1410895193),
('m140916_192047_PagesTitleMeta', 1410895580),
('m140916_192448_SocialMediaLinks', 1410895581),
('m140916_193053_moto_gallery', 1410896611),
('m140916_193122_moto_dairies', 1410896611),
('m140916_194834_faq_questions', 1410897142),
('m140916_195346_team_images', 1410897421),
('m140916_195804_PageLabels', 1410897540),
('m140917_193309_social_link_image', 1410982490),
('m140920_135852_addColumnINfaq', 1411221633),
('m140920_144039_addInnerSlider', 1411226222),
('m140923_192600_addDescriptioninPage', 1411500666),
('m140923_194154_addVidoInGallery', 1411501420),
('m140926_205057_addCSSClassINfaq', 1411764817);

-- --------------------------------------------------------

--
-- Table structure for table `team_images`
--

CREATE TABLE IF NOT EXISTS `team_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) unsigned NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `role` varchar(150) DEFAULT NULL,
  `description` text,
  `alt` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `image_large` varchar(150) DEFAULT NULL,
  `image_detail` varchar(150) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) unsigned NOT NULL,
  `activity_log` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `team_images`
--

INSERT INTO `team_images` (`id`, `lang_id`, `name`, `role`, `description`, `alt`, `title`, `image_large`, `image_detail`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 1, 'Sara Abdullah', 'Seo expert', '<p>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</p>', 'Sara', 'Sara', 'nut4tb0rau.jpg', 'detail_nut4tb0rau.jpg', '2014-09-18 00:59:40', 1, '2014-09-27 00:08:25', 1, NULL),
(2, 1, 'DAVE VAN ROOYEN', 'MANAGER & MOTOLAO GUIDE', '<p><span>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</span></p>', 'DAVE VAN ROOYEN', 'DAVE VAN ROOYEN', 'qcym1sonbi.jpg', 'detail_qcym1sonbi.jpg', '2014-09-27 00:07:49', 1, '2014-09-27 00:07:49', 1, NULL),
(3, 1, 'DAVE VAN ROOYEN', 'MANAGER & MOTOLAO GUIDE', '<p><span>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</span></p>', 'DAVE VAN ROOYEN', 'DAVE VAN ROOYEN', 'xlho4tek13.jpg', 'detail_xlho4tek13.jpg', '2014-09-27 00:17:47', 1, '2014-09-27 00:17:47', 1, NULL),
(4, 1, 'DAVE VAN ROOYEN', 'MANAGER & MOTOLAO GUIDE', '<p><span>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</span></p>', 'DAVE VAN ROOYEN', 'DAVE VAN ROOYEN', 'gthfnal6fd.jpg', 'detail_gthfnal6fd.jpg', '2014-09-27 00:18:01', 1, '2014-09-27 00:18:01', 1, NULL),
(5, 1, 'DAVE VAN ROOYEN', 'MANAGER & MOTOLAO GUIDE', '<p><span>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</span></p>', 'DAVE VAN ROOYEN', 'DAVE VAN ROOYEN', 'galo9fwcju.jpg', 'detail_galo9fwcju.jpg', '2014-09-27 00:18:08', 1, '2014-09-27 00:18:08', 1, NULL),
(6, 1, 'DAVE VAN ROOYEN', 'MANAGER & MOTOLAO GUIDE', '<p><span>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</span></p>', 'DAVE VAN ROOYEN', 'DAVE VAN ROOYEN', 'w0ly1atdip.jpg', 'detail_w0ly1atdip.jpg', '2014-09-27 00:18:16', 1, '2014-09-27 00:18:24', 1, NULL),
(7, 1, 'DAVE VAN ROOYEN', 'MANAGER & MOTOLAO GUIDE', '<p><span>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</span></p>', 'DAVE VAN ROOYEN', 'DAVE VAN ROOYEN', 'yb8kznkjpu.jpg', 'detail_yb8kznkjpu.jpg', '2014-09-27 00:18:36', 1, '2014-09-27 00:18:36', 1, NULL),
(8, 1, 'DAVE VAN ROOYEN', 'MANAGER & MOTOLAO GUIDE', '<p><span>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</span></p>', 'DAVE VAN ROOYEN', 'DAVE VAN ROOYEN', 'p82xe58gbx.jpg', 'detail_p82xe58gbx.jpg', '2014-09-27 00:18:43', 1, '2014-09-27 00:18:43', 1, NULL),
(9, 1, 'DAVE VAN ROOYEN', 'MANAGER & MOTOLAO GUIDE', '<p><span>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</span></p>', 'DAVE VAN ROOYEN', 'DAVE VAN ROOYEN', 'tek1qhh037.jpg', 'detail_tek1qhh037.jpg', '2014-09-27 00:19:43', 1, '2014-09-27 00:19:43', 1, NULL),
(10, 1, 'DAVE VAN ROOYEN', 'MANAGER & MOTOLAO GUIDE', '<p><span>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</span></p>', 'DAVE VAN ROOYEN', 'DAVE VAN ROOYEN', 'lmtqtgco0w.jpg', 'detail_lmtqtgco0w.jpg', '2014-09-27 00:19:50', 1, '2014-09-27 00:19:50', 1, NULL),
(11, 1, 'DAVE VAN ROOYEN', 'MANAGER & MOTOLAO GUIDE', '<p><span>Dave hails from South Africa and has a passion for motorcycle riding. He has been riding motorcycles both on and off road for most of his life. Dave&rsquo;s professional background is in Customer Service and therefore he is committed to meeting and exceeding the customers&rsquo; needs. Dave is married and has 2 grown up children.</span></p>', 'DAVE VAN ROOYEN', 'DAVE VAN ROOYEN', 'tnorlywk8c.jpg', 'detail_tnorlywk8c.jpg', '2014-09-27 00:20:26', 1, '2014-09-27 00:20:41', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE IF NOT EXISTS `tours` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `short_title` varchar(150) NOT NULL,
  `tour_type` varchar(150) NOT NULL,
  `category_id` int(11) DEFAULT '0',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `name`, `short_title`, `tour_type`, `category_id`, `url`, `meta_title`, `meta_description`, `description`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(2, 'FOLLOW YOUR DREAMS.', 'FOLLOW YOUR DREAMS.', '1 day', 1, '', '', '', '', '2014-09-14 11:53:21', 1, '2014-09-14 11:53:21', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tour_image`
--

CREATE TABLE IF NOT EXISTS `tour_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) unsigned NOT NULL,
  `tour_id` int(11) unsigned NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tour_image`
--

INSERT INTO `tour_image` (`id`, `lang_id`, `tour_id`, `is_default`, `tag`, `image_large`, `image_small`, `image_detail`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(3, 1, 2, 1, 'dsdssd', 'dg72tula4e.jpg', 'small_dg72tula4e.jpg', 'detail_dg72tula4e.jpg', '2014-09-15 00:07:23', 1, '2014-09-15 00:07:23', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tour_langs`
--

CREATE TABLE IF NOT EXISTS `tour_langs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `short_title` varchar(150) NOT NULL,
  `tour_type` varchar(150) NOT NULL,
  `lang_id` int(11) DEFAULT '0',
  `parent_id` int(11) DEFAULT '0',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tour_langs`
--

INSERT INTO `tour_langs` (`id`, `name`, `short_title`, `tour_type`, `lang_id`, `parent_id`, `url`, `meta_title`, `meta_description`, `description`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'test a', 'test', '1 day', 2, 2, 'test', 'test', 'test', 'test', '2014-09-14 17:49:32', 1, '2014-09-14 17:51:55', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `ip_address`, `type`, `is_active`, `activation_key`, `deleted`, `create_time`, `create_user_id`, `update_time`, `update_user_id`, `activity_log`) VALUES
(1, 'admin', 'ali', 'abbas', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '', 'admin', 1, NULL, 0, '2014-09-07 01:09:09', 1, '2014-09-20 16:49:57', 1, 'user insterted through console');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
