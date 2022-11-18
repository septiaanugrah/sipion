-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2020 pada 08.46
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petalabumi_sirara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_rapid`
--

CREATE TABLE `surat_rapid` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `nomor_surat` varchar(300) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_mr` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(11) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `kabupaten` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `hasil` varchar(30) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_rapid`
--

INSERT INTO `surat_rapid` (`id`, `no_urut`, `nomor_surat`, `tanggal`, `tahun`, `nama`, `no_mr`, `tanggal_lahir`, `nik`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `hasil`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, '445/SK-PEM.URINE/RSUD/XI/2020/1', '2020-11-04', 2020, 'ALIKA MAHARANI', '81256', '1994-10-09', '2147483647', 'JL. HERAN DEH', 0, 0, 0, 0, 'non-reaktif', 1, '2020-11-04 10:50:33', 1, '2020-11-04 10:50:33'),
(2, 2, '445/SK-PEM.RAPID/RSUD/XI/2020/2', '2020-11-04', 2020, 'MOHD IRWAN', '342324', '2020-11-04', '234234234', '2423423', 0, 0, 0, 0, 'non-reaktif', 1, '2020-11-04 11:07:44', 1, '2020-11-04 11:07:44'),
(3, 3, '445/SK-PEM.RAPID/RSUD/XI/2020/3', '2020-11-04', 2020, 'MAGHFIROH AINI', '823923', '2020-11-24', '2147483647', 'JL. SEMANGKA', 14, 1406, 1406042, 1406042007, 'non-reaktif', 1, '2020-11-04 15:28:57', 1, '2020-11-04 15:28:57'),
(4, 4, '445/SK-PEM.RAPID/RSUD/XI/2020/4', '2020-11-05', 2020, 'ADRIAN HADINATA', '342324', '1994-03-09', '2147483647', 'JL. MERDEKA BARAT', 31, 3173, 3173080, 1406042007, '', 1, '2020-11-05 08:29:22', 1, '2020-11-05 08:29:22'),
(5, 5, '445/SK-PEM.RAPID/RSUD/XI/2020/5', '2020-11-05', 2020, 'SEPTIA ANUGRAH', '730011', '1994-09-15', '2147483647', 'JL. ERBA NO.18', 14, 1471, 1471081, 1471081004, 'non-reaktif', 1, '2020-11-05 09:00:19', 1, '2020-11-05 09:00:19'),
(6, 6, '445/SK-PEM.RAPID/RSUD/XI/2020/6', '2020-11-05', 2020, 'SEPTIA ANUGRAH', '342324', '1994-09-15', '2147483647', 'JL. ERBA NO.18', 11, 1102, 1102011, 1102011001, 'Non-Reaktif', 1, '2020-11-05 12:23:13', 1, '2020-11-05 12:23:13'),
(7, 7, '445/SK-PEM.RAPID/RSUD/XI/2020/7', '2020-11-05', 2020, 'SEPTIA ANUGRAH', '342324', '1994-09-15', '2147483647', 'JL. ERBA', 14, 1401, 1401010, 1401010005, 'NON-REAKTIF', 1, '2020-11-05 12:25:06', 1, '2020-11-05 12:25:06'),
(8, 8, '445/SK-PEM.RAPID/RSUD/XI/2020/8', '2020-11-06', 2020, 'HENDRA JAYANTO', '342324', '2020-11-06', '2147483647', 'JL. KEBAJIKAN', 14, 1403, 1403011, 1403011001, 'NON-REAKTIF', 1, '2020-11-06 10:30:41', 1, '2020-11-06 10:30:41'),
(9, 9, '445/SK-PEM.RAPID/RSUD/XI/2020/9', '2020-11-09', 2020, 'MARJAN', '45345', '2020-11-09', '2147483647', 'JL. KERNBA', 14, 1401, 1401011, 1401011003, 'NON-REAKTIF', 1, '2020-11-09 10:52:26', 1, '2020-11-09 11:26:28'),
(10, 10, '445/SK-PEM.RAPID/RSUD/XI/2020/10', '2020-11-10', 2020, 'SEPTIA ANUGRAH', '453454', '2020-11-09', '14711215099', 'JL. ERBA', 14, 1402, 1402020, 1402020027, 'NON-REAKTIF', 14, '2020-11-10 13:53:48', 14, '2020-11-10 13:53:48'),
(11, 11, '445/SK-PEM.RAPID/RSUD/XI/2020/11', '2020-11-10', 2020, 'ALIKA MAHARANI', '730011', '2020-11-09', '45345343453', 'FGFDGDFGDFGFD', 0, 0, 0, 0, '', 14, '2020-11-10 14:42:22', 14, '2020-11-10 14:42:22'),
(12, 12, '445/SK-PEM.RAPID/RSUD/XI/2020/12', '2020-11-10', 2020, 'MOHD IRWAN', '823923', '2020-11-16', '34545364463', 'SRGDGF', 0, 0, 0, 0, '', 14, '2020-11-10 14:44:37', 14, '2020-11-10 14:44:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `surat_rapid`
--
ALTER TABLE `surat_rapid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `surat_rapid`
--
ALTER TABLE `surat_rapid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
