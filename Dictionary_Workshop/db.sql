GRANT ALL PRIVILEGES ON *.* TO `user_6506021421200`@`%` IDENTIFIED BY PASSWORD '*344E130F4F586AED2695086AB3C4A9C4D58F4DC4' WITH GRANT OPTION;

GRANT ALL PRIVILEGES ON `fitm\_dic`.* TO `user_6506021421200`@`%` WITH GRANT OPTION;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 05:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitm_dic`
--
CREATE DATABASE IF NOT EXISTS `fitm_dic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fitm_dic`;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `TYPE_CODE` varchar(5) NOT NULL,
  `TYPE_DETAIL` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vocab`
--

DROP TABLE IF EXISTS `vocab`;
CREATE TABLE IF NOT EXISTS `vocab` (
  `DIC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VOCAB` varchar(50) NOT NULL,
  `TYPE_CODE` varchar(5) NOT NULL,
  `MEAN` varchar(255) NOT NULL,
  PRIMARY KEY (`DIC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vocab`
--

INSERT INTO `vocab` (`DIC_ID`, `VOCAB`, `TYPE_CODE`, `MEAN`) VALUES
(1, 'test', 'test', 'test'),
(2, 'vocab2', '2', '22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
