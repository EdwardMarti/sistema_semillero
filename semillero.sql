-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-06-2021 a las 16:37:17
-- Versión del servidor: 10.3.27-MariaDB-cll-lve
-- Versión de PHP: 7.4.16

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
  `semestre` varchar(45) DEFAULT NULL,
  `fecha_reg` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `descripcion`, `proyectos_id`, `ano`, `semestre`, `fecha_reg`) VALUES
(31, 'Analizar los datos existentes', 32, '54', NULL, NULL),
(32, 'Entrevistar al los usuarios finales', 32, '54', NULL, NULL),
(33, 'Definir metodología de desarrollo', 32, '54', NULL, NULL),
(34, 'Introduccion a semilleros', 32, '', NULL, NULL),
(35, 'INTRODUCCION A SEMILLEROS', 32, '', NULL, NULL),
(36, 'actividades d', 32, '60', NULL, NULL),
(37, 'Introduccion a semillero', 32, '60', NULL, NULL),
(38, 'Introduccion a semillero 2', 32, '60', NULL, NULL),
(39, 'asdasdad', 32, '61', NULL, NULL),
(40, 'asdasdad', 32, '61', NULL, NULL),
(41, 'asdasdad', 32, '61', NULL, NULL),
(43, 'actividades d', 32, '62', NULL, NULL);

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
(11, 'ACTIVIDAD 2', 'PRODUCTO 2', '2022-2', 3);

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
-- Estructura de tabla para la tabla `capacitaciones`
--

CREATE TABLE `capacitaciones` (
  `id` int(11) NOT NULL,
  `tema` varchar(45) DEFAULT NULL,
  `docente` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cant_capacitados` varchar(45) DEFAULT NULL,
  `semillero_id` int(11) NOT NULL,
  `objetivo` varchar(45) DEFAULT NULL,
  `plan_accion_id` int(11) DEFAULT NULL,
  `fecha_reg` timestamp NULL DEFAULT current_timestamp(),
  `linea_id` int(11) DEFAULT NULL,
  `proy_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `capacitaciones`
--

INSERT INTO `capacitaciones` (`id`, `tema`, `docente`, `fecha`, `cant_capacitados`, `semillero_id`, `objetivo`, `plan_accion_id`, `fecha_reg`, `linea_id`, `proy_id`) VALUES
(23, '123123123', 'x', '2021-06-15', '21321', 4, '123123', 62, '2021-06-14 21:03:53', 39, 32);

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
  `nombre` varchar(45) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `tp_colaborador` int(11) NOT NULL COMMENT 'estudiante / coinvestigador',
  `proyectos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colaborador`
--

INSERT INTO `colaborador` (`id`, `nombre`, `codigo`, `tp_colaborador`, `proyectos_id`) VALUES
(8, 'nkjfnkj', 'jkjdnkjd', 2, 32),
(9, '333', 'asesor okay', 1, 33);

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
(1, 1, '123', '7', 'Director', 'Aprobado por Director de Departamento', '2021-06-14', 'En trámite'),
(2, 1, '123', '7', 'Director', '', '2021-06-14', 'En trámite'),
(3, 1, 'Alejandra Jaimes', '8', 'Director', 'Rechazado por Director de Departamento', '2021-06-14', 'En trámite'),
(4, 8, 'Alejandra 2', 'Medicion de CO2 en minas', 'Director', 'Aprobado por Director de Departamento', '2021-06-14', 'En trámite'),
(5, 33, 'Shirley', 'prueba 2', 'Director', 'Aprobado por Director de Departamento', '2021-06-14', 'En trámite');

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
(2, 'sdasdasd', 'asdasdasd', 'En trámite', '2021-06-13'),
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
(1, '123', 'ASD', '2021-1', 'Planeado', 7);

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
(1, 'ASD', 'ASD', 'ASD', 'ASD', 'ASD', 7);

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
,`titulo` varchar(45)
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
  `tipo_vinculacion_id` int(11) NOT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `persona_id`, `password`, `tipo_vinculacion_id`, `ubicacion`, `token`) VALUES
