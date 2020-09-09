-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2020 at 08:01 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DISMI_FINAL`
--

-- --------------------------------------------------------

--
-- Table structure for table `d3s3m_attendee`
--

CREATE TABLE `d3s3m_attendee` (
  `att_ID` int(11) NOT NULL,
  `att_d3s3m_event_eve_ID` int(11) NOT NULL,
  `att_d3s3m_user_use_ID` int(11) NOT NULL,
  `att_COMMAND_SIGNAL` varchar(100) DEFAULT NULL,
  `att_IS_ATTEND` int(11) DEFAULT NULL,
  `att_DATE_CREATED` datetime DEFAULT NULL,
  `att_DATE_MODIFIED` datetime DEFAULT NULL,
  `att_DATE_ATTEND` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `d3s3m_category`
--

CREATE TABLE `d3s3m_category` (
  `cat_ID` int(11) NOT NULL,
  `cat_NAME` varchar(100) DEFAULT NULL,
  `cat_TYPE` int(11) DEFAULT NULL COMMENT '1: training; 2:meeting',
  `cat_DATE_CREATED` datetime DEFAULT NULL,
  `cat_DATE_MODIFIED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d3s3m_category`
--

INSERT INTO `d3s3m_category` (`cat_ID`, `cat_NAME`, `cat_TYPE`, `cat_DATE_CREATED`, `cat_DATE_MODIFIED`) VALUES
(1, 'Training Internal', 1, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(2, 'Training External', 1, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(3, 'Meeting Internal', 2, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(4, 'Meeting External', 2, '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(5, 'Training GEMBA', 1, '2019-05-09 00:00:00', '2019-05-12 19:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `d3s3m_company`
--

CREATE TABLE `d3s3m_company` (
  `com_ID` int(11) NOT NULL,
  `com_NAME` varchar(100) DEFAULT NULL,
  `com_DATE_CREATED` datetime DEFAULT NULL,
  `com_DATE_MODIFIED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d3s3m_company`
--

INSERT INTO `d3s3m_company` (`com_ID`, `com_NAME`, `com_DATE_CREATED`, `com_DATE_MODIFIED`) VALUES
(1, 'PT. DENSO INDONESIA', '2019-05-09 00:00:00', '2019-05-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `d3s3m_division`
--

CREATE TABLE `d3s3m_division` (
  `div_ID` int(11) NOT NULL,
  `div_NAME` varchar(100) DEFAULT NULL,
  `div_DATE_CREATED` datetime DEFAULT NULL,
  `div_DATE_MODIFIED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d3s3m_division`
--

INSERT INTO `d3s3m_division` (`div_ID`, `div_NAME`, `div_DATE_CREATED`, `div_DATE_MODIFIED`) VALUES
(1, 'TRAINING & EDUC', '2019-05-09 00:00:00', '2019-05-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `d3s3m_energy`
--

CREATE TABLE `d3s3m_energy` (
  `ene_ID` bigint(20) NOT NULL,
  `ene_KWH_ADDRESS` int(11) DEFAULT NULL,
  `ene_KWH` float DEFAULT NULL,
  `ene_DATE_CREATED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `d3s3m_event`
--

