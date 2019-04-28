-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2019 at 05:07 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `prodi`, `gambar`) VALUES
('17053562950', 'amirudin', 'kediri', '2019-12-31', 'L', 'Teknik informatika', 'default.jpg'),
('170535629502', 'khoirul anam', 'dampit', '2019-12-31', 'L', 'Sistem informasi', 'default.jpg'),
('170535629505', 'amirudin', 'kediri', '2019-12-31', 'L', 'Teknik informatika', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `tahun_terbit` varchar(12) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `isbn`, `jumlah_buku`, `tahun_terbit`, `tgl_input`) VALUES
(1, 'belajar html dan css', 'stevan radu', 'malang press', 'fasgf2345', 9, '2019', '2019-02-07'),
(2, 'mahir javascript', 'anonymous', 'intan pariwara', 'asd2018', 21, '2018', '2019-02-05'),
(4, 'malin kundang', 'anam', 'gak jelas press', 'ads12314', 24, '2013', '2019-12-31'),
(5, 'aa', 'aa', 'aa', 'afa141412', 13, '2313', '2019-12-31'),
(6, 'Tutorial Misuh', 'Anam', 'Jancokproduction', '123456hoho', 1, '2010', '2019-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id_transaksi` varchar(12) NOT NULL,
  `kode_buku` varchar(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_denda` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `id_buku` int(12) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `perpanjang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_buku`, `judul`, `nim`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`, `perpanjang`) VALUES
('20190326001', 1, 'belajar html dan css', '17053562950', 'khoirul anam', '2019-03-26', '2019-04-02', 'di pinjam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(12) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `date_created`) VALUES
('170535629502', 'khoirul anam', 'froxy', '$2y$10$GP9bnZZ272zLl7UFFMZV9ON.Qid1jWTj0g9ibtSkEklVQ71gUyYOG', 2, 1553595707),
('170535629503', 'nasrulloh', 'nasrll', '$2y$10$EeudtJ7EaUF02RdqjJgnOubRMEg67Y4f9SigQjXtfoF8ZL1vZAgc6', 2, 1553544505),
('170535629504', 'yahya', 'yahya', '$2y$10$crmGLWXWWjo28NHDbreGXOWG9NSI4SYKpMUIeSnKe2qXhrUGYrpou', 1, 1553539499),
('170535629505', 'amirudin', 'amirudin', '$2y$10$KaA3KyAQUY.00JD8gJ/Sdee8aEb7ohqra/SQy5zK8fDZPOpQ8GmR2', 2, 1553539519);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `judul` (`judul`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `tb_anggota` (`nim`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
