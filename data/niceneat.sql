-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2026 at 05:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `niceneat`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmaster`
--

CREATE TABLE `adminmaster` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `RStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminmaster`
--

INSERT INTO `adminmaster` (`ID`, `Name`, `Username`, `Pass`, `RStatus`) VALUES
(1, 'admin', 'admin', '$2y$10$GoW18ts9vEpgYCSaoEK0yuTfZQxNbbA.5CJvMGrchT/QkygLoUno2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `ID` int(11) NOT NULL,
  `StuID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `CreatedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`ID`, `StuID`, `CourseID`, `CreatedDate`) VALUES
(7, 2, 9, '2026-02-23'),
(8, 2, 7, '2026-02-23'),
(11, 2, 6, '2026-02-23'),
(12, 3, 11, '2026-02-23'),
(13, 4, 7, '2026-03-12'),
(15, 7, 7, '2026-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `coursemaster`
--

CREATE TABLE `coursemaster` (
  `ID` int(11) NOT NULL,
  `CCode` varchar(20) NOT NULL,
  `CName` varchar(255) NOT NULL,
  `Duration` tinyint(4) NOT NULL,
  `IsFixSub` tinyint(4) NOT NULL,
  `RStatus` tinyint(4) NOT NULL,
  `CreatedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursemaster`
--

INSERT INTO `coursemaster` (`ID`, `CCode`, `CName`, `Duration`, `IsFixSub`, `RStatus`, `CreatedDate`) VALUES
(1, 'RR', 'O Level', 35, 0, 0, '2026-02-21'),
(2, 'CCC', 'Course in Computer Certificate', 3, 1, 1, '2026-02-20'),
(3, 'cc', 'sdsd', 33, 0, 0, '2026-02-16'),
(4, 'fgd', 'akancha', 4, 0, 0, '2026-02-18'),
(6, 'CIT', 'Certificate in Typing', 2, 0, 1, '2026-02-16'),
(7, 'ADCA', 'Advance Diploma in Computer Course', 12, 1, 1, '2026-02-20'),
(8, 'BCC', 'Basic Computer Course', 2, 1, 1, '2026-02-16'),
(9, 'OM', 'Office Management', 1, 1, 1, '2026-02-16'),
(11, 'PG01', 'PGDCA', 12, 1, 1, '2026-02-23'),
(12, 'BCA', 'Bachelor of Computer Application', 36, 1, 1, '2026-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `markentry`
--

CREATE TABLE `markentry` (
  `ID` int(11) NOT NULL,
  `ResultID` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `MaxMark` smallint(6) NOT NULL,
  `ObtainMark` smallint(6) NOT NULL,
  `MaxPracMark` tinyint(4) NOT NULL,
  `MaxObtainMark` tinyint(4) NOT NULL,
  `Sequence` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `markentry`
--

INSERT INTO `markentry` (`ID`, `ResultID`, `SubjectName`, `MaxMark`, `ObtainMark`, `MaxPracMark`, `MaxObtainMark`, `Sequence`) VALUES
(10, 1, 'Basic', 100, 55, 0, 0, 1),
(11, 1, 'Office', 100, 55, 0, 0, 2),
(12, 1, 'Photoshop', 100, 55, 0, 0, 3),
(15, 15, 'English ', 70, 40, 0, 0, 1),
(16, 15, 'Hindi Typing ', 70, 40, 0, 0, 2),
(18, 16, 'Dos', 50, 22, 0, 0, 1),
(63, 25, 'Basic', 75, 40, 30, 20, 1),
(64, 25, 'Office', 70, 45, 30, 28, 1),
(65, 21, 'Photoshop', 70, 50, 30, 12, 2),
(66, 21, 'dos', 70, 60, 30, 14, 2),
(67, 18, 'Basic edi', 70, 55, 11, 2, 1),
(68, 18, 'C Languge', 100, 22, 11, 4, 2),
(69, 18, 'Office', 100, 33, 11, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `ID` int(11) NOT NULL,
  `AdmissionID` int(11) NOT NULL,
  `Sem` tinyint(4) UNSIGNED NOT NULL,
  `CreatedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`ID`, `AdmissionID`, `Sem`, `CreatedDate`) VALUES
