-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2010 at 12:43 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sijambu`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `idbook` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `namabuku` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `pengarang` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `hargasewa` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tglkembali` date NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `lama` int(11) NOT NULL DEFAULT '0',
  `jumpinjam` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idbook`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `buku`
--


-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idmember` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `namamember` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `jeniskelamin` tinyint(1) NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tempatlahir` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `statusmember` tinyint(1) NOT NULL,
  PRIMARY KEY (`idmember`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `member`
--


-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(5) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'administrator'),
(2, 'pegawai_toko'),
(3, 'pemilik_toko'),
(4, 'pengelola_toko');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `nohp` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `alamat` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `strStyle` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `nohp`, `alamat`, `strStyle`, `isDelete`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '08190000000', 'Localhost', 'herbal', 0),
(2, 'Pegawai', 'pegawai', 'a431ba54c55ae2cb91be1785398ecd595ca96b7a', '08190000001', 'Jln. Perumahan Pegawai', 'herbal', 0),
(3, 'Pemilik', 'pemilik', '1f86485ac9c8b00fb355bd1eb1c86d937f6d457c', '08190000002', 'Jln. Perumahan Pemilik', 'herbal', 0),
(4, 'Pengelola', 'pengelola', 'c04b214bd23a91c98288045a99f753e25b70d691', '08190000003', 'Jln. Perumahan Pengelola', 'herbal', 0),
(28, 'Ade Saputra', 'ade', '6fb0394b969258c4f33b92bbe8c601462bb5455b', '081807418051', 'Griya Indah', 'herbal', 0),
(29, 'Yulianti', 'yuli', 'fc3042dcd8e80ae51d901051cbfd784883eeb013', '081927651112', 'Enelis', 'herbal', 0),
(30, 'Percobaan saja', 'coba', '6228fcd5b58de800fd5798dd4cc5b6ccb233220b', '08190000004', 'Jln Coba Coba', 'herbal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_role_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `role_id` int(5) NOT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(14, 28, 4),
(15, 29, 3),
(16, 30, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
