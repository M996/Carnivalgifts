-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 02:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carnivalgiftsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `beneficiaryID` int(18) NOT NULL,
  `beneficiary_F_Name` varchar(50) NOT NULL,
  `beneficiary_L_Name` varchar(50) NOT NULL,
  `Spouse_F_Name` varchar(50) NOT NULL,
  `Spouse_L_Name` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_number` int(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cruise`
--

CREATE TABLE `cruise` (
  `cruise_num` int(16) NOT NULL,
  `room_num` int(4) NOT NULL,
  `destination` varchar(64) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `cruise_name` varchar(64) NOT NULL,
  `taken` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cruise_order`
--

CREATE TABLE `cruise_order` (
  `order_id` int(64) NOT NULL,
  `cruise_num` int(16) NOT NULL,
  `beneficiaryID` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(64) NOT NULL,
  `donorID` int(12) NOT NULL,
  `order_id` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donorID` int(12) NOT NULL,
  `donor_F_Name` varchar(40) NOT NULL,
  `donor_L_Name` varchar(40) NOT NULL,
  `pay_type` enum('Paypal','Visa','Discover','Mastercard') NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `expiration` varchar(5) NOT NULL,
  `cvs` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(16) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_cost` decimal(10,0) NOT NULL,
  `item_desc` text NOT NULL,
  `cruise_num` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `item_order_id` int(64) NOT NULL,
  `order_id` int(64) NOT NULL,
  `item_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`beneficiaryID`);

--
-- Indexes for table `cruise`
--
ALTER TABLE `cruise`
  ADD PRIMARY KEY (`cruise_num`);

--
-- Indexes for table `cruise_order`
--
ALTER TABLE `cruise_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`order_id`,`cruise_num`),
  ADD KEY `beneficiaryID` (`beneficiaryID`),
  ADD KEY `cruise_num` (`cruise_num`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `donorID` (`donorID`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `cruise_num` (`cruise_num`);

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`item_order_id`),
  ADD KEY `order_id` (`order_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `beneficiaryID` int(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cruise`
--
ALTER TABLE `cruise`
  MODIFY `cruise_num` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cruise_order`
--
ALTER TABLE `cruise_order`
  MODIFY `order_id` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donorID` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `item_order_id` int(64) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cruise_order`
--
ALTER TABLE `cruise_order`
  ADD CONSTRAINT `cruise_order_ibfk_1` FOREIGN KEY (`beneficiaryID`) REFERENCES `beneficiary` (`beneficiaryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cruise_order_ibfk_2` FOREIGN KEY (`cruise_num`) REFERENCES `cruise` (`cruise_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `cruise_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`donorID`) REFERENCES `donor` (`donorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_order`
--
ALTER TABLE `item_order`
  ADD CONSTRAINT `item_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `cruise_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_order_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
