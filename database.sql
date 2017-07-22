-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2017 at 02:47 PM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: ``
--

-- --------------------------------------------------------

--
-- Table structure for table `cc_and_oe`
--

CREATE TABLE `cc_and_oe` (
  `ccoe_id` int(11) NOT NULL,
  `cc` varchar(999) NOT NULL,
  `oe` varchar(999) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_and_oe`
--

INSERT INTO `cc_and_oe` (`ccoe_id`, `cc`, `oe`, `patient_id`, `status`) VALUES
(1, 'ABC', 'DEF', 3, 0),
(2, 'Foods', 'Medicines', 6, 1),
(4, 'Foods', 'Foods', 2, 0),
(6, 'Food 2', 'Medicine 2', 3, 0),
(10, 'A', 'A', 2, 0),
(11, 'A', 'A', 2, 0),
(12, 'A', 'A', 2, 1),
(13, 'Abc', 'Def', 3, 0),
(14, 'New', 'New', 3, 1),
(15, 'Fever\r\nCold', 'Total Bed Rest', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `Name`, `email`, `password`) VALUES
(1, 'Anamul Huq', 'anamulhuq@gmail.com', 'anamul');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `medicine_group` varchar(255) NOT NULL,
  `power` int(11) NOT NULL,
  `medicine_type` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_id`, `medicine_name`, `medicine_group`, `power`, `medicine_type`, `company_name`) VALUES
(1, 'Momento', 'Pain', 500, 'Tablet', 'Square'),
(2, 'Contain', 'Cold', 500, 'Tablet', 'Square'),
(3, 'Fixal', 'Cold', 180, 'Tablet', 'Square'),
(4, 'Panadol', 'paracitamol bp and Caffein', 500, 'Tablet', 'Panadol');

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_medicine`
--

CREATE TABLE `prescribed_medicine` (
  `pm_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `medicine_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescribed_medicine`
--

INSERT INTO `prescribed_medicine` (`pm_id`, `patient_id`, `medicine_id`, `medicine_time`) VALUES
(4, 11, 1, '1-1-1');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicine_time` varchar(20) NOT NULL,
  `prescription_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`prescription_id`, `medicine_id`, `patient_id`, `medicine_time`, `prescription_date`) VALUES
(2, 2, 2, '0-1-0', '2016-08-21 08:02:27'),
(4, 1, 2, '0-0-1', '2016-08-21 08:05:30'),
(5, 3, 3, '1-0-1', '2016-08-21 08:39:54'),
(6, 2, 3, '1-1-1', '2016-08-21 08:44:48'),
(8, 4, 2, '0-1-0', '2016-08-24 11:18:38'),
(9, 3, 2, '0-0-1', '2016-08-24 11:19:04'),
(10, 1, 2, '1-1-1', '2016-08-24 11:19:26'),
(11, 2, 3, '1-0-1', '2016-08-24 11:48:39'),
(12, 2, 3, '1-0-1', '2016-08-24 11:50:09'),
(13, 4, 6, '1-0-1', '2016-08-24 11:53:51'),
(15, 2, 2, '0-1-0', '2016-09-02 07:00:26'),
(16, 3, 2, '1-0-1', '2016-09-02 07:01:15'),
(17, 2, 2, '1-1-1', '2016-09-02 07:03:26'),
(18, 2, 2, '1-0-0', '2016-09-02 07:09:00'),
(19, 4, 2, '1-0-0', '2016-09-02 07:09:00'),
(20, 1, 2, '1-0-0', '2016-09-02 07:09:00'),
(21, 2, 3, '1-0-1', '2016-09-02 09:55:58'),
(22, 3, 3, '1-1-1', '2016-09-02 09:55:58'),
(23, 4, 11, '1-1-1', '2017-04-09 10:29:41'),
(24, 1, 11, '1-0-1', '2017-04-09 10:29:41'),
(25, 2, 11, '0-1-0', '2017-04-09 10:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `address` varchar(999) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `lock_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `age`, `gender`, `email`, `contact`, `password`, `blood_group`, `address`, `user_type`, `lock_user`) VALUES
(9, '', '', 0, '', 'admin', '', 'admin', '', '', 'doctor', NULL),
(10, '', '', 0, '', 'admin@admin.com', '', 'admin', '', '', '', NULL),
(11, 'Tasmim', 'Islam', 23, 'male', 'tasmimislam@gmail.com', '+8801516782104', 'admin', 'AB+', 'Dhaka, Bangladesh', 'patient', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc_and_oe`
--
ALTER TABLE `cc_and_oe`
  ADD PRIMARY KEY (`ccoe_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `prescribed_medicine`
--
ALTER TABLE `prescribed_medicine`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc_and_oe`
--
ALTER TABLE `cc_and_oe`
  MODIFY `ccoe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prescribed_medicine`
--
ALTER TABLE `prescribed_medicine`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
