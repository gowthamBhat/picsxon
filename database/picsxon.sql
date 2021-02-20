-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 06:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `picsxon`
--

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `like_count` int(10) DEFAULT 0,
  `dislike_count` int(10) DEFAULT 0,
  `path` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `timestamp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `picture_name`, `category`, `like_count`, `dislike_count`, `path`, `type`, `timestamp`) VALUES
(3, 'flower', 'nature', 3, 0, 'Milk on the deck_ by PascalCampion on DeviantArt.jpg', 'image/jpeg', '2021-02-17 07:19:23pm'),
(4, 'dwell ', 'anime', 50, 0, 'wp1969317-how-to-train-your-dragon-wallpapers.jpg', 'image/jpeg', '2021-02-19 03:03:23pm'),
(6, 'husky', 'dog', 100, 0, 'siberian-husky-woods-shutterstock_558432511.jpg', 'image/jpeg', '2021-02-19 03:04:56pm'),
(8, 'Linkin Park', 'Music', 150, 0, 'linkin_park_lyrics-wallpaper-1366x768.jpg', 'image/jpeg', '2021-02-19 03:18:15pm'),
(9, 'valley', 'mountain', 0, 0, 'joshua-earle-EqztQX9btrE-unsplash.jpg', 'image/jpeg', '2021-02-19 03:38:31pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
