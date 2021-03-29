-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 12:35 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `office_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email`, `user_name`, `phone_number`, `password`, `office_code`) VALUES
(1, 'wisdom', 'nwachukwu', 'wisdom@gmail.com', 'cryptic', 99999999999, '$2y$10$tZqmBpbmHNGPYud49Zg1Fe449h83lDaJvIqB7icP0y0ZMTN.L3gUK', 's'),
(2, 'george', 'nwachukwu', 'george@gmail.com', 'justsuper', 99999999999, '$2y$10$aWIyDxNzCVxRLlQURcW1eemlI3chVG81pQkLa1qDvjFMcjT3l.e3K', 'e'),
(3, 'kenneth', 'nwachukwu', 'ken@gmail.com', 'kenny', 9022222222, '$2y$10$objWFbpDbFqrHWtrzpa1auXV958E9WkYhA06JqrDh9mBsX7Vx6j.S', 'k'),
(4, 'kingsley', 'nwachukwu', 'king@gmail.com', 'king', 9033333333, '$2y$10$H40Q548bKJijoJ5rUjIsO.cJDTpn4aXgXGxqUSlc4.VhHSL8xMYMG', 'king'),
(5, 'vwede', 'boosman', 'vwede@gmail.com', 'vwede', 9023456788, '$2y$10$7CCpAfNmKgmSnnTnjovgM.Fnp2wBdU784Zbi0TZIoFxuAYwZs7Gwa', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `movie_records`
--

CREATE TABLE `movie_records` (
  `movie_id` int(255) NOT NULL,
  `movie_name` varchar(255) DEFAULT NULL,
  `movie_genre` text NOT NULL,
  `movie_released_date` date NOT NULL,
  `movie_image_name` text DEFAULT NULL,
  `movie_clip_name` text DEFAULT NULL,
  `total_movie_time` varchar(50) NOT NULL,
  `movie_discription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_records`
--

INSERT INTO `movie_records` (`movie_id`, `movie_name`, `movie_genre`, `movie_released_date`, `movie_image_name`, `movie_clip_name`, `total_movie_time`, `movie_discription`) VALUES
(87, 'Extraction', 'Action Movie', '2021-01-06', 'File_60348dc7c30782.6284749759.jpg', 'File_60348dc7c38461.1687211281.mp4', '120 mins', 'He lost his family during a battle and seeks revenge to kill all his enemies...\r\n                            \r\n                            \r\n                            '),
(88, 'Tom and Jerry', 'Adventure', '2021-01-21', 'File_60348e07d9f5d9.1233181712.jpg', 'File_60348e07da4b64.8848703817.mp4', '170 mins', 'He lost his family during a battle and seeks revenge to kill all his enemies...\r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            \r\n                            '),
(92, 'Migration', 'Action', '2021-02-11', 'File_6039e4bcf35880.7230467410.jpg', 'File_6039e4bcf3a7a8.7046632411.mp4', '120 mins', 'likes a walk in the dark, always getting the egde off the cliff\r\n\r\n                            '),
(93, 'Extreme Scandal', 'Adventure', '2021-02-16', 'File_603ae994556760.1577702360.jpg', 'File_603ae99455c782.6828857746.mp4', '100 mins', 'after he has been imprisoned for closed to 16 years he still seeks revenge\r\n                            '),
(94, 'Lenker', 'Adventure', '2021-02-01', 'File_603b3864dfa303.278008917.jpg', 'File_603b3864dfd7e1.286042833.mp4', '170 mins', 'This is a story of micon, he was once a music guru but seriously changed hence forth.');

-- --------------------------------------------------------

--
-- Table structure for table `movie_record_extension`
--

CREATE TABLE `movie_record_extension` (
  `mre_id` int(11) NOT NULL,
  `days` varchar(50) NOT NULL,
  `time` time(6) NOT NULL,
  `location` varchar(50) NOT NULL,
  `movie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_record_extension`
--

INSERT INTO `movie_record_extension` (`mre_id`, `days`, `time`, `location`, `movie_id`) VALUES
(9, 'Monday', '22:27:00.000000', 'epe', 87),
(10, 'Tuesday', '20:28:00.000000', 'sagamu', 88),
(13, 'Friday', '01:30:00.000000', 'sagamu', 87),
(14, 'Wednesday', '00:40:00.000000', 'lekki', 87),
(15, 'Monday', '00:00:00.000000', 'lekki', 88),
(16, 'Saturday', '12:00:00.000000', 'sagamu', 88),
(17, 'Saturday', '12:00:00.000000', 'sagamu', 88),
(18, 'Saturday', '12:00:00.000000', 'sagamu', 88),
(19, 'Tuesday', '01:53:00.000000', 'epe', 88),
(20, 'Monday', '01:36:00.000000', 'epe', 88),
(21, 'Monday', '01:36:00.000000', 'epe', 88),
(22, '2021-02-23', '00:24:00.000000', 'lekki', 88),
(23, '2021-02-02', '18:30:00.000000', 'lekki', 92),
(24, '2021-02-08', '17:00:00.000000', 'lekki', 93);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `age` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `user_name`, `phone_number`, `age`, `password`) VALUES
(1, 'wisdom', 'francis', 'email@gmail.com', 'username', 22222222222, 21, '$2y$10$01kJc./xlkJuqlHBufxlw.MmAw9CJPMaLEs4yZ2m1QmA8ZjvxxOxW'),
(2, 'wisdom', 'francis', 'email@gmail.com', 'wefwef', 32342322222, 22, '$2y$10$DLGAZ1JT5rBilBM91.O1Yu0Nku8MVYAygh8N41ojiquBPXjEhjPte'),
(3, 'wisdom', 'francis', 'email@gmail.com', 'wefwef', 32342322222, 22, '$2y$10$pRvMSsaoQwv/MbA0BmTBae.menU3tDz2t803uAGl5ZTPnB.5w8d4W'),
(4, 'wisdom', 'francis', 'email@gmail.com', 'wefwef', 32342322222, 22, '$2y$10$GzzlLK25.36lGOL34NGsI.fcXjY7vbeKlfeOl8yH9ALHH6CmbY5x6'),
(5, 'wisdom', 'francis', 'email@gmail.com', 'wefwef', 32342322222, 22, '$2y$10$oUTIFpXNGJN/uraUfHk18.9Sbx9m10ohDLYuT4i8VWJgGT6q27/0u'),
(6, 'wisdom', 'francis', 'email@gmail.com', 'wefwef', 32342322222, 22, '$2y$10$9F0XDTHhImy8rxBvUxePruq9SC8fXOZnz5KSURFhqJwnx9afzuS6.'),
(7, 'wisdom', 'francis', 'email@gmail.com', 'wefwef', 32342322222, 22, '$2y$10$2E6LukpblhQVBuYxbAXj1edO6/qFCx//Ge9OHp6FNtzMFizD71H9G'),
(8, 'wisdom', 'francis', 'email@gmail.com', 'wefwef', 32342322222, 22, '$2y$10$pxpfHTKPCS5UwT0bFqbVkOJ7ypE2fueK.CP7V4yS5VgGjFuB2bP0C'),
(9, 'wisdom', 'klklkkk', 'wisdom@gmail.com', 'crypticwisdom', 8000000000, 21, '$2y$10$6xvlBnus6sKmJH0S9AqjJOo38Os/zaIQp8wyoUMX7j0nXxDGh69hm'),
(10, 'wisdom', 'francis', 'wisdom@gmail.com', 'crypticwisdom', 32342322222, 12, '$2y$10$KFgWWpkTlPdY5M9hB6xvk.nkrmORoqOa23d3mIiWA.H.o1Y12SPFS'),
(11, 'wisdodm', 'dksnedik', 'nsdfnsd@esef.fwef', 'lksndgvsdnv', 32222222222, 32, '$2y$10$cYkgbOtUyAGEoQAU.E.9TuuW8pwqXMNoyEp4OiHvW5kJtcOEyHwZ.'),
(12, 'kenneth', 'nwachukwu', 'ken@gmail.com', 'kenny', 9044444444, 13, '$2y$10$9i/izBpyWk1Rv3oGRwAY8eD.I2shn8imPLyqaG/zzuvLQeNbJe2Da');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(200) NOT NULL,
  `venue_name` varchar(70) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `venue_name`, `price`) VALUES
(1, 'lekki', '1200'),
(2, 'ajah', '1250'),
(3, 'sagamu', '1050'),
(4, 'epe', '800');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `movie_records`
--
ALTER TABLE `movie_records`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `movie_record_extension`
--
ALTER TABLE `movie_record_extension`
  ADD PRIMARY KEY (`mre_id`),
  ADD KEY `movie_record_extension_ibfk_1` (`movie_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie_records`
--
ALTER TABLE `movie_records`
  MODIFY `movie_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `movie_record_extension`
--
ALTER TABLE `movie_record_extension`
  MODIFY `mre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_record_extension`
--
ALTER TABLE `movie_record_extension`
  ADD CONSTRAINT `movie_record_extension_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie_records` (`movie_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
