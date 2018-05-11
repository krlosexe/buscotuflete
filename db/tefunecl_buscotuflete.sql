-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-05-2018 a las 19:24:29
-- Versión del servidor: 5.6.39-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tefunecl_buscotuflete`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(120) CHARACTER SET latin1 NOT NULL,
  `id_regiones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id`, `descripcion`, `id_regiones`) VALUES
(1, 'Arica', 1),
(2, 'Camarones', 1),
(3, 'General Lagos', 1),
(4, 'Putre', 1),
(5, 'Alto del Carmen', 2),
(6, 'Caldera', 2),
(7, 'Chañaral', 2),
(8, 'Copiapó', 2),
(9, 'Diego de Almagro', 2),
(10, 'Freirina', 2),
(11, 'Huasco', 2),
(12, 'Tierra Amarilla', 2),
(13, 'Vallenar', 2),
(14, 'Aysen', 3),
(15, 'Chile Chico', 3),
(16, 'Cisnes', 3),
(17, 'Cochrane', 3),
(18, 'Coyhaique', 3),
(19, 'Guaitecas', 3),
(20, 'Lago Verde', 3),
(21, 'O\'Higgins', 3),
(22, 'Río Ibáñez', 3),
(23, 'Tortel', 3),
(24, 'Alto Biobío', 4),
(25, 'Antuco', 4),
(26, 'Arauco', 4),
(27, 'Bulnes', 4),
(28, 'Cabrero', 4),
(29, 'Cañete', 4),
(30, 'Chiguayante', 4),
(31, 'Chillán', 4),
(32, 'Chillán Viejo', 4),
(33, 'Cobquecura', 4),
(34, 'Coelemu', 4),
(35, 'Coihueco', 4),
(36, 'Concepción', 4),
(37, 'Contulmo', 4),
(38, 'Coronel', 4),
(39, 'Curanilahue', 4),
(40, 'El Carmen', 4),
(41, 'Florida', 4),
(42, 'Hualpén', 4),
(43, 'Hualqui', 4),
(44, 'Laja', 4),
(45, 'Lebu', 4),
(46, 'Los Alamos', 4),
(47, 'Los Angeles', 4),
(48, 'Lota', 4),
(49, 'Mulchén', 4),
(50, 'Nacimiento', 4),
(51, 'Negrete', 4),
(52, 'Ninhue', 4),
(53, 'Ñiquén', 4),
(54, 'Pemuco', 4),
(55, 'Penco', 4),
(56, 'Pinto', 4),
(57, 'Portezuelo', 4),
(58, 'Quilaco', 4),
(59, 'Quilleco', 4),
(60, 'Quillón', 4),
(61, 'Quirihue', 4),
(62, 'Ránquil', 4),
(63, 'San Carlos', 4),
(64, 'San Fabián', 4),
(65, 'San Ignacio', 4),
(66, 'San Nicolás', 4),
(67, 'San Pedro de la Paz', 4),
(68, 'San Rosendo', 4),
(69, 'Santa Bárbara', 4),
(70, 'Santa Juana', 4),
(71, 'Talcahuano', 4),
(72, 'Tirúa', 4),
(73, 'Tomé', 4),
(74, 'Treguaco', 4),
(75, 'Tucapel', 4),
(76, 'Yumbel', 4),
(77, 'Yungay', 4),
(78, 'Andacollo', 5),
(79, 'Canela', 5),
(80, 'Combarbalá', 5),
(81, 'Coquimbo', 5),
(82, 'Illapel', 5),
(83, 'La Higuera', 5),
(84, 'La Serena', 5),
(85, 'Los Vilos', 5),
(86, 'Monte Patria', 5),
(87, 'Ovalle', 5),
(88, 'Paiguano', 5),
(89, 'Punitaqui', 5),
(90, 'Río Hurtado', 5),
(91, 'Salamanca', 5),
(92, 'Vicuña', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(120) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `descripcion`) VALUES
(1, 'Arica y Parianacota'),
(2, 'Atacama'),
(3, 'Aysen'),
(4, 'Biobío'),
(5, 'Coquimbo'),
(6, 'De Los Lagos'),
(7, 'De Los Ríos'),
(8, 'Libertador Gral. Bernardo O\'higgins'),
(9, 'Magallanes y de la Antártica Chilena'),
(10, 'Maule'),
(11, 'Metropolitana'),
(12, 'Tarapacá'),
(13, 'Valparaíso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(120) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
(1, '', ''),
(2, 'admin', 'control total'),
(3, 'cliente', 'registra y solicita servicio'),
(4, 'transporte', 'registra y ofrece su servicio'),
(5, 'revisor', 'enlaza las peticiones cliente y transporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_fletes`
--

CREATE TABLE `solicitudes_fletes` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `partida` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `destino` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_carga` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad_bultos` int(11) NOT NULL,
  `id_tipo_lugar` int(11) NOT NULL,
  `peso_aproximado` int(11) NOT NULL,
  `id_capacidad_carga` int(11) NOT NULL,
  `requiere_ayudante` int(11) NOT NULL,
  `cantidad_ayudante` int(11) NOT NULL,
  `monto_pagar` decimal(10,0) NOT NULL,
  `id_tipo_pago` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_capacidad_cargas`
--

CREATE TABLE `tipos_capacidad_cargas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(120) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipos_capacidad_cargas`
--

INSERT INTO `tipos_capacidad_cargas` (`id`, `descripcion`) VALUES
(1, '500 a 1.000 kilos'),
(2, '1.000 a 1.750 kilos'),
(3, '1.750 a 3.000 kilos'),
(4, '3.000 a 5.000 kilos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_lugares`
--

