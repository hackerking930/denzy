-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 11:04 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denzys`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(5, 'Top'),
(6, 'TRest'),
(7, 'Developer'),
(8, 'WOMEN TEES');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`) VALUES
(8, 'DEV');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `addr` varchar(655) NOT NULL,
  `tc` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `cid` varchar(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `coupon` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `odate` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passreset`
--

CREATE TABLE `passreset` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `expired` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `preview`
--

CREATE TABLE `preview` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `pdesc` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `stock` bigint(20) NOT NULL,
  `pimg` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `psize` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `price`, `pdesc`, `brand`, `stock`, `pimg`, `category`, `gender`, `psize`) VALUES
(21, 'MEN BLACK TSHIRT', 500, 'Solid Black Tshirt for mens', 'JOCKEY', 25, 'men.jpg', 'TRest', 'Male', 'L'),
(22, 'DEVELOPER TSHIRT', 1500, 'APPLE DEVELOPER TSHIRT', 'APPLE', 52, 'tshirt.jpg', 'TRest', 'Male', 'XL'),
(23, 'WOMEN TSHIRT', 600, '100% Cotton Tshirt for Womens', 'ZARA', 25, 'women2.jpg', 'WOMEN TEES', 'Female', 'S'),
(24, 'STYLISH TSHIRT', 500, 'Designer Top for Women', 'TOMMY HILFIGER', 12, 'women.jpg', 'Top', 'Female', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `s21`
--

CREATE TABLE `s21` (
  `id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s21`
--

INSERT INTO `s21` (`id`, `month`, `sale`) VALUES
(1, 'January', 0),
(2, 'February', 0),
(3, 'March', 0),
(4, 'April', 5),
(5, 'May', 0),
(6, 'June', 0),
(7, 'July', 0),
(8, 'August', 0),
(9, 'September', 0),
(10, 'October', 0),
(11, 'November', 0),
(12, 'December', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `addres` varchar(655) NOT NULL,
  `tc` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phno`, `addres`, `tc`, `state`, `zipcode`, `password`) VALUES
(5, 'Om', 'Jadhav', 'om@gmail.com', 7218896568, 'Dipti Sky City', 'Padgha', 'Maharashtra', 421001, 'omis'),
(7, 'OMI', 'Bhai', 'omya@gmail.com', 7218896568, 'Dipti', 'Kalyan', 'Maharashtra', 421001, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passreset`
--
ALTER TABLE `passreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preview`
--
ALTER TABLE `preview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s21`
--
ALTER TABLE `s21`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `passreset`
--
ALTER TABLE `passreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `preview`
--
ALTER TABLE `preview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `s21`
--
ALTER TABLE `s21`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
