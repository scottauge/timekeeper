-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 04:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timekeeper`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientRecID` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parm`
--

CREATE TABLE `parm` (
  `ParmRecID` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Value` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ProjectRecID` varchar(50) NOT NULL,
  `ClientRecID` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `SessionRecID` varchar(50) NOT NULL,
  `Cookie` varchar(30) NOT NULL,
  `UserRecID` varchar(50) NOT NULL,
  `LastUsed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TaskRecID` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `TimeRecID` varchar(50) NOT NULL,
  `UserRecID` varchar(50) NOT NULL,
  `ClientRecID` varchar(50) NOT NULL,
  `ProjectRecID` varchar(50) NOT NULL,
  `TaskRecID` varchar(50) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserRecID` varchar(50) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD UNIQUE KEY `ClientRecID` (`ClientRecID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD UNIQUE KEY `ProjectRecID` (`ProjectRecID`),
  ADD UNIQUE KEY `ClientRecID` (`ClientRecID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD UNIQUE KEY `SessionRecID` (`SessionRecID`),
  ADD UNIQUE KEY `Cookie` (`Cookie`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD UNIQUE KEY `TaskRecID` (`TaskRecID`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD UNIQUE KEY `TimeRecID` (`TimeRecID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `UserRecID` (`UserRecID`),
  ADD UNIQUE KEY `UserIDPassword` (`UserID`,`Password`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
