-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2019 pada 07.35
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
(1, 'Kepala Sub Bagian Program  & Perencanaan'),
(2, 'Direktur'),
(3, 'Kepala Bagian Umum'),
(4, 'Kepala Sub Bagian Keuangan'),
(5, 'Kepala Pelayanan Medis');

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
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota_dinas`
--

INSERT INTO `nota_dinas` (`id`, `kode_surat`, `nomor_surat`, `tanggal`, `tahun`, `perihal`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(4, '800', '800/RSUD-PB/1', '2019-02-07', 2019, 'Penyampaian usulan kebutuhan diklat 2019', 1, '0000-00-00 00:00:00', 1, '2019-02-22 23:11:22'),
(5, '800', '800/RSUD-PB/2', '2019-02-21', 2019, 'Apa', 1, '2019-02-23 09:49:25', 1, '2019-02-23 09:49:25'),
(6, '800', '800/RSUD-PB/3', '2019-02-21', 2019, 'Perihal', 1, '2019-02-26 23:43:15', 1, '2019-02-26 23:43:15'),
(7, '800', '800/RSUD-PB/4', '2019-02-14', 2019, 'Perihal', 1, '2019-02-26 23:45:04', 1, '2019-02-26 23:45:04'),
(8, '800', '800/RSUD-PB/5', '2019-02-19', 2019, 'Makan', 1, '2019-02-26 23:45:54', 1, '2019-02-26 23:45:54'),
(9, '800', '800/RSUD-PB/6', '2019-02-14', 2019, 'Perihal', 1, '2019-02-26 23:46:35', 1, '2019-02-26 23:46:35'),
(10, '800', '800/RSUD-PB/7', '2019-02-20', 2019, 'Perihal', 1, '2019-02-26 23:47:08', 1, '2019-02-26 23:47:08'),
(11, '800', '800/RSUD-PB/8', '2019-02-12', 2019, 'Perihal', 1, '2019-02-26 23:48:25', 1, '2019-02-26 23:48:25'),
(12, '800', '800/RSUD-PB/9', '2019-02-22', 2019, 'Perihal', 1, '2019-02-26 23:49:41', 1, '2019-02-26 23:49:41'),
(13, '800', '800/RSUD-PB/10', '2019-02-22', 2019, 'Perihal', 1, '2019-02-26 23:50:02', 1, '2019-02-26 23:50:02'),
(14, '800', '800/RSUD-PB/11', '2019-02-13', 2019, 'Perihal', 1, '2019-02-26 23:51:29', 1, '2019-02-26 23:51:29'),
(15, '800', '800/RSUD-PB/12', '2019-02-26', 2019, 'Perihal', 1, '2019-02-26 23:52:23', 1, '2019-02-26 23:52:23'),
(16, '800', '800/RSUD-PB/13', '2019-02-22', 2019, 'hahahaha', 1, '2019-02-27 08:19:04', 1, '2019-02-27 08:31:07'),
(17, '800', '800/RSUD-PB/14', '2019-02-20', 2019, 'Perihal', 1, '2019-02-27 08:33:55', 1, '2019-02-27 08:33:55'),
(18, '800', '800/RSUD-PB/15', '2019-02-07', 2019, 'Perihal', 1, '2019-02-27 09:04:20', 1, '2019-02-27 09:04:20'),
(19, '800', '800/RSUD-PB/16', '2019-02-13', 2019, 'Tersebut', 1, '2019-02-27 09:05:48', 1, '2019-02-27 22:24:38'),
(20, '800', '800/RSUD-PB/17', '2019-02-20', 2019, 'Perihala', 1, '2019-02-27 22:31:16', 1, '2019-02-27 23:26:39'),
(21, '800', '800/RSUD-PB/18', '2019-02-27', 2019, 'perihal', 1, '2019-02-28 11:46:25', 1, '2019-02-28 11:46:25'),
(22, '800', '800/RSUD-PB/19', '2019-03-18', 2019, 'periha', 1, '2019-03-03 17:17:27', 1, '2019-03-03 21:04:16'),
(23, 'uiou', 'uiou/RSUD-PB/20', '2019-03-17', 2019, 'uiou', 1, '2019-03-04 11:55:37', 1, '2019-03-04 11:55:37'),
(24, '500', '500/RSUD-PB/21', '2019-03-20', 2019, 'sdfs', 1, '2019-03-04 16:11:44', 1, '2019-03-04 16:11:44');

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
(2, 'siska', '$2y$13$f7LqEW8xnG7afNaqdhdEruMDhdw0.baqN7fdX5CXLVQwDXLzuXQXy', 'Siska', '08', 'admin', 'Ey5eRyJ1MsaeeLOU2eNotlO4HMb8YCaV', '2018-11-12 10:55:16', '2019-01-29 13:40:03', 1, 0, 0, 0, 0),
(7, 'rita', '$2y$13$b9hPD4JHptbGR/VD2zPZO.ecBfIG/mSGxBGF17tQDyliZDymrAX9S', 'Rita', '08', 'superadmin', 'E4PNus4kjJMLos_ROHlJzR2MPrNgfIrG', '2018-11-30 09:25:39', '2018-11-30 09:25:39', 1, 0, 0, 0, 0),
(8, 'operator', '$2y$13$THpPuk22jY45hBx1gX1XkOKW0fOYnzIg654iePZHsCUG5thXoZTR2', 'Dani', '08', 'operator', '-Kv5B_mP1HmGnz6u_vu3uWeWqEHvcoHc', '2018-12-04 15:08:06', '2019-02-06 10:34:19', 1, 0, 0, 0, 0),
(9, 'sarah', '$2y$13$6YOLxm7gGfYCooKKWeYXEOHrfVw0yUwKEIj26IB3jk6ARkxY8p.wi', 'Sarah Afrina', '082123872345', 'superadmin', 'IeNW2f7oKY6py677eMx-5aF0_KNRYQVS', '2019-02-21 12:01:52', '2019-02-21 12:01:52', 1, 0, 0, 0, 0);

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
(1, '445/SK-PEM.URINE/RSUD/III/2019/13', '2019-03-01', 2019, 'Yola Masdar', 'Perempuan', 'Jl. Tembilahan', 'POLISI', 1, '2019-03-01 21:19:38', 1, '2019-03-01 21:20:16'),
(5, '445/SK-PEM.URINE/RSUD/1/2019/1', '2019-02-22', 2019, 'Sarah Afrina Sari', 'Perempuan', 'Jl. Kesadaran Atas Kebersihan', 'CPNS', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(6, '445/SK-PEM.URINE/RSUD/1/2019/2', '2019-02-22', 2019, 'Septia Anugrah', 'Laki-Laki', 'Jl. Erba', 'CPNS', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(7, '445/SK-PEM.URINE/RSUD/1/2019/3', '2019-02-22', 2019, 'Dicky Ermawan', 'Laki-Laki', 'Jl. Tuah Karya', 'CPNS', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(8, '445/SK-PEM.URINE/RSUD/1/2019/4', '2019-02-23', 2019, 'Andika Bestari', 'Laki-Laki', 'Jl. Cendrawasih', 'CPNS', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(9, '445/SK-PEM.URINE/RSUD/02/2019/5', '2019-02-26', 2019, 'Sarah Afrina Sari', 'Perempuan', 'Jl. Kesadaran', 'CPNS', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(11, '445/SK-PEM.URINE/RSUD/II/2019/6', '2019-02-27', 2019, 'fsdf', 'Perempuan', 'asdf', 'adsffdfdd', 1, '2019-02-27 22:34:03', 1, '2019-02-27 23:19:10'),
(12, '445/SK-PEM.URINE/RSUD/II/2019/7', '2019-02-27', 2019, 'Olivia Putri', 'Perempuan', 'Jl. Jalan aja terus', '', 1, '2019-02-27 23:21:06', 1, '2019-02-27 23:21:06'),
(13, '445/SK-PEM.URINE/RSUD/II/2019/8', '2019-02-27', 2019, 'Sarah Afrina Sari', 'Perempuan', 'Jl', 'CPNS', 1, '2019-02-27 23:22:07', 1, '2019-02-28 09:15:38'),
(14, '445/SK-PEM.URINE/RSUD/II/2019/9', '2019-02-28', 2019, 'Aini', 'Laki-Laki', 'ggg', 'dedi', 1, '2019-02-28 10:19:59', 1, '2019-02-28 10:37:15'),
(15, '445/SK-PEM.URINE/RSUD/II/2019/10', '2019-02-28', 2019, 'Aini', 'Laki-Laki', 'fedfd', '', 1, '2019-02-28 10:40:14', 1, '2019-02-28 10:40:14'),
(16, '445/SK-PEM.URINE/RSUD/II/2019/11', '2019-02-28', 2019, 'dfd', 'Laki-Laki', 'fdfed', '', 1, '2019-02-28 10:40:22', 1, '2019-02-28 10:40:22'),
(17, '445/SK-PEM.URINE/RSUD/II/2019/12', '2019-02-28', 2019, 'Aini', 'Laki-Laki', 'gg', 'Keterangan', 1, '2019-02-28 11:24:13', 1, '2019-03-02 14:11:42'),
(18, '445/SK-PEM.URINE/RSUD/III/2019/14', '2019-03-02', 2019, 'tgd', 'Perempuan', 'ghf', 'fghf', 1, '2019-03-02 22:45:40', 1, '2019-03-02 22:45:40'),
(19, '445/SK-PEM.URINE/RSUD/III/2019/15', '2019-03-03', 2019, 'fsf', 'Laki-Laki', 'sdf', 'sdf', 1, '2019-03-03 09:24:42', 1, '2019-03-03 09:24:42');

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
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `kode_surat`, `nomor_surat`, `tanggal`, `tahun`, `alamat_tujuan`, `perihal`, `updated_by`, `updated_at`, `created_at`, `created_by`) VALUES
(14, '800', '800/RSUD-PB/1', '2019-02-13', 2019, 'BPKAD', 'KGB Fitria Nanda', 1, '2019-02-22 23:12:12', '0000-00-00 00:00:00', 1),
(15, '800', '800/RSUD-PB/2', '2019-02-12', 2019, 'Kebidanan', 'Surat keterangan kelahiran Bayi ny. Debby Oktaria', 1, '2019-02-22 23:12:02', '0000-00-00 00:00:00', 1),
(16, '800', '800/RSUD-PB/3', '2019-02-22', 2019, 'BKD Riau', '-', 1, '2019-02-23 09:54:00', '2019-02-23 09:54:00', 1),
(17, '800', '800/RSUD-PB/4', '2019-02-19', 2019, 'Tujuan', 'Perihal', 1, '2019-02-28 11:50:25', '2019-02-28 11:50:25', 1),
(18, '800', '800/RSUD-PB/5', '2019-02-27', 2019, 'Tujuan', 'Perihala', 1, '2019-02-28 12:00:17', '2019-02-28 11:51:47', 1),
(19, '800', '800/RSUD-PB/6', '2019-02-27', 2019, 'yutyu', 'tyut', 1, '2019-02-28 12:05:26', '2019-02-28 12:05:26', 1),
(20, '800', '800/RSUD-PB/7', '2019-02-26', 2019, 'jtj', 'tyjt', 1, '2019-02-28 14:13:33', '2019-02-28 14:13:33', 1),
(21, 'fsd', 'fsd/RSUD-PB/8', '2019-03-21', 2019, 'asdf', 'sd', 1, '2019-03-03 17:06:39', '2019-03-03 17:06:39', 1),
(22, '800', '800/RSUD-PB/9', '2019-03-19', 2019, '86', '678', 1, '2019-03-04 11:53:50', '2019-03-04 11:53:50', 1),
(23, '800', '800/RSUD-PB/10', '2019-03-20', 2019, 'Pekanbaru', 'pefajf', 1, '2019-03-04 23:01:45', '2019-03-04 23:01:45', 1);

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
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keputusan`
--

