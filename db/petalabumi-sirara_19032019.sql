-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2019 pada 04.11
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petalabumi-sirara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(0, '-'),
(2, 'Direktur'),
(11, 'Kabag Tata Usaha'),
(12, 'Kabid Pelayanan Medik'),
(13, 'Kabid Penunjang Medik'),
(14, 'Kabid Keperawatan'),
(15, 'Kasubbag Keuangan & Perlengkapan'),
(16, 'Kasubbag Umum & Kepegawaian'),
(17, 'Kasubbag Perencanaan & Program'),
(18, 'Kasi Monev Pelayanan Medik'),
(19, 'Kasi Perencanaan Pelayanan Medik'),
(20, 'Kasi Monev Penunjang Medik'),
(21, 'Kasi Perencanaan Penunjang Medik'),
(22, 'Kasi Perencanaan Pelayanan Keperawatan'),
(23, 'Kasi Monev Pelayanan Keperawatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_surat`
--

CREATE TABLE `kode_surat` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `keperluan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kode_surat`
--

INSERT INTO `kode_surat` (`id`, `kode`, `keperluan`) VALUES
(2, '800', 'Tata Usaha'),
(4, '890', 'Pendidikan'),
(5, '005', 'Undangan'),
(6, '993', 'Keu/Penerimaan'),
(7, '812', 'Pengujian Kes'),
(8, '820', 'Mutasi/Pemindahan'),
(9, '823', 'KP'),
(10, '864', 'Ujian Dinas'),
(11, '261', 'Dharma Wanita'),
(12, '447', 'Alat Medis'),
(13, '861', 'Penghargaan'),
(14, '861.1', 'Satya Lencana'),
(15, '861.5', 'Pegawai Teladan'),
(16, '862.1', 'Teguran'),
(17, '862.2', 'Penundaan, Kenaikan Gaji'),
(18, '862.4', 'Pemindahan'),
(19, '875.1', 'Pelimpahan Wewenang'),
(20, '873.2', 'Karpeg'),
(21, '875', 'Kewenangan Mutasi Pegawai'),
(22, '875.2', 'Spesimen Tanda Tangan'),
(23, '865', 'Penilaian Kekayaan Pribadi/LP2P'),
(24, '855', 'Cuti Naik Haji'),
(25, '842.1', 'Taspen'),
(26, '893.3', 'Diklat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1541317108),
('m181104_073600_create_pengguna', 1541317260),
('m181105_020354_create_kunjungan', 1541385217),
('m181105_023801_create_poliklinik', 1541385627);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota_dinas`
--

CREATE TABLE `nota_dinas` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kode_surat` varchar(300) NOT NULL,
  `nomor_surat` varchar(300) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `ketersediaan` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `akses` varchar(15) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `change_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `no_hp`, `akses`, `authKey`, `create_at`, `modified_at`, `change_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'admin', '$2y$13$gTp5Rqmr6/RDTe2hNns2Je5LcA1BTHpTIFX6qgAbzGgJu2ZdRKtVO', 'Septia Anugrah', '082283886622', 'superadmin', '8m3Aj9GndfMbhG1fbqYuetms4ZKZfqVI', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0, 0),
(2, 'nadiyya', '$2y$13$rsjLHxPzSbibyn35ZCPHaugAmVg1lr5qo6yxiTwlN9OuoABea.Y1K', 'Nadiyya Arini', '09843980980343', 'admin', 'Ox8TZTxnSY93u3B8E-j66RHnoId9gh1a', '2019-06-08 16:36:06', '2019-06-08 16:36:19', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sifat_surat`
--

CREATE TABLE `sifat_surat` (
  `id` int(11) NOT NULL,
  `sifat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sifat_surat`
--

INSERT INTO `sifat_surat` (`id`, `sifat`) VALUES
(1, 'Biasa'),
(2, 'Segera'),
(3, 'Penting'),
(4, 'Rahasia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_bebas_narkoba`
--

CREATE TABLE `surat_bebas_narkoba` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `nomor_surat` varchar(300) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kode_surat` varchar(300) NOT NULL,
  `nomor_surat` varchar(300) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `alamat_tujuan` varchar(300) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `ketersediaan` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keputusan`
--

CREATE TABLE `surat_keputusan` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kode_surat` varchar(300) NOT NULL,
  `nomor_surat` varchar(300) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `ketersediaan` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_urut` int(11) NOT NULL,
  `alamat_pengirim` varchar(300) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `disposisi_1` int(11) DEFAULT NULL,
  `disposisi_2` int(11) DEFAULT NULL,
  `catatan_disposisi1` varchar(800) NOT NULL,
  `catatan_disposisi2` varchar(800) NOT NULL,
  `disposisi_lainnya` varchar(500) NOT NULL,
  `catatan_disposisi_lainnya` varchar(800) NOT NULL,
  `diteruskan` varchar(500) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `ketersediaan` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_perintah_tugas`
--

CREATE TABLE `surat_perintah_tugas` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kode_surat` varchar(300) NOT NULL,
  `nomor_surat` varchar(300) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `memerintahkan` varchar(500) NOT NULL,
  `perintah` varchar(1200) NOT NULL,
  `ketersediaan` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_sehat`
--

CREATE TABLE `surat_sehat` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `nomor_surat` varchar(300) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan_keluar`
--

CREATE TABLE `undangan_keluar` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kode_surat` varchar(300) NOT NULL,
  `nomor_surat` varchar(300) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `tempat` varchar(300) NOT NULL,
  `pukul` time NOT NULL,
  `acara` varchar(300) NOT NULL,
  `keterangan` varchar(300) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `ketersediaan` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kode_surat`
--
ALTER TABLE `kode_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `nota_dinas`
--
ALTER TABLE `nota_dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `sifat_surat`
--
ALTER TABLE `sifat_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_bebas_narkoba`
--
ALTER TABLE `surat_bebas_narkoba`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_perintah_tugas`
--
ALTER TABLE `surat_perintah_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_sehat`
--
ALTER TABLE `surat_sehat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `undangan_keluar`
--
ALTER TABLE `undangan_keluar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kode_surat`
--
ALTER TABLE `kode_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `nota_dinas`
--
ALTER TABLE `nota_dinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_bebas_narkoba`
--
ALTER TABLE `surat_bebas_narkoba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_perintah_tugas`
--
ALTER TABLE `surat_perintah_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_sehat`
--
ALTER TABLE `surat_sehat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `undangan_keluar`
--
ALTER TABLE `undangan_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
