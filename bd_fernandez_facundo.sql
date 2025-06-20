-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2025 a las 00:19:05
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
-- Base de datos: `bd_fernandez_facundo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activo` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `activo`) VALUES
(1, 'Hogar', 1),
(2, 'Trabajo', 1),
(3, 'Educación', 1),
(4, 'Gaming', 1),
(5, 'Diseño y Edición Multimedia', 1),
(6, 'Lolasas', 2),
(7, 'Lol', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `consulta` varchar(500) NOT NULL,
  `leido` varchar(2) NOT NULL DEFAULT 'NO',
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `nombre`, `apellido`, `dni`, `telefono`, `email`, `consulta`, `leido`, `baja`) VALUES
(1, 'Facundo Antonio', 'Fernandez Gonzalez', 12345678, 1234567890, 'ffacundo544.fernandez.zzz@gmail.com', 'Hola, esto es una consulta', 'NO', 'NO'),
(2, 'Facundo Antonio', 'Fernandez Gonzalez', 12345678, 2147483647, 'ffacundo544.fernandez.z@gmail.com', 'assssssssssssssssssssssssssssssssss', 'SI', 'SI'),
(3, 'Antonio', 'Fernandez', 24562709, 2147483647, 'elAbc12345@gmail.com', 'peledkms eajksak tersesn asasl', 'NO', 'NO'),
(4, 'Facundo', 'Fernandez', 12345678, 1234567890, 'ffacundo544.fernandez.z@gmail.com', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias, illo hic possimus ullam perferendis dicta id consectetur earum deleniti vel officiis animi quidem, labore unde voluptatem obcaecati debitis velit! Distinctio?', 'NO', 'NO'),
(5, 'Facundo Antonio', 'Fernandez Gonzalez', 12345678, 1234567890, 'ffacundo544.fernandez.z@gmail.com', 'Este es una consulta de prueba', 'NO', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activo` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `descripcion`, `activo`) VALUES
(1, 'Apple', 1),
(2, 'Lenovo', 1),
(3, 'HP', 1),
(4, 'Dell', 1),
(5, 'Samsung', 1),
(6, 'Noblex', 1),
(7, 'Exo', 1),
(8, 'ASUS', 1),
(9, 'abc', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `baja` varchar(10) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `descripcion`, `baja`) VALUES
(1, 'Administrador', 'NO'),
(2, 'Cliente', 'NO'),
(3, 'Messi', 'SI'),
(4, 'Nose', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `precio_vta` float(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `eliminado` varchar(10) NOT NULL DEFAULT 'NO',
  `descripcion` varchar(500) NOT NULL,
  `marca_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `imagen`, `categoria_id`, `precio`, `precio_vta`, `stock`, `stock_min`, `eliminado`, `descripcion`, `marca_id`) VALUES
(1, 'Notebook HP 255 G10', '1750357085_488a01bf47c6378b8f25.png', 2, 453000.00, 408200.00, 9, 5, 'NO', '255 G10 Ryzen 7 16GB RAM 512GB SSD 15.6”', 3),
(2, 'Notebook HP 255 G10', '1750357332_61a2a0e262115838db0d.png', 2, 290000.00, 273500.00, 9, 5, 'NO', 'Ryzen 5 7530U | 8GB RAM | 512GB SSD | Pantalla 15.6” HD', 3),
(3, 'Notebook Apple MacBook Air 13 M2', '1750357515_987c9ca1ae82f177f3a1.png', 4, 1500000.00, 900000.00, 4, 5, 'NO', 'Chip M2 | 8GB RAM | 256GB SSD | Pantalla Retina 13.6”', 1),
(4, 'Notebook Apple MacBook Pro 14 M3 Pro', '1750357606_a5a9d9f0f741d8f63810.png', 1, 893050.00, 700405.00, 6, 5, 'NO', 'Chip M3 Pro | 18GB RAM | 512GB SSD | Pantalla Liquid Retina XDR 14.2”', 1),
(5, 'Notebook Lenovo IdeaPad 3 15ALC6', '1750357710_34e26334041e1f3b21c6.png', 3, 400000.00, 400000.00, 18, 5, 'NO', 'Ryzen 5 5500U | 8GB RAM | 512GB SSD | Pantalla 15.6” Full HD', 2),
(6, 'Notebook Lenovo IdeaPad Slim 5 Gen 10', '1750357813_fb77a0bc4c58b3dc9e12.png', 5, 320000.00, 209000.00, 8, 5, 'NO', 'Ryzen 7 7735HS | 16GB RAM | 1TB SSD | Pantalla 15.3” WUXGA', 2),
(7, 'Laptop Dell Inspiron 15 3520', '1750358512_899b5c1a013618d152d6.png', 1, 10000.00, 60000.00, 3, 2, 'NO', 'Intel Core i5 1235U | 8GB RAM | 512GB SSD | Pantalla 15.6” Full HD', 4),
(8, 'Laptop Dell Vostro 14 3430', '1750358603_8c02a005237bd10ed989.png', 2, 300000.00, 105000.00, 7, 5, 'NO', 'Intel Core i7 1355U | 16GB RAM | 512GB SSD | Pantalla 14” Full HD', 4),
(9, 'Notebook Samsung Galaxy Book3 360 13.3', '1750358732_3bb1b094be098c37f15e.png', 4, 900000.00, 900000.00, 9, 5, 'NO', 'Intel Core i5 1335U | 8GB RAM | 512GB SSD | Pantalla AMOLED 13.3” Full HD Touch', 5),
(10, 'Notebook Samsung Galaxy Book3 Pro 15.6', '1750358787_bc757073f40002ee9d31.png', 1, 850000.00, 790000.00, 6, 5, 'NO', 'Intel Core i3 1260P | 6 Núcleos | 16GB RAM | 1TB SSD | Pantalla AMOLED 15.6” Full HD', 5),
(11, 'Notebook Noblex N14X1010', '1750359052_d3d03ad7d578b9314b01.png', 3, 180000.00, 180000.00, 3, 5, 'NO', 'Intel Celeron N4020C | 4GB RAM | 128GB SSD | Pantalla 14.1” HD', 6),
(12, 'Notebook Noblex N15W6100', '1750359095_20f2ebdb210117b2b577.png', 1, 80000.00, 80000.00, 1, 5, 'SI', 'Intel Core inside | 4GB RAM | 256GB SSD', 6),
(13, 'Laptop Exo Smart XQ3T-C382', '1750359283_9b53ee20a9acfb3b5663.png', 1, 200000.00, 200000.00, 7, 5, 'NO', 'Intel Core i3 1005G1 | 8GB RAM | 128GB SSD | Pantalla 15.6” HD', 7),
(14, 'Laptop Exo XR3 14', '1750359327_9ebfe375918ec9672e4e.png', 3, 305000.00, 290000.00, 9, 5, 'NO', 'Intel Celeron N4020 | 4GB RAM | 64GB SSD + 256GB SSD | Pantalla 14.1” HD', 7),
(15, 'Laptop ASUS VivoBook 15 X1502ZA', '1750359715_9ae2f6a64319d2d6324d.png', 4, 700000.00, 680000.00, 6, 5, 'NO', 'Intel Core i5 1235U | 8GB RAM | 512GB SSD | Pantalla 15.6” Full HD', 8),
(16, 'Laptop ASUS ZenBook 14 OLED UX3402ZA', '1750359949_b68b6db7b606c5c1fa12.png', 5, 600000.00, 560000.00, 5, 5, 'NO', 'Intel Core i7 1260P | 16GB RAM | 512GB SSD | Pantalla OLED 14” 2.8K', 8),
(17, 'Laptop ASUS TUF Gaming F15 FX507ZC4', '1750359994_72c0f555e60354344472.png', 4, 400000.00, 400000.00, 8, 5, 'NO', 'Intel Core i5 12500H | 16GB RAM | 512GB SSD | NVIDIA RTX 3050 | Pantalla 15.6” FHD 144Hz', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `email`, `pass`, `perfil_id`, `baja`) VALUES
(3, 'Facundo Antonio', 'Fernandez Gonzalez', 'Facundo971', 'ffacundo544.fernandez.z@gmail.com', '$2y$10$Ry01OCgwK5Hn/pasxieuR.QXtbl/BsaHRl4VYXU9OVV0xPt6N7jq.', 1, 'NO'),
(4, 'Pepe', 'El', 'Pepe123', 'pepe@gmail.com', '$2y$10$Quo0IA0DRL/1v8ifrN9EW.ZbFg/B9wuqe7nkrk.ArWgnvEI7pW4rq', 2, 'NO'),
(5, 'Facundo', 'Fernandez', 'Facundo 2', 'facundo2@gmail.com', '$2y$10$O1XlT2JKi8LMQzdegMcxPOOVouYO8cGNHPFKuD24dmJW1Qr9D4gcC', 2, 'SI'),
(6, 'Pepe', 'Pepsi', 'El Pepe 123', 'pepe123@gmail.com', '$2y$10$l5Ubcs5mHRQ4zSff42olNuOW5RBDaMP/ZX589e0iuQ7HjXAS2DTf.', 2, 'SI'),
(7, 'Messi', 'Lionel', 'GOAT', 'messi10@gmail.com', '$2y$10$Gjv5lTpiNGKLA4EzMLLXb.adiB2ikpWoG1DVkeFjZ.RyGQMSODm3.', 2, 'NO'),
(8, 'Ronaldo', 'Cristiano', 'CR7 Siuu', 'cristiano7@gmail.com', '$2y$10$EL3RTTizhhur.FJm87/sk.0TO2iRYinyrcnZ9rsoJtLt8UrVX6wRu', 2, 'NO'),
(9, 'Facu Anto', 'Fernan Gonza', 'Facu971', 'ffacundo544.fernandez.z971@gmail.com', '$2y$10$C1/HB7WQDRgP7upIT.WFcOftLt541EGTq5p3pA9XlW7zq78rMkSdW', 2, 'NO'),
(10, 'PepePe', 'PepsiPe', 'Pe causa123', 'pepePe@gmail.com', '$2y$10$ld.0Lv2mkbfLJ7t7vmdsQe1WyelKJD4xcBEMY3PQ/YQuLMrEHNt5m', 2, 'NO'),
(11, 'Antonio', 'Fernandez', 'El abc123', 'elAbc12345@gmail.com', '$2y$10$31xhvRzyzojRoqhXrfc/FOGtEUN6C5uZ5x.BPOHJtd7ObhHnyRKJK', 2, 'NO'),
(12, 'Facundo', 'Fer', 'Facundo 4', 'facundo4@gmail.com', '$2y$10$P.9KDeWBsCwaW2uiBXGCh./avGvPXaXiO4Vrxnw5s.cqHemFhC7He', 2, 'NO'),
(13, 'FacundoAbc', 'FernandezAbc', 'Persona', 'facundoAbc@gmail.com', '$2y$10$/vT4dI4griPTVleda32JY.SF9FYlovgqbFjQA.sMh7oBsKTlWm/MO', 2, 'SI'),
(14, 'Antonio Facu', 'Fernandez', 'Nose 123', 'facundoNose1@gmail.com', '$2y$10$daMujxy6/jmgsihwzkj1we5jRvOsKh4xuIjhXx/pfDPat2c95YVx2', 2, 'SI'),
(15, 'Julio', 'Perez', 'Julio25', 'julioPerez@gmail.com', '$2y$10$7z.tUV5MFuYa0VI4mvnUeeRxw/XLZ24Z8KT5.QANdarK7bB2ZTDde', 1, 'NO'),
(16, 'Pedro', 'Perez', 'Pedro25', 'pedroPerez@gmail.com', '$2y$10$1o36jjQwUK.XKX62Eroj6.XkzrPnHJAaWOYYVdb6aOdSSoeSEzWxS', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_id` int(11) NOT NULL,
  `total_venta` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id`, `fecha`, `usuario_id`, `total_venta`) VALUES
(1, '2025-06-07 16:40:11', 5, 13000.00),
(2, '2025-06-07 16:42:07', 5, 13000.00),
(3, '2025-06-07 16:59:30', 5, 25000.00),
(4, '2025-06-07 19:01:58', 5, 8500.00),
(5, '2025-06-07 21:44:17', 5, 5500.00),
(6, '2025-06-07 21:46:24', 6, 11500.00),
(7, '2025-06-07 22:15:33', 6, 20500.00),
(8, '2025-06-08 09:47:51', 5, 500.00),
(9, '2025-06-08 09:49:30', 5, 5000.00),
(10, '2025-06-08 09:50:20', 5, 3000.00),
(11, '2025-06-08 09:52:52', 5, 14500.00),
(12, '2025-06-08 10:44:33', 5, 10000.00),
(13, '2025-06-08 10:55:54', 5, 23000.00),
(14, '2025-06-08 11:06:32', 5, 5000.00),
(15, '2025-06-11 15:22:27', 5, 15000.00),
(16, '2025-06-11 16:59:33', 5, 15000.00),
(17, '2025-06-13 15:32:38', 5, 15000.00),
(18, '2025-06-13 15:35:05', 5, 12346.00),
(19, '2025-06-15 07:24:23', 5, 100782.00),
(20, '2025-06-18 18:24:19', 5, 240794.00),
(21, '2025-06-18 18:26:38', 5, 155806.00),
(22, '2025-06-18 18:27:39', 5, 7346.00),
(23, '2025-06-18 18:36:35', 5, 350782.00),
(24, '2025-06-18 19:40:49', 5, 5000.00),
(25, '2025-06-19 17:36:03', 5, 2363500.00),
(26, '2025-06-19 18:28:48', 5, 4927605.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 1, 2, 2, 10000.00),
(2, 2, 2, 2, 10000.00),
(3, 2, 3, 1, 3000.00),
(4, 3, 2, 5, 25000.00),
(5, 4, 1, 1, 500.00),
(6, 4, 2, 1, 5000.00),
(7, 4, 3, 1, 3000.00),
(8, 5, 1, 1, 500.00),
(9, 5, 2, 1, 5000.00),
(10, 6, 1, 3, 1500.00),
(11, 6, 2, 2, 10000.00),
(12, 7, 1, 1, 500.00),
(13, 7, 2, 1, 5000.00),
(14, 7, 3, 5, 15000.00),
(15, 8, 1, 1, 500.00),
(16, 9, 2, 1, 5000.00),
(17, 10, 3, 1, 3000.00),
(18, 11, 2, 2, 10000.00),
(19, 11, 1, 3, 1500.00),
(20, 11, 3, 1, 3000.00),
(21, 12, 2, 2, 10000.00),
(22, 13, 2, 4, 5000.00),
(23, 13, 3, 1, 3000.00),
(24, 14, 2, 1, 5000.00),
(25, 15, 2, 2, 5000.00),
(26, 15, 3, 1, 5000.00),
(27, 16, 3, 1, 5000.00),
(28, 16, 2, 2, 5000.00),
(29, 17, 2, 3, 5000.00),
(30, 18, 1, 3, 782.00),
(31, 18, 2, 2, 5000.00),
(32, 19, 2, 2, 5000.00),
(33, 19, 4, 1, 90000.00),
(34, 19, 1, 1, 782.00),
(35, 20, 1, 1, 782.00),
(36, 20, 6, 1, 12.00),
(37, 20, 5, 1, 150000.00),
(38, 20, 4, 1, 90000.00),
(39, 21, 2, 1, 5000.00),
(40, 21, 1, 1, 782.00),
(41, 21, 5, 1, 150000.00),
(42, 21, 6, 2, 12.00),
(43, 22, 1, 3, 782.00),
(44, 22, 2, 1, 5000.00),
(45, 23, 2, 4, 5000.00),
(46, 23, 5, 1, 150000.00),
(47, 23, 4, 2, 90000.00),
(48, 23, 1, 1, 782.00),
(49, 24, 2, 1, 5000.00),
(50, 25, 5, 1, 400000.00),
(51, 25, 10, 1, 790000.00),
(52, 25, 9, 1, 900000.00),
(53, 25, 2, 1, 273500.00),
(54, 26, 4, 1, 700405.00),
(55, 26, 3, 2, 900000.00),
(56, 26, 1, 1, 408200.00),
(57, 26, 10, 1, 790000.00),
(58, 26, 16, 1, 560000.00),
(59, 26, 6, 1, 209000.00),
(60, 26, 7, 1, 60000.00),
(61, 26, 5, 1, 400000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `marca_id` (`marca_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_id` (`venta_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id_marca`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`);

--
-- Filtros para la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD CONSTRAINT `ventas_cabecera_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`),
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
