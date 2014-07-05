-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2014 at 04:57 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jmlm`
--
CREATE DATABASE IF NOT EXISTS `jmlm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jmlm`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `password`, `email`) VALUES
(1, 'j-admin', '123456', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `status`) VALUES
(1, 'lorem 1', '1'),
(2, 'lorem 2', '1'),
(3, 'lorem 3', '1'),
(4, 'lorem 4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `feature_product`
--

CREATE TABLE IF NOT EXISTS `feature_product` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `feature_product`
--

INSERT INTO `feature_product` (`feature_id`, `product_id`, `status`) VALUES
(3, 'pro53b13f6c4adce', '1'),
(4, 'pro53b13cba9cc8f', '1'),
(5, 'pro53b2b35a7a564', '1'),
(6, 'pro53b2b3c82c476', '1'),
(7, 'pro53b2b40797daa', '1'),
(8, 'pro53b7a48b16406', '1'),
(9, 'pro53b7a6b7d9c55', '1'),
(10, 'pro53b7a96e40231', '1'),
(11, 'pro53b7abff792a9', '1'),
(12, 'pro53b7aca05a35a', '1'),
(13, 'pro53b7acd78093d', '1'),
(14, 'pro53b7ae560ec74', '1'),
(15, 'pro53b7af554d2e4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `parentId` varchar(50) DEFAULT NULL,
  `childId` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `date` datetime NOT NULL,
  `active` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`categoryId`, `name`, `parentId`, `childId`, `level`, `date`, `active`, `status`) VALUES
(1, 'Crow', '', '9,10,11', '1', '2014-07-01 09:50:36', '1', '1'),
(2, 'Sparrow', '', '12,13', '1', '2014-07-01 09:50:36', '1', '1'),
(3, 'Eagle', '', '14,15', '1', '2014-07-01 09:50:36', '1', '1'),
(4, 'Pigeon', '', '16,17,18', '1', '2014-07-01 09:50:36', '1', '1'),
(5, 'Owl', '', '19,20,21', '1', '2014-07-01 09:50:36', '1', '1'),
(6, 'Kite', '', '22,23', '1', '2014-07-01 09:50:36', '1', '1'),
(7, 'Kinglet', '', '24', '1', '2014-07-01 09:50:36', '1', '1'),
(8, 'Oriole', '', NULL, '1', '2014-07-01 09:50:36', '1', '1'),
(9, 'Blue', '1', NULL, '2', '2014-07-01 09:50:36', '0', '1'),
(10, 'White', '1', NULL, '2', '2014-07-01 09:53:13', '0', '1'),
(11, 'Mexican', '1', '25', '2', '2014-07-01 09:53:41', '0', '1'),
(12, 'Black-chinned', '2', NULL, '2', '2014-07-01 09:54:22', '0', '1'),
(13, 'Blue-throated', '2', '31,34', '2', '2014-07-01 09:54:35', '0', '1'),
(14, 'Jackdaw', '3', '28,35', '2', '2014-07-01 09:55:04', '0', '1'),
(15, 'Eurasian', '3', '27,33', '2', '2014-07-01 09:55:16', '0', '1'),
(16, 'Common', '4', NULL, '2', '2014-07-01 09:56:06', '0', '1'),
(17, 'Hooded', '4', NULL, '2', '2014-07-01 09:56:20', '0', '1'),
(18, 'Red-breasted', '4', NULL, '2', '2014-07-01 09:56:29', '0', '1'),
(19, 'Black', '5', NULL, '2', '2014-07-01 09:57:14', '0', '1'),
(20, 'Eastern', '5', NULL, '2', '2014-07-01 09:57:28', '0', '1'),
(21, 'Sayâ€™s', '5', NULL, '2', '2014-07-01 09:57:37', '0', '1'),
(22, 'California', '6', NULL, '2', '2014-07-01 09:57:56', '0', '1'),
(23, 'Gambel', '6', NULL, '2', '2014-07-01 09:58:13', '0', '1'),
(24, 'Montezuma', '7', '29', '2', '2014-07-01 09:58:23', '0', '1'),
(25, 'Pectoral', '11', '26', '3', '2014-07-01 09:59:02', '0', '1'),
(26, 'Rock', '25', '30,32', '4', '2014-07-01 09:59:24', '0', '1'),
(27, 'Semipalmated', '15', NULL, '3', '2014-07-01 10:00:36', '0', '1'),
(28, 'Solitary', '14', NULL, '3', '2014-07-01 10:00:56', '0', '1'),
(29, 'Spotted', '24', NULL, '3', '2014-07-01 10:01:11', '0', '1'),
(30, 'Red', '26', NULL, '5', '2014-07-02 12:39:53', '0', '1'),
(31, 'Blue Hack', '13', NULL, '3', '2014-07-02 12:42:03', '0', '1'),
(32, 'Reddish Feather', '26', NULL, '5', '2014-07-02 12:43:01', '0', '1'),
(33, 'Blue Bird', '15', NULL, '3', '2014-07-02 12:47:20', '0', '1'),
(34, 'Sharp Eagle', '13', NULL, '3', '2014-07-02 12:49:51', '0', '1'),
(35, 'Big Sharp Eagle', '14', NULL, '3', '2014-07-02 12:52:48', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE IF NOT EXISTS `product_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(2000) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `old_price` varchar(50) NOT NULL,
  `guest_price` varchar(50) NOT NULL,
  `member_price` varchar(50) NOT NULL,
  `special_price` varchar(50) DEFAULT NULL,
  `distribution_rate` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `exp_date` datetime NOT NULL,
  `maxpick` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `product_id`, `category`, `name`, `short_description`, `description`, `old_price`, `guest_price`, `member_price`, `special_price`, `distribution_rate`, `stock`, `exp_date`, `maxpick`, `date`, `status`) VALUES
