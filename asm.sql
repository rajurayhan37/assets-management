-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 08:44 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `assetinfo`
--

CREATE TABLE `assetinfo` (
  `AssetId` int(11) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `MfgId` int(11) NOT NULL,
  `PartNumber` text DEFAULT NULL,
  `SerialNumber` varchar(255) NOT NULL,
  `HwRev` varchar(255) DEFAULT NULL,
  `AssetTag` varchar(255) DEFAULT NULL,
  `SwVersion` text DEFAULT NULL,
  `IpAddress` text DEFAULT NULL,
  `LocId` int(11) NOT NULL,
  `Description` text DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  `LastUpdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LocId` int(11) NOT NULL,
  `LocName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LocId`, `LocName`) VALUES
(37, 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `MfgId` int(11) NOT NULL,
  `MfgName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`MfgId`, `MfgName`) VALUES
(4, 'Cisco'),
(5, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `username`
--

CREATE TABLE `username` (
  `UserId` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `username`
--

INSERT INTO `username` (`UserId`, `Username`, `Email`, `Password`) VALUES
(1, 'Rayhan Kobir', 'rayhan@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assetinfo`
--
ALTER TABLE `assetinfo`
  ADD PRIMARY KEY (`AssetId`),
  ADD KEY `MfgId` (`MfgId`),
  ADD KEY `LocId` (`LocId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LocId`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`MfgId`);

--
-- Indexes for table `username`
--
ALTER TABLE `username`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assetinfo`
--
ALTER TABLE `assetinfo`
  MODIFY `AssetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LocId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `MfgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `username`
--
ALTER TABLE `username`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assetinfo`
--
ALTER TABLE `assetinfo`
  ADD CONSTRAINT `AssetInfo_ibfk_1` FOREIGN KEY (`MfgId`) REFERENCES `manufacturer` (`MfgId`),
  ADD CONSTRAINT `AssetInfo_ibfk_2` FOREIGN KEY (`LocId`) REFERENCES `location` (`LocId`),
  ADD CONSTRAINT `AssetInfo_ibfk_3` FOREIGN KEY (`UserId`) REFERENCES `username` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
