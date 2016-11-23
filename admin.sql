-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2016 at 04:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `name` varchar(200) NOT NULL,
  `user` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `destination` varchar(25) NOT NULL,
  `approval` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`name`, `user`, `date`, `destination`, `approval`) VALUES
('41_-_Creating_About_Area.mp4', 'iit2015036', '2016-11-23 00:52:33', 'Tutorials', 0),
('55_-_Creating_Posts_Page.mp4', 'iit2015036', '2016-11-23 00:59:38', 'Tutorials', 0),
('58_-_Creating_Carousel.mp4', 'iit2015036', '2016-11-23 02:54:08', 'Movies', 0),
('61_-_Editing_Aside_Area_with_New_Style.mp4', 'iit2015036', '2016-11-23 02:57:56', 'Movies', 0),
('build.xml', 'iit2015036', '2016-11-23 02:10:24', 'Movies', 1),
('know-your-customer.pdf', 'iit2015036', '2016-11-23 03:00:25', 'Movies', 0),
('lect18.pdf', 'iit2011072', '2016-11-23 03:11:25', 'Movies', 0),
('lect21.pdf', 'iit2011072', '2016-11-23 03:18:45', 'Movies', 0),
('lect22.pdf', 'iit2015036', '2016-11-23 03:10:28', 'Movies', 0),
('UDEMY-THE-COMPLETE-BOOTSTRAP-MASTERCLASS-COURSE-BUILD-4-PROJECTS-TUTORIAL.zip', 'iit2015036', '2016-11-23 02:10:08', 'Tutorials', 1),
('unnamed.png', 'iit2015036', '2016-11-23 02:59:36', 'Movies', 0),
('website.iiita.ac.in-_-localhost-_-geekhavendb-_-mentors-_-phpMyAdmin-4.5.pdf', 'iit2015036', '2016-11-23 02:58:47', 'Movies', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