(1, 8, 1, '2026-02-23'),
(3, 8, 2, '2026-02-23'),
(7, 8, 3, '2026-02-23'),
(15, 11, 0, '2026-02-23'),
(16, 7, 0, '2026-02-23'),
(18, 12, 1, '2026-02-23'),
(19, 12, 2, '2026-02-23'),
(21, 13, 2, '2026-04-06'),
(22, 15, 1, '2026-04-06'),
(25, 13, 1, '2026-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `RegNo` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `MName` varchar(50) NOT NULL,
  `Phone` varchar(13) NOT NULL,
  `Whatsapp` varchar(13) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `IsResult` tinyint(4) NOT NULL,
  `IsFeePaid` tinyint(4) NOT NULL,
  `AdmissionDate` date DEFAULT NULL,
  `CreatedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `RegNo`, `Name`, `FName`, `MName`, `Phone`, `Whatsapp`, `Email`, `DOB`, `Address`, `IsResult`, `IsFeePaid`, `AdmissionDate`, `CreatedDate`) VALUES
(2, '202602001', 'Raj Kumar', 'Raj', '', '2222222222', '', '', '2026-02-26', 'Sh 19/48 R-1\r\ncentral jail road', 0, 0, NULL, '2026-02-23'),
(3, '202602005', 'Sumit', 'Amit', '', '2222222222', '', '', '2026-02-26', '', 0, 0, NULL, '2026-02-23'),
(4, '202602006', 'Rina Singh', 'Raj', 'Anita Devi', '2222222222', '', '', '2026-04-01', 'Sh 19/48 R-1\r\ncentral jail road', 1, 1, '2026-03-01', '2026-04-02'),
(5, '202603001', 'Seema', 'Katvaru', 'Maya', '8978457845', '', 'seema@gmail.com', '2026-03-01', 'lallapura', 1, 0, '2026-03-20', '2026-03-29'),
(6, '202603002', 'Admission dd test', 'Raj', '', '2222222222', '45124512123', 'rajkumar9795@gmail.com', '2026-03-25', 'Bheem Nagar', 0, 0, '2026-03-01', '2026-03-29'),
(7, '2604001', 'Ranveer', 'Sumit', '', '2222222222', '', '', '2026-04-01', '', 0, 0, '2026-04-01', '2026-04-06'),
(8, '2604002', 'Akriti Sinha', 'Raj', '', '2222222222', '', 'rajkumar9795@gmail.com', '2026-04-11', 'Bheem Nagar', 1, 1, '2026-04-11', '0000-00-00'),
(9, '2604003', 'date check', 'Raj', '', '2222222222', '', 'rajkumar9795@gmail.com', '2026-04-02', 'Bheem Nagar', 1, 0, '2026-04-02', '0000-00-00'),
(10, '2501001', 'manual reg', 'Raj', '', '2222222222', '', 'rajkumar9795@gmail.com', '2026-04-21', 'Bheem Nagar', 0, 1, '2026-04-21', '2026-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `ID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `SCode` varchar(50) NOT NULL,
  `SName` varchar(255) NOT NULL,
  `Sem` tinyint(4) NOT NULL,
  `SeqNo` tinyint(4) NOT NULL,
  `MaxMark` tinyint(4) NOT NULL,
  `PassMark` tinyint(4) NOT NULL,
  `MaxPracMark` tinyint(4) NOT NULL,
  `PassPracMark` tinyint(4) NOT NULL,
  `RStatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`ID`, `CID`, `SCode`, `SName`, `Sem`, `SeqNo`, `MaxMark`, `PassMark`, `MaxPracMark`, `PassPracMark`, `RStatus`) VALUES
(1, 2, 'CCC1', 'Basic', 1, 1, 70, 20, 30, 13, 1),
(2, 2, 'CCC2', 'Internet', 1, 2, 70, 20, 30, 13, 1),
(3, 7, 'ADCA3', 'Photoshop', 2, 2, 70, 23, 30, 10, 1),
(4, 7, 'ADCA1', 'Basic', 1, 1, 70, 33, 30, 10, 1),
(5, 7, 'ADCA2', 'Office', 1, 1, 70, 23, 30, 10, 1),
(6, 9, 'D1', 'Dos', 0, 1, 50, 21, 0, 0, 0),
(7, 11, 'Pg1', 'Basic', 0, 1, 100, 33, 0, 0, 0),
(8, 11, 'pg2', 'C Languge', 0, 2, 100, 33, 0, 0, 0),
(9, 11, 'pg3', 'Office', 0, 3, 100, 33, 0, 0, 0),
(10, 11, 'pg4', 'DCN', 0, 4, 100, 33, 0, 0, 0),
(11, 7, 'ADCA4', 'dos', 2, 2, 70, 23, 30, 10, 1),
(12, 12, 'bca1', 'Fundamental', 1, 1, 70, 23, 30, 10, 1),
(13, 12, 'bca2', 'Office', 1, 2, 70, 23, 30, 10, 1),
(14, 12, 'bca3', 'C Languge', 1, 3, 70, 23, 30, 10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmaster`
--
ALTER TABLE `adminmaster`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `StuID` (`StuID`,`CourseID`);

--
-- Indexes for table `coursemaster`
--
ALTER TABLE `coursemaster`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CCode` (`CCode`);

--
-- Indexes for table `markentry`
--
ALTER TABLE `markentry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `AdmissionID` (`AdmissionID`,`Sem`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `RegNo` (`RegNo`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CCode` (`SCode`,`SName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `markentry`
--
ALTER TABLE `markentry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
