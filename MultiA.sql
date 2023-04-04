-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2023 at 02:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MultiA`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `ManageQuiz`
--

CREATE TABLE `ManageQuiz` (
  `admin_id` varchar(100) NOT NULL,
  `Quiz_id` varchar(100) NOT NULL,
  `operation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ManageUser`
--

CREATE TABLE `ManageUser` (
  `User_id` varchar(100) NOT NULL,
  `admin_id` varchar(100) NOT NULL,
  `operation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Option`
--

CREATE TABLE `Option` (
  `Option_id` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `orderNum` int(11) NOT NULL,
  `isCorrect` tinyint(1) NOT NULL,
  `Question_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Option`
--

INSERT INTO `Option` (`Option_id`, `content`, `orderNum`, `isCorrect`, `Question_id`) VALUES
('0', '1', 1, 1, '641c5644b9680'),
('1', 'i', 1, 1, '641c59df11f3b'),
('10', 'trl1', 1, 0, '641d42e8c6675'),
('11', 'trl2', 2, 1, '641d42e8c6675'),
('12', 'tr1', 1, 1, '641d42e8c8b0f'),
('13', 'tr2', 2, 0, '641d42e8c8b0f'),
('14', '0', 1, 1, '641fa44da52be'),
('15', '0', 2, 0, '641fa44da52be'),
('16', '0', 1, 1, '641fa44da7dd5'),
('17', '0', 2, 0, '641fa44da7dd5'),
('18', '0', 3, 0, '641fa44da7dd5'),
('19', '1', 1, 1, '6426fb2204897'),
('2', '2', 1, 1, '641d3b11cc354'),
('20', '2', 2, 0, '6426fb2204897'),
('21', '3', 1, 0, '6426fb2206c9d'),
('22', '4', 2, 1, '6426fb2206c9d'),
('23', '1', 1, 1, '6426fdc5dbba3'),
('24', '2', 2, 0, '6426fdc5dbba3'),
('25', '1', 1, 1, '6426fdc5e0012'),
('26', '1', 2, 0, '6426fdc5e0012'),
('27', '1', 1, 1, '6426fe699b29e'),
('28', '2', 2, 0, '6426fe699b29e'),
('29', '1', 1, 1, '6426fe699e246'),
('3', 'op1', 1, 1, '641d3b31ec29b'),
('30', '2', 2, 0, '6426fe699e246'),
('31', '12', 1, 1, '6426feb3ed8b0'),
('32', '11', 2, 0, '6426feb3ed8b0'),
('33', '12', 1, 1, '6426feb3f0412'),
('34', '12', 2, 0, '6426feb3f0412'),
('35', 'The Anh dep trai', 1, 1, '64270bc443147'),
('36', 'The Anh dep trai', 2, 0, '64270bc443147'),
('37', 'dap an 1', 1, 1, '64278054489a0'),
('38', '2', 2, 0, '64278054489a0'),
('39', '3', 1, 1, '642780544b0d8'),
('4', 'op2', 2, 0, '641d3b31ec29b'),
('40', '', 1, 0, '64278fca0d725'),
('41', '', 1, 0, '642791c98e31d'),
('5', '1', 1, 1, '641d3b731ac98'),
('6', '2', 1, 0, '641d3b731b9c9'),
('7', '1', 2, 1, '641d3b731b9c9'),
('8', 'trl1', 1, 1, '641d42e8c51d8'),
('9', 'tr2', 2, 0, '641d42e8c51d8');

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `Question_id` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `Quiz_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`Question_id`, `question`, `score`, `type`, `Quiz_id`) VALUES
('641c5644b9680', '1', 0, 1, '641c5644b7a2d'),
('641c5644b9681', 'hihiu', 1, 1, '641c5644b7a2d'),
('641c59df11f3b', 'i', 0, 1, '641c59df10c30'),
('641d3b11cc354', '2', 0, 1, '641d3b11c8543'),
('641d3b31ec29b', 'qs name', 0, 1, '641d3b31eba0a'),
('641d3b731ac98', 'q1', 0, 1, '641d3b7319a99'),
('641d3b731b9c9', 'q2', 0, 1, '641d3b7319a99'),
('641d42e8c51d8', 'cau hoi 1', 0, 1, '641d42e8c4915'),
('641d42e8c6675', 'cau hoi 2', 0, 1, '641d42e8c4915'),
('641d42e8c8b0f', 'cau hoi 3', 0, 1, '641d42e8c4915'),
('641fa44da52be', '0', 0, 1, '641fa44da402f'),
('641fa44da7dd5', '0', 0, 1, '641fa44da402f'),
('6426fb2204897', 'cau 1', 0, 1, '6426fb2203abc'),
('6426fb2206c9d', 'cau 2', 0, 1, '6426fb2203abc'),
('6426fdc5dbba3', 'cau 1', 0, 1, '6426fdc5daf54'),
('6426fdc5e0012', 'cau 2', 0, 1, '6426fdc5daf54'),
('6426fe699b29e', 'The Anh ten gi', 1, 1, '6426fe699a2a3'),
('6426fe699e246', '1', 0, 1, '6426fe699a2a3'),
('6426feb3ed8b0', '1', 1, 1, '6426feb3ece22'),
('6426feb3f0412', '12', 2, 1, '6426feb3ece22'),
('64270bc443147', 'The Anh ten gi', 10, 1, '64270bc4424c0'),
('64278054489a0', 'cau 1', 2, 1, '6427805447e18'),
('642780544b0d8', 'cau 2', 3, 1, '6427805447e18'),
('6427846356989', 'hi', 0, 2, '6427846355cae'),
('64278fca0d725', 'input', 0, 2, '64278fca0cbae'),
('642791c98e31d', 'eeee', 0, 2, '642791c98d6d1');

