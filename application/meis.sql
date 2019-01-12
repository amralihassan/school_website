-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2018 at 02:31 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meis`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` int(11) NOT NULL,
  `dateAbsence` date NOT NULL,
  `stuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `dateAbsence`, `stuID`) VALUES
(1, '2018-11-15', 5);

-- --------------------------------------------------------

--
-- Table structure for table `academicyear`
--

CREATE TABLE `academicyear` (
  `yearID` int(11) NOT NULL,
  `acadYear` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `fullName` varchar(75) DEFAULT NULL,
  `job` varchar(45) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `status` varchar(12) DEFAULT NULL,
  `accounts` varchar(10) DEFAULT NULL,
  `agenda` varchar(10) DEFAULT NULL,
  `attendance` varchar(10) DEFAULT NULL,
  `exam` varchar(10) DEFAULT NULL,
  `homework` varchar(10) DEFAULT NULL,
  `marks` varchar(10) DEFAULT NULL,
  `sheets` varchar(10) DEFAULT NULL,
  `timetable` varchar(10) DEFAULT NULL,
  `transportation` varchar(10) DEFAULT NULL,
  `loginlevel` varchar(25) DEFAULT NULL,
  `mail` varchar(10) DEFAULT NULL,
  `idCard` varchar(15) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `fp` int(11) DEFAULT NULL,
  `no_msg` varchar(10) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `calendar` varchar(10) DEFAULT NULL,
  `uniform` varchar(10) DEFAULT NULL,
  `supplies` varchar(10) DEFAULT NULL,
  `payments` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_admin`, `fullName`, `job`, `mobile`, `photo`, `username`, `password`, `status`, `accounts`, `agenda`, `attendance`, `exam`, `homework`, `marks`, `sheets`, `timetable`, `transportation`, `loginlevel`, `mail`, `idCard`, `role`, `fp`, `no_msg`, `department`, `calendar`, `uniform`, `supplies`, `payments`, `gender`) VALUES
