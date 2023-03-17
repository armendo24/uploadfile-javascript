-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2023 at 10:15 AM
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
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_uploda`
--

INSERT INTO `test_uploda` (`id`, `name`, `num`) VALUES
(1, 'aaa', 12),
(2, 'bbb', 21),
(3, 'ccc', 32),
(4, 'aaa', 12),
(5, 'bbb', 21),
(6, 'ccc', 32),
(7, 'aaa', 12),
(8, 'bbb', 21),
(9, 'ccc', 32),
(10, 'aaa', 12),
(11, 'bbb', 21),
(12, 'ccc', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_uploda`
--
ALTER TABLE `test_uploda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_uploda`
--
ALTER TABLE `test_uploda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
