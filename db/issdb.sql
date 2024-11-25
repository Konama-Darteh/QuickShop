-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 02:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issdb`
--
DROP DATABASE IF EXISTS issdb;
CREATE DATABASE issdb;
USE issdb;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailID` int(10) NOT NULL,
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL DEFAULT 1,
  `Price` double(15,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) NOT NULL,
  `Date` datetime NOT NULL,
  `UserID` int(10) NOT NULL,
  `TotalAmount` double(15,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodID` int(10) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `prodDescription` text DEFAULT NULL,
  `price` double(15,2) DEFAULT 0.00,
  `stockQuantity` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodID`, `prodName`, `prodDescription`, `price`, `stockQuantity`) VALUES
(1, 'Smartphone', 'Latest model smartphone with high-performance features.', 699.99, 50),
(2, 'Vacuum Cleaner', 'High-power vacuum cleaner suitable for home and office use.', 120.00, 30),
(3, 'Bluetooth Speaker', 'Portable Bluetooth speaker with excellent sound quality.', 49.99, 100),
(4, 'Gaming Laptop', 'High-performance gaming laptop with cutting-edge specifications.', 1299.99, 20),
(5, 'Air Fryer', 'Compact and efficient air fryer for healthier cooking.', 89.99, 75);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Sales Personnel','Inventory Manager','Customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fName`, `lName`, `email`, `password`, `role`) VALUES
(1, 'Breanna', 'Pittman', 'nuca@mailinator.com', '$2y$10$hTpYRkgEh.Tg6aUt8y8JHe136GAzus9tvAG/CcHOlVUjhSubD3Wqu', 'Customer'),
(2, 'Philip', 'Lowery', 'cibily@mailinator.com', '$2y$10$R6YYiE8Wb8pZOpEQodTgCO9p8320heam2h4ZQwl27m0pZKfBbmhkm', 'Admin'),
(3, 'Griffin', 'Gilliam', 'xene@mailinator.com', '$2y$10$53Jrj6NfKVAS.W0T7s/M6eqsctRYPwtiRPrmiWKGnsspZb.IMbpSu', 'Sales Personnel'),
(4, 'Chelsea', 'Mccoy', 'sedib@mailinator.com', '$2y$10$ioLBoGNcIJQr2SAbV7jE5Oc24F5dx7KtZ4/56NmNLRFED3LZNniGS', 'Inventory Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `users` (`UserID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prodID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`prodID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `users` FOREIGN KEY (`UserID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
