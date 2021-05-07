-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2021 at 12:06 AM
-- Server version: 5.7.34-log
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nusanwor_upjmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_keputusan`
--

CREATE TABLE `data_keputusan` (
  `id_keputusan` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `kondisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_keputusan`
--

INSERT INTO `data_keputusan` (`id_keputusan`, `title`, `kondisi`) VALUES
(1, 'download data kerjasama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id_slide` int(11) NOT NULL,
  `title` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id_slide`, `title`, `file`) VALUES
(1, '1', '1Ld0zJvSzqtmfIf0S.png'),
(2, '2', 'D3To3LDO7n1PNfukG.png'),
(3, '3', 'gTP5nDsg58YabOfPm.png');

-- --------------------------------------------------------

--
-- Table structure for table `tdata`
--

CREATE TABLE `tdata` (
  `id_data` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `jenis_doc` longtext NOT NULL,
  `no_doc` longtext NOT NULL,
  `no_doc_1` longtext NOT NULL,
  `mitra` longtext NOT NULL,
  `tahun_tanda_tangan` year(4) NOT NULL,
  `tahun_berakhir` year(4) NOT NULL,
  `tingkatan_kerja` longtext NOT NULL,
  `bentuk_kerjasama` longtext NOT NULL,
  `file_data` longtext NOT NULL,
  `status_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tkegiatan`
--

CREATE TABLE `tkegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_data` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `judul` longtext NOT NULL,
  `tahun_kegiatan` year(4) NOT NULL,
  `waktu_durasi` longtext NOT NULL,
  `manfaat` longtext NOT NULL,
  `bukti_kegiatan` longtext NOT NULL,
  `status_kegiatan` int(11) NOT NULL,
  `ruang_lingkup` int(11) NOT NULL,
  `lainnya` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Humas', 'HUMAS', 'humas@stkip.com', NULL, '$2y$10$Cq.pNaoYy1STZ52Uu7aNDOi/7cgmYrN.z5QdCL7D2yDbt3haQQk0O', '1', NULL, NULL, NULL),
(3, 'Pendidikan Biologi', 'Biologi', 'pendidikanbiologi@stkip.com', NULL, '$2y$10$FXJW82ntwPkb1pfEoq3h8uEtIhrdB1CZqMfdpQJoRLqvKZveHszMC', '1', NULL, NULL, NULL),
(4, 'Pendidikan Sejarah', 'Sejarah', 'pendidikansejarah@stkip.com', NULL, '$2y$10$b7jlI2lhuiCnHAGPGLy/teISIl/1zdzkwqalYqTx.hLdLJgcGIgdm', '1', NULL, NULL, NULL),
(5, 'Pendidikan Geografi', 'Geografi', 'pendidikangeografi@stkip.com', NULL, '$2y$10$CEuSADpNqoOEQ5Il5ob0r./3H3To7gkRglDIty1/QP/mdWOeKYyO2', '1', NULL, NULL, NULL),
(6, 'Pendidikan Bahasa Inggris', 'BIngg', 'pendidikanbahasainggris@stkip.com', NULL, '$2y$10$ZZIBrARP0PCiH5uqiqUvkO7x5917cxRq5js6iu3VQD0ZDTG8IqpQy', '1', NULL, NULL, NULL),
(7, 'Pendidikan Matematika', 'Matematika', 'pendidikanmatematika@stkip.com', NULL, '$2y$10$onTytIqgY5zKL78kjra3b.rdZRhpbVcEvqK8.W7EaLzgLiiieDULu', '1', NULL, NULL, NULL),
(8, 'Bimbingan dan Konseling', 'BK', 'pendidikanbk@stkip.com', NULL, '$2y$10$sG94jRG/DgEU1YZ.otAUL.TmpexTqr.tpQazqyojrlue1LaCll78C', '1', NULL, NULL, NULL),
(9, 'Pendidikan Sosiologi', 'Sosiologi', 'pendidikansosiologi@stkip.com', NULL, '$2y$10$WanlCrhMyGgsUVXbILFnPOsTZ05xY1UFxGHT73cxYvamW0HuvzGR2', '1', NULL, NULL, NULL),
(10, 'Pendidikan Bahasa dan Sastra Indonesia', 'BI', 'pendidikanbi@stkip.com', NULL, '$2y$10$kPW8MPrNLelIu3L.UUMhguadeX1BI2sDLBB7bQ.iSbCuIkaY4oepK', '1', NULL, NULL, NULL),
(11, 'Pendidikan Ekonomi', 'Ekonomi', 'pendidikanekonomi@stkip.com', NULL, '$2y$10$zfO8mZ4I9p1Sit4Gkt7N/uRpEz.flcVYwsDjreehyf3NrxpLEGc1K', '1', NULL, NULL, NULL),
(12, 'Pendidikan Informatika', 'Informatika', 'pendidikaninformatika@stkip.com', NULL, '$2y$10$y5AUAx4NVR.KaBb2MHmbE.Vk/HXw4Wnrp2Jhnn9qC3nZshfchMUN.', '1', NULL, NULL, NULL),
(13, 'Pendidikan Fisika', 'Fisika', 'pendidikanfisika@stkip.com', NULL, '$2y$10$3z6nNEpjzG7kisPArA180.OPia7IIWttBaYFLpCD688y7SSF.kW3e', '1', NULL, NULL, NULL),
(14, 'Pendidikan IPS', 'IPS', 'pendidikanips@stkip.com', NULL, '$2y$10$hUrrCeOKmIQEnPhmOTXiCuhRSmVWKlPC/0iv0HA5lzmBJagwelmj.', '1', NULL, NULL, NULL),
(15, 'Pendidikan Pancasila dan Kewarganegaraan', 'PKN', 'pendidikanpkn@stkip.com', NULL, '$2y$10$7mkny63qWRpBhIOkTqbVGu6bEU2d6O6Z2TT4IuLXPYuSAdeIQrcwK', '1', NULL, NULL, NULL),
(16, 'Pendidikan Akuntansi', 'Akuntansi', 'pendidikanakuntansi@stkip.com', NULL, '$2y$10$Wbkq8Hp1ANaodOKnom7ibOL6GRvEMPBGSMrxFMsYNO7VGp7fYdyQC', '1', NULL, NULL, NULL),
(18, 'ADMIN', 'ADMIN', 'admin@stkip.com', NULL, '$2y$10$Wbkq8Hp1ANaodOKnom7ibOL6GRvEMPBGSMrxFMsYNO7VGp7fYdyQC', '0', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_keputusan`
--
ALTER TABLE `data_keputusan`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `tdata`
--
ALTER TABLE `tdata`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tkegiatan`
--
ALTER TABLE `tkegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_data` (`id_data`,`id_user`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT for table `data_keputusan`
--
ALTER TABLE `data_keputusan`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tdata`
--
ALTER TABLE `tdata`
  MODIFY `id_data` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tkegiatan`
--
ALTER TABLE `tkegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tdata`
--
ALTER TABLE `tdata`
  ADD CONSTRAINT `tdata_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tkegiatan`
--
ALTER TABLE `tkegiatan`
  ADD CONSTRAINT `tkegiatan_ibfk_2` FOREIGN KEY (`id_data`) REFERENCES `tdata` (`id_data`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
