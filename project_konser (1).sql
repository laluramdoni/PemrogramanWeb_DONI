-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 20 Jun 2023 pada 16.15
-- Versi server: 5.7.36
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_konser`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$fsvYC1k3H4KIhYDwGKD93OCO8mkiIEh2KjKzRS6xA8.871BKevsP6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konser`
--

DROP TABLE IF EXISTS `konser`;
CREATE TABLE IF NOT EXISTS `konser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konser` varchar(225) NOT NULL,
  `harga` float NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `kuota` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konser`
--

INSERT INTO `konser` (`id`, `nama_konser`, `harga`, `gambar`, `kuota`, `keterangan`) VALUES
(2, 'Coldplay', 399000, 'cp.jpg', 24, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos nihil cupiditate ut vero alias quaerat inventore molestias vel suscipit explicabo.'),
(3, 'Raisa', 7990000, 'raisa.jpg', 56, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos nihil cupiditate ut vero alias quaerat inventore molestias vel suscipit explicabo.'),
(4, 'Charlie Puth', 3890000, 'charlie-puth.jpg', 52, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos nihil cupiditate ut vero alias quaerat inventore molestias vel suscipit explicabo.'),
(5, 'Fiersa Besari', 599000, 'fiersa besari.jpg', 42, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos nihil cupiditate ut vero alias quaerat inventore molestias vel suscipit explicabo.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

DROP TABLE IF EXISTS `pembeli`;
CREATE TABLE IF NOT EXISTS `pembeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjual`
--

DROP TABLE IF EXISTS `penjual`;
CREATE TABLE IF NOT EXISTS `penjual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjual`
--

INSERT INTO `penjual` (`id`, `name`, `email`, `password`) VALUES
(5, 'penjual', 'penjual@penjual.com', '$2y$10$jQDGJnLvdnu29YB/hPcggukPFMFn/5dN731efgeg8khoQK/aT5XRa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `orang` int(11) NOT NULL,
  `konser_id` bigint(11) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL,
  `approve` tinyint(1) NOT NULL,
  `bukti_bayar` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
