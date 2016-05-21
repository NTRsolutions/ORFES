-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2015 at 10:55 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`user_id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(250) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_login` varchar(50) NOT NULL,
  `join_date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`user_id`, `name`, `email`, `password`, `address`, `ip_address`, `status`, `last_login`, `join_date`) VALUES
(1, 'Md. Shohrab Hossain', 'sourav.absoftbd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '23/B, Free School street, Kathalbagan, Dhaka - 1205, Bangladesh.', '::1', 9, '2015-07-25 01:48:00', '2015-07-14 12:58:26'),
(7, 'Jahed Abdullah', 'jahedabdullah@gmail.com', '8c3b21fc58107a98e4cdc847c682b7a6', 'Dhaka , Bangladesh', '::1', 1, '04:51:58 PM 2015-05-30', '05:40:36 PM 2015-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
`category_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `restaurant_id`, `category_name`) VALUES
(27, 2, 'Soup'),
(31, 2, 'Salad'),
(45, 33, 'Soup'),
(46, 32, 'Soup'),
(48, 32, 'Biryani'),
(49, 34, 'Soup'),
(50, 34, 'Biryani'),
(53, 2, 'Biriyani');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_information`
--

CREATE TABLE IF NOT EXISTS `tbl_information` (
`info_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `hotline_number` varchar(20) NOT NULL,
  `opening_time` varchar(120) NOT NULL,
  `address` varchar(200) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `police_station` varchar(100) NOT NULL,
  `district_city` varchar(50) NOT NULL,
  `state_division` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_information`
--

INSERT INTO `tbl_information` (`info_id`, `restaurant_id`, `hotline_number`, `opening_time`, `address`, `postal_code`, `police_station`, `district_city`, `state_division`, `country`, `image`) VALUES
(2, 32, '01821745525', 'Saturday to Sunday  - ', 'House # 446 Eastern Part (3rd floor), Road # 31, New DOHS', '1205', 'Kolabagan', 'Dhaka', 'Dhaka', 'Bangladesh', ''),
(3, 33, '+880 2 9840476 ', 'Sunday to Friday 04:00 PM to 10:00 AM', 'House # 446 Eastern Part (3rd floor), Road # 31', '3900', 'Feni', 'Feni', 'Chittagong', 'Bangladesh', ''),
(14, 2, '0181742285', 'Wednesday to Sunday 00:00 AM - 00:00 PM', 'House # 446 EasternPart (3rd floor),Road # 31, New DOHS', '1206', 'Kafrul', 'Dhaka', 'Dhaka', 'Bangladesh', 'assets/images/banner/2015-06-28/4.jpg'),
(15, 34, '+88029840476', 'Sunday to Thursday 10:00 AM - 10:00 PM', 'House No#75, Road No:17, Foy''slake', '4317', 'Jafrabad', 'Chittagong', 'Chittagong', 'Bangladesh', ''),
(23, 42, '01821742124', '', '', '', '', '', '', 'Bangladesh', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE IF NOT EXISTS `tbl_item` (
`item_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `item_type` varchar(50) NOT NULL,
  `item_name` varchar(120) NOT NULL,
  `about` varchar(250) NOT NULL,
  `regular_price` varchar(50) NOT NULL,
  `special_price` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `restaurant_id`, `category`, `item_type`, `item_name`, `about`, `regular_price`, `special_price`, `image`, `status`, `date`) VALUES
