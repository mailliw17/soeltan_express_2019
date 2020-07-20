-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Nov 2019 pada 04.18
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soeltanexpress`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `about`) VALUES
(1, 'Dengan armada yang memadai dan SDM yang handal, kita menjamin pengiriman anda tidak akan melebihi waktu yang sudah ditentukan. Kami mementingkan kepuasan pelanggan. Banyak riset yang kami lakukan untuk mencegah terjadinya kemoloran waktu. We serve the best for you. thanks');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`no_ktp`, `nama`, `username`, `password`) VALUES
('3374061902990001', 'Fredo Maurtono', 'fredo20', '19999'),
('3374061902990002', 'ilham dharmawan', 'ilham', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `no_barang` varchar(10) NOT NULL,
  `berat` int(5) NOT NULL,
  `jenis_barang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`no_barang`, `berat`, `jenis_barang`) VALUES
('1', 4, 'handphone');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `idcus` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`idcus`, `nama`, `username`, `password`, `email`, `alamat`, `no_hp`) VALUES
(3, 'beruang kutub', 'ice', '5beb5fbd6aa7d663ac66e3694b1746ce', 'ice@gmail.com', 'bear', '12345678999');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`) VALUES
(1, 'Apa yang membuat Soeltan Express berbeda dengan berbeda dengan expedisi lainnya ?', 'Soeltan Express menyediakan layanan utama antar-jemput paket tanpa biaya tambahan minimum berat, dan jumlah paket'),
(2, 'Kalau mau mengirim barang, bagaimana caranya ?', 'Customer dapat memanggil kurir dengan aplikasi agar barang dijemput di titik lokasi atau customer dapat mengantarnya langsung ke drop-point Soeltan Express terdekat'),
(3, 'Apakah harga Soeltan Express lebih mahal dari jasa kurir lainnya ?', 'Soeltan Express menjamin bahwa harga kami adalah harga yang bersaing dengan kualitas yang unggul'),
(4, 'Bagaimana cara pembayaran di soeltan express?', 'Pembayaran dapat dilakukan langsung datang ke counter terdekat di wilayah anda.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jarak_kota`
--

CREATE TABLE `jarak_kota` (
  `no` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `jarak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jarak_kota`
--

INSERT INTO `jarak_kota` (`no`, `kota`, `jarak`) VALUES
(1, 'medan', 0),
(2, 'jakarta', 4),
(3, 'bandung', 5),
(4, 'semarang', 6),
(5, 'palu', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id`, `img`) VALUES
(4, '1.jpg'),
(5, '2.jpg'),
(6, '3.jpg'),
(7, '4.jpg'),
(11, 'images.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mini_admin`
--

CREATE TABLE `mini_admin` (
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kel` varchar(10) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mini_admin`
--

INSERT INTO `mini_admin` (`no_ktp`, `nama`, `username`, `email`, `password`, `alamat`, `jenis_kel`, `no_hp`) VALUES
('3374061902990001', 'Fredo Situmorang', 'fredo19', 'fmaurtino@gmail.com', '123', 'Jl.Merpati 2 no 4a Semarang', 'Laki-laki', '082136899861'),
('356456567576', 'fredi maurtini', 'fredi', 'fmaurtino@gmail.co.id', '123', 'jlfhfghfghfh', 'Laki-laki ', '082226539655');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `no_resi` varchar(16) NOT NULL,
  `no_ktp_mini` varchar(16) NOT NULL,
  `no_barang` varchar(10) NOT NULL,
  `no_hp_pengirim` varchar(15) NOT NULL,
  `no_hp_tujuan` varchar(15) NOT NULL,
  `alamat_tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resi`
--

CREATE TABLE `resi` (
  `no` int(11) NOT NULL,
  `resi` varchar(16) NOT NULL,
  `urutan` int(11) NOT NULL,
  `namapengirim` varchar(30) NOT NULL,
  `alamatpengirim` varchar(100) NOT NULL,
  `no_hp_pengirim` char(12) NOT NULL,
  `namapenerima` varchar(30) NOT NULL,
  `alamatpenerima` varchar(100) NOT NULL,
  `no_hp_penerima` char(12) NOT NULL,
  `note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resi`
--

INSERT INTO `resi` (`no`, `resi`, `urutan`, `namapengirim`, `alamatpengirim`, `no_hp_pengirim`, `namapenerima`, `alamatpenerima`, `no_hp_penerima`, `note`) VALUES
(1, 'abcde12345', 8, '', '', '', '', '', '', ''),
(2, 'abcde12346', 3, 'aku', 'ku', '231', 'asdf', 'asf', '123', 'sfd\r\n'),
(3, 'qwert12345', 0, 'kj', 'lkjl', '879', 'kjlkj', ',nk', '879', 'kljlk'),
(4, 'adceb51423', 2, 'fredo', 'jl.merpati', '082136899861', 'jeje', 'jl.pedurungan', '082219456687', 'Kalau sudah sampai taruh di teras aja'),
(17, 'dacbe53421', 2, 'willaim', 'saya', '128379586734', 'saya', 'juga', '283746593847', 'wkwk'),
(18, 'dbcea52134', 0, 'bear', 'ice', '867654738475', 'dia', 'juga', '847562839471', 'jangan di banting wkwk'),
(20, 'bcdea41532', 2, 'aji', 'jl.baskoro', '082136899861', 'william', 'jl.gondang raya', '857693746523', 'KALAU SUDAH SAMPAI TARUH DI TERAS AJA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_resi` varchar(16) NOT NULL,
  `no_barang` varchar(10) NOT NULL,
  `no_hp_pengirim` varchar(14) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `updateresi`
--

CREATE TABLE `updateresi` (
  `noresi` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `updateresi`
--

INSERT INTO `updateresi` (`noresi`, `deskripsi`) VALUES
(1, 'Barang di bawa kurir'),
(2, 'Barang di counter awal'),
(3, 'Barang siap dikirim ke gate (lokasi kirim)'),
(4, 'Barang tiba di gate (lokasi kirim)'),
(5, 'Barang dikirim ke gate (lokasi tujuan)'),
(6, 'Barang tiba di gate (lokasi tujuan)'),
(7, 'Barang di antar kurir ke lokasi tujuan'),
(8, 'Barang sampai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`no_barang`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcus`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jarak_kota`
--
ALTER TABLE `jarak_kota`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mini_admin`
--
ALTER TABLE `mini_admin`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`no_resi`),
  ADD KEY `no_ktp_mini` (`no_ktp_mini`),
  ADD KEY `nobarang` (`no_barang`);

--
-- Indeks untuk tabel `resi`
--
ALTER TABLE `resi`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `noresi` (`no_resi`),
  ADD KEY `no_barang` (`no_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `idcus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jarak_kota`
--
ALTER TABLE `jarak_kota`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `resi`
--
ALTER TABLE `resi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `no_ktp_mini` FOREIGN KEY (`no_ktp_mini`) REFERENCES `mini_admin` (`no_ktp`),
  ADD CONSTRAINT `nobarang` FOREIGN KEY (`no_barang`) REFERENCES `barang` (`no_barang`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `no_barang` FOREIGN KEY (`no_barang`) REFERENCES `barang` (`no_barang`),
  ADD CONSTRAINT `noresi` FOREIGN KEY (`no_resi`) REFERENCES `pengiriman` (`no_resi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