(2, 'Amr Ali Hassan', 'Web Development PHP', '01027266631', 'avatar51.png', 'admin', '$2y$10$Bhg3jZ5CNcadL.iurvzshOtAlz3mUkCahbdWU2SXClIXl4QFjpp9O', 'Enable', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'Super Administrator', 'TRUE', '0', 'Administrative', 1, 'Yes', 'IT', 'TRUE', 'TRUE', 'TRUE', 'TRUE', 'Male'),
(3, 'Soha', 'Housewife', '010', NULL, 'soha', '$2y$10$DZpFkDPq4NQiZQCmJPDsLefNOiRxFJv7BSfxxAYyqno4t8QUgnm3y', 'Enable', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345', 'Parent', NULL, 'Yes', NULL, NULL, NULL, NULL, NULL, 'Female'),
(5, 'Muhammad Bakr', 'Math Teacher', '010', NULL, 'mohammad', '$2y$10$1ElE0JHo8.7TiHBJZuJaaupui2bgRwDS4pMiVgXGcasIiqHLAia8e', 'Enable', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Member', NULL, '1212', 'Teacher', 152, 'Yes', 'Mathematics', NULL, NULL, NULL, NULL, 'Male'),
(6, 'Mona', 'fgfg', '4255', NULL, 'moan', '$2y$10$HMF5.2XeNdvTnW2ag6./bOZjl7GCNqP1MNwxtKgUwyM0UPy.gRGOi', 'Enable', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '555', 'Parent', 0, 'Yes', '', NULL, NULL, NULL, NULL, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `agendaID` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(25) NOT NULL,
  `divisionID` int(11) NOT NULL,
  `gradeID` int(11) NOT NULL,
  `share` varchar(10) NOT NULL,
  `accID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `agenda_details`
-- (See below for the actual view)
--
CREATE TABLE `agenda_details` (
`agendaID` int(11)
,`date` date
,`title` varchar(25)
,`divisionID` int(11)
,`gradeID` int(11)
,`share` varchar(10)
,`accID` int(11)
,`divisionName` varchar(30)
,`gradeName` varchar(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `divisionID` int(11) NOT NULL,
  `divisionName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`divisionID`, `divisionName`) VALUES
(2, 'Semi-International'),
(3, 'British Education'),
(4, 'National');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `divisionID` int(11) NOT NULL,
  `gradeID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `dateExam` date NOT NULL,
  `examName` varchar(30) NOT NULL,
  `from_hour` varchar(2) NOT NULL,
  `from_minute` varchar(2) NOT NULL,
  `to_hour` varchar(2) NOT NULL,
  `to_minute` varchar(2) NOT NULL,
  `day_status1` varchar(2) NOT NULL,
  `day_status2` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `exam_full_data`
-- (See below for the actual view)
--
CREATE TABLE `exam_full_data` (
`id` int(11)
,`divisionID` int(11)
,`gradeID` int(11)
,`subjectID` int(11)
,`dateExam` date
,`examName` varchar(30)
,`from_hour` varchar(2)
,`from_minute` varchar(2)
,`to_hour` varchar(2)
,`to_minute` varchar(2)
,`day_status1` varchar(2)
,`day_status2` varchar(2)
,`divisionName` varchar(30)
,`gradeName` varchar(25)
,`subjectName` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `exam_full_data_student`
-- (See below for the actual view)
--
CREATE TABLE `exam_full_data_student` (
`id` int(11)
,`divisionID` int(11)
,`gradeID` int(11)
,`subjectID` int(11)
,`dateExam` date
,`examName` varchar(30)
,`from_hour` varchar(2)
,`from_minute` varchar(2)
,`to_hour` varchar(2)
,`to_minute` varchar(2)
,`day_status1` varchar(2)
,`day_status2` varchar(2)
,`divisionName` varchar(30)
,`gradeName` varchar(25)
,`subjectName` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `full_data_payments`
-- (See below for the actual view)
--
CREATE TABLE `full_data_payments` (
`id` int(11)
,`date_action` date
,`student_ID` varchar(25)
,`amount` int(11)
,`reason` varchar(25)
,`receipt_no` varchar(20)
,`stuID` int(11)
,`arabicName` varchar(75)
,`englishName` varchar(75)
,`studentID` varchar(15)
,`Nationality` varchar(25)
,`divisionID` int(11)
,`gradeID` int(11)
,`roomID` int(11)
,`studentIDcard` varchar(25)
,`fatherIDcard` varchar(25)
,`fatherJob` varchar(20)
,`motherName` varchar(75)
,`status` varchar(10)
,`username` varchar(45)
,`password` varchar(75)
,`fatherMobile` varchar(15)
,`motherMobile` varchar(15)
,`student_status` varchar(15)
,`secondLanguage` varchar(15)
,`stage` varchar(30)
,`start_school` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `full_login_details`
-- (See below for the actual view)
--
CREATE TABLE `full_login_details` (
`id_admin` int(11)
,`fullName` varchar(75)
,`job` varchar(45)
,`mobile` varchar(15)
,`photo` varchar(50)
,`username` varchar(50)
,`password` varchar(75)
,`status` varchar(12)
,`accounts` varchar(10)
,`agenda` varchar(10)
,`attendance` varchar(10)
,`exam` varchar(10)
,`homework` varchar(10)
,`marks` varchar(10)
,`sheets` varchar(10)
,`timetable` varchar(10)
,`transportation` varchar(10)
,`loginlevel` varchar(25)
,`mail` varchar(10)
,`idCard` varchar(15)
,`role` varchar(20)
,`fp` int(11)
,`no_msg` varchar(10)
,`department` varchar(20)
,`calendar` varchar(10)
,`uniform` varchar(10)
,`supplies` varchar(10)
,`payments` varchar(10)
,`gender` varchar(10)
,`login_details_id` int(11)
,`last_activity` timestamp
,`user_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `full_mail_trash`
-- (See below for the actual view)
--
CREATE TABLE `full_mail_trash` (
`mailID` int(11)
,`mailDate` timestamp
,`sender` int(11)
,`reciver` int(11)
,`subject` varchar(50)
,`bodyMessage` text
,`senderName` varchar(75)
,`readStatus` int(11)
,`file_name` varchar(50)
,`photo` varchar(50)
,`id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `generalsetting`
--

CREATE TABLE `generalsetting` (
  `id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mob1` varchar(15) NOT NULL,
  `mob2` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `fb` varchar(75) NOT NULL,
  `sitename` varchar(50) NOT NULL,
  `sitename_shortcut` varchar(15) NOT NULL,
  `sitename_contacts` varchar(30) NOT NULL,
  `link1` varchar(100) NOT NULL,
  `link2` varchar(100) NOT NULL,
  `link3` varchar(100) NOT NULL,
  `byUsername` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `gradeID` int(11) NOT NULL,
  `gradeName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`gradeID`, `gradeName`) VALUES
(1, 'Pre-School'),
(2, 'Foundation 1'),
(3, 'Foundation 2'),
(4, 'Grade 1'),
(5, 'Grade 2');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `date_holiday` date NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `hwID` int(11) NOT NULL,
  `dateHW` date NOT NULL,
  `roomID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `Details` varchar(250) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `file_name` varchar(45) NOT NULL,
  `gradable` varchar(5) DEFAULT 'False'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`hwID`, `dateHW`, `roomID`, `subjectID`, `Details`, `id_admin`, `file_name`, `gradable`) VALUES
(7, '2018-11-15', 2, 1, 'sssssssssss', 2, '', NULL),
(8, '2018-11-15', 2, 1, 'Text mining, also referred to as text data mining, roughly equivalent to text analytics, is the process of deriving high-quality information from text. High-quality information is typically derived through the devising of patterns and trends through ', 2, 'New_Microsoft_Word_Document.docx', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `homework_gradable`
--

CREATE TABLE `homework_gradable` (
  `id` int(11) NOT NULL,
  `stuID` int(11) NOT NULL,
  `hwID` int(11) NOT NULL,
  `fullMark` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `statusMark` varchar(12) NOT NULL,
  `notes` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homework_gradable`
--

INSERT INTO `homework_gradable` (`id`, `stuID`, `hwID`, `fullMark`, `mark`, `statusMark`, `notes`) VALUES
(13, 3, 8, 10, 9, 'Excellent', '5'),
(14, 4, 8, 10, 15, 'Very Good', '5'),
(15, 5, 8, 10, 2, 'Good', '5'),
(16, 3, 8, 100, 99, 'Excellent', 'Perfect'),
(17, 4, 8, 100, 89, 'Very Good', 'Thanks'),
(18, 5, 8, 100, 75, 'Good', 'Need to improve');

-- --------------------------------------------------------

--
-- Stand-in structure for view `homework_room_subject`
-- (See below for the actual view)
--
CREATE TABLE `homework_room_subject` (
`hwID` int(11)
,`dateHW` date
,`roomID` int(11)
,`subjectID` int(11)
,`Details` varchar(250)
,`id_admin` int(11)
,`file_name` varchar(45)
,`gradable` varchar(5)
,`subjectName` varchar(25)
,`roomName` varchar(25)
,`fullName` varchar(75)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `homework_student`
-- (See below for the actual view)
--
CREATE TABLE `homework_student` (
`hwID` int(11)
,`dateHW` date
,`roomID` int(11)
,`subjectID` int(11)
,`Details` varchar(250)
,`id_admin` int(11)
,`file_name` varchar(45)
,`gradable` varchar(5)
,`stuID` int(11)
,`englishName` varchar(75)
);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`) VALUES
(14, 2, '2018-11-14 20:24:12'),
(15, 3, '2018-11-14 20:26:21'),
(16, 5, '2018-11-14 20:49:29'),
(17, 2, '2018-11-14 22:33:59'),
(18, 2, '2018-11-15 13:00:32'),
(19, 2, '2018-11-15 13:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mailID` int(11) NOT NULL,
  `mailDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sender` int(11) NOT NULL,
  `reciver` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `bodyMessage` text NOT NULL,
  `senderName` varchar(75) NOT NULL,
  `readStatus` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mailID`, `mailDate`, `sender`, `reciver`, `subject`, `bodyMessage`, `senderName`, `readStatus`, `file_name`) VALUES
(7, '2018-11-14 19:43:46', 2, 5, 'Thank you', 'Thank you Mr. Muahammad\r\namr                   \r\n                      ', 'Amr Ali Hassan', 1, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `mailbox`
-- (See below for the actual view)
--
CREATE TABLE `mailbox` (
`mailID` int(11)
,`mailDate` timestamp
,`sender` int(11)
,`reciver` int(11)
,`subject` varchar(50)
,`bodyMessage` text
,`senderName` varchar(75)
,`readStatus` int(11)
,`file_name` varchar(50)
,`photo` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `mail_trash`
--

CREATE TABLE `mail_trash` (
  `id` int(11) NOT NULL,
  `mailID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `mail_with_photo`
-- (See below for the actual view)
--
CREATE TABLE `mail_with_photo` (
`mailID` int(11)
,`mailDate` timestamp
,`sender` int(11)
,`reciver` int(11)
,`subject` varchar(50)
,`bodyMessage` text
,`senderName` varchar(75)
,`readStatus` int(11)
,`file_name` varchar(50)
,`photo` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `notication`
--

CREATE TABLE `notication` (
  `id` int(11) NOT NULL,
  `date_notify` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post` varchar(500) NOT NULL,
  `userID` int(11) NOT NULL,
  `share` varchar(15) NOT NULL,
  `file_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notication`
--

INSERT INTO `notication` (`id`, `date_notify`, `post`, `userID`, `share`, `file_name`) VALUES
(9, '2018-11-14 20:24:28', '               sssssssssssss                     \r\n                                ', 2, 'Public', ''),
(10, '2018-11-14 20:24:44', '        sssssssssssssssaaaaaaaaa                            \r\n                                ', 2, 'Private', ''),
(11, '2018-11-14 20:25:24', 'aaaaaaaaaa                                    \r\n                                ', 2, 'Public', 'Scenery_in_Plateau_by_Arto_Marttinen.jpg'),
(12, '2018-11-14 20:26:01', 'National                                    \r\n                                ', 2, 'Private', 'Flying_Whale_by_Shu_Le.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `notification_private_post`
-- (See below for the actual view)
--
CREATE TABLE `notification_private_post` (
`id` int(11)
,`date_notify` timestamp
,`post` varchar(500)
,`userID` int(11)
,`share` varchar(15)
,`file_name` varchar(75)
,`privateID` int(11)
,`divisionID` int(11)
,`gradeID` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `notify_private_div_gra`
-- (See below for the actual view)
--
CREATE TABLE `notify_private_div_gra` (
`id` int(11)
,`date_notify` timestamp
,`post` varchar(500)
,`userID` int(11)
,`share` varchar(15)
,`file_name` varchar(75)
,`privateID` int(11)
,`divisionID` int(11)
,`gradeID` int(11)
,`divisionName` varchar(30)
,`gradeName` varchar(25)
,`photo` varchar(50)
,`department` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `parent_notification`
-- (See below for the actual view)
--
CREATE TABLE `parent_notification` (
`idCard` varchar(15)
,`divisionName` varchar(30)
,`gradeName` varchar(25)
,`roomName` varchar(25)
,`id` int(11)
,`date_notify` timestamp
,`post` varchar(500)
,`userID` int(11)
,`share` varchar(15)
,`file_name` varchar(75)
,`privateID` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `date_action` date NOT NULL,
  `student_ID` varchar(25) NOT NULL,
  `amount` int(11) NOT NULL,
  `reason` varchar(25) NOT NULL,
  `receipt_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `private_post`
--

CREATE TABLE `private_post` (
  `privateID` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `divisionID` int(11) NOT NULL,
  `gradeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `private_post`
--

INSERT INTO `private_post` (`privateID`, `id_post`, `divisionID`, `gradeID`) VALUES
(6, 10, 2, 1),
(7, 12, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` int(11) NOT NULL,
  `roomName` varchar(25) NOT NULL,
  `divisionID` int(11) NOT NULL,
  `gradeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `roomName`, `divisionID`, `gradeID`) VALUES
(1, 'Semi F2-A', 2, 3),
(2, 'Grade 1 IG', 3, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `room_division_grade`
-- (See below for the actual view)
--
CREATE TABLE `room_division_grade` (
`roomID` int(11)
,`roomName` varchar(25)
,`divisionID` int(11)
,`gradeID` int(11)
,`divisionName` varchar(30)
,`gradeName` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sents_messages`
-- (See below for the actual view)
--
CREATE TABLE `sents_messages` (
`mailID` int(11)
,`mailDate` timestamp
,`sender` int(11)
,`reciver` int(11)
,`subject` varchar(50)
,`bodyMessage` text
,`senderName` varchar(75)
,`readStatus` int(11)
,`file_name` varchar(50)
,`id_admin` int(11)
,`fullName` varchar(75)
,`job` varchar(45)
,`mobile` varchar(15)
,`photo` varchar(50)
,`no_msg` varchar(10)
,`department` varchar(20)
,`role` varchar(20)
,`loginlevel` varchar(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `sheet`
--

CREATE TABLE `sheet` (
  `id` int(11) NOT NULL,
  `dateUpload` date NOT NULL,
  `divisionID` int(11) NOT NULL,
  `gradeID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `sheetName` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `accID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `sheet_division_grade`
-- (See below for the actual view)
--
CREATE TABLE `sheet_division_grade` (
`id` int(11)
,`dateUpload` date
,`divisionID` int(11)
,`gradeID` int(11)
,`subjectID` int(11)
,`sheetName` int(11)
,`file_name` varchar(100)
,`accID` int(11)
,`divisionName` varchar(30)
,`gradeName` varchar(25)
,`subjectName` varchar(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stuID` int(11) NOT NULL,
  `arabicName` varchar(75) NOT NULL,
  `englishName` varchar(75) NOT NULL,
  `studentID` varchar(15) NOT NULL,
  `Nationality` varchar(25) NOT NULL,
  `divisionID` int(11) NOT NULL,
  `gradeID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `studentIDcard` varchar(25) NOT NULL,
  `fatherIDcard` varchar(25) NOT NULL,
  `fatherJob` varchar(20) NOT NULL,
  `motherName` varchar(75) NOT NULL,
  `status` varchar(10) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(75) NOT NULL,
  `fatherMobile` varchar(15) NOT NULL,
  `motherMobile` varchar(15) NOT NULL,
  `student_status` varchar(15) NOT NULL,
  `secondLanguage` varchar(15) NOT NULL,
  `stage` varchar(30) NOT NULL,
  `start_school` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stuID`, `arabicName`, `englishName`, `studentID`, `Nationality`, `divisionID`, `gradeID`, `roomID`, `studentIDcard`, `fatherIDcard`, `fatherJob`, `motherName`, `status`, `username`, `password`, `fatherMobile`, `motherMobile`, `student_status`, `secondLanguage`, `stage`, `start_school`) VALUES
(3, 'احمد', 'Ahmed', '', '', 3, 4, 2, '', '2468', '', '', '', '', '', '', '', '', '', '', '2018-11-13'),
(4, 'احمد', 'Ahmad', '5487777', 'Egyptin', 3, 4, 2, '525544', '12345', 'doctor', 'Soha', 'Enable', 'ahmed', '$2y$10$NUfQ9mVI3dv/co45GOUMruBwfaZX8FJ5O4mE1J7/FQ.ljE.2REvu6', '010', '012', 'New', 'French', 'Primary(1-3)', '2018-11-14'),
(5, 'محمد احمد', 'Mohammed', '927497', 'Egyptian', 3, 4, 2, '6462462', '555', 'ddgdg', 'Mona', 'Enable', 'mo', '$2y$10$L9.zqx4HRQ9z8XRRNEfnBeKUcJvWuqfQNTk4JCehIRb8nnaFYUJD6', '011', '012', 'New', 'French', 'Primary(1-3)', '2018-10-01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_parent`
-- (See below for the actual view)
--
CREATE TABLE `student_parent` (
`stuID` int(11)
,`arabicName` varchar(75)
,`englishName` varchar(75)
,`studentID` varchar(15)
,`Nationality` varchar(25)
,`divisionID` int(11)
,`gradeID` int(11)
,`roomID` int(11)
,`studentIDcard` varchar(25)
,`fatherIDcard` varchar(25)
,`fatherJob` varchar(20)
,`motherName` varchar(75)
,`status` varchar(10)
,`username` varchar(45)
,`password` varchar(75)
,`fatherMobile` varchar(15)
,`motherMobile` varchar(15)
,`student_status` varchar(15)
,`secondLanguage` varchar(15)
,`stage` varchar(30)
,`start_school` date
,`id_admin` int(11)
,`fullName` varchar(75)
,`idCard` varchar(15)
,`mobile` varchar(15)
,`job` varchar(45)
,`photo` varchar(50)
,`divisionName` varchar(30)
,`gradeName` varchar(25)
,`roomName` varchar(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int(11) NOT NULL,
  `subjectName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectName`) VALUES
(1, 'Mathateics');

-- --------------------------------------------------------

--
-- Table structure for table `teacherjobs`
--

CREATE TABLE `teacherjobs` (
  `id` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `divisionID` int(11) NOT NULL,
  `gradeID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacherjobs`
--

INSERT INTO `teacherjobs` (`id`, `teacherID`, `divisionID`, `gradeID`, `roomID`, `subjectID`) VALUES
(1, 5, 3, 4, 2, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `teacherjobs_full_data`
-- (See below for the actual view)
--
CREATE TABLE `teacherjobs_full_data` (
`id_admin` int(11)
,`fullName` varchar(75)
,`job` varchar(45)
,`mobile` varchar(15)
,`photo` varchar(50)
,`username` varchar(50)
,`password` varchar(75)
,`status` varchar(12)
,`accounts` varchar(10)
,`agenda` varchar(10)
,`attendance` varchar(10)
,`exam` varchar(10)
,`homework` varchar(10)
,`marks` varchar(10)
,`sheets` varchar(10)
,`timetable` varchar(10)
,`transportation` varchar(10)
,`loginlevel` varchar(25)
,`mail` varchar(10)
,`idCard` varchar(15)
,`role` varchar(20)
,`fp` int(11)
,`no_msg` varchar(10)
,`department` varchar(20)
,`calendar` varchar(10)
,`uniform` varchar(10)
,`supplies` varchar(10)
,`payments` varchar(10)
,`gender` varchar(10)
,`divisionName` varchar(30)
,`gradeName` varchar(25)
,`roomName` varchar(25)
,`subjectName` varchar(25)
,`id` int(11)
,`teacherID` int(11)
,`divisionID` int(11)
,`gradeID` int(11)
,`roomID` int(11)
,`subjectID` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `uniform`
--

CREATE TABLE `uniform` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `agenda_details`
--
DROP TABLE IF EXISTS `agenda_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `agenda_details`  AS  select `agenda`.`agendaID` AS `agendaID`,`agenda`.`date` AS `date`,`agenda`.`title` AS `title`,`agenda`.`divisionID` AS `divisionID`,`agenda`.`gradeID` AS `gradeID`,`agenda`.`share` AS `share`,`agenda`.`accID` AS `accID`,`division`.`divisionName` AS `divisionName`,`grade`.`gradeName` AS `gradeName` from ((`agenda` join `division` on((`agenda`.`divisionID` = `division`.`divisionID`))) join `grade` on((`agenda`.`gradeID` = `grade`.`gradeID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `exam_full_data`
--
DROP TABLE IF EXISTS `exam_full_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `exam_full_data`  AS  select `exam`.`id` AS `id`,`exam`.`divisionID` AS `divisionID`,`exam`.`gradeID` AS `gradeID`,`exam`.`subjectID` AS `subjectID`,`exam`.`dateExam` AS `dateExam`,`exam`.`examName` AS `examName`,`exam`.`from_hour` AS `from_hour`,`exam`.`from_minute` AS `from_minute`,`exam`.`to_hour` AS `to_hour`,`exam`.`to_minute` AS `to_minute`,`exam`.`day_status1` AS `day_status1`,`exam`.`day_status2` AS `day_status2`,`division`.`divisionName` AS `divisionName`,`grade`.`gradeName` AS `gradeName`,`subject`.`subjectName` AS `subjectName` from (((`exam` join `division` on((`exam`.`divisionID` = `division`.`divisionID`))) join `grade` on((`exam`.`gradeID` = `grade`.`gradeID`))) join `subject` on((`exam`.`subjectID` = `subject`.`subjectID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `exam_full_data_student`
--
DROP TABLE IF EXISTS `exam_full_data_student`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `exam_full_data_student`  AS  select `exam`.`id` AS `id`,`exam`.`divisionID` AS `divisionID`,`exam`.`gradeID` AS `gradeID`,`exam`.`subjectID` AS `subjectID`,`exam`.`dateExam` AS `dateExam`,`exam`.`examName` AS `examName`,`exam`.`from_hour` AS `from_hour`,`exam`.`from_minute` AS `from_minute`,`exam`.`to_hour` AS `to_hour`,`exam`.`to_minute` AS `to_minute`,`exam`.`day_status1` AS `day_status1`,`exam`.`day_status2` AS `day_status2`,`division`.`divisionName` AS `divisionName`,`grade`.`gradeName` AS `gradeName`,`subject`.`subjectName` AS `subjectName` from ((((`exam` join `division` on((`exam`.`divisionID` = `division`.`divisionID`))) join `grade` on((`exam`.`gradeID` = `grade`.`gradeID`))) join `subject` on((`exam`.`subjectID` = `subject`.`subjectID`))) join `student` on(((`exam`.`divisionID` = `student`.`divisionID`) and (`exam`.`gradeID` = `student`.`gradeID`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `full_data_payments`
--
DROP TABLE IF EXISTS `full_data_payments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `full_data_payments`  AS  select `payments`.`id` AS `id`,`payments`.`date_action` AS `date_action`,`payments`.`student_ID` AS `student_ID`,`payments`.`amount` AS `amount`,`payments`.`reason` AS `reason`,`payments`.`receipt_no` AS `receipt_no`,`student`.`stuID` AS `stuID`,`student`.`arabicName` AS `arabicName`,`student`.`englishName` AS `englishName`,`student`.`studentID` AS `studentID`,`student`.`Nationality` AS `Nationality`,`student`.`divisionID` AS `divisionID`,`student`.`gradeID` AS `gradeID`,`student`.`roomID` AS `roomID`,`student`.`studentIDcard` AS `studentIDcard`,`student`.`fatherIDcard` AS `fatherIDcard`,`student`.`fatherJob` AS `fatherJob`,`student`.`motherName` AS `motherName`,`student`.`status` AS `status`,`student`.`username` AS `username`,`student`.`password` AS `password`,`student`.`fatherMobile` AS `fatherMobile`,`student`.`motherMobile` AS `motherMobile`,`student`.`student_status` AS `student_status`,`student`.`secondLanguage` AS `secondLanguage`,`student`.`stage` AS `stage`,`student`.`start_school` AS `start_school` from (`payments` join `student` on((`payments`.`student_ID` = `student`.`studentID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `full_login_details`
--
DROP TABLE IF EXISTS `full_login_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `full_login_details`  AS  select `administrator`.`id_admin` AS `id_admin`,`administrator`.`fullName` AS `fullName`,`administrator`.`job` AS `job`,`administrator`.`mobile` AS `mobile`,`administrator`.`photo` AS `photo`,`administrator`.`username` AS `username`,`administrator`.`password` AS `password`,`administrator`.`status` AS `status`,`administrator`.`accounts` AS `accounts`,`administrator`.`agenda` AS `agenda`,`administrator`.`attendance` AS `attendance`,`administrator`.`exam` AS `exam`,`administrator`.`homework` AS `homework`,`administrator`.`marks` AS `marks`,`administrator`.`sheets` AS `sheets`,`administrator`.`timetable` AS `timetable`,`administrator`.`transportation` AS `transportation`,`administrator`.`loginlevel` AS `loginlevel`,`administrator`.`mail` AS `mail`,`administrator`.`idCard` AS `idCard`,`administrator`.`role` AS `role`,`administrator`.`fp` AS `fp`,`administrator`.`no_msg` AS `no_msg`,`administrator`.`department` AS `department`,`administrator`.`calendar` AS `calendar`,`administrator`.`uniform` AS `uniform`,`administrator`.`supplies` AS `supplies`,`administrator`.`payments` AS `payments`,`administrator`.`gender` AS `gender`,`login_details`.`login_details_id` AS `login_details_id`,`login_details`.`last_activity` AS `last_activity`,`login_details`.`user_id` AS `user_id` from (`administrator` join `login_details` on((`administrator`.`id_admin` = `login_details`.`user_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `full_mail_trash`
--
DROP TABLE IF EXISTS `full_mail_trash`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `full_mail_trash`  AS  select `mail_with_photo`.`mailID` AS `mailID`,`mail_with_photo`.`mailDate` AS `mailDate`,`mail_with_photo`.`sender` AS `sender`,`mail_with_photo`.`reciver` AS `reciver`,`mail_with_photo`.`subject` AS `subject`,`mail_with_photo`.`bodyMessage` AS `bodyMessage`,`mail_with_photo`.`senderName` AS `senderName`,`mail_with_photo`.`readStatus` AS `readStatus`,`mail_with_photo`.`file_name` AS `file_name`,`mail_with_photo`.`photo` AS `photo`,`mail_trash`.`id` AS `id` from (`mail_with_photo` join `mail_trash` on((`mail_with_photo`.`mailID` = `mail_trash`.`mailID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `homework_room_subject`
--
DROP TABLE IF EXISTS `homework_room_subject`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `homework_room_subject`  AS  select `homework`.`hwID` AS `hwID`,`homework`.`dateHW` AS `dateHW`,`homework`.`roomID` AS `roomID`,`homework`.`subjectID` AS `subjectID`,`homework`.`Details` AS `Details`,`homework`.`id_admin` AS `id_admin`,`homework`.`file_name` AS `file_name`,`homework`.`gradable` AS `gradable`,`subject`.`subjectName` AS `subjectName`,`room`.`roomName` AS `roomName`,`administrator`.`fullName` AS `fullName` from (((`homework` join `room` on((`homework`.`roomID` = `room`.`roomID`))) join `subject` on((`homework`.`subjectID` = `subject`.`subjectID`))) join `administrator` on((`homework`.`id_admin` = `administrator`.`id_admin`))) ;

-- --------------------------------------------------------

--
-- Structure for view `homework_student`
--
DROP TABLE IF EXISTS `homework_student`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `homework_student`  AS  select `homework`.`hwID` AS `hwID`,`homework`.`dateHW` AS `dateHW`,`homework`.`roomID` AS `roomID`,`homework`.`subjectID` AS `subjectID`,`homework`.`Details` AS `Details`,`homework`.`id_admin` AS `id_admin`,`homework`.`file_name` AS `file_name`,`homework`.`gradable` AS `gradable`,`student`.`stuID` AS `stuID`,`student`.`englishName` AS `englishName` from (`homework` join `student` on((`homework`.`roomID` = `student`.`roomID`))) where ((`homework`.`roomID` = 2) and (`homework`.`hwID` = 8)) ;

-- --------------------------------------------------------

--
-- Structure for view `mailbox`
--
DROP TABLE IF EXISTS `mailbox`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mailbox`  AS  select `mail_with_photo`.`mailID` AS `mailID`,`mail_with_photo`.`mailDate` AS `mailDate`,`mail_with_photo`.`sender` AS `sender`,`mail_with_photo`.`reciver` AS `reciver`,`mail_with_photo`.`subject` AS `subject`,`mail_with_photo`.`bodyMessage` AS `bodyMessage`,`mail_with_photo`.`senderName` AS `senderName`,`mail_with_photo`.`readStatus` AS `readStatus`,`mail_with_photo`.`file_name` AS `file_name`,`mail_with_photo`.`photo` AS `photo` from `mail_with_photo` where (not(`mail_with_photo`.`mailID` in (select `mail_trash`.`mailID` from `mail_trash`))) order by `mail_with_photo`.`mailDate` desc ;

-- --------------------------------------------------------

--
-- Structure for view `mail_with_photo`
--
DROP TABLE IF EXISTS `mail_with_photo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mail_with_photo`  AS  select `mail`.`mailID` AS `mailID`,`mail`.`mailDate` AS `mailDate`,`mail`.`sender` AS `sender`,`mail`.`reciver` AS `reciver`,`mail`.`subject` AS `subject`,`mail`.`bodyMessage` AS `bodyMessage`,`mail`.`senderName` AS `senderName`,`mail`.`readStatus` AS `readStatus`,`mail`.`file_name` AS `file_name`,`administrator`.`photo` AS `photo` from (`mail` join `administrator` on((`mail`.`sender` = `administrator`.`id_admin`))) ;

-- --------------------------------------------------------

--
-- Structure for view `notification_private_post`
--
DROP TABLE IF EXISTS `notification_private_post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `notification_private_post`  AS  select `notication`.`id` AS `id`,`notication`.`date_notify` AS `date_notify`,`notication`.`post` AS `post`,`notication`.`userID` AS `userID`,`notication`.`share` AS `share`,`notication`.`file_name` AS `file_name`,`private_post`.`privateID` AS `privateID`,`private_post`.`divisionID` AS `divisionID`,`private_post`.`gradeID` AS `gradeID` from (`notication` left join `private_post` on((`notication`.`id` = `private_post`.`id_post`))) ;

-- --------------------------------------------------------

--
-- Structure for view `notify_private_div_gra`
--
DROP TABLE IF EXISTS `notify_private_div_gra`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `notify_private_div_gra`  AS  select `notification_private_post`.`id` AS `id`,`notification_private_post`.`date_notify` AS `date_notify`,`notification_private_post`.`post` AS `post`,`notification_private_post`.`userID` AS `userID`,`notification_private_post`.`share` AS `share`,`notification_private_post`.`file_name` AS `file_name`,`notification_private_post`.`privateID` AS `privateID`,`notification_private_post`.`divisionID` AS `divisionID`,`notification_private_post`.`gradeID` AS `gradeID`,`division`.`divisionName` AS `divisionName`,`grade`.`gradeName` AS `gradeName`,`administrator`.`photo` AS `photo`,`administrator`.`department` AS `department` from (((`notification_private_post` left join `division` on((`notification_private_post`.`divisionID` = `division`.`divisionID`))) left join `grade` on((`notification_private_post`.`gradeID` = `grade`.`gradeID`))) join `administrator` on((`notification_private_post`.`userID` = `administrator`.`id_admin`))) ;

-- --------------------------------------------------------

--
-- Structure for view `parent_notification`
--
DROP TABLE IF EXISTS `parent_notification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `parent_notification`  AS  select `student_parent`.`idCard` AS `idCard`,`student_parent`.`divisionName` AS `divisionName`,`student_parent`.`gradeName` AS `gradeName`,`student_parent`.`roomName` AS `roomName`,`notify_private_div_gra`.`id` AS `id`,`notify_private_div_gra`.`date_notify` AS `date_notify`,`notify_private_div_gra`.`post` AS `post`,`notify_private_div_gra`.`userID` AS `userID`,`notify_private_div_gra`.`share` AS `share`,`notify_private_div_gra`.`file_name` AS `file_name`,`notify_private_div_gra`.`privateID` AS `privateID` from (`notify_private_div_gra` join `student_parent` on(1)) ;

-- --------------------------------------------------------

--
-- Structure for view `room_division_grade`
--
DROP TABLE IF EXISTS `room_division_grade`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `room_division_grade`  AS  select `room`.`roomID` AS `roomID`,`room`.`roomName` AS `roomName`,`room`.`divisionID` AS `divisionID`,`room`.`gradeID` AS `gradeID`,`division`.`divisionName` AS `divisionName`,`grade`.`gradeName` AS `gradeName` from ((`room` join `division` on((`room`.`divisionID` = `division`.`divisionID`))) join `grade` on((`room`.`gradeID` = `grade`.`gradeID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `sents_messages`
--
DROP TABLE IF EXISTS `sents_messages`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sents_messages`  AS  select `mail`.`mailID` AS `mailID`,`mail`.`mailDate` AS `mailDate`,`mail`.`sender` AS `sender`,`mail`.`reciver` AS `reciver`,`mail`.`subject` AS `subject`,`mail`.`bodyMessage` AS `bodyMessage`,`mail`.`senderName` AS `senderName`,`mail`.`readStatus` AS `readStatus`,`mail`.`file_name` AS `file_name`,`administrator`.`id_admin` AS `id_admin`,`administrator`.`fullName` AS `fullName`,`administrator`.`job` AS `job`,`administrator`.`mobile` AS `mobile`,`administrator`.`photo` AS `photo`,`administrator`.`no_msg` AS `no_msg`,`administrator`.`department` AS `department`,`administrator`.`role` AS `role`,`administrator`.`loginlevel` AS `loginlevel` from (`mail` join `administrator` on((`mail`.`reciver` = `administrator`.`id_admin`))) ;

-- --------------------------------------------------------

--
-- Structure for view `sheet_division_grade`
--
DROP TABLE IF EXISTS `sheet_division_grade`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sheet_division_grade`  AS  select `sheet`.`id` AS `id`,`sheet`.`dateUpload` AS `dateUpload`,`sheet`.`divisionID` AS `divisionID`,`sheet`.`gradeID` AS `gradeID`,`sheet`.`subjectID` AS `subjectID`,`sheet`.`sheetName` AS `sheetName`,`sheet`.`file_name` AS `file_name`,`sheet`.`accID` AS `accID`,`division`.`divisionName` AS `divisionName`,`grade`.`gradeName` AS `gradeName`,`subject`.`subjectName` AS `subjectName` from (((`sheet` join `division` on((`sheet`.`divisionID` = `division`.`divisionID`))) join `grade` on((`sheet`.`gradeID` = `grade`.`gradeID`))) join `subject` on((`sheet`.`subjectID` = `subject`.`subjectID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `student_parent`
--
DROP TABLE IF EXISTS `student_parent`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_parent`  AS  select `student`.`stuID` AS `stuID`,`student`.`arabicName` AS `arabicName`,`student`.`englishName` AS `englishName`,`student`.`studentID` AS `studentID`,`student`.`Nationality` AS `Nationality`,`student`.`divisionID` AS `divisionID`,`student`.`gradeID` AS `gradeID`,`student`.`roomID` AS `roomID`,`student`.`studentIDcard` AS `studentIDcard`,`student`.`fatherIDcard` AS `fatherIDcard`,`student`.`fatherJob` AS `fatherJob`,`student`.`motherName` AS `motherName`,`student`.`status` AS `status`,`student`.`username` AS `username`,`student`.`password` AS `password`,`student`.`fatherMobile` AS `fatherMobile`,`student`.`motherMobile` AS `motherMobile`,`student`.`student_status` AS `student_status`,`student`.`secondLanguage` AS `secondLanguage`,`student`.`stage` AS `stage`,`student`.`start_school` AS `start_school`,`administrator`.`id_admin` AS `id_admin`,`administrator`.`fullName` AS `fullName`,`administrator`.`idCard` AS `idCard`,`administrator`.`mobile` AS `mobile`,`administrator`.`job` AS `job`,`administrator`.`photo` AS `photo`,`division`.`divisionName` AS `divisionName`,`grade`.`gradeName` AS `gradeName`,`room`.`roomName` AS `roomName` from ((((`student` join `administrator` on((`student`.`fatherIDcard` = `administrator`.`idCard`))) join `division` on((`student`.`divisionID` = `division`.`divisionID`))) join `grade` on((`student`.`gradeID` = `grade`.`gradeID`))) join `room` on((`student`.`roomID` = `room`.`roomID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `teacherjobs_full_data`
--
DROP TABLE IF EXISTS `teacherjobs_full_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `teacherjobs_full_data`  AS  select `administrator`.`id_admin` AS `id_admin`,`administrator`.`fullName` AS `fullName`,`administrator`.`job` AS `job`,`administrator`.`mobile` AS `mobile`,`administrator`.`photo` AS `photo`,`administrator`.`username` AS `username`,`administrator`.`password` AS `password`,`administrator`.`status` AS `status`,`administrator`.`accounts` AS `accounts`,`administrator`.`agenda` AS `agenda`,`administrator`.`attendance` AS `attendance`,`administrator`.`exam` AS `exam`,`administrator`.`homework` AS `homework`,`administrator`.`marks` AS `marks`,`administrator`.`sheets` AS `sheets`,`administrator`.`timetable` AS `timetable`,`administrator`.`transportation` AS `transportation`,`administrator`.`loginlevel` AS `loginlevel`,`administrator`.`mail` AS `mail`,`administrator`.`idCard` AS `idCard`,`administrator`.`role` AS `role`,`administrator`.`fp` AS `fp`,`administrator`.`no_msg` AS `no_msg`,`administrator`.`department` AS `department`,`administrator`.`calendar` AS `calendar`,`administrator`.`uniform` AS `uniform`,`administrator`.`supplies` AS `supplies`,`administrator`.`payments` AS `payments`,`administrator`.`gender` AS `gender`,`division`.`divisionName` AS `divisionName`,`grade`.`gradeName` AS `gradeName`,`room`.`roomName` AS `roomName`,`subject`.`subjectName` AS `subjectName`,`teacherjobs`.`id` AS `id`,`teacherjobs`.`teacherID` AS `teacherID`,`teacherjobs`.`divisionID` AS `divisionID`,`teacherjobs`.`gradeID` AS `gradeID`,`teacherjobs`.`roomID` AS `roomID`,`teacherjobs`.`subjectID` AS `subjectID` from (((((`teacherjobs` join `administrator` on((`teacherjobs`.`teacherID` = `administrator`.`id_admin`))) join `division` on((`teacherjobs`.`divisionID` = `division`.`divisionID`))) join `grade` on((`teacherjobs`.`gradeID` = `grade`.`gradeID`))) join `room` on((`teacherjobs`.`roomID` = `room`.`roomID`))) join `subject` on((`teacherjobs`.`subjectID` = `subject`.`subjectID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stuID_fk_stuID` (`stuID`);

--
-- Indexes for table `academicyear`
--
ALTER TABLE `academicyear`
  ADD PRIMARY KEY (`yearID`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`agendaID`),
  ADD KEY `divisionID` (`divisionID`),
  ADD KEY `gradeID` (`gradeID`),
  ADD KEY `accID` (`accID`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`divisionID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `div_fk_div` (`divisionID`),
  ADD KEY `gra_fk_gra` (`gradeID`),
  ADD KEY `sub_fk_sub` (`subjectID`);

--
-- Indexes for table `generalsetting`
--
ALTER TABLE `generalsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeID`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`hwID`),
  ADD KEY `roomID_fk_room` (`roomID`),
  ADD KEY `subjectID_fk_subject` (`subjectID`);

--
-- Indexes for table `homework_gradable`
--
ALTER TABLE `homework_gradable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hw_hw` (`hwID`),
  ADD KEY `stu_fk_stu` (`stuID`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`),
  ADD KEY `accID_fk_accounts` (`user_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mailID`),
  ADD KEY `reciver_fk_accID` (`reciver`),
  ADD KEY `sender_fk_accID` (`sender`);

--
-- Indexes for table `mail_trash`
--
ALTER TABLE `mail_trash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailID_fk_mailID` (`mailID`);

--
-- Indexes for table `notication`
--
ALTER TABLE `notication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accID_fk_accID` (`userID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `private_post`
--
ALTER TABLE `private_post`
  ADD PRIMARY KEY (`privateID`),
  ADD KEY `divis_fk_div` (`divisionID`),
  ADD KEY `grad_fk_grad` (`gradeID`),
  ADD KEY `idPost_fk_idPost` (`id_post`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`),
  ADD KEY `division_fk_room` (`divisionID`),
  ADD KEY `grade_fk_room` (`gradeID`);

--
-- Indexes for table `sheet`
--
ALTER TABLE `sheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_fk_sheet` (`divisionID`),
  ADD KEY `grade_fk_sheet` (`gradeID`),
  ADD KEY `subject_fk_sheet` (`subjectID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stuID`),
  ADD KEY `division_fk_division` (`divisionID`),
  ADD KEY `gradeID_fk_grade` (`gradeID`),
  ADD KEY `roomID_fk_roomID` (`roomID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `teacherjobs`
--
ALTER TABLE `teacherjobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `div_fk_division` (`divisionID`),
  ADD KEY `gra_fk_grade` (`gradeID`),
  ADD KEY `rom_fk_room` (`roomID`),
  ADD KEY `sub_fk_subject` (`subjectID`),
  ADD KEY `teacherID_fk_accID` (`teacherID`);

--
-- Indexes for table `uniform`
--
ALTER TABLE `uniform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academicyear`
--
ALTER TABLE `academicyear`
  MODIFY `yearID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `agendaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `divisionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generalsetting`
--
ALTER TABLE `generalsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `hwID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `homework_gradable`
--
ALTER TABLE `homework_gradable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mail_trash`
--
ALTER TABLE `mail_trash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notication`
--
ALTER TABLE `notication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `private_post`
--
ALTER TABLE `private_post`
  MODIFY `privateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sheet`
--
ALTER TABLE `sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacherjobs`
--
ALTER TABLE `teacherjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uniform`
--
ALTER TABLE `uniform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `stuID_fk_stuID` FOREIGN KEY (`stuID`) REFERENCES `student` (`stuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `accID_fk_1` FOREIGN KEY (`accID`) REFERENCES `administrator` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `division_fk_1` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_fk_1` FOREIGN KEY (`gradeID`) REFERENCES `grade` (`gradeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `div_fk_div` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gra_fk_gra` FOREIGN KEY (`gradeID`) REFERENCES `grade` (`gradeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_fk_sub` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `homework`
--
ALTER TABLE `homework`
  ADD CONSTRAINT `roomID_fk_room` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectID_fk_subject` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `homework_gradable`
--
ALTER TABLE `homework_gradable`
  ADD CONSTRAINT `hw_hw` FOREIGN KEY (`hwID`) REFERENCES `homework` (`hwID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stu_fk_stu` FOREIGN KEY (`stuID`) REFERENCES `student` (`stuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_details`
--
ALTER TABLE `login_details`
  ADD CONSTRAINT `accID_fk_accounts` FOREIGN KEY (`user_id`) REFERENCES `administrator` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `reciver_fk_accID` FOREIGN KEY (`reciver`) REFERENCES `administrator` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sender_fk_accID` FOREIGN KEY (`sender`) REFERENCES `administrator` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mail_trash`
--
ALTER TABLE `mail_trash`
  ADD CONSTRAINT `mailID_fk_mailID` FOREIGN KEY (`mailID`) REFERENCES `mail` (`mailID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notication`
--
ALTER TABLE `notication`
  ADD CONSTRAINT `accID_fk_accID` FOREIGN KEY (`userID`) REFERENCES `administrator` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `private_post`
--
ALTER TABLE `private_post`
  ADD CONSTRAINT `divis_fk_div` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grad_fk_grad` FOREIGN KEY (`gradeID`) REFERENCES `grade` (`gradeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idPost_fk_idPost` FOREIGN KEY (`id_post`) REFERENCES `notication` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `division_fk_room` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_fk_room` FOREIGN KEY (`gradeID`) REFERENCES `grade` (`gradeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sheet`
--
ALTER TABLE `sheet`
  ADD CONSTRAINT `division_fk_sheet` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_fk_sheet` FOREIGN KEY (`gradeID`) REFERENCES `grade` (`gradeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_fk_sheet` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `division_fk_division` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gradeID_fk_grade` FOREIGN KEY (`gradeID`) REFERENCES `grade` (`gradeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roomID_fk_roomID` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacherjobs`
--
ALTER TABLE `teacherjobs`
  ADD CONSTRAINT `div_fk_division` FOREIGN KEY (`divisionID`) REFERENCES `division` (`divisionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gra_fk_grade` FOREIGN KEY (`gradeID`) REFERENCES `grade` (`gradeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rom_fk_room` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_fk_subject` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacherID_fk_accID` FOREIGN KEY (`teacherID`) REFERENCES `administrator` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
