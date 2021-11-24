-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2021 at 10:21 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.28
<?php
    if(isset($_POST['submit'])){
       
    $link = mysqli_connect("localhost", "root", "", "chat_app");
        
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " 
                . mysqli_connect_error());
    }
        
    // Escape user inputs for security
    $un= mysqli_real_escape_string(
            $link, $_REQUEST['uname']);
    $m = mysqli_real_escape_string(
            $link, $_REQUEST['msg']);
              
    date_default_timezone_set('Asia/Kolkata');
    $ts=date('y-m-d h:ia');
        
    // Attempt insert query execution
    $sql = "INSERT INTO chats (uname, msg, dt) 
                VALUES ('$un', '$m', '$ts')";
    if(mysqli_query($link, $sql)){
        ;
    } else{
        echo "ERROR: Message not sent!!!";
    }
       
    // Close connection
    mysqli_close($link);
}
?>
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hkrbrimy_ems`
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

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`r_id`, `full_name`, `mobile_number`, `gender`, `role`, `email_id`, `sky_id`, `password`, `approve_status`, `created_at`, `updated_at`);

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
  `details` longtext,
  `assign_doc` longtext,
  `complete_doc` longtext,
  `status` varchar(200) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`ta_id`, `ta_name`, `ta_hours`, `developer_id`, `project_id`, `details`, `assign_doc`, `complete_doc`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test', '5', '1', 0, 'snidisdisdo', '1 piece ball.png', NULL, 'pending', '2021-04-17 05:43:12', '2021-04-17 05:43:12'),
(3, 'Sales order', '', '3', 0, 'Please check it add_selles_order.php \r\nbecause more product can not add in this file ', '', NULL, 'complete', '2021-04-26 04:06:41', '2021-04-26 08:30:46');

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
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`ti_id`, `developer_id`, `attend_date`, `check_in`, `break_in`, `break_out`, `check_out`, `working_hours`, `status`, `created_at`, `updated_at`)

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
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `screenshot`
--
ALTER TABLE `screenshot`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `ti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
