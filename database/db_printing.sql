-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jan 2021 pada 04.58
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `nama_penerima` varchar(100) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi_id` varchar(5) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota_id` varchar(5) NOT NULL,
  `kota_kab` varchar(100) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `status_alamat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_alamat`
--

INSERT INTO `tb_alamat` (`id_alamat`, `id_user`, `nama_penerima`, `nohp`, `alamat`, `provinsi_id`, `provinsi`, `kota_id`, `kota_kab`, `kodepos`, `status_alamat`) VALUES
('12304', 'X08BI9', 'Fahrul Irsyad', '081335373470', 'RT. 06 RW. 01, Desa Seneporejo, Kecamatan Siliragung', '11', 'Jawa Timur', '42', 'Kabupaten Banyuwangi', '67282', 0),
('12345', 'X08BI9', 'Arini Firda', '081335373470', 'Dusun Taman, RT/RW 012/003, Desa Bucor Kulon, Kecamatan Pakuniran', '11', 'Jawa Timur', '369', 'Kabupaten Probolinggo', '67282', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dbeli`
--

CREATE TABLE `tb_dbeli` (
  `no_beli` varchar(4) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `produk_beli` varchar(100) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `subtotal_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dbeli`
--

INSERT INTO `tb_dbeli` (`no_beli`, `kode_produk`, `produk_beli`, `harga_beli`, `jumlah_beli`, `subtotal_beli`) VALUES
('8893', '15075826', 'Kertas Foto', 10000, 2, 20000),
('8893', '15075827', 'Bingkai Foto', 15000, 1, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dtrans`
--

CREATE TABLE `tb_dtrans` (
  `no_transaksi` varchar(15) NOT NULL,
  `kd_produk` varchar(10) NOT NULL,
  `kd_paket` varchar(10) NOT NULL,
  `produk_paket` varchar(128) NOT NULL,
  `harga_produk_paket` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dtrans`
--

INSERT INTO `tb_dtrans` (`no_transaksi`, `kd_produk`, `kd_paket`, `produk_paket`, `harga_produk_paket`, `jumlah_produk`, `subtotal`) VALUES
('202101094079', '00012782', '27820009', 'Polaroid Premium 48', 36000, 2, 72000),
('202101092781', '00012782', '27820004', 'Polaroid Premium 24', 20000, 1, 20000),
('202101097904', '00012783', '', 'Figura', 55000, 1, 55000),
('202101108457', '00012782', '27820007', 'Polaroid Premium 8', 7000, 1, 7000),
('202101105515', '00012783', '', 'Figura', 55000, 1, 55000),
('202101100728', '00012782', '27820002', 'Polaroid Premium 32', 26000, 1, 26000),
('202101101839', '00012782', '27820004', 'Polaroid Premium 24', 20000, 1, 20000),
('202101101012', '00012782', '27820002', 'Polaroid Premium 32', 26000, 1, 26000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar`
--

CREATE TABLE `tb_gambar` (
  `no_transaksi` varchar(15) NOT NULL,
  `foto_upload` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gambar`
--

INSERT INTO `tb_gambar` (`no_transaksi`, `foto_upload`) VALUES
('202101094079', 'ZEPETO_-8586113212809459288.png'),
('202101094079', 'ZEPETO_-8586133068016976978.png'),
('202101094079', 'ZEPETO_-8585986801135269428.png'),
('202101094079', 'ZEPETO_-8585986821210799258.png'),
('202101094079', 'ZEPETO_-8585986822862547048.png'),
('202101094079', 'ZEPETO_-8585989310903734438.png'),
('202101094079', 'ZEPETO_-8585989311721914508.png'),
('202101094079', 'ZEPETO_-8585989313674033958.png'),
('202101094079', 'ZEPETO_-8585990469202562378.png'),
('202101094079', 'ZEPETO_-8586113208602515528.png'),
('202101094079', 'ZEPETO_-8586113209870315398.png'),
('202101094079', 'ZEPETO_-8586113210251608518.png'),
('202101094079', 'ZEPETO_-8586113212245621348.png'),
('202101092781', 'ZEPETO_-8586113212809459288.png'),
('202101108457', 'download (1).jpg'),
('202101108457', 'a-sunrise.jpg'),
('202101105515', '2cdc16e1-aca6-4d94-8fc8-736a1ea8ecfa.jpg'),
('202101100728', 'Pamer-Biji-Depan-Kamera-saat-Majikan-Cover-Lagu-Kucing-Oren-ini-Viral.jpg'),
('202101101839', '1_cOFZH56G3dnpp18yMhwgHw.png'),
('202101101012', 'c5b5817be5e606fa5a86bea13d778567.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kd_kategori` varchar(5) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `status_kategori` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kd_kategori`, `kategori`, `status_kategori`) VALUES
('KTG01', 'Percetakan', 1),
('KTG02', 'Alat & Bahan', 0),
('KTG03', 'Musik', 1),
('KTG04', 'Artikel', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komplain`
--

CREATE TABLE `tb_komplain` (
  `id_komplain` varchar(5) NOT NULL,
  `no_transaksi` varchar(15) NOT NULL,
  `no_pengaju` varchar(13) NOT NULL,
  `isi_komplain` varchar(200) NOT NULL,
  `solusi_komplain` varchar(200) NOT NULL,
  `gambar_komplain` varchar(100) NOT NULL,
  `status_komplain` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_komplain`
--

INSERT INTO `tb_komplain` (`id_komplain`, `no_transaksi`, `no_pengaju`, `isi_komplain`, `solusi_komplain`, `gambar_komplain`, `status_komplain`) VALUES
('95795', '202101094079', '081335373470', 'Beberapa foto hasilnya rusak', 'Mohon diganti dengan yang lebih bagus', '22-.PNG', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `kd_paket` varchar(10) NOT NULL,
  `kd_produk` varchar(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `isi_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `gambar_paket` varchar(100) NOT NULL,
  `status_paket` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`kd_paket`, `kd_produk`, `nama_paket`, `isi_paket`, `harga_paket`, `gambar_paket`, `status_paket`) VALUES
('27820001', '00012782', 'Standard', '30', 25000, '', 0),
('27820002', '00012782', 'Premium', '32', 26000, '', 1),
('27820004', '00012782', 'Premium', '24', 20000, '', 1),
('27820005', '00012782', 'Standard', '20', 18000, '', 0),
('27820006', '00012782', 'Standard', '1', 500, '', 1),
('27820007', '00012782', 'Premium', '8', 7000, '', 1),
('27820008', '00012782', 'Premium', '40', 30000, '', 1),
('27820009', '00012782', 'Premium', '48', 36000, '', 1),
('27820010', '00012782', 'Premium', '56', 42000, '', 1),
('58260003', '15075826', 'Premium', '16', 14000, '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `no_beli` varchar(4) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `user_beli` varchar(6) NOT NULL,
  `nama_beli` varchar(100) NOT NULL,
  `total_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`no_beli`, `tanggal_beli`, `user_beli`, `nama_beli`, `total_beli`) VALUES
('8893', '2020-12-27', 'X08BIC', 'Arini Firdausiyah', 35000);

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
  `gambar_produk` varchar(100) NOT NULL,
  `kategori_produk` varchar(5) NOT NULL,
  `status_produk` int(1) NOT NULL,
  `produk_upload` int(1) NOT NULL,
  `link` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`kd_produk`, `nama_produk`, `harga_produk`, `diskon_produk`, `desk_produk`, `gambar_produk`, `kategori_produk`, `status_produk`, `produk_upload`, `link`) VALUES
('00012782', 'Polaroid', 7000, 0, 'Yuk di order di jamin kualitas terbaik . Harga terjangkau kualitas oke, tidak luntur jika terkena air.. yuk buruan langsung di order aja kakak🤗🤗 . . Untuk order bisa dm atau langsung hubungi no wa yang ada di bio ya kakak  #polaroid #cetakfotopolaroid #fotopolaroid #polaroidmurah', 'premium.png', 'KTG01', 1, 1, 'polaroid'),
('00012783', 'Figura', 55000, 0, '', 'figura.png', 'KTG01', 1, 2, 'figura'),
('15075826', 'Kertas Foto', 10000, 0, 'ads', '', 'KTG02', 3, 2, ''),
('15075827', 'Bingkai Foto', 15000, 0, 'ads', '', 'KTG02', 1, 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `no_transaksi` varchar(15) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `desk_transaksi` varchar(255) NOT NULL,
  `status_transaksi` int(2) NOT NULL,
  `user` varchar(6) DEFAULT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `email_pembeli` varchar(100) NOT NULL,
  `alamat_pembeli` varchar(255) NOT NULL,
  `kec_pembeli` varchar(100) NOT NULL,
  `kab_pembeli` varchar(100) NOT NULL,
  `prov_pembeli` varchar(50) NOT NULL,
  `kpos_pembeli` varchar(10) NOT NULL,
  `no_pembeli` varchar(15) NOT NULL,
  `jenis_pembayaran` int(1) NOT NULL,
  `detail_cod` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(128) NOT NULL,
  `kode_voucher` varchar(20) NOT NULL,
  `pot_voucher` int(11) NOT NULL,
  `no_resi` varchar(30) NOT NULL,
  `biaya_ongkir` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status_baca` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`no_transaksi`, `tanggal_transaksi`, `desk_transaksi`, `status_transaksi`, `user`, `nama_pembeli`, `email_pembeli`, `alamat_pembeli`, `kec_pembeli`, `kab_pembeli`, `prov_pembeli`, `kpos_pembeli`, `no_pembeli`, `jenis_pembayaran`, `detail_cod`, `bukti_pembayaran`, `kode_voucher`, `pot_voucher`, `no_resi`, `biaya_ongkir`, `total_bayar`, `status_baca`) VALUES
('202101092781', '2021-01-09 22:07:56', 'Ketemu di depan UNEJ yaa kak', 5, 'X08BI9', 'Arini Firda', 'arinifirda.af@gmail.com', '', '', '', '', '', '081335373470', 2, 'Daerah Jl Kalimantan', '', '', 0, '', 0, 20000, 1),
('202101094079', '2021-01-09 21:32:29', 'ditungguu', 5, 'X08BI9', 'Arini Firda', 'arinifirda.af@gmail.com', 'Dusun Taman, RT/RW 012/003, Desa Bucor Kulon, Kecamatan Pakuniran', '', 'Kabupaten Probolinggo', 'Jawa Timur', '67282', '081335373470', 1, '', 'bukti.jpeg', 'AKHIRTAHUNJOS', 5000, 'JNE 027831923', 8000, 75000, 1),
('202101097904', '2021-01-09 22:14:10', 'ditunggu', 5, NULL, 'Rendy Wisnu', 'ariniarin.af@gmail.com', 'Perumahan apadeh', '', 'Kota Jakarta Selatan', 'DKI Jakarta', '67829', '08172618281', 1, '', 'buktiii.jpeg', 'AKHIRTAHUNJOS', 5000, 'JNE 0215654765', 15000, 65000, 1),
('202101100728', '2021-01-10 04:49:22', '', 2, NULL, 'chikita', 'farhanirs16@gmail.com', 'RT 06 RW 01 Desa Seneporejo kecamatan siliragung', '', 'Kabupaten Banyuwangi', 'Jawa Timur', '68488', '082132167482', 1, '', '3a1c67e8-064d-4f56-80eb-feced76cad3e_169.jpg', '', 0, '', 6000, 32000, 0),
('202101101012', '2021-01-10 04:56:25', '', 4, NULL, 'dany', 'dany@gmail.com', 'Kraksaan nomer 2', '', 'Kabupaten Probolinggo', 'Jawa Timur', '63271', '081236227362', 1, '', 'Dok baru 2019-09-28 15.53.07_1.jpg', '', 0, 'JP082371238', 8000, 34000, 0),
('202101101839', '2021-01-10 04:54:06', '', 0, NULL, 'dany', 'dany@gmail.com', 'Kraksaan nomer 2 ', '', 'Kabupaten Probolinggo', 'Jawa Timur', '67253', '081231274627', 1, '', 'Dok baru 2019-09-28 15.53.07_1.jpg', '', 0, '', 8000, 28000, 0),
('202101105515', '2021-01-10 04:46:00', '', 3, NULL, 'fahrul', 'fahrulirsyad16@gmail.com', 'jalan badung permai nomer 21 kecamatan badung', '', 'Kabupaten Badung', 'Bali', '65231', '082132123124', 1, '', '20200611_214715.jpg', '', 0, '', 18000, 73000, 0),
('202101108457', '2021-01-10 04:43:09', 'tolong segera dikirimkan', 1, NULL, 'Genta', 'variationfianto@gmail.com', 'Jl. sleman 2 gang 2 nomer 1', '', 'Kabupaten Sleman', 'DI Yogyakarta', '67261', '082312312321', 1, '', '', '', 0, '', 15000, 22000, 0);

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
  `rating_ulas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ulasan`
--

INSERT INTO `tb_ulasan` (`id_ulas`, `kd_produk`, `nama_ulas`, `email_ulas`, `isi_ulas`, `timestamp`, `rating_ulas`) VALUES
(7, '00012782', 'Arini Firda', 'arinifirda.af@gmail.com', 'Bagus sii, tapi beberapa foto yang dikirim rusak, jadi saya merasa kecewa', '', 3),
(8, '00012782', 'Arini Firda', 'arinifirda.af@gmail.com', 'kakaknya ramah sekali, terima kasih', '', 5);

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
  `date_updated` datetime NOT NULL,
  `date_online` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `no_hp`, `email`, `password`, `level`, `status`, `date_created`, `date_updated`, `date_online`) VALUES
('4WKBT9', 'Aisyah Putri', '081335373470', 'ariniarin.af@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, 1, '2016-09-21 18:17:00', '0000-00-00 00:00:00', NULL),
('AHG627', 'Rendy ', '08327626521', 'rendy@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, 1, '2020-12-04 16:52:56', '2020-12-04 16:52:56', '2020-12-28'),
('OLY1UB', 'Fahrul Irsyad', '082331147548', 'fahrul@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, 1, '2020-12-04 17:17:37', '2020-12-04 17:17:37', NULL),
('VA729K', 'Chikita Putri', '083826762873', 'chiki@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, 1, '2020-12-04 16:52:56', '2020-12-04 16:52:56', '2020-12-29'),
('X08BI9', 'Arini Firda', '081334567890', 'arinifirda.af@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, 1, '2020-12-04 16:52:56', '2020-12-04 16:52:56', '2021-01-09'),
('X08BIC', 'Arini Firdausiyah', '081335373470', 'arinifirdausiyah.af@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, 1, '2020-12-04 16:52:56', '2020-12-04 16:52:56', '2021-01-09');

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
('AKHIRTAHUN50', 'POTONGAN', 5, 2, 1),
('AKHIRTAHUNJOS', 'Gratis Ongkir', 5000, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alamat`
--
ALTER TABLE `tb_alamat`
  ADD PRIMARY KEY (`id_alamat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_dbeli`
--
ALTER TABLE `tb_dbeli`
  ADD KEY `no_beli` (`no_beli`);

--
-- Indexes for table `tb_dtrans`
--
ALTER TABLE `tb_dtrans`
  ADD KEY `no_transaksi` (`no_transaksi`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD KEY `no_transaksi` (`no_transaksi`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `tb_komplain`
--
ALTER TABLE `tb_komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`kd_paket`),
  ADD KEY `kd_produk` (`kd_produk`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`no_beli`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  ADD PRIMARY KEY (`id_ulas`),
  ADD KEY `kd_produk` (`kd_produk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_voucher`
--
ALTER TABLE `tb_voucher`
  ADD PRIMARY KEY (`kd_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ulasan`
--
ALTER TABLE `tb_ulasan`
  MODIFY `id_ulas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
