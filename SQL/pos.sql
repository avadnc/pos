-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-11-2018 a las 01:04:37
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha_creacion`) VALUES
(1, 'Zapato Industrial', '2018-11-17 04:21:47'),
(2, 'Llave Española', '2018-11-17 04:21:47'),
(3, 'Herramientas Varias', '2018-11-21 05:15:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `const`
--

CREATE TABLE `const` (
  `nombre` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `entity` int(11) DEFAULT '1',
  `valor` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `comentario` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `const`
--

INSERT INTO `const` (`nombre`, `entity`, `valor`, `comentario`) VALUES
('nombre_empresa', 1, 'Alex Vives Alcazar', 'Nombre de la empresa'),
('titulo', 1, 'Sistema Punto de Venta', 'Descripcion del título');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE latin1_spanish_ci,
  `descripcion` text COLLATE latin1_spanish_ci,
  `imagen` text COLLATE latin1_spanish_ci,
  `stock` int(11) DEFAULT NULL,
  `precio_compra` float DEFAULT NULL,
  `precio_venta` float DEFAULT NULL,
  `moneda` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `marca` text COLLATE latin1_spanish_ci,
  `ventas` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `claveprodserv` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `umed` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `moneda`, `marca`, `ventas`, `fecha`, `claveprodserv`, `umed`) VALUES
(2, 1, 'TZ24', 'ZAPATO INDUSTRIAL N.24 ECONOMICO', 'img/productos/producto.png', 20, 326.41, 440.654, 'MXN', NULL, NULL, '2018-11-17 04:23:49', '46181605', 'H87'),
(3, 1, 'TZ25', 'ZAPATO INDUSTRIAL N.25 ECONOMICO', 'img/productos/producto.png', 20, 326.41, 440.654, 'MXN', NULL, NULL, '2018-11-17 04:23:49', '46181605', 'H87'),
(4, 1, 'TZ26', 'ZAPATO INDUSTRIAL N.26 ECONOMICO', 'img/productos/producto.png', 20, 326.41, 440.654, 'MXN', NULL, NULL, '2018-11-17 04:23:49', '46181605', 'H87'),
(5, 1, 'TZ27', 'ZAPATO INDUSTRIAL N.27 ECONOMICO', 'img/productos/producto.png', 19, 326.41, 440.654, 'MXN', NULL, NULL, '2018-11-17 04:23:49', '46181605', 'H87'),
(6, 1, 'TZ28', 'ZAPATO INDUSTRIAL N.28 ECONOMICO', 'img/productos/producto.png', 20, 326.41, 440.654, 'MXN', NULL, NULL, '2018-11-17 04:23:49', '46181605', 'H87'),
(7, 1, 'WZ30', 'ZAPATO INDUSTRIAL N.30 C/C WSM/D', 'img/productos/producto.png', 20, 456.06, 620.242, 'MXN', NULL, NULL, '2018-11-17 04:23:49', '46181605', 'H87'),
(8, 1, 'WZ25', 'ZAPATO INDUSTRIAL N.25 C/C WSM/D', 'img/productos/producto.png', 20, 456.06, 620.242, 'MXN', NULL, NULL, '2018-11-17 04:23:49', '46181605', 'H87'),
(9, 1, 'WZ27', 'ZAPATO INDUSTRIAL N.27 C/C Y S/C WSM/D', 'img/productos/producto.png', 20, 456.06, 615.681, 'MXN', NULL, NULL, '2018-11-17 04:23:49', '46181605', 'H87'),
(12, 2, 'DI339-40', 'LLAVE ESPANOLA 12X13MM', 'img/productos/producto.png', 20, 19.17, 60, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(13, 2, 'DI339-41', 'LLAVE ESPANOLA 14X15MM', 'img/productos/producto.png', 20, 22.36, 55, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(14, 2, 'DI339-32', 'LLAVE ESPANOLA 1-2X9-16 STD', 'img/productos/producto.png', 20, 20.77, 54, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(15, 2, 'DI339-34', 'LLAVE ESPANOLA 5-8X3-4 STD', 'img/productos/producto.png', 20, 22.08, 29, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(16, 2, 'DI339-35', 'LLAVE ESPANOLA 5-8X11-16 STD-D', 'img/productos/producto.png', 20, 24.44, 33, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(17, 2, 'DI339-39', 'LLAVE ESPANOLA 10X11MM', 'img/productos/producto.png', 20, 15.97, 66, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(18, 2, 'DI339-43', 'LLAVE ESPANOLA 18X19MM', 'img/productos/producto.png', 20, 29.33, 111, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(19, 2, 'DI339-29', 'LLAVE ESPANOLA 5-16X3-8 STD-D', 'img/productos/producto.png', 20, 9.46, 255, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(20, 2, 'DI339-31-', 'LLAVE ESPANOLA 7-16X1-2 STD-D', 'img/productos/producto.png', 20, 17.57, 524765, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(21, 2, 'DI339-37-', 'LLAVE ESPANOLA 6X7MM-D', 'img/productos/producto.png', 20, 7.89, 213654, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(22, 2, 'G81792', 'LLAVE ESPANOLA 6 X 7 MM-D', 'img/productos/producto.png', 20, 25.74, 25465400, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(23, 2, 'G81799', 'LLAVE ESPANOLA STD 3-8 X 7-16-D', 'img/productos/producto.png', 2, 38.11, 45645, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(24, 2, 'G81801', 'LLAVE ESPANOLA STD 1-2X9-16-D', 'img/productos/producto.png', 20, 34.4, 456, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(25, 2, 'G81804', 'LLAVE ESPANOLA STD 15-16 X 1-D', 'img/productos/producto.png', 20, 68.26, 5467, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(26, 2, 'YES0810', 'LLAVE ESPANOLA 1-4X5-16\" P ESP-D', 'img/productos/producto.png', 20, 9.35, 4556, NULL, NULL, NULL, '2018-11-17 04:23:49', '27111713', 'H87'),
(27, 3, '001', 'Herramienta de Prueba', 'img/productos/producto.png', 10, 100, 135, 'MX', NULL, NULL, '2018-11-23 05:49:25', '01010101', 'H87'),
(28, 1, '002', 'Zapatilla de goma', 'img/productos/producto.png', 10, 100, 135, 'MX', NULL, NULL, '2018-11-23 17:06:58', '01010101', 'H87'),
(29, 3, '003', 'Megaconstrucciones', 'img/productos/producto.png', 10, 123.01, 166.064, 'MX', NULL, NULL, '2018-11-23 17:16:58', '01010101', 'H87');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `perfil` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `foto` text COLLATE latin1_spanish_ci,
  `estado` int(11) DEFAULT '1',
  `ultimo_login` datetime DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(14, 'Alex Vives', 'avives', '0FuEMg.g0K5gE', 'Administrador', 'img/usuarios/avives/607.jpg', 1, '2018-11-23 18:17:55', '2018-11-24 00:17:55'),
(25, 'Usuario Almacen', 'almacen', '0FD/SmJQw39lU', 'Especial', 'img/usuarios/almacen/125.jpg', 1, NULL, '2018-11-16 20:13:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
