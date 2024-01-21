-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 06:16 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `apparels`
--

CREATE TABLE `apparels` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `timing` varchar(1000) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apparels`
--

INSERT INTO `apparels` (`id`, `name`, `address`, `phone`, `timing`, `status`, `map`, `type`, `created_at`, `updated_at`) VALUES
(1, 'AZ Fabrics', 'Shop No#3, Bluearea Islamabadd', '031231234567', '10am to 11pm', 1, 'https://maps.app.goo.gl/y5bAahu6TReqBSFo6', 1, '2024-01-14 05:51:35', '2024-01-14 12:07:04'),
(2, 'Yahu', 'aadasd', '03455115856', '9am - 11pm', 1, 'https://maps.app.goo.gl/e1Z7oTvqZjV9nqp2A', 1, '2024-01-14 12:03:52', '2024-01-14 12:06:53'),
(3, 'Super Pharmacy', 'Alipur, Islamabad', '03455115856', '9am - 11pm', 1, 'https://maps.app.goo.gl/eAaVKQhqSn3LwWWM7', 0, '2024-01-20 22:51:22', '2024-01-20 22:51:22');

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
-- Table structure for table `marketings`
--

CREATE TABLE `marketings` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `sellerid` varchar(1000) DEFAULT NULL,
  `url` varchar(10000) DEFAULT NULL,
  `exp_on` timestamp NULL DEFAULT NULL,
  `charges` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marketings`
--

INSERT INTO `marketings` (`id`, `image`, `sellerid`, `url`, `exp_on`, `charges`, `status`, `created_at`, `updated_at`) VALUES
(6, 'logos/6552044e84931.jpg', 'Tehzeeb', 'http://127.0.0.1:8000/vendordetails?id=5', '2023-11-27 19:00:00', 1500, 1, '2023-11-13 06:11:10', '2023-11-13 06:11:10');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `otp` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `prodid` int(11) DEFAULT NULL,
  `prodname` varchar(100) DEFAULT NULL,
  `prodprice` int(11) DEFAULT NULL,
  `prodqty` int(11) DEFAULT NULL,
  `sellerid` int(11) DEFAULT NULL,
  `cartstatus` int(11) DEFAULT NULL,
  `delivery` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `otp`, `userid`, `prodid`, `prodname`, `prodprice`, `prodqty`, `sellerid`, `cartstatus`, `delivery`, `created_at`, `updated_at`) VALUES
