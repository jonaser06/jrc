-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2019 a las 06:23:08
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
(1, '2SC019', 63),
(2, '2SC022', 30),
(3, '2SC029', 45),
(4, '2SC035', 70),
(5, '2SC037', 65),
(6, '2JL003', 55),
(7, '2JL015', 30),
(8, '2JL016', 16);

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
  `fallas_equipo` text NOT NULL,
  `tiempo_parada` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`id_reporte`, `inicio_jornada`, `fin_jornada`, `hora_acumulada`, `hora`, `equipo_trabajo`, `descripcion`, `fallas_equipo`, `tiempo_parada`) VALUES
(1, '2019-12-17', '2019-12-17', '107', '5', '2SC019', 'descripcion', 'fallas', 'tiempo'),
(2, '2019-12-17', '2019-12-17', '112', '5', '2SC019', 'descripcion', 'fallas', 'tiempo'),
(3, '2019-12-17', '2019-12-17', '50', '5', '2SC019', 'descripcion', 'fallas', 'tiempo'),
(4, '2019-12-17', '2019-12-17', '55', '5', '2SC019', 'descripcion', 'fallas', 'tiempo'),
(5, '2019-12-17', '2019-12-18', '60', '1', '2SC019', 'descripcion', 'fallas', 'tiempo'),
(6, '2019-12-17', '2019-12-17', '61', '1', '2SC019', 'descripcion', 'fallas', 'tiempo'),
(7, '2019-12-17', '2019-12-17', '62', '1', '2SC019', 'descripcion', 'fallas', 'tiempo');

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
  `id_maquina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombres`, `dni`, `usuario`, `password`, `rol`, `id_maquina`) VALUES
(1, 'test superadmin', '47793117', 'superadmin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 3, 1),
(2, 'test admin', '47793118', 'admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, 1),
(3, 'test mecanico', '47793119', 'mecanico', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 1);

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
  MODIFY `id_maquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_usuarios` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
