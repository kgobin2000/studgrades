-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2018 at 12:26 AM
-- Server version: 8.0.12
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regis`
--

-- --------------------------------------------------------

--
-- Table structure for table `stud_info`
--

CREATE TABLE `stud_info` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `Class` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stud_info`
--

INSERT INTO `stud_info` (`id`, `stud_id`, `f_name`, `l_name`, `Class`, `password`) VALUES
(105, 'johnd', 'John', 'Doe', '4-2\r\n', 'password'),
(138, 'maryb', 'Mary', 'Bridgette', '5-2', 'password'),
(139, 'chrysw', 'Chrystal', 'Wilfred', '1-2', 'password'),
(140, 'khald', 'Khalid', 'Gobin', '5-2', 'password'),
(141, 'chris', 'Christian', 'Richards', '6', 'password'),
(142, 'indrj', 'Indra', 'Joylall', '2-2', 'password'),
(143, 'kobyW', 'Koby', 'Wills', '4-1', 'password'),
(144, 'keonj', 'Keon', 'Ramjit', '3-2', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `stud_rec`
--

CREATE TABLE `stud_rec` (
  `stud_id` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `course` varchar(4) NOT NULL,
  `t1` varchar(3) NOT NULL DEFAULT '-',
  `t2` varchar(3) NOT NULL DEFAULT '-',
  `t3` varchar(3) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stud_rec`
--

INSERT INTO `stud_rec` (`stud_id`, `course`, `t1`, `t2`, `t3`) VALUES
('johnd', 'MATH', '98', '', '87'),
('maryb', 'SCIE', '56', '78', '-');

-- --------------------------------------------------------

--
-- Table structure for table `teach_info`
--

CREATE TABLE `teach_info` (
  `teach_id` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teach_info`
--

INSERT INTO `teach_info` (`teach_id`, `password`, `f_name`, `l_name`) VALUES
('admin', 'password', 'Khalid', 'Gobin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stud_info`
--
ALTER TABLE `stud_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stud_id` (`stud_id`);

--
-- Indexes for table `stud_rec`
--
ALTER TABLE `stud_rec`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `teach_info`
--
ALTER TABLE `teach_info`
  ADD PRIMARY KEY (`teach_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stud_info`
--
ALTER TABLE `stud_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
