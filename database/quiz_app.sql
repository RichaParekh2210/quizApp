-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2022 at 04:24 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `qus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `qus_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `option_detail`
--

CREATE TABLE `option_detail` (
  `option_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `right_option` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option_detail`
--

INSERT INTO `option_detail` (`option_id`, `value`, `right_option`) VALUES
(1, 'Narendra Modi', 1),
(1, 'Rahul Gandhi', 0),
(1, 'Manmohan Singh', 0),
(1, 'Amit Shah', 0),
(2, 'Mumbai', 0),
(2, 'Chennai', 0),
(2, 'Delhi', 1),
(2, 'Ahmedabad', 0),
(3, '5', 0),
(3, '25', 0),
(3, '40', 1),
(3, 'None', 0),
(4, '11', 0),
(4, '42', 1),
(4, '17', 0),
(4, 'None', 0),
(5, 'Hindi', 0),
(5, 'Gujarati', 1),
(5, 'Marathi', 0),
(5, 'None', 0),
(6, '124', 0),
(6, '12', 0),
(6, '24', 0),
(6, 'None', 1),
(7, 'UP', 1),
(7, 'Bihar', 0),
(7, 'Gujarat', 0),
(7, 'Maharashtra', 0),
(8, 'Amit Shah', 1),
(8, 'Rajnath Singh', 0),
(8, 'Narendra Modi', 0),
(8, 'None', 0),
(9, 'Vadodara', 0),
(9, 'Ahmedabad', 0),
(9, 'Gandhinagar', 1),
(9, 'Rajkot', 0),
(10, '21', 0),
(10, '36', 1),
(10, '49', 0),
(10, '32', 0),
(11, '0', 0),
(11, '11', 0),
(11, '-20', 1),
(11, 'None', 0),
(12, '37', 1),
(12, '25', 0),
(12, '10', 0),
(12, '12', 0),
(13, 'Hindi', 1),
(13, 'English', 0),
(13, 'Gujrati', 0),
(13, 'None', 0),
(14, 'India', 1),
(14, 'USA', 0),
(14, 'UK', 0),
(14, 'None', 0),
(15, 'Java', 0),
(15, 'Java & Kotlin', 1),
(15, 'Kotlin', 0),
(15, 'Swift', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `flip_qus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `flip_qus`) VALUES
(1, 'Who is the Prime Minister of India?', 0),
(2, 'What is the capital of India?', 0),
(3, 'What is the sum of 15 + 25 ?', 0),
(4, 'Which one is maximum? 25, 11, 17, 18, 40, 42', 0),
(5, 'What is the official language of Gujarat?', 0),
(6, 'What is multiplication of 12 * 12 ?', 0),
(7, 'Which state of India has the largest population?', 0),
(8, 'Who is the Home Minister of India?', 0),
(9, 'What is the capital of Gujarat?', 0),
(10, 'Which number will be next in series? 1, 4, 9, 16, 25', 0),
(11, 'Which one is the minimum? 5, 0, -20, 11', 1),
(12, 'What is the sum of 10, 12 and 15?', 1),
(13, 'What is a official language of the Government of India?', 0),
(14, 'Which country located in Asia?', 1),
(15, 'Which language(s) is/are used for Android app development?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `attempt_qus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `score`, `attempt_qus`) VALUES
(1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

