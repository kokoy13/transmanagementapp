-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2025 at 09:34 PM
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
-- Database: `transapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(31, 'Hero Banner', '6G4t5AHvGQzdNIhntiYTU96V0DPQlqamgOypFzNO.png', '2025-05-29 22:06:10', '2025-05-29 22:06:10'),
(32, 'Family Banner', '7Mxesa4Y2i3AWcLT0scYLkiaaboOOw3oPSKsCsfe.jpg', '2025-05-29 22:10:24', '2025-05-29 22:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `published_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `slug`, `excerpt`, `content`, `thumbnail`, `user_id`, `is_published`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'The Future of Web Development: Trends to Watch in 2024', 'future-web-development-2024', 'Explore the latest trends shaping the future of web development, from AI integration to new frameworks and tools.', 'Web development is constantly evolving, and 2024 brings exciting new trends...', 'pqCLhpqNo3hwx7xpCM5bkW7TWcyyPqN9tBIbVrRl.jpg', 1, 1, '2025-06-05', '2025-06-05 01:48:45', '2025-06-11 04:37:41'),
(2, 'The Future of Web Development: Trends to Watch in 2025', 'future-web-development-2024', 'Explore the latest trends shaping the future of web development, from AI integration to new frameworks and tools.', 'Web development is constantly evolving, and 2024 brings exciting new trends...', 'orPv5nA6YJ3c0JilFuZZYsyGZbU2WdpLSTQliBmk.jpg', 1, 1, '2025-06-05', '2025-06-05 01:48:45', '2025-06-11 04:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `full_name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
('CUS4WV0K', 4, 'Andika', 'limacastle@gmail.com', '082169806800', 'Batang Anai Street No. 9, Rimbo Kaluang Subdistrict, West Padang District', '2025-05-21 05:55:50', '2025-05-21 05:55:50'),
('CUS8TBSG', 5, 'Andika Firansyah 5', 'andikafiransyah1905@gmail.com', '0823123123123123', 'Batang Anai Street No. 9, Rimbo Kaluang Subdistrict, West Padang District', '2025-05-20 11:53:29', '2025-05-20 11:53:29'),
('CUSXMCIN', 13, 'ALdy OM LIN', 'aldy.om.lin@gmail.com', '082190908070', 'Di bukik', '2025-05-29 19:16:42', '2025-05-29 19:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_05_10_091028_create_zones_table', 1),
(4, '2025_05_12_030629_create_users_table', 1),
(5, '2025_05_12_033229_add_avatar_to_users_table', 1),
(6, '2025_05_12_055603_change_type_of_socialite_token_in_users_table', 1),
(7, '2025_05_12_153623_create_payments_table', 1),
(8, '2025_05_12_154540_create_customers_table', 1),
(9, '2025_05_12_154655_add_role_to_users_table', 1),
(10, '2025_05_12_200819_create_banners_table', 1),
(11, '2025_05_12_200941_create_packets_table', 1),
(12, '2025_05_12_201239_create_orders_table', 1),
(13, '2025_05_12_201357_add_desc_to_packets_table', 1),
(14, '2025_05_19_152726_change_type_of_customer_id_in_orders_table', 2),
(15, '2022_05_11_154250_create_datafeeds_table', 3),
(16, '2025_05_27_220907_add_fields_in_users_table', 4),
(17, '2025_06_04_122346_create_table_contents', 5),
(18, '2025_06_12_020333_create_notifications_table', 6),
(19, '2025_06_20_002157_create_zones_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('order','payment','request') NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `type`, `title`, `message`, `is_read`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 7, 'payment', 'Quos autem et.', 'Sequi eum similique officiis voluptatem nesciunt et voluptatibus. Cupiditate veniam eius odio tempora voluptates consequatur. Voluptatum illo nemo sunt veritatis.', 1, '2025-06-13 08:00:52', '2025-06-18 08:00:52', '2025-06-18 08:00:52'),
(2, 4, 'request', 'Vero optio nisi dolorem.', 'Eius recusandae mollitia praesentium voluptatem excepturi amet. Nisi quia laboriosam sunt facilis in ullam dolores.', 0, '2025-06-16 08:00:52', '2025-06-18 08:00:52', '2025-06-18 08:00:52'),
(3, 6, 'order', 'Assumenda et officiis.', 'Tempore omnis omnis incidunt rem. Est veritatis ducimus et saepe facere. Aliquam recusandae iste quia.', 1, '2025-06-16 08:00:52', '2025-06-18 08:00:52', '2025-06-18 08:00:52'),
(4, 2, 'request', 'Culpa dolor voluptatibus.', 'Quas debitis maiores dolorem natus. Asperiores et minus aut labore et nemo. Natus qui consequatur illo in pariatur dolores rerum. Nam mollitia ut ea error.', 1, '2025-06-14 08:00:52', '2025-06-18 08:00:52', '2025-06-18 08:00:52'),
(5, 4, 'payment', 'Impedit commodi officiis ipsum.', 'Quis eum autem ea dicta et eaque. At aut sapiente est ratione sed qui aut. Nesciunt aut voluptas est molestias ducimus corporis consequatur. Dolor atque fugiat temporibus tempora temporibus fuga voluptas. Dolor facere quibusdam similique omnis.', 0, '2025-06-17 08:00:52', '2025-06-18 08:00:52', '2025-06-18 08:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `installation_address` varchar(255) NOT NULL,
  `packet_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `status`, `installation_address`, `packet_id`, `created_at`, `updated_at`) VALUES
('TNQ8EFV', 5, '2025-06-12', 'pending', 'Batang Anai Street No. 9, Rimbo Kaluang Subdistrict, West Padang District', 1, '2025-06-12 11:18:32', '2025-06-12 11:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `packets`
--

CREATE TABLE `packets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bandwidth` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `desc` text DEFAULT NULL,
  `rasio` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packets`
--

INSERT INTO `packets` (`id`, `name`, `bandwidth`, `price`, `desc`, `rasio`, `created_at`, `updated_at`) VALUES
(1, 'Family', 10, 288000, 'Sempurna untuk keluarga kecil dengan kebutuhan internet dasar seperti browsing dan streaming.', '1:8', NULL, NULL),
(2, 'Office', 10, 312000, 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.', '1:4', NULL, NULL),
(3, 'Internet Kerja', 10, 1000000, 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.', '1:1', NULL, NULL),
(5, 'Office', 20, 624000, 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.', '1:4', NULL, NULL),
(6, 'Dedicated', 20, 2000000, 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.', '1:1', NULL, NULL),
(8, 'Office', 30, 936000, 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.', '1:4', NULL, NULL),
(9, 'Dedicated', 30, 3000000, 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.', '1:1', NULL, NULL),
(11, 'Office', 40, 1248000, 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.', '1:4', NULL, NULL),
(12, 'Dedicated', 40, 4000000, 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.', '1:1', NULL, NULL),
(14, 'Office', 50, 1560000, 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.', '1:4', NULL, NULL),
(15, 'Dedicated', 50, 5000000, 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.', '1:1', NULL, NULL),
(17, 'Office', 60, 1872000, 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.', '1:4', NULL, NULL),
(18, 'Dedicated', 60, 6000000, 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.', '1:1', NULL, NULL),
(19, 'Family', 70, 2016000, 'Sempurna untuk keluarga kecil dengan kebutuhan internet dasar seperti browsing dan streaming.', '1:8', NULL, NULL),
(20, 'Office', 70, 2184000, 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.', '1:4', NULL, NULL),
(21, 'Dedicated', 70, 7000000, 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.', '1:1', NULL, NULL),
(22, 'Family', 80, 2304000, 'Sempurna untuk keluarga kecil dengan kebutuhan internet dasar seperti browsing dan streaming.', '1:8', NULL, NULL),
(23, 'Office', 80, 2496000, 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.', '1:4', NULL, NULL),
(24, 'Dedicated', 80, 8000000, 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.', '1:1', NULL, NULL),
(25, 'Family', 90, 2592000, 'Sempurna untuk keluarga kecil dengan kebutuhan internet dasar seperti browsing dan streaming.', '1:8', NULL, NULL),
(26, 'Office', 90, 2808000, 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.', '1:4', NULL, NULL),
(27, 'Dedicated', 90, 9000000, 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.', '1:1', NULL, NULL),
(28, 'Family', 100, 2880000, 'Sempurna untuk keluarga kecil dengan kebutuhan internet dasar seperti browsing dan streaming.', '1:8', NULL, NULL),
(29, 'Office', 100, 3120000, 'Dirancang untuk bisnis kecil hingga menengah dengan banyak pengguna dan perangkat.', '1:4', NULL, NULL),
(30, 'Dedicated', 100, 10000000, 'Koneksi khusus tingkat perusahaan dengan jaminan uptime dan dukungan prioritas.', '1:1', NULL, NULL),
(31, 'Family', 20, 200000, 'Anjay', '1:8', '2025-05-30 10:19:27', '2025-05-30 10:19:27'),
(32, 'Family', 40, 4000000, 'anjay mabar', '1:8', '2025-05-30 10:20:08', '2025-05-30 10:20:08'),
(33, 'Family', 30, 1000000, 'oke deng', '1:8', '2025-05-30 10:25:59', '2025-05-30 10:25:59'),
(34, 'Family', 50, 6000000, 'Kolor', '1:8', '2025-05-30 10:59:58', '2025-05-30 10:59:58'),
(35, 'Family', 60, 800000, 'okee', '1:8', '2025-05-31 07:45:18', '2025-05-31 07:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('andikafiransyah@gmail.com', '$2y$12$FKjMQvIkAkMtxFigGK7dpu62Umk9XWwNlZnTf9KXzl4GXuVyHnMGu', '2025-05-29 17:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `transcation_reference` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_date`, `amount`, `payment_method`, `payment_status`, `transcation_reference`, `created_at`, `updated_at`) VALUES
('Pay5b4f9', 'TN4BA5Y', '2025-06-17', 100000.00, 'Bank', 'success', 'vkpiPMMc1gsdpU0UzLOepIxXFdfSnFxGs8fV1huR.jpg', '2025-06-04 04:46:39', '2025-06-04 04:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SekNCsaVQhe2bf9HxJq9YMpzsVbwaukD5rWSfKTr', 5, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWFZId2dHQmZzZURRekJ1RHhHQlRON2NBNkU1RzVWZWZlemZIaXhGNSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1750360348);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `avatar` varchar(255) DEFAULT NULL,
  `socialite_id` varchar(255) DEFAULT NULL,
  `socialite_token` longtext DEFAULT NULL,
  `socialite_refresh_token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `address`, `email_verified_at`, `password`, `role`, `avatar`, `socialite_id`, `socialite_token`, `socialite_refresh_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'transnet', 'transnet@gmail.com', NULL, NULL, NULL, '$2y$12$/gD9wC31ogy0UVCZOXartuo84uDPRfalmdHDEPtFr3cQOiOjnSdkG', 'customer', 'https://ui-avatars.com/api/?name=transnet&background=random&color=fff&size=128', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'transnetsumbar', 'transnetsumbar@gmail.com', NULL, NULL, NULL, '$2y$12$9CwDyP/VWtY9NNJ1m0bvTOhBfuCFn4DaeE8y78pzugpGse1E9QF4G', 'admin', 'https://ui-avatars.com/api/?name=transnetsumbar&background=random&color=fff&size=128', NULL, NULL, NULL, NULL, '2025-05-27 17:01:56', '2025-06-19 02:15:29'),
(3, 'marketing', 'transnetmarketing@gmail.com', NULL, NULL, NULL, '$2y$12$oJEo3FjCaEpoB9op1pH6beTQzv58lGTZ3WedMTQapRaa9flkmIBMK', 'marketing', 'https://ui-avatars.com/api/?name=marketing&background=random&color=fff&size=128', NULL, NULL, NULL, NULL, '2025-05-27 17:02:02', NULL),
(4, 'Andika', 'limacastle@gmail.com', NULL, NULL, NULL, '$2y$12$gDY.aqEIJYfuMkaiAo8Ev.PO4nZqHPk4iWKTnDWZKddbsnsPuZ5zW', 'customer', 'https://lh3.googleusercontent.com/a/ACg8ocLPd5_qEakcQv8dvOiJfOcvtMalMv1JiBj6gT6V8IVw2qiBQ1I=s96-c', '102696651449371847249', 'ya29.a0AW4Xtxhq8u1pciPshA_C4PIyRGMVypWrDnI96zs4B_kgRZl2L2xp_jfDuhU8jgwf2FePvAzNNiu3MAlrIKkxhSOfaeGQS1BKaU1dmkErucGPO01XHHxFj6RuVMu40nRXa9coXn61iym8Nc2WJqnCspQsZVeVf5KcJ4ss8w-rxgaCgYKAeMSARYSFQHGX2Mi4qo4wsjArZCtUw28FUZZvg0177', NULL, NULL, '2025-05-17 09:40:33', '2025-05-17 09:40:33'),
(5, 'Andika Firansyah', 'andikafiransyah1905@gmail.com', '-', '-', NULL, '$2y$12$9ncbZUA7fT62FuvVySTvVOPNOU5OCQPafw1wWaouwIdUwMZnqsIgG', 'customer', 'https://lh3.googleusercontent.com/a/ACg8ocLJFZTZOKqxyz7JsSV8K8JNtyMKugPFloYPCtEoWOfEcpzU_GZN=s96-c', '104923517099955748015', 'ya29.a0AW4Xtxib2XCEnIn45NB6HcIwnziTcSWJrc6BVb5UFZEDf20ItS-4XsHuN7ot5gwHx_0WRqPfi_WYCMfRgv9-2rBOhoORt1G4xW2_wEFrlzrL7P-lewRU-LmbTWEatBd3S9HDB5Cxdek-YPWnonRynMHPf5QDiFpGzpSHRPKkjQaCgYKAQcSARISFQHGX2MimBtldnWEkhicc0b9ELQAYw0177', NULL, NULL, '2025-05-18 18:23:49', '2025-06-19 18:20:38'),
(6, 'Aldo', 'aldoerianda@gmail.com', NULL, NULL, NULL, '$2y$12$r6.gYZp8iqObzHfd7b3kwOrHfl1ccmukxP3tMzk.SIefUl4CSzUy.', 'customer', 'https://ui-avatars.com/api/?name=Aldo&background=random&color=fff&size=128', NULL, NULL, NULL, NULL, '2025-05-20 08:26:30', '2025-05-20 08:26:30'),
(7, 'Triyan Eka Putra', 'triyanekamahaputra', NULL, NULL, NULL, '$2y$12$hLdcAhR66KY4bewQ5KGduuIBkvhChJsjtgAEEW/LhsFA00N3nEhiO', 'customer', 'https://ui-avatars.com/api/?name=Triyan Eka Putra&background=random&color=fff&size=128', NULL, NULL, NULL, NULL, '2025-05-21 07:25:49', '2025-05-21 07:25:49'),
(8, 'Andika Firansyah', 'andikafiransyah@gmail.com', NULL, NULL, NULL, '$2y$12$1J7RsK1UyUAObJT0oieHs.u9v0v0CHHo.ODS76prdwQVU2f9DW5ga', 'customer', NULL, NULL, NULL, NULL, NULL, '2025-05-23 12:37:09', '2025-05-23 12:37:09'),
(9, 'Dream On', 'ka@gmail.com', NULL, NULL, NULL, '$2y$12$DUFLwkFPNE9LQDSKLA49cu8Nq/sKW8Gsfwf4ysbxVTWutKtSld.QO', 'marketing', 'TdnS9ETY84aUkTNWcgpmZe8cSYwFXhIZhZ33rdlv.jpg', NULL, NULL, NULL, NULL, '2025-05-27 17:26:28', '2025-06-19 02:16:32'),
(13, 'Aldy Saja', 'aldy.om.lin@gmail.com', '-', '-', NULL, '$2y$12$ccUBdB1eg3tSC8I81FGCCu1o4AZh2a6D/.5OBVTwnzh/snU5urqrK', 'customer', 'https://lh3.googleusercontent.com/a/ACg8ocKUbzFMDbM2-cGNNDhxswsxuYqNI8xLG8lfjI-8MNvjcJwvJA=s96-c', '109677131322495310918', 'ya29.a0AW4XtxgCfkUSYNruNOq9C8daJ8TMuK-sNt7wIEKa0l4irYUQI-698PE7utEMZsuefoO20kYqTpppIAFg2_auoTjnCqJcMW9z5jF6fS36ILIpjkUyeQ1EBcOraTz1zLF8KhYaQ_LzfGYyBSsJ3kSn_6IfhVKuYnf-iTattl0taCgYKAZoSARQSFQHGX2MiPYrspT8TQGK1z7ayrBpUog0175', NULL, NULL, '2025-05-29 19:00:16', '2025-05-29 19:33:34'),
(14, 'asep ganteng', 'asepganteng@gmail.com', NULL, NULL, NULL, '$2y$12$VC/DsdbJ8feiXfLg0ku3I.03ma2J1JFnls.b1fjCnC8V6TofI.K/q', 'customer', 'https://ui-avatars.com/api/?name=asep ganteng&background=random&color=fff&size=128', NULL, NULL, NULL, NULL, '2025-06-16 07:21:41', '2025-06-16 07:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('kecamatan','kelurahan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `nama`, `parent_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Padang Barat', NULL, 'kecamatan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(2, 'Belakang Tangsi', 1, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(3, 'Berok Nipah', 1, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(4, 'Flamboyan Baru', 1, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(5, 'Kampung Jao', 1, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(6, 'Kampung Pondok', 1, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(7, 'Purus', 1, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(8, 'Rimbo Kaluang', 1, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(9, 'Ujung Gurun', 1, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(10, 'Padang Timur', NULL, 'kecamatan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(11, 'Simpang Haru', 10, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(12, 'Sawahan', 10, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(13, 'Sawahan Timur', 10, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(14, 'Jati', 10, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(15, 'Padang Utara', NULL, 'kecamatan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(16, 'Alai Parak Kopi', 15, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(17, 'Gunung Pangilun', 15, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(18, 'Lolong Belanti', 15, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(19, 'Ulak Karang Selatan', 15, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57'),
(20, 'Ulak Karang Utara', 15, 'kelurahan', '2025-06-19 17:41:57', '2025-06-19 17:41:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_contents_title_unique` (`title`),
  ADD KEY `table_contents_user_id_foreign` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_packet_id_foreign` (`packet_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `packets`
--
ALTER TABLE `packets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_parent_id_foreign` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packets`
--
ALTER TABLE `packets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `table_contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_packet_id_foreign` FOREIGN KEY (`packet_id`) REFERENCES `packets` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
