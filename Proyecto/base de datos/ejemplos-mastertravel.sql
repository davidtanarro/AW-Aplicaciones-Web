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
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`idConductor`, `nombre`, `apellidos`, `fechaContratacion`) VALUES
(3, 'Pepe', 'Ramírez Maeztu', '2014-10-16'),
(50001, 'Cristiano', 'Ronaldo Nazario', '2014-11-12'),
(50002, 'Neymar', 'Perez Rivaldo', '2014-11-14'),
(50003, 'Peter', 'Lim Lim', '2014-11-19'),
(50004, 'Florentino', 'Pérez Rodríguez', '2014-11-30'),
(50005, 'Joan', 'Laporta Estruch', '2014-12-30');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `noregistrado`
--

INSERT INTO `noregistrado` (`dni`, `nombre`, `apellidos`, `direccion`, `codpostal`, `telefono`) VALUES
('19111062V', 'luis', 'suarez', 'killer', '12345', '123456789'),
('79094621J', 'juan', 'pin', 'pon', '12345', '123456789'),
('99571233R', 'pepe', 'pin', 'pon', '12345', '123456789');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellidos`, `direccion`, `codpostal`, `telefono`, `correo`, `password`, `numValoraciones`, `vip`, `fechaRegistro`, `usuario`) VALUES
('24796057X', 'i', 'i i', 'i 1', '11111', '123456789', 'i@i.ii', '$2y$10$yJ93p5y8UNL.IxpGvBZqJuFZ2QP5gPlnHyDNoGEZCTGX8wCa.iGGm', 3, 0, '2017-05-13', 'i'),
('48161199G', 'a', 'a a', 'a 1', '11111', '123456789', 'a@a.aa', '$2y$10$HdnXkjYSu11JZXvxSxbDGuKDqfYO5d67gferO41BpI.Z34Ar2WaCO', 3, 0, '2017-05-12', 'a'),
('80787826G', 'e', 'e e', 'e 1', '11111', '123456789', 'e@e.ee', '$2y$10$3V9Li3vFKdxP9dBE1RvXuePoe4j7ObmjyoAFmAYpLwDCR5R8aT/kO', 3, 0, '2017-05-13', 'e'),
('51481772K', 'o', 'o o', 'o 1', '11111', '123456789', 'o@o.oo', '$2y$10$.kSHDz9Q0qjawrT42r91q.HS6KYrMrV10cJuOM196OfHi2dC7.cUC', 0, 0, '2017-05-13', 'o'),
('70358730M', 'u', 'u u', 'u 666', '66666', '666666666', 'u@u.uu', '$2y$10$Uhg5UKbYnVuMY5iKYY3oJukwVZXaVr2j0pgDlwtW3xpxVLfrAQ8x.', 2, 0, '2017-05-14', 'u'),
('98395857V', 'usuario', 'usuario usuario', 'usuario 1', '11111', '123456789', 'usuario@usuario.usuario', '$2y$10$Z0xu3GM0R1leW.GZuZ9QJ.MwqPw1DbKiDdxditA1dfeJdzOctC5OS', 3, 0, '2017-05-14', 'usuario');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`idViaje`, `origen`, `destino`, `fechaSalida`, `horaSalida`, `numBus`, `idConductor`, `fechaFinalizacion`, `frecuencia`) VALUES
(1, 'Barcelona', 'Madrid', '2015-02-02', '11:11:11', 2, 3, '2015-02-02', 0),
(2, 'Barcelona', 'Madrid', '2015-02-02', '11:11:11', 2, 50004, '2015-02-02', 0),
(3, 'Burgos', 'Granada', '2015-01-01', '22:22:22', 2, 50003, '2015-01-01', 0),
(4, 'Burgos', 'Granada', '2015-01-01', '22:22:22', 2, 50004, '2015-01-01', 0),
(5, 'Cadiz', 'Sevilla', '2018-01-16', '10:00:00', 1, 50002, '2018-05-02', 0),
(6, 'Barcelona', 'Jaen', '2017-05-10', '18:00:00', 1, 50001, '2017-05-12', 0),
(8, 'Madrid', 'Sevilla', '2017-05-10', '00:00:00', 2, 50003, '2017-05-10', 0),
(9, 'Madrid', 'Sevilla', '2017-05-10', '00:00:00', 2, 3, '2017-05-10', 0),
(11, 'Madrid', 'Sevilla', '2017-05-10', '16:00:00', 1, 50005, '2017-05-10', 0),
(13, 'Barcelona', 'Madrid', '2018-06-01', '12:00:00', 2, 50001, '2018-06-30', 0),
(14, 'Barcelona', 'Madrid', '2018-06-01', '12:00:00', 2, 50003, '2018-06-30', 0),
(15, 'Barcelona', 'Madrid', '2018-06-08', '12:00:00', 2, 50001, '2018-06-30', 0),
(16, 'Barcelona', 'Madrid', '2018-06-08', '12:00:00', 2, 50003, '2018-06-30', 0),
(17, 'Barcelona', 'Madrid', '2018-06-15', '12:00:00', 2, 50001, '2018-06-30', 0),
(18, 'Barcelona', 'Madrid', '2018-06-15', '12:00:00', 2, 50003, '2018-06-30', 0),
(19, 'Barcelona', 'Madrid', '2018-06-22', '12:00:00', 2, 50001, '2018-06-30', 0),
(20, 'Barcelona', 'Madrid', '2018-06-22', '12:00:00', 2, 50003, '2018-06-30', 0),
(21, 'Barcelona', 'Madrid', '2018-06-29', '12:00:00', 2, 50001, '2018-06-30', 0),
(22, 'Barcelona', 'Madrid', '2018-06-29', '12:00:00', 2, 50003, '2018-06-30', 0),
(23, 'Madrid', 'Barcelona', '2018-06-02', '05:15:00', 2, 50005, '2018-07-01', 0),
(24, 'Madrid', 'Barcelona', '2018-06-02', '05:15:00', 2, 50004, '2018-07-01', 0),
(25, 'Madrid', 'Barcelona', '2018-06-09', '05:15:00', 2, 50005, '2018-07-01', 0),
(26, 'Madrid', 'Barcelona', '2018-06-09', '05:15:00', 2, 50004, '2018-07-01', 0),
(27, 'Madrid', 'Barcelona', '2018-06-16', '05:15:00', 2, 50005, '2018-07-01', 0),
(28, 'Madrid', 'Barcelona', '2018-06-16', '05:15:00', 2, 50004, '2018-07-01', 0),
(29, 'Madrid', 'Barcelona', '2018-06-23', '05:15:00', 2, 50005, '2018-07-01', 0),
(30, 'Madrid', 'Barcelona', '2018-06-23', '05:15:00', 2, 50004, '2018-07-01', 0),
(31, 'Madrid', 'Barcelona', '2018-06-30', '05:15:00', 2, 50005, '2018-07-01', 0),
(32, 'Madrid', 'Barcelona', '2018-06-30', '05:15:00', 2, 50004, '2018-07-01', 0),
(33, 'Sevilla', 'Madrid', '2017-06-04', '12:00:00', 2, 3, '2017-06-04', 0),
(34, 'Sevilla', 'Madrid', '2017-06-04', '12:00:00', 2, 50001, '2017-06-04', 0),
(35, 'Madrid', 'Sevilla', '2017-06-04', '12:00:00', 2, 50002, '2017-06-04', 0),
(36, 'Madrid', 'Sevilla', '2017-06-04', '12:00:00', 2, 50003, '2017-06-04', 0),
(37, 'Madrid', 'Valencia', '2017-06-04', '12:00:00', 2, 50004, '2017-06-04', 0),
(38, 'Madrid', 'Valencia', '2017-06-04', '12:00:00', 2, 50005, '2017-06-04', 0),
(39, 'Valencia', 'Madrid', '2017-06-04', '12:00:00', 2, 50004, '2017-06-04', 0),
(40, 'Valencia', 'Madrid', '2017-06-04', '12:00:00', 2, 50005, '2017-06-04', 0);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `billete`
--

INSERT INTO `billete` (`idViaje`, `asiento`, `idPasajero`, `suplementos`) VALUES
(1, 1, '48161199G', 'Bicicletas'),
(1, 2, '80787826G', 'Bicicletas'),
(1, 3, '24796057X', 'Bicicletas'),
(1, 4, '70358730M', 'Bicicletas'),
(1, 5, '51481772K', 'Bicicletas'),
(1, 6, '98395857V', 'Bicicletas'),
(1, 7, '19111062V', 'Ninguno'),
(1, 8, '79094621J', 'Ninguno'),
(1, 10, '99571233R', 'Ninguno'),
(2, 2, '51481772K', 'Ninguno'),
(2, 3, '70358730M', 'Animales'),
(2, 4, '98395857V', 'Animales'),
(4, 1, '48161199G', 'Material Delicado'),
(4, 2, '80787826G', 'Bicicletas'),
(4, 3, '24796057X', 'Bicicletas'),
(4, 4, '70358730M', 'Bicicletas'),
(4, 5, '51481772K', 'Bicicletas'),
(4, 6, '98395857V', 'Bicicletas'),
(4, 7, '19111062V', 'Ninguno'),
(4, 8, '79094621J', 'Ninguno'),
(4, 10, '99571233R', 'Ninguno'),
(6, 1, '48161199G', 'Material Pesado'),
(6, 2, '80787826G', 'Material Delicado'),
(6, 3, '24796057X', 'Material Delicado'),
(6, 4, '70358730M', 'Material Delicado'),
(6, 5, '51481772K', 'Ninguno'),
(6, 6, '98395857V', 'Ninguno'),
(6, 7, '19111062V', 'Ninguno'),
(6, 9, '79094621J', 'Ninguno'),
(6, 11, '99571233R', 'Ninguno'),
(9, 1, '51481772K', 'Ninguno'),
(9, 2, '87329805R', 'Animales'),
(13, 36, '51481772K', 'Ninguno'),
(13, 44, '80787826G', 'Ninguno'),
(31, 40, '80787826G', 'Ninguno'),
(34, 29, '98395857V', 'Material Delicado'),
(34, 43, '24796057X', 'Ninguno'),
(34, 44, '80787826G', 'Animales'),
(34, 45, '48161199G', 'Ninguno'),
(34, 50, '51481772K', 'Material Pesado'),
(34, 60, '70358730M', 'Material Pesado'),
(35, 5, '48161199G', 'Ninguno'),
(35, 35, '24796057X', 'Ninguno'),
(35, 38, '70358730M', 'Animales'),
(35, 48, '80787826G', 'Animales'),
(35, 53, '98395857V', 'Material Delicado'),
(35, 60, '51481772K', 'Material Pesado'),
(37, 33, '98395857V', 'Ninguno'),
(37, 38, '51481772K', 'Ninguno'),
(37, 43, '24796057X', 'Material Delicado'),
(37, 48, '80787826G', 'Ninguno'),
(37, 56, '48161199G', 'Ninguno'),
(37, 57, '70358730M', 'Ninguno'),
(40, 6, '98395857V', 'Ninguno'),
(40, 8, '80787826G', 'Ninguno'),
(40, 25, '51481772K', 'Ninguno'),
(40, 39, '24796057X', 'Material Delicado'),
(40, 57, '70358730M', 'Ninguno'),
(40, 60, '48161199G', 'Ninguno');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`idConductor`, `idViaje`, `idUsuario`, `valorarConductor`, `valorarViaje`) VALUES
(3, 1, '24796057X', 2, 3),
(3, 1, '48161199G', 0, 1),
(3, 1, '80787826G', 4, 5),
(50001, 6, '24796057X', NULL, 5),
(50001, 6, '48161199G', NULL, 5),
(50001, 6, '70358730M', NULL, 5),
(50001, 6, '80787826G', NULL, 3),
(50001, 6, '98395857V', NULL, 5),
(50004, 4, '24796057X', 3, NULL),
(50004, 4, '48161199G', 4, NULL),
(50004, 4, '70358730M', 5, NULL),
(50004, 4, '80787826G', 2, NULL),
(50004, 4, '98395857V', 5, NULL);

-- --------------------------------------------------------

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
