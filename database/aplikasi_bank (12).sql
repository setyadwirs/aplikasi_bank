-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2024 at 10:33 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jam_masuk` varchar(255) NOT NULL,
  `tanggal_masuk` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `nik`, `jam_masuk`, `tanggal_masuk`, `status`) VALUES
(46, '6304503843857', '09:46:06', '2024-08-07', 'Telat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensipulang`
--

CREATE TABLE `tb_absensipulang` (
  `id_absensipulang` int NOT NULL,
  `nik` varchar(255) NOT NULL,
  `jam_pulang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_pulang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absensipulang`
--

INSERT INTO `tb_absensipulang` (`id_absensipulang`, `nik`, `jam_pulang`, `tanggal_pulang`, `status`) VALUES
(46, '6304503843857', '09:45:35', '2024-08-07', 'Hadir'),
(47, '6304503843857', '09:48:27', '2024-08-07', 'Hadir'),
(48, '6304503843857', '09:51:28', '2024-08-07', 'Hadir'),
(49, '6304', '06:46:46', '2024-08-11', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id_cuti` int NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_mulai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_sampai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alasan_cuti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Diajukan','Disetujui','Ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alasan_status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cuti`
--

INSERT INTO `tb_cuti` (`id_cuti`, `nik`, `tanggal_mulai`, `tanggal_sampai`, `alasan_cuti`, `foto`, `status`, `alasan_status`) VALUES
(61, '6304503843857', '2024-08-03', '2024-08-10', 'Mau Uas', '11.pdf', 'Diajukan', 'DisetujuDisetujui Untuk Peminjamanya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ttl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `ttl`, `alamat`, `no_hp`, `jenis_kelamin`, `agama`, `jabatan`, `foto`, `username`, `password`, `level`) VALUES
(16, '6304503843857', 'Lukman', 'Loktamu, 09 Juni 2020', 'Jl Pulau Alalak', '08123425627', 'Laki - Laki', 'Islam', 'Karyawan', 'download (14).png', 'lukman', 'lukman', 'Karyawan'),
(17, '6304', 'Fuzi', 'Loktamu, 09 Juni 2020', 'Jl Pulau Alalak', '08123425627', 'Laki - Laki', 'Islam', 'Karyawan', 'f331409f-f1f1-4c97-9a98-af093178d0f6.jpg', 'fauzi', 'fauzi', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsumsi`
--

CREATE TABLE `tb_konsumsi` (
  `id_konsumsi` int NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pulang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dana_konsumsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_konsumsi`
--

INSERT INTO `tb_konsumsi` (`id_konsumsi`, `nik`, `tanggal_pulang`, `dana_konsumsi`, `status`) VALUES
(6, '6304503843857', '2024-08-07', '15000', 'Hadir'),
(7, '6304', '2024-08-11', '15000', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nasabah`
--

CREATE TABLE `tb_nasabah` (
  `id_nasabah` int NOT NULL,
  `nama_nasabah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ttl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pendapatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_nasabah`
--

INSERT INTO `tb_nasabah` (`id_nasabah`, `nama_nasabah`, `nik`, `ttl`, `alamat`, `no_telepon`, `email`, `agama`, `jenis_kelamin`, `nama_ibu`, `pekerjaan`, `pendapatan`, `foto`, `file_ktp`, `username`, `password`, `level`) VALUES
(5, 'Adam', '45489757566', 'Loktamu, 09 Juni 2020', 'Jl Pulau Alalak', '08754324569', 'fauzipurwanto7787@gmail.com', 'Islam', 'Laki - Laki', 'Lako', 'Admin Sales', '3.200.000', 'download (15).png', 'download (14).png', 'adam', 'adam', 'Nasabah'),
(6, 'Yani', '64853975475403', 'Loktamu, 09 Juni 2020', 'Jl Banjarbaru', '08754324569', 'yani@gmail.com', 'Islam', 'Perempuan', 'Lako', 'Admin Sales', '3.200.000', 'download (17).png', 'download (17).png', 'yani', 'yani', 'Nasabah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nik`, `nama`, `telepon`, `alamat`, `username`, `password`, `level`, `foto`) VALUES
(5, '1', 'Setya', '08634254273', 'Jl Banjarbaru', 'admin', 'admin', 'Admin', 'images__2_-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjaman` int NOT NULL,
  `nama_nasabah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pengajuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_pinjaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jaminan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `keperluan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_survei` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status_survei` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status_pengajuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alasan_status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`id_pinjaman`, `nama_nasabah`, `nik`, `email`, `tanggal_pengajuan`, `jumlah_pinjaman`, `jaminan`, `keperluan`, `tanggal_survei`, `status_survei`, `status_pengajuan`, `alasan_status`) VALUES
(15, 'Adam', '45489757566', 'fauzipurwanto7787@gmail.com', '2024-08-15', '450000000', 'BPKB Motor', 'ds', '2024-08-15', 'Proses Disurvei', 'Disetujui', 'Bagus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tb_absensipulang`
--
ALTER TABLE `tb_absensipulang`
  ADD PRIMARY KEY (`id_absensipulang`);

--
-- Indexes for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_konsumsi`
--
ALTER TABLE `tb_konsumsi`
  ADD PRIMARY KEY (`id_konsumsi`);

--
-- Indexes for table `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_absensipulang`
--
ALTER TABLE `tb_absensipulang`
  MODIFY `id_absensipulang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  MODIFY `id_cuti` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_konsumsi`
--
ALTER TABLE `tb_konsumsi`
  MODIFY `id_konsumsi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  MODIFY `id_nasabah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `id_pinjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
