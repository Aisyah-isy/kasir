-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 02:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_ais`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(11) NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `id_produk` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `sub_total` decimal(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `kode_penjualan`, `id_produk`, `jumlah`, `sub_total`) VALUES
(5, '2401301', 2, 3, 37500.00000),
(6, '2401301', 1, 2, 30000.00000),
(7, '2401301', 3, 11, 49500.00000),
(8, '2402011', 2, 4, 50000.00000),
(10, '2402062', 2, 4, 50000.00000),
(11, '2402063', 3, 12, 54000.00000),
(12, '2402204', 2, 1, 12500.00000),
(14, '2402295', 1, 2, 30000.00000),
(15, '2403141', 8, 3, 36000.00000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_k` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_k`) VALUES
(2, 'Sandang'),
(3, 'Pangan'),
(4, 'Aksesoris'),
(6, 'Buku');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(65) NOT NULL,
  `telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telp`) VALUES
(1, 'aaaaaaay', 'summ', '123'),
(2, 'yuyu', 'ytuy', '123');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` decimal(10,5) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_penjualan`, `tanggal`, `total_harga`, `id_pelanggan`) VALUES
(1, '2402011', '2024-02-01', 50000.00000, 1),
(2, '2402062', '2024-02-06', 50000.00000, 1),
(3, '2402063', '2024-02-06', 54000.00000, 1),
(4, '2402224', '2024-02-22', 9000.00000, 1),
(5, '2402295', '2024-02-29', 30000.00000, 1),
(6, '2403141', '2024-03-14', 36000.00000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok` int(20) NOT NULL,
  `harga` decimal(20,0) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama`, `stok`, `harga`, `id_kategori`) VALUES
(7, 'ASDFF', 'T-shirt', 12, 150000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `surat_26`
--

CREATE TABLE `surat_26` (
  `id_tps_26` int(11) NOT NULL,
  `total_sah_26` int(11) NOT NULL,
  `total_tdk_sah_26` int(11) NOT NULL,
  `no1_26` int(11) NOT NULL,
  `no2_26` int(11) NOT NULL,
  `no3_26` int(11) NOT NULL,
  `total_suara_26` int(11) NOT NULL,
  `nama_tps_26` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_26`
--

INSERT INTO `surat_26` (`id_tps_26`, `total_sah_26`, `total_tdk_sah_26`, `no1_26`, `no2_26`, `no3_26`, `total_suara_26`, `nama_tps_26`) VALUES
(6, 6, 6, 2, 2, 2, 12, 'asdsd'),
(12, 70, 10, 10, 40, 20, 80, 'mangkua');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('Admin','Kasir') NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`, `last_login`) VALUES
(2, 'aw', 'c4ca4238a0b923820dcc509a6f75849b', 'aaaaaaay', 'Admin', '2024-08-01 00:21:29'),
(3, 'q', 'c4ca4238a0b923820dcc509a6f75849b', 'Blue Flare', 'Kasir', '2024-03-14 05:20:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `surat_26`
--
ALTER TABLE `surat_26`
  ADD PRIMARY KEY (`id_tps_26`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_26`
--
ALTER TABLE `surat_26`
  MODIFY `id_tps_26` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
