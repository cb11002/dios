-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2015 at 01:56 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dios`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Id_Admin` int(11) NOT NULL AUTO_INCREMENT,
  `Id_User` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `IC_No` varchar(30) NOT NULL,
  `Staff_No` varchar(30) NOT NULL,
  `Mobile_Phone` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Admin`),
  KEY `Id` (`Id_Admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_Admin`, `Id_User`, `Name`, `IC_No`, `Staff_No`, `Mobile_Phone`, `Email`) VALUES
(1, 1, 'cik admina', '90011903513311', 'admin', '019916916511', 'a@gmail.comaa');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `Id_Announcement` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Tutor` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` text NOT NULL,
  `Announcement_Date` date NOT NULL,
  `Announcement_Time` time NOT NULL,
  PRIMARY KEY (`Id_Announcement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `appoinment`
--

CREATE TABLE IF NOT EXISTS `appoinment` (
  `Id_Appoinment` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Tutor` int(11) NOT NULL,
  `Id_Student` int(11) NOT NULL,
  `Ap_Date` date NOT NULL,
  `Ap_Time` varchar(50) NOT NULL,
  `Ap_Content` text NOT NULL,
  `Ap_Status` int(11) NOT NULL,
  PRIMARY KEY (`Id_Appoinment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `asignment`
--

CREATE TABLE IF NOT EXISTS `asignment` (
  `Id_Asignment` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Class` int(11) NOT NULL,
  `Id_Tutor` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Due_Date` date NOT NULL,
  `Date_Created_Asign` date NOT NULL,
  `File` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_Asignment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `Id_Attendance` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Class` int(11) NOT NULL,
  `Id_Student_Class` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Status_Attendance` int(11) NOT NULL COMMENT '0-klik, 1-xklik',
  PRIMARY KEY (`Id_Attendance`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `Id_Class` int(10) NOT NULL AUTO_INCREMENT,
  `Id_Tutor` int(10) NOT NULL,
  `Course_Code` varchar(30) NOT NULL,
  `Course` varchar(30) NOT NULL,
  `Group` varchar(30) NOT NULL,
  `Stime` varchar(50) NOT NULL,
  `Etime` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `Id_Note` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Class` int(11) NOT NULL,
  `Id_Tutor` int(11) NOT NULL,
  `File_Name` varchar(100) NOT NULL,
  `File` varchar(100) NOT NULL,
  `Date_Notes` date NOT NULL,
  PRIMARY KEY (`Id_Note`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `private_message`
--

CREATE TABLE IF NOT EXISTS `private_message` (
  `Id_Private_Message` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Tutor` int(11) NOT NULL,
  `Id_Student` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Message_Date` date NOT NULL,
  `Reply_Message` text NOT NULL,
  `Message_Status` int(11) NOT NULL,
  PRIMARY KEY (`Id_Private_Message`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `Id_Schedule` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Tutor` int(11) NOT NULL,
  `m8` varchar(50) NOT NULL,
  `m9` varchar(50) NOT NULL,
  `m10` varchar(50) NOT NULL,
  `m11` varchar(50) NOT NULL,
  `m12` varchar(50) NOT NULL,
  `m1` varchar(50) NOT NULL,
  `m2` varchar(50) NOT NULL,
  `m3` varchar(50) NOT NULL,
  `m4` varchar(50) NOT NULL,
  `m5` varchar(50) NOT NULL,
  `t8` varchar(50) NOT NULL,
  `t9` varchar(50) NOT NULL,
  `t10` varchar(50) NOT NULL,
  `t11` varchar(50) NOT NULL,
  `t12` varchar(50) NOT NULL,
  `t1` varchar(50) NOT NULL,
  `t2` varchar(50) NOT NULL,
  `t3` varchar(50) NOT NULL,
  `t4` varchar(50) NOT NULL,
  `t5` varchar(50) NOT NULL,
  `w8` varchar(50) NOT NULL,
  `w9` varchar(50) NOT NULL,
  `w10` varchar(50) NOT NULL,
  `w11` varchar(50) NOT NULL,
  `w12` varchar(50) NOT NULL,
  `w1` varchar(50) NOT NULL,
  `w2` varchar(50) NOT NULL,
  `w3` varchar(50) NOT NULL,
  `w4` varchar(50) NOT NULL,
  `w5` varchar(50) NOT NULL,
  `th8` varchar(50) NOT NULL,
  `th9` varchar(50) NOT NULL,
  `th10` varchar(50) NOT NULL,
  `th11` varchar(50) NOT NULL,
  `th12` varchar(50) NOT NULL,
  `th1` varchar(50) NOT NULL,
  `th2` varchar(50) NOT NULL,
  `th3` varchar(50) NOT NULL,
  `th4` varchar(50) NOT NULL,
  `th5` varchar(50) NOT NULL,
  `f8` varchar(50) NOT NULL,
  `f9` varchar(50) NOT NULL,
  `f10` varchar(50) NOT NULL,
  `f11` varchar(50) NOT NULL,
  `f12` varchar(50) NOT NULL,
  `f1` varchar(50) NOT NULL,
  `f2` varchar(50) NOT NULL,
  `f3` varchar(50) NOT NULL,
  `f4` varchar(50) NOT NULL,
  `f5` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Schedule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Id_Student` int(11) NOT NULL AUTO_INCREMENT,
  `Id_User` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `IC_No` varchar(30) NOT NULL,
  `Matric_No` varchar(30) NOT NULL,
  `Mobile_Phone` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Program` varchar(30) NOT NULL,
  `Semester` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Student`),
  KEY `Id` (`Id_Student`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE IF NOT EXISTS `student_class` (
  `Id_Student_Class` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Tutor` int(11) NOT NULL,
  `Id_Student` int(11) NOT NULL,
  `Id_Class` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`Id_Student_Class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE IF NOT EXISTS `tutor` (
  `Id_Tutor` int(11) NOT NULL AUTO_INCREMENT,
  `Id_User` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `IC_No` varchar(30) NOT NULL,
  `Staff_No` varchar(30) NOT NULL,
  `Mobile_Phone` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Program` varchar(30) NOT NULL,
  `Semester` varchar(20) NOT NULL,
  PRIMARY KEY (`Id_Tutor`),
  KEY `Id` (`Id_Tutor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id_User` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `User_Type` varchar(10) NOT NULL,
  `File_Name` varchar(100) NOT NULL,
  `Status` int(10) NOT NULL,
  PRIMARY KEY (`Id_User`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id_User`, `Username`, `Password`, `User_Type`, `File_Name`, `Status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1.jpg', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
