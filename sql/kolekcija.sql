DROP DATABASE IF EXISTS kolekcija;
CREATE DATABASE kolekcija;
USE kolekcija;
-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 07:06 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kolekcija`
--

-- --------------------------------------------------------

--
-- Table structure for table `filmovi`
--

CREATE TABLE `filmovi` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `id_zanr` int(11) NOT NULL,
  `godina` text NOT NULL,
  `trajanje` int(11) NOT NULL,
  `slika` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmovi`
--

INSERT INTO `filmovi` (`id`, `naslov`, `id_zanr`, `godina`, `trajanje`, `slika`) VALUES
(1, 'Antitrust', 2, '2001', 105, 'img/antitrust_2001.jpg'),
(2, 'Firewall', 3, '2006', 105, 'img/firewall_2006.jpg'),
(3, 'Hackers', 2, '1995', 107, 'img/hackers_1995.jpg'),
(4, 'Operation Swordfish', 1, '2001', 99, 'img/operation_swordfish_2001.jpg'),
(5, 'Operation Takedown', 2, '2000', 96, 'img/operation_takedown_2000.jpg'),
(6, 'Pirates of Silicon Valley', 2, '1995', 99, 'img/pirates_of_silicone_valley_1999.jpg'),
(7, 'The Social Network', 2, '2010', 120, 'img/the_social_network_2010.jpg'),
(8, 'Tron', 4, '1982', 96, 'img/tron_1982.jpg'),
(9, 'Tron Legacy', 4, '2010', 125, 'img/tron_legacy_2010.jpg'),
(10, 'Wargames', 3, '1983', 114, 'img/war_games_1983.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`id`, `naziv`) VALUES
(1, 'Akcija'),
(2, 'Drama'),
(3, 'Triler'),
(4, 'Sci-Fi'),
(5, 'Horor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmovi`
--
ALTER TABLE `filmovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmovi`
--
ALTER TABLE `filmovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
