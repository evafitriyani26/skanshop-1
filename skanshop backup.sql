-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2021 pada 07.12
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
  `deskripsi` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `search`, `kategori`, `produk_lainya`, `posting`, `foto`, `nama_produk`, `harga_produk`, `deskripsi`, `id_user`) VALUES
(5, '', 'Jasa', '', '', 'images (6).jpg', 'Jasa Expedisi Kirim Barang', 'Rp. 250.000', 'Melayani 24 Jam', 0),
(6, '', 'Makanan', '', '', '1+ Madu 800gr_6.png', 'Susu Anak Dancow', 'Rp. 36.000', 'Cocok Untuk Berkembangnya Anak.', 0),
(7, '', 'Fashion', '', '', '37ed23a7-55fa-476b-a439-40ad36582236-removebg-preview.png', 'Logo SMK N 1 SAYUNG', 'Rp. 1.000.000', 'Logo', 0),
(9, '', 'Fashion', '', '', '2d4a0db5-5719-4ee8-ac76-18ded7600a1c.jpg', 'Baju Koko Modern', 'Rp. 100.000', 'Kualitas Bagus', 0),
(10, '', 'Elektronik', '', '', '851458645.jpg', 'TV LED ', 'Rp. 2.000.000', 'Kualitas Bagus', 0),
(11, '', 'Fashion', '', '', 'aaa.png.jpg', 'Jersey Keren ', 'Rp. 150.000', 'Kualitas bagus ', 0),
(12, '', 'Fashion', '', '', 'a07664ff504039f29a77bfd50211ee4f.jpg_720x720q80.jpg_.webp', 'Kaos Distro Keren', 'Rp. 150.000', 'Kualitas Baguss', 0),
(13, '', 'Elektronik', '', '', 'AC-Samsung-Tiga-Per-Empat-PK-AR07JRFLAW.jpg', 'AC Samsung ', 'Rp. 1.000.000', 'Kualitas Bagus', 0),
(14, '', 'Fashion', '', '', 'data.png.webp', 'Kemeja Modern', 'Rp. 150.000', 'Kualitas Bagus ', 0),
(19, '', 'Fashion', '', '', 'dc11d239b541a4172c3b5d13b6a2a14d.jpg_720x720q80.jpg_.webp', 'Tas Anak Keren', 'Rp. 150.000', 'Kualitas Bagus', 0),
(20, '', 'Makanan', '', '', 'download (1).jpg', 'Cemilan Keripik Pisang', 'Rp. 15.000', '- Enak\r\n- Gurih\r\n-Nyoyy', 0),
(21, '', 'Fashion', '', '', 'download (2).jpg', 'Tas Ransel Keren', 'Rp. 150.000', 'Kualitas Bagus', 0),
(22, '', 'Fashion', '', '', 'download (3).jpg', 'Tas Ransel Korea', 'Rp. 200.000', 'Kualitas Bagus', 0),
(23, '', 'Fashion', '', '', 'download (4).jpg', 'Jam Tangan G-SHOCK', 'Rp. 200.000', 'Kualitas Bagus', 0),
(24, '', 'Fashion', '', '', 'download (5).jpg', 'Jam Tangan Keren', 'Rp. 200.000', 'Kualitas Bagus', 0),
(25, '', 'Fashion', '', '', 'download (6).jpg', 'Jam Tangan Pria Keren', 'Rp. 250.000', 'Kualitas Bagus', 0),
(26, '', 'Jasa', '', '', 'download (7).jpg', 'Jasa Joki MLBB', '7.000-350.000', 'Aman & Amanah', 0),
(27, '', 'Jasa', '', '', 'download (8).jpg', 'Joki Rank MLBB', '5.000-350.000', 'Aman & Amanah', 0),
(28, '', 'Jasa', '', '', 'download (9).jpg', 'Jasa Joki FF', '7.000-350.000', 'Aman & Amanah', 0),
(29, '', 'Fashion', '', '', 'f1706ee0c804609768044ca017f450db.jpg', 'Tas Ransel Anak', 'Rp. 100.000', 'Kualitas Bagus ', 0),
(30, '', 'Makanan', '', '', 'images (1).jpg', 'Fried Chiken', 'Rp. 25.000', 'Lezat ', 0),
(31, '', 'Fashion', '', '', 'images (2).jpg', 'Kemeja Pendek Pria', 'Rp. 150.000', 'Kualitas Bagus', 0),
(32, '', 'Fashion', '', '', 'images (3).jpg', 'Sepatu Sneakers', 'Rp. 250.000', 'Kualitas Bagus', 0),
(33, '', 'Jasa', '', '', 'images (4).jpg', 'Jasa Pembersih Rumah', '500.000', 'Bertanggung Jawab', 0),
(34, '', 'Jasa', '', '', 'images (5).jpg', 'Jasa Pick Up Pindahan', 'RP. 500.000', 'Aman & Amanah', 0),
(35, '', 'Makanan', '', '', 'images.jpg', 'Kopiko', 'Rp. 10.000', 'Enak', 0),
(36, '', 'Elektronik', '', '', 'jenis-macam-peralatan-perlengkapan-barang-produk-elektonik-aktivitas-pekerjaan-di-rumah_09.jpg', 'Magic Com', 'Rp. 250.000', 'Kualitas Bagus', 0),
(37, '', 'Elektronik', '', '', 'jenis-macam-peralatan-perlengkapan-barang-produk-elektonik-aktivitas-pekerjaan-di-rumah_18.jpg', 'AC Bagus', 'Rp. 1.000.000', 'Kualitas Bagus', 0),
(38, '', 'Makanan', '', '', 'Lilo.jpg', 'Lilo', 'Rp. 3.000', 'Enak, Menyegarkan', 0),
(39, '', 'Elektronik', '', '', 'Percetakan-Kemasan-Kenali-Jenis-jenis-Kemasan-Elektronik-Ini.jpg', 'I Phone ', 'Rp. 10.000.000', 'Kualitas Bagus', 0),
(40, '', 'Makanan', '', '', 'S6mOEUTNDe.jpg', 'Kapal Api', 'Rp. 5.000', 'Enak', 0),
(41, '', 'Jasa', '', '', 'sapx-kurir-1.jpg', 'Kurir ', 'Rp. 50.000', 'Aman & Amanah', 0),
(42, '', 'Fashion', '', '', 'download.jpg', 'Ramadewa', 'Rp. 1.000.000', 'Nice', 0),
(43, '', 'Fashion', '', '', 'aaa.png.jpg', 'Kaos', 'Rp. 150.000', 'Keren', 0),
(44, '', 'Makanan', '', '', '1+ Madu 800gr_6.png', 'susu', 'Rp. 100.000', 'p', 3);

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
(3, '', 'Admin', 'Laki-Laki', '2003-07-15', 'Semarang', 'admin@gmail.com', 'qwerty', 'qwerty', '081215524361', 'http://localhost/latihan/profil.php', 'http://localhost/latihan/profil.php'),
(4, NULL, 'Zero', 'Laki-Laki', '0000-00-00', '', 'rizal12@gmail.com', 'qwerty', 'qwerty', '', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
