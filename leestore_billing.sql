-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 08:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leestore_billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_type` varchar(15) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '1-active, 2-delete',
  `date_modified` datetime NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `admin_type`, `status`, `date_modified`, `date_added`) VALUES
(1, 'Lee', 'Lee@123', 'super_admin', 1, '2024-09-12 17:17:53', '2024-09-12 17:17:53'),
(2, 'Prithiv', 'prithiv@11', 'admin', 1, '2024-09-12 17:18:07', '2024-09-12 17:18:07'),
(3, 'seller', 'seller@24', 'seller', 1, '2024-09-12 17:19:07', '2024-09-12 17:19:07'),
(4, 'Kevin', 'kevin@12', 'seller', 1, '2024-09-12 17:19:57', '2024-09-12 17:19:57'),
(5, 'Bala', 'bala@14', 'seller', 1, '2024-09-12 17:20:23', '2024-09-12 17:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `details` varchar(50) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `details`, `status`, `date_added`, `date_modified`) VALUES
(1, 'Charger', 'test', 1, '2024-09-22 14:47:26', '2024-09-22 16:12:18'),
(2, 'Mobiles', 'Smart mobiles', 1, '2024-09-22 16:29:49', '0000-00-00 00:00:00'),
(3, 'Cable', 'Charger Cables', 1, '2024-09-23 07:41:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '1-active, 2-delete',
  `date_modified` datetime NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone_number`, `address`, `status`, `date_modified`, `date_added`) VALUES
(1, 'Fred', '9789850401', 'East 8th St, Pudukkottai', 1, '2024-09-12 22:10:11', '2024-09-23 10:38:27'),
(3, 'Prince', '8903340809', '', 1, '2024-09-23 10:40:22', '2024-09-23 10:38:41'),
(4, 'Sathya', '6789876579', '', 1, '0000-00-00 00:00:00', '2024-09-23 10:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `full_name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_type` varchar(10) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(7) NOT NULL,
  `profile_image` varchar(15) NOT NULL,
  `document` varchar(15) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '1-active, 2-delete',
  `date_modified` datetime NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `full_name`, `email`, `user_name`, `password`, `role_type`, `phone_number`, `address`, `birthdate`, `gender`, `profile_image`, `document`, `status`, `date_modified`, `date_added`) VALUES
(1, 'Lee', 'lee@gmail.com', 'Lee', 'Lee@123', 'admin', '9994578802', 'Nijam colony, Pudukkottai', '2024-09-04', 'male', '', '', 1, '2024-09-23 12:02:35', '2024-09-12 17:17:53'),
(2, 'Prithiv', '', '', 'prithiv@11', 'biller', '9626531146', 'Nijam Colony, Pudukkottai', '1996-09-06', '', '', '', 1, '2024-09-23 11:58:50', '2024-09-12 17:18:07'),
(3, 'Freddie', '', '', 'fred@13', '', '9789850402', 'East 7th Street, Pudukkottai', '1991-03-13', '', '', '', 2, '2024-09-12 17:19:07', '2024-09-12 17:19:07'),
(4, 'Kevin', '', '', 'kevin@12', '', '8608223911', 'East 7th Street, Pudukkottai', '2002-09-06', '', '', '', 1, '2024-09-12 17:19:57', '2024-09-12 17:19:57'),
(5, 'Bala', '', '', 'bala@14', '', '1234567898', 'Pudukkottai', '2002-09-06', '', '', '', 1, '2024-09-14 19:04:03', '2024-09-12 17:20:23'),
(6, 'Ganesh', 'ganesh@gmail.com', 'ganesh', 'ganesh11', '', '9080706050', 'test address', '0000-00-00', 'male', '', '', 1, '2024-09-22 18:44:45', '2024-09-22 18:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `godown`
--

CREATE TABLE `godown` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `no_of_stock` int(5) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `godown`
--

INSERT INTO `godown` (`id`, `product_id`, `supplier_id`, `no_of_stock`, `status`, `date_added`, `date_modified`) VALUES
(1, 2, 0, 9, 1, '2024-09-23 09:01:56', '0000-00-00 00:00:00'),
(2, 1, 1, 5, 1, '2024-09-23 09:03:27', '0000-00-00 00:00:00'),
(3, 1, 1, 15, 1, '2024-09-23 09:08:54', '2024-09-23 10:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `brand_name` varchar(25) NOT NULL,
  `category_id` int(11) NOT NULL,
  `imei_number1` varchar(25) NOT NULL,
  `imei_number2` varchar(25) NOT NULL,
  `serial_number` varchar(25) NOT NULL,
  `price` varchar(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `brand_name`, `category_id`, `imei_number1`, `imei_number2`, `serial_number`, `price`, `status`, `date_added`, `date_modified`) VALUES
(1, 'IPhone 13 Pro', '', 1, '', '', '', '1600', 1, '2024-09-22 15:51:22', '2024-09-22 16:29:13'),
(2, 'IPhone 14 Pro', 'Apple', 2, '8645666655', '4990998809', '779889668', '12000', 1, '2024-09-22 16:30:24', '2024-09-22 16:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `details` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `phone_number`, `details`, `status`, `date_added`, `date_modified`) VALUES
(1, 'Cellworld', '9900887766', 'test', 1, '2024-09-23 09:03:27', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `godown`
--
ALTER TABLE `godown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `godown`
--
ALTER TABLE `godown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
