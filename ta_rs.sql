-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 09:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `name`, `date_of_birth`, `phone`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Me Gilang R', '1999-12-30', '085759082377', 'Everywhere I Life Still Play League of Legend !', NULL, '2020-03-02 12:15:53', '2020-03-02 12:15:53'),
(2, 2, 'Maesaraga Kelana', '2002-11-24', '082125648834', 'Cikiray', NULL, '2020-03-02 12:15:53', '2020-03-02 12:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `check_ups`
--

CREATE TABLE `check_ups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `check_date` date NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `check_up_id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `nip`, `name`, `service_id`, `date_of_birth`, `phone`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(1, 7, '128937189237', 'Maxiliano', 5, '1998-12-09', '083818380220', 'Sukabumi', NULL, '2020-03-02 12:28:32', '2020-03-02 12:28:32'),
(2, 10, '12387981273', 'Raga surisky', 5, '2000-02-11', '083245567856', 'Cijangkar', NULL, '2020-03-02 12:35:05', '2020-03-02 12:35:05'),
(3, 11, '182937981723', 'Widnu adetya', 1, '1999-08-11', '083245678901', 'Gading Regency', NULL, '2020-03-02 12:38:00', '2020-03-02 12:38:00'),
(4, 12, '1278937198271', 'Asri Sulastri', 1, '1999-07-17', '0811115890', 'Benteng Kidul', NULL, '2020-03-02 12:39:13', '2020-03-02 12:39:13'),
(5, 13, '111111111111111111', 'Rangga arep', 2, '1999-12-02', '087897675643', 'Mangkalaya', NULL, '2020-03-02 12:40:42', '2020-03-02 12:40:42'),
(6, 14, '2222222222222222', 'Jessica Wulandari', 2, '1996-07-17', '02132453345', 'Database', NULL, '2020-03-02 12:42:13', '2020-03-02 12:42:13'),
(7, 15, '3333333333333333', 'Diah Pramesti Langensari', 3, '2000-05-19', '081534567893', 'Karang tengah Cibadak', NULL, '2020-03-02 12:44:29', '2020-03-02 12:44:29'),
(8, 16, '44444444444444444', 'Ryan brian', 3, '1990-12-03', '084534567891', 'American', NULL, '2020-03-02 12:47:17', '2020-03-02 12:47:17'),
(9, 17, '555555555555', 'Joji iseng', 4, '1999-12-08', '087656457654', 'Database', NULL, '2020-03-02 12:48:27', '2020-03-02 12:48:27'),
(10, 19, '666666666666666', 'Jamrud', 4, '1999-12-13', '087676767676', 'Khayangan', NULL, '2020-03-02 12:52:52', '2020-03-02 12:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_09_12_000000_create_permission_tables', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2020_02_21_103725_create_admins_table', 1),
(5, '2020_02_21_104043_create_services_table', 1),
(6, '2020_02_21_110932_create_doctors_table', 1),
(7, '2020_02_22_120224_create_patients_table', 1),
(8, '2020_02_24_063349_create_registrations_table', 1),
(9, '2020_02_24_082901_create_operators_table', 1),
(10, '2020_02_25_042937_create_waiting_lists_table', 1),
(11, '2020_02_25_060315_create_check_ups_table', 1),
(12, '2020_02_25_060611_create_diagnoses_table', 1),
(13, '2020_02_25_061027_create_prescriptions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2),
(2, 'App\\User', 7),
(2, 'App\\User', 10),
(2, 'App\\User', 11),
(2, 'App\\User', 12),
(2, 'App\\User', 13),
(2, 'App\\User', 14),
(2, 'App\\User', 15),
(2, 'App\\User', 16),
(2, 'App\\User', 17),
(2, 'App\\User', 18),
(2, 'App\\User', 19),
(3, 'App\\User', 8),
(3, 'App\\User', 9),
(3, 'App\\User', 20),
(4, 'App\\User', 5),
(4, 'App\\User', 6),
(4, 'App\\User', 21),
(4, 'App\\User', 22);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `user_id`, `nip`, `name`, `date_of_birth`, `phone`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(1, 8, '1238120938445', 'Reza Oktovian', '1997-01-02', '081532455678', 'Ciaul', NULL, '2020-03-02 12:31:22', '2020-03-02 12:31:22'),
(2, 9, '290482340213423', 'Arap arapan', '1993-09-18', '087887787878', 'Cibadak', NULL, '2020-03-02 12:33:46', '2020-03-02 12:33:46'),
(3, 20, '098999999999999', 'Lord Garox', '1999-03-12', '087654321345', 'Langit', NULL, '2020-03-02 12:58:15', '2020-03-02 12:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `nik`, `name`, `date_of_birth`, `phone`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(1, 5, '129380109238', 'Pasien Pertama', '1992-12-02', '0811115890', 'From Kesakitan', NULL, '2020-03-02 12:15:54', '2020-03-02 12:15:54'),
(2, 6, '129038102938', 'Pasien Kedua', '1992-12-02', '0811115890', 'From Kesakitan', NULL, '2020-03-02 12:15:54', '2020-03-02 12:15:54'),
(3, 21, '12938019283', 'Maesssss', '2000-03-02', '082125648834', 'Sukabumi cisaat', NULL, '2020-03-02 13:03:38', '2020-03-02 13:03:38'),
(4, 22, '1298739182', 'Masaeee', '2000-08-19', '08215678678', 'From Database', NULL, '2020-03-02 13:07:20', '2020-03-02 13:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `check_up_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rules` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regist_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-03-02 12:15:52', '2020-03-02 12:15:52'),
(2, 'dokter', 'web', '2020-03-02 12:15:52', '2020-03-02 12:15:52'),
(3, 'operator', 'web', '2020-03-02 12:15:52', '2020-03-02 12:15:52'),
(4, 'pasien', 'web', '2020-03-02 12:15:52', '2020-03-02 12:15:52'),
(5, 'suster', 'web', '2020-03-02 12:24:44', '2020-03-02 12:24:44');

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Poli Gigi', 'Spesialis Gigi', '2020-03-02 12:15:53', '2020-03-02 12:15:53'),
(2, 'Poli Penyakit Dalam', 'Spesialis Daleman', '2020-03-02 12:15:53', '2020-03-02 12:15:53'),
(3, 'Poli THT', 'Spesialis Telinga Hidung Tenggorokan', '2020-03-02 12:15:53', '2020-03-02 12:15:53'),
(4, 'Poli Anak', 'Spesialis Anak', '2020-03-02 12:15:53', '2020-03-02 12:15:53'),
(5, 'Poli Kulit', 'Spesialis Kulit', '2020-03-02 12:25:57', '2020-03-02 12:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'megilangr1@gmail.com', NULL, '$2y$10$p5ezcq2V9pSGDa7mKYpLz.XUx8tTHIeGrCS8nMyrc7WNIxb/zuUCS', NULL, '2020-03-02 12:15:53', '2020-03-02 12:15:53'),
(2, 'menazoru@gmail.com', NULL, '$2y$10$ulGP2SF1L43NZ3/KgTO/KeA0.KLxbVXdCPHRGFBDCqN3q93nCpZgu', NULL, '2020-03-02 12:15:53', '2020-03-02 12:15:53'),
(5, 'pasien1@gmail.com', '2020-03-01 17:00:00', '$2y$10$YaoxqYU74bhAqjW93XPDc.qVtkWbHw27P6XvA2MX6x7GXgk4zfzFC', NULL, '2020-03-02 12:15:54', '2020-03-02 12:15:54'),
(6, 'pasien2@gmail.com', '2020-03-01 17:00:00', '$2y$10$WsRje4mxysYseKX/haBiNevRQpJBcgBQaCl9JrbpgOeeZ00ShGDVW', NULL, '2020-03-02 12:15:54', '2020-03-02 12:15:54'),
(7, 'max@gmail.com', NULL, '$2y$10$bpN9dov.QfsPn1IkBtO8aeE0XFMhs.Qb0pnDZEGfn7qH/cIx.m0v.', 'vp8H4J7cfrhWFpR4aEgnXUU1ZUQRgJameWu0Zwx2uf32UrnXJPm3ZgBj8zCf', '2020-03-02 12:28:32', '2020-03-02 12:28:32'),
(8, 'eza@gmail.com', NULL, '$2y$10$p/tT7c6ZH89KWlj5PDLBEOaMPuQY85J95dpG2zSDyTIFHBDB2A.0m', NULL, '2020-03-02 12:31:22', '2020-03-02 12:31:22'),
(9, 'arap@gmail.com', NULL, '$2y$10$zUZt9jkdTZc3H/ZZcR.OkeG47XF/GAGukNUnNvi8Dqm/ih6UA3Mfy', NULL, '2020-03-02 12:33:46', '2020-03-02 12:33:46'),
(10, 'raga@gmail.com', NULL, '$2y$10$bUuM1PviXJs8aeADyS8GhuW/xwKzgtADXEWiI3JAVsfs1UJYp2ztu', NULL, '2020-03-02 12:35:05', '2020-03-02 12:35:05'),
(11, 'adet@gmail.com', NULL, '$2y$10$aaNb1CX8J0N8YsF9G0t7ZOhOYGxxoXW49tlspZss1k5Qdrq.UvwW2', NULL, '2020-03-02 12:38:00', '2020-03-02 12:38:00'),
(12, 'asri@gmail.com', NULL, '$2y$10$OVCn82TRCP3cHtZEO2cZj.IaOQMWBkMwRyHAxMUNPu6T36HKhFVvO', NULL, '2020-03-02 12:39:13', '2020-03-02 12:39:13'),
(13, 'rangga@gmail.com', NULL, '$2y$10$Pxbz.PK0IDR/SAwSZeShUuwL.xPmTjIbBkYhcGrLQg66Q0dhZutd.', NULL, '2020-03-02 12:40:42', '2020-03-02 12:40:42'),
(14, 'jess@gmail.com', NULL, '$2y$10$X/fiPffkYyYKUZ/ElBfh2O6vackpojBTWHtvxhV04qt/VDDzT5E6u', NULL, '2020-03-02 12:42:12', '2020-03-02 12:42:12'),
(15, 'pramesti@gmail.com', NULL, '$2y$10$SnLthLJjQSSwvfeMyjBpWuWT7/fiJ9XxzsP1urKBsxyCbhv0L48vC', NULL, '2020-03-02 12:44:29', '2020-03-02 12:44:29'),
(16, 'ryan@gmail.com', NULL, '$2y$10$Rt8HoFVYQAkcZMnF.KhjhOVKC0LyD46oNchvqSmbotnrzgHvKuY0C', NULL, '2020-03-02 12:47:17', '2020-03-02 12:47:17'),
(17, 'joji@gmail.com', NULL, '$2y$10$ETAcJtYSdC4olJxNuycqpe55bvbwwNym7FguXQxQDOzdvJgu1aBCG', NULL, '2020-03-02 12:48:27', '2020-03-02 12:48:27'),
(19, 'jamrud@gmail.com', NULL, '$2y$10$bMwPzTwbCnITkMiZ1Bu52umIXCxDGWiIh9PsBmJ4/q1S81eveT8sW', NULL, '2020-03-02 12:52:52', '2020-03-02 12:52:52'),
(20, 'lord@gmail.com', NULL, '$2y$10$Hv7utOuXqN0BKJdWuXF6..tIkvnOBHBIyZFyixebRSx4sYl2D3b8O', NULL, '2020-03-02 12:58:15', '2020-03-02 12:58:15'),
(21, 'maes@gmail.com', NULL, '$2y$10$TuSgoCmN1mZz3H0OTXJst.NxepyTMEIN4Xs0ZIqWVfWbGCgbgiRjW', 'nlhHMVugN97vgN1qvkv2qrEwi3h85FRpYorjB05ZUai8ElWJk2w5H6hK4QVS', '2020-03-02 13:03:38', '2020-03-02 13:03:38'),
(22, 'masae@gmail.com', NULL, '$2y$10$i5tBcz9ucxsJ1x5POUtDkeVl3uetZZAwACz.uApjofcu5BraqTEeu', 'dABTJSLGFCfYYQCZ68Uqh57dC8cbItg5U5HqB4fN8Kinpl54VBVhopMFtiGY', '2020-03-02 13:07:20', '2020-03-02 13:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `waiting_lists`
--

CREATE TABLE `waiting_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `check_ups`
--
ALTER TABLE `check_ups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_ups_patient_id_foreign` (`patient_id`),
  ADD KEY `check_ups_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnoses_check_up_id_foreign` (`check_up_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_nip_unique` (`nip`),
  ADD KEY `doctors_user_id_foreign` (`user_id`),
  ADD KEY `doctors_service_id_foreign` (`service_id`);

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
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `operators_nip_unique` (`nip`),
  ADD KEY `operators_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_nik_unique` (`nik`),
  ADD KEY `patients_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_check_up_id_foreign` (`check_up_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrations_patient_id_foreign` (`patient_id`),
  ADD KEY `registrations_service_id_foreign` (`service_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `waiting_lists`
--
ALTER TABLE `waiting_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `waiting_lists_patient_id_foreign` (`patient_id`),
  ADD KEY `waiting_lists_service_id_foreign` (`service_id`),
  ADD KEY `waiting_lists_doctor_id_foreign` (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `check_ups`
--
ALTER TABLE `check_ups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `waiting_lists`
--
ALTER TABLE `waiting_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `check_ups`
--
ALTER TABLE `check_ups`
  ADD CONSTRAINT `check_ups_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `check_ups_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD CONSTRAINT `diagnoses_check_up_id_foreign` FOREIGN KEY (`check_up_id`) REFERENCES `check_ups` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `operators`
--
ALTER TABLE `operators`
  ADD CONSTRAINT `operators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_check_up_id_foreign` FOREIGN KEY (`check_up_id`) REFERENCES `check_ups` (`id`);

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `registrations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `waiting_lists`
--
ALTER TABLE `waiting_lists`
  ADD CONSTRAINT `waiting_lists_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `waiting_lists_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `waiting_lists_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
