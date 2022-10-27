-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 05:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(1, 'Cardio Machines'),
(2, 'Free Weights'),
(3, 'Gym Packages'),
(4, 'Gym Strength Equipment'),
(5, 'Gym Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(30) NOT NULL,
  `member_id` varchar(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birthday` date DEFAULT NULL,
  `age` int(200) NOT NULL,
  `height` int(200) NOT NULL,
  `weight` int(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `member_id`, `firstname`, `middlename`, `lastname`, `gender`, `birthday`, `age`, `height`, `weight`, `contact`, `address`, `email`, `date_created`) VALUES
(90, 'FIT1', 'Jing', 'Carvajal', 'Rayo', 'Male', '1999-10-10', 21, 160, 59, '09982456452', 'Pasig City', 'jingrayo.carvajal@gmail.com', '2021-04-30 15:49:30'),
(91, 'FIT2', 'Carl Edrian', 'J.', 'Rosel', 'Male', '1999-12-16', 21, 155, 75, '09471597950', 'LOT 5 BLOCK 10 PHASE 2 BUENA ROSA 9 Brgy Macabling, Laguna 4026 Sta. Rosa', 'carledrian99@gmail.com', '2021-05-03 21:02:37'),
(92, 'FIT3', 'Icaro', 'D.', 'Juaneil', 'Male', '2000-01-02', 20, 155, 85, '09471597950', 'Laguna 4026 Sta. Rosa', 'demo-1b1fe6@inbox.mailtrap.io', '2021-05-03 21:08:50'),
(93, 'FIT4', 'Ryan James', 'D.', 'Dusong', 'Male', '2001-12-12', 20, 393, 90, '09567894545', 'Sampalok, Manilaa', 'carl99@email.com', '2021-05-04 07:22:38'),
(94, 'FIT5', 'Camille Shane', 'J.', 'Rosel', 'Female', '2001-12-04', 20, 356, 90, '09471597950', 'Laguna 4026 Sta. Rosa', 'demo-1b1fe6@inbox.mailtrap.io', '2021-05-04 07:37:07'),
(95, 'FIT6', 'Jin Russell', '', 'Teodoro', 'Male', '1978-12-11', 43, 390, 100, '09471597950', 'Brgy. Balik Balik', 'zeusprometheus.inc@gmail.com', '2021-05-04 07:40:59'),
(96, 'FIT7', 'Jose Miguel', '', 'Gamo', 'Male', '2001-10-01', 20, 390, 100, '09471597950', 'Sta. Ana, Manila', 'yawyaw69-1b1fe6@inbox.mailtrap.io', '2021-05-04 09:19:42'),
(97, 'FIT8', 'Russell', 'j.', 'Tan', 'Male', '1999-12-12', 28, 163, 120, '09471597950', 'Brgy. Balik Balik', 'zeusprometheus.inc@gmail.com', '2021-05-06 11:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(30) NOT NULL,
  `package` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package`, `description`, `amount`) VALUES
(4, 'Premium Package', 'For monthly of membership', 2000),
(5, 'Silver Package', 'For weekly of membership', 1000),
(6, 'Regular Package', 'For daily of membership', 500);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `registration_id` int(30) NOT NULL,
  `amount` int(30) NOT NULL,
  `remarks` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=registration, 2= monthly payment',
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `registration_id`, `amount`, `remarks`, `type`, `date_created`) VALUES
(1, 2, 4500, 'First payment', 2, '2020-10-21 14:39:26'),
(2, 2, 3500, 'payment for november', 2, '2020-10-21 14:39:52'),
(3, 6, 5000, 'good', 2, '2021-03-10 12:28:46'),
(4, 14, 3500, 'Amazing', 2, '2021-05-03 20:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(30) NOT NULL,
  `plan` varchar(250) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan`, `amount`) VALUES
(3, '30', 2500),
(4, '7', 625),
(5, '1', 89.28);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `price` double NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `sku` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `price`, `name`, `description`, `img`, `sku`) VALUES
(7, 2, 1562, 'Dumbbells', 'The dumbbell, a type of free weight, is a piece of equipment used in weight training. It can be used individually or in pairs, with one in each hand.', '', 'Pro1'),
(17, 1, 2956, 'Recline Bikes', 'A recumbent bicycle is a bicycle that places the rider in a laid back reclining position.', '', 'Pro2'),
(18, 4, 100000.5, 'Dual Purpose Gym Machines', 'Rectangular steel section construction for strength.', '', 'Pro3'),
(19, 5, 350, 'Gym Cable Attachments', 'Cable attachments are designed for use with weight training machines', '', 'Pro4'),
(22, 5, 920, 'Gym Flooring Rubber Mat', 'The gym floor mats range also comprises of high-density EVA foam made mats that provide a sturdy and soft floor surface for gyms', '', 'Pro5'),
(23, 1, 3500, 'Prospec Kettlebell Stainless Handle Coated', 'Made of high quality materials, very durable and practical. The bottom is stable, reaching professional competition kettlebell standards and safe to use', '', 'Pro6');

-- --------------------------------------------------------

--
-- Table structure for table `registration_info`
--

CREATE TABLE `registration_info` (
  `id` int(30) NOT NULL,
  `member_id` int(30) NOT NULL,
  `plan_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `trainer_id` tinyint(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1= Active',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_info`
--

INSERT INTO `registration_info` (`id`, `member_id`, `plan_id`, `package_id`, `start_date`, `end_date`, `trainer_id`, `status`, `date_created`) VALUES
(2, 5, 1, 2, '2020-10-21', '2021-10-21', 0, 0, '2020-10-21 00:00:00'),
(3, 5, 1, 2, '2020-10-21', '2021-10-21', 0, 0, '2020-10-21 00:00:00'),
(4, 6, 1, 2, '2019-10-19', '2020-10-19', 0, 0, '2020-10-21 00:00:00'),
(5, 6, 1, 2, '2020-10-21', '2021-10-21', 0, 1, '2020-10-21 00:00:00'),
(6, 7, 1, 2, '2021-03-10', '2022-03-10', 2, 0, '2021-03-10 12:27:18'),
(7, 5, 1, 2, '2021-03-10', '2022-03-10', 2, 0, '2021-03-10 12:27:49'),
(8, 11, 1, 4, '2021-03-10', '2022-03-10', 2, 0, '2021-03-10 14:13:29'),
(9, 10, 1, 4, '2021-04-13', '2022-04-13', 2, 0, '2021-04-13 19:30:07'),
(10, 11, 2, 5, '2021-04-15', '2021-09-15', 3, 0, '2021-04-15 12:15:21'),
(11, 18, 1, 4, '2021-04-18', '2022-04-18', 2, 1, '2021-04-18 12:15:31'),
(12, 11, 2, 5, '2021-04-18', '2022-02-18', 3, 1, '2021-04-18 12:16:16'),
(13, 90, 5, 4, '2021-05-03', '2021-05-03', 4, 0, '2021-05-03 20:33:02'),
(14, 90, 5, 4, '2021-05-03', '2021-05-03', 4, 0, '2021-05-03 20:33:49'),
(15, 90, 5, 4, '2021-05-03', '2021-05-03', 4, 0, '2021-05-03 20:42:32'),
(16, 90, 5, 4, '2021-05-03', '2021-05-03', 4, 0, '2021-05-03 20:42:35'),
(17, 90, 4, 5, '2021-05-03', '2021-05-03', 2, 0, '2021-05-03 20:42:50'),
(18, 91, 5, 0, '2021-05-03', '2021-05-03', 4, 1, '2021-05-03 21:03:27'),
(19, 92, 5, 4, '2021-05-03', '2021-05-03', 4, 0, '2021-05-03 21:09:15'),
(20, 92, 5, 4, '2021-05-03', '2021-05-03', 4, 0, '2021-05-03 21:10:48'),
(21, 90, 3, 4, '2021-05-03', '2021-05-03', 4, 0, '2021-05-03 21:43:57'),
(22, 93, 3, 4, '2021-05-04', '2021-05-04', 2, 1, '2021-05-04 07:24:16'),
(23, 94, 4, 5, '2021-05-04', '2021-05-04', 2, 1, '2021-05-04 07:37:48'),
(24, 95, 3, 6, '2021-05-04', '1970-01-01', 4, 1, '2021-05-04 07:41:48'),
(25, 96, 3, 4, '2021-05-04', '2021-06-03', 2, 1, '2021-05-04 09:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(30) NOT NULL,
  `member_id` int(30) NOT NULL,
  `dow` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `member_id`, `dow`, `date_from`, `date_to`, `time_from`, `time_to`) VALUES
(7, 90, '0', '2021-05-01', '2021-07-31', '08:40:00', '11:50:00'),
(9, 92, '2,4', '2021-05-01', '2021-12-31', '09:09:00', '10:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `contact`, `email`, `rate`) VALUES
(2, 'Carl Edrain Rosel', '09098723987', 'carl@gmail.com', 700),
(4, 'Alberto Lim', '09956231475', 'lim@gmail.com', 700);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Staff, 3= subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(2, 'ADMINISTRATOR', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(26, 'Carl Edrian', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 3),
(27, 'Icaro', 'demo1', 'e368b9938746fa090d6afd3628355133', 3),
(28, 'Ryan James', 'demo3', '297e430d45e7bf6f65f5dc929d6b072b', 3),
(29, 'Camille Shane', 'shane', '7790ffbb26cf6409e707105e92cde91e', 3),
(30, 'Jin Russell', 'demo4', '7b1312a1b3e74bb174b3fbbf68ab5a92', 3),
(31, 'Jose Miguel', 'demo4', '7b1312a1b3e74bb174b3fbbf68ab5a92', 3),
(32, 'Russell', 'admin', '21232f297a57a5a743894a0e4a801fc3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `lesson` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `title`, `lesson`) VALUES
(29, 'YOGA Exercise.mp4', 'YOGA Exercise.mp4', ''),
(35, 'How to Create a Healthy Plate.mp4', 'How to Create a Healthy Plate.mp4', ''),
(36, 'Basic Body Workout.mp4', 'Basic Body Workout.mp4', ''),
(37, 'WARM UP ROUTINE BEFORE WORKOUT.mp4', 'WARM UP ROUTINE BEFORE WORKOUT.mp4', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_info`
--
ALTER TABLE `registration_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `registration_info`
--
ALTER TABLE `registration_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
