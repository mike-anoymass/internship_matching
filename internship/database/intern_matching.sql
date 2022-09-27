-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2022 at 11:11 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

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
(21, 'davies', 'mhango', 'Male', 'Management Information Systems', 2014, 883844848, 'davies@gmail.com', ' I am an experinced front end developer and Im proficient with ReaxtJs, VueJs and Angular.', '11092022054036data dictionary.pdf', '2022-09-11 07:40:37', 'not working', '23092022125437+265 884 79 92 03 20210507_043151.jpg', 'Information technology'),
(23, 'stella Claire', 'banda', 'Female', 'Business Communication', 2022, 993949494, 'stella@gmail.com', 'i am an experience entreprenuer with atleast 3 years in this field ', '16092022104359REASEARCH PROPOSAL BRITNEY LUNDUKA BIS-17-SS-019.pdf', '2022-09-16 12:43:59', 'not working', '23092022121221265881571588_status_fab14093610d45f98b4354880d5b0b03.jpg', 'Information technology'),
(56, 'Mirriam ', 'Mhango', 'Female', 'business communication', 2020, 983000041, 'mirrie@gmail.com', 'I am a hardworking young girl. Seeking to grow my career in this field ', '24092022105958meeting invite.pdf', '2022-09-24 12:59:58', 'not working', NULL, 'education'),
(60, 'mike', 'mhango', 'Male', 'ddkdk', 3373, 888119888, 'mikelibamba@gmail.com', 'ddkdkdk ', '24092022121047REASEARCH PROPOSAL BRITNEY LUNDUKA BIS-17-SS-019.pdf', '2022-09-24 14:10:47', 'not working', NULL, 'commerce'),
(61, 'Noel', 'Phiri', 'Male', 'mathematical sciences', 2021, 995599595, 'noel@gmail.com', 'I like statistics ', '26092022091526Web-Developer.pdf', '2022-09-26 11:15:26', 'not working', '260920221030123913+2659963520180623_030653.jpg', 'education');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vacancy` int(11) NOT NULL,
  `applicant` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL DEFAULT 'Pending',
  `cv` text NOT NULL,
  `date_responded` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `application_to_student` (`applicant`),
  KEY `app_to_vacancy` (`vacancy`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `vacancy`, `applicant`, `date`, `status`, `cv`, `date_responded`) VALUES
(3, 9, 23, '2012-12-20 00:00:00', 'Pending', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `document` text NOT NULL,
  `applicant` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `attachment_applicant` (`applicant`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `name`, `document`, `applicant`, `date`) VALUES
(8, 'Bachelors Degree', '26092022102021Degree_MikeMLibamba.pdf', 61, '2022-09-26 12:20:21'),
(9, 'Academic Transcript', '26092022102118AcademicTranscript_MikeMLibamba.pdf', 61, '2022-09-26 12:21:18'),
(10, 'MSCE Certificate', '26092022102142MSCECertificate_MikeMLibamba.pdf', 61, '2022-09-26 12:21:42');

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
(11, 'thundu contractors', 'lameck kondesi', 'lilongwe malawi , six miles ', 'lameck@gmail.com', 88499494, 'we build ', '2022-09-09 10:25:39'),
(55, 'NICO Technologies', 'nicholaus mphande', 'blantyre\r\nchichiri ', 'nico@nico.com', 885588858, 'we code for solutions ', '2022-09-24 11:53:42');

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
('commerce', '2022-09-24 11:56:16'),
('education', '2022-09-24 11:56:16'),
('engineering', '2022-09-19 09:44:56'),
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`) VALUES
(10, 'admin@admin.com', '1234', 'Company'),
(11, 'lameck@gmail.com', '1234', 'Company'),
(21, 'davies@gmail.com', '1234', 'Applicant'),
(23, 'stella@gmail.com', '1234', 'Applicant'),
(55, 'nico@nico.com', '1234', 'Company'),
(56, 'mirrie@gmail.com', '1234', 'Applicant'),
(60, 'mikelibamba@gmail.com', '123', 'Applicant'),
(61, 'noel@gmail.com', '1234', 'Applicant');

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
  `salary` int(11) DEFAULT '0',
  `other_info` text,
  `due_date` date NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'Open',
  `positions` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `vacancy_to_employer` (`employer`),
  KEY `vacancy_field` (`field`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `employer`, `title`, `field`, `type`, `location`, `description`, `duties`, `skills`, `qualifications`, `salary`, `other_info`, `due_date`, `date`, `status`, `positions`) VALUES
(5, 11, 'civil engineer', 'engineering', 'Full Time', 'lilongwe', 'to build houses and stores', 'build and measure', 'build', 'degree', 150000, 'none\r\n', '2012-12-12', '2022-09-19 09:58:44', 'Open', 0),
(7, 11, 'electric engineer', 'engineering', 'Full Time', 'lilongwe', 'check circuits', 'check cables \r\nand circuits', 'electronics', 'degree', 150000, '', '2012-12-12', '2022-09-19 11:20:11', 'Open', 0),
(8, 11, 'gredar driver', 'engineering', 'Full Time', 'lilongwe', 'to drive vehicles', 'to drive', 'vehicles', 'diploma', 100000, 'none', '2010-10-10', '2022-09-19 12:12:58', 'Closed', 0),
(9, 10, 'Java Developer ', 'Information technology', 'Full Time', 'lilongwe', 'to develop fast and secure java applications for both mobile and desktop', '- collect user requirements \r\n- analyze user requirements \r\n- design database and interfaces\r\n- implement systems in java ', '- JavaFx\r\n- MySql\r\n- Java Score\r\n- SQLite', 'Degree in computing', 200000, '', '2010-10-22', '2022-09-19 17:59:00', 'Open', 1),
(10, 10, 'Systems Analyst', 'Information technology', 'Full Time', 'BT', 'to analyse our tailored systems', 'to analyse systems', 'systems analysis', 'degree in IS', 200000, '', '2011-11-11', '2022-09-20 14:36:05', 'Open', 4),
(11, 11, 'field engineer', 'engineering', 'Full Time', 'lilongwe', 'to guide people', 'none', 'none', 'none', 0, 'none', '2012-12-12', '2022-09-21 11:01:49', 'Open', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `field_applicant` FOREIGN KEY (`field`) REFERENCES `field` (`name`),
  ADD CONSTRAINT `student_to_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `app_to_vacancy` FOREIGN KEY (`vacancy`) REFERENCES `vacancies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_to_student` FOREIGN KEY (`applicant`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachment_applicant` FOREIGN KEY (`applicant`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
