-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 11:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `month` date NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `student_id`, `month`, `attachment`, `paid_at`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-07-04', 'bukti_bayar/bukti_7', '2022-05-04 10:26:21', '2022-05-04 10:26:21', '2022-05-04 10:26:21'),
(2, 2, '2022-08-04', 'bukti_bayar/bukti_8', '2022-05-04 10:26:21', '2022-05-04 10:26:21', '2022-05-04 10:26:21'),
(3, 2, '2022-07-04', 'bukti_bayar/bukti_7', '2022-05-04 10:28:25', '2022-05-04 10:28:25', '2022-05-04 10:28:25'),
(4, 2, '2022-10-04', 'bukti_bayar/bukti_10', '2022-05-04 10:34:37', '2022-05-04 10:34:37', '2022-05-04 10:34:37'),
(5, 2, '2022-09-04', 'bukti_bayar/bukti_9', '2022-05-04 10:36:51', '2022-05-04 10:36:51', '2022-05-04 10:36:51'),
(6, 2, '2022-07-07', 'bukti_bayar/bukti_7', '2022-05-07 00:02:47', '2022-05-07 00:02:47', '2022-05-07 00:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `master_classes`
--

CREATE TABLE `master_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wali_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_classes`
--

INSERT INTO `master_classes` (`id`, `name`, `wali_name`, `created_at`, `updated_at`) VALUES
(1, 'X-1', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(2, 'X-2', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(3, 'X-3', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(4, 'X-4', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(5, 'X-5', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(6, 'X-6', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(7, 'X-7', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(8, 'X-8', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(9, 'XI MIA-1', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(10, 'XI IIS-1', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(11, 'XI MIA-2', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(12, 'XI IIS-2', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(13, 'XI MIA-3', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(14, 'XI IIS-3', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(15, 'XII MIA-1', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(16, 'XII IIS-1', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(17, 'XII MIA-2', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(18, 'XII IIS-2', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(19, 'XII MIA-3', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(20, 'XII IIS-3', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(21, 'XII MIA-4', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55'),
(22, 'XII IIS-4', '-', '2022-04-26 08:33:55', '2022-04-26 08:33:55');

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_04_22_145222_create_students_table', 1),
(4, '2022_04_22_145436_create_kelas_table', 1),
(5, '2022_04_22_145453_create_wali_kelas_table', 1),
(6, '2022_04_26_151442_create_master_classes_table', 1),
(8, '2022_04_27_164110_create_bills_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_year` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nis`, `nisn`, `name`, `gender`, `religion`, `phone`, `master_class_id`, `created_at`, `updated_at`, `school_year`) VALUES
(2, '101080808080', '101080808080', 'Todd Gamble', 'male', 'hindu', '+1 (179) 325-5036', 11, '2022-04-26 08:52:01', '2022-05-07 00:35:28', 2022),
(3, 'Voluptatem consequa', 'Nemo hic quis et lab', 'Madison Willis', 'female', 'konghutchu', '+1 (766) 828-4726', 19, '2022-04-26 08:57:55', '2022-05-07 00:00:45', 2022),
(4, 'Ut ut ea quia occaec', 'Nemo deserunt distin', 'Cullen Hicks', 'male', 'budha', '+1 (151) 651-4096', 11, '2022-04-26 08:58:00', '2022-05-07 00:00:48', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Super Admin', NULL, '2022-04-26 08:19:53', '2022-04-26 08:19:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_classes`
--
ALTER TABLE `master_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `master_classes_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_index` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_classes`
--
ALTER TABLE `master_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
