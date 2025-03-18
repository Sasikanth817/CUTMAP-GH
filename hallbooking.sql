-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 04:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hallbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings1` (
  `b_id` int(11) NOT NULL,
  `b_date` varchar(20) NOT NULL,
  `b_time` varchar(10) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `b_mobile_no` int(11) NOT NULL,
  `b_booker_name` varchar(100) NOT NULL,
  `b_reason` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `U_Id` int(11) NOT NULL,
  `b_request` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings1` (`b_id`, `b_date`, `b_time`, `department_name`, `b_mobile_no`, `b_booker_name`, `b_reason`, `status`, `U_Id`, `b_request`) VALUES
(13, 'thu 21,March 2024', '8-9 AM', ' Request Hall', 0, 'yash', 'cultural fest', 'pending', 1, '2024-03-21 13:19:13'),
(14, 'sat 23,March 2024', '4-5 PM', 'Bachelors Of Computer Application (BCA)', 0, 'yash', 'cultural fest', 'pending', 1, '2024-03-21 13:29:59'),
(15, 'thu 21,March 2024', '8-9 AM', 'Bachelors Of Computer Application (BCA)', 0, 'yash', 'cultural fest', 'booked', 1, '2024-03-21 15:07:57'),
(16, 'thu 21,March 2024', '8-9 AM', 'Bachelors Of Computer Application (BCA)', 0, 'yash', 'cultural fest', 'pending', 1, '2024-03-21 15:10:06'),
(17, 'fri 22,March 2024', '8-9 AM', 'Masters Of Computer Applications (MCA)', 0, 'ghi', 'dumiy', 'pending', 1, '2024-03-21 16:13:27'),
(18, 'fri 22,March 2024', '9-10 AM', 'Engineering', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 16:16:07'),
(19, 'fri 22,March 2024', '9-10 AM', 'Engineering', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 16:17:51'),
(20, 'fri 22,March 2024', '9-10 AM', 'Engineering', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 16:19:22'),
(21, 'fri 22,March 2024', '9-10 AM', 'Engineering', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 16:21:41'),
(22, 'sat 23,March 2024', '9-10 AM', 'Engineering', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 16:28:01'),
(23, 'Tue 26,March 2024', '11-12 AM', 'Engineering', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 16:40:07'),
(24, 'sat 23,March 2024', '11-12 AM', 'Engineering', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 16:47:35'),
(25, 'sat 23,March 2024', '11-12 AM', 'Engineering', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 16:50:59'),
(26, 'sat 23,March 2024', '11-12 AM', 'Engineering', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 16:56:06'),
(27, 'sat 23,March 2024', '11-12 AM', 'Bachelors Of Computer Application (BCA)', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 16:56:33'),
(28, 'sat 23,March 2024', '11-12 AM', 'Bachelors Of Computer Application (BCA)', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 17:17:52'),
(29, 'sat 23,March 2024', '11-12 AM', 'Bachelors Of Computer Application (BCA)', 0, 'shubh', 'personal purpose', 'pending', 1, '2024-03-21 17:20:55');

-- --------------------------------------------------------
CREATE TABLE `bookings2` (
  `b_id` int(11) NOT NULL,
  `b_date` varchar(20) NOT NULL,
  `b_time` varchar(10) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `b_mobile_no` int(11) NOT NULL,
  `b_booker_name` varchar(100) NOT NULL,
  `b_reason` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `U_Id` int(11) NOT NULL,
  `b_request` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `bookings3` (
  `b_id` int(11) NOT NULL,
  `b_date` varchar(20) NOT NULL,
  `b_time` varchar(10) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `b_mobile_no` int(11) NOT NULL,
  `b_booker_name` varchar(100) NOT NULL,
  `b_reason` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `U_Id` int(11) NOT NULL,
  `b_request` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`d_id`, `d_name`) VALUES
(1, 'bachelors of computer application (BCA)'),
(2, 'Bachelors Computer Science (BCS)'),
(3, 'Engineering'),
(4, 'Business Administration (BA)'),
(5, 'Masters of computer Applications (MCA)'),
(6, 'Biology'),
(7, 'Mathematics'),
(8, 'English Literature'),
(9, 'History'),
(10, 'Economics'),
(11, 'Political Science'),
(12, 'Chemistry'),
(13, 'Physics'),
(14, 'Education'),
(15, 'Sociology'),
(16, 'Communications'),
(17, 'Masters of computer Science (MCS)'),
(18, 'Environmental Science'),
(19, 'Fine Arts'),
(20, 'Linguistics'),
(21, 'Philosophy'),
(22, 'bachelors of science(BSC)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_pass` varchar(200) NOT NULL,
  `u_account_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_pass`, `u_account_created`) VALUES
(1, 'abc@gmail.com', 'abc@gmail.com', '$2y$10$GOO8GJorDTl6.I92qvnEA.d7jQ85z83vT4.54P5MjR7RfSH86g5zC', '2024-03-18 16:39:51'),
(3, 'admin', 'admin@gmail.com', '$2y$10$7adBP//FZa.JPTh08tBaYuF/c8S/xgRWjUkm8CHQn27SDkDSliTB6', '2024-03-18 17:18:02');

--
-- Indexes for dumped tables
--
CREATE TABLE `admins` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  `ad_email` varchar(50) NOT NULL,
  `ad_pass` varchar(200) NOT NULL,
  `ad_account_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admins` (`ad_id`, `ad_name`, `ad_email`, `ad_pass`, `ad_account_created`) VALUES
(1, 'abc@gmail.com', 'abc@gmail.com', '$2y$10$GOO8GJorDTl6.I92qvnEA.d7jQ85z83vT4.54P5MjR7RfSH86g5zC', '2024-03-18 16:39:51'),
(3, 'admin', 'admin@gmail.com', '$2y$10$7adBP//FZa.JPTh08tBaYuF/c8S/xgRWjUkm8CHQn27SDkDSliTB6', '2024-03-18 17:18:02');

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings1`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `f key` (`U_Id`);

ALTER TABLE `bookings2`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `f key` (`U_Id`);

  ALTER TABLE `bookings3`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `f key` (`U_Id`);
--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ad_id`);
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings1`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

ALTER TABLE `bookings2`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

ALTER TABLE `bookings3`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
ALTER TABLE `bookings1`
  ADD CONSTRAINT f key FOREIGN KEY (U_Id) REFERENCES users (u_id) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

ALTER TABLE `bookings2`
  ADD CONSTRAINT f key FOREIGN KEY (U_Id) REFERENCES users (u_id) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

ALTER TABLE `bookings3`
  ADD CONSTRAINT f key FOREIGN KEY (U_Id) REFERENCES users (u_id) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
