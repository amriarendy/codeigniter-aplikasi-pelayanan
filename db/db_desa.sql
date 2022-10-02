-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 06:26 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` bigint(20) NOT NULL,
  `dokumen` text DEFAULT NULL,
  `punya_dokumen` enum('users','admin') DEFAULT NULL,
  `id_layanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `dokumen`, `punya_dokumen`, `id_layanan`) VALUES
(1, 'Sistem_Informas_Pembuatan_Invoicei.jpg', 'users', 1),
(2, 'Sistem_Informas_Pengaduani.jpg', 'users', 1),
(3, 'Sistem_Informas_Rekam_Medisi.jpg', 'users', 1),
(4, 'Sistem_Informasi_Booking_Lapangan.jpg', 'users', 1),
(5, 'Sistem_Informasi_Company_Profile.jpg', 'users', 1),
(6, 'Sistem_Informasi_Booking_Lapangan1.jpg', 'users', 3),
(7, 'Sistem_Informasi_Company_Profile1.jpg', 'users', 3),
(8, 'Sistem_Informasi_Perpustakaan.jpg', 'users', 3),
(9, 'Sistem_Informasi_Website_BEM.jpg', 'users', 3),
(10, 'Sistem_Informasi.jpg', 'users', 3),
(11, 'Untitled-1.jpg', 'users', 3),
(12, '3_app_blog_dan_landingpage.jpg', 'users', 4),
(13, '4.jpg', 'users', 4),
(14, 'promosi_goican.jpg', 'users', 4),
(15, 'SC_Gratis.jpg', 'users', 4),
(16, '3_app_blog_dan_landingpage1.jpg', 'users', 5),
(17, '41.jpg', 'users', 5),
(18, '2000_Icon_Premium.jpg', 'users', 5),
(19, 'promosi_goican1.jpg', 'users', 5),
(20, 'SC_Gratis1.jpg', 'users', 5),
(21, 'artikel9.jpg', 'users', 6),
(22, 'not-found-300x300.jpg', 'users', 6),
(23, 'artikel7.jpg', 'admin', 6),
(24, 'artikel8.jpg', 'admin', 6),
(25, 'artikel91.jpg', 'admin', 6),
(26, 'not-found-300x3001.jpg', 'admin', 6),
(27, 'artikel92.jpg', 'users', 7),
(28, 'not-found-300x3002.jpg', 'users', 7),
(29, 'artikel3.jpg', 'admin', 7),
(30, 'artikel4.jpg', 'admin', 7);

-- --------------------------------------------------------

--
-- Table structure for table `master_pelayanan`
--

CREATE TABLE `master_pelayanan` (
  `id_master_pelayanan` int(11) NOT NULL,
  `master_pelayanan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_pelayanan`
--

INSERT INTO `master_pelayanan` (`id_master_pelayanan`, `master_pelayanan`) VALUES
(1, 'PEMBUATAN KTP'),
(2, 'PEMBUATAN KK');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `pelayanan` varchar(128) DEFAULT NULL,
  `status_pelayanan` enum('selesai','proses','perbaikan','ditolak') DEFAULT NULL,
  `catatan_pelayanan` text DEFAULT NULL,
  `tanggal_pelayanan` date DEFAULT NULL,
  `civitas_pelayanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `pelayanan`, `status_pelayanan`, `catatan_pelayanan`, `tanggal_pelayanan`, `civitas_pelayanan`) VALUES
(5, '1', 'selesai', 'Baik permintaan anda sudah di proses. Siliahkan ke kantor untuk mengambil surat.', '2022-08-13', 2),
(6, '2', 'selesai', 'ya ya', '2022-09-04', 2),
(7, '1', 'selesai', 'selesai', '2022-09-04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `nik` varchar(128) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `nik`, `password`, `tgl_lahir`, `role`, `alamat`) VALUES
(1, 'admin', '123456', 'admin', '0000-00-00', 'admin', 'Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta'),
(2, 'user', '654321', 'user', '2022-08-13', 'user', 'Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta'),
(3, 'Yuliana Arista', '6289692277783', 'Yuliana Arista', '2022-08-13', 'user', NULL),
(4, 'Elvis', '123', '123', '2020-02-13', 'user', NULL),
(5, 'goican', '6282246686900', 'goican', '2022-08-13', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `master_pelayanan`
--
ALTER TABLE `master_pelayanan`
  ADD PRIMARY KEY (`id_master_pelayanan`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `master_pelayanan`
--
ALTER TABLE `master_pelayanan`
  MODIFY `id_master_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