CREATE TABLE `d3s3m_event` (
  `eve_ID` int(11) NOT NULL,
  `eve_TITLE` varchar(300) DEFAULT NULL,
  `eve_d3s3m_user_use_ID` int(11) NOT NULL,
  `eve_d3s3m_category_cat_ID` int(11) NOT NULL,
  `eve_EVENT_PREPARATION` int(11) DEFAULT NULL,
  `eve_EVENT_INITIATION` datetime DEFAULT NULL,
  `eve_EVENT_START` datetime DEFAULT NULL,
  `eve_EVENT_FINISH` datetime DEFAULT NULL,
  `eve_d3s3m_room_roo_ID` int(11) NOT NULL,
  `eve_SUMMARY` text,
  `eve_DESCRIPTION` text,
  `eve_STATUS` int(11) DEFAULT NULL COMMENT '0:draft; 1:new; 2:approve; 3:cancel; 4:finish; 5:rejected',
  `eve_IS_START` int(11) DEFAULT NULL,
  `eve_DATE_START` datetime DEFAULT NULL,
  `eve_IS_FINISH` int(11) DEFAULT NULL,
  `eve_DATE_FINISH` datetime DEFAULT NULL,
  `eve_IS_EXTENDED` int(11) DEFAULT NULL,
  `eve_DATE_CREATED` datetime DEFAULT NULL,
  `eve_DATE_MODIFIED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `d3s3m_role`
--

CREATE TABLE `d3s3m_role` (
  `rol_ID` int(11) NOT NULL,
  `rol_NAME` varchar(100) DEFAULT NULL,
  `rol_DATE_CREATED` datetime DEFAULT NULL,
  `rol_DATE_MODIFIED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d3s3m_role`
--

INSERT INTO `d3s3m_role` (`rol_ID`, `rol_NAME`, `rol_DATE_CREATED`, `rol_DATE_MODIFIED`) VALUES
(1, 'Superadmin', '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(2, 'Trainer', '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(3, 'Attendee', '2019-05-09 00:00:00', '2019-05-09 00:00:00'),
(4, 'VIP', '2019-05-09 00:00:00', '2019-05-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `d3s3m_room`
--

CREATE TABLE `d3s3m_room` (
  `roo_ID` int(11) NOT NULL,
  `roo_NAME` varchar(100) DEFAULT NULL,
  `roo_CAPACITY` int(11) DEFAULT NULL,
  `roo_KWH_STANDARD` int(11) DEFAULT NULL,
  `roo_KWH_ADDRESS` text,
  `roo_POWER_ADDRESS` text,
  `roo_BLINKING_ADDRESS` text,
  `roo_IS_ACTIVE` int(11) DEFAULT NULL,
  `roo_DATE_CREATED` datetime DEFAULT NULL,
  `roo_DATE_MODIFIED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d3s3m_room`
--

INSERT INTO `d3s3m_room` (`roo_ID`, `roo_NAME`, `roo_CAPACITY`, `roo_KWH_STANDARD`, `roo_KWH_ADDRESS`, `roo_POWER_ADDRESS`, `roo_BLINKING_ADDRESS`, `roo_IS_ACTIVE`, `roo_DATE_CREATED`, `roo_DATE_MODIFIED`) VALUES
(1, 'Function Room 1', 12, 2, '122', '200', '201', 1, '2019-05-09 00:00:00', '2019-08-18 12:57:34'),
(2, 'Function Room 2', 12, 2, '0', '0', '0', 1, '2019-05-09 00:00:00', '2019-08-18 12:57:34'),
(3, 'Mechanic Room 1', 12, 2, '0', '0', '0', 1, '2019-05-09 00:00:00', '2019-08-18 12:57:34'),
(4, 'Mechanic Room 2', 12, 2, '0', '0', '0', 1, '2019-05-09 00:00:00', '2019-08-18 12:57:34'),
(5, 'Common Room 1', 12, 2, '0', '0', '0', 1, '2019-05-09 00:00:00', '2019-08-18 12:57:34'),
(6, 'Common Room 2', 12, 2, '0', '0', '0', 1, '2019-05-09 00:00:00', '2019-08-18 12:57:34'),
(7, 'Computer Room', 12, 2, '0', '0', '0', 1, '2019-05-09 00:00:00', '2019-08-18 12:57:34'),
(8, 'Electronic Room', 12, 2, '113', '0', '0', 1, '2019-05-09 00:00:00', '2019-08-18 12:57:34'),
(9, 'Electrical room', 12, 2, '124', '0', '0', 1, '2019-05-09 00:00:00', '2019-08-18 12:57:34'),
(10, 'Instructure Room', 12, 2, '116', '40122', '0', 1, '2019-05-09 00:00:00', '2019-08-18 12:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `d3s3m_user`
--

CREATE TABLE `d3s3m_user` (
  `use_ID` int(11) NOT NULL,
  `use_FULLNAME` varchar(100) DEFAULT NULL,
  `use_EMAIL` varchar(200) DEFAULT NULL,
  `use_d3s3m_company_com_ID` int(11) NOT NULL,
  `use_d3s3m_division_div_ID` int(11) NOT NULL,
  `use_d3s3m_role_rol_ID` int(11) NOT NULL,
  `use_PASSWORD` text,
  `use_TRAINING_TARGET` int(11) DEFAULT NULL,
  `use_IS_ACTIVE` int(11) DEFAULT NULL,
  `use_IS_VIP` int(11) DEFAULT NULL,
  `use_DATE_CREATED` datetime DEFAULT NULL,
  `use_DATE_MODIFIED` datetime DEFAULT NULL,
  `use_LAST_LOGIN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `d3s3m_user`
--

INSERT INTO `d3s3m_user` (`use_ID`, `use_FULLNAME`, `use_EMAIL`, `use_d3s3m_company_com_ID`, `use_d3s3m_division_div_ID`, `use_d3s3m_role_rol_ID`, `use_PASSWORD`, `use_TRAINING_TARGET`, `use_IS_ACTIVE`, `use_IS_VIP`, `use_DATE_CREATED`, `use_DATE_MODIFIED`, `use_LAST_LOGIN`) VALUES
(1, 'Admin DSM', 'admin.dsm@denso.co.id', 1, 1, 2, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-05-09 00:00:00', '2019-08-17 16:40:15', '2020-09-06 14:21:31'),
(115, 'MICHAEL HARYONO', 'micharyono@gmail.com', 1, 1, 2, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-05-28 12:21:37', NULL, '2020-04-27 10:41:28'),
(116, 'ANTUNG EDY ERWANTORO', 'antungedye2558@gmail.com', 1, 1, 2, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-05-28 12:21:37', NULL, NULL),
(117, 'MULATNO', 'mulatno_hsn@yahoo.co.id', 1, 1, 2, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-05-28 12:21:37', NULL, '2019-08-18 21:21:21'),
(118, 'MAHEFUD ISMAIL', 'mahefud_79@yahoo.com', 1, 1, 3, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-05-28 12:21:37', NULL, NULL),
(119, 'FITYAN NURUL SOFA', 'fityannurulsofa@gmail.com', 1, 1, 3, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-05-28 12:21:37', NULL, '2019-08-18 21:21:47'),
(120, 'DITA RIAWATI', 'riawatidita@gmail.com', 1, 1, 3, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-05-28 12:21:37', NULL, NULL),
(121, 'ANDIK SUTRIMO', 'andiksutrimo@gmail.com', 1, 1, 3, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-05-28 12:21:37', NULL, '2019-08-18 21:22:33'),
(122, 'NUR ALI', 'nur_ali@gmail.com', 1, 1, 3, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-05-28 12:21:37', NULL, '2020-04-27 10:40:40'),
(123, 'ERLINA KURNIANTI', 'erlinakurnianti24@gmail.com', 1, 1, 3, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-05-28 12:21:37', NULL, NULL),
(124, 'irvan ellika', 'irvanelliika@denso.co.id', 1, 1, 1, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-09-12 18:49:15', NULL, '2020-04-27 10:41:58'),
(125, 'Denis Febrianto', 'denisfebrianto@denso.co.id', 1, 1, 4, '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, '2019-09-16 15:27:28', NULL, '2019-09-16 15:28:02'),
(136, 'Hebert Hendrik', 'hebert.hendrik@gmail.com', 1, 1, 2, 'be04d86a1c365782fe1297dd30dde291', 0, 1, 0, '2020-05-20 21:41:46', '2020-06-13 05:53:13', '2020-06-21 07:25:35'),
(141, 'Kamus Masak', 'cs.kamusmasak@gmail.com', 1, 1, 1, 'a837c669cefc88ec62a058eb74c45325', 0, 1, 0, '2020-06-14 22:14:10', NULL, '2020-06-14 15:15:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d3s3m_attendee`
--
ALTER TABLE `d3s3m_attendee`
  ADD PRIMARY KEY (`att_ID`),
  ADD KEY `fk_d3s3m_attendee_d3s3m_event1_idx` (`att_d3s3m_event_eve_ID`),
  ADD KEY `fk_d3s3m_attendee_d3s3m_user1_idx` (`att_d3s3m_user_use_ID`);

--
-- Indexes for table `d3s3m_category`
--
ALTER TABLE `d3s3m_category`
  ADD PRIMARY KEY (`cat_ID`);

--
-- Indexes for table `d3s3m_company`
--
ALTER TABLE `d3s3m_company`
  ADD PRIMARY KEY (`com_ID`);

--
-- Indexes for table `d3s3m_division`
--
ALTER TABLE `d3s3m_division`
  ADD PRIMARY KEY (`div_ID`);

--
-- Indexes for table `d3s3m_energy`
--
ALTER TABLE `d3s3m_energy`
  ADD PRIMARY KEY (`ene_ID`);

--
-- Indexes for table `d3s3m_event`
--
ALTER TABLE `d3s3m_event`
  ADD PRIMARY KEY (`eve_ID`),
  ADD KEY `fk_d3s3m_event_d3s3m_user1_idx` (`eve_d3s3m_user_use_ID`),
  ADD KEY `fk_d3s3m_event_d3s3m_category1_idx` (`eve_d3s3m_category_cat_ID`),
  ADD KEY `fk_d3s3m_event_d3s3m_room1_idx` (`eve_d3s3m_room_roo_ID`);

--
-- Indexes for table `d3s3m_role`
--
ALTER TABLE `d3s3m_role`
  ADD PRIMARY KEY (`rol_ID`);

--
-- Indexes for table `d3s3m_room`
--
ALTER TABLE `d3s3m_room`
  ADD PRIMARY KEY (`roo_ID`);

--
-- Indexes for table `d3s3m_user`
--
ALTER TABLE `d3s3m_user`
  ADD PRIMARY KEY (`use_ID`),
  ADD KEY `fk_d3s3m_user_d3s3m_company_idx` (`use_d3s3m_company_com_ID`),
  ADD KEY `fk_d3s3m_user_d3s3m_division1_idx` (`use_d3s3m_division_div_ID`),
  ADD KEY `fk_d3s3m_user_d3s3m_role1_idx` (`use_d3s3m_role_rol_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d3s3m_attendee`
--
ALTER TABLE `d3s3m_attendee`
  MODIFY `att_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d3s3m_category`
--
ALTER TABLE `d3s3m_category`
  MODIFY `cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `d3s3m_company`
--
ALTER TABLE `d3s3m_company`
  MODIFY `com_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `d3s3m_division`
--
ALTER TABLE `d3s3m_division`
  MODIFY `div_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `d3s3m_energy`
--
ALTER TABLE `d3s3m_energy`
  MODIFY `ene_ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d3s3m_event`
--
ALTER TABLE `d3s3m_event`
  MODIFY `eve_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d3s3m_role`
--
ALTER TABLE `d3s3m_role`
  MODIFY `rol_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `d3s3m_room`
--
ALTER TABLE `d3s3m_room`
  MODIFY `roo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `d3s3m_user`
--
ALTER TABLE `d3s3m_user`
  MODIFY `use_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d3s3m_attendee`
--
ALTER TABLE `d3s3m_attendee`
  ADD CONSTRAINT `fk_d3s3m_attendee_d3s3m_event1` FOREIGN KEY (`att_d3s3m_event_eve_ID`) REFERENCES `d3s3m_event` (`eve_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_d3s3m_attendee_d3s3m_user1` FOREIGN KEY (`att_d3s3m_user_use_ID`) REFERENCES `d3s3m_user` (`use_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `d3s3m_event`
--
ALTER TABLE `d3s3m_event`
  ADD CONSTRAINT `fk_d3s3m_event_d3s3m_category1` FOREIGN KEY (`eve_d3s3m_category_cat_ID`) REFERENCES `d3s3m_category` (`cat_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_d3s3m_event_d3s3m_room1` FOREIGN KEY (`eve_d3s3m_room_roo_ID`) REFERENCES `d3s3m_room` (`roo_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_d3s3m_event_d3s3m_user1` FOREIGN KEY (`eve_d3s3m_user_use_ID`) REFERENCES `d3s3m_user` (`use_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `d3s3m_user`
--
ALTER TABLE `d3s3m_user`
  ADD CONSTRAINT `fk_d3s3m_user_d3s3m_company` FOREIGN KEY (`use_d3s3m_company_com_ID`) REFERENCES `d3s3m_company` (`com_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_d3s3m_user_d3s3m_division1` FOREIGN KEY (`use_d3s3m_division_div_ID`) REFERENCES `d3s3m_division` (`div_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_d3s3m_user_d3s3m_role1` FOREIGN KEY (`use_d3s3m_role_rol_ID`) REFERENCES `d3s3m_role` (`rol_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
