-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: webtech.one.mysql.service.one.com:3306
-- Generation Time: Apr 19, 2019 at 12:07 PM
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
-- Table structure for table `remi_user`
--

CREATE TABLE `remi_user` (
  `id` int(20) NOT NULL,
  `name_user` varchar(20) NOT NULL,
  `firstname_user` varchar(20) NOT NULL,
  `pwd_user` varchar(20) NOT NULL,
  `mail_user` varchar(30) NOT NULL,
  `super_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `remi_user`
--

INSERT INTO `remi_user` (`id`, `name_user`, `firstname_user`, `pwd_user`, `mail_user`, `super_user`) VALUES
(1, 'Ranu', 'Jean-Christian', 'user', 'user@user.com', '1'),
(14, 'mairrtve', 'edfrgret', 'erverbsdbv', 'sdbfs', 'admin'),
(16, 'googo', 'gergv', 'gergver', 'gedgvde', 'admin'),
(17, 'brdbf', 'rdbfr', 'gf', 'frbfrb rd', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `remi_user`
--
ALTER TABLE `remi_user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `remi_user`
--
ALTER TABLE `remi_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
