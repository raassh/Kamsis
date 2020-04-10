-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 06:37 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(14) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `status`) VALUES
('1', 'rangga', '$2y$10$sh8M9/cAsnreJUlHjPYKrutM0knDfXkKJBPOUTTQ1aqDjQ/yu8X6m', 'user'),
('2', 'ade', '$2y$10$c9.x7WApl84NOl7r1/4f1uoj08A8TzQRvKojKGR//bHCkA4M.JKE6', 'admin'),
('3', 'hasing', '$2y$10$5gnuH7krKKFGZZku/L5IBOyPwzyqlouUH35t1MrkOe0dCtAzKl62a', '');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `kd_komentar` varchar(14) NOT NULL,
  `comment` varchar(144) NOT NULL,
  `kd_terbit` varchar(14) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`kd_komentar`, `comment`, `kd_terbit`, `tanggal`, `email`, `nama`) VALUES
('kdk0001', 'bagus', 'kdt0001', '2020-04-09 16:02:10', '', 'anon'),
('kdk0002', 'asdasd', 'kdt0001', '2020-04-10 02:57:59', 'anggadwi@yahoo.com', 'sasa'),
('kdk0003', 'bagus', 'kdt0001', '2020-04-10 02:58:39', 'anggadwi@yahoo.com', 'gaga'),
('kdk0005', 'sasasasa', 'kdt0001', '2020-04-10 03:03:49', 'anggadwi@yahoo.com', 'fafa'),
('kdk0006', 'sasada', 'kdt0001', '2020-04-10 03:06:22', 'asaasd@gmail.com', 'ddedee'),
('kdk0007', 'asdasd', 'kdt0001', '2020-04-10 03:12:18', 'anggadwi@yahoo.com', 'dede'),
('kdk0008', 'sipp', 'kdt0001', '2020-04-10 03:13:32', 'anggadwi@yahoo.com', 'juju');

-- --------------------------------------------------------

--
-- Table structure for table `terbitan`
--

CREATE TABLE `terbitan` (
  `kd_terbit` varchar(14) NOT NULL,
  `post` varchar(10000) NOT NULL,
  `admin_id` varchar(14) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `judul` varchar(330) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terbitan`
--

INSERT INTO `terbitan` (`kd_terbit`, `post`, `admin_id`, `tanggal`, `judul`) VALUES
('kdt0001', 'Bilakah kau bertanya esok seperti apa dunia?\r\n\r\nIa yang lelah, ia yang terlalu banyak menjadi saksi\r\n\r\nDunia yang bosan, manusia terus mengucapkan kemunafikan\r\n\r\nTiang renta terus tergeruk oleh serakahnya\r\n\r\nBila bumi dihancurkan, kami telah membaca\r\n\r\nGunung dan kapas berterbangan\r\n\r\nKandungan yang gugur, kami menjadi lupa diri karena ngeri\r\n\r\nAmpunan telah tertutup, hanya penyesalan yang membuat kita sama\r\n\r\nBila lah mana matahari lupa akan garis edarnya\r\n\r\nKata ampun sudah tidak lagi bermakna', '1', '2020-04-05 15:28:58', 'Esok hari'),
('kdt0003', 'Untuk siapa semua kerja dan susah payah\r\n\r\nKabarnya ada ganjaran berupa surga dan neraka\r\n\r\nHingga lelah tidak lagi dapat dirasa, hingga sakit tidak lagi bisa mempengaruhi\r\n\r\nMereka bermaksud apa dengan kerja keras dan susah payah\r\n\r\nKatanya ada segunung harta yang menjadi perebutan semua manusia\r\n\r\nUntuk apa bumi sibuk tiada henti\r\n\r\nKami memiliki peta hidup sendiri-sendiri\r\n\r\nTentang pahala dan dosa, kami tidak peduli\r\n\r\nHidup menjadi baik agar hidupmu baik\r\n\r\nYang maha adil melihat dari langit yang begitu tinggi', '1', '2020-04-05 13:49:35', 'Hakim Maha Adil'),
('kdt0004', 'Dalam dunia yang gelap, nyatanya tidak semua memerlukan cahaya\r\n\r\nDalam hamparan yang bisu, tidak semua telinga memerlukan alunan merdu\r\n\r\nMata menjadi menyala kepada apa yang telah bulat terkunci anak panah\r\n\r\nSayup-sayup musik tidak lagi penting, dalam hati telah bernyanyi lagu-lagu cambuk diri\r\n\r\nUntuk bersujud kami berjuang\r\n\r\nMelawan mata peluru dan anak panah bermesin\r\n\r\nHanya untuk bertamu ke rumah Tuhan kami\r\n\r\nSatu langkah mungkin saja kami hanya mendapatkannya hari ini\r\n\r\nGerakan kecil membangunkan moncong meriam memilih kepala-kepala menempel tanah\r\n\r\nSeperti kesiaan kalian terus menabur  lelah memberikan sakit pada kaum kami\r\n\r\nTidak ada keraguan, tidak punya rasa takut, berdiri diatas duri, sujud meski meteor menghujani', '1', '2020-04-05 14:51:48', 'Menaklukkan Rasa Sakit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`kd_komentar`),
  ADD KEY `fk_terbitan` (`kd_terbit`);

--
-- Indexes for table `terbitan`
--
ALTER TABLE `terbitan`
  ADD PRIMARY KEY (`kd_terbit`),
  ADD KEY `foreignkey_admin` (`admin_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_terbitan` FOREIGN KEY (`kd_terbit`) REFERENCES `terbitan` (`kd_terbit`);

--
-- Constraints for table `terbitan`
--
ALTER TABLE `terbitan`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
