-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2019 at 07:18 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chit_fund`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Stud'),
(2, 'Ring'),
(3, 'Neckless'),
(4, 'Haram'),
(5, 'Stone Neckles'),
(6, 'Stone Haram'),
(7, 'Casting'),
(8, 'Stone'),
(9, 'Perl'),
(10, 'Dimond');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `place` int(100) NOT NULL,
  `referer_name` varchar(255) NOT NULL,
  `referer_mobile` varchar(30) NOT NULL,
  `remerks` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `code`, `name`, `father_name`, `family_name`, `mobile`, `address`, `place`, `referer_name`, `referer_mobile`, `remerks`, `created_at`) VALUES
(1, 'PER0001', 'RAVI', 'CHI', 'THAN', '99444', 'PERUMA', 1, '', '', '', '0000-00-00 00:00:00'),
(2, 'GAN0001', 'Santosh Das', 'KUMAR DAS', 'DAS', '75252528', 'COIMBATORE', 3, '', '', '', '2019-11-07 15:53:22'),
(3, 'PER1010', 'Ravindran', 'Chinnaiyan', 'NO', '99444', '1A Sivagami Nagar', 1, 'Santoshi', '75245', 'NO', '2019-11-08 14:00:58'),
(4, 'PER1010', 'Santoshi', 'Kumar', 'Das', '7522', '1A Sivagami Nagar', 2, 'Ravi', '9944', 'NO', '2019-11-08 14:01:48'),
(5, 'PER1010', 'Mani', 'Kumar', 'NO', '7896541230', '1A Sivagami Nagar', 1, 'Santoshi', '75245', 'NO remarks', '2019-11-08 14:07:55'),
(6, 'PER1010', 'Mani', 'Kumar', 'NO', '7896541230', '1A Sivagami Nagar', 1, 'Santoshi', '75245', 'NO remarks', '2019-11-08 14:08:33'),
(7, 'PER1010', 'Mani', 'Kumar', 'NO', '7896541230', '1A Sivagami Nagar', 1, 'Santoshi', '75245', 'NO remarks', '2019-11-08 14:08:49'),
(8, 'PER1010', 'Mani', 'Kumar', 'NO', '7896541230', '1A Sivagami Nagar', 1, 'Santoshi', '75245', 'NO remarks', '2019-11-08 14:09:05'),
(9, 'PER1010', 'Aravinth', 'Elango', 'NO name', '5678', '29,30 DB Road', 2, 'Ravi', '9944', 'From Vadachithoor', '2019-11-08 14:11:31'),
(10, 'PER1010', 'Mani', 'Chinnaiyan', 'NO', '789654', '1A Sivagami Nagar', 2, 'Santoshi', '75245', 'From Vadachithoor', '2019-11-11 11:00:57'),
(11, 'PER1010', 'Magic pot', 'Elango', 'Das', '74562', '29,30 DB Road', 6, 'Santoshi', '75245', 'NO remarks', '2019-11-11 11:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `short_code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `short_code`, `name`, `status`) VALUES
(1, 'PER', 'PERUMAGALUR', 'active'),
(2, 'RET', 'RETTAVALYAL', 'active'),
(3, 'GAN', 'GANDINAGAR', 'active'),
(4, 'ANN', 'ANNANAGAR', 'active'),
(6, 'PEM', 'PERUMANALLUR', 'active'),
(7, 'ANA', 'Anna Nagar', 'active'),
(8, 'THN', 'Thenpathi', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `plug_id` int(11) DEFAULT NULL,
  `type` enum('p','a','s','r','i') DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `total_amount` decimal(15,2) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `customer_id`, `plug_id`, `type`, `date`, `amount`, `total_amount`, `status`) VALUES
(1, 1, 1, 'p', '2019-01-01 00:00:00', '5000.00', '5000.00', 'active'),
(2, 1, 1, 'a', '2019-02-15 00:00:00', '3000.00', '8000.00', 'active'),
(3, 1, 1, 's', '2019-04-11 00:00:00', '2000.00', '6000.00', 'active'),
(4, 1, 1, 'a', '2019-06-27 00:00:00', '3000.00', '9000.00', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_place_id_fk` (`place`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `place_short_code_uindex` (`short_code`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_customer_id_fk` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_place_id_fk` FOREIGN KEY (`place`) REFERENCES `place` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_customer_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
