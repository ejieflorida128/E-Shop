-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 01:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `all_in_shopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_account`
--

CREATE TABLE `buyer_account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `location` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_account`
--

INSERT INTO `buyer_account` (`id`, `username`, `password`, `profile_pic`, `fullname`, `age`, `location`) VALUES
(11, 'buyer1', 'buyer1', '../profile_picture/default.jpg', 'Buyer1', 20, 'I represent Buyer no. 1'),
(12, 'buyer2', 'buyer2', '../profile_picture/default.jpg', 'Buyer 2', 19, 'I represent buyer no. 2');

-- --------------------------------------------------------

--
-- Table structure for table `cart_pending`
--

CREATE TABLE `cart_pending` (
  `id` int(11) NOT NULL,
  `BuyerId` int(11) NOT NULL,
  `SellerId` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_source` varchar(255) NOT NULL,
  `buyer_fullname` varchar(255) NOT NULL,
  `buyer_location` text NOT NULL,
  `buyer_age` int(11) NOT NULL,
  `seller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_pending`
--

INSERT INTO `cart_pending` (`id`, `BuyerId`, `SellerId`, `item_name`, `item_price`, `item_source`, `buyer_fullname`, `buyer_location`, `buyer_age`, `seller`) VALUES
(16, 11, 22, 'Biege Polo long sleeve for women', '9$', 'seller1', 'Buyer1', 'I represent Buyer no. 1', 20, 'Seller 1'),
(17, 11, 22, 'Blue Polo long sleeve for women', '9$', 'seller1', 'Buyer1', 'I represent Buyer no. 1', 20, 'Seller 1'),
(18, 11, 22, 'Blue Polo long sleeve for women', '9$', 'seller1', 'Buyer1', 'I represent Buyer no. 1', 20, 'Seller 1'),
(19, 11, 23, 'Blue T-Shirt for women', '8$', 'Seller2', 'Buyer1', 'I represent Buyer no. 1', 20, 'Seller 2'),
(20, 12, 22, 'Brown polo for women', '9$', 'seller1', 'Buyer 2', 'I represent buyer no. 2', 19, 'Seller 1'),
(21, 12, 23, 'Blue T-Shirt for women', '8$', 'Seller2', 'Buyer 2', 'I represent buyer no. 2', 19, 'Seller 2'),
(22, 11, 23, 'Blue T-Shirt for women', '8$', 'Seller2', 'Buyer1', 'I represent Buyer no. 1', 20, 'Seller 2'),
(23, 11, 23, 'Blue T-Shirt for women', '8$', 'Seller2', 'Buyer1', 'I represent Buyer no. 1', 20, 'Seller 2');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `SellerId` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_source` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `SellerId`, `img`, `item_name`, `item_price`, `item_source`, `seller`) VALUES
(66, 22, '../items/i1.jpg', 'Biege Polo long sleeve for women', '9$', 'seller1', 'Seller 1'),
(67, 22, '../items/i2.jpg', 'Blue Polo long sleeve for women', '9$', 'seller1', 'Seller 1'),
(68, 22, '../items/i20.jpg', 'Light Brown T-Shirt for women', '9$', 'seller1', 'Seller 1'),
(69, 22, '../items/i19.jpg', 'Light Brown T-Shirt for women', '9$', 'seller1', 'Seller 1'),
(70, 22, '../items/i4.jpg', 'Brown polo for women', '9$', 'seller1', 'Seller 1'),
(71, 23, '../items/i11.jpg', 'Green T-Shirt for women', '8$', 'Seller2', 'Seller 2'),
(72, 23, '../items/i16.jpg', 'Blue T-Shirt for women', '8$', 'Seller2', 'Seller 2');

-- --------------------------------------------------------

--
-- Table structure for table `seller_account`
--

CREATE TABLE `seller_account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_account`
--

INSERT INTO `seller_account` (`id`, `username`, `password`, `profile_pic`, `fullname`, `bio`, `age`) VALUES
(22, 'seller1', 'seller1', '../profile_picture/default.jpg', 'Seller 1', 'i represent seller 1', 20),
(23, 'seller2', 'seller2', '../profile_picture/default.jpg', 'Seller 2', 'I represent Seller no. 2', 19);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_pic` varchar(255) NOT NULL,
  `shop_creator` varchar(255) NOT NULL,
  `shop_contactNo` varchar(255) NOT NULL,
  `shop_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `shop_pic`, `shop_creator`, `shop_contactNo`, `shop_email`) VALUES
(38, 'seller1', '../Store_Pic/defaultPic.jpg', 'seller1', '09934762718', 'seller1@gmail.com'),
(39, 'Seller2', '../Store_Pic/defaultPic.jpg', 'seller2', '09123826739', 'seller2@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_account`
--
ALTER TABLE `buyer_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_pending`
--
ALTER TABLE `cart_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_account`
--
ALTER TABLE `seller_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_account`
--
ALTER TABLE `buyer_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_pending`
--
ALTER TABLE `cart_pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `seller_account`
--
ALTER TABLE `seller_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
