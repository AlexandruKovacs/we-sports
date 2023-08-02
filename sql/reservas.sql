-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 08-06-2023 a las 20:05:00
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `we_sports`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_pista` int(11) NOT NULL,
  `inicio_reserva` datetime NOT NULL,
  `fin_reserva` datetime NOT NULL,
  `estado_reserva` enum('Activa','Cancelada','Completada','Archivada') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `id_cliente`, `id_pista`, `inicio_reserva`, `fin_reserva`, `estado_reserva`, `fecha_creacion`) VALUES
(1, 3, 1, '2023-06-10 09:00:00', '2023-06-10 11:00:00', 'Activa', '2023-06-08 13:05:42'),
(2, 3, 1, '2023-06-10 11:00:00', '2023-06-10 13:00:00', 'Activa', '2023-06-08 17:42:18'),
(3, 3, 1, '2023-06-15 10:00:00', '2023-06-15 13:00:00', 'Activa', '2023-06-08 17:45:07'),
(4, 3, 1, '2023-06-23 10:00:00', '2023-06-23 11:00:00', 'Activa', '2023-06-08 17:46:04'),
(5, 3, 1, '2023-06-29 12:00:00', '2023-06-29 16:00:00', 'Activa', '2023-06-08 17:48:18'),
(6, 3, 1, '2023-06-14 11:00:00', '2023-06-14 13:00:00', 'Activa', '2023-06-08 17:50:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_cliente`),
  ADD KEY `id_pista` (`id_pista`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_pista`) REFERENCES `pistas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
