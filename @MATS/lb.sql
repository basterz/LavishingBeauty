-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2014 at 10:26 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lb`
--
CREATE DATABASE IF NOT EXISTS `lb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lb`;

-- --------------------------------------------------------

--
-- Table structure for table `app_var`
--

CREATE TABLE IF NOT EXISTS `app_var` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `var_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `var_value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `app_var`
--

INSERT INTO `app_var` (`id`, `var_key`, `var_value`) VALUES
(1, 'facebook', NULL),
(2, 'business_hours', NULL),
(3, 'telephone', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `popular` tinyint(1) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `viewed` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article_translation`
--

CREATE TABLE IF NOT EXISTS `article_translation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_body` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `big_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `created_at`, `updated_at`) VALUES
(2, '2014-02-22 18:05:40', '2014-02-22 18:05:40'),
(3, '2014-02-22 18:06:36', '2014-02-22 18:06:36'),
(4, '2014-02-22 18:07:40', '2014-02-22 18:07:40'),
(5, '2014-02-22 18:08:54', '2014-02-22 18:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `banner_translation`
--

CREATE TABLE IF NOT EXISTS `banner_translation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `title` text NOT NULL,
  `body` text,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL,
  `lang` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner_translation`
--

INSERT INTO `banner_translation` (`id`, `image`, `link`, `title`, `body`, `is_published`, `position`, `lang`) VALUES
(2, '9f7c3054c178d3a20901f65422f64f03656cde07.png', 'www.example.com', 'About Us', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nunc feugiat, viverra massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nunc feugiat, viverra massa.</p>', 1, 1, 'en'),
(3, '1dae68ea28070e182d2fdaf875852c1e3d946789.png', 'www.google1.com', 'Meet Our Team', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nunc feugiat, viverra massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nunc feugiat, viverra massa.</p>', 1, 2, 'en'),
(4, 'ec308960189cd4a4b282b05ddda45302056904a1.png', 'www.google2.com', 'Contact Us', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nunc feugiat, viverra massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nunc feugiat, viverra massa.</p>', 1, 3, 'en'),
(5, 'abae445273c4d22059060c193ffc3be4d487c7b0.png', 'www.faq.com', 'FAQ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nunc feugiat, viverra massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nunc feugiat, viverra massa.</p>', 1, 4, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parrent_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parrent_id`, `position`, `icon`, `created_at`, `updated_at`) VALUES
(21, 0, 1, '', '2014-01-12 18:22:37', '2014-01-12 18:22:37'),
(22, 0, 2, '', '2014-01-12 18:23:13', '2014-01-12 18:23:13'),
(23, 21, 3, '', '2014-01-12 18:23:56', '2014-01-12 18:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `category_translation`
--

CREATE TABLE IF NOT EXISTS `category_translation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `big_body` text COLLATE utf8_unicode_ci,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_translation`
--

INSERT INTO `category_translation` (`id`, `title`, `body`, `big_body`, `is_published`, `lang`) VALUES
(21, 'cat1', '<p>cat1</p>', '<p>cat1</p>', 1, 'en'),
(22, 'cat2', '<p>cat2</p>', '<p>cat2</p>', 1, 'en'),
(23, 'subcat1', '<p>subcat1</p>', '<p>subcat1</p>', 1, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `linking_product_category`
--

CREATE TABLE IF NOT EXISTS `linking_product_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id_idx` (`product_id`),
  KEY `category_id_idx` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `linking_product_category`
--

INSERT INTO `linking_product_category` (`id`, `product_id`, `category_id`) VALUES
(1, 3, 21);

-- --------------------------------------------------------

--
-- Table structure for table `linking_slider_category`
--

CREATE TABLE IF NOT EXISTS `linking_slider_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `slider_image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slider_image_id_idx` (`slider_image_id`),
  KEY `category_id_idx` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `type`, `position`, `created_at`, `updated_at`) VALUES
(5, 1, 1, '2014-01-09 21:15:21', '2014-02-22 13:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `page_translation`
--

CREATE TABLE IF NOT EXISTS `page_translation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `links` text COLLATE utf8_unicode_ci NOT NULL,
  `partners` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_translation`
--

INSERT INTO `page_translation` (`id`, `title`, `body`, `links`, `partners`, `image`, `meta_title`, `meta_keywords`, `meta_description`, `is_published`, `lang`) VALUES
(5, 'homepage', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec nunc feugiat, viverra massa ac, facilisis sapien. Cras at est sagittis mauris egestas imperdiet. Maecenas vitae adipiscing erat. Sed ac est enim. Etiam hendrerit tempus euismod. Morbi tempor ipsum nec dictum auctor. Maecenas id faucibus eros. Aliquam gravida ante sit amet sem dignissim scelerisque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed quis orci massa. Cras non magna a tortor vehicula ultrices sit amet at mauris. Fusce gravida dignissim libero, sed tristique leo elementum vitae. Curabitur ultrices suscipit molestie. Proin vitae sem metus. Phasellus auctor congue nibh, ac convallis odio consequat dapibus. In tincidunt facilisis ullamcorper. Phasellus placerat vestibulum urna, in condimentum dolor vulputate sed. Praesent consectetur quam tortor, vel tincidunt est mattis at. Vestibulum faucibus felis nec pellentesque lacinia. Vivamus laoreet ullamcorper dui. Aliquam iaculis arcu in dapibus volutpat.</p>\r\n<p>Vestibulum id molestie tellus. Proin porta ultricies quam vitae volutpat. Praesent aliquam orci non purus tristique tempus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer imperdiet sit amet elit a semper. Morbi diam turpis, ornare a vulputate sit amet, pharetra at erat. Curabitur hendrerit justo sed leo pulvinar, sodales elementum metus placerat. Sed id placerat turpis. Maecenas dignissim posuere nisi, vel convallis sem tristique sit amet. Proin sed lobortis lorem, aliquam viverra enim.</p>\r\n<p>Nullam in faucibus libero, vitae tempor dui. Vivamus a pharetra</p>', '', '', '', 'homepage', 'homepage', 'homepage', 1, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `popular` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `position`, `popular`, `created_at`, `updated_at`) VALUES
(1, '', 1, 0, '2014-01-16 21:00:27', '2014-01-16 21:00:27'),
(2, '', 2, 0, '2014-01-16 21:00:45', '2014-01-16 21:04:10'),
(3, '', 3, 0, '2014-01-16 21:01:21', '2014-01-16 21:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_translation`
--

CREATE TABLE IF NOT EXISTS `product_translation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `big_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_type` text COLLATE utf8_unicode_ci NOT NULL,
  `phase` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_translation`
--

INSERT INTO `product_translation` (`id`, `title`, `body`, `image`, `big_image`, `project_type`, `phase`, `area`, `city`, `author`, `author_label`, `area_label`, `is_published`, `lang`) VALUES
(1, 'adsfa', '<p>fasdf</p>', 'f01628ad727e01c93724aa1def97d5b6a119492d.jpg', 'c9e962028b85ec5e10cc0a72d184d352ba8210fa.jpg', '', NULL, NULL, '', NULL, NULL, NULL, 1, 'en'),
(2, 'asdfasdf', '<p>sfdaasdfasf</p>', NULL, NULL, '', NULL, NULL, '', NULL, NULL, NULL, 1, 'en'),
(3, 'asfasf', '<p>asdfasdf</p>', '411cdb523d706e1942f27e7555a5d10929d5a734.jpg', '4714313f2c5b5766f4bb81118ea3c7e148cfdc77.jpg', '', NULL, NULL, '', NULL, NULL, NULL, 1, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `slider_image`
--

CREATE TABLE IF NOT EXISTS `slider_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slider_image`
--

INSERT INTO `slider_image` (`id`, `created_at`, `updated_at`) VALUES
(2, '2014-01-16 21:08:15', '2014-01-16 21:08:15'),
(3, '2014-01-16 21:08:45', '2014-01-16 21:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `slider_image_translation`
--

CREATE TABLE IF NOT EXISTS `slider_image_translation` (
  `id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider_image_translation`
--

INSERT INTO `slider_image_translation` (`id`, `image`, `link`, `is_published`, `lang`) VALUES
(1, '70111c8cf7f060f78c88838c582d0d8c935066b0.jpg', 'http://www.example.com', 1, 'en'),
(2, 'c45d721ce6fb5eefc3365d8b43852800e211a56d.jpg', 'http://www.google.com', 1, 'en'),
(3, '4494e75eaa90a1939d9868aefc5d847414a7eea8.jpg', 'http://www.example.com', 1, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `remember_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `parent_id_idx` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `parent_id`, `email`, `password`, `remember_key`, `name`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(2, NULL, 'chimchev@vertinity.com', '23c3bd611872d9dc5692d0bd70b9fe6d054504fa', NULL, 'Tsvetan', 'admin', 1, '2012-05-30 14:43:14', '2012-05-30 14:43:14'),
(3, NULL, 'admin@vertinity.com', 'admin', '', 'admin', 'admin', 1, '2012-09-21 09:19:13', '2012-09-21 09:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE IF NOT EXISTS `user_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `browser_info` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`id`, `user_id`, `name`, `ip`, `browser_info`, `created_at`, `updated_at`) VALUES
(38, 2, 'chimchev@vertinity.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0', '2014-01-12 15:32:41', '2014-01-12 15:32:41'),
(39, 2, 'chimchev@vertinity.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0', '2014-01-12 18:09:14', '2014-01-12 18:09:14'),
(40, 2, 'chimchev@vertinity.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0', '2014-01-16 20:55:10', '2014-01-16 20:55:10'),
(41, 2, 'chimchev@vertinity.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0', '2014-02-22 13:19:12', '2014-02-22 13:19:12'),
(42, 2, 'chimchev@vertinity.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0', '2014-02-22 15:51:43', '2014-02-22 15:51:43');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_translation`
--
ALTER TABLE `article_translation`
  ADD CONSTRAINT `article_translation_id_article_id` FOREIGN KEY (`id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `banner_translation`
--
ALTER TABLE `banner_translation`
  ADD CONSTRAINT `banner_translation_id_banner_id` FOREIGN KEY (`id`) REFERENCES `banner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_translation`
--
ALTER TABLE `category_translation`
  ADD CONSTRAINT `category_translation_id_category_id` FOREIGN KEY (`id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `linking_product_category`
--
ALTER TABLE `linking_product_category`
  ADD CONSTRAINT `linking_product_category_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `linking_product_category_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `linking_slider_category`
--
ALTER TABLE `linking_slider_category`
  ADD CONSTRAINT `linking_slider_category_category_id_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `linking_slider_category_slider_image_id_slider_image_id` FOREIGN KEY (`slider_image_id`) REFERENCES `slider_image` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_translation`
--
ALTER TABLE `page_translation`
  ADD CONSTRAINT `page_translation_id_page_id` FOREIGN KEY (`id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_translation`
--
ALTER TABLE `product_translation`
  ADD CONSTRAINT `product_translation_id_product_id` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_parent_id_user_id` FOREIGN KEY (`parent_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
