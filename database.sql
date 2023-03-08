-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 12:29 PM
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
-- Database: `is_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipient_admin`
--

CREATE TABLE `recipient_admin` (
  `recipient_id` int(50) NOT NULL,
  `Organisation` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `contact_info` varchar(50) NOT NULL,
  `donations_recieved` int(50) NOT NULL DEFAULT 0,
  `Status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipient_admin`
--

INSERT INTO `recipient_admin` (`recipient_id`, `Organisation`, `Address`, `email`, `Password`, `contact_info`, `donations_recieved`, `Status`) VALUES
(1, 'st johns', 'nairobi west', 'stjohns@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '07123456', 0, '1'),
(2, 'New Life', 'Hurlingham', 'newlife@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '07123456', 0, '1'),
(6, 'Abcd', 'madaraka estate', 'ab@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '07123456', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_admin`
--

CREATE TABLE `supplier_admin` (
  `Supplier_id` int(50) NOT NULL,
  `Organisation` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_info` varchar(50) NOT NULL,
  `donations_made` varchar(50) DEFAULT '0',
  `Status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_admin`
--

INSERT INTO `supplier_admin` (`Supplier_id`, `Organisation`, `password`, `email`, `address`, `contact_info`, `donations_made`, `Status`) VALUES
(2, 'YayaFoods', '827ccb0eea8a706c4c34a16891f84e7b', 'yaya@gmail.com', 'Hurlingham', '07123456', '0', '1'),
(3, 'strathmore', 'e10adc3949ba59abbe56e057f20f883e', 'strathmore@gmail.com', 'madaraka estate', '0722334455', '0', '1'),
(4, 'Java', '827ccb0eea8a706c4c34a16891f84e7b', 'Java@gmail.com', 'Hurlingham', '07123456', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `system_admin`
--

CREATE TABLE `system_admin` (
  `system_admin_id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_admin`
--

INSERT INTO `system_admin` (`system_admin_id`, `email`, `password`) VALUES
(1, 'ben@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

CREATE TABLE `tbl_complaints` (
  `Complaint_id` int(50) NOT NULL,
  `Organisation` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `complaint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`Complaint_id`, `Organisation`, `email`, `complaint`) VALUES
(9, 'st johns', 'testtest@gmail.com', ''),
(10, 'yaya org', 'yaya@gmail.com', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donations`
--

CREATE TABLE `tbl_donations` (
  `donation_id` int(50) NOT NULL,
  `food_listing_id` int(50) NOT NULL,
  `Supplier_id` int(50) NOT NULL,
  `donating_organisation` varchar(50) NOT NULL,
  `contact_info` varchar(50) NOT NULL,
  `quantity_donated` int(50) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `recieving_organisation` varchar(11) NOT NULL,
  `Status` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_donations`
--

INSERT INTO `tbl_donations` (`donation_id`, `food_listing_id`, `Supplier_id`, `donating_organisation`, `contact_info`, `quantity_donated`, `recipient_id`, `recieving_organisation`, `Status`) VALUES
(1, 2, 2, 'YayaFoods', '07222229999', 20, 1, 'st johns', '1'),
(9, 5, 2, 'yaya', '07123456', 200, 1, 'st johns', '1'),
(17, 8, 4, 'Java', '07123456', 20, 1, 'st johns', '1'),
(18, 7, 3, 'Strathmore', '0722334455', 20, 2, 'New Life', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foodlistings`
--

CREATE TABLE `tbl_foodlistings` (
  `Food_Listings_id` int(50) NOT NULL,
  `Supplier_id` int(50) NOT NULL,
  `Organisation` varchar(50) NOT NULL,
  `Food` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `dateposted` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_foodlistings`
--

INSERT INTO `tbl_foodlistings` (`Food_Listings_id`, `Supplier_id`, `Organisation`, `Food`, `Description`, `Quantity`, `dateposted`, `status`) VALUES
(2, 2, 'yaya', 'Maize flour', 'exe', '200 bags', '2022-07-20 19:00:37', '1'),
(5, 2, 'yaya', 'Sugar', 'Mumias', '200 bags', '2022-07-21 16:01:19', '1'),
(7, 3, 'Strathmore', 'Sugar', 'Mumias', '20 kgs', '2022-07-21 16:29:58', '1'),
(8, 4, 'Java', 'Oil', 'Blueband', '20 liters', '2022-07-21 16:50:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receivables`
--

CREATE TABLE `tbl_receivables` (
  `Receivable_id` int(50) NOT NULL,
  `food_listing_id` int(50) NOT NULL,
  `Reciever_id` int(50) NOT NULL,
  `receiving_organisation` varchar(50) NOT NULL,
  `Contact_info` varchar(50) NOT NULL,
  `Supplier_id` int(50) NOT NULL,
  `supplying_organisation` varchar(50) NOT NULL,
  `Quantity_recieved` varchar(50) NOT NULL DEFAULT '0',
  `Status` enum('1','0') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_receivables`
--

INSERT INTO `tbl_receivables` (`Receivable_id`, `food_listing_id`, `Reciever_id`, `receiving_organisation`, `Contact_info`, `Supplier_id`, `supplying_organisation`, `Quantity_recieved`, `Status`) VALUES
(1, 2, 1, 'st johns', '07222229999', 2, 'yaya', '20', '1'),
(7, 5, 1, 'st johns', '07123456', 2, 'yaya', '200 bags', '1'),
(15, 8, 1, 'st johns', '07123456', 4, 'Java', '20 liters', '1'),
(16, 7, 2, 'New Life', '07123456', 3, 'Strathmore', '20 kgs', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipient_admin`
--
ALTER TABLE `recipient_admin`
  ADD PRIMARY KEY (`recipient_id`);

--
-- Indexes for table `supplier_admin`
--
ALTER TABLE `supplier_admin`
  ADD PRIMARY KEY (`Supplier_id`);

--
-- Indexes for table `system_admin`
--
ALTER TABLE `system_admin`
  ADD PRIMARY KEY (`system_admin_id`);

--
-- Indexes for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  ADD PRIMARY KEY (`Complaint_id`),
  ADD KEY `tbl_complaints_fk1` (`email`);

--
-- Indexes for table `tbl_donations`
--
ALTER TABLE `tbl_donations`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `tbl_donations_fk` (`Supplier_id`),
  ADD KEY `tbl_donations_fk1` (`recipient_id`),
  ADD KEY `tbl_foodlistings_fk2` (`food_listing_id`);

--
-- Indexes for table `tbl_foodlistings`
--
ALTER TABLE `tbl_foodlistings`
  ADD PRIMARY KEY (`Food_Listings_id`),
  ADD KEY `Supplier_id` (`Supplier_id`);

--
-- Indexes for table `tbl_receivables`
--
ALTER TABLE `tbl_receivables`
  ADD PRIMARY KEY (`Receivable_id`),
  ADD KEY `tbl_receivables_fk` (`Supplier_id`),
  ADD KEY `Reciever_id` (`Reciever_id`),
  ADD KEY `tbl_receivables_fk2` (`food_listing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipient_admin`
--
ALTER TABLE `recipient_admin`
  MODIFY `recipient_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier_admin`
--
ALTER TABLE `supplier_admin`
  MODIFY `Supplier_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_admin`
--
ALTER TABLE `system_admin`
  MODIFY `system_admin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `Complaint_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_donations`
--
ALTER TABLE `tbl_donations`
  MODIFY `donation_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_foodlistings`
--
ALTER TABLE `tbl_foodlistings`
  MODIFY `Food_Listings_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_receivables`
--
ALTER TABLE `tbl_receivables`
  MODIFY `Receivable_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_donations`
--
ALTER TABLE `tbl_donations`
  ADD CONSTRAINT `tbl_donations_fk` FOREIGN KEY (`Supplier_id`) REFERENCES `supplier_admin` (`Supplier_id`),
  ADD CONSTRAINT `tbl_donations_fk1` FOREIGN KEY (`recipient_id`) REFERENCES `recipient_admin` (`recipient_id`),
  ADD CONSTRAINT `tbl_foodlistings_fk2` FOREIGN KEY (`food_listing_id`) REFERENCES `tbl_foodlistings` (`Food_Listings_id`);

--
-- Constraints for table `tbl_foodlistings`
--
ALTER TABLE `tbl_foodlistings`
  ADD CONSTRAINT `tbl_foodlistings_ibfk_1` FOREIGN KEY (`Supplier_id`) REFERENCES `supplier_admin` (`Supplier_id`);

--
-- Constraints for table `tbl_receivables`
--
ALTER TABLE `tbl_receivables`
  ADD CONSTRAINT `tbl_receivables_fk` FOREIGN KEY (`Supplier_id`) REFERENCES `supplier_admin` (`Supplier_id`),
  ADD CONSTRAINT `tbl_receivables_fk2` FOREIGN KEY (`food_listing_id`) REFERENCES `tbl_foodlistings` (`Food_Listings_id`),
  ADD CONSTRAINT `tbl_receivables_ibfk_1` FOREIGN KEY (`Reciever_id`) REFERENCES `recipient_admin` (`recipient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