(3, 2, 'Salad', 'Add A Special Offer', 'Mixed Vegetable Salad', 'Salad', 'BDT 100.00', 'BDT 90.00', 'assets/images/items/2015-06-28/b2.jpg', 1, '2015-06-28 02:19:17'),
(4, 2, 'Soup', 'Add A Special Offer', 'Chicken Onion Soup', 'Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.', 'BDT 1000.00', 'BDT 950.00', 'assets/images/items/2015-06-28/c.jpg', 1, '2015-06-28 02:42:03'),
(5, 2, 'Salad', 'Add A Special Offer', 'Greek Salad', 'It''s Holy Week, and you know what that means: it''s Greek Salad time!', 'BDT 250.00', 'BDT 230.00', 'assets/images/items/2015-06-28/g.jpg', 1, '2015-06-28 02:52:07'),
(7, 2, 'Soup', 'Add A New Item', 'Potato Soup', 'Potato Soup', 'BDT 200.00', '  ', 'assets/images/items/2015-06-29/e1.jpg', 1, '2015-06-29 12:31:06'),
(8, 2, 'Soup', 'Add A New Item', 'Vegetable Soup', 'This tasty soup doesn''t need a lot of time to simmer. Start it about 30 minutes before you want to serve it. As kids get older', 'BDT 200.00', '  ', 'assets/images/items/2015-06-29/A.jpg', 0, '2015-06-29 01:24:47'),
(9, 2, 'Biryani', 'Add A New Item', 'Chicken Biryani', 'Chicken Biryani', 'BDT 500.00', '  ', 'assets/images/items/2015-06-29/C.jpg', 1, '2015-06-29 02:22:27'),
(10, 2, 'Biryani', 'Add A New Item', 'Chicken Tikka', 'Chicken Tikka', 'BDT 150.00', '  ', 'assets/images/items/2015-06-29/i.jpg', 1, '2015-06-29 02:25:03'),
(11, 2, 'Biryani', 'Add A New Item', 'King prawn fried rice', 'King prawn fried rice', 'BDT 200.00', '  ', 'assets/images/items/2015-06-29/K.jpg', 1, '2015-06-29 02:31:07'),
(17, 33, 'Soup', 'Add A Special Offer', 'Vegetable Soup', 'Vegetable Soup', 'BDT 500.00', 'BDT 475.00', 'assets/images/items/2015-07-02/b2.png', 1, '2015-07-02 12:31:23'),
(19, 2, 'Biryani', 'Add A Special Offer', 'Mutton Biryani', 'Mutton Biryani', 'BDT 450.00', 'BDT 380.00', 'assets/images/items/2015-07-06/F3.jpg', 1, '2015-07-06 12:52:16'),
(20, 2, 'Biryani', 'Add A Special Offer', 'Fish Biryani', 'Fish Biryani', 'BDT 500.00', 'BDT 350.00', 'assets/images/items/2015-07-06/F.jpg', 1, '2015-07-06 11:45:02'),
(21, 32, 'Biryani', 'Add A New Item', 'Fish Biryani', 'Fish Biryani', 'BDT 500.00', ' ', 'assets/images/items/2015-07-07/F.jpg', 1, '2015-07-07 12:25:22'),
(22, 34, 'Soup', 'Add A Special Offer', 'Onion Soup', 'Onion Soup', 'BDT 400.00', 'BDT 375.00', 'assets/images/items/2015-07-08/c.jpg', 1, '2015-07-08 12:03:49'),
(23, 34, 'Biryani', 'Add A New Item', 'Fish Biryani', 'Fish Biryani', 'BDT 500.00', ' ', 'assets/images/items/2015-07-08/F.jpg', 1, '2015-07-08 12:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE IF NOT EXISTS `tbl_restaurant` (
`restaurant_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_restaurant`
--

INSERT INTO `tbl_restaurant` (`restaurant_id`, `name`, `username`, `email`, `password`, `status`, `date`) VALUES
(2, 'BFC Food', 'bfc', 'sourav.absoftbd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2015-06-00 00:00:00'),
(32, 'Dhaka Chinese Restaurant', 'dcr', 'dcr@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2015-06-24 02:51:25'),
(33, 'KFC Food', 'kfc', 'kfc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2015-06-25 12:55:00'),
(34, 'GFC', 'gfc', 'gfc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2015-07-08 11:57:21'),
(42, 'CFC FOOD', 'cfc', 'cfc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2015-07-14 02:31:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_information`
--
ALTER TABLE `tbl_information`
 ADD PRIMARY KEY (`info_id`), ADD UNIQUE KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
 ADD PRIMARY KEY (`item_id`), ADD FULLTEXT KEY `item_name` (`item_name`,`about`);

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
 ADD PRIMARY KEY (`restaurant_id`), ADD UNIQUE KEY `username` (`username`,`email`), ADD FULLTEXT KEY `name` (`name`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_information`
--
ALTER TABLE `tbl_information`
MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
