-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 02:51 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Price`, `Quantity`) VALUES
(3, '11515', 1256.00, 1553),
(4, '16s', 56.00, 56),
(6, 'double', 12.50, 17);

-- --------------------------------------------------------

--
-- Table structure for table `receiptitems`
--

CREATE TABLE `receiptitems` (
  `ID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `itemName` varchar(30) NOT NULL,
  `itemQty` int(11) NOT NULL,
  `itemPrice` double(6,2) NOT NULL,
  `ReceiptID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiptitems`
--

INSERT INTO `receiptitems` (`ID`, `itemID`, `itemName`, `itemQty`, `itemPrice`, `ReceiptID`) VALUES
(2, 2, '222', 3, 333.00, 1),
(3, 1, 'test', 1, 10.00, 2),
(4, 2, '222', 1, 333.00, 2),
(5, 4, '16s', 1, 56.00, 2),
(6, 1, 'test', 1, 10.00, 3),
(7, 2, '222', 1, 333.00, 3),
(8, 4, '16s', 1, 56.00, 3),
(9, 1, 'test', 1, 10.00, 4),
(10, 2, '222', 1, 333.00, 5),
(11, 1, 'test', 1, 10.00, 6),
(12, 2, '222', 1, 333.00, 6),
(14, 1, 'test', 1, 10.00, 7),
(15, 1, 'test', 1, 10.00, 8),
(16, 1, 'test', 1, 10.00, 9),
(17, 2, '222', 1, 333.00, 10),
(18, 2, '222', 1, 333.00, 11),
(19, 2, '222', 1, 333.00, 12),
(20, 4, '16s', 1, 56.00, 13),
(21, 1, 'test', 1, 10.00, 14),
(22, 1, 'test', 1, 10.00, 16),
(23, 2, '222', 1, 333.00, 17),
(24, 1, 'test', 1, 10.00, 18),
(25, 2, '222', 1, 333.00, 20),
(26, 1, 'test', 1, 10.00, 21),
(27, 1, 'test', 1, 10.00, 22),
(28, 2, '222', 1, 333.00, 23),
(29, 2, '222', 1, 333.00, 24),
(30, 1, 'test', 1, 10.00, 25),
(31, 2, '222', 1, 333.00, 26),
(32, 2, '222', 2, 333.00, 27),
(33, 3, '11515', 1, 1256.00, 27),
(34, 1, 'test', 2, 10.00, 28),
(35, 2, '222', 1, 333.00, 28),
(36, 6, 'double', 3, 12.50, 29),
(37, 1, 'test', 1, 10.00, 30);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `ReceiptID` int(11) NOT NULL,
  `SellerName` varchar(30) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`ReceiptID`, `SellerName`, `Date`) VALUES
(1, 'Mina Awad', '2018-11-20 09:13:32'),
(2, 'Mina Awad ', '2018-11-23 03:20:42'),
(3, 'Mina Awad ', '2018-11-23 03:37:51'),
(4, 'Mina Awad ', '2018-11-23 03:54:59'),
(5, 'Mina Awad ', '2018-11-23 04:01:08'),
(6, 'Mina Awad ', '2018-11-23 04:15:04'),
(7, 'Mina Awad ', '2018-11-23 04:15:56'),
(8, 'Mina Awad ', '2018-11-23 04:17:21'),
(9, 'Mina Awad ', '2018-11-23 04:19:06'),
(10, 'Mina Awad ', '2018-11-23 04:20:24'),
(11, 'Mina Awad ', '2018-11-23 04:21:55'),
(12, 'Mina Awad ', '2018-11-23 04:25:53'),
(13, 'Mina Awad ', '2018-11-23 04:28:53'),
(14, 'Mina Awad ', '2018-11-23 04:31:18'),
(15, 'Mina Awad ', '2018-11-23 04:32:01'),
(16, 'Mina Awad ', '2018-11-23 04:35:40'),
(17, 'Mina Awad ', '2018-11-23 04:36:20'),
(18, 'Mina Awad ', '2018-11-23 04:38:26'),
(19, 'Mina Awad ', '2018-11-23 04:38:57'),
(20, 'Mina Awad ', '2018-11-23 04:39:37'),
(21, 'Mina Awad ', '2018-11-23 04:40:32'),
(22, 'Mina Awad ', '2018-11-23 04:44:07'),
(23, 'Mina Awad ', '2018-11-23 04:44:53'),
(24, 'Mina Awad ', '2018-11-23 04:46:45'),
(25, 'Mina Awad ', '2018-11-23 04:50:24'),
(26, 'Mina Awad ', '2018-11-23 04:51:07'),
(27, 'Mina Awad ', '2018-11-23 04:56:33'),
(28, 'Mina Awad ', '2018-11-30 01:11:58'),
(29, 'Mina Awad ', '2018-11-30 01:13:00'),
(30, 'test', '2018-11-30 02:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `IsAdmin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `Username`, `Password`, `IsAdmin`) VALUES
(1, 'Mina Awad ', 'mina', '1234', 'True'),
(2, 'test', 'test', '1234', 'False');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `receiptitems`
--
ALTER TABLE `receiptitems`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ReceiptID` (`ReceiptID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`ReceiptID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receiptitems`
--
ALTER TABLE `receiptitems`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `ReceiptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receiptitems`
--
ALTER TABLE `receiptitems`
  ADD CONSTRAINT `receiptitems_ibfk_1` FOREIGN KEY (`ReceiptID`) REFERENCES `sales` (`ReceiptID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
