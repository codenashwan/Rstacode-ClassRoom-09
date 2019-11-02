-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2019 at 10:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suliresult`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `ready` int(11) NOT NULL,
  `dgree` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `scheduled_in` varchar(255) NOT NULL,
  `scheduled_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `teacher_id`, `class_id`, `userid`, `subject`, `ready`, `dgree`, `date`, `scheduled_in`, `scheduled_out`) VALUES
(1, 1, 5, '1', 'Mango db', 0, 5, '19-10-2019', '12:00:00 am	', '01:00:00 pm	'),
(2, 0, 0, '1', 'ASP.NET', 1, 5, '19-10-2019', '12:00:00 am	', '01:00:00 pm	'),
(3, 0, 0, '1', 'C.GRAPHIC', 0, 5, '19-10-2019', '12:00:00 am	', '01:00:00 pm	');

-- --------------------------------------------------------

--
-- Table structure for table `answer_reports`
--

CREATE TABLE `answer_reports` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `report_id` int(11) NOT NULL,
  `seen` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer_reports`
--

INSERT INTO `answer_reports` (`id`, `userid`, `answer`, `report_id`, `seen`, `is_deleted`) VALUES
(2, '1', 'slaw la tosh', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `num_students` varchar(255) NOT NULL,
  `descGallery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `teacher_id`, `code`, `subject`, `stage`, `num_students`, `descGallery`) VALUES
(2, 2, '5684', 'Computer Graphic', '3', '5', 'name7.jpg'),
(3, 3, '4444', 'OOP', '2', '17', 'name2.jpg'),
(4, 4, '0880', 'DBMS', '3', '15', 'name4.jpg'),
(5, 1, '4532', 'Mango db', '3', '24', 'name4.jpg'),
(6, 2, '3020', 'Method Of Teaching', '3', '13', 'name3.jpg'),
(15, 1, '7845', 'Ajax', '3', '0', 'name1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `join_class`
--

CREATE TABLE `join_class` (
  `join_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `code_class` varchar(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `join_class`
--

INSERT INTO `join_class` (`join_id`, `userid`, `classid`, `code_class`, `date`) VALUES
(21, 1, 4, '0880', '2019-10-28 18:05:35'),
(23, 1, 2, '5684', '2019-10-28 18:09:17'),
(28, 1, 5, '4532', '2019-10-29 19:04:46'),
(29, 1, 6, '3020', '2019-10-29 21:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `type_post` varchar(255) NOT NULL,
  `file_url` varchar(2555) NOT NULL,
  `date_of_post` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `teacher_id`, `class_id`, `description`, `type_post`, `file_url`, `date_of_post`) VALUES
(12, 1, 5, 'The Students Are Learned HTML (Hyper Text Markup Language)', '', '', '2019-Nov-Sat 09:55 AM');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `userid`, `comment`) VALUES
(4, '1', 'slaw choni bashit ');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `viewpassword` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `password`, `viewpassword`, `username`, `fullname`, `department`, `college`, `stage`, `class`) VALUES
(1, 'nashwan@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', '1234', 'Nashwan', 'nashwan abdullah mahammad', 'Computer', 'Basic Education', '3', 'A'),
(2, 'sana@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', '1234', 'Sana Mstafa', 'Sana Mstafa omar', 'Computer', 'Basic Education', '3', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `sum_absences`
--

CREATE TABLE `sum_absences` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sum_absences`
--

INSERT INTO `sum_absences` (`id`, `userid`, `sum`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `social_type` varchar(255) NOT NULL,
  `social_link` varchar(255) NOT NULL,
  `social_type2` varchar(255) NOT NULL,
  `social_link2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `level`, `profile_img`, `social_type`, `social_link`, `social_type2`, `social_link2`) VALUES
(1, 'Wria Mhamad', 'Wria@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 'Assistant Lecturer', 'user1.jpg', 'fa fa-facebook', 'url', 'fa fa-instagram ', 'url'),
(2, 'Nashwan Abdullah', 'nashwan@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 'Head of Department', 'user2.jpg', '', '', '', ''),
(3, 'Karwan Mstafa', 'karwan@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 'Assistant Lecturer', 'user3.jpg', '', '', '', ''),
(4, 'Payman Othman', 'payman@gmail.com', '8a19de2e756035a3ece48cd01260b89ec36a510d9e18066e64ffc4d379c6e457', 'Assistant Lecturer', 'user4.jpg', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_reports`
--
ALTER TABLE `answer_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_class`
--
ALTER TABLE `join_class`
  ADD PRIMARY KEY (`join_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sum_absences`
--
ALTER TABLE `sum_absences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `answer_reports`
--
ALTER TABLE `answer_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `join_class`
--
ALTER TABLE `join_class`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sum_absences`
--
ALTER TABLE `sum_absences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
