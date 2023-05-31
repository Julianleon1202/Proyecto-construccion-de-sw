-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2023 a las 07:07:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `drogueria_abc1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `codigo_factura` bigint(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cedula_cliente` int(11) NOT NULL,
  `codigo_producto` int(20) NOT NULL,
  `ivaventa` double NOT NULL,
  `total_venta` double NOT NULL,
  `valor_venta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`codigo_factura`, `id_usuario`, `cedula_cliente`, `codigo_producto`, `ivaventa`, `total_venta`, `valor_venta`) VALUES
(1, 1, 123456, 1, 19, 1000, 1200);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`codigo_factura`),
  ADD KEY `fk_cedula_cliente` (`cedula_cliente`),
  ADD KEY `fk_codigo_producto` (`codigo_producto`),
  ADD KEY `fk_id_ususrios` (`id_usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_cedula_cliente` FOREIGN KEY (`cedula_cliente`) REFERENCES `clientes` (`cedula_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codigo_producto` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_ususrios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
