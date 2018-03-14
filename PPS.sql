-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2017 at 10:49 AM
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
  PRIMARY KEY (`aID`),
  UNIQUE KEY `mID` (`mID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `actualmetrics`
--

INSERT INTO `actualmetrics` (`aID`, `mID`, `effort`, `duration`, `size`, `cost`, `fp`, `ucp`) VALUES
(1, 4, 40, 11.5, 25.9, 2000000, 143, 59.664),
(2, 7, 10, 5.2, 2.9, 500000, 28.6, 28.083),
(3, 12, 11.7, 7.3, 3, 89, 28.6, 28.08);

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
  PRIMARY KEY (`cID`),
  UNIQUE KEY `mID` (`mID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cocomo_metric`
--

INSERT INTO `cocomo_metric` (`cID`, `mID`, `effort`, `cost`, `size`, `duration`, `pType`, `pDesign`, `dDesign`, `codeTest`, `intTest`) VALUES
(1, 3, 65.16, 3257944, 23.2, 10.79, 'organic', 18.244, 11.729, 14.335, 20.851),
(2, 6, 6.68, 333879, 2.65, 4.86, 'organic', 1.669, 1.469, 2.003, 1.536),
(3, 11, 11.75, 587611, 4.54, 5.92, 'organic', 3.056, 2.468, 3.173, 3.056),
(4, 14, 3.21, 160614, 1.32, 3.76, 'organic', 0.803, 0.707, 0.964, 0.739),
(5, 19, 2.1, 105178, 0.882, 3.24, 'organic', 0.505, 0.505, 0.673, 0.421);

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
  PRIMARY KEY (`eeID`),
  UNIQUE KEY `mID` (`mID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ee_metric`
--

INSERT INTO `ee_metric` (`eeID`, `mID`, `effort`, `cost`, `size`, `duration`, `model`, `pDesign`, `dDesign`, `codeTest`, `intTest`) VALUES
(2, 2, 33.51, 1675422, 23.2, 8.55, 'Biley-Basili Model', 9.382, 6.032, 7.372, 10.723),
(3, 5, 12.84, 641969, 2.7, 6.11, 'Walston-Felix Model', 3.21, 2.825, 3.852, 2.953),
(4, 10, 9.82, 490957, 4.63, 5.56, 'Biley-Basili Model', 2.553, 2.062, 2.651, 2.553),
(5, 13, 4.33, 216291, 1.34, 4.17, 'Boehm-Simple Model', 1.081, 0.952, 1.298, 0.995),
(6, 18, 4.73, 236468, 0.901, 4.31, 'Walston-Felix Model', 1.135, 1.135, 1.513, 0.946);

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
  `jobStatus` varchar(255) NOT NULL,
  `workStatus` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`empId`),
  UNIQUE KEY `cnic` (`cnic`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empId`, `empName`, `password`, `gender`, `cnic`, `dob`, `regDate`, `address`, `email`, `contactNo`, `salary`, `jobStatus`, `workStatus`, `image`, `position`) VALUES
