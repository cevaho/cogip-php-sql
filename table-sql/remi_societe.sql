-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: webtech.one.mysql.service.one.com:3306
-- Generation Time: Apr 19, 2019 at 12:06 PM
-- Server version: 10.3.12-MariaDB-1:10.3.12+maria~bionic
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech_one_becode`
--

-- --------------------------------------------------------

--
-- Table structure for table `remi_societe`
--

CREATE TABLE `remi_societe` (
  `id` int(11) NOT NULL,
  `name_societe` varchar(20) NOT NULL,
  `n_pays` varchar(20) NOT NULL,
  `n_tel` int(15) NOT NULL,
  `n_tva` varchar(15) NOT NULL,
  `type_societe` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `remi_societe`
--

INSERT INTO `remi_societe` (`id`, `name_societe`, `n_pays`, `n_tel`, `n_tva`, `type_societe`) VALUES
(1, 'Bazart', 'Belgique', 23455657, 'BE1234567890', 'client'),
(3, 'Escrow', 'Azerbaijan', 345678899, '876543210', 'fournisseur'),
(4, 'Hacker Fou', 'les-Internets', 999999999, '888887777', 'client'),
(19, 'dorian', 'be', 4712272, 'BE9876543210', 'fournisseur'),
(20, 'jean', 'fr', 2345678, '4567890', 'client'),
(35, 'BOUF', 'Nederlands', 765456789, 'NL1234567890', 'fournisseur'),
(36, 'soloxs.s.c.s', 'Belgique', 876544576, 'BE4321567890', 'client'),
(37, 'test3', 'TS', 545646678, 'BE1234567890', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `remi_societe`
--
ALTER TABLE `remi_societe`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `remi_societe`
--
ALTER TABLE `remi_societe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
