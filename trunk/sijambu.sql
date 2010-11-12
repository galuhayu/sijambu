-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2010 at 12:02 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `sijambu`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` char(5) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
('00000', 'administrator'),
('00001', 'pegawai_toko'),
('00002', 'pemilik_toko'),
('00003', 'pengelola_toko');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` char(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(44) NOT NULL,
  `strStyle` varchar(10) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `strStyle`) VALUES
('00000', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'herbal'),
('00002', 'pemilik', '1f86485ac9c8b00fb355bd1eb1c86d937f6d457c', 'herbal'),
('00003', 'pengelola', 'c04b214bd23a91c98288045a99f753e25b70d691', 'herbal'),
('00001', 'pegawai', 'a431ba54c55ae2cb91be1785398ecd595ca96b7a', 'herbal');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(5) NOT NULL auto_increment,
  `user_id` char(5) NOT NULL,
  `role_id` char(5) NOT NULL,
  PRIMARY KEY  (`user_role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_id`, `role_id`) VALUES
(0, '00000', '00000'),
(1, '00001', '00001'),
(2, '00002', '00002'),
(3, '00003', '00003');
