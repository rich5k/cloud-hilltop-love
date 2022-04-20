-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 05:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hilltoplove`
--

-- --------------------------------------------------------

--
-- Table structure for table `converstion`
--

CREATE TABLE `converstion` (
  `uMid` int(8) NOT NULL,
  `message` varchar(200) DEFAULT NULL,
  `mess_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sender_id` int(8) DEFAULT NULL,
  `receiver_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `int_id` int(8) NOT NULL,
  `interest_name` varchar(50) DEFAULT NULL,
  `Uid` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `pic_id` int(8) NOT NULL,
  `Uid` int(80) DEFAULT NULL,
  `pic_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Uid` int(8) NOT NULL,
  `fname` char(50) NOT NULL,
  `lname` char(50) NOT NULL,
  `username` char(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `dob` date NOT NULL,
  `class` year(4) DEFAULT NULL,
  `major` char(80) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `insta` varchar(150) DEFAULT NULL,
  `sexual_orientation` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Uid`, `fname`, `lname`, `username`, `email`, `pass`, `gender`, `dob`, `class`, `major`, `phone`, `twitter`, `insta`, `sexual_orientation`) VALUES
(10, 'Kwaku', 'Agyeman', 'AgyemanK', 'kwaku.agyeman@ashesi.edu.gh', '$2y$10$JdTIlCoRNVR5flk/uA4YyO3Hz3W0YqT9miEojZobH4fUoHJPR/4Ku', 'm', '2020-05-14', 2022, 'Computer Science', '0246000307', '@agyeman', '@sdfjksa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_interest`
--

CREATE TABLE `user_interest` (
  `interest_id` int(8) NOT NULL,
  `Uid` int(8) DEFAULT NULL,
  `Iid` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `like_id` int(8) NOT NULL,
  `Uid` int(8) DEFAULT NULL,
  `Iid` int(8) DEFAULT NULL,
  `like_dis` enum('l','d') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_match`
--

CREATE TABLE `user_match` (
  `match_id` int(8) NOT NULL,
  `Uid` int(8) DEFAULT NULL,
  `Iid` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `converstion`
--
ALTER TABLE `converstion`
  ADD PRIMARY KEY (`uMid`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`int_id`),
  ADD KEY `Uid` (`Uid`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `Uid` (`Uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_interest`
--
ALTER TABLE `user_interest`
  ADD PRIMARY KEY (`interest_id`),
  ADD KEY `Uid` (`Uid`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `Uid` (`Uid`);

--
-- Indexes for table `user_match`
--
ALTER TABLE `user_match`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `Uid` (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `converstion`
--
ALTER TABLE `converstion`
  MODIFY `uMid` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `int_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `pic_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Uid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_interest`
--
ALTER TABLE `user_interest`
  MODIFY `interest_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_likes`
--
ALTER TABLE `user_likes`
  MODIFY `like_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_match`
--
ALTER TABLE `user_match`
  MODIFY `match_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `converstion`
--
ALTER TABLE `converstion`
  ADD CONSTRAINT `converstion_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`Uid`),
  ADD CONSTRAINT `converstion_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`Uid`);

--
-- Constraints for table `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`Uid`) REFERENCES `users` (`Uid`);

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`Uid`) REFERENCES `users` (`Uid`);

--
-- Constraints for table `user_interest`
--
ALTER TABLE `user_interest`
  ADD CONSTRAINT `user_interest_ibfk_1` FOREIGN KEY (`Uid`) REFERENCES `users` (`Uid`);

--
-- Constraints for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD CONSTRAINT `user_likes_ibfk_1` FOREIGN KEY (`Uid`) REFERENCES `users` (`Uid`);

--
-- Constraints for table `user_match`
--
ALTER TABLE `user_match`
  ADD CONSTRAINT `user_match_ibfk_1` FOREIGN KEY (`Uid`) REFERENCES `users` (`Uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
