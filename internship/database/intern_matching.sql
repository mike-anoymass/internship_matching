-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2022 at 08:11 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern_matching`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
CREATE TABLE IF NOT EXISTS `applicants` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `program` varchar(50) NOT NULL,
  `graduation_year` int(5) NOT NULL,
  `phone` int(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `cv` text,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT 'not working',
  `picture` text,
  `field` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `field_applicant` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `firstname`, `lastname`, `gender`, `program`, `graduation_year`, `phone`, `email`, `about`, `cv`, `date`, `status`, `picture`, `field`) VALUES
(21, 'davies', 'mhango', 'Male', 'Management Information Systems', 2014, 883844848, 'davies@gmail.com', ' I am an experinced front end developer and Im proficient with ReaxtJs, VueJs and Angular.', '11092022054036data dictionary.pdf', '2022-09-11 07:40:37', 'not working', 'img.jpg', 'Information technology'),
(22, 'Ireen', 'magombo', 'Male', 'Civil Engineering', 2020, 884485858, 'ireen@gmail.com', ' im an engineer', '16092022091825data dictionary.pdf', '2022-09-16 11:18:25', 'not working', NULL, 'Information technology'),
(23, 'stella Claire', 'banda', 'Female', 'Business Communication', 2022, 993949494, 'stella@gmail.com', 'i am an experience entreprenuer with atleast 3 years in this field ', '16092022104359REASEARCH PROPOSAL BRITNEY LUNDUKA BIS-17-SS-019.pdf', '2022-09-16 12:43:59', 'not working', NULL, 'Information technology');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vacancy` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_to_student` (`student`),
  KEY `app_to_vacancy` (`vacancy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `location` text NOT NULL,
  `application` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_to_attachment` (`application`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

DROP TABLE IF EXISTS `employer`;
CREATE TABLE IF NOT EXISTS `employer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `postal_address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(14) NOT NULL,
  `profile` text,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `name`, `owner`, `postal_address`, `email`, `phone`, `profile`, `date`) VALUES
(10, 'software labs malawi', 'mike mhango', 'kawale, lilongwe, malawi ', 'admin@admin.com', 993949494, 'we are the best coders ', '2022-09-09 10:06:26'),
(11, 'thundu contractors', 'lameck kondesi', 'lilongwe malawi , six miles ', 'lameck@gmail.com', 88499494, 'we build ', '2022-09-09 10:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

DROP TABLE IF EXISTS `field`;
CREATE TABLE IF NOT EXISTS `field` (
  `name` varchar(150) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`name`, `date`) VALUES
('Information technology', '2022-09-10 19:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

DROP TABLE IF EXISTS `interviews`;
CREATE TABLE IF NOT EXISTS `interviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application` int(11) NOT NULL,
  `dateOfInterview` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `interviiew_to_app` (`application`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

DROP TABLE IF EXISTS `resume`;
CREATE TABLE IF NOT EXISTS `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application` int(11) NOT NULL,
  `skills` text NOT NULL,
  `qualifications` text NOT NULL,
  `certifications` text NOT NULL,
  `referees` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cv_to_app` (`application`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`) VALUES
(10, 'admin@admin.com', '1234', 'Company'),
(11, 'lameck@gmail.com', '1234', 'Company'),
(21, 'davies@gmail.com', '1234', 'Applicant'),
(22, 'ireen@gmail.com', '1234', 'Applicant'),
(23, 'stella@gmail.com', '1234', 'Applicant');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

DROP TABLE IF EXISTS `vacancies`;
CREATE TABLE IF NOT EXISTS `vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employer` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `field` varchar(150) NOT NULL,
  `type` varchar(30) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `duties` text NOT NULL,
  `skills` text NOT NULL,
  `qualifications` text NOT NULL,
  `salary` int(10) DEFAULT NULL,
  `other_info` text,
  `due_date` date NOT NULL,
  `date` year(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vacancy_to_employer` (`employer`),
  KEY `vacancy_field` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `field_applicant` FOREIGN KEY (`field`) REFERENCES `field` (`name`),
  ADD CONSTRAINT `student_to_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `app_to_vacancy` FOREIGN KEY (`vacancy`) REFERENCES `vacancies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_to_student` FOREIGN KEY (`student`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `application_to_attachment` FOREIGN KEY (`application`) REFERENCES `applications` (`id`);

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `employer_to_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviiew_to_app` FOREIGN KEY (`application`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `cv_to_app` FOREIGN KEY (`application`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD CONSTRAINT `vacancy_field` FOREIGN KEY (`field`) REFERENCES `field` (`name`),
  ADD CONSTRAINT `vacancy_to_employer` FOREIGN KEY (`employer`) REFERENCES `employer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;