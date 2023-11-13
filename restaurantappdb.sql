-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 01:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurantappdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'banan', '2023-11-06 13:35:44', '2023-11-09 01:01:02'),
(3, 'sea food', '2023-11-06 23:42:56', '2023-11-06 23:42:56'),
(4, 'fresh food', '2023-11-07 01:44:28', '2023-11-07 01:44:28'),
(8, 'new testy foo', '2023-11-07 21:52:59', '2023-11-09 01:07:11');

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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `price`, `image`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(21, 'sea food', '120.00', '11082023161105654bb31959a96.jpg', 'this is sea food', 3, '2023-11-09 00:11:05', '2023-11-09 01:08:47'),
(22, 'freesh food', '500.00', '11092023113559654cc41f32255.jpg', 'this freash food', 4, '2023-11-09 19:35:59', '2023-11-09 19:35:59'),
(23, 'fish', '150.00', '11092023115551654cc8c71cf89.jpg', 'this is a sea food', 3, '2023-11-09 19:55:51', '2023-11-09 19:55:51'),
(24, 'neFood', '500.00', '11112023080751654f3657dff3c.jpg', 'this new food', 8, '2023-11-11 16:07:51', '2023-11-11 16:07:51'),
(25, 'bannan', '100.00', '11112023080841654f3689a251c.jpg', 'dkddk', 2, '2023-11-11 16:08:41', '2023-11-11 16:08:41');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_04_113735_create_sale_details_table', 1),
(6, '2023_11_04_114003_create_sales_table', 1),
(7, '2023_11_04_114135_create_menus_table', 1),
(8, '2023_11_04_114219_create_categories_table', 1),
(9, '2023_11_04_114615_create_tables_table', 2),
(10, '2014_10_12_000000_create_users_table', 3);

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
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total_recieved` decimal(8,2) NOT NULL DEFAULT 0.00,
  `change` decimal(8,2) NOT NULL DEFAULT 0.00,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sale_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `table_id`, `table_name`, `user_id`, `user_name`, `total_price`, `total_recieved`, `change`, `payment_type`, `sale_status`, `created_at`, `updated_at`) VALUES
(1, 5, 'B1', 1, 'admin', '1970.00', '2001.00', '31.00', 'Cash', 'paid', '2023-11-10 13:58:36', '2023-11-11 16:40:35'),
(2, 4, 'T1', 1, 'admin', '900.00', '901.00', '1.00', 'cash', 'paid', '2023-11-10 14:13:18', '2023-11-11 15:00:05'),
(3, 6, 'B2', 1, 'admin', '890.00', '0.00', '0.00', '', 'unpaid', '2023-11-10 21:09:31', '2023-11-12 15:25:49'),
(4, 1, 'T2', 1, 'admin', '480.00', '500.00', '20.00', 'Cash', 'paid', '2023-11-10 22:38:16', '2023-11-11 15:17:00'),
(5, 4, 'T1', 1, 'admin', '270.00', '300.00', '30.00', 'Cash', 'paid', '2023-11-11 16:00:00', '2023-11-11 16:37:08'),
(6, 1, 'T2', 1, 'admin', '390.00', '391.00', '1.00', 'Cash', 'paid', '2023-11-13 19:37:20', '2023-11-13 19:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noConfirm',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`id`, `sale_id`, `menu_id`, `menu_name`, `menu_price`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 21, 'sea food', 120, 5, 'confirm', '2023-11-10 13:59:53', '2023-11-11 12:28:03'),
(3, 2, 21, 'sea food', 120, 2, 'confirm', '2023-11-10 14:13:18', '2023-11-11 12:27:35'),
(4, 2, 23, 'fish', 150, 5, 'confirm', '2023-11-10 14:13:31', '2023-11-11 12:27:35'),
(108, 1, 21, 'sea food', 120, 1, 'confirm', '2023-11-10 21:06:02', '2023-11-11 12:28:03'),
(109, 1, 21, 'sea food', 120, 1, 'confirm', '2023-11-10 21:08:53', '2023-11-11 12:28:03'),
(110, 3, 21, 'sea food', 120, 1, 'confirm', '2023-11-10 21:09:31', '2023-11-11 12:30:43'),
(115, 3, 23, 'fish', 150, 1, 'confirm', '2023-11-10 21:11:36', '2023-11-12 15:25:49'),
(123, 1, 21, 'sea food', 120, 1, 'confirm', '2023-11-10 22:27:58', '2023-11-11 12:28:03'),
(124, 1, 23, 'fish', 150, 1, 'confirm', '2023-11-10 22:28:23', '2023-11-11 12:28:03'),
(125, 1, 21, 'sea food', 120, 1, 'confirm', '2023-11-10 22:28:27', '2023-11-11 12:28:03'),
(126, 1, 22, 'freesh food', 500, 1, 'confirm', '2023-11-10 22:30:14', '2023-11-11 12:28:03'),
(127, 3, 22, 'freesh food', 500, 1, 'confirm', '2023-11-10 22:30:23', '2023-11-11 12:30:43'),
(129, 1, 21, 'sea food', 120, 1, 'confirm', '2023-11-10 22:34:18', '2023-11-11 12:28:03'),
(130, 1, 22, 'freesh food', 500, 1, 'confirm', '2023-11-10 22:35:25', '2023-11-11 12:28:03'),
(131, 1, 21, 'sea food', 120, 1, 'confirm', '2023-11-10 22:35:37', '2023-11-11 12:28:03'),
(132, 4, 21, 'sea food', 120, 4, 'confirm', '2023-11-10 22:38:17', '2023-11-11 12:30:56'),
(138, 2, 23, 'fish', 150, 1, 'confirm', '2023-11-11 12:21:59', '2023-11-11 12:27:35'),
(139, 3, 21, 'sea food', 120, 1, 'confirm', '2023-11-11 12:22:13', '2023-11-12 15:25:20'),
(140, 5, 21, 'sea food', 120, 1, 'confirm', '2023-11-11 16:00:00', '2023-11-11 16:36:58'),
(141, 5, 23, 'fish', 150, 1, 'confirm', '2023-11-11 16:00:04', '2023-11-11 16:36:58'),
(142, 6, 21, 'sea food', 120, 2, 'confirm', '2023-11-13 19:37:20', '2023-11-13 19:37:37'),
(143, 6, 23, 'fish', 150, 1, 'confirm', '2023-11-13 19:37:25', '2023-11-13 19:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'T2', 'available', '2023-11-09 13:29:50', '2023-11-13 19:37:59'),
(4, 'T1', 'available', '2023-11-09 17:07:41', '2023-11-11 16:37:08'),
(5, 'B1', 'available', '2023-11-09 17:07:47', '2023-11-11 16:40:35'),
(6, 'B2', 'unavailable', '2023-11-09 17:07:54', '2023-11-10 21:09:31'),
(7, 'C1', 'available', '2023-11-09 17:19:26', '2023-11-09 17:19:26'),
(8, 'C2', 'available', '2023-11-09 17:19:33', '2023-11-09 17:19:33');

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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin', NULL, '$2y$10$zcmLKP8sKjg6FHyrsZb6veGx4qRazFBYXHu3942qa89DgO5MiDxU2', 'admin', NULL, '2023-11-09 14:06:17', '2023-11-09 14:06:17'),
(3, 'Manar ', 'manar@mana', NULL, '$2y$10$QnobynGGOVGYwqPC12H8vukebo6FFzAMmkitkmQHrt5RnOxlIjIP2', 'cashier', NULL, '2023-11-09 14:32:42', '2023-11-09 14:43:45');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
