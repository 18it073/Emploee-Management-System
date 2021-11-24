-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 11:01 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_form`
--

CREATE TABLE `leave_form` (
  `l_id` int(11) NOT NULL,
  `from_date` varchar(200) NOT NULL,
  `to_date` varchar(200) NOT NULL,
  `reason` text NOT NULL,
  `developer_id` varchar(200) NOT NULL,
  `approve_status` int(100) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) DEFAULT NULL,
  `p_desc` text,
  `p_client_name` varchar(200) DEFAULT NULL,
  `p_attachment` text,
  `project_m_id` varchar(100) DEFAULT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Planing',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `r_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `role` int(10) DEFAULT NULL,
  `email_id` text NOT NULL,
  `sky_id` text NOT NULL,
  `password` text NOT NULL,
  `approve_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `screenshot`
--

CREATE TABLE `screenshot` (
  `s_id` int(11) NOT NULL,
  `s_image` blob NOT NULL,
  `developer_id` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `ta_id` int(11) NOT NULL,
  `ta_name` varchar(200) NOT NULL,
  `ta_hours` varchar(200) NOT NULL,
  `developer_id` varchar(200) NOT NULL,
  `project_id` int(100) NOT NULL,
  `status` varchar(200) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(200) NOT NULL,
  `developer_id` text NOT NULL,
  `p_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE `timesheet` (
  `ti_id` int(11) NOT NULL,
  `developer_id` varchar(200) NOT NULL,
  `attend_date` text NOT NULL,
  `check_in` time NOT NULL DEFAULT '00:00:00',
  `break_in` time NOT NULL DEFAULT '00:00:00',
  `break_out` time NOT NULL DEFAULT '00:00:00',
  `check_out` time NOT NULL DEFAULT '00:00:00',
  `working_hours` time DEFAULT '00:00:00',
  `status` varchar(200) NOT NULL DEFAULT ' ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_form`
--
ALTER TABLE `leave_form`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `screenshot`
--
ALTER TABLE `screenshot`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`ta_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD PRIMARY KEY (`ti_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_form`
--
ALTER TABLE `leave_form`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `screenshot`
--
ALTER TABLE `screenshot`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `ti_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
