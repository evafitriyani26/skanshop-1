-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2021 pada 09.29
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skanshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `search` text NOT NULL,
  `kategori` enum('Makanan','Fashion','Jasa','Elektronik') NOT NULL,
  `produk_lainya` text NOT NULL,
  `posting` text NOT NULL,
  `foto` text NOT NULL,
  `nama_produk` text NOT NULL,
  `harga_produk` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `search`, `kategori`, `produk_lainya`, `posting`, `foto`, `nama_produk`, `harga_produk`, `deskripsi`) VALUES
(1, '', 'Elektronik', '', '', 'electronics.png', 'Kulkas', 'Rp. 1000', 'Aman'),
(5, '', 'Jasa', '', '', 'customer-support.png', 'Jasa', 'Rp. 1.000.000', ''),
(6, '', 'Elektronik', '', '', 'electronics.png', 'Kulkas', 'Rp. 1.000.000', 'Kualitas Bagus'),
(7, '', 'Fashion', '', '', '37ed23a7-55fa-476b-a439-40ad36582236-removebg-preview.png', 'logo', 'Rp. 1.000.000', 'Logo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `cpassword` text NOT NULL,
  `wa` varchar(15) NOT NULL,
  `fb` text DEFAULT NULL,
  `ig` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `foto`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `email`, `password`, `cpassword`, `wa`, `fb`, `ig`) VALUES
(1, 'IMG-20180807-WA0017.jpg', 'Rana', 'Laki-Laki', '2015-07-15', 'Surodadi', 'wendiii@gmail.com', 'qwerty12345', 'qwerty12345', '089131447886827', 'http://localhost/latihan/profil.php', 'http://localhost/latihan/profil.php'),
(3, 'profile-user (1).png', 'Admin', 'Laki-Laki', '2004-07-15', 'Sayung', 'admin@gmail.com', 'qwerty', 'qwerty', '081215524361', 'http://localhost/latihan/profil.php', 'http://localhost/latihan/profil.php');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
