-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2020 pada 07.40
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
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(250) NOT NULL,
  `kompetensi` varchar(250) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `nama_dokter`, `kompetensi`, `nip`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(16, 'dr. Reni Lenggogeni, SpPK', 'Dokter Spesialis Patologi Klinik', '19740201 200604 2 025', 1, 1, 1, 1564039728, 1564039728),
(35, 'dr. Haniza Rangkuti ', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(36, 'dr. Witri Intan Susila', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(37, 'dr. Tengku Lya Handasuri', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(38, 'dr. Hendra Eko Putra', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(39, 'dr. Ivan Tabrani', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(40, 'dr. Dian Maulidawati', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(41, 'dr. Nola Puspita Agus ', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(42, 'dr. Farencia Auliani', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(44, 'dr. Sisilia Kesuma Dewi', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(45, 'dr. Albine Juan Carlos Barus', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(46, 'dr. Sri Asmara', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(47, 'dr. Kartika Zari Aryani', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(48, 'dr. Regina Lisa', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(49, 'dr. Ivon Nafriti Gemiyani', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(50, 'dr. Fauzul Nurul Azmi', 'Dokter Umum', '', 1, 1, 1, 1, 1605073026),
(51, 'dr. Ahmad Fahrudin', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(52, 'dr. Anggie Swarha Patria', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(53, 'dr. Rudi Haris Munandar', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(54, 'dr. Syarifah Tridani Fitria', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(55, 'dr. Uno Surgery Erwin', 'Dokter Umum', NULL, 1, 1, 1, 1564039728, 1564039728),
(56, 'dr. Loka', 'Dokter Umum', NULL, 1, 0, 0, 0, 0),
(68, 'dr. Farencia Auliani', 'Dokter Umum', NULL, 1, 0, 0, 0, 0),
(69, 'dr. Jessy', 'Dokter Umum', NULL, 1, 0, 0, 0, 0),
(207, 'dr. Indah Prasetya Putri', 'Dokter Umum', NULL, 1, 0, 0, 0, 0),
(208, 'dr.Emilia Fania', 'Dokter Umum', NULL, 1, 0, 0, 0, 0),
(209, 'dr.Yulia Rosi', 'Dokter Umum', NULL, 1, 0, 0, 0, 0),
(211, 'dr. Rahmidatul Aftika', 'Dokter IGD', NULL, 1, 0, 0, 0, 0),
(213, 'dr. Wiwit Nila Sukma, Sp.PK', 'Dokter Spesialis Patologi Klinik', '19811217 200803 2 001', 1, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
