-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 27 Sep 2019 pada 20.40
-- Versi Server: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--
CREATE DATABASE IF NOT EXISTS `bengkel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bengkel`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_alat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_beli` datetime NOT NULL,
  `tempat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ket` text COLLATE utf8_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id`, `nama_alat`, `merk`, `tanggal_beli`, `tempat`, `jumlah`, `ket`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Obeng +', 'Kenmaster', '2019-08-31 17:38:46', 'Rak 1', '10', 'Bermagnet', '75000.00', 'Baik', '2019-08-31 10:38:46', '2019-08-31 10:38:46'),
(2, 'Obeng -', 'Workpro', '2019-08-31 17:41:32', 'Rak 1', '10', 'Bermagnet', '110000.00', 'Baik', '2019-08-31 10:41:32', '2019-08-31 10:41:32'),
(4, 'Kunci 10', 'Workpro', '2019-08-31 18:01:51', 'Rak 2', '10', '-', '24000.00', 'Baik', '2019-08-31 11:01:51', '2019-08-31 11:01:51'),
(6, 'Kunci T 10', 'Tekiro', '2019-08-31 18:10:46', 'Rak 3', '10', 'Hitam', '22500.00', 'Baik', '2019-08-31 11:10:46', '2019-08-31 11:10:46'),
(7, 'Kunci Y 10,12,14', 'Tekiro', '2019-08-31 18:11:44', 'Rak 4', '15', 'Hitam', '24500.00', 'Baik', '2019-08-31 11:11:44', '2019-09-05 20:41:46'),
(10, 'Kunci Sok Set', 'Tekiro', '2019-08-31 18:28:18', 'Rak 5', '9', '-', '78000.00', 'Baik', '2019-08-31 11:28:18', '2019-09-05 20:45:45'),
(11, 'Kompressor', 'Suzuki', '2019-09-11 01:53:28', '-', '1', 'Gress', '2000000.00', 'Baik', '2019-09-10 18:53:28', '2019-09-10 18:53:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penjualan` bigint(20) NOT NULL,
  `id_suku_cadang` bigint(20) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_penjualan`, `id_suku_cadang`, `kuantitas`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(12, 25, 10, 5, '40000.00', 'Dibeli', '2019-09-09 09:09:30', '2019-09-09 09:09:30'),
(13, 26, 9, 2, '800000.00', 'Dibeli', '2019-09-09 09:24:34', '2019-09-09 09:24:34'),
(14, 26, 5, 3, '25500.00', 'Dibeli', '2019-09-09 09:24:37', '2019-09-09 09:24:37'),
(15, 31, 5, 2, '17000.00', 'Dibeli', '2019-09-10 18:57:58', '2019-09-10 18:57:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_servis`
--

CREATE TABLE `detail_servis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_servis` bigint(20) NOT NULL,
  `id_suku_cadang` bigint(20) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `detail_servis`
--

INSERT INTO `detail_servis` (`id`, `id_servis`, `id_suku_cadang`, `kuantitas`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(62, 59, 10, 1, '8000.00', 'Dibeli', '2019-09-08 05:25:25', '2019-09-08 05:25:25'),
(68, 64, 5, 3, '25500.00', 'Dibeli', '2019-09-08 05:34:09', '2019-09-08 05:34:09'),
(69, 64, 12, 2, '30000.00', 'Dibeli', '2019-09-08 05:34:14', '2019-09-08 05:34:14'),
(70, 63, 7, 1, '245000.00', 'Dibeli', '2019-09-08 05:34:29', '2019-09-08 05:34:29'),
(71, 63, 11, 1, '85000.00', 'Dibeli', '2019-09-08 05:34:33', '2019-09-08 05:34:33'),
(72, 63, 14, 1, '23000.00', 'Dibeli', '2019-09-08 05:34:36', '2019-09-08 05:34:36'),
(73, 65, 13, 1, '55000.00', 'Dibeli', '2019-09-09 04:55:52', '2019-09-09 04:55:52'),
(74, 66, 10, 1, '8000.00', 'Dibeli', '2019-09-09 07:04:04', '2019-09-09 07:04:04'),
(75, 66, 9, 1, '400000.00', 'Dibeli', '2019-09-09 07:09:12', '2019-09-09 07:09:12'),
(76, 67, 9, 1, '400000.00', 'Dibeli', '2019-09-10 00:33:11', '2019-09-10 00:33:11'),
(77, 72, 9, 1, '400000.00', 'Dibeli', '2019-09-10 18:55:52', '2019-09-10 18:55:52'),
(78, 72, 10, 2, '16000.00', 'Dibeli', '2019-09-10 18:56:17', '2019-09-10 18:56:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bengkel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_pemilik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_bengkel` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_14_041115_akun', 1),
(4, '2019_08_14_041203_pemberitahuan', 1),
(5, '2019_08_14_041223_konfigurasi', 1),
(6, '2019_08_14_041304_alat', 1),
(7, '2019_08_14_041318_suku_cadang', 1),
(8, '2019_08_14_041411_detail_penjualan', 1),
(9, '2019_08_14_041423_penjualan', 1),
(10, '2019_08_14_041447_servis', 1),
(11, '2019_08_14_041525_detail_servis', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konten` text COLLATE utf8_unicode_ci NOT NULL,
  `publisher_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ket` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Penjualan',
  `total_harga` decimal(10,2) DEFAULT '0.00',
  `uang` decimal(10,2) DEFAULT NULL,
  `kembalian` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `ket`, `total_harga`, `uang`, `kembalian`, `status`, `created_at`, `updated_at`) VALUES
(25, 'Penjualan', '40000.00', '50000.00', '10000.00', 'deal', '2019-09-09 08:59:22', '2019-09-09 09:22:56'),
(26, 'Madani', '825500.00', '8.00', '-825492.00', 'deal', '2019-09-09 09:24:20', '2019-09-09 09:25:04'),
(29, 'Ori kawahara', '0.00', NULL, NULL, 'keranjang', '2019-09-10 18:51:20', '2019-09-10 18:51:20'),
(30, 'Hadi', '0.00', NULL, NULL, 'keranjang', '2019-09-10 18:57:40', '2019-09-10 18:57:40'),
(31, 'Penjualan', '17000.00', '2.00', '-16998.00', 'deal', '2019-09-10 18:57:47', '2019-09-10 18:58:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servis`
--

CREATE TABLE `servis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `no_plat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_harga_suku_cadang` decimal(10,2) DEFAULT '0.00',
  `biaya_servis` decimal(10,2) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `uang` decimal(10,2) DEFAULT NULL,
  `kembalian` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `servis`
--

INSERT INTO `servis` (`id`, `tanggal_mulai`, `no_plat`, `total_harga_suku_cadang`, `biaya_servis`, `total_harga`, `uang`, `kembalian`, `status`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(63, '2019-09-08 12:33:38', 'D 6692 CJ', '353000.00', '40000.00', '393000.00', '4.00', '-392996.00', 'selesai', '2019-09-08 12:36:05', '2019-09-08 05:33:38', '2019-09-08 05:36:05'),
(64, '2019-09-08 12:33:50', 'D 6312 ABQ', '55500.00', '40000.00', '95500.00', '100000.00', '4500.00', 'selesai', '2019-09-09 11:53:40', '2019-09-08 05:33:50', '2019-09-09 04:53:40'),
(65, '2019-09-09 11:55:27', 'D 6312 ABQ', '55000.00', '25000.00', '80000.00', '100000.00', '20000.00', 'selesai', '2019-09-09 11:56:40', '2019-09-09 04:55:27', '2019-09-09 04:56:40'),
(66, '2019-09-09 11:59:36', 'D 6312 ABQ', '408000.00', '50000.00', '458000.00', '500000.00', '42000.00', 'selesai', '2019-09-09 16:25:36', '2019-09-09 04:59:36', '2019-09-09 09:25:36'),
(67, '2019-09-10 07:32:43', 'D 4564 HA', '400000.00', '50000.00', '450000.00', '50000.00', '-400000.00', 'selesai', '2019-09-10 07:33:42', '2019-09-10 00:32:43', '2019-09-10 00:33:42'),
(70, '2019-09-10 07:39:41', 'D 6692 CJ', '0.00', NULL, NULL, NULL, NULL, 'sedang', NULL, '2019-09-10 00:39:41', '2019-09-10 00:39:41'),
(72, '2019-09-11 01:55:29', 'D 6627 ABQ', '416000.00', '100000.00', '516000.00', '50.00', '-515950.00', 'selesai', '2019-09-11 01:56:42', '2019-09-10 18:55:29', '2019-09-10 18:56:42'),
(73, '2019-09-11 01:55:36', 'D 4564 HA', '0.00', NULL, NULL, NULL, NULL, 'sedang', NULL, '2019-09-10 18:55:36', '2019-09-10 18:55:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suku_cadang`
--

CREATE TABLE `suku_cadang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `untuk_motor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_suku_cadang` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `suku_cadang`
--

INSERT INTO `suku_cadang` (`id`, `nama`, `merk`, `untuk_motor`, `harga`, `jumlah`, `ket`, `status`, `no_suku_cadang`, `created_at`, `updated_at`) VALUES
(3, 'Gir Set', 'SSS', 'Satria, Sonic, Athlete', '450000.00', 5, '42:16', 'Tersedia', 1666326, '2019-09-05 21:33:04', '2019-09-09 08:59:15'),
(5, 'Gigi nanas', 'CKD Pass', 'Mio, Soul', '8500.00', 2, 'Orisinil', 'Tersedia', 164276, '2019-09-05 21:34:38', '2019-09-10 18:57:58'),
(6, 'Stang seher', 'HGP', 'Beat, Icon', '376000.00', 7, 'Orisinil HGP', 'Tersedia', 127381237, '2019-09-06 06:37:15', '2019-09-07 09:36:24'),
(7, 'Seher', 'HGP', 'Beat, Icon', '245000.00', 8, 'Orisinil HGP', 'Tersedia', 21382487, '2019-09-06 06:37:44', '2019-09-09 08:57:26'),
(8, 'Knalpot Racing', 'Kawahara', 'NMAX, PCX, XMAX, LEXI', '560000.00', 3, 'Ori kawahara', 'Tersedia', 14647263, '2019-09-07 18:42:01', '2019-09-07 18:42:01'),
(9, 'Busi', 'Brisk', 'CBR,R15,Sonic,Satria', '400000.00', 3, 'Baru', 'Tersedia', 143534, '2019-09-07 18:42:49', '2019-09-10 18:55:52'),
(10, 'Bearing Laher Gir', 'CKDPASS', 'Supra,Grand,Vega,Jupiter', '8000.00', 25, 'Lokal', 'Tersedia', NULL, '2019-09-07 18:43:41', '2019-09-10 18:56:17'),
(11, 'Piringan Cakram depan', 'YGP', 'Mio Fino', '85000.00', 3, 'Ori', 'Tersedia', 284734, '2019-09-07 18:44:29', '2019-09-08 05:34:33'),
(12, 'Kabel Speedo', 'Indoparts', 'Legenda,Supra', '15000.00', 3, 'Lokal', 'Tersedia', 248948, '2019-09-07 18:45:03', '2019-09-08 05:34:14'),
(13, 'LED Depan DC', 'OSRAM', 'Motor kelistrikan DC', '55000.00', 4, 'Ori', 'Tersedia', 34374676, '2019-09-07 18:46:00', '2019-09-09 04:55:51'),
(14, 'Perseneling', 'HGP', 'Grand, Supra, Legenda', '23000.00', 4, 'Ori', 'Tersedia', 23873387, '2019-09-07 18:46:29', '2019-09-09 08:31:02'),
(15, 'Speedometer', 'Hayabusaa', 'CBR', '400000.00', 2, 'Ori', 'Tersedia', 6768676, '2019-09-10 18:54:53', '2019-09-10 18:54:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_servis`
--
ALTER TABLE `detail_servis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suku_cadang`
--
ALTER TABLE `suku_cadang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `detail_servis`
--
ALTER TABLE `detail_servis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `suku_cadang`
--
ALTER TABLE `suku_cadang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