(3, 20, 'password', 2, 'fu 201 ufps', NULL);

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
(9, '1152478', '1', 'INGENIERIA DE AGRICOLA', 21, '2547524563', 1),
(10, '1152478', '1', 'INGENIERIA DE AGRICOLA', 22, '2547524563', 1),
(11, '1152478', '1', 'INGENIERIA DE AGRICOLA', 23, '2547524563', 1);

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
(5, 'nkjfnkj', 'jkjdnkjd', NULL, 32);

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
,`telefono` varchar(45)
,`persona_id` int(11)
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
(4, 'nkjfnkj', '3409283', 32);

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
  `novedades_proyecto` varchar(100) DEFAULT NULL,
  `conclusiones` varchar(100) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `estado_solicitud` varchar(45) NOT NULL,
  `fecha_solicitud` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `informes_gestion_financiado`
--

INSERT INTO `informes_gestion_financiado` (`id`, `id_proyecto`, `grupo_investigacion`, `facultad`, `representante_facultad`, `duracion_proyecto`, `novedades_proyecto`, `conclusiones`, `observaciones`, `estado_solicitud`, `fecha_solicitud`) VALUES
(8, 5, '123', '123', '123', '123', NULL, NULL, NULL, 'En trámite', '2021-06-14');

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
(2, 'Facultad de Prueba', 'Grupo de Prueba', 'Departamento de Prueba', 'Shirley Naranjo', 'Linea de prueba', 'Poncho martinez', 'Convenio #2145', 'Convocatoria # 12341', '2021-1', 'En trámite', '2021-06-14', 'En trámite', 'En trámite'),
(3, 'FACULTAD DE PRUEBA 3', 'GRUPO DE PRUEBA 3000', 'DEPARTAMENTO DE PRUEBA 12981203', 'ALEJANDRA DANIELA DEL PILAR', 'LINEA DE PRUEBA 56', 'SHIRLEY ANDREA', 'CONVENIO #56123', 'CONVOCATORIA # 1239812390', '2021-2', 'En trámite', '2021-06-14', 'Rechazado por Director de Departamento', 'En trámite');

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
(10, '123', '123', 'Director', NULL, 8);

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
(1, 10, 8, 46, '2', '2021', '2021-06-14 01:37:04'),
(2, 10, 8, 46, '2', '2021', '2021-06-14 01:38:56'),
(3, 10, 8, 46, '2', '2021', '2021-06-14 01:41:28'),
(4, 10, 8, 46, '2', '2021', '2021-06-14 01:48:25'),
(5, 10, 8, 46, '2', '2021', '2021-06-14 01:55:56'),
(6, 10, 8, 47, '2', '2021', '2021-06-14 01:59:53'),
(7, 7, 5, 50, '2', '2020', '2021-06-14 03:33:36'),
(8, 10, 8, 51, '2', '2020', '2021-06-14 04:32:04'),
(9, 39, 32, 62, '1', '2025', '2021-06-14 21:04:05'),
(10, 39, 32, 63, '1', '2020', '2021-06-14 21:19:25'),
(11, 39, 32, 64, '1', '2020', '2021-06-14 21:22:56');

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
  `nombre_proyecto` varchar(45) DEFAULT NULL,
  `nombre_actividad` varchar(45) DEFAULT NULL,
  `modalidad_participacion` varchar(45) DEFAULT NULL COMMENT 'Ponente/Asistente',
  `responsable` varchar(45) DEFAULT NULL,
  `fecha_realizacion` varchar(45) DEFAULT NULL,
  `producto` varchar(45) DEFAULT NULL COMMENT 'Ponencia/Articulo',
  `semillero_id` int(11) NOT NULL,
  `plan_accion_id` int(11) DEFAULT NULL,
  `linea_id` int(11) DEFAULT NULL,
  `proy_id` int(11) DEFAULT NULL,
  `porcentaje` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `proyect_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'SIN ASIGNAR');

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
  `perfiles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `telefono`, `correo`, `password`, `tipo_usuario`, `perfiles_id`) VALUES
