-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2014 at 08:38 AM
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
-- Table structure for table `fee_transaction_info`
--

CREATE TABLE IF NOT EXISTS `fee_transaction_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(200) NOT NULL,
  `order_id` varchar(200) DEFAULT NULL,
  `product_id` varchar(200) DEFAULT NULL,
  `fee_type` varchar(200) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `fee_transaction_info`
--

INSERT INTO `fee_transaction_info` (`id`, `transaction_id`, `order_id`, `product_id`, `fee_type`, `notes`) VALUES
(1, 'trans53e9f5f9064e1', 'order53da538d44a73', 'pro53b7aca05a35a', 'OF', NULL),
(2, 'trans53e9f5f967b90', 'order53da538d44a73', 'pro53b7aca05a35a', 'PC', NULL),
(3, 'trans53e9f5f98e8b1', 'order53da538d44a73', 'pro53b7aca05a35a', 'PV', NULL),
(4, 'trans53e9f5fa1286d', 'order53da538d44a73', 'pro53b2b3c82c476', 'OF', NULL),
(5, 'trans53e9f5fa6be32', 'order53da538d44a73', 'pro53b2b3c82c476', 'PV', NULL),
(6, 'trans53e9f5fa9b025', 'order53da538d44a73', 'pro53b13cba9cc8f', 'OF', NULL),
(7, 'trans53e9f5fc2942d', 'order53da538d44a73', 'pro53b13cba9cc8f', 'PV', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership_info`
--

CREATE TABLE IF NOT EXISTS `membership_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membership_id` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `membership_info`
--

