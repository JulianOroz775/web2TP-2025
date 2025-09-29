-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2025 a las 17:35:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web2tp-2025`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suplementos`
--

CREATE TABLE `suplementos` (
  `Suplemento_ID` int(11) NOT NULL,
  `Marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `suplementos`
--

INSERT INTO `suplementos` (`Suplemento_ID`, `Marca`) VALUES
(1, 'Ena'),
(2, 'Star Nutrition');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suplementos2`
--

CREATE TABLE `suplementos2` (
  `Suplemento_ID` int(11) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Cantindad` int(11) DEFAULT NULL,
  `Stock` tinyint(1) NOT NULL DEFAULT 0,
  `Prioridad` int(11) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `suplementos`
--
ALTER TABLE `suplementos`
  ADD PRIMARY KEY (`Suplemento_ID`);

--
-- Indices de la tabla `suplementos2`
--
ALTER TABLE `suplementos2`
  ADD PRIMARY KEY (`Suplemento_ID`),
  ADD KEY `id_marca` (`id_marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `suplementos`
--
ALTER TABLE `suplementos`
  MODIFY `Suplemento_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `suplementos2`
--
ALTER TABLE `suplementos2`
  MODIFY `Suplemento_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `suplementos2`
--
ALTER TABLE `suplementos2`
  ADD CONSTRAINT `fk_suplemento` FOREIGN KEY (`id_marca`) REFERENCES `suplementos` (`Suplemento_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