(18, '233949', 3, 2, 'Milk Pack', 40, 1, 5, 1, 1, '2023-11-08 07:23:24', '2023-11-08 08:04:41'),
(19, '233949', 3, 3, 'Rice Plus', 400, 1, 4, 1, 0, '2023-11-08 07:23:44', '2023-11-08 08:04:41'),
(20, '272565', 3, 2, 'Milk Pack', 40, 2, 5, 1, 1, '2023-11-08 10:58:04', '2023-11-09 08:57:18'),
(21, '272565', 3, 3, 'Rice Plus', 400, 1, 4, 1, 0, '2023-11-08 10:58:29', '2023-11-08 10:58:37'),
(22, '223695', 3, 2, 'Milk Pack', 40, 1, 5, 1, 0, '2023-11-13 06:32:14', '2023-12-11 01:20:20'),
(24, '852617', 3, 6, 'Chicken Sandwich', 49, 1, 5, 1, 0, '2023-12-11 01:36:34', '2023-12-11 01:36:37');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `orignal_price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `mag_date` timestamp NULL DEFAULT NULL,
  `exp_date` timestamp NULL DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `onsale` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `discount_price`, `orignal_price`, `description`, `type`, `mag_date`, `exp_date`, `stock`, `image`, `vendor_id`, `onsale`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Milk Pack', 40, 50, 'Premium quality milk', 'Food', '2023-10-31 19:00:00', '2024-10-31 19:00:00', 20, 'logos/6543a5e79363d.jpg', 5, 1, 1, '2023-10-31 19:00:00', '2023-10-31 19:00:00'),
(3, 'Rice Plus', 400, 400, 'Premium quality rice', 'Food', '2023-10-31 19:00:00', '2032-11-30 19:00:00', 35, 'logos/6544a3a406923.jpeg', 4, 0, 1, '2023-11-03 07:10:36', '2023-11-03 07:10:36'),
(6, 'Chicken Sandwich', 450, 480, '4 pieces of chicken sandwiches.', 'Food', '2023-12-09 19:00:00', '2024-01-09 17:07:21', 1, 'logos/6576a645e58de.jpg', 5, 0, 1, '2023-12-11 01:03:49', '2023-12-11 01:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `prodid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `prodname` varchar(100) DEFAULT NULL,
  `feeback` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `since` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`, `logo`, `since`, `about`, `twitter`, `fb`, `insta`, `youtube`, `address`, `phone`, `whatsapp`, `area`, `map`, `status`) VALUES
(1, 'Admin', 'admin@yopmail.com', NULL, '$2y$10$XmeMeLYm4iA1zbuB.q1P0uwj98Bs7skdtRXKXUBlaKN2K.6ueXSou', 1, NULL, '2023-10-19 07:18:44', '2023-10-19 07:18:44', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0),
(2, 'Manager User', 'shop@yopmail.com', NULL, '$2y$10$SIh4wHKRf6VmAwUQWdRNQ.Qh2aWY90lEhGcJR8lq/YmJVLKk/k33i', 4, NULL, '2023-10-19 07:18:44', '2023-10-19 07:18:44', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0),
(3, 'Simran', 'user@yopmail.com', NULL, '$2y$10$ZVIAL5CLUYZnO5/Kkm8HBe5cQNHzwMZeXsNjsqFm.qqS2RkSpu5gO', 0, NULL, '2023-10-19 07:18:44', '2023-10-19 07:18:44', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0),
(4, 'Metro Cash & Carry', 'metro@yopmail.com', NULL, '$2y$10$Zzyx20WcRixGj1Jn1ZNRUOg27YR0CxD0ytFXC0d06vEfS31eTIbRu', 2, NULL, '2023-11-03 01:02:26', '2023-11-07 02:02:21', 'logos/6544909f492bf.png', '2000', 'Metro Cash & Carry Mart Plus', NULL, 'www.facebook.com', 'www.instagram.com', 'www.youtube.com', 'Islamabad', '0511234567', '03111234567', 'Islamabad / Rawalpindi', NULL, 1),
(5, 'Tehzeeb', 'tehzeeb@yopmail.com', NULL, '$2y$10$aCyFmj7EAV8xfIxMd/Sfqu/I8.fQ58R5mRSXRCP9TV9DIHECYM24K', 2, NULL, '2023-11-07 06:53:10', '2024-01-20 23:43:47', 'logos/6549e0b9561be.png', '2010', 'Tehzeeb Bakery is one of the standard bakery item producer.', NULL, 'www.facebook.com', 'www.instagram.com', 'www.youtube.com', 'Islamabad', '0511234569', '03121234569', 'Islamabad / Rawalpindi', 'https://maps.app.goo.gl/e1Z7oTvqZjV9nqp2A', 1),
(6, 'Savemart', 'savemart@yopmail.com', NULL, '$2y$10$rjzwbkznP7ueToBVvCbCX.CYPUYAtSluMRrXKn0CkjP2Y1sbZubZO', 2, NULL, '2023-11-06 06:56:38', '2023-11-07 02:01:49', 'logos/6549e0dd71569.png', '2012', 'Savemart is one of the most trusted mart in town.', NULL, 'www.facebook.com', 'www.instagram.com', 'www.youtube.com', 'Pwd housing', '0511234599', '03121234566', 'Lahore', NULL, 1),
(7, 'Shaheen Chemist', 'shaheen@yopmail.com', NULL, '$2y$10$Wj1lHabNAbUnoGkgiMvgA.CDgg5Z.PWznpWIBerEfuNPfPdmtyuTa', 2, NULL, '2023-11-08 11:07:15', '2024-01-20 23:43:06', 'logos/654bb2332e1cd.png', '2001', 'Shaheen Chemist located in Rawalpindi.', NULL, 'www.facebook.com', 'www.instagram.com', 'www.youtube.com', 'Pwd housing', '0511234555', '03451211199', 'Islamabad / Rawalpindi', 'https://maps.app.goo.gl/oKFqKprY9Y7ktaRv9', 1),
(8, 'J.', 'j@yopmail.com', NULL, '$2y$10$Fos8xhVpnhzKn/1DOFSnie.f1mqlPM.AXD7r6.uAiUWQlvDWtdKAe', 2, NULL, '2023-11-14 06:21:00', '2023-11-14 06:21:00', 'logos/6553581cedd05.png', '2005', 'J. by Junaid Jamshed', NULL, NULL, NULL, NULL, 'Bluearea', '0511233333', '03121234444', 'Islamabad / Rawalpindi', NULL, 1),
(10, 'testing', 'testing@yopmail.com', NULL, '$2y$10$42.RwYYfx3kA2FYuWYBA3.y5pLkMtUCow0fKEJoGoL3CvPiZP8fSW', 0, NULL, '2023-12-11 01:44:04', '2023-12-11 01:44:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'testingdemo', 'testingdemo@yopmail.com', NULL, '$2y$10$HF7jZFvVXQ3j8YmhznChhu4mohPwgWQYigXeylGadGFF36dWWLAEm', 0, NULL, '2023-12-11 12:14:50', '2023-12-11 12:14:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `since` varchar(1000) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `twitter` varchar(1000) DEFAULT NULL,
  `fb` varchar(1000) DEFAULT NULL,
  `insta` varchar(1000) DEFAULT NULL,
  `youtube` varchar(1000) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `whatsapp` varchar(1000) DEFAULT NULL,
  `area` varchar(1000) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `logo`, `since`, `about`, `twitter`, `fb`, `insta`, `youtube`, `address`, `phone`, `whatsapp`, `area`, `map`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tehzeeb Bakery', 'logos/65438bf6cf7d3.png', '1990', 'Tehzeeb is a culture, tradition, lifestyle, and class of twin cities in Pakistan, with a legacy of more than 100 years. The bakery is exceedingly popular among society’s elites including Presidents, Prime Ministers, Ambassadors even Royal Prince, Kings, Queens, and their families visiting Pakistan from all around the world. We believe in sharing love, happiness, and making this world a better place.', 'https://twitter.com/tehzeebbakers?lang=en', 'https://www.facebook.com/Tehzeeb.pk/', 'https://www.instagram.com/tehzeeb.pk/?hl=en', NULL, '81 west Jinnah Ave, Block F G 7/3 Blue Area, Islamabad, Islamabad Capital Territory', '051 2150047', '03121234567', 'Islamabad / Rawalpindi', NULL, 0, '2023-11-01 11:46:52', '2023-11-01 11:46:52'),
(4, 'Savemart', 'logos/6543474aecc80.png', '2010', 'savemart is one of the most trusted mart in town.', NULL, 'www.facebook.com', 'www.instagram.com', 'www.youtube.com', 'Pwd housing', '0511234567', '03451211117', 'Lahore', NULL, 1, '2023-11-02 01:52:58', '2023-11-02 06:46:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apparels`
--
ALTER TABLE `apparels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `marketings`
--
ALTER TABLE `marketings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apparels`
--
ALTER TABLE `apparels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketings`
--
ALTER TABLE `marketings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
