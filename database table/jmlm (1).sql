-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2014 at 05:21 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feature_product`
--

INSERT INTO `feature_product` (`feature_id`, `product_id`, `status`) VALUES
(3, 'pro53b13f6c4adce', '1'),
(4, 'pro53b13cba9cc8f', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `parentId` varchar(50) DEFAULT NULL,
  `childId` varchar(50) DEFAULT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`categoryId`, `name`, `parentId`, `childId`, `date`, `status`) VALUES
(1, 'abcdef bcdaef', '', '3', '2014-06-30 00:00:00', '1'),
(2, 'abcd', '', '5,7,11', '2014-06-30 00:00:00', '1'),
(3, 'qwqwqw', '1', '4,6,10', '2014-06-30 00:00:00', '1'),
(4, 'Find job', '3', NULL, '2014-06-30 00:00:00', '1'),
(5, 'vbvbvbv', '2', '8', '2014-06-30 00:00:00', '1'),
(6, 'ghghghghg', '3', NULL, '2014-06-30 00:00:00', '1'),
(7, 'ioioioioi', '2', NULL, '2014-06-30 00:00:00', '1'),
(8, 'test 1', '5', '9', '2014-06-30 00:00:00', '1'),
(9, 'gbgbgbgbg', '8', NULL, '2014-06-30 00:00:00', '1'),
(10, 'wewewew', '3', NULL, '2014-06-30 00:00:00', '1'),
(11, 'susu', '2', '12', '2014-06-30 00:00:00', '1'),
(12, 'nest under susu', '11', '13', '2014-06-30 00:00:00', '1'),
(13, 'nest under abcd', '12', NULL, '2014-06-30 00:00:00', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `product_id`, `category`, `name`, `description`, `old_price`, `guest_price`, `member_price`, `special_price`, `distribution_rate`, `stock`, `exp_date`, `maxpick`, `date`, `status`) VALUES
(1, 'pro53b13cba9cc8f', 1, 'test 2', '<p><span style="color:#00FF00"><span style="font-size:24px"><strong>sdf sfewer wer</strong></span></span></p>\r\n', '$87', '$100', '$898', '$66', '10%', 222, '2014-07-19 00:00:00', 4, '2014-06-30 12:32:26', '1'),
(2, 'pro53b13f6c4adce', 9, 'Find job', '<p>re gdfgdfg dsfggfbvnvnvhg</p>\r\n', '$12', '$33', '332', '$66', '22%', 222, '2014-12-27 00:00:00', 8, '2014-06-30 12:43:56', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