(2, 'Cristian Salcedo', '3162499082', 'edward22069@gmail.com', NULL, NULL, 1),
(19, 'edward martinez', '5299999', 'edward22069@gmail.com', NULL, NULL, 1),
(20, 'SEIR ANTONIO SALAZAR MERCADO', '3125842542', 'danieljosecs@ufps.edu.co', NULL, NULL, 1),
(21, 'Cristian Salcedo', '31254846352', 'critia@ufps.edu.co', NULL, NULL, 1),
(22, 'Cristian Salcedo', '31254846352', 'critia@ufps.edu.co', NULL, NULL, 1),
(23, 'Cristian Salcedo', '31254846352', 'critia@ufps.edu.co', NULL, NULL, 1),
(24, 'Alejandra Jaimes', '3173173173', 'alejandra@ufps.edu.co', 'william', 'Joven Investigador', NULL);

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
(1, 2, 2),
(14, 20, 4);

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
  `dele` int(11) NOT NULL DEFAULT 1 COMMENT '0 activo 1 inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plan_accion`
--

INSERT INTO `plan_accion` (`id`, `semestre`, `ano`, `vbo_dirSemillero`, `vbo_dirGinvestigacion`, `vbo_facultaInv`, `semillero_id`, `stado`, `dele`) VALUES
(54, '1', '2021', 0, 0, 0, 4, 0, 1),
(55, '', '', 0, 0, 0, 4, 0, 1),
(56, '', '', 0, 0, 0, 4, 0, 1),
(57, '', '', 0, 0, 0, 4, 0, 1),
(58, '1', '2021', 0, 0, 0, 4, 0, 1),
(59, '1', '2021', 0, 0, 0, 4, 0, 1),
(60, '1', '2021', 0, 0, 0, 4, 0, 1),
(61, '1', '2021', 0, 0, 0, 4, 0, 1),
(62, '1', '2025', 0, 0, 0, 4, 0, 1),
(63, '1', '2020', 0, 0, 0, 4, 0, 1),
(64, '1', '2020', 0, 0, 0, 4, 0, 1);

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

--
-- Volcado de datos para la tabla `plan_accion_has_proyectos`
--

INSERT INTO `plan_accion_has_proyectos` (`id`, `plan_accion_id`, `proyectos_id`, `linea`, `semestre`, `ano`) VALUES
(50, 54, 32, 39, '1', '2021'),
(51, 55, 32, 39, '', ''),
(52, 56, 32, 39, '', ''),
(53, 57, 32, 39, '', ''),
(54, 58, 32, 39, '1', '2021'),
(55, 59, 32, 39, '1', '2021'),
(56, 60, 32, 39, '1', '2021'),
(57, 61, 32, 39, '1', '2021'),
(58, 62, 32, 39, '1', '2025'),
(59, 63, 32, 39, '1', '2020'),
(60, 64, 32, 39, '1', '2020');

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
(2, 'INGENIERIA DE SISTEMAS', 3);

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
(12, 'OXIDACIÓN AVANZADA DE AGUAS CON CONTENIDO DE PLAGUICIDAS MEDIANTE PERÓXIDO DE HIDRÓGENO ACTIVADO CON  BICARBONATO DE SODIO', '2021-06-02', ' VII SEMANA INTERNACIONAL DE CIENCIA, TECNOLOGÍA E INNOVACIÓN ', 'UFPS', 'Cucuta', 'UFPS', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
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
  `fecha_fin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `titulo`, `investigador`, `tipo_proyecto_id`, `tiempo_ejecucion`, `fecha_ini`, `resumen`, `obj_general`, `obj_especifico`, `resultados`, `costo_valor`, `producto`, `semillero_id`, `grupo_investigacion_id`, `tipo_proyecto`, `linea_inv_id`, `fecha_fin`) VALUES
(5, 'Creación VAIESOFT', 'Salvador', NULL, '2 meses', '2021-06-01', 'asdasd', 'ñlkl', NULL, 'ñlk', 'ñlk', 'ñlk', 2, 0, NULL, 7, '0000-00-00'),
(7, 'Gestión de entradas al parqueadero', 'Alejandra Barragán', NULL, '5 meses', '2021-06-01', '123123123', '12312331', NULL, '123123', '123123', '123123', 1, 1, NULL, 10, '0000-00-00'),
(8, 'Medicion de CO2 en minas', 'Oscar Enrique Cruz', 1, NULL, '2021-06-11', 'La medición de la temperatura del grano es la principal herramienta usada\r\npara supervisar condiciones de almacenaje tradicional (silos y celdas) por los\r\nestablecimientos rurales, acopios comerciales y la ', 'Una aproximación química del balance de CO2', 'Una aproximación de la dinámica de los procesos físicos.', 'El monitoreo periódico de la concentración CO2 se puede utilizar como\r\nherramienta para detectar un aumento en la actividad biológica en bolsas y\r\nrelacionarlo con procesos de descomposición del grano.\r\n', '1000000', 'Articulo', 3, 2, 1, 10, '2021-06-11'),
(32, 'nuevo', 'nsjss', NULL, '3 meses', '05/2021', 'jjkcndkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjcldknclsdnclsdkcnlksdnlsdncsdlknlscdsnclsdkcnsdlcknlsdkcnlkdnlcsnlckds', 'obj 1', 'obj 2\nobj 3', 'nckdnclsdknckldnlcsdnclkdsnclkdnclkdsnclkdsnclksdnclksdncldsncldksnclskdnclsdkcnsldcnsdljcdnjcsdjcndjnscldcnlsdkcnsdlkcnsdlk', '10000', NULL, NULL, NULL, NULL, 5, '08/2021'),
(33, 'prueba 2', 'sirve?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `proyec_id_lineaInv`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `proyec_id_lineaInv` (
`id` int(11)
,`proyectos_id` int(11)
,`linea_investigacion_id` int(11)
,`titulo` varchar(45)
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
(3, 32, 39, NULL);

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
(5, 'Oscar Agudelo', 'Desarrollo de una metodologia', 'Revista Luz', '324234', 'El Tiempo', '2', '24', '2021-06-16', 'Cucuta', 2, 2);

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
  `stado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semillero`
--

INSERT INTO `semillero` (`id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `departamento`, `facultad`, `plan_estudios`, `ubicacion`, `stado`) VALUES
(2, 'SEMILLERO DE INVESTIGACIÓN EN BIOTECNOLOGÍA AGRÍCOLA', 'SIBIOAGRI', '2021-05-10', 0, 0, 0, 1, '2', 2, 1, NULL, NULL),
(3, 'Semillero de Investigación y Aplicaciones Websemillero', 'SIAWEB', '2021-06-09', 0, 0, 0, 1, '3', 1, 1, NULL, NULL),
(4, 'GRUPO ACADÉMICO DE INVESTIGACIONES AGROBIOTECNOLOGICAS', 'GAIAB', '2021-06-08', 0, 0, 0, 1, '7', 2, 1, ' 4 piso', NULL);

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
(6, 4, 39);

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
  `id_semillero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud_horas`
