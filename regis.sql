-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2018 at 06:05 PM
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
(2, 'johnd', 'John', 'Doe', '1-2', 'password'),
(3, 'maryb', 'Mary', 'Bridgette', '5-1', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `stud_rec`
--

CREATE TABLE `stud_rec` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `course` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `t1` varchar(3) NOT NULL DEFAULT '-',
  `t2` varchar(3) NOT NULL DEFAULT '-',
  `t3` varchar(3) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stud_rec`
--

INSERT INTO `stud_rec` (`id`, `stud_id`, `course`, `t1`, `t2`, `t3`) VALUES
(93, 'johnd', 'Mathematics', '-', '-', '-'),
(94, 'johnd', 'Integrated Science', '-', '-', '-'),
(95, 'johnd', 'Biology', '-', '-', '-'),
(96, 'johnd', 'Physics', '-', '-', '-'),
(97, 'johnd', 'Chemistry', '-', '-', '-'),
(98, 'johnd', 'Principles of Accounts', '-', '-', '-'),
(99, 'johnd', 'Principles of Business', '-', '-', '-'),
(100, 'johnd', 'Physical Education', '-', '-', '-'),
(101, 'maryb', 'Mathematics', '-', '-', '-'),
(102, 'maryb', 'Integrated Science', '-', '-', '-'),
(103, 'maryb', 'Biology', '-', '-', '-'),
(104, 'maryb', 'Physics', '-', '-', '-'),
(105, 'maryb', 'Chemistry', '-', '-', '-'),
(106, 'maryb', 'Principles of Accounts', '-', '-', '-'),
(107, 'maryb', 'Principles of Business', '-', '-', '-'),
(108, 'maryb', 'Physical Education', '-', '-', '-');

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
  ADD PRIMARY KEY (`stud_id`),
  ADD UNIQUE KEY `stud_id` (`stud_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `stud_rec`
--
ALTER TABLE `stud_rec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `stud_id` (`stud_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stud_rec`
--
ALTER TABLE `stud_rec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stud_rec`
--
ALTER TABLE `stud_rec`
  ADD CONSTRAINT `stud_rec_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `stud_info` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
