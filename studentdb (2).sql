-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2021 at 06:45 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentdb`
--
CREATE DATABASE IF NOT EXISTS `studentdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `studentdb`;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `actid` int(4) NOT NULL AUTO_INCREMENT,
  `actdate` date NOT NULL,
  `actname` varchar(50) NOT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `staffid` int(4) NOT NULL,
  PRIMARY KEY (`actid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE IF NOT EXISTS `admission` (
  `admid` int(4) NOT NULL AUTO_INCREMENT,
  `grno` int(4) NOT NULL,
  `courseid` int(4) NOT NULL,
  `admdate` date NOT NULL,
  `stream` varchar(10) DEFAULT NULL,
  `division` varchar(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `atndid` int(4) NOT NULL AUTO_INCREMENT,
  `atnddate` date NOT NULL,
  `grno` int(4) NOT NULL,
  `admid` int(4) NOT NULL,
  `present` varchar(7) NOT NULL,
  `staffid` int(4) NOT NULL,
  PRIMARY KEY (`atndid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chatid` int(4) NOT NULL AUTO_INCREMENT,
  `chatdate` date NOT NULL,
  `grno1` int(4) NOT NULL,
  `msg1` varchar(200) NOT NULL,
  `grno2` int(4) NOT NULL,
  `msg2` varchar(200) NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `roomid` int(4) NOT NULL AUTO_INCREMENT,
  `roomno` int(4) NOT NULL,
  `roomtype` varchar(20) NOT NULL,
  `facilities` varchar(50) DEFAULT NULL,
  `capacity` int(3) DEFAULT NULL,
  PRIMARY KEY (`roomid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `contactid` int(4) NOT NULL AUTO_INCREMENT,
  `contactdate` date NOT NULL,
  `name` varchar(30) NOT NULL,
  `details` varchar(100) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `response` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`contactid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseid` int(4) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(20) NOT NULL,
  `shootname` varchar(5) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  `duration` varchar(8) DEFAULT NULL,
  `fees` int(5) DEFAULT NULL,
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `docid` int(4) NOT NULL AUTO_INCREMENT,
  `docname` varchar(20) NOT NULL,
  `doctype` varchar(10) DEFAULT NULL,
  `courseid` int(4) NOT NULL,
  `sem` int(5) NOT NULL,
  `file` varchar(100) NOT NULL,
  `filetype` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `emailid` int(4) NOT NULL AUTO_INCREMENT,
  `emaildate` date NOT NULL,
  `emailfrom` varchar(50) NOT NULL,
  `emailto` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `regid` int(4) NOT NULL,
  PRIMARY KEY (`emailid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackid` int(4) NOT NULL AUTO_INCREMENT,
  `feedbackdate` date NOT NULL,
  `grno` int(4) NOT NULL,
  `feedbackfor` varchar(30) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `ratting` int(1) NOT NULL,
  PRIMARY KEY (`feedbackid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leaveapp`
--

CREATE TABLE IF NOT EXISTS `leaveapp` (
  `appid` int(4) NOT NULL AUTO_INCREMENT,
  `appdate` date NOT NULL,
  `grno` int(4) NOT NULL,
  `dateform` date NOT NULL,
  `dateto` date NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`appid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE IF NOT EXISTS `marksheet` (
  `marksheetid` int(4) NOT NULL AUTO_INCREMENT,
  `marksheetdate` date NOT NULL,
  `grno` int(4) NOT NULL,
  `admid` int(4) NOT NULL,
  `examtype` varchar(10) NOT NULL,
  `examdate` date NOT NULL,
  PRIMARY KEY (`marksheetid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `marksheetdetail`
--

CREATE TABLE IF NOT EXISTS `marksheetdetail` (
  `marksdtlsid` int(4) NOT NULL AUTO_INCREMENT,
  `marksheetid` int(4) NOT NULL,
  `subjectid` int(4) NOT NULL,
  `totalmarks` int(3) NOT NULL,
  `obtainmarks` float(5,2) NOT NULL,
  `passingmarks` int(3) NOT NULL,
  PRIMARY KEY (`marksdtlsid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msgid` int(4) NOT NULL AUTO_INCREMENT,
  `msgdate` date NOT NULL,
  `message` varchar(200) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `regid` int(4) NOT NULL,
  PRIMARY KEY (`msgid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE IF NOT EXISTS `query` (
  `queryid` int(4) NOT NULL AUTO_INCREMENT,
  `querydate` date NOT NULL,
  `query` varchar(100) NOT NULL,
  `grno` int(4) NOT NULL,
  `solution` varchar(200) DEFAULT NULL,
  `staffid` int(4) NOT NULL,
  PRIMARY KEY (`queryid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `regid` int(4) NOT NULL AUTO_INCREMENT,
  `regdate` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `contactno` varchar(15) DEFAULT NULL,
  `emailid` varchar(50) NOT NULL,
  `verification` char(1) NOT NULL,
  PRIMARY KEY (`regid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`regid`, `regdate`, `username`, `password`, `usertype`, `contactno`, `emailid`, `verification`) VALUES
(1, '2021-03-01', 'Amit', '123456', 'admin', '7894563213', 'amit@yahoo.com', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staffid` int(5) NOT NULL AUTO_INCREMENT,
  `staffname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cityid` int(5) NOT NULL,
  `pincode` varchar(7) DEFAULT NULL,
  `contactno` varchar(15) DEFAULT NULL,
  `emailid` varchar(50) NOT NULL,
  `joindate` date NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `exp` varchar(10) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `specialization` varchar(20) DEFAULT NULL,
  `extraquality` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`staffid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `grno` int(4) NOT NULL AUTO_INCREMENT,
  `fname` varchar(10) NOT NULL,
  `mname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cityid` int(5) NOT NULL,
  `pincode` varchar(7) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `emailid` varchar(50) NOT NULL,
  PRIMARY KEY (`grno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subid` int(4) NOT NULL AUTO_INCREMENT,
  `subname` varchar(30) NOT NULL,
  `subtype` varchar(10) DEFAULT NULL,
  `courseid` int(4) NOT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
