-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-09-2018 a las 04:15:01
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `animax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulo`
--

DROP TABLE IF EXISTS `capitulo`;
CREATE TABLE IF NOT EXISTS `capitulo` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_temporada` int(15) NOT NULL,
  `numero` int(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `duracion` time(5) NOT NULL,
  `fecha_estreno` date NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_m` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `capitulo`
--

INSERT INTO `capitulo` (`id`, `id_temporada`, `numero`, `nombre`, `duracion`, `fecha_estreno`, `fecha_c`, `fecha_m`) VALUES
(7, 10, 1, 'Fullmetal Alchemist: Brot', '00:00:40.00000', '2018-09-05', '2018-09-05', '2018-09-05'),
(6, 8, 44, 'Eveniet magna sint eum mi', '00:00:42.00000', '1989-07-03', '2018-09-01', '2018-09-01'),
(8, 11, 1, 'Shingeki no Kyojin', '00:00:30.00000', '2018-09-20', '2018-09-05', '2018-09-05'),
(9, 12, 33, 'Dolorem modi qui praesent', '00:00:02.00000', '2003-11-14', '2018-09-05', '2018-09-05'),
(10, 13, 48, 'Dolorum cupidatat et mole', '00:00:00.00000', '1980-10-22', '2018-09-05', '2018-09-05'),
(11, 14, 82, 'Non quo laboriosam tempor', '00:00:32.00000', '1987-05-05', '2018-09-05', '2018-09-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulo_video`
--

DROP TABLE IF EXISTS `capitulo_video`;
CREATE TABLE IF NOT EXISTS `capitulo_video` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_capitulo` int(15) NOT NULL,
  `url_video` varchar(400) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `provedor` varchar(400) NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_m` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `capitulo_video`
--

INSERT INTO `capitulo_video` (`id`, `id_capitulo`, `url_video`, `tipo`, `provedor`, `fecha_c`, `fecha_m`) VALUES
(1, 6, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/lCkXLO3IqUo\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '0', 'youtube', '2018-09-13', '2018-09-13'),
(2, 7, 'Quas rerum quos exercitationem quia ipsum pariatur Doloremque sint consequatur consectetur omnis quibusdam rerum corporis iure in fugiat quas dicta', '1', 'Sequi nobis culpa ipsam et quod placeat aperiam pariatur Dolor reiciendis excepteur et voluptas ut perspiciatis unde id dolores', '2018-09-18', '2018-09-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

DROP TABLE IF EXISTS `carrusel`;
CREATE TABLE IF NOT EXISTS `carrusel` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `url` varchar(400) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `posicion` int(2) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrusel`
--

INSERT INTO `carrusel` (`id`, `url`, `imagen`, `posicion`, `titulo`) VALUES
(6, '', 'file/img/img2018_09_10_40.jpeg', 1, ''),
(8, '', 'file/img/img2018_09_10_25.jpg', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `fecha_c` date DEFAULT NULL,
  `fecha_m` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `fecha_c`, `fecha_m`) VALUES
(2, 'Anime', '2018-08-26', '2018-08-27'),
(16, 'Ova', '2018-08-27', '2018-08-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_capitulo`
--

DROP TABLE IF EXISTS `comentario_capitulo`;
CREATE TABLE IF NOT EXISTS `comentario_capitulo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_capitulo` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `comentario` varchar(800) NOT NULL,
  `like` int(15) NOT NULL,
  `deslike` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario_capitulo`
--

INSERT INTO `comentario_capitulo` (`id`, `id_capitulo`, `id_user`, `comentario`, `like`, `deslike`) VALUES
(1, 6, 3, 'www', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_pelicula`
--

DROP TABLE IF EXISTS `comentario_pelicula`;
CREATE TABLE IF NOT EXISTS `comentario_pelicula` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_pelicula` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `comentario` varchar(800) NOT NULL,
  `like` int(15) NOT NULL,
  `deslike` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_serie`
--

DROP TABLE IF EXISTS `comentario_serie`;
CREATE TABLE IF NOT EXISTS `comentario_serie` (
  `id` int(21) NOT NULL AUTO_INCREMENT,
  `id_serie` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `comentario` varchar(800) NOT NULL,
  `like` int(10) NOT NULL,
  `deslike` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario_serie`
--

INSERT INTO `comentario_serie` (`id`, `id_serie`, `id_user`, `comentario`, `like`, `deslike`) VALUES
(1, 6, 3, 'coño', 0, 0),
(2, 3, 3, 'prueba numero 2', 0, 0),
(3, 5, 3, 'prueba', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos_capitulos`
--

DROP TABLE IF EXISTS `favoritos_capitulos`;
CREATE TABLE IF NOT EXISTS `favoritos_capitulos` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_capitulo` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos_peliculas`
--

DROP TABLE IF EXISTS `favoritos_peliculas`;
CREATE TABLE IF NOT EXISTS `favoritos_peliculas` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_pelicula` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos_serie`
--

DROP TABLE IF EXISTS `favoritos_serie`;
CREATE TABLE IF NOT EXISTS `favoritos_serie` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_serie` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE IF NOT EXISTS `generos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_m` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`, `fecha_c`, `fecha_m`) VALUES
(1, 'Porno ', '2018-08-27', '2018-08-28'),
(3, 'Comedia', '2018-08-29', '2018-08-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  `descripcion_corta` varchar(200) NOT NULL,
  `contenido` varchar(2000) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `portada` varchar(200) NOT NULL,
  `fecha_r` date NOT NULL,
  `fecha_m` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `descripcion_corta`, `contenido`, `tag`, `imagen`, `portada`, `fecha_r`, `fecha_m`) VALUES
(1, 'Sed vel nulla illum ', 'Voluptatibus assumenda non enim in consequatur dolores et suscipit facilis labore', '<p>mmmm</p>', 'Veniam est esse quas dolor ut iste', 'file/img/img2018_09_17_45.jpg', 'file/img/img2018_09_17_45.jpeg', '2018-09-17', '2018-09-17'),
(2, 'Harum reprehenderit ', 'Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt', '<p>Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt</p><p>Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserun Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt v vMinim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt v Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt v Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt</p>', 'Dolorum eligendi nostrud asperiores ex ut illo inventore et dolores dolorem duis illum sunt porro', 'file/img/img2018_09_17_37.jpg', 'file/img/img2018_09_17_37.jpg', '2018-09-17', '2018-09-17'),
(3, 'Aliquip laborum Sit ', 'Aut et sunt expedita enim assumenda error voluptate quia aute molestias possimus fuga Sit fugiat Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id i', '<p>Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt &nbsp;Minim dolores quia odio et dignissimos ullam amet id quaerat eiusmod quis pariatur Nisi blanditiis id in debitis deserunt&nbsp;</p>', 'Voluptatibus labore ea dolorem rerum cupidatat rem labore dolores perferendis voluptatem assumenda a', 'file/img/img2018_09_17_22.jpg', 'file/img/img2018_09_17_22.jpg', '2018-09-17', '2018-09-17'),
(4, 'Voluptates ut simili', 'Recusandae Nostrum pariatur Reiciendis nulla ea quis tempore est enim voluptate esse quae', '<p>Recusandae Nostrum pariatur Reiciendis nulla ea quis tempore est enim voluptate esse quae</p>', 'Earum et consequatur quis cumque irure expedita consequat Adipisci architecto', 'file/img/img2018_09_17_25.jpg', 'file/img/img2018_09_17_25.jpg', '2018-09-17', '2018-09-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE IF NOT EXISTS `peliculas` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `duracion` varchar(8) NOT NULL,
  `idioma` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `formato` varchar(20) NOT NULL,
  `fecha_estreno` date NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_m` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `imagen`, `descripcion`, `duracion`, `idioma`, `direccion`, `formato`, `fecha_estreno`, `fecha_c`, `fecha_m`) VALUES
(1, 'prueba', 'file/img/img2018_09_10_27.jpg', '<p>pruebaprueba</p>', '20min', 'Español', 'pruebad', 'pruebaf', '2018-09-25', '2018-09-10', '2018-09-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_genero`
--

DROP TABLE IF EXISTS `pelicula_genero`;
CREATE TABLE IF NOT EXISTS `pelicula_genero` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_pelicula` int(15) NOT NULL,
  `id_genero` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula_genero`
--

INSERT INTO `pelicula_genero` (`id`, `id_pelicula`, `id_genero`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_video`
--

DROP TABLE IF EXISTS `pelicula_video`;
CREATE TABLE IF NOT EXISTS `pelicula_video` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_pelicula` int(15) NOT NULL,
  `tipo` int(2) NOT NULL,
  `url_video` varchar(400) NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_m` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula_video`
--

INSERT INTO `pelicula_video` (`id`, `id_pelicula`, `tipo`, `url_video`, `fecha_c`, `fecha_m`) VALUES
(1, 1, 0, 'dddd', '2018-09-13', '2018-09-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `dias` varchar(15) NOT NULL,
  `duracion` varchar(15) NOT NULL,
  `imagen` varchar(400) NOT NULL,
  `imagen2` varchar(200) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `tipo` int(2) NOT NULL,
  `fecha_estreno` date NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_m` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`id`, `nombre`, `descripcion`, `dias`, `duracion`, `imagen`, `imagen2`, `categoria`, `estado`, `tipo`, `fecha_estreno`, `fecha_c`, `fecha_m`) VALUES
(3, 'Naturo', 'DDD', 'Viernes', '2omin', 'file/img/img2018_09_04_10.jpg', 'file/img/img2018_09_05_12.jpg', 'Anime', 'Por estrenar', 0, '2018-08-08', '2018-09-01', '2018-09-05'),
(4, 'Fullmetal Alchemist: Brotherho', '<p>Fullmetal Alchemist: Brotherhood es la segunda serie de anime de la franquicia Fullmetal Alchemist, no obstante el título de esta serie continúa siendo «Fullmetal Alchemist» en la versión japonesa.</p>', 'Sin precisar', '40min', 'file/img/img2018_09_05_22.jpg', 'file/img/img2018_09_05_11.jpg', 'Anime', 'Finalizada', 0, '2009-04-05', '2018-09-05', '2018-09-05'),
(5, 'Shingeki no Kyojin', '<p><i><strong>Shingeki no Kyojin </strong></i>(????? <i>Shingeki no Kyojin</i><a href=\"https://es.wikipedia.org/wiki/Ayuda:Idioma_japon%C3%A9s\">?</a>), conocida en inglés como <i><strong>Attack on Titan</strong></i> y en <a href=\"https://es.wikipedia.org/wiki/Idioma_espa%C3%B1ol\">habla hispana</a> como <i><strong>Ataque a los titanes</strong></i>', 'Domingo', '20min', 'file/img/img2018_09_05_53.jpg', 'file/img/img2018_09_05_02.jpeg', 'Anime', 'En emisión', 0, '2018-09-01', '2018-09-05', '2018-09-05'),
(6, 'Dragon Ball Super', '<p>El dios de la Destrucción ha despertado, y se está dedicando a aniquilar planetas y acaba de descubrir la Tierra. Cuando lo descubre, el guerrero Goku pide ayuda de sus amigos para convertirse en un legendario Super Saiyajin y poder derrotarlo.</p>', 'Lunes', '20min', 'file/img/img2018_09_05_42.jpg', 'file/img/img2018_09_05_46.jpg', 'Anime', 'En emisión', 0, '2018-09-06', '2018-09-05', '2018-09-05'),
(7, 'Tokyo Ghoul', '<p>Tokyo Ghoul es una serie de manga japonesa escrita e ilustrada por Sui Ishida, serializada en la revista seinen Young Jump, con entrega semanal desde septiembre del 2011. Compilado en 14 volúmenes a partir de junio del 2014.</p>', 'Sin precisar', '20min', 'file/img/img2018_09_05_02.jpg', 'file/img/img2018_09_05_14.jpeg', 'Anime', 'Finalizada', 0, '1192-08-10', '2018-09-05', '2018-09-05'),
(8, 'Death note', '<p>Death Note es una serie de manga escrita por Tsugumi ?ba e ilustrada por Takeshi Obata, y cuya adaptación al anime fue dirigida por Tetsur? Araki. Cuenta, además, con varias películas y videojuegos.</p>', 'Sin precisar', '30min', 'file/img/img2018_09_05_32.jpg', 'file/img/img2018_09_05_26.jpg', 'Anime', 'Finalizada', 0, '2018-09-05', '2018-09-05', '2018-09-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series_destacadas`
--

DROP TABLE IF EXISTS `series_destacadas`;
CREATE TABLE IF NOT EXISTS `series_destacadas` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_serie` int(15) NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_m` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `series_destacadas`
--

INSERT INTO `series_destacadas` (`id`, `id_serie`, `fecha_c`, `fecha_m`) VALUES
(3, 3, '2018-09-04', '2018-09-04'),
(4, 5, '2018-09-05', '2018-09-05'),
(5, 8, '2018-09-05', '2018-09-05'),
(6, 4, '2018-09-11', '2018-09-11'),
(7, 6, '2018-09-11', '2018-09-11'),
(8, 7, '2018-09-11', '2018-09-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie_genero`
--

DROP TABLE IF EXISTS `serie_genero`;
CREATE TABLE IF NOT EXISTS `serie_genero` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_serie` int(15) NOT NULL,
  `id_genero` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `serie_genero`
--

INSERT INTO `serie_genero` (`id`, `id_serie`, `id_genero`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 3),
(7, 7, 3),
(8, 8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `st_datos`
--

DROP TABLE IF EXISTS `st_datos`;
CREATE TABLE IF NOT EXISTS `st_datos` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `logo2` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `st_datos`
--

INSERT INTO `st_datos` (`id`, `nombre`, `descripcion`, `logo`, `logo2`, `icon`, `correo`, `telefono`) VALUES
(1, 'Animex', 'Animex esta info viene de base de datos', '', '', '', 'edwin@clubdegorras.com', '+58 0416 058 07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `st_menu`
--

DROP TABLE IF EXISTS `st_menu`;
CREATE TABLE IF NOT EXISTS `st_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menus` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `url` varchar(200) NOT NULL,
  `posicion` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `st_menu`
--

INSERT INTO `st_menu` (`id`, `id_menus`, `nombre`, `url`, `posicion`) VALUES
(1, '1', 'inicio', 'wwww', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `st_menus`
--

DROP TABLE IF EXISTS `st_menus`;
CREATE TABLE IF NOT EXISTS `st_menus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `st_menus`
--

INSERT INTO `st_menus` (`id`, `nombre`) VALUES
(1, 'navbar'),
(2, 'footer_1'),
(3, 'footer_2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

DROP TABLE IF EXISTS `temporada`;
CREATE TABLE IF NOT EXISTS `temporada` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_serie` int(15) NOT NULL,
  `numero` int(15) NOT NULL,
  `fecha_estreno` date NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_m` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temporada`
--

INSERT INTO `temporada` (`id`, `id_serie`, `numero`, `fecha_estreno`, `fecha_c`, `fecha_m`) VALUES
(11, 5, 3, '2018-09-05', '2018-09-05', '2018-09-05'),
(10, 4, 1, '2018-09-01', '2018-09-05', '2018-09-05'),
(9, 3, 1, '2018-09-13', '2018-09-01', '2018-09-01'),
(12, 8, 1, '1993-03-20', '2018-09-05', '2018-09-05'),
(8, 3, 2, '2018-08-10', '2018-09-01', '2018-09-01'),
(13, 7, 1, '2018-09-21', '2018-09-05', '2018-09-05'),
(14, 6, 2, '2018-09-16', '2018-09-05', '2018-09-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `mail` varchar(200) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `tipo` int(4) NOT NULL,
  `fecha_c` date NOT NULL,
  `fecha_m` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `mail`, `nickname`, `pass`, `nombre`, `apellido`, `nacimiento`, `sexo`, `foto`, `tipo`, `fecha_c`, `fecha_m`) VALUES
(1, 'sofiasinger19@gmail.com', 'jojo', '12345', 'sofia', 'singer', '1997-08-19', 'f', '', 0, '2018-08-18', '2018-09-09'),
(3, 'edwin.jme@gmail.com', 'eJme1992', '2664265', 'Edwin Jose', 'Mogollon E.', '1992-07-10', 'M', 'file/img/img2018_09_09_27.jpg', 1, '2018-08-01', '2018-09-10'),
(4, 'wilber@gmail.com', '', '12345', 'wilber', 'mendoza', '2018-09-21', 'M', '', 1, '2018-09-01', '2018-09-01'),
(6, 'pububagu@mailinator.net', '', 'Pa$$w0rd!', 'Eius commodi voluptate tenetur', 'Numquam fuga Ut voluptates dol', '1995-09-28', 'F', '', 0, '2018-09-15', '2018-09-15'),
(7, 'vovy@mailinator.net', '', 'Pa$$w0rd!', 'Aspernatur aspernatur veniam m', 'Nihil aliquam exercitationem e', '1999-12-28', 'M', '', 0, '2018-09-16', '2018-09-16'),
(8, 'edwin.jme@hotmail.com', '', '2664265', 'Officia nisi dolor pariatur Ex', 'Sed repudiandae eos lorem veni', '2011-08-11', 'M', '', 0, '2018-09-16', '2018-09-16'),
(9, 'jegam@mailinator.net', '', 'Pa$$w0rd!', 'Ipsum dolores totam aliquid co', 'Ad assumenda repudiandae labor', '1987-01-06', 'F', '', 0, '2018-09-16', '2018-09-16'),
(10, 'pikoq@mailinator.com', '', 'Pa$$w0rd!', 'Ipsa accusamus ut consequuntur', 'Ab atque occaecat quaerat perf', '1976-01-13', 'M', '', 0, '2018-09-16', '2018-09-16'),
(11, 'pipo@mailinator.com', '', 'Pa$$w0rd!', 'Expedita autem laborum Suscipi', 'Sit quis deserunt voluptate no', '1997-10-03', 'F', '', 0, '2018-09-16', '2018-09-16'),
(12, 'qyku@mailinator.net', '', 'Pa$$w0rd!', 'Molestias id ea eum iste esse ', 'Eligendi velit architecto labo', '2004-12-24', 'F', '', 0, '2018-09-16', '2018-09-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
