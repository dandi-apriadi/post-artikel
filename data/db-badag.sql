-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 04:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-badag`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `userId`, `nama_barang`, `harga`, `stok`, `gambar`, `deskripsi`) VALUES
(1, 2, 'Beras 2 Kg', 2000, 34, '65447fb456867.png', 'lkjhgvfcx'),
(5, 2, 'Chimory', 10000, 10, '65448347d70a0.png', 'Chimori'),
(6, 2, 'Ultra Milk', 50000, 20, '1698999742_1157354071.png', 'akdoaskodaksodkl akdl akldaklsd<br />\r\n<br />\r\nasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `cache_transaksi`
--

CREATE TABLE `cache_transaksi` (
  `id` int(11) NOT NULL,
  `barangId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cache_transaksi`
--

INSERT INTO `cache_transaksi` (`id`, `barangId`, `userId`, `nama_barang`, `jumlah_barang`, `harga_satuan`) VALUES
(1, 6, 22, 'Ultra Milk', 72, 50000),
(2, 5, 22, 'Chimory', 67, 10000),
(3, 1, 22, 'Beras 2 Kg', 45, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `barangId` int(11) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `photo_karyawan` varchar(150) DEFAULT '-',
  `status_karyawan` enum('cashier','teknisi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `userId`, `ownerId`, `nama_karyawan`, `no_hp`, `photo_karyawan`, `status_karyawan`) VALUES
(17, 22, 2, 'FiyahAkab', '089677197119', '6553908185865.png', 'cashier'),
(18, 23, 2, 'FiyahMamonto', '085161542103', '-', 'teknisi'),
(20, 24, 5, 'Alsaskar Mirando', '089694824154', '-', 'teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `nota_service`
--

CREATE TABLE `nota_service` (
  `id` int(11) NOT NULL,
  `teknisiId` int(11) NOT NULL,
  `tglMasuk` date NOT NULL,
  `tglPengambilan` date NOT NULL COMMENT 'tanggal pengambilan nota',
  `namaCustomer` varchar(80) NOT NULL,
  `noHp` char(13) NOT NULL COMMENT 'no HP atau no WA',
  `alamat` varchar(150) NOT NULL COMMENT 'alamat customer',
  `tipeHp` varchar(100) NOT NULL,
  `imei` varchar(100) NOT NULL COMMENT 'Imei/SN',
  `kerusakan` text NOT NULL,
  `hargaService` int(11) NOT NULL,
  `uangPanjar` int(11) NOT NULL COMMENT 'DP atau Panjar',
  `perbaikan` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('proses','selesai','batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nota_service`
--

INSERT INTO `nota_service` (`id`, `teknisiId`, `tglMasuk`, `tglPengambilan`, `namaCustomer`, `noHp`, `alamat`, `tipeHp`, `imei`, `kerusakan`, `hargaService`, `uangPanjar`, `perbaikan`, `keterangan`, `status`) VALUES
(1, 18, '2023-11-07', '2023-11-10', 'Richie Mokoagow', '08958493495', 'Bengkol, Jln Bengkol No 1', 'Realme', '0', 'Layar picah', 200000, 0, 'ganti layar', '', 'proses'),
(2, 20, '2023-11-14', '2023-11-15', 'Richie Mokoagow', '0899584483', 'Bengkol', 'Realme', '888', 'LCD', 20000, 0, 'Ganti LCD baru', 'akosko ask aslkdlsad', 'selesai'),
(3, 20, '2023-11-14', '2023-11-18', 'Indah Paendong', '0894838923', 'Politeknik, Banua 3', 'Realme', '333333', 'Baterai bocor', 800000, 400000, 'Ganti baterai baru', '', 'batal');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `tipe_toko` varchar(80) NOT NULL,
  `slogan_toko` varchar(50) NOT NULL,
  `photo_toko` varchar(150) DEFAULT NULL,
  `alamat_toko` varchar(100) NOT NULL,
  `bankName` varchar(50) NOT NULL,
  `bankBranch` varchar(50) NOT NULL,
  `bankAccountNumber` varchar(50) NOT NULL,
  `bankAccountName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `userId`, `nama_toko`, `no_hp`, `tipe_toko`, `slogan_toko`, `photo_toko`, `alamat_toko`, `bankName`, `bankBranch`, `bankAccountNumber`, `bankAccountName`) VALUES
(2, 2, 'Toko Jaya', '098765', 'Toko Elektronik', 'Melayani Dengan Senyuman', NULL, 'Manado', '', '', '', ''),
(4, 4, 'Bangunan', '085161542103', 'Toko Bangunan', 'Membangun Negeri Bersama Kuli', NULL, 'Manado', '', '', '', ''),
(5, 14, 'Toko Sejahtera', '08520258520', 'Toko Jaya Selamanya', 'Melayani Dengan Senyuman', NULL, 'Manado', 'BCA', 'Manado', '0263296611', 'PT Sutan Jaya Abadi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(100) DEFAULT '-',
  `userId` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL DEFAULT current_timestamp(),
  `total_biaya` int(20) NOT NULL,
  `diskon` float NOT NULL DEFAULT 0,
  `metode_pembayaran` enum('tunai','debit','kredit') NOT NULL DEFAULT 'tunai',
  `uang_pelanggan` int(11) NOT NULL DEFAULT 0,
  `uang_kembalian` int(11) NOT NULL DEFAULT 0,
  `status` enum('draft','submitted') NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_transaksi`, `userId`, `tanggal_pesanan`, `total_biaya`, `diskon`, `metode_pembayaran`, `uang_pelanggan`, `uang_kembalian`, `status`) VALUES
