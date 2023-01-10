-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: bxgvbqru5r7prhsdpnvr-mysql.services.clever-cloud.com:3306
-- Generation Time: Oct 05, 2022 at 09:22 PM
-- Server version: 8.0.22-13
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bxgvbqru5r7prhsdpnvr`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
--

CREATE TABLE `actividades` (
  `id_act` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `credito_activ` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `actividades`
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
-- Table structure for table `constancias`
--

CREATE TABLE `constancias` (
  `id` int NOT NULL,
  `ciudadano` varchar(200) NOT NULL,
  `suscribe` varchar(200) NOT NULL,
  `alumno` varchar(200) NOT NULL,
  `matricula` int DEFAULT NULL,
  `carrera` varchar(100) NOT NULL,
  `desempe` varchar(100) NOT NULL,
  `valor` double NOT NULL,
  `ciclo` varchar(20) DEFAULT NULL,
  `valorcurri` double NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `dias` int DEFAULT NULL,
  `MES` varchar(20) NOT NULL,
  `anio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `constancias`
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
-- Table structure for table `creditos`
--

CREATE TABLE `creditos` (
  `id` int NOT NULL,
  `matricula` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `act` varchar(150) DEFAULT NULL,
  `observacion` varchar(300) DEFAULT NULL,
  `valor` int DEFAULT NULL,
  `desmp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `creditos`
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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `respons` int NOT NULL,
  `tipo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `descripcion`, `color`, `start`, `end`, `respons`, `tipo`) VALUES
(22, 'ccccccc', 'ccccccccccccccccc', '#FF8C00', '2022-10-15 00:00:00', '2022-10-16 00:00:00', 31, 'Concurso de ciencias basicas'),
(23, 'qqqq', 'qqqqqqqqqq', '#40E0D0', '2022-10-10 00:00:00', '2022-10-11 00:00:00', 17, 'Conferencia y/o platica'),
(24, 'eeeee', 'eeeeeeeeeee', '#FFD700', '2022-10-11 00:00:00', '2022-10-12 00:00:00', 33, 'Curso y/o taller'),
(25, 'rrrrrrr', 'rrrrrrrrrrrrr', '#FF8C00', '2022-10-12 00:00:00', '2022-10-13 00:00:00', 31, 'Concurso de ciencias basicas'),
(26, 'ddddd', 'dddddddddddddd', '#0071c5', '2022-10-13 00:00:00', '2022-10-14 00:00:00', 35, 'Modalidad Academica'),
(27, 'hhhh', 'hhhhhhhh', '#0071c5', '2022-10-17 00:00:00', '2022-10-19 00:00:00', 17, 'Modalidad Academica'),
(28, 'kkkkkk', 'kkkkkkkkkkkkk', '#c0392b', '2022-10-20 00:00:00', '2022-10-21 00:00:00', 35, 'Diseño de prototipos'),
(29, 'ppp', 'pppppppppp', '#2c3e50', '2022-10-21 00:00:00', '2022-10-22 00:00:00', 35, 'Diseño de proyectos'),
(30, 'nnnn', 'nnnnnnnnn', '#000', '2022-10-22 00:00:00', '2022-10-23 00:00:00', 33, 'Concurso de emprendedurismo');

-- --------------------------------------------------------

--
-- Table structure for table `evidencia`
--

