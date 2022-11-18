-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 04:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

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
-- Table structure for table `nota_kesepahaman`
--

CREATE TABLE `nota_kesepahaman` (
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

--
-- Dumping data for table `nota_kesepahaman`
--

INSERT INTO `nota_kesepahaman` (`id`, `no_urut`, `kode_surat`, `nomor_surat`, `tanggal`, `tahun`, `perihal`, `ketersediaan`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, '', 'Kpts/1/III/2020', '2020-03-11', 2020, 'makanan', 2, 1, '2020-03-20 09:08:21', 1, '2020-03-20 09:08:21'),
(2, 2, '', 'Kpts/2/III/2020', '2020-03-12', 2020, 'dfasfsdfasfsdf', 2, 1, '2020-03-20 09:10:27', 1, '2020-03-20 09:12:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nota_kesepahaman`
--
ALTER TABLE `nota_kesepahaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nota_kesepahaman`
--
ALTER TABLE `nota_kesepahaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
