-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2013 at 11:09 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_master`
--

CREATE TABLE IF NOT EXISTS `faculty_master` (
  `Faculty_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Faculty_Name` varchar(20) NOT NULL,
  `Faculty_Email` varchar(20) NOT NULL,
  `Faculty_Mobile` varchar(10) NOT NULL,
  `Faculty_User` varchar(20) NOT NULL,
  `Faculty_Password` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`Faculty_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `faculty_master`
--

INSERT INTO `faculty_master` (`Faculty_Id`, `Faculty_Name`, `Faculty_Email`, `Faculty_Mobile`, `Faculty_User`, `Faculty_Password`, `Status`) VALUES
(3, 'Jayesh Patel', 'jayesh@gmail.com', '8778787878', 'jayesh', 'jayesh', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `question_master`
--

CREATE TABLE IF NOT EXISTS `question_master` (
  `Question_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Quiz_Id` int(11) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Question` varchar(200) NOT NULL,
  `Option1` varchar(100) NOT NULL,
  `Option2` varchar(100) NOT NULL,
  `Option3` varchar(100) NOT NULL,
  `Option4` varchar(100) NOT NULL,
  `Answer` varchar(100) NOT NULL,
  PRIMARY KEY (`Question_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `question_master`
--

INSERT INTO `question_master` (`Question_Id`, `Quiz_Id`, `Semester`, `Subject_Id`, `Question`, `Option1`, `Option2`, `Option3`, `Option4`, `Answer`) VALUES
(3, 4, '1', 2, 'What is Full Form of PHP?', 'Personal Home Page', 'Private Home Page', 'Public Home Page', 'Hypertext Preprocessor', 'Hypertext Preprocessor'),
(4, 4, '1', 2, 'GET is used to', 'Transfer Data Throgh Form', 'Transfer Data Throgh URL', 'Transfer Data Throgh Session', 'Transfer Data Throgh Cookie', 'Transfer Data Throgh URL'),
(5, 4, '1', 2, 'Which Function is used to connect with MySQL?', 'mysql_con', 'mysql_connect', 'mysql_connection', 'sql_connect', 'mysql_connect');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_category`
--

CREATE TABLE IF NOT EXISTS `quiz_category` (
  `Quiz_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Quiz_Name` varchar(20) NOT NULL,
  PRIMARY KEY (`Quiz_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `quiz_category`
--

INSERT INTO `quiz_category` (`Quiz_Id`, `Quiz_Name`) VALUES
(2, 'Mid Semester Exam'),
(3, 'Termwork Exam'),
(4, 'Final Sem Exam');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_schedule`
--

CREATE TABLE IF NOT EXISTS `quiz_schedule` (
  `Schedule_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Quiz_Id` int(11) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `QuizDate` date NOT NULL,
  `QuizTime` time NOT NULL,
  PRIMARY KEY (`Schedule_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `quiz_schedule`
--

INSERT INTO `quiz_schedule` (`Schedule_Id`, `Quiz_Id`, `Semester`, `Subject_Id`, `QuizDate`, `QuizTime`) VALUES
(1, 2, '1', 1, '2013-10-22', '09:00:00'),
(2, 4, '1', 2, '2013-10-23', '09:00:00'),
(3, 4, '2', 3, '2013-10-24', '09:00:00'),
(4, 2, '3', 4, '2013-10-25', '09:00:00'),
(5, 2, '4', 5, '2013-10-26', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `result_master`
--

CREATE TABLE IF NOT EXISTS `result_master` (
  `Result_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Exam_Id` int(11) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Student_Id` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Correct` int(11) NOT NULL,
  `Wrong` int(11) NOT NULL,
  `Result` int(11) NOT NULL,
  PRIMARY KEY (`Result_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `result_master`
--

INSERT INTO `result_master` (`Result_Id`, `Exam_Id`, `Subject_Id`, `Student_Id`, `Total`, `Correct`, `Wrong`, `Result`) VALUES
(6, 2, 1, 4, 2, 2, 0, 10),
(7, 2, 1, 4, 2, 0, 2, 0),
(8, 4, 2, 4, 3, 0, 3, 0),
(9, 4, 2, 4, 3, 2, 1, 10),
(10, 4, 2, 3, 3, 0, 3, 0),
(11, 4, 2, 3, 3, 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE IF NOT EXISTS `student_registration` (
  `Student_Id` int(11) NOT NULL AUTO_INCREMENT,
  `RollNumber` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`Student_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`Student_Id`, `RollNumber`, `Name`, `Semester`, `Email`, `Mobile`, `UserName`, `Password`, `Status`) VALUES
(3, 'MCA01001', 'Patel Jagruti', '1', 'jagruti@gmail.com', '9898989898', 'jagruti', 'jagruti', 'Active'),
(4, 'MCA01002', 'Patel Monika', '1', 'monika@gmail.com', '7878787878', 'monika', 'monika', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE IF NOT EXISTS `subject_master` (
  `Subject_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject_Name` varchar(30) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  PRIMARY KEY (`Subject_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`Subject_Id`, `Subject_Name`, `Semester`) VALUES
(2, 'PHP', '1'),
(3, 'JAVA', '2'),
(4, 'VB.NET', '3'),
(5, 'Android', '4');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(20) NOT NULL,
  `User_Password` varchar(20) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`User_Id`, `User_Name`, `User_Password`) VALUES
(1, 'admin', 'admin');
