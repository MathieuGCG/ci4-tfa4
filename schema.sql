-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2026 at 11:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Juan Dela Cruz', 'juan.delacruz@example.com', '09171234567', '2026-10-03 00:27:04'),
(2, 'Maria Clara', 'maria.clara@example.com', '09182345678', '2026-10-03 00:27:04'),
(3, 'Jose Rizal', 'jose.rizal@example.com', '09193456789', '2026-10-03 00:27:04'),
(4, 'Andres Bonifacio', 'andres.b@example.com', '09204567890', '2026-10-03 00:27:04'),
(5, 'Apolinario Mabini', 'apolinario.m@example.com', '09215678901', '2026-10-03 00:27:04'),
(6, 'MATHIEU GUNDRAN', 'mcgundran1@fit.edu.ph', '09154593897', '2026-10-03 08:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `avatar`, `created_at`) VALUES
(1, 'admin_juan', '$2y$10$gA7dBgNJuZ22y2kkYD.TfucCks/jFXaRyAf1MkEiPja6G2z4Xr3fK', 'Juan Dela Cruz', NULL, '2026-10-03 00:27:04'),
(2, 'mclara_cashier', '$2y$10$gA7dBgNJuZ22y2kkYD.TfucCks/jFXaRyAf1MkEiPja6G2z4Xr3fK', 'Maria Clara', NULL, '2026-10-03 00:27:04'),
(3, 'jrizal_mgr', '$2y$10$gA7dBgNJuZ22y2kkYD.TfucCks/jFXaRyAf1MkEiPja6G2z4Xr3fK', 'Jose Rizal', NULL, '2026-10-03 00:27:04'),
(4, 'abonifacio_staff', '$2y$10$gA7dBgNJuZ22y2kkYD.TfucCks/jFXaRyAf1MkEiPja6G2z4Xr3fK', 'Andres Bonifacio', NULL, '2026-10-03 00:27:04'),
(5, 'amabini_tech', '$2y$10$gA7dBgNJuZ22y2kkYD.TfucCks/jFXaRyAf1MkEiPja6G2z4Xr3fK', 'Apolinario Mabini', NULL, '2026-10-03 00:27:04'),
(6, 'Korilakkuma', '$2y$10$gA7dBgNJuZ22y2kkYD.TfucCks/jFXaRyAf1MkEiPja6G2z4Xr3fK', 'Roseann Godilo', '1791017036_f440e27a27576fffcef1.jpg', '2026-10-03 08:43:56'),
(7, 'juan', '$2y$10$gA7dBgNJuZ22y2kkYD.TfucCks/jFXaRyAf1MkEiPja6G2z4Xr3fK', 'Juan Dela Cruz', NULL, '2026-10-06 17:11:40'),
(8, 'mathieu', '$2y$10$/PYL4292/16L5bRuiX4v0OqY1h4MVPOSD53KhVnIakDqZxASA7fau', 'Mathieu Gundran', NULL, '2026-10-06 09:18:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