-- --------------------------------------------------------

--
-- Table structure for table `Quiz`
--

CREATE TABLE `Quiz` (
  `Quiz_id` varchar(100) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `examDate` datetime DEFAULT NULL,
  `dueDate` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `isPublic` tinyint(1) NOT NULL DEFAULT 1,
  `quizNum` int(11) NOT NULL,
  `author_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Quiz`
--

INSERT INTO `Quiz` (`Quiz_id`, `title`, `examDate`, `dueDate`, `duration`, `level`, `isPublic`, `quizNum`, `author_id`) VALUES
('641c5644b7a2d', '1', '2023-03-23 14:38:12', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641c59df10c30', 'hi', '2023-03-23 14:53:35', '2023-03-24 20:53:00', NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d36d3ef5b9', '1', '2023-03-24 06:36:19', NULL, 1, 0, 1, 1, 'theanh2413@gmail.com'),
('641d37c4f178f', 'title', '2023-03-24 06:40:20', NULL, 1, 0, 1, 1, 'theanh2413@gmail.com'),
('641d392bc6fd2', '2', '2023-03-24 06:46:19', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d398063437', '2', '2023-03-24 06:47:44', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d398fed03e', '2', '2023-03-24 06:47:59', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d39b6e7f8f', '2', '2023-03-24 06:48:38', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d39ca90958', '2', '2023-03-24 06:48:58', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d39db33d36', '2', '2023-03-24 06:49:15', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d3a018c5cb', '2', '2023-03-24 06:49:53', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d3a3b0531b', '2', '2023-03-24 06:50:51', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d3b11c8543', '2', '2023-03-24 06:54:25', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d3b31eba0a', 'title1', '2023-03-24 06:54:57', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('641d3b7319a99', 'hih', '2023-03-24 06:56:03', NULL, NULL, 0, 1, 2, 'theanh2413@gmail.com'),
('641d42e8c4915', 'bai thi 1', '2023-03-24 07:27:52', NULL, NULL, 0, 1, 3, 'theanh2413@gmail.com'),
('641fa44da402f', '000', '2023-03-26 03:47:57', NULL, NULL, 0, 1, 2, 'theanh2413@gmail.com'),
('6426fb2203abc', 'cau hoi', '2023-03-31 17:24:18', NULL, NULL, 10, 1, 2, 'theanh2413@gmail.com'),
('6426fdc5daf54', 'cau hoi', '2023-03-31 17:35:33', NULL, NULL, 0, 1, 2, 'theanh2413@gmail.com'),
('6426fe699a2a3', 'hi', '2023-03-31 17:38:17', NULL, NULL, 0, 1, 2, 'theanh2413@gmail.com'),
('6426feb3ece22', 'cau hoiii', '2023-03-31 17:39:31', NULL, NULL, 0, 1, 2, 'theanh2413@gmail.com'),
('64270bc4424c0', 'cau 1', '2023-03-31 18:35:16', NULL, 10, 0, 1, 1, 'theanh2413@gmail.com'),
('6427805447e18', 'hihi', '2023-04-01 02:52:36', NULL, 5, 0, 1, 2, 'theanh2413@gmail.com'),
('6427846355cae', 'hi', '2023-04-01 03:09:55', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('64278fca0cbae', 'text', '2023-04-01 03:58:34', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com'),
('642791c98d6d1', 'txt', '2023-04-01 04:07:05', NULL, NULL, 0, 1, 1, 'theanh2413@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Report`
--

CREATE TABLE `Report` (
  `User_id` varchar(100) NOT NULL,
  `Quiz_id` varchar(100) NOT NULL,
  `reportedAt` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `desscription` text NOT NULL,
  `proofFilePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Response`
--

CREATE TABLE `Response` (
  `Response_id` varchar(100) NOT NULL,
  `Quiz_id` varchar(100) NOT NULL,
  `User_id` varchar(100) NOT NULL,
  `totalScore` int(11) NOT NULL,
  `inTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Response`
--

INSERT INTO `Response` (`Response_id`, `Quiz_id`, `User_id`, `totalScore`, `inTime`) VALUES
('0', '641fa44da402f', 'theanh2413@gmail.com', 0, 0),
('1', '641c5644b7a2d', 'theanh2413@gmail.com', 0, 0),
('10', '641c5644b7a2d', 'theanh2413@gmail.com', 0, 0),
('11', '641c5644b7a2d', 'theanh2413@gmail.com', 0, 0),
('12', '641c5644b7a2d', 'theanh2413@gmail.com', 0, 0),
('13', '641c5644b7a2d', 'theanh2413@gmail.com', 0, 0),
('14', '641c5644b7a2d', 'theanh2413@gmail.com', 0, 0),
('15', '641c5644b7a2d', 'theanh2413@gmail.com', 0, 0),
('16', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 0),
('17', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 0),
('18', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 0),
('19', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 0),
('2', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 0),
('20', '641c5644b7a2d', 'theanh2413@gmail.com', 0, 0),
('21', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 8),
('22', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 7),
('23', '6426fb2203abc', 'theanh2413@gmail.com', 0, 22),
('24', '6426fb2203abc', 'theanh2413@gmail.com', 0, 5),
('25', '6426fb2203abc', 'theanh2413@gmail.com', 0, 6),
('26', '6426feb3ece22', 'theanh2413@gmail.com', 3, 0),
('27', '6426feb3ece22', 'theanh2413@gmail.com', 3, 164),
('28', '64270bc4424c0', 'theanh2413@gmail.com', 10, 163),
('29', '64270bc4424c0', 'theanh2413@gmail.com', 0, 6),
('3', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 0),
('30', '6427805447e18', 'theanh2413@gmail.com', 3, 55),
('31', '64278fca0cbae', 'theanh2413@gmail.com', 0, 51),
('32', '64278fca0cbae', 'theanh2413@gmail.com', 0, 0),
('33', '64278fca0cbae', 'theanh2413@gmail.com', 0, 0),
('34', '64278fca0cbae', 'theanh2413@gmail.com', 0, 0),
('35', '64278fca0cbae', 'theanh2413@gmail.com', 0, 0),
('36', '64278fca0cbae', 'theanh2413@gmail.com', 0, 0),
('37', '64278fca0cbae', 'theanh2413@gmail.com', 0, 0),
('38', '64278fca0cbae', 'theanh2413@gmail.com', 0, 0),
('39', '64278fca0cbae', 'theanh2413@gmail.com', 0, 0),
('4', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 0),
('40', '64278fca0cbae', 'theanh2413@gmail.com', 0, 0),
('41', '642791c98d6d1', 'theanh2413@gmail.com', 0, 485),
('42', '642791c98d6d1', 'theanh2413@gmail.com', 0, 0),
('43', '642791c98d6d1', 'theanh2413@gmail.com', 0, 0),
('44', '642791c98d6d1', 'theanh2413@gmail.com', 0, 0),
('45', '642791c98d6d1', 'theanh2413@gmail.com', 0, 0),
('46', '642791c98d6d1', 'theanh2413@gmail.com', 0, 0),
('47', '642791c98d6d1', 'theanh2413@gmail.com', 0, 0),
('48', '642791c98d6d1', 'theanh2413@gmail.com', 0, 7),
('5', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 0),
('6', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 0),
('7', '641d3b31eba0a', 'theanh2413@gmail.com', 0, 0),
('8', '641c5644b7a2d', 'theanh2413@gmail.com', 0, 0),
('9', '641c5644b7a2d', 'theanh2413@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ResponseDetails`
--

CREATE TABLE `ResponseDetails` (
  `id` varchar(100) NOT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `Response_id` varchar(100) NOT NULL,
  `Question_id` varchar(100) NOT NULL,
  `Option_id` varchar(100) NOT NULL,
  `isCorrect` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ResponseDetails`
--

INSERT INTO `ResponseDetails` (`id`, `text`, `Response_id`, `Question_id`, `Option_id`, `isCorrect`) VALUES
('0', NULL, '0', '641fa44da52be', '15', 0),
('1', NULL, '0', '641fa44da7dd5', '17', 0),
('10', NULL, '9', '641c5644b9680', '0', 1),
('11', NULL, '10', '641c5644b9680', '0', 1),
('12', NULL, '11', '641c5644b9680', '0', 1),
('13', NULL, '12', '641c5644b9680', '0', 1),
('14', NULL, '13', '641c5644b9680', '0', 1),
('15', NULL, '14', '641c5644b9680', '0', 1),
('16', NULL, '15', '641c5644b9680', '0', 1),
('17', NULL, '16', '641d3b31ec29b', '4', 0),
('18', NULL, '17', '641d3b31ec29b', '4', 0),
('19', NULL, '18', '641d3b31ec29b', '4', 0),
('2', NULL, '1', '641c5644b9680', '0', 1),
('20', NULL, '19', '641d3b31ec29b', '4', 0),
('21', NULL, '20', '641c5644b9680', '0', 1),
('22', NULL, '21', '641d3b31ec29b', '3', 1),
('23', NULL, '22', '641d3b31ec29b', '4', 0),
('24', NULL, '23', '6426fb2204897', '20', 0),
('25', NULL, '23', '6426fb2206c9d', '22', 1),
('26', NULL, '24', '6426fb2204897', '19', 1),
('27', NULL, '24', '6426fb2206c9d', '22', 1),
('28', NULL, '25', '6426fb2204897', '20', 0),
('29', NULL, '25', '6426fb2206c9d', '22', 1),
('3', NULL, '2', '641d3b31ec29b', '3', 1),
('30', NULL, '26', '6426feb3ed8b0', '31', 1),
('31', NULL, '26', '6426feb3f0412', '33', 1),
('32', NULL, '27', '6426feb3ed8b0', '31', 1),
('33', NULL, '27', '6426feb3f0412', '33', 1),
('34', NULL, '28', '64270bc443147', '35', 1),
('35', NULL, '29', '64270bc443147', '36', 0),
('36', NULL, '30', '64278054489a0', '38', 0),
('37', NULL, '30', '642780544b0d8', '39', 1),
('38', 'hi', '47', '642791c98e31d', '41', 1),
('39', 'hi', '48', '642791c98e31d', '41', 1),
('4', NULL, '3', '641d3b31ec29b', '3', 1),
('5', NULL, '4', '641d3b31ec29b', '4', 0),
('6', NULL, '5', '641d3b31ec29b', '4', 0),
('7', NULL, '6', '641d3b31ec29b', '3', 1),
('8', NULL, '7', '641d3b31ec29b', '3', 1),
('9', NULL, '8', '641c5644b9680', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `DoB` date NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_id`, `username`, `DoB`, `password`) VALUES
('theanh2413@gmail.com', 'Thế Anh', '2003-01-24', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ManageQuiz`
--
ALTER TABLE `ManageQuiz`
  ADD PRIMARY KEY (`admin_id`,`Quiz_id`);

--
-- Indexes for table `ManageUser`
--
ALTER TABLE `ManageUser`
  ADD PRIMARY KEY (`User_id`,`admin_id`);

--
-- Indexes for table `Option`
--
ALTER TABLE `Option`
  ADD PRIMARY KEY (`Option_id`),
  ADD KEY `Question_id` (`Question_id`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`Question_id`),
  ADD KEY `Quiz_id` (`Quiz_id`);

--
-- Indexes for table `Quiz`
--
ALTER TABLE `Quiz`
  ADD PRIMARY KEY (`Quiz_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`User_id`,`Quiz_id`);

--
-- Indexes for table `Response`
--
ALTER TABLE `Response`
  ADD PRIMARY KEY (`Response_id`),
  ADD KEY `Quiz_id` (`Quiz_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `ResponseDetails`
--
ALTER TABLE `ResponseDetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Response_id` (`Response_id`),
  ADD KEY `Question_id` (`Question_id`),
  ADD KEY `Option_id` (`Option_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Option`
--
ALTER TABLE `Option`
  ADD CONSTRAINT `Option_ibfk_1` FOREIGN KEY (`Question_id`) REFERENCES `Question` (`Question_id`);

--
-- Constraints for table `Question`
--
ALTER TABLE `Question`
  ADD CONSTRAINT `Question_ibfk_1` FOREIGN KEY (`Quiz_id`) REFERENCES `Quiz` (`Quiz_id`);

--
-- Constraints for table `Quiz`
--
ALTER TABLE `Quiz`
  ADD CONSTRAINT `Quiz_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `User` (`User_id`);

--
-- Constraints for table `Response`
--
ALTER TABLE `Response`
  ADD CONSTRAINT `Response_ibfk_1` FOREIGN KEY (`Quiz_id`) REFERENCES `Quiz` (`Quiz_id`),
  ADD CONSTRAINT `Response_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `User` (`User_id`);

--
-- Constraints for table `ResponseDetails`
--
ALTER TABLE `ResponseDetails`
  ADD CONSTRAINT `ResponseDetails_ibfk_1` FOREIGN KEY (`Response_id`) REFERENCES `Response` (`Response_id`),
  ADD CONSTRAINT `ResponseDetails_ibfk_2` FOREIGN KEY (`Question_id`) REFERENCES `Question` (`Question_id`),
  ADD CONSTRAINT `ResponseDetails_ibfk_3` FOREIGN KEY (`Option_id`) REFERENCES `Option` (`Option_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
