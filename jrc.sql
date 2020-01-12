-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2020 a las 07:33:31
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jrc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL,
  `id_usuarios` int(10) NOT NULL,
  `id_maquina` int(11) NOT NULL,
  `id_SG` int(11) NOT NULL,
  `id_MD` int(11) NOT NULL,
  `id_SH` int(11) NOT NULL,
  `id_SF` int(11) NOT NULL,
  `id_SE` int(11) NOT NULL,
  `id_ST` int(11) NOT NULL,
  `id_CH` int(11) NOT NULL,
  `id_EN` int(11) NOT NULL,
  `turno` text NOT NULL,
  `fecha` date NOT NULL,
  `mant` text NOT NULL,
  `electricistas` text NOT NULL,
  `checklist` text NOT NULL,
  `trabajos_R` text NOT NULL,
  `pendientes_M` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_mantenimiento`, `id_usuarios`, `id_maquina`, `id_SG`, `id_MD`, `id_SH`, `id_SF`, `id_SE`, `id_ST`, `id_CH`, `id_EN`, `turno`, `fecha`, `mant`, `electricistas`, `checklist`, `trabajos_R`, `pendientes_M`) VALUES
(1, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'noche', '2019-12-07', 'MAN00000001', '', '00000001', '', ''),
(2, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'DIA', '2019-12-09', 'MAN00000002', '', '00000002', '', ''),
(3, 3, 8, 24, 18, 9, 16, 17, 7, 14, 20, 'DIA', '2019-12-08', 'MAN00000003', 'Jonathan', '00000003', 'trabajos de reparacion', 'pendiente de mantenimiento'),
(4, 3, 8, 25, 19, 10, 17, 18, 8, 15, 21, 'DIA', '2019-12-09', 'MAN00000004', '', '00000004', '', ''),
(5, 3, 8, 26, 20, 11, 18, 19, 9, 16, 22, 'NOCHE', '2019-12-09', 'MAN00000005', '', '00000005', '', ''),
(6, 3, 8, 27, 21, 12, 19, 20, 10, 17, 23, 'DIA', '2019-12-15', 'MAN00000006', '', '00000006', '', ''),
(7, 3, 8, 28, 22, 13, 20, 21, 11, 18, 24, 'DIA', '2019-12-15', 'MAN00000007', '', '00000007', '', ''),
(8, 3, 8, 29, 23, 14, 21, 22, 12, 19, 25, 'DIA', '2019-12-15', 'MAN00000008', '', '00000008', '', ''),
(9, 3, 8, 30, 24, 15, 22, 23, 13, 20, 26, 'DIA', '2019-12-15', 'MAN00000009', '', '00000009', '', ''),
(10, 3, 8, 31, 25, 16, 23, 24, 14, 21, 27, 'NOCHE', '2019-12-15', 'MAN00000010', '', '00000010', '', ''),
(11, 3, 8, 32, 26, 17, 24, 25, 15, 22, 28, 'DIA', '2019-12-15', 'MAN00000011', '', '00000011', '', ''),
(12, 3, 8, 33, 27, 18, 25, 26, 16, 23, 29, 'DIA', '2019-12-15', 'MAN00000012', '', '00000012', '', ''),
(13, 3, 1, 34, 28, 19, 26, 27, 17, 24, 30, 'DIA', '2019-12-17', 'MAN00000013', '', '00000013', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `id_maquina` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `horas_acumuladas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`id_maquina`, `nombre`, `horas_acumuladas`) VALUES
(1, '2SC019', 170),
(2, '2SC022', 165),
(3, '2SC026', 0),
(4, '2SC029', 100),
(5, '2SC035', 84),
(6, '2SC037', 70),
(7, '2JL003', 66),
(8, '2JL015', 88),
(9, '2JL016', 76);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `id_reporte` int(11) NOT NULL,
  `inicio_jornada` date NOT NULL,
  `fin_jornada` date NOT NULL,
  `hora_acumulada` text NOT NULL,
  `hora` text NOT NULL,
  `equipo_trabajo` text NOT NULL,
  `descripcion` text NOT NULL,
  `fallas_equipo` int(11) NOT NULL,
  `tiempo_parada` int(11) NOT NULL,
  `homp` int(11) NOT NULL,
  `inspecc` int(11) NOT NULL,
  `mantto_prev` int(11) NOT NULL,
  `horas_calend` int(11) NOT NULL,
  `horas_prog` int(11) NOT NULL,
  `otrosacci` text NOT NULL,
  `repcorrect` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`id_reporte`, `inicio_jornada`, `fin_jornada`, `hora_acumulada`, `hora`, `equipo_trabajo`, `descripcion`, `fallas_equipo`, `tiempo_parada`, `homp`, `inspecc`, `mantto_prev`, `horas_calend`, `horas_prog`, `otrosacci`, `repcorrect`) VALUES
