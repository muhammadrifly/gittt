-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2020 at 07:27 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_calonanggota`
--

CREATE TABLE `data_calonanggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_calonanggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_calonanggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telp` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_calonanggota`
--

INSERT INTO `data_calonanggota` (`id`, `nim`, `nama_calonanggota`, `jurusan`, `email_calonanggota`, `nomor_telp`, `password`, `created_at`, `updated_at`) VALUES
(4, 187629730, 'musbihin', 'Teknik Informatika', 'musbihin@gmail.com', '098876565567', 'admin', '2020-07-12 18:42:04', '2020-07-12 18:42:04'),
(5, 122339483, 'fahmi syahrul', 'Teknik Komputer', 'sasas@gmail.com', '0892479284739', 'dimanadai', '2020-07-12 18:43:55', '2020-07-12 18:43:55'),
(6, 12345678, 'Hassan F.Hidayat', 'komputerisasi akuntansi', 'mail@mail.com', '098765432123', '12345678', '2020-07-18 03:27:08', '2020-07-18 03:27:08'),
(7, 568353985, 'nururri aji maruf', 'komputerisasi akuntansi', 'nurrain@gmail.com', '0987673546534', 'diapa aja', '2020-07-19 05:04:34', '2020-07-19 05:04:34'),
(8, 793845983, 'hena sendy', 'Sistem Informasi', 'hanasend@gmail.com', '0987673546746', 'ndfghdty', '2020-07-19 05:09:44', '2020-07-19 05:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `dept_keanggotaan`
--

CREATE TABLE `dept_keanggotaan` (
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NRA_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telp` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persentase` double(8,2) NOT NULL,
  `secondary_factor` double(8,2) NOT NULL,
  `core_factor` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id_kriteria`, `nama_kriteria`, `persentase`, `secondary_factor`, `core_factor`, `created_at`, `updated_at`) VALUES
(7, 'Latihan Kader 1', 0.30, 0.40, 0.60, '2020-07-12 18:51:41', '2020-07-12 18:52:32'),
(8, 'Latihan Kader 2', 0.30, 0.50, 0.50, '2020-07-12 18:52:08', '2020-07-12 18:52:21'),
(9, '3 bulan masa percobaan', 0.40, 0.30, 0.70, '2020-07-12 18:52:55', '2020-07-12 18:52:55');

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
(3, '2020_07_09_092126_create_keanggotaans_table', 1),
(4, '2020_07_09_092404_create_kriterias_table', 1),
(5, '2020_07_09_092427_create_sub_kriterias_table', 1),
(6, '2020_07_09_092447_create_nilais_table', 1),
(7, '2020_07_09_092600_create_calon_anggotas_table', 1),
(8, '2020_07_10_075208_create_samples_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id_nilai` bigint(20) UNSIGNED NOT NULL,
  `selisih` tinyint(4) NOT NULL,
  `nilai` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id_nilai`, `selisih`, `nilai`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'mampu', '2020-07-10 02:05:18', '2020-07-10 03:00:33'),
(5, 2, 5, 'lulus', '2020-07-13 02:27:46', '2020-07-13 02:27:46');

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
-- Table structure for table `samples`
--

CREATE TABLE `samples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `id_subkriteria` bigint(20) UNSIGNED NOT NULL,
  `values` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `samples`
--

INSERT INTO `samples` (`id`, `anggota_id`, `id_subkriteria`, `values`, `created_at`, `updated_at`) VALUES
(8, 4, 7, 4, '2020-07-15 06:10:12', '2020-07-15 06:10:12'),
(9, 4, 8, 3, '2020-07-15 06:10:38', '2020-07-15 06:10:38'),
(10, 4, 9, 4, '2020-07-15 06:10:53', '2020-07-15 06:10:53'),
(11, 4, 10, 5, '2020-07-15 06:13:20', '2020-07-15 06:13:20'),
(12, 4, 11, 3, '2020-07-15 06:13:36', '2020-07-15 06:13:36'),
(13, 4, 12, 4, '2020-07-15 06:15:58', '2020-07-15 06:15:58'),
(14, 4, 13, 2, '2020-07-15 06:16:08', '2020-07-15 06:16:08'),
(15, 4, 14, 3, '2020-07-15 06:16:19', '2020-07-15 06:16:19'),
(16, 4, 15, 5, '2020-07-15 19:04:41', '2020-07-15 19:04:41'),
(27, 5, 7, 4, '2020-07-18 01:44:08', '2020-07-18 01:44:08'),
(28, 5, 8, 5, '2020-07-18 01:44:14', '2020-07-18 01:44:14'),
(29, 5, 9, 3, '2020-07-18 01:44:20', '2020-07-18 01:44:20'),
(30, 5, 10, 5, '2020-07-18 01:45:01', '2020-07-18 01:45:01'),
(31, 5, 11, 4, '2020-07-18 01:45:08', '2020-07-18 01:45:08'),
(32, 5, 12, 5, '2020-07-18 01:45:35', '2020-07-18 01:45:35'),
(33, 5, 13, 3, '2020-07-18 01:45:52', '2020-07-18 01:45:52'),
(34, 5, 14, 2, '2020-07-18 01:46:02', '2020-07-18 01:46:02'),
(35, 5, 15, 4, '2020-07-18 01:46:22', '2020-07-18 01:46:22'),
(36, 6, 7, 4, '2020-07-18 03:30:30', '2020-07-18 03:30:30'),
(37, 6, 8, 4, '2020-07-18 03:30:40', '2020-07-18 03:30:40'),
(38, 6, 9, 4, '2020-07-18 03:30:52', '2020-07-18 03:30:52'),
(39, 6, 10, 3, '2020-07-18 03:31:09', '2020-07-18 03:31:09'),
(40, 6, 11, 5, '2020-07-18 03:31:19', '2020-07-18 03:31:19'),
(41, 6, 12, 4, '2020-07-18 03:31:34', '2020-07-18 03:31:34'),
(42, 6, 13, 3, '2020-07-18 03:31:46', '2020-07-18 03:31:46'),
(43, 6, 14, 4, '2020-07-18 03:32:01', '2020-07-18 03:32:01'),
(44, 6, 15, 5, '2020-07-18 03:32:16', '2020-07-18 03:32:16'),
(45, 7, 7, 2, '2020-07-19 05:05:58', '2020-07-19 05:05:58'),
(46, 7, 8, 5, '2020-07-19 05:06:06', '2020-07-19 05:06:06'),
(47, 7, 9, 3, '2020-07-19 05:06:15', '2020-07-19 05:06:15'),
(48, 7, 10, 4, '2020-07-19 05:06:35', '2020-07-19 05:06:35'),
(49, 7, 11, 3, '2020-07-19 05:06:51', '2020-07-19 05:06:51'),
(50, 7, 12, 3, '2020-07-19 05:07:19', '2020-07-19 05:07:19'),
(51, 7, 13, 4, '2020-07-19 05:07:38', '2020-07-19 05:07:38'),
(52, 7, 14, 3, '2020-07-19 05:07:52', '2020-07-19 05:07:52'),
(53, 8, 7, 5, '2020-07-19 05:10:11', '2020-07-19 05:10:11'),
(54, 8, 8, 3, '2020-07-19 05:10:19', '2020-07-19 05:10:19'),
(55, 8, 9, 3, '2020-07-19 05:10:30', '2020-07-19 05:10:30'),
(56, 8, 10, 4, '2020-07-19 05:10:52', '2020-07-19 05:10:52'),
(57, 8, 11, 4, '2020-07-19 05:11:05', '2020-07-19 05:11:05'),
(58, 8, 12, 4, '2020-07-19 05:11:21', '2020-07-19 05:11:21'),
(59, 8, 13, 3, '2020-07-19 05:11:29', '2020-07-19 05:11:29'),
(60, 8, 14, 3, '2020-07-19 05:11:38', '2020-07-19 05:11:38'),
(61, 8, 15, 4, '2020-07-19 05:12:04', '2020-07-19 05:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriterias`
--

CREATE TABLE `sub_kriterias` (
  `id_subkriteria` bigint(20) UNSIGNED NOT NULL,
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `nama_subkriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` tinyint(4) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kriterias`
--

INSERT INTO `sub_kriterias` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `target`, `type`, `created_at`, `updated_at`) VALUES
(7, 7, 'tes tulis', 5, 'core', '2020-07-12 18:55:34', '2020-07-12 22:36:59'),
(8, 7, 'tes wawancara', 3, 'secondary', '2020-07-12 22:36:17', '2020-07-12 22:36:17'),
(9, 7, 'fdg', 4, 'core', '2020-07-12 22:37:41', '2020-07-12 22:37:41'),
(10, 8, 'kerja tim', 5, 'core', '2020-07-12 22:38:22', '2020-07-12 22:38:22'),
(11, 8, 'pos-pos', 4, 'secondary', '2020-07-12 22:38:48', '2020-07-12 22:38:48'),
(12, 9, 'study club', 4, 'core', '2020-07-12 22:39:13', '2020-07-12 22:39:13'),
(13, 9, 'keaktifan', 3, 'secondary', '2020-07-12 22:39:41', '2020-07-12 22:39:41'),
(14, 9, 'challenges', 4, 'core', '2020-07-12 22:41:18', '2020-07-12 22:41:18'),
(15, 9, 'kepanitiaan', 4, 'core', '2020-07-12 22:41:43', '2020-07-12 22:41:43');

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
(1, 'admin', 'admin@mail.com', '2020-06-30 17:00:00', 'admin', 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_calonanggota`
--
ALTER TABLE `data_calonanggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_keanggotaan`
--
ALTER TABLE `dept_keanggotaan`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `samples_anggota_id_foreign` (`anggota_id`),
  ADD KEY `samples_id_subkriteria_foreign` (`id_subkriteria`);

--
-- Indexes for table `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `sub_kriterias_id_kriteria_foreign` (`id_kriteria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_calonanggota`
--
ALTER TABLE `data_calonanggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
