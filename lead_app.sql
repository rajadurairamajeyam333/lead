-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 02:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lead_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(251) NOT NULL,
  `first_name` varchar(251) NOT NULL,
  `last_name` varchar(251) NOT NULL,
  `email` varchar(251) NOT NULL,
  `phone` varchar(251) NOT NULL,
  `otp_method` varchar(251) NOT NULL,
  `otp` varchar(251) NOT NULL,
  `is_verified` varchar(251) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `emp_id`, `first_name`, `last_name`, `email`, `phone`, `otp_method`, `otp`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, '11', 'r', 'r', '123', '', '', '9996', '', '2024-03-15 11:01:20', '2024-03-15 11:01:20'),
(2, '22', 'e', 'e', '222', '', '', '2126', '', '2024-03-15 11:06:45', '2024-03-15 11:06:45'),
(3, '33', 'Rajadurai', 'Ramajeyam', 'rajadurai@gmail.com', '1234567890', '', '4507', '', '2024-03-16 09:49:42', '2024-03-16 09:49:42'),
(4, '33', 'Rajadurai', 'Ramajeyam', 'rajadurai@gmail.com', '1234567890', '', '1351', '', '2024-03-16 10:18:16', '2024-03-16 10:18:16'),
(5, '33', 'Rajadurai', 'Ramajeyam', 'rajadurai@gmail.com', '1234567890', '', '9780', '', '2024-03-16 10:24:03', '2024-03-16 10:24:03'),
(6, '332', 'yui', 'yuii', 'yui@gmail.com', '2333', '', '5852', '', '2024-03-16 10:35:52', '2024-03-16 10:35:52'),
(7, 'qweed', 'qwed', 'awd', 'qwde@gmail.com', 'qwd', '', '1875', '', '2024-03-16 10:39:35', '2024-03-16 10:39:35'),
(8, '1234', 'hi', 'mrr', 'hi@gmail.com', '14521', 'phone', '7583', 'yes', '2024-03-16 11:46:36', '2024-03-16 11:46:36'),
(9, '1234', 'hi', 'mrr', 'hi@gmail.com', '14521', 'phone', '7583', 'yes', '2024-03-16 11:59:51', '2024-03-16 11:59:51'),
(10, '12345', 'hii', 'mrrr', 'hii@gmail.com', '145211', 'phone', '2370', 'yes', '2024-03-16 12:35:13', '2024-03-16 12:35:13'),
(11, '12345', 'hii', 'mrrr', 'hii@gmail.com', '145211', 'phone', '2370', 'yes', '2024-03-16 12:37:57', '2024-03-16 12:37:57'),
(12, '12345', 'hii', 'mrrr', 'hii@gmail.com', '145211', 'phone', '2370', 'yes', '2024-03-16 12:38:03', '2024-03-16 12:38:03'),
(13, '2332', 'wewe', 'ewew', 'wewee@gmail.com', '323232', 'phone', '7427', 'yes', '2024-03-16 12:56:16', '2024-03-16 12:56:16'),
(14, '2332', 'wewe', 'ewew', 'wewee@gmail.com', '323232', 'phone', '7427', 'yes', '2024-03-16 12:57:57', '2024-03-16 12:57:57'),
(15, '5454', 'qweddd', 'ereret', 'erer@gmail.com', '147852', 'email', '4759', 'yes', '2024-03-16 13:05:58', '2024-03-16 13:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `created_for` varchar(251) NOT NULL,
  `gender` varchar(251) NOT NULL,
  `first_name` varchar(251) NOT NULL,
  `middle_name` varchar(251) NOT NULL,
  `last_name` varchar(251) NOT NULL,
  `datee` varchar(251) NOT NULL,
  `country` varchar(251) NOT NULL,
  `statee` varchar(251) NOT NULL,
  `email` varchar(251) NOT NULL,
  `phone_country_code` varchar(251) NOT NULL,
  `phone_number` varchar(251) NOT NULL,
  `whatsapp_country_code` varchar(251) NOT NULL,
  `whatsapp_number` varchar(251) NOT NULL,
  `communication` varchar(251) NOT NULL,
  `verification_code` varchar(251) NOT NULL,
  `marital_status` varchar(251) NOT NULL,
  `mother_tongue` varchar(251) NOT NULL,
  `caste` varchar(251) NOT NULL,
  `denomination` varchar(251) NOT NULL,
  `height` varchar(251) NOT NULL,
  `height_unit` varchar(251) NOT NULL,
  `weight` varchar(251) NOT NULL,
  `weight_unit` varchar(251) NOT NULL,
  `complexion` varchar(251) NOT NULL,
  `education` varchar(251) NOT NULL,
  `occupation` varchar(251) NOT NULL,
  `company_name` varchar(251) NOT NULL,
  `annual_income` varchar(251) NOT NULL,
  `work_location` varchar(251) NOT NULL,
  `father_name` varchar(251) NOT NULL,
  `father_occupation` varchar(251) NOT NULL,
  `mother_name` varchar(251) NOT NULL,
  `mother_occupation` varchar(251) NOT NULL,
  `family_status` varchar(251) NOT NULL,
  `siblings` varchar(251) NOT NULL,
  `photo` varchar(251) NOT NULL,
  `citizen_of` varchar(251) NOT NULL,
  `current_address` varchar(251) NOT NULL,
  `permanent_address` varchar(251) NOT NULL,
  `is_verified` varchar(251) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `created_for`, `gender`, `first_name`, `middle_name`, `last_name`, `datee`, `country`, `statee`, `email`, `phone_country_code`, `phone_number`, `whatsapp_country_code`, `whatsapp_number`, `communication`, `verification_code`, `marital_status`, `mother_tongue`, `caste`, `denomination`, `height`, `height_unit`, `weight`, `weight_unit`, `complexion`, `education`, `occupation`, `company_name`, `annual_income`, `work_location`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`, `family_status`, `siblings`, `photo`, `citizen_of`, `current_address`, `permanent_address`, `is_verified`, `created_at`, `updated_at`) VALUES
(2, 'Myself', 'Male', 'hi', 'hii', 'hiii', '2024-03-21', 'India', 'Tamil Nadu', 'hi@gmail.com', '+91', '1234567890', '+91', '1234567891', 'Primary Contact Number', 'Primary Contact Number', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2024-03-21 14:11:33', '2024-03-21 14:11:33'),
(3, 'Myself', 'Female', 'hi', 'hii', 'hiii', '2024-03-21', 'India', 'Tamil Nadu', 'hi@gmail.com', '+91', '1234567890', '', '', 'Whatsapp Number', 'Primary Contact Number', 'Unmarried', 'dgdf', 'dfvbdfv', 'dfdzv', '233', 'cm', '43', 'kg', 'dfv', 'zdfbdf', 'fgxbf', 'rvedfv', '443434', 'dfvdzz', 'fgbgf', 'dfvds', 'dfvdfb', 'gbfg', 'sdsdv', 'nngf', '', 'sdfsd', 'dfvbdvf', 'sdfsd', '', '2024-03-21 15:22:53', '2024-03-21 15:22:53'),
(4, 'Myself', 'Male', 'wefdw', 'qqwq', 'qwwq', '2024-03-11', 'qwqw', 'qwqew', 'qwqw@gmail.com', '+91', '12323213322', '+91', '12323213322', 'Primary Contact Number', 'Primary Contact Number', 'Unmarried', 'wdcwd', 'sdcsd', 'sdc', '231', 'cm', '123', 'kg', 'sdvsdc', 'sdcsdc', 'dsvdfd', 'fhnthn', '23323', 'ghgfg', 'fgbf', 'fgbfg', 'gfbfgrgg', 'fgbf', 'fgbfg', 'fgbfg', '', 'dtgvd', 'fgbfg', 'dfvsdv', '', '2024-03-21 15:27:45', '2024-03-21 15:27:45'),
(5, 'Daughter', 'Female', 'swef', 'sdvsd', 'sdcfsd', '2024-03-16', 'India', 'Tamil Nadu', 'wewee@gmail.com', '+91', '123211212213', '+91', '123211212213', 'Whatsapp Number', 'Primary Contact Number', 'Unmarried', 'sdsd', 'hgn', 'ghn', '45', 'cm', '34', 'kg', 'ghn', 'fgbfg', 'gfbfg', 'fgbfgbf', '757433', 'fgfg', 'fgbfgvb', 'gfbg', 'nybg', 'fvdv', 'erg', 'dfvd', 'uploads/65fc5558727f3_lead.png', 'dfvd', 'dfv', 'defvdf', '', '2024-03-21 15:42:43', '2024-03-21 15:42:43'),
(6, 'Daughter', 'Female', 'hi', 'hii', 'hiii', '2024-03-22', 'India', 'Tamil Nadu', 'hi@gmail.com', '+91', '1234567890', '+91', '1234567890', 'Primary Contact Number', 'Primary Contact Number', '', '', '', '', '', 'cm', '', 'kg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2024-03-21 19:39:29', '2024-03-21 19:39:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
