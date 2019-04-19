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
-- Table structure for table `remi_contact`
--

CREATE TABLE `remi_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `n_tel` int(10) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `name_societe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `remi_contact`
--

INSERT INTO `remi_contact` (`id`, `name`, `first_name`, `n_tel`, `mail`, `name_societe`) VALUES
(10, 'Sorry', 'Test', 1234567890, 'sfsqf@gmail.com', 'Crapule'),
(11, 'Sql', 'Love', 989898980, 'sql@love.com', 'Hacker Fou'),
(14, 'lagaf', 'gaston', 0, 'mange@dugateau.com', 'jean'),
(18, 'marche', 'ca', 0, 'jiqsf@hqoijdp.com', 'Bazart'),
(19, 'jordan', 'mickael', 0, 'ksdhfoieugfoe', 'Crapule'),
(22, 'doro', 'dodo', 485956362, 'jordan.com', 'jeanchoix'),
(24, 'tout', 'estcasse', 485956362, 'tt5898563256', 'BOUF'),
(28, 'rezedz', 'rzerzr', 98765, 'dorod@gmail.com', 'soloxs.s.c.s'),
(29, 'fre', 'fder', 764534353, 'dorian@gmail.com', 'Crapule'),
(30, 'dedrfrf', 'deferfec', 471228281, 'dorian@gomomo.com', 'soloxs.s.c.s');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `remi_contact`
--
ALTER TABLE `remi_contact`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `remi_contact`
--
ALTER TABLE `remi_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
