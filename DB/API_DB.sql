-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 07:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

CREATE TABLE `api_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_users`
--

INSERT INTO `api_users` (`user_id`, `username`, `email`, `password`, `phone`, `cnic`, `pic`, `type`, `license`, `status`, `created_at`) VALUES
(3, 'babbal', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', '5467890087654', '1674672825.jpg', 'ADMIN', '8768768', 1, '2023-01-30 18:46:28'),
(5, 'babbal', 'shani@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', '5467890087654', '1674672825.jpg', 'Driver', '', 1, '2023-02-02 07:04:04'),
(6, 'babbal', 'shani123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', '5467890087654', '1674672825.jpg', 'Passenger', '', 0, '2023-02-02 07:04:16'),
(7, 'babbal', 'yousaf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1111111111', '5467890087654', '1674672825.jpg', 'Passenger', '', 0, '2023-02-02 07:04:20'),
(8, 'babbal', 'yousaf123@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1111111111', '5467890087654', '1674672825.jpg', 'Driver', '12345554645604598', 1, '2023-01-25 18:53:45'),
(9, 'babbal', '324324@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1111111111', '5467890087654', '1674672956.png', 'Driver', '12345554645604598', 1, '2023-01-25 18:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(2, 'ahsan', 'ahsan@gmail.com', '76868768768', ' i love you', '2023-01-19 17:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Id` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `vid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `uid`, `vid`) VALUES
(1, 7, 7),
(2, 7, 7),
(3, 7, 7),
(4, 7, 7),
(5, 7, 6),
(6, 7, 6),
(7, 7, 6),
(8, 7, 6),
(9, 7, 6),
(10, 7, 6),
(11, 7, 6),
(12, 7, 6),
(13, 7, 1),
(14, 7, 1),
(15, 7, 1),
(16, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `country`) VALUES
(24, 'Ahsan', 'ali@gmail.com', 'test 123', 'Pakistan'),
(25, 'Ahsan', 'ali@gmail.com', '03337673978', 'Pakistan'),
(34, 'amazn', 'jsldkjflkdsj', 'sdklkfjsd', 'lsdjl'),
(35, 'jatoi', 'Babbal@gmail.com', '03337673978', 'Pakistan vs India'),
(36, 'Hasnain', 'string', 'string', 'string'),
(38, 'ibad', 'string', 'string', 'string');

-- --------------------------------------------------------

--
-- Table structure for table `vehicals`
--

CREATE TABLE `vehicals` (
  `vehical_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `vairent` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `vpic` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `location` varchar(255) NOT NULL,
  `ride_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicals`
--

INSERT INTO `vehicals` (`vehical_id`, `model`, `vairent`, `number`, `description`, `price`, `type`, `user_id`, `vpic`, `created_at`, `location`, `ride_status`) VALUES
(1, '1', '3', '4', '5', '6', 'Sharing', '5', '1670014410.png', '2023-01-16 04:58:43', 'thokar', 0),
(3, '1', '3', '4', '5', '6', 'Sharing', '5', '1673626889.png', '2023-01-16 04:58:46', 'multan', 0),
(4, '1', '3', '4', '5', '6', 'Sharing', '5', '1673627032.png', '2023-01-16 04:58:38', 'multan', 0),
(5, '1', '3', '4', '5', '6', 'Sharing', '5', '1673631191.png', '2023-01-13 17:33:11', 'thokar', 0),
(6, '1', '3', '4', '5', '6', 'Rent', '5', '1673631217.png', '2023-01-30 18:33:09', 'thokar', 1),
(7, '1', '3', '4', '5', '6', 'Sharing', '5', '1674065007.png', '2023-01-26 11:47:41', 'thokar', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_users`
--
ALTER TABLE `api_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicals`
--
ALTER TABLE `vehicals`
  ADD PRIMARY KEY (`vehical_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_users`
--
ALTER TABLE `api_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `vehicals`
--
ALTER TABLE `vehicals`
  MODIFY `vehical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
