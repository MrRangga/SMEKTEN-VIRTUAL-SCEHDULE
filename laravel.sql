-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 02:29 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(10) UNSIGNED NOT NULL,
  `jam_awal` int(11) DEFAULT NULL,
  `jam_ahkir` int(11) DEFAULT NULL,
  `nama_hari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ruang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_rombel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_sekolah`
--

CREATE TABLE `data_sekolah` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_pulang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_istirahat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_khusus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daftar_hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perjam` int(11) NOT NULL,
  `jumlah_jam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_sekolah`
--

INSERT INTO `data_sekolah` (`id`, `nama_sekolah`, `jam_masuk`, `jam_pulang`, `jam_istirahat`, `jam_khusus`, `daftar_hari`, `perjam`, `jumlah_jam`, `created_at`, `updated_at`) VALUES
(1, 'SMKN 10 SURABAYA', '06:30:00', '15:45:00', '09:30:00/12:15:00', NULL, 'senin,selasa,rabo,kamis,jumat', 45, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_guru` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `kode_guru`, `created_at`, `updated_at`) VALUES
(1, 'Suminar P SPD MM,PKWU', NULL, NULL),
(2, 'DRa Juariati,Bhs.Indonesia', NULL, NULL),
(3, 'Juki Irfansyah,Design media interaktif', NULL, NULL),
(4, 'Drs.Ponang B,Matematika', NULL, NULL),
(5, 'Dra.Hj.Evi ika H,BK', NULL, NULL),
(6, 'Hendra A s.kom,Audio Video', NULL, NULL),
(7, 'Yanti Kusumawati,Pend.Agama Islam', NULL, NULL),
(8, 'Dra.watini,b.inggris', NULL, NULL),
(9, 'Yofi Proyoga,B.daerah', NULL, NULL),
(10, 'Gunadi SPd,PPKN', NULL, NULL),
(11, 'dra.Mujiono,Bhs.Jepang', NULL, NULL),
(12, 'Sugiyono.Mpd,Pemes& Peng.Tarif', NULL, NULL),
(13, 'Wiwik F Spd,Pemanduan Perjalanan Wisata', NULL, NULL),
(14, 'Dra Hj.Warsini,Matematika', NULL, NULL),
(15, 'Nurkolis,MICE', NULL, NULL),
(16, 'M.Minnie SST.Par,KWU', NULL, NULL),
(17, 'Ahkir P.Mpd,Prenc Perjalanan Wisata', NULL, NULL),
(18, 'Rini Pagastuti Spd,Bahasa Jepang', NULL, NULL),
(19, 'Anik S S.Ag,Pend Agama Islam', NULL, NULL),
(20, 'Dra.Hj.Indri S.W MM,BP', NULL, NULL),
(21, 'Sugiyono Mpd,b.inggris', NULL, NULL),
(22, 'Wiwik F Spd,b.inggris', NULL, NULL),
(23, 'Silviati Spd,Matematika', NULL, NULL),
(24, 'Dwi Purwati,Ak.Keuangan', NULL, NULL),
(25, 'Budi Prapatno,Administrasi Pajak', NULL, NULL),
(26, 'Dewi Mar\'ah Spd,Pend Agama islam', NULL, NULL),
(27, 'Drs.Putut Hariyanto,Jasa DAg & Manufaktur', NULL, NULL),
(28, 'Arin Yuni P M.ak,Komputer Akutansi', NULL, NULL),
(29, 'Drs.Agus Mardiarto,KWU', NULL, NULL),
(30, 'Dra.Hj.Sri Indah A W,Prak Akuntansi Instansi Pemasaran', NULL, NULL),
(31, 'Dra Me Widie RM,Bhs.Indonesia', NULL, NULL),
(32, 'Dra.Hj.Tatik,PPKN', NULL, NULL),
(33, 'Dra.Putut Hariyanto,Jasa Dag & Manufaktur', NULL, NULL),
(34, 'Eko Purnomo ,Matematika', NULL, NULL),
(35, 'Dra Hj Denok T.M.MM,KWU', NULL, NULL),
(36, 'Endah W.Spd,Ak.Keuangan', NULL, NULL),
(37, 'Wahyu Widianti,BK', NULL, NULL),
(38, 'Hari Effendi Mpd,Bisinis Online', NULL, NULL),
(39, 'Indriya Setyana Spd,BK', NULL, NULL),
(40, 'Drs.Mulyoko,Administrasi Pajak', NULL, NULL),
(41, 'Ludhi Juliono,Peng Bisnis Ritel', NULL, NULL),
(42, 'Drs.Budi S Mpd,B.inggris', NULL, NULL),
(43, 'Risa Rahayu,B.indonesia', NULL, NULL),
(44, 'Kastolani.Spd,Pend Agama Islam', NULL, NULL),
(45, 'Dra Pudji Liliek A,KWU', NULL, NULL),
(46, 'Dra.Tatik Margiati,Penataan Produk', NULL, NULL),
(47, 'Roro Hami H Spd,KWU', NULL, NULL),
(48, 'Tjatur L.Mpd,Matematika', NULL, NULL),
(49, 'Andri Yani Spd,Bhs.Indonesia', NULL, NULL),
(50, 'Eni Joeliati.Spd,B.inggris', NULL, NULL),
(51, 'Siti Alfiyah H Mpd,Komputer Akuntansi', NULL, NULL),
(52, 'M.Safrudin Aji,KWU', NULL, NULL),
(53, 'Dra Kusriatin MM,Akuntansi PKM', NULL, NULL),
(54, 'Dewi Purwati,Lay Lemb PKM', NULL, NULL),
(55, 'Dra Hj. Arie A MM,PPKN', NULL, NULL),
(56, 'Dra Hj Wahyuning K,Akuntansi PKM', NULL, NULL),
(57, 'Aditya Dwi A,Desain Media Interaktif', NULL, NULL),
(58, 'Sohibul Anwar SE,Audio Video', NULL, NULL),
(59, 'Mario Gunawan S.Kom,Desain Media Interaktif', NULL, NULL),
(60, 'Reni Catur W Spd,KWU', NULL, NULL),
(61, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) UNSIGNED NOT NULL,
  `jam_awal` int(11) DEFAULT NULL,
  `jam_ahkir` int(11) DEFAULT NULL,
  `nama_hari` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jadwal_khusus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ruang` int(10) UNSIGNED DEFAULT NULL,
  `id_guru` int(10) UNSIGNED DEFAULT NULL,
  `id_rombel` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `jam_awal`, `jam_ahkir`, `nama_hari`, `jadwal_khusus`, `id_ruang`, `id_guru`, `id_rombel`, `created_at`, `updated_at`) VALUES
(1, 8, 11, 'kamis', NULL, 1, 1, 1, '2019-11-06 23:24:11', '2019-11-06 23:26:14');

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
(3, '2019_09_25_061012_create_jadwal_table', 1),
(4, '2019_09_25_061125_create_guru_table', 1),
(5, '2019_09_25_061214_create_rombel_table', 1),
(6, '2019_09_25_061244_create_data_sekolah_table', 1),
(7, '2019_09_25_062043_create_ruang_table', 1),
(8, '2019_09_25_062233_create_api_table', 1);

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
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_rombel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id`, `nama_rombel`, `created_at`, `updated_at`) VALUES
(1, '12mm3', NULL, NULL),
(2, '12mm2', NULL, NULL),
(3, '12mm1', NULL, NULL),
(4, '12 otkp 1', NULL, NULL),
(5, '12 otkp 2', NULL, NULL),
(6, '12 otkp 3', NULL, NULL),
(7, '12 bdp 1', NULL, NULL),
(8, '12 bdp 2', NULL, NULL),
(9, '12 bdp 3', NULL, NULL),
(10, '12 ak 1', NULL, NULL),
(11, '12 ak 2', NULL, NULL),
(12, '12 pkm 1', NULL, NULL),
(13, '12 pkm 2', NULL, NULL),
(14, '12 upw 1', NULL, NULL),
(15, '12 upw 2', NULL, NULL),
(16, '12 upw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`, `created_at`, `updated_at`) VALUES
(1, 'palem 1', NULL, NULL),
(2, 'palem 2', NULL, NULL),
(3, 'palem 3', NULL, NULL),
(4, 'palem 4', NULL, NULL),
(5, ' palem 5', NULL, NULL),
(6, 'palem 6', NULL, NULL),
(7, 'lab mm a', NULL, NULL),
(8, ' lab me', NULL, NULL),
(9, 'lab mm b', NULL, NULL),
(10, ' studio', NULL, NULL),
(11, 'lab atw', NULL, NULL),
(12, 'lab stw', NULL, NULL),
(13, 'anggrek 1', NULL, NULL),
(14, 'teras masjid', NULL, NULL),
(15, 'anggrek 2', NULL, NULL),
(16, 'puring 1', NULL, NULL),
(17, 'puring 2', NULL, NULL),
(18, 'puring 3', NULL, NULL),
(19, 'puring 4 ', NULL, NULL),
(20, 'aula', NULL, NULL),
(21, 'blimbing 1', NULL, NULL),
(22, 'blimbing 2', NULL, NULL),
(23, 'blimbing 3', NULL, NULL),
(24, 'lab akl', NULL, NULL),
(25, 'sansivera 1', NULL, NULL),
(26, 'lab bdp', NULL, NULL),
(27, 'sansivera 2', NULL, NULL),
(28, 'sono 1', NULL, NULL),
(29, 'sono 2 ', NULL, NULL),
(30, 'sono 4', NULL, NULL),
(31, 'lab pkm', NULL, NULL);

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
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$Rai5kggvvDTUZgHakDMVH.q.U06i2HHItd32YNl7ps0F86oSh4BpW', NULL, '2019-11-06 23:21:17', '2019-11-06 23:21:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_sekolah`
--
ALTER TABLE `data_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_id_guru_foreign` (`id_guru`),
  ADD KEY `jadwal_id_rombel_foreign` (`id_rombel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
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
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_sekolah`
--
ALTER TABLE `data_sekolah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_id_rombel_foreign` FOREIGN KEY (`id_rombel`) REFERENCES `rombel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
