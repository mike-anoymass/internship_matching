-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2022 at 12:51 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(23, 'stella Claire', 'banda', 'Female', 'Business Communication', 2022, 993949494, 'stella@gmail.com', 'i am an experience entreprenuer with atleast 3 years in this field ', '16092022104359REASEARCH PROPOSAL BRITNEY LUNDUKA BIS-17-SS-019.pdf', '2022-09-16 12:43:59', 'not working', '27092022012637149071.png', 'engineering'),
(56, 'Mirriam ', 'Mhango', 'Female', 'business communication', 2020, 983000041, 'mirrie@gmail.com', 'I am a hardworking young girl. Seeking to grow my career in this field ', '24092022105958meeting invite.pdf', '2022-09-24 12:59:58', 'not working', NULL, 'education'),
(60, 'mike', 'mhango', 'Male', 'ddkdk', 3373, 888119888, 'mikelibamba@gmail.com', 'ddkdkdk ', '24092022121047REASEARCH PROPOSAL BRITNEY LUNDUKA BIS-17-SS-019.pdf', '2022-09-24 14:10:47', 'not working', NULL, 'commerce'),
(61, 'Noel', 'Phiri', 'Male', 'mathematical sciences', 2021, 995599595, 'noel@gmail.com', 'I like statistics ', '26092022091526Web-Developer.pdf', '2022-09-26 11:15:26', 'not working', '260920221030123913+2659963520180623_030653.jpg', 'education'),
(62, 'Dean', 'Magombo', 'Male', 'BSc in Computing', 2020, 884944949, 'deanmagombo@gmail.com', 'I am self motivated and passionate about my dreams ', '30092022115924meeting invite.pdf', '2022-09-30 13:59:24', 'not working', NULL, 'Information technology');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `vacancy`, `applicant`, `date`, `status`, `cv`, `date_responded`) VALUES
(9, 5, 61, '2022-09-27 21:37:32', 'Accepted', '27092022073732datadictionary.pdf', '2022-09-30 13:12:38'),
(10, 5, 23, '2022-09-27 23:01:05', 'Accepted', '27092022090105Web-Developer.pdf', '2022-09-30 13:15:25'),
(12, 9, 61, '2022-09-27 23:16:26', 'Accepted', '27092022091626meetinginvite.pdf', '2022-09-29 23:43:42'),
(13, 11, 23, '2022-09-29 09:50:29', 'Rejected', '29092022075029CVwaterboard.pdf', '2022-09-30 00:22:06'),
(14, 7, 56, '2022-09-30 13:21:41', 'Accepted', '30092022112141Web-Developer.pdf', '2022-09-30 13:22:23'),
(15, 9, 56, '2022-09-30 13:47:16', 'Accepted', '30092022114716meetinginvite.pdf', '2022-09-30 13:50:53'),
(16, 10, 56, '2022-09-30 13:54:04', 'Accepted', '30092022115404meetinginvite.pdf', '2022-09-30 13:55:29'),
(17, 9, 62, '2022-09-30 14:00:05', 'Accepted', '30092022120005Web-Developer.pdf', '2022-09-30 14:01:14'),
(19, 10, 62, '2022-09-30 14:07:47', 'Accepted', '30092022120747meetinginvite.pdf', '2022-09-30 14:08:43'),
(20, 7, 61, '2022-09-30 14:14:42', 'Accepted', '30092022121442Web-Developer.pdf', '2022-09-30 14:15:23'),
(21, 10, 21, '2022-09-30 14:38:33', 'Pending', '30092022123833meetinginvite.pdf', NULL),
(22, 9, 21, '2022-09-30 14:41:46', 'Pending', '30092022124146meetinginvite.pdf', NULL);

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
  KEY `attachment_applicant` (`applicant`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `name`, `document`, `applicant`, `date`) VALUES
(18, 'degree', '27092022073548Web-Developer.pdf', 61, '2022-09-27 21:35:48'),
(19, 'Academic Transcript', '29092022074802AcademicTranscript_MikeMLibamba.pdf', 23, '2022-09-29 09:48:02'),
(20, 'Bachelors Degree', '29092022074825Degree_MikeMLibamba.pdf', 23, '2022-09-29 09:48:25'),
(21, 'MSCE Certificate', '29092022074904MSCECertificate_MikeMLibamba.pdf', 23, '2022-09-29 09:49:04'),
(22, 'National ID', '29092022074920nationalID_MikeMLibamba.pdf', 23, '2022-09-29 09:49:20');

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
  `dateOfInterview` varchar(30) NOT NULL,
  `time` varchar(20) NOT NULL,
  `remark` text,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `interviiew_to_app` (`application`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `application`, `dateOfInterview`, `time`, `remark`, `date`) VALUES
(1, 12, '12/12/12', '12:12pm', 'location: lilongwe', '2022-09-29 23:33:36'),
(2, 12, '13/12/12', '2pm', 'location: BTZ', '2022-09-29 23:43:42'),
(3, 9, '121212', '12pm', 'kaya man', '2022-09-30 13:12:27'),
(4, 9, '121212', '12pm', 'kaya man', '2022-09-30 13:12:33'),
(5, 9, '121212', '12pm', 'kaya man', '2022-09-30 13:12:38'),
(6, 10, '14/12/2002', '1pm', 'location lilongwe', '2022-09-30 13:15:25'),
(7, 14, '25/10/2022', '4pm', 'nothing', '2022-09-30 13:22:23'),
(8, 15, '30/11/2022', '10am', 'Location of the interview is in Lilongwe Gemini House', '2022-09-30 13:48:37'),
(9, 15, '30/11/2022', '10am', 'Location of the interview is in Lilongwe Gemini House', '2022-09-30 13:50:53'),
(10, 16, '30/12/2022', '2pm', 'Location: Lilongwe, Area 47 offices', '2022-09-30 13:55:28'),
(11, 17, '12/11/2022', '1pm', 'Location: lilongwe, Area 47 offices', '2022-09-30 14:01:14'),
(13, 19, '12/11/2022', '1pm', 'Location: lilongwe, Area 47 offices', '2022-09-30 14:08:43'),
(14, 20, '12/11/2022', '1pm', 'kaya', '2022-09-30 14:15:23');

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

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
(61, 'noel@gmail.com', '1234', 'Applicant'),
(62, 'deanmagombo@gmail.com', '1234', 'Applicant');

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
  `due_date` varchar(30) NOT NULL,
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
(9, 10, 'Java Developer ', 'Information technology', 'Full Time', 'lilongwe', 'to develop fast and secure java applications for both mobile and desktop', '- collect user requirements \r\n- analyze user requirements \r\n- design database and interfaces\r\n- implement systems in java ', '- JavaFx\r\n- MySql\r\n- Java Score\r\n- SQLite', 'Degree in computing', 200000, '', '09/07/2022', '2022-09-19 17:59:00', 'Open', 1),
(10, 10, 'Systems Analyst', 'Information technology', 'Full Time', 'BT', 'to analyse our tailored systems', 'to analyse systems', 'systems analysis', 'degree in IS', 200000, '', '2011-11-11', '2022-09-20 14:36:05', 'Open', 4),
(11, 11, 'field engineer', 'engineering', 'Full Time', 'lilongwe', 'to guide people', 'none', 'none', 'none', 0, 'none', '2012-12-12', '2022-09-21 11:01:49', 'Closed', 2);

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
