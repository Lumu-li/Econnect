-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 01:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connect_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(19) NOT NULL,
  `post_id` bigint(19) NOT NULL,
  `user_id` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `comments` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` tinyint(1) NOT NULL,
  `is_profile_image` tinyint(1) NOT NULL,
  `is_cover_image` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_id`, `user_id`, `post`, `image`, `comments`, `date`, `has_image`, `is_profile_image`, `is_cover_image`) VALUES
(40, 11102, 7697216787, '', 'uploads/7697216787/ijdy9kqwRWOC1do.jpg', 0, '2023-04-24 00:59:54', 1, 0, 1),
(41, 96522045060, 7697216787, '', 'uploads/7697216787/vSth8IDzmjOqkT4.jpg', 0, '2023-04-24 01:00:37', 1, 0, 1),
(42, 580271746203095256, 12959050, '', 'uploads/12959050/42TAnyjdaVv8dMg.jpg', 0, '2023-04-24 03:04:30', 1, 1, 0),
(43, 2068828973088958697, 12959050, '', 'uploads/12959050/q3jJO89ujujxovp.jpg', 0, '2023-04-24 03:05:00', 1, 0, 1),
(44, 34206654, 643479584708627, '', 'uploads/643479584708627/kQVmEXZ3nlDX9Em.jpg', 0, '2023-04-24 03:06:39', 1, 0, 1),
(45, 30819202583399, 643479584708627, '', 'uploads/643479584708627/uDNxVCOT73eolfV.jpg', 0, '2023-04-24 03:06:55', 1, 0, 1),
(46, 43122948165933478, 643479584708627, '', 'uploads/643479584708627/cGoSSoRMeY4asBm.jpg', 0, '2023-04-24 03:07:38', 1, 1, 0),
(47, 67431086061, 643479584708627, 'hello world', '', 0, '2023-04-24 03:07:56', 0, 0, 0),
(48, 538472320034245, 643479584708627, '<script>alert(\"what\'s up?\")</script>', '', 0, '2023-04-24 03:08:49', 0, 0, 0),
(56, 930452638007132, 12959050, 'sjxujascj', 'uploads/12959050/NDvU9xWUvXpRJFl.jpg', 0, '2023-04-24 20:48:34', 1, 0, 0),
(57, 90825548, 12959050, '', 'uploads/12959050/BQXUmUMpt1kdxxi.jpg', 0, '2023-04-24 20:49:07', 1, 0, 0),
(58, 710681798, 12959050, '', 'uploads/12959050/HzqNcVl4W6hYVFO.jpg', 0, '2023-04-24 20:51:19', 1, 0, 1),
(59, 7426525724, 12959050, '', 'uploads/12959050/9VftSyTNecHmhNu.jpg', 0, '2023-04-24 20:51:34', 1, 1, 0),
(60, 13925206913, 12959050, '', 'uploads/12959050/yuqkArrN3VQz0b5.jpg', 0, '2023-04-24 20:51:57', 1, 0, 1),
(61, 63375107424, 12959050, '', 'uploads/12959050/6Ly1bvp8YyQEyZ3.jpg', 0, '2023-04-24 21:00:11', 1, 0, 1),
(62, 5206390807661579054, 12959050, '', 'uploads/12959050/XcyzHtuoAcvIU8P.jpg', 0, '2023-04-24 21:00:47', 1, 1, 0),
(63, 57883265, 12959050, 'Hola mi amigo', '', 0, '2023-04-25 03:05:29', 0, 0, 0),
(64, 985139, 12959050, 'Never mind me just passing by', '', 0, '2023-04-25 03:05:43', 0, 0, 0),
(65, 66441824540, 12959050, 'It\'s too good to be true', '', 0, '2023-04-25 03:06:16', 0, 0, 0),
(66, 19149370005937789, 12959050, 'Never give up', '', 0, '2023-04-25 03:06:26', 0, 0, 0),
(67, 58631599191379, 12959050, '', 'uploads/12959050/PmZCgPOeRnnw8Tq.jpg', 0, '2023-04-25 06:36:47', 1, 1, 0),
(68, 862994, 12959050, '', 'uploads/12959050/Jet9aDjN3S4mFwc.jpg', 0, '2023-04-25 06:36:49', 1, 1, 0),
(69, 71684508031, 12959050, '', 'uploads/12959050/5EiBrZL0RiWNcVF.jpg', 0, '2023-04-25 08:36:10', 1, 1, 0),
(70, 43886490561961706, 12959050, '', 'uploads/12959050/Xih6wJxMfOb3lfy.jpg', 0, '2023-04-25 08:36:31', 1, 0, 1),
(71, 45337097695975, 12959050, 'gfyvyv', '', 0, '2023-04-25 08:37:40', 0, 0, 0),
(72, 473602, 12959050, 'vghvghvhgv', 'uploads/12959050/oiZkj24LJs6x7SH.jpg', 0, '2023-04-25 08:37:50', 1, 0, 0),
(73, 9989443203, 12959050, '', 'uploads/12959050/TboUWaSD0K572Hg.jpg', 0, '2023-04-25 09:35:43', 1, 0, 1),
(74, 149675029, 12959050, '', 'uploads/12959050/5gX50d64u3R2HnK.jpg', 0, '2023-04-25 09:36:19', 1, 0, 1),
(75, 7413653, 12959050, '', 'uploads/12959050/UiS4qAmOyLLYos9.jpg', 0, '2023-04-25 09:36:47', 1, 0, 1),
(76, 98669, 12959050, '', 'uploads/12959050/Tp6EEeVPiRgrnUa.jpg', 0, '2023-04-25 11:41:25', 1, 0, 1),
(77, 953671, 12959050, 'sdjknjksdncjksjkcnsjkdnsdjk', '', 0, '2023-04-25 11:42:07', 0, 0, 0),
(78, 4087097674898, 12959050, 'jhsdcjhsd', 'uploads/12959050/nqQ9zYrm6UFQXdi.jpg', 0, '2023-04-25 11:42:17', 1, 0, 0),
(79, 32043, 12959050, 'ujksdcsdkjc', '', 0, '2023-05-06 16:33:35', 0, 0, 0),
(80, 1558773974234, 12959050, '', 'uploads/12959050/5koeNc7QgM4N2mg.jpg', 0, '2023-05-06 16:34:15', 1, 1, 0),
(81, 695056045470, 643479584708627, 'jsbjcbsdjk', '', 0, '2023-11-23 18:37:26', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(19) NOT NULL,
  `user_id` bigint(19) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `regnum` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_image` varchar(1000) NOT NULL,
  `cover_image` varchar(1000) NOT NULL,
  `about` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `fname`, `lname`, `gender`, `regnum`, `dob`, `email`, `phone`, `pass`, `url_address`, `date`, `profile_image`, `cover_image`, `about`) VALUES
(1, 12959050, 'Sally', 'Shiro', 'female', 'ITE/D/01-55621/2020', '2002-02-20', 'sallyshiro20@gmail.com', '0795390894', 'dce6433abef08dffe22e433b721bfc14', 'sally.shiro', '2023-05-06 16:34:15', 'uploads/12959050/5koeNc7QgM4N2mg.jpg', 'uploads/12959050/Tp6EEeVPiRgrnUa.jpg', ''),
(2, 643479584708627, 'Wasera', 'Sakwa', 'male', 'ITE/D/01-55621/2020', '2001-02-03', 'waserapaul@gmail.com', '0795390894', '6c7efb4f47fe9fc3c71225ae7c9136b3', 'wasera.sakwa', '2023-04-24 03:07:38', 'uploads/643479584708627/cGoSSoRMeY4asBm.jpg', 'uploads/643479584708627/uDNxVCOT73eolfV.jpg', ''),
(25, 642503102196768, 'Waserr', 'Sakwa', 'male', 'ITE/D/01-55621/2020', '1998-02-03', 'waserapaul@gmail.com', '0795390894', '2ba4aa20b26676dc1166a0961c691427', 'waserr.sakwa', '2023-04-25 11:39:03', '', '', ''),
(26, 346169745, 'Larry', 'Adhola', '', 'ITE/D/04-02321/2020', '2001-02-07', 'theeuploads101@gmail.com', '0795390894', '9899bcce478c052c4b3dc7e362749896', 'larry.adhola', '2023-11-23 16:46:46', '', '', ''),
(27, 92807701555449276, 'Larry', 'Adhola', 'male', 'ITE/D/04-02234/2020', '2004-02-03', 'theeuploads101@gmail.com', '0795390894', '2dddf902ae715d4d18019a9e23129a81', 'larry.adhola', '2023-11-23 18:36:39', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comments` (`comments`),
  ADD KEY `date` (`date`),
  ADD KEY `has_image` (`has_image`),
  ADD KEY `is_profile_image` (`is_profile_image`),
  ADD KEY `is_cover_image` (`is_cover_image`);
ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fname` (`fname`),
  ADD KEY `lname` (`lname`),
  ADD KEY `regnum` (`regnum`),
  ADD KEY `dob` (`dob`),
  ADD KEY `email` (`email`),
  ADD KEY `phone` (`phone`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `date` (`date`),
  ADD KEY `gender` (`gender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
