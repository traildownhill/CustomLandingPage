-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 04:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ucategory` varchar(20) NOT NULL,
  `subcribe` varchar(20) NOT NULL,
  `datesub_start` varchar(20) NOT NULL,
  `datesub_end` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`id`, `name`, `username`, `pass`, `email`, `status`, `ucategory`, `subcribe`, `datesub_start`, `datesub_end`) VALUES
(1, 'Administrator', 'admin', '$2y$12$fTpGJB44Zzj1PVr67WV0gegUsuvnMgbE.x8wgkpqBGDfCCITDmBIG', 'admin@gmail.com', 'Active', 'Administrator', 'Yes', '', ''),
(2, 'User', 'user', '$2y$12$D36eR9bYAr0uTIhV4OsLfe/1/Iu6iAS48wykkSAVvzKQ4tb.oiEJ6', 'user@gmail.com', 'Inactive', 'User', 'Yes', '', ''),
(3, 'external1', 'external1', '$2y$12$WZO.0ecsvfHNiMK/LA129ucgx5x8PjqVgooJZFtwqyTRTDIMYHPQG', 'xternal1@gmail.com', 'Active', 'User', 'Yes', '', ''),
(4, 'D. Saraswathi', 'aujsc.com.heruela.j', '$2y$12$g81Msr2N9xMIUVw6yldIMu/NAtkeblMRCn/R8uQgFvRKzKAXrSZym', 'jarenloydheruela@gmail.com', 'Active', 'User', 'No', '', ''),
(5, 'kyle madasa', 'kyle', '$2y$12$OsVWWOQTE68it56XNINKS.HtBPvWaV1fqUQNAB99f24PPu/hJSVAK', 'kyle@gmail.com', 'Unsubscribe', 'User', 'No', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblarticle`
--

