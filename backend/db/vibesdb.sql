-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 04:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vibesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(4) NOT NULL,
  `nombre` varchar(32) COLLATE utf8_bin NOT NULL,
  `precio` float NOT NULL,
  `cantidad_stock` int(16) NOT NULL,
  `imagen` varchar(120) COLLATE utf8_bin NOT NULL,
  `informacion` varchar(200) COLLATE utf8_bin NOT NULL,
  `talles` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `cantidad_stock`, `imagen`, `informacion`, `talles`) VALUES
(25, 'Remera basica negra', 30000, 20, '1698686388-remera.jpg', 'Remera basica de algodon puro', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_u` int(8) NOT NULL,
  `Nbr_u` varchar(50) COLLATE utf8_bin NOT NULL,
  `Pass_u` varchar(120) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_u`, `Nbr_u`, `Pass_u`, `email`, `token`) VALUES
(1, 'NicoAdmin', 'VentanaAdmin', 'cabral.nicolas@tecnica7.edu.ar', 2),
(27, 'axel', '$2y$10$jT5IDMWivF7Od84RFZHveORBcth2AcOn1IybiO84cqBOProIK/Oz.', 'asd@gmail.com', 1698687680),
(40, 'nico', '$2y$10$ZkpYmlAa9VHn3JI/vHY7uO.GJHKepbPUl/xtJJISrT2YTWybKGKQm', 'cabralnicolas91@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_u` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;