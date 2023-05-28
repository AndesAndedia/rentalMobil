-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 09:59 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
  `nopol` varchar(15) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `biaya` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `nama` varchar(25) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `kode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`nama`, `notelp`, `kode`) VALUES
('gabrielGABRIEL', '1231231', '123'),
('gabrieleeeeeeeeeee', '12313122', '12311');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `nopol` varchar(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `status` varchar(1) NOT NULL,
  `lama` int(11) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id`, `kode`, `tanggal`, `nopol`, `nama`, `status`, `lama`, `jenis`, `total`) VALUES
(3, '12311', '2019-05-17', 'B3C0Z', 'gabriel', '2', 3, 'suv', 450000),
(4, '123', '2019-05-10', 'B3C0Z', 'gabrielGABRIEL', '2', 3, 'mini', 500000),
(5, '12311', '2019-05-22', 'F1239CU', 'gabrieLgabrieLLL', '2', 5, 'suv', 450000),
(6, '54654', '2019-05-24', 'D1331ZZ', 'gabgab', '1', 1, 'city', 300000),
(7, '789798', '2019-05-28', 'DK8023DT', 'gaaaaaaab', '1', 7, 'city', 300000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`nopol`),
  ADD KEY `nopol` (`nopol`,`jenis`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `nama` (`nama`,`kode`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode` (`kode`,`nopol`,`nama`,`jenis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