CREATE TABLE `tblarticle` (
  `id` int(100) NOT NULL,
  `a_title` varchar(200) NOT NULL,
  `a_description` longtext NOT NULL,
  `a_author` varchar(100) NOT NULL,
  `a_datepub` varchar(20) NOT NULL,
  `a_creator` varchar(100) NOT NULL,
  `a_created` varchar(20) NOT NULL,
  `a_tagging` varchar(100) NOT NULL,
  `a_pdf_file` varchar(10) NOT NULL,
  `a_cites` varchar(20) NOT NULL,
  `a_views` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblarticle`
--

INSERT INTO `tblarticle` (`id`, `a_title`, `a_description`, `a_author`, `a_datepub`, `a_creator`, `a_created`, `a_tagging`, `a_pdf_file`, `a_cites`, `a_views`) VALUES
(1, 'The Implementation of Outcome-Based Education in a State University', 'Higher educational institutions are encouraged to implement the Outcome-Based Education to prepare instructors to be competitive and produce graduates who are ready to meet the global job needs. To determine the level of implementation of the Outcome-Based Education (OBE) in Central Philippines State University, the researcher employed the sequential explanatory mixed-method design which involves two phases: the quantitative followed by qualitative. The quantitative data were collected through a validated survey instrument, while the qualitative data were gathered from the participants through an in-depth semi-structured interview which culled out their experiences on the implementation of the Outcome-Based Education. The findings of the study revealed that Outcome-Based Education standards were moderately implemented in the university. This means that the learning experiences of students and the teaching methodology could hardly develop their skills to attain the intended learning outcomes. Qualitatively, the results yielded different themes that brought forth an eidetic insight that the OBE implementation is collaborative and value-laden effort: bridging theory and practice of the academic community. The research findings were used as a basis for designing the proposed CPSU-Operational Plan using the Approach, Deployment, Learning, Integration (ADLI) model that can be adopted and implemented by the University.\r\n', 'MERFE D. CAYOT', '2018-12-19', '1', 'Apr-15-22', '#learning,#literacy,#edreform', 'uploads/Th', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthor`
--

CREATE TABLE `tblauthor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `fstudy` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblauthor`
--

INSERT INTO `tblauthor` (`id`, `name`, `email`, `profession`, `description`, `fstudy`, `created`) VALUES
(1, 'Stephen McKenzie', 'stephen@gmail.com', 'Professor', 'qwertyuio', 'Computer Science', '1'),
(2, 'Filia Garivaldis', 'fillia@gmail.com', 'Professor', 'qwertyui', 'Computer Science, Education', '1'),
(3, 'Angelos Kaissidis', 'agelos@gmail.com', 'Professor', 'qwertyui', 'Computer Science, Education', '1'),
(4, 'Matt Mundy', 'matt@gmail.com', 'Professor', 'qw67', 'Computer Science, Education, Engineering', '1'),
(5, 'MERFE D. CAYOT', 'merfe@gmail.com', 'Professor', 'sdfghjkl', 'Education', '1'),
(6, 'Daner Chen ', 'daner@gmail.com', 'Researcher', 'qwertyui', 'Computer Science', '1'),
(18, 'Jaren Heruela', 'jarenloydheruela@gmail.com', 'Researcher', '', '', '1'),
(19, 'Jaren Heruela', 'jarenloydheruela@gmail.com', 'Researcher', '', '', '1'),
(20, 'jaren  jaren', 'jarenloydheruela@gmail.com', 'Analyst', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthorredirect`
--

CREATE TABLE `tblauthorredirect` (
  `id` int(100) NOT NULL,
  `author_id` varchar(100) NOT NULL,
  `author` varchar(200) NOT NULL,
  `paper_id` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcited`
--

CREATE TABLE `tblcited` (
  `id` int(11) NOT NULL,
  `table_type` varchar(100) NOT NULL,
  `paper_id` varchar(100) NOT NULL,
  `paper_title` varchar(200) NOT NULL,
  `cited_byN` varchar(100) NOT NULL,
  `cited_byE` varchar(100) NOT NULL,
  `cited_date` varchar(100) NOT NULL,
  `cited_byId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcited`
--

INSERT INTO `tblcited` (`id`, `table_type`, `paper_id`, `paper_title`, `cited_byN`, `cited_byE`, `cited_date`, `cited_byId`) VALUES
(1, 'Research', '1', '', 'User', 'user@gmail.com', 'April 15, 2022, 4:11 am', '2'),
(2, 'Research', '1', '', 'User', 'user@gmail.com', 'April 15, 2022, 4:14 am', '2'),
(3, 'Research', '1', '', 'external1', 'xternal1@gmail.com', 'April 17, 2022, 8:33 am', '3'),
(4, 'Research', '1', '', 'Administrator', 'admin@gmail.com', 'April 24, 2022, 6:21 am', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblevents`
--

CREATE TABLE `tblevents` (
  `id` int(100) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_description` longtext NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblevents`
--

INSERT INTO `tblevents` (`id`, `event_name`, `event_description`, `date`, `time`) VALUES
(1, 'Final Defense', ' Final Defense for college graduating students', '2022-04-17', '10:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbljournal`
--

CREATE TABLE `tbljournal` (
  `id` int(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `author` varchar(100) NOT NULL,
  `datepub` varchar(50) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `pdf_file` varchar(100) NOT NULL,
  `tagging` varchar(100) NOT NULL,
  `fstudy` varchar(20) NOT NULL,
  `cites` varchar(20) NOT NULL,
  `views` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbljournal`
--

INSERT INTO `tbljournal` (`id`, `title`, `description`, `author`, `datepub`, `creator`, `created`, `status`, `pdf_file`, `tagging`, `fstudy`, `cites`, `views`) VALUES
(1, 'The Implementation of Outcome-Based Education in a State University', 'Higher educational institutions are encouraged to implement the Outcome-Based Education to prepare instructors to be competitive and produce graduates who are ready to meet the global job needs. To determine the level of implementation of the Outcome-Based Education (OBE) in Central Philippines State University, the researcher employed the sequential explanatory mixed-method design which involves two phases: the quantitative followed by qualitative. The quantitative data were collected through a validated survey instrument, while the qualitative data were gathered from the participants through an in-depth semi-structured interview which culled out their experiences on the implementation of the Outcome-Based Education. The findings of the study revealed that Outcome-Based Education standards were moderately implemented in the university. This means that the learning experiences of students and the teaching methodology could hardly develop their skills to attain the intended learning outcomes. Qualitatively, the results yielded different themes that brought forth an eidetic insight that the OBE implementation is collaborative and value-laden effort: bridging theory and practice of the academic community. The research findings were used as a basis for designing the proposed CPSU-Operational Plan using the Approach, Deployment, Learning, Integration (ADLI) model that can be adopted and implemented by the University.\r\n', 'MERFE D. CAYOT', '2018-12-19', '1', '2022-04-15', '', 'uploads/The Implementation of Outcome-Based Education in a State University.pdf', '#learning, #literacy', 'Education', '1', '5'),
(2, 'sample 1', 'sample 1sample 1sample 1sample 1sample 1sample 1', 'Stephen McKenzie', '2022-04-12', '1', '2022-04-17', '', 'uploads/Afully ol rs for research student and researchers.pdf', '#mathchat, #edreform', 'Engineering, Geology', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `action` varchar(200) NOT NULL,
  `management` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblnews`
--

CREATE TABLE `tblnews` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `tags` varchar(200) NOT NULL,
  `cites` varchar(20) NOT NULL,
  `views` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnews`
--

INSERT INTO `tblnews` (`id`, `name`, `mobile`, `email`, `author`, `tags`, `cites`, `views`) VALUES
(1, 'Nine Dead, Hundreds Fall Ill With Diarrhoea In Typhoon-Hit Philippines', ' Nine people have died and hundreds have fallen ill with diarrhoea in areas of the Philippines wrecked by a typhoon last month, with aid officials warning of a health crisis as millions struggle to secure clean water and food.\r\n', '2022-01-22', 'World News', '#news, #typhoon', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblresearch`
--

CREATE TABLE `tblresearch` (
  `id` int(100) NOT NULL,
  `title` longtext NOT NULL,
  `abstract` longtext NOT NULL,
  `main_author` varchar(100) NOT NULL,
  `co_authors` varchar(100) NOT NULL,
  `date_publish` varchar(20) NOT NULL,
  `r_status` varchar(120) NOT NULL,
  `field_of_study` varchar(100) NOT NULL,
  `pdf_file` varchar(100) NOT NULL,
  `tagging` varchar(100) NOT NULL,
  `cites` varchar(100) NOT NULL,
  `views` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresearch`
--

INSERT INTO `tblresearch` (`id`, `title`, `abstract`, `main_author`, `co_authors`, `date_publish`, `r_status`, `field_of_study`, `pdf_file`, `tagging`, `cites`, `views`) VALUES
(1, 'DEVELOPMENT OF A TRANSFERABLE RESEARCH PORTAL -\r\nCREATING AN ON CAMPUS EQUIVALENT FULLY ONLINE \r\nRESEARCH COURSE COMPONENT\r\n', 'Monash University’s Graduate Diploma in Psychology – Advanced – (GDP-A) is an innovative fully \r\nonline accredited Fourth Year Psychology course which enables its students to undertake further \r\nspecialised professional postgraduate training in psychology. The GDP-A commenced in March 2016 \r\nand consists of four course units and four research units presented in alternating six week teaching \r\nperiods. \r\nMany challenges are arising in the development of the GDP-A which are also opportunities, including \r\nthe translation of a traditional on campus research project into a fully online mode, the ability to scale \r\nfrom a starting number of 80 students to several hundred students, and the development of clinical \r\nand research skills through virtual means. The scale and scope of the GDP-A and its challenges/ \r\nopportunities are unprecedented. \r\nA particularly great challenge and opportunity for the successful development and implementation of \r\nthe GDP-A is the need for a fully online research project that is fully equivalent to an on campus \r\nresearch project. This will consist of a research thesis based on the conducting of experiments, \r\nsurveys, access to or creation of a database and associated statistical analyses. To meet this \r\nchallenge/opportunity we are developing and implementing a Research Portal.\r\n', 'Stephen McKenzie', 'Filia Garivaldis, Angelos Kaissidis, Matt Mundy', '2020-06-28', 'Published', 'Education', 'uploads/Portaldevelopment.pdf', '#learning, #edtech, #engchat', '03', '07'),
(2, 'sample1', 'wertyuiokjhgfdsasdfghnm', 'Matt Mundy', 'Filia Garivaldis', '2022-03-30', 'Unpublished', 'Materials Science', 'uploads/20090202_ismael_pena-lopez_personal_research_portal.pdf', '#scichat', '07', '02'),
(3, 'Sample Research 1', 'Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1Sample Research 1', 'Stephen McKenzie', 'MERFE D. CAYOT', '2022-03-29', 'Published', 'Education', 'uploads/A Multifunctional Online Research Portal for Facilitation of.pdf', '#learning, #literacy, #edreform', '01', '03'),
(4, 'The Collaborative Filtering Recommendation Algorithm Based on BP Neural \r\nNetworks\r\n', 'Collaborative filtering is one of the most successful \r\ntechnologies in recommender systems, and widely used in \r\nmany personalized recommender areas with the development \r\nof Internet, such as e-commerce, digital library and so on. The \r\nK-nearest neighbor method is a popular way for the \r\ncollaborative filtering realizations. Its key technique is to find k \r\nnearest neighbors for a given user to predict his interests. \r\nHowever, most collaborative filtering algorithms suffer from \r\ndata sparsity which leads to inaccuracy of recommendation. \r\nAiming at the problem of data sparsity for collaborative \r\nfiltering, a collaborative filtering algorithm based on BP neural \r\nnetworks is presented. This method uses the BP neural \r\nnetworks to fill the vacant ratings at first, then uses \r\ncollaborative filtering to form nearest neighborhood, and lastly \r\ngenerates recommendations. The collaborative filtering based \r\non BP neural networks smoothing can produce more accuracy \r\nrecommendation than the traditional method.', 'Daner Chen', 'Angelos Kaissidis, Matt Mundy, MERFE D. CAYOT', '2022-04-04', 'Unpublished', 'Computer Science', 'uploads/A multi-level collaborative filtering method that improves recommendations.pdf', '#learning, #edtech', '05', '15'),
(10, 'y7ui', 'fvghfvghghj', 'Stephen McKenzie', ', Stephen McKenzie, Filia Garivaldis', '2022-03-31', 'Select...', 'Select...', 'uploads/Resume.pdf', '', '0', '0'),
(11, 'GYHJGHJ', 'gyugyhuj', 'jaren jaren', 'jaren jaren', '2022-04-11', 'Published', 'Linguistics', 'uploads/untitled.pdf', '', '0', '0'),
(12, 'ertyu', 'lkjhgfyt', 'Daner Chen', ', Stephen McKenzie, Filia Garivaldis, Angelos Kaissidis', '2022-05-05', 'Unpublished', 'Materials Science', 'uploads/Resume.pdf', '', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblarticle`
--
ALTER TABLE `tblarticle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthor`
--
ALTER TABLE `tblauthor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthorredirect`
--
ALTER TABLE `tblauthorredirect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcited`
--
ALTER TABLE `tblcited`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblevents`
--
ALTER TABLE `tblevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbljournal`
--
ALTER TABLE `tbljournal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresearch`
--
ALTER TABLE `tblresearch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblarticle`
--
ALTER TABLE `tblarticle`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblauthor`
--
ALTER TABLE `tblauthor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblauthorredirect`
--
ALTER TABLE `tblauthorredirect`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcited`
--
ALTER TABLE `tblcited`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblevents`
--
ALTER TABLE `tblevents`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbljournal`
--
ALTER TABLE `tbljournal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblresearch`
--
ALTER TABLE `tblresearch`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
