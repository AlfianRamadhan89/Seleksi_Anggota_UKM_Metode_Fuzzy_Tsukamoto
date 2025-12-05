-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2023 pada 18.01
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(6) NOT NULL,
  `nama_admin` varchar(111) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `level_akun` varchar(111) NOT NULL,
  `status_akun` varchar(111) NOT NULL,
  `foto_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level_akun`, `status_akun`, `foto_admin`) VALUES
('1', 'Administrator', 'admin', 'admin', 'admin super', 'aktif', 'admin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(10) NOT NULL,
  `stb` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `status_akun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `stb`, `username`, `password`, `level`, `status_akun`) VALUES
('A001', '192484', '123', '12345', 'Anggota Baru', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_anggota`
--

CREATE TABLE `calon_anggota` (
  `stb` int(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jkel` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `email` text NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `calon_anggota`
--

INSERT INTO `calon_anggota` (`stb`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jkel`, `alamat`, `no_hp`, `email`, `jurusan`, `foto`) VALUES
(192484, 'Alfian Ramadhan', 'Makassar', '2001-11-20', 'Laki - Laki', 'Jalan Syekh Yusuf Lorong 2 Nomor 31 (Samping Masjid Nur Sakinah)', '082153908407', 'alfian@gmail.com', 'Teknik Informatika (S1)', 'noavatar.jpg');

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
('M001', '192484', '0', '1', '0', '0', '1', '0', '0.66666666666667', '0.33333333333333', '65', '1', '0.66666666666667', '0.33333333333333', '65', 'Lulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` varchar(4) NOT NULL,
  `stb` varchar(20) NOT NULL,
  `absensi` varchar(20) NOT NULL,
  `pembelajaran` varchar(20) NOT NULL,
  `kegiatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `stb`, `absensi`, `pembelajaran`, `kegiatan`) VALUES
('P001', '192484', '6', '60', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE `rule` (
  `kd_rule` varchar(4) NOT NULL,
  `nm_rule` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`kd_rule`, `nm_rule`) VALUES
('R01', 'Jika nilai Absensi TINGGI dan nilai Pembelajaran BAIK dan nilai Kegiatan BAIK, maka Hasilnya LULUS'),
('R02', 'Jika nilai Absensi TINGGI dan nilai Pembelajaran BAIK dan nilai Kegiatan KURANG, maka Hasilnya TIDAK LULUS'),
('R03', 'Jika nilai Absensi TINGGI dan nilai Pembelajaran CUKUP dan nilai Kegiatan BAIK, maka Hasilnya  LULUS'),
('R04', 'Jika nilai Absensi TINGGI dan nilai Pembelajaran CUKUP dan nilai Kegiatan KURANG, maka Hasilnya TIDAK LULUS'),
('R05', 'Jika nilai Absensi TINGGI dan nilai Pembelajaran BURUK dan nilai Kegiatan BAIK, maka Hasilnya TIDAK LULUS'),
('R06', 'Jika nilai Absensi TINGGI dan nilai Pembelajaran BURUK dan nilai Kegiatan KURANG, maka Hasilnya TIDAK LULUS'),
('R07', 'Jika nilai Absensi SEDANG dan nilai Pembelajaran BAIK dan nilai Kegiatan BAIK, maka Hasilnya  LULUS'),
('R08', 'Jika nilai Absensi SEDANG dan nilai Pembelajaran BAIK dan nilai Kegiatan KURANG, maka Hasilnya TIDAK LULUS'),
('R09', 'Jika nilai Absensi SEDANG dan nilai Pembelajaran CUKUP dan nilai Kegiatan BAIK, maka Hasilnya LULUS'),
('R10', 'Jika nilai Absensi SEDANG dan nilai Pembelajaran CUKUP dan nilai Kegiatan KURANG, maka Hasilnya TIDAK LULUS'),
('R11', 'Jika nilai Absensi SEDANG dan nilai Pembelajaran BURUK dan nilai Kegiatan BAIK, maka Hasilnya TIDAK LULUS'),
('R12', 'Jika nilai Absensi SEDANG dan nilai Pembelajaran BURUK dan nilai Kegiatan KURANG, maka Hasilnya TIDAK LULUS'),
('R13', 'Jika nilai Absensi RENDAH dan nilai Pembelajaran BAIK dan nilai Kegiatan BAIK, maka Hasilnya TIDAK LULUS'),
('R14', 'Jika nilai Absensi RENDAH dan nilai Pembelajaran BAIK dan nilai Kegiatan KURANG, maka Hasilnya TIDAK LULUS'),
('R15', 'Jika nilai Absensi RENDAH dan nilai Pembelajaran CUKUP dan nilai Kegiatan BAIK, maka Hasilnya TIDAK LULUS'),
('R16', 'Jika nilai Absensi RENDAH dan nilai Pembelajaran CUKUP dan nilai Kegiatan KURANG, maka Hasilnya TIDAK LULUS'),
('R17', 'Jika nilai Absensi RENDAH dan nilai Pembelajaran BURUK dan nilai Kegiatan BAIK, maka Hasilnya TIDAK LULUS'),
('R18', 'Jika nilai Absensi RENDAH dan nilai Pembelajaran BURUK dan nilai Kegiatan KURANG, maka Hasilnya TIDAK LULUS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `calon_anggota`
--
ALTER TABLE `calon_anggota`
  ADD PRIMARY KEY (`stb`);

--
-- Indeks untuk tabel `penerapan`
--
ALTER TABLE `penerapan`
  ADD PRIMARY KEY (`id_penerapan`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`kd_rule`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
