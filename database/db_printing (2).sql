-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2020 pada 04.14
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_printing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alamat`
--

CREATE TABLE `tb_alamat` (
  `id_alamat` varchar(5) NOT NULL,
  `id_user` varchar(6) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota/kab` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kodepos` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Kesalahan membaca data untuk tabel db_printing.tb_alamat: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_printing`.`tb_alamat`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dtrans`
--

CREATE TABLE `tb_dtrans` (
  `no_transaksi` varchar(15) NOT NULL,
  `produk_paket` varchar(128) NOT NULL,
  `harga_produk_paket` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `no_transaksi` varchar(15) NOT NULL,
  `foto_upload` varchar(128) NOT NULL,
  `status_foto` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info`
--

CREATE TABLE `tb_info` (
  `nama_toko` varchar(15) NOT NULL,
  `logo_toko` varchar(30) NOT NULL,
  `bg_header` varchar(30) NOT NULL,
  `judul_header` varchar(100) NOT NULL,
  `desk_header` text NOT NULL,
  `jenis_header` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Kesalahan membaca data untuk tabel db_printing.tb_info: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_printing`.`tb_info`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kd_kategori` varchar(5) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kd_kategori`, `kategori`) VALUES
('KTG01', 'Percetakan'),
('KTG02', 'Alat & Bahan'),
('KTG03', 'Musik'),
('KTG04', 'Artikel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `kd_paket` varchar(10) NOT NULL,
  `kd_produk` varchar(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `isi_paket` int(11) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `status_paket` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `kd_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `diskon_produk` int(11) NOT NULL,
  `desk_produk` text NOT NULL,
  `gambar_produk` varchar(30) NOT NULL DEFAULT 'default.jpg',
  `kategori_produk` varchar(5) NOT NULL,
  `status_produk` int(1) NOT NULL,
  `link` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`kd_produk`, `nama_produk`, `harga_produk`, `diskon_produk`, `desk_produk`, `gambar_produk`, `kategori_produk`, `status_produk`, `link`) VALUES
('PD01', 'Foto', 20000, 10, 'bagus', 'default.jpg', 'abc', 1, ''),
('PD02', 'Figura', 30000, 0, 'bagus', 'default.jpg', 'abc', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `no_transaksi` varchar(15) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `desk_transaksi` varchar(255) NOT NULL,
  `status_transaksi` int(2) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `email_pembeli` varchar(100) NOT NULL,
  `alamat_pembeli` varchar(255) NOT NULL,
  `kec_pembeli` varchar(100) NOT NULL,
  `kab_pembeli` varchar(100) NOT NULL,
  `prov_pembeli` varchar(50) NOT NULL,
  `kpos_pembeli` varchar(10) NOT NULL,
  `no_pembeli` varchar(15) NOT NULL,
  `jenis_pembayaran` int(1) NOT NULL,
  `bukti_pembayaran` varchar(128) NOT NULL,
  `pot_voucher` int(11) NOT NULL,
  `no_resi` varchar(30) NOT NULL,
  `biaya_ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ulasan`
--

CREATE TABLE `tb_ulasan` (
  `id_ulas` int(11) NOT NULL,
  `kd_produk` varchar(10) NOT NULL,
  `nama_ulas` varchar(100) NOT NULL,
  `email_ulas` varchar(100) NOT NULL,
  `isi_ulas` varchar(255) NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `foto_ulas` varchar(100) NOT NULL,
  `rating_ulas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(6) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `no_hp`, `email`, `password`, `level`, `status`, `date_created`, `date_updated`) VALUES
('AHG627', 'Rendy ', '08327626521', 'rendy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, 1, '2020-12-04 16:52:56', '2020-12-04 16:52:56'),
('D8I9KS', 'Chikita Putri', '082143138419', 'chiki@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('OZC1SO', 'Fahrul Irsyad Fianto', '082143138419', 'variationfianto@gmail.com', '$2y$10$JC09Eha.z4AXg7Ag1Un5gOM8uOYiMTixgB61yp8mRJMgan.wwCwii', 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('WDBT40', 'Chikita', '3509687990', 'ariniarin.af@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, 2, '2020-12-04 16:52:56', '2020-12-04 16:52:56'),
('X08BIC', 'Arini Firdausiyah', '081335373470', 'arinifirdausiyah.af@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, '2020-12-04 16:52:56', '2020-12-04 16:52:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_voucher`
--

CREATE TABLE `tb_voucher` (
  `kd_voucher` varchar(20) NOT NULL,
  `voucher` varchar(100) NOT NULL,
  `potongan_voucher` int(11) NOT NULL,
  `jenis_voucher` int(1) NOT NULL,
  `status_voucher` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_voucher`
--

INSERT INTO `tb_voucher` (`kd_voucher`, `voucher`, `potongan_voucher`, `jenis_voucher`, `status_voucher`) VALUES
('AKHIRTAHUN50', 'POTONHAN', 50, 2, 2),
('AKHIRTAHUNJOS', 'Gratis Ongkir', 15000, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_alamat`
--
ALTER TABLE `tb_alamat`
  ADD PRIMARY KEY (`id_alamat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_dtrans`
--
ALTER TABLE `tb_dtrans`
  ADD KEY `no_transaksi` (`no_transaksi`);

--
-- Indeks untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD KEY `no_transaksi` (`no_transaksi`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`kd_paket`),
  ADD KEY `kd_produk` (`kd_produk`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indeks untuk tabel `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD PRIMARY KEY (`id_ulas`),
  ADD KEY `kd_produk` (`kd_produk`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_voucher`
--
ALTER TABLE `tb_voucher`
  ADD PRIMARY KEY (`kd_voucher`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  MODIFY `id_ulas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_alamat`
--
ALTER TABLE `tb_alamat`
  ADD CONSTRAINT `tb_alamat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_dtrans`
--
ALTER TABLE `tb_dtrans`
  ADD CONSTRAINT `tb_dtrans_ibfk_1` FOREIGN KEY (`no_transaksi`) REFERENCES `tb_transaksi` (`no_transaksi`);

--
-- Ketidakleluasaan untuk tabel `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD CONSTRAINT `tb_gambar_ibfk_1` FOREIGN KEY (`no_transaksi`) REFERENCES `tb_transaksi` (`no_transaksi`);

--
-- Ketidakleluasaan untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`kd_produk`) REFERENCES `tb_produk` (`kd_produk`);

--
-- Ketidakleluasaan untuk tabel `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD CONSTRAINT `tb_ulasan_ibfk_1` FOREIGN KEY (`kd_produk`) REFERENCES `tb_produk` (`kd_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
