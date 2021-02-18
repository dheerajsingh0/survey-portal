-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 03:14 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `bussinesstable`
--

CREATE TABLE `bussinesstable` (
  `id` int(11) NOT NULL,
  `cmpny_ID` varchar(30) NOT NULL,
  `cmpName` varchar(40) NOT NULL,
  `email_ID` varchar(50) NOT NULL,
  `phno` int(20) NOT NULL,
  `about_Cmpny` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `securityCode` int(10) NOT NULL,
  `ProFileImgLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bussinesstable`
--

INSERT INTO `bussinesstable` (`id`, `cmpny_ID`, `cmpName`, `email_ID`, `phno`, `about_Cmpny`, `password`, `securityCode`, `ProFileImgLink`) VALUES
(33, 'CMP_33', 'EnergeneX', 'admin@gmail.com', 1234567891, '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos vero consequuntur ipsa magni saepe quas quisquam nam provident. Sint quisquam voluptatum autem suscipit, quae ad aliquid sequi! Itaque, illum rerum!', '123456789', 1234, 'ProfileImgUploads/021.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `primary_survey_details_table`
--

CREATE TABLE `primary_survey_details_table` (
  `id` int(11) NOT NULL,
  `Survey_ID` varchar(50) NOT NULL,
  `Cmpny_ID` varchar(50) NOT NULL,
  `Title_Of_Survey` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `from_Date` varchar(50) NOT NULL,
  `To_Date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_survey_details_table`
--

INSERT INTO `primary_survey_details_table` (`id`, `Survey_ID`, `Cmpny_ID`, `Title_Of_Survey`, `description`, `from_Date`, `To_Date`) VALUES
(9, 'SURVY_9', 'CMP_33', 'Survey 5', 'asd', '2019-05-01', '2019-05-31'),
(10, 'SURVY_10', 'CMP_33', 'Survey 6', 'this is survey 6', '2019-05-01', '2019-05-31'),
(11, 'SURVY_11', 'CMP_33', 'DD', 'PD', '2019-05-01', '2019-05-24'),
(13, 'SURVY_13', 'CMP_33', 'Survey On Survey', 'HH', '2019-05-01', '2019-06-21'),
(14, 'SURVY_14', 'CMP_33', 'Energenex', 'EnergeneX works on Nanotechnology', '2019-05-01', '2019-05-25'),
(15, 'SURVY_15', 'CMP_33', 'Survey On score', 'How to score', '2019-05-07', '2019-05-31'),
(16, 'SURVY_16', 'CMP_33', 'This Not a Survey', 'This is Not A survey', '2019-05-12', '2019-05-31'),
(17, 'SURVY_17', 'CMP_33', 'A survey having drop downb type questions', 'Drop down type experiments', '2019-05-12', '2019-05-31'),
(18, 'SURVY_18', 'CMP_33', 'Paragraph type question', 'Its a ParaGraph', '2019-05-12', '2019-05-31'),
(19, 'SURVY_19', 'CMP_33', 'Date Type Survey Question', 'All it contains is data type question', '2019-05-12', '2019-05-31'),
(20, 'SURVY_20', 'CMP_33', 'CheckBox type survey', 'Its a CheckBox type survey', '2019-05-12', '2020-08-01'),
(21, 'SURVY_21', 'CMP_33', 'All TYpe of questions survey', '1.multiple choice.\r\n2.DropDown.\r\n3.Date\r\n4.checkbox.\r\n5.paragraph', '2019-05-12', '2019-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `public_survey_completed_report`
--

CREATE TABLE `public_survey_completed_report` (
  `id` int(11) NOT NULL,
  `public_user_id` varchar(100) NOT NULL,
  `survey_id` varchar(100) NOT NULL,
  `survey_name` varchar(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `completed_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `public_survey_completed_report`
--

INSERT INTO `public_survey_completed_report` (`id`, `public_user_id`, `survey_id`, `survey_name`, `company_name`, `completed_date`) VALUES
(1, 'PUB_23 ', 'SURVY_16', 'This Not a Survey', 'EnergeneX', '12-05-2019'),
(2, 'PUB_25 ', 'SURVY_16', 'This Not a Survey', 'EnergeneX', '12-05-2019'),
(3, 'PUB_26 ', 'SURVY_16', 'This Not a Survey', 'EnergeneX', '12-05-2019'),
(4, 'PUB_26 ', 'SURVY_17', 'A survey having drop downb type questions', 'EnergeneX', '12-05-2019'),
(5, 'PUB_25 ', 'SURVY_17', 'A survey having drop downb type questions', 'EnergeneX', '12-05-2019'),
(6, 'PUB_25 ', 'SURVY_18', 'Paragraph type question', 'EnergeneX', '12-05-2019'),
(7, 'PUB_26 ', 'SURVY_18', 'Paragraph type question', 'EnergeneX', '12-05-2019'),
(8, 'PUB_25 ', 'SURVY_19', 'Date Type Survey Question', 'EnergeneX', '12-05-2019'),
(9, 'PUB_26 ', 'SURVY_19', 'Date Type Survey Question', 'EnergeneX', '12-05-2019'),
(10, 'PUB_25 ', 'SURVY_20', 'CheckBox type survey', 'EnergeneX', '12-05-2019'),
(11, 'PUB_26 ', 'SURVY_20', 'CheckBox type survey', 'EnergeneX', '12-05-2019'),
(12, 'PUB_26 ', 'SURVY_21', 'All TYpe of questions survey', 'EnergeneX', '12-05-2019');

-- --------------------------------------------------------

--
-- Table structure for table `public_table`
--

CREATE TABLE `public_table` (
  `id` int(11) NOT NULL,
  `pubUserID` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_ID` varchar(50) NOT NULL,
  `phno` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `DOB` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `security_code` varchar(20) NOT NULL,
  `profile_photo_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `public_table`
--

INSERT INTO `public_table` (`id`, `pubUserID`, `username`, `email_ID`, `phno`, `gender`, `DOB`, `password`, `security_code`, `profile_photo_link`) VALUES
(23, 'PUB_23', 'NotSamtheman', 'samtheman@gmail.com', '9900498751', 'Male', '2019-04-27', '123', '123', 'public_user_profile_img/068.jpg'),
(24, 'PUB_24', 'qda', 'DESSUS@gmail.com', '1111111', 'Female', '2019-05-01', '12', '12', 'public_user_profile_img/025.jpeg'),
(25, 'PUB_25', 'I am Iron Man', 'ArcReactor@gmail.com', '123456789', 'Male', '2019-05-12', '123', '123', 'public_user_profile_img/087.jpeg'),
(26, 'PUB_26', 'Thanos', 'InfinityStones@gmail.com', '123456789', 'Male', '2019-05-12', '123', '123', 'public_user_profile_img/194.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `survey_check_box_table`
--

CREATE TABLE `survey_check_box_table` (
  `id` int(11) NOT NULL,
  `cmpny_ID` varchar(50) NOT NULL,
  `survey_ID` varchar(50) NOT NULL,
  `question_ID` varchar(50) NOT NULL,
  `check_box_1` varchar(255) NOT NULL,
  `check_box_2` varchar(255) NOT NULL,
  `check_box_3` varchar(255) NOT NULL,
  `check_box_4` varchar(255) NOT NULL,
  `check_box_5` varchar(255) NOT NULL,
  `check_box_6` varchar(255) NOT NULL,
  `check_box_7` varchar(255) NOT NULL,
  `check_box_8` varchar(255) NOT NULL,
  `check_box_9` varchar(255) NOT NULL,
  `check_box_10` varchar(255) NOT NULL,
  `check_box_11` varchar(255) NOT NULL,
  `check_box_12` varchar(255) NOT NULL,
  `check_box_13` varchar(255) NOT NULL,
  `check_box_14` varchar(255) NOT NULL,
  `check_box_15` varchar(255) NOT NULL,
  `check_box_16` varchar(255) NOT NULL,
  `check_box_17` varchar(255) NOT NULL,
  `check_box_18` varchar(255) NOT NULL,
  `check_box_19` varchar(255) NOT NULL,
  `check_box_20` varchar(255) NOT NULL,
  `check_box_21` varchar(255) NOT NULL,
  `check_box_22` varchar(255) NOT NULL,
  `check_box_23` varchar(255) NOT NULL,
  `check_box_24` varchar(255) NOT NULL,
  `check_box_25` varchar(255) NOT NULL,
  `check_box_26` varchar(255) NOT NULL,
  `check_box_27` varchar(255) NOT NULL,
  `check_box_28` varchar(255) NOT NULL,
  `check_box_29` varchar(255) NOT NULL,
  `check_box_30` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_check_box_table`
--

INSERT INTO `survey_check_box_table` (`id`, `cmpny_ID`, `survey_ID`, `question_ID`, `check_box_1`, `check_box_2`, `check_box_3`, `check_box_4`, `check_box_5`, `check_box_6`, `check_box_7`, `check_box_8`, `check_box_9`, `check_box_10`, `check_box_11`, `check_box_12`, `check_box_13`, `check_box_14`, `check_box_15`, `check_box_16`, `check_box_17`, `check_box_18`, `check_box_19`, `check_box_20`, `check_box_21`, `check_box_22`, `check_box_23`, `check_box_24`, `check_box_25`, `check_box_26`, `check_box_27`, `check_box_28`, `check_box_29`, `check_box_30`) VALUES
(1, 'CMP_33', 'SURVY_3', 'question_3', 'I am Check box1', 'I am CheckBox2', 'I am CheckBox3', 'I am CheckBox4', 'I am CheckBox5', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(2, 'CMP_33', 'SURVY_14', 'question_17', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(3, 'CMP_33', 'SURVY_20', 'question_32', 'mango', 'pineapple', 'Banana', 'grape', 'Orange', 'Avacado', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(4, 'CMP_33', 'SURVY_20', 'question_33', 'I am Groot', 'I am Also Groot', 'Who Am Id', 'I am Groot ASGRADIANS OF THE GALAXY', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(5, 'CMP_33', 'SURVY_21', 'question_34', 'Mango', 'Banana', 'Fruiti', 'Marshmello', 'pineApple', 'Grape', 'Orange', 'peas', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `survey_dropdown_box_table`
--

CREATE TABLE `survey_dropdown_box_table` (
  `id` int(11) NOT NULL,
  `cmpny_ID` varchar(50) NOT NULL,
  `survey_ID` varchar(50) NOT NULL,
  `question_ID` varchar(50) NOT NULL,
  `drpDown_1` varchar(255) NOT NULL,
  `drpDown_2` varchar(255) NOT NULL,
  `drpDown_3` varchar(255) NOT NULL,
  `drpDown_4` varchar(255) NOT NULL,
  `drpDown_5` varchar(255) NOT NULL,
  `drpDown_6` varchar(255) NOT NULL,
  `drpDown_7` varchar(255) NOT NULL,
  `drpDown_8` varchar(255) NOT NULL,
  `drpDown_9` varchar(255) NOT NULL,
  `drpDown_10` varchar(255) NOT NULL,
  `drpDown_11` varchar(255) NOT NULL,
  `drpDown_12` varchar(255) NOT NULL,
  `drpDown_13` varchar(255) NOT NULL,
  `drpDown_14` varchar(255) NOT NULL,
  `drpDown_15` varchar(255) NOT NULL,
  `drpDown_16` varchar(255) NOT NULL,
  `drpDown_17` varchar(255) NOT NULL,
  `drpDown_18` varchar(255) NOT NULL,
  `drpDown_19` varchar(255) NOT NULL,
  `drpDown_20` varchar(255) NOT NULL,
  `drpDown_21` varchar(255) NOT NULL,
  `drpDown_22` varchar(255) NOT NULL,
  `drpDown_23` varchar(255) NOT NULL,
  `drpDown_24` varchar(255) NOT NULL,
  `drpDown_25` varchar(255) NOT NULL,
  `drpDown_26` varchar(255) NOT NULL,
  `drpDown_27` varchar(255) NOT NULL,
  `drpDown_28` varchar(255) NOT NULL,
  `drpDown_29` varchar(255) NOT NULL,
  `drpDown_30` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_dropdown_box_table`
--

INSERT INTO `survey_dropdown_box_table` (`id`, `cmpny_ID`, `survey_ID`, `question_ID`, `drpDown_1`, `drpDown_2`, `drpDown_3`, `drpDown_4`, `drpDown_5`, `drpDown_6`, `drpDown_7`, `drpDown_8`, `drpDown_9`, `drpDown_10`, `drpDown_11`, `drpDown_12`, `drpDown_13`, `drpDown_14`, `drpDown_15`, `drpDown_16`, `drpDown_17`, `drpDown_18`, `drpDown_19`, `drpDown_20`, `drpDown_21`, `drpDown_22`, `drpDown_23`, `drpDown_24`, `drpDown_25`, `drpDown_26`, `drpDown_27`, `drpDown_28`, `drpDown_29`, `drpDown_30`) VALUES
(1, 'CMP_33', 'SURVY_3', 'question_7', 'Mango', 'pineapple', 'banana', 'grape', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(2, 'CMP_33', 'SURVY_17', 'question_22', 'Mango', 'Pineapple', 'banana', 'Grape', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(3, 'CMP_33', 'SURVY_17', 'question_23', 'Samsung galaxy s11', 'Iphone X', 'Iphone XR', 'sony Xperia', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(4, 'CMP_33', 'SURVY_21', 'question_35', 'Apple X', 'Lenovo XPS 19', 'GTA 5', 'GTA 4', 'Wii', 'Nintendo switch', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `survey_option_box_table`
--

CREATE TABLE `survey_option_box_table` (
  `id` int(11) NOT NULL,
  `Cmpny_ID` varchar(100) NOT NULL,
  `Survey_ID` varchar(100) NOT NULL,
  `question_ID` varchar(100) NOT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) NOT NULL,
  `option_3` varchar(255) NOT NULL,
  `option_4` varchar(255) NOT NULL,
  `option_5` varchar(255) NOT NULL,
  `option_6` varchar(255) NOT NULL,
  `option_7` varchar(255) NOT NULL,
  `option_8` varchar(255) NOT NULL,
  `option_9` varchar(255) NOT NULL,
  `option_10` varchar(255) NOT NULL,
  `option_11` varchar(255) NOT NULL,
  `option_12` varchar(255) NOT NULL,
  `option_13` varchar(255) NOT NULL,
  `option_14` varchar(255) NOT NULL,
  `option_15` varchar(255) NOT NULL,
  `option_16` varchar(255) NOT NULL,
  `option_17` varchar(255) NOT NULL,
  `option_18` varchar(255) NOT NULL,
  `option_19` varchar(255) NOT NULL,
  `option_20` varchar(255) NOT NULL,
  `option_21` varchar(255) NOT NULL,
  `option_22` varchar(255) NOT NULL,
  `option_23` varchar(255) NOT NULL,
  `option_24` varchar(255) NOT NULL,
  `option_25` varchar(255) NOT NULL,
  `option_26` varchar(255) NOT NULL,
  `option_27` varchar(255) NOT NULL,
  `option_28` varchar(255) NOT NULL,
  `option_29` varchar(255) NOT NULL,
  `option_30` varchar(255) NOT NULL,
  `otherTXT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_option_box_table`
--

INSERT INTO `survey_option_box_table` (`id`, `Cmpny_ID`, `Survey_ID`, `question_ID`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `option_6`, `option_7`, `option_8`, `option_9`, `option_10`, `option_11`, `option_12`, `option_13`, `option_14`, `option_15`, `option_16`, `option_17`, `option_18`, `option_19`, `option_20`, `option_21`, `option_22`, `option_23`, `option_24`, `option_25`, `option_26`, `option_27`, `option_28`, `option_29`, `option_30`, `otherTXT`) VALUES
(1, 'CMP_33', 'SURVY_3', 'question_5', 'choice 1', 'choice 2', 'choice 3', 'choice 4', 'choice 5', 'choice 6', 'choice 7', 'choice 8', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'false'),
(2, 'CMP_33', 'SURVY_14', 'question_16', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'false'),
(3, 'CMP_33', 'SURVY_15', 'question_20', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'false'),
(4, 'CMP_33', 'SURVY_16', 'question_21', 'mango', 'banana', 'orange', 'grape', 'pineapple', 'Cucumber', 'avacado', 'popaya', 'I am goot I am Groot I am Groot I am Groot I am Groot I am Groot', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'false'),
(5, 'CMP_33', 'SURVY_21', 'question_36', 'PS1', 'Xbox one s', 'Xbox 360', 'Xbox Project Scorpio', 'PS4', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions_table`
--

CREATE TABLE `survey_questions_table` (
  `id` int(11) NOT NULL,
  `cmpny_ID` varchar(100) NOT NULL,
  `survey_ID` varchar(100) NOT NULL,
  `question_ID` varchar(100) NOT NULL,
  `type_of_answer` varchar(100) NOT NULL,
  `question_txt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_questions_table`
--

INSERT INTO `survey_questions_table` (`id`, `cmpny_ID`, `survey_ID`, `question_ID`, `type_of_answer`, `question_txt`) VALUES
(1, 'CMP_33', 'SURVY_1', 'question_1', 'Date', 'DASDASD'),
(2, 'CMP_33', 'SURVY_2', 'question_2', 'Date', 'Nanotech date question'),
(3, 'CMP_33', 'SURVY_3', 'question_3', 'checkBox', 'Survey Check Box Question.'),
(4, 'CMP_33', 'SURVY_3', 'question_4', 'Date', 'I am Date question'),
(5, 'CMP_33', 'SURVY_3', 'question_5', 'multipleChoice', 'Multiple Choice Question'),
(6, 'CMP_33', 'SURVY_3', 'question_6', 'paragraph', 'FeedBack Type question'),
(7, 'CMP_33', 'SURVY_3', 'question_7', 'DropDownBox', 'Drop Down Type Question'),
(8, 'CMP_33', 'SURVY_5', 'question_8', 'Date', 'Survey1Q'),
(9, 'CMP_33', 'SURVY_6', 'question_9', 'paragraph', 'question1'),
(10, 'CMP_33', 'SURVY_7', 'question_10', 'paragraph', 'question1'),
(11, 'CMP_33', 'SURVY_8', 'question_11', 'Date', 'I am A survey question'),
(12, 'CMP_33', 'SURVY_9', 'question_12', 'Date', 'Question'),
(13, 'CMP_33', 'SURVY_10', 'question_13', 'Date', 'question'),
(14, 'CMP_33', 'SURVY_11', 'question_14', 'Date', 'question'),
(15, 'CMP_33', 'SURVY_13', 'question_15', 'Date', 'This is a question'),
(16, 'CMP_33', 'SURVY_14', 'question_16', 'multipleChoice', 'Choose any one '),
(17, 'CMP_33', 'SURVY_14', 'question_17', 'checkBox', 'Check whatever you want'),
(18, 'CMP_33', 'SURVY_14', 'question_18', 'Date', 'Date type Question'),
(19, 'CMP_33', 'SURVY_14', 'question_19', 'paragraph', 'Feedback'),
(20, 'CMP_33', 'SURVY_15', 'question_20', 'multipleChoice', 'On 1 to 10 how much Do you score'),
(21, 'CMP_33', 'SURVY_16', 'question_21', 'multipleChoice', 'Choose any 1 out of 10'),
(22, 'CMP_33', 'SURVY_17', 'question_22', 'DropDownBox', 'DROPDOWN question1'),
(23, 'CMP_33', 'SURVY_17', 'question_23', 'DropDownBox', 'Drop down question 2'),
(24, 'CMP_33', 'SURVY_18', 'question_24', 'paragraph', 'Paragraph question1'),
(25, 'CMP_33', 'SURVY_18', 'question_25', 'paragraph', 'Paragraph question2'),
(26, 'CMP_33', 'SURVY_18', 'question_26', 'paragraph', 'Paragraph question3'),
(27, 'CMP_33', 'SURVY_19', 'question_27', 'Date', 'This is survey On date'),
(28, 'CMP_33', 'SURVY_19', 'question_28', 'Date', 'Date question2'),
(29, 'CMP_33', 'SURVY_19', 'question_29', 'Date', 'Date question3'),
(30, 'CMP_33', 'SURVY_19', 'question_30', 'Date', 'Date question 4'),
(31, 'CMP_33', 'SURVY_19', 'question_31', 'Date', 'Date question 5'),
(32, 'CMP_33', 'SURVY_20', 'question_32', 'checkBox', 'CheckBox type question 1'),
(33, 'CMP_33', 'SURVY_20', 'question_33', 'checkBox', 'CheckBox type question 2'),
(34, 'CMP_33', 'SURVY_21', 'question_34', 'checkBox', 'I am a checkBox'),
(35, 'CMP_33', 'SURVY_21', 'question_35', 'DropDownBox', 'DropDown Type question'),
(36, 'CMP_33', 'SURVY_21', 'question_36', 'multipleChoice', 'Multiple Choice question Choose any one'),
(37, 'CMP_33', 'SURVY_21', 'question_37', 'paragraph', 'Any feedback On the survey.[feedback please]'),
(38, 'CMP_33', 'SURVY_21', 'question_38', 'Date', 'Project Last Update');

-- --------------------------------------------------------

--
-- Table structure for table `survey_report_for_checkbox_table`
--

CREATE TABLE `survey_report_for_checkbox_table` (
  `id` int(11) NOT NULL,
  `question_ID` varchar(100) NOT NULL,
  `public_user_ID` varchar(100) NOT NULL,
  `checkbox_ans_1` varchar(255) NOT NULL,
  `checkbox_ans_2` varchar(255) NOT NULL,
  `checkbox_ans_3` varchar(255) NOT NULL,
  `checkbox_ans_4` varchar(255) NOT NULL,
  `checkbox_ans_5` varchar(255) NOT NULL,
  `checkbox_ans_6` varchar(255) NOT NULL,
  `checkbox_ans_7` varchar(255) NOT NULL,
  `checkbox_ans_8` varchar(255) NOT NULL,
  `checkbox_ans_9` varchar(255) NOT NULL,
  `checkbox_ans_10` varchar(255) NOT NULL,
  `checkbox_ans_11` varchar(255) NOT NULL,
  `checkbox_ans_12` varchar(255) NOT NULL,
  `checkbox_ans_13` varchar(255) NOT NULL,
  `checkbox_ans_14` varchar(255) NOT NULL,
  `checkbox_ans_15` varchar(255) NOT NULL,
  `checkbox_ans_16` varchar(255) NOT NULL,
  `checkbox_ans_17` varchar(255) NOT NULL,
  `checkbox_ans_18` varchar(255) NOT NULL,
  `checkbox_ans_19` varchar(255) NOT NULL,
  `checkbox_ans_20` varchar(255) NOT NULL,
  `checkbox_ans_21` varchar(255) NOT NULL,
  `checkbox_ans_22` varchar(255) NOT NULL,
  `checkbox_ans_23` varchar(255) NOT NULL,
  `checkbox_ans_24` varchar(255) NOT NULL,
  `checkbox_ans_25` varchar(255) NOT NULL,
  `checkbox_ans_26` varchar(255) NOT NULL,
  `checkbox_ans_27` varchar(255) NOT NULL,
  `checkbox_ans_28` varchar(255) NOT NULL,
  `checkbox_ans_29` varchar(255) NOT NULL,
  `checkbox_ans_30` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_report_for_checkbox_table`
--

INSERT INTO `survey_report_for_checkbox_table` (`id`, `question_ID`, `public_user_ID`, `checkbox_ans_1`, `checkbox_ans_2`, `checkbox_ans_3`, `checkbox_ans_4`, `checkbox_ans_5`, `checkbox_ans_6`, `checkbox_ans_7`, `checkbox_ans_8`, `checkbox_ans_9`, `checkbox_ans_10`, `checkbox_ans_11`, `checkbox_ans_12`, `checkbox_ans_13`, `checkbox_ans_14`, `checkbox_ans_15`, `checkbox_ans_16`, `checkbox_ans_17`, `checkbox_ans_18`, `checkbox_ans_19`, `checkbox_ans_20`, `checkbox_ans_21`, `checkbox_ans_22`, `checkbox_ans_23`, `checkbox_ans_24`, `checkbox_ans_25`, `checkbox_ans_26`, `checkbox_ans_27`, `checkbox_ans_28`, `checkbox_ans_29`, `checkbox_ans_30`) VALUES
(1, 'question_3', 'PUB_23', 'I am Check box1', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(2, 'question_17', 'PUB_23', 'null', 'null', 'null', 'null', 'null', '6', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '14', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(3, 'question_32', 'PUB_25', 'mango', 'null', 'null', 'null', 'null', 'Avacado', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(4, 'question_33', 'PUB_25', 'null', 'I am Also Groot', 'null', 'I am Groot ASGRADIANS OF THE GALAXY', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(5, 'question_32', 'PUB_26', 'null', 'null', 'Banana', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(6, 'question_33', 'PUB_26', 'null', 'I am Also Groot', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null'),
(7, 'question_34', 'PUB_26', 'Mango', 'Banana', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `survey_report_for_date_table`
--

CREATE TABLE `survey_report_for_date_table` (
  `id` int(11) NOT NULL,
  `question_ID` varchar(100) NOT NULL,
  `public_user_ID` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_report_for_date_table`
--

INSERT INTO `survey_report_for_date_table` (`id`, `question_ID`, `public_user_ID`, `answer`) VALUES
(1, 'question_4', 'PUB_23', '2019-05-01'),
(2, 'question_1', 'PUB_23', '2019-05-01'),
(4, 'question_2', 'PUB_23', '2019-05-01'),
(5, 'question_18', 'PUB_23', '2019-05-05'),
(6, 'question_27', 'PUB_25', '2019-05-12'),
(7, 'question_28', 'PUB_25', '2019-05-18'),
(8, 'question_29', 'PUB_25', '2019-05-25'),
(9, 'question_30', 'PUB_25', '2019-05-26'),
(10, 'question_31', 'PUB_25', '2019-05-27'),
(11, 'question_27', 'PUB_26', '2019-05-01'),
(12, 'question_28', 'PUB_26', '2019-05-08'),
(13, 'question_29', 'PUB_26', '2019-05-17'),
(14, 'question_30', 'PUB_26', '2019-05-12'),
(15, 'question_31', 'PUB_26', '2019-05-23'),
(16, 'question_38', 'PUB_26', '2019-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `survey_report_for_dropdown_table`
--

CREATE TABLE `survey_report_for_dropdown_table` (
  `id` int(11) NOT NULL,
  `question_ID` varchar(100) NOT NULL,
  `public_User_ID` varchar(100) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_report_for_dropdown_table`
--

INSERT INTO `survey_report_for_dropdown_table` (`id`, `question_ID`, `public_User_ID`, `answer`) VALUES
(1, 'question_7', 'PUB_23', 'banana'),
(2, 'question_22', 'PUB_26', 'Mango'),
(3, 'question_23', 'PUB_26', 'Iphone XR'),
(4, 'question_22', 'PUB_25', 'Grape'),
(5, 'question_23', 'PUB_25', 'Iphone XR'),
(6, 'question_35', 'PUB_26', 'Lenovo XPS 19');

-- --------------------------------------------------------

--
-- Table structure for table `survey_report_for_optionbox_table`
--

CREATE TABLE `survey_report_for_optionbox_table` (
  `id` int(11) NOT NULL,
  `Question_ID` varchar(100) NOT NULL,
  `public_user_ID` varchar(100) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_report_for_optionbox_table`
--

INSERT INTO `survey_report_for_optionbox_table` (`id`, `Question_ID`, `public_user_ID`, `answer`) VALUES
(1, 'question_5', 'PUB_23', 'choice 1'),
(2, 'question_16', 'PUB_23', '3'),
(3, 'question_21', 'PUB_23', 'popaya'),
(4, 'question_21', 'PUB_25', 'mango'),
(5, 'question_21', 'PUB_26', 'popaya'),
(6, 'question_36', 'PUB_26', 'PS1');

-- --------------------------------------------------------

--
-- Table structure for table `survey_report_for_paragraph_table`
--

CREATE TABLE `survey_report_for_paragraph_table` (
  `id` int(11) NOT NULL,
  `question_ID` varchar(100) NOT NULL,
  `public_user_ID` varchar(100) NOT NULL,
  `feedback_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_report_for_paragraph_table`
--

INSERT INTO `survey_report_for_paragraph_table` (`id`, `question_ID`, `public_user_ID`, `feedback_comment`) VALUES
(1, 'question_6', 'PUB_23', 'werf wsd sd '),
(2, 'question_19', 'PUB_23', 'sdfsdf'),
(3, 'question_24', 'PUB_25', 'I am Groot I am Groot I am Groot I am Groot I am Groot I am Groot I am Groot I am Groot I am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI '),
(4, 'question_25', 'PUB_25', 'I am GrootI am GrootvI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am Groo'),
(5, 'question_26', 'PUB_25', 'I am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am GrootI am Groot'),
(6, 'question_24', 'PUB_26', 'I am Thanos I am Thanos I am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am T'),
(7, 'question_25', 'PUB_26', 'I am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am Tha'),
(8, 'question_26', 'PUB_26', 'vI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am ThanosI am Th'),
(9, 'question_37', 'PUB_26', 'None NONE NONO nON on');

-- --------------------------------------------------------

--
-- Table structure for table `survey_report_primary_table`
--

CREATE TABLE `survey_report_primary_table` (
  `id` int(11) NOT NULL,
  `cmpny_ID` varchar(100) NOT NULL,
  `survey_ID` varchar(100) NOT NULL,
  `public_user_ID` varchar(100) NOT NULL,
  `question_ID` varchar(100) NOT NULL,
  `Type_Of_question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey_report_primary_table`
--

INSERT INTO `survey_report_primary_table` (`id`, `cmpny_ID`, `survey_ID`, `public_user_ID`, `question_ID`, `Type_Of_question`) VALUES
(1, 'CMP_33', 'SURVY_3', 'PUB_23', 'question_3', 'checkBox'),
(2, 'CMP_33', 'SURVY_3', 'PUB_23', 'question_4', 'Date'),
(3, 'CMP_33', 'SURVY_3', 'PUB_23', 'question_5', 'multipleChoice'),
(4, 'CMP_33', 'SURVY_3', 'PUB_23', 'question_6', 'paragraph'),
(5, 'CMP_33', 'SURVY_3', 'PUB_23', 'question_7', 'DropDownBox'),
(6, 'CMP_33', 'SURVY_1', 'PUB_23', 'question_1', 'Date'),
(8, 'CMP_33', 'SURVY_2', 'PUB_23', 'question_2', 'Date'),
(9, 'CMP_33', 'SURVY_14', 'PUB_23', 'question_16', 'multipleChoice'),
(10, 'CMP_33', 'SURVY_14', 'PUB_23', 'question_17', 'checkBox'),
(11, 'CMP_33', 'SURVY_14', 'PUB_23', 'question_18', 'Date'),
(12, 'CMP_33', 'SURVY_14', 'PUB_23', 'question_19', 'paragraph'),
(13, 'CMP_33', 'SURVY_16', 'PUB_23', 'question_21', 'multipleChoice'),
(14, 'CMP_33', 'SURVY_16', 'PUB_25', 'question_21', 'multipleChoice'),
(15, 'CMP_33', 'SURVY_16', 'PUB_26', 'question_21', 'multipleChoice'),
(16, 'CMP_33', 'SURVY_17', 'PUB_26', 'question_22', 'DropDownBox'),
(17, 'CMP_33', 'SURVY_17', 'PUB_26', 'question_23', 'DropDownBox'),
(18, 'CMP_33', 'SURVY_17', 'PUB_25', 'question_22', 'DropDownBox'),
(19, 'CMP_33', 'SURVY_17', 'PUB_25', 'question_23', 'DropDownBox'),
(20, 'CMP_33', 'SURVY_18', 'PUB_25', 'question_24', 'paragraph'),
(21, 'CMP_33', 'SURVY_18', 'PUB_25', 'question_25', 'paragraph'),
(22, 'CMP_33', 'SURVY_18', 'PUB_25', 'question_26', 'paragraph'),
(23, 'CMP_33', 'SURVY_18', 'PUB_26', 'question_24', 'paragraph'),
(24, 'CMP_33', 'SURVY_18', 'PUB_26', 'question_25', 'paragraph'),
(25, 'CMP_33', 'SURVY_18', 'PUB_26', 'question_26', 'paragraph'),
(26, 'CMP_33', 'SURVY_19', 'PUB_25', 'question_27', 'Date'),
(27, 'CMP_33', 'SURVY_19', 'PUB_25', 'question_28', 'Date'),
(28, 'CMP_33', 'SURVY_19', 'PUB_25', 'question_29', 'Date'),
(29, 'CMP_33', 'SURVY_19', 'PUB_25', 'question_30', 'Date'),
(30, 'CMP_33', 'SURVY_19', 'PUB_25', 'question_31', 'Date'),
(31, 'CMP_33', 'SURVY_19', 'PUB_26', 'question_27', 'Date'),
(32, 'CMP_33', 'SURVY_19', 'PUB_26', 'question_28', 'Date'),
(33, 'CMP_33', 'SURVY_19', 'PUB_26', 'question_29', 'Date'),
(34, 'CMP_33', 'SURVY_19', 'PUB_26', 'question_30', 'Date'),
(35, 'CMP_33', 'SURVY_19', 'PUB_26', 'question_31', 'Date'),
(36, 'CMP_33', 'SURVY_20', 'PUB_25', 'question_32', 'checkBox'),
(37, 'CMP_33', 'SURVY_20', 'PUB_25', 'question_33', 'checkBox'),
(38, 'CMP_33', 'SURVY_20', 'PUB_26', 'question_32', 'checkBox'),
(39, 'CMP_33', 'SURVY_20', 'PUB_26', 'question_33', 'checkBox'),
(40, 'CMP_33', 'SURVY_21', 'PUB_26', 'question_34', 'checkBox'),
(41, 'CMP_33', 'SURVY_21', 'PUB_26', 'question_35', 'DropDownBox'),
(42, 'CMP_33', 'SURVY_21', 'PUB_26', 'question_36', 'multipleChoice'),
(43, 'CMP_33', 'SURVY_21', 'PUB_26', 'question_37', 'paragraph'),
(44, 'CMP_33', 'SURVY_21', 'PUB_26', 'question_38', 'Date');

-- --------------------------------------------------------

--
-- Table structure for table `testtbl`
--

CREATE TABLE `testtbl` (
  `id` int(11) NOT NULL,
  `qid` varchar(50) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `choice_1` varchar(255) NOT NULL,
  `choice_2` varchar(255) NOT NULL,
  `choice_3` varchar(255) NOT NULL,
  `choice_4` varchar(255) NOT NULL,
  `choice_5` varchar(255) NOT NULL,
  `choice_6` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testtbl`
--

INSERT INTO `testtbl` (`id`, `qid`, `sid`, `cid`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `choice_5`, `choice_6`) VALUES
(1, '', '', '', 'samtheman', '', '', '', '', ''),
(2, '', '', '', 'samtheman', '2', '3', 'null', 'null', 'null'),
(3, '', '', '', 'samtheman', '2', '3', 'null', 'null', 'null'),
(4, '', '', '', 'samtheman', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bussinesstable`
--
ALTER TABLE `bussinesstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_survey_details_table`
--
ALTER TABLE `primary_survey_details_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_survey_completed_report`
--
ALTER TABLE `public_survey_completed_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_table`
--
ALTER TABLE `public_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_check_box_table`
--
ALTER TABLE `survey_check_box_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_dropdown_box_table`
--
ALTER TABLE `survey_dropdown_box_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_option_box_table`
--
ALTER TABLE `survey_option_box_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_questions_table`
--
ALTER TABLE `survey_questions_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_report_for_checkbox_table`
--
ALTER TABLE `survey_report_for_checkbox_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_report_for_date_table`
--
ALTER TABLE `survey_report_for_date_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_report_for_dropdown_table`
--
ALTER TABLE `survey_report_for_dropdown_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_report_for_optionbox_table`
--
ALTER TABLE `survey_report_for_optionbox_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_report_for_paragraph_table`
--
ALTER TABLE `survey_report_for_paragraph_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_report_primary_table`
--
ALTER TABLE `survey_report_primary_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testtbl`
--
ALTER TABLE `testtbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bussinesstable`
--
ALTER TABLE `bussinesstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `primary_survey_details_table`
--
ALTER TABLE `primary_survey_details_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `public_survey_completed_report`
--
ALTER TABLE `public_survey_completed_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `public_table`
--
ALTER TABLE `public_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `survey_check_box_table`
--
ALTER TABLE `survey_check_box_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `survey_dropdown_box_table`
--
ALTER TABLE `survey_dropdown_box_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `survey_option_box_table`
--
ALTER TABLE `survey_option_box_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `survey_questions_table`
--
ALTER TABLE `survey_questions_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `survey_report_for_checkbox_table`
--
ALTER TABLE `survey_report_for_checkbox_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `survey_report_for_date_table`
--
ALTER TABLE `survey_report_for_date_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `survey_report_for_dropdown_table`
--
ALTER TABLE `survey_report_for_dropdown_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_report_for_optionbox_table`
--
ALTER TABLE `survey_report_for_optionbox_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_report_for_paragraph_table`
--
ALTER TABLE `survey_report_for_paragraph_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `survey_report_primary_table`
--
ALTER TABLE `survey_report_primary_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `testtbl`
--
ALTER TABLE `testtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
