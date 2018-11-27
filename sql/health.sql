-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 06:40 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `amb_id` int(11) NOT NULL,
  `amb_reid` int(11) NOT NULL,
  `amb_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `amb_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amb_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `builtproject`
--

CREATE TABLE `builtproject` (
  `bp_id` int(11) NOT NULL,
  `bp_before` date NOT NULL,
  `bp_after` date NOT NULL,
  `bp_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `builtproject`
--

INSERT INTO `builtproject` (`bp_id`, `bp_before`, `bp_after`, `bp_status`) VALUES
(1, '2018-11-20', '2018-11-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `infodoctor`
--

CREATE TABLE `infodoctor` (
  `infd_id` int(11) NOT NULL,
  `le_id` int(11) NOT NULL,
  `infd_pressure` text COLLATE utf8_unicode_ci NOT NULL,
  `infd_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `infd_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infomation`
--

CREATE TABLE `infomation` (
  `inf_id` int(11) NOT NULL,
  `le_id` int(11) NOT NULL,
  `inf_pressure` text COLLATE utf8_unicode_ci NOT NULL,
  `inf_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `inf_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `le_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `ps_id` int(11) NOT NULL,
  `rc_id` int(11) NOT NULL,
  `le_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `le_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moo`
--

CREATE TABLE `moo` (
  `mo_id` int(11) NOT NULL,
  `mo_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `moo`
--

INSERT INTO `moo` (`mo_id`, `mo_name`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `ps_id` int(11) NOT NULL,
  `ps_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ps_position` int(11) NOT NULL,
  `ps_no` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ps_tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ps_tumbol` int(11) NOT NULL,
  `ps_moo` int(11) NOT NULL,
  `ps_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `ps_title` int(3) NOT NULL,
  `ps_userlogin` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ps_pwd` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`ps_id`, `ps_name`, `ps_position`, `ps_no`, `ps_tel`, `ps_tumbol`, `ps_moo`, `ps_detail`, `ps_title`, `ps_userlogin`, `ps_pwd`) VALUES
(1, 'test', 2, 'test', 'test', 1, 1, 'test', 1, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `po_id` int(11) NOT NULL,
  `po_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`po_id`, `po_name`) VALUES
(1, 'หมอ'),
(2, 'อสม.');

-- --------------------------------------------------------

--
-- Table structure for table `recruit`
--

CREATE TABLE `recruit` (
  `rc_id` int(11) NOT NULL,
  `tc_title` int(11) NOT NULL,
  `rc_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rc_lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rc_age` int(2) NOT NULL,
  `rc_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `rc_moo` int(11) NOT NULL,
  `rc_tumbol` int(11) NOT NULL,
  `rc_detailaddress` text COLLATE utf8_unicode_ci NOT NULL,
  `rc_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `rc_status` int(2) NOT NULL,
  `rc_project` int(11) NOT NULL,
  `rc_outofproject` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recruit`
--

INSERT INTO `recruit` (`rc_id`, `tc_title`, `rc_name`, `rc_lastname`, `rc_age`, `rc_no`, `rc_moo`, `rc_tumbol`, `rc_detailaddress`, `rc_detail`, `rc_status`, `rc_project`, `rc_outofproject`) VALUES
(1, 1, 'test', 'test', 15, '55/1', 1, 1, 'test', 'test', 2, 1, 1),
(2, 1, 'test', 'test', 16, '55/1', 1, 1, 'test', 'test', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sch_id` int(11) NOT NULL,
  `sch_datebefore` datetime NOT NULL,
  `sch_dateafter` datetime NOT NULL,
  `bp_id` int(11) NOT NULL,
  `mo_id` int(11) NOT NULL,
  `sch_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `ti_id` int(2) NOT NULL,
  `ti_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`ti_id`, `ti_name`) VALUES
(1, 'นาย'),
(2, 'นางสาว'),
(3, 'นาง');

-- --------------------------------------------------------

--
-- Table structure for table `tumbol`
--

CREATE TABLE `tumbol` (
  `tu_id` int(11) NOT NULL,
  `tu_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tumbol`
--

INSERT INTO `tumbol` (`tu_id`, `tu_name`) VALUES
(1, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`amb_id`);

--
-- Indexes for table `builtproject`
--
ALTER TABLE `builtproject`
  ADD PRIMARY KEY (`bp_id`);

--
-- Indexes for table `infodoctor`
--
ALTER TABLE `infodoctor`
  ADD PRIMARY KEY (`infd_id`);

--
-- Indexes for table `infomation`
--
ALTER TABLE `infomation`
  ADD PRIMARY KEY (`inf_id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`le_id`);

--
-- Indexes for table `moo`
--
ALTER TABLE `moo`
  ADD PRIMARY KEY (`mo_id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `recruit`
--
ALTER TABLE `recruit`
  ADD PRIMARY KEY (`rc_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`ti_id`);

--
-- Indexes for table `tumbol`
--
ALTER TABLE `tumbol`
  ADD PRIMARY KEY (`tu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambulance`
--
ALTER TABLE `ambulance`
  MODIFY `amb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `builtproject`
--
ALTER TABLE `builtproject`
  MODIFY `bp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `infodoctor`
--
ALTER TABLE `infodoctor`
  MODIFY `infd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infomation`
--
ALTER TABLE `infomation`
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `le_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moo`
--
ALTER TABLE `moo`
  MODIFY `mo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recruit`
--
ALTER TABLE `recruit`
  MODIFY `rc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `ti_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tumbol`
--
ALTER TABLE `tumbol`
  MODIFY `tu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
