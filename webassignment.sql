-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 05:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webassignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryId` int(50) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`) VALUES
(1, 'Starters'),
(2, 'Main Course'),
(3, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `FavoritesId` int(50) NOT NULL,
  `UserId` int(50) NOT NULL,
  `ItemId` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`FavoritesId`, `UserId`, `ItemId`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemId` int(50) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemImage` longblob NOT NULL,
  `CategoryId` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemId`, `ItemName`, `ItemImage`, `CategoryId`) VALUES
(1, 'Chumm Burger', '', 2),
(2, 'Cake', '', 3),
(3, 'Garlic Bread', '', 1),
(4, 'Toast', '', 1),
(5, 'Salad', '', 1),
(6, 'Big Cheese Burger', '', 2),
(7, 'Bacon Burger', '', 2),
(13, 'Red Velvet  Cake', '', 3),
(14, 'Chocolate Ice Cream', '', 3),
(15, 'Strawberry Ice Cream', '', 3),
(16, 'Vanilla Ice Cream', '', 3),
(17, 'Chumm Cake', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `itemdetails`
--

CREATE TABLE `itemdetails` (
  `itemDetailsId` int(50) NOT NULL,
  `ItemId` int(50) NOT NULL,
  `Price` decimal(50,2) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemdetails`
--

INSERT INTO `itemdetails` (`itemDetailsId`, `ItemId`, `Price`, `Description`) VALUES
(1, 1, '20.00', 'Big meaty burger'),
(2, 2, '14.50', 'Served with candles'),
(3, 3, '8.00', 'The best item on the menu');

-- --------------------------------------------------------

--
-- Table structure for table `roledetails`
--

CREATE TABLE `roledetails` (
  `RoleId` int(50) NOT NULL,
  `RoleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roledetails`
--

INSERT INTO `roledetails` (`RoleId`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `UsrPassword` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Telephone` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Email`, `UsrPassword`, `Firstname`, `Surname`, `Telephone`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', 'admin', 21349200),
(2, 'user@gmail.com', 'user', 'user', 'user', 21349200),
(3, 'test@gmail.com', 'test', 'test', 'test', 21334433),
(20, 'aa@gmail.com', 'a', 'aa', 'aa', 79999999),
(33, 'gg@gmail.com', 'gg', 'gg', 'gg', 7900000),
(43, 'hh@gmail.com', 'hh', 'hh', 'hh', 21444444),
(44, 'foo', '11', '11212', '2323', 112),
(46, 'ff@ff', '11', 'll', 'll', 1212),
(47, 'doo@gmail.com', '12', 'doo', 'doo', 121212),
(48, 'poo@gmail.com', '12', 'poo', 'poo', 1212121),
(59, 'moo@gmail.com', '$2y$10$QjdEMTkyQTQtNEUwRC1BMOFQeeXzGsIQgTq4h7FEMptkQc/MShEHi', 'moo', 'moo', 21444444),
(60, 'roo@gmail.com', '$2y$10$NjYwNkFGQzQtQzY5Ni1GQOs8AXHByEHR02w/yOGP0cJCSA/okHF06', 'roo', 'roo', 21444444),
(62, 'loo@gmail.com', '$2y$10$QkEyMjhFNTUtOTcwMS00N.CCelLQ1wFusPuF/q8PPFDcjMKze4s/G', 'loo', 'loo', 99898989),
(71, 'koo@gmail.com', '$2y$10$QjdEMTkyQTQtNEUwRC1BMOFQeeXzGsIQgTq4h7FEMptkQc/MShEHi', 'moo', 'moo', 79797979),
(72, 'too@gmail.com', '$2y$10$QjQwM0QzRjAtRUZCRi00QukMmEvB44G47WvdQILIvgg36jNg.Na5i', 'moo', 'moo', 79797979),
(82, 'soo@gmail.com', '$2y$10$RjJBNzE5NzgtMjg5RS04QeBeBUyZX/UZ6.fqoXOVfqDz0QQqynKRK', 'soo', 'soo', 79797979),
(96, 'qoo@gmail.com', '$2y$10$RjJBNzE5NzgtMjg5RS04QeBeBUyZX/UZ6.fqoXOVfqDz0QQqynKRK', 'soo', 'soo', 79797979),
(103, 'hoo@gmail.com', '$2y$10$NzQzQjVGMDEtOUQ4MC1FM.ujepFE2DdzSKCdt.ZVTrO6aLXFEjmnK', 'hoo', 'hoo', 79888888),
(104, 'woo@gmail.com', '$2y$10$QkMxM0U1MzMtRjc4Ri01QOiVOTjMt2mfyNo1z5a.kTOp3MbWNVPXK', 'woo', 'woo', 99898989);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `UserRolesId` int(50) NOT NULL,
  `UserId` int(50) NOT NULL,
  `RoleId` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`UserRolesId`, `UserId`, `RoleId`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(5, 20, 2),
(15, 96, 2),
(16, 103, 2),
(17, 104, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemId`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `itemdetails`
--
ALTER TABLE `itemdetails`
  ADD PRIMARY KEY (`itemDetailsId`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `roledetails`
--
ALTER TABLE `roledetails`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`UserRolesId`),
  ADD UNIQUE KEY `UserId` (`UserId`),
  ADD KEY `RoleForeignKeyToUserRole` (`RoleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ItemId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roledetails`
--
ALTER TABLE `roledetails`
  MODIFY `RoleId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `UserRolesId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`CategoryId`);

--
-- Constraints for table `itemdetails`
--
ALTER TABLE `itemdetails`
  ADD CONSTRAINT `itemdetails_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `item` (`ItemId`);

--
-- Constraints for table `userroles`
--
ALTER TABLE `userroles`
  ADD CONSTRAINT `RoleForeignKeyToUserRole` FOREIGN KEY (`RoleId`) REFERENCES `roledetails` (`RoleId`),
  ADD CONSTRAINT `UserForeignKeyToUserRole` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
