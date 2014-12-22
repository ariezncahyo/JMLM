-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2014 at 07:42 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jmlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `base_url` varchar(255) NOT NULL,
  `paypal_payment_method` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `password`, `email`, `base_url`, `paypal_payment_method`) VALUES
(1, 'j-admin', '123456', 'admin@admin.com', 'http://localhost/vyrazu/JMLM/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feature_product`
--

CREATE TABLE IF NOT EXISTS `feature_product` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(200) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
(15, 'pro53b7af554d2e4', '1'),
(16, 'pro541bf65dd5414', '1'),
(17, 'pro541bf69ccdc7a', '1'),
(18, 'pro53b7a4c596059', '1'),
(19, 'pro53b7a744d2f34', '1'),
(20, 'pro53b7a7a3e5db2', '1'),
(21, 'pro54539406cbee0', '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

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
(7, 'trans53e9f5fc2942d', 'order53da538d44a73', 'pro53b13cba9cc8f', 'PV', NULL),
(8, 'trans5409ae13eea7a', 'order53c4fafe0611c', 'pro53b13cba9cc8f', 'PC', NULL),
(9, 'trans5409ae142adb6', 'order53c4fafe0611c', 'pro53b13cba9cc8f', 'PV', NULL),
(10, 'trans5409ae1451ad7', 'order53c4fafe0611c', 'pro53b13f6c4adce', 'PC', NULL),
(11, 'trans5409ae147c679', 'order53c4fafe0611c', 'pro53b13f6c4adce', 'PV', NULL),
(12, 'trans5417f9110ee0d', 'order540aecbf38565', 'pro53b7aca05a35a', 'PC', NULL),
(13, 'trans5417f9111d658', 'order540aecbf38565', 'pro53b7aca05a35a', 'PV', NULL),
(14, 'trans54182ee704eac', 'order54072382aad2d', 'pro53b13cba9cc8f', 'PC', NULL),
(15, 'trans54182ee710b39', 'order54072382aad2d', 'pro53b13cba9cc8f', 'PV', NULL),
(16, 'trans54182ffe1de28', 'order54072382aad2d', 'pro53b13cba9cc8f', 'PC', NULL),
(17, 'trans54182ffe3c63a', 'order54072382aad2d', 'pro53b13cba9cc8f', 'PV', NULL),
(18, 'trans5418301e74530', 'order5417f864eda3a', 'pro53b7aca05a35a', 'PC', NULL),
(19, 'trans5418301e80327', 'order5417f864eda3a', 'pro53b7aca05a35a', 'PV', NULL),
(20, 'trans541acef71f840', 'mem_order541ace65732a3', 'membership53d7867d58827', 'RF', NULL),
(21, 'trans541c0e4ea6999', 'order541c0c3ca5610', 'pro541bf65dd5414', 'PV', NULL),
(22, 'trans541c14793b78e', 'order541c0c3ca5610', 'pro541bf65dd5414', 'PV', NULL),
(23, 'trans541c480706a57', 'order541c24bee490d', 'pro53b13f6c4adce', 'PV', NULL),
(24, 'trans54539a6b2b74d', NULL, NULL, 'PS', NULL),
(25, 'trans54539e8cbaa15', 'order541d910c762d7', 'pro53b13f6c4adce', 'PC', NULL),
(26, 'trans54539e8cc17be', 'order541d910c762d7', 'pro53b13f6c4adce', 'PV', NULL),
(27, 'trans54539e8cc3cda', 'order541d910c762d7', 'pro53b13f6c4adce', 'PC', NULL),
(28, 'trans54539e8cc5ed2', 'order541d910c762d7', 'pro53b13f6c4adce', 'PV', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `membership_order_info`
--

INSERT INTO `membership_order_info` (`id`, `membership_order_id`, `membership_id`, `user_id`, `payment_method`, `amount`, `date`, `ip`, `order_status`, `notes`) VALUES
(1, 'mem_order53d7b48e50610', 'membership53d7867d58827', 'user53bd43c5325d5', 'online', '20', '2014-07-29 04:07:50', '::1', 'Processing', NULL),
(2, 'mem_order53d7b6b8e3872', 'membership53d7867d58827', 'user53bd43c5325d5', 'online', '20', '2014-07-29 04:07:04', '::1', 'Completed', NULL),
(3, 'mem_order53d8aad436000', 'membership53d7867d58827', 'user53bd43c5325d5', 'online', '20', '2014-07-30 10:07:36', '::1', 'Processing', NULL),
(4, 'mem_order53d8abcc4fecf', 'membership53d7867d58827', 'user53d8abab1de6c', 'online', '20', '2014-07-30 10:07:44', '::1', 'Completed', NULL),
(5, 'mem_order53d8ac754cea0', 'membership53d7867d58827', 'user53d8ac70513d3', 'bank', '20', '2014-07-30 10:07:33', '::1', 'Completed', NULL),
(6, 'mem_order541ace65732a3', 'membership53d7867d58827', 'user541ace29d345d', 'online', '20', '2014-09-18 08:09:57', '116.12.133.74', 'Completed', NULL),
(7, 'mem_order541bf8ed77a89', 'membership53d7867d58827', 'user541bf8dd5a260', 'bank', '20', '2014-09-19 05:09:41', '116.12.133.74', 'Processing', NULL),
(8, 'mem_order541bf8fb98c50', 'membership53d7867d58827', 'user541bf8dd5a260', 'online', '20', '2014-09-19 05:09:55', '116.12.133.74', 'Cancel', NULL),
(9, 'mem_order541bf9e0e1847', 'membership53d7867d58827', 'user541bf8dd5a260', 'online', '20', '2014-09-19 05:09:44', '116.12.133.74', 'Cancel', NULL),
(10, 'mem_order541bfa3d31111', 'membership53d7867d58827', 'user541bf8dd5a260', 'bank', '20', '2014-09-19 05:09:17', '116.12.133.74', 'Completed', NULL),
(11, 'mem_order541bfa4d9b3ca', 'membership53d7867d58827', 'user541bf8dd5a260', 'online', '20', '2014-09-19 05:09:33', '116.12.133.74', 'Processing', NULL),
(12, 'mem_order541c229c34bb0', 'membership53d7867d58827', 'user541c228723955', 'online', '20', '2014-09-19 08:09:32', '116.12.133.74', 'Completed', NULL),
(13, 'mem_order545359ba6453e', 'membership53d7867d58827', 'user545359677a9d4', 'bank', '20', '2014-10-31 03:10:22', '127.0.0.1', 'Processing', NULL),
(14, 'mem_order545375f55938f', 'membership53d7867d58827', 'user545375eed86de', 'bank', '20', '2014-10-31 05:10:49', '127.0.0.1', 'Processing', NULL),
(15, 'mem_order5454d79ba147e', 'membership53d7867d58827', 'user5454d7961c097', 'bank', '20', '2014-11-01 06:11:43', '127.0.0.1', 'Processing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_level_info`
--

CREATE TABLE IF NOT EXISTS `member_level_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_category` varchar(500) DEFAULT NULL,
  `member_level` varchar(50) DEFAULT NULL,
  `image_link` varchar(100) DEFAULT NULL,
  `user_icon_link` varchar(200) DEFAULT NULL,
  `promotion_pv` varchar(200) DEFAULT NULL,
  `RF` varchar(200) DEFAULT NULL,
  `OF` varchar(200) DEFAULT NULL,
  `PC` varchar(200) DEFAULT NULL,
  `PS` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `member_level_info`
--

INSERT INTO `member_level_info` (`id`, `member_category`, `member_level`, `image_link`, `user_icon_link`, `promotion_pv`, `RF`, `OF`, `PC`, `PS`, `status`) VALUES
(1, 'Member', '0', 'images/Member.png', 'images/member-icon.png', '0', NULL, '2%', NULL, NULL, '1'),
(2, 'Agent', '1', 'images/Agent.png', 'images/agent-icon.png', '500', '5%', '2%', '2%', NULL, '1'),
(3, 'Retailer', '2', 'images/Retailer.png', 'images/retailer-icon.png', '1500', '7%', '2%', '4%', NULL, '1'),
(4, 'Whole Saler', '3', 'images/Whole Saler.png', 'images/whole-saler-icon.png', '3000', '9%', '2%', '6%', NULL, '1'),
(5, 'Local Distributor', '4', 'images/Local Distributor.png', 'images/local-distributor.png', '5000', '10%', '2%', '8%', NULL, '1'),
(6, 'Global Distributor', '5', 'images/Global Distributor.png', 'images/global-distributor.png', '8000', '15%', '2%', '10%', '5%', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mypage`
--

CREATE TABLE IF NOT EXISTS `mypage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_banner_desc` varchar(10000) NOT NULL,
  `page_content` varchar(20000) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `mypage`
--

INSERT INTO `mypage` (`id`, `page_id`, `page_name`, `page_banner_desc`, `page_content`, `image`, `date`, `time`, `status`) VALUES
(1, 'p5404265064286', 'testing purpose 1', 'test', '<p><strong>test1</strong></p>\r\n', NULL, '2014-09-01', '01:24:56', '1'),
(2, 'p540428375366e', 'testing purpose 2', '', '<p>test2</p>\r\n', NULL, '2014-09-01', '01:33:03', '1'),
(3, 'p540429fc44b4e', 'testing purpose 3', '', '<p>test 3</p>\r\n', NULL, '2014-09-01', '01:40:36', '1'),
(4, 'p540429fc5cbb8', 'test2', '', '', NULL, '2014-09-01', '01:40:36', '1'),
(5, 'p54043ec1d9c36', 'TESTING5', '', '<p>testing5</p>\r\n', NULL, '2014-09-01', '03:09:13', '1'),
(8, 'p540450aba1245', 'testing 8', '', '<p>test</p>\r\n', NULL, '2014-09-01', '04:25:39', '1'),
(9, 'p5406a98814e60', 'Help', '', '<p><strong>Lorem ipsum dolor</strong>&nbsp;consectetur&nbsp;<strong>sed do eiusmo&nbsp;</strong>incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.</p>\n', NULL, '2014-09-03', '11:09:20', '1'),
(10, 'p54086379eb61c', 'testing', '', '<p>sdf sdfrwer werfwec</p>\r\n', 'p54086379eb61c.jpg', '2014-09-04', '03:04:57', '1'),
(11, 'p541836a6dd1da', 'Company-History', 'Company History', '<p><strong>Lorem ipsum dolor</strong> consectetur <strong>sed do eiusmo </strong> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.</p>\r\n', 'p541836a6dd1da.png', '2014-09-16', '09:09:58', '1'),
(12, 'p54183ceaf255b', 'Culture', 'Culture', '<div class="col-sm-6" id="module"><a class="module-link" href="#"><img src="http://localhost/vyrazu/JMLM/images/banners/join-us-banner.jpg" title="Join Us" /> </a>\r\n<div class="module-content">\r\n<p><a class="module-link" href="#">JOIN OUR TEAM</a></p>\r\n\r\n<p><a class="module-link" href="#">Sign up as a distributor.<br />\r\nCreate an account to purchase products.<br />\r\nEnroll in our Rewards program. </a></p>\r\n\r\n<p><a class="module-link" href="#">Get Started Now</a></p>\r\n</div>\r\n<a class="module-link" href="#"><!-- opportunity products content --> </a></div>\r\n\r\n<div class="col-sm-6" id="module"><a class="module-link" href="#"><img src="http://localhost/vyrazu/JMLM/images/banners/join-us-banner.jpg" title="Join Us" /> </a>\r\n\r\n<div class="module-content">\r\n<p><a class="module-link" href="#">JOIN OUR TEAM</a></p>\r\n\r\n<p><a class="module-link" href="#">Sign up as a distributor.<br />\r\nCreate an account to purchase products.<br />\r\nEnroll in our Rewards program. </a></p>\r\n\r\n<p><a class="module-link" href="#">Get Started Now</a></p>\r\n</div>\r\n<a class="module-link" href="#"><!-- opportunity products content --> </a></div>\r\n\r\n<div class="col-sm-6" id="module"><a class="module-link" href="#"><img src="http://localhost/vyrazu/JMLM/images/banners/join-us-banner.jpg" title="Join Us" /> </a>\r\n\r\n<div class="module-content">\r\n<p><a class="module-link" href="#">JOIN OUR TEAM</a></p>\r\n\r\n<p><a class="module-link" href="#">Sign up as a distributor.<br />\r\nCreate an account to purchase products.<br />\r\nEnroll in our Rewards program. </a></p>\r\n\r\n<p><a class="module-link" href="#">Get Started Now</a></p>\r\n</div>\r\n<a class="module-link" href="#"><!-- opportunity products content --> </a></div>\r\n\r\n<div class="col-sm-6" id="module"><a class="module-link" href="#"><img src="http://localhost/vyrazu/JMLM/images/banners/join-us-banner.jpg" title="Join Us" /> </a>\r\n\r\n<div class="module-content">\r\n<p><a class="module-link" href="#">JOIN OUR TEAM</a></p>\r\n\r\n<p><a class="module-link" href="#">Sign up as a distributor.<br />\r\nCreate an account to purchase products.<br />\r\nEnroll in our Rewards program. </a></p>\r\n\r\n<p><a class="module-link" href="#">Get Started Now</a></p>\r\n</div>\r\n<a class="module-link" href="#"><!-- opportunity products content --> </a></div>\r\n\r\n<div class="col-sm-6" id="module"><a class="module-link" href="#"><img src="http://localhost/vyrazu/JMLM/images/banners/join-us-banner.jpg" title="Join Us" /> </a>\r\n\r\n<div class="module-content">\r\n<p><a class="module-link" href="#">JOIN OUR TEAM</a></p>\r\n\r\n<p><a class="module-link" href="#">Sign up as a distributor.<br />\r\nCreate an account to purchase products.<br />\r\nEnroll in our Rewards program. </a></p>\r\n\r\n<p><a class="module-link" href="#">Get Started Now</a></p>\r\n</div>\r\n<a class="module-link" href="#"><!-- opportunity products content --> </a></div>\r\n', 'p54183ceaf255b.jpg', '2014-09-16', '09:36:42', '1'),
(13, 'p54183fca07ee9', 'The-Future', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>\r\n\r\n<p><em>- Lorem ipsum dolor sit amet, consectetur adipisicing elit </em></p>\r\n\r\n<h2>THE FUTURE</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>\r\n', 'p54183fca07ee9.png', '2014-09-16', '09:48:58', '1'),
(22, 'p545dbe95f2987', 'lorem-ipsum', 'loremipsum', '<p>loremipsum</p>\r\n', '', '2014-11-08', '12:26:21', '1'),
(14, 'p541841628c586', 'Opportunity', '', '<div class="col-sm-6" id="module"><a class="module-link" href="#"><img src="http://localhost/vyrazu/JMLM/images/banners/join-us-banner.jpg" title="Join Us" /> </a>\r\n<div class="module-content">\r\n<p><a class="module-link" href="#">JOIN OUR TEAM</a></p>\r\n\r\n<p><a class="module-link" href="#">Sign up as a distributor.<br />\r\nCreate an account to purchase products.<br />\r\nEnroll in our Rewards program. </a></p>\r\n\r\n<p><a class="module-link" href="#">Get Started Now</a></p>\r\n</div>\r\n<a class="module-link" href="#"><!-- opportunity products content --> </a></div>\r\n\r\n<div class="col-sm-6" id="module"><a class="module-link" href="#"><img src="http://localhost/vyrazu/JMLM/images/banners/join-us-banner.jpg" title="Join Us" /> </a>\r\n\r\n<div class="module-content">\r\n<p><a class="module-link" href="#">JOIN OUR TEAM</a></p>\r\n\r\n<p><a class="module-link" href="#">Sign up as a distributor.<br />\r\nCreate an account to purchase products.<br />\r\nEnroll in our Rewards program. </a></p>\r\n\r\n<p><a class="module-link" href="#">Get Started Now</a></p>\r\n</div>\r\n<a class="module-link" href="#"><!-- opportunity products content --> </a></div>\r\n\r\n<div class="col-sm-6" id="module"><a class="module-link" href="#"><img src="http://localhost/vyrazu/JMLM/images/banners/join-us-banner.jpg" title="Join Us" /> </a>\r\n\r\n<div class="module-content">\r\n<p><a class="module-link" href="#">JOIN OUR TEAM</a></p>\r\n\r\n<p><a class="module-link" href="#">Sign up as a distributor.<br />\r\nCreate an account to purchase products.<br />\r\nEnroll in our Rewards program. </a></p>\r\n\r\n<p><a class="module-link" href="#">Get Started Now</a></p>\r\n</div>\r\n<a class="module-link" href="#"><!-- opportunity products content --> </a></div>\r\n\r\n<div class="col-sm-6" id="module"><a class="module-link" href="#"><img src="http://localhost/vyrazu/JMLM/images/banners/join-us-banner.jpg" title="Join Us" /> </a>\r\n\r\n<div class="module-content">\r\n<p><a class="module-link" href="#">JOIN OUR TEAM</a></p>\r\n\r\n<p><a class="module-link" href="#">Sign up as a distributor.<br />\r\nCreate an account to purchase products.<br />\r\nEnroll in our Rewards program. </a></p>\r\n\r\n<p><a class="module-link" href="#">Get Started Now</a></p>\r\n</div>\r\n<a class="module-link" href="#"><!-- opportunity products content --> </a></div>\r\n\r\n<div class="col-sm-6" id="module"><a class="module-link" href="#"><img src="http://localhost/vyrazu/JMLM/images/banners/join-us-banner.jpg" title="Join Us" /> </a>\r\n\r\n<div class="module-content">\r\n<p><a class="module-link" href="#">JOIN OUR TEAM</a></p>\r\n\r\n<p><a class="module-link" href="#">Sign up as a distributor.<br />\r\nCreate an account to purchase products.<br />\r\nEnroll in our Rewards program. </a></p>\r\n\r\n<p><a class="module-link" href="#">Get Started Now</a></p>\r\n</div>\r\n<a class="module-link" href="#"><!-- opportunity products content --> </a></div>\r\n', 'p541841628c586.jpg', '2014-09-16', '09:55:46', '1'),
(15, 'p54184a5d7dd30', 'Our-Team', '', '<div class="row-our-tm col-sm-12">\r\n<div class="content col-sm-6">\r\n<h4>Lorem Ipsum</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<h4>LOREM IPSUM</h4>\r\n</div>\r\n\r\n<div class="image col-sm-6"><img class="img-responsive" src="http://localhost/vyrazu/JMLM/images/team-1.png" /></div>\r\n</div>\r\n\r\n<div class="row-our-tm col-sm-12">\r\n<div class="content col-sm-6">\r\n<h4>Lorem Ipsum</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<h4>LOREM IPSUM</h4>\r\n</div>\r\n\r\n<div class="image col-sm-6"><img class="img-responsive" src="http://localhost/vyrazu/JMLM/images/team-1.png" /></div>\r\n</div>\r\n\r\n<div class="row-our-tm col-sm-12">\r\n<div class="content col-sm-6">\r\n<h4>Lorem Ipsum</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<h4>LOREM IPSUM</h4>\r\n</div>\r\n\r\n<div class="image col-sm-6"><img class="img-responsive" src="http://localhost/vyrazu/JMLM/images/team-1.png" /></div>\r\n</div>\r\n\r\n<div class="row-our-tm col-sm-12">\r\n<div class="content col-sm-6">\r\n<h4>Lorem Ipsum</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<h4>LOREM IPSUM</h4>\r\n</div>\r\n\r\n<div class="image col-sm-6"><img class="img-responsive" src="http://localhost/vyrazu/JMLM/images/team-1.png" /></div>\r\n</div>\r\n', '', '2014-09-16', '10:34:05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mypage_links`
--

CREATE TABLE IF NOT EXISTS `mypage_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `top_links` varchar(255) NOT NULL,
  `navbar_links` varchar(255) NOT NULL,
  `footer_links` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mypage_links`
--

INSERT INTO `mypage_links` (`id`, `name`, `page_link`, `top_links`, `navbar_links`, `footer_links`, `status`) VALUES
(1, 'Company History', 'myPage/Company-History', '1', '0', '1', '1'),
(2, 'Culture', 'myPage/Culture', '1', '1', '1', '1'),
(3, 'Future', 'myPage/The-Future', '1', '0', '1', '1'),
(4, 'Oppurtunity', 'myPage/Opportunity', '1', '1', '1', '1'),
(5, 'People', 'myPage/Our-Team', '1', '1', '1', '1'),
(6, 'Products', 'products/', '1', '1', '1', '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`id`, `order_id`, `user_id`, `shipping_charge`, `payment_method`, `total_amount`, `total_quantity`, `date`, `ip`, `order_status`, `checkout_process`, `notes`) VALUES
(1, 'order53c4ca2b57a41', 'user53bd43c5325d5', '10', 'online', '1670', 5, '2014-07-15 08:07:19', '::1', 'Processing', 1, NULL),
(3, 'order53c4fafe0611c', 'user53bd43c5325d5', '10', 'bank', '3700', 6, '2014-07-15 03:07:36', '::1', 'Completed', 1, 'Its for checking purpose'),
(4, 'order53ce233843408', 'Guest', '10', 'cod', '43', 1, '2014-07-22 10:07:53', '::1', 'Processing', 1, NULL),
(5, 'order53cf647dd082c', 'Guest', '10', 'cod', '3010', 10, '2014-07-23 09:07:46', '::1', 'Processing', 1, NULL),
(6, 'order53da538d44a73', 'user53da00743ca87', '10', 'online', '2938', 5, '2014-07-31 04:07:53', '::1', 'Completed', 1, 'Its for checking purpose...'),
(7, 'order540418d9a54a4', 'user53bd43c5325d5', '10', 'bank', '674', 2, '2014-09-01 08:09:35', '::1', 'Processing', 1, NULL),
(8, 'order54072382aad2d', 'user53bd43c5325d5', '10', 'online', '1806', 2, '2014-09-03 04:09:06', '::1', 'Completed', 1, NULL),
(9, 'order540aecbf38565', 'user53bd43c5325d5', '10', 'bank', '810', 2, '2014-09-06 01:09:27', '::1', 'Completed', 1, NULL),
(10, 'order5417f864eda3a', 'user53bd43c5325d5', '10', 'bank', '410', 1, '2014-09-16 04:09:28', '116.12.133.74', 'Completed', 1, NULL),
(11, 'order5417fba1119e5', 'user53bd43c5325d5', '10', 'cod', '88', 1, '2014-09-16 04:09:18', '116.12.133.74', 'Processing', 1, NULL),
(12, 'order5419d8b5a662b', 'user53bd43c5325d5', '10', 'online', '3819', 11, '2014-09-18 02:09:07', '116.12.133.74', 'Processing', 1, NULL),
(19, 'order541bcc2864111', 'user53bd43c5325d5', '10', 'online', '41', 1, '2014-09-19 02:09:16', '116.12.133.74', 'Processed', 1, NULL),
(14, 'order541aca8e8f416', 'Guest', '10', 'cod', '76', 2, '2014-09-18 08:09:36', '116.12.133.74', 'Processing', 1, NULL),
(18, 'order541afbe153666', 'Guest', '10', 'bank', '43', 1, '2014-09-18 11:09:07', '116.12.133.74', 'Processing', 1, NULL),
(17, 'order541aea13cca72', 'user541ace29d345d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(20, 'order541bf1dcc775a', 'Guest', '10', 'cod', '1010', 2, '2014-09-19 05:09:07', '116.12.133.74', 'Completed', 1, NULL),
(21, 'order541c0c3ca5610', 'user541bf8dd5a260', '10', 'cod', '230', 2, '2014-09-19 07:09:57', '116.12.133.74', 'Completed', 1, NULL),
(22, 'order541c172571d80', 'user53bd43c5325d5', '10', 'bank', '342', 1, '2014-09-19 07:09:44', '116.12.133.74', 'Processing', 1, NULL),
(23, 'order541c215b3179d', 'user53bd43c5325d5', '10', 'bank', '908', 1, '2014-09-19 08:09:18', '116.12.133.74', 'Processing', 1, NULL),
(24, 'order541c24bee490d', 'user541c228723955', '10', 'bank', '342', 1, '2014-09-19 11:09:53', '116.12.133.74', 'Completed', 1, NULL),
(25, 'order541d910c762d7', 'user53bd43c5325d5', '10', 'bank', '342', 1, '2014-09-20 10:09:07', '116.12.133.74', 'Completed', 1, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

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
(12, 'order53da538d44a73', 'dipanjan', 'bcda', 'aaadfsaf', 'sdfsdfsa', 'abcd@gmail.com', '345', '700060', 'Kolkata', 'West Bengal', 'India', 'Shipping'),
(13, 'order540418d9a54a4', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(14, 'order540418d9a54a4', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(15, 'order54072382aad2d', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(16, 'order54072382aad2d', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(17, 'order540aecbf38565', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(18, 'order540aecbf38565', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(19, 'order5417f864eda3a', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(20, 'order5417f864eda3a', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(21, 'order5417fba1119e5', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(22, 'order5417fba1119e5', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(23, 'order5419d8b5a662b', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(24, 'order5419d8b5a662b', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(25, 'order5419d909b8adb', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(26, 'order5419d909b8adb', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(27, 'order541aca8e8f416', 'Riju', 'Bagchi', 'Sheoraphuli', 'Hooghly', 'vrijudas@gmail.com', '324234', '700060', 'Kolkata', 'West Bengal', 'India', 'Billing'),
(28, 'order541aca8e8f416', 'Riju', 'Bagchi', 'Sheoraphuli', 'Hooghly', 'vrijudas@gmail.com', '324234', '700060', 'Kolkata', 'West Bengal', 'India', 'Shipping'),
(29, 'order541aea13cca72', 'Riju', 'Das', 'Sheoraphuly', 'Hooghly', 'vrijudas@gmail.com', '324234', 'Kolkata', '712223', 'West Bengal', 'India', 'Billing'),
(30, 'order541aea13cca72', 'Riju', 'Das', 'Sheoraphuly', 'Hooghly', 'vrijudas@gmail.com', '32423', 'Kolkata', '712223', 'West Bengal', 'India', 'Shipping'),
(31, 'order541aea13cca72', 'Riju', 'Das', 'Sheoraphuly', 'Hooghly', 'vrijudas@gmail.com', '32423', 'Kolkata', '712223', 'West Bengal', 'India', 'Billing'),
(32, 'order541aea13cca72', 'Riju', 'Das', 'Sheoraphuly', 'Hooghly', 'vrijudas@gmail.com', '32423', 'Kolkata', '712223', 'West Bengal', 'India', 'Billing'),
(33, 'order541afbe153666', 'Debojyoti', 'Chowdhury', '1', '1', 'vdebojyoti@gmail.com', '1', '1', '1', '1', '1', 'Billing'),
(34, 'order541afbe153666', 'Debojyoti', 'Chowdhury', '1', '1', 'vdebojyoti@gmail.com', '1', '1', '1', '1', '1', 'Shipping'),
(35, 'order541bcc2864111', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(36, 'order541bcc2864111', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(37, 'order541bf1dcc775a', 'Akash', 'Sinha', 'Sheoraphuly', 'Hooghly', 'vrijudas@gmail.com', '6254422', '700115', 'Ljubljana', 'West Bengal', 'India', 'Billing'),
(38, 'order541bf1dcc775a', 'Akash', 'Sinha', 'Sheoraphuly', 'Hooghly', 'vrijudas@gmail.com', '6254422', '700115', 'Ljubljana', 'West Bengal', 'India', 'Shipping'),
(39, 'order541c0c3ca5610', 'Vriju', 'Das', 'Dumdum', 'Kolkata', 'rijudas.2011@rediffmail.com', '32423', 'Kolkata', '700013', 'West Bengal', 'India', 'Billing'),
(40, 'order541c0c3ca5610', 'Vriju', 'Das', 'Dumdum', 'Kolkata', 'rijudas.2011@rediffmail.com', '32423', 'Kolkata', '700013', 'West Bengal', 'India', 'Shipping'),
(41, 'order541c172571d80', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(42, 'order541c172571d80', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(43, 'order541c215b3179d', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(44, 'order541c215b3179d', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping'),
(45, 'order541c24bee490d', 'debo', 'chow', 'addr1', 'addr2', 'vdebojyoti@gmail.com', '11111111111', 'kolkata', 'kolkata', 'wb', 'India', 'Billing'),
(46, 'order541c24bee490d', 'debo', 'chow', 'addr1', 'addr2', 'vdebojyoti@gmail.com', '11111111111', 'kolkata', 'kolkata', 'wb', 'India', 'Shipping'),
(47, 'order541d910c762d7', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Billing'),
(48, 'order541d910c762d7', 'Dipanjan', 'Bagchi', 'aaadfsaf', 'sdfsdfsa', 'vdipanjan@gmail.com', '1234565', '700115', 'Kolkata', 'WB', 'India', 'Shipping');

-- --------------------------------------------------------

--
-- Table structure for table `pool_sharing_info`
--

CREATE TABLE IF NOT EXISTS `pool_sharing_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specification` varchar(200) NOT NULL,
  `system_pv` varchar(100) NOT NULL,
  `distributed_pv` varchar(100) DEFAULT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `distributed_date` datetime NOT NULL,
  `next_date` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pool_sharing_info`
--

INSERT INTO `pool_sharing_info` (`id`, `specification`, `system_pv`, `distributed_pv`, `date_from`, `date_to`, `distributed_date`, `next_date`, `status`) VALUES
(1, 'trans54539a6b2b74d', '1135', '0', '0000-00-00 00:00:00', '2014-10-31 07:10:23', '2014-10-31 07:10:23', '2014-11-30 07:11:23', '1');

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
  `image` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `active` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`categoryId`, `name`, `parentId`, `childId`, `level`, `image`, `date`, `active`, `status`) VALUES
(1, 'S Natural', '', NULL, '1', 'images/category/cat541ff6a794ee4.jpg', '2014-09-22 10:34:36', '1', '1'),
(2, 'White Bird Nest', '', NULL, '1', 'images/category/cat541ffca1d4376.jpg', '2014-07-01 09:50:36', '1', '1'),
(3, 'Red Bird Nest', '', '14', '1', 'images/category/cat541ffcb948ae4.jpg', '2014-07-01 09:50:36', '1', '1'),
(4, 'Pigeon', '', '18', '1', 'images/category/cat541ffcc60d60c.jpg', '2014-07-01 09:50:36', '1', '1'),
(5, 'Owl', '', '20', '1', 'images/category/cat541ffcd868901.jpg', '2014-07-01 09:50:36', '0', '1'),
(6, 'Kite', '', '22', '1', 'images/category/cat541ffce535630.jpg', '2014-07-01 09:50:36', '0', '1'),
(7, 'Kinglet', '', '24', '1', 'images/category/cat541ffcfa1b4a3.jpg', '2014-07-01 09:50:36', '0', '1'),
(14, 'Jackdaw', '3', NULL, '2', NULL, '2014-07-01 09:55:04', '0', '1'),
(18, 'Red-breasted', '4', NULL, '2', NULL, '2014-07-01 09:56:29', '0', '1'),
(20, 'Eastern', '5', NULL, '2', NULL, '2014-07-01 09:57:28', '0', '1'),
(22, 'California', '6', NULL, '2', NULL, '2014-07-01 09:57:56', '0', '1'),
(24, 'Montezuma', '7', NULL, '2', NULL, '2014-07-01 09:58:23', '0', '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `img_order`) VALUES
(1, 'pro53b13cba9cc8f', 's-lion-king_mini1.jpg', 1),
(2, 'pro53b13cba9cc8f', 'Hydrangeas.jpg', 3),
(3, 'pro53b13cba9cc8f', 'Jellyfish.jpg', 4),
(4, 'pro53b13cba9cc8f', 'Tulips.jpg', 2),
(5, 'pro53b13cba9cc8f', 'Koala.jpg', 5),
(6, 'pro53b2b40797daa', 'hi-detox-mini1.jpg', 1),
(7, 'pro53b2b40797daa', 'George8.jpg', 2),
(8, 'pro53b2b40797daa', '5843303770_8dfe298056_b.jpg', 3),
(9, 'pro53b2b40797daa', '2721908272_3efb9d224d_b.jpg', 5),
(10, 'pro53b2b40797daa', '9965420034_1b7450e257_b.jpg', 4),
(11, 'pro53b7aca05a35a', 'flying-birds-669-2.jpg', 1),
(12, 'pro541bf69ccdc7a', 'flying-birds-669-2.jpg', 1),
(13, 'pro541bf65dd5414', 'flying-birds-669-2.jpg', 1),
(14, 'pro53b13f6c4adce', 's-lion-juice_mini1.jpg', 1),
(15, 'pro53b2b35a7a564', 's-for-men_mini1.jpg', 1),
(16, 'pro53b2b3c82c476', 's-for-women_mini1.jpg', 1),
(17, 'pro53b7a48b16406', '300g-white-birdnest.jpg', 1),
(18, 'pro53b7a4c596059', '500g-white-birdnest.jpg', 1),
(19, 'pro53b7a6b7d9c55', '700g-white-birdnest.jpg', 1),
(20, 'pro53b7a744d2f34', '6-bottle-birdnest.jpg', 1),
(21, 'pro53b7a96e40231', '300g-red-birdnest.jpg', 1),
(22, 'pro53b7a9c756609', '500g-red-birdnest.jpg', 1),
(23, 'pro53b7ab7800ddb', '700g-red-birdnest.jpg', 1),
(24, 'pro5453950ce9a78', 'productPenguins.jpg', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `product_id`, `category`, `name`, `short_description`, `description`, `old_price`, `guest_price`, `member_price`, `special_price`, `point_value`, `stock`, `remaining_stock`, `exp_date`, `maxpick`, `date`, `status`) VALUES
(1, 'pro53b13cba9cc8f', 5, 'S Lion King', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '87', '100', '898', '66', '300', 222, 210, '2015-01-08 00:00:00', 4, '2014-06-30 12:32:26', '1'),
(2, 'pro53b13f6c4adce', 1, 'S Lion Juice', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<div><span style="background-color:rgb(250, 250, 250); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>\r\n', '12', '33', '332', '66', '40', 200, 185, '2014-12-27 00:00:00', 8, '2014-06-30 12:43:56', '1'),
(3, 'pro53b2b35a7a564', 1, 'S for Men', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<div><span style="background-color:rgb(250, 250, 250); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></div>\r\n', '87', '33', '787', '2323', '45', 5454, 5454, '2015-03-28 00:00:00', 5, '2014-07-01 03:10:50', '1'),
(4, 'pro53b2b3c82c476', 1, 'S for Women', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p><strong><span style="background-color:rgb(250, 250, 250); color:rgb(55, 55, 55); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></strong></p>\r\n', '120', '788', '332', '660', '74', 230, 227, '2015-05-26 00:00:00', 4, '2014-07-01 03:12:40', '1'),
(5, 'pro53b2b40797daa', 1, 'Hi Fiber Detox Drink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p><em><span style="background-color:rgb(250, 250, 250); color:rgb(55, 55, 55); font-family:helvetica neue,helvetica,arial,sans-serif; font-size:17px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></em></p>\r\n', '87', '33', '31', '66', '10', 222, 215, '2014-11-28 00:00:00', 7, '2014-07-01 03:13:43', '1'),
(6, 'pro53b7a48b16406', 2, '300g White Bird Nest', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '85', '99', '78', '66', '78', 5454, 5453, '2014-10-21 00:00:00', 7, '2014-07-05 09:08:59', '1'),
(7, 'pro53b7a4c596059', 2, '500g White Bird Nest', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '85', '33', '78', '66', '35', 48, 48, '2014-12-31 00:00:00', 4, '2014-07-05 09:09:57', '1'),
(8, 'pro53b7a6b7d9c55', 2, '700g White Bird Nest', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '12', '33', '31', '11', '32', 745, 741, '2014-10-21 00:00:00', 2, '2014-07-05 09:18:15', '1'),
(9, 'pro53b7a744d2f34', 2, '6 Bottled White Bird Nest', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '125', '55', '898', '66', '200', 156, 156, '2014-11-14 00:00:00', 2, '2014-07-05 09:20:36', '1'),
(10, 'pro53b7a7a3e5db2', 0, 'Sparrow Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '85', '33', '31', '11', '450', 5454, 5454, '2014-09-03 00:00:00', 8, '2014-07-05 09:22:11', '0'),
(11, 'pro53b7a96e40231', 3, '300g Red Bird Nest', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>&nbsp;</p>\r\n\r\n<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n\r\n<p>&nbsp;</p>\r\n', '12', '33', '96', '66', '120', 55, 54, '2014-11-13 00:00:00', 5, '2014-07-05 09:29:50', '1'),
(12, 'pro53b7a9c756609', 3, '500g Red Bird Nest', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '444', '232', '121', '111', '44', 564, 564, '2014-10-29 00:00:00', 4, '2014-07-05 09:31:19', '1'),
(13, 'pro53b7ab7800ddb', 3, '700g Red Bird Nest', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '87', '33', '31', '66', '62', 564, 564, '2015-05-22 00:00:00', 7, '2014-07-05 09:38:32', '1'),
(14, 'pro53b7abb72e6d1', 3, 'Eagle Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '85', '33', '31', '11', '37', 5454, 5454, '2015-01-09 00:00:00', 5, '2014-07-05 09:39:35', '0'),
(15, 'pro53b7abff792a9', 0, 'Eagle Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '87', '33', '15', '66', '40', 222, 222, '2014-12-05 00:00:00', 7, '2014-07-05 09:40:47', '0'),
(16, 'pro53b7aca05a35a', 16, 'Pigeon Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '600', '500', '400', '300', '55', 564, 557, '2014-10-11 00:00:00', 5, '2014-07-05 09:43:28', '0'),
(17, 'pro53b7acd78093d', 4, 'Pigeon Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '450', '350', '200', '250', '62', 570, 570, '2014-12-19 00:00:00', 4, '2014-07-05 09:44:23', '0'),
(18, 'pro53b7ad897bfb9', 18, 'Pigeon Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '850', '620', '430', '220', '150', 3423, 3423, '2015-04-30 00:00:00', 8, '2014-07-05 09:47:21', '0'),
(19, 'pro53b7ae560ec74', 17, 'Pigeon Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '875', '554', '366', '456', '300', 3423, 3423, '2014-12-26 00:00:00', 5, '2014-07-05 09:50:46', '0'),
(20, 'pro53b7aeabc714d', 4, 'Pigeon Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '858', '774', '665', '555', '95', 6566, 6566, '2014-10-24 00:00:00', 7, '2014-07-05 09:52:11', '0'),
(21, 'pro53b7af554d2e4', 5, 'Owl Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '858', '766', '533', '228', '85', 669, 666, '2014-11-13 00:00:00', 8, '2014-07-05 09:55:01', '0'),
(22, 'pro53b7af97db77d', 14, 'Owl Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '121', '101', '94', '66', '30', 564, 562, '2014-11-21 00:00:00', 5, '2014-07-05 09:56:07', '0'),
(23, 'pro53b7b037d46ca', 20, 'Owl Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '466', '355', '844', '422', '88', 366, 366, '2014-11-21 00:00:00', 4, '2014-07-05 09:58:47', '0'),
(24, 'pro53b7b07976dbb', 21, 'Owl Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '85', '33', '787', '22', '70', 156, 156, '2014-10-25 00:00:00', 7, '2014-07-05 09:59:53', '0'),
(25, 'pro53b7b0f88e5c9', 5, 'Owl Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p>lorem Ipsum : Lorem ipsum<br />\r\nlorem ipsum : loremm ipsum lorem 2525 lorem.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<h4>Lorem ipsum dolor sit amet</h4>\r\n\r\n<p>Lorem ipsum dolor: Lorem ips sit.<br />\r\nLorem ipsum dolor: Lorem ips.<br />\r\nLorem ipsum dolor: Lorem ipsum<br />\r\nLorem ipsum dolor: Lorem ipsum dolor</p>\r\n', '87', '100', '78', '22', '100', 549, 544, '2014-11-28 00:00:00', 5, '2014-07-05 10:02:00', '0'),
(26, 'pro541bf65dd5414', 29, 'Knightangle', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod ', '<p>Lorem tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '90', '120', '110', '100', '110', 1000, 998, '2014-12-25 00:00:00', 5, '2014-09-19 05:24:45', '0'),
(28, 'pro54539406cbee0', 24, 'test1', 'Short Description', '<p>lorem</p>\r\n', 'Old Price', 'Guest Price', 'Member Price', 'Special Price', 'Point Value', 0, 0, '2014-10-31 00:00:00', 0, '2014-10-31 07:22:06', '0'),
(29, 'pro5453950ce9a78', 1, 'test2', 'test2', '<p>test2</p>\r\n', '20', '80', '100', '10', '10', 100, 100, '2014-11-27 00:00:00', 7, '2014-10-31 07:26:28', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

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
(11, 'order53da538d44a73', 'pro53b13cba9cc8f', 2, 'color:red,size:14 inch', '1796'),
(12, 'order540418d9a54a4', 'pro53b13f6c4adce', 2, 'color:orange,size:55', '664'),
(13, 'order54072382aad2d', 'pro53b13cba9cc8f', 2, 'color:red,size:14 inch', '1796'),
(14, 'order540aecbf38565', 'pro53b7aca05a35a', 2, '', '800'),
(15, 'order5417f864eda3a', 'pro53b7aca05a35a', 1, '', '400'),
(16, 'order5417fba1119e5', 'pro53b7a48b16406', 1, 'color:purple,size:1mt', '78'),
(17, 'order5419d8b5a662b', 'pro53b13cba9cc8f', 2, 'color:blue,size:14 inch', '1796'),
(18, 'order5419d8b5a662b', 'pro53b13cba9cc8f', 2, 'color:blue,size:14 inch', '1796'),
(19, 'order5419d8b5a662b', 'pro53b2b40797daa', 7, 'size:20 cm', '217'),
(20, 'order541aca8e8f416', 'pro53b13f6c4adce', 2, 'color:white,size:55', '66'),
(21, 'order541afbe153666', 'pro53b13f6c4adce', 1, 'color:white,size:55', '33'),
(22, 'order541bcc2864111', 'pro53b7a6b7d9c55', 1, 'color:blue,size:33 cm', '31'),
(23, 'order541bcc2864111', 'pro53b7a6b7d9c55', 1, 'color:blue,size:33 cm', '31'),
(24, 'order541bcc2864111', 'pro53b7a6b7d9c55', 1, 'color:blue,size:33 cm', '31'),
(25, 'order541bcc2864111', 'pro53b7a6b7d9c55', 1, 'color:blue,size:33 cm', '31'),
(26, 'order541bf1dcc775a', 'pro53b7aca05a35a', 2, '', '1000'),
(27, 'order541c0c3ca5610', 'pro541bf65dd5414', 2, '', '220'),
(28, 'order541c172571d80', 'pro53b13f6c4adce', 1, 'color:white,size:55', '332'),
(29, 'order541c215b3179d', 'pro53b13cba9cc8f', 1, 'color:red,size:14 inch', '898'),
(30, 'order541c24bee490d', 'pro53b13f6c4adce', 1, 'color:white,size:55', '332'),
(31, 'order541d910c762d7', 'pro53b13f6c4adce', 1, 'color:white,size:55', '332'),
(32, 'order541d910c762d7', 'pro53b13f6c4adce', 1, 'color:white,size:55', '332');

-- --------------------------------------------------------

--
-- Table structure for table `product_review_info`
--

CREATE TABLE IF NOT EXISTS `product_review_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `review` varchar(10000) DEFAULT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `product_review_info`
--

INSERT INTO `product_review_info` (`id`, `product_id`, `user_id`, `review`, `date`, `status`) VALUES
(1, 'pro53b13f6c4adce', 'user541c228723955', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', '2014-09-20 10:25:15', '1'),
(2, 'pro53b13f6c4adce', 'user53bd43c5325d5', 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem ', '2014-12-20 12:24:57', '1'),
(4, 'pro53b7aca05a35a', 'user53bd43c5325d5', '', '2014-09-22 04:44:55', '1'),
(5, 'pro53b13cba9cc8f', 'user53bd43c5325d5', '', '2014-10-31 04:45:34', '1'),
(6, 'pro53b13cba9cc8f', 'user53bd43c5325d5', 'bcvb', '2014-10-31 04:47:51', '1'),
(7, 'pro53b13cba9cc8f', 'user53bd43c5325d5', 'sf', '2014-10-31 04:49:40', '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `system_money_info`
--

INSERT INTO `system_money_info` (`id`, `specification`, `credit`, `debit`, `system_balance`, `notes`) VALUES
(1, 'order53da538d44a73', '2938', NULL, '2938', NULL),
(2, 'trans53e9f5f9064e1', NULL, '48', '2890', NULL),
(3, 'trans53e9f5f967b90', NULL, '16', '2874', NULL),
(4, 'trans53e9f5fa1286d', NULL, '19.92', '2854.08', NULL),
(5, 'trans53e9f5fa9b025', NULL, '107.76', '2746.32', NULL),
(6, 'order53c4fafe0611c', '3700', NULL, '6446.32', NULL),
(7, 'trans5409ae13eea7a', NULL, '53.88', '6392.44', NULL),
(8, 'trans5409ae1451ad7', NULL, '39.84', '6352.6', NULL),
(9, 'order540aecbf38565', '810', NULL, '7162.600000', NULL),
(10, 'trans5417f9110ee0d', NULL, '32', '7130.600000', NULL),
(11, 'order54072382aad2d', '1806', NULL, '8936.600000', NULL),
(12, 'trans54182ee704eac', NULL, '71.840000', '8864.760000', NULL),
(13, 'order54072382aad2d', '1806', NULL, '10670.760000', NULL),
(14, 'trans54182ffe1de28', NULL, '71.840000', '10598.920000', NULL),
(15, 'order5417f864eda3a', '410', NULL, '11008.920000', NULL),
(16, 'trans5418301e74530', NULL, '24', '10984.920000', NULL),
(17, 'mem_order541ace65732a3', '20', NULL, '11004.920000', NULL),
(18, 'trans541acef71f840', NULL, '1.800000', '11003.120000', NULL),
(19, 'mem_order541bfa3d31111', '20', NULL, '11023.120000', NULL),
(20, 'order541c0c3ca5610', '230', NULL, '11253.120000', NULL),
(21, 'order541c0c3ca5610', '230', NULL, '11483.120000', NULL),
(22, 'mem_order541c229c34bb0', '20', NULL, '11503.120000', NULL),
(23, 'order541c24bee490d', '342', NULL, '11845.120000', NULL),
(24, 'order541d910c762d7', '342', NULL, '12187.12', NULL),
(25, 'trans54539e8cbaa15', NULL, '19.92', '12167.2', NULL),
(26, 'trans54539e8cc3cda', NULL, '19.92', '12147.28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_pv_info`
--

CREATE TABLE IF NOT EXISTS `system_pv_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specification` varchar(1000) NOT NULL,
  `credit` varchar(100) DEFAULT NULL,
  `debit` varchar(100) DEFAULT NULL,
  `system_pv_balance` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `notes` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `system_pv_info`
--

INSERT INTO `system_pv_info` (`id`, `specification`, `credit`, `debit`, `system_pv_balance`, `date`, `notes`) VALUES
(1, 'trans54182ffe3c63a', '600', NULL, '600', '2014-09-16 08:09:34', NULL),
(2, 'trans5418301e80327', '55', NULL, '655', '2014-09-16 08:09:06', NULL),
(3, 'trans541c0e4ea6999', '220', NULL, '875', '2014-09-19 07:09:54', NULL),
(4, 'trans541c14793b78e', '220', NULL, '1095', '2014-09-19 07:09:13', NULL),
(5, 'trans541c480706a57', '40', NULL, '1135', '2014-09-19 11:09:11', NULL),
(6, 'trans54539a6b2b74d', NULL, '0', '1135', '2014-10-31 07:10:23', NULL),
(7, 'trans54539e8cc17be', '40', NULL, '1175', '2014-10-31 08:10:00', NULL),
(8, 'trans54539e8cc5ed2', '40', NULL, '1215', '2014-10-31 08:10:00', NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_bank_info`
--

INSERT INTO `user_bank_info` (`id`, `user_id`, `ac_holder_name`, `ac_number`, `bank_name`, `branch_name`, `ifsc_code`, `tax_number`) VALUES
(1, 'user541bf8dd5a260', 'Vriju Das', '6548745', 'United Bank Of India', 'sheoraphuli', 'i12541', 'df548'),
(2, 'user53bd43c5325d5', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `f_name`, `l_name`, `gender`, `dob`, `addr_1`, `addr_2`, `city`, `state`, `country`, `postal_code`, `phone`, `company`, `username`, `email_id`, `password`, `email_verification`, `membership_activation`, `member_level`, `status`) VALUES
(1, 'user53bd43c5325d5', 'Dipanjan', 'Bagchi', 'male', '1992-07-06', 'aaadfsaf', 'sdfsdfsa', 'Kolkata', 'WB', 'India', '700115', '1234565', '', 'Dipa0904', 'vdipanjan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '3', '1'),
(2, 'user53d8abab1de6c', 'abcd', 'abcd', 'male', '1996-02-06', 'aaadfsaf', 'sdfsdfsa', 'Ljubljana', 'WB', 'India', '700060', '324234', 'vvvv', 'dipa_test', 'dipanjan.bagchi91@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '1', '1'),
(3, 'user53d8ac70513d3', 'abcd', 'bcda', 'male', '1995-02-06', 'aaadfsaf', 'sdfsdfsa', 'sdsa', 'West Bengal', 'India', '700114', '54545454', '', 'abcd', 'abcd@abc.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '1', '1'),
(4, 'user53da00743ca87', 'dipanjan', 'bcda', 'male', '2001-03-11', 'aaadfsaf', 'sdfsdfsa', 'Kolkata', 'West Bengal', 'India', '700060', '345', 'vvvv', 'rrrrr', 'abcd@gmail.com', 'bb69529928fffc8616d94e32f400ca6f', '1', '1', '1', '1'),
(5, 'user53da010780637', 'abcd', 'bcda', 'male', '2014-07-01', 'aaadfsaf', 'sdfsdfsa', 'Ljubljana', 'WB', 'India', '1000', '23423', '', 'test2', 'aaaa@ffff.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '0', '1'),
(6, 'user541ace29d345d', 'Riju', 'Das', 'male', '1990-02-28', 'Sheoraphuly', 'Hooghly', '712223', 'West Bengal', 'India', 'Kolkata', '32423', 'XYZ', 'Riju Das', 'vrijudas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '0', '1'),
(7, 'user541bf8dd5a260', 'Vriju', 'Das', 'male', '1992-02-29', 'Dumdum', 'Kolkata', '700013', 'West Bengal', 'India', 'Kolkata', '32423', 'vvvvm', 'Vriju', 'rijudas.2011@rediffmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '0', '1'),
(8, 'user541c228723955', 'debo', 'chow', 'male', '1997-09-03', 'addr1', 'addr2', 'kolkata', 'wb', 'India', 'kolkata', '11111111111', '11111111', 'debo', 'vdebojyoti@gmail.com', '084802c7cf083838d88c6343ebf64406', '1', '1', '0', '1'),
(9, 'user54533bc3ee5c3', 'lorem', 'lorem', 'male', '2014-10-08', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'f0124af82c1e6300811d98d6734002db', '0', '0', '0', '1'),
(10, 'user545359677a9d4', 'lorem', 'lorem', 'male', '2014-10-09', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'f0124af82c1e6300811d98d6734002db', '0', '0', '0', '1'),
(11, 'user54535a7fad5f0', 'ipsum', 'ipsum', 'male', '2014-10-09', 'ipsum', 'ipsum', 'ipsum', 'ipsumipsum', 'ipsum', 'ipsum', 'ipsum', 'ipsum', 'ipsum', 'ipsum', 'f3cf86c2478e3327e8360283405280d2', '0', '0', '0', '1'),
(12, 'user545372e821778', 'lorem', 'lorem', 'male', '2014-10-17', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'f0124af82c1e6300811d98d6734002db', '0', '0', '0', '1'),
(13, 'user5453742dbb87e', 'lorem', 'lorem', 'male', '2014-10-16', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'f0124af82c1e6300811d98d6734002db', '0', '0', '0', '1'),
(14, 'user545375298ac9f', 'lorem', 'lorem', 'male', '2014-10-18', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'f0124af82c1e6300811d98d6734002db', '0', '0', '0', '1'),
(15, 'user545375eed86de', 'lorem', 'lorem', 'male', '2014-10-16', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'lorem', 'f0124af82c1e6300811d98d6734002db', '0', '0', '0', '1'),
(16, 'user5454d7961c097', 'ipsum', 'ipsum', 'male', '2014-11-01', 'ipsum', 'ipsum', 'ipsum', 'ipsum', 'India', 'kolkata', 'ipsum', 'ipsum', 'ipsum', 'ipsum', 'f3cf86c2478e3327e8360283405280d2', '0', '0', '0', '1'),
(17, 'user54800f0e25558', 'lorem2', 'lorem2', 'male', '2014-12-02', 'lorem2', 'lorem2', 'lorem2', 'lorem2', 'lorem2', '123456', '123456', 'lorem2', 'lorem2', 'lorem2@gmail.com', '0021e4e5c8ea24b95eb9f222027d96d1', '0', '0', '0', '1'),
(18, 'user54800f57999c8', 'lorem3', 'lorem3', 'male', '2014-12-01', 'lorem3', 'lorem3', 'lorem3', 'lorem3', 'lorem3', '12345678', '12345678', 'lorem3', 'lorem3', 'lorem3@gmail.com', '499055d726655a1fd3a23f6006ae79dc', '0', '0', '0', '1'),
(19, 'user548147b801a99', 'lorem5', 'lorem5', 'male', '2014-12-03', 'lorem5', 'lorem5', 'lorem5', 'lorem5', 'lorem5', '12345678', '12345678', 'lorem5', 'lorem5', 'lorem5@gmail.com', '6392e770e52cd9e17dd9481fc76b2d1b', '0', '0', '0', '1'),
(20, 'user549126f68a21e', 'loremtesting', 'loremtesting', 'male', '2014-12-10', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting@loremtesting.com', '084802c7cf083838d88c6343ebf64406', '1', '1', '0', '1'),
(21, 'user5492aa0dcec61', 'loremtesting', 'loremtesting', 'male', '2014-12-09', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtesting', 'loremtestingloremtesting', 'loremtesting', '084802c7cf083838d88c6343ebf64406', '0', '0', '0', '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user_mlm_info`
--

INSERT INTO `user_mlm_info` (`id`, `user_id`, `parent_id`, `child_id`, `member_level`, `status`) VALUES
(1, 'user53bd43c5325d5', NULL, '2,6,17', 3, '1'),
(2, 'user53d8abab1de6c', '1', '3,5', 1, '1'),
(3, 'user53d8ac70513d3', '2', '4', 1, '1'),
(4, 'user53da00743ca87', '3', NULL, 1, '1'),
(5, 'user53da010780637', '2', NULL, 0, '1'),
(6, 'user541ace29d345d', '1', NULL, 0, '1'),
(7, 'user541bf8dd5a260', NULL, NULL, 0, '1'),
(8, 'user541c228723955', NULL, NULL, 0, '1'),
(9, 'user54533bc3ee5c3', NULL, NULL, 0, '1'),
(10, 'user545359677a9d4', NULL, NULL, 0, '1'),
(11, 'user54535a7fad5f0', NULL, NULL, 0, '1'),
(12, 'user545372e821778', NULL, NULL, 0, '1'),
(13, 'user5453742dbb87e', NULL, NULL, 0, '1'),
(14, 'user545375298ac9f', NULL, '19', 0, '1'),
(15, 'user545375eed86de', NULL, NULL, 0, '1'),
(16, 'user5454d7961c097', NULL, NULL, 0, '1'),
(17, 'user54800f0e25558', '1', '18,20', 0, '1'),
(18, 'user54800f57999c8', '17', NULL, 0, '1'),
(19, 'user548147b801a99', '14', NULL, 0, '1'),
(20, 'user549126f68a21e', '17', NULL, 0, '1'),
(21, 'user5492aa0dcec61', NULL, NULL, 0, '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(11, 'user53bd43c5325d5', 'withdraw53ea0c6b6a145', NULL, '35.74', '22.82', NULL),
(12, 'user53bd43c5325d5', 'trans5409ae13eea7a', '53.88', NULL, '76.7', NULL),
(13, 'user53bd43c5325d5', 'trans5409ae1451ad7', '39.84', NULL, '116.54', NULL),
(14, 'user53bd43c5325d5', 'trans5417f9110ee0d', '32', NULL, '148.540000', NULL),
(15, 'user53bd43c5325d5', 'withdraw5417f9493d356', NULL, '90', '58.540000', NULL),
(16, 'user53bd43c5325d5', 'withdraw5417fee951a36', NULL, '5', '53.540000', NULL),
(17, 'user53d8abab1de6c', 'withdraw541801c7da421', NULL, '10', '48.560000', NULL),
(18, 'user53bd43c5325d5', 'trans54182ee704eac', '71.840000', NULL, '125.380000', NULL),
(19, 'user53bd43c5325d5', 'trans54182ffe1de28', '71.840000', NULL, '197.220000', NULL),
(20, 'user53bd43c5325d5', 'trans5418301e74530', '24', NULL, '221.220000', NULL),
(21, 'user53bd43c5325d5', 'trans541acef71f840', '1.800000', NULL, '223.020000', NULL),
(22, 'user53bd43c5325d5', 'withdraw545370ade6b3e', NULL, '9', '214.02', NULL),
(23, 'user53bd43c5325d5', 'trans54539e8cbaa15', '19.92', NULL, '233.94', NULL),
(24, 'user53bd43c5325d5', 'trans54539e8cc3cda', '19.92', NULL, '253.86', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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
(12, 'user53bd43c5325d5', 'trans53e9f5fc2942d', '600', '784', NULL),
(13, 'user53bd43c5325d5', 'trans5409ae142adb6', '900', '1684', NULL),
(14, 'user53bd43c5325d5', 'trans5409ae147c679', '120', '1804', NULL),
(15, 'user53bd43c5325d5', 'trans5417f9111d658', '110', '1914', NULL),
(16, 'user53bd43c5325d5', 'trans54182ee710b39', '600', '2514', NULL),
(17, 'user53bd43c5325d5', 'trans54182ffe3c63a', '600', '3114', NULL),
(18, 'user53bd43c5325d5', 'trans5418301e80327', '55', '3169', NULL),
(19, 'user541bf8dd5a260', 'trans541c0e4ea6999', '220', '220', NULL),
(20, 'user541bf8dd5a260', 'trans541c14793b78e', '220', '440', NULL),
(21, 'user541c228723955', 'trans541c480706a57', '40', '40', NULL),
(22, 'user53bd43c5325d5', 'trans54539e8cc17be', '40', '3209', NULL),
(23, 'user53bd43c5325d5', 'trans54539e8cc5ed2', '40', '3249', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user_profile_info`
--

INSERT INTO `user_profile_info` (`id`, `user_id`, `gross_amount`, `withdraw_amount`, `processing_withdraw_amount`, `net_amount`) VALUES
(1, 'user53bd43c5325d5', '393.6', '90', '14', '253.86'),
(2, 'user53d8abab1de6c', '58.56', '10', '0', '48.56'),
(3, 'user53d8ac70513d3', '58.56', NULL, NULL, '58.56'),
(4, 'user53da00743ca87', '16', NULL, NULL, '16'),
(5, 'user53da010780637', NULL, NULL, NULL, NULL),
(6, 'user541ace29d345d', NULL, NULL, NULL, NULL),
(7, 'user541bf8dd5a260', NULL, NULL, NULL, NULL),
(8, 'user541c228723955', NULL, NULL, NULL, NULL),
(9, 'user54533bc3ee5c3', NULL, NULL, NULL, NULL),
(10, 'user545359677a9d4', NULL, NULL, NULL, NULL),
(11, 'user54535a7fad5f0', NULL, NULL, NULL, NULL),
(12, 'user545372e821778', NULL, NULL, NULL, NULL),
(13, 'user5453742dbb87e', NULL, NULL, NULL, NULL),
(14, 'user545375298ac9f', NULL, NULL, NULL, NULL),
(15, 'user545375eed86de', NULL, NULL, NULL, NULL),
(16, 'user5454d7961c097', NULL, NULL, NULL, NULL),
(17, 'user54800f0e25558', NULL, NULL, NULL, NULL),
(18, 'user54800f57999c8', NULL, NULL, NULL, NULL),
(19, 'user548147b801a99', NULL, NULL, NULL, NULL),
(20, 'user549126f68a21e', NULL, NULL, NULL, NULL),
(21, 'user5492aa0dcec61', NULL, NULL, NULL, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `withdraw_info`
--

INSERT INTO `withdraw_info` (`id`, `withdraw_id`, `user_id`, `withdraw_method`, `amount`, `date`, `status`) VALUES
(1, 'withdraw53ea0c6b6a145', 'user53bd43c5325d5', 'account', '35.74', '2014-08-12 02:08:31', '1'),
(2, 'withdraw5417f9493d356', 'user53bd43c5325d5', 'account', '90', '2014-09-16 04:09:09', '1'),
(3, 'withdraw5417fee951a36', 'user53bd43c5325d5', 'account', '5', '2014-09-16 05:09:09', '0'),
(4, 'withdraw541801c7da421', 'user53d8abab1de6c', 'account', '10', '2014-09-16 05:09:23', '1'),
(5, 'withdraw545370ade6b3e', 'user53bd43c5325d5', 'account', '9', '2014-10-31 04:10:17', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
