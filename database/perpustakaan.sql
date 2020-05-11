-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Apr 2019 pada 15.08
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id` int(11) NOT NULL,
  `kode_peminjaman` varchar(50) DEFAULT NULL,
  `kode_buku` int(15) DEFAULT NULL,
  `tgl_pinjam` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` varchar(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `uname`, `pass`, `foto`) VALUES
('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'tut wuri.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nis` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `tanggal_masuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis`, `nama`, `tempat_lahir`, `tanggal_lahir`, `tanggal_masuk`) VALUES
('10001', 'Adi', 'Malang', '2018-07-10', '2018-07-17'),
('10002', 'Uhuy', 'Malang', '1992-02-24', '07-01-2018'),
('150403020001', 'Imron', 'Malang', '1995-06-06', '2018-06-06'),
('150403020009', 'Andry Hartanto', 'Lamongan', '1992-10-24', '2018-06-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kode_buku` int(15) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tanggal_terbit` varchar(50) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`kode_buku`, `judul_buku`, `tanggal_terbit`, `pengarang`, `stok`) VALUES
(1, '5cm', '2017-05-19', 'Donny Dhirgantora', 7),
(2, 'TUILET', '2009-03-24', 'Oben Cedric', 10),
(5, 'Bunga Cantik di Balik Salju', '2009-07-05', 'Titik Andarwati', 7),
(6, 'I Love You, Good bye', '2011-05-19', 'Fifi Alfiana Rosyidah', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `no` int(15) NOT NULL,
  `kode_peminjaman` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tanggal_pinjam` varchar(50) NOT NULL,
  `tanggal_kembali` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`no`, `kode_peminjaman`, `nama`, `judul_buku`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(74, 'P0002', 'Adi', '5cm', '01/07/2018', ''),
(80, 'P0005', 'Imron', '5cm', '01/07/2018', ''),
(81, 'P0005', 'Imron', 'TUILET', '01/07/2018', ''),
(83, 'P0006', 'Imron', 'Bunga Cantik di Balik Salju', '01/07/2018', ''),
(84, 'P0006', 'Imron', 'I Love You, Good bye', '01/07/2018', ''),
(86, 'P0007', 'Uhuy', '5cm', '02/07/2018', '');

--
-- Trigger `tb_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `AFTER_INSERTPEMINJAMAN` AFTER INSERT ON `tb_peminjaman` FOR EACH ROW BEGIN
	UPDATE `tb_buku` SET `stok`=(`stok`-1) WHERE `judul_buku` = NEW.`judul_buku`;	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `no` int(11) NOT NULL,
  `kode_pengembalian` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `judul_buku` varchar(30) NOT NULL,
  `tanggal_pinjam` varchar(50) NOT NULL,
  `tanggal_kembali` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`no`, `kode_pengembalian`, `nama`, `judul_buku`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(49, '47', 'Uhuy', 'TUILET', '01/07/2018', '2018-07-01'),
(50, '48', 'Andry Hartanto', 'TUILET', '01/07/2018', '2018-07-01'),
(51, '0', 'Uhuy', '5cm', '01/07/2018', '2018-07-01'),
(52, '0', 'Uhuy', '5cm', '01/07/2018', '2018-07-01'),
(53, '0', 'Uhuy', '5cm', '01/07/2018', '2018-07-01'),
(54, '0', 'Imron', 'I Love You, Good bye', '01/07/2018', '2018-07-01'),
(55, '0', 'Imron', '5cm', '01/07/2018', '2018-07-01'),
(56, '0', 'Imron', 'TUILET', '01/07/2018', '2018-07-01'),
(57, '0', 'Uhuy', '5cm', '01/07/2018', '2018-07-01'),
(58, '0', 'Uhuy', '5cm', '01/07/2018', '2018-07-01'),
(59, '0', 'Imron', '5cm', '01/07/2018', '2018-07-01'),
(60, 'P0006', 'Imron', '5cm', '01/07/2018', '2018-07-01'),
(61, 'P0006', 'Imron', '5cm', '01/07/2018', '2018-07-01'),
(62, 'P0001', 'Uhuy', '5cm', '01/07/2018', '2018-07-01'),
(63, 'P0007', 'Uhuy', 'TUILET', '02/07/2018', '2018-07-02');

--
-- Trigger `tb_pengembalian`
--
DELIMITER $$
CREATE TRIGGER `AFTER_INSERTPENGEMBALIAN` AFTER INSERT ON `tb_pengembalian` FOR EACH ROW BEGIN
	UPDATE `tb_buku` SET `stok`=(`stok`+1) WHERE `judul_buku` = NEW.`judul_buku`;	
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `kode_buku` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
