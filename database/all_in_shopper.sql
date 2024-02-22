-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 07:44 AM
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
(1, 'ejie', 'ejie', '../profile_picture/default.jpg', 'Please input information!', 0, 'Please put your designated location for delivery!'),
(2, 'buyer1', 'buyer1', '../profile_picture/ejie4.jpg', 'Ejie C. Florida', 19, 'Pinaskohan, Maasin City, Southern Leyte, 6600');

-- --------------------------------------------------------

--
-- Table structure for table `cancelled`
--

CREATE TABLE `cancelled` (
  `id` int(11) NOT NULL,
  `cartPendingId` int(11) NOT NULL,
  `BuyerId` int(11) NOT NULL,
  `SellerId` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_source` varchar(255) NOT NULL,
  `buyer_fullname` varchar(255) NOT NULL,
  `buyer_location` varchar(255) NOT NULL,
  `buyer_age` int(11) NOT NULL,
  `seller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancelled`
--

INSERT INTO `cancelled` (`id`, `cartPendingId`, `BuyerId`, `SellerId`, `item_name`, `item_price`, `item_source`, `buyer_fullname`, `buyer_location`, `buyer_age`, `seller`) VALUES
(1, 3, 2, 3, 'Hoodies Korean Fashion Loose Oversize', '27$', 'T-Tops Hood', 'Ejie C. Florida', 'Pinaskohan, Maasin City, Southern Leyte, 6600', 19, 'Andrew M. Smith');

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
(2, 2, 2, ' Pants For Men Straight Leg Denim Jeans', '21$', 'J-jeans', 'Ejie C. Florida', 'Pinaskohan, Maasin City, Southern Leyte, 6600', 19, 'Aleshia B. Curry'),
(3, 2, 2, ' Pants For Men Straight Leg Denim Jeans', '23$', 'J-jeans', 'Ejie C. Florida', 'Pinaskohan, Maasin City, Southern Leyte, 6600', 19, 'Aleshia B. Curry'),
(6, 2, 2, 'Casual Tees round neck printed graphic shirt ', '14$', 'Up-Style', 'Ejie C. Florida', 'Pinaskohan, Maasin City, Southern Leyte, 6600', 19, 'Aleshia B. Curry'),
(8, 2, 3, 'Casual shorts men five-pointpants Korean', '14$', 'Down Steep', 'Ejie C. Florida', 'Pinaskohan, Maasin City, Southern Leyte, 6600', 19, 'Andrew M. Smith'),
(10, 2, 3, 'Brown T-Shirt for Women', '13$', 'T-Tops Hood', 'Ejie C. Florida', 'Pinaskohan, Maasin City, Southern Leyte, 6600', 19, 'Andrew M. Smith');

-- --------------------------------------------------------

--
-- Table structure for table `complete_order`
--

CREATE TABLE `complete_order` (
  `id` int(11) NOT NULL,
  `cartPendingId` int(11) NOT NULL,
  `BuyerId` int(11) NOT NULL,
  `SellerId` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_source` varchar(255) NOT NULL,
  `buyer_fullname` varchar(255) NOT NULL,
  `buyer_location` varchar(255) NOT NULL,
  `buyer_age` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complete_order`
--

INSERT INTO `complete_order` (`id`, `cartPendingId`, `BuyerId`, `SellerId`, `item_name`, `item_price`, `item_source`, `buyer_fullname`, `buyer_location`, `buyer_age`, `seller`) VALUES
(1, 1, 2, 2, 'Mom Jeans HighWaist WIDE LEG Jeans', '19$', 'J-jeans', 'Ejie C. Florida', 'Pinaskohan, Maasin City, Southern Leyte, 6600', '19', 'Aleshia B. Curry');

-- --------------------------------------------------------

--
-- Table structure for table `confirmedorder`
--

CREATE TABLE `confirmedorder` (
  `id` int(11) NOT NULL,
  `cartPendingId` int(11) NOT NULL,
  `BuyerId` int(11) NOT NULL,
  `SellerId` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_source` varchar(255) NOT NULL,
  `buyer_fullname` varchar(255) NOT NULL,
  `buyer_location` varchar(255) NOT NULL,
  `buyer_age` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(10, 2, '../items/ab23b1ffc24d3585f69021fd8aa038af.jpg', 'Mom Jeans HighWaist WIDE LEG Jeans', '21$', 'J-jeans', 'Aleshia B. Curry'),
(11, 2, '../items/sg-11134201-22100-74r2deupkoivfb.jpg', 'Mom Jeans HighWaist WIDE LEG Jeans', '19$', 'J-jeans', 'Aleshia B. Curry'),
(12, 2, '../items/sg-11134201-22100-mcli3a3pkoiv7d.jpg', 'Mom Jeans HighWaist WIDE LEG Jeans', '22$', 'J-jeans', 'Aleshia B. Curry'),
(14, 2, '../items/sg-11134201-22100-xx0cjlxpkoivbb.jpg', 'Mom Jeans HighWaist WIDE LEG Jeans', '23$', 'J-jeans', 'Aleshia B. Curry'),
(15, 2, '../items/ph-11134207-7r98p-lo3jymrrjgx5de.jpg', ' Pants For Men Straight Leg Denim Jeans', '23$', 'J-jeans', 'Aleshia B. Curry'),
(16, 2, '../items/ph-11134207-7r98u-lo3jymrrtaw9a6.jpg', ' Pants For Men Straight Leg Denim Jeans', '21$', 'J-jeans', 'Aleshia B. Curry'),
(17, 2, '../items/ph-11134207-7r98w-lo3jymrrma2105.jpg', ' Pants For Men Straight Leg Denim Jeans', '21$', 'J-jeans', 'Aleshia B. Curry'),
(18, 2, '../items/ph-11134207-7r990-lo3jymrrp36x1e.jpg', ' Pants For Men Straight Leg Denim Jeans', '24$', 'J-jeans', 'Aleshia B. Curry'),
(19, 2, '../items/ph-11134207-7r992-lo3jymrrkvhlfe.jpg', ' Pants For Men Straight Leg Denim Jeans', '23$', 'J-jeans', 'Aleshia B. Curry'),
(21, 2, '../items/6b5b719112aa4705e1f3fa03cb3c52bd.jpg', 'Casual Tees round neck printed graphic shirt ', '14$', 'Up-Style', 'Aleshia B. Curry'),
(22, 2, '../items/51efb895fda5b8764d9250e68a3bc19b.jpg', 'Casual Tees round neck printed graphic shirt', '11$', 'Up-Style', 'Aleshia B. Curry'),
(23, 2, '../items/90c09345a7df958f963bfa5e133d4c38.jpg', 'Casual Tees round neck printed graphic shirt ', '13$', 'Up-Style', 'Aleshia B. Curry'),
(24, 2, '../items/ad1c2b1c3b530a38f6694425e8fa03ef.jpg', 'Casual Tees round neck printed graphic shirt', '13$', 'Up-Style', 'Aleshia B. Curry'),
(25, 2, '../items/e49d3aa4eb7c156cab1debe39fd68357.jpg', 'Casual Tees round neck printed graphic shirt', '15$', 'Up-Style', 'Aleshia B. Curry'),
(26, 2, '../items/ph-11134207-7r992-loeubypgpcud06.jpg', 'Korean Oversized T-shirt For Men Casual', '17$', 'Up-Style', 'Aleshia B. Curry'),
(27, 2, '../items/ph-11134207-7r98u-loeubypggxfpfd.jpg', 'Korean Oversized T-shirt For Men Casual', '18$', 'Up-Style', 'Aleshia B. Curry'),
(28, 2, '../items/ph-11134207-7r98p-loeubypgfiv97c.jpg', 'Korean Oversized T-shirt For Men Casual', '16$', 'Up-Style', 'Aleshia B. Curry'),
(29, 3, '../items/i1.jpg', 'Ecokauer polo Shirt Women Fake Two-Piece College', '24$', 'T-Tops Hood', 'Andrew M. Smith'),
(30, 3, '../items/i2.jpg', 'Ecokauer polo Shirt Women Fake Two-Piece College', '26$', 'T-Tops Hood', 'Andrew M. Smith'),
(31, 3, '../items/i3.jpg', 'Ecokauer polo Shirt Women Fake Two-Piece College', '25$', 'T-Tops Hood', 'Andrew M. Smith'),
(32, 3, '../items/i4.jpg', 'Brown Polo for Women', '17$', 'T-Tops Hood', 'Andrew M. Smith'),
(33, 3, '../items/i5.jpg', 'Biege Polo for Women', '17$', 'T-Tops Hood', 'Andrew M. Smith'),
(34, 3, '../items/i10.jpg', 'White T-Shirt for Women', '13$', 'T-Tops Hood', 'Andrew M. Smith'),
(35, 3, '../items/i11.jpg', 'Green T-Shirt for Women', '13$', 'T-Tops Hood', 'Andrew M. Smith'),
(36, 3, '../items/i12.jpg', 'Brown T-Shirt for Women', '13$', 'T-Tops Hood', 'Andrew M. Smith'),
(37, 3, '../items/i13.jpg', 'Light Grey T-Shirt for Women', '13$', 'T-Tops Hood', 'Andrew M. Smith'),
(38, 3, '../items/i16.jpg', 'Blue Grey T-Shirt for Women', '13$', 'T-Tops Hood', 'Andrew M. Smith'),
(39, 3, '../items/146a264b26c9b861ada597c6baaa6db9.jpg', 'Hoodies Korean Fashion Loose Oversize', '27$', 'T-Tops Hood', 'Andrew M. Smith'),
(40, 3, '../items/3c77923025baf630ca778eeb29fb6b99.jpg', 'Hoodies Korean Fashion Loose Oversize', '27$', 'T-Tops Hood', 'Andrew M. Smith'),
(41, 3, '../items/314cb1a67776a4e6c4d277b031a5aa9d.jpg', 'Hoodies Korean Fashion Loose Oversize', '27$', 'T-Tops Hood', 'Andrew M. Smith'),
(43, 3, '../items/ph-11134207-7qul8-lhpyklfefu93f0.jpg', 'Casual shorts men five-pointpants Korean', '14$', 'Down Steep', 'Andrew M. Smith'),
(44, 3, '../items/ph-11134207-7qul1-lhpyklfek1yf02.jpg', 'Casual shorts men five-pointpants Korean', '14$', 'Down Steep', 'Andrew M. Smith'),
(45, 3, '../items/ph-11134207-7qul0-lhpyklfeindz10.jpg', 'Casual shorts men five-pointpants Korean', '14$', 'Down Steep', 'Andrew M. Smith'),
(46, 3, '../items/ph-11134207-7qukx-lhpyklfemv3b63.jpg', 'Casual shorts men five-pointpants Korean', '14$', 'Down Steep', 'Andrew M. Smith'),
(47, 3, '../items/sg-11134201-7qvev-ljgq88z6k3de2a.jpg', ' Elegant Plaid Pocket Roll Up Women Shorts', '11$', 'Down Steep', 'Andrew M. Smith'),
(48, 3, '../items/sg-11134201-22120-zwz8983xwjkv41.jpg', 'Casual Solid Drawstring Shorts for Woman', '9$', 'Down Steep', 'Andrew M. Smith'),
(49, 3, '../items/sg-11134201-22120-gxmqce4xwjkv7b.jpg', 'Casual Solid Drawstring Shorts for Woman', '9$', 'Down Steep', 'Andrew M. Smith'),
(50, 3, '../items/ph-11134207-7qul4-lh5ljbjeriqo40.jpg', 'Cargo SEXY Short with 2 pocket and cord', '11$', 'Down Steep', 'Andrew M. Smith'),
(51, 3, '../items/ph-11134207-7qul9-lh5ljbjeq4684b.jpg', 'Cargo SEXY Short with 2 pocket and cord', '10$', 'Down Steep', 'Andrew M. Smith'),
(52, 3, '../items/ph-11134207-7qukx-lh5ljbjesxb46f.jpg', 'Cargo SEXY Short with 2 pocket and cord', '10$', 'Down Steep', 'Andrew M. Smith'),
(53, 3, '../items/ph-11134207-7qul2-lh5ljbjeubvka3.jpg', 'Cargo SEXY Short with 2 pocket and cord', '12$', 'Down Steep', 'Andrew M. Smith'),
(54, 3, '../items/ph-11134207-7qul3-lh5ljbjevqg022.jpg', 'Cargo SEXY Short with 2 pocket and cord', '12$', 'Down Steep', 'Andrew M. Smith'),
(55, 3, '../items/ph-11134207-7qul5-lh5ljbjeyjkwc0.jpg', 'Cargo SEXY Short with 2 pocket and cord', '14$', 'Down Steep', 'Andrew M. Smith'),
(56, 2, '../items/sg-11134201-23010-576mwrse9vmv6b.jpg', 'Toto Berry Color T- Shirt', '11$', 'Up-Style', 'Aleshia B. Curry'),
(57, 2, '../items/sg-11134201-23010-53537tte9vmv50.jpg', 'Toto Berry Color T- Shirt', '12$', 'Up-Style', 'Aleshia B. Curry'),
(58, 2, '../items/sg-11134201-23010-c077erte9vmv95.jpg', 'Toto Berry Color T- Shirt', '12$', 'Up-Style', 'Aleshia B. Curry'),
(59, 2, '../items/sg-11134201-23010-oy7ktite9vmv99.jpg', 'Toto Berry Color T- Shirt', '12$', 'Up-Style', 'Aleshia B. Curry'),
(60, 2, '../items/sg-11134201-23010-tghzowte9vmv0d.jpg', 'Toto Berry Color T- Shirt', '12$', 'Up-Style', 'Aleshia B. Curry'),
(61, 2, '../items/sg-11134201-23010-tl9d1xse9vmv11.jpg', 'Toto Berry Color T- Shirt', '12$', 'Up-Style', 'Aleshia B. Curry'),
(62, 2, '../items/sg-11134201-23010-uklk0hte9vmv82.jpg', 'Toto Berry Color T- Shirt', '12$', 'Up-Style', 'Aleshia B. Curry');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `id` int(11) NOT NULL,
  `cartPendingId` int(11) NOT NULL,
  `BuyerId` int(11) NOT NULL,
  `SellerId` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_source` varchar(255) NOT NULL,
  `buyer_fullname` varchar(255) NOT NULL,
  `buyer_location` varchar(255) NOT NULL,
  `buyer_age` int(11) NOT NULL,
  `seller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`id`, `cartPendingId`, `BuyerId`, `SellerId`, `item_name`, `item_price`, `item_source`, `buyer_fullname`, `buyer_location`, `buyer_age`, `seller`) VALUES
