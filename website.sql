-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 06:58 AM
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
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `status`, `remarks`, `created_at`) VALUES
(1, 'Remarks', 'hgjngfhn', '2023-10-11 11:52:20'),
(2, 'Remarks', 'werdf', '2023-10-11 11:53:03'),
(19, 'Remarks', 'fvbhfgv', '2023-10-12 03:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `life`
--

CREATE TABLE `life` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `life`
--

INSERT INTO `life` (`id`, `title`, `name`, `date`, `time`, `location`) VALUES
(1, 'Swimming', 'Paul Henry Elizalde', '2023-10-17', '21:44:00', 'Hometown'),
(2, 'Yoga', 'Jacob Hayes', '2023-10-11', '22:51:00', 'Home'),
(3, 'Hiking', 'Ruth Vegas', '2023-10-20', '06:00:00', 'Singapore'),
(140, 'Swimming', 'Paul Henry Elizalde', '2023-10-25', '11:10:00', 'Hometown'),
(141, 'Swimming', 'Paul Henry Elizalde', '2023-10-25', '11:10:00', 'Hometown'),
(142, 'jhnb', 'nhb', '2023-10-21', '11:11:00', 'Hometown'),
(143, 'Bike', 'Paul Henry Elizalde', '2023-10-12', '11:10:00', 'Hometown'),
(144, 'Swimming', 'Paul Henry Elizalde', '2023-11-12', '23:11:00', 'Hometown'),
(145, 'Bike', 'Jacob Hayes', '2023-10-20', '12:13:00', 'Hometown');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Role` enum('user','admin') NOT NULL,
  `Status` enum('active','inactive') NOT NULL,
  `Gender` enum('male','female','others') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Email`, `Password`, `Name`, `Role`, `Status`, `Gender`) VALUES
(1, 'rosellemartinez09@gmail.com', 'laravel', 'Roselle Martinez', 'admin', 'active', 'female'),
(2, 'ruthvegas@gmail.com', 'ruthy', 'Ruth Vegas', 'user', 'active', 'female'),
(3, 'paul@gmail.com', 'what???', 'Paul Henry Elizalde', 'user', 'active', 'male'),
(4, 'j.hayes@gmail.com', 'notjacob', 'Jacob Hayes', 'user', 'active', 'male'),
(5, 'olivia.morgan@gmail.com', 'red12345', 'Olivia Morgan', 'user', 'active', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `life`
--
ALTER TABLE `life`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `life`
--
ALTER TABLE `life`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
