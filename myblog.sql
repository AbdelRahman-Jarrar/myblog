-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2022 at 09:39 AM
-- Server version: 8.0.28
-- PHP Version: 7.4.28

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

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` int NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `body` text COLLATE utf8mb4_general_ci NOT NULL,
  `current_time` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `title`, `body`, `current_time`, `user_id`) VALUES
(69, 'the best one ', 'pls don\'t delete', NULL, NULL),
(75, 'add', 'this new new new ', NULL, NULL),
(78, 'falfafad', 'adasd adadasdda', NULL, NULL),
(81, 'asdsad', 'asddasxcxc', NULL, NULL),
(83, 'new one ', 'this is new ', NULL, NULL),
(84, 'the second new one ', 'this is new new ', NULL, NULL),
(85, 'asdsdsad', 'asdasdasdasd', NULL, NULL),
(86, 'adad', 'asdadasd', NULL, NULL),
(87, 'one one one one one ', 'last last last last ', NULL, NULL),
(93, 'asddd', 'the fourth son', NULL, NULL),
(94, 'abd new', 'the last one two', NULL, NULL),
(97, 'Alfred Schmidt', 'Frankfurt', NULL, NULL),
(98, 'this new one one ', 'this is from insert ', NULL, NULL),
(99, 'qwertyuiop', '45454545454545', NULL, NULL),
(100, 'qwertyuiopp', 'asdfghgfds', NULL, NULL),
(101, 'with user id ', 'the first one ', NULL, 5),
(102, 'it have a user id ', 'the asdadad', NULL, 5),
(103, 'lklkjijijininjijih', 'vhkhhjlkjhhgff', NULL, 4),
(104, 'qweqeqwe', 'ooooooooooooooooooooo', NULL, NULL),
(105, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqq', NULL, NULL),
(106, 'wwwwwwwwwwwwwwwwwww', 'wqqqqqqqqqqqqqqqqqqqqqqqq', NULL, NULL),
(107, 'uuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu', 'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', NULL, NULL),
(108, 'dddddddddddddddddddddddddddd', 'ddddssssssssssssssssssss', NULL, NULL),
(109, 'ffffffffffffffffffffffffffffffffff', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, NULL),
(110, 'ffffffffffffffffffffffffffffffffff', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, NULL),
(111, 'test ajax', 'gfhgfhgvnbv', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(3, 'ali', 'ali@gmail.com', 'qwert', 'Admin'),
(4, 'abdelrahmanja98', 'jarrar@gmail.com', 'qwert', 'Admin'),
(5, 'jarrar98', 'abjarrar@gmail.com', '1234', 'Author'),
(12, 'abd', 'qweqwe@gmail.com', '1234', 'Author'),
(13, 'abd1', 'abdelrahman.jarrar@htu.edu.jo', '1234', 'Author');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
