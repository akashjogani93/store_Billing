-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 02:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(10) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemHSN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `itemName`, `itemHSN`) VALUES
(1, 'P1', 'PZD5585'),
(2, 'P2', 'PZD5586'),
(3, 'P3', 'PZD5587'),
(4, 'P4', 'PZD5588'),
(5, 'P5', 'PZD5589'),
(6, 'P6', 'PZD5590'),
(7, 'P7', 'PZD5597');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `user`) VALUES
(1, 'admin', 'pass', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_data`
--

CREATE TABLE `purchase_data` (
  `slno` int(10) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemHSN` varchar(50) NOT NULL,
  `qty` double NOT NULL,
  `purRate` double NOT NULL,
  `saleRate` double NOT NULL,
  `purTotal` double NOT NULL,
  `bill_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_data`
--

INSERT INTO `purchase_data` (`slno`, `itemName`, `itemHSN`, `qty`, `purRate`, `saleRate`, `purTotal`, `bill_no`) VALUES
(1, 'P2', 'PZD5586', 20, 50, 50, 1000, 1),
(2, 'P1', 'PZD5585', 20, 20, 50, 400, 1),
(4, 'P3', 'PZD5587', 50, 50, 100, 2500, 2),
(5, 'P1', 'PZD5585', 50, 50, 100, 2500, 2),
(7, 'P4', 'PZD5588', 50, 100, 120, 5000, 3),
(8, 'P1', 'PZD5585', 50, 200, 350, 10000, 4),
(9, 'P2', 'PZD5586', 10, 20, 30, 200, 5),
(10, 'P4', 'PZD5588', 150, 40, 50, 6000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_tem`
--

CREATE TABLE `purchase_tem` (
  `slno` int(10) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemHSN` varchar(50) NOT NULL,
  `qty` double NOT NULL,
  `purRate` double NOT NULL,
  `saleRate` double NOT NULL,
  `purTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_tot`
--

CREATE TABLE `purchase_tot` (
  `bill_no` int(10) NOT NULL,
  `purchase_date` date NOT NULL,
  `grossTotal` double NOT NULL,
  `netTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_tot`
--

INSERT INTO `purchase_tot` (`bill_no`, `purchase_date`, `grossTotal`, `netTotal`) VALUES
(1, '2023-05-23', 1400, 1400),
(2, '2023-05-23', 5000, 5000),
(3, '0000-00-00', 5000, 5000),
(4, '0000-00-00', 10000, 10000),
(5, '2023-05-23', 200, 200),
(6, '2023-05-25', 6000, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `sale_data`
--

CREATE TABLE `sale_data` (
  `slno` int(10) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemHSN` varchar(50) NOT NULL,
  `qty` double NOT NULL,
  `rate` double NOT NULL,
  `value` double NOT NULL,
  `bill_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_data`
--

INSERT INTO `sale_data` (`slno`, `itemName`, `itemHSN`, `qty`, `rate`, `value`, `bill_no`) VALUES
(1, 'P3', 'PZD5587', 8, 100, 800, 1),
(2, 'P3', 'PZD5587', 10, 100, 1000, 2),
(3, 'P2', 'PZD5586', 10, 30, 300, 3),
(4, 'P3', 'PZD5587', 10, 100, 1000, 3),
(6, 'P4', 'PZD5588', 10, 120, 1200, 4),
(7, 'P2', 'PZD5586', 10, 30, 300, 5),
(8, 'P1', 'PZD5585', 71, 350, 24850, 6),
(9, 'P2', 'PZD5586', 5, 30, 150, 7),
(10, 'P1', 'PZD5585', 10, 350, 3500, 7),
(12, 'P2', 'PZD5586', 1, 30, 30, 8),
(13, 'P1', 'PZD5585', 1, 350, 350, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sale_tem`
--

CREATE TABLE `sale_tem` (
  `slno` int(10) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemHSN` varchar(50) NOT NULL,
  `qty` double NOT NULL,
  `rate` double NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_tot`
--

CREATE TABLE `sale_tot` (
  `bill_no` int(10) NOT NULL,
  `partyName` varchar(100) NOT NULL,
  `partyGST` varchar(50) NOT NULL,
  `saleDate` date NOT NULL,
  `gross_amt` double NOT NULL,
  `gst` double NOT NULL,
  `gstamt` double NOT NULL,
  `net_tot` double NOT NULL,
  `payment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_tot`
--

INSERT INTO `sale_tot` (`bill_no`, `partyName`, `partyGST`, `saleDate`, `gross_amt`, `gst`, `gstamt`, `net_tot`, `payment`) VALUES
(1, 'sagar', '', '2023-05-23', 800, 5, 40, 840, 'none'),
(2, 'sagar', '', '2023-05-23', 1000, 5, 50, 1050, 'none'),
(3, 'sagar', '', '2023-05-23', 1300, 5, 65, 1365, 'none'),
(4, 'sagar', '', '2023-05-23', 1200, 5, 60, 1260, 'none'),
(5, 'akash', '', '2023-05-23', 300, 5, 15, 315, 'none'),
(6, 'akash', '', '2023-05-23', 24850, 5, 1242.5, 26092.5, 'none'),
(7, 'akash', '', '2023-05-23', 3650, 5, 182.5, 3832.5, 'none'),
(8, 'Akash', '', '2023-05-25', 380, 5, 19, 399, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `slno` int(10) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemHSN` varchar(50) NOT NULL,
  `qty` double NOT NULL,
  `purRate` double NOT NULL,
  `saleRate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`slno`, `itemName`, `itemHSN`, `qty`, `purRate`, `saleRate`) VALUES
(1, 'P2', 'PZD5586', 4, 20, 30),
(2, 'P1', 'PZD5585', 38, 200, 350),
(3, 'P3', 'PZD5587', 22, 50, 100),
(4, 'P4', 'PZD5588', 190, 40, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_data`
--
ALTER TABLE `purchase_data`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `purchase_tem`
--
ALTER TABLE `purchase_tem`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `purchase_tot`
--
ALTER TABLE `purchase_tot`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `sale_data`
--
ALTER TABLE `sale_data`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `sale_tem`
--
ALTER TABLE `sale_tem`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `sale_tot`
--
ALTER TABLE `sale_tot`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`slno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_data`
--
ALTER TABLE `purchase_data`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase_tem`
--
ALTER TABLE `purchase_tem`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_tot`
--
ALTER TABLE `purchase_tot`
  MODIFY `bill_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale_data`
--
ALTER TABLE `sale_data`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sale_tem`
--
ALTER TABLE `sale_tem`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_tot`
--
ALTER TABLE `sale_tot`
  MODIFY `bill_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `slno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
