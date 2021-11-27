-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2021 pada 02.39
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_oprec`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `adminemail` varchar(50) NOT NULL,
  `adminpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`adminid`, `adminemail`, `adminpassword`) VALUES
(2, 'admin@admin.id', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `save_contact`
--

CREATE TABLE `save_contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `tgldaftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `useremail`, `userpassword`, `tgldaftar`) VALUES
(2, 'zaki@peserta.id', '$2y$10$8SzJJC/wLqvGt64fkGxlA.mlumaitYHmp9z/91eZCcWi9G2.d9xhq', '2021-08-05 14:41:48'),
(7, 'nana@sch.ac.id', '$2y$10$Xx7lYf33Q9QrgovgjpnwCOKmZbQZHPGJnscVhJ3BnvudN4gFXvrCu', '2021-11-25 06:04:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userdata`
--

CREATE TABLE `userdata` (
  `userdataid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `foto` mediumblob NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Unverified',
  `tglkonfirmasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `userdata`
--

INSERT INTO `userdata` (`userdataid`, `userid`, `namalengkap`, `email`, `whatsapp`, `foto`, `status`, `tglkonfirmasi`) VALUES
(3, 2, 'zaki satria prayoga', 'zaki@peserta.id', '123123123123', 0x696d616765732f666f746f2f666f746f5f7a616b692073617472696120707261796f67612e706e67, 'Verified', '2021-08-05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indeks untuk tabel `save_contact`
--
ALTER TABLE `save_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userdataid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `save_contact`
--
ALTER TABLE `save_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userdataid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
