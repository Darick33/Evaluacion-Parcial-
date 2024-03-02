-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2024 a las 01:39:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen_parcial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `ID_album` int(11) NOT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `Anio_lanzamiento` int(11) DEFAULT NULL,
  `Sello_discografico` varchar(100) DEFAULT NULL,
  `Genero` varchar(50) DEFAULT NULL,
  `ID_artista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`ID_album`, `Titulo`, `Anio_lanzamiento`, `Sello_discografico`, `Genero`, `ID_artista`) VALUES
(1, 'tum', 2020, 'hola', 'Rock', 2),
(2, 'juenito', 45, 'sello', 'macho', 2),
(3, 'tuf', 12, '$Sello_discografico', '$Genero', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `ID_artista` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Genero` varchar(50) DEFAULT NULL,
  `Pais` varchar(50) DEFAULT NULL,
  `Anio_inicio_carrera` int(11) DEFAULT NULL,
  `ID_rol` int(11) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Contrasenia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`ID_artista`, `Nombre`, `Genero`, `Pais`, `Anio_inicio_carrera`, `ID_rol`, `Correo`, `Contrasenia`) VALUES
(2, 'Fausto Minio', 'Masculino', 'Ecuador', 2003, 1, 'correo@gmail.com', '123'),
(3, 'Fausto', 'Masculino', 'Ecuador', 2003, 1, 'correo@gmail.com', '123'),
(5, 'Luis', 'bfbfdb', 'gn', 12, 1, 'correo@gmail.com', '123'),
(6, 'Luis', 'bfbfdb', 'gn', 12, 2, 'correo@gmail.comcs', '123'),
(7, 'Paula', 'trululi', 'Gorgonia', 2024, 1, 'tupapi@gmail.com', '123'),
(8, 'Luis', 'bfbfdb', 'Austria', 123, 2, 'correo@gmail.com', '123'),
(9, 'Luis', 'bfbfdb', 'Austria', 123, 2, 'correo@gmail.com', '123'),
(10, 'Luis', 'bfbfdb', 'Austria', 123, 1, 'correo@gmail.com', '123'),
(11, 'Luis', 'bfbfdb', 'Austria', 123, 2, 'correo@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_album`
--

CREATE TABLE `artista_album` (
  `ID_artista_album` int(11) NOT NULL,
  `ID_artista` int(11) DEFAULT NULL,
  `ID_album` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artista_album`
--

INSERT INTO `artista_album` (`ID_artista_album`, `ID_artista`, `ID_album`) VALUES
(1, 2, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_rol`
--

CREATE TABLE `artista_rol` (
  `ID_artista_rol` int(11) NOT NULL,
  `ID_artista` int(11) DEFAULT NULL,
  `ID_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artista_rol`
--

INSERT INTO `artista_rol` (`ID_artista_rol`, `ID_artista`, `ID_rol`) VALUES
(1, 2, 1),
(2, 3, 1),
(5, 2, 1),
(6, 5, 1),
(7, 6, 2),
(8, 7, 1),
(9, 8, 2),
(10, 10, 1),
(11, 11, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_rol` int(11) NOT NULL,
  `Nombre_rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_rol`, `Nombre_rol`) VALUES
(1, 'Compositor'),
(2, 'Invitado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID_album`),
  ADD KEY `ID_artista` (`ID_artista`);

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`ID_artista`),
  ADD KEY `ID_rol` (`ID_rol`);

--
-- Indices de la tabla `artista_album`
--
ALTER TABLE `artista_album`
  ADD PRIMARY KEY (`ID_artista_album`),
  ADD KEY `ID_artista` (`ID_artista`),
  ADD KEY `ID_album` (`ID_album`);

--
-- Indices de la tabla `artista_rol`
--
ALTER TABLE `artista_rol`
  ADD PRIMARY KEY (`ID_artista_rol`),
  ADD KEY `ID_artista` (`ID_artista`),
  ADD KEY `ID_rol` (`ID_rol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `ID_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `ID_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `artista_album`
--
ALTER TABLE `artista_album`
  MODIFY `ID_artista_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `artista_rol`
--
ALTER TABLE `artista_rol`
  MODIFY `ID_artista_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`ID_artista`) REFERENCES `artista` (`ID_artista`);

--
-- Filtros para la tabla `artista`
--
ALTER TABLE `artista`
  ADD CONSTRAINT `artista_ibfk_1` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`);

--
-- Filtros para la tabla `artista_album`
--
ALTER TABLE `artista_album`
  ADD CONSTRAINT `artista_album_ibfk_1` FOREIGN KEY (`ID_artista`) REFERENCES `artista` (`ID_artista`),
  ADD CONSTRAINT `artista_album_ibfk_2` FOREIGN KEY (`ID_album`) REFERENCES `album` (`ID_album`);

--
-- Filtros para la tabla `artista_rol`
--
ALTER TABLE `artista_rol`
  ADD CONSTRAINT `artista_rol_ibfk_1` FOREIGN KEY (`ID_artista`) REFERENCES `artista` (`ID_artista`),
  ADD CONSTRAINT `artista_rol_ibfk_2` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
