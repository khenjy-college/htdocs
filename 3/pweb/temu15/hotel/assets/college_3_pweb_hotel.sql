-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 07:42 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_pesanan` (IN `id_pesanan` INT(11))   BEGIN
	DELETE FROM PESANAN WHERE id_pesanan = id_pesanan;
END$$

DELIMITER ;

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
(10, 'Makan Sore', 'Berada di teras hotel dengan luas 5m x 10m ', 'lunch.jpg', 0);

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
  `tipe` varchar(25) NOT NULL,
  `jlh` int(3) NOT NULL,
  `cek_in` date NOT NULL,
  `cek_out` date NOT NULL,
  `tgl_perubahan` datetime DEFAULT NULL,
  `user_aktif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_pesanan`, `id_user`, `pemesan`, `email`, `hp`, `tamu`, `tipe`, `jlh`, `cek_in`, `cek_out`, `tgl_perubahan`, `user_aktif`) VALUES
(2, 3, 0, 'Khen', 'khen@yahoo.com', '08123456777', 'Jo', 'Superior', 6, '2022-05-19', '2022-05-21', '2022-05-15 21:43:42', 'Eren'),
(3, 4, 0, 'Bill', 'bill@gmail.com', '08123456999', 'Ken', 'Superior', 6, '2022-05-11', '2022-05-18', '2022-05-15 21:43:42', 'Eren'),
(4, 6, 0, 'Steve', 'steve@gmail.com', '08123456888', 'Mark', 'Deluxe', 4, '2022-05-19', '2022-05-27', '2022-05-15 21:51:42', 'Eren'),
(5, 9, 3, 'Bill', 'bill@hotmail.com', ' 08123456000', 'Rem', 'Superior', 2, '2022-05-12', '2022-05-19', '2022-05-16 16:10:14', 'Eren'),
(6, 7, 0, 'Ngga', 'Ngga@gmail.com', '08123456111', 'Mark', 'Superior', 4, '2022-05-11', '2022-05-20', '2022-05-16 16:10:24', 'Eren'),
(7, 8, 3, 'Bill', 'bill@gmail.com', ' 08123456555', 'Ju', 'Deluxe', 4, '2022-05-11', '2022-05-19', '2022-05-16 22:17:21', 'Eren'),
(8, 5, 0, 'Eren', 'eren@gmail.com', '08123456222', 'Khen', 'Superior', 7, '2022-05-12', '2022-05-18', '2022-05-16 22:19:26', 'Eren'),
(9, 11, 0, 'Steve', 'steve@gmail.com', '081234567123', 'Lex', 'Deluxe', 3, '2022-05-12', '2022-05-28', '2022-05-16 22:27:11', 'Eren'),
(10, 13, 3, 'Bill', 'bill@gmail.com', ' 081234567890', 'Juan', 'Superior', 2, '2022-05-17', '2022-05-20', '2023-11-19 16:44:10', 'Eren'),
(11, 15, 0, 'John', 'john@gmail.com', '0812345', 'Khen', 'Superior', 2, '2023-11-19', '2023-11-21', '2023-11-23 17:15:19', 'Eren'),
(12, 14, 0, 'Bill', 'aboy@mail.com', '08123456789', 'Aboy', 'Superior', 3, '2022-06-21', '2022-06-22', '2023-11-25 00:03:16', 'Eren');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` int(3) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `status` enum('Available','Unavailable','Dirty','Damaged') NOT NULL,
  `jmlh_tamu` int(2) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tipe` varchar(25) NOT NULL,
  `jlh` int(3) NOT NULL,
  `cek_in` date NOT NULL,
  `cek_out` date NOT NULL,
  `status` enum('menunggu','cek in','cek out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `pemesan`, `email`, `hp`, `tamu`, `tipe`, `jlh`, `cek_in`, `cek_out`, `status`) VALUES
(9, 3, 'Bill', 'bill@gmail.com', ' 081234567890', 'Mark', 'Superior', 3, '2022-05-01', '2022-05-11', 'cek in'),
(10, 0, 'Dit', 'dit@gmail.com', '0123456789', 'Ril', 'Superior', 3, '2022-05-13', '2022-05-20', 'cek in'),
(12, 3, 'Bill', 'bill@gmail.com', ' 081234567890', 'KhunKhen', 'Superior', 2, '2022-05-20', '2022-05-21', 'cek in'),
(16, 3, 'Bill', 'bill@gmail.com', ' 081234567890', 'Khenjy', 'Deluxe', 4, '2023-11-20', '2023-11-24', 'cek in');

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `kurang_kamar` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN UPDATE tipe_kamar SET stok = stok - NEW.jlh WHERE tipe = NEW.tipe; END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_kamar` AFTER DELETE ON `pesanan` FOR EACH ROW BEGIN 
UPDATE tipe_kamar SET stok = stok + OLD.jlh WHERE tipe = OLD.tipe;

INSERT INTO history (id_pesanan, id_user, pemesan, email, hp, tamu, tipe, jlh, cek_in, cek_out, tgl_perubahan) VALUES (OLD.id_pesanan, OLD.id_user, OLD.pemesan, OLD.email, OLD.hp, OLD.tamu, OLD.tipe, OLD.jlh, OLD.cek_in, OLD.cek_out, SYSDATE()); END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe` int(11) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `img` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe`, `tipe`, `img`, `stok`) VALUES
(1, 'Superior', 'superior.jpg', 44),
(2, 'Deluxe', 'deluxe.jpg', 40),
(3, 'Fantasy', '2021428161854.jpg', 19);

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
(1, 'Khen', 'khen@gmail.com', '$2y$10$GbildcAQnSpLsXP3eUfwdOE8K62QTg9C.I8cAVt2W39/jzji6EInm', ' 081234567890', 'administrator'),
(2, 'Eren', 'eren@gmail.com', '$2y$10$GbildcAQnSpLsXP3eUfwdOE8K62QTg9C.I8cAVt2W39/jzji6EInm', ' 081234567890', 'resepsionis'),
(3, 'Bill', 'bill@gmail.com', '$2y$10$wXzeuLpHKMQ21yyLRK6XbuSedhj0CoNv2hPW01odxSnXBAt1ezUa.', ' 081234567890', 'tamu'),
(4, 'Alex', 'alex@gmail.com', '$2y$10$Opzmu//emEAt23TFZMNv4.50sOfZKrlm5A9tTajJICdfDHYx0spiu', '08123456789', 'tamu');

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
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe`);

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
  MODIFY `id_fashotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faskamar`
--
ALTER TABLE `faskamar`
  MODIFY `id_faskamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
