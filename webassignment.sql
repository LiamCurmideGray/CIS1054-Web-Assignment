-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 06:56 PM
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
  `Password` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Telephone` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Email`, `Password`, `Firstname`, `Surname`, `Telephone`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', 'admin', 21349200),
(2, 'user@gmail.com', 'user', 'user', 'user', 21349200),
(3, 'test@gmail.com', 'test', 'test', 'test', 21334433);

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
(3, 3, 2);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `roledetails`
--
ALTER TABLE `roledetails`
  MODIFY `RoleId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `UserRolesId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

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