(1, 'pro53b13cba9cc8f', 1, 'Crow Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$87', '$100', '$898', '$66', '10%', 222, '2014-07-19 00:00:00', 4, '2014-06-30 12:32:26', '1'),
(2, 'pro53b13f6c4adce', 11, 'Crow Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<div><span style="background-color:rgb(250, 250, 250); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>\r\n', '$12', '$33', '$332', '$66', '22%', 222, '2014-12-27 00:00:00', 8, '2014-06-30 12:43:56', '1'),
(3, 'pro53b2b35a7a564', 10, 'Crow Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<div><span style="background-color:rgb(250, 250, 250); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>\r\n', '$87', '$33', '$787', '$2323', '22%', 5454, '2015-03-28 00:00:00', 5, '2014-07-01 03:10:50', '1'),
(4, 'pro53b2b3c82c476', 9, 'Crow Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p><strong><span style="background-color:rgb(250, 250, 250); color:rgb(55, 55, 55); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></strong></p>\r\n', '$120', '$788', '$332', '$660', '10%', 222, '2015-05-26 00:00:00', 4, '2014-07-01 03:12:40', '1'),
(5, 'pro53b2b40797daa', 11, 'Crow Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p><em><span style="background-color:rgb(250, 250, 250); color:rgb(55, 55, 55); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></em></p>\r\n', '$87', '$33', '$31', '$66', '40%', 222, '2014-11-28 00:00:00', 7, '2014-07-01 03:13:43', '1'),
(6, 'pro53b7a48b16406', 13, 'Sparrow Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />lorem ipsum : loremm ipsum lorem 2525 lorem.</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor: Lorem ips sit.<br />Lorem ipsum dolor: Lorem ips.<br />Lorem ipsum dolor: Lorem ipsum<br />Lorem ipsum dolor: Lorem ipsum dolor</p>', '$85', '$99', '$78', '$66', '22%', 5454, '2014-09-27 00:00:00', 7, '2014-07-05 09:08:59', '1'),
(7, 'pro53b7a4c596059', 2, 'Sparrow Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />lorem ipsum : loremm ipsum lorem 2525 lorem.</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor: Lorem ips sit.<br />Lorem ipsum dolor: Lorem ips.<br />Lorem ipsum dolor: Lorem ipsum<br />Lorem ipsum dolor: Lorem ipsum dolor</p>', '$85', '$33', '$78', '$66', '10%', 55, '2014-12-31 00:00:00', 4, '2014-07-05 09:09:57', '1'),
(8, 'pro53b7a6b7d9c55', 12, 'Sparrow Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />lorem ipsum : loremm ipsum lorem 2525 lorem.</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor: Lorem ips sit.<br />Lorem ipsum dolor: Lorem ips.<br />Lorem ipsum dolor: Lorem ipsum<br />Lorem ipsum dolor: Lorem ipsum dolor</p>', '$12', '$33', '$31', '$11', '15%', 745, '2014-09-27 00:00:00', 2, '2014-07-05 09:18:15', '1'),
(9, 'pro53b7a744d2f34', 34, 'Sparrow Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$125', '$55', '$898', '$66', '40%', 156, '2014-11-14 00:00:00', 2, '2014-07-05 09:20:36', '1'),
(10, 'pro53b7a7a3e5db2', 31, 'Sparrow Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$85', '$33', '$31', '$11', '22%', 5454, '2014-09-03 00:00:00', 8, '2014-07-05 09:22:11', '1'),
(11, 'pro53b7a96e40231', 3, 'Eagle Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>&lt;p&gt;lorem Ipsum : Lorem ipsum&lt;br /&gt;lorem ipsum : loremm ipsum lorem 2525 lorem.&lt;/p&gt;&lt;h4&gt;Lorem ipsum dolor sit amet&lt;/h4&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore&lt;/p&gt;&lt;h4&gt;Lorem ipsum dolor sit amet&lt;/h4&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud&lt;/p&gt;&lt;h4&gt;Lorem ipsum dolor sit amet&lt;/h4&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&lt;/p&gt;&lt;h4&gt;Lorem ipsum dolor sit amet&lt;/h4&gt;&lt;p&gt;Lorem ipsum dolor: Lorem ips sit.&lt;br /&gt;Lorem ipsum dolor: Lorem ips.&lt;br /&gt;Lorem ipsum dolor: Lorem ipsum&lt;br /&gt;Lorem ipsum dolor: Lorem ipsum dolor&lt;/p&gt;</p>\r\n', '$12', '$33', '$96', '$66', '10%', 55, '2014-11-13 00:00:00', 5, '2014-07-05 09:29:50', '1'),
(12, 'pro53b7a9c756609', 35, 'Eagle Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$444', '$232', '$121', '$111', '10%', 564, '2014-10-29 00:00:00', 4, '2014-07-05 09:31:19', '1'),
(13, 'pro53b7ab7800ddb', 27, 'Eagle Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$87', '$33', '$31', '$66', '15%', 564, '2015-05-22 00:00:00', 7, '2014-07-05 09:38:32', '1'),
(14, 'pro53b7abb72e6d1', 28, 'Eagle Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$85', '$33', '$31', '$11', '22%', 5454, '2015-01-09 00:00:00', 5, '2014-07-05 09:39:35', '1'),
(15, 'pro53b7abff792a9', 27, 'Eagle Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$87', '$33', '$15', '$66', '10%', 222, '2014-12-05 00:00:00', 7, '2014-07-05 09:40:47', '1'),
(16, 'pro53b7aca05a35a', 16, 'Pigeon Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$600', '$500', '$400', '$300', '22%', 564, '2014-10-11 00:00:00', 5, '2014-07-05 09:43:28', '1'),
(17, 'pro53b7acd78093d', 4, 'Pigeon Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$450', '$350', '$200', '$250', '14%', 570, '2014-12-19 00:00:00', 4, '2014-07-05 09:44:23', '1'),
(18, 'pro53b7ad897bfb9', 18, 'Pigeon Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$850', '$620', '$430', '$220', '22%', 3423, '2015-04-30 00:00:00', 8, '2014-07-05 09:47:21', '1'),
(19, 'pro53b7ae560ec74', 17, 'Pigeon Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$875', '$554', '$366', '$456', '40%', 3423, '2014-12-26 00:00:00', 5, '2014-07-05 09:50:46', '1'),
(20, 'pro53b7aeabc714d', 4, 'Pigeon Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$858', '$774', '$665', '$555', '16%', 6566, '2014-10-24 00:00:00', 7, '2014-07-05 09:52:11', '1'),
(21, 'pro53b7af554d2e4', 5, 'Owl Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$858', '$766', '$533', '$228', '27%', 669, '2014-11-13 00:00:00', 8, '2014-07-05 09:55:01', '1'),
(22, 'pro53b7af97db77d', 19, 'Owl Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$121', '$101', '$94', '$66', '15%', 564, '2014-11-21 00:00:00', 5, '2014-07-05 09:56:07', '1'),
(23, 'pro53b7b037d46ca', 20, 'Owl Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$466', '$355', '$844', '$422', '20%', 366, '2014-11-21 00:00:00', 4, '2014-07-05 09:58:47', '1'),
(24, 'pro53b7b07976dbb', 21, 'Owl Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$85', '$33', '$787', '$22', '22%', 156, '2014-10-25 00:00:00', 7, '2014-07-05 09:59:53', '1'),
(25, 'pro53b7b0f88e5c9', 5, 'Owl Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '$87', '$100', '$78', '$22', '16%', 549, '2014-11-28 00:00:00', 5, '2014-07-05 10:02:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_video`
--

CREATE TABLE IF NOT EXISTS `product_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `video` varchar(500) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product_video`
--

INSERT INTO `product_video` (`id`, `product_id`, `video`, `status`) VALUES
(1, 'pro53b13cba9cc8f', 'http://www.youtube.com/watch?v=HCipAHTw7hY', '1'),
(2, 'pro53b7a48b16406', 'http://www.youtube.com/watch?v=zogg70UiLUU', '1'),
(3, 'pro53b7a744d2f34', 'http://www.youtube.com/watch?v=zogg70UiLUU', '1'),
(4, 'pro53b7a96e40231', 'http://www.youtube.com/watch?v=zogg70UiLUU', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `subCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `categoryId` varchar(300) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`subCategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subCategoryId`, `name`, `categoryId`, `status`) VALUES
(1, 'ipsum 1', '1', '1'),
(2, 'ipsum 2', '2', '1'),
(3, 'ipsum 3', '1', '1'),
(4, 'ipsum 4', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tax_info`
--

CREATE TABLE IF NOT EXISTS `tax_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tax` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
