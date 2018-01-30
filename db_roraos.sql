-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2018 at 10:15 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_roraos`
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
  `year_made` year(4) NOT NULL,
  `mileage` int(20) NOT NULL,
  `power` int(10) NOT NULL,
  `transmission` varchar(10) NOT NULL,
  `car_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `type`, `brand`, `fuel`, `price`, `owner_id`, `year_made`, `mileage`, `power`, `transmission`, `car_name`) VALUES
(1, 'sedan', 'toyota', 'diesel', 120, 111, 2007, 197000, 136, 'manual', 'Toyota Corolla'),
(2, 'cabrio', 'bmw', 'petrol', 120, 111, 2008, 45000, 320, 'automatic', 'Bmw 330i'),
(3, 'sportback', 'audi', 'petrol', 250, 111, 2013, 24323, 420, 'manual', 'Audi RS3'),
(4, 'sedan', 'bmw', 'diesel', 70, 38, 2003, 221334, 145, 'manual', 'Bmw 320d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
