-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2019 pada 03.26
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
(2, 'Direktur'),
(3, 'Kepala Bagian Umum'),
(4, 'Kepala Sub Bagian Keuangan'),
(5, 'Kepala Bidang Pelayanan Medik'),
(6, 'Kepala Bidang Penunjang Medik');

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

--
-- Dumping data untuk tabel `nota_dinas`
--

INSERT INTO `nota_dinas` (`id`, `kode_surat`, `nomor_surat`, `tanggal`, `tahun`, `perihal`, `ketersediaan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '', '/RSUD-PB/1', '2019-04-16', 2019, '', 1, 1, '2019-04-11 11:09:31', 1, '2019-04-16 13:23:15');

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
(1, 'admin', '$2y$13$gTp5Rqmr6/RDTe2hNns2Je5LcA1BTHpTIFX6qgAbzGgJu2ZdRKtVO', 'Septia Anugrah', '082283886622', 'superadmin', '8m3Aj9GndfMbhG1fbqYuetms4ZKZfqVI', '2018-10-28 19:58:23', '2019-02-06 09:59:04', 1, 0, 0, 0, 0),
(2, 'siska', '$2y$13$f7LqEW8xnG7afNaqdhdEruMDhdw0.baqN7fdX5CXLVQwDXLzuXQXy', 'Siska', '0821219509283', 'admin', 'Ey5eRyJ1MsaeeLOU2eNotlO4HMb8YCaV', '2018-11-12 10:55:16', '2019-03-28 11:48:12', 1, 0, 0, 0, 0);

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

--
-- Dumping data untuk tabel `surat_bebas_narkoba`
--

INSERT INTO `surat_bebas_narkoba` (`id`, `nomor_surat`, `tanggal`, `tahun`, `nama`, `jenis_kelamin`, `alamat`, `keterangan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, '445/SK-PEM.URINE/RSUD/IV/2019/1', '2019-04-24', 2019, 'Nadiyya Arini', 'Perempuan', 'Jl.Kopi No. 7 ', 'CPNS', 1, '2019-04-13 03:43:17', 1, '2019-04-20 14:07:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
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

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `kode_surat`, `nomor_surat`, `tanggal`, `tahun`, `alamat_tujuan`, `perihal`, `ketersediaan`, `updated_by`, `updated_at`, `created_at`, `created_by`) VALUES
(16, '800', '800/RSUD-PB/1', '2019-04-15', 2019, '', '', 1, 1, '2019-04-15 14:42:15', '2019-04-15 13:48:47', 1),
(17, '', '/RSUD-PB/2', '2019-04-15', 2019, 'Perihal', '', 2, 1, '2019-04-15 20:34:52', '2019-04-15 13:56:42', 1),
(18, '', '800/RSUD-PB/3', '2019-04-15', 2019, '', '', 1, 1, '2019-04-15 22:51:53', '2019-04-15 13:57:20', 1),
(19, '', '/RSUD-PB/4', '2019-04-15', 2019, '', '', 1, 1, '2019-04-15 22:53:58', '2019-04-15 22:53:58', 1),
(20, '', '/RSUD-PB/5', '2019-04-15', 2019, '', '', 1, 1, '2019-04-15 22:54:10', '2019-04-15 22:54:10', 1),
(21, '', '/RSUD-PB/6', '2019-04-15', 2019, '', '', 1, 1, '2019-04-15 22:59:36', '2019-04-15 22:59:28', 1),
(22, '', '/RSUD-PB/7', '1970-01-01', 2019, '', '', 1, 1, '2019-04-15 23:02:06', '2019-04-15 23:02:06', 1),
(23, '', '/RSUD-PB/8', '2019-04-15', 2019, '', '', 1, 1, '2019-04-15 23:03:21', '2019-04-15 23:03:21', 1),
(24, '', '/RSUD-PB/9', '2019-04-15', 2019, '', '', 1, 1, '2019-04-15 23:03:31', '2019-04-15 23:03:31', 1),
(25, '', '/RSUD-PB/10', '2019-04-20', 2019, '', '', 1, 1, '2019-04-20 13:48:23', '2019-04-15 23:03:52', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keputusan`
--

CREATE TABLE `surat_keputusan` (
  `id` int(11) NOT NULL,
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

--
-- Dumping data untuk tabel `surat_keputusan`
--

INSERT INTO `surat_keputusan` (`id`, `kode_surat`, `nomor_surat`, `tanggal`, `tahun`, `perihal`, `ketersediaan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '', 'Kpts/1/IV/2019', '1970-01-01', 2019, '', 0, 1, '2019-04-11 11:12:21', 1, '2019-04-11 11:12:21'),
(2, '', 'Kpts/2/I/2019', '1970-01-01', 2019, '', 0, 1, '2019-04-11 11:26:36', 1, '2019-04-11 11:26:36'),
(3, '', 'Kpts/3/I/1970', '1970-01-01', 2019, '', 0, 1, '2019-04-11 11:32:43', 1, '2019-04-11 11:32:43'),
(4, '', 'Kpts/4/I/1970', '2019-04-16', 2019, '', 1, 1, '2019-04-16 13:37:18', 1, '2019-04-16 13:37:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat_pengirim` varchar(300) NOT NULL,
  `perihal` varchar(500) NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `disposisi_1` int(11) DEFAULT NULL,
  `disposisi_2` int(11) DEFAULT NULL,
  `disposisi_lainnya` varchar(500) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `ketersediaan` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `tanggal`, `alamat_pengirim`, `perihal`, `kode_surat`, `disposisi_1`, `disposisi_2`, `disposisi_lainnya`, `keterangan`, `ketersediaan`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '2019-03-26', '4543', '34534', '590345', 2, 4, '', '', 0, 'Kembali', '2019-03-29 23:11:45', '2019-03-29 23:11:45', 1, 1),
