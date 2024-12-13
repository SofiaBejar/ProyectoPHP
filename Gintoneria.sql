-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 13-12-2024 a las 15:59:58
-- Versión del servidor: 11.5.2-MariaDB-ubu2404
-- Versión de PHP: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
USE Gintoneria;
--
-- Base de datos: `Gintoneria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Favorita`
--

CREATE TABLE `Favorita` (
  `idGin` int(11) DEFAULT NULL,
  `idUsu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `Favorita`
--

INSERT INTO `Favorita` (`idGin`, `idUsu`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ginebra`
--

CREATE TABLE `Ginebra` (
  `idGin` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `alcohol` float NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `Ginebra`
--

INSERT INTO `Ginebra` (`idGin`, `nombre`, `tipo`, `pais`, `alcohol`, `descripcion`, `precio`, `imagen`) VALUES
(1, 'Beefeater', 'London Dry', 'Reino Unido', 40, 'Ginebra clásica y seca con notas de enebro, cítricos y especias.', 25, 'https://www.campoluzenoteca.com/8525-img_ppage/beefeater.jpg'),
(2, 'Elephant', 'Especiada', 'Alemania', 47, 'Es una ginebra premium artesanal que emplea una singular mezcla de botánicos que nos recuerdan al espíritu explorador del continente africano en el siglo XIX y la necesaria protección de su fauna. ', 30, 'https://www.campoluzenoteca.com/11637-img_ppage/gin-elephant-london-dry-gin-50cl.jpg'),
(3, 'Tanqueray', 'London Dry', 'Reino Unido', 47.3, 'Ginebra robusta y de cuerpo completo con toques de enebro y cítricos.', 32, 'https://www.campoluzenoteca.com/11023-img_ppage/tanqueray.jpg'),
(4, 'Hendrick\'s', 'Herbácea', 'Escocia', 41.4, 'Ginebra floral con infusión de pepino y pétalos de rosa.', 45, 'https://www.campoluzenoteca.com/6644-img_ppage/gin-hendricks.jpg'),
(5, 'Monkey 47', 'Herbácea', 'Alemania', 47, 'Ginebra compleja con 47 ingredientes botánicos, incluyendo arándano y enebro.', 60, 'https://www.campoluzenoteca.com/14643-img_ppage/gin-monkey-47-50cl.jpg'),
(6, 'Gin Mare', 'Mediterránea', 'España', 42.7, 'Ginebra suave con toques de albahaca, romero, tomillo y cítricos mediterráneos.', 35, 'https://www.campoluzenoteca.com/11483-img_ppage/ginebra-gin-mare-capri.jpg'),
(7, 'Jinzu', 'Especiada', 'Japonesa', 41.3, 'Los tradicionales botánicos como el enebro y el cilantro se combinan armoniosamente con la acidez del yuzu, la sutileza de las flores de cerezo y la firmeza del sake de Kobe.', 50, 'https://www.campoluzenoteca.com/9825-img_ppage/gin-jinzu.jpg'),
(8, 'Citadelle', 'Especiada', 'Francia', 46, 'Los botánicos utilizados son enebro, piel de limón, naranja, regalíz, canela, casia, nuez moscada, angélica, pino, anís, violeta, almendras, cilantro, cardamomo, pimienta, ajedrea, hinojo y raíz de lirio.', 55, 'https://www.campoluzenoteca.com/7636-img_ppage/gin-citadelle.jpg'),
(9, 'Gordons', 'London Dry', 'Reino Unido', 37.5, 'Ginebra tradicional con sabores de enebro y cítricos.', 15, 'https://www.campoluzenoteca.com/9823-img_ppage/gordons-london-dry-gin.jpg'),
(10, 'Canaïma', 'Herbácea', 'Venezuela', 47, 'Canaima Gin está elaborada con el 65% de los ingredientes botánicos provenientes de la Amazonía. Así  10 de sus 19 botánicos proceden de la Amazonía venezolana.', 39.3, 'https://www.campoluzenoteca.com/4761-img_ppage/canaima-gin.jpg'),
(11, 'Macaronesian', 'Especiada', 'España', 42, 'Ginebra con notas de enebro, cilantro y una mezcla de hierbas.', 24, 'https://www.campoluzenoteca.com/14020-img_ppage/Gin-Macaronesian.jpg'),
(12, 'Whitley Neill', 'Afrutada', 'Reino Unido', 43, 'Ginebra con infusión de frutos exóticos como el durazno y el albaricoque.', 35, 'https://www.campoluzenoteca.com/6995-img_ppage/whitley-neill-rhubarb-ginger-gin-70cl.jpg'),
(13, 'Mombasa', 'Especiada', 'Reino Unido', 41, 'Ginebra con sabor afrutado y notas de mora, arándano y piel de naranja.', 24, 'https://www.campoluzenoteca.com/13961-img_ppage/gin-mombasa-club.jpg'),
(14, 'Roku', 'Cítrica', 'Japón', 43, 'Ginebra japonesa con notas de té verde, flor de cerezo y especias orientales.', 45, 'https://www.campoluzenoteca.com/4259-img_ppage/gin-premium-roku.jpg'),
(15, 'Ginebra Larios', 'Cítrica', 'España', 37.5, 'Ginebra tradicional con toques de enebro y cítricos.', 18, 'https://www.campoluzenoteca.com/6090-img_ppage/larios-london-dry-gin-1l.jpg'),
(16, 'Seagram\'s', 'London Dry', 'EE. UU.', 40, 'Ginebra suave y ligeramente dulce con un toque de enebro.', 20, 'https://www.campoluzenoteca.com/11507-img_ppage/seagrams.jpg'),
(17, 'Tanqueray No.10', 'London Dry', 'Reino Unido', 47.3, 'Ginebra premium con cítricos frescos y enebro.', 50, 'https://www.campoluzenoteca.com/9830-img_ppage/tanqueray-ten-gin.jpg'),
(18, 'Caorunn', 'Cítrica', 'Escocia', 41.8, 'Ginebra con toques de manzana, enebro y hierbas escocesas.', 40, 'https://www.campoluzenoteca.com/4705-img_ppage/gin-caorunn.jpg'),
(19, 'London Nº1', 'London Dry', 'Reino Unido', 47, 'Ginebra con un equilibrio perfecto entre enebro y cítricos.', 42, 'https://www.campoluzenoteca.com/5740-img_ppage/the-london-gin-n1.jpg'),
(20, 'June', 'Afrutada', 'Francia', 28, 'Esprit de June es un Gin Liqueur único destilado en una base de uva y infusionado con las flores de la misma, donde cada variedad de uva (Ugni Blanc, Merlot y Cabernet Sauvignon) proporciona unos aromas específicos.', 25, 'https://www.campoluzenoteca.com/4515-img_ppage/june-gin-liqueur.jpg'),
(21, 'Boë', 'Afrutada', 'Escocia', 42, 'Esta ginebra añade violetas  a su fórmula original, dando como resultado a Boë Violet Gin. La adición de violetas crea una ginebra elegante con un ligero y delicado sabor. Su aroma y color son inconfundibles. ', 34, 'https://www.campoluzenoteca.com/6993-img_ppage/gin-boe-violet.jpg'),
(22, 'Seis14 Gintol', 'Afrutada', 'México', 42, 'El Gin Seis14 Gintol redefine el arte de la destilación con una propuesta audaz y refrescante. Este gin premium se destaca por su innovadora infusión de hierbas aromáticas y un toque distintivo de hinojo, todo destilado en pequeños lotes para garantizar la máxima calidad y frescura.', 63, 'https://www.campoluzenoteca.com/14024-img_ppage/Gin-Seis14-Gintol.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `idUsu` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `clave` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `administrador` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`idUsu`, `nombre`, `apellido`, `email`, `foto`, `clave`, `administrador`) VALUES
(1, 'Sofia', 'Bejar', 'sbr@gmail.com', 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png', '25d55ad283aa400af464c76d713c07ad', 1),
(5, 'preuba', 'preuba', 'preuba@gmail.com', NULL, '1243', 0),
(6, 'preuba', 'preuba', 'preuba@gmail.com', NULL, '1243', 0),
(7, 'sofia', 'preuba', 'preuab@gmail.com', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 0),
(8, 'Prueba', 'prueba', 'preub', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 0),
(9, 'Antonio', 'Ginebra', 'antonio@gmail.com', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 0),
(10, 'Prueba', 'Prueba', 'prueba', NULL, 'c893bad68927b457dbed39460e6afd62', 0),
(11, 'Elizabeth', 'Rimoldi', 'ely@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Favorita`
--
ALTER TABLE `Favorita`
  ADD KEY `fk_idGin` (`idGin`),
  ADD KEY `fk_idUsu` (`idUsu`);

--
-- Indices de la tabla `Ginebra`
--
ALTER TABLE `Ginebra`
  ADD PRIMARY KEY (`idGin`),
  ADD KEY `idGin` (`idGin`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`idUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Ginebra`
--
ALTER TABLE `Ginebra`
  MODIFY `idGin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Favorita`
--
ALTER TABLE `Favorita`
  ADD CONSTRAINT `fk_idGin` FOREIGN KEY (`idGin`) REFERENCES `Ginebra` (`idGin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idUsu` FOREIGN KEY (`idUsu`) REFERENCES `Usuario` (`idUsu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
