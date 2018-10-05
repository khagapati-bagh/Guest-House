-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 07:28 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guesthouse_x`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_form`
--

CREATE TABLE IF NOT EXISTS `application_form` (
  `application_number` int(20) NOT NULL,
  `booking_id` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `id_card_type` varchar(20) NOT NULL,
  `id_card_number` varchar(20) NOT NULL,
  `address_field1` varchar(50) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` int(11) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `guest_house_name` varchar(30) NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `room_type` varchar(10) NOT NULL,
  `number_of_adults` int(11) NOT NULL,
  `number_of_children` int(11) NOT NULL,
  `relation_with_applicant` varchar(20) NOT NULL,
  `nature_of_visit` varchar(20) NOT NULL,
  `document` varchar(50) DEFAULT NULL,
  `contact_number` int(11) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application_form`
--

INSERT INTO `application_form` (`application_number`, `booking_id`, `gender`, `first_name`, `last_name`, `id_card_type`, `id_card_number`, `address_field1`, `check_in_date`, `check_out_date`, `city`, `pin`, `state`, `country`, `guest_house_name`, `number_of_rooms`, `room_type`, `number_of_adults`, `number_of_children`, `relation_with_applicant`, `nature_of_visit`, `document`, `contact_number`, `email_id`, `status`) VALUES
(17, 'GH0001', 'Male', 'RAVI', 'HORO', 'Aadhar Card', '524612487894', 'ITKI', '2018-04-23', '2018-04-29', 'RANCHI', 835301, 'JHARKHAND', 'INDIA', 'Vikram Sarabhai', 2, 'AC', 2, 0, 'FRIEND', 'on', 'Bitcoin_pdf2.pdf', 2147483647, 'ravijohnhoro5@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `room_number` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guesthouse_employee`
--

CREATE TABLE IF NOT EXISTS `guesthouse_employee` (
  `employee_id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guesthouse_employee`
--

INSERT INTO `guesthouse_employee` (`employee_id`, `password`, `first_name`, `last_name`) VALUES
('emp78', 'test', 'vikash', 'kumar'),
('emp98', 'uu', 'hj', 'jh');

-- --------------------------------------------------------

--
-- Table structure for table `iris`
--

CREATE TABLE IF NOT EXISTS `iris` (
  `id` int(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` varchar(30) NOT NULL,
  `course` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iris`
--

INSERT INTO `iris` (`id`, `first_name`, `last_name`, `password`, `type`, `course`, `department`) VALUES
(174006, 'Ravi', 'Horo', '63dd3e154ca6d948fc380fa576343ba6', 'Student', 'MCA', 'MACS'),
(174008, 'Radhe', 'Mohan', 'fad1baf6464b5da8f87896439ca2de03', 'Caretaker', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `official_staff`
--

CREATE TABLE IF NOT EXISTS `official_staff` (
  `staff_id` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `official_staff`
--

INSERT INTO `official_staff` (`staff_id`, `first_name`, `last_name`, `password`, `designation`) VALUES
('H098', 'Mukesh', 'Kujur', 'muks', 'HOD'),
('h302', 'Rajat', 'Lakra', 'rajjo', 'DEAN'),
('hh876', 'Rahul', 'Mahajan', 'rj', 'faculty-in-charge');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `booking_id` varchar(30) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `paytime` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE IF NOT EXISTS `priority` (
  `type_of_person` varchar(30) NOT NULL,
  `priority` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `room_number` int(5) NOT NULL,
  `room_type` varchar(10) NOT NULL,
  `bed_type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `check_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_number`, `room_type`, `bed_type`, `status`, `check_out`) VALUES
(1, 'AC', 'Single', 'Occupied', '2018-04-25'),
(2, 'AC', 'Double', 'Occupied', '2018-04-24'),
(3, 'Non-AC', 'Single', 'Occupied', '2018-04-11'),
(4, 'Non-AC', 'Double', 'Available', '0000-00-00'),
(5, 'AC', 'Single', 'Available', '0000-00-00'),
(6, 'Non-AC', 'Double', 'Available', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_form`
--
ALTER TABLE `application_form`
  ADD PRIMARY KEY (`application_number`);

--
-- Indexes for table `iris`
--
ALTER TABLE `iris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `official_staff`
--
ALTER TABLE `official_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_form`
--
ALTER TABLE `application_form`
  MODIFY `application_number` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