(2, '2019-05-01', 'asdfasfgggggggghfhhhhhhfrh', 'sdfsd', '569iertrrf', 2, 3, '', '', 0, '-', '2019-04-09 00:39:45', '2019-04-20 01:13:49', 1, 1),
(3, '2019-04-24', 'Pekanbaru', 'Kamus', '800', 2, 3, '', '', 0, 'Kembali', '2019-04-12 10:54:37', '2019-04-20 01:19:19', 1, 1),
(6, '2019-04-17', 'Pekanbaru', 'Perihal', '800/57363/dioirt', 2, 3, '', '', 0, 'Tidak Kembali', '2019-04-20 01:10:26', '2019-04-20 14:32:49', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_sehat`
--

CREATE TABLE `surat_sehat` (
  `id` int(11) NOT NULL,
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

--
-- Dumping data untuk tabel `surat_sehat`
--

INSERT INTO `surat_sehat` (`id`, `nomor_surat`, `tanggal`, `tahun`, `nama`, `jenis_kelamin`, `alamat`, `keterangan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '445.1/RSUD/1', '2019-04-10', 2019, 'septiaa anugrah', 'Laki-Laki', 'dfds', 'sdfs', 1, '2019-04-10 10:37:44', 1, '2019-04-10 10:37:44'),
(2, '445.1/RSUD/2', '2019-04-25', 2019, 'septia ', 'Laki-Laki', 'jl. erba', '', 1, '2019-04-11 11:36:51', 1, '2019-04-13 03:49:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan_keluar`
--

CREATE TABLE `undangan_keluar` (
  `id` int(11) NOT NULL,
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
-- Dumping data untuk tabel `undangan_keluar`
--

INSERT INTO `undangan_keluar` (`id`, `kode_surat`, `nomor_surat`, `tanggal`, `tahun`, `tempat`, `pukul`, `acara`, `keterangan`, `created_by`, `ketersediaan`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '', '/RSUD-PB/1', '1970-01-15', 2019, '', '09:00:00', '', '', 1, 0, '2019-04-10 09:12:56', 1, '2019-04-13 04:12:26'),
(3, '', '/RSUD-PB/2', '1970-01-01', 2019, '', '13:00:00', '', '', 1, 2, '2019-04-16 13:12:04', 1, '2019-04-16 13:12:04'),
(4, '', '/RSUD-PB/3', '2019-04-16', 2019, '', '00:00:00', '', '', 1, 1, '2019-04-16 13:12:51', 1, '2019-04-16 13:16:03'),
(5, '', '/RSUD-PB/4', '2019-04-16', 2019, '', '00:00:00', '', '', 1, 1, '2019-04-16 13:16:40', 1, '2019-04-16 13:17:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nota_dinas`
--
ALTER TABLE `nota_dinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `surat_bebas_narkoba`
--
ALTER TABLE `surat_bebas_narkoba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `surat_sehat`
--
ALTER TABLE `surat_sehat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `undangan_keluar`
--
ALTER TABLE `undangan_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
