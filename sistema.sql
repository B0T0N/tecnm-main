-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2022 a las 22:25:17
-- Versión del servidor: 10.4.24-MariaDB-log
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_act` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `credito_activ` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_act`, `title`, `descripcion`, `credito_activ`) VALUES
(1, 'Movilidad Academica', 'Estancias en instituciones educativas de nivel superior, centros de investigacion, y empresas (al menos durante 4 Semanas Nacional', 1),
(2, 'Movilidad Academica', 'Estancias en instituciones educativas de nivel superior, centros de investigacion, y empresas (al menos durante 4 Semanas Internacional', 2),
(3, 'Conferencia y/o Platica', 'Asistencia o participación dentro o fuera del instituto en cualquier nivel que se trate, (local, regional, Nacional) relacionada con el profesional', 0.2),
(4, 'Congreso, Seminario, Simponsio y/o Coloquio', 'Asistencia o participacion dentro o fuera del instituto en cualquier nivel que se trate, (local, regional, Nacional) relacionada con el profesional', 0.4),
(5, 'Curso y/o curso taller', 'Participación o imparticion dentro o fuera de la institucion en cualquier nivel que se trate, (local, regional, Nacional) relacionado con el perfil profesional, con una duracion minima de 20 horas (presencial o a distancia)', 0.5),
(6, 'Diplomado', 'Participación o imparticion dentro o fuera del instituto en cualquier nivel que se trate, (local, regional, Nacional) relacionado con el perfil profesional, con una duracion minima de 90 horas (presencial o a distancia)', 2),
(7, 'Concurso Nacional de Ciencias Básicas', 'Participación en concurso de ciencas básicas como seleccionado de acuerdo al área que corresponda a nivel local', 0.5),
(8, 'Concurso Nacional de Ciencias Básicas', 'Participación en concurso de ciencas básicas como seleccionado de acuerdo al área que corresponda a nivel regional', 0.5),
(9, 'Concurso Nacional de Ciencias Básicas', 'Participación en concurso de ciencas básicas como seleccionado de acuerdo al área que corresponda a nivel nacional', 1),
(10, 'Concurso de Creatividad e innovación', 'Participación en concurso de creatividad e innovación de acuerdo al área que corresponda a nivel local', 0.5),
(11, 'Concurso de Creatividad e innovación', 'Participación en concurso de creatividad e innovación de acuerdo al área que corresponda a nivel regional', 0.5),
(12, 'Concurso de Creatividad e innovación', 'Participación en concurso de creatividad e innovación de acuerdo al área que corresponda a nivel nacional', 1),
(13, 'Concurso de emprendedurismo', 'Participación en concurso de emprendedurismo de acuerdo al área que corresponda a nivel local', 0.5),
(14, 'Concurso de emprendedurismo', 'Participación en concurso de emprendedurismo de acuerdo al área que corresponda a nivel regional', 0.5),
(15, 'Concurso de emprendedurismo', 'Participación en concurso de emprendedurismo de acuerdo al área que corresponda a nivel nacional', 1),
(16, 'Diseño de Prototipos', 'Participar o ser responsable del diseño de un prototipo que solucione una problemática y esté relacionado con su perfil profesional', 0.75),
(17, 'Diseño de Software', 'Participar o ser responsable del diseño de un prototipo que solucione una problemática y esté relacionado con su perfil profesional', 0.75),
(18, 'Diseño en proyecto', 'Participar en un proyecto de producción, vinculación e investigación previamente autorizado de acuerdo a su perfil profesional realizando las actividades programadas, al menos durante 40 horas', 0.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constancias`
--

CREATE TABLE `constancias` (
  `id` int(11) NOT NULL,
  `ciudadano` varchar(200) NOT NULL,
  `suscribe` varchar(200) NOT NULL,
  `alumno` varchar(200) NOT NULL,
  `matricula` int(20) DEFAULT NULL,
  `carrera` varchar(100) NOT NULL,
  `desempe` varchar(100) NOT NULL,
  `valor` double NOT NULL,
  `ciclo` varchar(20) DEFAULT NULL,
  `valorcurri` double NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `dias` int(5) DEFAULT NULL,
  `MES` varchar(20) NOT NULL,
  `anio` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `constancias`
--

INSERT INTO `constancias` (`id`, `ciudadano`, `suscribe`, `alumno`, `matricula`, `carrera`, `desempe`, `valor`, `ciclo`, `valorcurri`, `ciudad`, `dias`, `MES`, `anio`) VALUES
(2, 'DANIEL JESUS', 'DANIEL JESUS', 'DANIEL JESUS', 16830180, 'Informatica', 'BUENO', 4, 'ENE-JUN2020', 2, 'San Fransico de Campeche', 19, 'ENERO', 2021),
(3, 'IVANA', 'IVANA', 'IVANA', 21830180, 'ING INFORMATICA', 'BUENO', 4, 'ENE-JUN2020', 1, 'San Fransico de Campeche', 19, 'ENERO', 2021),
(4, 'JOSE PERALTA', 'MIRSHA', 'DANIEL JESUS PEREZ MEX', 16830180, 'ING INFORMATICA', 'BUENO', 4, 'ENE-JUN2020', 2, 'San Fransico de Campeche', 19, 'ENERO', 2021),
(5, '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0),
(6, '', 'mirsha', 'diana', 19830012, 'informatica', 'excelente', 4, '2019-2023', 2, '', 0, '', 0),
(7, '', 'mirsha', 'JUAN ANTONIO cu cauich', 19820001, 'informatica', 'excelente', 4, '2019-2023', 2, '', 0, '', 0),
(8, '', 'mirsha', 'JUAN ANTONIO cu cauich', 19820001, 'informatica', 'notable', 3, '2019-2023', 2, '', 0, '', 0),
(9, '', 'mirsha', 'JUAN ANTONIO cu cauich', 19820001, 'informatica', 'excelente', 4, '2019-2023', 2, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

CREATE TABLE `creditos` (
  `id` int(11) NOT NULL,
  `matricula` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `act` varchar(150) DEFAULT NULL,
  `observacion` varchar(300) DEFAULT NULL,
  `valor` int(3) DEFAULT NULL,
  `desmp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `creditos`
--

INSERT INTO `creditos` (`id`, `matricula`, `nombre`, `act`, `observacion`, `valor`, `desmp`) VALUES
(30, '19820001', 'JUAN ANTONIO cu cauich', 'visita a empresa', 'ninguna', 3, 'Notable'),
(35, '19820001', 'jorge mada', 'visita a empresa', 'kska', 4, 'Excelente'),
(36, '19830012', 'roger eliezer', 'taller de payasos', 'aaaaa', 4, 'Excelente'),
(102, '19820001', 'JUAN ANTONIO cu cauich', 'Concurso de Creatividad e innovación', 'buen desempeño', 3, 'Notable'),
(104, '19820001', 'JUAN ANTONIO cu cauich', 'Concurso de Creatividad e innovación', 'wwwww', 4, 'Excelente'),
(105, '19820001', 'JUAN ANTONIO cu cauich', 'Diseño de Prototipos', 'ggggg', 3, 'Excelente'),
(106, '19820001', 'JUAN ANTONIO cu cauich', 'Movilidad Academica', 'hhhhh', 2, 'Bueno'),
(107, '19820001', 'JUAN ANTONIO cu cauich', 'Diplomado', 'ejemplo', 4, 'Excelente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `credito_act` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `descripcion`, `color`, `start`, `end`, `credito_act`) VALUES
(14, 'visita', 'visitar a la empresa bimbo para ver la calidad de sus sistemas de informacion', '#0071c5', '2022-09-15 00:00:00', '2022-09-17 00:00:00', 0.2),
(15, 'cine', 'dghsdhd', '#0071c5', '2022-09-22 00:00:00', '2022-09-24 00:00:00', 0.6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencia`
--

CREATE TABLE `evidencia` (
  `id` int(6) NOT NULL,
  `numero_control` varchar(10) NOT NULL,
  `id_evento` int(6) NOT NULL,
  `subido` int(2) NOT NULL,
  `ruta_doc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evidencia`
--

INSERT INTO `evidencia` (`id`, `numero_control`, `id_evento`, `subido`, `ruta_doc`) VALUES
(43, '19820001', 1, 1, 'Modalidad Academica/19820001Cu_Tarea1.pdf'),
(44, '19820001', 3, 1, 'Conferencia Platica/19820001Cu_Tarea1.pdf'),
(45, '19820001', 6, 1, 'Diplomado/19820001Cu_Tarea1.pdf'),
(46, '19820001', 12, 1, 'Concurso de Creatividad e innovación/19820001Cu_Tarea1.pdf'),
(47, '19820001', 16, 1, 'Diseño de Prototipos/19820001Cu_Tarea1.pdf'),
(48, '19820001', 17, 1, 'Diseño de Software/19820001Cu_Tarea1.pdf'),
(49, '19830012', 1, 1, 'Modalidad Academica/19830012Cu_Tarea1.pdf'),
(50, '19820001', 5, 1, 'Curso o curso taller/19820001Investigación.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefes`
--

CREATE TABLE `jefes` (
  `econo` varchar(200) NOT NULL,
  `ciencias` varchar(200) NOT NULL,
  `agrono` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tutorias`
--

CREATE TABLE `tb_tutorias` (
  `id` int(255) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `ap_paterno` varchar(100) DEFAULT NULL,
  `ap_materno` varchar(100) DEFAULT NULL,
  `numero_control` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL DEFAULT '',
  `estado` varchar(255) NOT NULL,
  `semestre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_tutorias`
--

INSERT INTO `tb_tutorias` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `numero_control`, `carrera`, `estado`, `semestre`) VALUES
(1, 'rodrigo', 'lopez', 'martinez', '16830189', 'Ingeneria Forestal', 'Acreditado', 'Primer Semestre'),
(2, 'jorge', 'lopez', 'escamilla', '16830189', 'Ingeneria en Agronomia', 'NO Acreditado', 'Primer Semestre'),
(3, 'jorge', 'lopez', 'escamilla', '16830189', 'Ingeneria Forestal', 'Acreditado', 'Quinto Semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ap_paterno` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ap_materno` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sexo` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `numero_control` varchar(512) CHARACTER SET utf8mb4 DEFAULT NULL,
  `carrera` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo` varchar(512) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado_civil` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ciudad` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `colonia` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `calle` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `codigo_postal` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `curp` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nivel_escolar` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reticula` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `entidad` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `foto_perfil` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `clave_oficial` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `contraseña` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `token` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cargo` int(2) NOT NULL,
  `extra1` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `extra2` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `extra3` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(512) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `paterno` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `materno` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `profesion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cubiculo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `area` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `sexo`, `numero_control`, `carrera`, `correo`, `estado_civil`, `telefono`, `ciudad`, `colonia`, `calle`, `codigo_postal`, `curp`, `fecha_nacimiento`, `nivel_escolar`, `reticula`, `entidad`, `foto_perfil`, `clave_oficial`, `contraseña`, `token`, `cargo`, `extra1`, `extra2`, `extra3`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`, `nombre`, `paterno`, `materno`, `profesion`, `cubiculo`, `area`) VALUES
(2, 'DANIEL JESUS', 'PEREZ', 'MEX', 'Hombre', NULL, NULL, 'admin@gmail.com', NULL, '9811116798', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SisTECNM-2021-01-19-01-21-55_', NULL, '12345', NULL, 0, NULL, NULL, NULL, 'Administrador', NULL, NULL, '2021-01-19 01:21:55', NULL, NULL, '1', '', '', '', 'INGENIERO INFORMATICO', '78', 'INFORMATICA'),
(26, 'manuel angel', NULL, NULL, NULL, '19830005', NULL, 'admini2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$aP3SpNHwz1YlhJ26FB1xwOgCBZCD7vFfeg44ix5Wlt6B9inrJQ9lu', NULL, 0, NULL, NULL, NULL, 'ESCAMILLA', NULL, NULL, '2022-08-31 10:23:12', NULL, NULL, '1', '', '', '', '', '', ''),
(16, 'ivana nicole', NULL, NULL, NULL, '16830185', NULL, 'alumno@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1234', NULL, 2, NULL, NULL, NULL, 'ESCAMILLA', NULL, NULL, '2021-01-30 06:27:25', NULL, NULL, '1', '', '', '', '', '', ''),
(25, 'JUAN ANTONIO', 'cu', 'cauich', 'Hombre', '19820001', 'Ingeneria Informatica', 'alumno2@gmail.com', 'Soltero/a', '9811160488', 'Campeche', 'santa cruz', '23', '24520', 'CUCJ010304HCCXCNA9', '2001-03-04', 'superior', '19830001', 'campeche', 'SisTECNM-2022-09-06-06-55-20_', NULL, '$2y$10$STdLb4W4bYifYLNy685fu.9iVflDW2LZ/5e2nahVs93wFQULnnJHe', NULL, 2, NULL, NULL, NULL, 'ESCAMILLA', NULL, NULL, '2022-08-31 06:31:15', '2022-09-06 06:55:20', NULL, '1', '', '', '', '', '', ''),
(32, 'diana lizbeth', 'madrigal', 'benitez', 'Mujer', '19830012', 'Ingeneria Informatica', 'diana@gmai.com', 'Soltero/a', '9811127594', 'Campeche', 'concordia', '33', '24520', 'CUCJ010304HCCXCNA9', '2000-08-10', 'superior', '19830001', 'campeche', 'SisTECNM-2022-09-06-07-32-54_', NULL, '$2y$10$ruZ2x.tHHU.CHeajaxirBO9KIvQr3LkPhpqcyT2jeQWLPA38UmRay', NULL, 2, NULL, NULL, NULL, 'ESCAMILLA', NULL, NULL, '2022-09-06 07:32:54', NULL, NULL, '1', '', '', '', '', '', ''),
(33, 'jenner noel', 'Che', 'Mendez', 'Hombre', NULL, NULL, 'jenner.cm@china.tecnm.mx', NULL, '9811127594', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SisTECNM-2022-09-06-07-35-42_', NULL, '$2y$10$ZLRflAZ5tqYpw7h6Ko5Mqe1E9X5vAFxPK9G.IgwjHLXPcctVVKXLG', NULL, 1, NULL, NULL, NULL, 'Administrador', NULL, NULL, '2022-09-06 07:35:42', NULL, NULL, '1', '', '', '', 'docente', '2', 'informatica'),
(17, 'Emmanuel ', 'Escamilla', 'Moreno', 'Hombre', NULL, NULL, 'maestro@gmail.com', NULL, '981 181 8978', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SisTECNM-2021-01-30-07-05-11_', NULL, '12345', NULL, 1, NULL, NULL, NULL, 'Administrador', NULL, NULL, '2021-01-30 07:05:11', NULL, NULL, '1', '', '', '', 'INGENIERO INFORMATICO', '2', 'INFORMATICA'),
(35, 'cesar manuel', 'chi', 'perez', 'Hombre', NULL, NULL, 'maestro2@gmail.com', NULL, '9811160488', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SisTECNM-2022-09-11-05-50-10_', NULL, '$2y$10$EeJslOdDc7Cq/oPwJaQOEelAYLvj412B/j7/lw51.ODCgJ153tXvW', NULL, 1, NULL, NULL, NULL, 'Administrador', NULL, NULL, '2022-09-11 05:50:10', NULL, NULL, '1', '', '', '', 'docente', '3', 'informatica'),
(31, 'roger eliezer', 'perez', 'velazquez', 'Hombre', NULL, NULL, 'roger.pv@china.tecnm.mx', NULL, '9811127594', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SisTECNM-2022-09-06-07-22-36_', NULL, '$2y$10$E4gt7avTaUxAjPdG28hPcOwLuo58muPrwuBvXB2dmwyXjAPxyKh.a', NULL, 1, NULL, NULL, NULL, 'Administrador', NULL, NULL, '2022-09-06 07:22:36', NULL, NULL, '1', '', '', '', 'docente', '3', 'informatica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_act`);

--
-- Indices de la tabla `constancias`
--
ALTER TABLE `constancias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evidencia`
--
ALTER TABLE `evidencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_tutorias`
--
ALTER TABLE `tb_tutorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`correo`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_act` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `constancias`
--
ALTER TABLE `constancias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `creditos`
--
ALTER TABLE `creditos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `evidencia`
--
ALTER TABLE `evidencia`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `tb_tutorias`
--
ALTER TABLE `tb_tutorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
