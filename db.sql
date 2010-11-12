-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2010 at 10:14 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

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
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` char(5) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
('00000', 'administrator'),
('00001', 'user1'),
('00002', 'user2'),
('00003', 'user3'),
('00004', 'user4'),
('00005', 'user5'),
('00006', 'user6'),
('00007', 'user7');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` char(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(44) NOT NULL,
  `strStyle` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `strStyle`) VALUES
('00000', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', ''),
('00001', 'user01', '0497fe4d674fe37194a6fcb08913e596ef6a307f', 'sky'),
('00002', 'user02', 'a7659675668c2b34f0a456dbaa508200340dc36c', ''),
('00003', 'user03', '6f092588a43665e24a7917924ba216f50fb7737d', ''),
('00004', 'user04', '11b5abfbc0914db858d26ca8aa6f2226fef36f59', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_role_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` char(5) NOT NULL,
  `role_id` char(5) NOT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_id`, `role_id`) VALUES
(0,  '00000','00000'),
(1,  '00001','00001'),
(2,  '00002','00002'),
(3,  '00003','00003'),
(4,  '00004','00004');
