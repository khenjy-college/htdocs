-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 07:41 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_uvers_skpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `password` text NOT NULL,
  `nama_admin` char(25) NOT NULL,
  `email_admin` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id_laptop` int(11) NOT NULL,
  `merk` char(25) NOT NULL,
  `model` char(25) NOT NULL,
  `ukuran_layar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` char(50) NOT NULL,
  `nim` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `password` text NOT NULL,
  `jenis_kelamin` char(50) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spesifikasi_laptop`
--

CREATE TABLE `spesifikasi_laptop` (
  `id_laptop` int(11) NOT NULL,
  `id_spek` int(11) NOT NULL,
  `procesor` char(20) NOT NULL,
  `ram` int(11) NOT NULL,
  `penyimpanan` char(1) NOT NULL,
  `kartu_grafis` char(1) NOT NULL,
  `sistem_operasi` char(1) NOT NULL,
  `baterai` int(11) NOT NULL,
  `port` char(1) NOT NULL,
  `berat` int(11) NOT NULL,
  `dimensi` char(25) NOT NULL,
  `webcam` char(3) NOT NULL,
  `keyboard` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id_laptop`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `spesifikasi_laptop`
--
ALTER TABLE `spesifikasi_laptop`
  ADD PRIMARY KEY (`id_laptop`,`id_spek`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spesifikasi_laptop`
--
ALTER TABLE `spesifikasi_laptop`
  ADD CONSTRAINT `spesifikasi_laptop_ibfk_1` FOREIGN KEY (`id_laptop`) REFERENCES `laptop` (`id_laptop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
