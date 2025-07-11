-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 06:47 AM
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
-- Database: `trainer`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) DEFAULT 'trainer',
  `full_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `Language` text DEFAULT NULL,
  `certifications` text DEFAULT NULL,
  `availability` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `email`, `password`, `role`, `full_name`, `phone_number`, `Language`, `certifications`, `availability`) VALUES
(1, 'supriyarajumore@gmail.com', 'pass123', 'trainer', 'Sneha Patil', '9876543210', 'HTML, CSS, Python, Soft Skills', 'Certified Web Trainer, NLP Coach', 'Monday - Friday'),
(2, 'harshpatel2@email.com', 'pass123', 'trainer', 'Harsh Patel', '9163258329', 'Artificial Intelligence', 'Certified Artificial Intelligence Trainer', 'Monday - Friday'),
(3, 'ankitanair3@email.com', 'pass123', 'trainer', 'Ankita Nair', '9776194548', 'React, Node.js', 'Certified React Trainer', 'Monday - Friday'),
(4, 'ajaynair4@email.com', 'pass123', 'trainer', 'Ajay Nair', '9763846316', 'iOS Development, Swift', 'Certified iOS Development Trainer', 'Monday - Friday'),
(5, 'swativerma5@email.com', 'pass123', 'trainer', 'Swati Verma', '9981906670', 'DBMS, Operating Systems', 'Certified DBMS Trainer', 'Monday - Friday'),
(6, 'nikhilkulkarni6@email.com', 'pass123', 'trainer', 'Nikhil Kulkarni', '9695101893', 'AWS, Cloud Computing', 'Certified AWS Trainer', 'Monday - Friday'),
(7, 'tanvimehta7@email.com', 'pass123', 'trainer', 'Tanvi Mehta', '9777008452', 'React, Node.js', 'Certified React Trainer', 'Monday - Friday'),
(8, 'rahuljoshi8@email.com', 'pass123', 'trainer', 'Rahul Joshi', '9454100116', 'C, C++', 'Certified C Trainer', 'Monday - Friday'),
(9, 'divyamehta9@email.com', 'pass123', 'trainer', 'Divya Mehta', '9223405603', 'Machine Learning, Python', 'Certified Machine Learning Trainer', 'Monday - Friday'),
(10, 'poojakulkarni10@email.com', 'pass123', 'trainer', 'Pooja Kulkarni', '9971716289', 'SQL, PL/SQL', 'Certified SQL Trainer', 'Monday - Friday'),
(11, 'siddharthpatel11@email.com', 'pass123', 'trainer', 'Siddharth Patel', '9786543120', 'Angular, TypeScript', 'Certified Angular Trainer', 'Monday - Friday'),
(12, 'nainaverma12@email.com', 'pass123', 'trainer', 'Naina Verma', '9912834567', 'Public Speaking, Interview Skills', 'Certified Communication Coach', 'Monday - Friday'),
(13, 'amitnair13@email.com', 'pass123', 'trainer', 'Amit Nair', '9823451902', 'Computer Networks, Security', 'Certified Network Trainer', 'Monday - Friday'),
(14, 'nainakulkarni14@email.com', 'pass123', 'trainer', 'Naina Kulkarni', '9981235674', 'Flutter, Dart', 'Certified Flutter Developer', 'Monday - Friday'),
(15, 'poojajoshi15@email.com', 'pass123', 'trainer', 'Pooja Joshi', '9854723901', 'HTML, CSS, JavaScript', 'Certified Web Technologies Trainer', 'Monday - Friday'),
(16, 'karanjoshi16@email.com', 'pass123', 'trainer', 'Karan Joshi', '9798723401', 'DevOps, Docker', 'Certified DevOps Trainer', 'Monday - Friday'),
(17, 'manojnair17@email.com', 'pass123', 'trainer', 'Manoj Nair', '9801742839', 'Java, Spring Boot', 'Certified Java Trainer', 'Monday - Friday'),
(18, 'vishalkulkarni18@email.com', 'pass123', 'trainer', 'Vishal Kulkarni', '9901827364', 'PHP, MySQL', 'Certified PHP Trainer', 'Monday - Friday'),
(19, 'ritikapatel19@email.com', 'pass123', 'trainer', 'Ritika Patel', '9981273490', 'Python, Django', 'Certified Python Trainer', 'Monday - Friday'),
(20, 'ajaymehta20@email.com', 'pass123', 'trainer', 'Ajay Mehta', '9836213904', 'Soft Skills, Communication', 'Certified Soft Skills Trainer', 'Monday - Friday'),
(21, 'siddharthverma21@email.com', 'pass123', 'trainer', 'Siddharth Verma', '9871234561', 'C, C++', 'Certified C++ Instructor', 'Monday - Friday'),
(22, 'neharane22@email.com', 'pass123', 'trainer', 'Neha Rane', '9892345670', 'Machine Learning, Python', 'Certified ML Developer', 'Monday - Friday'),
(23, 'vivekjoshi23@email.com', 'pass123', 'trainer', 'Vivek Joshi', '9812453678', 'Flutter, Dart', 'Certified Flutter Trainer', 'Monday - Friday'),
(24, 'poojapatel24@email.com', 'pass123', 'trainer', 'Pooja Patel', '9823456721', 'PHP, MySQL', 'Certified Web Stack Trainer', 'Monday - Friday'),
(25, 'tanvijoshi25@email.com', 'pass123', 'trainer', 'Tanvi Joshi', '9867564320', 'Data Structures, Algorithms', 'Certified DSA Expert', 'Monday - Friday'),
(26, 'karanmehta26@email.com', 'pass123', 'trainer', 'Karan Mehta', '9812938475', 'Computer Networks, Security', 'Certified Network Security Trainer', 'Monday - Friday'),
(27, 'divyapatel27@email.com', 'pass123', 'trainer', 'Divya Patel', '9845627390', 'HTML, CSS, JavaScript, Python', 'Certified Frontend Developer', 'Monday - Friday'),
(29, 'manojverma29@email.com', 'pass123', 'trainer', 'Manoj Verma', '9845206743', 'Angular, TypeScript', 'Certified Angular Developer', 'Monday - Friday'),
(30, 'rajkumar30@email.com', 'pass123', 'trainer', 'Raj Kumar', '9819203045', 'Java, Spring Boot', 'Certified Java Enterprise Trainer', 'Monday - Friday'),
(32, 'latakoli@email.com', 'pass123', 'trainer', 'Lata Koli', '9871234551', 'C, C++,Pyhton,Java,PHP, MySQL', 'Certified Web Stack Trainer', 'Monday - Friday'),
(58, 'admin@email.com', 'admin', 'admin', 'Admin User', NULL, NULL, NULL, NULL),
(68, 'yash@email.com', 'yash', 'trainer', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainer_utilization`
--

