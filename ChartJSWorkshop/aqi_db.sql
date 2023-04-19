-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 06:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `aqi_db`
--

-- --------------------------------------------------------
--
-- Table structure for table `recorddata`
--

CREATE TABLE `recorddata` (
  `id` int(7) NOT NULL,
  `sensor` varchar(255) NOT NULL,
  `pm` int(3) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `recorddata`
--

INSERT INTO `recorddata` (`id`, `sensor`, `pm`, `location_id`)
VALUES (1, 'TEST01', 20, 1),
  (2, 'TEST02', 256, 2);
-- --------------------------------------------------------
--
-- Table structure for table `station_info`
--

CREATE TABLE `station_info` (
  `location_id` int(11) NOT NULL,
  `sensor_name` varchar(255) NOT NULL,
  `log` float NOT NULL,
  `lag` float NOT NULL,
  `status` int(1) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `station_info`
--

INSERT INTO `station_info` (
    `location_id`,
    `sensor_name`,
    `log`,
    `lag`,
    `status`
  )
VALUES (1, 'Station A1', -231, 232, 1),
  (2, 'Station A2', 123, 321, 1);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `recorddata`
--
ALTER TABLE `recorddata`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `station_info`
--
ALTER TABLE `station_info`
ADD PRIMARY KEY (`location_id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recorddata`
--
ALTER TABLE `recorddata`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT for table `station_info`
--
ALTER TABLE `station_info`
MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;