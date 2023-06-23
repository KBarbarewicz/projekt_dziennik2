-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 09:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt_dziennik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(3, 'pabloescobar@szkola.com', '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_ID` int(11) UNSIGNED NOT NULL,
  `class_Name` varchar(2) NOT NULL,
  `homeroom_teacher_ID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_ID`, `class_Name`, `homeroom_teacher_ID`) VALUES
(1, '1', 1),
(2, '2', 2),
(3, '3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_ID` int(11) UNSIGNED NOT NULL,
  `student_ID` int(11) UNSIGNED NOT NULL,
  `subject_ID` int(11) UNSIGNED NOT NULL,
  `grade` varchar(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_ID`, `student_ID`, `subject_ID`, `grade`, `date`) VALUES
(8, 1, 1, '5', '2023-05-01'),
(9, 1, 1, '4', '2023-06-15'),
(10, 1, 2, '5', '2023-05-05'),
(11, 1, 2, '4', '2023-06-20'),
(12, 1, 3, '6', '2023-05-10'),
(13, 1, 3, '3', '2023-06-25'),
(14, 1, 4, '5', '2023-05-15'),
(15, 1, 4, '4', '2023-06-30'),
(16, 1, 5, '5', '2023-05-20'),
(17, 1, 5, '4', '2023-07-05'),
(18, 2, 1, '4', '2023-05-01'),
(19, 2, 1, '3', '2023-06-15'),
(20, 2, 2, '5', '2023-05-05'),
(21, 2, 2, '4', '2023-06-20'),
(22, 2, 3, '6', '2023-05-10'),
(23, 2, 3, '3', '2023-06-25'),
(24, 2, 4, '4', '2023-05-15'),
(25, 2, 4, '3', '2023-06-30'),
(26, 2, 5, '5', '2023-05-20'),
(27, 2, 5, '4', '2023-07-05'),
(28, 3, 1, '5', '2023-05-01'),
(29, 3, 1, '4', '2023-06-15'),
(30, 3, 2, '5', '2023-05-05'),
(31, 3, 2, '4', '2023-06-20'),
(32, 3, 3, '6', '2023-05-10'),
(33, 3, 3, '3', '2023-06-25'),
(34, 3, 4, '5', '2023-05-15'),
(35, 3, 4, '4', '2023-06-30'),
(36, 3, 5, '5', '2023-05-20'),
(37, 3, 5, '4', '2023-07-05'),
(38, 4, 1, '4', '2023-05-01'),
(39, 4, 1, '3', '2023-06-15'),
(40, 4, 2, '5', '2023-05-05'),
(41, 4, 2, '4', '2023-06-20'),
(42, 4, 3, '6', '2023-05-10'),
(43, 4, 3, '3', '2023-06-25'),
(44, 4, 4, '4', '2023-05-15'),
(45, 4, 4, '3', '2023-06-30'),
(46, 4, 5, '5', '2023-05-20'),
(47, 4, 5, '4', '2023-07-05'),
(48, 5, 1, '4', '2023-05-01'),
(49, 5, 1, '3', '2023-06-15'),
(50, 5, 2, '5', '2023-05-05'),
(51, 5, 2, '4', '2023-06-20'),
(52, 5, 3, '6', '2023-05-10'),
(53, 5, 3, '3', '2023-06-25'),
(54, 5, 4, '4', '2023-05-15'),
(55, 5, 4, '3', '2023-06-30'),
(56, 5, 5, '5', '2023-05-20'),
(57, 5, 5, '4', '2023-07-05'),
(58, 6, 1, '5', '2023-05-01'),
(59, 6, 1, '4', '2023-06-15'),
(60, 6, 2, '5', '2023-05-05'),
(61, 6, 2, '4', '2023-06-20'),
(62, 6, 3, '6', '2023-05-10'),
(63, 6, 3, '3', '2023-06-25'),
(64, 6, 4, '5', '2023-05-15'),
(65, 6, 4, '4', '2023-06-30'),
(66, 6, 5, '5', '2023-05-20'),
(67, 6, 5, '4', '2023-07-05'),
(68, 7, 1, '4', '2023-05-01'),
(69, 7, 1, '3', '2023-06-15'),
(70, 7, 2, '5', '2023-05-05'),
(71, 7, 2, '4', '2023-06-20'),
(72, 7, 3, '6', '2023-05-10'),
(73, 7, 3, '3', '2023-06-25'),
(74, 7, 4, '4', '2023-05-15'),
(75, 7, 4, '3', '2023-06-30'),
(76, 7, 5, '5', '2023-05-20'),
(77, 7, 5, '4', '2023-07-05'),
(78, 8, 1, '5', '2023-05-01'),
(79, 8, 1, '4', '2023-06-15'),
(80, 8, 2, '5', '2023-05-05'),
(81, 8, 2, '4', '2023-06-20'),
(82, 8, 3, '6', '2023-05-10'),
(83, 8, 3, '3', '2023-06-25'),
(84, 8, 4, '5', '2023-05-15'),
(85, 8, 4, '4', '2023-06-30'),
(86, 8, 5, '5', '2023-05-20'),
(87, 8, 5, '4', '2023-07-05'),
(88, 9, 1, '4', '2023-05-01'),
(89, 9, 1, '3', '2023-06-15'),
(90, 9, 2, '5', '2023-05-05'),
(91, 9, 2, '4', '2023-06-20'),
(92, 9, 3, '6', '2023-05-10'),
(93, 9, 3, '3', '2023-06-25'),
(94, 9, 4, '4', '2023-05-15'),
(95, 9, 4, '3', '2023-06-30'),
(96, 9, 5, '5', '2023-05-20'),
(97, 9, 5, '4', '2023-07-05'),
(98, 10, 1, '5', '2023-05-01'),
(99, 10, 1, '4', '2023-06-15'),
(100, 10, 2, '5', '2023-05-05'),
(101, 10, 2, '4', '2023-06-20'),
(102, 10, 3, '6', '2023-05-10'),
(103, 10, 3, '3', '2023-06-25'),
(104, 10, 4, '5', '2023-05-15'),
(105, 10, 4, '4', '2023-06-30'),
(106, 10, 5, '5', '2023-05-20'),
(107, 10, 5, '4', '2023-07-05'),
(108, 11, 1, '4', '2023-05-01'),
(109, 11, 1, '3', '2023-06-15'),
(110, 11, 2, '5', '2023-05-05'),
(111, 11, 2, '4', '2023-06-20'),
(112, 11, 3, '6', '2023-05-10'),
(113, 11, 3, '3', '2023-06-25'),
(114, 11, 4, '4', '2023-05-15'),
(115, 11, 4, '3', '2023-06-30'),
(116, 11, 5, '5', '2023-05-20'),
(117, 11, 5, '4', '2023-07-05'),
(118, 12, 1, '5', '2023-05-01'),
(119, 12, 1, '4', '2023-06-15'),
(120, 12, 2, '5', '2023-05-05'),
(121, 12, 2, '4', '2023-06-20'),
(122, 12, 3, '6', '2023-05-10'),
(123, 12, 3, '3', '2023-06-25'),
(124, 12, 4, '5', '2023-05-15'),
(125, 12, 4, '4', '2023-06-30'),
(126, 12, 5, '5', '2023-05-20'),
(127, 12, 5, '4', '2023-07-05'),
(128, 13, 1, '4', '2023-05-01'),
(129, 13, 1, '3', '2023-06-15'),
(130, 13, 2, '5', '2023-05-05'),
(131, 13, 2, '4', '2023-06-20'),
(132, 13, 3, '6', '2023-05-10'),
(133, 13, 3, '3', '2023-06-25'),
(134, 13, 4, '4', '2023-05-15'),
(135, 13, 4, '3', '2023-06-30'),
(136, 13, 5, '5', '2023-05-20'),
(137, 13, 5, '4', '2023-07-05'),
(138, 14, 1, '5', '2023-05-01'),
(139, 14, 1, '4', '2023-06-15'),
(140, 14, 2, '5', '2023-05-05'),
(141, 14, 2, '4', '2023-06-20'),
(142, 14, 3, '6', '2023-05-10'),
(143, 14, 3, '3', '2023-06-25'),
(144, 14, 4, '5', '2023-05-15'),
(145, 14, 4, '4', '2023-06-30'),
(146, 14, 5, '5', '2023-05-20'),
(147, 14, 5, '4', '2023-07-05'),
(148, 15, 1, '5', '2023-05-01'),
(149, 15, 1, '4', '2023-06-15'),
(150, 15, 2, '5', '2023-05-05'),
(151, 15, 2, '4', '2023-06-20'),
(152, 15, 3, '6', '2023-05-10'),
(153, 15, 3, '3', '2023-06-25'),
(154, 15, 4, '5', '2023-05-15'),
(155, 15, 4, '4', '2023-06-30'),
(156, 15, 5, '5', '2023-05-20'),
(157, 15, 5, '4', '2023-07-05'),
(158, 1, 2, '1', '2023-06-21'),
(159, 1, 2, '1', '2023-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `grade_history`
--

CREATE TABLE `grade_history` (
  `mod_ID` int(11) NOT NULL,
  `grade_ID` int(11) NOT NULL,
  `previous_grade` int(11) DEFAULT NULL,
  `new_grade` varchar(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `grade_history`
--

INSERT INTO `grade_history` (`mod_ID`, `grade_ID`, `previous_grade`, `new_grade`, `date`) VALUES
(1, 162, NULL, '1', '2023-06-21'),
(3, 162, 2, '1', '2023-06-21'),
(4, 163, NULL, '1', '2023-06-21'),
(5, 163, 1, '4', '2023-06-21'),
(6, 160, 1, 'DELETED', '2023-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_ID` int(11) UNSIGNED NOT NULL,
  `class_ID` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(9) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email_verification` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_ID`, `class_ID`, `name`, `surname`, `email`, `phone`, `password`, `email_verification`) VALUES
(1, 1, 'John', 'Smith', 'johns@szkola.com', 123456789, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(2, 1, 'Emily', 'Johnson', 'emilyj@szkola.com', 234567890, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(3, 1, 'Michael', 'Williams', 'michaelw@szkola.com', 345678901, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(4, 1, 'Emma', 'Jones', 'emmaj@szkola.com', 456789012, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(5, 1, 'Daniel', 'Brown', 'danielb@szkola.com', 567890123, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(6, 2, 'Olivia', 'Davis', 'oliviad@szkola.com', 678901234, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(7, 2, 'Matthew', 'Miller', 'matthewm@szkola.com', 789012345, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(8, 2, 'Sophia', 'Wilson', 'sophiaw@szkola.com', 890123456, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(9, 2, 'Alexander', 'Taylor', 'alexandert@szkola.com', 901234567, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(10, 2, 'Isabella', 'Anderson', 'isabellaa@szkola.com', 12345678, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(11, 3, 'James', 'Thomas', 'jamest@szkola.com', 123456780, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(12, 3, 'Mia', 'Jackson', 'miaj@szkola.com', 234567891, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(13, 3, 'Benjamin', 'White', 'benjaminw@szkola.com', 345678902, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(14, 3, 'Ava', 'Harris', 'avah@szkola.com', 456789013, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(15, 3, 'Charlotte', 'Martin', 'charlottem@szkola.com', 567890124, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_ID` int(11) UNSIGNED NOT NULL,
  `subject_Name` varchar(30) NOT NULL,
  `teacher_ID` int(11) UNSIGNED DEFAULT NULL,
  `class_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_ID`, `subject_Name`, `teacher_ID`, `class_ID`) VALUES
(1, 'Math', 5, 1),
(2, 'PE', 2, 1),
(3, 'Biology', 3, 3),
(4, 'Art', 1, 2),
(5, 'Safety Training', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_ID` int(11) UNSIGNED NOT NULL,
  `first_Name` varchar(30) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(9) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email_verification` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_ID`, `first_Name`, `surname`, `email`, `phone`, `password`, `email_verification`) VALUES
(1, 'Adolf', 'Tittler', 'adolft@szkola.com', 876543210, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(2, 'Johnny', 'Sim', 'johnnys@szkola.com', 987654321, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(3, 'Mia', 'Dubai', 'miad@szkola.com', 765432109, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(4, 'Peter', 'Zalewski', 'peterz@szkola.com', 234567890, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true'),
(5, 'Srinivasa', 'Ramanujan', 'srinivasar@szkola.com', 543210987, '$2y$10$Zym.uXX2oEOHw.W83TVxNOFauy1V5/wf4Re0ilhXlQcyNVS1HFpb2', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `code` char(4) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_ID`),
  ADD KEY `homeroom_teacher_ID` (`homeroom_teacher_ID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_ID`),
  ADD KEY `student_ID` (`student_ID`,`subject_ID`),
  ADD KEY `subject_ID` (`subject_ID`);

--
-- Indexes for table `grade_history`
--
ALTER TABLE `grade_history`
  ADD PRIMARY KEY (`mod_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_ID`),
  ADD KEY `class_ID` (`class_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_ID`),
  ADD KEY `teacher_ID` (`teacher_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_ID`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `grade_history`
--
ALTER TABLE `grade_history`
  MODIFY `mod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
