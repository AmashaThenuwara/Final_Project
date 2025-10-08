-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2025 at 08:32 AM
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
-- Database: `add_clothing`
--
CREATE DATABASE IF NOT EXISTS `add_clothing` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `add_clothing`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `admins`
--

TRUNCATE TABLE `admins`;
--
-- Dumping data for table `admins`
--

INSERT DELAYED IGNORE INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Add_Clothing', 'addclothing@gmail.com', '$2y$12$OoY0oO1QLK3m6N08pwm9VeUdWRB9mzmIdavhYj4vlksIA9RnJCmK.', '2025-10-05 09:44:45', '2025-10-05 09:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `cache`
--

TRUNCATE TABLE `cache`;
-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `cache_locks`
--

TRUNCATE TABLE `cache_locks`;
-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `carts`
--

TRUNCATE TABLE `carts`;
-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `categories`
--

TRUNCATE TABLE `categories`;
--
-- Dumping data for table `categories`
--

INSERT DELAYED IGNORE INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Ladies', 'ladies', '2025-10-05 09:45:33', '2025-10-05 09:45:33'),
(2, 'Gents', 'gents', '2025-10-05 09:45:50', '2025-10-05 09:45:50'),
(3, 'Kids', 'kids', '2025-10-05 09:46:00', '2025-10-05 09:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `failed_jobs`
--

TRUNCATE TABLE `failed_jobs`;
-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `jobs`
--

TRUNCATE TABLE `jobs`;
-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `job_batches`
--

TRUNCATE TABLE `job_batches`;
-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Dumping data for table `migrations`
--

INSERT DELAYED IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2023_10_01_000000_create_categories_table', 1),
(5, '2025_09_25_212619_create_products_table', 1),
(6, '2025_09_26_181013_create_admin_table', 1),
(7, '2025_09_26_214657_create_orders_table', 1),
(8, '2025_09_26_215137_create_order_items_table', 1),
(9, '2025_09_27_174310_create_carts_table', 1),
(10, '2025_09_27_205908_add_slug_to_categories_table', 1),
(11, '2025_09_27_230227_add_products_to_orders_table', 1),
(12, '2025_09_28_193929_add_phone_to_orders_table', 1),
(13, '2025_09_28_195046_add_address_to_orders_table', 1),
(14, '2025_09_28_195551_add_payment_method_to_orders_table', 1),
(15, '2025_10_04_071752_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `notifications`
--

TRUNCATE TABLE `notifications`;
--
-- Dumping data for table `notifications`
--

INSERT DELAYED IGNORE INTO `notifications` (`id`, `user_id`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 'Your order 1 has been confirmed by admin.', 0, '2025-10-05 10:06:03', '2025-10-05 10:06:03'),
(2, 1, 'Your order 1 has been handed over to the delivery service.', 0, '2025-10-05 10:06:41', '2025-10-05 10:06:41'),
(3, 1, 'Your order 2 has been confirmed by admin.', 0, '2025-10-05 10:08:42', '2025-10-05 10:08:42'),
(4, 1, 'Your order 2 has been handed over to the delivery service.', 0, '2025-10-05 10:09:02', '2025-10-05 10:09:02'),
(5, 1, 'Your order 3 has been confirmed by admin.', 0, '2025-10-06 06:45:31', '2025-10-06 06:45:31'),
(6, 1, 'Your order 3 has been handed over to the delivery service.', 0, '2025-10-06 06:45:54', '2025-10-06 06:45:54'),
(7, 1, 'Your order 4 has been confirmed by admin.', 0, '2025-10-06 11:35:25', '2025-10-06 11:35:25'),
(8, 1, 'Your order 4 has been handed over to the delivery service.', 0, '2025-10-06 11:35:47', '2025-10-06 11:35:47'),
(9, 1, 'Your order 5 has been confirmed by admin.', 0, '2025-10-07 00:37:44', '2025-10-07 00:37:44'),
(10, 1, 'Your order 5 has been handed over to the delivery service.', 0, '2025-10-07 00:38:03', '2025-10-07 00:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`products`)),
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `orders`
--

TRUNCATE TABLE `orders`;
--
-- Dumping data for table `orders`
--

INSERT DELAYED IGNORE INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `payment_method`, `city`, `state`, `zipcode`, `total_price`, `status`, `created_at`, `updated_at`, `products`, `total`) VALUES
(1, 1, 'Amasha Thenuwara', NULL, '0768481377', '241,Greenwaliwatta,Horombawa.', 'cod', NULL, NULL, NULL, 0.00, 'dispatched', '2025-10-05 10:04:35', '2025-10-05 10:06:41', '\"[{\\\"id\\\":3,\\\"name\\\":\\\"Long Trouser\\\",\\\"price\\\":\\\"1700.00\\\",\\\"quantity\\\":1,\\\"image\\\":\\\"products\\\\\\/c7RT3DrjEygnS559ACDtKoZTua2UfUUOcxatoJxC.jpg\\\"}]\"', 1700.00),
(2, 1, 'Amasha Thenuwara', NULL, '0768481377', '241,Greenwaliwatta,Horombawa.', 'cod', NULL, NULL, NULL, 0.00, 'dispatched', '2025-10-05 10:08:21', '2025-10-05 10:09:02', '\"[{\\\"id\\\":2,\\\"name\\\":\\\"Short\\\",\\\"price\\\":\\\"2300.00\\\",\\\"quantity\\\":1,\\\"image\\\":\\\"products\\\\\\/xOq64xOZyoWJWPZYjuryjw3d87132TlXb7DdmJAE.jpg\\\"}]\"', 2300.00),
(3, 1, 'Amasha Thenuwara', NULL, '0768481377', '241,Greenwaliwatta,Horombawa.', 'cod', NULL, NULL, NULL, 0.00, 'dispatched', '2025-10-06 06:45:05', '2025-10-06 06:45:54', '\"[{\\\"id\\\":4,\\\"name\\\":\\\"Short\\\",\\\"price\\\":\\\"1500.00\\\",\\\"quantity\\\":1,\\\"image\\\":\\\"products\\\\\\/jspGelwpguzt318r5Hoja4AuzSYbofyk9mvemsvM.png\\\"}]\"', 1500.00),
(4, 1, 'Amasha Thenuwara', NULL, '0768481377', '241,Greenwaliwatta,Horombawa.', 'cod', NULL, NULL, NULL, 0.00, 'dispatched', '2025-10-06 11:34:59', '2025-10-06 11:35:47', '\"[{\\\"id\\\":4,\\\"name\\\":\\\"Short\\\",\\\"price\\\":\\\"1500.00\\\",\\\"quantity\\\":1,\\\"image\\\":\\\"products\\\\\\/jspGelwpguzt318r5Hoja4AuzSYbofyk9mvemsvM.png\\\"}]\"', 1500.00),
(5, 1, 'Amasha Thenuwara', NULL, '0768481377', '241,Greenwaliwatta,Horombawa.', 'cod', NULL, NULL, NULL, 0.00, 'dispatched', '2025-10-07 00:37:28', '2025-10-07 00:38:03', '\"[{\\\"id\\\":3,\\\"name\\\":\\\"Long Trouser\\\",\\\"price\\\":\\\"1700.00\\\",\\\"quantity\\\":1,\\\"image\\\":\\\"products\\\\\\/c7RT3DrjEygnS559ACDtKoZTua2UfUUOcxatoJxC.jpg\\\"}]\"', 1700.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `order_items`
--

TRUNCATE TABLE `order_items`;
-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `password_reset_tokens`
--

TRUNCATE TABLE `password_reset_tokens`;
-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `size` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `products`
--

TRUNCATE TABLE `products`;
--
-- Dumping data for table `products`
--

INSERT DELAYED IGNORE INTO `products` (`id`, `name`, `description`, `price`, `size`, `category_id`, `image_url`, `stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Long Trouser', 'Materials - Linen,\r\nColour - Black', 2500.00, 'L', 2, 'products/TYYWKdtkaax4LkjwuOwg7QebC9DUFRgYVg7qTMpj.jpg', 700, '2025-10-05 09:47:43', '2025-10-05 10:00:15', NULL),
(2, 'Short', 'Material - Linen,\r\nColour - Black', 2300.00, 'L', 2, 'products/xOq64xOZyoWJWPZYjuryjw3d87132TlXb7DdmJAE.jpg', 500, '2025-10-05 09:49:04', '2025-10-05 10:00:31', NULL),
(3, 'Long Trouser', 'Materials - Linen,\r\nColour - Blue', 1700.00, 'L', 1, 'products/c7RT3DrjEygnS559ACDtKoZTua2UfUUOcxatoJxC.jpg', 600, '2025-10-05 09:52:47', '2025-10-05 09:52:47', NULL),
(4, 'Short', 'Materials - Linen,\r\nColour - White', 1500.00, 'L', 1, 'products/jspGelwpguzt318r5Hoja4AuzSYbofyk9mvemsvM.png', 450, '2025-10-05 09:53:35', '2025-10-05 09:53:35', NULL),
(5, 'Short', 'Materials - Linen,\r\nColour - Black', 1300.00, 'M', 3, 'products/xhTjjPqd94Q8HUO6lblaRVmlGUu2aiEeNyE9Ux0w.png', 400, '2025-10-05 09:54:41', '2025-10-05 09:54:41', NULL),
(6, 'Short', 'Materials - Linen,\r\nColour - Blue', 1300.00, 'L', 3, 'products/BMVDsJFjMrUmKeKRlvnDeq2wuJr7poDMS6Y36AX0.png', 600, '2025-10-05 09:55:58', '2025-10-05 09:55:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `sessions`
--

TRUNCATE TABLE `sessions`;
--
-- Dumping data for table `sessions`
--

INSERT DELAYED IGNORE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2hkeoIy8EhC3mkLD5N8IQ9lh8Sb0BsZJniRiFJ9N', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2NrRkxyYTIwNEd1MzRocG5BZU50ME1NZ2s2dGhBeHZDZHVySDF2ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1759812486),
('5oaLDRnF0gk4qxKnWTHMnHwT4zklvHBRbn5HUsUO', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiclViZlE4TDFWMjlsdnE3R0pMdDNTQnF3bU1RRVFpZnZWZ3RsVm5XciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Byb2ZpbGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1759770353),
('CfQQa3ZeM7iemzQuEo2No0AH286zhTNWbpWb6qng', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiM0ZnaWpDMFQwR3NMS0V3STBtY21XRTQ2TWl0dFJLZ0N0MWJmSmFqMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1759817098),
('w8LAptP0ueTdQ0i3PUkmzhQWpXpenoQOZZF9KNjt', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibTR1em1wc1hnc3owRUZtTERQanBlSzhSTERTRzFSZ3N3V0xPQ05qViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlcnMvNSI7fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1759817309);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT DELAYED IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amasha Thenuwara', 'amashathenuwara@gmail.com', NULL, '$2y$12$W8QEJmMTWKU4ZT4Y1yynNO5wPgw4mzVhOGnwyyDh2sGoXJ4a6T.Z2', NULL, '2025-10-05 10:02:35', '2025-10-05 10:02:35');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
