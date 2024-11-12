/*
 Navicat Premium Data Transfer

 Source Server         : localhost 3306
 Source Server Type    : MySQL
 Source Server Version : 50715
 Source Host           : localhost
 Source Database       : inventory_rop

 Target Server Type    : MySQL
 Target Server Version : 50715
 File Encoding         : utf-8

 Date: 07/05/2018 11:26:14 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `m_barang`
-- ----------------------------
DROP TABLE IF EXISTS `m_barang`;
CREATE TABLE `m_barang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kode` char(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `m_satuan_id` int(11) DEFAULT NULL,
  `m_jenis_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_barang`
-- ----------------------------
BEGIN;
INSERT INTO `m_barang` VALUES ('1', 'K001', 'Youtube', '1', '7', '10000', '2', 'K001.jpg', '1'), ('2', 'K002', 'Apple', '2', '6', '10000', '20', 'K002.jpg', '1'), ('3', 'K003', 'Facebook', '1', '6', '2000', '10', 'K003.png', '1'), ('4', 'K004', 'Twitter', '1', '6', '12000', '10', 'K004.png', '1'), ('5', 'K005', 'Google', '1', '3', '25000', '15', null, '1'), ('6', 'K006', 'Yahoo', '1', '3', '1000', '5', null, '1'), ('7', 'K009', 'Aqua Botol', '3', '6', '5000', '10', 'K009.jpg', '2'), ('8', 'K008', 'Test2', '1', '3', '2000', '1', 'K008.png', '1');
COMMIT;

-- ----------------------------
--  Table structure for `m_jenis`
-- ----------------------------
DROP TABLE IF EXISTS `m_jenis`;
CREATE TABLE `m_jenis` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_jenis`
-- ----------------------------
BEGIN;
INSERT INTO `m_jenis` VALUES ('3', 'Email'), ('6', 'Sosial Media'), ('7', 'Stream Video');
COMMIT;

-- ----------------------------
--  Table structure for `m_profil`
-- ----------------------------
DROP TABLE IF EXISTS `m_profil`;
CREATE TABLE `m_profil` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `m_rop`
-- ----------------------------
DROP TABLE IF EXISTS `m_rop`;
CREATE TABLE `m_rop` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `m_barang_id` int(11) DEFAULT NULL,
  `daily` int(11) DEFAULT NULL,
  `delivery_leadtime` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_rop`
-- ----------------------------
BEGIN;
INSERT INTO `m_rop` VALUES ('1', '1', '10', '2', '1'), ('2', '2', '20', '2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `m_safty_stock`
-- ----------------------------
DROP TABLE IF EXISTS `m_safty_stock`;
CREATE TABLE `m_safty_stock` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `m_barang_id` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `rerata` int(11) DEFAULT NULL,
  `leadtime` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_safty_stock`
-- ----------------------------
BEGIN;
INSERT INTO `m_safty_stock` VALUES ('1', '1', '50', '30', '2', '1'), ('2', '2', '30', '20', '2', null), ('3', '3', '20', '15', '2', '1'), ('4', '4', '1', '1', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `m_satuan`
-- ----------------------------
DROP TABLE IF EXISTS `m_satuan`;
CREATE TABLE `m_satuan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `satuan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_satuan`
-- ----------------------------
BEGIN;
INSERT INTO `m_satuan` VALUES ('1', 'PCS'), ('2', 'BOX'), ('3', 'Botol');
COMMIT;

-- ----------------------------
--  Table structure for `m_supplier`
-- ----------------------------
DROP TABLE IF EXISTS `m_supplier`;
CREATE TABLE `m_supplier` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kode` char(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `hp` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `m_supplier`
-- ----------------------------
BEGIN;
INSERT INTO `m_supplier` VALUES ('1', 'S001', 'Google', 'Serang', '087774846856'), ('2', 'S002', 'Facebook', 'Cilegon', '087774846856');
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1'), ('2', '2014_10_12_100000_create_password_resets_table', '1');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `t_jual_d`
-- ----------------------------
DROP TABLE IF EXISTS `t_jual_d`;
CREATE TABLE `t_jual_d` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `t_jual_h_id` int(11) DEFAULT NULL,
  `m_barang_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `t_jual_d`
-- ----------------------------
BEGIN;
INSERT INTO `t_jual_d` VALUES ('1', '1', '1', '1', '10000'), ('2', '1', '2', '1', '10000'), ('3', '1', '3', '1', '2000'), ('4', '2', '1', '5', '10000'), ('5', '3', '2', '2', '10000');
COMMIT;

-- ----------------------------
--  Table structure for `t_jual_h`
-- ----------------------------
DROP TABLE IF EXISTS `t_jual_h`;
CREATE TABLE `t_jual_h` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` char(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `t_jual_h`
-- ----------------------------
BEGIN;
INSERT INTO `t_jual_h` VALUES ('1', '20171000001', '2017-07-03', '1'), ('2', '20171000002', '2017-07-03', '1'), ('3', '20171000003', '2017-07-03', '1');
COMMIT;

-- ----------------------------
--  Table structure for `t_jual_return_d`
-- ----------------------------
DROP TABLE IF EXISTS `t_jual_return_d`;
CREATE TABLE `t_jual_return_d` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `t_jual_return_h_id` int(11) DEFAULT NULL,
  `m_barang_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `t_jual_return_d`
-- ----------------------------
BEGIN;
INSERT INTO `t_jual_return_d` VALUES ('1', '1', '1', '3', '10000'), ('3', '1', '4', '5', '12000'), ('6', '1', '6', '8', '1000');
COMMIT;

-- ----------------------------
--  Table structure for `t_jual_return_h`
-- ----------------------------
DROP TABLE IF EXISTS `t_jual_return_h`;
CREATE TABLE `t_jual_return_h` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` char(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `t_jual_h_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `t_jual_return_h`
-- ----------------------------
BEGIN;
INSERT INTO `t_jual_return_h` VALUES ('1', '20171000001', '2017-07-16', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `t_pesan_d`
-- ----------------------------
DROP TABLE IF EXISTS `t_pesan_d`;
CREATE TABLE `t_pesan_d` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `t_pesan_h_id` int(11) DEFAULT NULL,
  `m_barang_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `t_pesan_d`
-- ----------------------------
BEGIN;
INSERT INTO `t_pesan_d` VALUES ('1', '1', '1', '1', '10000'), ('2', '1', '2', '1', '10000'), ('12', '1', '4', '1', '12000'), ('13', '1', '5', '10', '25000'), ('14', '6', '1', '1', '10000'), ('15', '6', '3', '11', '2000'), ('16', '6', '6', '12', '1000'), ('23', '11', '3', '1', '2000'), ('26', '11', '1', '1', '10000');
COMMIT;

-- ----------------------------
--  Table structure for `t_pesan_h`
-- ----------------------------
DROP TABLE IF EXISTS `t_pesan_h`;
CREATE TABLE `t_pesan_h` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` char(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `t_pesan_h`
-- ----------------------------
BEGIN;
INSERT INTO `t_pesan_h` VALUES ('1', '20171000001', '2017-06-02', '1'), ('6', '20171000005', '2017-07-03', '2'), ('11', '20171000007', '2017-07-20', '1');
COMMIT;

-- ----------------------------
--  Table structure for `t_terima_d`
-- ----------------------------
DROP TABLE IF EXISTS `t_terima_d`;
CREATE TABLE `t_terima_d` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `t_terima_h_id` int(11) DEFAULT NULL,
  `m_barang_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `t_terima_d`
-- ----------------------------
BEGIN;
INSERT INTO `t_terima_d` VALUES ('1', '1', '1', '10', '10000'), ('2', '1', '4', '10', '12000'), ('4', '1', '6', '10', '1000'), ('5', '2', '1', '10', '10000'), ('6', '2', '2', '10', '10000'), ('7', '2', '4', '5', '12000');
COMMIT;

-- ----------------------------
--  Table structure for `t_terima_h`
-- ----------------------------
DROP TABLE IF EXISTS `t_terima_h`;
CREATE TABLE `t_terima_h` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` char(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `m_supplier_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `t_terima_h`
-- ----------------------------
BEGIN;
INSERT INTO `t_terima_h` VALUES ('1', '20171000001', '2017-07-16', '1', '2'), ('2', '20171000002', '2017-07-05', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_level_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'Deddy Rusdiansyah,M.Kom', 'admin', 'admin@example.com', '$2y$10$6APKfZOdX80qXl.m1BJ8uuPKkS1ny/CFoalFqed453UZB9YVp/Rxq', 'UdPuNDFfpRbejZ7bcMJllcNyCB4XEcmVD3hG99pvBjemnHl1yxb7cgIucEOK', '2017-06-18 10:48:41', '2017-07-16 02:58:37', '1.jpeg', '2'), ('2', 'Danish', 'danish', 'danish.putrapramudya@gmail.com', '$2y$10$0WsNzFyVhNRmp.pGBArW9OwqVct3Oy.Shp1qSOnWirGzxUS/DTzya', 'moIs4R6OfDLfYzprOIDUAXft5oNlI9LdiNETyasX1jLLo8bPrFGPo9zK2HGu', '2017-06-21 04:52:57', '2017-06-21 04:52:57', null, '1'), ('4', 'My Name', '1234', '1234@test.com', '$2y$10$pI0UTiZXqNXmXKE1wqt2yOZpljwPdllWkfYPERuZ531LfV8N2lc3S', 'mKrzsKQB6DMEjJDhz2gpvLKSnhc59sLVpF0TOWiPlK0T608mMna17lHJS9s6', '2017-06-21 05:38:14', '2017-06-21 08:15:53', null, '1'), ('5', 'Deddy Rusdiansyah', 'deddy', 'deddy.rusdiansyah@gmail.com', '$2y$10$WlpZFUWzGaStHG3VyfPyIeqFxGpyoP1Z1L1YyFhS8puZQsmLvzKeO', null, '2017-07-03 09:51:23', '2017-07-03 09:51:23', null, '1'), ('6', 'user baru', 'userbaru', 'userbaru@email.com', '$2y$10$v9OSDim1UYUqiS4KF07IQORrEx6Ia/gigWH.zlbyoy22e9Gio5U3.', null, '2018-07-05 03:30:07', '2018-07-05 03:30:07', null, '1');
COMMIT;

-- ----------------------------
--  Table structure for `users_level`
-- ----------------------------
DROP TABLE IF EXISTS `users_level`;
CREATE TABLE `users_level` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `users_level`
-- ----------------------------
BEGIN;
INSERT INTO `users_level` VALUES ('1', 'Karyawan'), ('2', 'Supervisor');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