(1, 'Ali Rao', '25d55ad283aa400af464c76d713c07ad', 'Male', '99888-9845449-8', '1999-03-05', '2015-08-14', 'House#24,Street#4,F-8/4 Isb                    ', 'admin@gmail.com', '33-4421444', '70000', 'Employee', 'In-Active', '../files/taskfiles/18737.jpg', 'Administrator'),
(2, 'Umer Khalid', '25d55ad283aa400af464c76d713c07ad', 'Male', '55555-4444227-5', '2014-03-03', '2013-05-02', 'House#54,Street#4,Shasabaad,Faislabad   ', 'pm@gmail.com', '33-3424432', '100000', 'Employee', 'In-Active', '../files/taskfiles/25257.jpg', 'Project Manager'),
(3, 'Usman Haider', '25d55ad283aa400af464c76d713c07ad', 'Male', '34252-3434344-7', '2011-12-09', '2014-10-12', 'House#33,Street#4,DHA Lahore ', 'usman@gmail.com', '13-6343453', '50000', 'Employee', 'In-Active', '../files/taskfiles/19281.png', 'Developer'),
(4, 'Salman Khalid', '25d55ad283aa400af464c76d713c07ad', 'Male', '23132-2123123-1', '1992-12-12', '2017-08-07', 'House#33,Street#4,DHA Karachi', 'sk233@yahoo.com', '33-3333333', '50000', 'Employee', 'Active', '../images/6340.png', 'Developer'),
(5, 'Raza Hasshan', '25d55ad283aa400af464c76d713c07ad', 'Male', '44444-4444444-4', '2017-08-11', '2016-10-04', 'House#37,Street#4,DHA Lahore', 'raza99@live.com', '44-4444444', '30000', 'Employee', 'In-Active', '../images/1110.jpg', 'Developer'),
(6, 'Ali ', '25d55ad283aa400af464c76d713c07ad', 'Male', '33333-3443455-3', '2015-07-10', '2012-08-23', 'House#33,Street#4,District Karachi', 'ali77@gmail.com', '33-3333333', '40000', 'Employee', 'In-Active', '../images/26517.jpg', 'Developer'),
(7, 'Maryam', '25d55ad283aa400af464c76d713c07ad', 'Male', '44444-1223343-2', '1993-03-12', '2017-08-27', 'House#10, Street#15, I-9/4 ISB', 'maryam@gmail.com', '43-3242343', '50000', 'Employee', 'In-Active', '../images/6096.png', 'Developer'),
(8, 'Qasim', '25d55ad283aa400af464c76d713c07ad', 'Male', '77777-4545477-7', '1994-04-10', '2015-08-27', 'House#10, Street#15, I-9/4 ISB', 'Qasim@gmail.com', '33-3333333', '40000', 'Employee', 'In-Active', '../images/14041.png', 'Developer'),
(102, 'Ahmed', '25d55ad283aa400af464c76d713c07ad', 'Male', '11111-1111111-1', '2014-02-12', '2017-08-28', 'House#10, Street#15, I-9/4 ISB', 'ahmed01@gmail.com', '11-1111111', '50000', 'Employee', 'In-Active', '../images/14041.png', 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `employeelanguage`
--

CREATE TABLE IF NOT EXISTS `employeelanguage` (
  `empId` int(15) NOT NULL,
  `languageId` int(15) NOT NULL,
  UNIQUE KEY `empId` (`empId`,`languageId`),
  UNIQUE KEY `empId_2` (`empId`,`languageId`),
  UNIQUE KEY `empId_3` (`empId`,`languageId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeelanguage`
--

INSERT INTO `employeelanguage` (`empId`, `languageId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(3, 4),
(4, 1),
(5, 1),
(5, 4),
(5, 7),
(6, 6),
(7, 1),
(7, 4),
(7, 5),
(7, 7),
(8, 2),
(8, 3),
(102, 2),
(102, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employeeroles`
--

CREATE TABLE IF NOT EXISTS `employeeroles` (
  `empId` int(15) NOT NULL,
  `roleId` int(15) NOT NULL,
  `experience` int(15) NOT NULL,
  UNIQUE KEY `empId` (`empId`,`roleId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeroles`
--

INSERT INTO `employeeroles` (`empId`, `roleId`, `experience`) VALUES
(2, 3, 4),
(3, 5, 6),
(7, 3, 5),
(1, 6, 5),
(6, 5, 5),
(3, 4, 3),
(102, 1, 1),
(8, 3, 1),
(6, 4, 1),
(5, 2, 2),
(4, 2, 2),
(3, 3, 5),
(1, 2, 1),
(5, 1, 7);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=192 ;

--
-- Dumping data for table `fp_metric`
--

INSERT INTO `fp_metric` (`fpID`, `mID`, `functionPoint`, `effort`, `size`, `cost`, `duration`) VALUES
(190, 16, 14.3, 5, 0.882, 5, 2.6),
(188, 8, 28.6, 8, 4.54, 400000, 2.3),
(191, 20, 41.58, 14.32, 6.64, 716019, 6.98);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `sender`, `receiver`, `subject`, `message`, `filepath`, `fileName`, `date`, `time`, `open`) VALUES
(1, 1, 2, 'project meeting', 'please come to conference room ', '0', '', '2017-08-28', '02:17:31', 1),
(2, 2, 1, 'sdf', 'sdf', '../files/messagefiles/26094.rar', 'Lexical.rar', '2017-08-28', '09:19:53', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `metric`
--

INSERT INTO `metric` (`mID`, `pID`, `type`, `regDate`) VALUES
(2, 1, 'ee', '2017-08-28'),
(3, 1, 'cocomo', '2017-08-28'),
(4, 1, 'actual', '2017-08-28'),
(5, 2, 'ee', '2017-08-28'),
(6, 2, 'cocomo', '2017-08-28'),
(7, 2, 'actual', '2017-08-28'),
(8, 6, 'fp', '2017-08-28'),
(9, 6, 'ucp', '2017-08-28'),
(10, 6, 'ee', '2017-08-28'),
(11, 6, 'cocomo', '2017-08-28'),
(12, 6, 'actual', '2017-08-28'),
(13, 3, 'ee', '2017-08-28'),
(14, 3, 'cocomo', '2017-08-28'),
(16, 7, 'fp', '2017-08-28'),
(17, 7, 'ucp', '2017-08-28'),
(18, 7, 'ee', '2017-08-28'),
(19, 7, 'cocomo', '2017-08-28'),
(20, 8, 'fp', '2017-08-28');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationId`, `notificationType`, `notificationDetails`, `notificationTypeId`, `receiverId`, `senderId`, `time`, `date`, `seen`) VALUES
(1, 4, 'talha', 102, 2, 1, '02:15:46', '2017-08-28', 1),
(2, 8, 'Analysis ', 1, 3, 2, '03:03:54', '2017-08-28', 0),
(3, 8, 'Database Design', 2, 3, 2, '03:09:17', '2017-08-28', 0),
(4, 8, 'Database Design', 2, 4, 2, '03:09:17', '2017-08-28', 0),
(5, 2, 'school map.png', 1, 3, 2, '03:19:58', '2017-08-28', 0),
(6, 2, 'TalhaMunawar_CV.pdf', 1, 3, 2, '03:19:58', '2017-08-28', 0),
(7, 10, 'ERD', 1, 3, 2, '03:26:24', '2017-08-28', 0),
(8, 15, 'ERD', 1, 2, 3, '04:15:09', '2017-08-28', 1),
(9, 14, 'ERD', 1, 2, 3, '04:15:19', '2017-08-28', 0),
(10, 13, 'Analysis ', 1, 2, 3, '04:15:59', '2017-08-28', 1),
(11, 12, 'Analysis ', 1, 2, 3, '04:16:08', '2017-08-28', 0),
(12, 8, 'Deployment', 4, 3, 2, '04:27:03', '2017-08-28', 0),
(13, 13, 'Code and testing', 3, 2, 3, '04:28:03', '2017-08-28', 1),
(14, 12, 'Code and testing', 3, 2, 3, '04:28:08', '2017-08-28', 0),
(15, 13, 'Deployment', 4, 2, 3, '04:28:14', '2017-08-28', 0),
(16, 12, 'Deployment', 4, 2, 3, '04:28:19', '2017-08-28', 0),
(17, 7, 'Quiz App', 1, 3, 2, '04:39:28', '2017-08-28', 0),
(18, 7, 'Quiz App', 1, 4, 2, '04:39:28', '2017-08-28', 0),
(19, 7, 'Quiz App', 1, 3, 2, '04:49:49', '2017-08-28', 0),
(20, 7, 'Quiz App', 1, 4, 2, '04:49:49', '2017-08-28', 0),
(21, 7, 'Quiz App', 1, 3, 2, '04:57:11', '2017-08-28', 0),
(22, 7, 'Quiz App', 1, 4, 2, '04:57:11', '2017-08-28', 0),
(23, 7, 'Quiz App', 1, 3, 2, '04:58:31', '2017-08-28', 0),
(24, 7, 'Quiz App', 1, 4, 2, '04:58:31', '2017-08-28', 0),
(25, 8, 'zxc', 5, 102, 2, '05:25:03', '2017-08-28', 0),
(26, 8, 'zxc', 6, 102, 2, '05:27:09', '2017-08-28', 0),
(46, 10, 'Draw Class Diagram', 4, 4, 2, '07:25:02', '2017-08-28', 0),
(28, 12, 'zxc', 5, 2, 102, '05:31:14', '2017-08-28', 0),
(29, 13, 'zxc', 6, 2, 102, '05:34:29', '2017-08-28', 1),
(30, 12, 'zxc', 6, 2, 102, '05:34:49', '2017-08-28', 0),
(31, 8, 'aaaaaaa', 7, 4, 2, '05:36:42', '2017-08-28', 0),
(32, 8, 'aaaaaaa', 7, 5, 2, '05:36:42', '2017-08-28', 0),
(33, 8, 'aaaaaaa', 7, 7, 2, '05:36:42', '2017-08-28', 0),
(34, 10, ' xcv', 2, 4, 2, '05:37:39', '2017-08-28', 0),
(35, 15, ' xcv', 2, 2, 4, '05:45:28', '2017-08-28', 1),
(36, 15, ' xcv', 2, 2, 4, '05:49:02', '2017-08-28', 1),
(37, 8, 'java task', 8, 6, 2, '06:17:30', '2017-08-28', 0),
(38, 13, 'java task', 8, 2, 6, '06:23:33', '2017-08-28', 0),
(39, 12, 'java task', 8, 2, 6, '06:23:41', '2017-08-28', 0),
(40, 7, 'Chess game', 2, 6, 2, '06:31:59', '2017-08-28', 0),
(41, 7, 'Chess game', 2, 7, 2, '06:31:59', '2017-08-28', 0),
(42, 8, 'second task', 9, 4, 2, '06:53:58', '2017-08-28', 0),
(43, 10, 'sub task 2', 3, 4, 2, '06:56:34', '2017-08-28', 0),
(44, 13, 'second task', 9, 2, 4, '06:58:03', '2017-08-28', 1),
(45, 12, 'second task', 9, 2, 4, '06:58:09', '2017-08-28', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`id`, `sender`, `receiver`, `subject`, `message`, `filepath`, `fileName`, `date`, `time`) VALUES
(1, 1, 2, 'project meeting', 'please come to conference room ', '0', '', '2017-08-28', '02:17:31'),
(2, 2, 1, 'sdf', 'sdf', '../files/messagefiles/26094.rar', 'Lexical.rar', '2017-08-28', '09:19:53');

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
  `completionDate` date NOT NULL,
  `InProgDate` date NOT NULL,
  `projStatus` varchar(100) NOT NULL,
  `deadlineFlag` tinyint(1) NOT NULL,
  `registeredBy` int(15) NOT NULL,
  `description` text NOT NULL,
  `languageId` int(10) NOT NULL,
  `teamId` int(15) NOT NULL,
  PRIMARY KEY (`projId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projId`, `projName`, `regDate`, `deadline`, `startDate`, `completionDate`, `InProgDate`, `projStatus`, `deadlineFlag`, `registeredBy`, `description`, `languageId`, `teamId`) VALUES
(1, 'Quiz App', '2017-08-28', '2018-05-05', '2017-08-28', '2017-08-28', '0000-00-00', 'Completed', 0, 2, 'Quiz App consists of picture base questions.....', 1, 1),
(2, 'Chess game', '2017-08-28', '2018-06-14', '2017-08-28', '2017-08-28', '2017-08-28', 'Completed', 0, 2, 'This is a chess game...', 3, 2),
(3, 'CS Alumini', '2017-08-28', '2018-01-03', '2017-08-28', '0000-00-00', '2017-08-28', 'In-Progress', 0, 2, 'Web based system for .......', 6, 4),
(5, 'HMS', '2017-08-28', '2018-05-25', '2017-09-05', '0000-00-00', '2017-08-28', 'In-Progress', 0, 2, 'Hospital management system..', 2, 3),
(6, 'Drawing tool', '2017-08-28', '2017-10-28', '2017-08-28', '2017-08-28', '0000-00-00', 'Completed', 0, 2, 'drawing....', 1, 0),
(7, 'Cricket hub', '2017-08-28', '2017-09-08', '2017-08-29', '0000-00-00', '0000-00-00', 'Pending', 0, 2, '', 3, 0),
(8, 'project B', '2017-08-28', '2017-09-07', '2017-08-28', '0000-00-00', '0000-00-00', 'Pending', 0, 2, '', 1, 0),
(9, 'Qau Hub', '2017-08-28', '2017-11-30', '2017-08-28', '0000-00-00', '0000-00-00', 'Not Started', 0, 2, '', 3, 6);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `projectfiles`
--

INSERT INTO `projectfiles` (`projFileId`, `filePath`, `fileName`, `uploadTime`, `uploadDate`, `projId`, `attachedBy`) VALUES
(1, '../files/20898.docx', 'Documentation.docx', '02:27:45', '2017-08-28', 1, 2),
(2, '../files/projectfiles/20019.html', 'bootstrap-elements.html', '07:10:57', '2017-08-28', 1, 2),
(3, '../files/projectfiles/1520.html', 'bootstrap-grid.html', '07:10:57', '2017-08-28', 1, 2),
(4, '../files/projectfiles/22377.html', 'charts.html', '07:10:57', '2017-08-28', 1, 2);

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
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int(15) NOT NULL,
  `roleName` varchar(100) NOT NULL,
  PRIMARY KEY (`roleId`,`roleName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleName`) VALUES
(1, 'System Analyst'),
(2, 'Database Designer'),
(3, 'Programmer'),
(4, 'Tester'),
(5, 'Web Developer'),
(6, 'App Developer');

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
  `startDate` date NOT NULL,
  `creationDate` date NOT NULL,
  `actualStartDate` datetime NOT NULL,
  `actualCompletionDate` datetime NOT NULL,
  `deadline` date NOT NULL,
  `deadlineFlag` tinyint(1) NOT NULL,
  `deadlineFlag2` tinyint(4) NOT NULL,
  `subtaskStatus` varchar(15) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`subtaskId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subtask`
--

INSERT INTO `subtask` (`subtaskId`, `taskId`, `empId`, `subtaskName`, `subtaskHours`, `startDate`, `creationDate`, `actualStartDate`, `actualCompletionDate`, `deadline`, `deadlineFlag`, `deadlineFlag2`, `subtaskStatus`, `description`) VALUES
(1, 2, 3, 'ERD', 16, '2017-09-04', '2017-08-28', '2017-08-28 02:15:00', '2017-08-28 04:15:00', '2017-09-05', 0, 0, 'Completed', 'make erd'),
(2, 7, 4, ' xcv', 88, '2017-11-08', '2017-08-28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-11-22', 0, 0, 'In-Progress', ''),
(3, 7, 4, 'sub task 2', 24, '2017-11-03', '2017-08-28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-11-10', 0, 0, 'Not Started', ''),
(4, 7, 4, 'Draw Class Diagram', 8, '2017-11-23', '2017-08-28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-11-23', 0, 0, 'Not Started', 'xc');

-- --------------------------------------------------------

--
-- Table structure for table `subtaskdependency`
--

CREATE TABLE IF NOT EXISTS `subtaskdependency` (
  `childSubtaskId` int(15) NOT NULL,
  `parentSubtaskId` int(15) NOT NULL,
  UNIQUE KEY `childSubtaskId` (`childSubtaskId`,`parentSubtaskId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtaskdependency`
--

INSERT INTO `subtaskdependency` (`childSubtaskId`, `parentSubtaskId`) VALUES
(4, 3);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `taskId` int(11) NOT NULL AUTO_INCREMENT,
  `taskName` varchar(100) NOT NULL,
  `taskHours` int(15) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `deadline` date NOT NULL,
  `actualStartDate` datetime NOT NULL,
  `actualCompletionDate` datetime NOT NULL,
  `projId` int(11) NOT NULL,
  `deadlineFlag` tinyint(1) NOT NULL,
  `deadlineFlag2` tinyint(4) NOT NULL,
  `creationDate` date NOT NULL,
  `taskStatus` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`taskId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskId`, `taskName`, `taskHours`, `priority`, `startDate`, `deadline`, `actualStartDate`, `actualCompletionDate`, `projId`, `deadlineFlag`, `deadlineFlag2`, `creationDate`, `taskStatus`, `description`) VALUES
(1, 'Analysis ', 24, 'High', '2017-08-29', '2017-08-31', '2017-08-28 04:15:00', '2017-08-28 04:16:00', 1, 1, 0, '2017-08-28', 'Completed', 'Do analysis on the project and submit report on every morning'),
(2, 'Database Design', 16, 'High', '2017-09-01', '2017-09-08', '2017-08-28 09:00:00', '2017-08-28 04:15:00', 1, 0, 0, '2017-08-28', 'Completed', 'see subtasks!'),
(3, 'Code and testing', 0, 'Normal', '2017-09-05', '2017-09-06', '2017-08-28 04:28:00', '2017-08-28 04:28:00', 1, 1, 0, '2017-08-28', 'Completed', 'abc'),
(5, 'Analysis', 8, 'Low', '2017-08-28', '2017-08-28', '2017-08-28 05:30:00', '2017-08-28 05:31:00', 3, 1, 0, '2017-08-28', 'Completed', 'as'),
(4, 'Deployment', 16, 'Low', '2017-09-12', '2017-09-13', '2017-08-28 04:28:00', '2017-08-28 04:28:00', 1, 0, 0, '2017-08-28', 'Completed', ''),
(6, 'Draw UCD', 16, 'Low', '2017-08-31', '2017-09-02', '2017-08-28 05:34:00', '2017-08-28 05:34:00', 3, 1, 0, '2017-08-28', 'Completed', ''),
(7, 'Extract Usecases', 120, 'Low', '2017-11-02', '2017-12-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 0, 0, '2017-08-28', 'Not Started', ''),
(8, 'java task', 56, 'Low', '2017-08-28', '2017-09-05', '2017-08-28 06:23:00', '2017-08-28 06:23:00', 2, 0, 0, '2017-08-28', 'Completed', ''),
(9, 'second task', 24, 'Low', '2017-08-17', '2017-08-29', '2017-08-28 06:58:00', '2017-08-28 06:58:00', 5, 1, 0, '2017-08-28', 'Completed', '');

-- --------------------------------------------------------

--
-- Table structure for table `taskassignment`
--

CREATE TABLE IF NOT EXISTS `taskassignment` (
  `taskId` int(15) NOT NULL,
  `empId` int(15) NOT NULL,
  UNIQUE KEY `taskId` (`taskId`,`empId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskassignment`
--

INSERT INTO `taskassignment` (`taskId`, `empId`) VALUES
(1, 3),
(2, 3),
(2, 4),
(3, 3),
(4, 3),
(5, 102),
(6, 102),
(7, 4),
(7, 5),
(8, 6),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `taskdependency`
--

CREATE TABLE IF NOT EXISTS `taskdependency` (
  `childTaskId` int(15) NOT NULL,
  `parentTaskId` int(15) NOT NULL,
  UNIQUE KEY `childTaskId` (`childTaskId`,`parentTaskId`),
  UNIQUE KEY `childTaskId_2` (`childTaskId`,`parentTaskId`),
  UNIQUE KEY `childTaskId_3` (`childTaskId`,`parentTaskId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskdependency`
--

INSERT INTO `taskdependency` (`childTaskId`, `parentTaskId`) VALUES
(2, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `taskfiles`
--

INSERT INTO `taskfiles` (`taskFileId`, `filePath`, `attachedBy`, `fileName`, `taskId`, `uploadTime`, `uploadDate`) VALUES
(1, '../files/taskfiles/29246.png', 2, 'school map.png', 1, '03:19:58', '2017-08-28'),
(2, '../files/taskfiles/14495.pdf', 2, 'TalhaMunawar_CV.pdf', 1, '03:19:58', '2017-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `teamId` int(15) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(100) NOT NULL,
  `teamStatus` varchar(100) NOT NULL,
  `createdBy` int(15) NOT NULL,
  PRIMARY KEY (`teamId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamId`, `teamName`, `teamStatus`, `createdBy`) VALUES
(1, 'Team Alpha', 'In-Active', 2),
(2, 'Team Beta', 'In-Active', 2),
(3, 'Team C', 'Active', 2),
(4, 'Team D', 'Active', 2),
(5, 'Team Testing', 'In-Active', 2),
(6, 'Team D', 'Active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teammember`
--

CREATE TABLE IF NOT EXISTS `teammember` (
  `teamId` int(15) NOT NULL,
  `empId` int(15) NOT NULL,
  UNIQUE KEY `teamId` (`teamId`,`empId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teammember`
--

INSERT INTO `teammember` (`teamId`, `empId`) VALUES
(1, 3),
(1, 4),
(2, 6),
(2, 7),
(3, 4),
(3, 5),
(3, 7),
(3, 8),
(4, 102),
(5, 4),
(5, 5),
(6, 3),
(6, 4),
(6, 7);

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
  PRIMARY KEY (`ucpID`),
  UNIQUE KEY `mID` (`mID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ucp_metric`
--

INSERT INTO `ucp_metric` (`ucpID`, `mID`, `ucp`, `effort`, `cost`, `size`, `duration`) VALUES
(1, 9, 28.08, 18.83, 941372, 12.2, 5.41),
(2, 17, 28.08, 10, 500000, 2.89, 5.2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
