-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: 10.200.10.252
-- Generation Time: Nov 08, 2019 at 06:23 PM
-- Server version: 5.5.57-0+deb7u1-log
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eep7`
--

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `id` int(11) NOT NULL,
  `numfactura` varchar(40) DEFAULT NULL,
  `id_rubro` int(1) NOT NULL,
  `id_subrubro` int(1) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` enum('I','E') NOT NULL,
  `monto` decimal(9,2) DEFAULT NULL,
  `detalle` varchar(400) DEFAULT NULL,
  `fecha_usuario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`id`, `numfactura`, `id_rubro`, `id_subrubro`, `fecha`, `tipo`, `monto`, `detalle`, `fecha_usuario`, `usuario`) VALUES
(1, '', 1, 1, '2019-10-01', 'I', '20.00', 'Perez Fulanito', '2019-10-17 20:15:06', 'ejemplo'),
(2, '', 1, 3, '2019-10-03', 'I', '1254.60', 'Rifa de la canasta familiar', '2019-10-17 20:15:41', 'ejemplo'),
(3, '', 3, 1, '2019-10-11', 'I', '5000.00', 'Subsidio para reparaciones', '2019-10-17 20:16:28', 'ejemplo'),
(5, '0001-4565878', 2, 5, '2019-10-17', 'E', '1200.00', 'Regalos para el dÃ­a del niÃ±o', '2019-10-17 20:19:18', 'ejemplo'),
(6, '', 1, 2, '2019-10-09', 'I', '2000.00', 'DonaciÃ³n de Cosme Fulanito', '2019-10-17 21:17:36', 'ejemplo'),
(7, '', 1, 1, '2019-10-16', 'I', '10.00', 'Carlos Ponce', '2019-10-17 21:18:24', 'ejemplo'),
(8, '', 1, 5, '2019-10-10', 'I', '4563.60', 'Ganancia neta del Mes de julio', '2019-10-17 21:19:31', 'ejemplo'),
(9, '', 1, 5, '2019-10-17', 'I', '4521.00', 'Ganancia neta mes Agosto', '2019-10-17 21:21:22', 'ejemplo'),
(15, NULL, 1, 1, '2019-10-02', 'I', '1.00', NULL, '2019-10-21 17:16:13', 'ejemplo'),
(17, '', 1, 1, '2019-10-10', 'E', '123.00', '', '2019-10-21 17:33:20', 'ejemplo'),
(18, '643HJKOH', 1, 1, '2019-10-17', 'I', '296000.00', 'Gfthhji', '2019-10-23 22:19:48', 'ejemplo');

-- --------------------------------------------------------

--
-- Table structure for table `rubros`
--

CREATE TABLE IF NOT EXISTS `rubros` (
  `id` int(11) unsigned NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subrubros`
--

CREATE TABLE IF NOT EXISTS `subrubros` (
  `id` int(11) unsigned NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) unsigned NOT NULL,
  `usuario` varchar(128) NOT NULL,
  `clave` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`) VALUES
(1, 'ejemplo', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subrubros`
--
ALTER TABLE `subrubros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subrubros`
--
ALTER TABLE `subrubros`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
