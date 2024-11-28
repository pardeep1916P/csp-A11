-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql301.infinityfree.com
-- Generation Time: Dec 24, 2023 at 09:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35576750_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_donations`
--

CREATE TABLE `food_donations` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `food_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_donations`
--

INSERT INTO `food_donations` (`id`, `datetime`, `food_type`, `quantity`, `location`, `mobile_number`, `email`) VALUES
(1, '2023-12-08 13:02:00', 'fruits', '2 dozens', 'Guntur,India', '1234567890', 'sarathkuruganti@gmail.com'),
(3, '2023-12-08 20:07:00', 'bread', '50', 'dkjhih', '7093667989', 'nadendlanaga2003@gmail.com'),
(4, '2023-12-08 20:14:00', 'bread', '50', 'dkjhih', '7093667989', 'nadendlanaga2003@gmail.com'),
(5, '2023-12-09 10:47:00', 'Bonda', '31', 'Gud', '9676966416', 'nadendlanaga2003@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phno`, `email`, `gender`, `dob`, `address`, `password`, `image`) VALUES
(1, 'Sarath ', '1234567890', 'sarathkuruganti@gmail.com', 'male', '2023-12-06', 'Guntur ', '123', 'sarathkuruganti@gmail.com.jpg'),
(2, 'Phani', '9182760795', 'nadendlanaga2003@gmail.com', 'male', '2003-07-03', '22-1/1', 'Phani@123', 'nadendlanaga2003@gmail.com.jpg'),
(4, 'Siva', '9676966416', 'phanin27987@gmail.com', 'male', '2003-12-06', '22-1\r\nNehur nagar', '1234', 'phanin27987@gmail.com.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_donations`
--
ALTER TABLE `food_donations`
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
-- AUTO_INCREMENT for table `food_donations`
--
ALTER TABLE `food_donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
