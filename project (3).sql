-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 09:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end`) VALUES
(3, 'TY', '2024-10-16', '0000-00-00'),
(4, 'TY', '2024-10-16', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `software` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `purchase_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `lineid` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `vendor_name`, `contact_name`, `software`, `created_at`, `purchase_date`, `address`, `tel`, `lineid`, `status`, `create_date`, `email`) VALUES
(13, 'Microsoft', '', 'Small select', '2024-10-07 10:24:33', '2024-10-07', '  ', '0908776857', '@Microsoft.Loki', 'Active', '2024-10-07', ''),
(14, 'Google', '', 'Small select', '2024-10-08 05:03:27', '2024-10-09', '', '', '', 'Active', '2024-10-08', '');

-- --------------------------------------------------------

--
-- Table structure for table `list_detail`
--

CREATE TABLE `list_detail` (
  `id` int(11) NOT NULL,
  `ref_list_id` int(11) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `doc` varchar(255) DEFAULT NULL,
  `work_start` date DEFAULT NULL,
  `work_end` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `service_type` varchar(255) NOT NULL,
  `list` varchar(255) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `product` varchar(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date_create` date NOT NULL DEFAULT current_timestamp(),
  `pr_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_detail`
--

INSERT INTO `list_detail` (`id`, `ref_list_id`, `start`, `end`, `doc`, `work_start`, `work_end`, `status`, `service_type`, `list`, `cost`, `product`, `amount`, `note`, `date_create`, `pr_number`) VALUES
(52, 13, '0000-00-00', '0000-00-00', '241017_023915.jpg', '0000-00-00', '0000-00-00', '', '', '', NULL, '', 0, ' ', '0000-00-00', ''),
(53, 13, '2024-10-17', '2024-10-18', '241017_044648.png', '0000-00-00', '0000-00-00', '', '', 'Software', NULL, 'ตู้กดอาหาร', 12000, ' REDER', '0000-00-00', ''),
(54, 13, '0000-00-00', '0000-00-00', '241018_113611.png', '0000-00-00', '0000-00-00', '', '', '', NULL, '', 0, ' ', '2024-10-18', '77687');

-- --------------------------------------------------------

--
-- Table structure for table `software_list`
--

CREATE TABLE `software_list` (
  `id` int(10) NOT NULL,
  `software` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'user', '1234', 'peacepimpee2545@gmail.com', '2024-10-03 07:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_name`
--

CREATE TABLE `vendor_name` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor_name`
--

INSERT INTO `vendor_name` (`id`, `vendor_name`, `created_at`) VALUES
(1, 'Google', '2024-10-03 07:37:59'),
(2, 'Microsoft', '2024-10-03 08:24:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_detail`
--
ALTER TABLE `list_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_list_id` (`ref_list_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_name`
--
ALTER TABLE `vendor_name`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `list_detail`
--
ALTER TABLE `list_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_name`
--
ALTER TABLE `vendor_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_detail`
--
ALTER TABLE `list_detail`
  ADD CONSTRAINT `list_detail_ibfk_1` FOREIGN KEY (`ref_list_id`) REFERENCES `list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
