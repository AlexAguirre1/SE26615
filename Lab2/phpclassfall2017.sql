-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2017 at 09:11 PM
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
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE `actors` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `firstname`, `lastname`, `dob`, `height`) VALUES
(1, 'Zac', 'Efron', 'october 18, 1997', '5&#39; 8&#34;'),
(2, 'Gal', 'Gadot', 'April 30, 1985', '5&#39; 10&#34;'),
(3, 'Bill', 'Skarsgard', 'August 9,1990', '6&#39; 3 1/4&#34;'),
(4, 'Tom', 'Cruise', 'July 3, 1962', '5&#39; 7&#34;'),
(5, 'Tom', 'Cruise', 'July 3, 1962', '5&#39; 7&#34;'),
(6, 'Tom', 'Cruise', 'July 3, 1962', '5&#39; 7&#34;'),
(7, 'Tom', 'Cruise', 'July 3, 1962', '5&#39; 7&#34;'),
(8, 'Tom', 'Cruise', 'July 3, 1962', '5&#39; 7&#34;'),
(9, 'Tom', 'Cruise', 'July 3, 1962', '5&#39; 7&#34;'),
(10, 'Tom', 'Cruise', 'July 3, 1962', '5&#39; 7&#34;'),
(11, 'Tom', 'Cruise', 'July 3, 1962', '5&#39; 7&#34;'),
(12, 'Alexandra', 'Daddario', 'March 16, 1986', '5&#39; 8&#34;'),
(13, 'Alexandra', 'Daddario', 'March 16, 1986', '5&#39; 8&#34;'),
(14, 'Alexandra', 'Daddario', 'March 16, 1986', '5&#39; 8&#34;'),
(15, 'Alexandra', 'Daddario', 'March 16, 1986', '5&#39; 8&#34;'),
(16, 'Test', 'Test', 'march 11,1998', '5&#39; 11&#34;');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
