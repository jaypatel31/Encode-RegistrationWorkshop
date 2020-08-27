-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 01:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encode_workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(1, 'Computer'),
(2, 'ICT'),
(3, 'Chemical'),
(4, 'Mechanical'),
(5, 'Civil'),
(6, 'Petroleum');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(1) NOT NULL,
  `semester_name` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`) VALUES
(1, '3'),
(2, '5'),
(3, '7');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `roll` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `Branch_id` int(2) NOT NULL,
  `Sem_id` int(1) NOT NULL,
  `Type` enum('0','1','2','3') NOT NULL COMMENT '''0''= Admin  \r\n''1'' = Participant \r\n''2'' = Pending\r\n''3'' = Rejected',
  `Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `roll`, `name`, `lname`, `user_password`, `email`, `phone`, `Branch_id`, `Sem_id`, `Type`, `Image`) VALUES
(1, 'admin', 'encode', 'pdpu', 'admin', 'admin@pdpu.ac.in', 78451595, 2, 1, '0', ''),
(2, '19BIT160', 'Captain', 'America', 'capt', 'captam@yahoo.in', 2147483647, 2, 1, '1', '../upload/captian.jpg'),
(3, '19BCP161', 'Iron', 'Man', 'iron', 'ironman@gmail.com', 2147483647, 1, 1, '2', '../upload/download (2).jpg'),
(4, '19BME161', 'Bruce', 'Banner', 'hulk', 'hulk@gmail.com', 2147483647, 4, 1, '3', '../upload/Hulk.jpg'),
(5, '19BCE161', 'Thor', 'Odison', 'thor', 'thor@yahoo.in', 1245661259, 3, 1, '2', '../upload/thor.jpg'),
(6, '19BCVE161', 'Spider', 'Man', 'spider', 'spidy@gmail.com', 2147483647, 5, 1, '2', '../upload/images.jpg'),
(7, '19BPE161', 'Black', 'Panther', 'panther', 'bpanther@yahoo.in', 2147483647, 6, 1, '2', '../upload/panther.jpg'),
(8, '19BIT162', 'Black', 'Widow', 'widow', 'bwidow@gmail.com', 2147483647, 2, 2, '2', '../upload/Widow.jpg'),
(9, '19BCP161', 'Ant', 'Man', 'ant', 'antman@yahoo.in', 2147483647, 1, 2, '2', '../upload/download.jpg'),
(10, '19BME162', 'Captain', 'Marvel', 'marvel', 'cmarvel@gmail.com', 2147483647, 4, 2, '1', '../upload/marvel.jpg'),
(11, '19BCE162', 'Star', 'Lord', 'star', 'stlord@gmail.com', 2147483647, 3, 2, '3', '../upload/Lord.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `Branch_id` (`Branch_id`),
  ADD KEY `Sem_id` (`Sem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_master`
--
ALTER TABLE `user_master`
  ADD CONSTRAINT `user_master_ibfk_1` FOREIGN KEY (`Branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_master_ibfk_2` FOREIGN KEY (`Sem_id`) REFERENCES `semester` (`semester_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
