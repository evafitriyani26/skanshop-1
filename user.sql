-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Waktu pembuatan: 17 Nov 2021 pada 08.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31
=======
-- Waktu pembuatan: 17 Nov 2021 pada 08.38
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29
>>>>>>> 6f46d90cd9d467c2da6d13160ea046f4287612f9

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
<<<<<<< HEAD
(3, 'profile-user (1).png', 'Admin', 'Laki-Laki', '2004-07-15', 'Sayung', 'admin@gmail.com', 'qwerty', 'qwerty', '081215524361', 'http://localhost/latihan/profil.php', 'http://localhost/latihan/profil.php'),
(4, NULL, 'Dita', 'Laki-Laki', '0000-00-00', '', 'dita@gmail.com', '12345', '12345', '', NULL, NULL);
=======
(3, '', 'Admin', 'Laki-Laki', '2004-07-15', 'Semarang', 'admin@gmail.com', 'qwerty', 'qwerty', '081215524361', 'http://localhost/latihan/profil.php', 'http://localhost/latihan/profil.php'),
(4, NULL, 'Zero', 'Laki-Laki', '0000-00-00', '', 'rizal12@gmail.com', 'qwerty', 'qwerty', '', NULL, NULL),
(5, NULL, '', 'Laki-Laki', '0000-00-00', '', '', '', '', '', NULL, NULL),
(6, NULL, '', 'Laki-Laki', '0000-00-00', '', 'wendiii@gmail.com', '', '', '', NULL, NULL),
(7, NULL, '', 'Laki-Laki', '0000-00-00', '', '', '', '', '', NULL, NULL),
(8, NULL, '', 'Laki-Laki', '0000-00-00', '', 'admin@gmail.com', '', '', '', NULL, NULL),
(9, NULL, '', 'Laki-Laki', '0000-00-00', '', 'wendiii@gmail.com', '', '', '', NULL, NULL),
(10, NULL, '', 'Laki-Laki', '0000-00-00', '', 'wendiii@gmail.com', '', '', '', NULL, NULL),
(11, NULL, '', 'Laki-Laki', '0000-00-00', '', 'wendiii@gmail.com', '', '', '', NULL, NULL),
(12, NULL, '', 'Laki-Laki', '0000-00-00', '', '', '', '', '', NULL, NULL),
(13, NULL, '', 'Laki-Laki', '0000-00-00', '', '', '', '', '', NULL, NULL);
>>>>>>> 6f46d90cd9d467c2da6d13160ea046f4287612f9

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
>>>>>>> 6f46d90cd9d467c2da6d13160ea046f4287612f9
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
