-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 05:29 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `admin_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `admin_name`) VALUES
(1, 'veena', 'veena', 'Veena');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `companytype` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `number` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `website`, `city`, `state`, `postal_code`, `country`, `companytype`, `firstname`, `lastname`, `number`, `email`, `username`, `password`) VALUES
(1, 'Dell', 'www.dell.com', 'Bangalore', 'Karnataka', '560092', 'India', 'AutoMobiles', 'Veena', 'M', '098765457', 'veena@gmail.com', 'dell', 'dell'),
(3, 'google', 'fsdfs', 'knjas', 'dhwe', '', 'Denmark', 'Manufacturing', 'madhu', 'g', '46279', 'madhu@gmail.com', 'madhu', 'madhu');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `job_location` varchar(100) NOT NULL,
  `batch` int(20) NOT NULL,
  `percentage` varchar(50) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `process` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `company_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`, `position`, `qualification`, `branch`, `job_location`, `batch`, `percentage`, `skills`, `salary`, `process`, `venue`, `date_time`, `status`, `company_id`) VALUES
(1, 'Campus Recruitement', 'Software Developer', 'be', 'ise', 'Bangalore', 2018, '60', 'C++, JAVA', '3LPA', 'Apti, GD, HR', 'SVCE Campus', 'Friday 19 October 2018 - 09:00', 'active', '1'),
(4, 'qqqqqqcg', 'SAc', 'B.Tech', 'CIV', 'bbcv', 0, '78', 'dkfsjn', '98765', 'gdfngdkln', 'gjldfd', 'Saturday 20 October 2018 - 13:25', 'active', '3');

-- --------------------------------------------------------

--
-- Table structure for table `job_register`
--

CREATE TABLE `job_register` (
  `id` int(50) NOT NULL,
  `company_id` int(50) NOT NULL,
  `job_id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_register`
--

INSERT INTO `job_register` (`id`, `company_id`, `job_id`, `student_id`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `password`, `student_name`) VALUES
(1, 'madhu', 'madhu', 'madhu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_register`
--
ALTER TABLE `job_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `job_register`
--
ALTER TABLE `job_register`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