(1, '2019-01-01', '2019-01-01', '0', '5', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 0, 1, 0, 24, 20, '1', '0'),
(2, '2019-01-02', '2019-01-02', '5', '3', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 0, 1, 0, 1, 24, 20, '0', '1'),
(3, '2019-02-03', '2019-02-03', '8', '3', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 0, 2, 0, 2, 24, 20, '0', '0'),
(4, '2019-12-04', '2019-12-04', '11', '10', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 1, 1, 1, 1, 24, 20, '1', '1'),
(5, '2019-12-05', '2019-12-05', '21', '12', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 1, 0, 0, 2, 24, 20, '0', '1'),
(6, '2019-12-06', '2019-12-06', '33', '2', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 0, 0, 1, 24, 20, '0', '1'),
(7, '2019-12-07', '2019-12-07', '35', '2', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 1, 2, 1, 24, 20, '1', '2'),
(8, '2019-12-08', '2019-12-08', '37', '12', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 1, 1, 1, 24, 20, '1', '1'),
(9, '2019-12-09', '2019-12-09', '49', '20', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 3, 1, 4, 2, 24, 20, '1', '1'),
(10, '2019-12-10', '2019-12-10', '69', '3', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 4, 4, 2, 2, 24, 20, '1', '1'),
(11, '2019-12-11', '2019-12-11', '72', '3', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 2, 1, 1, 1, 24, 20, '0', '0'),
(12, '2019-12-12', '2019-12-12', '75', '4', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 1, 0, 1, 24, 20, '0', '0'),
(13, '2019-12-13', '2019-12-13', '79', '5', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 1, 0, 0, 0, 24, 20, '0', '1'),
(14, '2019-12-14', '2019-12-14', '84', '6', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 0, 0, 0, 24, 20, '1', '1'),
(15, '2019-12-15', '2019-12-15', '90', '6', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 1, 1, 1, 1, 24, 20, '1', '1'),
(16, '2019-12-16', '2019-12-16', '96', '3', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 0, 0, 0, 1, 24, 20, '1', '0'),
(17, '2019-12-17', '2019-12-17', '99', '2', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 0, 0, 0, 24, 20, '0', '0'),
(18, '2019-12-17', '2019-12-17', '101', '5', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 0, 1, 0, 0, 24, 20, '0', '0'),
(19, '2019-12-18', '2019-12-18', '106', '3', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 0, 1, 0, 0, 24, 20, '0', '0'),
(20, '2019-12-20', '2019-12-20', '109', '4', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 0, 0, 0, 0, 24, 20, '1', '0'),
(21, '2019-12-21', '2019-12-21', '113', '1', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 0, 0, 1, 0, 24, 20, '0', '0'),
(22, '2019-12-22', '2019-12-22', '114', '6', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 0, 1, 2, 1, 24, 20, '0', '1'),
(23, '2019-12-23', '2019-12-23', '120', '6', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 0, 0, 1, 0, 24, 20, '1', '0'),
(24, '2019-12-24', '2019-12-24', '126', '3', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 0, 1, 0, 1, 24, 20, '1', '1'),
(25, '2019-12-25', '2019-12-25', '129', '3', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 1, 0, 0, 0, 24, 20, '0', '0'),
(26, '2019-12-26', '2019-12-26', '132', '1', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 1, 2, 2, 1, 24, 20, '2', '0'),
(27, '2019-12-27', '2019-12-27', '133', '2', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 1, 5, 2, 3, 24, 20, '1', '0'),
(28, '2019-12-28', '2019-12-28', '135', '2', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 1, 1, 1, 0, 24, 20, '0', '0'),
(29, '2019-12-29', '2019-12-29', '137', '3', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 2, 2, 1, 24, 20, '0', '0'),
(30, '2019-12-30', '2019-12-30', '140', '3', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 4, 2, 1, 1, 24, 20, '2', '0'),
(31, '2019-12-31', '2019-12-31', '143', '1', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 2, 2, 1, 24, 20, '1', '1'),
(32, '2019-01-01', '2019-01-01', '0', '2', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 2, 2, 2, 24, 20, '1', '1'),
(33, '2019-01-02', '2019-01-02', '2', '10', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 1, 1, 1, 2, 24, 20, '3', '2'),
(34, '2019-01-03', '2019-01-03', '12', '5', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 1, 1, 1, 1, 24, 20, '1', '1'),
(35, '2019-01-04', '2019-01-04', '17', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 1, 1, 1, 24, 20, '1', '1'),
(36, '2019-01-05', '2019-01-05', '23', '4', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 5, 0, 5, 1, 24, 20, '1', '1'),
(37, '2019-01-06', '2019-01-06', '27', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 5, 3, 2, 4, 24, 20, '8', '1'),
(38, '2019-01-07', '2019-01-07', '33', '4', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 5, 4, 24, 20, '9', '0'),
(39, '2019-01-08', '2019-01-08', '37', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 5, 4, 8, 24, 20, '3', '1'),
(40, '2019-01-09', '2019-01-09', '43', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 4, 8, 24, 20, '9', '5'),
(41, '2019-01-10', '2019-01-10', '49', '3', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 1, 7, 6, 24, 20, '1', '2'),
(42, '2019-01-11', '2019-01-11', '52', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 6, 4, 24, 20, '1', '2'),
(43, '2019-01-12', '2019-01-12', '58', '4', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 4, 3, 1, 9, 6, 24, 20, '5', '1'),
(44, '2019-01-13', '2019-01-13', '62', '10', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 4, 9, 1, 2, 24, 20, '3', '0'),
(45, '2019-01-14', '2019-01-14', '72', '3', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 4, 4, 24, 20, '4', '3'),
(46, '2019-01-15', '2019-01-15', '75', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 4, 6, 4, 24, 20, '1', '2'),
(47, '2019-01-16', '2019-01-16', '81', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 6, 4, 6, 5, 8, 24, 20, '5', '5'),
(48, '2019-01-17', '2019-01-17', '87', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 6, 4, 3, 5, 24, 20, '2', '2'),
(49, '2019-01-18', '2019-01-18', '93', '4', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 5, 6, 1, 2, 5, 24, 20, '1', '1'),
(50, '2019-01-19', '2019-01-19', '97', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 0, 4, 5, 2, 24, 20, '2', '2'),
(51, '2019-01-20', '2019-01-20', '103', '1', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 2, 2, 2, 3, 24, 20, '6', '6'),
(52, '2019-01-21', '2019-01-21', '104', '4', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 5, 4, 5, 4, 24, 20, '5', '5'),
(53, '2019-01-22', '2019-01-22', '108', '7', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 5, 5, 4, 4, 24, 20, '4', '1'),
(54, '2019-01-23', '2019-01-23', '115', '10', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 1, 1, 1, 5, 24, 20, '2', '3'),
(55, '2019-01-24', '2019-01-24', '125', '3', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 1, 1, 1, 24, 20, '2', '3'),
(56, '2019-01-25', '2019-01-25', '128', '3', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 1, 1, 1, 0, 24, 20, '2', '3'),
(57, '2019-01-26', '2019-01-26', '131', '5', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 2, 2, 2, 24, 20, '2', '1'),
(58, '2019-01-27', '2019-01-27', '136', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 3, 2, 1, 24, 20, '2', '3'),
(59, '2019-01-28', '2019-01-28', '142', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 2, 2, 1, 24, 20, '5', '3'),
(60, '2019-01-29', '2019-01-29', '148', '10', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 2, 1, 1, 1, 24, 20, '1', '2'),
(61, '2019-01-30', '2019-01-30', '158', '6', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 2, 1, 1, 2, 24, 20, '2', '1'),
(62, '2019-01-31', '2019-01-31', '164', '1', '2SC022', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 3, 3, 2, 24, 20, '1', '1'),
(63, '2019-02-01', '2019-02-01', '0', '10', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 2, 1, 1, 24, 20, '1', '2'),
(64, '2019-02-02', '2019-02-02', '10', '3', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 2, 1, 1, 24, 20, '4', '2'),
(65, '2019-02-03', '2019-02-03', '13', '12', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 1, 5, 1, 2, 24, 20, '4', '1'),
(66, '2019-02-04', '2019-02-04', '25', '5', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 1, 1, 2, 24, 20, '2', '3'),
(67, '2019-02-05', '2019-02-05', '30', '3', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 2, 3, 3, 3, 24, 20, '2', '1'),
(68, '2019-02-06', '2020-01-03', '33', '6', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 5, 1, 1, 2, 3, 24, 20, '0', '0'),
(69, '2019-02-07', '2019-02-07', '39', '1', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 1, 1, 1, 0, 24, 20, '0', '0'),
(70, '2019-03-08', '2019-03-08', '40', '2', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 21, 1, 24, 20, '0', '1'),
(71, '2019-04-08', '2019-04-08', '42', '1', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 1, 2, 54, 1, 24, 20, '2', '1'),
(72, '2019-05-08', '2019-05-08', '43', '6', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 3, 56, 1, 3, 24, 20, '1', '0'),
(73, '2019-06-08', '2019-06-08', '49', '20', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 5, 2, 1, 24, 20, '5', '2'),
(74, '2019-07-08', '2019-07-08', '69', '3', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 5, 2, 24, 20, '3', '1'),
(75, '2019-08-08', '2019-08-08', '72', '6', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 5, 1, 24, 20, '23', '6'),
(76, '2019-09-08', '2019-09-08', '78', '5', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 6, 5, 1, 24, 20, '32', '6'),
(77, '2019-10-08', '2019-10-08', '83', '3', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 6, 3, 2, 24, 20, '3', '6'),
(78, '2019-11-08', '2019-11-08', '86', '10', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 6, 3, 5, 24, 20, '2', '6'),
(79, '2019-12-08', '2019-12-08', '96', '1', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 6, 3, 5, 24, 20, '2', '0'),
(80, '2019-12-11', '2019-12-11', '97', '3', '2SC029', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 1, 4, 2, 5, 24, 20, '6', '3'),
(81, '2019-01-11', '2019-01-11', '0', '20', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 1, 2, 2, 3, 24, 20, '6', '3'),
(82, '2019-02-11', '2019-02-11', '20', '3', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 6, 3, 24, 20, '5', '2'),
(83, '2019-03-11', '2019-03-11', '23', '3', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 0, 1, 2, 1, 24, 20, '4', '0'),
(84, '2019-04-11', '2019-04-11', '26', '10', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 2, 3, 3, 6, 24, 20, '3', '0'),
(85, '2019-05-11', '2019-05-11', '36', '5', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 5, 3, 2, 3, 6, 24, 20, '3', '2'),
(86, '2019-06-11', '2019-06-11', '41', '2', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 3, 3, 24, 20, '6', '2'),
(87, '2019-07-11', '2019-07-11', '43', '10', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 32, 3, 6, 3, 24, 20, '3', '3'),
(88, '2019-08-11', '2019-08-11', '53', '2', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 2, 3, 6, 24, 20, '3', '3'),
(89, '2019-09-11', '2019-09-11', '55', '12', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 3, 3, 24, 20, '2', '1'),
(90, '2019-10-11', '2019-10-11', '67', '10', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 23, 3, 3, 3, 24, 20, '2', '1'),
(91, '2019-11-11', '2019-11-11', '77', '2', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 2, 12, 1, 2, 24, 20, '0', '0'),
(92, '2019-12-11', '2019-12-11', '79', '5', '2SC035', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 2, 3, 3, 24, 20, '3', '0'),
(93, '2019-01-10', '2019-01-10', '0', '5', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 6, 3, 24, 20, '2', '5'),
(94, '2019-02-10', '2019-02-10', '5', '3', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 2, 1, 2, 5, 24, 20, '2', '3'),
(95, '2019-03-10', '2019-03-10', '8', '6', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 3, 0, 2, 1, 24, 20, '1', '0'),
(96, '2019-04-10', '2019-04-10', '14', '5', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 6, 3, 2, 24, 20, '2', '0'),
(97, '2019-05-10', '2019-05-10', '19', '6', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 2, 1, 2, 2, 24, 20, '2', '0'),
(98, '2019-06-10', '2019-06-10', '25', '3', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 2, 1, 54, 2, 24, 20, '3', '0'),
(99, '2019-07-10', '2019-07-10', '28', '6', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 23, 3, 6, 3, 24, 20, '3', '0'),
(100, '2019-08-10', '2019-08-10', '34', '3', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 3, 3, 6, 5, 24, 20, '2', '3'),
(101, '2019-09-10', '2019-09-10', '37', '8', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 6, 5, 8, 2, 24, 20, '3', '0'),
(102, '2019-10-10', '2019-10-10', '45', '12', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 5, 2, 3, 6, 24, 20, '3', '3'),
(103, '2019-11-10', '2019-11-10', '57', '3', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 5, 2, 3, 24, 20, '3', '3'),
(104, '2019-12-10', '2019-12-10', '60', '10', '2SC037', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 23, 3, 6, 3, 3, 24, 20, '2', '1'),
(105, '2019-01-08', '2019-01-08', '0', '10', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 5, 2, 3, 24, 20, '6', '2'),
(106, '2019-02-08', '2019-02-08', '10', '2', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 5, 3, 24, 20, '6', '2'),
(107, '2019-03-08', '2019-03-08', '12', '1', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 5, 6, 24, 20, '8', '0'),
(108, '2019-04-08', '2019-04-08', '13', '10', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 2, 2, 1, 24, 20, '1', '0'),
(109, '2019-05-08', '2019-05-08', '23', '10', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 32, 3, 6, 6, 24, 20, '6', '3'),
(110, '2019-06-08', '2019-06-08', '33', '5', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 6, 3, 2, 0, 4, 24, 20, '1', '0'),
(111, '2019-07-08', '2019-07-08', '38', '10', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 3, 6, 5, 2, 24, 20, '3', '0'),
(112, '2019-08-08', '2019-08-08', '48', '3', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 2, 2, 1, 24, 20, '1', '0'),
(113, '2019-09-08', '2019-09-08', '51', '3', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 5, 3, 6, 2, 24, 20, '3', '3'),
(114, '2019-10-08', '2019-10-08', '54', '6', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 6, 3, 24, 20, '3', '3'),
(115, '2019-11-08', '2019-11-08', '60', '3', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 6, 3, 2, 5, 24, 20, '2', '3'),
(116, '2019-12-08', '2019-12-08', '63', '3', '2JL003', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 6, 3, 2, 5, 2, 24, 20, '3', '3'),
(117, '2019-01-22', '2019-01-22', '0', '2', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 2, 1, 5, 2, 24, 20, '3', '3'),
(118, '2019-02-22', '2019-02-22', '2', '3', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 3, 3, 6, 24, 20, '2', '0'),
(119, '2019-03-22', '2019-03-22', '5', '10', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 23, 3, 6, 3, 24, 20, '2', '1'),
(120, '2019-04-22', '2019-04-22', '15', '22', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 6, 3, 24, 20, '2', '2'),
(121, '2019-05-22', '2019-05-22', '37', '10', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 6, 3, 24, 20, '3', '0'),
(122, '2019-06-22', '2019-06-22', '47', '10', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 3, 6, 3, 0, 24, 20, '2', '0'),
(123, '2019-07-22', '2019-07-22', '57', '2', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 3, 3, 3, 24, 20, '0', '1'),
(124, '2019-08-22', '2019-08-22', '59', '6', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 3, 3, 2, 24, 20, '1', '0'),
(125, '2019-09-22', '2019-09-22', '65', '11', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 6, 3, 1, 24, 20, '1', '1'),
(126, '2019-10-22', '2019-10-22', '76', '3', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 5, 6, 3, 24, 20, '3', '1'),
(127, '2019-11-22', '2019-11-22', '79', '4', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 5, 6, 3, 6, 3, 24, 20, '2', '5'),
(128, '2019-12-22', '2019-12-22', '83', '5', '2JL015', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 6, 3, 3, 3, 2, 24, 20, '2', '1'),
(129, '2019-01-14', '2019-01-14', '0', '9', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 6, 9, 6, 69, 6, 24, 20, '5', '1'),
(130, '2019-02-14', '2019-02-14', '9', '4', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 3, 6, 3, 24, 20, '3', '2'),
(131, '2019-03-14', '2019-03-14', '13', '5', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 3, 6, 3, 24, 20, '2', '5'),
(132, '2019-04-14', '2019-04-14', '18', '5', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 6, 3, 6, 3, 6, 24, 20, '3', '2'),
(133, '2019-05-14', '2019-05-14', '23', '6', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 6, 3, 6, 3, 2, 24, 20, '1', '0'),
(134, '2019-06-14', '2019-06-14', '29', '6', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 6, 3, 2, 5, 21, 24, 20, '1', '3'),
(135, '2019-07-14', '2019-07-14', '35', '6', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 3, 6, 3, 24, 20, '2', '5'),
(136, '2019-08-14', '2019-08-14', '41', '6', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 3, 2, 1, 24, 20, '4', '5'),
(137, '2019-09-14', '2019-09-14', '47', '10', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 2, 3, 6, 3, 6, 24, 20, '3', '2'),
(138, '2019-10-14', '2019-10-14', '57', '6', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 3, 6, 3, 6, 3, 24, 20, '2', '5'),
(139, '2019-11-14', '2019-11-14', '63', '7', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 5, 2, 6, 3, 24, 20, '5', '4'),
(140, '2019-12-14', '2019-12-14', '70', '6', '2JL016', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 6, 3, 6, 3, 6, 24, 20, '9', '5'),
(141, '2020-01-02', '2020-01-03', '144', '5', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 0, 2, 1, 24, 20, '1', '2'),
(142, '2020-02-03', '2020-02-03', '149', '11', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 1, 2, 3, 3, 2, 24, 20, '1', '2'),
(143, '2021-01-04', '2021-01-04', '160', '10', '2SC019', 'G/D y G/N: Equipo operativo trabajó normal. SE REQUIEREN LOS FILTROS PARA SUS MANTENIMIENTOS PREVENTIVOS.', 0, 0, 0, 0, 0, 24, 20, '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requerimientos`
--

CREATE TABLE `requerimientos` (
  `id_requerimiento` int(11) NOT NULL,
  `mecanico` text NOT NULL,
  `descripcion` text NOT NULL,
  `otros` text NOT NULL,
  `cantidad` text NOT NULL,
  `fecha` date NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `requerimientos`
--

INSERT INTO `requerimientos` (`id_requerimiento`, `mecanico`, `descripcion`, `otros`, `cantidad`, `fecha`, `estado`) VALUES
(1, 'Carlos', 'ACEITE DE MOTOR', 'solicito aceite shell sintetico', '3 botellas de 1/4', '2020-01-11', 'activo'),
(2, 'Carlos', 'ACEITE PARA DIFERENCIAL', 'solicito aceite shell sintetico', '3 botellas de 1/4', '2020-01-11', 'activo'),
(3, 'Carlos', 'ACEITE HIDRAULICO', 'solicito aceite shell sintetico', '3 botellas de 1/4', '2020-01-11', 'activo'),
(4, 'Carlos', 'ACEITE DE MOTOR', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto', '3 botellas de 1/4', '2020-01-11', 'activo'),
(5, 'Roberto', 'FILTRO SEPARADOR DE AGUA EN EL COMBUSTIBLE', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto', '5 unidades', '2020-01-11', 'activo'),
(6, 'Roberto', 'FILTRO DE TRANSMISION', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto', '3 botellas de 1/4', '2020-01-11', 'activo'),
(7, 'Luis', 'FILTROS DE COMBUSTIBLE', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto', 'solo 1', '2020-01-11', 'activo'),
(8, 'Luis', 'ACEITE MANDOS FINALES', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto', '3 botellas de 1/4', '2020-01-11', 'activo'),
(9, 'Luis', 'FILTRO ADMISION PRIMARIO', 'solicito aceite shell sintetico', '3 botellas de 1/4', '2020-01-11', 'activo'),
(10, 'Luis', 'FILTRO DE TRANSMISION', 'solicito aceite shell sintetico', '3 botellas de 1/4', '2020-01-11', 'activo'),
(11, 'Jose', 'ACEITE DE MOTOR', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto', '2020-01-11', 'activo'),
(12, 'Jose', 'ACEITE HIDRAULICO', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto', '2020-01-11', 'activo'),
(13, 'Jose', 'TRAPOS', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto', 'una docena', '2020-01-11', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(10) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'mecanico'),
(2, 'administrador'),
(3, 'super administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablech`
--

CREATE TABLE `tablech` (
  `id_CH` int(11) NOT NULL,
  `PCH_1` int(2) NOT NULL,
  `PCH_2` int(2) NOT NULL,
  `PCH_3` int(2) NOT NULL,
  `PCH_4` int(2) NOT NULL,
  `PCH_5` int(2) NOT NULL,
  `PCH_6` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablech`
--

INSERT INTO `tablech` (`id_CH`, `PCH_1`, `PCH_2`, `PCH_3`, `PCH_4`, `PCH_5`, `PCH_6`) VALUES
(1, 0, 1, 0, 1, 0, 0),
(2, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 1),
(22, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tableen`
--

CREATE TABLE `tableen` (
  `id_EN` int(11) NOT NULL,
  `PEN_1` int(2) NOT NULL,
  `PEN_2` int(2) NOT NULL,
  `PEN_3` int(2) NOT NULL,
  `PEN_4` int(2) NOT NULL,
  `PEN_5` int(2) NOT NULL,
  `PEN_6` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tableen`
--

INSERT INTO `tableen` (`id_EN`, `PEN_1`, `PEN_2`, `PEN_3`, `PEN_4`, `PEN_5`, `PEN_6`) VALUES
(1, 1, 1, 0, 0, 1, 0),
(2, 1, 0, 0, 0, 0, 0),
(3, 1, 0, 0, 0, 0, 0),
(4, 1, 0, 0, 0, 0, 1),
(5, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0),
(28, 0, 1, 1, 1, 1, 1),
(29, 1, 1, 1, 1, 1, 1),
(30, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablemd`
--

CREATE TABLE `tablemd` (
  `id_MD` int(11) NOT NULL,
  `PMD_1` int(2) NOT NULL,
  `PMD_2` int(2) NOT NULL,
  `PMD_3` int(2) NOT NULL,
  `PMD_4` int(2) NOT NULL,
  `PMD_5` int(2) NOT NULL,
  `PMD_6` int(2) NOT NULL,
  `PMD_7` int(2) NOT NULL,
  `PMD_8` int(2) NOT NULL,
  `PMD_9` int(2) NOT NULL,
  `PMD_10` int(2) NOT NULL,
  `PMD_11` int(2) NOT NULL,
  `PMD_12` int(2) NOT NULL,
  `PMD_13` int(2) NOT NULL,
  `PMD_14` int(2) NOT NULL,
  `PMD_15` int(2) NOT NULL,
  `PMD_16` int(2) NOT NULL,
  `PMD_17` int(2) NOT NULL,
  `PMD_18` int(2) NOT NULL,
  `PMD_19` int(2) NOT NULL,
  `PMD_20` int(2) NOT NULL,
  `PMD_21` int(2) NOT NULL,
  `PMD_22` int(2) NOT NULL,
  `PMD_23` int(2) NOT NULL,
  `PMD_24` int(2) NOT NULL,
  `PMD_25` int(2) NOT NULL,
  `PMD_26` int(2) NOT NULL,
  `PMD_27` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablemd`
--

INSERT INTO `tablemd` (`id_MD`, `PMD_1`, `PMD_2`, `PMD_3`, `PMD_4`, `PMD_5`, `PMD_6`, `PMD_7`, `PMD_8`, `PMD_9`, `PMD_10`, `PMD_11`, `PMD_12`, `PMD_13`, `PMD_14`, `PMD_15`, `PMD_16`, `PMD_17`, `PMD_18`, `PMD_19`, `PMD_20`, `PMD_21`, `PMD_22`, `PMD_23`, `PMD_24`, `PMD_25`, `PMD_26`, `PMD_27`) VALUES
(1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablese`
--

CREATE TABLE `tablese` (
  `id_SE` int(11) NOT NULL,
  `PSE_1` int(2) NOT NULL,
  `PSE_2` int(2) NOT NULL,
  `PSE_3` int(2) NOT NULL,
  `PSE_4` int(2) NOT NULL,
  `PSE_5` int(2) NOT NULL,
  `PSE_6` int(2) NOT NULL,
  `PSE_7` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablese`
--

INSERT INTO `tablese` (`id_SE`, `PSE_1`, `PSE_2`, `PSE_3`, `PSE_4`, `PSE_5`, `PSE_6`, `PSE_7`) VALUES
(1, 1, 0, 1, 0, 1, 0, 1),
(2, 1, 1, 1, 1, 1, 1, 1),
(3, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablesf`
--

CREATE TABLE `tablesf` (
  `id_SF` int(11) NOT NULL,
  `PSF_1` int(2) NOT NULL,
  `PSF_2` int(2) NOT NULL,
  `PSF_3` int(2) NOT NULL,
  `PSF_4` int(2) NOT NULL,
  `PSF_5` int(2) NOT NULL,
  `PSF_6` int(2) NOT NULL,
  `PSF_7` int(2) NOT NULL,
  `PSF_8` int(2) NOT NULL,
  `PSF_9` int(2) NOT NULL,
  `PSF_10` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablesf`
--

INSERT INTO `tablesf` (`id_SF`, `PSF_1`, `PSF_2`, `PSF_3`, `PSF_4`, `PSF_5`, `PSF_6`, `PSF_7`, `PSF_8`, `PSF_9`, `PSF_10`) VALUES
(1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1),
(2, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablesg`
--

CREATE TABLE `tablesg` (
  `id_SG` int(11) NOT NULL,
  `PSG_1` int(11) NOT NULL,
  `PSG_2` int(2) NOT NULL,
  `PSG_3` int(2) NOT NULL,
  `PSG_4` int(2) NOT NULL,
  `PSG_5` int(2) NOT NULL,
  `PSG_6` int(2) NOT NULL,
  `PSG_7` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablesg`
--

INSERT INTO `tablesg` (`id_SG`, `PSG_1`, `PSG_2`, `PSG_3`, `PSG_4`, `PSG_5`, `PSG_6`, `PSG_7`) VALUES
(1, 0, 1, 0, 1, 0, 1, 0),
(2, 1, 1, 1, 1, 1, 1, 1),
(3, 1, 0, 0, 0, 0, 0, 0),
(4, 0, 1, 0, 0, 0, 0, 0),
(5, 0, 1, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0),
(7, 1, 1, 1, 1, 1, 1, 1),
(8, 1, 0, 0, 0, 0, 0, 1),
(9, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0),
(29, 0, 0, 0, 0, 0, 0, 0),
(30, 0, 0, 0, 0, 0, 0, 0),
(31, 0, 0, 0, 0, 0, 0, 0),
(32, 0, 0, 0, 0, 0, 0, 0),
(33, 0, 0, 0, 0, 0, 0, 0),
(34, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablesh`
--

CREATE TABLE `tablesh` (
  `id_SH` int(11) NOT NULL,
  `PSH_1` int(2) NOT NULL,
  `PSH_2` int(2) NOT NULL,
  `PSH_3` int(2) NOT NULL,
  `PSH_4` int(2) NOT NULL,
  `PSH_5` int(2) NOT NULL,
  `PSH_6` int(2) NOT NULL,
  `PSH_7` int(2) NOT NULL,
  `PSH_8` int(2) NOT NULL,
  `PSH_9` int(2) NOT NULL,
  `PSH_10` int(2) NOT NULL,
  `PSH_11` int(2) NOT NULL,
  `PSH_12` int(2) NOT NULL,
  `PSH_13` int(2) NOT NULL,
  `PSH_14` int(2) NOT NULL,
  `PSH_15` int(2) NOT NULL,
  `PSH_16` int(2) NOT NULL,
  `PSH_17` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablesh`
--

INSERT INTO `tablesh` (`id_SH`, `PSH_1`, `PSH_2`, `PSH_3`, `PSH_4`, `PSH_5`, `PSH_6`, `PSH_7`, `PSH_8`, `PSH_9`, `PSH_10`, `PSH_11`, `PSH_12`, `PSH_13`, `PSH_14`, `PSH_15`, `PSH_16`, `PSH_17`) VALUES
(1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablest`
--

CREATE TABLE `tablest` (
  `id_ST` int(11) NOT NULL,
  `PST_1` int(2) NOT NULL,
  `PST_2` int(2) NOT NULL,
  `PST_3` int(2) NOT NULL,
  `PST_4` int(2) NOT NULL,
  `PST_5` int(2) NOT NULL,
  `PST_6` int(2) NOT NULL,
  `PST_7` int(2) NOT NULL,
  `PST_8` int(2) NOT NULL,
  `PST_9` int(2) NOT NULL,
  `PST_10` int(2) NOT NULL,
  `PST_11` int(2) NOT NULL,
  `PST_12` int(2) NOT NULL,
  `PST_13` int(2) NOT NULL,
  `PST_14` int(2) NOT NULL,
  `PST_15` int(2) NOT NULL,
  `PST_16` int(2) NOT NULL,
  `PST_17` int(2) NOT NULL,
  `PST_18` int(2) NOT NULL,
  `PST_19` int(2) NOT NULL,
  `PST_20` int(2) NOT NULL,
  `PST_21` int(2) NOT NULL,
  `PST_22` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablest`
--

INSERT INTO `tablest` (`id_ST`, `PST_1`, `PST_2`, `PST_3`, `PST_4`, `PST_5`, `PST_6`, `PST_7`, `PST_8`, `PST_9`, `PST_10`, `PST_11`, `PST_12`, `PST_13`, `PST_14`, `PST_15`, `PST_16`, `PST_17`, `PST_18`, `PST_19`, `PST_20`, `PST_21`, `PST_22`) VALUES
(1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(10) NOT NULL,
  `nombres` text NOT NULL,
  `dni` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `rol` int(10) NOT NULL,
  `id_maquina` int(11) NOT NULL,
  `desde` date DEFAULT NULL,
  `hasta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombres`, `dni`, `usuario`, `password`, `rol`, `id_maquina`, `desde`, `hasta`) VALUES
(1, 'Superadmin', '47793117', 'superadmin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 3, 1, '2020-01-01', '2020-01-01'),
(2, 'Admin', '47793118', 'admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, 1, '2020-01-01', '2020-01-01'),
(3, 'Carlos', '47793119', 'mecanico', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 1, '2020-01-01', '2020-01-01'),
(7, 'Roberto', '47793120', 'mecanico2', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 2, '2020-01-01', '2020-01-01'),
(8, 'Luis', '47793121', 'mecanico3', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 3, '2020-01-01', '2020-01-01'),
(9, 'Jose', '47793122', 'mecanico4', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 4, '2020-01-01', '2020-01-01'),
(10, 'Pedro', '47793123', 'mecanico5', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 5, '2020-01-01', '2020-01-01'),
(11, 'Alfonso', '47793124', 'mecanico6', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 6, '2020-01-01', '2020-01-01'),
(12, 'Cristian', '47793125', 'mecanico7', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 7, '2020-01-01', '2020-01-01'),
(13, 'Jorge', '47793126', 'mecanico8', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 8, '2020-01-01', '2020-01-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `id_SG` (`id_SG`),
  ADD KEY `id_MD` (`id_MD`),
  ADD KEY `id_SH` (`id_SH`),
  ADD KEY `id_SF` (`id_SF`),
  ADD KEY `id_SG_2` (`id_SG`,`id_MD`,`id_SH`,`id_SF`,`id_SE`,`id_ST`,`id_CH`,`id_EN`),
  ADD KEY `id_ST` (`id_ST`),
  ADD KEY `id_CH` (`id_CH`),
  ADD KEY `id_EN` (`id_EN`),
  ADD KEY `id_SE` (`id_SE`),
  ADD KEY `id_maquina` (`id_maquina`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id_maquina`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `requerimientos`
--
ALTER TABLE `requerimientos`
  ADD PRIMARY KEY (`id_requerimiento`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tablech`
--
ALTER TABLE `tablech`
  ADD PRIMARY KEY (`id_CH`);

--
-- Indices de la tabla `tableen`
--
ALTER TABLE `tableen`
  ADD PRIMARY KEY (`id_EN`);

--
-- Indices de la tabla `tablemd`
--
ALTER TABLE `tablemd`
  ADD PRIMARY KEY (`id_MD`);

--
-- Indices de la tabla `tablese`
--
ALTER TABLE `tablese`
  ADD PRIMARY KEY (`id_SE`);

--
-- Indices de la tabla `tablesf`
--
ALTER TABLE `tablesf`
  ADD PRIMARY KEY (`id_SF`);

--
-- Indices de la tabla `tablesg`
--
ALTER TABLE `tablesg`
  ADD PRIMARY KEY (`id_SG`);

--
-- Indices de la tabla `tablesh`
--
ALTER TABLE `tablesh`
  ADD PRIMARY KEY (`id_SH`);

--
-- Indices de la tabla `tablest`
--
ALTER TABLE `tablest`
  ADD PRIMARY KEY (`id_ST`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `rol` (`rol`),
  ADD KEY `rol_2` (`rol`),
  ADD KEY `id_maquina` (`id_maquina`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id_maquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `requerimientos`
--
ALTER TABLE `requerimientos`
  MODIFY `id_requerimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tablech`
--
ALTER TABLE `tablech`
  MODIFY `id_CH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tableen`
--
ALTER TABLE `tableen`
  MODIFY `id_EN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tablemd`
--
ALTER TABLE `tablemd`
  MODIFY `id_MD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tablese`
--
ALTER TABLE `tablese`
  MODIFY `id_SE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tablesf`
--
ALTER TABLE `tablesf`
  MODIFY `id_SF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tablesg`
--
ALTER TABLE `tablesg`
  MODIFY `id_SG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tablesh`
--
ALTER TABLE `tablesh`
  MODIFY `id_SH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tablest`
--
ALTER TABLE `tablest`
  MODIFY `id_ST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`id_ST`) REFERENCES `tablest` (`id_ST`),
  ADD CONSTRAINT `mantenimiento_ibfk_10` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`),
  ADD CONSTRAINT `mantenimiento_ibfk_11` FOREIGN KEY (`id_maquina`) REFERENCES `maquinas` (`id_maquina`),
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`id_CH`) REFERENCES `tablech` (`id_CH`),
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`id_SF`) REFERENCES `tablesf` (`id_SF`),
  ADD CONSTRAINT `mantenimiento_ibfk_4` FOREIGN KEY (`id_MD`) REFERENCES `tablemd` (`id_MD`),
  ADD CONSTRAINT `mantenimiento_ibfk_5` FOREIGN KEY (`id_SG`) REFERENCES `tablesg` (`id_SG`),
  ADD CONSTRAINT `mantenimiento_ibfk_6` FOREIGN KEY (`id_EN`) REFERENCES `tableen` (`id_EN`),
  ADD CONSTRAINT `mantenimiento_ibfk_7` FOREIGN KEY (`id_SE`) REFERENCES `tablese` (`id_SE`),
  ADD CONSTRAINT `mantenimiento_ibfk_8` FOREIGN KEY (`id_SH`) REFERENCES `tablesh` (`id_SH`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_maquina`) REFERENCES `maquinas` (`id_maquina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
