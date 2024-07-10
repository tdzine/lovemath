-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 02:25 PM
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
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `incorrect_answers` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `topic`, `correct_answers`, `incorrect_answers`, `start_time`, `end_time`, `user_id`) VALUES
(18, 'Phép cộng', 9, 0, '2024-07-01 18:09:16', '2024-07-01 18:09:38', 1),
(19, 'Phép cộng', 2, 7, '2024-07-01 18:17:55', '2024-07-01 18:18:00', 3),
(21, 'Phép trừ', 0, 10, '2024-07-01 18:38:17', '2024-07-01 18:38:20', 1),
(22, 'Phép trừ', 8, 2, '2024-07-01 18:38:52', '2024-07-01 18:39:18', 3),
(23, 'So sánh 2 số', 9, 3, '2024-07-01 18:45:43', '2024-07-01 18:46:12', 1),
(24, 'Phép cộng', 2, 7, '2024-07-01 18:50:12', '2024-07-01 18:50:18', 3),
(25, 'Phép cộng', 0, 12, '2024-07-01 21:24:09', '2024-07-01 21:24:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `math_competition`
--

CREATE TABLE `math_competition` (
  `id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `left_operand` int(11) DEFAULT NULL,
  `right_operand` int(11) DEFAULT NULL,
  `correct_operator` varchar(10) DEFAULT NULL,
  `source_table` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `math_competition`
--

INSERT INTO `math_competition` (`id`, `question_text`, `answer`, `left_operand`, `right_operand`, `correct_operator`, `source_table`) VALUES
(1, '2 + 2 = ?', '4', NULL, NULL, NULL, 'math_problems_add'),
(2, '5 + 3 = ?', '8', NULL, NULL, NULL, 'math_problems_add'),
(3, '10 + 5 = ?', '15', NULL, NULL, NULL, 'math_problems_add'),
(4, '20 + 4 = ?', '24', NULL, NULL, NULL, 'math_problems_add'),
(5, '5 + 4 = ?', '9', NULL, NULL, NULL, 'math_problems_add'),
(6, '10 + 7 = ?', '17', NULL, NULL, NULL, 'math_problems_add'),
(7, '15 + 9 = ?', '24', NULL, NULL, NULL, 'math_problems_add'),
(8, '8 + 6 = ?', '14', NULL, NULL, NULL, 'math_problems_add'),
(9, '12 + 4 = ?', '16', NULL, NULL, NULL, 'math_problems_add'),
(16, '', NULL, 10, 12, '<', 'math_problems'),
(17, '', NULL, 5, 3, '>', 'math_problems'),
(18, '', NULL, 7, 7, '=', 'math_problems'),
(19, '', NULL, 10, 5, '>', 'math_problems'),
(20, '', NULL, 20, 50, '<', 'math_problems'),
(21, '', NULL, 15, 15, '=', 'math_problems'),
(22, '', NULL, 30, 100, '<', 'math_problems'),
(23, '', NULL, 5, 12, '<', 'math_problems'),
(24, '', NULL, 10, 7, '>', 'math_problems'),
(25, '', NULL, 6, 9, '<', 'math_problems'),
(26, '', NULL, 8, 8, '=', 'math_problems'),
(27, '', NULL, 12, 4, '>', 'math_problems'),
(31, '5 - 3 = ?', '2', NULL, NULL, NULL, 'math_problems_sub'),
(32, '10 - 6 = ?', '4', NULL, NULL, NULL, 'math_problems_sub'),
(33, '8 - 5 = ?', '3', NULL, NULL, NULL, 'math_problems_sub'),
(34, '12 - 5 = ?', '7', NULL, NULL, NULL, 'math_problems_sub'),
(35, '15 - 6 = ?', '9', NULL, NULL, NULL, 'math_problems_sub'),
(36, '20 - 7 = ?', '13', NULL, NULL, NULL, 'math_problems_sub'),
(37, '18 - 9 = ?', '9', NULL, NULL, NULL, 'math_problems_sub'),
(38, '25 - 14 = ?', '11', NULL, NULL, NULL, 'math_problems_sub'),
(39, '30 - 12 = ?', '18', NULL, NULL, NULL, 'math_problems_sub'),
(40, '16 - 6 = ?', '10', NULL, NULL, NULL, 'math_problems_sub');

-- --------------------------------------------------------

--
-- Table structure for table `math_problems`
--

CREATE TABLE `math_problems` (
  `id` int(11) NOT NULL,
  `left_operand` int(11) NOT NULL,
  `right_operand` int(11) NOT NULL,
  `correct_operator` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `math_problems`
--

INSERT INTO `math_problems` (`id`, `left_operand`, `right_operand`, `correct_operator`) VALUES
(1, 10, 12, '<'),
(2, 5, 3, '>'),
(3, 7, 7, '='),
(4, 10, 5, '>'),
(5, 20, 50, '<'),
(6, 15, 15, '='),
(7, 30, 100, '<'),
(8, 5, 12, '<'),
(9, 10, 7, '>'),
(10, 6, 9, '<'),
(11, 8, 8, '='),
(12, 12, 4, '>'),
(13, 7, 10, '<'),
(14, 93, 39, '>');

-- --------------------------------------------------------

--
-- Table structure for table `math_problems_add`
--

CREATE TABLE `math_problems_add` (
  `id` int(11) NOT NULL,
  `question_text` varchar(255) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `math_problems_add`
--

INSERT INTO `math_problems_add` (`id`, `question_text`, `answer`) VALUES
(1, '2 + 2 = ?', 4),
(2, '5 + 3 = ?', 8),
(3, '10 + 5 = ?', 15),
(4, '20 + 4 = ?', 24),
(5, '5 + 4 = ?', 9),
(6, '10 + 7 = ?', 17),
(7, '15 + 9 = ?', 24),
(8, '8 + 6 = ?', 14),
(9, '12 + 4 = ?', 16),
(10, '1 + 1 = ?', 2),
(11, '12 + 7 = ?', 19),
(12, '18 + 7 = ?', 25);

-- --------------------------------------------------------

--
-- Table structure for table `math_problems_sub`
--

CREATE TABLE `math_problems_sub` (
  `id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `math_problems_sub`
--

INSERT INTO `math_problems_sub` (`id`, `question_text`, `answer`) VALUES
(1, '5 - 3 = ?', 2),
(2, '10 - 6 = ?', 4),
(3, '8 - 5 = ?', 3),
(4, '12 - 5 = ?', 7),
(5, '15 - 6 = ?', 9),
(6, '20 - 7 = ?', 13),
(7, '18 - 9 = ?', 9),
(8, '25 - 14 = ?', 11),
(9, '30 - 12 = ?', 18),
(10, '16 - 6 = ?', 10),
(11, '10 - 5 = ?', 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Giáo viên chủ nhiệm'),
(3, 'Phụ huynh'),
(4, 'Học sinh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `parent_phone` varchar(20) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `class` varchar(20) NOT NULL,
  `school` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `parent_name`, `parent_phone`, `student_name`, `class`, `school`, `address`, `created_at`, `role_id`) VALUES
(1, 'tuanduy', 'tuanduy@mail.com', '1234', 'Phan Thị Trung Hậu', '0344152231', 'Tuan Duy Huynh Tran', '5.1', 'TDT', 'ap 1', '2024-05-29 13:52:41', NULL),
(2, 'trunghau0911', 'trunghau@mail.com', '1234', 'Huỳnh Trần Tuấn Duy', '0981712700', 'Phan Thị Trung Hậu', '5.1', 'TDT', 'Ấp Gót Chàng', '2024-05-29 17:04:25', NULL),
(3, 'tuanduy1', 'hauphan0911@gmail.com', '1234', 'Trung Hậu', '0344152231', 'Tuấn Duy', '5.1', 'TDT', 'ẤP 1', '2024-05-29 18:41:10', NULL),
(4, 'tuanduy2', 'duy@mail.com', '1234', 'Tuấn Duy', '0344152231', 'Tuấn Duy', '5.1', 'TDT', '5.1\r\n', '2024-05-29 19:57:00', NULL),
(5, 'trunghau', 'hauphan@gmail.com', '1234', 'Tuấn Duy', '0344152231', 'Trung Hậu', '5.2', 'TDT', 'Ấp 1', '2024-05-29 20:02:25', NULL),
(6, 'tuanduy3', 'httduy290999@gmail.com', 'fnOrsfTIQG', 'Tuấn Duy', '0344152231', 'Phan Thị Trung Hậu', '5.4', 'TH TDT', 'HCM', '2024-05-30 10:31:25', NULL),
(7, 'admin', 'admin@gmail.com', 'admin', '', '', 'admin', '', '', '', '2024-06-08 19:52:29', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `math_competition`
--
ALTER TABLE `math_competition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `math_problems`
--
ALTER TABLE `math_problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `math_problems_add`
--
ALTER TABLE `math_problems_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `math_problems_sub`
--
ALTER TABLE `math_problems_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `math_competition`
--
ALTER TABLE `math_competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `math_problems`
--
ALTER TABLE `math_problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `math_problems_add`
--
ALTER TABLE `math_problems_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `math_problems_sub`
--
ALTER TABLE `math_problems_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
