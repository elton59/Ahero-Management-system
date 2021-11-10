-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2020 at 12:36 PM
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
-- Table structure for table `allocated`
--

CREATE TABLE `allocated` (
  `product_id` int(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `farmer_name` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','received') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allocated`
--

INSERT INTO `allocated` (`product_id`, `product_name`, `quantity`, `farmer_name`, `status`) VALUES
(121, 'soybeans_seeds', 33, 'dd', 'received'),
(122, 'watermellon_seeds', 33, 'ee', 'approved'),
(123, 'rice_seeds', 33, 'johny', 'received'),
(124, 'soybeans_seeds', 22, 'Es', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `location` enum('KISUMU','NAIROBI','NAKURU','MOMBASA','MERU') DEFAULT NULL,
  `phone_number` int(50) DEFAULT NULL,
  `driver_name` varchar(50) DEFAULT NULL,
  `status` enum('shipped','pending','approved','received','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `product_name`, `image`, `price`, `quantity`, `username`, `location`, `phone_number`, `driver_name`, `status`) VALUES
(98, '12', 'redwatermellon(5kG)', 'shop13.png', 2000, 1, 'Jenujohn', 'MERU', 200, 'MARK', 'approved'),
(99, '8', 'PurePishori(2KG)', 'shop010.png', 400, 2, 'David', 'MERU', 200, 'CYRIL', 'approved'),
(100, '8', 'PurePishori(2KG)', 'shop010.png', 400, 1, 'Jenujohn', 'MERU', 200, 'JOHN', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'rice'),
(2, 'soybeans'),
(3, 'watermelons');

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
(42, 'joe', 'ambrosedeh@gmail.com', 'kisumu  ', 'pending'),
(43, 'mike', 'den@gmail.com', 'tao  ', 'approved'),
(45, 'johnte', 'ambrosedeh@gmail.com', 'kisumu', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(50) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `van_id` varchar(50) NOT NULL,
  `status` enum('available','allocated') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_name`, `email`, `van_id`, `status`) VALUES
(1, 'john', 'john@gmail', '123', 'allocated'),
(2, 'mary', 'mary@gmail', '334', 'allocated'),
(3, 'mark', 'mark@gmail', '11234', 'available'),
(4, 'cyril', 'cyril@gmail', '765', 'available');

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
  `rating` int(50) NOT NULL,
  `status` enum('read','unread') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`message_id`, `email`, `message`, `rating`, `status`) VALUES
(2, 'pato@gmail.com', 'good work elton', 0, 'unread'),
(22, 'k@gmail.com', 'k', 3, 'unread'),
(23, 'k@gmail.com', 'k', 3, 'unread'),
(24, 'k@gmail.com', 'k', 3, 'unread'),
(25, 'k@gmail.com', 'k', 3, 'unread'),
(26, 'k@gmail.com', 'k', 3, 'unread'),
(27, 'k@gmail.com', 'excellent', 4, 'unread'),
(28, 'k@gmail.com', 'edsrefds', 6, 'unread');

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
  `image` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `deductions` int(11) NOT NULL,
  `status` enum('pending','rejected','approved','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finishedproducts`
--

INSERT INTO `finishedproducts` (`product_id`, `product_name`, `category`, `quantity`, `mill_id`, `image`, `price`, `deductions`, `status`) VALUES
(8, 'PurePishori(2KG)', 'rice', 20, '1', 'shop010.png', 400, 1, 'approved'),
(9, 'pealpishori(2KG)', 'rice', 55, '1', 'shop14.png', 430, 1, 'approved'),
(10, 'Sindano(2KG)', 'rice', 33, '1', 'shop15.png', 176, 1, 'approved'),
(11, 'DawatRice(2KG)', 'rice', 44, '1', 'shop16.png', 270, 1, 'approved'),
(12, 'redwatermellon(5kG)', 'watermellon', 22, '3', 'shop13.png', 2000, 1, 'approved'),
(13, 'yellowseedlesswatermellon(5KG)', 'watermellon', 66, '3', 'shop20.png', 2500, 1, 'approved'),
(14, 'cutronwatermellon(5KG)', 'watemellon', 60, '3', 'shop19.png', 3500, 1, 'approved'),
(15, 'ogarnicsoyabeans', 'soyabeans', 80, '2', 'shop11.png', 180, 1, 'approved'),
(16, 'greensoyabeans(5kg)', 'soyabeans', 130, '2', 'shop18.png', 1000, 1, 'approved'),
(17, 'roastedsoyabeans', 'soyabeans', 200, '2', 'shop17.png', 250, 1, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `fpay`
--

CREATE TABLE `fpay` (
  `payment_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `farmer_name` varchar(50) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `status` enum('recieved','paid','pending') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fpay`
--

INSERT INTO `fpay` (`payment_id`, `product_name`, `farmer_name`, `transaction_id`, `amount`, `status`) VALUES
(1, 'PurePishori', 'ola', '3rf', 123, 'recieved'),
(3, 'PurePishori', 'gggola', 'dfsfsd', 123, 'paid'),
(4, 'PurePishori', 'johny', 'gdflk34', 2000, 'recieved'),
(5, 'PurePishori', 'johny', '', 2000, 'paid'),
(6, 'PurePishori', 'ola', '', 123, 'paid');

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
(1, '22', 'allenologo', 'bananaa', 'approved'),
(3, '22', 'allen', 'bananaa', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE `oders` (
  `oder_id` int(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`oder_id`, `product_id`, `product_name`, `quantity`, `customer_id`, `customer_name`, `status`) VALUES
(4, '17', 'yellow watermellon', 3, 6, 'john makuyu', 'rejected'),
(9, '8', 'soya', 12, 6, 'po', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_method` varchar(50) NOT NULL,
  `oder_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cardname` varchar(255) DEFAULT NULL,
  `cardnumber` varchar(20) DEFAULT NULL,
  `total_amt` varchar(50) NOT NULL,
  `cvv` int(5) DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `status` enum('complete','incomplete','pending') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_method`, `oder_id`, `username`, `email`, `cardname`, `cardnumber`, `total_amt`, `cvv`, `phone_number`, `transaction_id`, `status`) VALUES
('mpesa', 39, 'jenujohn', 'jenujohn@gmail', NULL, NULL, ' 1120', NULL, '', '', 'complete'),
('', 47, '', 'jenujohn@gmail', NULL, NULL, ' 13170', NULL, '', '', 'complete'),
('', 48, '', 'david@gmail.com', NULL, NULL, ' 800', NULL, '', '', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `product_id` int(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` text NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` int(11) NOT NULL,
  `farmer_name` varchar(50) NOT NULL,
  `mpesa_number` int(11) NOT NULL,
  `status` enum('pending','rejected','approved','paid','received') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`product_id`, `product_name`, `category`, `quantity`, `price`, `farmer_name`, `mpesa_number`, `status`) VALUES
(19, 'PurePishori', 'rice', 33, 123, 'ola', 865544, 'approved'),
(20, 'PurePishori', 'rice', 20, 2000, 'johny', 75544566, 'approved'),
(21, 'yellowseedlesswatermellon', 'watemellon', 20, 2222, 'johny', 12345789, 'pending');

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
(118, 'rice_seeds', 88, 1, 'josiche ltd', 'approved'),
(119, 'soybeans_seeds', 114, 2, 'seedco', 'approved'),
(120, 'watermellon_seeds', 55, 3, 'seedco', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `researchactivities`
--

CREATE TABLE `researchactivities` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(50) NOT NULL,
  `meeting_date` date NOT NULL,
  `start_time` time NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researchactivities`
--

INSERT INTO `researchactivities` (`activity_id`, `activity_name`, `meeting_date`, `start_time`, `description`) VALUES
(1, 'seeds research', '2020-06-09', '08:09:54', 'the team will look at the best seeds to plant in farm B due to reduction in farm quality with time'),
(2, 'farm study', '2020-06-19', '23:33:00', 'the team will test soils in all farms to know their quality');

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
(3, 1, 'pal', 11, 234, 5, 'approved'),
(4, 2, 'patol', 12, 13, 37, 'pending'),
(5, 1, 'xxpal', 77, 11, 22, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_date` date NOT NULL,
  `start_time` time NOT NULL,
  `venue` varchar(50) NOT NULL,
  `status` enum('approved','pending','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_date`, `start_time`, `venue`, `status`) VALUES
(1, '1', '2020-06-10', '11:56:57', 'wata', 'approved'),
(1, 'fumigation training', '2020-06-17', '00:11:00', 'complex', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `oder_id` varchar(50) DEFAULT NULL,
  `driver_name` varchar(50) DEFAULT NULL,
  `status` enum('pending','approved','shipped') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`product_id`, `product_name`, `customer_id`, `customer_name`, `location`, `oder_id`, `driver_name`, `status`) VALUES
('', '', '', '', '', '', 'ert', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'customer',
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `location` enum('NAIROBI','MERU','KISUMU','NAKURU','MOMBASA') DEFAULT NULL,
  `status` enum('pending','approved','rejected','') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`, `gender`, `location`, `status`) VALUES
(3, 'allen', 'allen@gmail.com', '12345', 'shipmentmanager', 'male', 'MERU', 'approved'),
(4, 'mary', 'mary@gmail.com', '12345', 'driver', 'female', 'NAIROBI', 'approved'),
(5, 'venesa', 'venesa@gmail.com', '12345', 'researcher', 'female', 'NAIROBI', 'approved'),
(7, 'johny', 'jon@gmail.com', '1234', 'farmer', 'male', 'KISUMU', 'approved'),
(8, 'anne', 'anne@gmail.com', '12345', 'warehousemanager', 'female', 'MERU', 'approved'),
(11, 'hermans', 'hermans@gmail.com', '111', 'financemanager', 'male', 'KISUMU', 'approved'),
(12, 'mike', 'trench@gmail', '11123', 'warehousemanager', 'male', 'NAIROBI', 'approved'),
(14, 'emily', 'em@gmail', '1', 'customer', 'female', 'NAIROBI', 'approved'),
(15, 'john', 'john@gmail.com', '8', 'driver', 'male', 'NAIROBI', 'approved'),
(16, 'mark', 'mark@gmail.com', '87653', 'driver', 'male', 'NAIROBI', 'approved'),
(18, 'cyril', 'cyril@gmail', '3333', 'driver', 'male', 'NAIROBI', 'approved'),
(30, 'root', 'elton@gmail.com', '2234', 'customer', 'male', 'NAIROBI', 'approved'),
(34, 'johnOOOO', 'mike@gmail.com', '9', 'customer', 'male', 'NAIROBI', 'approved'),
(42, 'iiii', 'elton@gmail.com', '77', 'customer', 'male', 'NAIROBI', 'approved'),
(43, 'jenujohn', 'jenu@gmail.com', '123456', 'customer', 'female', 'NAIROBI', 'approved'),
(44, 'carey', 'carey@gmail.com', '123456', 'customer', 'male', 'NAIROBI', 'approved'),
(45, 'David', 'david@gmail.com', '123456', 'customer', 'male', 'NAIROBI', 'approved');

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
-- Indexes for table `allocated`
--
ALTER TABLE `allocated`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

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
-- Indexes for table `fpay`
--
ALTER TABLE `fpay`
  ADD PRIMARY KEY (`payment_id`);

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
  ADD KEY `customer_id` (`customer_name`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`oder_id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`product_id`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`(50));

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
-- AUTO_INCREMENT for table `allocated`
--
ALTER TABLE `allocated`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `message_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `finishedproducts`
--
ALTER TABLE `finishedproducts`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fpay`
--
ALTER TABLE `fpay`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mills`
--
ALTER TABLE `mills`
  MODIFY `mill_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oders`
--
ALTER TABLE `oders`
  MODIFY `oder_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `oder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rawproducts`
--
ALTER TABLE `rawproducts`
  MODIFY `product_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