CREATE TABLE `trainer_utilization` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer_utilization`
--

INSERT INTO `trainer_utilization` (`id`, `trainer_id`, `course`, `date`, `time`, `location`) VALUES
(1, 1, 'Soft Skills Training', '2025-07-06', '15:00:00', 'Online'),
(2, 1, 'SQL Essentials', '2025-07-27', '12:00:00', 'Online'),
(3, 1, 'JavaScript', '2025-08-27', '11:00:00', 'Room C3'),
(4, 1, 'Android Development', '2025-09-02', '10:00:00', 'Room A1'),
(5, 2, 'Data Structures', '2025-07-26', '13:00:00', 'Online'),
(6, 2, 'SQL Essentials', '2025-07-21', '12:00:00', 'Room D4'),
(7, 2, 'Java Fundamentals', '2025-08-28', '16:00:00', 'Room A1'),
(8, 2, 'TypeScript Basics', '2025-08-12', '17:00:00', 'Room D4'),
(9, 2, 'Soft Skills Training', '2025-09-27', '13:00:00', 'Room C3'),
(10, 3, 'Cloud Computing', '2025-07-29', '15:00:00', 'Lab 1'),
(11, 3, 'Cloud Computing', '2025-07-21', '17:00:00', 'Room A1'),
(12, 3, 'Advanced CSS', '2025-08-30', '11:00:00', 'Room C3'),
(13, 3, 'Public Speaking', '2025-08-04', '16:00:00', 'Room D4'),
(14, 3, 'Android Development', '2025-09-17', '15:00:00', 'Room A1'),
(15, 3, 'Machine Learning Intro', '2025-09-04', '14:00:00', 'Room B2'),
(16, 4, 'HTML Basics', '2025-07-01', '12:00:00', 'Room A1'),
(17, 4, 'iOS with Swift', '2025-08-29', '14:00:00', 'Online'),
(18, 4, 'Soft Skills Training', '2025-09-10', '09:00:00', 'Lab 1'),
(19, 5, 'Data Structures', '2025-07-01', '15:00:00', 'Lab 1'),
(20, 5, 'Android Development', '2025-08-21', '13:00:00', 'Room A1'),
(21, 5, 'AI Tools Demo', '2025-09-27', '17:00:00', 'Room B2'),
(22, 6, 'iOS with Swift', '2025-07-06', '10:00:00', 'Room A1'),
(23, 6, 'Flutter Workshop', '2025-07-02', '17:00:00', 'Room A1'),
(24, 6, 'HTML Basics', '2025-08-18', '17:00:00', 'Lab 1'),
(25, 6, 'Advanced CSS', '2025-09-26', '14:00:00', 'Room A1'),
(26, 6, 'SQL Essentials', '2025-09-06', '09:00:00', 'Room B2'),
(27, 7, 'DevOps Bootcamp', '2025-07-07', '14:00:00', 'Room D4'),
(28, 7, 'Cloud Computing', '2025-08-16', '10:00:00', 'Room A1'),
(29, 7, 'SQL Essentials', '2025-09-30', '14:00:00', 'Room A1'),
(30, 7, 'JavaScript', '2025-09-24', '09:00:00', 'Room D4'),
(31, 8, 'ReactJS', '2025-07-15', '10:00:00', 'Room C3'),
(32, 8, 'JavaScript', '2025-08-17', '12:00:00', 'Room B2'),
(33, 8, 'Data Structures', '2025-08-09', '14:00:00', 'Lab 1'),
(34, 8, 'SQL Essentials', '2025-09-18', '10:00:00', 'Room B2'),
(35, 8, 'Cloud Computing', '2025-09-04', '14:00:00', 'Lab 1'),
(36, 9, 'iOS with Swift', '2025-07-16', '17:00:00', 'Room D4'),
(37, 9, 'SQL Essentials', '2025-08-23', '15:00:00', 'Room A1'),
(38, 9, 'Python for Beginners', '2025-09-17', '09:00:00', 'Room C3'),
(39, 9, 'Soft Skills Training', '2025-09-23', '10:00:00', 'Room C3'),
(40, 10, 'iOS with Swift', '2025-07-25', '14:00:00', 'Lab 1'),
(41, 10, 'Docker & Kubernetes', '2025-07-12', '16:00:00', 'Room C3'),
(42, 10, 'ReactJS', '2025-08-10', '14:00:00', 'Room B2'),
(43, 10, 'TypeScript Basics', '2025-08-19', '17:00:00', 'Room D4'),
(44, 10, 'SQL Essentials', '2025-09-27', '14:00:00', 'Room A1'),
(45, 11, 'Machine Learning Intro', '2025-07-12', '13:00:00', 'Room C3'),
(46, 11, 'Android Development', '2025-07-17', '11:00:00', 'Room C3'),
(47, 11, 'AI Tools Demo', '2025-08-26', '16:00:00', 'Lab 1'),
(48, 11, 'Machine Learning Intro', '2025-09-24', '13:00:00', 'Lab 1'),
(49, 11, 'AI Tools Demo', '2025-09-08', '15:00:00', 'Online'),
(50, 12, 'Python for Beginners', '2025-07-21', '11:00:00', 'Room B2'),
(51, 12, 'Advanced CSS', '2025-07-05', '16:00:00', 'Room A1'),
(52, 12, 'Soft Skills Training', '2025-08-19', '13:00:00', 'Lab 1'),
(53, 12, 'ReactJS', '2025-08-05', '11:00:00', 'Room D4'),
(54, 12, 'Soft Skills Training', '2025-09-28', '15:00:00', 'Room B2'),
(55, 12, 'TypeScript Basics', '2025-09-06', '16:00:00', 'Room D4'),
(56, 13, 'Public Speaking', '2025-07-19', '13:00:00', 'Room A1'),
(57, 13, 'Cloud Computing', '2025-08-02', '09:00:00', 'Online'),
(58, 13, 'Cloud Computing', '2025-09-07', '17:00:00', 'Online'),
(59, 14, 'Machine Learning Intro', '2025-07-19', '16:00:00', 'Room D4'),
(60, 14, 'HTML Basics', '2025-07-12', '16:00:00', 'Lab 1'),
(61, 14, 'DevOps Bootcamp', '2025-08-12', '17:00:00', 'Room B2'),
(62, 14, 'TypeScript Basics', '2025-09-04', '16:00:00', 'Online'),
(63, 15, 'Java Fundamentals', '2025-07-10', '16:00:00', 'Online'),
(64, 15, 'DevOps Bootcamp', '2025-07-01', '14:00:00', 'Room D4'),
(65, 15, 'DevOps Bootcamp', '2025-08-24', '09:00:00', 'Room B2'),
(66, 15, 'Machine Learning Intro', '2025-08-14', '11:00:00', 'Room A1'),
(67, 15, 'AI Tools Demo', '2025-09-15', '16:00:00', 'Room D4'),
(68, 15, 'Cloud Computing', '2025-09-24', '16:00:00', 'Lab 1'),
(69, 16, 'Soft Skills Training', '2025-07-11', '10:00:00', 'Online'),
(70, 16, 'iOS with Swift', '2025-07-01', '16:00:00', 'Room C3'),
(71, 16, 'DevOps Bootcamp', '2025-08-29', '12:00:00', 'Room A1'),
(72, 16, 'JavaScript', '2025-08-02', '17:00:00', 'Room A1'),
(73, 16, 'iOS with Swift', '2025-09-23', '11:00:00', 'Room C3'),
(74, 16, 'Public Speaking', '2025-09-08', '12:00:00', 'Room B2'),
(75, 17, 'JavaScript', '2025-07-22', '15:00:00', 'Room B2'),
(76, 17, 'AI Tools Demo', '2025-08-16', '16:00:00', 'Room C3'),
(77, 17, 'JavaScript', '2025-09-15', '12:00:00', 'Online'),
(78, 18, 'DevOps Bootcamp', '2025-07-22', '15:00:00', 'Room D4'),
(79, 18, 'Docker & Kubernetes', '2025-08-25', '11:00:00', 'Room B2'),
(80, 18, 'AI Tools Demo', '2025-09-05', '10:00:00', 'Room B2'),
(81, 19, 'Cloud Computing', '2025-07-27', '15:00:00', 'Room B2'),
(82, 19, 'Data Structures', '2025-08-19', '16:00:00', 'Room D4'),
(83, 19, 'JavaScript', '2025-08-16', '10:00:00', 'Lab 1'),
(84, 19, 'Soft Skills Training', '2025-09-21', '17:00:00', 'Online'),
(85, 20, 'Android Development', '2025-07-07', '14:00:00', 'Lab 1'),
(86, 20, 'Java Fundamentals', '2025-07-22', '17:00:00', 'Room A1'),
(87, 20, 'Python for Beginners', '2025-08-25', '12:00:00', 'Room C3'),
(88, 20, 'iOS with Swift', '2025-08-18', '12:00:00', 'Online'),
(89, 20, 'Python for Beginners', '2025-09-17', '13:00:00', 'Online'),
(90, 21, 'Cloud Computing', '2025-07-09', '16:00:00', 'Room D4'),
(91, 20, 'DevOps Bootcamp', '2025-08-27', '11:00:00', 'Room D4'),
(92, 20, 'Flutter Workshop', '2025-09-22', '16:00:00', 'Lab 1'),
(93, 20, 'Data Structures', '2025-09-13', '17:00:00', 'Room A1'),
(94, 21, 'Flutter Workshop', '2025-07-21', '15:00:00', 'Room C3'),
(95, 21, 'Java Fundamentals', '2025-07-02', '09:00:00', 'Room B2'),
(96, 21, 'JavaScript', '2025-08-09', '12:00:00', 'Room C3'),
(97, 21, 'Python for Beginners', '2025-09-22', '17:00:00', 'Room C3'),
(98, 21, 'Advanced CSS', '2025-09-17', '17:00:00', 'Lab 1'),
(99, 22, 'Cloud Computing', '2025-07-11', '11:00:00', 'Online'),
(100, 22, 'Data Structures', '2025-08-19', '14:00:00', 'Room A1'),
(101, 22, 'Machine Learning Intro', '2025-09-27', '14:00:00', 'Lab 1'),
(102, 23, 'Machine Learning Intro', '2025-07-05', '16:00:00', 'Online'),
(103, 23, 'Advanced CSS', '2025-07-10', '16:00:00', 'Room D4'),
(104, 23, 'Cloud Computing', '2025-08-12', '13:00:00', 'Room D4'),
(105, 23, 'Docker & Kubernetes', '2025-09-02', '14:00:00', 'Room D4'),
(106, 24, 'Spring Boot', '2025-07-11', '09:00:00', 'Room C3'),
(107, 24, 'Spring Boot', '2025-08-09', '09:00:00', 'Room B2'),
(108, 24, 'iOS with Swift', '2025-08-07', '16:00:00', 'Online'),
(109, 24, 'JavaScript', '2025-09-01', '14:00:00', 'Lab 1'),
(110, 25, 'DevOps Bootcamp', '2025-07-12', '14:00:00', 'Online'),
(111, 32, 'Android Development', '2025-07-25', '13:00:00', 'Online'),
(112, 32, 'TypeScript Basics', '2025-08-17', '09:00:00', 'Room D4'),
(113, 32, 'AI Tools Demo', '2025-08-30', '10:00:00', 'Room A1'),
(114, 32, 'Machine Learning Intro', '2025-09-29', '13:00:00', 'Room D4'),
(115, 32, 'SQL Essentials', '2025-09-27', '17:00:00', 'Lab 1'),
(116, 26, 'Python for Beginners', '2025-07-24', '15:00:00', 'Room B2'),
(117, 26, 'Java Fundamentals', '2025-08-23', '13:00:00', 'Room B2'),
(118, 26, 'Advanced CSS', '2025-08-12', '16:00:00', 'Room C3'),
(119, 26, 'Android Development', '2025-09-30', '15:00:00', 'Room B2'),
(120, 26, 'ReactJS', '2025-09-14', '16:00:00', 'Lab 1'),
(121, 27, 'Spring Boot', '2025-07-16', '11:00:00', 'Room A1'),
(122, 27, 'SQL Essentials', '2025-08-29', '15:00:00', 'Room A1'),
(123, 27, 'Advanced CSS', '2025-09-04', '11:00:00', 'Room C3'),
(124, 27, 'ReactJS', '2025-09-05', '11:00:00', 'Room D4'),
(125, 28, 'Docker & Kubernetes', '2025-07-30', '10:00:00', 'Room D4'),
(126, 28, 'DevOps Bootcamp', '2025-08-05', '11:00:00', 'Lab 1'),
(127, 28, 'DevOps Bootcamp', '2025-08-12', '10:00:00', 'Online'),
(128, 28, 'HTML Basics', '2025-09-02', '10:00:00', 'Lab 1'),
(129, 28, 'ReactJS', '2025-09-12', '14:00:00', 'Room B2'),
(130, 29, 'Soft Skills Training', '2025-07-09', '09:00:00', 'Online'),
(131, 1, 'HTML', '2025-07-12', '12:00:00', 'Room 101'),
(132, 32, 'HTML', '2025-07-09', '22:20:00', 'Room 104'),
(133, 32, 'Soft Skill', '2025-07-10', '14:00:00', 'Online'),
(134, 1, 'Soft Skill', '2025-07-10', '17:17:00', 'Online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_utilization`
--
ALTER TABLE `trainer_utilization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `trainer_utilization`
--
ALTER TABLE `trainer_utilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
