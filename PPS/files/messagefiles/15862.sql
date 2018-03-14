-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2017 at 08:40 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `actualmetrics`
--

CREATE TABLE IF NOT EXISTS `actualmetrics` (
  `aID` int(10) NOT NULL AUTO_INCREMENT,
  `mID` int(10) NOT NULL,
  `effort` float NOT NULL,
  `duration` float NOT NULL,
  `size` float NOT NULL,
  `cost` int(15) NOT NULL,
  `fp` float NOT NULL,
  `ucp` float NOT NULL,
  PRIMARY KEY (`aID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `actualmetrics`
--

INSERT INTO `actualmetrics` (`aID`, `mID`, `effort`, `duration`, `size`, `cost`, `fp`, `ucp`) VALUES
(1, 1, 2.1, 3.24, 0.882, 50000, 14.3, 10),
(2, 2, 16, 4.26, 1.76, 8000, 28.6, 20);

-- --------------------------------------------------------

--
-- Table structure for table `cocomo_metric`
--

CREATE TABLE IF NOT EXISTS `cocomo_metric` (
  `cID` int(10) NOT NULL AUTO_INCREMENT,
  `mID` int(10) NOT NULL,
  `effort` float NOT NULL,
  `cost` int(15) NOT NULL,
  `size` float NOT NULL,
  `duration` float NOT NULL,
  `pType` varchar(25) NOT NULL,
  `pDesign` float NOT NULL,
  `dDesign` float NOT NULL,
  `codeTest` float NOT NULL,
  `intTest` float NOT NULL,
  PRIMARY KEY (`cID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `cocomo_metric`
--

INSERT INTO `cocomo_metric` (`cID`, `mID`, `effort`, `cost`, `size`, `duration`, `pType`, `pDesign`, `dDesign`, `codeTest`, `intTest`) VALUES
(25, 245, 19.96, 9000, 7.52, 7.13, 'organic', 1.925, 1.354, 1.782, 2.067),
(29, 269, 2.21, 1325, 0.924, 3.3, 'organic', 0.792, 0.792, 1.056, 0.66),
(30, 270, 2.21, 133, 0.924, 3.3, 'organic', 0.792, 0.792, 1.056, 0.66),
(24, 244, 19.96, 9000, 7.52, 7.13, 'organic', 1.925, 1.354, 1.782, 2.067);

-- --------------------------------------------------------

--
-- Table structure for table `ee_metric`
--

CREATE TABLE IF NOT EXISTS `ee_metric` (
  `eeID` int(10) NOT NULL AUTO_INCREMENT,
  `mID` int(10) NOT NULL,
  `effort` float NOT NULL,
  `cost` int(15) NOT NULL,
  `size` float NOT NULL,
  `duration` float NOT NULL,
  `model` varchar(25) NOT NULL,
  `pDesign` float NOT NULL,
  `dDesign` float NOT NULL,
  `codeTest` float NOT NULL,
  `intTest` float NOT NULL,
  PRIMARY KEY (`eeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `ee_metric`
--

INSERT INTO `ee_metric` (`eeID`, `mID`, `effort`, `cost`, `size`, `duration`, `model`, `pDesign`, `dDesign`, `codeTest`, `intTest`) VALUES
(20, 257, 13.57, 6787, 2.87, 10, 'Walston-Felix Model', 3.393, 2.986, 4.072, 3.122),
(23, 262, 7.52, 3760, 1.5, 5.07, 'Walston-Felix Model', 1.88, 1.655, 2.256, 1.73),
(24, 278, 6.26, 350, 1.03, 4.75, 'Biley-Basili Model', 1.564, 1.376, 1.877, 1.439),
(19, 256, 13.57, 6787, 2.87, 10, 'Walston-Felix Model', 3.393, 2.986, 4.072, 3.122);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empId` int(15) NOT NULL AUTO_INCREMENT,
  `empName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `regDate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `workHours` int(15) NOT NULL,
  `jobStatus` varchar(255) NOT NULL,
  `workStatus` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`empId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empId`, `empName`, `password`, `gender`, `cnic`, `dob`, `regDate`, `address`, `email`, `contactNo`, `salary`, `workHours`, `jobStatus`, `workStatus`, `image`, `position`) VALUES
(7, 'Ali Rao', '202cb962ac59075b964b07152d234b70', 'Male', '23434-2324234-4', '2017-04-04', '2015-08-14', 'House#24,Street#4,F-8/4 Isb', 'admin', '33-4421313', '130000', 8, 'Ex-Employee', 'In-Active', '../images/17789.jpg', 'Administrator'),
(2, 'Rabee Khan', '202cb962ac59075b964b07152d234b70', 'Male', '55555-5555555-5', '2014-03-03', '2013-05-02', 'House#54,Street#4,Shasabaad,Faislabad', 'pm', '33-3424432', '900000', 8, 'Employee', 'Active', '../images/2718.png', 'Project Manager'),
(3, 'Usman Haider', '202cb962ac59075b964b07152d234b70', 'Male', '89799-32344-3', '2017-04-11', '2014-10-12', 'House#33,Street#4,DHA Lahore', 'as', '13-6343453', '50000', -11, 'Employee', 'Active', '../images/29234.png', 'Worker'),
(73, 'Salman Khalid', 'dbdfce9ddb58e814d5dfbb798044427e', 'Male', '23132-2123123-1', '1992-12-12', '2017-08-07', 'fsd', 'salman@gmail.com', '3244234342', '43500', 0, 'Employee', 'Active', '../images/6340.png', 'Worker'),
(74, 'Jafar', '4c0c245a82f5434a532ceaf399c165a9', 'Male', '66666-6666666-6', '1992-01-30', '2017-08-08', 'fsd', 'umerkhalid01@gmail.com', '34-3242342', '45555', 0, 'Employee', 'Active', '', 'Worker'),
(40, 'Umer', 'd381747f72c59ac84743e66b2dcaf786', 'Male', '4343-3252-25', '2017-07-13', '2016-07-04', 'isb', 'umerkhalid01@gmail.com', '43-5352255', '88000', -4, 'Employee', 'Active', '../images/6583.png', 'Worker'),
(76, 'fff', 'a04ed5a0e5b52a0e2e54d270a7bdf5bd', 'Male', '61101-5564444-4', '2017-08-09', '2017-08-09', 'assd', 'umerkhalid01@gmail.com', '33-5666666', '44444', 0, 'Employee', 'Active', '', 'Worker');

-- --------------------------------------------------------

--
-- Table structure for table `fp_metric`
--

CREATE TABLE IF NOT EXISTS `fp_metric` (
  `fpID` int(10) NOT NULL AUTO_INCREMENT,
  `mID` int(10) NOT NULL,
  `functionPoint` float NOT NULL,
  `effort` float NOT NULL,
  `size` float NOT NULL,
  `cost` int(15) NOT NULL,
  `duration` float NOT NULL,
  PRIMARY KEY (`fpID`),
  UNIQUE KEY `mID` (`mID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=188 ;

--
-- Dumping data for table `fp_metric`
--

INSERT INTO `fp_metric` (`fpID`, `mID`, `functionPoint`, `effort`, `size`, `cost`, `duration`) VALUES
(170, 250, 87.1, 13.7, 5.74, 13703, 14.23),
(173, 253, 73.45, 11.56, 4.82, 57781, 12),
(187, 285, 68.25, 10.02, 11, 5011, 15.46),
(180, 266, 14.3, 2.21, 0.924, 1105, 2.68);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `sender` int(15) NOT NULL,
  `receiver` int(15) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `open` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `sender`, `receiver`, `subject`, `message`, `filepath`, `fileName`, `date`, `time`, `open`) VALUES
(102, 7, 40, 'ad', 'sd', '../files/messagefiles/724.docx', 'resume.docx', '2017-07-25', '10:46:55', 0),
(100, 7, 3, 'sdf', 'sdf', '0', '', '2017-07-25', '10:42:29', 1),
(101, 7, 40, 'df', 'df', '0', '', '2017-07-25', '10:43:45', 0),
(116, 2, 7, 'd', 'dd', '0', '', '2017-08-07', '07:01:25', 1),
(117, 2, 7, 'vv', 'vv', '0', '', '2017-08-07', '07:01:46', 1),
(118, 2, 7, 's', 's', '0', '', '2017-08-07', '07:02:19', 1),
(126, 2, 7, 'vv', 'vv', '0', '', '2017-08-08', '03:46:33', 0),
(120, 2, 7, 'zx', 'zx', '0', '', '2017-08-08', '01:11:31', 0),
(121, 2, 2, 'dd', 'dd', '0', '', '2017-08-08', '03:31:20', 1),
(122, 2, 7, 'dd', 'd', '0', '', '2017-08-08', '03:32:24', 0),
(123, 2, 7, 'cc', 'ccc', '0', '', '2017-08-08', '03:34:56', 0),
(127, 2, 2, 'ggg', 'gg', '0', '', '2017-08-08', '03:56:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `languageId` int(10) NOT NULL AUTO_INCREMENT,
  `languageName` varchar(20) NOT NULL,
  `LOCperFP` int(10) NOT NULL,
  PRIMARY KEY (`languageId`),
  UNIQUE KEY `languageName` (`languageName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`languageId`, `languageName`, `LOCperFP`) VALUES
(1, 'C', 162),
(2, 'C++', 66),
(3, 'Java', 63),
(4, 'Cobol', 77),
(5, 'Visual Basic', 47),
(6, 'C#', 47),
(7, 'Ada', 154);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `empId` int(15) NOT NULL,
  `languageName` varchar(100) NOT NULL,
  PRIMARY KEY (`empId`,`languageName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`empId`, `languageName`) VALUES
(2, 'Python'),
(3, 'C'),
(3, 'C#'),
(7, 'C#'),
(7, 'PHP'),
(9, 'Java'),
(18, 'C'),
(34, 'C'),
(37, 'C#'),
(38, 'PHP'),
(40, 'SQL'),
(41, 'C#'),
(41, 'PHP'),
(42, 'JavaScript'),
(42, 'SQL'),
(43, 'C#'),
(44, '.NET'),
(46, 'PHP'),
(47, 'Python'),
(48, 'C'),
(50, 'Python'),
(73, 'PHP'),
(74, 'C++'),
(75, 'C'),
(76, 'C#');

-- --------------------------------------------------------

--
-- Table structure for table `metric`
--

CREATE TABLE IF NOT EXISTS `metric` (
  `mID` int(10) NOT NULL AUTO_INCREMENT,
  `pID` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `regDate` date NOT NULL,
  PRIMARY KEY (`mID`),
  UNIQUE KEY `pID` (`pID`,`type`),
  UNIQUE KEY `pID_2` (`pID`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=286 ;

--
-- Dumping data for table `metric`
--

INSERT INTO `metric` (`mID`, `pID`, `type`, `regDate`) VALUES
(1, 12, 'actual', '2017-07-04'),
(2, 13, 'actual', '2017-07-04'),
(262, 15, 'ee', '0000-00-00'),
(233, 16, 'ucp', '0000-00-00'),
(253, 12, 'fp', '0000-00-00'),
(266, 15, 'fp', '0000-00-00'),
(269, 15, 'cocomo', '0000-00-00'),
(270, 17, 'cocomo', '0000-00-00'),
(250, 13, 'fp', '0000-00-00'),
(278, 16, 'ee', '0000-00-00'),
(234, 17, 'ucp', '0000-00-00'),
(285, 16, 'fp', '0000-00-00'),
(257, 13, 'ee', '0000-00-00'),
(256, 12, 'ee', '0000-00-00'),
(244, 12, 'cocomo', '0000-00-00'),
(245, 13, 'cocomo', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notificationId` int(15) NOT NULL AUTO_INCREMENT,
  `notificationType` int(15) NOT NULL,
  `notificationDetails` varchar(250) NOT NULL,
  `notificationTypeId` int(15) NOT NULL,
  `receiverId` int(15) NOT NULL,
  `senderId` int(15) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `seen` tinyint(4) NOT NULL,
  PRIMARY KEY (`notificationId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationId`, `notificationType`, `notificationDetails`, `notificationTypeId`, `receiverId`, `senderId`, `time`, `date`, `seen`) VALUES
(63, 8, 'zxc', 125, 3, 2, '10:13:15', '2017-08-11', 0),
(64, 8, 'eee', 126, 3, 2, '10:20:16', '2017-08-11', 0),
(62, 8, 'sdf', 124, 3, 2, '10:09:36', '2017-08-11', 0),
(61, 8, 'dsf', 123, 3, 2, '10:02:53', '2017-08-11', 0),
(60, 8, 'sdf', 122, 3, 2, '10:00:26', '2017-08-11', 0),
(56, 8, 'Task 8', 118, 3, 2, '09:47:52', '2017-08-11', 0),
(57, 8, 'task 8', 119, 3, 2, '09:52:39', '2017-08-11', 0),
(58, 8, 'task 77', 120, 3, 2, '09:54:59', '2017-08-11', 0),
(59, 8, 'task 66', 121, 3, 2, '09:58:09', '2017-08-11', 0),
(65, 8, 'qe', 127, 3, 2, '10:23:11', '2017-08-11', 0),
(66, 8, 'vcv', 128, 3, 2, '10:25:27', '2017-08-11', 0),
(67, 8, 'adf', 129, 3, 2, '10:29:46', '2017-08-11', 0),
(68, 8, 'fdg', 130, 3, 2, '10:31:51', '2017-08-11', 0),
(69, 8, 'asd', 131, 3, 2, '10:32:38', '2017-08-11', 0),
(70, 8, 'sdas', 132, 3, 2, '10:35:07', '2017-08-11', 0),
(71, 8, 'sdf', 133, 3, 2, '10:37:50', '2017-08-11', 0),
(72, 9, 'sad', 115, 3, 2, '09:42:38', '2017-08-12', 0),
(73, 10, 'hhhh', 92, 3, 2, '10:13:13', '2017-08-12', 0),
(74, 10, 'ddd', 92, 3, 2, '10:28:26', '2017-08-12', 0),
(75, 10, 'xxxx', 94, 3, 2, '10:30:32', '2017-08-12', 0),
(76, 10, 'xxz', 95, 3, 2, '10:31:25', '2017-08-12', 0),
(77, 10, 'hhhhjj', 96, 3, 2, '10:33:52', '2017-08-12', 0),
(78, 10, 'hhhyh', 97, 40, 2, '10:36:38', '2017-08-12', 0),
(79, 8, 'vbn', 134, 3, 2, '11:05:01', '2017-08-12', 0),
(80, 8, 'dfs', 135, 3, 2, '11:11:18', '2017-08-12', 0),
(81, 8, 'fdg', 136, 3, 2, '11:18:18', '2017-08-12', 0),
(82, 8, 'cc', 137, 3, 2, '11:20:46', '2017-08-12', 0),
(83, 10, 'vcb', 98, 3, 2, '11:30:47', '2017-08-12', 0),
(84, 8, 'fgfg', 138, 3, 2, '01:24:42', '2017-08-12', 0),
(85, 8, 'checkkkkkk', 139, 3, 2, '01:32:28', '2017-08-12', 0),
(86, 8, 'df', 140, 3, 2, '01:35:44', '2017-08-12', 0),
(87, 8, 'rt', 141, 73, 2, '01:39:08', '2017-08-12', 0),
(88, 10, 'dfg', 100, 3, 2, '04:44:11', '2017-08-12', 0),
(89, 10, 'gfh', 101, 3, 2, '04:47:27', '2017-08-12', 0),
(90, 10, 'dfg', 102, 3, 2, '04:50:00', '2017-08-12', 0),
(91, 10, 'cxv', 103, 3, 2, '04:55:17', '2017-08-12', 0),
(92, 10, 'll', 104, 3, 2, '05:21:43', '2017-08-12', 0),
(93, 11, 'bbbbbbbb', 102, 3, 2, '06:29:39', '2017-08-12', 0),
(94, 11, 'gfh', 101, 3, 2, '07:16:20', '2017-08-12', 0),
(95, 11, 'gfh', 101, 3, 2, '07:17:46', '2017-08-12', 0),
(96, 11, 'subtask', 101, 3, 2, '07:24:21', '2017-08-12', 0),
(97, 8, 'Task 3', 142, 3, 2, '07:34:02', '2017-08-12', 0),
(98, 10, 'sdf', 105, 3, 2, '08:56:50', '2017-08-12', 0),
(99, 10, 'klkl', 106, 3, 2, '09:12:30', '2017-08-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `sender` int(15) NOT NULL,
  `receiver` int(15) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`id`, `sender`, `receiver`, `subject`, `message`, `filepath`, `fileName`, `date`, `time`) VALUES
(65, 2, 7, 's', 's', '0', '', '2017-08-07', '07:02:19'),
(66, 2, 2, 'ff', 'ff', '0', '', '2017-08-07', '07:02:42'),
(71, 2, 2, 'ff', 'ff', '0', '', '2017-08-08', '03:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `projId` int(15) NOT NULL AUTO_INCREMENT,
  `projName` varchar(100) NOT NULL,
  `regDate` date NOT NULL,
  `deadline` date NOT NULL,
  `startDate` date NOT NULL,
  `assignmentDate` date NOT NULL,
  `completionDate` date NOT NULL,
  `projStatus` varchar(100) NOT NULL,
  `horus` int(15) NOT NULL,
  `deadlineFlag` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `languageId` int(10) NOT NULL,
  PRIMARY KEY (`projId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projId`, `projName`, `regDate`, `deadline`, `startDate`, `assignmentDate`, `completionDate`, `projStatus`, `horus`, `deadlineFlag`, `description`, `languageId`) VALUES
(47, 'hhhh', '0000-00-00', '2017-10-09', '2017-08-05', '2017-08-01', '2017-08-07', 'Completed', 0, 1, 'Completed..', 1),
(56, 'web', '0000-00-00', '2017-08-08', '2017-08-08', '2017-08-08', '0000-00-00', 'Not Started', 0, 1, 'asdasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projectassignment`
--

CREATE TABLE IF NOT EXISTS `projectassignment` (
  `teamId` int(15) NOT NULL,
  `projId` int(15) NOT NULL,
  PRIMARY KEY (`teamId`,`projId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectassignment`
--

INSERT INTO `projectassignment` (`teamId`, `projId`) VALUES
(27, 47),
(27, 56);

-- --------------------------------------------------------

--
-- Table structure for table `projectfiles`
--

CREATE TABLE IF NOT EXISTS `projectfiles` (
  `projFileId` int(15) NOT NULL AUTO_INCREMENT,
  `filePath` varchar(100) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `uploadTime` time NOT NULL,
  `uploadDate` date NOT NULL,
  `projId` int(15) NOT NULL,
  `attachedBy` int(15) NOT NULL,
  PRIMARY KEY (`projFileId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

-- --------------------------------------------------------

--
-- Table structure for table `projectsize`
--

CREATE TABLE IF NOT EXISTS `projectsize` (
  `type` varchar(15) NOT NULL,
  `kloc` float NOT NULL,
  UNIQUE KEY `kloc` (`kloc`),
  UNIQUE KEY `type` (`type`),
  UNIQUE KEY `type_2` (`type`),
  UNIQUE KEY `type_3` (`type`),
  UNIQUE KEY `type_4` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectsize`
--

INSERT INTO `projectsize` (`type`, `kloc`) VALUES
('small', 1),
('interMediat', 3),
('medium', 5),
('large', 10);

-- --------------------------------------------------------

--
-- Table structure for table `rolls`
--

CREATE TABLE IF NOT EXISTS `rolls` (
  `empId` int(15) NOT NULL,
  `rollName` varchar(100) NOT NULL,
  `experience` int(100) NOT NULL,
  PRIMARY KEY (`empId`,`rollName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolls`
--

INSERT INTO `rolls` (`empId`, `rollName`, `experience`) VALUES
(48, 'Web Developer', 0),
(44, 'Database Designer', 0),
(43, 'Programmer', 5),
(42, 'Web Developer', 4),
(41, 'Web Developer', 6),
(41, 'Database Designer', 2),
(9, 'Web Developer', 6),
(38, 'System Analyst', 2),
(41, 'System Analyst', 3),
(37, 'System Analyst', 2),
(3, 'Web Developer', 8),
(50, 'Programmer', 0),
(46, 'Database Designer', 0),
(47, 'Tester', 0),
(34, 'System Analyst', 2),
(18, 'System Analyst', 2),
(9, 'System Analyst', 2),
(3, 'System Analyst', 3),
(40, 'Programmer', 3),
(73, 'Database Designer', 4),
(74, 'System Analyst', 3),
(75, 'Programmer', 3),
(76, 'Programmer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subtask`
--

CREATE TABLE IF NOT EXISTS `subtask` (
  `subtaskId` int(15) NOT NULL AUTO_INCREMENT,
  `taskId` int(15) NOT NULL,
  `empId` int(15) NOT NULL,
  `subtaskName` varchar(100) NOT NULL,
  `subtaskHours` int(15) NOT NULL,
  `workHours` int(15) NOT NULL,
  `startDate` date NOT NULL,
  `creationDate` date NOT NULL,
  `completionDate` date NOT NULL,
  `actualStartDate` date NOT NULL,
  `actualCompletionDate` date NOT NULL,
  `deadline` date NOT NULL,
  `deadlineFlag` tinyint(1) NOT NULL,
  `subtaskStatus` varchar(15) NOT NULL,
  PRIMARY KEY (`subtaskId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `subtask`
--

INSERT INTO `subtask` (`subtaskId`, `taskId`, `empId`, `subtaskName`, `subtaskHours`, `workHours`, `startDate`, `creationDate`, `completionDate`, `actualStartDate`, `actualCompletionDate`, `deadline`, `deadlineFlag`, `subtaskStatus`) VALUES
(90, 116, 3, 'asd', 0, 2, '2017-08-07', '0000-00-00', '2017-08-06', '2017-08-07', '2017-08-07', '2017-08-09', 1, 'Completed'),
(92, 117, 3, 'ss', 6, 0, '2017-08-08', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2017-08-09', 0, 'Not Started'),
(94, 115, 0, 'cxc', 1, 0, '2017-08-12', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2017-08-12', 0, 'Not Started'),
(95, 115, 3, 'xxz', 1, 0, '2017-08-12', '2017-08-12', '0000-00-00', '0000-00-00', '0000-00-00', '2017-08-12', 0, 'Not Started'),
(101, 98, 3, 'subtask', 8, 0, '2017-08-22', '2017-08-12', '0000-00-00', '0000-00-00', '0000-00-00', '2017-08-22', 0, 'Not Started'),
(99, 98, 3, 'cxv', 8, 0, '2017-08-18', '2017-08-12', '0000-00-00', '0000-00-00', '0000-00-00', '2017-08-18', 0, 'Not Started'),
(102, 98, 3, 'bbbbbbbb', 6, 0, '2017-08-21', '2017-08-12', '0000-00-00', '0000-00-00', '0000-00-00', '2017-08-21', 0, 'Not Started'),
(103, 98, 3, 'cxv', 4, 0, '2017-08-31', '2017-08-12', '0000-00-00', '0000-00-00', '0000-00-00', '2017-08-31', 0, 'Not Started'),
(105, 142, 3, 'sdf', 10, 0, '2017-08-18', '2017-08-12', '0000-00-00', '0000-00-00', '0000-00-00', '2017-08-21', 0, 'Not Started');

-- --------------------------------------------------------

--
-- Table structure for table `subtaskdependency`
--

CREATE TABLE IF NOT EXISTS `subtaskdependency` (
  `childSubtaskId` int(15) NOT NULL,
  `parentSubtaskId` int(15) NOT NULL,
  PRIMARY KEY (`childSubtaskId`,`parentSubtaskId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subtaskfiles`
--

CREATE TABLE IF NOT EXISTS `subtaskfiles` (
  `subtaskFileId` int(15) NOT NULL AUTO_INCREMENT,
  `subtaskId` int(15) NOT NULL,
  `filePath` varchar(100) NOT NULL,
  `attachedBy` int(15) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `uploadTime` time NOT NULL,
  `uploadDate` date NOT NULL,
  PRIMARY KEY (`subtaskFileId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `subtaskfiles`
--

INSERT INTO `subtaskfiles` (`subtaskFileId`, `subtaskId`, `filePath`, `attachedBy`, `fileName`, `uploadTime`, `uploadDate`) VALUES
(16, 90, '../files/subtaskfiles/2763.docx', 2, 'resume.docx', '05:41:28', '2017-08-08'),
(17, 92, '../files/subtaskfiles/8872.docx', 2, 'resume.docx', '05:43:45', '2017-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `taskId` int(11) NOT NULL AUTO_INCREMENT,
  `taskName` varchar(100) NOT NULL,
  `taskHours` int(15) NOT NULL,
  `workHours` int(15) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `deadline` date NOT NULL,
  `completionDate` date NOT NULL,
  `actualStartDate` date NOT NULL,
  `actualCompletionDate` date NOT NULL,
  `projId` int(11) NOT NULL,
  `progress` int(15) NOT NULL,
  `deadlineFlag` tinyint(1) NOT NULL,
  `creationDate` date NOT NULL,
  `taskStatus` varchar(100) NOT NULL,
  PRIMARY KEY (`taskId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskId`, `taskName`, `taskHours`, `workHours`, `priority`, `startDate`, `deadline`, `completionDate`, `actualStartDate`, `actualCompletionDate`, `projId`, `progress`, `deadlineFlag`, `creationDate`, `taskStatus`) VALUES
(104, 'Task 1', 0, 2, 'Low', '2017-08-06', '2017-08-11', '2017-08-08', '2017-08-07', '2017-08-23', 47, 0, 1, '0000-00-00', 'Completed'),
(98, 'sad', 31, 2, 'Low', '2017-08-12', '2017-09-08', '0000-00-00', '2017-08-09', '2017-08-09', 47, 0, 1, '2017-08-08', 'Not Started'),
(142, 'Task 3', 40, 0, 'Low', '2017-08-18', '2017-08-28', '0000-00-00', '0000-00-00', '0000-00-00', 47, 0, 1, '2017-08-12', 'Not Started');

-- --------------------------------------------------------

--
-- Table structure for table `taskassignment`
--

CREATE TABLE IF NOT EXISTS `taskassignment` (
  `taskId` int(15) NOT NULL,
  `empId` int(15) NOT NULL,
  PRIMARY KEY (`taskId`,`empId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskassignment`
--

INSERT INTO `taskassignment` (`taskId`, `empId`) VALUES
(98, 3),
(142, 3);

-- --------------------------------------------------------

--
-- Table structure for table `taskdependency`
--

CREATE TABLE IF NOT EXISTS `taskdependency` (
  `childTaskId` int(15) NOT NULL,
  `parentTaskId` int(15) NOT NULL,
  PRIMARY KEY (`childTaskId`,`parentTaskId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `taskfiles`
--

CREATE TABLE IF NOT EXISTS `taskfiles` (
  `taskFileId` int(15) NOT NULL AUTO_INCREMENT,
  `filePath` varchar(100) NOT NULL,
  `attachedBy` int(15) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `taskId` int(100) NOT NULL,
  `uploadTime` time NOT NULL,
  `uploadDate` date NOT NULL,
  PRIMARY KEY (`taskFileId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `taskfiles`
--

INSERT INTO `taskfiles` (`taskFileId`, `filePath`, `attachedBy`, `fileName`, `taskId`, `uploadTime`, `uploadDate`) VALUES
(20, '../files/taskfiles/30023.docx', 3, 'resume.docx', 104, '11:36:18', '2017-08-09'),
(18, '', 2, '', 104, '05:31:43', '2017-08-08'),
(19, '../files/taskfiles/7897.docx', 2, 'resume.docx', 104, '05:32:20', '2017-08-08'),
(16, '../files/taskfiles/25999.docx', 2, 'Documentation.docx', 0, '11:41:46', '2017-07-03'),
(15, '../files/taskfiles/24954.docx', 2, 'Documentation.docx', 0, '07:35:04', '2017-07-02'),
(10, '../files/taskfiles/32342.docx', 2, 'Documentation.docx', 0, '06:38:08', '2017-07-01'),
(21, '../files/taskfiles/23005.docx', 3, 'resume.docx', 104, '11:38:49', '2017-08-09'),
(22, '../files/taskfiles/26269.docx', 3, 'resume.docx', 115, '11:53:40', '2017-08-09'),
(14, '../files/taskfiles/13877.docx', 0, 'Documentation.docx', 0, '02:06:18', '2017-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `teamId` int(15) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(100) NOT NULL,
  `teamStatus` varchar(100) NOT NULL,
  PRIMARY KEY (`teamId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamId`, `teamName`, `teamStatus`) VALUES
(27, 'Team Beta', 'In-Active'),
(33, 'Team c', 'In-Active');

-- --------------------------------------------------------

--
-- Table structure for table `teammember`
--

CREATE TABLE IF NOT EXISTS `teammember` (
  `teamId` int(15) NOT NULL,
  `empId` int(15) NOT NULL,
  PRIMARY KEY (`teamId`,`empId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teammember`
--

INSERT INTO `teammember` (`teamId`, `empId`) VALUES
(0, 3),
(0, 73),
(27, 3),
(27, 73),
(33, 3),
(33, 73),
(33, 74);

-- --------------------------------------------------------

--
-- Table structure for table `ucp_metric`
--

CREATE TABLE IF NOT EXISTS `ucp_metric` (
  `ucpID` int(10) NOT NULL AUTO_INCREMENT,
  `mID` int(10) NOT NULL,
  `ucp` float NOT NULL,
  `effort` float NOT NULL,
  `cost` int(15) NOT NULL,
  `size` float NOT NULL,
  `duration` float NOT NULL,
  PRIMARY KEY (`ucpID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `ucp_metric`
--

INSERT INTO `ucp_metric` (`ucpID`, `mID`, `ucp`, `effort`, `cost`, `size`, `duration`) VALUES
(27, 234, 59.66, 13.36, 7424, 3.94, 13.96),
(26, 233, 59.66, 13.36, 7424, 3.94, 13.96);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
