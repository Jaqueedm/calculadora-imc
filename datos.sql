-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2021 a las 21:22:24
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `imc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id_datos` int(3) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `peso` float(4,2) NOT NULL,
  `altura` float(5,2) NOT NULL,
  `etapa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datos_imc` float(4,2) NOT NULL,
  `resultado` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id_datos`, `fecha`, `peso`, `altura`, `etapa`, `datos_imc`, `resultado`) VALUES
(7, '2021-05-20 04:46:32', 0.00, 0.00, '', 0.00, ''),
(8, '2021-05-20 04:46:50', 0.00, 0.00, '', 0.00, ''),
(9, '2021-05-20 04:48:03', 69.00, 1.60, 'adulto', 27.00, ''),
(10, '2021-05-20 04:49:02', 48.00, 1.47, 'adolescente', 22.20, ''),
(11, '2021-05-20 05:01:37', 70.00, 1.56, 'adulto', 28.80, ''),
(12, '2021-05-20 05:06:34', 60.00, 1.59, 'adulto', 23.70, 'Peso normal par'),
(13, '2021-05-20 05:08:45', 60.00, 1.59, 'adulto', 23.70, 'Peso normal par'),
(14, '2021-05-20 05:10:42', 48.00, 1.30, 'adolescente', 28.40, 'Sobrepeso para el adolescente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id_datos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id_datos` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
