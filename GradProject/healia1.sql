-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 08:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin-ID` int(11) NOT NULL,
  `Admin_Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin-ID`, `Admin_Name`, `Email`, `Password`) VALUES
(1, 'Nada', 'nada@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `book_discussion_club`
--

CREATE TABLE `book_discussion_club` (
  `Book_ID` int(11) NOT NULL,
  `Sub_ID` int(11) NOT NULL,
  `Book_image` varchar(30) NOT NULL,
  `Book_Name` varchar(25) NOT NULL,
  `Description` varchar(70) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_ID` int(11) NOT NULL,
  `Sub_ID` int(11) DEFAULT NULL,
  `Event_Title` varchar(25) NOT NULL,
  `Description` varchar(75) NOT NULL,
  `Address` varchar(35) NOT NULL,
  `Event_DateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Event_Type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_ID`, `Sub_ID`, `Event_Title`, `Description`, `Address`, `Event_DateTime`, `Event_Type`) VALUES
(1, 0, '15th Pan Arab', '15th Pan Arab Psychiatric Congress In collaboration with Egyptian Psychiatr', 'Marriott Hotel, Cairo – Egypt', '2023-08-01 09:00:00', 'For Adults'),
(2, 0, 'International Conference ', 'Short Name: ICPPW\r\nEvent Type: Conference\r\nPresentation: Physical\r\nWebsite ', 'Cairo – Egypt', '2023-07-12 17:00:00', 'For Adults ');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_ID` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(300) NOT NULL,
  `Response` varchar(300) DEFAULT NULL,
  `P_ID` int(11) DEFAULT NULL,
  `Admin_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_ID`, `name`, `email`, `subject`, `message`, `Response`, `P_ID`, `Admin_Id`) VALUES
(6, 'rana', 'rana@gmail.com', 'review about therapist', 'therapist has helped me through the roughest parts of my life. I feel like she listens to me and give me space to talk or vent; she helps when needed and offers advise only when asked', NULL, NULL, NULL),
(7, 'nada', 'snada@gmail.com', 'review about therapist', ' It easy to schedule appointments and you can usually get one right away. The quality of care has been very good. I see a psychiatry nurse and a therapist and I am pleased with both. My therapist is great and has been helpful thus far.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_therapy`
--

CREATE TABLE `group_therapy` (
  `Group_ID` int(11) NOT NULL,
  `Sub_ID` int(11) NOT NULL,
  `Group_Name` varchar(20) NOT NULL,
  `Therapist` varchar(20) NOT NULL,
  `G_Description` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `P_ID` int(11) NOT NULL,
  `F_Name` varchar(15) NOT NULL,
  `L_Name` varchar(15) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Birthdate` date NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(18) NOT NULL,
  `Sub_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`P_ID`, `F_Name`, `L_Name`, `Gender`, `Birthdate`, `Email`, `Password`, `Sub_ID`) VALUES
