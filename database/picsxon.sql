-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 05:02 PM
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
(11, 'wrog', 'upset', 0, 0, 'Benji Davies (@Benji_Davies).jpg', 'image/jpeg', '2021-02-24 09:16:12am'),
(12, 'home', 'peace', 0, 0, 'This makes me feel things_.jpg', 'image/jpeg', '2021-02-24 09:17:04am'),
(14, 'lazy', 'dog', 0, 0, 'wp1969426-how-to-train-your-dragon-wallpapers.jpg', 'image/jpeg', '2021-02-25 01:19:34pm'),
(15, 'oscar', 'dog', 0, 0, 'HB4AT3D3IMI6TMPTWIZ74WAR54.jpg', 'image/jpeg', '2021-02-25 05:59:39pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'suhutha', '81dc9bdb52d04dc20036dbd8313ed055', 'gsuhruthasuhu@gmail.com'),
(2, 'suhu', 'd2ca24a62a3cf6f2e236bcfe4fa3c3b1', 'suhu@gmail.com'),
(3, 'pes', 'a7329a9971b2ea188477533dfbf1963b', 'pes.edu'),
(4, 'edna', 'f5fa02bc60f633f3b1781a824f5211b5', 'edna@gmail.com'),
(5, 'gowtham', '81dc9bdb52d04dc20036dbd8313ed055', 'gowtham@gmail.com'),
(6, 'gowth', '9d032048748881a7ebde85e090627262', 'gowthambhat793@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
