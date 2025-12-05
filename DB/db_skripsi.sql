-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Feb 2023 pada 13.26
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
-- Struktur dari tabel `aspek_penilaian`
--

CREATE TABLE `aspek_penilaian` (
  `id_aspek_penilaian` varchar(11) NOT NULL,
  `nama_aspek_penilaian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aspek_penilaian`
--

INSERT INTO `aspek_penilaian` (`id_aspek_penilaian`, `nama_aspek_penilaian`) VALUES
('AP002', 'PEMBELAJARAN'),
('AP003', 'KEGIATAN'),
('AP005', 'ABSENSI');

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
(201021, 'Rahmat Hidayat Daud', 'Luwu', '2003-10-22', 'Laki - Laki', 'ponrang selatan', '081783651876', 'daudhidaya@gmail.com', 'Sistem Informasi (S1)', 'noavatar.jpg'),
(202050, 'Rahmat. S', 'Soppeng', '2003-06-27', 'Laki - Laki', 'Ganra', '087985219768', 'Rahmat09@gmail.com', 'Teknik Informatika (S1)', 'noavatar.jpg'),
(202072, 'Syahrul Rifaldy Amnur', 'Lanne', '2001-08-20', 'Laki - Laki', 'Pangkep', '082478921567', 'syahrulrifaldy@gmail.com', 'Teknik Informatika (S1)', 'noavatar.jpg'),
(211073, 'Welly Dwi Pangloli', 'Makassar', '2002-06-17', 'Perempuan', 'Btn Jl. perintis Km. 09', '087211789650', 'wellydwi@gmail.com', 'Sistem Informasi (S1)', 'noavatar.jpg'),
(211075, 'Muhammad Galby Ilyushar Rada', 'Daya', '2002-02-04', 'Laki - Laki', 'Daya Paccerangkkang No. 12', '08712376135798', 'galby@gmail.com', 'Sistem Informasi (S1)', 'noavatar.jpg'),
(211091, 'Putra Zulrisky', 'Ujung Pandang', '2003-03-03', 'Laki - Laki', 'Perumahan Ujung Pandang Blok 2 no.01', '081784671234', 'putraz@gmail.com', 'Sistem Informasi (S1)', 'noavatar.jpg'),
(212071, 'Natalia Rara', 'Enrekang', '2003-10-07', 'Perempuan', 'Jl. poros kotu No.24', '082576890651', 'raraofficial@gmail.com', 'Teknik Informatika (S1)', 'noavatar.jpg'),
(212209, 'Triggyan Paschal Parante', 'Kurra', '2003-10-20', 'Laki - Laki', 'btp blok c no.18', '082387982777', 'triggyanparante@gmail.com', 'Teknik Informatika (S1)', 'noavatar.jpg'),
(212255, 'Irviani Mangeta', 'Toraja', '2003-10-11', 'Perempuan', 'Makale', '08277812309861', 'mangetairviana@gmail.com', 'Teknik Informatika (S1)', 'noavatar.jpg'),
(212260, 'Nelce Sulle', 'marusu', '2002-12-18', 'Perempuan', 'Daya', '0872907623982', 'nelcesulle@gmail.com', 'Teknik Informatika (S1)', 'noavatar.jpg'),
(212290, 'Darmin Bara\' Tulak', 'Toraja', '2003-04-18', 'Laki - Laki', 'Nusa Tamalanrea Indah', '085925826516', 'darminnnaa@gmail.com', 'Teknik Informatika (S1)', 'noavatar.jpg'),
(212298, 'Yunus Pabetteng', 'Toraja', '2003-01-02', 'Laki - Laki', 'Biituang', '081809234872', 'ynspabeeteng@gmail.com', 'Teknik Informatika (S1)', 'noavatar.jpg'),
(212310, 'Novly Gunawan', 'Masamba', '2003-09-29', 'Laki - Laki', 'Baliase', '081234766542', 'Novly277@gmail.com', 'Teknik Informatika (S1)', 'noavatar.jpg'),
(213007, 'Muhammad Akmal Firdaus', 'Makassar', '2002-07-30', 'Laki - Laki', 'sukaria v no. 12', '081890765231', 'akmal123@gmail.com', 'Manajemen Informatika (D3)', 'noavatar.jpg'),
(213011, 'Fadlur Rohman Dzaki Akbar', 'Makassar', '2002-07-02', 'Laki - Laki', 'BTP Tamanlanrea', '081345781234', 'Fadhlur@gamil.com', 'Manajemen Informatika (D3)', 'noavatar.jpg');

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
('M001', '213011', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('M002', '211075', '1', '0', '0', '0.8', '0.2', '0', '0.66666666666667', '0.33333333333333', '89', '1.4', '0.61904761904762', '0.38095238095238', '63.571428571429', 'Lulus'),
('M003', '213007', '0.5', '0.5', '0', '1', '0', '0', '0.66666666666667', '0.33333333333333', '103.33333333333', '1.6666666666667', '0.56666666666667', '0.43333333333333', '62', 'Lulus'),
('M004', '212071', '1', '0', '0', '0.2', '0.8', '0', '0.33333333333333', '0.66666666666667', '79', '1.4', '0.38095238095238', '0.61904761904762', '56.428571428571', 'Tidak Lulus'),
('M005', '211091', '1', '0', '0', '0.75', '0.25', '0', '0.66666666666667', '0.33333333333333', '95', '1.5', '0.61111111111111', '0.38888888888889', '63.333333333333', 'Lulus'),
('M006', '201021', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('M007', '212310', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('M008', '211073', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('M009', '202050', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('M010', '202072', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('M011', '212255', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('M012', '212298', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('M013', '2122990', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('M014', '212260', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('M015', '212209', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
('P001', '213011', '6', '60', '3'),
('P002', '211075', '2', '76', '3'),
('P003', '213007', '4', '80', '3'),
('P004', '212071', '1', '64', '2'),
('P005', '211091', '1', '75', '3'),
('P006', '201021', '2', '81', '3'),
('P007', '212310', '4', '90', '3'),
('P008', '211073', '7', '85', '2'),
('P009', '202050', '8', '59', '3'),
('P010', '202072', '4', '85', '3'),
('P011', '212255', '10', '50', '2'),
('P012', '212298', '11', '55', '2'),
('P013', '2122990', '2', '96', '3'),
('P014', '212260', '4', '77', '3'),
('P015', '212209', '5', '85', '3');

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
-- Indeks untuk tabel `aspek_penilaian`
--
ALTER TABLE `aspek_penilaian`
  ADD PRIMARY KEY (`id_aspek_penilaian`);

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
