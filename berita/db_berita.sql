-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2024 at 11:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `id_berita` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `id_pengguna`, `isi_komentar`, `tanggal_komentar`) VALUES
(3, 8, 4, 'update komentar lagi', '2024-12-12 15:51:23'),
(4, 8, 4, 'tes lagi edit admin', '2024-12-12 15:54:36'),
(5, 8, 9, 'tes komentar pembaca', '2024-12-12 16:45:24'),
(6, 8, 8, 'tes penulis2 edit penulis', '2024-12-13 07:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `peran` enum('admin','penulis','pembaca') DEFAULT 'pembaca',
  `tanggal_dibuat` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `email`, `kata_sandi`, `peran`, `tanggal_dibuat`) VALUES
(4, 'aji', 'aji@gmail.com', '$2y$10$AAQAEzvsMJYJ7rkdvPXtoOq5R8YfBiuv48jQZQF7s0.hiEzk68V/6', 'penulis', '2024-12-11 22:36:27'),
(6, 'admin', 'admin@gmail.com', '$2y$10$khWAQOLaf1pJZc9CIKaDuOOfODM5KKYze3CRtof13De9rKSjepfV6', 'admin', '2024-12-12 23:39:55'),
(7, 'penulis1', 'penulis1@gmail.com', '$2y$10$Y7kFBL0rHYMlfSPT.EjTDuT4VUL/GE2Nbd9apQArL7C1JpoGDMTAu', 'penulis', '2024-12-12 23:43:28'),
(8, 'penulis2', 'penulis2@gmail.com', '$2y$10$H2GPPnRfJMxdmhIJabEUcuEY5fU81zyiYecApLkIqhNDO.Nzjgnhe', 'penulis', '2024-12-12 23:44:00'),
(9, 'pembaca', 'pembaca1@gmail.com', '$2y$10$WOpWzasm1REVVIxwWnN8H.aQE5Enizy3l/tbvB2r8sdylt39uETX2', 'pembaca', '2024-12-12 23:44:35'),
(10, 'pembaca2', 'pembaca2@gmail.com', '$2y$10$nOGtkd0dvJwI0x5Kc4cbmePinj5keoSYhROkG9JJHQT9/aQwxdb4y', 'pembaca', '2024-12-12 23:44:59'),
(14, 'penulis3', 'penulis3@gmail.com', '$2y$10$uVu1UpHsmfaFNBfuoRYcOO39/sEQsaUXO4ALiC3HzM.uB93ZKr/l6', 'penulis', '2024-12-13 17:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbberita`
--

CREATE TABLE `tbberita` (
  `nomor` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isiberita` text NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_pengguna` int NOT NULL,
  `tanggal_dibuat` datetime DEFAULT CURRENT_TIMESTAMP,
  `penulis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbberita`
--

INSERT INTO `tbberita` (`nomor`, `judul`, `isiberita`, `gambar`, `id_pengguna`, `tanggal_dibuat`, `penulis`) VALUES
(7, 'Aji Ganteng', 'ada', 'Screenshot (61).png', 4, '2024-12-12 01:04:30', 'aji'),
(8, 'contoh tambah', 'ada ', 'Screenshot (50).png', 4, '2024-12-12 01:11:43', 'aji'),
(9, 'ini adalah berita buatan penulis 1', 'tri aji santoso 2023310045', 'Screenshot (127).png', 7, '2024-12-12 23:51:07', 'penulis1'),
(18, 'ready pjbl', 'project based learning', 'IMG_20230907_174049.jpg', 6, '2024-12-13 17:16:12', 'admin'),
(19, 'tes admin', 'lorem ipsum', 'cat.jpg', 6, '2024-12-13 17:37:41', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nama_pengguna` (`nama_pengguna`);

--
-- Indexes for table `tbberita`
--
ALTER TABLE `tbberita`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbberita`
--
ALTER TABLE `tbberita`
  MODIFY `nomor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `tbberita` (`nomor`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;

--
-- Constraints for table `tbberita`
--
ALTER TABLE `tbberita`
  ADD CONSTRAINT `tbberita_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
