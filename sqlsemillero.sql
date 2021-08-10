-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-08-2021 a las 15:07:26
-- Versión del servidor: 10.3.27-MariaDB-cll-lve
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `semillero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `proyectos_id` int(11) NOT NULL,
  `ano` varchar(45) DEFAULT NULL,
  `semestre` int(3) DEFAULT 0,
  `fecha_reg` timestamp NULL DEFAULT NULL,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `cumplimiento` double DEFAULT 0,
  `puntos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `descripcion`, `proyectos_id`, `ano`, `semestre`, `fecha_reg`, `fecha_ini`, `fecha_fin`, `cumplimiento`, `puntos`) VALUES
(34, 'Introduccion a semilleros', 32, '', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(35, 'INTRODUCCION A SEMILLEROS', 32, '', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(90, 'qqqq', 35, '2', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(91, 'Desarrollo de Pagina', 38, '3', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(92, 'Desarrollo de Pagina', 38, '4', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(93, 'Desarrollo de Pagina 2', 38, '5', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(94, 'Desarrollo de Pagina 2', 38, '8', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(97, 'Desarrollo de Pagina 2', 38, '10', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(101, 'asd', 38, '8', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(102, 'asdasdad', 38, '8', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(105, 'asdasdsda', 38, '15', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(106, 'asdasdasd', 35, '16', 0, NULL, '0000-00-00', '0000-00-00', 0, 0),
(112, 'sadfsdf', 35, '21', 35, NULL, '0000-00-00', '0000-00-00', 0, 0),
(114, 'asdasdasd son miasdd', 38, '28', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(115, 'asdasdasd', 35, '8', 1, NULL, '0000-00-00', '0000-00-00', 0, 0),
(117, 'aSasaS. adsdasd', 35, '30', 35, NULL, '0000-00-00', '0000-00-00', 0, 0),
(118, 'aSasaS. adsdasd plan', 35, '30', 35, NULL, '0000-00-00', '0000-00-00', 0, 0),
(119, 'aSasaS. adsdasd plan', 35, '30', 35, NULL, '0000-00-00', '0000-00-00', 0, 0),
(120, 'aSasaS. adsdasd plan 30', 35, '30', 35, NULL, '0000-00-00', '0000-00-00', 0, 0),
(121, 'ssdfsfd 31', 35, '31', 35, NULL, '0000-00-00', '0000-00-00', 0, 0),
(122, 'asdasd', 38, '32', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(123, 'asdasdqwe', 35, '32', 35, NULL, '0000-00-00', '0000-00-00', 0, 0),
(124, 'ASasa', 35, '8', 1, NULL, '0000-00-00', '0000-00-00', 0, 0),
(125, 'asdasdad', 35, '34', 35, NULL, '0000-00-00', '0000-00-00', 0, 0),
(126, 'wer', 35, '35', 35, NULL, '0000-00-00', '0000-00-00', 0, 0),
(127, 'wer444', 38, '35', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(128, 'wer444', 38, '35', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(129, 'sdfsdfsdf', 38, '36', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(130, 'asdasdasd', 38, '44', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(131, 'sdfsdf', 35, '46', 35, NULL, '0000-00-00', '0000-00-00', 0, 0),
(135, 'wqee', 35, '46', 2, NULL, '0000-00-00', '0000-00-00', 0, 0),
(136, 'qw', 38, '46', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(137, 'qw', 38, '46', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(138, 'qwtt', 38, '46', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(140, 'z', 38, '46', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(141, '435345345', 38, '47', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(143, 'asdasd', 38, '48', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(144, 'adsasd', 38, '8', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(145, 'Desarrollo de Pagina 2', 38, '8', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(146, 'Desarrollo de Pagina', 38, '8', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(147, 'Desarrollo de Pagina 2', 38, '8', 38, NULL, '0000-00-00', '0000-00-00', 0, 0),
(148, 'Desarrollo de Pagina 2', 35, '8', 35, NULL, '2021-07-26', '2021-07-26', 66, 67),
(149, 'Desarrollo de Pagina 2', 5, '52', 5, NULL, '0000-00-00', '0000-00-00', 0, 0),
(150, 'adsasd', 35, '54', 2, NULL, NULL, NULL, 0, 0),
(151, 'adsasd', 35, '54', 2, NULL, NULL, NULL, 0, 0),
(152, 'asasdas', 67, '56', 67, NULL, NULL, NULL, 0, 0),
(153, 'asasdasfffff', 5, '56', 5, NULL, NULL, NULL, 0, 0),
(154, 'gjgjghjg', 67, '52', 67, NULL, '2021-07-22', '2021-07-14', 20, 20),
(155, 'aawe', 71, '52', 71, NULL, '2021-07-28', '2021-07-28', 20, 30),
(156, 'sadadasd', 71, '52', 71, NULL, NULL, NULL, 0, 0),
(157, 'sdfsfs', 71, '57', 71, NULL, NULL, NULL, 0, 0),
(158, 'sdfsfs', 71, '57', 71, NULL, NULL, NULL, 0, 0),
(160, 'Desarrollo de Pagina 4', 71, '58', 71, NULL, NULL, NULL, 0, 0),
(161, 'Desarrollo de ', 5, '58', 5, NULL, '2021-07-30', '2021-07-23', 45, 20),
(162, 'tryryryrytr', 5, '57', 5, NULL, NULL, NULL, 0, 0),
(163, 'tryryryrytrtyry', 5, '57', 5, NULL, NULL, NULL, 0, 0),
(164, 'fsfsdfsdfsfsd', 75, '57', 75, NULL, NULL, NULL, 0, 0),
(165, 'fsfsdfsdfsfsd', 75, '57', 75, NULL, NULL, NULL, 0, 0),
(168, 'anibal', 94, '59', 1, NULL, '2021-08-04', '2021-08-05', 0, 0),
(169, 'Analizar los datos existentes nueva', 94, '59', 1, NULL, '2021-07-30', '2021-07-29', 0, 0),
(170, 'aaaa', 99, '61', 99, NULL, '2021-08-12', '2021-08-12', 0, 0),
(172, 'ddd', 35, '63', 35, NULL, '2021-08-06', '2021-08-14', 0, 0),
(173, 'asasa', 38, '64', 38, NULL, '2021-08-10', '2021-08-13', 0, 0),
(174, 'Analizar los datos existentesm', 94, '59', 1, NULL, '2021-07-30', '2021-07-29', 0, 0),
(175, 'anibal 2', 94, '59', 1, NULL, '2021-08-04', '2021-08-05', 0, 0),
(176, 'unasasasa', 94, '59', 1, NULL, '2021-08-12', '2021-08-05', 0, 0),
(177, 'dos', 94, '59', 1, NULL, '2021-08-11', '2021-08-09', 0, 0),
(178, 'qqq', 94, '59', 1, NULL, '2021-08-04', '2021-08-05', 0, 0),
(179, 'mmmmm', 94, '59', 1, NULL, '2021-08-11', '2021-08-09', 0, 0),
(180, 'v', 94, '59', 1, NULL, '2021-08-20', '2021-08-21', 0, 0),
(181, 'a', 94, '59', 1, NULL, '2021-08-08', '2021-08-18', 0, 0),
(182, 'análisis de la informacion', 122, '60', 122, NULL, '2021-08-04', '2021-08-05', 60, 100),
(184, 'Actividad 2', 38, '60', 38, NULL, '2021-08-11', '2021-08-10', 0, 0),
(185, 'Limpieza', 36, '60', 36, NULL, '2021-08-09', '2021-08-11', 0, 0),
(193, '56', 36, '60', 36, NULL, '2021-08-26', '2021-08-10', 0, 0),
(194, '56', 36, '60', 36, NULL, '2021-08-26', '2021-08-10', 0, 0),
(197, 'e', 38, '68', 38, NULL, '2021-08-09', '2021-08-11', 0, 0),
(198, 'capacitacion para el desarrollo', 99, '60', 99, NULL, '2021-08-09', '2021-08-10', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_jovenes`
--

CREATE TABLE `actividades_jovenes` (
  `id` int(11) NOT NULL,
  `actividades_desarrolladas` varchar(45) NOT NULL,
  `productos_alcanzados` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `id_informe_gestion_jovenes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades_jovenes`
--

INSERT INTO `actividades_jovenes` (`id`, `actividades_desarrolladas`, `productos_alcanzados`, `semestre`, `id_informe_gestion_jovenes`) VALUES
(8, '321', '321', '2021-1', 1),
(9, 'Actividad de prueba 1', 'Producto de Prueba 1', '2022-1', 2),
(10, 'ACTIVIDAD 1', 'PRODUCTO 1', '2022-2', 3),
(11, 'ACTIVIDAD 2', 'PRODUCTO 2', '2022-2', 3),
(12, 'Realización Cronograma', 'Cronograma de actividades', '2021-1', 4),
(13, 'Realización del charter', 'Charter ', '2021-1', 4),
(14, 'Desarrollo Mockups', 'Vistas funcionales', '2021-1', 4),
(15, 'Desarrollo del software solicitado', 'Software ', '2021-1', 4),
(16, 'Cronograma', 'Cronograma', '2021-1', 5),
(17, 'Charter', 'Charter', '2021-1', 5),
(18, 'Actividad prueba 1', 'Producto 1', '2021-1', 6),
(19, 'Actividad prueba 2', 'Producto 2', '2021-1', 6),
(20, 'Actividad prueba 3', 'Producto 3', '2021-1', 6),
(21, 'Actividad prueba 4', 'Producto 4', '2021-1', 6),
(22, 'Actividad prueba 5', 'Producto 5', '2021-1', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `descripcion`) VALUES
(1, 'Ciencias naturales'),
(2, 'Ingeniería, Tecnología'),
(3, 'Ciencias médicas Ciencias de la salud'),
(4, 'Ciencias agrícolas'),
(5, 'Ciencias sociales'),
(6, 'Humanidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_eventos`
--

CREATE TABLE `asistencia_eventos` (
  `id` int(11) NOT NULL,
  `id_semillero` int(11) NOT NULL,
  `id_eventos` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencia_eventos`
--

INSERT INTO `asistencia_eventos` (`id`, `id_semillero`, `id_eventos`, `fecha`) VALUES
(153, 4, 5, '2021-08-09 02:29:54'),
(165, 36, 4, '2021-08-09 08:03:10'),
(166, 33, 3, '2021-08-09 15:11:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciones`
--

CREATE TABLE `capacitaciones` (
  `id` int(11) NOT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `docente` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cant_capacitados` varchar(45) DEFAULT NULL,
  `semillero_id` int(11) NOT NULL,
  `objetivo` varchar(255) DEFAULT NULL,
  `plan_accion_id` int(11) DEFAULT NULL,
  `fecha_reg` timestamp NULL DEFAULT current_timestamp(),
  `linea_id` int(11) DEFAULT NULL,
  `proy_id` int(11) DEFAULT NULL,
  `semestre` int(11) NOT NULL DEFAULT 0 COMMENT '1 primer 2 segundo',
  `cumplimiento` double NOT NULL DEFAULT 0,
  `puntos` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `capacitaciones`
--

INSERT INTO `capacitaciones` (`id`, `tema`, `docente`, `fecha`, `cant_capacitados`, `semillero_id`, `objetivo`, `plan_accion_id`, `fecha_reg`, `linea_id`, `proy_id`, `semestre`, `cumplimiento`, `puntos`) VALUES
(27, 'Gestión de Activos – Certificación  IAM  ', 'Ricardo Montaner', '2021-06-03', '50', 4, 'No Aplica', 0, '2021-06-15 00:06:38', 0, 0, 0, 0, 0),
(33, 'Derechos de autor en el ámbito universitario', 'LEIDY KARINA SANCHEZ VILLAMIZAR', '2021-06-24', '50', 4, 'No Aplica', 0, '2021-06-15 15:48:10', 0, 0, 0, 0, 0),
(38, 'Cómo superar una Auditoría con éxito', 'Meibi Lorena Camargo', '2021-06-12', '20', 4, 'No Aplica', 0, '2021-06-16 14:07:33', 0, 0, 0, 0, 0),
(60, 'qqqq', 'qqqq', '2021-07-15', '1111', 4, 'qqqq', 2, '2021-07-16 04:16:17', 39, 35, 0, 0, 0),
(61, '234', '234', '2021-07-15', '234', 4, '234', 3, '2021-07-16 04:28:27', 39, 38, 0, 0, 0),
(62, 'sdfsdf', 'sdfdsf', '2021-07-23', '', 4, 'sdfdsf', 5, '2021-07-16 05:01:37', 39, 38, 0, 0, 0),
(63, 'sdf', 'sdf', '2021-07-16', '23', 4, 'sdf', 8, '2021-07-16 05:26:33', 39, 38, 0, 0, 0),
(65, 'sdf3333', 'sdf333', '2021-07-16', '23334', 4, 'sdf333', 8, '2021-07-16 05:32:26', 39, 35, 0, 0, 0),
(67, 'fasfghfghfgh', 'fghfghf', '2021-07-16', '3454', 4, 'ghfghfgh', 10, '2021-07-16 07:10:57', 39, 38, 0, 0, 0),
(68, 'werwerw', 'werwer', '2021-07-16', '234234', 4, 'wrewrerwer', 13, '2021-07-17 20:32:07', 39, 38, 0, 0, 0),
(71, 'ewrew', 'werwr', '2021-07-18', '2342', 4, 'werwer', 15, '2021-07-18 06:17:02', 39, 38, 0, 0, 0),
(72, 'ewrew', 'werwr', '2021-07-18', '2342', 4, 'werwersdfsd', 15, '2021-07-18 06:25:17', 39, 35, 0, 0, 0),
(73, 'werwer', '345354', '2021-07-18', '45435', 4, '4545', 15, '2021-07-18 06:25:31', 39, 35, 0, 0, 0),
(74, 'asad', 'asdasd', '2021-07-18', '324234', 4, 'asdasdsad', 16, '2021-07-18 06:29:12', 39, 35, 0, 0, 0),
(75, '4444', '444', '2021-07-18', '4444', 4, 'asdasdsad4343', 16, '2021-07-18 06:29:29', 39, 35, 0, 0, 0),
(76, 'asdas', 'asdasd', '2021-07-18', '21342', 4, 'asdasd', 21, '2021-07-18 22:04:13', 39, 35, 0, 0, 0),
(77, 'asdas', 'asdasd', '2021-07-18', '21342', 4, 'asdasd', 21, '2021-07-18 22:05:56', 39, 35, 0, 0, 0),
(78, 'ds', 'dsdsd', '2021-07-16', '222', 4, 'sdsd', 28, '2021-07-18 23:13:59', 39, 38, 0, 0, 0),
(79, 'ds', 'dsdsd', '2021-07-16', '222', 4, 'sdsd', 28, '2021-07-18 23:14:03', 39, 38, 0, 0, 0),
(80, 'ds', 'dsdsd', '2021-07-16', '222', 4, 'sdsd', 28, '2021-07-18 23:14:10', 39, 38, 0, 0, 0),
(81, 'ds', 'dsdsd', '2021-07-16', '222', 4, 'sdsd', 28, '2021-07-18 23:14:19', 39, 38, 0, 0, 0),
(84, 'qweqw', 'eqweqwe', '2021-07-18', '2344', 4, 'qweqwe', 29, '2021-07-18 23:26:46', 39, 35, 0, 0, 0),
(86, 'qweqw', 'eqweqwe', '2021-07-18', '2344', 4, 'qweqwe', 29, '2021-07-18 23:28:08', 39, 35, 0, 0, 0),
(89, 'saSas plan eeee', 'asas', '2021-07-18', '123123', 4, 'asasaS', 30, '2021-07-19 00:55:38', 39, 35, 0, 0, 0),
(91, 'saSas plan eeee', 'asas', '2021-07-18', '123123', 4, 'asasaS', 30, '2021-07-19 00:57:13', 39, 35, 0, 0, 0),
(92, 'saSas plan eeee 30', 'asas', '2021-07-18', '123123', 4, 'asasaS', 30, '2021-07-19 00:58:16', 39, 35, 0, 0, 0),
(93, '31', '313', '2021-07-18', '31', 4, '31', 31, '2021-07-19 01:12:06', 39, 35, 0, 0, 0),
(94, 'asd', 'ads', '2021-07-18', '234', 4, 'ad', 32, '2021-07-19 02:04:03', 39, 38, 0, 0, 0),
(95, 'asdwww', 'ads', '2021-07-18', '234', 4, 'ad', 32, '2021-07-19 02:05:50', 39, 35, 0, 0, 0),
(96, 'asdwwwd', 'ads', '2021-07-18', '234', 4, 'ad', 32, '2021-07-19 02:09:09', 39, 35, 0, 0, 0),
(98, 'asd', 'asd', '2021-07-20', '32', 4, 'ads', 34, '2021-07-19 06:27:13', 39, 35, 0, 0, 0),
(99, 'asdasd', 'asdasd', '2021-07-19', '324', 4, 'asdasd', 35, '2021-07-19 06:30:49', 39, 35, 0, 0, 0),
(100, 'asdasd', 'asdasd', '2021-07-19', '324', 4, 'asdasd', 35, '2021-07-19 06:34:29', 39, 38, 0, 0, 0),
(101, '345345', '345345', '2021-07-19', '3453', 4, '345345', 44, '2021-07-19 06:53:21', 39, 38, 0, 0, 0),
(102, '345345eeeee', '345345', '2021-07-19', '3453', 4, '345345', 44, '2021-07-19 06:53:36', 39, 38, 0, 0, 0),
(103, 'sdf', 'sdf', '2021-07-19', '3', 4, 'sdf', 46, '2021-07-19 06:58:50', 39, 35, 0, 0, 0),
(105, 'sdf55599', 'sdf5599', '2021-07-19', '355599', 4, '55599', 46, '2021-07-19 07:00:18', 39, 38, 0, 0, 0),
(108, '0000dfgdfgaaaa', '0000', '2021-07-19', '35550', 4, '000', 46, '2021-07-19 07:24:31', 39, 38, 0, 0, 0),
(111, 'sdad', 'sdads', '2021-07-14', '212121', 4, 'asdas', 46, '2021-07-19 07:51:57', 39, 38, 0, 0, 0),
(112, 'sdad', 'sdads', '2021-07-14', '212121', 4, 'asdas', 46, '2021-07-19 07:52:27', 39, 38, 0, 0, 0),
(113, '435', '345', '2021-07-19', '435', 4, '345', 47, '2021-07-19 08:21:17', 39, 38, 0, 0, 0),
(115, 'qwewqe', 'qweqe', '2021-07-20', '2131', 4, '123123', 48, '2021-07-20 03:22:25', 39, 38, 0, 0, 0),
(116, 'ddd', 'dddd', '2021-07-19', '3333', 4, 'dddd', 8, '2021-07-20 04:01:53', 39, 38, 0, 0, 0),
(117, 'asdasd', 'asda', '2021-07-15', '123', 4, 'asd', 8, '2021-07-20 04:09:37', 39, 38, 0, 0, 0),
(118, 'sdf', 'f', '2021-07-14', '234', 4, 'f', 8, '2021-07-20 04:12:27', 39, 38, 0, 0, 0),
(119, 'asdasd', 'asdasd', '2021-07-14', '23423', 4, 'asdsad', 8, '2021-07-20 05:18:18', 39, 38, 0, 0, 0),
(120, 'asdasdaa', 'asdasd', '2021-07-14', '23423', 4, 'asdsad', 8, '2021-07-20 05:29:21', 39, 35, 0, 0, 0),
(121, 'asdasdaa', 'asdasd', '2021-07-14', '23423', 4, 'asdsad', 8, '2021-07-20 05:29:39', 39, 35, 0, 0, 0),
(160, 'Metodología de investigación', 'Edward Martínez', '2021-07-06', '5', 33, 'vvc', 60, '2021-08-08 03:31:32', 7, 36, 0, 0, 0),
(164, 'Tomar muestras para estudios de suelos', 'Edward Martínez', '2021-07-08', '5', 33, 'No Aplica', 0, '2021-08-09 12:55:39', 0, 0, 0, 0, 0),
(165, 'capcitaciones semillero', 'oscar puerto ', '2021-08-09', '12', 33, 'aprender a usar las nuevas tecnologias', 60, '2021-08-09 13:53:21', 39, 99, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciones_Proyectos`
--

CREATE TABLE `capacitaciones_Proyectos` (
  `id` int(11) NOT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `docente` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `proyecto_id` int(11) DEFAULT NULL,
  `objetivo` varchar(255) DEFAULT NULL,
  `responsable` varchar(155) DEFAULT NULL,
  `cant_capacitados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador`
--

CREATE TABLE `colaborador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `tp_colaborador` int(11) DEFAULT NULL COMMENT 'estudiante / coinvestigador',
  `proyectos_id` int(11) NOT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colaborador`
--

INSERT INTO `colaborador` (`id`, `nombre`, `codigo`, `tp_colaborador`, `proyectos_id`, `id_persona`) VALUES
(32, NULL, NULL, 2, 129, 187),
(33, NULL, NULL, 2, 129, 185),
(34, NULL, NULL, 1, 127, 177),
(35, NULL, NULL, 2, 129, 4),
(36, NULL, NULL, 2, 129, 178),
(37, NULL, NULL, 1, 127, 175),
(40, NULL, NULL, 1, 134, 173),
(41, NULL, NULL, 1, 134, 113),
(42, NULL, NULL, 1, 134, 128),
(43, NULL, NULL, 1, 134, 172);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compromisos_equipo`
--

CREATE TABLE `compromisos_equipo` (
  `id` int(11) NOT NULL,
  `estado_1` varchar(45) NOT NULL,
  `cantidad_1` varchar(45) NOT NULL,
  `estado_2` varchar(45) NOT NULL,
  `cantidad_2` varchar(45) NOT NULL,
  `estado_3` varchar(45) NOT NULL,
  `cantidad_3` varchar(45) NOT NULL,
  `estado_4` varchar(45) NOT NULL,
  `cantidad_4` varchar(45) NOT NULL,
  `estado_5` varchar(45) NOT NULL,
  `cantidad_5` varchar(45) NOT NULL,
  `id_informe_gestion_financiado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compromisos_equipo`
--

INSERT INTO `compromisos_equipo` (`id`, `estado_1`, `cantidad_1`, `estado_2`, `cantidad_2`, `estado_3`, `cantidad_3`, `estado_4`, `cantidad_4`, `estado_5`, `cantidad_5`, `id_informe_gestion_financiado`) VALUES
(1, 'Completado', '1', 'Completado', '2', 'Parcial', '3', 'Realizandose', '4', 'No iniciado', '5', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_cumplimiento`
--

CREATE TABLE `concepto_cumplimiento` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `nombre_investigador` varchar(45) NOT NULL,
  `nombre_proyecto` varchar(45) NOT NULL,
  `condicion_investigador` varchar(45) NOT NULL,
  `vb_director_departamento` varchar(45) NOT NULL,
  `fecha_solicitud` date DEFAULT current_timestamp(),
  `vb_representante_facultad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `concepto_cumplimiento`
--

INSERT INTO `concepto_cumplimiento` (`id`, `id_proyecto`, `nombre_investigador`, `nombre_proyecto`, `condicion_investigador`, `vb_director_departamento`, `fecha_solicitud`, `vb_representante_facultad`) VALUES
(1, 1, '123', '7', 'Director', 'Aprobado por Director de Departamento', '2021-06-14', 'Aprobado por Representante de Facultad'),
(2, 1, '123', '7', 'Director', '', '2021-06-14', 'En trámite'),
(3, 1, 'Alejandra Jaimes', '8', 'Director', 'Rechazado por Director de Departamento', '2021-06-14', 'En trámite'),
(4, 8, 'Alejandra 2', 'Medicion de CO2 en minas', 'Director', 'Aprobado por Director de Departamento', '2021-06-14', 'Aprobado por Representante de Facultad'),
(5, 33, 'Shirley', 'prueba 2', 'Director', 'Aprobado por Director de Departamento', '2021-06-14', 'Rechazado por Representante de Facultad'),
(6, 5, 'Investigador Prueba', 'Creación VAIESOFT', 'Coinvestigador', 'Aprobado por Director de Departamento', '2021-06-18', 'Aprobado por Representante de Facultad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `numero_contrato` varchar(45) NOT NULL,
  `acta_comite` varchar(45) DEFAULT NULL,
  `valor_financiado` varchar(45) DEFAULT NULL,
  `fecha_inicio` varchar(45) NOT NULL,
  `fecha_suspension` varchar(45) DEFAULT NULL,
  `fecha_reinicio` varchar(45) DEFAULT NULL,
  `prorroga` varchar(45) DEFAULT NULL,
  `fecha_terminacion` varchar(45) NOT NULL,
  `tiempo_ejecucion` varchar(45) DEFAULT NULL,
  `id_informe_gestion_financiado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id`, `numero_contrato`, `acta_comite`, `valor_financiado`, `fecha_inicio`, `fecha_suspension`, `fecha_reinicio`, `prorroga`, `fecha_terminacion`, `tiempo_ejecucion`, `id_informe_gestion_financiado`) VALUES
(1, 'contrato', NULL, NULL, '2021-05-05', NULL, NULL, NULL, '2021-05-05', NULL, NULL),
(2, 'contrato', NULL, NULL, '2021-05-05', NULL, NULL, NULL, '2021-05-05', NULL, NULL),
(3, 'contrato', NULL, NULL, '2021-05-05', NULL, NULL, NULL, '2021-05-05', NULL, NULL),
(4, 'contrato', NULL, NULL, '2021-05-05', NULL, NULL, NULL, '2021-05-05', NULL, NULL),
(5, 'contrato', NULL, NULL, '2021-05-05', NULL, NULL, NULL, '2021-05-05', NULL, NULL),
(6, 'contrato', NULL, NULL, '2021-05-05', NULL, NULL, NULL, '2021-05-05', NULL, NULL),
(7, 'asd', 'asd', 'asd', '2021-06-02', '2021-07-01', '2021-06-23', 'asd', '2021-07-01', 'asd', 1),
(8, 'asd', 'asd', 'asd', '2021-06-02', '2021-07-01', '2021-06-23', 'asd', '2021-07-01', 'asd', 2),
(9, 'asd', 'asd', 'asd', '2021-06-02', '2021-07-01', '2021-06-23', 'asd', '2021-07-01', 'asd', 3),
(10, 'SAD', 'ASD', 'ASD', '0123-03-12', '0123-03-12', '0123-03-12', 'ASDASD', '0123-03-12', 'ASDASD', 4),
(11, 'SAD', 'ASD', 'ASD', '0123-03-12', '0123-03-12', '0123-03-12', 'ASDASD', '0123-03-12', 'ASDASD', 5),
(12, 'SAD', 'ASD', 'ASD', '0123-03-12', '0123-03-12', '0123-03-12', 'ASDASD', '0123-03-12', 'ASDASD', 6),
(13, '123', '123', '123', '0123-03-12', '0123-03-12', '0123-03-12', '123', '0123-03-12', '123', 7),
(14, 'contrato', NULL, NULL, '2021-05-05', NULL, NULL, NULL, '2021-05-05', NULL, NULL),
(15, 'contrato', NULL, NULL, '2021-05-05', NULL, NULL, NULL, '2021-05-05', NULL, NULL),
(16, '123', '123', '123', '0123-03-12', '0123-03-12', '0123-03-12', '123', '0123-03-12', '123', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cumplimiento`
--

CREATE TABLE `cumplimiento` (
  `id` int(11) NOT NULL,
  `dirigido_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `porcentaje` varchar(45) DEFAULT NULL,
  `semestre` varchar(45) DEFAULT NULL,
  `ano` varchar(45) DEFAULT NULL,
  `productos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `acepta_uno` varchar(45) DEFAULT NULL,
  `acepta_dos` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cumplimiento`
--

INSERT INTO `cumplimiento` (`id`, `dirigido_id`, `descripcion`, `porcentaje`, `semestre`, `ano`, `productos`, `acepta_uno`, `acepta_dos`) VALUES
(30, 2, 'INVESTIGACIÓN EN CIENCIAS AGRONÓMICAS Y PECUA', '68', '2', '2022', '{\"pollo\":\"pollo\",\"manzana\":\"manzana\",\"nigga\":\"nigga\"}', '1', '1'),
(31, 2, 'INVESTIGACIÓN EN REPRODUCCION ANIMAL TROPICAL', '5', '2', '2021', '{\"pollo\":\"pollo\",\"manzana\":\"manzana\",\"nigga\":\"nigga\",\"papa\":\"papa\"}', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cumplimiento_acompanamiento`
--

CREATE TABLE `cumplimiento_acompanamiento` (
  `id` int(11) NOT NULL,
  `nombre_joven` varchar(45) NOT NULL,
  `nombre_tutor` varchar(45) NOT NULL,
  `estado_solicitud` varchar(45) NOT NULL,
  `fecha_solicitud` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cumplimiento_acompanamiento`
--

INSERT INTO `cumplimiento_acompanamiento` (`id`, `nombre_joven`, `nombre_tutor`, `estado_solicitud`, `fecha_solicitud`) VALUES
(1, 'sdasdasd', 'asdasdasd', 'En trámite', '2021-06-13'),
(2, 'sdasdasd', 'asdasdasd', 'Rechazado por Director de Departamento', '2021-06-13'),
(3, 'sdasdasd', 'asdasdasd', 'Aprobado por Director de Departamento', '2021-06-13'),
(4, 'sdasdasd', 'asdasdasd', 'Aprobado por Director de Departamento', '2021-06-13'),
(5, 'asdasdasd', 'asdasdasd', 'En trámite', '2021-06-13'),
(6, '', '', 'Rechazado por Director de Departamento', '2021-06-13'),
(7, 'VAIESOFT', 'Poncho', 'Aprobado por Director de Departamento', '2021-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cumplimiento_cronograma`
--

CREATE TABLE `cumplimiento_cronograma` (
  `id` int(11) NOT NULL,
  `objetivo` varchar(45) NOT NULL,
  `actividades` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `id_informe_gestion_financiado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cumplimiento_cronograma`
--

INSERT INTO `cumplimiento_cronograma` (`id`, `objetivo`, `actividades`, `estado`, `semestre`, `id_informe_gestion_financiado`) VALUES
(1, '123', 'ASD', '2021-1', 'Planeado', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cumplimiento_objetivos`
--

CREATE TABLE `cumplimiento_objetivos` (
  `id` int(11) NOT NULL,
  `objetivos_propuestos` varchar(45) NOT NULL,
  `actividades_propuestas` varchar(45) NOT NULL,
  `actividades_desarrolladas` varchar(45) NOT NULL,
  `logros_alcanzados` varchar(45) NOT NULL,
  `porcentaje_cumplimiento` varchar(45) NOT NULL,
  `id_informe_gestion_financiado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cumplimiento_objetivos`
--

INSERT INTO `cumplimiento_objetivos` (`id`, `objetivos_propuestos`, `actividades_propuestas`, `actividades_desarrolladas`, `logros_alcanzados`, `porcentaje_cumplimiento`, `id_informe_gestion_financiado`) VALUES
(1, 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 8);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `data_seme`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `data_seme` (
`id` int(11)
,`nombre` varchar(200)
,`sigla` varchar(45)
,`fecha_creacion` varchar(45)
,`aval_dic_grupo` tinyint(4)
,`aval_dic_sem` tinyint(4)
,`aval_dic_unidad` tinyint(4)
,`grupo_investigacion_id` int(11)
,`gi_nombre` varchar(200)
,`departamento` varchar(45)
,`dpto_d` varchar(200)
,`facultad` int(11)
,`fdescrip` varchar(45)
,`plan_estudios` int(11)
,`pe_descrip` varchar(200)
,`ubicacionSemillero` varchar(247)
,`persona_id` int(11)
,`nombreD` varchar(45)
,`telefono` varchar(45)
,`correo` varchar(45)
,`password` varchar(45)
,`token` varchar(255)
,`rol` int(11)
,`estado` int(11)
,`tipo_vinculacion_id` int(11)
,`descripcion` varchar(45)
,`id_docente` int(11)
,`ubicacionDocente` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_adicionalesS`
--

CREATE TABLE `datos_adicionalesS` (
  `id` int(11) NOT NULL,
  `producto` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `datos_adicionalesScol` date DEFAULT NULL,
  `calificacion` varchar(45) DEFAULT NULL,
  `id_plan` varchar(45) DEFAULT NULL,
  `id_semillero` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `datos_planA`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `datos_planA` (
`id` int(11)
,`proyectos_id` int(11)
,`titulo` varchar(300)
,`linea_investigacion_id` int(11)
,`descripcion` varchar(45)
,`id_semillero` int(11)
,`nombre` varchar(200)
,`responsable` varchar(255)
,`id_plan_Ac` int(11)
,`semestre` varchar(45)
,`ano` varchar(45)
,`estado` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `facultad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `descripcion`, `facultad_id`) VALUES
(2, 'Departamento de ciencias agricolas y pecuaria', 2),
(3, 'Departamento de sistemas e informatica', 1),
(4, 'Departamento de quimica', 4),
(5, 'Departamento de geotecnia y mineria', 1),
(6, 'Departamento de ciencias administrativas', 5),
(7, 'Departamento de ciencias del medio ambiente', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `disciplina`
--

INSERT INTO `disciplina` (`id`, `descripcion`, `area_id`) VALUES
(1, 'Matemáticas', 1),
(2, 'Informática y Ciencias de la Información', 1),
(3, 'Física y Astronomía', 1),
(4, 'Química', 1),
(5, 'Ciencias de la Tierra, Ciencias ambientales', 1),
(6, 'Biología', 1),
(7, 'Otras ciencias naturales', 1),
(8, 'Ingeniería civil', 2),
(9, 'Ingeniería eléctrica, Ingeniería electrónica', 2),
(10, 'Ingeniería mecánica', 2),
(11, 'Ingeniería química', 2),
(12, 'Ingeniería de materiales', 2),
(13, 'Ingeniería médica', 2),
(14, 'Ingeniería ambiental', 2),
(15, 'Biotecnología ambiental', 2),
(16, 'Biotecnología industrial', 2),
(17, 'Historia, Arqueología', 6),
(18, 'Psicología', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tipo_vinculacion_id` int(11) DEFAULT 1,
  `ubicacion` varchar(45) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `tipo_docente` int(11) DEFAULT 0 COMMENT '0- docente 1- colaborador',
  `semillero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `persona_id`, `password`, `tipo_vinculacion_id`, `ubicacion`, `token`, `codigo`, `tipo_docente`, `semillero`) VALUES
(5, 2, 'GkCvLpw', 1, 'NO APLICA', NULL, NULL, 0, NULL),
(35, 4, 'xY2ekLS', 1, 'NO APLICA', NULL, NULL, 0, NULL),
(37, 113, 'a38e7e0cc0b6f423313dedfb7fd5e40d', 2, 'NO APLICA', NULL, NULL, 0, NULL),
(41, 128, '572eea9c36eacaf63fe9d4529e53842e', 1, 'NO APLICA', NULL, NULL, 0, NULL),
(64, 171, NULL, 1, NULL, NULL, 1191402, 1, 41),
(65, 172, NULL, 1, NULL, NULL, 213123, 1, 41),
(66, 173, NULL, 1, NULL, NULL, 12313, 1, 41),
(67, 174, NULL, 1, NULL, NULL, 21312322, 1, 41),
(68, 175, NULL, 1, NULL, NULL, 2131233, 1, 41),
(70, 177, NULL, 1, NULL, NULL, 23, 1, 41),
(71, 178, 'fee5f2124bb073d07d539aa9977d8ec9', 1, 'NO APLICA', NULL, NULL, 0, NULL),
(72, 185, NULL, 1, NULL, NULL, 100, 1, NULL),
(73, 187, NULL, 1, NULL, NULL, 11212, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_proyecto`
--

CREATE TABLE `estado_proyecto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `programa_academico` varchar(45) DEFAULT NULL,
  `persona_id` int(11) NOT NULL,
  `num_documento` varchar(45) NOT NULL,
  `tipo_docuemnto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `codigo`, `semestre`, `programa_academico`, `persona_id`, `num_documento`, `tipo_docuemnto_id`) VALUES
(38, '1145258', '10', '2', 2, '00000000000', 2),
(47, '9999999', '9', 'Ingeniería Agroindustrial', 93, '299999999', 2),
(48, '333322', '1', 'Ingeniería Ambiental', 107, '2222222222', 1),
(49, '1151004', '12', 'INGENIERIA DE AGRICOLA', 114, 'qweqwe', 3),
(56, '1151004', '4', 'Ingeniería Agroindustrial', 138, '11187722', 1),
(57, '540001', '234', '', 155, '145875', 1),
(62, '1152612', '3', 'INGENIERIA DE SISTEMAS', 179, '3641826342', 1),
(63, '1652322', '4', 'Ingeniería Ambiental', 180, '92329382', 2),
(65, 'asd', '23', 'INGENIERIA DE AGRICOLA', 184, 'asd', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `estudianteV`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `estudianteV` (
`id` int(11)
,`nombre` varchar(45)
,`num_documento` varchar(45)
,`programa_academico` varchar(45)
,`codigo` varchar(45)
,`semestre` varchar(45)
,`correo` varchar(45)
,`persona_id` int(11)
,`tipo_docuemnto_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_proyecto`
--

CREATE TABLE `estudiante_proyecto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `proyectos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante_proyecto`
--

INSERT INTO `estudiante_proyecto` (`id`, `nombre`, `codigo`, `estado`, `proyectos_id`) VALUES
(5, 'nkjfnkj', 'jkjdnkjd', NULL, 32),
(8, '222', 'est', NULL, 40),
(9, '333', 'nocturna', NULL, 42),
(11, '00000333', 'pablo', NULL, 54),
(12, '4324', 'fsdfdf', NULL, 61),
(13, 'ASD', 'ASD', NULL, 62),
(14, 'SDF', 'SDF', NULL, 63),
(15, 'QWEQE', 'QWEQWE', NULL, 66),
(16, 'asdasd', 'asdasd', NULL, 67),
(17, '12321', 'aSas', NULL, 71),
(18, 'asdad', 'sadasd', NULL, 74),
(19, '54', 'fdgdg', NULL, 75),
(20, '12331', 'asdasds', NULL, 77),
(21, 'as', 'asd', NULL, 78),
(22, '123123', 'ponchis', NULL, 79),
(23, '333333', 'pruebas pepiutposssss', NULL, 80),
(28, '345345', 'd', NULL, 83),
(29, '345345', 'd', NULL, 83),
(30, '540001', 'asd', NULL, 84),
(32, '12321', '3123123', NULL, 86),
(36, '12321', 'asas', NULL, 68),
(38, '12321', 'asas', NULL, 68),
(42, '540001', 'asd', NULL, 87),
(43, 'DFGDFGFDG', 'FDGDFGFDG', NULL, 89),
(46, 'asdad', 'asdasdasd', NULL, 38),
(47, 'asdad', 'asdasdasd', NULL, 38),
(49, '55555', 'eeeeee', NULL, 91),
(51, '3333', 'felipe', NULL, 92),
(52, '3333', 'diana', NULL, 92),
(53, '9999', 'carlos', NULL, 93),
(54, '33333', 'juan', NULL, 99),
(55, '12321', 'asas', NULL, 103),
(56, '12321', 'asas', NULL, 103),
(57, 'asdad', 'asdas', NULL, 103),
(65, 'a', 'a', NULL, 114),
(66, 's', 's', NULL, 116),
(67, 's', 's', NULL, 116),
(68, 'dd', 'dd', NULL, 117),
(69, 'ff', 'fff', NULL, 117),
(70, 'a', 'a', NULL, 118),
(71, 'a', 'aa', NULL, 118),
(72, 'asas', 'a', NULL, 119),
(73, 'n', 'n', NULL, 120),
(74, '11212', 'Marco', NULL, 121),
(75, '99', 'Rigo', NULL, 121),
(76, '5654', 'Alberto', NULL, 122),
(77, '787', 'Lucia', NULL, 122),
(78, '144555', 'Jorge Luis Borges', NULL, 35),
(79, '144555', 'Jorge Luis Borges', NULL, 123),
(80, '1245666', 'Diego González', NULL, 36),
(81, '1151004', 'camilo caballero', NULL, 126),
(83, '1151004', 'alfonso local', NULL, 128),
(86, 'Juan jose jaramillo', '1231231', NULL, 129),
(87, '666666', 'Mauricio', NULL, 129),
(88, 'ewewe', 'wewe', NULL, 129),
(95, 'shirley naranjo', '1145258', NULL, 131),
(96, 'Edward Martinez', '9999999', NULL, 131),
(97, 'shirley naranjo', '1145258', NULL, 134),
(98, 'Edward Martinez', '9999999', NULL, 134);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `estudiante_semi`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `estudiante_semi` (
`id` int(11)
,`nombre` varchar(45)
,`num_documento` varchar(45)
,`programa_academico` varchar(45)
,`codigo` varchar(45)
,`semestre` varchar(45)
,`correo` varchar(45)
,`persona_id` int(11)
,`telefono` varchar(45)
,`semillero_id` int(11)
,`tipo_docuemnto_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `descripcion`) VALUES
(1, 'Facultad de ingenierías'),
(2, 'Facultad de ciencias agrarias y del ambiente'),
(3, 'Facultad de educaion, artes y humanidades'),
(4, 'Facultad de ciencias basicas'),
(5, 'Facultad de ciencias empresariales'),
(6, 'Facultad de la salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente_financiacion`
--

CREATE TABLE `fuente_financiacion` (
  `id` int(11) NOT NULL,
  `fuente` varchar(45) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `proyectos_terminados_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fuente_financiacion`
--

INSERT INTO `fuente_financiacion` (`id`, `fuente`, `valor`, `proyectos_terminados_id`) VALUES
(4, 'nkjfnkj', '3409283', 32),
(6, '222', 'fuente', 40),
(7, 'nocturna', '333', 42),
(8, 'Externa', '220000', 38),
(9, 'Externa', '20000', 8),
(10, 'ufps', '15000000', 53),
(11, 'finu', '20000', 54),
(12, 'finu', '200000', 55),
(13, '12321', '3123123', 56),
(14, '3sdf', '32434', 61),
(15, '4324', '324324', 64),
(17, 'asdasd', 'asdasd', 67),
(18, '12321', 'aSas', 71),
(19, 'vxcvxv', 'tertee', 75),
(20, '123123', '12323', 79),
(21, '123', '123123123', 75),
(22, '333333', 'pruebas pepiutposssss', 80),
(23, 'la ufps', '123123123', 80),
(24, 'asDASD', 'ASDASD', 75),
(29, 'wrwer', 'sdad', 84),
(32, 'wrwer', 'sdad', 68),
(33, 'wrwer', 'sdad', 68),
(34, 'asdsadasd', 'sdadasdasdasd', 87),
(35, 'aaaa', 'AAAAAA', 38),
(37, 'hgfhfh', '5555555', 91),
(39, 'finu', '20000', 92),
(40, 'beca', '20000', 92),
(41, 'fr', '3234', 68),
(42, 'ufps1', '30000000', 93),
(43, 'beca', '30000000', 93),
(44, 'beca finu', '90000', 99),
(50, 'qweqwe', 'qweqwe', 103),
(51, 'qweq', 'qweqwe', 103),
(53, 'a', 'a', 112),
(55, 'd', 'd', 115),
(56, 'asa', 'asas', 118),
(57, 'v', 'v', 119),
(58, 'v', 'v', 119),
(59, 'Banco', '120000', 121),
(60, 'Regalias', '850000', 122),
(61, 'Narcotrafico', '50000000', 122),
(62, 'Beca Mintic', '100000', 35),
(63, 'Beca Mintic', '100000', 123),
(64, 'FINU', '200000', 36),
(65, 'ufps', '10000000', 126),
(66, 'Regalias', '50000', 127),
(67, 'Prestamo BID', '10000000', 127),
(70, 'ufps', '1000000', 129),
(71, 'la casa de lola', '2134342', 134);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_has_participante`
--

CREATE TABLE `grupo_has_participante` (
  `id` int(11) NOT NULL,
  `participantes_id` int(11) NOT NULL,
  `grupo_investigacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_has_proyecto`
--

CREATE TABLE `grupo_has_proyecto` (
  `id` int(11) NOT NULL,
  `grupo_investigacion_id` int(11) NOT NULL,
  `proyectos_terminados_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_investigacion`
--

CREATE TABLE `grupo_investigacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `sigla` varchar(45) DEFAULT NULL,
  `unidad_academica` int(11) DEFAULT NULL,
  `fecha_creacion` varchar(45) DEFAULT NULL,
  `fecha_gruplac` varchar(45) DEFAULT NULL,
  `codigo_gruplac` varchar(45) DEFAULT NULL,
  `clas_colciencias` varchar(45) DEFAULT NULL,
  `cate_colciencias` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo_investigacion`
--

INSERT INTO `grupo_investigacion` (`id`, `nombre`, `sigla`, `unidad_academica`, `fecha_creacion`, `fecha_gruplac`, `codigo_gruplac`, `clas_colciencias`, `cate_colciencias`) VALUES
(1, 'INVESTIGACIÓN AMBIENTE Y VIDA', 'GIAV', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'INVESTIGACIÓN EN CIENCIAS AGRONÓMICAS Y PECUA', 'GICAP', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'INVESTIGACIÓN EN CIENCIA Y TECNOLOGÍA AGROIND', 'GICITECA', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'INVESTIGACIÓN EN REPRODUCCION ANIMAL TROPICAL', 'TROPSYNC', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'DESARROLLO DE INGENIERÍA DE SOFTWARE', 'DIS', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'GRUPO INVESTIGACIÓN EN DISEÑO MECÁNICO MATERIALES Y PROCESOS', 'GIDIMA', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_linea_investigacion`
--

CREATE TABLE `grupo_linea_investigacion` (
  `id` int(11) NOT NULL,
  `grupo_investigacion_id` int(11) NOT NULL,
  `linea_investigacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_solicitud_horas`
--

CREATE TABLE `grupo_solicitud_horas` (
  `id` int(11) NOT NULL,
  `solicitud_horas_id` int(11) NOT NULL,
  `grupo_investigacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impactos_sociales`
--

CREATE TABLE `impactos_sociales` (
  `id` int(11) NOT NULL,
  `impacto_1` varchar(100) NOT NULL,
  `impacto_2` varchar(100) NOT NULL,
  `impacto_3` varchar(100) NOT NULL,
  `impacto_4` varchar(100) NOT NULL,
  `impacto_5` varchar(100) NOT NULL,
  `impacto_6` varchar(100) NOT NULL,
  `impacto_7` varchar(100) NOT NULL,
  `id_informe_gestion_financiado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `impactos_sociales`
--

INSERT INTO `impactos_sociales` (`id`, `impacto_1`, `impacto_2`, `impacto_3`, `impacto_4`, `impacto_5`, `impacto_6`, `impacto_7`, `id_informe_gestion_financiado`) VALUES
(1, 'Alto', 'Medio', 'Bajo', 'Nulo', 'Excesivo', 'Medio', 'bajo', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes_gestion_financiado`
--

CREATE TABLE `informes_gestion_financiado` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `grupo_investigacion` varchar(45) NOT NULL,
  `facultad` varchar(45) NOT NULL,
  `representante_facultad` varchar(45) NOT NULL,
  `duracion_proyecto` varchar(45) NOT NULL,
  `novedades_proyecto` varchar(255) DEFAULT NULL,
  `conclusiones` varchar(255) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `estado_solicitud` varchar(45) NOT NULL,
  `fecha_solicitud` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informes_gestion_financiado`
--

INSERT INTO `informes_gestion_financiado` (`id`, `id_proyecto`, `grupo_investigacion`, `facultad`, `representante_facultad`, `duracion_proyecto`, `novedades_proyecto`, `conclusiones`, `observaciones`, `estado_solicitud`, `fecha_solicitud`) VALUES
(8, 5, 'Web', 'Ingenierías', 'Judith del Pilar Rodriguez Tenjo', '12 meses', NULL, NULL, '', 'En trámite', '2021-06-14'),
(9, 5, 'Gidis', 'Ingenierías', 'Judith del Pilar Rodriguez Tenjo', '5 meses', NULL, NULL, '', 'En trámite', '2021-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_gestion_jovenes`
--

CREATE TABLE `informe_gestion_jovenes` (
  `id` int(11) NOT NULL,
  `facultad` varchar(45) NOT NULL,
  `grupo_investigacion` varchar(45) NOT NULL,
  `departamento` varchar(45) NOT NULL,
  `nombre_tutor` varchar(45) NOT NULL,
  `linea_investigacion` varchar(45) NOT NULL,
  `nombre_joven` varchar(45) NOT NULL,
  `convenio_colciencias` varchar(45) NOT NULL,
  `numero_convocatoria` varchar(45) NOT NULL,
  `periodo_tutoria` varchar(45) NOT NULL,
  `vb_director_grupo` varchar(45) NOT NULL,
  `fecha_solicitud` date DEFAULT current_timestamp(),
  `vb_director_departamento` varchar(45) NOT NULL,
  `vb_representante_facultad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informe_gestion_jovenes`
--

INSERT INTO `informe_gestion_jovenes` (`id`, `facultad`, `grupo_investigacion`, `departamento`, `nombre_tutor`, `linea_investigacion`, `nombre_joven`, `convenio_colciencias`, `numero_convocatoria`, `periodo_tutoria`, `vb_director_grupo`, `fecha_solicitud`, `vb_director_departamento`, `vb_representante_facultad`) VALUES
(1, '321', '321', '321', '321', '321', '321', '321', '321', '321', 'En trámite', '2021-06-14', 'Rechazado por Director de Departamento', 'En trámite'),
(2, 'Facultad de Prueba', 'Grupo de Prueba', 'Departamento de Prueba', 'Shirley Naranjo', 'Linea de prueba', 'Poncho martinez', 'Convenio #2145', 'Convocatoria # 12341', '2021-1', 'En trámite', '2021-06-14', 'En trámite', 'Rechazar por Representante de Facultad'),
(3, 'FACULTAD DE PRUEBA 3', 'GRUPO DE PRUEBA 3000', 'DEPARTAMENTO DE PRUEBA 12981203', 'ALEJANDRA DANIELA DEL PILAR', 'LINEA DE PRUEBA 56', 'SHIRLEY ANDREA', 'CONVENIO #56123', 'CONVOCATORIA # 1239812390', '2021-2', 'En trámite', '2021-06-14', 'Rechazado por Director de Departamento', 'En trámite'),
(4, 'Facultad de Ingeniería', 'GIDIS', 'Ingeniería de Sistemas', 'Carlos Alberto', 'Computación', 'Andres Jesus Perez', 'Convenio # 9812', 'Convocatoria # 21512', '2021-1', 'En trámite', '2021-06-16', 'Rechazado por Director de Departamento', 'En trámite'),
(5, 'Facultad Prueba', 'grupo Prueba', 'Departamento', 'Tutor prueba', 'Linea prueba', 'Joven inv prueba', '13341', '12341', '2020-1', 'En trámite', '2021-06-16', 'Aprobado por Director de Departamento', 'Aprobado por Representante de Facultad'),
(6, 'Ingeniería', 'GIDIS', 'SIstemas', 'Dixon', 'Investigación prueba', 'Alejandra', 'Covenio # 215415', 'ATMINTIC 2041213', '2021-2', 'En trámite', '2021-06-18', 'Aprobado por Director de Departamento', 'Aprobado por Representante de Facultad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigador`
--

CREATE TABLE `investigador` (
  `id` int(11) NOT NULL,
  `nombre_investigador` varchar(45) NOT NULL,
  `horas_semana` varchar(45) NOT NULL,
  `tipo_investigador` varchar(45) NOT NULL,
  `id_solicitud_horas_financiado` int(11) DEFAULT NULL,
  `id_informe_gestion_financiado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `investigador`
--

INSERT INTO `investigador` (`id`, `nombre_investigador`, `horas_semana`, `tipo_investigador`, `id_solicitud_horas_financiado`, `id_informe_gestion_financiado`) VALUES
(1, 'asdasd', '4', 'Director', NULL, 1),
(2, 'asdasd', '65', 'Coinvestigador', NULL, 2),
(3, 'asdasd', '65', 'Coinvestigador', NULL, 3),
(4, 'ASD', '2', 'Coinvestigador', NULL, 4),
(5, 'ASD', '2', 'Coinvestigador', NULL, 5),
(6, 'ASD', '2', 'Director', NULL, 6),
(7, '123', '6', 'Director', NULL, 7),
(8, '123', '6', 'Director', NULL, 7),
(9, 'asd', 'asd', 'Director', 4, NULL),
(10, 'Pepito Perez', '123', 'Director', NULL, 8);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `lineasSemillero_id`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `lineasSemillero_id` (
`id` int(11)
,`semillero_id` int(11)
,`linea_investigacion_id` int(11)
,`lineasD` varchar(45)
,`disciplina_desc` varchar(45)
,`areaD` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_investigacion`
--

CREATE TABLE `linea_investigacion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `lider` varchar(45) DEFAULT NULL,
  `disciplina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linea_investigacion`
--

INSERT INTO `linea_investigacion` (`id`, `descripcion`, `lider`, `disciplina_id`) VALUES
(7, 'Matemáticas puras', NULL, 1),
(8, 'Matemáticas aplicadas', NULL, 1),
(9, 'Estadísticas, Probabilidad', NULL, 1),
(10, 'Ciencias de la computación', NULL, 2),
(11, 'Ciencias de la información', NULL, 2),
(12, 'Bioinformática', NULL, 2),
(13, 'Física atómica, molecular y química', NULL, 3),
(14, 'Física de la materia condensada', NULL, 3),
(15, 'Física de partículas, Campos de la Física', NULL, 3),
(16, 'Física nuclear', NULL, 3),
(17, 'Física de plasmas y fluídos', NULL, 3),
(18, 'Óptica', NULL, 3),
(19, 'Acústica', NULL, 3),
(20, 'Astronomía', NULL, 3),
(21, 'Química orgánica', NULL, 4),
(22, 'Química inorgánica, Química nuclear', NULL, 4),
(23, 'Química física', NULL, 4),
(24, 'Ciencia de los polímeros', NULL, 4),
(25, 'Electroquímica', NULL, 4),
(26, 'Química coloidal', NULL, 4),
(27, 'Química analítica', NULL, 4),
(28, 'Geociencias, Multidisciplinar', NULL, 5),
(29, 'Mineralogía', NULL, 5),
(30, 'Paleontología', NULL, 5),
(31, 'Geoquímica, Geofísica', NULL, 5),
(32, 'Geografía física', NULL, 5),
(37, 'Geología', NULL, 5),
(38, 'Vulcanología', NULL, 5),
(39, 'Ciencias del medio ambiente', NULL, 5),
(40, 'Meteorología y ciencias atmosféricas', NULL, 5),
(41, 'Investigación climática', NULL, 5),
(42, 'Oceanografía, Hidrología, Recursos hídricos', NULL, 5),
(43, 'Biología celular, Microbiología', NULL, 6),
(44, 'Virología', NULL, 6),
(55, 'Bioquímica, Biología molecular', NULL, 6),
(56, 'Métodos de investigación bioquímica', NULL, 6),
(57, 'Micología', NULL, 6),
(58, 'Biofísica', NULL, 6),
(59, 'Genética, Herencia', NULL, 6),
(60, 'Ecología', NULL, 6),
(61, 'Otras ciencias naturales', NULL, 7),
(62, 'Ingeniería civil', NULL, 8),
(63, 'Ingeniería arquitectónica', NULL, 8),
(64, 'Ingeniería de la construcción', NULL, 8),
(65, 'Ingeniería estructural y municipal', NULL, 8),
(66, 'Ingeniería del transporte', NULL, 8),
(67, 'Ingeniería eléctrica, Ingeniería electrónica', NULL, 9),
(70, 'Robótica, Control automático', NULL, 9),
(71, 'Sistemas de automatización y de control', NULL, 9),
(72, ' Ingeniería química', NULL, 11),
(73, 'Ingeniería de procesos', NULL, 11),
(74, 'Ingeniería de materiales', NULL, 12),
(75, 'Recubrimiento, Películas', NULL, 12),
(78, 'Textiles', NULL, 12),
(79, 'Incluidos colorantes sintético, Color, Fibras', NULL, 12),
(80, 'Tecnología médica de laboratorio ', NULL, 13),
(81, 'Ingeniería médica', NULL, 13),
(82, 'Ingeniería ambiental y geológica', NULL, 14),
(83, 'Geotecnia', NULL, 14),
(84, 'Biorremediación', NULL, 15),
(85, 'Ética relacionada con biotecnología ambiental', NULL, 15),
(86, 'Psicología (relaciones hombre-máquina)', NULL, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_proyecto_plan`
--

CREATE TABLE `linea_proyecto_plan` (
  `id` int(11) NOT NULL,
  `linea_id` int(11) DEFAULT NULL,
  `proy_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `sem` varchar(45) DEFAULT NULL,
  `ano` varchar(45) DEFAULT NULL,
  `fec_reg` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linea_proyecto_plan`
--

INSERT INTO `linea_proyecto_plan` (`id`, `linea_id`, `proy_id`, `plan_id`, `sem`, `ano`, `fec_reg`) VALUES
(1, 39, 35, 2, '2', '2021', '2021-07-16 04:16:36'),
(2, 39, 38, 3, '1', '2024', '2021-07-16 04:28:39'),
(3, 38, 4, 39, '1', '2026', '2021-07-16 05:00:19'),
(4, 38, 5, 8, '2', '2024', '2021-07-16 05:01:45'),
(6, 35, 8, 39, '1', '2022', '2021-07-16 05:31:04'),
(7, 35, 8, 39, '1', '2022', '2021-07-16 05:32:33'),
(8, 39, 35, 8, '1', '2022', '2021-07-16 05:36:40'),
(9, 39, 38, 10, '1', '2221', '2021-07-16 07:11:10'),
(10, 39, 35, 30, '1', '2221', '2021-07-19 00:58:44'),
(11, 39, 35, 31, '1', '2026', '2021-07-19 01:12:31'),
(12, 39, 38, 32, '1', '2621', '2021-07-19 02:04:27'),
(13, 39, 35, 32, '1', '2621', '2021-07-19 02:06:13'),
(14, 39, 35, 32, '1', '2621', '2021-07-19 02:09:28'),
(15, 39, 35, 34, '2', '2022', '2021-07-19 06:27:20'),
(16, 39, 35, 35, '2', '2016', '2021-07-19 06:31:08'),
(17, 39, 35, 46, '2', '2016', '2021-07-19 06:58:54'),
(19, 39, 35, 54, '1', '2021', '2021-07-20 05:29:59'),
(21, 61, 67, 56, '1', '2027', '2021-07-26 04:40:49'),
(22, 7, 5, 56, '1', '2027', '2021-07-26 04:41:21'),
(23, 61, 67, 52, '1', '2021', '2021-07-26 06:48:25'),
(24, 61, 71, 52, '1', '2021', '2021-07-26 06:52:56'),
(26, 61, 71, 57, '1', '2021', '2021-07-26 07:00:42'),
(27, 61, 71, 58, '1', '2025', '2021-07-26 07:23:24'),
(28, 7, 5, 58, '1', '2025', '2021-07-26 07:24:03'),
(29, 7, 5, 57, '1', '2021', '2021-07-26 11:56:27'),
(30, 61, 75, 57, '1', '2021', '2021-08-04 03:05:52'),
(31, 61, 94, 59, '1', '', '2021-08-04 04:26:44'),
(32, 61, 35, 59, '1', '', '2021-08-04 05:47:22'),
(33, 8, 122, 60, '1', '2021', '2021-08-07 22:04:35');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `LoginUser`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `LoginUser` (
`id` int(11)
,`nombre` varchar(45)
,`telefono` varchar(45)
,`correo` varchar(45)
,`persona_id` int(11)
,`password` varchar(45)
,`rol` int(11)
,`estado` int(11)
,`tipo_usuario` varchar(45)
,`perfiles_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `descripcion`) VALUES
(1, 'un modulo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otras_actividades`
--

CREATE TABLE `otras_actividades` (
  `id` int(11) NOT NULL,
  `nombre_proyecto` varchar(255) DEFAULT NULL,
  `nombre_actividad` varchar(255) DEFAULT NULL,
  `modalidad_participacion` varchar(45) DEFAULT NULL COMMENT 'Ponente/Asistente',
  `responsable` varchar(45) DEFAULT NULL,
  `fecha_realizacion` varchar(45) DEFAULT NULL,
  `producto` varchar(255) DEFAULT NULL COMMENT 'Ponencia/Articulo',
  `semillero_id` int(11) NOT NULL,
  `plan_accion_id` int(11) DEFAULT NULL,
  `linea_id` int(11) DEFAULT NULL,
  `proy_id` int(11) DEFAULT NULL,
  `porcentaje` varchar(45) DEFAULT NULL,
  `puntos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `otras_actividades`
--

INSERT INTO `otras_actividades` (`id`, `nombre_proyecto`, `nombre_actividad`, `modalidad_participacion`, `responsable`, `fecha_realizacion`, `producto`, `semillero_id`, `plan_accion_id`, `linea_id`, `proy_id`, `porcentaje`, `puntos`) VALUES
(5, 'COMODIDAD PARA LA VIDA', '¿Qué nombre se le puede poner a un proyecto de vida?', 'presencial', 'juan camilo ', '2021-06-16', 'CAPACITACION WEB', 4, NULL, NULL, 18, '0', 0),
(6, 'COMODIDAD PARA LA VIDA', '¿Qué nombre se le puede poner a un proyecto de vida?', 'presencial', 'juan camilo ', '2021-06-16', 'CAPACITACION WEB', 4, NULL, NULL, 18, '0', 0),
(7, 'XII Encuentro de Proyectos de  Semilleros', 'Proyecto de aulas', 'Ponente', 'Javier Lozano', '2021-06-04', 'articulo cientifico', 4, NULL, NULL, 19, '0', 0),
(8, 'Encuentro de semillero', 'Proyecto de aulas', 'Ponente', 'Javier Lozano', '2021-06-10', 'EVALUACIÓN DE LA ACTIVIDAD MICROBIOLÓGICA DEL SUELO BAJO  \nDIFERENTES TIPOS DE USOS Y SU IMPORTANCIA PARA LOS \nSERVICIOS ECOSISTÉMICOS ', 4, NULL, NULL, 24, '0', 0),
(36, 'asdasd', 'asdasd', 'asdasd', 'asdasd', '2021-07-17', 'asdasdas', 4, 50, NULL, NULL, '0', 0),
(51, 'swdasd', 'asdad', 'asdasd', 'asdasd', '', 'asdasd', 4, 6, NULL, NULL, '0', 0),
(52, 'sdf345345', 'sdfsd34535', 'sdf345435', '345345sdf', '2021-07-17', 'sdfsdf345345', 4, 8, NULL, NULL, '0', 0),
(53, 'sdfsdf3545', 'sdf34534', 'sdf3453', 'sdf435345', '2021-07-15', 'sdffsd3453453', 4, 9, NULL, NULL, '0', 0),
(54, 'asdwwwww', 'asd', 'asd', 'asd', '2021-07-23', 'asdqwe', 4, 8, NULL, NULL, '0', 0),
(79, 'tr', 'tretete', 'gdgdg', 'gdgdfg', '2021-07-16', 'gdgdgdf', 33, 52, NULL, NULL, '0', 0),
(80, 'tr', 'tretete', 'gdgdg', 'gdgdfg', '2021-07-16', 'gdgdgdf', 33, 52, NULL, NULL, NULL, 0),
(81, 'dsd', 'fdsfs', 'fdsfs', 'fdsfsf', '2021-08-01', 'dfsfds', 33, 52, NULL, NULL, NULL, 0),
(82, 'dgfdgd', 'gdfgdgd', 'gfdgdgd', 'gfdgdg', '2021-07-08', 'gdfgdgd', 33, 57, NULL, NULL, NULL, 0),
(87, 'capacitacion de plan', 'asdasd', 'asdasdas', 'asdasdasd', '2021-08-03', 'asdasdasd', 33, 57, NULL, NULL, NULL, 0),
(88, 'tre', 'rete', 'ertete', 'tertetret', '2021-08-06', 'tertretetret', 33, 58, NULL, NULL, NULL, 0),
(89, 'proyecto adicional', 'capacitacion', 'capacitacion', 'juan', '2021-07-10', 'capacitación ', 33, 59, NULL, NULL, NULL, 0),
(91, 'aa', 'aa', 'aa', 'aa', '2021-08-05', 'aa', 33, 63, NULL, NULL, NULL, 0),
(92, 'b', 'b', 'b', 'b', '2021-08-13', 'b', 33, 64, NULL, NULL, NULL, 0),
(93, 'Limpieza', 'Actividad de prueba', 'Virtual', 'Raul', '2021-08-13', 'producto descripcion v2', 33, 60, NULL, NULL, '0', 0),
(98, 'w', 'w', 'w', 'w', '2021-08-06', 'w', 33, 68, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otras_actividades_proy`
--

CREATE TABLE `otras_actividades_proy` (
  `id` int(11) NOT NULL,
  `nombre_proyecto` varchar(200) DEFAULT NULL,
  `nombre_actividad` varchar(200) DEFAULT NULL,
  `modalidad_participacion` varchar(45) DEFAULT NULL COMMENT 'Ponente/Asistente',
  `responsable` varchar(45) DEFAULT NULL,
  `fecha_realizacion` varchar(45) DEFAULT NULL,
  `producto` varchar(200) DEFAULT NULL COMMENT 'Ponencia/Articulo',
  `proyect_id` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `otras_actividades_proy`
--

INSERT INTO `otras_actividades_proy` (`id`, `nombre_proyecto`, `nombre_actividad`, `modalidad_participacion`, `responsable`, `fecha_realizacion`, `producto`, `proyect_id`, `porcentaje`) VALUES
(3, 'Lectura de cartas', 'desarrollo', NULL, 'sdsds', '2021-08-18', '1', 0, 0),
(7, 'Reunion', 'Meeting de amigos', NULL, 'Antonio', '2021-08-07', '100', 0, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `pares_academ`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `pares_academ` (
`id` int(11)
,`nombre` varchar(45)
,`num_documento` varchar(45)
,`inst_empresa` varchar(45)
,`correo` varchar(45)
,`telefono` varchar(45)
,`persona_id` int(11)
,`semillero_id` int(11)
,`tipo_docuemnto_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pares_academicos`
--

CREATE TABLE `pares_academicos` (
  `id` int(11) NOT NULL,
  `inst_empresa` varchar(45) DEFAULT NULL,
  `persona_id` int(11) NOT NULL,
  `numero_docuemnto` varchar(45) NOT NULL,
  `tipo_docuemnto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pares_academicos`
--

INSERT INTO `pares_academicos` (`id`, `inst_empresa`, `persona_id`, `numero_docuemnto`, `tipo_docuemnto_id`) VALUES
(20, 'ufps', 108, '22222222', 2),
(29, 'empresa', 181, '4823842', 2),
(30, 'empresa', 182, '24323842', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `descripcion`) VALUES
(1, 'SIN ASIGNAR'),
(2, 'Administrador'),
(3, 'SuperAdmin'),
(4, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles_has_modulos`
--

CREATE TABLE `perfiles_has_modulos` (
  `perfiles_id` int(11) NOT NULL,
  `modulos_activos_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `activo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tipo_usuario` varchar(45) DEFAULT NULL,
  `perfiles_id` int(11) DEFAULT NULL COMMENT '1 - SIN ASIGNAR 2 -\r\nAdministrador 3 - \r\n SuperAdmin 4-\r\nDocente\r\n5 - ESTUDIANTE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `telefono`, `correo`, `password`, `tipo_usuario`, `perfiles_id`) VALUES
(2, 'shirley naranjo', '65216688', 'shirleypaolanv@ufps.edu.co', NULL, NULL, 1),
(4, 'SHIRLEY NARANJO', '52124547222', 'edward269@gmail.com', 'g9GAHE2', NULL, 4),
(93, 'Edward Martinez', '34535345', 'edward220619@gmail.com', '123', NULL, 1),
(107, 'carlos ruiz', '1111111', 'CARLOS@UFPS.EDU.CO', '', NULL, 5),
(108, 'lina avella', '333333', 'lina@ufps.edu.co', '', NULL, 1),
(109, 'Shirley', '12312312', 'shirleyn@ufps.edu.co', 'poncho1234', '4', 4),
(110, 'Alejandra', '1231231', 'alejandra@ufps.edu.co', 'william', '5', 5),
(111, 'Salvador', '123123123', 'salvador@ufps.edu.co', 'huertasplata', '6', 6),
(112, 'Pilar ', '12312312', 'jpilar@ufps.edu.co', 'ingsistemas', '7', 7),
(113, 'Juan Carlos Naranjo', '3142429611', 'shipana23@gmail.com', '8gZx0lL', NULL, 4),
(114, 'Lucia Mendez', '5555555', 'lucimende@ufps.edu.co', '', NULL, 1),
(128, 'jeff', 'rwerwerw', 'jefersonurielhc@ufps.edu.co', 'NpFvMxa', NULL, 4),
(138, 'Paola Suárez', '5555555', 'paolas@ufps.edu.co', '', NULL, 5),
(155, 'asd', '3168274086', 'correo@ufps.edu.co', '', NULL, 5),
(171, 'juan carlos  duarte', '123123123', 'Ariannaaguero8@ufps.edu.co', ' ', NULL, 4),
(172, 'camilo yamayusa', '3165392716', 'camilin@ufps.edu.co', ' ', NULL, 4),
(173, 'jeferson parra mendez', '3132769303', 'juanpabloa@ufps.edu.co', ' ', NULL, 4),
(174, 'juan jhose hernadez', '987744444', 'juanjosem@ufps.edu.co', ' ', NULL, 4),
(175, 'jeferson de los angeles Hernandez', '3132769303', 'jefersonalacantara@ufps.edu.co', ' ', NULL, 4),
(177, 'Marco el Fenix', '6598751', 'asimplemailmore@gmail.com', ' ', NULL, 4),
(178, 'edward martinez', '52124547222', 'edward22069@gmail.com', '123', NULL, 4),
(179, 'Carlos', '3231923823', 'carlosdavid@gmail.com', '', NULL, 5),
(180, 'Oscar', '3122238223', 'oscaraparicio@gmail.com', '', NULL, 5),
(181, 'Juan Ortiz', '3121223532', 'juanortiz@gmail.com', '', NULL, 1),
(182, 'Camilo Suarez', '3112235322', 'camilosuarez@gmail.com', '', NULL, 1),
(184, 'juan carlo calderon', '123412312', 'juancalderobn@gmail.com', '', NULL, 1),
(185, 'Gregorio', '69874', 'asimplemailmore@gmail.com', ' ', NULL, 4),
(186, 'Natalia', '34343', 'asimplemailmore@gmail.com', ' ', NULL, 4),
(187, 'Natalia', '34343', 'asimplemailmore@gmail.com', ' ', NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_grupo`
--

CREATE TABLE `persona_has_grupo` (
  `id` int(11) NOT NULL,
  `grupo_investigacion_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_has_semillero`
--

CREATE TABLE `persona_has_semillero` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `semillero_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_has_semillero`
--

INSERT INTO `persona_has_semillero` (`id`, `persona_id`, `semillero_id`) VALUES
(16, 2, 4),
(55, 93, 33),
(59, 113, 34),
(74, 128, 38),
(91, 178, 41),
(92, 179, 41),
(93, 180, 41),
(94, 181, 41),
(95, 182, 41),
(97, 184, 41);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `persona_login`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `persona_login` (
`id` int(11)
,`nombre` varchar(45)
,`telefono` varchar(45)
,`correo` varchar(45)
,`persona_id` int(11)
,`password` varchar(45)
,`rol` int(11)
,`estado` int(11)
,`tipo_usuario` varchar(45)
,`perfiles_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_accion`
--

CREATE TABLE `plan_accion` (
  `id` int(11) NOT NULL,
  `semestre` varchar(45) DEFAULT NULL,
  `ano` varchar(45) DEFAULT NULL,
  `vbo_dirSemillero` int(45) DEFAULT 0,
  `vbo_dirGinvestigacion` int(45) DEFAULT 0,
  `vbo_facultaInv` int(45) DEFAULT 0,
  `semillero_id` int(11) NOT NULL,
  `stado` int(11) NOT NULL DEFAULT 0 COMMENT '0 - pendiente 1- regitro cerrado\r\n',
  `dele` int(11) NOT NULL DEFAULT 1 COMMENT '0 activo 1 inactivo',
  `estado_enviar` int(11) NOT NULL DEFAULT 0 COMMENT '0 pendiente 1 completado',
  `vbo_dirSemilleroG` int(11) DEFAULT 0,
  `vbo_dirGinvestigacionG` int(11) DEFAULT 0,
  `vbo_facultaInvG` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plan_accion`
--

INSERT INTO `plan_accion` (`id`, `semestre`, `ano`, `vbo_dirSemillero`, `vbo_dirGinvestigacion`, `vbo_facultaInv`, `semillero_id`, `stado`, `dele`, `estado_enviar`, `vbo_dirSemilleroG`, `vbo_dirGinvestigacionG`, `vbo_facultaInvG`) VALUES
(50, '1', '8989', 2, 0, 0, 4, 0, 1, 0, 2, 0, 0),
(60, '2', '2024', 0, 0, 0, 33, 0, 1, 0, 1, 0, 0),
(61, '2', '2022', 0, 0, 0, 33, 0, 1, 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_accion_has_proyectos`
--

CREATE TABLE `plan_accion_has_proyectos` (
  `id` int(11) NOT NULL,
  `plan_accion_id` int(11) NOT NULL,
  `proyectos_id` int(11) NOT NULL,
  `linea` int(11) DEFAULT NULL,
  `semestre` varchar(45) DEFAULT NULL,
  `ano` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_estudios`
--

CREATE TABLE `plan_estudios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `departamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plan_estudios`
--

INSERT INTO `plan_estudios` (`id`, `descripcion`, `departamento_id`) VALUES
(1, 'INGENIERIA DE AGRICOLA', 2),
(2, 'INGENIERIA DE SISTEMAS', 3),
(3, 'Ingeniería Agroindustrial', 2),
(4, 'Ingeniería Ambiental', 7),
(5, 'Ingeniería Biotecnológica', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponencias`
--

CREATE TABLE `ponencias` (
  `id` int(11) NOT NULL,
  `nombre_po` varchar(200) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `nombre_eve` varchar(200) DEFAULT NULL,
  `institucion` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `tipo_ponencias_id` int(11) NOT NULL,
  `semillero_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ponencias`
--

INSERT INTO `ponencias` (`id`, `nombre_po`, `fecha`, `nombre_eve`, `institucion`, `ciudad`, `lugar`, `tipo_ponencias_id`, `semillero_id`) VALUES
(13, 'TRATAMIENTO DE AGUAS CONTAMINADAS CON GLIFOSATO USANDO ELECTROCOAGULACIÓN Y APLICACIÓN DE UN CAMPO MAGNETICO EXTERNO', '2021-06-03', 'IV ENCUENTRO INTERINSTITUCIONAL DE SEMILLEROS DE INVESTIGACIÓN ', 'UFP', 'Cucuta', 'Sala de presentaciones', 1, 2),
(14, 'OXIDACIÓN AVANZADA DE AGUAS CON CONTENIDO DE PLAGUICIDAS MEDIANTE PERÓXIDO DE HIDRÓGENO ACTIVADO CON  BICARBONATO DE SODIO', '2021-06-06', ' VII SEMANA INTERNACIONAL DE CIENCIA, TECNOLOGÍA E INNOVACIÓN ', 'UFPS', 'Cucuta (patios)', 'Edificio Fundadores', 3, 2),
(22, 'Encuentro de semilleros', '2021-07-28', 'Encuentro de semilleros', 'UFPS2', 'Bucaramanga', 'Universidad industrial de Santander', 2, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `investigador` varchar(45) NOT NULL,
  `tipo_proyecto_id` int(11) DEFAULT NULL,
  `tiempo_ejecucion` varchar(45) DEFAULT NULL,
  `fecha_ini` varchar(45) DEFAULT NULL,
  `resumen` varchar(700) DEFAULT NULL,
  `obj_general` varchar(255) DEFAULT NULL,
  `obj_especifico` varchar(500) DEFAULT NULL,
  `resultados` varchar(255) DEFAULT NULL,
  `costo_valor` varchar(45) DEFAULT NULL,
  `producto` varchar(45) DEFAULT NULL,
  `semillero_id` int(11) DEFAULT NULL,
  `grupo_investigacion_id` int(11) DEFAULT NULL,
  `tipo_proyecto` int(11) DEFAULT NULL,
  `linea_inv_id` int(11) DEFAULT NULL,
  `fecha_fin` varchar(45) DEFAULT NULL,
  `stado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `titulo`, `investigador`, `tipo_proyecto_id`, `tiempo_ejecucion`, `fecha_ini`, `resumen`, `obj_general`, `obj_especifico`, `resultados`, `costo_valor`, `producto`, `semillero_id`, `grupo_investigacion_id`, `tipo_proyecto`, `linea_inv_id`, `fecha_fin`, `stado`) VALUES
(5, 'Creación VAIESOFT', 'Salvador', NULL, '2 meses', '2021-06-01', NULL, 'ñlkl', NULL, 'ñlk', 'ñlk', 'limon, pera', 1, 0, NULL, 7, '0000-00-00', 0),
(53, 'proyecto 1', 'dixon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(54, 'Comportamiento del flux de CO2 en el maritorio de San Andrés Islas en 2019', 'Mario Arena', NULL, NULL, NULL, NULL, 'desarrollar', 'observar\ncopiar\n', 'articulo', '200000', NULL, 33, NULL, NULL, 39, NULL, 0),
(55, 'EFECTO DEL PRETRATAMIENTO CON CAMPO  MAGNÉTICO EN LA FERMENTACIÓN DE  EMULSIONES DE CARNE DE CERDO ', 'Oscar Enrique Cruces', NULL, NULL, NULL, NULL, 'obj 1', 'obje 2', 'conociniento', '1000000', NULL, 33, NULL, NULL, 15, NULL, 0),
(56, 'Realidad mixta', 'Humber College', NULL, NULL, NULL, NULL, 'wqeqwe', 'qweqweqwe', 'wqeqweqw', '123123123', NULL, 33, NULL, NULL, 39, NULL, 0),
(58, 'Realidad mixta nuevoi', 'proyecto nuevo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, 63, NULL, 0),
(59, 'esta vaina q', 'Humber College q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(60, 'Proyecto', 'Carlors', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(61, 'proyeccto', 'fsdaf', NULL, NULL, NULL, NULL, 'obj 2', 'sdsldkas\nfdfjsdlfs', 'fdsfsfsfsdf', '2222', NULL, 33, NULL, NULL, NULL, NULL, 0),
(62, 'Realidad mixta', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(63, 'Realidad mixta', 'WWERERW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(64, '342424', 'sfssdfsfdsfd', NULL, NULL, NULL, NULL, '3244', '432424', '3242424', '342424234', NULL, 33, NULL, NULL, NULL, NULL, 0),
(65, 'Realidad mixta', 'Humber College', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(66, 'WQEQWE', 'QWEQWEQWE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(67, 'asdasd', 'asdasd', NULL, '2021-07-24', '2021-07-24', 'asdsad', 'asdasd', 'asdasd', 'asdasdas', '12312313', NULL, 33, NULL, NULL, 61, '-1', 1),
(68, 'Realidad mixta', 'Humber College qaaaa', NULL, '5 meses', '9-2021', 'resumen 3', 'obje', 'obje', 'resusl33', '9999999', 'yuca platano', 33, NULL, NULL, 61, '-1', 1),
(69, 'Realidad mixta', 'Humber College qaaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(70, 'Realidad mixta', 'Humber College qaaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, '-1', 1),
(71, 'Realidad mixta', 'asdasd', NULL, '2021-07-26', '2021-07-26', 'awsewqe', 'qweqwe', 'qweqe', 'qweqwe', 'qweqweq', NULL, 33, NULL, NULL, 61, '-1', 1),
(72, 'Realidad mixta genial', 'Humber College genial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(73, 'asdasd', 'Humber College', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, '-1', 1),
(74, 'asdasd', 'sadasdsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, '-1', 1),
(75, 'Creacion Automatizacion', 'jhon', NULL, '12 meses', '21 mayo', 'dgdfgdrbbfgf', 'fgd', 'gfdggfdgdgdg', 'gfgdgdfgfdgd gfgdg dfgfgdgdg fgdgdgdf', '432342', NULL, 33, NULL, NULL, 61, '30 mayo', 1),
(76, 'Creacion Automatizacion', 'jhon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(77, 'nortcodingsms', 'Oscar Enrique Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(78, 'nortcodingsms', 'Oscar Enrique Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(79, 'Medicion de CO2 en minas', 'El principal', NULL, NULL, NULL, NULL, 'asdasdasdas', 'asdasdasdas', 'asdasdasdasd', '100000000000', NULL, 33, NULL, NULL, NULL, NULL, 0),
(80, 'proyecto puebassa', 'investigador de pruebas ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(81, 'desde de el terminal', 'desde el terminal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(82, 'Determinación de contaminación microbiológica en ambientes, superficies y agua de consumo, en sitios de preparación de alimentos de la ciudad de san José Cúcuta. Proyecto de aula', 'Maria Clara Roso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(83, 'nortcodingsms', 'el poncho', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(84, 'Medicion de CO2 en minas', 'Oscar Enrique Cruz', NULL, '5 meses', '03 - 2021', 'asdasdasasdasd', 'asdasd', 'asdasdasd', 'asdasdasdasd', 'asdasdasdasd', NULL, 33, NULL, NULL, 11, '8- 3030', 1),
(85, 'Realidad mixta', 'asdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(86, 'Realidad mixta', 'Humber College', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(87, 'Proyecto 15/06', 'Maria Clara Roso', NULL, '', '', 'dasdasd', 'obj5', 'jyttt', 'ress', '3333333', NULL, 33, NULL, NULL, 11, '', 1),
(88, 'Realidad mixta', 'Humber College qaaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(89, 'aSas', 'SasaSFDGDFGFDG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(90, 'sfsdf', 'sdfdsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(91, 'proyecto 12', 'javir', NULL, '5 mrdr', '4-2644', 'ttttttttttt', 'obj 1', 'obj 2', 'resultado', '3111111', NULL, 33, NULL, NULL, 67, '07 - 2021', 1),
(92, 'proyeco 12', 'carla', NULL, '6 meses', '8-2020', 'resumen de', 'objetivo', 'obj esp 1', 'o', '3000000', NULL, 33, NULL, NULL, 61, '5-2021', 1),
(93, 'proyecto terminado df', 'shirley Juemacha w', NULL, '5 meses', '4-2022', 'resument total listoooooo', 'obj 1 shirley s', 'obje  lola', 'r lola', '20000009', NULL, 33, NULL, NULL, 39, '7-2022', 1),
(94, 'Localización de sismos utilizando método de la teoría inversa en ejecucion', 'BRAYAN SERENO', NULL, '5', '5-2021', 'Resumen', NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, 61, '-1', 1),
(95, 'En ejecución Análisis comparativo de redes sociales académicas con énfasis en los modelos de colaboración y las plataformas tecnológicas', 'Oscar Enrique Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(96, 'Análisis comparativo de redes sociales académicas con énfasis en los modelos de colaboración y las plataformas tecnológicas', 'Oscar Enrique Cruz', NULL, 'sadfd', 'sdfsdfs', 'sdfsdfsdf', NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, 21, '-1', 1),
(97, 'Análisis comparativo de redes sociales académicas con énfasis en los modelos de colaboración en ejecucion', 'Oscar Enrique Cruz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(99, 'proyecto en ejecucion 1', 'jaun carlos', NULL, '2021-08-05', '2021-08-02', 'resumen', 'objr', 'obje 3', 'resultado 3', '90000', NULL, 33, NULL, NULL, 39, '-1', 1),
(100, 'proyecto terminado', 'shirley andii', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(101, 'proyecto terminado', 'shirley ttt', NULL, NULL, NULL, NULL, 'obj 1 shirley', 'obje  lola', 'r lola', '200000090', NULL, 33, NULL, NULL, NULL, NULL, 0),
(102, 'proyecto terminado', 'shirley ttt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(103, 'este esbbb', 'asas', NULL, '3 meses', '09-2021', 'asasasdasdsa asd sadasd', 'pppp', 'aaspppp', 'asasasdasdppp', 'asas pppp', NULL, 33, NULL, NULL, 39, '-1', 1),
(104, 'Determinación de contaminación microbiológica en ambientes, superficies y agua de consumo, en sitios de preparación de alimentos de la ciudad de san José Cúcuta. Proyecto de aula', 'Rigoberto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(105, 'asas asdasdasd', 'juaz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(106, 'Determinación de contaminación microbiológica en ambientes, superficies y agua de consumo, en sitios de preparación de alimentos de la ciudad de san José Cúcuta. Proyecto de aula', 'Jeferson Negrorrrr 89', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(116, 'Análisis comparativo de redes sociales académicas con énfasis en los modelos de colaboración y las plataformas tecnológicas', 'Oscar 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(117, 'Análisis comparativo de redes sociales académicas con énfasis en los modelos de colaboración y las plataformas tecnológicas', 'Oscar 222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(127, 'Proyecto A', 'Julian', NULL, '5 meses', '5-2021', 'descripcion', 'Objetivo general 1', 'Objetivos especificos', 'Que todo funcioneq', '50000', NULL, 33, NULL, NULL, 39, '-1', 0),
(128, 'Determinación de contaminación microbiológica en ambientes, superficies y agua de consumo, en sitios de preparación de alimentos de la ciudad de san José Cúcuta. Proyecto de aula', 'jose parada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(129, 'Determinación de contaminación microbiológica en ambientes, superficies y agua de consumo, en sitios de preparación de alimentos de la ciudad de san José Cúcuta. Proyecto de aula', 'jose guevara', NULL, '3 meses', '3 2021', 'resumen', 'Objetivo Gener', 'Objetivo Especificos', 'Resultados Obtenido', '100000', NULL, 33, NULL, NULL, 39, '3 2021', 0),
(130, 'Determinación de contaminación microbiológica en ambientes, superficies y agua de consumo, en sitios de preparación de alimentos de la ciudad de san José Cúcuta. Proyecto de aula', 'Investigador', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, 0),
(131, 'Proyecto A', 'el investigador', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, 0),
(132, 'Análisis comparativo de redes sociales académicas con énfasis en los modelos de colaboración y las plataformas tecnológicas', 'juan camilo caballero', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, 0),
(133, 'Análisis comparativo de redes sociales académicas con énfasis en los modelos de colaboración y las plataformas tecnológicas', 'juan camilo caballero', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, 0),
(134, 'Análisis comparativo de redes sociales académicas con énfasis en los modelos de colaboración y las plataformas tecnológicas', 'juan camilo caballero', NULL, 'asd', 'asd', 'asdasdasd', 'asdasd', 'asdasd', 'asdasdasd', 'asdasdas', NULL, 41, NULL, NULL, 7, '-1', 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `proyec_id_lineaInv`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `proyec_id_lineaInv` (
`id` int(11)
,`proyectos_id` int(11)
,`linea_investigacion_id` int(11)
,`titulo` varchar(300)
,`investigador` varchar(45)
,`obj_general` varchar(255)
,`fecha_ini` varchar(45)
,`fecha_fin` varchar(45)
,`producto` varchar(45)
,`responsable` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proy_lineas_invest`
--

CREATE TABLE `proy_lineas_invest` (
  `id` int(11) NOT NULL,
  `proyectos_id` int(11) NOT NULL,
  `linea_investigacion_id` int(11) NOT NULL,
  `responsable` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proy_lineas_invest`
--

INSERT INTO `proy_lineas_invest` (`id`, `proyectos_id`, `linea_investigacion_id`, `responsable`) VALUES
(1, 5, 7, NULL),
(2, 8, 10, NULL),
(3, 32, 39, NULL),
(4, 8, 61, NULL),
(11, 35, 39, NULL),
(12, 40, 61, NULL),
(13, 42, 61, NULL),
(14, 42, 39, NULL),
(15, 42, 39, NULL),
(16, 42, 39, NULL),
(17, 38, 39, NULL),
(19, 67, 61, NULL),
(20, 71, 61, NULL),
(21, 75, 7, NULL),
(22, 75, 7, NULL),
(23, 75, 61, NULL),
(24, 35, 61, NULL),
(25, 84, 11, NULL),
(26, 87, 11, NULL),
(27, 36, 11, NULL),
(28, 91, 67, NULL),
(29, 92, 61, NULL),
(30, 68, 61, NULL),
(31, 68, 61, NULL),
(32, 93, 21, NULL),
(33, 94, 61, NULL),
(34, 96, 21, NULL),
(35, 35, 61, NULL),
(36, 99, 39, NULL),
(37, 93, 61, NULL),
(38, 93, 39, NULL),
(39, 103, 39, NULL),
(40, 36, 7, NULL),
(41, 35, 61, NULL),
(42, 103, 39, NULL),
(43, 109, 61, NULL),
(44, 112, 61, NULL),
(45, 113, 7, NULL),
(46, 115, 7, NULL),
(47, 118, 7, NULL),
(48, 120, 61, NULL),
(49, 121, 39, NULL),
(50, 122, 8, NULL),
(51, 35, 39, NULL),
(52, 35, 39, NULL),
(53, 123, 39, NULL),
(54, 36, 39, NULL),
(55, 36, 39, NULL),
(56, 36, 39, NULL),
(57, 126, 39, NULL),
(58, 127, 39, NULL),
(59, 129, 39, NULL),
(60, 129, 39, NULL),
(61, 134, 7, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `autor` varchar(45) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `nombre_medio` varchar(45) DEFAULT NULL,
  `issn` varchar(45) DEFAULT NULL,
  `editorial` varchar(45) DEFAULT NULL,
  `volumen` varchar(45) DEFAULT NULL,
  `cant_pag` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `tipo_publicaciones_id` int(11) NOT NULL,
  `semillero_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `autor`, `titulo`, `nombre_medio`, `issn`, `editorial`, `volumen`, `cant_pag`, `fecha`, `ciudad`, `tipo_publicaciones_id`, `semillero_id`) VALUES
(11, 'Fabian Acevedo', 'Gestión financiera en planes de ordenamiento territorial como herramienta de desarrollo urbano', 'Revista Profundidad', '32423', 'Ediciones', '13', '31-38', '2021-06-16', 'Cucuta', 2, 2),
(17, 'Juan Guillermo Popayán-Hernández', 'Comportamiento del flux de CO2 en el maritorio de San Andrés Islas en 2019', 'Revista Conocimiento', '1000254', 'Ediciones', '16', '31-38', '2021-04-02', 'Barranquilla', 2, 2),
(24, 'Oscar Agudelo', 'Desarrollo de una metodologia', 'Revista Luz', '324234', 'El Tiempo', '2', '3', '2021-08-27', 'Cucuta', 1, 33),
(25, 'fabian', 'dfsfdsfd', 'Revista Luz', '000584662', 'El Tiempo', 'er', 'rere', '2021-07-02', 'Medellin', 2, 33),
(26, 'Oscar Agudelo', 'Prueba1', 'Revista', '000584662', 'El Tiempo', '2', '90', '2021-08-20', 'Cucuta', 1, 33),
(27, 'Oscar Agudelo', 'IMMOBILIZATION OF Β-GLUCOSIDASE IN MODIFIED FAUJASITE SUPPORTS AIMING THE BIOENERGY PRODUCTION', 'Revista', '000584662', 'El Tiempo', '2', '55', '2021-02-10', 'Cucuta', 2, 33),
(31, 'ass', '', 's', 's', 's', 'asa', '3', '', '', 1, 33),
(32, 'n', '', 'n', 'n', 'n', 'k', '8', '', '', 2, 33),
(33, '2sadasdasd', '', 'asd', 'asd', 'asd', 'asdasd', '234', '', '', 1, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semillero`
--

CREATE TABLE `semillero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `sigla` varchar(45) NOT NULL,
  `fecha_creacion` varchar(45) NOT NULL,
  `aval_dic_grupo` tinyint(4) DEFAULT NULL,
  `aval_dic_sem` tinyint(4) DEFAULT NULL,
  `aval_dic_unidad` tinyint(4) DEFAULT NULL,
  `grupo_investigacion_id` int(11) NOT NULL,
  `departamento` varchar(45) NOT NULL,
  `facultad` int(11) NOT NULL,
  `plan_estudios` int(11) NOT NULL,
  `ubicacion` varchar(247) DEFAULT NULL,
  `stado` int(11) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semillero`
--

INSERT INTO `semillero` (`id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `departamento`, `facultad`, `plan_estudios`, `ubicacion`, `stado`, `observacion`) VALUES
(4, 'GRUPO ACADEMICO DE VESTIGACIONES AGROBIOTECNOLOGICAS', 'GAIAB', '2021-06-08', 0, 1, 0, 1, '7', 2, 1, 'Cucuta(Patios)', 1, NULL),
(33, 'GRUPO ACADÉMICO DE INVESTIGACIONES AGROBIOTECNOLOGICAS', 'SEMINCO2', '2021-07-21', 0, 1, 0, 1, '7', 2, 4, 'Cucuta(Patios).', NULL, NULL),
(34, 'Semillero de investigacion de seguridad de la informacion', 'sisi', '2021-07-31', 1, 0, 0, 5, '3', 1, 2, NULL, NULL, NULL),
(35, 'GRUPO ACADÉMICO DE INVESTIGACIONES AGROBIOTECNOLOGICAS', 'SEMINCO2', '2021-08-08', 0, 0, 0, 1, '5', 1, 1, NULL, NULL, NULL),
(36, 'FIN DE SEMANA', 'SEMINCO2', '2021-08-07', 0, 0, 0, 1, '3', 1, 2, NULL, NULL, NULL),
(38, 'CICLO VII', 'GAIAB', '2021-08-08', 0, 0, 0, 1, '3', 1, 1, NULL, NULL, NULL),
(41, 'GRUPO ACADÉMICO DE INVESTIGACIONES AGROBIOTECNOLOGICAS', 'SEMINCO2', '2021-08-10', 0, 0, 0, 1, '3', 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `semillero_detalle`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `semillero_detalle` (
`id` int(11)
,`nombre` varchar(200)
,`sigla` varchar(45)
,`fecha_creacion` varchar(45)
,`aval_dic_grupo` tinyint(4)
,`aval_dic_sem` tinyint(4)
,`aval_dic_unidad` tinyint(4)
,`grupo_investigacion_id` int(11)
,`gi_nombre` varchar(200)
,`departamento` varchar(45)
,`dpto_d` varchar(200)
,`facultad` int(11)
,`fdescrip` varchar(45)
,`plan_estudios` int(11)
,`pe_descrip` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `semillero_doc`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `semillero_doc` (
`id` int(11)
,`nombre` varchar(200)
,`sigla` varchar(45)
,`fecha_creacion` varchar(45)
,`grupo_investigacion_id` int(11)
,`departamento` varchar(45)
,`facultad` int(11)
,`plan_estudios` int(11)
,`tutor` int(11)
,`nombreD` varchar(45)
,`correo` varchar(45)
,`password` varchar(45)
,`stado` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semillero_otras_actividades`
--

CREATE TABLE `semillero_otras_actividades` (
  `id` int(11) NOT NULL,
  `semillero_id` int(11) NOT NULL,
  `otras_actividades_proy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `sem_docente_stados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `sem_docente_stados` (
`id` int(11)
,`nombre` varchar(200)
,`sigla` varchar(45)
,`fecha_creacion` varchar(45)
,`grupo_investigacion_id` int(11)
,`departamento` varchar(45)
,`facultad` int(11)
,`plan_estudios` int(11)
,`tutor` int(11)
,`nombreD` varchar(45)
,`correo` varchar(45)
,`password` varchar(45)
,`stado` int(11)
,`aval_dic_sem` tinyint(4)
,`aval_dic_grupo` tinyint(4)
,`aval_dic_unidad` tinyint(4)
,`grupo_investigacion_nomb` varchar(200)
,`estado_per` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sem_linea_investigacion`
--

CREATE TABLE `sem_linea_investigacion` (
  `id` int(11) NOT NULL,
  `semillero_id` int(11) NOT NULL,
  `linea_investigacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sem_linea_investigacion`
--

INSERT INTO `sem_linea_investigacion` (`id`, `semillero_id`, `linea_investigacion_id`) VALUES
(5, 2, 39),
(6, 4, 39),
(14, 4, 61),
(15, 4, 13),
(50, 33, 39),
(51, 41, 7),
(52, 41, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_horas`
--

CREATE TABLE `solicitud_horas` (
  `id` int(11) NOT NULL,
  `anio` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `horas_catedra` int(11) DEFAULT NULL,
  `horas_planta` int(11) DEFAULT NULL,
  `horas_solicitadas` int(11) DEFAULT NULL,
  `id_semillero` int(11) DEFAULT NULL,
  `id_docente` tinyint(4) DEFAULT NULL,
  `vb_representante` varchar(50) NOT NULL DEFAULT 'En tramite'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud_horas`
--

INSERT INTO `solicitud_horas` (`id`, `anio`, `semestre`, `horas_catedra`, `horas_planta`, `horas_solicitadas`, `id_semillero`, `id_docente`, `vb_representante`) VALUES
(42, 2021, 1, NULL, NULL, NULL, 4, 20, 'Autorizada'),
(43, 2021, 2, NULL, NULL, NULL, 4, 20, 'Rechazada'),
(44, 2023, 2, NULL, NULL, NULL, 4, 20, 'En tramite'),
(47, 2021, 1, NULL, NULL, NULL, 33, 93, 'Rechazada'),
(48, 2027, 1, NULL, NULL, NULL, 33, 93, 'Rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_horas_financiado`
--

CREATE TABLE `solicitud_horas_financiado` (
  `id` int(11) NOT NULL,
  `nombre_proyecto` varchar(255) NOT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  `vb_director_grupo` varchar(45) NOT NULL,
  `vb_representante_facultad` varchar(45) NOT NULL,
  `fecha_solicitud` date DEFAULT current_timestamp(),
  `fecha_ultimo_informe` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud_horas_financiado`
--

INSERT INTO `solicitud_horas_financiado` (`id`, `nombre_proyecto`, `id_proyecto`, `id_contrato`, `vb_director_grupo`, `vb_representante_facultad`, `fecha_solicitud`, `fecha_ultimo_informe`) VALUES
(4, 'Proyecto prueba', 15, 123, 'En tramite', 'Aprobado por Representante de Facultad', '2021-06-14', '2021-05-05'),
(5, 'Proyecto de prueba Representante Facultad', 35, 35, 'En trámite', 'Aprobado por Representante de Facultad', '2021-08-04', '2021-08-04'),
(6, 'Proyecto de prueba Representante Facultad', 35, 35, 'En trámite', 'En trámite', '2021-08-04', '2021-08-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_horas_tutor`
--

CREATE TABLE `solicitud_horas_tutor` (
  `id` int(11) NOT NULL,
  `nombre_docente` varchar(45) NOT NULL,
  `nombre_convenio` varchar(45) NOT NULL,
  `grupo_investigacion` varchar(45) NOT NULL,
  `nombre_propuesta` varchar(45) NOT NULL,
  `fecha_inicio_joven` varchar(45) NOT NULL,
  `horas_solicitadas` varchar(45) NOT NULL,
  `numero_acta` varchar(45) NOT NULL,
  `tipo_tutor` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `fecha_solicitud` date DEFAULT current_timestamp(),
  `vb_director_grupo` varchar(45) NOT NULL,
  `vb_representante_facultad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud_horas_tutor`
--

INSERT INTO `solicitud_horas_tutor` (`id`, `nombre_docente`, `nombre_convenio`, `grupo_investigacion`, `nombre_propuesta`, `fecha_inicio_joven`, `horas_solicitadas`, `numero_acta`, `tipo_tutor`, `semestre`, `fecha_solicitud`, `vb_director_grupo`, `vb_representante_facultad`) VALUES
(1, '123', '123', '123', '123', '0123-03-12', '4', '123', 'Cátedra', '2020-2', '2021-06-14', 'En tramite', 'En tramite'),
(2, '123', '123', '123', '123', '0123-03-12', '4', '123', 'Cátedra', '2020-2', '2021-06-14', 'En tramite', 'En tramite'),
(3, 'Docente de prueba ', 'Convenio de prueba', 'g1', 'n1', '3212-03-12', '45', 'sd12', 'Planta', '2020-2', '2021-06-14', 'En tramite', 'En tramite'),
(4, 'Prueba 1 docente', 'Convenio de prueba', '123', '123', '3212-03-12', '4', '123', 'Cátedra', '2020-2', '2021-06-14', 'En tramite', 'En tramite'),
(5, 'Inserción prueba', 'Inserción prueba', 'Inserción prueba', 'Inserción prueba', '2021-06-11', '5', 'Inserción prueba', 'Cátedra', '2021-2', '2021-06-18', 'En tramite', 'En tramite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_docuemnto`
--

CREATE TABLE `tipo_docuemnto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_docuemnto`
--

INSERT INTO `tipo_docuemnto` (`id`, `descripcion`) VALUES
(1, 'TARJETA DE IDENTIDAD'),
(2, 'CEDULA'),
(3, 'PASAPORTE'),
(4, 'REGISTRO CIVIL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ponencias`
--

CREATE TABLE `tipo_ponencias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_ponencias`
--

INSERT INTO `tipo_ponencias` (`id`, `nombre`) VALUES
(1, 'CONFERENCIA'),
(2, 'CONGRESO'),
(3, 'SEMINARIO'),
(4, 'SIMPOSIO'),
(5, 'COMUNICACION'),
(6, 'OTRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proyecto`
--

CREATE TABLE `tipo_proyecto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `proyectos_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_publicaciones`
--

CREATE TABLE `tipo_publicaciones` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_publicaciones`
--

INSERT INTO `tipo_publicaciones` (`id`, `descripcion`, `estado`) VALUES
(6, 'ARTICULO CIENTIFICO', 1),
(7, 'ARTICULO EN REVISTA DE DIVULGACION', 1),
(8, 'PERIODICO DE NOTICIAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vinculacion`
--

CREATE TABLE `tipo_vinculacion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `horas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_vinculacion`
--

INSERT INTO `tipo_vinculacion` (`id`, `descripcion`, `horas`) VALUES
(1, 'PLANTA', 5),
(2, 'CATEDRA', 4),
(3, 'TEMPORAL', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulos`
--

CREATE TABLE `titulos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `universidad` varchar(200) DEFAULT NULL,
  `docente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `titulos`
--

INSERT INTO `titulos` (`id`, `descripcion`, `universidad`, `docente_id`) VALUES
(1, 'magister en xxxx', 'ufps', 1),
(2, 'asddas', 'asdasd', 1),
(4, 'MAGISTER EN CIENCIAS NATURALES', 'UFPS', 3),
(6, 'ESPECIALIZACION EN GESTION DE PROYECTO', 'UNIVERSIDAD LIBRE', 3),
(7, 'unisimon', 'magister', 3),
(20, 'Diplomado en didáctica y pedagogía', 'UFPS', 36),
(21, 'magister en operaciones', 'ufps', 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso_equipos`
--

CREATE TABLE `uso_equipos` (
  `id` int(11) NOT NULL,
  `equipo` varchar(45) NOT NULL,
  `proyecto` varchar(45) NOT NULL,
  `otro_proyecto` varchar(45) DEFAULT NULL,
  `uso_posterior` varchar(45) NOT NULL,
  `id_informe_gestion_financiado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `uso_equipos`
--

INSERT INTO `uso_equipos` (`id`, `equipo`, `proyecto`, `otro_proyecto`, `uso_posterior`, `id_informe_gestion_financiado`) VALUES
(1, 'ASD', 'ASD', 'ASD', 'ASD', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tokenCaducidad` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_clave` varchar(255) DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT 1 COMMENT '1 - SIN ASIGNAR 2 - Administrador 3 - SuperAdmin 4- Docente 5 - ESTUDIANTE',
  `estado` int(11) NOT NULL DEFAULT 0 COMMENT '0 deshablitado - 1 habilitado',
  `observacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `persona_id`, `password`, `tokenCaducidad`, `token`, `token_clave`, `rol`, `estado`, `observacion`) VALUES
(2, 2, '5f4dcc3b5aa765d61d8327deb882cf99', '2021/08/10 10:51:35', '$2y$10$G8NfauHsiIbgZ218O4ga4eHcLV4.zeWUEjsx4NQlkon7jv4uZnsmK', NULL, 2, 1, NULL),
(15, 4, 'g9GAHE2', NULL, NULL, NULL, 4, 1, NULL),
(18, 113, 'a38e7e0cc0b6f423313dedfb7fd5e40d', NULL, NULL, NULL, 4, 1, ''),
(19, 109, 'e7b8cf1ab428f8a7343f6b396cac706c', NULL, NULL, NULL, 1, 1, NULL),
(20, 110, 'fd820a2b4461bddd116c1518bc4b0f77', NULL, NULL, NULL, 1, 1, NULL),
(21, 111, 'af56cfbf97f4f5161e876c7b2eb4689d', NULL, NULL, NULL, 1, 1, NULL),
(23, 112, '313186608fcf5720d6513cdfcaf8f632', NULL, NULL, NULL, 1, 1, NULL),
(27, 128, '572eea9c36eacaf63fe9d4529e53842e', NULL, NULL, NULL, 4, 1, NULL),
(37, 93, '202cb962ac59075b964b07152d234b70', '2021/08/10 04:03:50', '$2y$10$sIWI4T.HuG7236x9JunMk.hjPjvq5i1HPLopUASQ0HG5QiEQpcoli', NULL, 4, 1, NULL),
(38, 178, 'e1f34e39fd71e36e64afa62bc072ee8c', '2021/08/10 19:39:00', '$2y$10$58gMpkQp7.pCzSjHq/j.AuqKGM4HyS00voOsLP/Er/n07Z9FzhNry', NULL, 4, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura para la vista `data_seme`
--
DROP TABLE IF EXISTS `data_seme`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `data_seme`  AS SELECT `id` AS `id`, `nombre` AS `nombre`, `sigla` AS `sigla`, `fecha_creacion` AS `fecha_creacion`, `aval_dic_grupo` AS `aval_dic_grupo`, `aval_dic_sem` AS `aval_dic_sem`, `aval_dic_unidad` AS `aval_dic_unidad`, `grupo_investigacion_id` AS `grupo_investigacion_id`, `grupo_investigacion`.`nombre` AS `gi_nombre`, `departamento` AS `departamento`, `departamento`.`descripcion` AS `dpto_d`, `facultad` AS `facultad`, `facultad`.`descripcion` AS `fdescrip`, `plan_estudios` AS `plan_estudios`, `plan_estudios`.`descripcion` AS `pe_descrip`, `ubicacion` AS `ubicacionSemillero`, `persona`.`id` AS `persona_id`, `persona`.`nombre` AS `nombreD`, `persona`.`telefono` AS `telefono`, `persona`.`correo` AS `correo`, `usuarios`.`password` AS `password`, `usuarios`.`token` AS `token`, `usuarios`.`rol` AS `rol`, `usuarios`.`estado` AS `estado`, `docente`.`tipo_vinculacion_id` AS `tipo_vinculacion_id`, `tipo_vinculacion`.`descripcion` AS `descripcion`, `docente`.`id` AS `id_docente`, `docente`.`ubicacion` AS `ubicacionDocente` FROM (((((((((`semillero` join `grupo_investigacion` on(`grupo_investigacion`.`id` = `grupo_investigacion_id`)) join `departamento` on(`departamento` = `departamento`.`id`)) join `facultad` on(`facultad`.`id` = `facultad`)) join `plan_estudios` on(`plan_estudios`.`id` = `plan_estudios`)) join `persona_has_semillero` on(`persona_has_semillero`.`semillero_id` = `id`)) join `persona` on(`persona_has_semillero`.`persona_id` = `persona`.`id`)) join `docente` on(`persona`.`id` = `docente`.`persona_id`)) join `tipo_vinculacion` on(`docente`.`tipo_vinculacion_id` = `tipo_vinculacion`.`id`)) join `usuarios` on(`persona`.`id` = `usuarios`.`persona_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `datos_planA`
--
DROP TABLE IF EXISTS `datos_planA`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `datos_planA`  AS SELECT `pli`.`id` AS `id`, `pli`.`proyectos_id` AS `proyectos_id`, `proyectos`.`titulo` AS `titulo`, `pli`.`linea_investigacion_id` AS `linea_investigacion_id`, `linea_investigacion`.`descripcion` AS `descripcion`, `id` AS `id_semillero`, `nombre` AS `nombre`, `pli`.`responsable` AS `responsable`, `plan_accion`.`id` AS `id_plan_Ac`, `plan_accion`.`semestre` AS `semestre`, `plan_accion`.`ano` AS `ano`, `plan_accion`.`stado` AS `estado` FROM ((((`proy_lineas_invest` `pli` join `proyectos` on(`proyectos`.`id` = `pli`.`proyectos_id`)) join `semillero` on(`id` = `proyectos`.`semillero_id`)) join `linea_investigacion` on(`linea_investigacion`.`id` = `pli`.`linea_investigacion_id`)) join `plan_accion` on(`plan_accion`.`semillero_id` = `id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `estudianteV`
--
DROP TABLE IF EXISTS `estudianteV`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `estudianteV`  AS SELECT `e`.`id` AS `id`, `persona`.`nombre` AS `nombre`, `e`.`num_documento` AS `num_documento`, `e`.`programa_academico` AS `programa_academico`, `e`.`codigo` AS `codigo`, `e`.`semestre` AS `semestre`, `persona`.`correo` AS `correo`, `e`.`persona_id` AS `persona_id`, `e`.`tipo_docuemnto_id` AS `tipo_docuemnto_id` FROM (`estudiante` `e` join `persona` on(`persona`.`id` = `e`.`persona_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `estudiante_semi`
--
DROP TABLE IF EXISTS `estudiante_semi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `estudiante_semi`  AS SELECT `persona_has_semillero`.`id` AS `id`, `persona`.`nombre` AS `nombre`, `estudiante`.`num_documento` AS `num_documento`, `estudiante`.`programa_academico` AS `programa_academico`, `estudiante`.`codigo` AS `codigo`, `estudiante`.`semestre` AS `semestre`, `persona`.`correo` AS `correo`, `persona_has_semillero`.`persona_id` AS `persona_id`, `persona`.`telefono` AS `telefono`, `persona_has_semillero`.`semillero_id` AS `semillero_id`, `estudiante`.`tipo_docuemnto_id` AS `tipo_docuemnto_id` FROM (((`persona_has_semillero` join `persona` on(`persona`.`id` = `persona_has_semillero`.`persona_id`)) join `semillero` on(`id` = `persona_has_semillero`.`semillero_id`)) join `estudiante` on(`estudiante`.`persona_id` = `persona`.`id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `lineasSemillero_id`
--
DROP TABLE IF EXISTS `lineasSemillero_id`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `lineasSemillero_id`  AS SELECT `se`.`id` AS `id`, `se`.`semillero_id` AS `semillero_id`, `se`.`linea_investigacion_id` AS `linea_investigacion_id`, `linea_investigacion`.`descripcion` AS `lineasD`, `disciplina`.`descripcion` AS `disciplina_desc`, `area`.`descripcion` AS `areaD` FROM (((`sem_linea_investigacion` `se` join `linea_investigacion` on(`linea_investigacion`.`id` = `se`.`linea_investigacion_id`)) join `disciplina` on(`disciplina`.`id` = `linea_investigacion`.`disciplina_id`)) join `area` on(`area`.`id` = `disciplina`.`area_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `LoginUser`
--
DROP TABLE IF EXISTS `LoginUser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `LoginUser`  AS SELECT `p`.`id` AS `id`, `p`.`nombre` AS `nombre`, `p`.`telefono` AS `telefono`, `p`.`correo` AS `correo`, `u`.`persona_id` AS `persona_id`, `u`.`password` AS `password`, `u`.`rol` AS `rol`, `u`.`estado` AS `estado`, `p`.`tipo_usuario` AS `tipo_usuario`, `p`.`perfiles_id` AS `perfiles_id` FROM (`usuarios` `u` join `persona` `p` on(`p`.`id` = `u`.`persona_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `pares_academ`
--
DROP TABLE IF EXISTS `pares_academ`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `pares_academ`  AS SELECT `ps`.`id` AS `id`, `persona`.`nombre` AS `nombre`, `pares_academicos`.`numero_docuemnto` AS `num_documento`, `pares_academicos`.`inst_empresa` AS `inst_empresa`, `persona`.`correo` AS `correo`, `persona`.`telefono` AS `telefono`, `ps`.`persona_id` AS `persona_id`, `ps`.`semillero_id` AS `semillero_id`, `pares_academicos`.`tipo_docuemnto_id` AS `tipo_docuemnto_id` FROM ((`persona_has_semillero` `ps` join `persona` on(`persona`.`id` = `ps`.`persona_id`)) join `pares_academicos` on(`pares_academicos`.`persona_id` = `persona`.`id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `persona_login`
--
DROP TABLE IF EXISTS `persona_login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `persona_login`  AS SELECT `ps`.`semillero_id` AS `id`, `p`.`nombre` AS `nombre`, `p`.`telefono` AS `telefono`, `p`.`correo` AS `correo`, `u`.`persona_id` AS `persona_id`, `u`.`password` AS `password`, `u`.`rol` AS `rol`, `u`.`estado` AS `estado`, `p`.`tipo_usuario` AS `tipo_usuario`, `p`.`perfiles_id` AS `perfiles_id` FROM ((`usuarios` `u` join `persona` `p` on(`p`.`id` = `u`.`persona_id`)) join `persona_has_semillero` `ps` on(`ps`.`persona_id` = `p`.`id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `proyec_id_lineaInv`
--
DROP TABLE IF EXISTS `proyec_id_lineaInv`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `proyec_id_lineaInv`  AS SELECT `pl`.`id` AS `id`, `pl`.`proyectos_id` AS `proyectos_id`, `pl`.`linea_investigacion_id` AS `linea_investigacion_id`, `proyectos`.`titulo` AS `titulo`, `proyectos`.`investigador` AS `investigador`, `proyectos`.`obj_general` AS `obj_general`, `proyectos`.`fecha_ini` AS `fecha_ini`, `proyectos`.`fecha_fin` AS `fecha_fin`, `proyectos`.`producto` AS `producto`, `pl`.`responsable` AS `responsable` FROM (`proy_lineas_invest` `pl` join `proyectos` on(`proyectos`.`id` = `pl`.`proyectos_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `semillero_detalle`
--
DROP TABLE IF EXISTS `semillero_detalle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `semillero_detalle`  AS SELECT `id` AS `id`, `nombre` AS `nombre`, `sigla` AS `sigla`, `fecha_creacion` AS `fecha_creacion`, `aval_dic_grupo` AS `aval_dic_grupo`, `aval_dic_sem` AS `aval_dic_sem`, `aval_dic_unidad` AS `aval_dic_unidad`, `grupo_investigacion_id` AS `grupo_investigacion_id`, `grupo_investigacion`.`nombre` AS `gi_nombre`, `departamento` AS `departamento`, `departamento`.`descripcion` AS `dpto_d`, `facultad` AS `facultad`, `facultad`.`descripcion` AS `fdescrip`, `plan_estudios` AS `plan_estudios`, `plan_estudios`.`descripcion` AS `pe_descrip` FROM ((((`semillero` join `grupo_investigacion` on(`grupo_investigacion`.`id` = `grupo_investigacion_id`)) join `departamento` on(`departamento` = `departamento`.`id`)) join `facultad` on(`facultad`.`id` = `facultad`)) join `plan_estudios` on(`plan_estudios`.`id` = `plan_estudios`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `semillero_doc`
--
DROP TABLE IF EXISTS `semillero_doc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `semillero_doc`  AS SELECT `ps`.`semillero_id` AS `id`, `nombre` AS `nombre`, `sigla` AS `sigla`, `fecha_creacion` AS `fecha_creacion`, `grupo_investigacion_id` AS `grupo_investigacion_id`, `departamento` AS `departamento`, `facultad` AS `facultad`, `plan_estudios` AS `plan_estudios`, `persona`.`id` AS `tutor`, `persona`.`nombre` AS `nombreD`, `persona`.`correo` AS `correo`, `docente`.`password` AS `password`, `stado` AS `stado` FROM (((`persona_has_semillero` `ps` join `persona` on(`persona`.`id` = `ps`.`persona_id`)) join `docente` on(`docente`.`persona_id` = `persona`.`id`)) join `semillero` on(`id` = `ps`.`semillero_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `sem_docente_stados`
--
DROP TABLE IF EXISTS `sem_docente_stados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `sem_docente_stados`  AS SELECT `ps`.`semillero_id` AS `id`, `nombre` AS `nombre`, `sigla` AS `sigla`, `fecha_creacion` AS `fecha_creacion`, `grupo_investigacion_id` AS `grupo_investigacion_id`, `departamento` AS `departamento`, `facultad` AS `facultad`, `plan_estudios` AS `plan_estudios`, `persona`.`id` AS `tutor`, `persona`.`nombre` AS `nombreD`, `persona`.`correo` AS `correo`, `docente`.`password` AS `password`, `stado` AS `stado`, `aval_dic_sem` AS `aval_dic_sem`, `aval_dic_grupo` AS `aval_dic_grupo`, `aval_dic_unidad` AS `aval_dic_unidad`, `grupo_investigacion`.`nombre` AS `grupo_investigacion_nomb`, `usuarios`.`estado` AS `estado_per` FROM (((((`persona_has_semillero` `ps` join `persona` on(`persona`.`id` = `ps`.`persona_id`)) join `docente` on(`docente`.`persona_id` = `persona`.`id`)) join `semillero` on(`id` = `ps`.`semillero_id`)) join `usuarios` on(`usuarios`.`persona_id` = `persona`.`id`)) join `grupo_investigacion` on(`grupo_investigacion_id` = `grupo_investigacion`.`id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_actividades_proyectos2_idx` (`proyectos_id`);

--
-- Indices de la tabla `actividades_jovenes`
--
ALTER TABLE `actividades_jovenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencia_eventos`
--
ALTER TABLE `asistencia_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_capacitaciones_semillero1_idx` (`semillero_id`);

--
-- Indices de la tabla `capacitaciones_Proyectos`
--
ALTER TABLE `capacitaciones_Proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coinvestigadores_proyectos_terminados1_idx` (`proyectos_id`);

--
-- Indices de la tabla `compromisos_equipo`
--
ALTER TABLE `compromisos_equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `concepto_cumplimiento`
--
ALTER TABLE `concepto_cumplimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cumplimiento`
--
ALTER TABLE `cumplimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cumplimiento_acompanamiento`
--
ALTER TABLE `cumplimiento_acompanamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cumplimiento_cronograma`
--
ALTER TABLE `cumplimiento_cronograma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cumplimiento_objetivos`
--
ALTER TABLE `cumplimiento_objetivos`
  ADD PRIMARY KEY (`id`,`objetivos_propuestos`);

--
-- Indices de la tabla `datos_adicionalesS`
--
ALTER TABLE `datos_adicionalesS`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_departamento_facultad1_idx` (`facultad_id`);

--
-- Indices de la tabla `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_disciplina_area1_idx` (`area_id`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docente_persona1_idx` (`persona_id`),
  ADD KEY `fk_docente_tipo_vinculacion1_idx` (`tipo_vinculacion_id`);

--
-- Indices de la tabla `estado_proyecto`
--
ALTER TABLE `estado_proyecto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estudiante_persona1_idx` (`persona_id`),
  ADD KEY `fk_estudiante_tipo_docuemnto1_idx` (`tipo_docuemnto_id`);

--
-- Indices de la tabla `estudiante_proyecto`
--
ALTER TABLE `estudiante_proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estudiante_proyecto_proyectos1_idx` (`proyectos_id`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fuente_financiacion`
--
ALTER TABLE `fuente_financiacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fuente_financiacion_proyectos_terminados1_idx` (`proyectos_terminados_id`);

--
-- Indices de la tabla `grupo_has_participante`
--
ALTER TABLE `grupo_has_participante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupo_has_participante_grupo_investigacion1_idx` (`grupo_investigacion_id`);

--
-- Indices de la tabla `grupo_has_proyecto`
--
ALTER TABLE `grupo_has_proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupo_has_proyecto_grupo_investigacion1_idx` (`grupo_investigacion_id`),
  ADD KEY `fk_grupo_has_proyecto_proyectos_terminados1_idx` (`proyectos_terminados_id`);

--
-- Indices de la tabla `grupo_investigacion`
--
ALTER TABLE `grupo_investigacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_linea_investigacion`
--
ALTER TABLE `grupo_linea_investigacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupo_linea_investigacion_grupo_investigacion1_idx` (`grupo_investigacion_id`),
  ADD KEY `fk_grupo_linea_investigacion_linea_investigacion1_idx` (`linea_investigacion_id`);

--
-- Indices de la tabla `grupo_solicitud_horas`
--
ALTER TABLE `grupo_solicitud_horas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupo_solicitud_horas_solicitud_horas1_idx` (`solicitud_horas_id`),
  ADD KEY `fk_grupo_solicitud_horas_grupo_investigacion1_idx` (`grupo_investigacion_id`);

--
-- Indices de la tabla `impactos_sociales`
--
ALTER TABLE `impactos_sociales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informes_gestion_financiado`
--
ALTER TABLE `informes_gestion_financiado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informe_gestion_jovenes`
--
ALTER TABLE `informe_gestion_jovenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `investigador`
--
ALTER TABLE `investigador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_linea_investigacion_disciplina1_idx` (`disciplina_id`);

--
-- Indices de la tabla `linea_proyecto_plan`
--
ALTER TABLE `linea_proyecto_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `otras_actividades`
--
ALTER TABLE `otras_actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_otras_actividades_semillero1_idx` (`semillero_id`);

--
-- Indices de la tabla `otras_actividades_proy`
--
ALTER TABLE `otras_actividades_proy`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pares_academicos`
--
ALTER TABLE `pares_academicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pares_academicos_persona1_idx` (`persona_id`),
  ADD KEY `fk_pares_academicos_tipo_docuemnto1_idx` (`tipo_docuemnto_id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles_has_modulos`
--
ALTER TABLE `perfiles_has_modulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_perfiles_has_modulos_activos_modulos_activos1_idx` (`modulos_activos_id`),
  ADD KEY `fk_perfiles_has_modulos_activos_perfiles1_idx` (`perfiles_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona_has_grupo`
--
ALTER TABLE `persona_has_grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_persona_has_grupo_grupo_investigacion1_idx` (`grupo_investigacion_id`),
  ADD KEY `fk_persona_has_grupo_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `persona_has_semillero`
--
ALTER TABLE `persona_has_semillero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_persona_has_semillero_semillero1_idx` (`semillero_id`),
  ADD KEY `fk_persona_has_semillero_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `plan_accion`
--
ALTER TABLE `plan_accion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_plan_accion_semillero1_idx` (`semillero_id`);

--
-- Indices de la tabla `plan_accion_has_proyectos`
--
ALTER TABLE `plan_accion_has_proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_plan_accion_has_proyectos_proyectos1_idx` (`proyectos_id`),
  ADD KEY `fk_plan_accion_has_proyectos_plan_accion1_idx` (`plan_accion_id`);

--
-- Indices de la tabla `plan_estudios`
--
ALTER TABLE `plan_estudios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_plan_estudios_departamento1_idx` (`departamento_id`);

--
-- Indices de la tabla `ponencias`
--
ALTER TABLE `ponencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ponencias_tipo_ponencias1_idx` (`tipo_ponencias_id`),
  ADD KEY `fk_ponencias_semillero1_idx` (`semillero_id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proyectos_semillero1_idx` (`semillero_id`),
  ADD KEY `fk_proyectos_grupo_investigacion1_idx` (`grupo_investigacion_id`),
  ADD KEY `fk_proyectos_terminados_tipo_proyecto1` (`tipo_proyecto_id`);

--
-- Indices de la tabla `proy_lineas_invest`
--
ALTER TABLE `proy_lineas_invest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lineas_invest_proyectos1_idx` (`proyectos_id`),
  ADD KEY `fk_proy_lineas_invest_linea_investigacion1_idx` (`linea_investigacion_id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_publicaciones_tipo_publicaciones1_idx` (`tipo_publicaciones_id`),
  ADD KEY `fk_publicaciones_semillero1_idx` (`semillero_id`);

--
-- Indices de la tabla `semillero`
--
ALTER TABLE `semillero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_semillero_grupo_investigacion1_idx` (`grupo_investigacion_id`);

--
-- Indices de la tabla `semillero_otras_actividades`
--
ALTER TABLE `semillero_otras_actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_semillero_has_otras_actividades_proy_otras_actividades_p_idx` (`otras_actividades_proy_id`),
  ADD KEY `fk_semillero_has_otras_actividades_proy_semillero1_idx` (`semillero_id`);

--
-- Indices de la tabla `sem_linea_investigacion`
--
ALTER TABLE `sem_linea_investigacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sem_linea_investigacion_semillero1_idx` (`semillero_id`),
  ADD KEY `fk_sem_linea_investigacion_linea_investigacion1_idx` (`linea_investigacion_id`);

--
-- Indices de la tabla `solicitud_horas`
--
ALTER TABLE `solicitud_horas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud_horas_financiado`
--
ALTER TABLE `solicitud_horas_financiado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud_horas_tutor`
--
ALTER TABLE `solicitud_horas_tutor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_docuemnto`
--
ALTER TABLE `tipo_docuemnto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_ponencias`
--
ALTER TABLE `tipo_ponencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_proyecto`
--
ALTER TABLE `tipo_proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_actividades_proyectos1` (`proyectos_id`);

--
-- Indices de la tabla `tipo_publicaciones`
--
ALTER TABLE `tipo_publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_vinculacion`
--
ALTER TABLE `tipo_vinculacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_titulos_docente1_idx` (`docente_id`);

--
-- Indices de la tabla `uso_equipos`
--
ALTER TABLE `uso_equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_administradores_persona1_idx` (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT de la tabla `actividades_jovenes`
--
ALTER TABLE `actividades_jovenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `asistencia_eventos`
--
ALTER TABLE `asistencia_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT de la tabla `capacitaciones_Proyectos`
--
ALTER TABLE `capacitaciones_Proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `compromisos_equipo`
--
ALTER TABLE `compromisos_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `concepto_cumplimiento`
--
ALTER TABLE `concepto_cumplimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cumplimiento`
--
ALTER TABLE `cumplimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cumplimiento_acompanamiento`
--
ALTER TABLE `cumplimiento_acompanamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cumplimiento_cronograma`
--
ALTER TABLE `cumplimiento_cronograma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cumplimiento_objetivos`
--
ALTER TABLE `cumplimiento_objetivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos_adicionalesS`
--
ALTER TABLE `datos_adicionalesS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `estado_proyecto`
--
ALTER TABLE `estado_proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `estudiante_proyecto`
--
ALTER TABLE `estudiante_proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `fuente_financiacion`
--
ALTER TABLE `fuente_financiacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `grupo_has_participante`
--
ALTER TABLE `grupo_has_participante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_has_proyecto`
--
ALTER TABLE `grupo_has_proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_investigacion`
--
ALTER TABLE `grupo_investigacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grupo_linea_investigacion`
--
ALTER TABLE `grupo_linea_investigacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_solicitud_horas`
--
ALTER TABLE `grupo_solicitud_horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `impactos_sociales`
--
ALTER TABLE `impactos_sociales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `informes_gestion_financiado`
--
ALTER TABLE `informes_gestion_financiado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `informe_gestion_jovenes`
--
ALTER TABLE `informe_gestion_jovenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `investigador`
--
ALTER TABLE `investigador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `linea_proyecto_plan`
--
ALTER TABLE `linea_proyecto_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `otras_actividades`
--
ALTER TABLE `otras_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `otras_actividades_proy`
--
ALTER TABLE `otras_actividades_proy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pares_academicos`
--
ALTER TABLE `pares_academicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perfiles_has_modulos`
--
ALTER TABLE `perfiles_has_modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `persona_has_grupo`
--
ALTER TABLE `persona_has_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona_has_semillero`
--
ALTER TABLE `persona_has_semillero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `plan_accion`
--
ALTER TABLE `plan_accion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `plan_accion_has_proyectos`
--
ALTER TABLE `plan_accion_has_proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `plan_estudios`
--
ALTER TABLE `plan_estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ponencias`
--
ALTER TABLE `ponencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `proy_lineas_invest`
--
ALTER TABLE `proy_lineas_invest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `semillero`
--
ALTER TABLE `semillero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `semillero_otras_actividades`
--
ALTER TABLE `semillero_otras_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sem_linea_investigacion`
--
ALTER TABLE `sem_linea_investigacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `solicitud_horas`
--
ALTER TABLE `solicitud_horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `solicitud_horas_financiado`
--
ALTER TABLE `solicitud_horas_financiado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `solicitud_horas_tutor`
--
ALTER TABLE `solicitud_horas_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_docuemnto`
--
ALTER TABLE `tipo_docuemnto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_ponencias`
--
ALTER TABLE `tipo_ponencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_proyecto`
--
ALTER TABLE `tipo_proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_publicaciones`
--
ALTER TABLE `tipo_publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_vinculacion`
--
ALTER TABLE `tipo_vinculacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `uso_equipos`
--
ALTER TABLE `uso_equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `fk_actividades_proyectos2` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD CONSTRAINT `fk_capacitaciones_semillero1` FOREIGN KEY (`semillero_id`) REFERENCES `semillero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_departamento_facultad1` FOREIGN KEY (`facultad_id`) REFERENCES `facultad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_disciplina_area1` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_docente_tipo_vinculacion1` FOREIGN KEY (`tipo_vinculacion_id`) REFERENCES `tipo_vinculacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estudiante_tipo_docuemnto1` FOREIGN KEY (`tipo_docuemnto_id`) REFERENCES `tipo_docuemnto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fuente_financiacion`
--
ALTER TABLE `fuente_financiacion`
  ADD CONSTRAINT `fk_fuente_financiacion_proyectos_terminados1` FOREIGN KEY (`proyectos_terminados_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo_has_participante`
--
ALTER TABLE `grupo_has_participante`
  ADD CONSTRAINT `fk_grupo_has_participante_grupo_investigacion1` FOREIGN KEY (`grupo_investigacion_id`) REFERENCES `grupo_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo_linea_investigacion`
--
ALTER TABLE `grupo_linea_investigacion`
  ADD CONSTRAINT `fk_grupo_linea_investigacion_grupo_investigacion1` FOREIGN KEY (`grupo_investigacion_id`) REFERENCES `grupo_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_linea_investigacion_linea_investigacion1` FOREIGN KEY (`linea_investigacion_id`) REFERENCES `linea_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo_solicitud_horas`
--
ALTER TABLE `grupo_solicitud_horas`
  ADD CONSTRAINT `fk_grupo_solicitud_horas_grupo_investigacion1` FOREIGN KEY (`grupo_investigacion_id`) REFERENCES `grupo_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_solicitud_horas_solicitud_horas1` FOREIGN KEY (`solicitud_horas_id`) REFERENCES `solicitud_horas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  ADD CONSTRAINT `fk_linea_investigacion_disciplina1` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `otras_actividades`
--
ALTER TABLE `otras_actividades`
  ADD CONSTRAINT `fk_otras_actividades_semillero1` FOREIGN KEY (`semillero_id`) REFERENCES `semillero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pares_academicos`
--
ALTER TABLE `pares_academicos`
  ADD CONSTRAINT `fk_pares_academicos_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pares_academicos_tipo_docuemnto1` FOREIGN KEY (`tipo_docuemnto_id`) REFERENCES `tipo_docuemnto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfiles_has_modulos`
--
ALTER TABLE `perfiles_has_modulos`
  ADD CONSTRAINT `fk_perfiles_has_modulos_activos_modulos_activos1` FOREIGN KEY (`modulos_activos_id`) REFERENCES `modulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perfiles_has_modulos_activos_perfiles1` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_has_grupo`
--
ALTER TABLE `persona_has_grupo`
  ADD CONSTRAINT `fk_persona_has_grupo_grupo_investigacion1` FOREIGN KEY (`grupo_investigacion_id`) REFERENCES `grupo_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_has_grupo_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_has_semillero`
--
ALTER TABLE `persona_has_semillero`
  ADD CONSTRAINT `fk_persona_has_semillero_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_persona_has_semillero_semillero1` FOREIGN KEY (`semillero_id`) REFERENCES `semillero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_accion`
--
ALTER TABLE `plan_accion`
  ADD CONSTRAINT `fk_plan_accion_semillero1` FOREIGN KEY (`semillero_id`) REFERENCES `semillero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plan_accion_has_proyectos`
--
ALTER TABLE `plan_accion_has_proyectos`
  ADD CONSTRAINT `fk_plan_accion_has_proyectos_plan_accion1` FOREIGN KEY (`plan_accion_id`) REFERENCES `plan_accion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_plan_accion_has_proyectos_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_estudios`
--
ALTER TABLE `plan_estudios`
  ADD CONSTRAINT `fk_plan_estudios_departamento1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ponencias`
--
ALTER TABLE `ponencias`
  ADD CONSTRAINT `fk_ponencias_semillero1` FOREIGN KEY (`semillero_id`) REFERENCES `semillero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ponencias_tipo_ponencias1` FOREIGN KEY (`tipo_ponencias_id`) REFERENCES `tipo_ponencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proy_lineas_invest`
--
ALTER TABLE `proy_lineas_invest`
  ADD CONSTRAINT `fk_lineas_invest_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proy_lineas_invest_linea_investigacion1` FOREIGN KEY (`linea_investigacion_id`) REFERENCES `linea_investigacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `semillero_otras_actividades`
--
ALTER TABLE `semillero_otras_actividades`
  ADD CONSTRAINT `fk_semillero_has_otras_actividades_proy_otras_actividades_proy1` FOREIGN KEY (`otras_actividades_proy_id`) REFERENCES `otras_actividades_proy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_semillero_has_otras_actividades_proy_semillero1` FOREIGN KEY (`semillero_id`) REFERENCES `semillero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
