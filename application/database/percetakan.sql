-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table percetakan.detail_pesanan
CREATE TABLE IF NOT EXISTS `detail_pesanan` (
  `id_detail_pesanan` int NOT NULL AUTO_INCREMENT,
  `id_pesanan` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `id_produk` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_produk` int NOT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_detail_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table percetakan.detail_pesanan: ~1 rows (approximately)
DELETE FROM `detail_pesanan`;
INSERT INTO `detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_produk`, `jumlah_produk`, `catatan`) VALUES
	(1, 'PS23001', 'P2301', 1, NULL),
	(2, 'PS23001', 'P2302', 1, NULL),
	(3, 'PS23002', 'P2301', 1, NULL);

-- Dumping structure for table percetakan.kategori_produk
CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `id_kategori_produk` int NOT NULL AUTO_INCREMENT,
  `nama_kategori_produk` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table percetakan.kategori_produk: ~2 rows (approximately)
DELETE FROM `kategori_produk`;
INSERT INTO `kategori_produk` (`id_kategori_produk`, `nama_kategori_produk`) VALUES
	(1, 'Pakaian'),
	(4, 'ATK');

-- Dumping structure for table percetakan.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int unsigned DEFAULT NULL,
  `id_produk` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah_produk` int unsigned DEFAULT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table percetakan.keranjang: ~1 rows (approximately)
DELETE FROM `keranjang`;

-- Dumping structure for table percetakan.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `bukti_bayar` blob,
  `status_pesanan` enum('Menunggu Pembayaran','Dalam Proses','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Menunggu Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table percetakan.pesanan: ~0 rows (approximately)
DELETE FROM `pesanan`;
INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `total_harga`, `bukti_bayar`, `status_pesanan`) VALUES
	('PS23001', 1, 22000, NULL, 'Menunggu Pembayaran'),
	('PS23002', 1, 20000, _binary 0x63726f707065645f6c656d6261725f706572736574756a75616e5f504d4b2e6a7067, 'Dalam Proses');

-- Dumping structure for table percetakan.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_produk` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` blob NOT NULL,
  `id_kategori_produk` int NOT NULL,
  `stok` int NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table percetakan.produk: ~1 rows (approximately)
DELETE FROM `produk`;
INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar`, `id_kategori_produk`, `stok`, `harga`, `deskripsi`, `slug`) VALUES
	('P2301', 'Celana Panjang', _binary 0x38636664396434663235663862626330303135656132333961376133316161352e6a7067, 4, 50, 20000, '212121', ''),
	('P2302', 'Pensil 2B', _binary 0x3131373130322d612e6a7067, 4, 99, 2000, 'Pensil 2B Merek Joyko', '');

-- Dumping structure for table percetakan.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table percetakan.roles: ~2 rows (approximately)
DELETE FROM `roles`;
INSERT INTO `roles` (`id_role`, `nama_role`) VALUES
	(1, 'pelanggan'),
	(2, 'admin');

-- Dumping structure for table percetakan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` blob,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table percetakan.users: ~3 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id_user`, `nama`, `alamat`, `no_hp`, `email`, `password`, `foto`, `id_role`) VALUES
	(1, 'Asepso', 'Jl. Apel 212', '081345678910', 'user@gmail.com', '$2y$10$UacekmPlKtAtJJLYxTYIYORn5Vu3TlQxTE1Amm9hbI3GDpUlhUiBG', NULL, 1),
	(2, 'John', 'Jl. Apel 212', '081345678910', 'admin@gmail.com', '$2y$10$UacekmPlKtAtJJLYxTYIYORn5Vu3TlQxTE1Amm9hbI3GDpUlhUiBG', NULL, 2),
	(4, 'Maulana Aprizqy Sumaryanto', 'asdasdasd', '081345678910', 'maulana4pz@gmail.com', '$2y$10$DdQfXB39Fvvr2nArWvw0t.5LE6vAkXNvTBKtwbFPNwX0iJ2LjqIBu', NULL, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
