-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220719.04fabfdc7e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 09:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `hadir` varchar(20) NOT NULL,
  `tidak_hadir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nama`, `kode_karyawan`, `jabatan`, `tanggal`, `hadir`, `tidak_hadir`) VALUES
(7, 'Faizatun Nafisah', 'B01', 'Bag.Keuangan', '2023-06-23', 'Hadir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `satuan` enum('Kg','Liter','Pcs') NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `jenis_roti` varchar(100) NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode`, `jenis_roti`, `jumlah`) VALUES
(1, '111', 'Roti Sobek', 1),
(2, 'KD01', 'Roti Ulang tahun', 13),
(3, 'KD02', 'Roti Pukis', 10),
(4, 'KD03', 'Roti Kering', 29),
(5, 'KD05', 'Roti Coklat', 16);

-- --------------------------------------------------------

--
-- Table structure for table `barangsupplier`
--

CREATE TABLE `barangsupplier` (
  `id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangsupplier`
--

INSERT INTO `barangsupplier` (`id`, `kode`, `jenis_barang`, `stok`, `satuan`) VALUES
(1, 'BRG01', 'GULA', '60', 'KILO'),
(2, 'BRG02', 'TEPUNG', '100', 'KILO');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `email`, `no_hp`) VALUES
(2, 'Monalisa Arcelia', 'Jakarta', 'mona@gmail.com', '08765432458');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `kode`, `nama_jenis`) VALUES
(1, '01', 'GULA'),
(2, '02', 'GARAM'),
(3, '03', 'TEPUNG'),
(4, '04', 'MENTEGA'),
(5, '05', 'MAIZENA');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `alamat`, `email`, `no_hp`, `gambar`) VALUES
(2, 'Narenda Wicaksono', 'Jakarta', 'narenda@gmail.com', '08575282923', '1681169277_e618508eac9b608811dd.png');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id` int(11) NOT NULL,
  `no_keluar` varchar(50) NOT NULL,
  `kode_brg` varchar(50) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `tgl_keluar` varchar(25) NOT NULL,
  `jam_keluar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id`, `no_keluar`, `kode_brg`, `nama_brg`, `stok`, `tgl_keluar`, `jam_keluar`) VALUES
(27, 'Keluar01', 'BRG03', 'TEPUNG', '50', '25/06/2023', '18:18:01'),
(28, 'Keluar02', 'BRG02', 'GARAM', '15', '25/06/2023', '19:18:55');

--
-- Triggers `keluar`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `keluar` FOR EACH ROW BEGIN
UPDATE persediaan_brg SET stok = stok - NEW.stok WHERE kode_brg = NEW.kode_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ketersediaan`
--

