-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 01:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grievancesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `grievancetable`
--

CREATE TABLE `grievancetable` (
  `ID` int(10) NOT NULL,
  `userName` varchar(65) NOT NULL,
  `name` varchar(65) NOT NULL,
  `recievedDate` date NOT NULL,
  `address` varchar(1000) NOT NULL,
  `mobileNo` int(10) NOT NULL,
  `email` varchar(65) NOT NULL,
  `description` text NOT NULL,
  `department` varchar(50) NOT NULL,
  `subdivision` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grievancetable`
--

INSERT INTO `grievancetable` (`ID`, `userName`, `name`, `recievedDate`, `address`, `mobileNo`, `email`, `description`, `department`, `subdivision`, `status`) VALUES
(21, 'ryt', 'ryt', '2019-05-01', 'iitg', 12, 'q', '1', 'Water Department', 'Pipeline Blockage', 'Completed - 21'),
(22, 'ryt', 'ryt', '2019-05-01', 'iitg', 12, 'q', '2', 'Water Department', 'Pipeline Leakage', 'Completed - 22'),
(23, 'ryt', 'ryt', '2019-05-01', 'iitg', 12, 'q', '3', 'Water Department', 'Pipeline Leakage', 'Completed - 23'),
(24, 'gami', 'dg', '2019-05-02', 'iitg', 2147483647, 'i@gmail.com', 'there is a need of speed breaker', 'Road Management', 'Speed Breaker', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `labour`
--

CREATE TABLE `labour` (
  `department` varchar(65) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labour`
--

INSERT INTO `labour` (`department`, `count`) VALUES
('Water Department', 14),
('Road Management', 122),
('Sewage & Waste Management', 73);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `userType` varchar(3) NOT NULL DEFAULT 'cit',
  `userName` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `name` varchar(65) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `mobileNo` int(10) NOT NULL,
  `email` varchar(65) NOT NULL,
  `grievance` varchar(5000) NOT NULL DEFAULT ','
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `userType`, `userName`, `password`, `name`, `gender`, `address`, `phoneNo`, `mobileNo`, `email`, `grievance`) VALUES
(1, 'sup', 'supervisior', 'admin', 'Kumar', 'm', '', 0, 0, '', ','),
(2, 'eng', 'engineer', 'admin', 'karan singh', 'm', '', 0, 0, '', ','),
(3, 'cit', 'gami', '12', 'dg', 'm', 'iitg', 6659, 2147483647, 'i@gmail.com', ','),
(8, 'cit', 'dng', '12', 'Deepak Gami', 'i', 'iitg', 12, 12, 'gamideepak@gmail.com', ','),
(10, 'cit', 'ryt', 'Zmw5NTI5', 'ryt', 'i', 'iitg', 12, 12, 'q', ','),
(12, 'cit', 'sethi', '12', 'sethi', 'i', 'iitg', 12, 12, 'a', ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grievancetable`
--
ALTER TABLE `grievancetable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grievancetable`
--
ALTER TABLE `grievancetable`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