INSERT INTO `surat_keputusan` (`id`, `kode_surat`, `nomor_surat`, `tanggal`, `tahun`, `perihal`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(5, '800', 'Kpts/800/1/2019', '2019-02-20', 2019, 'SK. dr. Witri', 1, '0000-00-00 00:00:00', 1, '2019-02-22 23:10:55'),
(6, '500', 'Kpts/500/2/2019', '2019-02-15', 2019, 'SK. Pak Ramlan', 1, '0000-00-00 00:00:00', 1, '2019-02-28 11:45:53'),
(7, '800', 'Kpts/800/3/2019', '2019-02-20', 2019, 'Perihal', 1, '2019-02-27 23:28:43', 1, '2019-02-27 23:28:43'),
(8, 'sdf', 'Kpts/sdf/4/2019', '2019-03-27', 2019, 'sdf', 1, '2019-03-03 17:17:42', 1, '2019-03-03 17:17:42'),
(9, '767', 'Kpts/767/5/2019', '2019-03-27', 2019, '6786', 1, '2019-03-04 11:56:19', 1, '2019-03-04 23:29:17'),
(10, '800', 'Kpts/6/III/2019', '2019-03-20', 2019, 'sdfs', 1, '2019-03-04 23:34:20', 1, '2019-03-04 23:34:20');

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
  `disposisi` varchar(500) NOT NULL,
  `disposisi_ext` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `tanggal`, `alamat_pengirim`, `perihal`, `kode_surat`, `disposisi`, `disposisi_ext`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '2019-03-12', 'Pekanbaru', 'Peubahan jabatan peserta\r\n', '800', '0', '', '2019-03-03 13:06:03', '2019-03-03 13:06:03', 1, 1),
