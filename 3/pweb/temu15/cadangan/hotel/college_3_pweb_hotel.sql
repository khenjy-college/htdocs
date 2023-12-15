-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 08:07 AM
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
-- Database: `college_3_pweb_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fashotel`
--

CREATE TABLE `fashotel` (
  `id_fashotel` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `tes` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fashotel`
--

INSERT INTO `fashotel` (`id_fashotel`, `nama`, `keterangan`, `img`, `tes`) VALUES
(1, 'Kolam Renang', 'Berada di lantai 3 dengan luas 50m persegi', 'kolam.jpg', 0),
(10, 'Makan Sore', 'Berada di teras hotel dengan luas 5m x 10m ', 'lunch.jpg', 0),
(11, 'Musik Theatre', 'Musik theatre sangat bagus', 'tes.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faskamar`
--

CREATE TABLE `faskamar` (
  `id_faskamar` int(11) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faskamar`
--

INSERT INTO `faskamar` (`id_faskamar`, `tipe`, `nama`, `img`) VALUES
(1, 'Superior', 'Kamar berukuran luas 32m2', 'size.jpg'),
(2, 'Superior', 'Kamar mandi shower', 'shower.jpg'),
(3, 'Superior', 'Coffee Maker', 'coffeemaker.jpg'),
(4, 'Superior', 'AC', 'ac.jpg'),
(5, 'Superior', 'LED TV 32 inch', 'tv.jpg'),
(6, 'Deluxe', 'Kamar berukuran luas 45m2', 'size.jpg'),
(7, 'Deluxe', 'Kamar mandi shower', 'bath.jpg'),
(8, 'Deluxe', 'Coffee Maker', 'coffeemaker.jpg'),
(9, 'Deluxe', 'Sofa', 'sofa.jpg'),
(11, 'Deluxe', 'AC', 'ac.jpg'),
(12, 'Deluxe', 'LED TV 40 inch', 'tv.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pemesan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `tamu` varchar(50) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `jlh` int(3) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `cek_in` date NOT NULL,
  `cek_out` date NOT NULL,
  `no_kamar` int(11) DEFAULT NULL,
  `tgl_perubahan` datetime DEFAULT NULL,
  `user_aktif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_pesanan`, `id_user`, `pemesan`, `email`, `hp`, `tamu`, `id_tipe`, `jlh`, `harga_total`, `cek_in`, `cek_out`, `no_kamar`, `tgl_perubahan`, `user_aktif`) VALUES
(34, 33, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 1, 1, 20000, '2023-12-04', '2023-12-05', 1, '2023-12-09 15:20:50', 'Eren'),
(36, 34, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 1, 1, 340000, '2023-12-03', '2023-12-20', 1, '2023-12-11 15:11:51', 'Eren'),
(37, 37, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 1, 1, 0, '2023-12-11', '2023-12-11', 1, '2023-12-11 16:40:00', NULL),
(38, 39, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 1, 1, 20000, '2023-12-11', '2023-12-12', 2, '2023-12-11 22:14:09', 'Eren');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` int(3) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `status` enum('Available','Unavailable','Dirty','Damaged') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `id_tipe`, `id_pesanan`, `status`, `keterangan`) VALUES
(1, 1, NULL, 'Available', 'Baru'),
(2, 1, NULL, 'Available', ''),
(3, 2, NULL, 'Available', ''),
(4, 2, 38, 'Unavailable', ''),
(5, 1, NULL, 'Available', ''),
(6, 3, 36, 'Unavailable', '');

--
-- Triggers `kamar`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER DELETE ON `kamar` FOR EACH ROW BEGIN
UPDATE tipe_kamar SET stok = stok - 1 WHERE id_tipe = OLD.id_tipe;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `kamar` FOR EACH ROW BEGIN
UPDATE tipe_kamar SET stok = stok + 1 WHERE id_tipe = NEW.id_tipe;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id_operations` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `keterangan` text,
  `tgl_perubahan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id_operations`, `no_kamar`, `id_user`, `id_petugas`, `keterangan`, `tgl_perubahan`) VALUES
(1, 1, 2, 1, NULL, '2023-12-02 05:12:42'),
(2, 1, 2, 1, NULL, '2023-12-09 08:12:17'),
(3, 1, 2, 1, NULL, '2023-12-09 08:12:02'),
(4, 1, 2, 1, NULL, '2023-12-09 08:12:08'),
(5, 1, 2, 2, NULL, '2023-12-09 08:12:47'),
(6, 3, 2, 1, 'Semua sudah bersih', '2023-12-09 08:12:57'),
(7, 5, 2, 1, 'sudah diperbaiki', '2023-12-09 08:12:06'),
(8, 4, 2, 2, 'Semua sudah diperbaiki', '2023-12-09 08:12:14'),
(9, 2, 2, 1, 'Kotor banget, udh dibersihkan', '2023-12-11 03:12:54'),
(10, 1, 2, 2, 'Butuh perbaikian wastafel', '2023-12-11 03:12:34');

--
-- Triggers `operations`
--
DELIMITER $$
CREATE TRIGGER `tambah_poin` AFTER INSERT ON `operations` FOR EACH ROW BEGIN
UPDATE petugas SET poin = poin + 1 WHERE id_petugas = NEW.id_petugas;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `metadesc` text NOT NULL,
  `fb` text NOT NULL,
  `ig` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama`, `favicon`, `logo`, `foto`, `alamat`, `email`, `hp`, `metadesc`, `fb`, `ig`) VALUES
