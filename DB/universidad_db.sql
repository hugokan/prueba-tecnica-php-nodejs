-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 07-10-2023 a las 18:27:44
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asignatura`
--

CREATE TABLE `Asignatura` (
  `id` int(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `idEstudio` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Asignatura`
--

INSERT INTO `Asignatura` (`id`, `nombre`, `idEstudio`) VALUES
(1, 'Física Aplicada a la Informática', 2),
(2, 'Matemáticas I', 2),
(3, 'Industrias de la comunicación', 3),
(4, 'Programación I', 2),
(5, 'Escritura creativa', 3),
(6, 'Introducción a la Estadística en Psicología', 1),
(7, 'Bases Biológicas de la Conducta', 1),
(8, 'Psicología Social', 1),
(9, 'Historia de la Psicología', 1),
(10, 'Estructuras de Datos y Algoritmos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estudio`
--

CREATE TABLE `Estudio` (
  `id` int(100) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Estudio`
--

INSERT INTO `Estudio` (`id`, `nombre`) VALUES
(1, 'Psicología'),
(2, 'Ingeniería Informática'),
(3, 'Periodismo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Profesor`
--

CREATE TABLE `Profesor` (
  `id` int(100) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Profesor`
--

INSERT INTO `Profesor` (`id`, `nombre`) VALUES
(1, 'Juan'),
(2, 'Maria'),
(3, 'Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Profesor-Asignatura`
--

CREATE TABLE `Profesor-Asignatura` (
  `id` int(100) NOT NULL,
  `idProfesor` int(100) NOT NULL,
  `IdAsignatura` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Profesor-Asignatura`
--

INSERT INTO `Profesor-Asignatura` (`id`, `idProfesor`, `IdAsignatura`) VALUES
(1, 2, 2),
(2, 2, 4),
(4, 2, 10),
(5, 3, 9),
(6, 3, 5),
(7, 1, 1),
(8, 1, 6),
(9, 1, 3),
(10, 3, 7),
(11, 3, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Asignatura`
--
ALTER TABLE `Asignatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEstudio` (`idEstudio`);

--
-- Indices de la tabla `Estudio`
--
ALTER TABLE `Estudio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Profesor`
--
ALTER TABLE `Profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Profesor-Asignatura`
--
ALTER TABLE `Profesor-Asignatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProfesor` (`idProfesor`),
  ADD KEY `IdAsignatura` (`IdAsignatura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Asignatura`
--
ALTER TABLE `Asignatura`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `Estudio`
--
ALTER TABLE `Estudio`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Profesor`
--
ALTER TABLE `Profesor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Profesor-Asignatura`
--
ALTER TABLE `Profesor-Asignatura`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Asignatura`
--
ALTER TABLE `Asignatura`
  ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`idEstudio`) REFERENCES `Estudio` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `Profesor-Asignatura`
--
ALTER TABLE `Profesor-Asignatura`
  ADD CONSTRAINT `Profesor_Asignatura_FK` FOREIGN KEY (`IdAsignatura`) REFERENCES `Asignatura` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `profesor-asignatura_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `Profesor` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