INSERT INTO `membership_info` (`id`, `membership_id`, `price`, `status`) VALUES
(1, 'membership53d7867d58827', '20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `membership_order_info`
--

CREATE TABLE IF NOT EXISTS `membership_order_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membership_order_id` varchar(200) NOT NULL,
  `membership_id` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(100) NOT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `membership_order_info`
--

INSERT INTO `membership_order_info` (`id`, `membership_order_id`, `membership_id`, `user_id`, `payment_method`, `amount`, `date`, `ip`, `order_status`, `notes`) VALUES
(1, 'mem_order53d7b48e50610', 'membership53d7867d58827', 'user53bd43c5325d5', 'online', '20', '2014-07-29 04:07:50', '::1', 'Processing', NULL),
(2, 'mem_order53d7b6b8e3872', 'membership53d7867d58827', 'user53bd43c5325d5', 'online', '20', '2014-07-29 04:07:04', '::1', 'Completed', NULL),
(3, 'mem_order53d8aad436000', 'membership53d7867d58827', 'user53bd43c5325d5', 'online', '20', '2014-07-30 10:07:36', '::1', 'Processing', NULL),
(4, 'mem_order53d8abcc4fecf', 'membership53d7867d58827', 'user53d8abab1de6c', 'online', '20', '2014-07-30 10:07:44', '::1', 'Completed', NULL),
(5, 'mem_order53d8ac754cea0', 'membership53d7867d58827', 'user53d8ac70513d3', 'bank', '20', '2014-07-30 10:07:33', '::1', 'Completed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_level_info`
--

CREATE TABLE IF NOT EXISTS `member_level_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_category` varchar(500) DEFAULT NULL,
  `member_level` varchar(50) DEFAULT NULL,
  `image_link` varchar(100) DEFAULT NULL,
  `promotion_pv` varchar(200) DEFAULT NULL,
  `RF` varchar(200) DEFAULT NULL,
  `OF` varchar(200) DEFAULT NULL,
  `PC` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `member_level_info`
--

INSERT INTO `member_level_info` (`id`, `member_category`, `member_level`, `image_link`, `promotion_pv`, `RF`, `OF`, `PC`, `status`) VALUES
(1, 'Member', '0', 'images/Member.png', '0', NULL, '2%', NULL, '1'),
(2, 'Agent', '1', 'images/Agent.png', '500', '5%', '2%', '2%', '1'),
(3, 'Retailer', '2', 'images/Retailer.png', '1500', '7%', '2%', '4%', '1'),
(4, 'Whole Saler', '3', 'images/Whole Saler.png', '3000', '9%', '2%', '6%', '1'),
(5, 'Local Distributor', '4', 'images/Local Distributor.png', '5000', '10%', '2%', '8%', '1'),
(6, 'Global Distributor', '5', 'images/Global Distributor.png', '8000', '15%', '2%', '10%', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE IF NOT EXISTS `order_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(200) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `shipping_charge` varchar(100) DEFAULT NULL,
  `payment_method` varchar(200) DEFAULT NULL,
  `total_amount` varchar(100) DEFAULT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `checkout_process` int(11) NOT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`id`, `order_id`, `user_id`, `shipping_charge`, `payment_method`, `total_amount`, `total_quantity`, `date`, `ip`, `order_status`, `checkout_process`, `notes`) VALUES
(1, 'order53c4ca2b57a41', 'user53bd43c5325d5', '10', 'online', '1670', 5, '2014-07-15 08:07:19', '::1', 'Processing', 1, NULL),
(3, 'order53c4fafe0611c', 'user53bd43c5325d5', '10', 'bank', '3700', 6, '2014-07-15 03:07:36', '::1', 'Completed', 1, 'Its for checking purpose'),
(4, 'order53ce233843408', 'Guest', '10', 'cod', '43', 1, '2014-07-22 10:07:53', '::1', 'Processing', 1, NULL),
(5, 'order53cf647dd082c', 'Guest', '10', 'cod', '3010', 10, '2014-07-23 09:07:46', '::1', 'Processing', 1, NULL),
(6, 'order53da538d44a73', 'user53da00743ca87', '10', 'online', '2938', 5, '2014-07-31 04:07:53', '::1', 'Completed', 1, 'Its for checking purpose...');

-- --------------------------------------------------------

--
-- Table structure for table `order_shipping_info`
--

CREATE TABLE IF NOT EXISTS `order_shipping_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(200) NOT NULL,
  `f_name` varchar(500) DEFAULT NULL,
  `l_name` varchar(500) DEFAULT NULL,
  `addr_1` varchar(1000) DEFAULT NULL,
  `addr_2` varchar(1000) DEFAULT NULL,
  `email_id` varchar(500) DEFAULT NULL,
  `contact_no` varchar(200) DEFAULT NULL,
  `postal_code` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `country` varchar(200) NOT NULL,
  `address_mode` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `order_shipping_info`
--

INSERT INTO `order_shipping_info` (`id`, `order_id`, `f_name`, `l_name`, `addr_1`, `addr_2`, `email_id`, `contact_no`, `postal_code`, `city`, `state`, `country`, `address_mode`) VALUES
(1, 'order53c4ca2b57a41', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(2, 'order53c4ca2b57a41', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(5, 'order53c4fafe0611c', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(6, 'order53c4fafe0611c', 'Vasu', 'Naman', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(7, 'order53ce233843408', 'abcd', 'bcda', 'aaadfsaf', 'sdfsdfsa', 'dipanjan@vyrazu.com', '1234565', '700115', 'Kolkata', 'West Bengal', 'India', 'Billing'),
(8, 'order53ce233843408', 'abcd', 'bcda', 'aaadfsaf', 'sdfsdfsa', 'dipanjan@vyrazu.com', '1234565', '700115', 'Kolkata', 'West Bengal', 'India', 'Shipping'),
(9, 'order53cf647dd082c', 'Vasu', 'Naman', 'aaadfsaf', 'sdfsdfsa', 'abcd@abc.com', '65756756', '700115', 'Kolkata', 'West Bengal', 'India', 'Billing'),
(10, 'order53cf647dd082c', 'Vasu', 'Naman', 'aaadfsaf', 'sdfsdfsa', 'abcd@abc.com', '324234', '700115', 'Kolkata', 'West Bengal', 'India', 'Shipping'),
(11, 'order53da538d44a73', 'dipanjan', 'bcda', 'aaadfsaf', 'sdfsdfsa', 'abcd@gmail.com', '345', '700060', 'Kolkata', 'West Bengal', 'India', 'Billing'),
(12, 'order53da538d44a73', 'dipanjan', 'bcda', 'aaadfsaf', 'sdfsdfsa', 'abcd@gmail.com', '345', '700060', 'Kolkata', 'West Bengal', 'India', 'Shipping');

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
-- Table structure for table `product_customization`
--

CREATE TABLE IF NOT EXISTS `product_customization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `specification` varchar(200) NOT NULL,
  `value` varchar(10000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `product_customization`
--

INSERT INTO `product_customization` (`id`, `product_id`, `specification`, `value`, `status`) VALUES
(1, 'pro53b13cba9cc8f', 'color', 'red,blue', '1'),
(2, 'pro53b13cba9cc8f', 'size', '14 inch,100 cm', '1'),
(3, 'pro53b7a48b16406', 'color', 'purple,black', '1'),
(4, 'pro53b7a48b16406', 'size', '1mt,500cm', '1'),
(5, 'pro53b13f6c4adce', 'color', 'white,orange,violet', '1'),
(6, 'pro53b13f6c4adce', 'size', '55",12 cm', '1'),
(7, 'pro53b2b35a7a564', 'size', 'red,yellow', '1'),
(8, 'pro53b2b40797daa', 'size', '20 cm,78"', '1'),
(9, 'pro53b7a4c596059', 'size', '11",25"', '1'),
(10, 'pro53b7a4c596059', 'color', 'white,brown', '1'),
(11, 'pro53b7a6b7d9c55', 'color', 'blue,red', '1'),
(12, 'pro53b7a6b7d9c55', 'size', '12",33 cm,18"', '1'),
(13, 'pro53b7a744d2f34', 'color', 'blue,green,grey', '1'),
(14, 'pro53b7a744d2f34', 'size', '100 cm,150 cm', '1'),
(15, 'pro53b7a96e40231', 'color', 'orange,sky', '1'),
(16, 'pro53b7a96e40231', 'size', '22 cm,34 cm', '1'),
(17, 'pro53b7af97db77d', 'color', 'blue,white,red', '1'),
(18, 'pro53b7af97db77d', 'size', '55 cm,41 cm', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `img_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `img_order`) VALUES
(1, 'pro53b13cba9cc8f', 'Chrysanthemum.jpg', 1),
(2, 'pro53b13cba9cc8f', 'Hydrangeas.jpg', 3),
(3, 'pro53b13cba9cc8f', 'Jellyfish.jpg', 4),
(4, 'pro53b13cba9cc8f', 'Tulips.jpg', 2),
(5, 'pro53b13cba9cc8f', 'Koala.jpg', 5),
(6, 'pro53b2b40797daa', 'Mobile.png', 1),
(7, 'pro53b2b40797daa', 'George8.jpg', 2),
(8, 'pro53b2b40797daa', '5843303770_8dfe298056_b.jpg', 3),
(9, 'pro53b2b40797daa', '2721908272_3efb9d224d_b.jpg', 5),
(10, 'pro53b2b40797daa', '9965420034_1b7450e257_b.jpg', 4);

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
  `point_value` varchar(100) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `remaining_stock` int(11) NOT NULL,
  `exp_date` datetime NOT NULL,
  `maxpick` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `product_id`, `category`, `name`, `short_description`, `description`, `old_price`, `guest_price`, `member_price`, `special_price`, `point_value`, `stock`, `remaining_stock`, `exp_date`, `maxpick`, `date`, `status`) VALUES
(1, 'pro53b13cba9cc8f', 1, 'Crow Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '87', '100', '898', '66', '300', 222, 217, '2014-10-21 00:00:00', 4, '2014-06-30 12:32:26', '1'),
(2, 'pro53b13f6c4adce', 11, 'Crow Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<div><span style="background-color:rgb(250, 250, 250); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>\r\n', '12', '33', '332', '66', '40', 200, 194, '2014-12-27 00:00:00', 8, '2014-06-30 12:43:56', '1'),
(3, 'pro53b2b35a7a564', 10, 'Crow Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<div><span style="background-color:rgb(250, 250, 250); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>\r\n', '87', '33', '787', '2323', '45', 5454, 5454, '2015-03-28 00:00:00', 5, '2014-07-01 03:10:50', '1'),
(4, 'pro53b2b3c82c476', 9, 'Crow Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p><strong><span style="background-color:rgb(250, 250, 250); color:rgb(55, 55, 55); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></strong></p>\r\n', '120', '788', '332', '660', '74', 230, 227, '2015-05-26 00:00:00', 4, '2014-07-01 03:12:40', '1'),
(5, 'pro53b2b40797daa', 11, 'Crow Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p><em><span style="background-color:rgb(250, 250, 250); color:rgb(55, 55, 55); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></em></p>\r\n', '87', '33', '31', '66', '10', 222, 222, '2014-11-28 00:00:00', 7, '2014-07-01 03:13:43', '1'),
(6, 'pro53b7a48b16406', 13, 'Sparrow Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />lorem ipsum : loremm ipsum lorem 2525 lorem.</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><h4>Lorem ipsum dolor sit amet</h4><p>Lorem ipsum dolor: Lorem ips sit.<br />Lorem ipsum dolor: Lorem ips.<br />Lorem ipsum dolor: Lorem ipsum<br />Lorem ipsum dolor: Lorem ipsum dolor</p>', '85', '99', '78', '66', '78', 5454, 5454, '2014-10-21 00:00:00', 7, '2014-07-05 09:08:59', '1'),
(7, 'pro53b7a4c596059', 2, 'Sparrow Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '85', '33', '78', '66', '35', 48, 48, '2014-12-31 00:00:00', 4, '2014-07-05 09:09:57', '1'),
(8, 'pro53b7a6b7d9c55', 12, 'Sparrow Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '12', '33', '31', '11', '32', 745, 745, '2014-10-21 00:00:00', 2, '2014-07-05 09:18:15', '1'),
(9, 'pro53b7a744d2f34', 34, 'Sparrow Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '125', '55', '898', '66', '200', 156, 156, '2014-11-14 00:00:00', 2, '2014-07-05 09:20:36', '1'),
(10, 'pro53b7a7a3e5db2', 31, 'Sparrow Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '85', '33', '31', '11', '450', 5454, 5454, '2014-09-03 00:00:00', 8, '2014-07-05 09:22:11', '1'),
(11, 'pro53b7a96e40231', 3, 'Eagle Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>&lt;p&gt;lorem Ipsum : Lorem ipsum&lt;br /&gt;lorem ipsum : loremm ipsum lorem 2525 lorem.&lt;/p&gt;&lt;h4&gt;Lorem ipsum dolor sit amet&lt;/h4&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore&lt;/p&gt;&lt;h4&gt;Lorem ipsum dolor sit amet&lt;/h4&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud&lt;/p&gt;&lt;h4&gt;Lorem ipsum dolor sit amet&lt;/h4&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&lt;/p&gt;&lt;h4&gt;Lorem ipsum dolor sit amet&lt;/h4&gt;&lt;p&gt;Lorem ipsum dolor: Lorem ips sit.&lt;br /&gt;Lorem ipsum dolor: Lorem ips.&lt;br /&gt;Lorem ipsum dolor: Lorem ipsum&lt;br /&gt;Lorem ipsum dolor: Lorem ipsum dolor&lt;/p&gt;</p>\r\n', '12', '33', '96', '66', '120', 55, 54, '2014-11-13 00:00:00', 5, '2014-07-05 09:29:50', '1'),
(12, 'pro53b7a9c756609', 35, 'Eagle Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '444', '232', '121', '111', '44', 564, 564, '2014-10-29 00:00:00', 4, '2014-07-05 09:31:19', '1'),
(13, 'pro53b7ab7800ddb', 27, 'Eagle Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '87', '33', '31', '66', '62', 564, 564, '2015-05-22 00:00:00', 7, '2014-07-05 09:38:32', '1'),
(14, 'pro53b7abb72e6d1', 28, 'Eagle Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '85', '33', '31', '11', '37', 5454, 5454, '2015-01-09 00:00:00', 5, '2014-07-05 09:39:35', '1'),
(15, 'pro53b7abff792a9', 27, 'Eagle Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '87', '33', '15', '66', '40', 222, 222, '2014-12-05 00:00:00', 7, '2014-07-05 09:40:47', '1'),
(16, 'pro53b7aca05a35a', 16, 'Pigeon Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '600', '500', '400', '300', '55', 564, 562, '2014-10-11 00:00:00', 5, '2014-07-05 09:43:28', '1'),
(17, 'pro53b7acd78093d', 4, 'Pigeon Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '450', '350', '200', '250', '62', 570, 570, '2014-12-19 00:00:00', 4, '2014-07-05 09:44:23', '1'),
(18, 'pro53b7ad897bfb9', 18, 'Pigeon Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '850', '620', '430', '220', '150', 3423, 3423, '2015-04-30 00:00:00', 8, '2014-07-05 09:47:21', '1'),
(19, 'pro53b7ae560ec74', 17, 'Pigeon Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '875', '554', '366', '456', '300', 3423, 3423, '2014-12-26 00:00:00', 5, '2014-07-05 09:50:46', '1'),
(20, 'pro53b7aeabc714d', 4, 'Pigeon Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '858', '774', '665', '555', '95', 6566, 6566, '2014-10-24 00:00:00', 7, '2014-07-05 09:52:11', '1'),
(21, 'pro53b7af554d2e4', 5, 'Owl Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '858', '766', '533', '228', '85', 669, 666, '2014-11-13 00:00:00', 8, '2014-07-05 09:55:01', '1'),
(22, 'pro53b7af97db77d', 19, 'Owl Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '121', '101', '94', '66', '30', 564, 562, '2014-11-21 00:00:00', 5, '2014-07-05 09:56:07', '1'),
(23, 'pro53b7b037d46ca', 20, 'Owl Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '466', '355', '844', '422', '88', 366, 366, '2014-11-21 00:00:00', 4, '2014-07-05 09:58:47', '1'),
(24, 'pro53b7b07976dbb', 21, 'Owl Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '85', '33', '787', '22', '70', 156, 156, '2014-10-25 00:00:00', 7, '2014-07-05 09:59:53', '1'),
(25, 'pro53b7b0f88e5c9', 5, 'Owl Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '87', '100', '78', '22', '100', 549, 544, '2014-11-28 00:00:00', 5, '2014-07-05 10:02:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory_info`
--

CREATE TABLE IF NOT EXISTS `product_inventory_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(200) NOT NULL,
  `product_id` varchar(200) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `specification` varchar(2000) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product_inventory_info`
--

INSERT INTO `product_inventory_info` (`id`, `order_id`, `product_id`, `quantity`, `specification`, `price`) VALUES
(1, 'order53c4ca2b57a41', 'pro53b13f6c4adce', 3, 'color:white,size:55', '996'),
(2, 'order53c4ca2b57a41', 'pro53b2b3c82c476', 2, '', '664'),
(3, 'order53c4fafe0611c', 'pro53b13cba9cc8f', 3, 'color:red,size:44 mt', '2694'),
(4, 'order53c4fafe0611c', 'pro53b13f6c4adce', 3, 'color:orange,size:55', '996'),
(5, 'order53ce233843408', 'pro53b7a96e40231', 1, 'color:orange,size:34 cm', '33'),
(6, 'order53cf647dd082c', 'pro53b7af554d2e4', 3, '', '2298'),
(7, 'order53cf647dd082c', 'pro53b7af97db77d', 2, 'color:white,size:41 cm', '202'),
(8, 'order53cf647dd082c', 'pro53b7b0f88e5c9', 5, '', '500'),
(9, 'order53da538d44a73', 'pro53b7aca05a35a', 2, '', '800'),
(10, 'order53da538d44a73', 'pro53b2b3c82c476', 1, '', '332'),
(11, 'order53da538d44a73', 'pro53b13cba9cc8f', 2, 'color:red,size:14 inch', '1796');

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
-- Table structure for table `shipping_cost_info`
--

CREATE TABLE IF NOT EXISTS `shipping_cost_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_cost` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shipping_cost_info`
--

INSERT INTO `shipping_cost_info` (`id`, `shipping_cost`, `status`) VALUES
(1, '10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `system_currency`
--

CREATE TABLE IF NOT EXISTS `system_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency` varchar(50) NOT NULL,
  `field` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `system_currency`
--

INSERT INTO `system_currency` (`id`, `currency`, `field`) VALUES
(1, 'S$', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `system_money_info`
--

CREATE TABLE IF NOT EXISTS `system_money_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specification` varchar(200) NOT NULL,
  `credit` varchar(100) DEFAULT NULL,
  `debit` varchar(100) DEFAULT NULL,
  `system_balance` varchar(5000) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `system_money_info`
--

INSERT INTO `system_money_info` (`id`, `specification`, `credit`, `debit`, `system_balance`, `notes`) VALUES
(1, 'order53da538d44a73', '2938', NULL, '2938', NULL),
(2, 'trans53e9f5f9064e1', NULL, '48', '2890', NULL),
(3, 'trans53e9f5f967b90', NULL, '16', '2874', NULL),
(4, 'trans53e9f5fa1286d', NULL, '19.92', '2854.08', NULL),
(5, 'trans53e9f5fa9b025', NULL, '107.76', '2746.32', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `user_bank_info`
--

CREATE TABLE IF NOT EXISTS `user_bank_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `ac_holder_name` varchar(500) NOT NULL,
  `ac_number` varchar(500) NOT NULL,
  `bank_name` varchar(500) NOT NULL,
  `branch_name` varchar(500) DEFAULT NULL,
  `ifsc_code` varchar(500) DEFAULT NULL,
  `tax_number` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `f_name` varchar(500) NOT NULL,
  `l_name` varchar(500) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `addr_1` varchar(1000) DEFAULT NULL,
  `addr_2` varchar(1000) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `postal_code` varchar(200) NOT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `company` varchar(500) DEFAULT NULL,
  `username` varchar(500) NOT NULL,
  `email_id` varchar(500) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email_verification` varchar(50) DEFAULT NULL,
  `membership_activation` varchar(50) DEFAULT NULL,
  `member_level` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `f_name`, `l_name`, `gender`, `dob`, `addr_1`, `addr_2`, `city`, `state`, `country`, `postal_code`, `phone`, `company`, `username`, `email_id`, `password`, `email_verification`, `membership_activation`, `member_level`, `status`) VALUES
(1, 'user53bd43c5325d5', 'Dipanjan', 'Bagchi', 'male', '1992-07-06', 'aaadfsaf', 'sdfsdfsa', 'Kolkata', 'WB', 'India', '700115', '1234565', '', 'Dipa0904', 'vdipanjan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '1', '1'),
(2, 'user53d8abab1de6c', 'abcd', 'abcd', 'male', '1996-02-06', 'aaadfsaf', 'sdfsdfsa', 'Ljubljana', 'WB', 'India', '700060', '324234', 'vvvv', 'dipa_test', 'dipanjan.bagchi91@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '1', '1'),
(3, 'user53d8ac70513d3', 'abcd', 'bcda', 'male', '1995-02-06', 'aaadfsaf', 'sdfsdfsa', 'sdsa', 'West Bengal', 'India', '700114', '54545454', '', 'abcd', 'abcd@abc.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '1', '1'),
(4, 'user53da00743ca87', 'dipanjan', 'bcda', 'male', '2001-03-11', 'aaadfsaf', 'sdfsdfsa', 'Kolkata', 'West Bengal', 'India', '700060', '345', 'vvvv', 'rrrrr', 'abcd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '1', '1'),
(5, 'user53da010780637', 'abcd', 'bcda', 'male', '2014-07-01', 'aaadfsaf', 'sdfsdfsa', 'Ljubljana', 'WB', 'India', '1000', '23423', '', 'test2', 'aaaa@ffff.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_mlm_info`
--

CREATE TABLE IF NOT EXISTS `user_mlm_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `child_id` varchar(100) DEFAULT NULL,
  `member_level` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_mlm_info`
--

INSERT INTO `user_mlm_info` (`id`, `user_id`, `parent_id`, `child_id`, `member_level`, `status`) VALUES
(1, 'user53bd43c5325d5', NULL, '2', 1, '1'),
(2, 'user53d8abab1de6c', '1', '3,5', 1, '1'),
(3, 'user53d8ac70513d3', '2', '4', 1, '1'),
(4, 'user53da00743ca87', '3', NULL, 1, '1'),
(5, 'user53da010780637', '2', NULL, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_money_info`
--

CREATE TABLE IF NOT EXISTS `user_money_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `specification` varchar(200) DEFAULT NULL,
  `earn_money` varchar(100) DEFAULT NULL,
  `deduct_money` varchar(200) DEFAULT NULL,
  `total_money` varchar(100) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_money_info`
--

INSERT INTO `user_money_info` (`id`, `user_id`, `specification`, `earn_money`, `deduct_money`, `total_money`, `notes`) VALUES
(1, 'user53d8ac70513d3', 'trans53e9f5f9064e1', '16', NULL, '16', NULL),
(2, 'user53d8abab1de6c', 'trans53e9f5f9064e1', '16', NULL, '16', NULL),
(3, 'user53bd43c5325d5', 'trans53e9f5f9064e1', '16', NULL, '16', NULL),
(4, 'user53da00743ca87', 'trans53e9f5f967b90', '16', NULL, '16', NULL),
(5, 'user53d8ac70513d3', 'trans53e9f5fa1286d', '6.64', NULL, '22.64', NULL),
(6, 'user53d8abab1de6c', 'trans53e9f5fa1286d', '6.64', NULL, '22.64', NULL),
(7, 'user53bd43c5325d5', 'trans53e9f5fa1286d', '6.64', NULL, '22.64', NULL),
(8, 'user53d8ac70513d3', 'trans53e9f5fa9b025', '35.92', NULL, '58.56', NULL),
(9, 'user53d8abab1de6c', 'trans53e9f5fa9b025', '35.92', NULL, '58.56', NULL),
(10, 'user53bd43c5325d5', 'trans53e9f5fa9b025', '35.92', NULL, '58.56', NULL),
(11, 'user53bd43c5325d5', 'withdraw53ea0c6b6a145', NULL, '35.74', '22.82', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_point_info`
--

CREATE TABLE IF NOT EXISTS `user_point_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `specification` varchar(500) DEFAULT NULL,
  `earn_pv` varchar(200) DEFAULT NULL,
  `total_pv` varchar(1000) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_point_info`
--

INSERT INTO `user_point_info` (`id`, `user_id`, `specification`, `earn_pv`, `total_pv`, `notes`) VALUES
(1, 'user53da00743ca87', 'trans53e9f5f98e8b1', '110', '110', NULL),
(2, 'user53d8ac70513d3', 'trans53e9f5f98e8b1', '110', '110', NULL),
(3, 'user53d8abab1de6c', 'trans53e9f5f98e8b1', '110', '110', NULL),
(4, 'user53bd43c5325d5', 'trans53e9f5f98e8b1', '110', '110', NULL),
(5, 'user53da00743ca87', 'trans53e9f5fa6be32', '74', '184', NULL),
(6, 'user53d8ac70513d3', 'trans53e9f5fa6be32', '74', '184', NULL),
(7, 'user53d8abab1de6c', 'trans53e9f5fa6be32', '74', '184', NULL),
(8, 'user53bd43c5325d5', 'trans53e9f5fa6be32', '74', '184', NULL),
(9, 'user53da00743ca87', 'trans53e9f5fc2942d', '600', '784', NULL),
(10, 'user53d8ac70513d3', 'trans53e9f5fc2942d', '600', '784', NULL),
(11, 'user53d8abab1de6c', 'trans53e9f5fc2942d', '600', '784', NULL),
(12, 'user53bd43c5325d5', 'trans53e9f5fc2942d', '600', '784', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_info`
--

CREATE TABLE IF NOT EXISTS `user_profile_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `gross_amount` varchar(200) DEFAULT NULL,
  `withdraw_amount` varchar(200) DEFAULT NULL,
  `processing_withdraw_amount` varchar(200) DEFAULT NULL,
  `net_amount` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_profile_info`
--

INSERT INTO `user_profile_info` (`id`, `user_id`, `gross_amount`, `withdraw_amount`, `processing_withdraw_amount`, `net_amount`) VALUES
(1, 'user53bd43c5325d5', '58.56', '35.74', '0', '22.82'),
(2, 'user53d8abab1de6c', '58.56', NULL, NULL, '58.56'),
(3, 'user53d8ac70513d3', '58.56', NULL, NULL, '58.56'),
(4, 'user53da00743ca87', '16', NULL, NULL, '16'),
(5, 'user53da010780637', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_info`
--

CREATE TABLE IF NOT EXISTS `withdraw_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `withdraw_id` varchar(300) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `withdraw_method` varchar(200) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `withdraw_info`
--

INSERT INTO `withdraw_info` (`id`, `withdraw_id`, `user_id`, `withdraw_method`, `amount`, `date`, `status`) VALUES
(1, 'withdraw53ea0c6b6a145', 'user53bd43c5325d5', 'account', '35.74', '2014-08-12 02:08:31', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
