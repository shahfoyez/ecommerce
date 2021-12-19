-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 09:10 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `userID`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Electronic Devices', 'electronics-devices', 'IMG_9670629278ab1120adf64670f2463792.jpg', 1, NULL, '2021-11-21 03:00:53', '2021-12-19 13:40:09'),
(3, 'Electronic Accessories', 'electronic-accessories', 'IMG_48698325a11780654b06606f50aa4910.jpg', 1, NULL, '2021-11-21 03:08:48', '2021-11-21 03:08:48'),
(4, 'Health & Beauty', 'health-beauty', 'IMG_a3427531961683dcf5d058f14c75c813.jpg', 1, NULL, '2021-11-21 03:09:44', '2021-11-21 03:09:44'),
(5, 'Women\'s Fashion', 'women-fashion', 'IMG_8f8d70e6d339dcda9ab818b14dc4f852.jpg', 1, NULL, '2021-11-21 03:11:01', '2021-12-19 13:04:05'),
(6, 'Men\'s Fashion', 'men-fashion', 'IMG_f65084b4759e1e0bd6cda59f7ba22e53.jpg', 1, NULL, '2021-11-21 03:11:39', '2021-12-19 13:04:20'),
(7, 'Sports & Outdoor', 'sports-outdoor', 'IMG_764288a8eb63876beb805754f772c661.jpg', 1, NULL, '2021-11-21 03:12:32', '2021-11-21 03:12:32'),
(8, 'Automotive & Motorbike', 'automotive-motorbike', 'IMG_a9f1eb435003e92ae50d96d52a118120.jpg', 1, NULL, '2021-12-12 03:59:17', '2021-12-12 03:59:17'),
(9, 'Babies & Toys', 'babies-toys', 'IMG_133ef89019721b3468b368bcf978669d.jpg', 1, NULL, '2021-12-12 04:03:58', '2021-12-12 04:03:58'),
(10, 'Home & Lifestyle', 'home-lifestyle', 'IMG_40845bcec94df7ed9c2ff8cfa0b47091.jpg', 1, NULL, '2021-12-12 04:05:33', '2021-12-12 04:05:33'),
(11, 'Furniture', 'furniture', 'IMG_7005c0755aa1d060ac9a750a5e1bc38b.jpg', 1, NULL, '2021-12-19 12:11:50', '2021-12-19 12:11:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
