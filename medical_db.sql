-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 10, 2024 at 05:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(11) NOT NULL,
  `student_number` varchar(20) DEFAULT NULL,
  `medical_attention` enum('yes','no') DEFAULT NULL,
  `illness_details` text DEFAULT NULL,
  `food_allergies` enum('yes','no') DEFAULT NULL,
  `food_allergies_details` text DEFAULT NULL,
  `medicine_allergies` enum('yes','no') DEFAULT NULL,
  `medicine_allergies_details` text DEFAULT NULL,
  `cigarette_smoker` enum('yes','no') DEFAULT NULL,
  `alcoholic` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `student_number`, `medical_attention`, `illness_details`, `food_allergies`, `food_allergies_details`, `medicine_allergies`, `medicine_allergies_details`, `cigarette_smoker`, `alcoholic`) VALUES
(18, '2021-08042-MN-0', 'no', '', 'yes', 'shrimp', 'no', '', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_number` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `school_year` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `civil_status` varchar(20) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `blood_type` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `parent_guardian_spouse` varchar(100) DEFAULT NULL,
  `landline` varchar(20) DEFAULT NULL,
  `cellphone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_number`, `name`, `address`, `school_year`, `age`, `sex`, `civil_status`, `course`, `blood_type`, `email`, `parent_guardian_spouse`, `landline`, `cellphone`) VALUES
('2021-08042-MN-0', 'Hailly Benavidez', 'Angono, Rizal', '2023-2024', 21, 'male', 'single', 'CCIS', 'O+', 'hailly@gmail.com', 'Genevieve Benavidez', '1234567', '09429727675');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_number` (`student_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD CONSTRAINT `medical_history_ibfk_1` FOREIGN KEY (`student_number`) REFERENCES `students` (`student_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
