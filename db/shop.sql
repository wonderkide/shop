-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2017 at 11:27 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1497515252),
('Author', '3', 1497515252),
('Management', '2', 1497515252);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, 'สำหรับการดูแลระบบ', NULL, NULL, 1497515251, 1497515251),
('Author', 1, 'สำหรับการเขียนบทความ', NULL, NULL, 1497515251, 1497515251),
('Management', 1, 'สำหรับจัดการข้อมูลผู้ใช้งานและบทความ', NULL, NULL, 1497515251, 1497515251),
('ManageUser', 1, 'สำหรับจัดการข้อมูลผู้ใช้งาน', NULL, NULL, 1497515250, 1497515250);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Management', 'Author'),
('Admin', 'Management'),
('Management', 'ManageUser');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT 'ชื่อเรื่อง',
  `content` text COMMENT 'เนื้อหา',
  `category` int(11) DEFAULT NULL COMMENT 'หมวดหมู่',
  `tag` varchar(255) DEFAULT NULL COMMENT 'คำค้น',
  `created_at` int(11) DEFAULT NULL COMMENT 'สร้างวันที่',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `updated_at` int(11) DEFAULT NULL COMMENT 'แก้ไขวันที่',
  `updated_by` int(11) DEFAULT NULL COMMENT 'แก้ไขโดย',
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `category`, `tag`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'title', 'content', 8, 'gg', 1497516517, 1, 1497516517, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_main_menu`
--

CREATE TABLE IF NOT EXISTS `db_main_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `parent` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `db_main_menu`
--

