-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2017 at 11:49 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 5.6.30-11+deb.sury.org~xenial+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vartvald`
--

-- --------------------------------------------------------

--
-- Table structure for table `Turnyras`
--

CREATE TABLE `Turnyras` (
  `Turnnr` int(5) NOT NULL,
  `Vardas` varchar(50) NOT NULL,
  `Data` varchar(20) NOT NULL,
  `Statusas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Turnyras`
--

INSERT INTO `Turnyras` (`Turnnr`, `Vardas`, `Data`, `Statusas`) VALUES
(501, 'Tomas pries Tomas2', '2017-07-22 12:10:00', 'Laimejo Tomas2'),
(502, 'Kostas pries Tomas', '2017-07-22 13:10:00', 'Laimejo Kostas'),
(503, 'Rimas pries Administratorius', '2017-07-22 14:10:00', 'Laimejo Rimas'),
(504, 'Kestas pries Jonas', '2017-07-22 15:10:00', 'Laimejo Jonas');

-- --------------------------------------------------------

--
-- Table structure for table `Turnyras2`
--

CREATE TABLE `Turnyras2` (
  `Turnnr` int(5) NOT NULL,
  `Vardas` varchar(50) NOT NULL,
  `Data` varchar(20) NOT NULL,
  `Statusas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Turnyras2`
--

INSERT INTO `Turnyras2` (`Turnnr`, `Vardas`, `Data`, `Statusas`) VALUES
(600, 'Jonas pries Rima', '2017-07-25  12.10', 'Laimejo Jonas'),
(601, 'Kostas pries Tomas2', '2017-07-25  13:10', 'Laimejo Tomas2');

-- --------------------------------------------------------

--
-- Table structure for table `Turnyras3`
--

CREATE TABLE `Turnyras3` (
  `Turnnr` int(5) NOT NULL,
  `Vardas` varchar(50) NOT NULL,
  `Data` varchar(20) NOT NULL,
  `Statusas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Turnyras3`
--

INSERT INTO `Turnyras3` (`Turnnr`, `Vardas`, `Data`, `Statusas`) VALUES
(700, 'Jonas pries Tomas2', '2017-08-22  13:00', 'Laimejo Jonas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) NOT NULL,
  `userlevel` tinyint(1) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `taskai` int(5) NOT NULL DEFAULT '1000',
  `Nr` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `userid`, `userlevel`, `email`, `timestamp`, `taskai`, `Nr`) VALUES
('Valdytojas', '16c354b68848cdbd8f54a226a0a55b21', '7ed2b87b255a0348b61226bd7c2ed5b4', 5, 'demo@ktu.lt', '2017-11-24 13:03:41', 2000, 1),
('Administratorius', '16c354b68848cdbd8f54a226a0a55b21', 'a2fe399900de341c39c632244eaf8483', 9, 'demo@ktu.lt', '2017-12-09 10:29:31', 1000, 2),
('Vartotojas', '16c354b68848cdbd8f54a226a0a55b21', '9a47f4552955b91bcd8850d73b00e703', 1, 'demo@ktu.lt', '2017-05-09 20:37:44', 2050, 3),
('rimas', '16c354b68848cdbd8f54a226a0a55b21', '689e5b2971577d707becb97405ede951', 9, 'rimas@litnet.lt', '2017-06-27 11:58:22', 2300, 4),
('kostas', '16c354b68848cdbd8f54a226a0a55b21', '4d5f51fa1209cec4240a5fbd5e15adbe', 1, 'rimas@litnet.lt', '2017-11-24 13:02:47', 1055, 5),
('kestas', '16c354b68848cdbd8f54a226a0a55b21', '601d806fb7af04dabddbbcb95458d9e4', 1, 'rimas@litnet.lt', '2017-06-18 16:34:40', 1600, 6),
('jonas', '64067822105b320085d18e386f57d89a', '9c5ddd54107734f7d18335a5245c286b', 255, 'rimas@litnet.lt', '2017-05-09 17:10:37', 1850, 7),
('tomas2', '16c354b68848cdbd8f54a226a0a55b21', '0e4754c7c7cd67da1cf7f7428ca225d3', 1, 'demo@demo.demo', '2017-11-24 15:36:29', 1800, 8),
('tomas', '16c354b68848cdbd8f54a226a0a55b21', '57833ab76b23841c7da12c0b317e98f3', 1, 'tomas@tomas.lt', '2017-11-24 16:11:32', 1500, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Turnyras`
--
ALTER TABLE `Turnyras`
  ADD PRIMARY KEY (`Turnnr`);

--
-- Indexes for table `Turnyras2`
--
ALTER TABLE `Turnyras2`
  ADD PRIMARY KEY (`Turnnr`);

--
-- Indexes for table `Turnyras3`
--
ALTER TABLE `Turnyras3`
  ADD PRIMARY KEY (`Turnnr`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `Nr` (`Nr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Nr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
