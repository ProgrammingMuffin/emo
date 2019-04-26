-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 08:00 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emo`
--

-- --------------------------------------------------------

--
-- Table structure for table `coreaccounts`
--

CREATE TABLE `coreaccounts` (
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` int(11) NOT NULL,
  `createdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coreaccounts`
--

INSERT INTO `coreaccounts` (`username`, `password`, `email`, `phone`, `createdate`) VALUES
('Muffin', 'bad25724c69f4e289ad4e966733b5a6a', 'muffin@gmail.com', 1231241241, 1553898365),
('mylara', 'e42e83469e8741d516103fc939ee6462', 'mylarareddyc@reva.edu.in', 980690824, 1554360331),
('ramachandran', '1535f60dcdb17f01a6bdf4ceeffb4d43', 'rammoni@gmail.com', 98989898, 1554820297),
('Test1', 'e1b849f9631ffc1829b2e31402373e3c', 'Test1@gmail.com', 9987878, 1554338595),
('Test10', 'b6e30158b9d7d2dc8bb4f4123fe93c9b', 'Test10@gmail.com', 989899, 1554358467),
('Test2', 'c454552d52d55d3ef56408742887362b', 'Test2@gmail.com', 2147483647, 1554354475),
('Test3', 'b3f66ec1535de7702c38e94408fa4a17', 'Test3@gmail.com', 989282, 1554354550),
('Test4', '41d5e808720c8ee71257214e952a6721', 'Test4@gmail.com', 97788, 1554354918);

-- --------------------------------------------------------

--
-- Table structure for table `musicstore`
--

CREATE TABLE `musicstore` (
  `muid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `reference` text NOT NULL,
  `emotion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musicstore`
--

INSERT INTO `musicstore` (`muid`, `title`, `reference`, `emotion`) VALUES
(1, 'Imagine Dragons - Whatever It Takes', '1.mp3', 'motivational'),
(2, 'The Chainsmokers - Sick Boy', '2.mp3', 'calm'),
(3, 'The Script - Hall of Fame (Official Video) ft. will.i.am', '3.mp3', 'motivational'),
(4, 'Imagine Dragons - Thunder', '4.mp3', 'motivational'),
(5, 'Imagine Dragons - Believer', '5.mp3', 'motivational'),
(6, 'Linkin Park - In The End', '6.mp3', 'motivational'),
(7, 'Levianth & Denis Elezi - Beside Me', '7.mp3', 'calm'),
(8, 'San Holo - Light', '8.mp3', 'calm'),
(9, 'Finding Hope - Without You feat. Holly Drummond', '9.mp3', 'calm'),
(10, 'twenty one pilots - Chlorine', '10.mp3', 'calm'),
(11, 'Marshmello ft. Bastille - Happier', '11.mp3', 'happy'),
(12, 'Avicii - The Nights', '12.mp3', 'happy'),
(13, 'Mike Posner - I Took A Pill In Ibiza (SeeB Remix)', '13.mp3', 'happy'),
(14, 'Cartoon - On & On (feat. Daniel Levi) [NCS Release]', '14.mp3', 'happy'),
(15, 'Martin Garrix & justin mylo - Burn Out ft. Dewain whitmore', '15.mp3', 'happy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coreaccounts`
--
ALTER TABLE `coreaccounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `musicstore`
--
ALTER TABLE `musicstore`
  ADD PRIMARY KEY (`muid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
