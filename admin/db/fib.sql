-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 04:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fib`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_admin`
--

CREATE TABLE `db_admin` (
  `email` varchar(225) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_admin`
--

INSERT INTO `db_admin` (`email`, `nama_admin`, `password`) VALUES
('balgohum.jihad@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `db_adv`
--

CREATE TABLE `db_adv` (
  `id_adv` int(4) NOT NULL,
  `nama_adv` varchar(25) NOT NULL,
  `pil_adv` int(1) NOT NULL,
  `file_adv` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_adv`
--

INSERT INTO `db_adv` (`id_adv`, `nama_adv`, `pil_adv`, `file_adv`) VALUES
(1, 'Promo Satu', 1, ''),
(2, 'Promo Dua', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `db_barang`
--

CREATE TABLE `db_barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_kategori` varchar(3) NOT NULL,
  `id_ukuran` varchar(5) NOT NULL,
  `harga_barang` varchar(10) NOT NULL,
  `stok_barang` varchar(10) NOT NULL,
  `id_promo` varchar(3) DEFAULT NULL,
  `deskripsi` longtext NOT NULL,
  `images` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_barang`
--

INSERT INTO `db_barang` (`id_barang`, `nama_barang`, `id_kategori`, `id_ukuran`, `harga_barang`, `stok_barang`, `id_promo`, `deskripsi`, `images`, `created_at`) VALUES
('Barang01', 'Kemeja Pria Casual Panjang JOBB ORIGINAL', 'K01', 'M', '96000', '3', 'A01', 'LIMITED STOCK\r\nOriginal Brand\r\nAvailable size\r\nChart size ( PAnjang X lebar )\r\n16 1/2 : Panjang 80cm X Lebar 55cm - Setara Size M Lokal\r\n\r\n                      ', 'Barang01.jpeg', '2021-12-11 11:11:20'),
('Barang02', 'KAOS LENGAN PENDEK UNISEX ADIDAS LOGO TEE AERO', 'K01', 'L', '125000', '2', 'A01', '\"Chart Size ( Lebar x Panjang )\r\n- L : 114 cm x 75 cm\r\n\"\r\n', 'Barang02.jpeg', '2021-12-11 11:13:07'),
('Barang03', 'KAOS WANIITA ADIDAS AEROREADY DRY TEE ORIGINAL', 'K01', 'S', '115000', '2', 'A01', 'Chart Size ( Lebar x Panjang ) - S : 90 cm x 58 cm - M : 91 cm x 59 cm\r\n', 'Barang03.jpeg', '2021-12-11 11:14:03'),
('CL001', 'CELANA WANITA PANJANG H&M PULL ON TROUSER', 'K02', 'L', '99500', '2', 'A01', '\"Chart size  Reguler (Panjang x Lebar ) Regular                               \r\nS : 34 cm x 92 cm\r\nM : 36 cm x 94 cm\r\nL : 38 cm x 96 cm\r\nXL : 40 cm x 98 cm\"\r\n\r\n                      ', 'CL001.jpeg', '2021-12-11 11:16:11'),
('CL002', 'CELANA WANITA PANJANG H&M PULL ON TROUSER', 'K02', 'M', '87000', '2', 'A01', '\"Chart Size ( Lebar x Panjang )\r\nS : 34 cm x 92 cm\r\nM : 36 cm x 94 cm\r\nL : 38 cm x 96 cm\r\nXL : 40 cm x 98 cm                        \r\n\"\r\n\r\n                      ', 'CL002.jpeg', '2021-12-11 11:16:55'),
('CL003', 'CELANA PANJANG WANITA KOREAN STYLE H&M PANT PULL O', 'K02', 'M', '119700', '1', 'A01', '\"Chart Size ( Lebar x Panjang )\r\n\r\nS : 34 cm x 92 cm\r\nM : 36 cm x 94 cm\r\nL : 38 cm x 96 cm\r\nXL : 40 cm x 98 cm\"\r\n\r\n                      ', 'CL003.jpeg', '2021-12-11 11:17:47'),
('DR001', 'DRESS WANITA CASUAL URBAN OUTFITER TROPICAL', 'K03', 'L', '125000', '0', 'A01', ' \"Chart Size ( Lebar x Panjang )\r\n- S : 33 cm x 68 cm\r\n- M : 35 cm x 69 cm\r\n- L : 37 cm x 73 cm\r\n- XL : 41 cm x 73 cm\"\r\n', 'DR001.jpeg', '2021-12-11 11:22:29'),
('DR002', 'DRESS WANITA KOREAN STYLE Midi Dress Lilly Pulitze', 'K03', 'L', '60000', '4', 'A01', '\"                     \r\nREADY SIZE :      \r\nXS = PANJANG 78 CM X LEBAR 38 CM                \r\nS = PANJANG 80 CM X LEBAR   39 CM \r\nM = PANJANG 81 CM X LEBAR  43 CM\r\nL = PANJANG 82 CM X LEBAR  45 CM \r\nXL = PANJANG 86 CM X LEBAR 49 CM \"\r\n\r\n                      ', 'DR002.jpeg', '2021-12-11 11:23:02'),
('DR003', 'DRESS WANITA KOREAN STYLE BRAND KOREA', 'K03', 'M', '65000', '3', 'A01', 'M : PANJANG 100cm X Lebar 52cm X Lebar Pinggang 47cm \r\n\r\n                      ', 'DR003.jpeg', '2021-12-11 11:23:38'),
('JK001', 'Jaket Pria Outdoor Napajiri Skidoo Light Grey', 'K04', 'L', '1750000', '2', 'A01', '- S  : Lebar 58 cm x Panjang 72 cm ( merah,grey )', 'JK001.jpeg', '2021-12-11 11:19:14'),
('JK002', 'JAKET PRIA NAPAPIJRI SKIDOO WINTER SARKLING RED', 'K04', 'M', '1250000', '2', 'A01', '\"Skidoo adalah Anorak berkerudung Napapijri, dan jaket pertama yang dirancang oleh merek tersebut. Bukan kebetulan bahwa ia telah bertahan dalam ujian waktu sebaik yang dimilikinya. Bentuknya yang unik ditentukan oleh saku flap depan yang ikonik dan saku kanguru di samping, serta pinggang yang dapat disesuaikan. Skidoo mewujudkan tampilan khas merek dan, berkat penggunaan insulasi bantalan Thermo-Fibre™ alih-alih turun, komitmennya terhadap sumber yang berkelanjutan.\r\nChart Size ( Lebar x Panjang )\r\nS  : Lebar 58 cm x Panjang 72 cm\r\nM : Lebar 60 cm x Panjang 75 cm\"\r\n\r\n                      ', 'JK002.jpeg', '2021-12-11 11:20:24'),
('JK003', 'JAKET PRIA OUTWEAR SPORT TOMMY HILFIGER DOWN', 'K04', 'M', '1250000', '1', 'A01', 'Chart Size ( Lebar x Panjang )  M : 58 cm x 67 cm\r\n\r\n                      ', 'JK003.jpeg', '2021-12-11 11:21:20'),
('OL001', 'JAKET OLAHRAGA KJUS WOMEN LAINA BLUE SKI WATERPROO', 'K05', 'L', '350000', '4', 'A01', '\"Chart Size ( Lebar x Panjang )\r\nM : Lebar 52 cm x Panjang 60 cm                         \r\n\"\r\n', 'OL001.jpeg', '2021-12-11 11:24:41'),
('PJ001', 'PIYAMA WANITA VICTORIA SECRET SOFT PINK ', 'K06', 'L', '65000', '5', 'A01', '\"Size (Panjang x Lebar )                                            \r\n\r\n-M :  61 CM x 53 CM     \r\n-XL :  65  CM x 60 CM   \r\n\"\r\n\r\n                      ', 'PJ001.jpeg', '2021-12-11 11:25:44'),
('ROK001', 'ROK WANITA CASUAL H&M TROPICAL SUMMER', 'K07', 'L', '90000', '4', 'A01', '\"\r\n- XS, LP 66cm, PJG 80cm\r\n- S, LP 72cm, PJG 81cm\r\n- M, LP 78cm, PJG 81cm\r\n\r\n\"\r\n\r\n                      ', 'ROK001.jpeg', '2021-12-11 11:26:58'),
('ROK002', 'Rok Wanita Korea LILLY PULITZER', 'K07', 'L', '50500', '3', 'A01', '\"Chart size ( PAnjang X lebar )     \r\nXXS : 35cm x 36cm     \r\nXS :35cm x 37cm         \r\nM :35cm x 38cm          \r\n\"\r\n', 'ROK002.jpeg', '2021-12-11 11:27:35'),
('SC001', 'SWEATER WANITA KOREAN STYLE ATHLETA ORIGINAL SEREN', 'K08', 'L', '70000', '3', 'A01', '\"READY SIZE:\r\nXXS = PANJANG 59 CM X LEBAR 54 CM                        \r\nXS   = PANJANG 60 CM X LEBAR 50 CM \r\nS      = PANJANG 61 CM X LEBAR 54 CM     \r\nM     = PANJANG 67 CM X LEBAR 55 CM\r\nL      = PANJANG 67 CM X LEBAR 59 CM \r\nXL    = PANJANG 69 CM X LEBAR 63 CM \r\n\r\n\"\r\n\r\n                      ', 'SC001.jpeg', '2021-12-11 11:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `db_detail_trans`
--

CREATE TABLE `db_detail_trans` (
  `id_det_trans` varchar(15) NOT NULL,
  `id_transaksi` varchar(15) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `diskon` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_detail_trans`
--

INSERT INTO `db_detail_trans` (`id_det_trans`, `id_transaksi`, `id_barang`, `nama_barang`, `jumlah`, `diskon`, `harga`, `sub_total`) VALUES
('000001', 'SL48N', 'Barang01', 'Jihad', 1, '0', 176000, 176000),
('000002', 'SL48N', 'Barang02', 'jeans', 1, '0', 200000, 200000),
('000003', 'GS93J', 'Barang03', 'Jihad', 1, '0', 200000, 200000),
('924ek', 'enu03', 'DR001', 'DRESS WANITA CASUAL URBAN OUTFITER TROPICAL', 1, '0', 125000, 125000),
('q4bk2', 'enu03', 'SC001', 'SWEATER WANITA KOREAN STYLE ATHLETA ORIGINAL SEREN', 3, '0', 70000, 210000),
('zyucn', 'enu03', 'CL002', 'CELANA WANITA PANJANG H&M PULL ON TROUSER', 1, '0', 87000, 87000);

-- --------------------------------------------------------

--
-- Table structure for table `db_kategori`
--

CREATE TABLE `db_kategori` (
  `id_kategori` varchar(3) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL,
  `gambar` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_kategori`
--

INSERT INTO `db_kategori` (`id_kategori`, `nama_kategori`, `gambar`) VALUES
('K01', 'Atasan', 'KategoriBaju.jpeg'),
('K02', 'Celana Panjang & Legging', 'KategoriCelana.jpeg'),
('K03', 'Dress', 'KategoriDress.jpeg'),
('K04', 'Jaket, Mantel & Rompi', 'KategoriJaket.jpeg'),
('K05', 'Pakaian Olahraga', 'PakaianOlahraga.jpeg'),
('K06', 'Pijama', 'Pijama.jpeg'),
('K07', 'Rok', 'KategoriRok'),
('K08', 'Sweater & Cardigan', 'Sweater&Cardigan.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `db_komen`
--

CREATE TABLE `db_komen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `db_pembayaran`
--

CREATE TABLE `db_pembayaran` (
  `id_pembayaran` varchar(25) NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `jenis_pembayaran` varchar(10) NOT NULL,
  `nama_bank` varchar(225) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status_bayar` tinyint(1) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `id_transaksi` varchar(15) NOT NULL,
  `tgl_transfer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_pembayaran`
--

INSERT INTO `db_pembayaran` (`id_pembayaran`, `nominal_pembayaran`, `jenis_pembayaran`, `nama_bank`, `email`, `status_bayar`, `tgl_bayar`, `id_transaksi`, `tgl_transfer`) VALUES
('TF091', 200000, 'Transfer', 'BCA', 'balgohum13@gmail.com', 1, '2020-09-12 00:00:00', 'SL48N', '2020-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `db_pengiriman`
--

CREATE TABLE `db_pengiriman` (
  `id_pengiriman` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_transaksi` varchar(15) NOT NULL,
  `province` varchar(225) NOT NULL,
  `wilayah` varchar(225) NOT NULL,
  `postal_code` varchar(225) NOT NULL,
  `kurir` varchar(225) NOT NULL,
  `no_resi` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_pengiriman`
--

INSERT INTO `db_pengiriman` (`id_pengiriman`, `email`, `id_transaksi`, `province`, `wilayah`, `postal_code`, `kurir`, `no_resi`, `alamat`) VALUES
('000001', 'balgohum13@gmail.com', 'SL48N', '\"Bali\"', '\"Kabupaten\" \"Badung\"', '40232', 'jne', '', 'jl babakan tarogong'),
('000002', 'chandra.ramadhan100391@gmail.com', 'GS93J', '\"Bali\"', '\"Kabupaten\" \"Bangli\"', '111', 'tiki', '', '111');

-- --------------------------------------------------------

--
-- Table structure for table `db_promo`
--

CREATE TABLE `db_promo` (
  `id_promo` varchar(3) NOT NULL,
  `nama_promo` varchar(35) NOT NULL,
  `diskon` varchar(5) NOT NULL,
  `potongan` decimal(8,2) NOT NULL,
  `min_beli` int(3) NOT NULL,
  `min_jumlah_harga` decimal(8,2) NOT NULL,
  `timer` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_promo`
--

INSERT INTO `db_promo` (`id_promo`, `nama_promo`, `diskon`, `potongan`, `min_beli`, `min_jumlah_harga`, `timer`) VALUES
('A01', 'Flash Sale', '12', '0.00', 1, '0.00', '06:33:59'),
('P01', 'Buy 2 Get 1', '0', '0.00', 2, '0.00', NULL),
('P02', 'Buy 3 Get 10%', '10', '0.00', 1, '0.00', NULL),
('P03', 'Gratis Ongkir', '0', '0.00', 1, '0.00', NULL),
('P04', 'Gila', '0', '0.00', 0, '0.00', NULL),
('P05', 'Gratis Ongkir', '0', '0.00', 0, '0.00', NULL),
('P06', 'Gratis Ongkir', '0', '0.00', 0, '0.00', NULL),
('P08', 'Gratis Ongkir', '0', '0.00', 0, '0.00', NULL),
('P09', 'Buy 1 Get 12%', '12', '0.00', 1, '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `db_rating`
--

CREATE TABLE `db_rating` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `db_transaksi`
--

CREATE TABLE `db_transaksi` (
  `id_transaksi` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_trans` datetime NOT NULL,
  `total` decimal(20,2) NOT NULL,
  `kode_voucher` varchar(5) DEFAULT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_transaksi`
--

INSERT INTO `db_transaksi` (`id_transaksi`, `email`, `tgl_trans`, `total`, `kode_voucher`, `status`) VALUES
('enu03', 'balgohum13@gmail.com', '2022-01-06 21:54:57', '210000.00', NULL, '0'),
('GS93J', 'chandra.ramadhan100391@gmail.com', '2020-04-06 14:58:22', '225000.00', NULL, '0'),
('SL48N', 'balgohum13@gmail.com', '2018-03-01 00:01:12', '400000.00', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `db_ukuran`
--

CREATE TABLE `db_ukuran` (
  `id_ukuran` varchar(5) NOT NULL,
  `nama_ukuran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_ukuran`
--

INSERT INTO `db_ukuran` (`id_ukuran`, `nama_ukuran`) VALUES
('L', 'Large'),
('M', 'Medium'),
('S', 'Small'),
('XL', 'Xtra Large'),
('XXL', 'Double Large'),
('XXXL', 'Triple Large');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `poin` int(11) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`email`, `password`, `nama`, `alamat`, `no_hp`, `poin`, `status`) VALUES
('balgohum13@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'jihad balgohum', 'jauh', '81928192819', 3500, 1),
('balgohum@gmail.com', '4c9c933d7422089301c9b375845818eb', 'jihad', 'jauh', '819212819', 0, 1),
('chandra.ramadhan100391@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Chandra Ramadhan', 'surabaya', '81703127040', 0, 1),
('harlisaanugerahsejati@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Harlisa Anugrah Sejati', 'Jl. Sriti Blok HH – 15 Sedati – Sidoarjo', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_voucher`
--

CREATE TABLE `db_voucher` (
  `kode_voucher` varchar(5) NOT NULL,
  `nama_voucher` varchar(25) NOT NULL,
  `tgl_start` date NOT NULL,
  `tgl_end` date NOT NULL,
  `gambar` longtext NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_voucher`
--

INSERT INTO `db_voucher` (`kode_voucher`, `nama_voucher`, `tgl_start`, `tgl_end`, `gambar`, `status`) VALUES
('P001', 'Free Ongkir', '2021-12-21', '2021-12-30', 'FreeOngkir.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_voucher_user`
--

CREATE TABLE `db_voucher_user` (
  `id` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `kode_voucher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_voucher_user`
--

INSERT INTO `db_voucher_user` (`id`, `email`, `kode_voucher`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_wishlist`
--

CREATE TABLE `db_wishlist` (
  `id_wishlist` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `harga_barang` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_wishlist`
--

INSERT INTO `db_wishlist` (`id_wishlist`, `email`, `id_barang`, `jumlah`, `harga_barang`) VALUES
(1, 'chandra.ramadhan100391@gmail.com', 'C00000', 1, '200000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_admin`
--
ALTER TABLE `db_admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `db_adv`
--
ALTER TABLE `db_adv`
  ADD PRIMARY KEY (`id_adv`);

--
-- Indexes for table `db_barang`
--
ALTER TABLE `db_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `db_detail_trans`
--
ALTER TABLE `db_detail_trans`
  ADD PRIMARY KEY (`id_det_trans`);

--
-- Indexes for table `db_kategori`
--
ALTER TABLE `db_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `db_komen`
--
ALTER TABLE `db_komen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_pembayaran`
--
ALTER TABLE `db_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `db_pengiriman`
--
ALTER TABLE `db_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `db_promo`
--
ALTER TABLE `db_promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `db_rating`
--
ALTER TABLE `db_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_transaksi`
--
ALTER TABLE `db_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `db_ukuran`
--
ALTER TABLE `db_ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `db_voucher`
--
ALTER TABLE `db_voucher`
  ADD PRIMARY KEY (`kode_voucher`);

--
-- Indexes for table `db_voucher_user`
--
ALTER TABLE `db_voucher_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_wishlist`
--
ALTER TABLE `db_wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_komen`
--
ALTER TABLE `db_komen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_rating`
--
ALTER TABLE `db_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_voucher_user`
--
ALTER TABLE `db_voucher_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_wishlist`
--
ALTER TABLE `db_wishlist`
  MODIFY `id_wishlist` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
