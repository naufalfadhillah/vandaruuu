-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 08:20 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vandaruuu`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `booking_id_pelanggan` int(20) NOT NULL,
  `booking_id_kamar` int(20) NOT NULL,
  `booking_durasi` int(11) NOT NULL,
  `booking_tgl_pesan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_tgl_check_in` datetime NOT NULL,
  `booking_status` enum('Menunggu Pembayaran','Sudah dibayar','Dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(20) NOT NULL,
  `content_judul` varchar(100) NOT NULL,
  `content_isi` text NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content_judul`, `content_isi`, `created_by`, `created_date`, `updated_by`, `updated_date`, `status`, `file`) VALUES
(1, 'test berita', '<p>berita ini merupakan test</p>\r\n', 'admin', '2020-02-11', 'admin', '2020-02-17', 'Aktif', 'berita/_1581356727.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_id_booking` int(20) NOT NULL,
  `feedback_isi` text NOT NULL,
  `feedback_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foto_galeri`
--

CREATE TABLE `foto_galeri` (
  `id` int(11) NOT NULL,
  `id_galeri` int(11) NOT NULL,
  `nama_foto` varchar(100) NOT NULL,
  `Keterangan_foto` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_galeri`
--

INSERT INTO `foto_galeri` (`id`, `id_galeri`, `nama_foto`, `Keterangan_foto`, `file`, `created_by`, `created_date`, `updated_by`, `updated_date`, `status`) VALUES
(3, 4, 'flig_1581349307.jpg', '', '/foto_galeri/flig_1581349307.jpg', 'admin', '2020-02-10', '', '0000-00-00', 'Aktif'),
(4, 4, 'fligt_1581349307.png', '', '/foto_galeri/fligt_1581349307.png', 'admin', '2020-02-10', '', '0000-00-00', 'Aktif'),
(5, 3, 'f_1581425046.jpg', '', '/foto_galeri/f_1581425046.jpg', 'admin', '2020-02-11', '', '0000-00-00', 'Aktif'),
(6, 4, 'tiket_1581443870.png', '', '/foto_galeri/tiket_1581443870.png', 'admin', '2020-02-12', '', '0000-00-00', 'Aktif'),
(7, 4, 'txi_1581443870.png', '', '/foto_galeri/txi_1581443870.png', 'admin', '2020-02-12', '', '0000-00-00', 'Aktif'),
(8, 3, 'txi_1581443870.png', '', '/foto_galeri/txi_1581443870.png', 'admin', '2020-02-12', '', '0000-00-00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `foto_kamar`
--

CREATE TABLE `foto_kamar` (
  `foto_id_foto` int(20) NOT NULL,
  `foto_id_kamar` int(20) NOT NULL,
  `foto_kamar` text,
  `file` text,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_kamar`
--

INSERT INTO `foto_kamar` (`foto_id_foto`, `foto_id_kamar`, `foto_kamar`, `file`, `created_by`, `created_date`, `updated_by`, `updated_date`, `status`) VALUES
(2, 3, 'flig_1581440895.jpg', '/foto_kamar/flig_1581440895.jpg', 'admin', '2020-02-12', NULL, NULL, 'Aktif'),
(3, 3, 'fligt_1581440895.png', '/foto_kamar/fligt_1581440895.png', 'admin', '2020-02-12', NULL, NULL, 'Aktif'),
(4, 3, 'hotels_1581440895.png', '/foto_kamar/hotels_1581440895.png', 'admin', '2020-02-12', NULL, NULL, 'Aktif'),
(5, 3, 'images_1581440895.png', '/foto_kamar/images_1581440895.png', 'admin', '2020-02-12', NULL, NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(11) NOT NULL,
  `galeri_nama` varchar(100) DEFAULT NULL,
  `galeri_keterangan` text,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `galeri_nama`, `galeri_keterangan`, `created_by`, `created_date`, `updated_by`, `updated_date`, `status`) VALUES
(3, '123', '<p>123123</p>\r\n', 'admin', '2020-02-09', 'admin', '2020-02-09', 'Aktif'),
(4, 'pesawat', '<p>ini icon pesawat..</p>\r\n', 'admin', '2020-02-10', 'admin', '2020-02-10', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kamar_id` int(20) NOT NULL,
  `kamar_nama` varchar(30) NOT NULL,
  `kamar_type` varchar(30) NOT NULL,
  `kamar_harga` int(11) DEFAULT NULL,
  `kamar_deskripsi` text,
  `kamar_foto` text,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `kamar_status` enum('Tersedia','Dibooking','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kamar_id`, `kamar_nama`, `kamar_type`, `kamar_harga`, `kamar_deskripsi`, `kamar_foto`, `created_by`, `created_date`, `updated_by`, `updated_date`, `kamar_status`) VALUES
(3, 'Melati room', 'President Suite', 1000000, '<p>Kamar Besar......</p>\r\n', '/foto_galeri/flig_1581349307.jpg', 'admin', '2020-02-12', '', NULL, 'Tersedia'),
(4, 'Mawar room', 'President Suite', 1000000, '<p>Kamar Besar......</p>\r\n', '/foto_galeri/flig_1581349307.jpg', 'admin', '2020-02-12', '', NULL, 'Tersedia'),
(5, 'Tulip room', 'President Suite', 1000000, '<p>Kamar Besar......</p>\r\n', '/foto_galeri/flig_1581349307.jpg', 'admin', '2020-02-12', '', NULL, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1576342558),
('m130524_201442_init', 1576342569);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(20) NOT NULL,
  `pelanggan_nama` varchar(50) NOT NULL,
  `pelanggan_jk` enum('Pria','Wanita') NOT NULL,
  `pelanggan_alamat` text NOT NULL,
  `pelanggan_tgl_lahir` date NOT NULL,
  `pelanggan_no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(20) NOT NULL,
  `pembayaran_id_booking` int(20) NOT NULL,
  `pembayaran_jumlah` int(11) NOT NULL,
  `pembayaran_tgl_bayar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pembayaran_resi` text NOT NULL,
  `status` enum('Belum','Sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `setting_nama` varchar(100) DEFAULT NULL,
  `setting_alamat` varchar(200) DEFAULT NULL,
  `setting_email` varchar(100) DEFAULT NULL,
  `setting_phone` varchar(100) DEFAULT NULL,
  `setting_fax` varchar(100) DEFAULT NULL,
  `setting_facebook` varchar(100) DEFAULT NULL,
  `setting_instagram` varchar(100) DEFAULT NULL,
  `setting_whatsapp` varchar(100) DEFAULT NULL,
  `latitudeP` text,
  `longitudeP` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `setting_nama`, `setting_alamat`, `setting_email`, `setting_phone`, `setting_fax`, `setting_facebook`, `setting_instagram`, `setting_whatsapp`, `latitudeP`, `longitudeP`) VALUES
(1, 'Vandaru', 'Jl. Pekanbaru', 'vandaru@gmail.com', '085421242', '0762421251', 'http://facebook.com', 'http://instagram.com', 'http://whatsapp', '0.5237665979874837', '101.46408318848262');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `hp` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('1','2') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `first_name`, `last_name`, `gender`, `hp`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1vgtNGG-aciL7ZjWi7whQ1wS8HTFgEh1', '$2y$13$0IWsvq8XDXNNj0PxsrBEG.ZXrdEElq8OKJikpo3A4tWaOZD/9AHRq', NULL, 'admin@vandaru.com', 10, '', '', '', '', '1', 1576342894, 1576342894),
(8, 'naufal', 'swM7dkAWqt6Ki-K5_fu-_0JFGr2d5kEE', '1234567890', 'gOr0JIyYaqAY13Ogb0kGRYGKZ1PY2d7e_1577779599', 'asd@as.com', 10, 'naufal', 'fadhillah', 'M', '081234214', '2', 1577779599, 1577889853),
(9, 'siddiq', 'lHkK_R-IJc73nzeoVe98QfSUEUwaweja', '$2y$13$f52ojwWlOpYjzX/nt4DC9eEUA09xHCM8LS0R2vKHUSshkKJlWxXb2', 'AW5ZUZoJLvQF5A4O1tHyi_GJOqHOcbYy_1577804883', 'azharsiddiq@example.com', 10, 'azhar', 'siddiq', 'M', '081294202010', '2', 1577804883, 1577804883),
(10, 'fahri', 'hQS7j086nP2amB9uLPPUTn2xFSu85_5x', '$2y$13$TStAXtcDGkyGAV7Wa5lQpO3DXB6CxoU2Xs0QpMmLPfKYU6usJ/1fW', 'uAcPKZI-5avpWp2bA8H1wkh2SjiYuTCQ_1578451150', 'fahri@gmail.com', 10, 'fahri', 'fahri', 'M', '085453434', '2', 1578451150, 1578451150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `id_pelanggan` (`booking_id_pelanggan`),
  ADD KEY `id_kamar` (`booking_id_kamar`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `id_booking` (`feedback_id_booking`);

--
-- Indexes for table `foto_galeri`
--
ALTER TABLE `foto_galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_galeri` (`id_galeri`);

--
-- Indexes for table `foto_kamar`
--
ALTER TABLE `foto_kamar`
  ADD PRIMARY KEY (`foto_id_foto`),
  ADD KEY `foto_kamar_id` (`foto_id_kamar`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kamar_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `id_booking1` (`pembayaran_id_booking`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foto_galeri`
--
ALTER TABLE `foto_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `foto_kamar`
--
ALTER TABLE `foto_kamar`
  MODIFY `foto_id_foto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `kamar_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_kamar` FOREIGN KEY (`booking_id_kamar`) REFERENCES `kamar` (`kamar_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_pelanggan` FOREIGN KEY (`booking_id_pelanggan`) REFERENCES `pelanggan` (`pelanggan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_booking` FOREIGN KEY (`feedback_id_booking`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto_galeri`
--
ALTER TABLE `foto_galeri`
  ADD CONSTRAINT `foto_galeri_ibfk_1` FOREIGN KEY (`id_galeri`) REFERENCES `galeri` (`galeri_id`);

--
-- Constraints for table `foto_kamar`
--
ALTER TABLE `foto_kamar`
  ADD CONSTRAINT `foto_kamar_id` FOREIGN KEY (`foto_id_kamar`) REFERENCES `kamar` (`kamar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`pembayaran_id_booking`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
