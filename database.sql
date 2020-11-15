-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 02:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekoji3`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kota`
--

CREATE TABLE `data_kota` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(20) NOT NULL,
  `pajak` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kota`
--

INSERT INTO `data_kota` (`id`, `nama_kota`, `pajak`) VALUES
(1, 'A', 5),
(2, 'B', 7),
(3, 'C', 4),
(4, 'D', 8),
(5, 'E', 5),
(6, 'F', 4),
(7, 'G', 4),
(8, 'H', 3),
(9, 'I', 6),
(10, 'J', 7),
(11, 'K', 6),
(12, 'L', 9),
(13, 'M', 5),
(14, 'N', 7),
(15, 'O', 6);

-- --------------------------------------------------------

--
-- Table structure for table `jalur`
--

CREATE TABLE `jalur` (
  `id` int(11) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `ke` varchar(20) NOT NULL,
  `biaya` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jalur`
--

INSERT INTO `jalur` (`id`, `dari`, `ke`, `biaya`) VALUES
(8, 'A', 'B', 7),
(9, 'A', 'C', 7),
(10, 'A', 'H', 5),
(11, 'B', 'F', 5),
(12, 'B', 'D', 4),
(13, 'B', 'G', 2),
(14, 'B', 'C', 3),
(18, 'C', 'I', 10),
(19, 'C', 'H', 9),
(21, 'H', 'I', 8),
(24, 'D', 'E', 3),
(26, 'D', 'F', 7),
(27, 'D', 'G', 11),
(31, 'G', 'E', 6),
(32, 'G', 'I', 5),
(36, 'I', 'E', 8),
(37, 'I', 'J', 11),
(38, 'I', 'N', 2),
(40, 'F', 'E', 3),
(41, 'F', 'K', 9),
(42, 'E', 'J', 4),
(43, 'E', 'K', 8),
(44, 'E', 'L', 7),
(45, 'J', 'N', 4),
(46, 'J', 'L', 5),
(47, 'J', 'M', 1),
(48, 'N', 'M', 8),
(49, 'K', 'L', 3),
(50, 'K', 'O', 2),
(51, 'L', 'O', 5),
(52, 'L', 'M', 2),
(53, 'M', 'O', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kota`
--
ALTER TABLE `data_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jalur`
--
ALTER TABLE `jalur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kota`
--
ALTER TABLE `data_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jalur`
--
ALTER TABLE `jalur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