(1, 'nada', 'sabry', 'female', '2000-10-15', 'snada@gmail.com', '15102000', NULL),
(2, 'marwan', 'gamal', 'male', '2000-08-11', 'marwan@gmail.com', '$2y$10$lxJuDk3h2aI', NULL),
(20, 'youssef', 'rawy', 'male', '2000-03-11', 'youssef@gmail.com', '999', NULL),
(22, 'mohab', 'ghazal', 'male', '2000-02-11', 'mohab@gmail.com', '666', NULL),
(23, 'mahmoud', 'hany', 'male', '2000-04-22', 'mahmoud@gmail.com', '777', NULL),
(24, 'bola', 'sherif', 'male', '2000-06-03', 'bola@gmail.com', '000', NULL),
(25, 'rana', 'sabry', 'female', '1997-01-22', 'rana@gmail.com', '147', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Card_no` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` int(3) NOT NULL,
  `name` varchar(35) NOT NULL,
  `paydate` date NOT NULL,
  `Total_Value` int(11) NOT NULL,
  `Request_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phonenumber`
--

CREATE TABLE `phonenumber` (
  `Therapist_Id` int(11) NOT NULL,
  `Phone` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Request_Id` int(11) NOT NULL,
  `Therapist_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Request_Value` int(4) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Schedule_ID` int(11) NOT NULL,
  `Therapist_Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time_From` time NOT NULL,
  `Time_To` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `Sub_ID` int(11) NOT NULL,
  `Start_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `End_Date` date NOT NULL,
  `Pay_Status` varchar(10) NOT NULL,
  `Admin-ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `therapists`
--

CREATE TABLE `therapists` (
  `Therapist_ID` int(11) NOT NULL,
  `Therapist_Name` varchar(20) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Birthdate` date NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `experience` int(3) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(18) NOT NULL,
  `Therapist_Image` varchar(11) NOT NULL,
  `Is_Accepted` tinyint(1) DEFAULT NULL,
  `Hour_Rate` int(3) NOT NULL,
  `cv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapists`
--

INSERT INTO `therapists` (`Therapist_ID`, `Therapist_Name`, `Gender`, `Birthdate`, `qualification`, `specialization`, `experience`, `Email`, `Password`, `Therapist_Image`, `Is_Accepted`, `Hour_Rate`, `cv`) VALUES
(1, 'Fouad Mohamed', 'male', '1983-04-01', 'Training in Cognitive behavioral therapy for depression at Egyptian Association of Psychologists', 'Depression, Anxiety Disorders ', 8, 'fouad@gmail.com', '148965', '9-3.jpg', 1, 200, 'therapists/Resume.pd'),
(2, 'Sahar Daoud', 'female', '1989-04-11', 'Master of Science Applied Psychology from Liverpool University', 'Child Learning Disorders & Aut', 5, 'sahar@gmail.com', '336699', '158.jpeg', 1, 850, 'therapists/Resume.pd');

-- --------------------------------------------------------

--
-- Table structure for table `user_videos`
--

CREATE TABLE `user_videos` (
  `V_ID` int(11) NOT NULL,
  `P_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `V_ID` int(11) NOT NULL,
  `V_Title` varchar(70) NOT NULL,
  `V_Description` varchar(500) NOT NULL,
  `url` text NOT NULL,
  `Admin_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`V_ID`, `V_Title`, `V_Description`, `url`, `Admin_Id`) VALUES
(1, 'How to manage your mental health | Leon Taylor ', 'Prolonged psychological stress is the enemy of our mental health, and physical movement is our best weapon to respond.​ Leon Taylor is a former competitive diver who competed for TeamGB at three Olympic Games. ', ' <iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/rkZl2gsLUp4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; \r\npicture-in-picture; web-share\" allowfullscreen></iframe>', 1),
(2, 'How to love and be loved | Billy Ward ', 'Billy Ward is a Licensed Professional Counselor (LPC) and has been practicing in for the past 13 years in the New York City Suburbs of New Jersey. In addition to having a private practice, he has also been counseling students at Seton Hall Prep High School since 1998.  Currently he is the director of retreats for the school and also teaches a senior course for Human Development and Theology', '  <iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/vMeEKBaiPbg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;\r\n     picture-in-picture; web-share\" allowfullscreen></iframe>', 1),
(3, 'How families can support a child\'s mental health | Paul Sunseri', 'Paul Sunseri, Psy.D. is a clinical psychologist who specializes in children’s mental health and is a pioneer in family therapy.  He is the founder of three community mental health agencies and has worked to improve the lives of countless children and families over the past three decades', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/dDQ5tgd1_HY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin-ID`);

--
-- Indexes for table `book_discussion_club`
--
ALTER TABLE `book_discussion_club`
  ADD PRIMARY KEY (`Book_ID`),
  ADD KEY `Sub_ID` (`Sub_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `Sub_ID` (`Sub_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_ID`),
  ADD KEY `P_ID` (`P_ID`),
  ADD KEY `Admin_Id` (`Admin_Id`);

--
-- Indexes for table `group_therapy`
--
ALTER TABLE `group_therapy`
  ADD PRIMARY KEY (`Group_ID`),
  ADD KEY `Sub_ID` (`Sub_ID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `Sub_ID` (`Sub_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Card_no`),
  ADD KEY `Request_Id` (`Request_Id`);

--
-- Indexes for table `phonenumber`
--
ALTER TABLE `phonenumber`
  ADD KEY `Therapist_Id` (`Therapist_Id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Request_Id`),
  ADD KEY `Therapist_ID` (`Therapist_ID`) USING BTREE,
  ADD KEY `P_ID` (`P_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Schedule_ID`),
  ADD KEY `Therapist_Id` (`Therapist_Id`);

--
-- Indexes for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`Sub_ID`),
  ADD KEY `Admin-ID` (`Admin-ID`);

--
-- Indexes for table `therapists`
--
ALTER TABLE `therapists`
  ADD PRIMARY KEY (`Therapist_ID`) USING BTREE;

--
-- Indexes for table `user_videos`
--
ALTER TABLE `user_videos`
  ADD KEY `P_ID` (`P_ID`),
  ADD KEY `V_ID` (`V_ID`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`V_ID`),
  ADD KEY `Admin_Id` (`Admin_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin-ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_discussion_club`
--
ALTER TABLE `book_discussion_club`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Card_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Request_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `Sub_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapists`
--
ALTER TABLE `therapists`
  MODIFY `Therapist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `V_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_discussion_club`
--
ALTER TABLE `book_discussion_club`
  ADD CONSTRAINT `book_discussion_club_ibfk_1` FOREIGN KEY (`Sub_Id`) REFERENCES `subscription_plan` (`Sub_ID`),
  ADD CONSTRAINT `book_discussion_club_ibfk_2` FOREIGN KEY (`Sub_ID`) REFERENCES `subscription_plan` (`Sub_ID`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`Sub_ID`) REFERENCES `subscription_plan` (`Sub_ID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `patients` (`P_ID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`Admin_Id`) REFERENCES `admin` (`Admin-ID`);

--
-- Constraints for table `group_therapy`
--
ALTER TABLE `group_therapy`
  ADD CONSTRAINT `group_therapy_ibfk_1` FOREIGN KEY (`Sub_ID`) REFERENCES `subscription_plan` (`Sub_ID`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`Sub_ID`) REFERENCES `subscription_plan` (`Sub_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Request_Id`) REFERENCES `request` (`Request_Id`);

--
-- Constraints for table `phonenumber`
--
ALTER TABLE `phonenumber`
  ADD CONSTRAINT `phonenumber_ibfk_1` FOREIGN KEY (`Therapist_Id`) REFERENCES `therapists` (`Therapist_ID`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`Therapist_ID`) REFERENCES `therapists` (`Therapist_ID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Therapist_Id`) REFERENCES `therapists` (`Therapist_ID`);

--
-- Constraints for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD CONSTRAINT `subscription_plan_ibfk_1` FOREIGN KEY (`Admin-ID`) REFERENCES `admin` (`Admin-ID`);

--
-- Constraints for table `user_videos`
--
ALTER TABLE `user_videos`
  ADD CONSTRAINT `user_videos_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `patients` (`P_ID`),
  ADD CONSTRAINT `user_videos_ibfk_2` FOREIGN KEY (`V_ID`) REFERENCES `videos` (`V_ID`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`Admin_Id`) REFERENCES `admin` (`Admin-ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
