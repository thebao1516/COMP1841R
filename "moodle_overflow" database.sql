-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2024 at 12:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moodle_overflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `is_deleted`, `post_id`, `content`, `author_id`, `createdAt`) VALUES
(5, 0, 17, 'I have nothing to complain. Well done!', 12, '2023-10-27 15:31:26'),
(11, 0, 20, 'Good job', 8, '2023-11-01 05:22:40'),
(14, 0, 17, 'That\'s correct\r\nHurray', 8, '2023-11-02 15:23:27'),
(15, 0, 17, 'Hihihshshshshs', 3, '2023-11-03 02:09:43'),
(17, 1, 21, 'I have no idea', 3, '2023-11-07 04:59:29'),
(18, 1, 21, 'Hi man', 2, '2023-11-14 05:10:07'),
(19, 0, 22, '+1', 2, '2023-11-15 02:50:58'),
(20, 0, 21, 'Yeah changed', 3, '2023-11-22 03:39:26'),
(21, 0, 21, 'Hi Quân', 8, '2023-11-22 07:24:24'),
(22, 1, 17, 'Anyone? Help!', 2, '2023-11-26 16:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `email_from` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `email_from`, `subject`, `content`, `createdAt`) VALUES
(1, 'quan@gmail.com', 'Subject 1', 'content 1', '2023-11-14 03:17:17'),
(2, 'phuc@gmail.com', 'Subject 2', 'Content 2', '2023-11-14 03:17:17'),
(3, 'quan@gmail.com', 'Subject 3', 'message 3', '2023-11-14 03:43:39'),
(4, 'quan@gmail.com', 'Subject 4', 'message 4', '2023-11-14 03:48:55'),
(5, 'quan@gmail.com', 'Subject 4', 'message 4', '2023-11-14 03:51:07'),
(6, 'quan@gmail.com', 'Subject 4', 'message 4', '2023-11-14 03:51:41'),
(7, 'quan@gmail.com', 'Subject 4', 'message 4', '2023-11-14 03:53:18'),
(8, 'phuc@gmail.com', 'Subject 5', 'content 5', '2023-11-14 04:52:28'),
(9, 'phuc@gmail.com', 'Add module \"Computer Science\"', 'Excuse sir, can you add this module to the system?', '2023-11-26 15:21:26'),
(10, 'phuc@gmail.com', '<script>alert(\'Malicious Script\');</script>', '<img src=\"malicious_image.jpg\" onerror=\"alert(\'Malicious Script\');\">', '2023-11-26 18:17:18'),
(11, 'tony@gmail.com', 'Update \"wed programming 1\" name to \"wed programming 2\"', 'Update \"wed programming 1\" name to \"wed programming 2\"', '2024-04-29 21:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `teacher` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `is_deleted`, `name`, `teacher`) VALUES
(1, 1, 'Networking', 'Danh'),
(3, 0, 'Project Management', 'Dương'),
(4, 0, 'Web Programming 1', 'Thành'),
(7, 1, 'Final Year Project', 'Quốc Anh'),
(9, 1, 'UI/UX Design', 'Henry'),
(10, 1, 'Test', 'Henry');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` text DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `is_deleted`, `title`, `content`, `image`, `module_id`, `author_id`, `createdAt`) VALUES
(14, 0, 'Post 2', 'content 2', '../uploads/Screenshot 2023-10-25 100133.png', 4, 2, '2024-04-28 17:00:00'),
(17, 0, 'Someone helps me with the coursework?', 'Please help me!', '../uploads/networking-challenges.png', 1, 2, '2023-10-25 17:00:00'),
(20, 1, 'I\'ve finished', 'I have nothing to say!', '../uploads/carbon (6).png', 7, 2, '2023-11-01 04:26:16'),
(21, 0, 'My LAN network is crashed', 'Cany someone help me?', '../uploads/UntitledUserPersona (6).png', 1, 3, '2023-11-07 03:12:51'),
(22, 1, 'hello', 'mon nay nhu shit', NULL, 3, 2, '2023-11-15 02:50:38'),
(23, 0, 'Test post', 'content test', '../uploads/9a557771-a5fd-4a91-885a-1888035129d6.jpg', 7, 2, '2023-11-22 06:59:26'),
(24, 1, 'My Gantt Chart Updated', 'This is my Gantt Chart for the coursework. Can someone give me some feedback?', '../uploads/gantt-chart.png', 3, 2, '2023-11-26 13:43:48'),
(25, 0, 'aa', 'aa', '../uploads/gantt-chart.png', 10, 2, '2023-11-26 16:46:14'),
(26, 1, 'How do I run Apache?', 'Someone please help me. Updated: I can run it now. Thank you so much', '../uploads/cai-dat-xampp-03.png', 4, 14, '2023-11-26 17:20:13'),
(27, 0, 'Work Breakdown Structure ', 'I need someone\'s help with the work breakdown structure for the coursework', '../uploads/work-breakdown-structure-example.png', 1, 2, '2024-04-27 17:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL DEFAULT 'https://img.freepik.com/premium-vector/man-character_665280-46970.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `is_deleted`, `is_admin`, `firstname`, `lastname`, `email`, `password`, `avatar`) VALUES
(1, 0, 1, 'Bao', 'Ro', 'thebao1516@gmail.com', '$2y$10$Fifkp4rRLfVr6U31V.G8fumkkBH7ANPFN6uq3EB5lZLawoHETf3JO', '../uploads/A20_0038.png'),
(2, 0, 0, 'Phuc', 'Nguyen', 'phuc@gmail.com', '$2y$10$US18R1/QhgMilWDBnw2jO.ucRGd9lF8sGGSu48v1mXgRTARUICVsu', '../uploads/italian.png'),
(3, 1, 0, 'Quan', 'Nguyen', 'quan@gmail.com', '$2y$10$vTW1NfQ3eWScJ381wWm9u.PDOZOfP5STaUpiZyaPdQKLa/ibydBXS', 'https://img.freepik.com/premium-vector/man-character_665280-46970.jpg'),
(8, 1, 0, 'Phuong', 'Nguyen', 'phuong@gmail.com', '$2y$10$hRaIcnYM6FxK0YAgM.lf4OBcf5jPGj3A5NmJNGlrLUK7YwCgwvwsK', 'https://img.freepik.com/premium-vector/man-character_665280-46970.jpg'),
(12, 1, 0, 'Kiệt', 'Khương', 'kiet@gmail.com', '$2y$10$njopL3FbPSgTk3NWslE.N.fmvxycYDq87dM0BRezX1cRSsQZmqpUS', 'https://img.freepik.com/premium-vector/man-character_665280-46970.jpg'),
(13, 1, 0, 'Peter', 'Allen', 'peter.updated@gmail.com', '$2y$10$ZiQ431a788hxl5E3U4puA.zjWP8uLTS7Br8bCt2X2rk19BBaSox6m', 'https://img.freepik.com/premium-vector/man-character_665280-46970.jpg'),
(14, 0, 0, 'Tony', 'Bao', 'tony@gmail.com', '$2y$10$E3SCv0OKrnHfcqt7V4Rb3eNTNkkfI6SRkMB78xkNNwi4bRQ5zZ.cq', 'https://img.freepik.com/premium-vector/man-character_665280-46970.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_from` (`email_from`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`email_from`) REFERENCES `user` (`email`) ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