(1, 'HOTEL HEBAT', 'favicon.png', 'logo.png', 'foto.jpg', 'Jl Peternakan Dlm III 36, Dki Jakarta', 'hotelhebat@gmail.com', '0-21-541-3829', 'Lepaskan diri Anda ke Hotel Hebat, dikelilingi oleh keindahan pegunungan yang indah, danau, dan sawah menghijau. Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam yang memukau; Kid\'s Club yang luas - menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga. Convention Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di Bandung, mampu mengakomodasi hingga 3.000 delegasi. Manfaatkan ruang penyelenggaraan konvensi M.I.C.E ataupun mewujudkan acara pernikahan adat yang mewah.', 'http://www.facebook.com/hotel.hebat/', 'http://www.instagram.com/hotelhebat/');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pemesan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `tamu` varchar(50) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `jlh` int(3) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `cek_in` date NOT NULL,
  `cek_out` date NOT NULL,
  `status` enum('pending','belum bayar','menunggu','cek in','cek out') NOT NULL,
  `no_kamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `pemesan`, `email`, `hp`, `tamu`, `id_tipe`, `jlh`, `harga_total`, `cek_in`, `cek_out`, `status`, `no_kamar`) VALUES
(36, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khen', 3, 1, 450000, '2023-12-10', '2023-12-19', 'belum bayar', 6),
(38, 3, 'Bill', 'bill@gmail.com', '081234567890', 'Khenjy', 2, 1, 40000, '2023-12-19', '2023-12-20', 'menunggu', 4);

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok_tambah_stok` AFTER UPDATE ON `pesanan` FOR EACH ROW BEGIN 

