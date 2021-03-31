-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 03:40 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'theadmin', '0192023a7bbd73250516f069df18b500', 'theadmin@gmail.com'),
(2, 'admin2', '4297f44b13955235245b2497399d7a93', 'admin2@nfmf.com'),
(3, 'mhoann', '4297f44b13955235245b2497399d7a93', 'mjehd@gmail.com'),
(4, 'vishu', 'fcea920f7412b5da7be0cf42b8c93759', 'vishh@gmfm.com');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `post_id` int(10) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `vote_up` int(10) DEFAULT 0,
  `vote_down` int(10) DEFAULT 0,
  `path` varchar(255) NOT NULL,
  `type` varchar(30) NOT NULL,
  `timestamp` varchar(50) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`post_id`, `picture_name`, `category`, `vote_up`, `vote_down`, `path`, `type`, `timestamp`) VALUES
(3, 'flower', 'nature', 0, 1, 'Milk on the deck_ by PascalCampion on DeviantArt.jpg', 'image/jpeg', '2021-02-17 07:19:23pm'),
(4, 'dwell ', 'anime', 1, 0, 'wp1969317-how-to-train-your-dragon-wallpapers.jpg', 'image/jpeg', '2021-02-19 03:03:23pm'),
(6, 'husky', 'dog', 1, 0, 'siberian-husky-woods-shutterstock_558432511.jpg', 'image/jpeg', '2021-02-19 03:04:56pm'),
(8, 'Linkin Park', 'Music', 1, 0, 'linkin_park_lyrics-wallpaper-1366x768.jpg', 'image/jpeg', '2021-02-19 03:18:15pm'),
(11, 'wrog', 'upset', 0, 1, 'Benji Davies (@Benji_Davies).jpg', 'image/jpeg', '2021-02-24 09:16:12am'),
(12, 'home', 'peace', 0, 0, 'This makes me feel things_.jpg', 'image/jpeg', '2021-02-24 09:17:04am'),
(14, 'lazy', 'dog', 0, 0, 'wp1969426-how-to-train-your-dragon-wallpapers.jpg', 'image/jpeg', '2021-02-25 01:19:34pm'),
(15, 'oscar', 'dog', 0, 0, 'HB4AT3D3IMI6TMPTWIZ74WAR54.jpg', 'image/jpeg', '2021-02-25 05:59:39pm');

-- --------------------------------------------------------

--
-- Table structure for table `post_votes`
--

CREATE TABLE `post_votes` (
  `id` int(11) NOT NULL,
  `post_id` double DEFAULT NULL,
  `user_id` double DEFAULT NULL,
  `vote` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_votes`
--

INSERT INTO `post_votes` (`id`, `post_id`, `user_id`, `vote`, `date`) VALUES
(1, 3, 99, 0, '2021-03-26 20:09:02'),
(2, 4, 99, 1, '2021-03-26 20:09:07'),
(3, 11, 99, 0, '2021-03-26 20:09:11'),
(4, 8, 99, 1, '2021-03-26 20:09:35'),
(5, 6, 99, 1, '2021-03-26 20:09:49');

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
(19, 'gowtham', 'f56561c916e79a9c7be7b1b853090737', 'gowthambhat793@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_votes`
--
ALTER TABLE `post_votes`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post_votes`
--
ALTER TABLE `post_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
