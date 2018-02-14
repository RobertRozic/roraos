-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2018 at 02:44 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amplius_roraos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `fuel` varchar(6) NOT NULL,
  `price` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `year_made` int(4) NOT NULL,
  `mileage` int(20) NOT NULL,
  `power` int(10) NOT NULL,
  `transmission` varchar(10) NOT NULL,
  `car_name` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `sponsored` int(1) NOT NULL DEFAULT '0',
  `date_added` date NOT NULL DEFAULT '1970-01-01',
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `type`, `brand`, `fuel`, `price`, `owner_id`, `year_made`, `mileage`, `power`, `transmission`, `car_name`, `image`, `sponsored`, `date_added`, `active`) VALUES
(2, 'cabrio', 'bmw', 'petrol', 120, 38, 2008, 45000, 325, 'automatic', 'Bmw 330i', 'audi.jpg', 0, '1970-01-01', 1),
(3, 'sportback', 'audi', 'diesel', 250, 38, 2013, 24323, 425, 'manual', 'Audi RS3', 'audi.jpg', 1, '1970-01-01', 1),
(4, 'sedan', 'bmw', 'diesel', 70, 38, 2003, 221334, 145, 'manual', 'Bmw 320d', 'audi.jpg', 1, '1970-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `car_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(400) NOT NULL,
  `account_type` varchar(255) NOT NULL DEFAULT 'user',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `password`, `hash`, `account_type`, `status`) VALUES
(38, 'Robert', 'Rozic', 'r.rozic97@gmail.com', '63125327', 'Ilici 313', '$2y$10$Hn.aEHqI9IwVKcbhI2Gs1eDvzkblT1OtYUY8N3nfJkmTnNq/nUlY.', 'd86ea612dec96096c5e0fcc8dd42ab6d', 'admin', 1),
(39, 'fsese', 'fse', 'fesfe@gmail.com', '3123123', NULL, '$2y$10$fC75VhMWUbPfx.2FZPjHaO2t8NVntH1PErWmEHjX6qMzoDjRW73Uu', 'db85e2590b6109813dafa101ceb2faeb', 'user', 1),
(40, 'Mario', 'Rajic', 'mariorajic7@gmail.com', '63428704', NULL, '$2y$10$kklmdnZ6ageUlSp8fQxDAeqX89nvrbE4DD6nS71GlRm2PGiAdUgRK', '9431c87f273e507e6040fcb07dcb4509', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