(2, '2019-03-21', 'fdgd', 'dfg', 'iurdokgldr', 'fdgd', '', '2019-03-03 13:36:15', '2019-03-03 13:36:15', 1, 1),
(3, '2019-03-08', 'fgd', 'dfgd', 'figjd', 'fgdf', '', '2019-03-03 13:59:44', '2019-03-03 13:59:44', 1, 1),
(4, '2019-03-28', 'rte', 'erte', '4tet', 'erte', '', '2019-03-03 14:04:02', '2019-03-03 14:04:02', 1, 1),
(5, '2019-03-28', 'asd', 'sdf', 'jfsjdf', 'sdf', '', '2019-03-03 14:06:41', '2019-03-03 14:06:41', 1, 1),
(6, '2019-03-26', 'fsd', 'fsdf', 'ds', 'dsf', '', '2019-03-03 14:24:46', '2019-03-03 14:24:46', 1, 1),
(7, '2019-03-27', 'sdfs', 'sdf', 'dfsdf', 'sdfs', '', '2019-03-03 14:41:46', '2019-03-03 14:41:46', 1, 1),
(8, '2019-03-20', 'fgsfd', 'dfg', 'ghfg', 'dfg', '', '2019-03-03 14:42:16', '2019-03-03 14:42:16', 1, 1),
(9, '2019-04-03', 'gd', 'dfgd', 'fgd', 'dfg', '', '2019-03-03 15:03:25', '2019-03-03 15:03:25', 1, 1),
(10, '2019-03-18', 'sarah', 'sarah', 'sarah', 'sarah', '', '2019-03-03 15:04:13', '2019-03-03 15:04:13', 1, 1),
(11, '2019-03-26', 'fd', 'dfg', 'fgdfg', 'dfg', '', '2019-03-03 15:16:37', '2019-03-03 15:16:37', 1, 1),
(12, '2019-03-27', 'upload', 'upload', 'upload', 'upload', '', '2019-03-03 15:30:08', '2019-03-03 15:30:08', 1, 1),
(13, '2019-03-26', 'sda', 'asd', 'sda', 'asd', '', '2019-03-03 15:55:20', '2019-03-03 15:55:20', 1, 1),
(14, '2019-03-20', 'sf', 'sdf', '6854986', 'sdfs', '', '2019-03-03 16:47:29', '2019-03-03 20:11:55', 1, 1),
(15, '2019-03-28', 'dgf', 'acoy', 'ffgdfg', 'dfg', '', '2019-03-03 20:59:22', '2019-03-03 21:30:08', 1, 1),
(16, '2019-03-26', 'fgh', 'fgh', '80008005y', 'fgh', '', '2019-03-04 11:46:33', '2019-03-04 11:46:33', 1, 1),
(17, '2019-03-28', 'jangan', 'jangan', '800', 'jangan', '', '2019-03-05 11:42:44', '2019-03-05 11:42:44', 1, 1),
(18, '0000-00-00', 'edp', 'surat cinta', '500', 'bapak ramlan', '', '2019-03-05 12:04:05', '2019-03-05 12:06:36', 1, 1);

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
(1, '445.1/RSUD/7', '2019-03-02', 2019, 'FDFG', 'Perempuan', 'FG', 'DFG', 1, '2019-03-02 22:43:25', 1, '2019-03-02 22:43:25'),
(37, '445.1/RSUD/1', '2019-02-22', 2019, 'Septia Anugrah', 'Laki-Laki', 'Jl. Erba', 'CPNS', 1, '2019-02-22 21:41:54', 1, '2019-02-22 21:41:54'),
(38, '445.1/RSUD/2', '2019-02-22', 2019, 'Dicky Ermawan', 'Laki-Laki', 'Jl. Tuah Karya', 'TES POLISI', 1, '2019-02-22 21:42:40', 1, '2019-02-22 21:42:40'),
(39, '445.1/RSUD/3', '2019-02-22', 2019, 'Sarah Afrina Sari', 'Perempuan', 'Jl. Terbaik', 'TES BUMN', 1, '2019-02-22 21:43:29', 1, '2019-02-22 21:43:29'),
(40, '445.1/RSUD/4', '2019-02-22', 2019, 'Sri Nuryana', 'Perempuan', 'Jl. Nin Aja Dulu', 'CPNS', 1, '2019-02-22 21:44:23', 1, '2019-02-22 21:44:23'),
(41, '445.1/RSUD/5', '2019-02-22', 2019, 'Maghfiroh Aini', 'Perempuan', 'Jl.  Simpang Baru', 'CPNSSS', 1, '2019-02-22 21:45:30', 1, '2019-02-27 23:06:46'),
(42, '445.1/RSUD/6', '2019-02-27', 2019, 'Maghfiroh Aini', 'Laki-Laki', 'Jl. Erba', 'CPNS', 1, '2019-02-27 23:13:45', 1, '2019-02-28 11:45:35'),
(43, '445.1/RSUD/8', '2019-03-03', 2019, 'Nadia Dermawan', 'Perempuan', 'Jakarta', 'CPNS', 1, '2019-03-03 09:24:28', 1, '2019-03-03 09:24:28');

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
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `undangan_keluar`
--

