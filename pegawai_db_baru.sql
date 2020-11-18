-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Nov 2020 pada 04.51
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `denom_kertas`
--

CREATE TABLE `denom_kertas` (
  `id_denom_kertas` int(12) NOT NULL,
  `denom_kertas` bigint(12) NOT NULL,
  `rp1` int(12) NOT NULL,
  `rp2` int(12) NOT NULL,
  `rp3` int(12) NOT NULL,
  `rp4` int(12) NOT NULL,
  `rp5` int(12) NOT NULL,
  `rp6` int(12) NOT NULL,
  `inpak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `denom_kertas`
--

INSERT INTO `denom_kertas` (`id_denom_kertas`, `denom_kertas`, `rp1`, `rp2`, `rp3`, `rp4`, `rp5`, `rp6`, `inpak`) VALUES
(1, 100000, 20, 28, 5, 3, 8, -23, 0),
(2, 50000, 2, 14, 1, 6, 1, 0, 0),
(3, 20000, 0, 3, 0, 3, 4, 0, 0),
(4, 10000, 1, 13, 0, 4, 4, 0, 0),
(9, 5000, 1, 8, 3, 3, 9, 0, 0),
(21, 2000, 5, 12, 1, 0, 9, 0, 0),
(24, 1000, 0, 0, 0, 1, 0, 6, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `denom_koin`
--

CREATE TABLE `denom_koin` (
  `id_denom_koin` int(12) NOT NULL,
  `denom_koin` bigint(12) NOT NULL,
  `rp1` int(12) NOT NULL,
  `rp2` int(12) NOT NULL,
  `rp3` int(12) NOT NULL,
  `rp4` int(12) NOT NULL,
  `rp5` int(12) NOT NULL,
  `rp6` int(12) NOT NULL,
  `inpak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `denom_koin`
--

INSERT INTO `denom_koin` (`id_denom_koin`, `denom_koin`, `rp1`, `rp2`, `rp3`, `rp4`, `rp5`, `rp6`, `inpak`) VALUES
(1, 1000, 2, 2, 0, 0, 1, 0, 0),
(2, 500, 0, 0, 0, 0, 0, 0, 0),
(3, 200, 0, 0, 0, 0, 0, 0, 0),
(4, 100, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`) VALUES
(1, 'operasional'),
(2, 'logistik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `id_divisi`) VALUES
(1, 'raisya', 'surabaya', 1),
(2, 'isyana', 'sidoarjo', 2),
(3, 'ahmad', 'gresik', 1),
(4, 'husein', 'malang', 2),
(7, 'Amalia', 'Surabaya', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `level`) VALUES
(1, 'admin', '12345', 'admin'),
(2, 'kholiq', '4444', 'user'),
(3, 'taufik', '7777', 'user'),
(4, 'arinku', 'cantiknyo', 'user'),
(6, 'intani', 'pelitaku', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `denom_kertas`
--
ALTER TABLE `denom_kertas`
  ADD PRIMARY KEY (`id_denom_kertas`);

--
-- Indeks untuk tabel `denom_koin`
--
ALTER TABLE `denom_koin`
  ADD PRIMARY KEY (`id_denom_koin`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `denom_kertas`
--
ALTER TABLE `denom_kertas`
  MODIFY `id_denom_kertas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `denom_koin`
--
ALTER TABLE `denom_koin`
  MODIFY `id_denom_koin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