CREATE TABLE `tipos_lugares` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(35) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipos_lugares`
--

INSERT INTO `tipos_lugares` (`id`, `descripcion`) VALUES
(1, 'Casa'),
(2, 'Departamento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_pagos`
--

CREATE TABLE `tipos_pagos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(120) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipos_pagos`
--

INSERT INTO `tipos_pagos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Webpay Debito', ''),
(2, 'Webpay Tarjeta Crédito', ''),
(3, 'Transferencia Bancaria', ''),
(4, 'Efectivo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_vehiculos`
--

CREATE TABLE `tipos_vehiculos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(65) COLLATE utf8_spanish2_ci NOT NULL,
  `capacidad` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipos_vehiculos`
--

INSERT INTO `tipos_vehiculos` (`id`, `descripcion`, `capacidad`) VALUES
(1, 'Camión ¾ furgón', '0 - 5000 kilos'),
(2, 'Camión ¾ furgón frio ', '0 - 3000 kilos'),
(3, 'Camión ¾ plano', '0 - 5000 kilos'),
(4, 'Camioneta pickup doble cabina', '0 - 1000 kilos'),
(5, 'Camioneta pickup simple', '0 - 1750 kilos'),
(6, 'Furgón', '0 - 1000 kilos'),
(7, 'Furgón con frio ', '0 - 1750 kilos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE `transportes` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_tipo_vehiculo` int(11) NOT NULL,
  `id_tipo_capacidad_carga` int(11) NOT NULL,
  `ano_fabricacion` int(11) NOT NULL,
  `marca` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `permiso_circulacion` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `revision_tecnica` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `seguro_obligatorio` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `licencia_conducir` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `cedula_identidad` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `loginUsers` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `passUsers` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_identidad` int(11) NOT NULL,
  `identidad` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `serie` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `p_nombre` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `s_nombre` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `p_apellido` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `s_apellido` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `celular` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `dia_nac` int(11) NOT NULL,
  `mes_nac` int(11) NOT NULL,
  `ano_nac` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `direccion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fotos` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `rol_id` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `loginUsers`, `passUsers`, `id_identidad`, `identidad`, `serie`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `email`, `telefono`, `celular`, `dia_nac`, `mes_nac`, `ano_nac`, `id_region`, `id_comuna`, `direccion`, `fotos`, `rol_id`, `estatus`) VALUES
(16, 'krlosexe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', '', 'cardenascarlos18@gmail.com', '', '', 0, 0, 0, 0, 0, '', '', 2, 0),
(17, 'juan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', '', 'juan@gmail.com', '', '', 0, 0, 0, 0, 0, '', '', 2, 0),
(18, 'myzuwir', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 0, '', '', '', '', '', '', 'kotij@mailinator.net', '', '', 0, 0, 0, 0, 0, '', '', 2, 0),
(19, 'qokalamo', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 0, '', '', '', '', '', '', 'lojyqy@mailinator.net', '', '', 0, 0, 0, 0, 0, '', '', 2, 0),
(20, 'krlosexeasdasd', '4396c2d023b9d985eed0ba30fe1c672637c01718', 0, '', '', '', '', '', '', 'cardenascarlos18@gmail.comasdasd', '', '', 0, 0, 0, 0, 0, '', '', 2, 0),
(21, 'carlo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', '', 'lypynoh@mailinator.com', '', '', 0, 0, 0, 0, 0, '', '', 2, 0),
(22, 'javier', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '', '', '', '', '', '', 'cardenascarlossss18@gmail.com', '', '', 0, 0, 0, 0, 0, '', '', 3, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_regiones` (`id_regiones`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes_fletes`
--
ALTER TABLE `solicitudes_fletes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_lugares` (`id_tipo_lugar`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_capacidad_carga` (`id_capacidad_carga`),
  ADD KEY `id_tipo_pago` (`id_tipo_pago`),
  ADD KEY `id_capacidad_carga_2` (`id_capacidad_carga`);

--
-- Indices de la tabla `tipos_capacidad_cargas`
--
ALTER TABLE `tipos_capacidad_cargas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_lugares`
--
ALTER TABLE `tipos_lugares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_pagos`
--
ALTER TABLE `tipos_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_vehiculos`
--
ALTER TABLE `tipos_vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_tipo_vehiculo` (`id_tipo_vehiculo`),
  ADD KEY `id_tipo_capacidad_carga` (`id_tipo_capacidad_carga`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `solicitudes_fletes`
--
ALTER TABLE `solicitudes_fletes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipos_capacidad_cargas`
--
ALTER TABLE `tipos_capacidad_cargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipos_lugares`
--
ALTER TABLE `tipos_lugares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipos_pagos`
--
ALTER TABLE `tipos_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipos_vehiculos`
--
ALTER TABLE `tipos_vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `transportes`
--
ALTER TABLE `transportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD CONSTRAINT `comunas_ibfk_1` FOREIGN KEY (`id_regiones`) REFERENCES `regiones` (`id`);

--
-- Filtros para la tabla `solicitudes_fletes`
--
ALTER TABLE `solicitudes_fletes`
  ADD CONSTRAINT `solicitudes_fletes_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudes_fletes_ibfk_2` FOREIGN KEY (`id_tipo_lugar`) REFERENCES `tipos_lugares` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudes_fletes_ibfk_3` FOREIGN KEY (`id_capacidad_carga`) REFERENCES `tipos_capacidad_cargas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudes_fletes_ibfk_4` FOREIGN KEY (`id_tipo_pago`) REFERENCES `tipos_pagos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD CONSTRAINT `transportes_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transportes_ibfk_2` FOREIGN KEY (`id_tipo_capacidad_carga`) REFERENCES `tipos_capacidad_cargas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transportes_ibfk_3` FOREIGN KEY (`id_tipo_vehiculo`) REFERENCES `tipos_vehiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
