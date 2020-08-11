-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2020 at 09:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `ams_kontak`
--

CREATE TABLE IF NOT EXISTS `ams_kontak` (
  `id_kontak` int(11) NOT NULL,
  `nm_kontak` varchar(70) NOT NULL,
  `almt` text NOT NULL,
  `fax` varchar(15) NOT NULL,
  `ko1` varchar(15) NOT NULL,
  `ko2` varchar(15) NOT NULL,
  `ko3` varchar(15) NOT NULL,
  `ko4` varchar(15) NOT NULL,
  `ko5` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1561 DEFAULT CHARSET=latin1;