INSERT INTO `db_main_menu` (`id`, `label`, `url`, `parent`, `sort`, `active`) VALUES
(1, 'Home', '/', 0, 1, 1),
(2, 'Accessories', '/product/category/accessory', 0, 2, 1),
(3, 'Shoes', '/product/category/shoe', 0, 3, 1),
(4, 'แว่นกันแดด', '/product/model/แว่นกันแดด', 2, 1, 1),
(5, 'แหวน', '/product/model/แหวน', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_product`
--

CREATE TABLE IF NOT EXISTS `db_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `detail` text,
  `price` double NOT NULL,
  `is_detail` text,
  `size` text,
  `color` text,
  `image` text,
  `quantity` int(11) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `db_product`
--

INSERT INTO `db_product` (`id`, `name`, `detail`, `price`, `is_detail`, `size`, `color`, `image`, `quantity`, `category`, `group`, `status`) VALUES
(10, 'Rayban XXX', 'XXX', 2500, '[]', NULL, NULL, '["\\/uploads\\/products\\/g02keitewcljrp0mwsoe.jpg","\\/uploads\\/products\\/0rik4vv926dtxe19i82v.jpg"]', 5, 2, 1, 1),
(11, 'Lord Of The Ring', 'GG', 6969696, '["size"]', NULL, NULL, NULL, NULL, 4, 1, 1),
(12, 'Nike Cap', '99', 999, '["color"]', NULL, NULL, NULL, NULL, 3, 1, 1),
(13, 'ManchesterUTD', '', 1999, '["color","size"]', NULL, NULL, NULL, NULL, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_product_category`
--

CREATE TABLE IF NOT EXISTS `db_product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `detail` varchar(512) NOT NULL,
  `parent` int(11) NOT NULL,
  `setting` text,
  `sort` int(11) NOT NULL,
  `on_menu` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `db_product_category`
--

INSERT INTO `db_product_category` (`id`, `name`, `detail`, `parent`, `setting`, `sort`, `on_menu`, `active`) VALUES
(1, 'accessories', 'accessories', 0, '', 1, 1, 1),
(2, 'แว่นกันแดด', 'แว่นกันแดด', 1, '', 1, 1, 1),
(3, 'หมวก', 'หมวก', 1, '', 2, 1, 1),
(4, 'shoe', 'shoe', 0, '', 2, 1, 1),
(5, 'shirt', 'shirt', 0, '', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_product_detail`
--

CREATE TABLE IF NOT EXISTS `db_product_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `color` varchar(64) DEFAULT NULL,
  `images` text NOT NULL,
  `size` text,
  `quantity` text,
  `all` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `db_product_detail`
--

INSERT INTO `db_product_detail` (`id`, `id_product`, `color`, `images`, `size`, `quantity`, `all`) VALUES
(1, 11, NULL, '["\\/uploads\\/products\\/e5ck6z4sf85s6r7teatp.jpg","\\/uploads\\/products\\/8qexwthjepq6fpi4wftn.jpg"]', NULL, NULL, '{"0":{"size":"1","qtt":"2"},"2":{"size":"2","qtt":"1"},"3":{"size":"3","qtt":"5"}}'),
(2, 12, '#000000', '["\\/uploads\\/products\\/eok6k8s3gywq6bvc5yel.jpg","\\/uploads\\/products\\/xctgxikymrd8678sa4dd.jpg"]', NULL, '8', NULL),
(3, 12, '#ff0000', '["\\/uploads\\/products\\/2ujb1bnifv02ytdp2kit.jpg","\\/uploads\\/products\\/cfyi02e1zbsk56wkppdg.jpg"]', NULL, '11', NULL),
(4, 13, '#ff0000', '["\\/uploads\\/products\\/fpzdpnkovty75kaligfn.jpg","\\/uploads\\/products\\/r37lmlqwner8r20j10h6.jpg"]', NULL, NULL, '[{"size":"M","qtt":"1"},{"size":"L","qtt":"3"}]'),
(5, 13, '#0000ff', '["\\/uploads\\/products\\/dyi89hc9d8crlr0jgr0a.jpg","\\/uploads\\/products\\/zo8i9xckirgxrxhpt1wk.png"]', NULL, NULL, '[{"size":"M","qtt":"8"},{"size":"XL","qtt":"2"}]');

-- --------------------------------------------------------

--
-- Table structure for table `db_product_group`
--

CREATE TABLE IF NOT EXISTS `db_product_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `detail` varchar(512) NOT NULL,
  `data_append` text,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `db_product_group`
--

INSERT INTO `db_product_group` (`id`, `name`, `detail`, `data_append`, `active`) VALUES
(1, 'new', 'New Arrivals', '', 1),
(2, 'hot', 'Popular Products', '', 1),
(3, 'sale', 'sale', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_product_order`
--

CREATE TABLE IF NOT EXISTS `db_product_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `create_at` datetime NOT NULL,
  `create_ip` varchar(64) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `db_product_order`
--

INSERT INTO `db_product_order` (`id`, `id_user`, `address`, `price`, `discount`, `total`, `quantity`, `description`, `create_at`, `create_ip`, `status`) VALUES
(1, 2, 0, 0, 0, 0, 0, 'prepare order', '2017-08-23 16:04:44', '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_product_order_items`
--

CREATE TABLE IF NOT EXISTS `db_product_order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_product_order` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(64) NOT NULL,
  `size` varchar(64) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_user_address`
--

CREATE TABLE IF NOT EXISTS `db_user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `number` varchar(128) NOT NULL,
  `building` varchar(128) DEFAULT NULL,
  `soi` varchar(128) DEFAULT NULL,
  `road` varchar(128) DEFAULT NULL,
  `mu` varchar(128) DEFAULT NULL,
  `district` varchar(128) NOT NULL,
  `amphoe` varchar(128) NOT NULL,
  `province` varchar(128) NOT NULL,
  `zipcode` varchar(128) NOT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `db_user_address`
--

INSERT INTO `db_user_address` (`id`, `id_user`, `number`, `building`, `soi`, `road`, `mu`, `district`, `amphoe`, `province`, `zipcode`, `note`) VALUES
(1, 2, '999', 'xxx', '', '', '', 'หัวหมาก', 'บางกะปิ', 'กรุงเทพมหานคร', '10240', 'GGWP');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1497509369),
('m130524_201442_init', 1497509373),
('m140506_102106_rbac_init', 1497509719);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'dYWkR3VWbHsruCOr-G3Vp3V4z0oDsUdY', '$2y$13$OnqgJKS3.pVlha61WgyA/OCv9t.USZFa7fh.9ErAzj91nRDfQgLQi', NULL, 'admin@shop.dev', 10, 1497509422, 1497509422),
(2, 'wonder', 'oZuP9ORsIMz1ETBkUogYVG3ZGFF3H51g', '$2y$13$ywfnBnYtxES3UlUcEjl2OOZxKLe/I0flKVvSHc0fmFLek8DPsj.F6', NULL, '111111@g.com', 10, 1497521832, 1497523582);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
