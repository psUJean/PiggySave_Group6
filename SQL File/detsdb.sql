-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 04:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `ID` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `ExpenseDate` date DEFAULT NULL,
  `ExpenseItem` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ExpenseCost` varchar(200) DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`ID`, `UserId`, `ExpenseDate`, `ExpenseItem`, `ExpenseCost`, `NoteDate`) VALUES
(38, 11, '2022-11-16', 'computer', '20', '2022-11-16 08:01:57'),
(39, 11, '2022-11-10', 'swim', '10000', '2022-11-16 08:47:40'),
(40, 11, '2022-11-16', 'b', '9000', '2022-11-16 08:48:27'),
(50, 12, '2022-01-09', '??', '100', '2022-12-10 04:29:24'),
(51, 12, '2022-12-10', '?????', '500', '2022-12-10 04:30:56'),
(52, 12, '2022-01-09', '????', '500', '2022-12-10 04:33:41'),
(53, 12, '1212-12-12', '????', '100', '2022-12-10 04:35:16'),
(54, 12, '1212-12-12', 'mom', '1234', '2022-12-10 05:23:12'),
(55, 12, '1222-12-12', '??????', '456', '2022-12-10 05:23:29'),
(56, 12, '2022-12-10', 'แม่จ้า', '500', '2022-12-10 05:34:48'),
(57, 12, '2022-12-10', 'แมวตัวใหม่', '1500', '2022-12-10 05:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `tblincome`
--

CREATE TABLE `tblincome` (
  `ID` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `IncomeDate` date DEFAULT NULL,
  `IncomeItem` varchar(200) DEFAULT NULL,
  `IncomeCost` varchar(200) DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblincome`
--

INSERT INTO `tblincome` (`ID`, `UserId`, `IncomeDate`, `IncomeItem`, `IncomeCost`, `NoteDate`) VALUES
(10, 12, '2022-12-10', 'แม่', '1000', '2022-12-10 04:22:57'),
(11, 12, '2022-12-09', 'บิตุรงค์', '3000', '2022-12-10 04:23:29'),
(12, 12, '1111-11-11', 'จ้า', '1', '2022-12-10 04:28:36'),
(13, 12, '2022-12-10', 'mom', '50000', '2022-12-10 05:03:50'),
(14, 12, '2022-12-10', 'dad', '1000000', '2022-12-10 05:04:45'),
(15, 12, '2022-12-10', 'wash money', '10000000', '2022-12-10 05:05:15'),
(16, 12, '1212-12-12', 'อิอ', '123', '2022-12-10 06:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(150) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(11, 'Patipan', 'uj@gmail.com', 6011111111, 'eb62f6b9306db575c2d596b1279627a4', '2022-11-16 06:07:32'),
(12, 'เรจิน่า จ้อช', 'tom@gmail.com', 81229228, '81dc9bdb52d04dc20036dbd8313ed055', '2022-12-09 04:21:52'),
(13, 'tim', 'tim@gmail.com', 123456788, '81dc9bdb52d04dc20036dbd8313ed055', '2022-12-10 07:47:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblincome`
--
ALTER TABLE `tblincome`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tblincome`
--
ALTER TABLE `tblincome`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
