-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 06:12 PM
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
(3, 'gowtham', 'a6d358f9786fe97e1ec604e5aaf299ec', 'gowtham@gmail.com');

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
  `timestamp` varchar(50) DEFAULT current_timestamp(),
  `contributor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`post_id`, `picture_name`, `category`, `vote_up`, `vote_down`, `path`, `type`, `timestamp`, `contributor`) VALUES
(1, 'lazysat', 'music', 1, 0, 'wallpaperflare.com_wallpaper (1).jpg', 'image/jpeg', '2021-04-02 04:47:04pm', 'gowtham'),
(2, 'cappy', 'dog', 0, 0, 'HB4AT3D3IMI6TMPTWIZ74WAR54.jpg', 'image/jpeg', '2021-04-02 05:09:04pm', 'gowtham'),
(3, 'wiser', 'anime', 1, 0, 'Milk on the deck_ by PascalCampion on DeviantArt.jpg', 'image/jpeg', '2021-04-02 05:09:44pm', 'gowtham'),
(4, 'dwell', 'wicked', 1, 0, 'Seven Impossible Things Before Breakfast  » Blog Archive   » Greek Gods and Fearsome Blizzards_A Visit with John Rocco.jpg', 'image/jpeg', '2021-04-02 05:10:10pm', 'gowtham'),
(5, 'pokemon', 'anime', 0, 0, 'soheb-zaidi-tgFR67JUcBs-unsplash.jpg', 'image/jpeg', '2021-04-02 05:17:53pm', 'preetham'),
(6, 'flow', 'upset', 0, 1, 'This makes me feel things_.jpg', 'image/jpeg', '2021-04-02 06:00:36pm', 'preetham'),
(7, 'peace', 'linkin', 0, 0, 'linkin_park_lyrics-wallpaper-1366x768 (1).jpg', 'image/jpeg', '2021-04-02 06:10:18pm', 'preetham');

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
(1, 1, 2, 1, '2021-04-02 21:31:21'),
(2, 6, 2, 0, '2021-04-02 21:31:25'),
(3, 4, 2, 1, '2021-04-02 21:31:27'),
(4, 3, 2, 1, '2021-04-02 21:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `power` int(5) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'fresh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `power`, `status`) VALUES
(1, 'gowth', '9d032048748881a7ebde85e090627262', 'gowthambhat793@gmail.com', 0, 'fresh'),
(2, 'preetham', 'dc086e460a02a45abdd89e705479ea14', 'preetham@gmail.com', 1, 'accepted');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_votes`
--
ALTER TABLE `post_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