CREATE TABLE `ketersediaan` (
  `id` int(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ketersediaan`
--

INSERT INTO `ketersediaan` (`id`, `kode`, `nama_satuan`) VALUES
(4, '01', 'PCS'),
(5, '02', 'ONS'),
(6, '03', 'KILO'),
(7, '04', 'GRAM'),
(8, '05', 'DUS');

-- --------------------------------------------------------

--
-- Table structure for table `lembur`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lembur`
--

INSERT INTO `lembur` (`id`, `kode_karyawan`, `tanggal`, `nama`, `jumlah_lembur`, `uang_lembur`, `tunjangan`, `gaji_pokok`) VALUES
(5, 'B02', '2023-06-24', 'Nikmaturr', 2, 200000, 100000, 200000),
(6, 'B01 ', '2023-06-23', 'Faizatun Nafisahh', 3, 150000, 100000, 200000),
(7, 'B04', '2023-06-24', 'Adilla', 2, 10000, 200000, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-06-05-152515', 'App\\Database\\Migrations\\Profile', 'default', 'App', 1654443046, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `no_terima`, `tgl_terima`, `jam_terima`, `nama_supplier`, `kode_brg`, `nama_brg`, `jumlah`, `satuan`) VALUES
(8, 'Masuk01', '25/06/2023', '18:24:48', 'Dimas Maulana', 'BRG01', 'GULA', '60', 'KILO'),
(9, 'Masuk02', '25/06/2023', '18:25:39', 'Ari Anggoro', 'BRG02', 'TEPUNG', '100', 'KILO');

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `tunjangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`id`, `tanggal`, `nama`, `kode_karyawan`, `gaji_pokok`, `tunjangan`) VALUES
(15, '2023-06-07', 'Faizatun Nafisahh', 'B01 ', 200000, 100000),
(16, '2023-06-24', 'Nikmaturr', 'B02', 300000, 100000),
(18, '2023-06-16', 'Risma', 'B03', 500000, 200000),
(19, '2023-06-14', 'Adilla', 'B04', 250000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_roti` varchar(100) NOT NULL,
  `jumlah` double NOT NULL,
  `harga_jual` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `kode`, `tanggal`, `nama`, `jenis_roti`, `jumlah`, `harga_jual`) VALUES
(12, '23', '2023-06-25', 'Adila', 'Roti Sobek', 1, 5000),
(13, '02', '2023-06-26', 'kiki', 'Roti Pukis', 20, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_brg`
--

CREATE TABLE `persediaan_brg` (
  `id` int(11) NOT NULL,
  `kode_brg` varchar(50) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persediaan_brg`
--

INSERT INTO `persediaan_brg` (`id`, `kode_brg`, `nama_brg`, `stok`, `satuan`, `keterangan`) VALUES
(31, 'BRG01', 'GULA', '50', 'KILO', 'BARANG DI RAK 1'),
(32, 'BRG02', 'GARAM', '0', 'DUS', 'BARANG DI RAK 2'),
(33, 'BRG03', 'TEPUNG', '100', 'KILO', 'BARANG DI RAK 3'),
(34, 'BRG04', 'MENTEGA', '200', 'KILO', 'BARANG DI RAK 4');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `tanggal_produksi` varchar(50) NOT NULL,
  `tanggal_expired` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` enum('Bakery','Pastry','Lain-lain') NOT NULL,
  `hargaJual` int(30) NOT NULL,
  `jumlah` double NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `tanggal_produksi`, `tanggal_expired`, `nama`, `jenis`, `hargaJual`, `jumlah`, `gambar`) VALUES
(24, 'P01', '26/06/2023', '2023-07-26', 'Roti Keringan', 'Bakery', 15000, 12, '1687758180_ebe03782d0464f575fa4.jpeg'),
(25, 'P02', '26/06/2023', '2023-07-27', 'Roti Sobek', 'Bakery', 25000, 23, '1687758211_ee02c35d0ca9412aea69.jpeg'),
(26, 'P03', '26/06/2023', '2023-07-26', 'Roti Ulang tahun', 'Bakery', 67000, 5, '1687758303_64dd8fc61a3b87621ab5.jpeg'),
(27, 'P04', '26/06/2023', '2023-07-13', 'Roti Pukis', 'Bakery', 15000, 34, '1687758347_4eb50cdeeb3c4ceec294.jpeg'),
(28, 'P05', '26/06/2023', '2023-07-26', 'Roti Coklat', 'Bakery', 15000, 23, '1687758392_4c7da89c88b41afcaf7a.jpeg'),
(29, 'P06', '26/06/2023', '2023-07-26', 'Waffle Kering', 'Bakery', 25000, 45, '1687758439_4eab30b2469c1ffea317.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `bahan_baku` varchar(50) NOT NULL,
  `harga_pokok` int(50) NOT NULL,
  `biaya_lain` int(50) NOT NULL,
  `total_biayaproduksi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `kode`, `bahan_baku`, `harga_pokok`, `biaya_lain`, `total_biayaproduksi`) VALUES
(1, 'd12', 'gdjsk', 12000, 20000, 123),
(2, 'b01', 'beras', 6000, 80000, 767990),
(3, 'D001', 'tepung', 12000, 20000, 3333);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `email` varchar(256) NOT NULL,
  `telp` varchar(256) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama`, `alamat`, `email`, `telp`, `gambar`) VALUES
(5, 'Monalisa Arcelia', 'Jakarta', 'mona@gmail.com', '08531231239', '1672930646_cb99323cb1b22f5a7288.png'),
(13, 'Narenda Wicaksono', 'Bandung', 'narenda@gmail.com', '087643214567', '1672930723_e5c3ca882bb8a867bc9f.png');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode`, `nama`, `email`, `hp`, `alamat`) VALUES
(1, 'S-03', 'Monalisa Arcelia', 'mona@gmail.com', '08979987775', 'Batang'),
(4, 'S-02', 'Rizqi', 'Rizqi@gmail.com', '08798768890', 'Batang'),
(5, 'S-01', 'kiki', 'agah@gmail.com', '08583873833', 'pekalonga kota'),
(6, 'S-04', 'Budiyono', 'budi@gmail.com', '0874689320', 'Buaran'),
(7, 'S-05', 'Dimas Maulana', 'agus@gmail.com', '08572892023', 'Kedungwuni'),
(8, 'S-06', 'Dinda', 'dinda@gmail.com', '0874929882', 'Bojong'),
(9, 'S-07', 'Ari Anggoro', 'ari@gmail.com', '08937829029', 'Bojong'),
(10, 'S-08', 'Sunoto', 'sunotosuwun@gmail.com', '08598373939', 'Pekalongan'),
(11, 'S-09', 'Syarifah', 'syarifah@gmail.com', '08973838722', 'Wonopringgo'),
(12, 'S-10', 'Slamet Hadi', 'hadi@gmail.com', '08536738922', 'Batang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkin`
--

CREATE TABLE `tbl_checkin` (
  `id` int(11) NOT NULL,
  `idtamu` int(11) DEFAULT NULL,
  `idkamar` int(11) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_distributor`
--

INSERT INTO `tbl_distributor` (`id`, `kodekamar`, `namatipe`, `ukuran`, `alamat`, `kebutuhan`, `nama`, `pembayaran`) VALUES
(33, '23', '2023-06-25', 'pekalongan kota', '1', 'Roti Sobek', 'Adila', 'Mandiri'),
(34, '02', '2023-06-26', 'pekalongan kota', '20', 'Roti Pukis', 'kiki', 'Mandiri');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `id` int(11) NOT NULL,
  `nokamar` varchar(10) DEFAULT NULL,
  `idtipekamar` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `allotment` varchar(100) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`id`, `nama`, `alamat`, `email`, `phone`) VALUES
(5, 'risma', 'Pekalongan', 'risma@gmail.com', '089603195863'),
(6, 'Aulia', 'Pekalongan', 'aulia@gmail.com', '08969746823'),
(7, 'Syarifah', 'Pekalongan', 'syarifah@gmail.com', '08578956773'),
(8, 'Arshaka', 'Batang', 'arshaka@gmail.com', '08867897655'),
(9, 'Ulil Albab', 'Semarang', 'ulil@gmail.com', '0897654366');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` tinyint(1) NOT NULL,
  `jenis` enum('hrd','supplier','stok','produksi','penjualan','distributor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `akses`, `jenis`) VALUES
(1, 'hrd', 'hrd@gmail.com', '$2y$10$WGp8/y/kouC4LlsIk2QZ0eLpXwy1hzTHaGE0hgkBjGDPzmRLP9F36', 0, 'hrd'),
(2, 'supplier', 'supplier@gmail.com', '$2y$10$RqJRKA8Yu2PzEQZNkywNieCZUF7E3D/KgrO7Qov8bkpnnO6h47XWO', 0, 'supplier'),
(3, 'stok', 'stok@gmail.com', '$2y$10$MTMphj5ci6RRIkU2aa7kFe.Raykbvz7ForzkTb0zo9sKDUe7loKqS', 0, 'stok'),
(4, 'produksi', 'produksi@gmail.com', '$2y$10$nu68t643L6MEH55//PGugejn9nhEIoXaK4r.YW5fp7GLwP2alERCC', 0, 'produksi'),
(5, 'penjualan', 'penjualan@gmail.com', '$2y$10$7jQrnwg02GowyaiJgHVnFugN/9I9WpccPN7Ge02VkM0PQqLhiwunq', 0, 'penjualan'),
(6, 'distributor', 'distributor@gmail.com', '$2y$10$0loab82BciT6F5ys5pgqcu4YQZ.j4kuCilY6PZISTBRAUvAVGI/ra', 0, 'distributor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
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
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangsupplier`
--
ALTER TABLE `barangsupplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_brg` (`kode_brg`);

--
-- Indexes for table `ketersediaan`
--
ALTER TABLE `ketersediaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_brg` (`kode_brg`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `persediaan_brg`
--
ALTER TABLE `persediaan_brg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_brg` (`kode_brg`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_checkin`
--
ALTER TABLE `tbl_checkin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtamu` (`idtamu`),
  ADD KEY `idkamar` (`idkamar`);

--
-- Indexes for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipekamar` (`idtipekamar`);

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barangsupplier`
--
ALTER TABLE `barangsupplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ketersediaan`
--
ALTER TABLE `ketersediaan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `persediaan_brg`
--
ALTER TABLE `persediaan_brg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_checkin`
--
ALTER TABLE `tbl_checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `keluar_ibfk_1` FOREIGN KEY (`kode_brg`) REFERENCES `persediaan_brg` (`kode_brg`);

--
-- Constraints for table `tbl_checkin`
--
ALTER TABLE `tbl_checkin`
  ADD CONSTRAINT `tbl_checkin_ibfk_1` FOREIGN KEY (`idtamu`) REFERENCES `tbl_tamu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_checkin_ibfk_2` FOREIGN KEY (`idkamar`) REFERENCES `tbl_kamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD CONSTRAINT `tbl_kamar_ibfk_1` FOREIGN KEY (`idtipekamar`) REFERENCES `tbl_distributor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
