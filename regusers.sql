-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 05:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapidtraders`
--

-- --------------------------------------------------------

--
-- Table structure for table `regusers`
--

CREATE TABLE `regusers` (
  `SN` int(250) NOT NULL,
  `Fname` varchar(250) NOT NULL,
  `Lname` varchar(250) NOT NULL,
  `phone` int(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `pword` varchar(250) NOT NULL,
  `referredby` varchar(250) NOT NULL DEFAULT 'not referred',
  `referralcode` varchar(250) NOT NULL,
  `Accountbalance` int(250) DEFAULT 0,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `activated` tinyint(4) NOT NULL DEFAULT 0,
  `typeofuser` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regusers`
--
ALTER TABLE `regusers`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `referralcode` (`referralcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regusers`
--
ALTER TABLE `regusers`
  MODIFY `SN` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
