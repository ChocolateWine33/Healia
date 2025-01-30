-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 08:49 AM
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
  `Admin_ID` int(11) NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  `Admin_Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `image`, `Admin_Name`, `Email`, `Password`) VALUES
(1, 'admin.png', 'Nada', 'nada@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `book_discussion_club`
--

CREATE TABLE `book_discussion_club` (
  `Book_ID` int(11) NOT NULL,
  `Book_image` varchar(30) NOT NULL,
  `Book_Name` varchar(70) NOT NULL,
  `Description` varchar(400) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_discussion_club`
--

INSERT INTO `book_discussion_club` (`Book_ID`, `Book_image`, `Book_Name`, `Description`, `date`, `time`, `url`) VALUES
(1, 'think.jpeg', 'Thinking, Fast and Slow', 'Thinking, Fast and Slow is a 2011 popular science book by psychologist Daniel Kahneman. The book\'s main thesis is a differentiation between two modes of thought: \"System 1\" is fast, instinctive and emotional; \"System 2\" is slower, more deliberative, and more logical.', '2023-07-02', '20:00:00', 'http://localhost/Healia/subplan.php'),
(2, 'words.jpg', 'Words Can Change Your Brain', 'Andrew Newberg, M.D., and Mark Waldman have discovered a powerful strategy called Compassionate Communication that allows two brains to work together as one. Using brainscans as well as data collected from workshops given to MBA students at Loyola Marymount University, and clinical data from both couples in therapy and organizations helping caregivers', '2023-07-05', '19:00:00', 'http://localhost/Healia/subplan.php'),
(3, 'person.jpg', 'The Personality Brokers', 'By MERVE EMRE, An unprecedented history of the personality test conceived a century ago by a mother and her daughter—fiction writers with no formal training in psychology—and how it insinuated itself into our boardrooms, classrooms, and beyond.\r\n', '2023-06-30', '17:00:00', 'http://localhost/Healia/subplan.php'),
(4, 'stress.jpg', 'Supporting Kids and Teens with Exam Stress in Scho', 'As young people are exposed to more and more pressure at school, exam stress comes hand in hand. This workbook, a fun and interactive resource aimed at children and teens aged 10 and over, offers teachers, other professionals and parents tried and tested techniques to support young people\'s wellbeing through revision and exams.', '2023-06-29', '14:00:00', 'http://localhost/Healia/subplan.php'),
(5, 'brain.jpg', 'Brainstorm: The Power and Purpose of the Teenage B', 'By Daniel J. Siegel MD, In this groundbreaking book, the bestselling author of *Parenting from the Inside Out* and *The Whole-Brain Child* shows parents how to turn one of the most challenging developmental periods in their children\'s lives into one of the most rewarding', '2023-07-09', '20:00:00', 'http://localhost/Healia/subplan.php'),
(6, 'content.jpeg', 'The Man Who Mistook His Wife for a Hat.', 'In this extraordinary book, Dr. Oliver Sacks recounts the stories of patients struggling to adapt to often bizarre worlds of neurological disorder. Here are people who can no longer recognize everyday objects or those they love; who are stricken with violent tics or shout involuntary obscenities, and yet are gifted with unusually acute artistic or mathematical talents. ', '2023-07-04', '14:30:00', 'http://localhost/Healia/subplan.php');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_ID` int(11) NOT NULL,
  `Event_Title` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Address` varchar(35) NOT NULL,
  `Date` date DEFAULT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_ID`, `Event_Title`, `Description`, `Address`, `Date`, `time`) VALUES
(1, '15th Pan Arab', '15th Pan Arab Psychiatric Congress In collaboration with Egyptian Psychiatric Association.', 'Marriott Hotel, Cairo – Egypt', '2023-07-04', '18:00:00'),
(2, 'ICPPW', 'International Conference on Positive Psychology and Wellbeing  aims to bring together leading academic scientists, researchers and research scholars to exchange and share their experiences and research results on all aspects of Positive Psychology and Wellbeing. ', 'Cairo – Egypt', '2023-06-29', '14:00:00'),
(3, 'International Congress of Psychology', 'The IUPsyS sponsors an International Congress of Psychology (ICP) every four years. The ICP is organized by a national host committee under the auspices of the Union and in consultation with the IUPsyS Executive Committee.', 'Cairo, Egypt', '2023-07-01', '20:00:00'),
(4, 'The Egyptian Eating Disor', 'Introducing Eating Disorders program in the MENA region, offering multidisciplinary support for people living with Eating Disorders and body image concerns.', 'Dusit Thani Lake View, Cairo', '2023-07-19', '12:00:00'),
(5, 'Creative Art Therapies', 'They are forms of psychotherapy that use art as a way of expressing and communicating difficult, confusing, or distressing feelings and experiences. These practices combine creative processes and therapy, facilitating self-exploration, awareness, and understanding.', 'Four Seasons Hotel Cairo at Nile Pl', '2023-07-05', '12:00:00'),
(6, 'CMHAD Parent Webinar', 'Parents and Teens Talking Together Children\'s Mental Health Awareness Day.', 'Grand Nile Tower Hotel', '2023-07-10', '16:00:00');

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
  `Group_Name` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(100) NOT NULL,
  `G_Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_therapy`
--

INSERT INTO `group_therapy` (`Group_ID`, `Group_Name`, `date`, `time`, `location`, `G_Description`) VALUES
(1, 'Divorce Groups', '2023-07-04', '19:00:00', 'Isadore community center', 'For many, divorce is a traumatizing experience, while for all, it is a period of significant life change. A person going through a divorce may have lost a significant number of people that they relied on for support. Accordingly, the group setting provides a platform for members to speak their truths while having the camaraderie of others who have also gone or are currently going through divorce.'),
(2, 'Family Therapy', '2023-07-02', '20:00:00', 'Aurora community center.', 'Just how families vary widely, so does family therapy. Rather than solely focusing on how the family members act individually, it further explores the family unit as an entity in and of itself. Doing this demonstrates how each member must equally participate for the family unit, and ultimately the individuals, to attain better wellbeing.'),
(3, 'Trauma-related disorders', '2023-06-02', '14:00:00', 'AlKhalifa Community Center.', 'These groups use cognitive behavior therapy and similar styles to help people identify patterns of behavior that have kept them stuck in whatever problem they\'re facing. Identifying thought processes as they relate to behaviors and learning new tools to cope with situations in daily life are big parts of cognitive behavioral therapy groups. Cognitive behavioral therapy is the most common form of therapy and has seen the most success since it helps people to re-examine their thoughts and engage i'),
(4, 'Addiction group', '2023-06-01', '17:00:00', 'Darb 15 Bait Arafa', 'Addiction groups are especially powerful at holding others accountable—breaking down barriers of denial while acknowledging and amending past wrong-doings. This is significant, as acknowledging the problem and taking accountability are two of the most challenging steps toward recovery. Doing this, then, helps clear the pathway toward the successful rebuilding of one’s life.'),
(5, 'Greif Therapy', '2023-07-07', '13:00:00', 'Darb 15 Bait Arafa', 'When a loved one dies, the event can leave people feeling lost and alone. Groups for grieving people can help them find community and strength in these hard times. Some groups focus on specific types of grief.'),
(6, 'Art Group Therapy', '2023-07-17', '15:00:00', 'Isadore community center', 'Group art therapy is one of the treatment options that has been used since the 1940s to diagnose and treat mental disorders.  The goal isn’t to make the best piece of art, but to give those in the group psychotherapy the opportunity to express themselves in a way that doesn’t have to involve words. Research suggests that art group therapy appears to be effective in reducing stress and anxiety, increasing self-esteem, and promoting self-discovery and creativity.');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `P_ID` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `F_Name` varchar(15) DEFAULT NULL,
  `L_Name` varchar(15) DEFAULT NULL,
  `Gender` varchar(6) NOT NULL,
  `Birthdate` date NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(18) NOT NULL,
  `Sub_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`P_ID`, `image`, `F_Name`, `L_Name`, `Gender`, `Birthdate`, `Email`, `Password`, `Sub_ID`) VALUES
