-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 09:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud2`
--

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

CREATE TABLE `productmaster` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `createddate` datetime NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `updateddate` datetime NOT NULL,
  `updatedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`id`, `name`, `description`, `price`, `createddate`, `createdby`, `updateddate`, `updatedby`) VALUES
(1, 'Apple', 'An apple is a round, edible fruit that grows on an apple tree and comes in many colors, sizes, and shapes', 85, '2024-12-26 20:32:50', 'admin', '0000-00-00 00:00:00', ''),
(2, 'Ritesh Shukla', 'Ritesh ShuklaRitesh Shukla', 252, '2024-12-26 20:34:28', 'admin', '2024-12-26 20:34:28', 'admin'),
(3, 'Little', 'The name Little is Korean for three stars.', 14, '2024-12-26 20:35:38', 'admin', '2024-12-26 20:35:38', 'admin'),
(4, 'Apple11', 'DescriptionDescriptionDescriptionDescription', 12, '2024-12-26 20:52:56', 'admin', '2024-12-26 20:52:56', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createddate` datetime NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `updateddate` datetime NOT NULL,
  `updatedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`id`, `username`, `email`, `password`, `createddate`, `createdby`, `updateddate`, `updatedby`) VALUES
(1, 'Ritesh@145', 'shuklaritesh551@gmail.com', '1212', '2024-12-26 20:26:44', 'admin', '2024-12-26 20:26:44', 'admin'),
(2, 'Kmspl@123', 'kmsplmum4@gmail.com', 'kmsplmum@1212', '2024-12-26 20:27:07', 'admin', '2024-12-26 20:27:07', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productmaster`
--
ALTER TABLE `productmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productmaster`
--
ALTER TABLE `productmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
