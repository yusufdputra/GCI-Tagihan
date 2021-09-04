-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 06:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gci_tagihan`
--

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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2021_03_28_075716_create_permission_tables', 1),
(21, '2021_08_31_140143_create_semesters_table', 2),
(22, '2021_08_31_141622_create_tagihans_table', 3),
(23, '2021_08_31_153038_create_pembayarans_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2);

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
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mahasiswa` bigint(20) UNSIGNED NOT NULL,
  `id_tagihan` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `id_mahasiswa`, `id_tagihan`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 3, 8, 0, '2021-08-31 09:03:28', '2021-09-02 02:31:34', '2021-09-02 02:31:34'),
(5, 4, 8, 1, '2021-08-31 09:03:28', '2021-09-02 02:31:34', '2021-09-02 02:31:34'),
(6, 3, 9, 1, '2021-08-31 09:04:15', '2021-08-31 09:22:45', NULL),
(7, 4, 9, 0, '2021-08-31 09:04:15', NULL, NULL),
(8, 3, 10, 1, '2021-09-01 02:56:21', '2021-09-04 03:22:55', NULL),
(9, 4, 10, 1, '2021-09-01 02:56:21', '2021-09-01 02:59:14', NULL),
(10, 3, 11, 1, '2021-09-01 03:15:06', '2021-09-01 03:16:06', '2021-09-02 02:31:11'),
(11, 4, 11, 0, '2021-09-01 03:15:06', NULL, '2021-09-02 02:31:12'),
(12, 3, 12, 1, '2021-09-02 02:18:30', '2021-09-02 02:27:44', NULL),
(13, 4, 12, 0, '2021-09-02 02:18:30', NULL, NULL),
(14, 3, 13, 0, '2021-09-04 02:58:34', '2021-09-04 02:59:30', '2021-09-04 02:59:30'),
(15, 4, 13, 0, '2021-09-04 02:58:34', '2021-09-04 02:59:30', '2021-09-04 02:59:30'),
(16, 3, 14, 1, '2021-09-04 03:21:40', '2021-09-04 03:44:22', NULL),
(17, 4, 14, 0, '2021-09-04 03:21:40', NULL, NULL),
(18, 3, 15, 1, '2021-09-04 03:27:53', '2021-09-04 03:28:38', NULL),
(19, 4, 15, 0, '2021-09-04 03:27:53', NULL, NULL),
(20, 3, 16, 0, '2021-09-04 03:43:32', '2021-09-04 03:43:44', '2021-09-04 03:43:44'),
(21, 4, 16, 0, '2021-09-04 03:43:32', '2021-09-04 03:43:44', '2021-09-04 03:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'mahasiswa', 'web', '2021-08-31 06:53:09', '2021-08-31 06:53:09'),
(2, 'bendahara', 'web', '2021-08-31 06:53:09', '2021-08-31 06:53:09'),
(3, 'pimpinan', 'web', '2021-08-31 06:53:09', '2021-08-31 06:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` int(11) NOT NULL DEFAULT 0,
  `tahun_ajar` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `nama`, `tahun_ajar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2021, '2021-08-31 07:14:44', '2021-09-02 01:27:06', NULL),
(2, 2, 2021, '2021-08-31 07:14:44', '2021-09-02 02:23:44', '2021-09-02 02:23:44'),
(3, 3, 2022, '2021-08-31 07:14:44', NULL, NULL),
(4, 4, 2022, '2021-08-31 07:14:44', '2021-09-04 03:33:22', '2021-09-04 03:33:22'),
(5, 5, 2023, '2021-09-02 01:12:47', '2021-09-02 02:23:20', '2021-09-02 02:23:20'),
(6, 2, 2022, '2021-09-02 02:24:00', NULL, NULL),
(7, 6, 2023, '2021-09-04 03:17:49', '2021-09-04 03:21:17', '2021-09-04 03:21:17'),
(8, 5, 2022, '2021-09-04 03:27:29', '2021-09-04 03:27:37', '2021-09-04 03:27:37'),
(9, 5, 2023, '2021-09-04 03:43:14', '2021-09-04 03:43:22', '2021-09-04 03:43:22'),
(10, 8, 2024, '2021-09-04 03:47:05', '2021-09-04 03:50:09', '2021-09-04 03:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `tagihans`
--

CREATE TABLE `tagihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_semester` bigint(20) UNSIGNED NOT NULL,
  `nama_tagihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bayar` float NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihans`
--

INSERT INTO `tagihans` (`id`, `id_semester`, `nama_tagihan`, `jumlah_bayar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, 'SPP', 200000, '2021-08-31 09:03:28', '2021-09-02 02:31:34', '2021-09-02 02:31:34'),
(9, 1, 'Uang Sosial', 600000, '2021-08-31 09:04:15', NULL, NULL),
(10, 1, 'Uang Kontribusi', 200000, '2021-09-01 02:56:21', '2021-09-04 02:56:13', NULL),
(11, 2, 'Uang Kontribusi', 10000, '2021-09-01 03:15:05', '2021-09-02 02:12:25', '2021-09-02 02:12:25'),
(12, 6, 'Uang Kontribusi', 200000, '2021-09-02 02:18:30', '2021-09-02 02:38:47', NULL),
(13, 1, 'SPP', 333333, '2021-09-04 02:58:34', '2021-09-04 02:59:30', '2021-09-04 02:59:30'),
(14, 3, 'Uang Sosial', 400000, '2021-09-04 03:21:40', NULL, NULL),
(15, 4, 'Uang Kontribusi', 60000, '2021-09-04 03:27:53', NULL, NULL),
(16, 3, 'Uang Kontribusi', 90000, '2021-09-04 03:43:32', '2021-09-04 03:43:44', '2021-09-04 03:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bendahara', 'Bendahara', '$2y$10$jx6bWA6zN8.pj9CydNJhnuEPFKUF4nTpMJ8zYUK1BgmkpnHVu9cY.', '2021-08-31 06:53:09', '2021-08-31 06:53:09', NULL),
(2, 'Pimpinan', 'Pimpinan', '$2y$10$wL1jF6qePn0lYSKGg99OFOCS03nKKMDIIt/iht0sHGFdR2YlBs1Gq', '2021-08-31 06:53:09', '2021-08-31 06:53:09', NULL),
(3, 'mahasiswa', 'mahasiswa1', '$2y$10$60uDYplR5QV67Bm3hTMDCOwQJDL7Myb78/JVByJa./a1XKfv4r/jK', '2021-08-31 06:53:09', '2021-08-31 06:53:09', NULL),
(4, 'mahasiswa2', 'mahasiswa2', '$2y$10$60uDYplR5QV67Bm3hTMDCOwQJDL7Myb78/JVByJa./a1XKfv4r/jK', '2021-08-31 06:53:09', '2021-08-31 06:53:09', NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pembayarans_users` (`id_mahasiswa`),
  ADD KEY `FK_pembayarans_tagihans` (`id_tagihan`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihans`
--
ALTER TABLE `tagihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tagihans_semesters` (`id_semester`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tagihans`
--
ALTER TABLE `tagihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `FK_pembayarans_tagihans` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihans` (`id`),
  ADD CONSTRAINT `FK_pembayarans_users` FOREIGN KEY (`id_mahasiswa`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tagihans`
--
ALTER TABLE `tagihans`
  ADD CONSTRAINT `FK_tagihans_semesters` FOREIGN KEY (`id_semester`) REFERENCES `semesters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
