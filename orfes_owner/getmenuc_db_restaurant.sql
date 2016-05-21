-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2015 at 09:16 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getmenuc_db_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
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

CREATE TABLE `tbl_admin` (
  `user_id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(250) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_login` varchar(50) NOT NULL,
  `join_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`user_id`, `name`, `email`, `password`, `address`, `ip_address`, `status`, `last_login`, `join_date`) VALUES
(2, 'Anik Islam', 'anikdpi@gmail.com', '4b966ce4a0a55919a9b23bfe92183490', 'New DOHS Mohakhali, Dhaka-1206', '124.6.231.40', 9, '2015-09-10 06:33:40', '2015-08-31 11:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `restaurant_id`, `category_name`) VALUES
(60, 44, 'Dinner'),
(61, 44, 'Lunch'),
(62, 44, 'Fish N Chips'),
(63, 44, 'Fries & Salad'),
(64, 44, 'Fast Food'),
(65, 44, 'Burger'),
(66, 44, 'Soup');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `image_id` int(11) NOT NULL,
  `source` longtext NOT NULL,
  `user` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`image_id`, `source`, `user`) VALUES
(28, 'assets/images/gallery/2015-11-09/r.jpg', 'anikdpi@gmail.com'),
(29, 'assets/images/gallery/2015-11-09/r3.jpg', 'anikdpi@gmail.com'),
(30, 'assets/images/gallery/2015-11-09/b1.jpg', 'anikdpi@gmail.com'),
(31, 'assets/images/gallery/2015-11-11/R.jpg', 'anikdpi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_information`
--

CREATE TABLE `tbl_information` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_information`
--

INSERT INTO `tbl_information` (`info_id`, `restaurant_id`, `hotline_number`, `opening_time`, `address`, `postal_code`, `police_station`, `district_city`, `state_division`, `country`, `image`) VALUES
(25, 44, '01782666111', 'Saturday to Sunday 07:00 AM - 11:00 PM', 'House # 446 Eastern Part (3rd floor), Road # 31, New DOHS Mohakhali', '1206', 'Kafrul', 'Dhaka', 'Dhaka', 'Bangladesh', 'assets/images/banner/2015-08-31/b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(36, 44, 'Burger', 'Add A Special Offer', 'Teriyaki Chicken Burger', 'Teriyaki Chicken burger with cheese,onions.tomatoes,lettuce', 'BDT 325', 'BDT 300', 'assets/images/items/2015-08-31/62.jpg', 1, '2015-08-31 11:42:39'),
(37, 44, 'Fish N Chips', 'Add A New Item', 'Calamari Fry (Garlic Mayo)', '14-16 Pcs with choice of Garlic Mayo Sauce', 'BDT 350', ' ', 'assets/images/items/2015-08-31/1.jpg', 1, '2015-08-31 11:45:19'),
(38, 44, 'Fish N Chips', 'Add A New Item', 'Calamari Fry (Tartar Sauce)', '14-16 Pcs with choice of Garlic Tartar Sauce', 'BDT 340', ' ', 'assets/images/items/2015-08-31/11.jpg', 1, '2015-08-31 11:46:32'),
(39, 44, 'Fries & Salad', 'Add A New Item', 'French Fries', 'Crispy deep-fried potato fries.', 'BDT 75', ' ', 'assets/images/items/2015-08-31/63.jpg', 1, '2015-08-31 11:47:35'),
(40, 44, 'Fries & Salad', 'Add A Special Offer', 'Crispy Fried CK x 1', 'Crispy fried chicken with crunchy skin and soft tender meat.', 'BDT 85', 'BDT 75', 'assets/images/items/2015-08-31/64.jpg', 1, '2015-08-31 11:49:57'),
(41, 44, 'Dinner', 'Add A New Item', 'Kacchi Biryani', 'yyyyyyyyyyyy', 'BDT 200', ' ', 'assets/images/items/2015-08-31/k.png', 1, '2015-08-31 11:55:37'),
(42, 44, 'Lunch', 'Add A New Item', 'Tehari', 'gggggggggggg', 'BDT 150', ' ', 'assets/images/items/2015-08-31/t.jpg', 1, '2015-08-31 11:58:13'),
(43, 44, 'Soup', 'Add A New Item', 'Thai Soup', 'sssssssss', 'BDT 100', ' ', 'assets/images/items/2015-08-31/t1.jpg', 1, '2015-08-31 12:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant`
--

CREATE TABLE `tbl_restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_restaurant`
--

INSERT INTO `tbl_restaurant` (`restaurant_id`, `name`, `username`, `email`, `password`, `status`, `date`) VALUES
(44, 'ABC Food Restaurant', 'abc', 'anikdpi@gmail.com', '4b966ce4a0a55919a9b23bfe92183490', 1, '2015-08-31 11:11:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbl_information`
--
ALTER TABLE `tbl_information`
  ADD PRIMARY KEY (`info_id`),
  ADD UNIQUE KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`);
ALTER TABLE `tbl_item` ADD FULLTEXT KEY `item_name` (`item_name`,`about`);

--
-- Indexes for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD UNIQUE KEY `username` (`username`,`email`);
ALTER TABLE `tbl_restaurant` ADD FULLTEXT KEY `name` (`name`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_information`
--
ALTER TABLE `tbl_information`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_restaurant`
--
ALTER TABLE `tbl_restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
