-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 02:18 PM
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
(1, 'Swimming', '2023-10-17', '12:53:00', 'Italy', 'Bodysuit', 'Done', '', '2023-10-12 20:50:42', 2),
(2, 'Swimmingfasfasf', '2023-10-19', '12:03:00', 'Canada', 'Bodysuit', 'Remarks', 'werfhg', '2023-10-12 20:59:49', 2),
(3, 'Horseback riding', '2023-11-11', '16:11:00', 'Norway', 'Jodhpurs, knee-high riding boots, a certified helmet, gloves, and a moisture-wicking shirt.', 'Cancel', '', '2023-10-12 21:08:25', 5),
(4, 'Swimming', '2023-10-19', '06:28:00', 'Singapore', 'Bodysuit', 'Done', '', '2023-10-14 08:38:47', 4),
(5, 'Fishing', '2023-10-21', '06:35:00', 'Hometown', 'Sun shirts and shorts', 'Done', '', '2023-10-17 08:36:02', 3);

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
(2, 'ruth@gmail.com', 'ruth', 'Ruth Vegas', 'user', 'active', 'female'),
(3, 'paul@gmail.com', 'paul', 'Paul Henry Elizalde', 'user', 'active', 'male'),
(4, 'j.hayes@gmail.com', 'notjacob', 'Jacob Hayes', 'user', 'active', 'male'),
(5, 'olivia.morgan@gmail.com', 'red12345', 'Olivia Morgan', 'user', 'inactive', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
