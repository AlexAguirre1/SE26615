-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 05:30 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpclassfall2017`
--
CREATE DATABASE IF NOT EXISTS `phpclassfall2017` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phpclassfall2017`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(2, 'Car'),
(6, 'FastFood'),
(5, 'Headphones'),
(1, 'Phones'),
(3, 'Tools'),
(4, 'Watches');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `created`) VALUES
(2, 'testingAemail@email.com', '$2y$10$y/SETg7Jqdvfum.lhuOnwuhtcddlXbW6Mw9hrrszw1idGOktPDjYG', '0000-00-00 00:00:00'),
(3, 'email@mail.com', '$2y$10$RsXr7E7LVtFkb39ofh8uMem.IWfTP96ttcPdv/YXtg5MXZzcmwtgS', '0000-00-00 00:00:00'),
(4, 'AlexAguirremail@email.com', '$2y$10$jC8EJYzNyo2ElJu8d0Fe4.fTKOIDkfp0TXw0ypr/CvlTs1l0n2oIG', '0000-00-00 00:00:00'),
(5, 'TestingEmail@mail.com', '$2y$10$puQrMXP5NxPOICP81zeAAOuxl7XQ7qCxOjWSKkgIX30sg1mrobLJC', '0000-00-00 00:00:00'),
(6, 'aguirredaniel120@gmail.com', '$2y$10$mq/LPvbr.HHa/F.GXj.jbO4yKDR3NbGBBrHv44o08pN9Q1vhcYxca', '0000-00-00 00:00:00'),
(7, 'aEmail@mail.com', '$2y$10$dhFqXRohxLV1EDzu4E0XjuBNfmx5tnDGiRxfVVGqwRnaoPV68Cmly', '0000-00-00 00:00:00'),
(8, 'as@email.com', '$2y$10$rEWtgeUlMsI4jTN8Cl5eWeNZQGClX6bCDNcMojQXl4e.L4pbW7Q4q', '0000-00-00 00:00:00'),
(9, 'coolEmail@gmail.com', '$2y$10$BDFVjXCPR/FnQzNq2cX91.5K/KvsJxZWsCSBogTMLCJGreJaxX3cS', '0000-00-00 00:00:00'),
(10, '123321A@yahoo.com', '$2y$10$sBkFPRLPZhBVDM12IzcgHOnrrH5CBwDexikSMEb012byh9uASRgb2', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
