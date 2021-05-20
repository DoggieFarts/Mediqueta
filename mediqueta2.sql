-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2020 a las 04:41:44
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mediqueta2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `email` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`email`, `usuario`, `contrasena`) VALUES
('david@david', 'david', '$2y$10$bDRRqliUWiQlynN9NW3MKuyZSSWgDownmQoN43047RmtXghQEx7ru'),
('david@ipn.mx', 'david3', '$2y$10$S38V4XDvTo2dzlCPeoZiiuGUHo0enQQ6Oa.1EgXk.C9qQkb3aaDpW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_color`
--

CREATE TABLE `cliente_color` (
  `id_cc` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_med` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente_color`
--

INSERT INTO `cliente_color` (`id_cc`, `email`, `id_med`) VALUES
(1, 'david@david', 1),
(2, 'david@david', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `id_med` int(255) NOT NULL,
  `nombre_med` varchar(255) NOT NULL,
  `fabricante` varchar(255) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `dosis` varchar(255) DEFAULT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`id_med`, `nombre_med`, `fabricante`, `comentario`, `dosis`, `color`) VALUES
(1, 'Ritrovil', 'Bayer', 'Para dormir', '1 mg cada 12 horas', '#D8674F');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `cliente_color`
--
ALTER TABLE `cliente_color`
  ADD PRIMARY KEY (`id_cc`),
  ADD KEY `email` (`email`,`id_med`),
  ADD KEY `id_med` (`id_med`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id_med`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente_color`
--
ALTER TABLE `cliente_color`
  MODIFY `id_cc` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id_med` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_color`
--
ALTER TABLE `cliente_color`
  ADD CONSTRAINT `cliente_color_ibfk_1` FOREIGN KEY (`email`) REFERENCES `cliente` (`email`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_color_ibfk_2` FOREIGN KEY (`id_med`) REFERENCES `medicamento` (`id_med`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
