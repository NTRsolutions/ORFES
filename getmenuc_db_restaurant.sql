-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 21, 2016 at 04:50 PM
-- Server version: 10.0.25-MariaDB
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `getmenuc_db_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `user_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(250) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_login` varchar(50) NOT NULL,
  `join_date` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`user_id`, `name`, `email`, `password`, `address`, `ip_address`, `status`, `last_login`, `join_date`) VALUES
(2, 'Anik Islam', 'anikdpi@gmail.com', '4b966ce4a0a55919a9b23bfe92183490', 'New DOHS Mohakhali, Dhaka-1206', '::1', 9, '2016-05-21 01:49:56', '2015-08-31 11:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `category_name` (`category_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `restaurant_id`, `category_name`, `status`) VALUES
(60, 44, 'Dinner', 0),
(61, 44, 'Lunch', 0),
(62, 44, 'Fish N Chips', 0),
(64, 44, 'Fast Food', 0),
(65, 44, 'Burger', 0),
(66, 44, 'Soup', 0),
(68, 44, 'Breakfast', 0),
(69, 44, 'Formosa', 0),
(70, 44, 'Pizza', 0),
(71, 44, 'Fresh Juice', 0),
(72, 44, 'Milk Shake', 0),
(73, 44, 'Coffee', 0),
(74, 47, 'Dinner', 1),
(75, 47, 'Lunch', 1),
(78, 47, 'Fast Food', 0),
(88, 48, 'Appetizer', 0),
(89, 48, 'Dinner', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `source` longtext NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`image_id`, `restaurant_id`, `source`) VALUES
(1, 44, 'assets/images/gallery/44/2016-05-12/1.jpg'),
(2, 44, 'assets/images/gallery/44/2016-05-12/D.jpg'),
(3, 44, 'assets/images/gallery/44/2016-05-12/H.jpg'),
(6, 47, 'assets/images/gallery/47/2016-05-17/D.jpg'),
(8, 47, 'assets/images/gallery/47/2016-05-17/J.jpg'),
(9, 48, 'assets/images/gallery/48/2016-05-21/H.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_information`
--

CREATE TABLE IF NOT EXISTS `tbl_information` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `facilities` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `hotline_number` varchar(20) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `billing_system` varchar(255) NOT NULL,
  `opening_time` varchar(120) NOT NULL,
  `opening_day` varchar(120) NOT NULL,
  `address` varchar(200) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `police_station` varchar(100) NOT NULL,
  `district_city` varchar(50) NOT NULL,
  `state_division` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`info_id`),
  UNIQUE KEY `restaurant_id` (`restaurant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_information`
--

INSERT INTO `tbl_information` (`info_id`, `restaurant_id`, `type`, `facilities`, `about`, `hotline_number`, `seating_capacity`, `billing_system`, `opening_time`, `opening_day`, `address`, `postal_code`, `police_station`, `district_city`, `state_division`, `country`, `image`, `logo`) VALUES
(25, 44, 'Bangla-Thai', 'AC, Wifi', 'This is a good restaurant!', '01700000000', 10, 'Cash Only', '09:00 AM - 10:00 PM', 'Saturday - Thursday', 'House # 446 Eastern Part (3rd floor), Road # 31, New DOHS Mohakhali', '1206', 'Kafrul', 'Dhaka', 'Dhaka', 'Bangladesh', 'assets/images/banner/44/2016-05-12/44.jpg', 'assets/images/logo/44/2016-05-12/44.jpg'),
(26, 45, '', '', '', '01782666111', 0, '', 'Saturday to Sunday 06:00 PM - 11:00 PM', '', 'House # 284 South Paik Para, Mirpur, Dhaka', '1206', 'Mirpur', 'Dhaka', 'Dhaka', 'Bangladesh', 'assets/images/banner/2015-11-22/f1.jpg', ''),
(27, 46, '', '', '', '01782666111', 0, '', 'Saturday to Sunday 07:00 AM - 11:00 PM', '', 'House # 446 Eastern Part (3rd floor), Road # 31, New DOHS Mohakhali, Dhaka', '1206', 'Kafrul', 'Dhaka', 'Dhaka', 'Bangladesh', 'assets/images/banner/2016-04-26/c1.jpg', ''),
(28, 47, 'Bangla-Thai', 'AC, Wifi', 'We assure you 100% satisfaction. Even then, if you find any flaw, we will solve your problem instantly. Client satisfaction is our main motto.', '01671010143', 60, 'Cash & Card Accepted', '09:00 - 23:00', 'Saturday - Sunday', '441, Mirpur DOHS', '12126', 'Kafrul', 'Dhaka', 'Dhaka', 'Bangladesh', 'assets/images/banner/47/2016-05-18/471.jpg', 'assets/images/logo/47/2016-05-17/47.jpg'),
(29, 48, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 'assets/images/banner/48/2016-05-21/48.jpg', 'assets/images/logo/48/2016-05-21/48.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE IF NOT EXISTS `tbl_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `item_type` varchar(50) NOT NULL,
  `item_name` varchar(120) NOT NULL,
  `about` varchar(250) NOT NULL,
  `regular_price` varchar(50) NOT NULL,
  `special_price` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `category` (`category`),
  FULLTEXT KEY `item_name` (`item_name`,`about`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `restaurant_id`, `category`, `item_type`, `item_name`, `about`, `regular_price`, `special_price`, `image`, `status`, `date`) VALUES
(25, 43, 'Dinner', 'Add A New Item', 'Special Tandoori', 'Special Tandoori Special Tandoori Special Tandoori\r\nSpecial Tandoori Special Tandoori Special Tandoori', 'BDT 200', ' ', 'assets/images/items/2015-07-29/a.jpg', 1, '2015-07-29 04:05:47'),
(26, 43, 'Dinner', 'Add A Special Offer', 'Chicken Tandoori', 'Chicken Tandoori Chicken Tandoori Chicken Tandoori Chicken Tandoori Chicken Tandoori Chicken Tandoori', 'BDT 200', 'BDT 150', 'assets/images/items/2015-07-29/i.jpg', 1, '2015-07-29 04:06:40'),
(27, 43, 'Fish', 'Add A New Item', 'Hilsha Fish', 'Hilsha Fish Hilsha Fish Hilsha Fish Hilsha Fish Hilsha Fish Hilsha Fish Hilsha Fish Hilsha Fish Hilsha Fish Hilsha Fish Hilsha Fish Hilsha Fish ', 'BDT 500', ' ', 'assets/images/items/2015-07-29/F.jpg', 1, '2015-07-29 04:07:22'),
(28, 43, 'Fish', 'Add A Special Offer', 'Rui Fish', 'Rui Fish Rui Fish Rui Fish Rui Fish Rui Fish Rui Fish Rui Fish Rui Fish Rui Fish Rui Fish ', 'BDT 150', 'BDT 130', 'assets/images/items/2015-07-29/m.jpg', 1, '2015-07-29 04:08:03'),
(29, 43, 'Lunch', 'Add A New Item', 'Biriyani', 'Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani Biriyani ', 'BDT 120', ' ', 'assets/images/items/2015-07-29/F1.jpg', 1, '2015-07-29 04:08:33'),
(30, 43, 'Meat', 'Add A New Item', 'Beep', 'Beep Beep Beep Beep Beep Beep Beep Beep ', 'BDT 180', ' ', 'assets/images/items/2015-07-29/K.jpg', 1, '2015-07-29 04:09:11'),
(31, 43, 'Soup', 'Add A Special Offer', 'Onion Soup', 'Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup Onion Soup ', 'BDT 210', 'BDT 200', 'assets/images/items/2015-07-29/K1.jpg', 1, '2015-07-29 04:12:30'),
(32, 43, 'Soup', 'Add A Special Offer', 'Test', 'Test', 'BDT 120', 'BDT 90', 'assets/images/items/2015-07-29/A2.jpg', 1, '2015-07-29 04:41:23'),
(33, 44, 'Fast Food', 'Add A New Item', 'BnB Hot Dogs', 'xxxxxxxxx', 'BDT 196', ' ', 'assets/images/items/2015-08-31/h.jpg', 1, '2015-08-31 11:38:47'),
(34, 44, 'Fast Food', 'Add A Special Offer', 'Beef Sandwich', 'Classic beef sandwich.', 'BDT 150', 'BDT 130', 'assets/images/items/2015-08-31/6.jpg', 1, '2015-08-31 11:40:18'),
(36, 44, 'Burger', 'Add A Special Offer', 'Teriyaki Chicken Burger', 'Teriyaki Chicken burger with cheese,onions.tomatoes,lettuce', 'BDT 325', 'BDT 300', 'assets/images/items/2016-04-27/t.jpg', 1, '2016-04-27 03:51:31'),
(37, 44, 'Fish N Chips', 'Add A New Item', 'Calamari Fry (Garlic Mayo)', '14-16 Pcs with choice of Garlic Mayo Sauce', 'BDT 350', ' ', 'assets/images/items/2015-08-31/1.jpg', 1, '2015-08-31 11:45:19'),
(38, 44, 'Fish N Chips', 'Add A New Item', 'Calamari Fry (Tartar Sauce)', '14-16 Pcs with choice of Garlic Tartar Sauce', 'BDT 340', ' ', 'assets/images/items/2015-08-31/11.jpg', 1, '2015-08-31 11:46:32'),
(39, 44, 'Fries & Salad', 'Add A New Item', 'French Fries', 'Crispy deep-fried potato fries.', 'BDT 75', ' ', 'assets/images/items/2015-08-31/63.jpg', 1, '2015-08-31 11:47:35'),
(40, 44, 'Fries & Salad', 'Add A Special Offer', 'Crispy Fried CK x 1', 'Crispy fried chicken with crunchy skin and soft tender meat.', 'BDT 85', 'BDT 75', 'assets/images/items/2015-08-31/64.jpg', 1, '2015-08-31 11:49:57'),
(41, 44, 'Dinner', 'Add A New Item', 'Kacchi Biryani', 'yyyyyyyyyyyy', 'BDT 200', ' ', 'assets/images/items/2015-08-31/k.png', 0, '2015-08-31 11:55:37'),
(42, 44, 'Lunch', 'Add A New Item', 'Tehari', 'gggggggggggg', 'BDT 150', ' ', 'assets/images/items/2015-08-31/t.jpg', 1, '2015-08-31 11:58:13'),
(43, 44, 'Soup', 'Add A New Item', 'Thai Soup', 'sssssssss', 'BDT 100', ' ', 'assets/images/items/2015-08-31/t1.jpg', 1, '2015-08-31 12:00:23'),
(44, 44, 'Burger', 'Add A New Item', 'Mini Burger (Without Cheese)', '', 'BDT 56', ' ', 'assets/images/items/2016-04-27/c.jpg', 0, '2016-04-27 03:52:43'),
(45, 44, 'Burger', 'Add A New Item', 'Spicy Burger (With Cheese)', 'It''s one of the namira''s spetial burger.', 'BDT 175', ' ', 'assets/images/items/2016-04-27/m.jpg', 1, '2016-04-27 03:56:32'),
(46, 44, 'Breakfast', 'Add A New Item', 'Spetial Full Tehari', 'Spetial old dhaka quality tehari.', 'BDT 100', ' ', 'assets/images/items/2016-04-27/p.jpg', 1, '2016-04-27 04:00:37'),
(48, 47, 'Dinner', '1', 'Vaat', 'Vaat', 'BDT 100', 'BDT 70', 'assets/images/items/47/2016-05-14/o632a.jpg', 1, '2016-05-14 02:41:14'),
(49, 47, 'Lunch', '1', 'Daal', 'Daaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaal', 'BDT 50', ' ', 'assets/images/items/47/2016-05-14/sBYrP.jpg', 1, '2016-05-14 12:28:48'),
(50, 47, 'Dinner', '2', 'Polao', 'Polao', 'BDT 150', ' ', 'assets/images/items/47/2016-05-14/Ztrm3.jpg', 1, '2016-05-14 03:07:16'),
(51, 48, 'Dinner', '2', 'Vaat', 'Vaat', 'BDT 100', 'BDT 70', 'assets/images/items/48/2016-05-21/Wl654.jpg', 1, '2016-05-21 03:44:43'),
(52, 48, 'Appetizer', '2', 'Blue Moon', 'Blue Moon', 'BDT 123', 'BDT 100', 'assets/images/items/48/2016-05-21/EACTA.jpg', 1, '2016-05-21 03:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE IF NOT EXISTS `tbl_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `banner` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant_id` (`restaurant_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_offer`
--

INSERT INTO `tbl_offer` (`id`, `restaurant_id`, `text`, `banner`) VALUES
(1, 46, 'we are offering blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah', ''),
(2, 47, 'we are offering blah blah blah blah', 'assets/images/offer/47/2016-05-21/47.png'),
(3, 48, 'Hello', 'assets/images/offer/48/2016-05-21/481.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE IF NOT EXISTS `tbl_restaurant` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`restaurant_id`),
  UNIQUE KEY `username` (`username`,`email`),
  FULLTEXT KEY `name` (`name`,`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tbl_restaurant`
--

INSERT INTO `tbl_restaurant` (`restaurant_id`, `name`, `username`, `email`, `password`, `status`, `date`) VALUES
(44, 'Example Restaurant', 'example', 'example@getmenucard.com', '1a79a4d60de6718e8e5b326e338ae533', 1, '2015-08-31 11:11:51'),
(45, 'Example 2 Restaurant', 'example2', 'example2@getmenucard.com', '1a79a4d60de6718e8e5b326e338ae533', 1, '2015-08-31 11:11:51'),
(46, 'Example 3 Restaurant', 'example3', 'example3@getmenucard.com', '1a79a4d60de6718e8e5b326e338ae533', 1, '2015-08-31 11:11:51'),
(47, 'ABC Restaurant', 'abc', 'abc@getmenucard.com', '5d41402abc4b2a76b9719d911017c592', 1, '2016-05-12 12:48:26'),
(48, 'Anguler Restaurant', 'mhtamun', 'mhtamun@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2016-05-21 01:37:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
