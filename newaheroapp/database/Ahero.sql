-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2020 at 09:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ahero`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`username`, `email`, `password`) VALUES
('john', 'ambrosedeh@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `aheroresearch`
--

CREATE TABLE `aheroresearch` (
  `employee_id` int(50) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aheroresearch`
--

INSERT INTO `aheroresearch` (`employee_id`, `employee_name`, `email`, `role`, `status`) VALUES
(7, 'mikel', 'mal@gmail.com', 'farmero', 'approved'),
(8, 'wa', 'wa@gmail.com', 'landspeialist', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','archived') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `email`, `location`, `status`) VALUES
(42, 'joe', 'ambrosedeh@gmail.com', 'kisumu  ', 'rejected'),
(43, 'mike', 'den@gmail.com', 'tao  ', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(50) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `van_id` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_name`, `email`, `van_id`, `status`) VALUES
(8, 'joe', 'joe@gmail.com', '11', 'rejected'),
(9, 'johnny', 'johny@gmail.com', '', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmer_id` int(50) NOT NULL,
  `farmer_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `farm_id` varchar(50) NOT NULL,
  `farm_name` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`farmer_id`, `farmer_name`, `email`, `farm_id`, `farm_name`, `status`) VALUES
(5, 'johny', 'd@gmail.com', '12', 'patoat', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `farm_id` int(50) NOT NULL,
  `farm_name` varchar(50) NOT NULL,
  `household_id` varchar(50) NOT NULL,
  `household_name` varchar(50) NOT NULL,
  `size` int(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`farm_id`, `farm_name`, `household_id`, `household_name`, `size`, `status`) VALUES
(1, 'magoooooo', '111', 'patanoi', 114, 'approved'),
(4, 'mag', '1', 'patanoa', 22, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `message_id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `status` enum('read','unread') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`message_id`, `email`, `message`, `status`) VALUES
(1, '', '0', 'unread'),
(2, 'pato@gmail.com', 'good work elton', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `finishedproducts`
--

CREATE TABLE `finishedproducts` (
  `product_id` int(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` text NOT NULL,
  `quantity` int(50) NOT NULL,
  `mill_id` varchar(50) DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` enum('pending','rejected','approved','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finishedproducts`
--

INSERT INTO `finishedproducts` (`product_id`, `product_name`, `category`, `quantity`, `mill_id`, `image`, `price`, `status`) VALUES
(8, 'mai', 'tomato', 888, '12', 0x6261736d6174692d3231372d726963652d353030783530302e6a7067, 234, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `mills`
--

CREATE TABLE `mills` (
  `mill_id` int(50) NOT NULL,
  `miller_id` varchar(50) NOT NULL,
  `miller_name` varchar(50) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mills`
--

INSERT INTO `mills` (`mill_id`, `miller_id`, `miller_name`, `location`, `status`) VALUES
(1, '22', 'allenologo', 'bananaa', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE `oders` (
  `oder_id` int(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`oder_id`, `product_id`, `product_name`, `customer_id`, `status`) VALUES
(1, '2', 'pishori', '5', 'rejected'),
(2, '5', 'pishorib', '7', 'rejected'),
(3, '5', 'trrt', '7', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `rawproducts`
--

CREATE TABLE `rawproducts` (
  `product_id` int(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `farm_id` int(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawproducts`
--

INSERT INTO `rawproducts` (`product_id`, `product_name`, `quantity`, `farm_id`, `supplier`, `status`) VALUES
(118, 'menou', 88, 33, 'likee', 'rejected'),
(119, 'maixe', 11, 2, 'pen', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `oder_id` int(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `product_id`, `product_name`, `quantity`, `price`, `oder_id`, `status`) VALUES
(3, 1, 'pal', 11, 234, 5, 'pending'),
(4, 2, 'patol', 12, 13, 37, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `oder_id` varchar(50) NOT NULL,
  `driver_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `status`) VALUES
(11, 'hermans', 'hermans@gmail.com', '111', 'landot', 'approved'),
(12, 'mike', 'trench@gmail', '11123', 'v', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouse_id` int(50) NOT NULL,
  `warehouse_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `storekeeper_id` int(50) NOT NULL,
  `storekeeper_name` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `warehouse_name`, `location`, `storekeeper_id`, `storekeeper_name`, `status`) VALUES
(10, 'jenipher', 'mbaga', 11, 'matil', 'rejected'),
(11, 'sako', 'nde', 6, 'inno', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aheroresearch`
--
ALTER TABLE `aheroresearch`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`farm_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `finishedproducts`
--
ALTER TABLE `finishedproducts`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `mill_id` (`mill_id`);

--
-- Indexes for table `mills`
--
ALTER TABLE `mills`
  ADD PRIMARY KEY (`mill_id`),
  ADD KEY `farm_id` (`miller_name`);

--
-- Indexes for table `oders`
--
ALTER TABLE `oders`
  ADD PRIMARY KEY (`oder_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `rawproducts`
--
ALTER TABLE `rawproducts`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `farm_id` (`farm_id`) USING BTREE;

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `oder_id` (`oder_id`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `oder_id` (`oder_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aheroresearch`
--
ALTER TABLE `aheroresearch`
  MODIFY `employee_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmer_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `farm_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `message_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finishedproducts`
--
ALTER TABLE `finishedproducts`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mills`
--
ALTER TABLE `mills`
  MODIFY `mill_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oders`
--
ALTER TABLE `oders`
  MODIFY `oder_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rawproducts`
--
ALTER TABLE `rawproducts`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
