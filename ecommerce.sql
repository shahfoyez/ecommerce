-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 09:12 PM
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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productID` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_18_090752_create_categories_table', 1),
(6, '2021_09_18_090913_create_sub_categories_table', 1),
(7, '2021_09_18_091002_create_products_table', 1),
(8, '2021_09_18_091041_create_carts_table', 1),
(9, '2021_09_18_091119_create_orders_table', 1),
(10, '2021_09_18_091201_create_order_items_table', 1),
(11, '2021_09_18_091229_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productID` bigint(20) UNSIGNED DEFAULT NULL,
  `paidAmount` double NOT NULL DEFAULT 0,
  `deliveryCharge` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `paymentType` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `transactionID` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentStatus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `orderStatus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `orderType` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'General',
  `contactNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliveryDate` datetime DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userID` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderID` bigint(20) UNSIGNED NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'General',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `specification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_product.jpg',
  `isBidable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `bidStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ON',
  `categoryID` bigint(20) UNSIGNED NOT NULL,
  `subCategoryID` bigint(20) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `price`, `specification`, `description`, `image`, `isBidable`, `bidStatus`, `categoryID`, `subCategoryID`, `userID`, `discount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'HUAWEI WATCH FIT', 'accessories', 65, 'Approximately 21 g (without the strap)\r\n\r\n*Product size, product weight, and related specifications are theoretical values only. Actual measurements between individual products may vary. All specifications are subject to the actual product.\r\n\r\nColour:\r\nBlack, Silver, Rose Gold\r\n\r\nMaterial:\r\ndurable polymer fiber\r\n\r\nGraphite Black Silicone Strap\r\nMint Green Silicone Strap\r\nCantaloupe Orange Silicone Strap\r\nSakura Pink Silicone Strap', '1.64 inch AMOLED 456 x 280 HD\r\nThe AMOLED touchscreen supports slide and touch gestures.\r\n6-axis IMU sensor (Accelerometer sensor, Gyroscope sensor)\r\nOptical heart rate sensor\r\nCapacitive sensor\r\nAmbient light sensor\r\n\r\nTypical usage: 10 days\r\nHUAWEI TruSleep™ is enabled, heart rate monitoring is enabled. Screen is checked briefly 200 times per day, 50 messages, 3 calls and 3 alarms reminding in 24 hours, and workout for 30 minutes per week.\r\n\r\nHeavy usage: 7 days\r\nHUAWEI TruSleep™ is enabled, heart rate monitoring is enabled. Screen is checked briefly 500 times per day, 50 messages, 3 calls and 3 alarms reminding in 24 hours, and workout for 60 minutes per week.\r\n\r\nGPS mode: 12 hours', 'IMG_6bf130a219367b775886533a89cdacd5.png', '0', '0', 3, 5, 1, NULL, NULL, '2021-11-21 03:44:18', '2021-11-21 03:44:18'),
(2, 'HUAWEI Sound X', 'audio', 99, 'Packing List\r\nHUAWEI Sound X x 1\r\nPower adapter x 1\r\nCharging cable x 3\r\nQuick Start Guide x 1\r\nWarranty card x 1\r\nWiper x 1', 'Mute Key\r\nVolume + / -\r\nMultifunction\r\n\r\n\r\n2 of woofers\r\n6 of full-range speakers', 'IMG_65b20de64a9f9e7def774635bc0680aa.png', '0', '0', 3, 4, 1, NULL, NULL, '2021-11-21 03:47:49', '2021-11-21 03:47:49'),
(3, 'HUAWEI FreeBuds Pro', 'audio', 49, 'Per earbud\r\nHeight: 26 mm\r\nWidth: 29.6 mm\r\nDepth: 21.7 mm\r\nWeight: About 6.1 g\r\n\r\nCharging case\r\nHeight: 70 mm\r\nWidth: 51.3 mm\r\nDepth: 24.6 mm\r\nWeight: About 60 g', 'Charging time\r\nAbout 40 minutes for the earbuds (in the charging case)***\r\nAbout 1 hour for the charging case (wire, without earbuds)***\r\nAbout 2 hours for the charging case (wireless,without earbuds)***\r\n\r\n*Typical value. Actual capacity may vary slightly. This capacity is the nominal battery capacity. The actual battery capacity for each individual product may be slightly above or below the nominal battery capacity.\r\n\r\n**Listed data is applicable on some Huawei smartphones when running EMUI 11 or later as follows: HUAWEI Mate 40, HUAWEI Mate 40 Pro, HUAWEI Mate 40 Pro+, HUAWEI Mate 40 RS Porsche Design, HUAWEI P40, HUAWEI P40 Pro, HUAWEI P40 Pro+. When the earbuds are paired with other devices, the actual data may vary depending on product functions and system differences.\r\n\r\n***The battery life and charging data come from Huawei labs with conditions by default: volume at 50%, and the AAC mode is enabled. The actual battery life may vary depending on the volume, audio source, environment interference, product functions, and usage habits. Based on the test results of HUAWEI lab, for reference only.', 'IMG_76501945d252970ca57c11306dc909ab.png', '0', '0', 3, 4, 1, NULL, NULL, '2021-11-21 03:49:31', '2021-11-21 03:49:31'),
(4, 'HUAWEI FreeBuds 4', 'audio', 59, 'Music playback on 1 charge: 4 hours (with ANC disabled)**\r\n\r\nMusic playback on 1 charge: 2.5 hours (with ANC enabled)**\r\n\r\nMusic playback with charging case: 22 hours (with ANC disabled)**\r\n\r\nMusic playback with charging case: 14 hours (with ANC enabled)**', 'About 1 hour for the earbuds (in the charging case)**\r\n\r\nAbout 1 hour for the charging case (wire, without earbuds)**\r\n\r\n*Typical value. Actual capacity may vary slightly. This capacity is the nominal battery capacity. The actual battery capacity for each individual phone may be slightly above or below the nominal battery capacity.\r\n\r\n**Based on the test results of HUAWEI lab, for reference only.', 'IMG_817d5cd8fdaa684f1ee8e94d94301d3d.png', '0', '0', 3, 4, 1, NULL, NULL, '2021-11-21 03:51:48', '2021-11-21 03:51:48'),
(5, 'HUAWEI FreeLace', 'audio', 39, '18-hour playback on one charge*\r\n\r\n*The data are from Huawei Labs and are the test results of medium volume. The actual time varies depending on the volume, source, environment and usage habits.', 'Once plugged in the Type-C, it completes the whole pairing process**\r\n\r\n**It will be available after HOTA, while Huawei EMUI9.1 or later versions with smartphone Bluetooth on required.', 'IMG_74abc6c6dbdda74ba0f6a69e9a68ca05.png', '0', '0', 3, 4, 1, NULL, NULL, '2021-11-21 03:52:53', '2021-11-21 03:52:53'),
(6, 'HUAWEI WATCH GT 2 Pro', 'wearable', 199, 'Approximately 52 g (without the strap)\r\n\r\n*Product size, product weight, and related specifications are theoretical values only. Actual measurements between individual products may vary. All specifications are subject to the actual product.', 'Accelerometer sensor\r\n\r\nGyroscope sensor\r\n\r\nGeomagnetic sensor\r\n\r\nOptical heart rate sensor\r\n\r\nAir pressure sensor', 'IMG_dd721b515fc43286c8879f9ebae3287a.png', '0', '0', 3, 5, 1, NULL, NULL, '2021-11-21 03:54:10', '2021-11-21 03:54:10'),
(7, 'HUAWEI Band 4', 'wearable', 29, 'Band body (Length x width x height): 56 mm (entire length without the strap) x 18.5 mm (width) x 12.5 mm (thickness of the band body)\r\n\r\nStrap width: 17 mm\r\nStrap length: 123 mm + 85 mm', 'Approximately 24 g(including the wrist strap)\r\n\r\n*Product size, product weight, and related specifications are theoretical values only. Actual measurements between individual products may vary. All specifications are subject to the actual product.', 'IMG_ec83a74b59006b7e00261694613098b3.png', '0', '0', 3, 5, 1, NULL, NULL, '2021-11-21 03:55:23', '2021-11-21 03:55:23'),
(8, 'iPhone 13 Pro', 'smartphone', 1399, 'As part of our efforts to reach our environmental goals, iPhone 13 Pro and iPhone 13 Pro Max do not include a power adapter or EarPods. Included in the box is a USB‑C to Lightning Cable that supports fast charging and is compatible with USB‑C power adapters and computer ports.', 'We encourage you to re‑use your current USB‑A to Lightning cables, power adapters, and headphones which are compatible with these iPhone models. But if you need any new Apple power adapters or headphones, they are available for purchase.', 'IMG_0e40922ada6cd07c49708e116b06b6b7.png', '0', '0', 1, 1, 1, NULL, NULL, '2021-11-21 04:01:48', '2021-11-21 04:01:48'),
(10, 'HUAWEI P30 Pro', 'smartphone', 849, 'Size:\r\n6.47 inches\r\nNote: With a rounded corners design on the dewdrop display, the diagonal length of the screen is 6.47 inches when measured according to the standard rectangle (the actual viewable area is slightly smaller).\r\n\r\nColour:\r\n16.7 million colours\r\n\r\nColour Gamut:\r\nWide Color Gamut(DCI-P3)\r\n\r\nType:\r\nOLED\r\n\r\nResolution:\r\nFHD+ 2340*1080\r\n(Note: The resolution measured as a standard rectangle, with a rounded corners design on the dewdrop display,the effective pixels are slightly less.)', 'Size:\r\n6.47 inches\r\nNote: With a rounded corners design on the dewdrop display, the diagonal length of the screen is 6.47 inches when measured according to the standard rectangle (the actual viewable area is slightly smaller).\r\n\r\nColour:\r\n16.7 million colours\r\n\r\nColour Gamut:\r\nWide Color Gamut(DCI-P3)\r\n\r\nType:\r\nOLED\r\n\r\nResolution:\r\nFHD+ 2340*1080\r\n(Note: The resolution measured as a standard rectangle, with a rounded corners design on the dewdrop display,the effective pixels are slightly less.)', 'IMG_3f2bec10fe32e6a07122599966762ebe.webp', '0', '0', 1, 1, 1, NULL, NULL, '2021-11-21 04:08:59', '2021-11-21 04:17:27'),
(12, 'HUAWEI MateBook X Pro 2020', 'laptop', 1599, 'With the remarkable 91% screen-to-body ratio1, the 3K FullView Display gives you a massive view in vivid details. Its 3:2 aspect ratio is perfect for reading and writing. And, the 100% sRGB2 wide colour gamut makes the images and videos more vibrant and realistic as if it were real.', 'With the remarkable 91% screen-to-body ratio1, the 3K FullView Display gives you a massive view in vivid details. Its 3:2 aspect ratio is perfect for reading and writing. And, the 100% sRGB2 wide colour gamut makes the images and videos more vibrant and realistic as if it were real.', 'IMG_08ab65ec05e0a56dd1e991c97c1574b0.png', '0', '0', 1, 2, 1, NULL, NULL, '2021-11-21 04:13:12', '2021-11-21 04:13:12'),
(13, 'HUAWEI MateBook D 15 AMD', 'laptop', 1299, 'Get lost in 15.6 inches of beautiful IPS FullView screen. Featuring an incredible 87% screen-to-body ratio and narrow bezels which have been reduced to just 5.3mm, it is perfect for watching movies, being creative, or getting some work done.', 'Get lost in 15.6 inches of beautiful IPS FullView screen. Featuring an incredible 87% screen-to-body ratio and narrow bezels which have been reduced to just 5.3mm, it is perfect for watching movies, being creative, or getting some work done.', 'IMG_f1f4b4e8502e356ea2684cb48b309eea.png', '0', '0', 1, 2, 1, NULL, NULL, '2021-11-21 04:13:54', '2021-11-21 04:13:54'),
(14, 'Splash TOPS T-Shirts ORANGE', 'fashion', 14, 'Product Type: T-Shirts\r\nBrand: Splash', 'Product Type: T-Shirts\r\nBrand: Splash', 'IMG_ded611146d2e4a593e4e8cf1680da3eb.jpg', '0', '0', 6, 10, 1, NULL, NULL, '2021-11-21 04:21:02', '2021-11-21 04:25:05'),
(15, 'Splash TOPS T-Shirts NAVY', 'fashion', 19, 'Product Type: T-Shirt\r\nGender: Men', 'Product Type: T-Shirt\r\nGender: Men', 'IMG_b233d9397f04a5a32a3bbfd5726f1271.jpg', '0', '0', 6, 12, 1, NULL, NULL, '2021-11-21 04:23:30', '2021-11-21 04:43:35'),
(16, 'SP-Splash DNM Men Jeans 28', 'fashion', 25, 'd', 'd', 'IMG_26c168c1c4c78790f5420f50ea9a8aea.jpg', '0', '0', 6, 13, 1, NULL, NULL, '2021-11-21 04:24:33', '2021-11-21 04:24:48'),
(17, 'Splash BOTTOMS Pants GREY', 'fashion', 23, 'd', 'd', 'IMG_639f3917e4e88257e1f6eb0f74a84c0a.jpg', '0', '0', 6, 13, 1, NULL, NULL, '2021-11-21 04:25:47', '2021-11-21 04:25:47'),
(18, 'SHORT-SLEEVED T-SHIRT', 'fashion', 14, 'Product Type: T-Shirt\r\nGender: Men', 'Product Type: T-Shirt\r\nGender: Men', 'IMG_d1d20d7c2c6ba955a0f0e92561445893.jpg', '0', '0', 6, 10, 1, NULL, NULL, '2021-11-21 04:27:38', '2021-11-21 04:43:49'),
(19, 'CLASSIC POLO SHIRT', 'fashion', 19, 'Product Type: T-Shirt\r\nGender: Men', 'Product Type: T-Shirt\r\nGender: Men', 'IMG_a8a8217fe4017e15665ae261564697a4.png', '0', '0', 6, 10, 1, NULL, NULL, '2021-11-21 04:28:11', '2021-11-21 04:44:13'),
(20, 'SHORT-SLEEVED T-SHIRT', 'fashion', 9, 'Product Type: T-Shirt\r\nGender: Men', 'Product Type: T-Shirt\r\nGender: Men', 'IMG_240ce88439e019501fd036cf612e825e.jpg', '0', '0', 6, 10, 1, NULL, NULL, '2021-11-21 04:30:30', '2021-11-21 04:43:13'),
(21, 'Men\'s  T-shirt', 'fashion', 9, 'Product Type: T-Shirt\r\nGender: Men', 'Product Type: T-Shirt\r\nGender: Men', 'IMG_12c000c4558d0bbd3e68b4a689f23c41.png', '0', '0', 6, 10, 1, NULL, NULL, '2021-11-21 04:31:18', '2021-11-21 04:43:02'),
(22, 'Splash BOTTOMS Pants BLUE', 'fashion', 45, 'Product Type: Jeans\r\nGender: Men', 'Product Type: Jeans\r\nGender: Men', 'IMG_92aa4f5aaed93a3be2f08a3b56696257.jpg', '0', '0', 6, 13, 1, NULL, NULL, '2021-11-21 04:32:42', '2021-11-21 04:45:34'),
(23, 'Splash BOTTOMS Pants BLUE', 'fashion', 45, 'Product Type: Jeans\r\nGender: Men', 'Product Type: Jeans\r\nGender: Men', 'IMG_f6df988b5ecbbce4c6e28aaa05717d4f.jpg', '0', '0', 6, 13, 1, NULL, NULL, '2021-11-21 04:33:16', '2021-11-21 04:45:24'),
(24, 'Splash BOTTOMS Pants BEIGE', 'fashion', 45, 'Product Type: Jeans\r\nGender: Men', 'Product Type: Jeans\r\nGender: Men', 'IMG_4b1a5f83c446534f80e1f4a4eb6a8b82.jpg', '0', '0', 6, 13, 1, NULL, NULL, '2021-11-21 04:33:43', '2021-11-21 04:45:10'),
(25, 'Splash BOTTOMS Pants BLUE', 'fashion', 45, 'd', 'fe', 'IMG_570f058aab41e815033a006790154f32.jpg', '0', '0', 6, 13, 1, NULL, NULL, '2021-11-21 04:34:07', '2021-11-21 04:34:07'),
(26, 'Splash BOTTOMS Pants BLUE', 'fashion', 33, 'Product Type: Jeans\r\nGender: Men', 'Product Type: Jeans\r\nGender: Men', 'IMG_e470498d90ab68b6049f39e80d0de20b.jpg', '0', '0', 6, 13, 1, NULL, NULL, '2021-11-21 04:34:49', '2021-11-21 04:44:54'),
(27, 'Splash BOTTOMS Pants BLUE', 'fashion', 39, 'Product Type: Jeans\r\nGender: Men', 'Product Type: Jeans\r\nGender: Men', 'IMG_8a800faebba1b93174a06c0064a35c09.jpg', '0', '0', 6, 13, 1, NULL, NULL, '2021-11-21 04:35:08', '2021-11-21 04:44:45'),
(28, 'Splash BOTTOMS Pants BLUE', 'fashion', 34, 'Product Type: Jeans\r\nGender: Men', 'Product Type: Jeans\r\nGender: Men', 'IMG_30a03035371ee8d4d47336b3970f34d1.jpg', '0', '0', 6, 13, 1, NULL, NULL, '2021-11-21 04:35:53', '2021-11-21 04:44:32'),
(29, 'Splash TOPS T-Shirts GREY', 'fashion', 21, 'Product Type: T-Shirt\r\nGender: Men', 'Product Type: T-Shirt\r\nGender: Men', 'IMG_e667f7cb9d49e9cca9bea6680f8e35d4.jpg', '0', '0', 6, 10, 1, NULL, NULL, '2021-11-21 04:36:31', '2021-11-21 04:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryID` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `image`, `categoryID`, `created_at`, `updated_at`) VALUES
(1, 'SmartPhones', 'smartphones', 'IMG_dd489faa7181ac2fdf6dd3debb23b4e5.jpg', 1, '2021-11-21 03:13:51', '2021-12-19 11:45:11'),
(2, 'Laptops', 'laptops', 'IMG_5426d25d3bdbaf108fb0a648a6a7ac30.jpg', 1, '2021-11-21 03:15:06', '2021-11-21 03:15:06'),
(3, 'Cameras', 'cameras', 'IMG_7e012135677fb957f3de16e76243a492.gif', 1, '2021-11-21 03:16:45', '2021-11-21 03:16:45'),
(4, 'Audio', 'audio', 'IMG_ff5db2cb99f0b4d62701ce0ccca296dd.jpg', 3, '2021-11-21 03:18:18', '2021-12-19 08:28:31'),
(5, 'Wearable', 'wearable', 'IMG_f5f8f023ede827b095f219d004235670.jpg', 3, '2021-11-21 03:19:40', '2021-11-21 03:19:40'),
(6, 'Hair Care', 'hair-care', 'IMG_f1bda19dc92158e504e53b1c55984879.jpg', 4, '2021-11-21 03:21:19', '2021-11-21 03:21:19'),
(7, 'Skin Care', 'skin-care', 'IMG_cf48509978589f423a343c571a378789.png', 4, '2021-11-21 03:21:53', '2021-11-21 03:21:53'),
(8, 'Bath and Body', 'bath-body', 'IMG_ef1b73d3c1e7a50ac9d010fd3f8e4c5f.jpg', 4, '2021-11-21 03:23:36', '2021-11-21 03:23:36'),
(9, 'Saree', 'saree', 'IMG_c29d1c3e815015691c36d1d4dc484212.jpg', 5, '2021-11-21 03:34:53', '2021-11-21 03:34:53'),
(10, 'Men\'s Tshirt', 'men-tshirt', 'IMG_e5137e9f1e49780fdb011befa9f63e02.jpg', 6, '2021-11-21 03:35:31', '2021-11-21 03:35:31'),
(11, 'Women\'s Bag', 'women-bag', 'IMG_bf197eea04f326cf350666094010409f.jpg', 5, '2021-11-21 03:35:54', '2021-11-21 03:35:54'),
(12, 'Men\'s Shirt', 'men-shirt', 'IMG_1f1e0c0722cd1af080498c5e0734a617.jpg', 6, '2021-11-21 03:36:25', '2021-11-21 04:40:15'),
(13, 'Men\'s Jeans', 'men-jeans', 'IMG_d90be649c8cf0b0654fc12c4bc26c22b.jpg', 6, '2021-11-21 03:36:53', '2021-11-21 03:36:53'),
(14, 'Treadmills', 'treadmills', 'IMG_1db79d3d0c1f29b3feb1936c0c1c50e3.jpg', 7, '2021-11-21 03:39:34', '2021-11-21 03:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '123', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_productid_index` (`productID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_productid_index` (`productID`),
  ADD KEY `orders_userid_index` (`userID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_orderid_index` (`orderID`),
  ADD KEY `order_items_productid_index` (`productID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categoryid_index` (`categoryID`),
  ADD KEY `products_subcategoryid_index` (`subCategoryID`),
  ADD KEY `products_userid_index` (`userID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_categoryid_index` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_productid_foreign` FOREIGN KEY (`productID`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_productid_foreign` FOREIGN KEY (`productID`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_orderid_foreign` FOREIGN KEY (`orderID`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_items_productid_foreign` FOREIGN KEY (`productID`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_subcategoryid_foreign` FOREIGN KEY (`subCategoryID`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