INSERT INTO `undangan_keluar` (`id`, `kode_surat`, `nomor_surat`, `tanggal`, `tahun`, `tempat`, `pukul`, `acara`, `keterangan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(6, '800', '800/RSUD-PB/1', '2019-02-14', 2019, 'Aula RSPB', '09:00:00', 'Pertemuan tentang K3 RS dan implementasinya dalam persiapan akreditasi', '-', 1, '0000-00-00 00:00:00', 1, '2019-02-22 23:11:51'),
(7, '800', '800/RSUD-PB/2', '2019-02-05', 2019, 'Ruang Direktur RSPB', '08:00:00', 'Rapat komite medik', '-', 1, '0000-00-00 00:00:00', 1, '2019-02-22 23:11:33'),
(8, '005', '005/RSUD-PB/3', '2019-02-21', 2019, 'BKD', '09:00:00', 'Aula LT2', '-', 1, '2019-02-23 09:52:12', 1, '2019-02-27 23:39:30'),
(9, '800', '800/RSUD-PB/4', '2019-02-26', 2019, 'S', '23:30:00', 's', '', 1, '2019-02-27 23:42:23', 1, '2019-02-28 00:31:17'),
(10, '800', '800/RSUD-PB/5', '2019-02-27', 2019, 'Aula RSUD Petala Bumi', '09:00:00', 'ere', '', 1, '2019-02-28 11:46:57', 1, '2019-02-28 11:46:57'),
(11, 'asdf', 'asdf/RSUD-PB/6', '2019-03-18', 2019, 'PKM', '09:00:00', 'PERUBAHAN', 'CPNS', 1, '2019-03-03 17:14:42', 1, '2019-03-03 17:14:42'),
(12, '675', '675/RSUD-PB/7', '2019-03-21', 2019, '567', '17:15:00', '675', '675', 1, '2019-03-03 17:27:50', 1, '2019-03-03 17:27:50'),
(13, '8080', '8080/RSUD-PB/8', '2019-03-26', 2019, '7807', '11:45:00', '7897', '7897', 1, '2019-03-04 11:55:18', 1, '2019-03-04 11:55:18');

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
-- AUTO_INCREMENT untuk tabel `nota_dinas`
--
ALTER TABLE `nota_dinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `surat_bebas_narkoba`
--
ALTER TABLE `surat_bebas_narkoba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `surat_sehat`
--
ALTER TABLE `surat_sehat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `undangan_keluar`
--
ALTER TABLE `undangan_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
