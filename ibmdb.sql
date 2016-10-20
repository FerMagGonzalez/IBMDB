-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2016 a las 02:52:02
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ibmdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `tipo`) VALUES
(1, 'terror'),
(2, 'comedia'),
(3, 'suspenso'),
(4, 'ciencia ficcion'),
(5, 'AVENTURAS'),
(6, 'DRAMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `autor` varchar(15) NOT NULL,
  `portada` varchar(50) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='tabla libros';

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `titulo`, `autor`, `portada`, `id_genero`) VALUES
(5, 'la isla', 'alguien', '', 3),
(6, 'la isla', 'alguien', '', 3),
(7, 'libro2', 'alguien', '', 1),
(8, 'libro3', 'alguien', '', 5),
(9, 'libro4', 'alguien', '', 2),
(10, 'libro5', 'alguien', '', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE IF NOT EXISTS `pelicula` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `director` varchar(15) NOT NULL,
  `img` varchar(50) NOT NULL,
  `id_libro` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `titulo`, `director`, `img`, `id_libro`) VALUES
(1, 'pelicula1', 'una persona', '', 5),
(2, 'pelicula2', 'una persona', '', 7),
(3, 'pelicula3', 'una persona', '', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`,`tipo`) COMMENT 'PK_CATEGORIA';

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`) COMMENT 'PK_LIBRO', ADD KEY `fk_categorias` (`id_genero`), ADD KEY `fk_genero` (`id_genero`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`) COMMENT 'PK_PELICULA', ADD KEY `fk_libros` (`id_libro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
ADD CONSTRAINT `fk_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
ADD CONSTRAINT `fk_libros` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
