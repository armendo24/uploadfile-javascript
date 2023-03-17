-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2023 at 03:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `test_uploda`
--

CREATE TABLE `test_uploda` (
  `std_id` int(11) NOT NULL,
  `std_code` varchar(200) NOT NULL,
  `std_tname` varchar(200) NOT NULL,
  `std_fname` varchar(200) NOT NULL,
  `std_lname` varchar(200) NOT NULL,
  `std_phone` varchar(200) NOT NULL,
  `std_email` varchar(200) NOT NULL,
  `std_race` varchar(200) NOT NULL,
  `std_nationnality` varchar(200) NOT NULL,
  `branch_id` varchar(200) NOT NULL,
  `department_id` varchar(200) NOT NULL,
  `admin_id` varchar(200) NOT NULL,
  `update_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_uploda`
--

INSERT INTO `test_uploda` (`std_id`, `std_code`, `std_tname`, `std_fname`, `std_lname`, `std_phone`, `std_email`, `std_race`, `std_nationnality`, `branch_id`, `department_id`, `admin_id`, `update_time`) VALUES
(1, '604423022018-0', 'นาย', 'บุษกร', 'เขตจำนันต์', '864144310', 'ooapiya@gmail.com', 'ไทย', 'ไทย', 'สาขาพืช', 'คณะเทคโนโลยีการเกษตร', 'piya.bo', '2023-03-17 08:55:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_uploda`
--
ALTER TABLE `test_uploda`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_uploda`
--
ALTER TABLE `test_uploda`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
