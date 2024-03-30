-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 06:41 PM
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
-- Database: `myblog`
--

-- create databse user and password
CREATE USER 'myblog'@'localhost' IDENTIFIED BY '123456';

GRANT ALL PRIVILEGES ON myblog.* TO 'myblog'@'localhost';

FLUSH PRIVILEGES;
-- --------------------------------------------------------

--
-- Table structure for table `blogdetails`
--

CREATE TABLE `blogdetails` (
  `id` int(11) NOT NULL,
  `blogId` int(11) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogdetails`
--

-- INSERT INTO `blogdetails` (`id`, `blogId`, `imagePath`, `description`) VALUES
-- (21, 24, 'images/test/1701978755859.jpg', 'test'),
-- (22, 25, 'images/aaaa/1.png', 'sssssssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `location` tinytext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0-unpublished, 1-published',
  `description` longblob NOT NULL,
  `viewcount` int(11) DEFAULT NULL,
  `createtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

-- INSERT INTO `blogs` (`id`, `userId`, `title`, `location`, `status`, `description`, `viewcount`, `createtime`, `updatetime`) VALUES
-- (24, 7, 'test', 'test', 0, 0x74657374, NULL, '2024-03-21 21:46:51', NULL),
-- (25, 8, 'test', 'test', 0, 0x7373737373, NULL, '2024-03-25 19:48:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `blogId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` tinytext NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

-- INSERT INTO `users` (`id`, `username`, `passwd`, `createtime`) VALUES
-- (7, 'test', '$2y$10$3uOyMhjxfMxrqF1u9SEwcuH492I49u7pd1n7bNFa237Z9.W17kk4G', '2024-03-21 21:46:02'),
-- (8, 'aaaa', '$2y$10$Wc4V8N4PeQUyqH.rkepzSOObX1JafrCyJSbW3dlFXH9j1/iEwAZpm', '2024-03-25 18:45:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogdetails`
--
ALTER TABLE `blogdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogId` (`blogId`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- AUTO_INCREMENT for table `blogdetails`
--
ALTER TABLE `blogdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


--
-- Constraints for table "blogs"
--
ALTER TABLE `blogs`
  ADD KEY `blogs_userId` (`userId`);

ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


--
-- Constraints for table "comments"
--
ALTER TABLE `comments`
  ADD KEY `comments_blogId` (`blogId`),
  ADD KEY `comments_userId` (`userId`);

ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blogId`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_iufk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;




--
-- Constraints for table `blogdetails`
--
ALTER TABLE `blogdetails`
  ADD CONSTRAINT `blogdetails_ibfk_1` FOREIGN KEY (`blogId`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
