-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 11:03 AM
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
(10, 'athena', 'athena', '../profile_picture/ejie4.jpg', 'Athena Joy Barola Campania', 20, 'San Jose, Sogod Southern Leyte 6606 Atbang Emirates dapit Vet na Vet sulod lang sa kanto');

-- --------------------------------------------------------

--
-- Table structure for table `cart_pending`
--

CREATE TABLE `cart_pending` (
  `id` int(11) NOT NULL,
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

INSERT INTO `cart_pending` (`id`, `item_name`, `item_price`, `item_source`, `buyer_fullname`, `buyer_location`, `buyer_age`, `seller`) VALUES
(1, 'brown polo shirt for women', '10$', 'T-bunny Shirts', 'Athena Joy Barola Campania', 'San Jose, Sogod Southern Leyte 6606 Atbang Emirates dapit Vet na Vet sulod lang sa kanto', 20, 'Ejie Cabales Florida'),
(3, 'Black Dress for women', '12$', 'T-bunny Shirts', 'Athena Joy Barola Campania', 'San Jose, Sogod Southern Leyte 6606 Atbang Emirates dapit Vet na Vet sulod lang sa kanto', 20, 'Ejie Cabales Florida');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_source` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `img`, `item_name`, `item_price`, `item_source`, `seller`) VALUES
(44, '../items/i4.jpg', 'brown polo shirt for women', '10$', 'T-bunny Shirts', 'Ejie Cabales Florida'),
(45, '../items/i6.jpg', 'Black Dress for women', '12$', 'T-bunny Shirts', 'Ejie Cabales Florida'),
(49, '../items/i11.jpg', 'Green T-Shirt for women', '9$', 'T-bunny Shirts', 'Ejie Cabales Florida'),
(50, '../items/i17.jpg', 'Pink T-Shirt for women', '9$', 'JeansB', 'Ejie Cabales Florida');

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
(21, 'ejie', 'ejie', '../profile_picture/default.jpg', 'Ejie Cabales Florida', 'be Good Be Happy Everyday Code well seller', 19);

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
(33, 'T-bunny Shirts', '../Store_Pic/defaultPic.jpg', 'ejie', '09091273962', 'ejieflorida001@gmail.com'),
(34, 'JeansB', '../Store_Pic/defaultPic.jpg', 'ejie', '09123846123', 'ejieflorida002@gmail.com'),
(35, 'PoloV', '../Store_Pic/defaultPic.jpg', 'ejie', '09123846123', 'ejieflorida003@gmail.com'),
(36, 'b-biew', '../Store_Pic/defaultPic.jpg', 'ejie', '09123846123', 'ejieflorida004@gmail.com'),
(37, 'c_yuppy', '../Store_Pic/defaultPic.jpg', 'ejie', '09123846123', 'ejieflorida005@gmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_pending`
--
ALTER TABLE `cart_pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `seller_account`
--
ALTER TABLE `seller_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
