-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 02:49 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `common_tab`
--

CREATE TABLE `common_tab` (
  `id` int(11) NOT NULL,
  `position` varchar(128) DEFAULT NULL,
  `short_det` varchar(128) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `details` varchar(128) DEFAULT NULL,
  `action` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `link` varchar(128) DEFAULT NULL,
  `type` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `subject_id` int(4) DEFAULT NULL,
  `year` varchar(128) DEFAULT NULL,
  `answer` varchar(128) DEFAULT NULL,
  `question_img` varchar(128) DEFAULT NULL,
  `option_a` varchar(255) DEFAULT NULL,
  `option_b` varchar(255) DEFAULT NULL,
  `option_c` varchar(255) DEFAULT NULL,
  `option_d` varchar(255) DEFAULT NULL,
  `option_e` varchar(255) DEFAULT NULL,
  `option_type` enum('text','image') DEFAULT NULL,
  `question` text DEFAULT NULL,
  `comp` text DEFAULT NULL,
  `question_type` enum('text','image') DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `status` enum('published','draft') DEFAULT NULL,
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject_id`, `year`, `answer`, `question_img`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `option_type`, `question`, `comp`, `question_type`, `instructions`, `status`, `time`) VALUES
(1, 1, '2020', 'e', 'physics32.png', '3.9A', '243.2A', '0.354A', '0.46A', 'None of the Above', 'text', 'A question is here A', NULL, 'image', 'Choose the right answer,Use the Diagram below to answer the following question correctly\r\n', 'published', 1586255236),
(2, 1, '2020', 'c', NULL, 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 'text', 'what a new question C', NULL, 'text', 'Choose the right answer', 'published', 1586255236),
(3, 1, '2020', 'a', NULL, 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 'text', 'whats Amount Withdrawn A', NULL, 'text', 'Choose the right answer', 'published', 1586255236),
(4, 1, '2020', 'd', NULL, 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 'text', 'whats Pending Balance D', NULL, 'text', 'Choose the right answer', 'published', 1586255236),
(5, 1, '2020', 'e', NULL, 'Option A', 'Option B', 'Option C', 'Option D', 'Option E', 'text', 'whats Account Balance E', NULL, 'text', 'Choose the right answer', 'published', 1586255236);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `standard_score` varchar(128) DEFAULT NULL,
  `test_id` varchar(128) DEFAULT NULL,
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `short_name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `short_name`) VALUES
(1, 'Human Resource Management', 'HRM609');

-- --------------------------------------------------------

--
-- Table structure for table `system_var`
--

CREATE TABLE `system_var` (
  `id` int(11) NOT NULL,
  `variable_name` varchar(128) DEFAULT NULL,
  `variable_value` varchar(128) DEFAULT NULL,
  `long_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_var`
--

INSERT INTO `system_var` (`id`, `variable_name`, `variable_value`, `long_value`) VALUES
(1, 'next_test_id', '1', NULL),
(2, 'site_meta', '{\"siteName\":\"CBT\",\"description\":\"A cbt software\"}', NULL),
(3, 'next_test_id', '1', NULL),
(4, 'site_meta', '{\"siteName\":\"CBT\",\"description\":\"A cbt software\"}', NULL),
(5, 'next_test_id', '1', NULL),
(6, 'site_meta', '{\"siteName\":\"CBT\",\"description\":\"A cbt software\"}', NULL),
(7, 'next_test_id', '1', NULL),
(8, 'site_meta', '{\"siteName\":\"CBT\",\"description\":\"A cbt software\"}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `questions` text DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `subject_id` int(3) DEFAULT NULL,
  `test_start` varchar(128) DEFAULT NULL,
  `test_end` varchar(128) DEFAULT NULL,
  `time_allowed` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `questions`, `instructions`, `subject_id`, `test_start`, `test_end`, `time_allowed`, `time`) VALUES
(1, 'HRM609', '[1,2,3,4,5]', '<div class=\"\">\r\n<b>INSTRUCTIONS</b>\r\n<br><br>\r\n<ul>\r\n<li>Answer All Questions</li>\r\n<li>Scientific Calculator is not allowed</li>\r\n<li>Click on submit button to submit</li>\r\n<li>Before you start ,make sure your device is in good state</li>\r\n<li>In case your device develop fault while on a test,quickly login on <br>another devices and continue you test<br>\r\nbecause the moment you start,your time keep on reading\r\n</li>\r\n\r\n\r\n\r\n</ul>\r\n\r\n</div>', 1, '1586255236', '1596255236', '6000', 1586255236);

-- --------------------------------------------------------

--
-- Table structure for table `test_sessions`
--

CREATE TABLE `test_sessions` (
  `id` int(11) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `answers` text DEFAULT NULL,
  `questions` text DEFAULT NULL,
  `last_updated` varchar(20) DEFAULT NULL,
  `time_used` varchar(20) DEFAULT NULL,
  `time_start` varchar(20) DEFAULT NULL,
  `test_id` int(4) DEFAULT NULL,
  `time_end` varchar(20) DEFAULT NULL,
  `status` enum('submitted','started','paused') DEFAULT NULL,
  `time` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `profile_img` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `time` int(20) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `lastlog` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `phone`, `profile_img`, `status`, `time`, `level`, `lastlog`) VALUES
(4, 'user', 'user', '0d8d5cd06832b29560745fe4e1b941cf', 'user@gmail.com', '12345678', 'test.png', NULL, 1586435942, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `common_tab`
--
ALTER TABLE `common_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_var`
--
ALTER TABLE `system_var`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_sessions`
--
ALTER TABLE `test_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `common_tab`
--
ALTER TABLE `common_tab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_var`
--
ALTER TABLE `system_var`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_sessions`
--
ALTER TABLE `test_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
