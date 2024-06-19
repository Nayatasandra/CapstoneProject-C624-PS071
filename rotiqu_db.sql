-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2024 pada 13.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rotiqu_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `hadir` varchar(20) NOT NULL,
  `tidak_hadir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `nama`, `kode_karyawan`, `jabatan`, `tanggal`, `hadir`, `tidak_hadir`) VALUES
(7, 'Faizatun Nafisah', 'B01', 'Bag.Keuangan', '2023-06-23', 'Hadir', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `satuan` enum('Kg','Liter','Pcs') NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `jenis_roti` varchar(100) NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode`, `jenis_roti`, `jumlah`) VALUES
(2, 'KD02', 'Batik Outer', 10),
(23, 'KD01', 'Batik Blouse', 13),
(24, 'S-01', 'BATIK TRUSMI Atasan Wanita Outer Batik Motif Mega Mendung Pink Sabyan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangsupplier`
--

CREATE TABLE `barangsupplier` (
  `id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_produk` char(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(50) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE `keluar` (
  `id` int(11) NOT NULL,
  `no_keluar` varchar(50) NOT NULL,
  `kode_brg` varchar(50) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `tgl_keluar` varchar(25) NOT NULL,
  `jam_keluar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Trigger `keluar`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `keluar` FOR EACH ROW BEGIN
UPDATE persediaan_brg SET stok = stok - NEW.stok WHERE kode_brg = NEW.kode_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketersediaan`
--

CREATE TABLE `ketersediaan` (
  `id` int(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembur`
--

CREATE TABLE `lembur` (
  `id` int(11) NOT NULL,
  `kode_karyawan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jumlah_lembur` int(11) NOT NULL,
  `uang_lembur` double NOT NULL,
  `tunjangan` double NOT NULL,
  `gaji_pokok` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(11) NOT NULL,
  `no_terima` varchar(50) NOT NULL,
  `tgl_terima` varchar(50) NOT NULL,
  `jam_terima` varchar(50) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `kode_brg` varchar(50) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
--

CREATE TABLE `penggajian` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `tunjangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_roti` varchar(100) NOT NULL,
  `jumlah` double NOT NULL,
  `harga_jual` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `kode`, `tanggal`, `nama`, `jenis_roti`, `jumlah`, `harga_jual`) VALUES
(13, '02', '2023-06-26', 'kiki', 'Batik Two Tone', 20, 150000),
(14, '12', '2023-10-30', 'santika', 'Batik Blouse', 2, 125000),
(15, 'S-01', '2023-10-31', 'Intan Y', 'Batik Outer', 1, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `persediaan_brg`
--

CREATE TABLE `persediaan_brg` (
  `id` int(11) NOT NULL,
  `kode_brg` varchar(50) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `tanggal_produksi` varchar(50) NOT NULL,
  `tanggal_expired` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` enum('Baju','Kain','Sarimbit') NOT NULL,
  `hargaJual` int(30) NOT NULL,
  `jumlah` double NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `ukuran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode`, `tanggal_produksi`, `tanggal_expired`, `nama`, `jenis`, `hargaJual`, `jumlah`, `gambar`, `ukuran`) VALUES
(38, '13', '2024-06-14', '2024-06-14', 'Batik Two Tone', 'Baju', 150000, 20, '1718332957_4e299655502355528a50.jpg', '1'),
(39, '15', '2024-06-14', '2024-06-14', 'Batik Outer', 'Baju', 125000, 10, '1718333079_81e5422b3c75e138ae95.jpg', '1'),
(40, '11', '2024-06-14', '2024-06-14', 'Batik Two Tone', 'Baju', 150000, 12, '1718333499_ccfb43ab449c2c19446d.jpg', '1'),
(41, '12', '2024-06-14', '2024-06-14', 'Batik Outer', 'Baju', 100000, 13, '1718333528_4133e79145fc99c696d7.jpg', '1'),
(42, '14', '2024-06-14', '2024-06-14', 'Batik Blouse', 'Baju', 100000, 5, '1718333553_22c1f23687ca7c0e0f17.jpg', '1'),
(43, '16', '2024-06-14', '2024-06-14', 'Batik Blouse', 'Baju', 150000, 7, '1718333579_194fead103fbe6fe99a8.jpg', '1'),
(44, 'S-01', '', '', 'Batik Blouse', 'Baju', 150000, 1, '1718606572_6b3e6876f111050f3f8d.jpg', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `bahan_baku` varchar(50) NOT NULL,
  `harga_pokok` int(50) NOT NULL,
  `biaya_lain` int(50) NOT NULL,
  `total_biayaproduksi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `email` varchar(256) NOT NULL,
  `telp` varchar(256) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_checkin`
--

CREATE TABLE `tbl_checkin` (
  `id` int(11) NOT NULL,
  `idtamu` int(11) DEFAULT NULL,
  `idkamar` int(11) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_distributor`
--

CREATE TABLE `tbl_distributor` (
  `id` int(11) NOT NULL,
  `kodekamar` varchar(100) NOT NULL,
  `namatipe` varchar(50) DEFAULT NULL,
  `ukuran` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `kebutuhan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `id` int(11) NOT NULL,
  `nokamar` varchar(10) DEFAULT NULL,
  `idtipekamar` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `allotment` varchar(100) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pemesanan`
--

CREATE TABLE `transaksi_pemesanan` (
  `id_trans1` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `total_produk` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_trans` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_pemesanan`
--

INSERT INTO `transaksi_pemesanan` (`id_trans1`, `nama`, `no_hp`, `email`, `alamat`, `total_produk`, `total_harga`, `tanggal_trans`) VALUES
(44, 'Sun', '081234567890', 'sun@gmail.com', 'Medan', 2, 275000, '2024-06-17'),
(45, 'hassan', '0895016325261', 'hassan@gmail.com', 'Medan Baru', 2, 275000, '2024-06-17'),
(46, 'santika', '0865142312', 'santika1@gmail.com', 'Medan Binjai', 1, 150000, '2024-06-17'),
(47, 'hasan yuda', '08952513131341', 'hasan2@gmail.com', 'Palembang', 1, 375000, '2024-06-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(50) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` tinyint(1) NOT NULL,
  `jenis` enum('hrd','supplier','stok','produksi','penjualan','distributor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `akses`, `jenis`) VALUES
(17, 'arin', 'arin@gmail.com', '$2y$10$hfc87zRBarhG0Wg9Tyg45ucJt4VerR2mrbA0VJDWCcyQFUzQX8mCe', 0, 'produksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '12345678', '2022-12-25 08:25:28'),
(2, 'admin', 'admin1@gmail.com', '$2y$10$6eTrMDa3MXKny6QKXgzJNOal3pRGUvashdib1.lU0IGxKRoYBAnvG', '2022-12-26 07:27:28'),
(3, 'hotel', 'hotel123@gmail.com', '$2y$10$ujp..HJvZJZv/WcpUSVCL.1kjc2CbSoh9U230C55HBrL7waIeMkGe', '2022-12-26 08:05:30'),
(4, 'Risma', 'risma@gmail.com', '$2y$10$fbAsc4OeC9oaxo4GyyZtuuQB2MYJYslzZJdmFIw9JTzC7gltxrgB2', '2023-01-05 14:54:57'),
(5, 'Risma', 'risma1@gmail.com', '$2y$10$fAXoP/kjRvsIWR.41J5B2.w4ROGiQvk1JGLnuBWlG8RkKZ61XxC8q', '2023-04-09 15:45:34'),
(6, 'rizki', 'kikip6558@gmail.com', '$2y$10$uDU./nmVbr3wOcUNXN3SDuwCSNsajyrTNtUTLj5.kb9TwcH5A7bfq', '2023-05-02 02:44:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barangsupplier`
--
ALTER TABLE `barangsupplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_brg` (`kode_brg`);

--
-- Indeks untuk tabel `ketersediaan`
--
ALTER TABLE `ketersediaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_brg` (`kode_brg`);

--
-- Indeks untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode` (`kode`);

--
-- Indeks untuk tabel `persediaan_brg`
--
ALTER TABLE `persediaan_brg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_brg` (`kode_brg`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_checkin`
--
ALTER TABLE `tbl_checkin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtamu` (`idtamu`),
  ADD KEY `idkamar` (`idkamar`);

--
-- Indeks untuk tabel `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipekamar` (`idtipekamar`);

--
-- Indeks untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_pemesanan`
--
ALTER TABLE `transaksi_pemesanan`
  ADD PRIMARY KEY (`id_trans1`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `barangsupplier`
--
ALTER TABLE `barangsupplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `ketersediaan`
--
ALTER TABLE `ketersediaan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `persediaan_brg`
--
ALTER TABLE `persediaan_brg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_checkin`
--
ALTER TABLE `tbl_checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pemesanan`
--
ALTER TABLE `transaksi_pemesanan`
  MODIFY `id_trans1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `keluar_ibfk_1` FOREIGN KEY (`kode_brg`) REFERENCES `persediaan_brg` (`kode_brg`);

--
-- Ketidakleluasaan untuk tabel `tbl_checkin`
--
ALTER TABLE `tbl_checkin`
  ADD CONSTRAINT `tbl_checkin_ibfk_1` FOREIGN KEY (`idtamu`) REFERENCES `tbl_tamu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_checkin_ibfk_2` FOREIGN KEY (`idkamar`) REFERENCES `tbl_kamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD CONSTRAINT `tbl_kamar_ibfk_1` FOREIGN KEY (`idtipekamar`) REFERENCES `tbl_distributor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
