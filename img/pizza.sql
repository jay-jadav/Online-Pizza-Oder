-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2025 at 09:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Jadav Jay', 'nrndrsnhrjpt@gmail.com', 'good', '2025-08-11 07:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `category`, `size`, `price`, `description`, `image`) VALUES
(1, 'cornn', 'Pizza', 'Small', 255.00, 'good', '0'),
(2, 'pizza', 'Pizza', 'Small', 255.00, 'good', 'images/1756736853_pizza2.png'),
(3, 'indain', 'Pizza', 'Small', 215.00, 'good', 'images/1756794939_pp1.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `item_id`, `name`, `size`, `price`, `image`, `qty`, `grand_total`, `customer_name`, `phone`, `address`, `session_id`, `order_date`, `status`) VALUES
(11, 7, 'Sweet Heat Pizza', 'Regular', 235.00, NULL, 1, 235.00, 'jay', '9081734816', 'nanavti', 'rgir68hojvpbet1epr1rqe0d9b', '2025-08-18 12:11:17', 'Pending'),
(12, 0, 'Garlic Breadsticks', 'Regular', 320.00, NULL, 1, 320.00, 'jay', '9081734816', 'nanavti', '9j8mter6leau2p57mtev2t6fve', '2025-08-28 10:23:25', 'Pending'),
(14, 0, 'cornn', 'Small', 255.00, NULL, 2, 510.00, 'heet1', '9081734816', 'nanavti', '0e8omqip7gv4ihqcijel97v8n7', '2025-09-01 05:45:06', 'Pending'),
(15, 0, 'cornn', 'Small', 255.00, NULL, 2, 510.00, 'anshul1', '9081734816', 'atmiya', '5117k5vma3n6m30337hku199ri', '2025-09-01 08:00:03', 'Completed'),
(16, 3, 'pizza', 'Small', 255.00, NULL, 3, 765.00, 'jay', '9081734816', 'nanavti', 'n22tu7lpsb0dpc67vvdv5572s3', '2025-09-01 14:35:05', 'Pending'),
(17, 3, 'pizza', 'Small', 255.00, 'images/noimage.png', 1, 255.00, 'nayan', '9081734816', 'nanavti ', '8jf1cfs5evc7mhgvam52pkb7sh', '2025-09-02 06:24:58', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Jadav Jay', 'nrndrsnhrjpt@gmail.com', '$2y$10$x', '2025-08-07 02:29:58'),
(2, 'nayan', 'nanya@gmail.com', '$2y$10$m', '2025-08-07 02:34:01'),
(4, 'het', 'het@gmail.com', '$2y$10$j', '2025-08-11 07:11:07'),
(5, 'vishal', 'vishal@gmail.com', '$2y$10$8', '2025-08-11 12:55:14'),
(6, 'nehal', 'nehal@gmail.com', '$2y$10$X', '2025-08-12 10:26:43'),
(7, 'anshul', 'anshul@gmail.com', '$2y$10$C', '2025-08-18 06:00:26'),
(9, 'jay', 'jay@gmail.com', '$2y$10$CHOpGBrkRzZfySwVB6gAJeTpLchjNJ0d9zuCIXRnqrnsMYqkzdvUW', '2025-08-19 11:53:04'),
(10, 'heet', 'heet@gmail.com', '$2y$10$cd0Uo5AwjPZ0CjcrwqSvQeb/ib7GxKibIAQzkvhzpg99AJweNFO9u', '2025-08-29 06:16:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
