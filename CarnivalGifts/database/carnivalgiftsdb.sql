-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 08:24 PM
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

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`beneficiaryID`, `beneficiary_F_Name`, `beneficiary_L_Name`, `Spouse_F_Name`, `Spouse_L_Name`, `bank_name`, `account_number`, `email`, `phone`, `password`) VALUES
(2, 'Mikey', 'Boy', 'Nancey', 'Drew', 'Huntington', 12345, 'Mikeyboy99@hotmail.com', '231-554-6869', 'Passwordgoat'),
(3, 'Jim', 'Manick', 'Karol', 'James', 'Independent Bank', 657690, 'Karol@yahoo.com', '231-554-7901', 'softpassword'),
(4, 'Katy', 'Hopper', 'Jim', 'Kelton', 'Huntington', 4591526, 'Katy@butterflies.com', '231-414-7953', 'katyspassword');

-- --------------------------------------------------------

--
-- Table structure for table `cruise`
--

CREATE TABLE `cruise` (
  `cruise_num` int(16) NOT NULL,
  `room_num` int(4) NOT NULL,
  `destinationCountry` varchar(64) NOT NULL,
  `destinationCity` varchar(64) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `cruise_name` varchar(64) NOT NULL,
  `taken` enum('YES','NO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cruise`
--

INSERT INTO `cruise` (`cruise_num`, `room_num`, `destinationCountry`, `destinationCity`, `picture`, `cost`, `cruise_name`, `taken`) VALUES
(3, 202, 'Japan', 'Tokyo', 'Tokyo.jpg', '2200.00', 'Tokyo Drift', 'NO'),
(4, 115, 'Philippines', 'Manilla', 'Destination2.jpg', '1100.00', 'Manilla Tour', 'YES'),
(5, 213, 'Jamaica', 'Kingston', 'Destination1.jpg', '800.00', 'Kingston Tour', 'NO'),
(6, 101, 'Bora Bora', 'Vaitape', 'Destination2.jpg', '1501.00', 'Bora Bora Luxury Cruise', 'NO'),
(7, 112, 'Bora Bora', 'Vaitape', 'Destination2.jpg', '1500.00', 'Bora Bora Luxury Cruise', 'NO'),
(8, 260, 'Panama', 'Panama City', 'Destination2.jpg', '3200.25', 'Panama Luxury Cruise', 'NO'),
(9, 205, 'Italy', 'Venice', 'Destination3.jpg', '2500.10', 'Venice Tour', 'NO'),
(10, 181, 'Italy', 'Naples', 'Destination3.jpg', '1825.50', 'Naples Tour', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `cruise_order`
--

CREATE TABLE `cruise_order` (
  `order_id` int(64) NOT NULL,
  `cruise_num` int(16) NOT NULL,
  `beneficiaryID` int(18) NOT NULL,
  `amountNeeded` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cruise_order`
--

INSERT INTO `cruise_order` (`order_id`, `cruise_num`, `beneficiaryID`, `amountNeeded`) VALUES
(6, 3, 2, '39099.75');

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

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donorID`, `donor_F_Name`, `donor_L_Name`, `pay_type`, `card_number`, `expiration`, `cvs`, `email`, `phone`, `password`) VALUES
(1, 'John', 'Smith', 'Visa', '1234567890112233', '04/45', 543, 'Johnnyboy@protonmail.com', '12315657923', 'Passwordguppy'),
(2, 'Mitchell', 'Suchner', 'Mastercard', '546784568458', '457', 678, 'Mitchell_J_S@outlook.com', '1234149999', 'Password123'),
(3, 'Mitchell', 'Suchner', 'Mastercard', '345634756734734', '4567', 456, 'Mitchell_J_S@outlook.com', '1234149999', 'Password123'),
(4, '', '', '', '', '', 0, '', '', ''),
(5, 'Hermes', 'Conrad', 'Paypal', '', '', 0, 'Hermes@PlanetExpress.net', '9999999999', 'Jamaica');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(16) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_cost` decimal(10,2) NOT NULL,
  `item_desc` text NOT NULL,
  `picture` varchar(32) NOT NULL,
  `destinationCity` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_cost`, `item_desc`, `picture`, `destinationCity`) VALUES
(1, 'Sushi Restaurant Reservations', '120.00', 'Purchase reservations at one of the best Sushi restaurants in Tokyo.', 'sushi.jpg', 'Tokyo'),
(2, 'Reservations at Seafood Restaurant', '100.00', 'Purchase reservations at one of the best seafood restaurants in Kingston Jamaica.', 'seafood.jpg', 'Kingston'),
(3, 'Jet Ski Rental', '200.00', 'Rent a Jet Ski at any of our destinations for use the entire day.', 'jet-ski.jpg', 'ALL'),
(4, 'Three Course Meal for Two', '80.00', 'Pay for one three course meal for the couple at any time they are aboard the ship.', 'meal.jpg', 'ALL'),
(5, 'Bora Bora Scuba Diving', '200.00', 'Pay for a scuba diving trip in Bora Bora for two people.', 'scuba.jpg', 'Vaitape'),
(6, 'Italian Restaurant Reservations', '145.50', 'Pay for reservations to one of the best restaurants in Venice for two people.', 'wine.png', 'Venice'),
(7, 'Wine Tasting', '80.00', 'Purchase a wine tasting trip for two people in Naples, Italy.', 'grapes.jpg', 'Naples');

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
-- Dumping data for table `item_order`
--

INSERT INTO `item_order` (`item_order_id`, `order_id`, `item_id`) VALUES
(3, 6, 1),
(1, 6, 3),
(4, 6, 4);

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
  ADD KEY `cruise_num` (`destinationCity`);

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
  MODIFY `beneficiaryID` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cruise`
--
ALTER TABLE `cruise`
  MODIFY `cruise_num` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cruise_order`
--
ALTER TABLE `cruise_order`
  MODIFY `order_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donorID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `item_order_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