--

INSERT INTO `solicitud_horas` (`id`, `anio`, `semestre`, `horas_catedra`, `horas_planta`, `horas_solicitadas`, `id_semillero`) VALUES
(12, 2021, 2, 12, 13, 13, 4);

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
(4, 'Proyecto prueba', 15, 123, 'En tramite', 'En tramite', '2021-06-14', '2021-05-05');

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
(4, 'Prueba 1 docente', 'Convenio de prueba', '123', '123', '3212-03-12', '4', '123', 'Cátedra', '2020-2', '2021-06-14', 'En tramite', 'En tramite');

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
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_vinculacion`
--

INSERT INTO `tipo_vinculacion` (`id`, `descripcion`) VALUES
(1, 'PLANTA'),
(2, 'CATEDRA'),
(3, 'TEMPORAL');

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
(6, 'ESPECIALIZACION EN GESTION DE PROYECTO', 'UNIVERSIDAD LIBRE', 3);

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
(1, 'ASD', 'ASD', 'ASD', 'ASD', 7);

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
  `rol` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `persona_id`, `password`, `tokenCaducidad`, `token`, `token_clave`, `rol`) VALUES
(1, 20, 'password', '2021/06/14 23:38:27', '$2y$10$KbvLwEFpa9ekcbuW9ArlNe77.UvsNNXuS8PBF4fRnHx3iZWpT8azm', '', 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `data_seme`
--
DROP TABLE IF EXISTS `data_seme`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `data_seme`  AS SELECT `id` AS `id`, `nombre` AS `nombre`, `sigla` AS `sigla`, `fecha_creacion` AS `fecha_creacion`, `aval_dic_grupo` AS `aval_dic_grupo`, `aval_dic_sem` AS `aval_dic_sem`, `aval_dic_unidad` AS `aval_dic_unidad`, `grupo_investigacion_id` AS `grupo_investigacion_id`, `grupo_investigacion`.`nombre` AS `gi_nombre`, `departamento` AS `departamento`, `departamento`.`descripcion` AS `dpto_d`, `facultad` AS `facultad`, `facultad`.`descripcion` AS `fdescrip`, `plan_estudios` AS `plan_estudios`, `plan_estudios`.`descripcion` AS `pe_descrip`, `ubicacion` AS `ubicacionSemillero`, `persona`.`id` AS `persona_id`, `persona`.`nombre` AS `nombreD`, `persona`.`telefono` AS `telefono`, `persona`.`correo` AS `correo`, `usuarios`.`password` AS `password`, `usuarios`.`token` AS `token`, `usuarios`.`rol` AS `rol`, `docente`.`tipo_vinculacion_id` AS `tipo_vinculacion_id`, `tipo_vinculacion`.`descripcion` AS `descripcion`, `docente`.`id` AS `id_docente`, `docente`.`ubicacion` AS `ubicacionDocente` FROM (((((((((`semillero` join `grupo_investigacion` on(`grupo_investigacion`.`id` = `grupo_investigacion_id`)) join `departamento` on(`departamento` = `departamento`.`id`)) join `facultad` on(`facultad`.`id` = `facultad`)) join `plan_estudios` on(`plan_estudios`.`id` = `plan_estudios`)) join `persona_has_semillero` on(`persona_has_semillero`.`semillero_id` = `id`)) join `persona` on(`persona_has_semillero`.`persona_id` = `persona`.`id`)) join `docente` on(`persona`.`id` = `docente`.`persona_id`)) join `tipo_vinculacion` on(`docente`.`tipo_vinculacion_id` = `tipo_vinculacion`.`id`)) join `usuarios` on(`persona`.`id` = `usuarios`.`persona_id`)) ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `estudiante_semi`  AS SELECT `ps`.`id` AS `id`, `persona`.`nombre` AS `nombre`, `estudiante`.`num_documento` AS `num_documento`, `estudiante`.`programa_academico` AS `programa_academico`, `estudiante`.`codigo` AS `codigo`, `estudiante`.`semestre` AS `semestre`, `persona`.`correo` AS `correo`, `persona`.`telefono` AS `telefono`, `ps`.`persona_id` AS `persona_id`, `ps`.`semillero_id` AS `semillero_id`, `estudiante`.`tipo_docuemnto_id` AS `tipo_docuemnto_id` FROM ((`persona_has_semillero` `ps` join `persona` on(`persona`.`id` = `ps`.`persona_id`)) join `estudiante` on(`estudiante`.`id` = `persona`.`id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `lineasSemillero_id`
--
DROP TABLE IF EXISTS `lineasSemillero_id`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `lineasSemillero_id`  AS SELECT `se`.`id` AS `id`, `se`.`semillero_id` AS `semillero_id`, `se`.`linea_investigacion_id` AS `linea_investigacion_id`, `linea_investigacion`.`descripcion` AS `lineasD`, `disciplina`.`descripcion` AS `disciplina_desc`, `area`.`descripcion` AS `areaD` FROM (((`sem_linea_investigacion` `se` join `linea_investigacion` on(`linea_investigacion`.`id` = `se`.`linea_investigacion_id`)) join `disciplina` on(`disciplina`.`id` = `linea_investigacion`.`disciplina_id`)) join `area` on(`area`.`id` = `disciplina`.`area_id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `pares_academ`
--
DROP TABLE IF EXISTS `pares_academ`;

CREATE ALGORITHM=UNDEFINED DEFINER=`nortcodingcomco_semillero`@`%` SQL SECURITY DEFINER VIEW `pares_academ`  AS SELECT `ps`.`id` AS `id`, `persona`.`nombre` AS `nombre`, `pares_academicos`.`numero_docuemnto` AS `num_documento`, `pares_academicos`.`inst_empresa` AS `inst_empresa`, `persona`.`correo` AS `correo`, `persona`.`telefono` AS `telefono`, `ps`.`persona_id` AS `persona_id`, `ps`.`semillero_id` AS `semillero_id`, `pares_academicos`.`tipo_docuemnto_id` AS `tipo_docuemnto_id` FROM ((`persona_has_semillero` `ps` join `persona` on(`persona`.`id` = `ps`.`persona_id`)) join `pares_academicos` on(`pares_academicos`.`persona_id` = `persona`.`id`)) ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `actividades_jovenes`
--
ALTER TABLE `actividades_jovenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `capacitaciones_Proyectos`
--
ALTER TABLE `capacitaciones_Proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `compromisos_equipo`
--
ALTER TABLE `compromisos_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `concepto_cumplimiento`
--
ALTER TABLE `concepto_cumplimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_proyecto`
--
ALTER TABLE `estado_proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estudiante_proyecto`
--
ALTER TABLE `estudiante_proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fuente_financiacion`
--
ALTER TABLE `fuente_financiacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informes_gestion_financiado`
--
ALTER TABLE `informes_gestion_financiado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `informe_gestion_jovenes`
--
ALTER TABLE `informe_gestion_jovenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `otras_actividades`
--
ALTER TABLE `otras_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `otras_actividades_proy`
--
ALTER TABLE `otras_actividades_proy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pares_academicos`
--
ALTER TABLE `pares_academicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `perfiles_has_modulos`
--
ALTER TABLE `perfiles_has_modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `persona_has_grupo`
--
ALTER TABLE `persona_has_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona_has_semillero`
--
ALTER TABLE `persona_has_semillero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `plan_accion`
--
ALTER TABLE `plan_accion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `plan_accion_has_proyectos`
--
ALTER TABLE `plan_accion_has_proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `plan_estudios`
--
ALTER TABLE `plan_estudios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ponencias`
--
ALTER TABLE `ponencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `proy_lineas_invest`
--
ALTER TABLE `proy_lineas_invest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `semillero`
--
ALTER TABLE `semillero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sem_linea_investigacion`
--
ALTER TABLE `sem_linea_investigacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `solicitud_horas`
--
ALTER TABLE `solicitud_horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `solicitud_horas_financiado`
--
ALTER TABLE `solicitud_horas_financiado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitud_horas_tutor`
--
ALTER TABLE `solicitud_horas_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `uso_equipos`
--
ALTER TABLE `uso_equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Filtros para la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD CONSTRAINT `fk_coinvestigadores_proyectos_terminados1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_docente_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_docente_tipo_vinculacion1` FOREIGN KEY (`tipo_vinculacion_id`) REFERENCES `tipo_vinculacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiante_tipo_docuemnto1` FOREIGN KEY (`tipo_docuemnto_id`) REFERENCES `tipo_docuemnto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante_proyecto`
--
ALTER TABLE `estudiante_proyecto`
  ADD CONSTRAINT `fk_estudiante_proyecto_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `grupo_has_proyecto`
--
ALTER TABLE `grupo_has_proyecto`
  ADD CONSTRAINT `fk_grupo_has_proyecto_grupo_investigacion1` FOREIGN KEY (`grupo_investigacion_id`) REFERENCES `grupo_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_has_proyecto_proyectos_terminados1` FOREIGN KEY (`proyectos_terminados_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_pares_academicos_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pares_academicos_tipo_docuemnto1` FOREIGN KEY (`tipo_docuemnto_id`) REFERENCES `tipo_docuemnto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_persona_has_grupo_grupo_investigacion1` FOREIGN KEY (`grupo_investigacion_id`) REFERENCES `grupo_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_has_grupo_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_has_semillero`
--
ALTER TABLE `persona_has_semillero`
  ADD CONSTRAINT `fk_persona_has_semillero_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_has_semillero_semillero1` FOREIGN KEY (`semillero_id`) REFERENCES `semillero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plan_accion`
--
ALTER TABLE `plan_accion`
  ADD CONSTRAINT `fk_plan_accion_semillero1` FOREIGN KEY (`semillero_id`) REFERENCES `semillero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plan_accion_has_proyectos`
--
ALTER TABLE `plan_accion_has_proyectos`
  ADD CONSTRAINT `fk_plan_accion_has_proyectos_plan_accion1` FOREIGN KEY (`plan_accion_id`) REFERENCES `plan_accion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plan_accion_has_proyectos_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_lineas_invest_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proy_lineas_invest_linea_investigacion1` FOREIGN KEY (`linea_investigacion_id`) REFERENCES `linea_investigacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