(2, 5, 2, 2, 'Casual Tees round neck printed graphic shirt ', '14$', 'Up-Style', 'Ejie C. Florida', 'Pinaskohan, Maasin City, Southern Leyte, 6600', 19, 'Aleshia B. Curry'),
(4, 4, 2, 2, ' Pants For Men Straight Leg Denim Jeans', '24$', 'J-jeans', 'Ejie C. Florida', 'Pinaskohan, Maasin City, Southern Leyte, 6600', 19, 'Aleshia B. Curry'),
(5, 9, 2, 3, 'Cargo SEXY Short with 2 pocket and cord', '11$', 'Down Steep', 'Ejie C. Florida', 'Pinaskohan, Maasin City, Southern Leyte, 6600', 19, 'Andrew M. Smith');

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
(2, 'seller1', 'seller1', '../profile_picture/aiony-haust-3TLl_97HNJo-unsplash.jpg', 'Aleshia B. Curry', 'Embrace each day as an opportunity for growth, cultivate kindness in all interactions, and pursue your passions relentlessly, for in the pursuit lies fulfillment and purpose. Let your actions be guided by integrity, your decisions by wisdom, and your heart by compassion.', 27),
(3, 'seller2', 'seller2', '../profile_picture/ian-dooley-d1UPkiFd04A-unsplash.jpg', 'Andrew M. Smith', 'Cultivate gratitude for the blessings bestowed upon you, while striving to uplift others through compassion and empathy.', 25);

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
(1, 'J-jeans', '../Store_Pic/defaultPic.jpg', 'J-jeans', '09123281627', 'AleshiaCurry01@gmail.com'),
(2, 'Up-Style', '../Store_Pic/defaultPic.jpg', 'seller1', '09123321231', 'AleshiaCurry01@gmail.com'),
(3, 'J-jeans', '../Store_Pic/defaultPic.jpg', 'seller1', '09123912396', 'AleshiaCurry01@gmail.com'),
(4, 'T-Tops Hood', '../Store_Pic/defaultPic.jpg', 'seller2', '09231839421', 'AndrewSmith03@gmail.com'),
(5, 'Down Steep', '../Store_Pic/defaultPic.jpg', 'seller2', '09123462843', 'AndrewSmith03@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_account`
--
ALTER TABLE `buyer_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancelled`
--
ALTER TABLE `cancelled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_pending`
--
ALTER TABLE `cart_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complete_order`
--
ALTER TABLE `complete_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmedorder`
--
ALTER TABLE `confirmedorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cancelled`
--
ALTER TABLE `cancelled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_pending`
--
ALTER TABLE `cart_pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complete_order`
--
ALTER TABLE `complete_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `confirmedorder`
--
ALTER TABLE `confirmedorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seller_account`
--
ALTER TABLE `seller_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
