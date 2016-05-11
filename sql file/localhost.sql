-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2016 at 09:02 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ucl_db`
--
CREATE DATABASE `ucl_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ucl_db`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `correct` char(1) NOT NULL DEFAULT 'N',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=171 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `answer`, `correct`, `created`) VALUES
(59, 21, 'True', 'N', '0000-00-00 00:00:00'),
(60, 21, 'False', 'Y', '0000-00-00 00:00:00'),
(61, 22, 'Commands', 'N', '0000-00-00 00:00:00'),
(62, 22, 'Documents', 'N', '0000-00-00 00:00:00'),
(63, 22, 'CPUs', 'N', '0000-00-00 00:00:00'),
(64, 22, 'Software', 'Y', '0000-00-00 00:00:00'),
(65, 23, 'True', 'Y', '0000-00-00 00:00:00'),
(66, 23, 'False', 'N', '0000-00-00 00:00:00'),
(67, 24, 'Program', 'N', '0000-00-00 00:00:00'),
(68, 24, 'Data', 'N', '0000-00-00 00:00:00'),
(69, 24, 'Information', 'Y', '0000-00-00 00:00:00'),
(70, 24, 'Software', 'N', '0000-00-00 00:00:00'),
(71, 25, 'True', 'Y', '0000-00-00 00:00:00'),
(72, 25, 'False', 'N', '0000-00-00 00:00:00'),
(73, 26, 'CISC', 'N', '0000-00-00 00:00:00'),
(74, 26, 'Software', 'N', '0000-00-00 00:00:00'),
(75, 26, 'Printer', 'N', '0000-00-00 00:00:00'),
(76, 26, 'RAM', 'Y', '0000-00-00 00:00:00'),
(77, 27, 'CISC', 'N', '0000-00-00 00:00:00'),
(78, 27, 'Software', 'N', '0000-00-00 00:00:00'),
(79, 27, 'Printer', 'N', '0000-00-00 00:00:00'),
(80, 27, 'RAM', 'Y', '0000-00-00 00:00:00'),
(81, 28, 'CISC', 'N', '0000-00-00 00:00:00'),
(82, 28, 'Software', 'N', '0000-00-00 00:00:00'),
(83, 28, 'Printer', 'N', '0000-00-00 00:00:00'),
(84, 28, 'RAM', 'Y', '0000-00-00 00:00:00'),
(85, 29, 'RAM', 'N', '0000-00-00 00:00:00'),
(86, 29, 'Storage device', 'Y', '0000-00-00 00:00:00'),
(87, 29, 'Input devices', 'N', '0000-00-00 00:00:00'),
(88, 29, 'Output devices', 'N', '0000-00-00 00:00:00'),
(89, 30, 'RAM', 'N', '0000-00-00 00:00:00'),
(90, 30, 'Storage device', 'Y', '0000-00-00 00:00:00'),
(91, 30, 'Input devices', 'N', '0000-00-00 00:00:00'),
(92, 30, 'Output devices', 'N', '0000-00-00 00:00:00'),
(93, 31, 'RAM', 'N', '0000-00-00 00:00:00'),
(94, 31, 'Storage device', 'Y', '0000-00-00 00:00:00'),
(95, 31, 'Input devices', 'N', '0000-00-00 00:00:00'),
(96, 31, 'Output devices', 'N', '0000-00-00 00:00:00'),
(97, 32, 'RAM', 'N', '0000-00-00 00:00:00'),
(98, 32, 'Storage device', 'Y', '0000-00-00 00:00:00'),
(99, 32, 'Input devices', 'N', '0000-00-00 00:00:00'),
(100, 32, 'Output devices', 'N', '0000-00-00 00:00:00'),
(101, 33, 'RAM', 'N', '0000-00-00 00:00:00'),
(102, 33, 'Storage device', 'Y', '0000-00-00 00:00:00'),
(103, 33, 'Input devices', 'N', '0000-00-00 00:00:00'),
(104, 33, 'Output devices', 'N', '0000-00-00 00:00:00'),
(105, 34, 'Windows 88', 'N', '0000-00-00 00:00:00'),
(106, 34, 'Linux', 'N', '0000-00-00 00:00:00'),
(107, 34, 'Power Point', 'N', '0000-00-00 00:00:00'),
(108, 34, 'Internet Explorer', 'Y', '0000-00-00 00:00:00'),
(109, 35, 'Windows 88', 'N', '0000-00-00 00:00:00'),
(110, 35, 'Linux', 'N', '0000-00-00 00:00:00'),
(111, 35, 'Power Point', 'N', '0000-00-00 00:00:00'),
(112, 35, 'Internet Explorer', 'Y', '0000-00-00 00:00:00'),
(113, 36, 'Peripherials', 'N', '0000-00-00 00:00:00'),
(114, 36, 'Hardware', 'Y', '0000-00-00 00:00:00'),
(115, 36, 'Equipment', 'N', '0000-00-00 00:00:00'),
(116, 36, 'Information tools', 'N', '0000-00-00 00:00:00'),
(117, 37, 'Peripherials', 'N', '0000-00-00 00:00:00'),
(118, 37, 'Hardware', 'Y', '0000-00-00 00:00:00'),
(119, 37, 'Equipment', 'N', '0000-00-00 00:00:00'),
(120, 37, 'Information tools', 'N', '0000-00-00 00:00:00'),
(121, 38, 'Peripherials', 'N', '0000-00-00 00:00:00'),
(122, 38, 'Hardware', 'Y', '0000-00-00 00:00:00'),
(123, 38, 'Equipment', 'N', '0000-00-00 00:00:00'),
(124, 38, 'Information tools', 'N', '0000-00-00 00:00:00'),
(151, 50, 'True', 'Y', '2016-05-03 12:41:35'),
(152, 50, 'False', 'N', '2016-05-03 12:41:35'),
(153, 51, 'True', 'N', '2016-05-03 12:44:25'),
(154, 51, 'False', 'Y', '2016-05-03 12:44:25'),
(155, 52, 'True', 'Y', '2016-05-03 13:32:55'),
(156, 52, 'False', 'N', '2016-05-03 13:32:55'),
(157, 53, 'True', 'Y', '2016-05-03 13:35:22'),
(158, 53, 'False', 'N', '2016-05-03 13:35:22'),
(159, 54, 'screen standard ', 'N', '2016-05-03 15:45:42'),
(160, 54, 'computer network', 'Y', '2016-05-03 15:45:42'),
(161, 54, 'programming launguage', 'N', '2016-05-03 15:45:42'),
(162, 54, 'type of memmor', 'N', '2016-05-03 15:45:42'),
(163, 55, 'A mobile phone', 'N', '2016-05-03 16:54:54'),
(164, 55, 'An input, process, output device', 'N', '2016-05-03 16:54:54'),
(165, 55, 'A server', 'N', '2016-05-03 16:54:54'),
(166, 55, 'All of the above', 'Y', '2016-05-03 16:54:54'),
(167, 56, 'True', 'N', '2016-05-03 16:56:04'),
(168, 56, 'False', 'Y', '2016-05-03 16:56:04'),
(169, 57, 'True', 'Y', '2016-05-10 14:32:24'),
(170, 57, 'False', 'N', '2016-05-10 14:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(4) NOT NULL AUTO_INCREMENT,
  `lecturer_id` int(4) NOT NULL,
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `lecturer_id` (`lecturer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `lecturer_id`) VALUES
(3, 0),
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `lecturer_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `group_id` int(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`lecturer_id`),
  UNIQUE KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_id`, `name`, `group_id`, `password`) VALUES