CREATE TABLE `evidencia` (
  `id` int NOT NULL,
  `numero_control` varchar(10) NOT NULL,
  `id_evento` int NOT NULL,
  `subido` int NOT NULL,
  `ruta_doc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evidencia`
--

INSERT INTO `evidencia` (`id`, `numero_control`, `id_evento`, `subido`, `ruta_doc`) VALUES
(61, '19820001', 26, 1, 'Modalidad Academica/19820001-cu-26.pdf'),
(62, '19820001', 23, 1, 'Conferencia Platica/19820001-cu-23.pdf'),
(63, '19820001', 28, 1, 'Diseño de Prototipos/19820001-cu-28.pdf'),
(64, '19820001', 29, 1, 'Diseño en proyecto/19820001-cu-29.pdf'),
(65, '19820001', 24, 1, 'Curso o curso taller/19820001-cu-24.pdf'),
(66, '19820001', 30, 1, 'Concurso de emprendedurismo/19820001-cu-30.pdf'),
(67, '19820001', 22, 1, 'Concurso de Ciencias Básicas/19820001-cu-22.pdf'),
(68, '19820001', 25, 1, 'Concurso de Ciencias Básicas/19820001-cu-25.pdf'),
(69, '19820001', 26, 1, 'Modalidad Academica/19820001-cu-26.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jefes`
--

CREATE TABLE `jefes` (
  `econo` varchar(200) NOT NULL,
  `ciencias` varchar(200) NOT NULL,
  `agrono` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tutorias`
--

CREATE TABLE `tb_tutorias` (
  `id` int NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `ap_paterno` varchar(100) DEFAULT NULL,
  `ap_materno` varchar(100) DEFAULT NULL,
  `numero_control` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL DEFAULT '',
  `estado` varchar(255) NOT NULL,
  `semestre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tutorias`
--

INSERT INTO `tb_tutorias` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `numero_control`, `carrera`, `estado`, `semestre`) VALUES
(1, 'rodrigo', 'lopez', 'martinez', '16830189', 'Ingeneria Forestal', 'Acreditado', 'Primer Semestre'),
(2, 'jorge', 'lopez', 'escamilla', '16830189', 'Ingeneria en Agronomia', 'NO Acreditado', 'Primer Semestre'),
(3, 'jorge', 'lopez', 'escamilla', '16830189', 'Ingeneria Forestal', 'Acreditado', 'Quinto Semestre');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int NOT NULL,
  `nombres` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ap_paterno` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ap_materno` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sexo` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `numero_control` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `carrera` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado_civil` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ciudad` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `colonia` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `calle` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `codigo_postal` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `curp` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nivel_escolar` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `reticula` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `entidad` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `foto_perfil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `clave_oficial` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `contraseña` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `token` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cargo` int NOT NULL,
  `extra1` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `extra2` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `extra3` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `user_creacion` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `user_actualizacion` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `user_eliminacion` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `paterno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `materno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `profesion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `cubiculo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `area` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nombres`, `ap_paterno`, `ap_materno`, `sexo`, `numero_control`, `carrera`, `correo`, `estado_civil`, `telefono`, `ciudad`, `colonia`, `calle`, `codigo_postal`, `curp`, `fecha_nacimiento`, `nivel_escolar`, `reticula`, `entidad`, `foto_perfil`, `clave_oficial`, `contraseña`, `token`, `cargo`, `extra1`, `extra2`, `extra3`, `user_creacion`, `user_actualizacion`, `user_eliminacion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`, `nombre`, `paterno`, `materno`, `profesion`, `cubiculo`, `area`) VALUES
(2, 'DANIEL JESUS', 'PEREZ', 'MEX', 'Hombre', NULL, NULL, 'admin@gmail.com', NULL, '9811116798', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SisTECNM-2021-01-19-01-21-55_', NULL, '12345', NULL, 0, NULL, NULL, NULL, 'Administrador', NULL, NULL, '2021-01-19 01:21:55', NULL, NULL, '1', '', '', '', 'INGENIERO INFORMATICO', '78', 'INFORMATICA'),
(26, 'manuel angel', NULL, NULL, NULL, '19830005', NULL, 'admini2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$aP3SpNHwz1YlhJ26FB1xwOgCBZCD7vFfeg44ix5Wlt6B9inrJQ9lu', NULL, 0, NULL, NULL, NULL, 'ESCAMILLA', NULL, NULL, '2022-08-31 10:23:12', NULL, NULL, '1', '', '', '', '', '', ''),
(16, 'ivana nicole', NULL, NULL, NULL, '16830185', NULL, 'alumno@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1234', NULL, 2, NULL, NULL, NULL, 'ESCAMILLA', NULL, NULL, '2021-01-30 06:27:25', NULL, NULL, '1', '', '', '', '', '', ''),
(25, 'juan antonio', 'cu', 'cauich', 'elegir', '19820001', 'elegir', 'alumno2@gmail.com', 'elegir', '9811160488', 'elegir', 'santa cruz', '23', '24520', 'CUCJ010304HCCXCNA9', '2001-03-04', 'superior', '19830001', 'campeche', 'SisTECNM-2022-09-27-10-44-50_blade-runner-2049_1920x1080_xtrafondos.com.jpg', NULL, '$2y$10$STdLb4W4bYifYLNy685fu.9iVflDW2LZ/5e2nahVs93wFQULnnJHe', NULL, 2, NULL, NULL, NULL, 'ESCAMILLA', NULL, NULL, '2022-08-31 06:31:15', '2022-09-27 10:44:50', NULL, '1', '', '', '', '', '', ''),
(32, 'diana lizbeth', 'madrigal', 'benitez', 'Mujer', '19830012', 'Ingeneria Informatica', 'diana@gmai.com', 'Soltero/a', '9811127594', 'Campeche', 'concordia', '33', '24520', 'CUCJ010304HCCXCNA9', '2000-08-10', 'superior', '19830001', 'campeche', 'SisTECNM-2022-09-06-07-32-54_', NULL, '$2y$10$ruZ2x.tHHU.CHeajaxirBO9KIvQr3LkPhpqcyT2jeQWLPA38UmRay', NULL, 2, NULL, NULL, NULL, 'ESCAMILLA', NULL, NULL, '2022-09-06 07:32:54', NULL, NULL, '1', '', '', '', '', '', ''),
(33, 'jenner noel', 'Che', 'Mendez', 'Hombre', NULL, NULL, 'jenner.cm@china.tecnm.mx', NULL, '9811127594', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SisTECNM-2022-09-06-07-35-42_', NULL, '$2y$10$ZLRflAZ5tqYpw7h6Ko5Mqe1E9X5vAFxPK9G.IgwjHLXPcctVVKXLG', NULL, 1, NULL, NULL, NULL, 'Administrador', NULL, NULL, '2022-09-06 07:35:42', NULL, NULL, '1', '', '', '', 'docente', '2', 'informatica'),
(17, 'Emmanuel ', 'Escamilla', 'Moreno', 'Hombre', NULL, NULL, 'maestro@gmail.com', NULL, '981 181 8978', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SisTECNM-2021-01-30-07-05-11_', NULL, '12345', NULL, 1, NULL, NULL, NULL, 'Administrador', NULL, NULL, '2021-01-30 07:05:11', NULL, NULL, '1', '', '', '', 'INGENIERO INFORMATICO', '2', 'INFORMATICA'),
(35, 'cesar manuel', 'chi', 'perez', 'Hombre', NULL, NULL, 'maestro2@gmail.com', NULL, '9811160488', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SisTECNM-2022-09-11-05-50-10_', NULL, '$2y$10$EeJslOdDc7Cq/oPwJaQOEelAYLvj412B/j7/lw51.ODCgJ153tXvW', NULL, 1, NULL, NULL, NULL, 'Administrador', NULL, NULL, '2022-09-11 05:50:10', NULL, NULL, '1', '', '', '', 'docente', '3', 'informatica'),
(31, 'roger eliezer', 'perez', 'velazquez', 'Hombre', NULL, NULL, 'roger.pv@china.tecnm.mx', NULL, '9811127594', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SisTECNM-2022-09-06-07-22-36_', NULL, '$2y$10$E4gt7avTaUxAjPdG28hPcOwLuo58muPrwuBvXB2dmwyXjAPxyKh.a', NULL, 1, NULL, NULL, NULL, 'Administrador', NULL, NULL, '2022-09-06 07:22:36', NULL, NULL, '1', '', '', '', 'docente', '3', 'informatica');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_act`);

--
-- Indexes for table `constancias`
--
ALTER TABLE `constancias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evidencia`
--
ALTER TABLE `evidencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tutorias`
--
ALTER TABLE `tb_tutorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`correo`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_act` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `constancias`
--
ALTER TABLE `constancias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `creditos`
--
ALTER TABLE `creditos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `evidencia`
--
ALTER TABLE `evidencia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_tutorias`
--
ALTER TABLE `tb_tutorias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
