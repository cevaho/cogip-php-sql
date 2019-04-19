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
-- Table structure for table `remi_facture`
--

CREATE TABLE `remi_facture` (
  `id` int(11) NOT NULL,
  `n_facture` int(10) NOT NULL,
  `date_facture` date NOT NULL,
  `date_prestation` date NOT NULL,
  `name_societe` varchar(20) NOT NULL,
  `name_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `remi_facture`
--

INSERT INTO `remi_facture` (`id`, `n_facture`, `date_facture`, `date_prestation`, `name_societe`, `name_contact`) VALUES
(1, 23145623, '2019-04-01', '2019-03-04', 'Bazart', 'Baz'),
(3, 23145624, '2019-04-05', '2018-12-10', 'Bazart', 'de La Fayette'),
(4, 23145500, '2019-03-04', '2018-12-04', 'Hacker Fou', 'Php'),
(5, 23145402, '2019-01-15', '2019-01-22', 'Crapule', 'Bullshit'),
(6, 23145403, '2018-11-01', '2018-09-27', 'Crapule', 'Ifck'),
(7, 23145202, '2018-12-18', '2018-04-12', 'soloxs.s.c.s', 'Vanderheyder'),
(8, 23145203, '2019-04-03', '2019-04-01', 'Hacker Fou', 'Php'),
(9, 23145501, '2019-03-04', '2019-03-04', 'Hacker Folle', 'Php'),
(10, 1234567890, '2019-04-02', '2019-04-03', 'jean', 'Jean');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `remi_facture`
--
ALTER TABLE `remi_facture`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `remi_facture`
--
ALTER TABLE `remi_facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
