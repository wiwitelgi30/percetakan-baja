-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 09:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percetakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` int(11) NOT NULL,
  `id_pesanan` varchar(7) NOT NULL,
  `id_produk` varchar(5) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori_produk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `nama_kategori_produk`) VALUES
(1, 'Pakaian'),
(2, 'ATK'),
(3, 'Label & Kemasan'),
(4, 'Promosi'),
(5, 'Gaya Hidup');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `id_produk` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah_produk` int(10) UNSIGNED DEFAULT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(7) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `bukti_bayar` blob DEFAULT NULL,
  `status_pesanan` enum('Menunggu Pembayaran','Dalam Proses','Selesai') DEFAULT 'Menunggu Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(5) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `gambar` blob NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `deskripsi` text NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar`, `id_kategori_produk`, `harga`, `deskripsi`, `slug`) VALUES
('P2301', 'Pulpen', 0x70756c70656e312e6a7067, 2, '500', 'Harga per piece =\r\n1 warna = 500,\r\n2 warna = 1000,\r\n3 warna = 1500,\r\n4 warna ke atas = 2000.', 'pulpen'),
('P2302', 'Lanyard / Tali Id Card', 0x6c616e796172642e6a7067, 2, '1500', 'Harga per piece ', 'lanyard-tali-id-card'),
('P2303', 'Kalender Dinding', 0x4b616c656e6461725f62696173612e6a7067, 2, '3600', 'Harga per set (12 bulan = 6 lembar),\r\n1 warna = 3600,\r\n2 warna = 7200,\r\ndst.', 'kalender-dinding'),
('P2304', 'Kartu Nama', 0x6b617274755f6e616d612e6a7067, 2, '15000', 'Harga per box =\r\n1 warna = 15000,\r\n2 warna = 30000,\r\ndst.', 'kartu-nama'),
('P2305', 'Map Amplop', 0x4d61705f616d706c6f702e6a7067, 2, '40000', 'Harga per box =\r\n1 warna = 40000,\r\n2 warna = 60000,\r\n3 warna = 80000,\r\ndst.', 'map-amplop'),
('P2306', 'Kalender Meja', 0x6b616c656e6465725f6d656a612e6a7067, 2, '3600', 'Harga per set (12 bulan = 6 lembar), \r\n1 warna = 3600,\r\n2 warna = 7200,\r\ndst.', 'kalender-meja'),
('P2307', 'Map Folio', 0x4d61705f466f6c696f2e6a7067, 2, '50000', 'Harga per 100 pcs, \r\n1 warna = 50000,\r\n2 warna = 75000,\r\ndst.', 'map-folio'),
('P2308', 'Sticker Custom', 0x537469636b6572312e6a7067, 3, '150000', 'Harga per box (isi 100),\r\nfull colour = 150000', 'sticker-custom'),
('P2309', 'Styrofoam / Stirofoam', 0x537469726f666f616d2e6a7067, 3, '25000', 'Harga per 100 piece 1 warna', 'styrofoam-stirofoam'),
('P2310', 'Tote bag / Goodie bag', 0x746f74655f6261672e6a7067, 3, '1500', 'Harga Tote bag / Goodie bag bahan kain per 1 piece = 1500 (1 warna),\r\nHarga Tote bag / Goodie bag bahan kertas per 1 piece = 500 (1 warna). ', 'tote-bag-goodie-bag'),
('P2311', 'Plastik', 0x506c617374696b312e6a7067, 3, '250', 'Harga per 1 piece = 250 (1 warna)', 'plastik'),
('P2312', 'Kaos', 0x6b616f73312e6a7067, 1, '5000', 'Harga per 1 piece = 5000 (1 warna)', 'kaos'),
('P2313', 'Jaket', 0x6a616b65742e6a7067, 1, '5000', 'Harga per 1 piece = 5000 (1 warna)', 'jaket'),
('P2314', 'Celana Training', 0x43656c616e615f747261696e696e672e6a7067, 1, '5000', 'Celana Training = Harga per 1 piece = 5000 (1 warna)', 'celana-training'),
('P2315', 'Mug / Gelas', 0x6d75672e6a7067, 4, '2500', 'Harga per 1 piece = 2500 (1 warna)', 'mug-gelas'),
('P2316', 'Tumbler / Botol Minum', 0x74756d626c65722e6a7067, 4, '2500', 'Harga per 1 piece = 2500 (1 warna)', 'tumbler-botol-minum'),
('P2317', 'Topi', 0x746f70692e6a7067, 5, '3000', 'Harga per 1 piece = 3000 (1 warna)', 'topi'),
('P2318', 'Power Bank', 0x506f7765725f42616e6b2e6a7067, 5, '1000', 'Harga per 1 piece = 1000 (1 warna)', 'power-bank'),
('P2319', 'Banner / Spanduk Flexi ', 0x7370616e64756b2e6a7067, 4, '25000', 'Harga per meter (1 piece)', 'banner-spanduk-flexi'),
('P2320', 'Banner / Spanduk Albatros', 0x7370616e64756b5f616c626174726f732e6a7067, 4, '85000', 'Harga per meter (1 piece)', 'banner-spanduk-albatros'),
('P2321', 'Banner / Spanduk Korcin', 0x7370616e64756b5f6b6f7263696e2e6a7067, 4, '45000', 'Harga per meter (1 piece)', 'banner-spanduk-korcin'),
('P2322', 'X-Banner', 0x582d62616e6e6572322e6a7067, 4, '250000', 'Harga per 1 piece', 'x-banner');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(10) UNSIGNED NOT NULL,
  `nama_role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `nama_role`) VALUES
(1, 'pelanggan'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `foto` blob DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `alamat`, `no_hp`, `email`, `password`, `foto`, `id_role`) VALUES
(1, 'User', 'userhome', '0812345678910', 'user@gmail.com', '$2y$10$w3j/NQjORuiX2wRFzGknpe14rucvpR3agRuxDUxyJiR4IcQK3YaTK', NULL, 1),
(2, 'Admin', 'Jl. Apel 212', '081345678910', 'admin@gmail.com', '$2y$10$7mzIl.CFV9Ly19SWgJcb2.6KU71CwuO8UqnujVwLb9l9/eHJBRBLu', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
