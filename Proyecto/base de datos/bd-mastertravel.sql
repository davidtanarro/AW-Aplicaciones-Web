-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2017 a las 13:16:07
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mastertravel`
--

CREATE DATABASE IF NOT EXISTS `mastertravel` DEFAULT  CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `mastertravel`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `billete`
--

CREATE TABLE `billete` (
  `idViaje` int(11) NOT NULL,
  `asiento` int(11) NOT NULL,
  `idPasajero` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `suplementos` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Ninguno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `idConductor` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaContratacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noregistrado`
--

CREATE TABLE `noregistrado` (
  `dni` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `codpostal` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `codpostal` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `numValoraciones` int(11) NOT NULL DEFAULT '0',
  `vip` int(11) NOT NULL DEFAULT '0',
  `fechaRegistro` date DEFAULT NULL,
  `usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellidos`, `direccion`, `codpostal`, `telefono`, `correo`, `password`, `numValoraciones`, `vip`, `fechaRegistro`, `usuario`) VALUES
('1', '', '', '', '', '', '', '$2y$10$JAqtd6vyQjszHqLJUoFev.33tEaQLaZKNwqiwfEV3ckcbmqmWIQXq', 0, 0, '2017-05-11', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `idConductor` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL,
  `idUsuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valorarConductor` double DEFAULT NULL,
  `valorarViaje` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `idViaje` int(11) NOT NULL,
  `origen` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `destino` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fechaSalida` date NOT NULL,
  `horaSalida` time NOT NULL,
  `numBus` int(11) NOT NULL DEFAULT '1',
  `idConductor` int(11) NOT NULL,
  `fechaFinalizacion` date DEFAULT NULL,
  `frecuencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `billete`
--
ALTER TABLE `billete`
  ADD PRIMARY KEY (`idViaje`,`asiento`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`idConductor`);

--
-- Indices de la tabla `noregistrado`
--
ALTER TABLE `noregistrado`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`idConductor`,`idViaje`,`idUsuario`),
  ADD KEY `idViaje` (`idViaje`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`idViaje`,`idConductor`),
  ADD KEY `viaje_ibfk_1` (`idConductor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `idConductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50007;
--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `idViaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `billete`
--
ALTER TABLE `billete`
  ADD CONSTRAINT `billete_ibfk_1` FOREIGN KEY (`idViaje`) REFERENCES `viaje` (`idViaje`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`idConductor`) REFERENCES `conductor` (`idConductor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`idViaje`) REFERENCES `viaje` (`idViaje`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`idConductor`) REFERENCES `conductor` (`idConductor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
