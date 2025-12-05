-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2023 pada 10.40
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerapan`
--

CREATE TABLE `penerapan` (
  `id_penerapan` varchar(6) NOT NULL,
  `stb` varchar(18) NOT NULL,
  `ab_tinggi` varchar(50) NOT NULL,
  `ab_sedang` varchar(50) NOT NULL,
  `ab_rendah` varchar(50) NOT NULL,
  `pe_baik` varchar(50) NOT NULL,
  `pe_cukup` varchar(50) NOT NULL,
  `pe_buruk` varchar(50) NOT NULL,
  `ke_baik` varchar(50) NOT NULL,
  `ke_kurang` varchar(50) NOT NULL,
  `total_AiZi` varchar(100) NOT NULL,
  `total_a` varchar(100) NOT NULL,
  `kep_lulus` varchar(100) NOT NULL,
  `kep_tdklulus` varchar(100) NOT NULL,
  `n_rekomendasi` varchar(100) NOT NULL,
  `predikat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerapan`
--

INSERT INTO `penerapan` (`id_penerapan`, `stb`, `ab_tinggi`, `ab_sedang`, `ab_rendah`, `pe_baik`, `pe_cukup`, `pe_buruk`, `ke_baik`, `ke_kurang`, `total_AiZi`, `total_a`, `kep_lulus`, `kep_tdklulus`, `n_rekomendasi`, `predikat`) VALUES
('M001', '192484', '1', '0', '0', '1', '0', '0', '0.66666666666667', '0.33333333333333', '65', '1', '0.66666666666667', '0.33333333333333', '65', 'Lulus'),
('M002', '123', '0', '0.75', '0.25', '0.89473684210526', '0.10526315789474', '0', '0.5', '0.5', '121.50623268698', '1.9210526315789', '0.60832732516222', '0.39167267483778', '63.249819754867', 'Lulus');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penerapan`
--
ALTER TABLE `penerapan`
  ADD PRIMARY KEY (`id_penerapan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
