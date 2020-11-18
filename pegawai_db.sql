-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 10:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_departemen`
--

CREATE TABLE `tabel_departemen` (
  `id_departemen` varchar(5) NOT NULL,
  `nama_departemen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_departemen`
--

INSERT INTO `tabel_departemen` (`id_departemen`, `nama_departemen`) VALUES
('A001', 'IT'),
('A002', 'KEUANGAN'),
('A003', 'HRD'),
('A004', 'PEMASARAN');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jabatan`
--

CREATE TABLE `tabel_jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_jabatan`
--

INSERT INTO `tabel_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('J01', 'Manager'),
('J02', 'Pegawai Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pegawai`
--

CREATE TABLE `tabel_pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `alamat_pegawai` varchar(100) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `id_departemen` varchar(5) NOT NULL,
  `foto_pegawai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pegawai`
--

INSERT INTO `tabel_pegawai` (`id_pegawai`, `nama_pegawai`, `alamat_pegawai`, `id_jabatan`, `id_departemen`, `foto_pegawai`) VALUES
(192, 'Monalisa', 'bali', 'J01', 'A003', '5fb59118a9fce.jpg'),
(197, 'test', 'test', 'J01', 'A001', '5fb592a0b3b08.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_departemen`
--
ALTER TABLE `tabel_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `tabel_jabatan`
--
ALTER TABLE `tabel_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_departemen` (`id_departemen`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD CONSTRAINT `jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `tabel_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_pegawai_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `tabel_departemen` (`id_departemen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
