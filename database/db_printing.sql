-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2020 pada 15.42
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

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
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota/kab` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kodepos` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dtrans`
--

CREATE TABLE `tb_dtrans` (
  `no_transaksi` varchar(15) NOT NULL,
  `kd_paket` varchar(5) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `no_transaksi` int(15) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kd_kategori` varchar(5) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `kd_paket` varchar(5) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `isi_paket` int(11) NOT NULL,
  `harga_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `kd_produk` varchar(6) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `diskon_produk` int(11) NOT NULL,
  `desk_produk` text NOT NULL,
  `gambar_produk` varchar(30) NOT NULL,
  `kategori_produk` varchar(5) NOT NULL,
  `link` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `no_transaksi` varchar(15) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `desk_transaksi` varchar(255) NOT NULL,
  `status_transaksi` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `email_pembeli` varchar(100) NOT NULL,
  `alamat_pembeli` varchar(255) NOT NULL,
  `kec_pembeli` varchar(100) NOT NULL,
  `kab_pembeli` varchar(100) NOT NULL,
  `prov_pembeli` varchar(50) NOT NULL,
  `kpos_pembeli` varchar(10) NOT NULL,
  `no_pembeli` varchar(15) NOT NULL,
  `kd_voucher` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ulasan`
--

CREATE TABLE `tb_ulasan` (
  `id_ulas` int(11) NOT NULL,
  `kd_produk` varchar(6) NOT NULL,
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
  `id_alamat` varchar(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_voucher`
--

CREATE TABLE `tb_voucher` (
  `kd_voucher` varchar(6) NOT NULL,
  `voucher` varchar(100) NOT NULL,
  `potongan_voucher` int(11) NOT NULL,
  `jenis_voucher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_alamat`
--
ALTER TABLE `tb_alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`kd_paket`);

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
  ADD PRIMARY KEY (`id_ulas`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