(1, 'Limbo', 1, 'uclstaff'),
(2, 'Da Silva', 2, 'uclstaff'),
(3, 'Tangeni', 3, '201403142');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `srnumber` int(255) NOT NULL,
  `incorrect` int(9) NOT NULL,
  `correct` int(255) NOT NULL,
  `grade` double NOT NULL,
  `test_id` int(9) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `srnumber`, `incorrect`, `correct`, `grade`, `test_id`, `created`) VALUES
(16, 201403142, 5, 10, 67, 13, '2016-05-09 22:20:15'),
(17, 2015034444, 12, 6, 70, 3, '2016-05-09 23:05:36'),
(18, 201403142, 0, 0, 0, 14, '2016-05-10 00:32:32'),
(19, 201403142, 15, 0, 0, 13, '2016-05-10 13:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(4) NOT NULL,
  `question` varchar(255) NOT NULL,
  `section_id` int(4) NOT NULL,
  `correct_opt` varchar(255) NOT NULL,
  `grade` int(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `test_id`, `question`, `section_id`, `correct_opt`, `grade`, `created`) VALUES
(21, 13, 'Ms Excel and MS Word are example of presentation software', 2, 'B', 1, '0000-00-00 00:00:00'),
(22, 13, '..... are the instructions or code that tell the computer what to do.', 1, 'D', 1, '0000-00-00 00:00:00'),
(23, 13, 'The Copy and Paste tools are used to move files or data from one location into another.', 2, 'A', 1, '0000-00-00 00:00:00'),
(24, 13, 'The raw material to be processed by the computer is called:', 1, 'C', 1, '0000-00-00 00:00:00'),
(26, 13, 'Which of the following is a component of a system unit?', 1, 'D', 1, '0000-00-00 00:00:00'),
(29, 13, '....holds data, instructions and information for future use in a computer system.', 1, 'B', 1, '0000-00-00 00:00:00'),
(34, 13, '... is one example of application software', 1, 'D', 1, '0000-00-00 00:00:00'),
(36, 13, 'The physical components of a computing system are called', 1, 'B', 1, '0000-00-00 00:00:00'),
(50, 13, 'Floppies and Hard disks store data magnetically', 2, 'A', 1, '2016-05-03 12:41:35'),
(51, 13, 'Input devices convert information that the computer understands into information that human understand.', 2, 'B', 1, '2016-05-03 12:44:25'),
(52, 13, 'By shareware it is understood the copyrighted software that is used for unlimited period of time', 2, 'A', 1, '2016-05-03 13:32:55'),
(53, 13, 'A WAN network is a worldwide of connected computers and able to exchange data', 2, 'A', 1, '2016-05-03 13:35:22'),
(55, 13, 'What is a PC', 1, 'D', 1, '2016-05-03 16:54:54'),
(57, 13, 'The Acronym IT stands for Information Technology?', 2, 'A', 1, '2016-05-10 14:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `s_number` int(9) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `question_id`, `s_number`, `answer_id`, `created`) VALUES
(125, 26, 201403142, 76, '2016-05-09 22:20:14'),
(126, 29, 201403142, 86, '2016-05-09 22:20:14'),
(127, 54, 201403142, 160, '2016-05-09 22:20:14'),
(128, 34, 201403142, 108, '2016-05-09 22:20:14'),
(129, 36, 201403142, 114, '2016-05-09 22:20:14'),
(130, 55, 201403142, 166, '2016-05-09 22:20:14'),
(131, 24, 201403142, 68, '2016-05-09 22:20:14'),
(132, 22, 201403142, 63, '2016-05-09 22:20:14'),
(133, 52, 201403142, 155, '2016-05-09 22:20:15'),
(134, 50, 201403142, 152, '2016-05-09 22:20:15'),
(135, 53, 201403142, 157, '2016-05-09 22:20:15'),
(136, 21, 201403142, 60, '2016-05-09 22:20:15'),
(137, 23, 201403142, 66, '2016-05-09 22:20:15'),
(138, 51, 201403142, 154, '2016-05-09 22:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `group_id` int(4) NOT NULL,
  PRIMARY KEY (`section_id`),
  UNIQUE KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `name`, `group_id`) VALUES
(1, 'Multiple Choice', 1),
(2, 'True / False', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `s_number` int(9) NOT NULL AUTO_INCREMENT,
  `password` varchar(16) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `group_id` int(4) NOT NULL,
  `test_id` int(4) NOT NULL,
  `tests_taken` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`s_number`),
  UNIQUE KEY `group_id` (`group_id`,`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201610292 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_number`, `password`, `first_name`, `last_name`, `group_id`, `test_id`, `tests_taken`) VALUES
(201203233, '931103', 'Emmanuel', 'Naftali', 2, 2, 0),
(201403142, '151195', 'Tangeni', 'Shikomba', 2, 1, 0),
(201403156, '160996', 'Kondwani', 'Msiska', 1, 1, 0),
(201406033, '290495', 'Eddy', 'Muhongo', 1, 2, 0),
(201610291, 'kauna', 'Kauna', 'Mufeti', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(4) NOT NULL AUTO_INCREMENT,
  `duration` time NOT NULL DEFAULT '00:15:00',
  `test_name` varchar(255) NOT NULL,
  `semester` int(2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `duration`, `test_name`, `semester`, `active`) VALUES
(13, '00:15:00', 'Test 1', 0, 1),
(14, '00:15:00', 'Test 2', 1, 0);
