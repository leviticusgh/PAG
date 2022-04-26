-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 12:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pag`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptid` int(11) NOT NULL,
  `department` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptid`, `department`) VALUES
(1, 'Sunday School'),
(2, 'Music'),
(3, 'Ushering'),
(4, 'Technical Team'),
(5, 'Church Executives');

-- --------------------------------------------------------

--
-- Table structure for table `harvest`
--

CREATE TABLE `harvest` (
  `hid` int(11) NOT NULL,
  `member` varchar(50) NOT NULL,
  `non_member` varchar(50) NOT NULL,
  `pledge` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `date_pledge` datetime NOT NULL,
  `date_payed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harvest`
--

INSERT INTO `harvest` (`hid`, `member`, `non_member`, `pledge`, `payment`, `date_pledge`, `date_payed`) VALUES
(8, '1', 'Null', 400, 400, '2021-11-19 16:23:00', '2022-04-19 22:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemid` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `member` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemid`, `item`, `member`, `department`, `amount`, `date_time`) VALUES
(4, 'Adapter', 1, 2, 100, '2021-11-18 15:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberid` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `othername` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `role` varchar(50) NOT NULL,
  `ministry` varchar(250) NOT NULL,
  `residence` varchar(250) NOT NULL,
  `marital_status` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `occupation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberid`, `firstname`, `surname`, `othername`, `dob`, `role`, `ministry`, `residence`, `marital_status`, `gender`, `phone_number`, `occupation`) VALUES
(1, 'David', 'Andoh', 'Ekow', '2000-03-30', 'Singer', '3', 'Accra', 'Single', 'Male', '0558495788', 'Student'),
(2, 'Emefa', 'Azumah', 'Joyceline', '1998-05-27', 'Musician', '3', 'Tema', 'Single', 'Female', '0552945197', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `ministries`
--

CREATE TABLE `ministries` (
  `minid` int(11) NOT NULL,
  `ministry` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ministries`
--

INSERT INTO `ministries` (`minid`, `ministry`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Youth'),
(4, 'Y.S'),
(5, 'Children');

-- --------------------------------------------------------

--
-- Table structure for table `money_lend`
--

CREATE TABLE `money_lend` (
  `mlid` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `payment` decimal(20,2) NOT NULL,
  `datetime_lend` datetime NOT NULL,
  `datetime_payed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `money_lend`
--

INSERT INTO `money_lend` (`mlid`, `member`, `amount`, `payment`, `datetime_lend`, `datetime_payed`) VALUES
(6, 3, '50.00', '0.00', '2021-11-19 13:53:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `offering`
--

CREATE TABLE `offering` (
  `ofid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offering`
--

INSERT INTO `offering` (`ofid`, `amount`, `datetime`) VALUES
(4, 30, '2021-11-19 15:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `role`) VALUES
(1, 'Pastor'),
(2, 'Pastor\'s Wife'),
(3, 'Deacon'),
(4, 'Deaconess'),
(5, 'Usher'),
(6, 'Musician'),
(7, 'Singer'),
(8, 'Technician'),
(9, 'Church Worker'),
(10, 'Sunday School Teacher'),
(11, 'Children Teacher'),
(12, 'Interpreter');

-- --------------------------------------------------------

--
-- Table structure for table `tithe`
--

CREATE TABLE `tithe` (
  `tid` int(11) NOT NULL,
  `member` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tithe`
--

INSERT INTO `tithe` (`tid`, `member`, `amount`, `month`, `datetime`) VALUES
(2, '3', 20, '2021-11', '2021-11-19 14:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `hash` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `role`, `hash`) VALUES
(1, 'Leviticusgh', 'leviticus123', 'User', '$2y$10$RKoH8VDKVfOSOVcnUgimS.zgnKnKziTBUAXzOihmjPRmKLk9zLpZC'),
(2, 'Paul', 'Paul', 'Admin', '$2y$10$CPlJqgDugrXH9qdfeU3pnePYcE8LLOMIQPN95x60j/Nn0rISmlZgq'),
(3, 'Emmanuel', 'Emmanuel123', 'Admin', '$2y$10$WOvAQgLetD2qvZieili0WuQ8FikHMek9EmjJVCFx6VISFQTk47StW');

-- --------------------------------------------------------

--
-- Table structure for table `user_entry`
--

CREATE TABLE `user_entry` (
  `entry_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `checkin` datetime NOT NULL,
  `checkout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_entry`
--

INSERT INTO `user_entry` (`entry_id`, `username`, `userid`, `checkin`, `checkout`) VALUES
(1, 'Leviticusgh', 1, '2021-09-29 01:07:08', '2022-04-19 22:40:27'),
(2, 'Leviticusgh', 1, '2021-09-29 04:48:52', '2022-04-19 22:40:27'),
(3, 'Leviticusgh', 1, '2021-09-29 20:36:11', '2022-04-19 22:40:27'),
(4, 'Leviticusgh', 1, '2021-09-29 20:49:17', '2022-04-19 22:40:27'),
(5, 'Leviticusgh', 1, '2021-10-08 08:11:30', '2022-04-19 22:40:27'),
(6, 'Leviticusgh', 1, '2021-10-12 12:02:45', '2022-04-19 22:40:27'),
(7, 'Leviticusgh', 1, '2021-11-18 09:04:21', '2022-04-19 22:40:27'),
(8, 'Leviticusgh', 1, '2021-11-18 15:01:37', '2022-04-19 22:40:27'),
(9, 'Leviticusgh', 1, '2022-04-19 22:39:52', '2022-04-19 22:40:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `harvest`
--
ALTER TABLE `harvest`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberid`);

--
-- Indexes for table `ministries`
--
ALTER TABLE `ministries`
  ADD PRIMARY KEY (`minid`);

--
-- Indexes for table `money_lend`
--
ALTER TABLE `money_lend`
  ADD PRIMARY KEY (`mlid`);

--
-- Indexes for table `offering`
--
ALTER TABLE `offering`
  ADD PRIMARY KEY (`ofid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `tithe`
--
ALTER TABLE `tithe`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_entry`
--
ALTER TABLE `user_entry`
  ADD PRIMARY KEY (`entry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `harvest`
--
ALTER TABLE `harvest`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ministries`
--
ALTER TABLE `ministries`
  MODIFY `minid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `money_lend`
--
ALTER TABLE `money_lend`
  MODIFY `mlid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offering`
--
ALTER TABLE `offering`
  MODIFY `ofid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tithe`
--
ALTER TABLE `tithe`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_entry`
--
ALTER TABLE `user_entry`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
