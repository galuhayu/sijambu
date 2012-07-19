-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2010 at 11:25 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

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
  `idbuku` int(10) NOT NULL AUTO_INCREMENT,
  `namabuku` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `pengarang` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `hargasewa` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `tglkembali` date NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `lama` int(11) NOT NULL DEFAULT '0',
  `jumpinjam` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idbuku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `namabuku`, `pengarang`, `hargasewa`, `status`, `tglkembali`, `flag`, `lama`, `jumpinjam`) VALUES
(1, 'One piece vol 1', 'yuyu', 2000, 1, '0000-00-00', 0, 3, 0),
(3, 'Harry Potter vol1', 'Jk. Rowling', 6000, 1, '0000-00-00', 0, 5, 0),
(4, 'special A vol 1', 'lili', 1200, 1, '0000-00-00', 0, 3, 0),
(5, 'Twilight', 'stephanie M.', 8000, 1, '0000-00-00', 0, 5, 0),
(6, 'Detektive conan vol1', 'asusu', 1500, 1, '0000-00-00', 1, 3, 0),
(7, 'Naruto vol 1', 'Ajimame', 2000, 1, '0000-00-00', 0, 3, 0),
(8, 'Bleach vol 1', 'Anatawa', 1600, 1, '0000-00-00', 0, 3, 0),
(9, 'cobaAdd', 'cobacoba', 100, 0, '0000-00-00', 0, 10, 0),
(10, 'OnePiece vol 3', 'aaaa', 1000, 1, '0000-00-00', 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idmember` int(10) NOT NULL AUTO_INCREMENT,
  `namamember` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `jeniskelamin` tinyint(1) NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tempatlahir` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `statusmember` tinyint(1) NOT NULL,
  `jumpinjam` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idmember`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idmember`, `namamember`, `jeniskelamin`, `telepon`, `alamat`, `tempatlahir`, `tgllahir`, `statusmember`, `jumpinjam`) VALUES
(1, 'yulianti', 2, '08192777777', 'Depok', 'Palembang', '0000-00-00', 0, 0),
(2, 'Ade Saputra', 1, '0819747437327', 'Depok', 'Jambi', '1989-01-01', 0, 0),
(3, 'Luki', 1, '090909090909', 'Jakarta', 'Jakarta', '1989-01-13', 0, 0),
(4, 'alfian', 1, '0891234566', 'Depok', 'Bandung', '1989-06-02', 0, 0),
(5, 'Rinaldi', 1, '0718274656', 'Jakarta', 'Jakarta', '1989-07-14', 0, 0),
(6, 'Risda', 2, '09586778574', 'Depok', 'palembang', '1989-12-13', 0, 0);

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
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `idtransaksi` int(10) NOT NULL AUTO_INCREMENT,
  `idmember` int(10) DEFAULT NULL,
  `idbuku` int(10) DEFAULT NULL,
  `tipepinjam` tinyint(1) DEFAULT '1',
  `tglpinjam` date DEFAULT NULL,
  `tglkembali` date DEFAULT NULL,
  `harga` int(11) DEFAULT '0',
  `denda` int(11) DEFAULT '0',
  `islunas` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idtransaksi`),
  KEY `idmember` (`idmember`),
  KEY `idbuku` (`idbuku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transaksi`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `nohp`, `alamat`, `strStyle`, `isDelete`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '08190000000', 'Localhost', 'herbal', 0),
(2, 'Pegawai', 'pegawai', 'a431ba54c55ae2cb91be1785398ecd595ca96b7a', '08190000001', 'Jln. Perumahan Pegawai', 'herbal', 0),
(3, 'Pemilik', 'pemilik', '1f86485ac9c8b00fb355bd1eb1c86d937f6d457c', '08190000002', 'Jln. Perumahan Pemilik', 'herbal', 0),
(4, 'Pengelola', 'pengelola', 'c04b214bd23a91c98288045a99f753e25b70d691', '08190000003', 'Jln. Perumahan Pengelola', 'herbal', 0),
(28, 'Ade Saputra', 'ade', '6fb0394b969258c4f33b92bbe8c601462bb5455b', '08181621821', 'Griya Indah', 'herbal', 0),
(29, 'Yulianti', 'yuli', 'fc3042dcd8e80ae51d901051cbfd784883eeb013', '081938181734', 'Enelis', 'herbal', 0),
(30, 'Percobaan saja', 'coba', '6228fcd5b58de800fd5798dd4cc5b6ccb233220b', '08190000004', 'Jln Coba Coba', 'herbal', 0),
(31, '', 'new', 'c2a6b03f190dfb2b4aa91f8af8d477a9bc3401dc', NULL, NULL, 'herbal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_role_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `role_id` int(5) NOT NULL,
  PRIMARY KEY (`user_role_id`),
  KEY `role_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

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
(16, 30, 2),
(17, 31, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_transaksi` FOREIGN KEY (`idbuku`) REFERENCES `buku` (`idbuku`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_transaksi1` FOREIGN KEY (`idmember`) REFERENCES `member` (`idmember`) ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