(1, NULL, 'nada', 'sabry', 'female', '2000-10-15', 'snada@gmail.com', '15102000', NULL),
(2, NULL, 'marwan', 'gamal', 'male', '2000-08-11', 'marwan@gmail.com', '$2y$10$lxJuDk3h2aI', NULL),
(20, NULL, 'youssef', 'rawy', 'male', '2000-03-11', 'youssef@gmail.com', '999', NULL),
(22, NULL, 'mohab', 'ghazal', 'male', '2000-02-11', 'mohab@gmail.com', '666', NULL),
(23, NULL, 'mahmoud', 'hany', 'male', '2000-04-22', 'mahmoud@gmail.com', '777', NULL),
(24, NULL, 'bola', 'sherif', 'male', '2000-06-03', 'bola@gmail.com', '000', NULL),
(25, NULL, 'rana', 'sabry', 'female', '1997-01-22', 'rana@gmail.com', '147', NULL),
(26, NULL, 'da.aya', 'mohamed', 'female', '2023-05-31', 'aya@gmail.com', '1111', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(11) NOT NULL,
  `Card_no` int(14) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` int(3) NOT NULL,
  `name` varchar(70) NOT NULL,
  `paydate` date NOT NULL,
  `Total_Value` int(11) NOT NULL,
  `Request_Id` int(11) DEFAULT NULL,
  `Sub_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phonenumber`
--

CREATE TABLE `phonenumber` (
  `Therapist_Id` int(11) NOT NULL,
  `Phone` varchar(35) NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phonenumber`
--

INSERT INTO `phonenumber` (`Therapist_Id`, `Phone`, `is_primary`) VALUES
(1, '01025741828', 0),
(1, '01225874999', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Request_Id` int(11) NOT NULL,
  `Therapist_ID` int(11) DEFAULT NULL,
  `P_ID` int(11) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `Date` date NOT NULL,
  `TimeFrom` time NOT NULL,
  `TimeTo` time NOT NULL,
  `Request_Value` int(4) NOT NULL,
  `Rating` int(11) DEFAULT NULL
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

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Schedule_ID`, `Therapist_Id`, `Date`, `Time_From`, `Time_To`) VALUES
(1, 1, '2023-06-27', '12:00:00', '14:00:00'),
(2, 1, '2023-06-26', '10:00:00', '12:00:00'),
(3, 1, '2023-06-29', '18:00:00', '19:00:00'),
(4, 2, '2023-06-27', '13:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `Sub_ID` int(11) NOT NULL,
  `Start_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `End_Date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `Admin-ID` int(11) DEFAULT NULL,
  `Book_ID` int(11) DEFAULT NULL,
  `Group_ID` int(11) DEFAULT NULL,
  `Event_ID` int(11) DEFAULT NULL
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
  `Therapist_Image` varchar(50) NOT NULL,
  `Is_Accepted` varchar(10) DEFAULT NULL,
  `Hour_Rate` int(3) NOT NULL,
  `cv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapists`
--

INSERT INTO `therapists` (`Therapist_ID`, `Therapist_Name`, `Gender`, `Birthdate`, `qualification`, `specialization`, `experience`, `Email`, `Password`, `Therapist_Image`, `Is_Accepted`, `Hour_Rate`, `cv`) VALUES
(1, 'Fouad Mohamed', 'male', '1983-04-01', 'Training in Cognitive behavioral therapy for depression at Egyptian Association of Psychologists', 'Depression, Anxiety Disorders ', 8, 'fouad@gmail.com', '148965', '9-3.jpg', 'Accepted', 200, 'therapists/Resume.pdf'),
(2, 'Sahar Daoud', 'female', '1989-04-11', 'Master of Science Applied Psychology from Liverpool University', 'Child Learning Disorders & Aut', 5, 'sahar@gmail.com', '336699', '158.jpeg', 'Accepted', 850, 'therapists/Resume.pdf'),
(3, 'Manal Mostafa', 'Female', '1990-05-02', 'Cognitive Behavioral Therapy for PTSD, Egyptian Psychotherapist Association At Aug 2018 - Sep 2018', 'Marriage Counselling/Relations', 3, 'manal@gmail.com', '789789', 'manal.jpg', 'Accepted', 200, 'therapists/Resume.pdf'),
(4, ' Saad El Mahdy', 'Male', '1964-02-05', 'Researcher master in psychology ,Ain-shams university, Oct 2017 - Present', 'Psychotic disorders', 5, 'saad@gmail.com', '742289', 'saad.jpg', 'Accepted', 650, 'therapists/my-cv.pdf'),
(5, 'Ameer Mahmoud', 'Male', '1987-07-21', 'Counselor and Hypnotherapist at Niko Karan Sharif Foundation', 'Sleeping & mood disorders', 4, 'ameer@gmail.com', '24763189', 'aamer.jpg', 'Accepted', 450, 'therapists/my-cv.pdf'),
(6, ' Huda Radwan', 'Female', '1977-07-27', 'Schema Therapy Diploma From Institute for Schema Therapy of Switherland', 'Child disorders, Attention-Def', 9, 'huda@gmail.com', 'n475h', 'basma.jpg', 'Accepted', 380, 'therapists/my-cv.pdf');

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
(3, 'How families can support a child\'s mental health | Paul Sunseri', 'Paul Sunseri, Psy.D. is a clinical psychologist who specializes in children’s mental health and is a pioneer in family therapy.  He is the founder of three community mental health agencies and has worked to improve the lives of countless children and families over the past three decades', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/dDQ5tgd1_HY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1),
(4, 'The psychology of self-motivation | Scott Geller', 'Scott Geller is Alumni Distinguished Professor at Virginia Tech and Director of the Center for Applied Behavior Systems in the Department of Psychology.', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/7sxpKhIbr0E\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1),
(5, 'What is the most important influence on child development | Tom Weisne', 'f you could do one thing - the most important thing - to influence the life of a young child, what would that be (it’s likely not what you first bring to mind)? We want to improve the wellbeing of children - our own, in our community, and in the world, so thinking globally about this question is vital.', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/gIZ8PkLMMUo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1),
(6, 'Who am I? A philosophical inquiry - Amy Adkins', 'Throughout the history of mankind, the subject of identity has sent poets to the blank page, philosophers to the agora and seekers to the oracles. These murky waters of abstract thinking are tricky to navigate, so it’s probably fitting that to demonstrate the complexity, the Greek historian Plutarch used the story of a ship. Amy Adkins illuminates Plutarch’s Ship of Theseus.', '<iframe width=\"300\" height=\"200\" src=\"https://www.youtube.com/embed/UHwVyplU3Pg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `book_discussion_club`
--
ALTER TABLE `book_discussion_club`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_ID`);

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
  ADD PRIMARY KEY (`Group_ID`);

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
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `Request_Id` (`Request_Id`),
  ADD KEY `Sub_ID` (`Sub_ID`);

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
  ADD KEY `Admin-ID` (`Admin-ID`),
  ADD KEY `Book_ID` (`Book_ID`),
  ADD KEY `Group_ID` (`Group_ID`),
  ADD KEY `Event_ID` (`Event_ID`);

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
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_discussion_club`
--
ALTER TABLE `book_discussion_club`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Request_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `Sub_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `therapists`
--
ALTER TABLE `therapists`
  MODIFY `Therapist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `V_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `patients` (`P_ID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`Admin_Id`) REFERENCES `admin` (`Admin_ID`);

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
  ADD CONSTRAINT `subscription_plan_ibfk_1` FOREIGN KEY (`Admin-ID`) REFERENCES `admin` (`Admin_ID`);

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
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`Admin_Id`) REFERENCES `admin` (`Admin_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