(7, '-', 22, '2023-11-15', 4360000, 0, 'tunai', 0, 0, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified_email` enum('no','yes') NOT NULL DEFAULT 'no',
  `role` enum('admin','owner','karyawan') NOT NULL,
  `token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `verified_email`, `role`, `token`) VALUES
(1, 'Administrator', '', 'admin@admin.com', '$2y$10$RSCYrnUj.LtG2.LSYtjQ4OcwNqBmiyPL2LqnWU8RjzOhh22biD5Ya', 'yes', 'admin', NULL),
(2, 'Dandi', 'Mamonto', 'dandiapeiadi22@gmail.com', '$2y$10$PdLW.5N75NiBjR1JWriCb.0EXpIRZJ.zrSatErngoiWuxGHX4aayy', 'yes', 'owner', '%242y%2410%24Fqs2Huyp8khbR7.8fB21bO02B5UmgjXg6dVM7fgcIgYLzg36w4GSq'),
(4, 'Dandi', 'Apriadi', 'dandigeming85@gmail.com', '$2y$10$2tZmSBPLVhJ2GPWuj/p8vuD2vxLiW5mo959x09YnZNVQpGpNx1vMW', 'yes', 'owner', '%242y%2410%24aaGwmoKy4GLRxARW4tiy9ezfs8gv8RvfakoW3unmy.gV4VZhIF5M.'),
(14, 'Dandi 2', 'Baru', 'apridi854@gmail.com', '$2y$10$39YwdAvxxPtfb8Tv4rGqKOxCYbIlLgU3rk569tTUQ66nFlKPWX8N6', 'yes', 'owner', '%242y%2410%24ukqhEbQOkK/XMLhtRDwmmenjtYnmSWJykz4T5kDCsHTlU0azjx06G'),
(22, 'Fiyah', 'Akab', 'fiyahakab@gmail.com', '$2y$10$fZKXrfcB4a5f0TuocNTfLOMnAgURBKOr/YJoij2GJCd3FUt/itf66', 'yes', 'karyawan', NULL),
(23, 'Fiyah', 'Mamonto', 'cvjilis18@gmail.com', '$2y$10$F4PffXPtd/4PSzhT1ATRkur6DvEfhBL9fCbda2Y7xe0p8c81FPuOC', 'yes', 'karyawan', NULL),
(24, 'Alsaskar', 'Mirando', 'alsaskar@gmail.com', '$2y$10$mAXlFrbydZK78a0zAU0HyuJ2ODerGrRZQOcwFeKYba7Y94E/04pPy', 'yes', 'karyawan', NULL),
(25, 'Alsaskar', 'Mirando', 'aslaskar@gmail.com', '$2y$10$X6tMXm31E08ye6xLb6PnlumADt2DMoxCJgNoXzeUlG7T7SQPoxeta', 'yes', 'karyawan', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `cache_transaksi`
--
ALTER TABLE `cache_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Indexes for table `nota_service`
--
ALTER TABLE `nota_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teknisiId` (`teknisiId`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cache_transaksi`
--
ALTER TABLE `cache_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nota_service`
--
ALTER TABLE `nota_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cache_transaksi`
--
ALTER TABLE `cache_transaksi`
  ADD CONSTRAINT `cache_transaksi_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `transaksi` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`ownerId`) REFERENCES `owner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_service`
--
ALTER TABLE `nota_service`
  ADD CONSTRAINT `nota_service_ibfk_1` FOREIGN KEY (`teknisiId`) REFERENCES `karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
