-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Mei 2017 pada 15.07
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_imk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email_admin`, `password_admin`, `nama_admin`) VALUES
(1, 'admin@admin.com', 'admin', 'koko'),
(2, 'joni@gmail.com', 'joni', 'joni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `tanggal_berita` date NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar_berita` varchar(255) NOT NULL,
  `penulis_berita` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `tanggal_berita`, `isi_berita`, `gambar_berita`, `penulis_berita`) VALUES
(1, 'Cara Konfirmasi Pembayaran', '2016-12-06', 'Masuk ke menu pelanggan lalu klik tombol pembayaran isi form nya lalu upload bukti pembayaran', 'Screenshot_30.png', 'hamba allah'),
(2, 'koro sensei', '2016-06-16', 'koro sensei sugoi', 'koro.jpg', 'tasya'),
(3, 'Luffy New Bounty', '1999-01-01', 'harga buronan luffy meningkat', 'luffy.jpg', 'uzumaki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`) VALUES
(3, 'Makanan', 'Makanan'),
(4, 'Miniatur', 'Miniatur'),
(5, 'Sendal', 'Sendal'),
(6, 'Batik', 'Batik'),
(7, 'Aksesoris Pakaian', 'Aksesoris Pakaian'),
(8, 'Pakaian', 'Pakaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `telepon_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'krizna', 'kriz@gmail.com', 'kriz', '09763111', 'klampis'),
(5, 'hahaha', 'haha@gmail.com', 'haha', '09878000', 'hahahi'),
(7, 'hikensabo', 'hikensabo14@gmail.com', 'hikensabo', '085655985950', 'ngentrong'),
(8, 'nana', 'nana@gmail.com', 'nana', '085655985950', 'ngentrong'),
(9, 'haha', 'malu@mm', 'malu', '098', 'wow');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `keterangan_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `tanggal_pembayaran`, `bukti_pembayaran`, `jumlah_pembayaran`, `keterangan_pembayaran`) VALUES
(1, 1, '0000-00-00 00:00:00', '082778900_1434515044-sabo-firemeramera-1maxresdefault.jpg', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `ongkir_pembelian` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `ekspedisi_pembelian` varchar(255) NOT NULL,
  `alamat_pembelian` text NOT NULL,
  `status_pembelian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `ongkir_pembelian`, `total_bayar`, `alamat_penerima`, `ekspedisi_pembelian`, `alamat_pembelian`, `status_pembelian`) VALUES
(1, 5, '2017-02-02 11:55:15', 440000, 0, 440000, '', '', '', 'sudah konfirmasi'),
(2, 5, '2017-02-12 05:17:56', 220000, 57500, 277500, 'dsd', 'Citra Van Titipan Kilat (TIKI) REG 3 Hari', 'Kabupaten Aceh Barat Nanggroe Aceh Darussalam (NAD) 23681', 'pending'),
(3, 5, '2017-03-06 14:42:03', 440000, 0, 440000, '', '   Hari', '   ', 'pending'),
(4, 9, '2017-04-25 14:39:41', 100000, 93000, 193000, 'mmmmm', 'Citra Van Titipan Kilat (TIKI) REG 3 Hari', 'Kabupaten Aceh Singkil Nanggroe Aceh Darussalam (NAD) 24785', 'pending'),
(5, 9, '2017-04-25 14:59:53', 200000, 57500, 257500, '', 'POS Indonesia (POS) Surat Kilat Khusus 2-4 Hari', 'Kabupaten Asahan Sumatera Utara 21214', 'pending'),
(6, 5, '2017-04-29 09:43:57', 100000, 52000, 152000, 'asasa', 'POS Indonesia (POS) Paket Kilat Khusus 2-4 Hari', 'Kabupaten Asahan Sumatera Utara 21214', 'pending'),
(7, 5, '2017-04-29 09:55:20', 320000, 0, 320000, 'sas', '   Hari', '   ', 'pending'),
(8, 5, '2017-04-29 09:59:18', 100000, 38500, 138500, 'fdf', 'Citra Van Titipan Kilat (TIKI) REG 3 Hari', 'Kabupaten Agam Sumatera Barat 26411', 'pending'),
(9, 5, '2017-04-29 10:05:31', 100000, 47500, 147500, 'k', 'POS Indonesia (POS) Surat Kilat Khusus 2-4 Hari', 'Kabupaten Balangan Kalimantan Selatan 71611', 'pending'),
(10, 5, '2017-04-29 16:18:20', 200000, 28280, 228280, 'tulis alamat lengkap kalian', 'POS Indonesia (POS) Paket Kilat Khusus 2 Hari', 'Kota Yogyakarta DI Yogyakarta 55222', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_pembelian_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_beli` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `berat_beli` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `subtotal_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `id_produk`, `nama_beli`, `harga_beli`, `berat_beli`, `jumlah_beli`, `subtotal_beli`) VALUES
(1, 1, 26, 'Oppai Saitama', 220000, 400, 1, 220000),
(2, 1, 25, 'Heart Pirates', 220000, 400, 1, 220000),
(3, 2, 26, 'Oppai Saitama', 220000, 400, 1, 220000),
(4, 3, 26, 'Oppai Saitama', 220000, 400, 1, 220000),
(5, 3, 25, 'Heart Pirates', 220000, 400, 1, 220000),
(6, 4, 28, 'Becak Jawa', 100000, 2, 1, 100000),
(7, 5, 27, 'rikudo', 100000, 500, 1, 100000),
(8, 5, 28, 'Becak Jawa', 100000, 2, 1, 100000),
(9, 6, 11, 'Luffy Memories', 100000, 200, 1, 100000),
(10, 7, 25, 'Heart Pirates', 220000, 400, 1, 220000),
(11, 7, 27, 'rikudo', 100000, 500, 1, 100000),
(12, 8, 27, 'rikudo', 100000, 500, 1, 100000),
(13, 9, 27, 'rikudo', 100000, 500, 1, 100000),
(14, 10, 28, 'Miniatur Becak', 100000, 2000, 2, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `kolom_pengaturan` text NOT NULL,
  `isi_pengaturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `kolom_pengaturan`, `isi_pengaturan`) VALUES
(2, 'no_rek', '<p>MANDIRI 171-00-0123672-1</p>\r\n\r\n<p>A/N SEMBARANG</p>\r\n'),
(3, 'seo_deskripsi', '<p>Sembarang Tim</p>\r\n\r\n<p>M Khusnul Hasan, Dian Faqih, Teddy Surawan, Hardly&nbsp;Joshua, Julita Thalia</p>\r\n'),
(4, 'seo_keyword', 'baju'),
(5, 'no_telp', '085655985950'),
(6, 'alamat', 'Rt 006 Rw 007 Dsn. Centong Ds. ngentrong Kec. Campurdarat Kab. Tulungagung Prov. Jawa Timur'),
(7, 'email', 'hikensabo14@gmail.com'),
(8, 'nama_web', 'Bu Salamah IMK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `deskripsi_produk`, `foto_produk`) VALUES
(28, 4, 'Miniatur Becak', 100000, 2000, 'Miniatur Becak Tradisional Jawa - Becak Jogja - Becak Surabaya dengan ukuran panjang 29cm, tinggi 20cm, lebar 13cm. Buatan pengrajin logam Jogja, kualitas Eksport. Unik, terlihat seperti aslinya. Bahan: Rangka : campuran cor kuningan & besi. Ban & pedal : karet. Atap : kain. Jok : vinil.\r\nUnik, terlihat seperti aslinya. Atap bisa dibuka/tutup, detail gear & rantai asli, jadi pedal bisa dikayuh, roda bisa berputar, bisa dibelokkan kanan-kiri.\r\n\r\nSpesifikasi:\r\n- Produk: Miniatur Becak Tradisional Jawa\r\n- Buatan: Pengrajin Logam Yogyakarta.\r\n- bahan: logam cor kuningan, karet ban, vinil, kain\r\n- Ukuran (P x L x T) : 29 x 20 x 13 cm', 'becak.jpg'),
(29, 7, 'Blankon Khas Yogyakarta', 19000, 400, 'Blankon Khas Yogyakarta', 'blankon.jpg'),
(30, 8, 'Kaos oblong jogja untuk anak - anak ukuran M & S katun lengan pendek', 30000, 200, 'Kaos oblong jogja untuk anak - anak ukuran M & S katun lengan pendek', 'kaos.jpg'),
(31, 5, 'Sendal Khas Yogyakarta', 15000, 100, 'Sendal Khas Yogyakarta', 'sendal.jpg'),
(32, 0, 'Bakpia Pathok 25 ASLI Original isi 15', 35000, 300, 'Bakpia Pathok 25 ASLI Original isi 15', 'bakpia.jpg'),
(33, 3, 'Bakpia Pathok 25 ASLI Original isi 15', 35000, 300, 'Bakpia Pathok 25 ASLI Original isi 15', 'bakpia.jpg'),
(34, 4, 'Miniatur Tugu Yogyakarta', 60000, 500, 'Miniatur Tugu Yogyakarta', 'tugu.jpg'),
(35, 3, 'OSENG-OSENG MERCON BU NARTI SUPER PEDAS KHAS JOGJA', 95000, 300, 'OSENG-OSENG MERCON BU NARTI SUPER PEDAS KHAS JOGJA', 'oseng-mercon.jpg'),
(37, 3, 'Gulai Ikan Patin Kaleng Oleh-Oleh Khas Jogja', 45000, 300, 'Gulai Ikan Patin Kaleng Oleh-Oleh Khas Jogja', 'Gulai_Ikan_Patin.jpg'),
(38, 3, 'Lanting Gurih Renyah', 15000, 150, 'Lanting Gurih Renyah', 'lanting.jpg'),
(39, 3, 'ABON IKAN LELE DAN TUNA Merk NARAYU, Asli Jogja', 25000, 200, 'ABON IKAN LELE DAN TUNA Merk NARAYU, Asli Jogja', 'abon.jpg'),
(40, 3, 'Gudeg Jogja Bagong Gudeg Kepala Dan Tahu', 40000, 300, 'Gudeg Jogja Bagong Gudeg Kepala Dan Tahu', 'gudeg.jpg'),
(41, 4, 'Miniatur Candi Borobudur', 50000, 400, 'Miniatur Candi Borobudur', 'miniatur-candi-1.jpg'),
(42, 4, 'Miniatur Candi Prambanan 4 Pintu (9 Cm)', 30000, 400, 'Miniatur Candi Prambanan 4 Pintu (9 Cm)', 'miniatur-candi-2.jpg'),
(43, 4, 'Miniatur Candi Borobudur', 43000, 300, 'Miniatur Candi Borobudur', 'miniatur-candi-3.jpg'),
(44, 4, 'Miniatur Stupa Candi Borobudur Bahan Batu Candi', 54000, 300, 'Miniatur Stupa Candi Borobudur Bahan Batu Candi', 'miniatur-candi-4.jpg'),
(45, 4, 'Paket Miniatur Candi Borobudur dan Prambanan', 70000, 500, 'Paket Miniatur Candi Borobudur dan Prambanan', 'miniatur-candi-5.jpg'),
(46, 4, 'Candi Borobudur 1 Pintu', 20000, 300, 'Candi Borobudur 1 Pintu', 'miniatur-candi-6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
