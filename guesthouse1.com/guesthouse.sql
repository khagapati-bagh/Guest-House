-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 07:40 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guesthouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_form`
--

CREATE TABLE IF NOT EXISTS `application_form` (
  `application_number` int(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `id_card_type` varchar(20) NOT NULL,
  `id_card_number` varchar(20) NOT NULL,
  `address_field` varchar(50) NOT NULL,
  `submitted_by` int(10) NOT NULL,
  `submitted_on` datetime NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `number_of_ac_rooms` int(5) NOT NULL,
  `number_of_non_ac_rooms` int(5) NOT NULL,
  `number_of_persons` int(10) NOT NULL,
  `relation_with_applicant` varchar(20) NOT NULL,
  `nature_of_visit` varchar(20) NOT NULL,
  `document` varchar(50) DEFAULT NULL,
  `contact_number` int(11) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `hod_status` tinyint(1) NOT NULL DEFAULT '2',
  `faculty_status` tinyint(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application_form`
--

INSERT INTO `application_form` (`application_number`, `first_name`, `last_name`, `gender`, `id_card_type`, `id_card_number`, `address_field`, `submitted_by`, `submitted_on`, `check_in_date`, `check_out_date`, `city`, `state`, `country`, `pincode`, `number_of_ac_rooms`, `number_of_non_ac_rooms`, `number_of_persons`, `relation_with_applicant`, `nature_of_visit`, `document`, `contact_number`, `email_id`, `hod_status`, `faculty_status`) VALUES
(0, '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', '', '', '', 0, 0, 0, 0, '', '', NULL, 0, '', 0, 0),
(1, 'Ravi', 'Horo', '', 'Aadhar Card', '524612487894', 'ITKI', 174006, '2018-06-23 07:13:30', '2018-07-23', '2018-07-29', 'RANCHI', 'JHARKHAND', 'INDIA', 865412, 3, 0, 2, 'Friend', 'Official', 'Bitcoin_pdf2.pdf', 2147483647, 'ravijohnhoro5@gmail.com', 1, 1),
(2, 'Asmanjas', 'Kalundia', '', 'Aadhar Card', '123456789874', 'chaibasa', 174006, '2018-06-12 06:18:19', '2018-07-12', '2018-07-18', 'Chaibasa', 'Jharkhand', 'India', 124587, 2, 0, 2, 'Friend', 'Non-official', '', 1234567890, 'asmanjas@gmail.com', 1, 0),
(3, 'Akhilesh', 'Lakra', '', 'Aadhar Card', '789456123012', 'Ranchi', 174006, '2018-06-13 03:33:00', '2018-07-13', '2018-07-15', 'Ranchi', 'Jharkhand', 'India', 987456, 1, 2, 1, 'Friend', 'Official', '41368622333.pdf', 2147483647, 'rajat@gmail.com', 2, 2),
(4, 'Mukesh', 'Kujur', '', 'Aadhar Card', '753159456824', 'Rourkela', 174006, '2018-06-25 08:00:00', '2018-07-25', '2018-07-28', 'Rourkela', 'Orissa', 'India', 145623, 2, 0, 2, 'Friend', 'Non-official', '', 2147483647, 'mukesh@gmail.com', 1, 1),
(5, 'Vikas', 'Kumar', '', 'Aadhar Card', '159648754123', 'Ramgarh', 174006, '2018-06-27 06:36:35', '2018-07-27', '2018-07-29', 'Ranchi', 'Jharkhand', 'India', 546897, 1, 0, 2, 'Friend', 'Non-official', '', 1478523690, 'vikas@gmail.com', 2, 2),
(6, 'Sajan', 'Grover', '', 'Aadhar Card', '456123785412', 'Chandigarh', 174006, '2018-06-28 04:19:47', '2018-07-28', '2018-07-30', 'Chandigarh', 'Chandigarh', 'India', 254786, 1, 2, 1, 'Friend', 'Non-official', '', 756485423, 'sajan@gmail.com', 2, 2),
(7, 'Khagapati', 'Bagh', '', 'Aadhar Card', '145698745213', 'Rourkela', 174006, '2018-06-18 05:22:34', '2018-07-18', '2018-07-26', 'Rourkela', 'Orissa', 'India', 236547, 2, 0, 6, 'Friend', 'Official', '41368622334.pdf', 2147483647, 'radhe@gmail.com', 2, 2),
(8, 'Avinash', 'Kumar', '', 'Aadhar Card', '456128796541', 'Varanasi', 174006, '2018-06-27 06:35:33', '2018-07-25', '2018-07-28', 'Varanasi', 'UP', 'India', 125697, 1, 0, 1, 'Friend', 'Non-official', '', 1475236985, 'avinash@gmail.com', 2, 2),
(9, 'John', 'Mark', 'Male', 'Aadhar Card', '546987123654', 'Ranchi', 174006, '2018-06-24 10:44:22', '2018-07-04', '2018-07-06', 'Ranchi', 'Jharkhand', 'India', 123657, 1, 0, 1, 'Friend', 'Non-official', NULL, 2147483647, 'ravijohnhoro5@gmail.com', 2, 2),
(10, 'Kapil', 'Dhakkad', 'Male', 'Aadhar Card', '147852369874', 'Indore', 174006, '2018-06-25 22:53:37', '2018-07-11', '2018-07-12', 'Indore', 'MP', 'India', 756489, 2, 0, 4, 'Friend', 'Official', 'welcome3.pdf', 2147483647, 'kapil@gmai.com', 2, 2),
(11, 'Ankit', 'Gaur', 'Male', 'Aadhar Card', '145879654123', 'Delhi', 174006, '2018-06-26 11:59:29', '2018-07-27', '2018-07-28', 'Delhi', 'New Delhi', 'India', 753698, 2, 0, 4, 'Friend', 'Non-official', NULL, 1564789654, 'ankit@gmail.com', 2, 2),
(12, 'Ravi', 'Horo', 'Male', 'Aadhar Card', '547895415544', 'Ranchi', 174006, '2018-06-26 14:44:45', '2018-07-27', '2018-07-29', 'Ranchi', 'Jharkhand', 'India', 845697, 2, 2, 4, 'Friend', 'Non-official', NULL, 2147483647, 'ravi@gmail.com', 2, 2),
(13, 'John', 'Mark', 'Male', 'Aadhar Card', '456987456987', 'Itki', 174006, '2018-07-02 15:35:09', '2018-07-09', '2018-07-11', 'Ranchi', 'Jharkhand', 'India', 835301, 2, 0, 4, 'Friend', 'Non-official', '', 2147483647, 'ravijohnhoro5@gmail.com', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` varchar(10) NOT NULL,
  `guesthouse_number` int(5) NOT NULL,
  `room_number` int(5) NOT NULL,
  `check_in_time` time NOT NULL,
  `check_out_time` time NOT NULL,
  `alloted_on` datetime NOT NULL,
  `document` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `guesthouse_number`, `room_number`, `check_in_time`, `check_out_time`, `alloted_on`, `document`, `status`) VALUES
('GH0001', 1, 1, '00:00:00', '00:00:00', '2018-07-09 11:59:21', ' ', 0),
('GH0001', 1, 2, '00:00:00', '00:00:00', '2018-07-09 11:59:21', ' ', 0),
('GH0001', 1, 3, '00:00:00', '00:00:00', '2018-07-09 11:59:21', ' ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE IF NOT EXISTS `confirm` (
  `booking_id` varchar(10) NOT NULL,
  `application_number` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm`
--

INSERT INTO `confirm` (`booking_id`, `application_number`, `status`) VALUES
('GH0001', 1, 1),
('GH0004', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `guesthouse`
--

CREATE TABLE IF NOT EXISTS `guesthouse` (
  `guesthouse_number` int(10) NOT NULL,
  `guesthouse_name` varchar(30) NOT NULL,
  `room_type` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guesthouse`
--

INSERT INTO `guesthouse` (`guesthouse_number`, `guesthouse_name`, `room_type`) VALUES
(1, 'C.V. Raman', 'AC'),
(2, 'Vikram Sarabhai', 'AC'),
(3, 'J.C. Bose', 'AC'),
(4, 'Homi J. Baba', 'AC'),
(5, 'International Student''s Hostel', 'Non-AC');

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
(174001, 'Akhilesh', 'Lakra', 'd2ff3b88d34705e01d150c21fa7bde07', 'Faculty Advisor', '', ''),
(174002, 'Avinash', 'Kumar', 'a208e5837519309129fa466b0c68396b', 'HOD', '', 'MACS'),
(174005, 'Asmanjas', 'Kalundia', '89f346a4227f4c3387fb263511631e7f', 'Dean', '', ''),
(174006, 'Ravi', 'Horo', '63dd3e154ca6d948fc380fa576343ba6', 'Student', 'MCA', 'MACS'),
(174008, 'Radhe', 'Mohan', 'fad1baf6464b5da8f87896439ca2de03', 'Guesthouse Manager', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `guesthouse_number` int(10) NOT NULL,
  `room_number` int(10) NOT NULL,
  `bed_type` varchar(10) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `toilet` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`guesthouse_number`, `room_number`, `bed_type`, `floor`, `toilet`) VALUES
(1, 1, 'Double', 'Ground', 'Attached'),
(1, 2, 'Double', 'Ground', 'Attached'),
(1, 3, 'Double', 'First', 'Attached'),
(1, 4, 'Double', 'First', 'Attached'),
(1, 5, 'Double', 'Second', 'Attached'),
(1, 6, 'Double', 'Second', 'Attached'),
(2, 1, 'Double', 'Ground', 'Attached'),
(2, 2, 'Double', 'Ground', 'Attached'),
(2, 3, 'Double', 'Ground', 'Attached'),
(2, 4, 'Double', 'Ground', 'Attached'),
(2, 5, 'Double', 'Ground', 'Attached'),
(2, 6, 'Double', 'Ground', 'Attached'),
(2, 7, 'Double', 'Ground', 'Attached'),
(2, 8, 'Double', 'Ground', 'Attached'),
(2, 9, 'Double', 'First', 'Attached'),
(2, 10, 'Double', 'First', 'Attached'),
(2, 11, 'Double', 'First', 'Attached'),
(2, 12, 'Double', 'First', 'Attached'),
(3, 1, 'Double', 'Ground', 'Attached'),
(3, 2, 'Double', 'Ground', 'Attached'),
(3, 3, 'Double', 'Ground', 'Attached'),
(3, 4, 'Double', 'Ground', 'Attached'),
(3, 5, 'Double', 'First', 'Attached'),
(3, 6, 'Double', 'First', 'Attached'),
(3, 7, 'Double', 'First', 'Attached'),
(3, 8, 'Double', 'First', 'Attached'),
(4, 1, 'Double', 'Ground', 'Attached'),
(4, 2, 'Double', 'Ground', 'Attached'),
(4, 3, 'Double', 'First', 'Attached'),
(4, 4, 'Double', 'First', 'Attached'),
(5, 1, 'Single', 'Ground', 'Common'),
(5, 2, 'Single', 'Ground', 'Common'),
(5, 3, 'Single', 'Ground', 'Common'),
(5, 4, 'Single', 'Ground', 'Common'),
(5, 5, 'Single', 'Ground', 'Common'),
(5, 6, 'Single', 'Ground', 'Common'),
(5, 7, 'Single', 'Ground', 'Common'),
(5, 8, 'Single', 'Ground', 'Common'),
(5, 9, 'Single', 'Ground', 'Common'),
(5, 10, 'Single', 'Ground', 'Common'),
(5, 11, 'Single', 'Ground', 'Common'),
(5, 12, 'Single', 'Ground', 'Common'),
(5, 13, 'Single', 'Ground', 'Common'),
(5, 14, 'Single', 'Ground', 'Common'),
(5, 15, 'Single', 'Ground', 'Common'),
(5, 16, 'Single', 'Ground', 'Common'),
(5, 17, 'Single', 'Ground', 'Common'),
(5, 18, 'Single', 'Ground', 'Common'),
(5, 19, 'Single', 'Ground', 'Common'),
(5, 20, 'Single', 'Ground', 'Common'),
(5, 21, 'Single', 'Ground', 'Common'),
(5, 22, 'Single', 'Ground', 'Common'),
(5, 23, 'Single', 'Ground', 'Common'),
(5, 24, 'Single', 'Ground', 'Common'),
(5, 25, 'Single', 'Ground', 'Common'),
(5, 26, 'Single', 'Ground', 'Common'),
(5, 27, 'Single', 'Ground', 'Common'),
(5, 28, 'Single', 'Ground', 'Common'),
(5, 29, 'Single', 'Ground', 'Common'),
(5, 30, 'Single', 'Ground', 'Common'),
(5, 31, 'Single', 'Ground', 'Common'),
(5, 32, 'Single', 'Ground', 'Common'),
(5, 33, 'Single', 'Ground', 'Common'),
(5, 34, 'Single', 'Ground', 'Common'),
(5, 35, 'Single', 'Ground', 'Common'),
(5, 36, 'Single', 'Ground', 'Common'),
(5, 37, 'Single', 'Ground', 'Common'),
(5, 38, 'Single', 'Ground', 'Common'),
(5, 39, 'Single', 'Ground', 'Common'),
(5, 40, 'Single', 'Ground', 'Common'),
(5, 41, 'Single', 'Ground', 'Common'),
(5, 42, 'Single', 'Ground', 'Common'),
(5, 43, 'Single', 'Ground', 'Common'),
(5, 44, 'Single', 'Ground', 'Common'),
(5, 101, 'Single', 'First', 'Attached'),
(5, 102, 'Single', 'First', 'Attached'),
(5, 103, 'Single', 'First', 'Attached'),
(5, 104, 'Single', 'First', 'Attached'),
(5, 105, 'Single', 'First', 'Attached'),
(5, 106, 'Single', 'First', 'Attached'),
(5, 107, 'Single', 'First', 'Attached'),
(5, 108, 'Single', 'First', 'Attached'),
(5, 109, 'Single', 'First', 'Attached'),
(5, 110, 'Single', 'First', 'Attached'),
(5, 111, 'Single', 'First', 'Attached'),
(5, 112, 'Single', 'First', 'Attached'),
(5, 113, 'Single', 'First', 'Attached'),
(5, 114, 'Single', 'First', 'Attached'),
(5, 115, 'Single', 'First', 'Common'),
(5, 116, 'Single', 'First', 'Attached'),
(5, 117, 'Single', 'First', 'Attached'),
(5, 118, 'Single', 'First', 'Attached'),
(5, 119, 'Single', 'First', 'Attached'),
(5, 120, 'Single', 'First', 'Attached'),
(5, 121, 'Single', 'First', 'Attached'),
(5, 122, 'Single', 'First', 'Attached'),
(5, 123, 'Single', 'First', 'Attached'),
(5, 124, 'Single', 'First', 'Attached'),
(5, 125, 'Single', 'First', 'Attached'),
(5, 126, 'Single', 'First', 'Attached'),
(5, 127, 'Single', 'First', 'Attached'),
(5, 128, 'Single', 'First', 'Attached'),
(5, 129, 'Single', 'First', 'Attached'),
(5, 130, 'Single', 'First', 'Common'),
(5, 201, 'Single', 'Second', 'Attached'),
(5, 202, 'Single', 'Second', 'Attached'),
(5, 203, 'Single', 'Second', 'Attached'),
(5, 204, 'Single', 'Second', 'Attached'),
(5, 205, 'Single', 'Second', 'Attached'),
(5, 206, 'Single', 'Second', 'Attached'),
(5, 207, 'Single', 'Second', 'Attached'),
(5, 208, 'Single', 'Second', 'Attached'),
(5, 209, 'Single', 'Second', 'Attached'),
(5, 210, 'Single', 'Second', 'Attached'),
(5, 211, 'Single', 'Second', 'Attached'),
(5, 212, 'Single', 'Second', 'Attached'),
(5, 213, 'Single', 'Second', 'Attached'),
(5, 214, 'Double', 'Second', 'Attached'),
(5, 215, 'Double', 'Second', 'Attached'),
(5, 216, 'Double', 'Second', 'Attached'),
(5, 217, 'Double', 'Second', 'Attached'),
(5, 218, 'Double', 'Second', 'Attached'),
(5, 219, 'Double', 'Second', 'Attached'),
(5, 220, 'Double', 'Second', 'Attached'),
(5, 221, 'Double', 'Second', 'Attached'),
(5, 222, 'Double', 'Second', 'Attached'),
(5, 223, 'Double', 'Second', 'Attached'),
(5, 224, 'Double', 'Second', 'Attached'),
(5, 225, 'Double', 'Second', 'Attached'),
(5, 226, 'Double', 'Second', 'Attached');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_form`
--
ALTER TABLE `application_form`
  ADD PRIMARY KEY (`application_number`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`,`guesthouse_number`,`room_number`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `guesthouse_number` (`guesthouse_number`);

--
-- Indexes for table `confirm`
--
ALTER TABLE `confirm`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `application_number` (`application_number`);

--
-- Indexes for table `guesthouse`
--
ALTER TABLE `guesthouse`
  ADD PRIMARY KEY (`guesthouse_number`);

--
-- Indexes for table `iris`
--
ALTER TABLE `iris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`guesthouse_number`,`room_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guesthouse`
--
ALTER TABLE `guesthouse`
  MODIFY `guesthouse_number` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `confirm` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`guesthouse_number`) REFERENCES `guesthouse` (`guesthouse_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `confirm`
--
ALTER TABLE `confirm`
  ADD CONSTRAINT `confirm_ibfk_1` FOREIGN KEY (`application_number`) REFERENCES `application_form` (`application_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`guesthouse_number`) REFERENCES `guesthouse` (`guesthouse_number`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
