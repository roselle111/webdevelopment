-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 01:09 PM
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
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `ootd` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `title`, `date`, `time`, `location`, `ootd`, `status`, `remarks`, `created_at`, `userId`) VALUES
(1, 'Swimming', '2023-10-19', '12:03:00', 'Canada', 'Bodysuit', 'Remarks', 'werfhg', '2023-10-12 20:59:49', 2),
(2, 'Horseback riding', '2023-11-11', '16:11:00', 'Norway', 'Jodhpurs, knee-high riding boots, a certified helmet, gloves, and a moisture-wicking shirt.', 'Cancel', '', '2023-10-12 21:08:25', 5),
(5, 'Bike', '2023-10-08', '07:40:00', 'Hometown', 'Sun shirts and shorts', 'Cancel', '', '2023-10-18 04:38:09', 1),
(6, 'Bike', '2023-10-02', '16:40:00', 'Hometown', 'Sun shirts and shorts', 'Cancel', '', '2023-10-18 06:37:09', 3),
(7, 'Hiking', '2023-10-13', '05:40:00', 'Norway', 'Sun shirts and shorts', 'Remarks', 'get sick.', '2023-01-02 07:46:22', 8),
(29, 'Hiking', '2023-01-28', '05:00:00', 'New Zealand', 'shorts, a moisture-wicking shirt, comfortable hiking boots, a hat, and sunglasses', 'Done', '', '2023-10-19 07:57:03', 10);

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
(2, 'ruthvegas@gmail.com', 'ruth', 'Ruth Vegas', 'user', 'active', 'female'),
(3, 'paul@gmail.com', 'paul', 'Paul Henry Elizalde', 'user', 'active', 'male'),
(4, 'j.hayes@gmail.com', 'notjacob', 'Jacob Hayes', 'user', 'active', 'male'),
(5, 'olivia.morgan@gmail.com', 'red12345', 'Olivia Morgan', 'user', 'inactive', 'female'),
(6, 'hogan.aarav@gmail.com', 'hogan', 'Aarav Hogan', 'user', 'inactive', 'male'),
(7, 'tina@gmail.com', '12345', 'Agustina Gamboa', 'user', 'active', 'female'),
(8, 'keziah@gmail.com', '12345', 'Keziah Alliah Cartilla', 'user', 'inactive', 'female'),
(9, 'bryanalcover@gmail.com', 'joke', 'Bryan Alcover', 'user', 'inactive', 'male'),
(10, 'junavel@gmail.com', 'junavel', 'Junavel Indig', 'user', 'active', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_activities_users` (`userId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk_activities_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
