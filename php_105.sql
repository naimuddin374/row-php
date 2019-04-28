-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2017 at 05:49 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_105`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Electrical'),
(2, 'Fruts'),
(3, 'Shose'),
(4, 'Bags'),
(5, 'Men Fashion'),
(6, 'Girls Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` char(32) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `type`) VALUES
(1, 'Mohammad Foysal', 'foysal.km68@gmail.com', '202cb962ac59075b964b07152d234b70', 'a'),
(2, 'Mozahidul Islam', 'mozahid@gmail.com', '202cb962ac59075b964b07152d234b70', 'e'),
(3, 'Siam Ahmed', 'siam123@gmail.com', '202cb962ac59075b964b07152d234b70', 'c'),
(5, 'Naim', 'naim7374@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float(8,2) NOT NULL,
  `vat` float(5,2) NOT NULL,
  `discount` float(4,2) NOT NULL,
  `categoryid` tinyint(3) UNSIGNED NOT NULL,
  `stock` smallint(6) NOT NULL,
  `picture` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `vat`, `discount`, `categoryid`, `stock`, `picture`) VALUES
(1, 'Sony 40\'\' W652D/W650D Full HD Internet TV - Black', 38500.00, 15.00, 35.00, 1, 20, 'jpg'),
(2, 'Canon EOS 70D - 20.2MP - 3\" Vari Angle LCD Display', 70000.00, 25.00, 33.00, 1, 15, 'jpg'),
(3, 'BLU Cotton Casual Shirt', 1590.00, 25.00, 30.00, 5, 25, 'jpg'),
(4, 'Pick Pack Chinese Linen Unstitched Fabric - Multi-', 1400.00, 15.00, 25.00, 6, 25, 'jpg'),
(5, 'Dallas PU Casual Shoe For Men - Gray', 2000.00, 27.00, 30.00, 3, 15, 'jpg'),
(6, 'Dream Apple 22\" Backpack For Men - Navy Blue', 1490.00, 30.00, 50.00, 4, 10, 'jpg'),
(7, 'Porishop BD Vegetables and Fruits Cutter Tool', 250.00, 50.00, 30.00, 2, 100, 'jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`categoryid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
