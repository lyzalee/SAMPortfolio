-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 01:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lylore`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name` varchar(11111) NOT NULL,
  `des1` varchar(1111) NOT NULL,
  `des2` varchar(1111) NOT NULL,
  `des3` varchar(1111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `des1`, `des2`, `des3`) VALUES
(1, 'Lyza Lee Pabilona', 'Welcome to my portfolio! I\'m Lyza Lee Pabilona, a student developer and a graphic designer. With a keen eye for detail, I strive to create captivating experiences through my work.', 'My approach to every project is rooted in creativity and collaboration. Beyond my professional endeavors, I\'m deeply committed to continuous learning and personal growth. I\'m constantly exploring new technologies and techniques to stay ahead of the curve and push the boundaries of what\'s possible.', 'Thank you for visiting my portfolio! Feel free to explore my work and reach out if you\'d like to collaborate or learn more about what I do.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `number` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_me`
--

CREATE TABLE `contact_me` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `subject` varchar(1111) NOT NULL,
  `message` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_me`
--

INSERT INTO `contact_me` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'L', 'asdasd', 'asdasd', 'sdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `displaycontent`
--

CREATE TABLE `displaycontent` (
  `id` int(111) NOT NULL,
  `display_name` varchar(111) NOT NULL,
  `display_skill_1` varchar(111) NOT NULL,
  `descriptions` mediumtext NOT NULL,
  `home_picture` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `displaycontent`
--

INSERT INTO `displaycontent` (`id`, `display_name`, `display_skill_1`, `descriptions`, `home_picture`) VALUES
(1, 'Lyza Lee', 'Web developer', 'I\'m a graphic designer with a keen eye for aesthetics and a love for all things creative. I specialize in bringing ideas to life through captivating visuals.', 'lylee.png');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(111) NOT NULL,
  `skillname` varchar(111) NOT NULL,
  `skillper` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `skillname`, `skillper`) VALUES
(2, 'PHP', '78'),
(3, 'HTML', '100'),
(4, 'CSS', '88');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(111) NOT NULL,
  `logo` varchar(111) NOT NULL,
  `link` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `logo`, `link`) VALUES
(2, 'bi bi-facebook', 'https://www.facebook.com/Lyza'),
(3, 'bi bi-instagram', 'https://www.instagram.com/Lyza'),
(4, 'bi bi-github', 'https://www.githun.com/Lyza');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(1, 'Lyza', '$2y$10$1QmLtXX9Sghs9Yo1DtVr5.2pqerTe511wi.WyoXjpEbSc7N3BH8vS'),
(2, 'Lyza', '$2y$10$O.E50Xn62R.PphuAZEr7i.JOl0F6Yxfwja0xWYWm1GiaFSbzCWXcS');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(111) NOT NULL,
  `title` varchar(111) NOT NULL,
  `picture` varchar(111) NOT NULL,
  `description` varchar(111) NOT NULL,
  `link` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_me`
--
ALTER TABLE `contact_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `displaycontent`
--
ALTER TABLE `displaycontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_me`
--
ALTER TABLE `contact_me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `displaycontent`
--
ALTER TABLE `displaycontent`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
