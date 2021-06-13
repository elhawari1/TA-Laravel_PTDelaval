-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 04:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pt_delaval`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_brg` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` text NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_brg`, `nama`, `gambar`, `deskripsi`, `harga`, `stok`, `tanggal`) VALUES
(2, 'Dipal Cone', 'Dipal Cone.jpg', 'Cairan Pembersih alat perah', '1000', 4, '2021-06-01'),
(3, 'Super Clean', 'Super Clean.jpg', 'Cairan Pembersih alat perah', '100', 2, '2021-06-01'),
(4, 'Cidmax', 'Cidmax.jpg', 'Cairan Pembersih alat perah', '100', 12, '2021-06-01'),
(12, 'Cooling Tank', 'Cooling Tank.jpg', 'Tangki pendingin susu dan penampungan susu', 'Rp. 13.500.000', 12, '2021-06-07'),
(13, 'Cow Brush', 'Cow Brush.jpg', 'Sikat untuk membersihkan atau sisir kulit sapi / membuat sapi nyaman', 'Rp. 13.706.456', 3, '2021-06-07'),
(14, 'Mastitis Test', 'Mastitis Test.jpg', 'Cairan Untuk pencegahan penyakit mastitis pada sapi', 'Rp. 650.000', 12, '2021-06-07'),
(16, 'Delaval BMS1 170 Single Bucket Milking', 'Delaval BMS1 170 Single Bucket Milking.jpg', 'Alat Perah sapi tidak bergerak', 'Rp. 12.352.884', 4, '2021-06-07'),
(17, 'Delaval Bosio', 'Delaval Bosio.jpg', 'Mesin perah portabel / alat untuk pemerah sapi bergerak', 'Rp. 11.500.000', 21, '2021-06-07'),
(18, 'Mixer Wagon', 'Mixer Wagon.jpg', 'Mesin Mixer / alat untuk mencampur pakan sapi', 'Rp. 75.626.760', 3, '2021-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '1', '$2y$10$41S.HIrpbeU.x9zio5u1x.4baiUPPWERlXOIwGH2.oGsmV7zoPCXq', '2021-05-15 23:36:30', '2021-05-15 23:36:30'),
(2, 'faras', 'faras@gmail.com', NULL, '2', '$2y$10$oo.I4y6FYViLtwPEeUBZg.ajxtiCo2zv4tmG90uCGdu3cYmPun0ZG', '2021-05-18 07:25:30', '2021-05-18 07:25:30'),
(3, 'abdel', 'abdel@gmail.com', NULL, '2', '$2y$10$mWqTtsO4A3bN/O9OkVGLO.6AcHx8PoAqZtqSKGOGxnS23.QPMNVVi', '2021-05-18 10:19:06', '2021-05-18 10:19:06'),
(4, 'alfin', 'alfin@gmail.com', NULL, '2', '$2y$10$yzEXdExmNWTvMA8FfiVjXeJVbcBuw7hIpKgNA7UO5x.Xnp2kOl4aO', '2021-05-23 08:57:59', '2021-05-23 08:57:59'),
(5, 'salman', 'salman@gmail.com', NULL, '2', '$2y$10$n3Pxro7cN.qGViv2/iFqp.xPanZplrGqIKvoQ6bWMJTA9eFq.gSTW', '2021-05-28 05:16:30', '2021-05-28 05:16:30'),
(6, 'botolo', 'botol@gmail.com', NULL, '2', '$2y$10$1UI/XxS5xkkxR5DhH9xneO36qPH.dcR.A7brJei2JItjVKZc6swba', '2021-05-28 05:30:45', '2021-05-28 05:30:45'),
(7, 'farras21', 'faras@lolo.xyz', NULL, '2', '$2y$10$DAoG3BpaIc4bZKFdY3rM7eGd0DNcwYWCsDmb9zj7umU5wzWF4mfPO', '2021-05-28 05:32:02', '2021-05-28 05:32:02'),
(8, 'unyilz', 'unyilz@gmail.com', NULL, '2', '$2y$10$DPsjicSWaQVaIU1MvUUiCOySNvZxsEzbQNHLyLmruBw7nN26hElh2', '2021-06-03 08:28:54', '2021-06-03 08:28:54'),
(9, 'mulya', 'mulya@gmail.com', NULL, '2', '$2y$10$uhrtR5EIIok/PtsMYf5WU.M2T9rsqyt58G.gjeZ8hx.VIE80lNbzq', '2021-06-04 07:09:46', '2021-06-04 07:09:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

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
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_brg` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