UPDATE tipe_kamar SET stok = stok - NEW.jlh WHERE id_tipe = NEW.id_tipe AND NEW.status IN ('menunggu');

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_kamar` AFTER DELETE ON `pesanan` FOR EACH ROW BEGIN 
UPDATE tipe_kamar SET stok = stok + OLD.jlh WHERE id_tipe = OLD.id_tipe;

UPDATE kamar SET status = 'Available', id_pesanan = NULL WHERE no_kamar = OLD.no_kamar;

INSERT INTO history ( 
    id_pesanan, 
    id_user, 
    pemesan, 
    email, 
    hp, 
    tamu, 
    id_tipe, 
    jlh, 
    harga_total,
    cek_in, 
    cek_out, 
    no_kamar,
    tgl_perubahan) 
    VALUES (
        OLD.id_pesanan, 
        OLD.id_user, 
        OLD.pemesan, 
        OLD.email, 
        OLD.hp, 
        OLD.tamu, 
        OLD.id_tipe, 
        OLD.jlh, 
        OLD.harga_total, 
        OLD.cek_in, 
        OLD.cek_out, 
        OLD.no_kamar, 
        SYSDATE());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `hp` varchar(35) NOT NULL,
  `img` varchar(255) NOT NULL,
  `role` enum('cleaning','maintenance') NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `email`, `hp`, `img`, `role`, `poin`) VALUES
(1, 'Gusion', 'gusion@gmail.com', '081234567890', 'Gusion_infobox.jpg', 'cleaning', 0),
(2, 'Clint', 'clint@gmail.com', '081234567890', 'Clint_UHDpaper.jpg', 'maintenance', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe` int(11) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `img` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe`, `tipe`, `img`, `stok`, `harga`) VALUES
(1, 'Superior', 'superior.jpg', 3, 20000),
(2, 'Deluxe', 'deluxe.jpg', 1, 40000),
(3, 'Fantasy', 'luxury.jpg', 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `metode` enum('debit','ewallet') NOT NULL,
  `bayar` int(11) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `email`, `id_pesanan`, `metode`, `bayar`, `tgl_transaksi`) VALUES
(7, 3, 'bill@gmail.com', 33, 'debit', 20000, '2023-12-09 08:12:58'),
(8, 3, 'bill@gmail.com', 34, 'debit', 340000, '2023-12-11 08:12:33'),
(9, 3, 'bill@gmail.com', 37, 'ewallet', 0, '2023-12-11 09:12:01'),
(10, 3, 'bill@gmail.com', 38, 'debit', 40000, '2023-12-11 09:12:20'),
(11, 3, 'bill@gmail.com', 39, 'debit', 20000, '2023-12-11 03:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `hp` varchar(13) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `hp`, `level`) VALUES
(1, 'Khen', 'khen@gmail.com', '$2y$10$GbildcAQnSpLsXP3eUfwdOE8K62QTg9C.I8cAVt2W39/jzji6EInm', '081234567890', 'administrator'),
(2, 'Eren', 'eren@gmail.com', '$2y$10$GbildcAQnSpLsXP3eUfwdOE8K62QTg9C.I8cAVt2W39/jzji6EInm', '081234567890', 'resepsionis'),
(3, 'Bill', 'bill@gmail.com', '$2y$10$XnmdXcVLnlEG4XpQgcBOEu0280oRcIbsfe.1vMenpvU/hNiPa824G', '081234567890', 'tamu'),
(4, 'Alex', 'alex@gmail.com', '$2y$10$Opzmu//emEAt23TFZMNv4.50sOfZKrlm5A9tTajJICdfDHYx0spiu', '08123456789', 'accounting'),
(5, 'Alexia', 'alexia@gmail.com', '$2y$10$em34jM46K4dvWlDl.oyu.eAuE6KYh7phUVcvKP8XDDfHkeRafrGWG', '081234567890', 'tamu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fashotel`
--
ALTER TABLE `fashotel`
  ADD PRIMARY KEY (`id_fashotel`);

--
-- Indexes for table `faskamar`
--
ALTER TABLE `faskamar`
  ADD PRIMARY KEY (`id_faskamar`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `htr_id_tipe_fk` (`id_tipe`),
  ADD KEY `htr_id_user_fk` (`id_user`),
  ADD KEY `htr_no_kamar_fk` (`no_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`),
  ADD KEY `kmr_id_pesanan_fk` (`id_pesanan`),
  ADD KEY `kmr_id_tipe_fk` (`id_tipe`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id_operations`),
  ADD KEY `ops_id_petugas_fk` (`id_petugas`),
  ADD KEY `ops_id_user+fk` (`id_user`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `psn_id_user_fk` (`id_tipe`),
  ADD KEY `psn_no_kamar_fk` (`no_kamar`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pesanan_fk` (`id_pesanan`),
  ADD KEY `trs_id_user_fk` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fashotel`
--
ALTER TABLE `fashotel`
  MODIFY `id_fashotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faskamar`
--
ALTER TABLE `faskamar`
  MODIFY `id_faskamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `no_kamar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id_operations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
