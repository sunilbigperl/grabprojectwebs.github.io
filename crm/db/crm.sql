-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2016 at 03:21 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm_users`
--

CREATE TABLE `crm_users` (
  `user_id` bigint(20) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crm_users`
--

INSERT INTO `crm_users` (`user_id`, `firstname`, `username`, `email`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `frominfo_bp`
--

CREATE TABLE `frominfo_bp` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `signature` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frominfo_bp`
--

INSERT INTO `frominfo_bp` (`id`, `email`, `password`, `signature`) VALUES
(1, 'lvijetha90@gmail.com', '**ganesha**', 'Vijetha');

-- --------------------------------------------------------

--
-- Table structure for table `mail_tamplates`
--

CREATE TABLE `mail_tamplates` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `attachment` varchar(250) NOT NULL,
  `body` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_tamplates`
--

INSERT INTO `mail_tamplates` (`id`, `name`, `subject`, `attachment`, `body`) VALUES
(1, 'Welcome mail', 'Welcome to bigperl', '0', 'Hello,\r\nWelcome to bigperl.\r\n\r\nThank you');

-- --------------------------------------------------------

--
-- Table structure for table `students_bp`
--

CREATE TABLE `students_bp` (
  `id` bigint(20) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Mobile` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_bp`
--

INSERT INTO `students_bp` (`id`, `Title`, `Name`, `Email`, `Mobile`) VALUES
(1, 'Ms', 'vijetha', 'lvijetha90@gmail.com', '9886656363'),
(2, 'Mr', 'sunil', 'lvijetha90@gmail.com', '98778656262');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_users`
--
ALTER TABLE `crm_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `frominfo_bp`
--
ALTER TABLE `frominfo_bp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_tamplates`
--
ALTER TABLE `mail_tamplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_bp`
--
ALTER TABLE `students_bp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_users`
--
ALTER TABLE `crm_users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `frominfo_bp`
--
ALTER TABLE `frominfo_bp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mail_tamplates`
--
ALTER TABLE `mail_tamplates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students_bp`
--
ALTER TABLE `students_bp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
