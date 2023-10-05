-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2023 a las 01:20:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vibesdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_u` int(8) NOT NULL,
  `Nbr_u` varchar(50) NOT NULL,
  `Img_u` varchar(100) NOT NULL,
  `Pass_u` varchar(120) NOT NULL,
  `email` varchar(60) NOT NULL,
  `token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_u`, `Nbr_u`, `Img_u`, `Pass_u`, `email`, `token`) VALUES
(1, 'axel', '', '$2y$10$trUKc/9XlRrfLT38Nltpl.7jZixNiUDTDQXPk30RhEqIk7GxE4OTC', 'axelleonelbarroso@gmail.com', 1695856174),
(2, 'axel', '', '$2y$10$kFWI58Crixx5O3nZMHGjRenaRdmkQmTW3IAaRrPs/qzH/SJWjuoHO', 'axelleonelbarroso123@gmail.com', 1695856207),
(3, 'axel', '', '$2y$10$r13eL/06XTv0YnJoQqn8sOcfpMiFa1S4.yAQ1p0Ga828nr2kRQHya', 'axelleonelbarroso@gmail.com', 0),
(4, 'nico', '', '$2y$10$gbAjPjrlwAm4pMXnChNxpuG6QPcqgf/MADtRyW.6mHCJ78mLqHlNu', 'axelleonelbarroso@gmail.com', 1695856633),
(5, 'axel', '', '$2y$10$.j8zIAZrRQx7ViP1aqZxr.zop5Cl0s.cUsWDozjsJXpCPN/E/VVTO', 'axelleonelbarroso@gmail.com', 0),
(6, 'axel', '', '$2y$10$Zrkpy9wKFb4F62T1XyUdaOa.1d85yjsGenwvVwq0EyfH8Nc7qTPGe', 'axelleonelbarroso@gmail.com', 1696283767),
(7, 'axel', '', '$2y$10$RTlS/Vk2YpaGVyJVJzwbFuvWXfkrZB.jhJeiBevpwHPfB/pzXcWTy', 'axelleonelbarroso@gmail.com', 1696284010),
(8, 'axel', '', '$2y$10$gm/rFh3uZNyo05oddK9wI.8.81y4dUyYYN86IzKITkvClMVcTkVoS', 'axelleonelbarroso@gmail.com', 1696284113),
(9, 'axel', '', '$2y$10$3OsFiWJMorN0WIH4Gb/Oae3CkSfPVX7J5Tg92IFLvin7UFnTOTyjm', 'axelleonelbarroso@gmail.com', 1696284471),
(10, 'nico', '', '$2y$10$krqwkH3c2ncqvWtIhBHHSe9zSJMEsp8MtUCOilYAmeJ64EPKBZ75q', 'axelleonelbarroso@gmail.com', 1696284585),
(11, 'axel', '', '$2y$10$j0bgnSRKX2T5gQpv6P/xIOWMuJBUcfvthMlRLQIqDdXnOzfHm8zFC', 'axelleonelbarroso@gmail.com', 0),
(12, 'axel', '', '$2y$10$/8hsbbZKUkTTmLkTKYePxePZtb5X.jnHZXwRuTIUU9hgxILerJAHC', 'axelleonelbarroso@gmail.com', 1696284840),
(13, 'axel', '', '$2y$10$bMAzZfT2DfCBwyvmEPA.hOQmTO1iFHCePZtP41NRhca0uGXOnefBi', 'axelleonelbarroso@gmail.com', 1696284946),
(14, 'axel', '', '$2y$10$AEiGFSBlFDe1sqSaWDLJm.gauliQoEdYUBH6twvNuuz9Q9mbaS6ku', 'axelleonelbarroso@gmail.com', 0),
(15, 'axel', '', '$2y$10$7ix8tvHzPtXZm5Pv.TPqNeD3u.Kteuq3BkSf2CC0mO9trBa0edKKu', 'axelleonelbarroso@gmail.com', 0),
(16, 'axel', '', '$2y$10$vAgknmjdYjeFQM10KktleeMeHT7iL5k9tFeuHNIWgLw7le5LYdkUu', 'axelleonelbarroso@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_u` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
