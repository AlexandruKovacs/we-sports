-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 08-06-2023 a las 20:07:23
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
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE `deportes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `icono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`id`, `nombre`, `icono`) VALUES
(1, 'Fútbol', 'fa-futbol'),
(2, 'Baloncesto', 'fa-basketball-ball'),
(3, 'Pádel', 'fa-table-tennis-paddle-ball');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `numero_factura` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_reserva`, `fecha_pago`, `monto`, `numero_factura`) VALUES
(1, 1, '2023-06-08', '5.00', '20230608-70'),
(2, 2, '2023-06-08', '7.50', '20230608-71'),
(3, 3, '2023-06-08', '2.50', '20230608-72'),
(4, 4, '2023-06-08', '10.00', '20230608-73'),
(5, 5, '2023-06-08', '5.00', '20230608-74'),
(6, 6, '2023-06-08', '7.50', '20230608-75');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE `pistas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_deporte` int(11) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_polideportivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`id`, `nombre`, `id_deporte`, `descripcion`, `id_polideportivo`) VALUES
(1, 'Pista de pádel 1', 3, 'Pista muy bien equipada.', 1),
(2, 'Pista de pádel 2', 3, 'Pista de pádel con iluminación artificial.', 2),
(3, 'Pista de pádel 3', 3, 'Pista de pádel cubierta.', 2),
(4, 'Pista de fútbol 2', 1, 'Campo de fútbol con césped artificial.', 2),
(5, 'Pista de fútbol 3', 1, 'Campo de fútbol de dimensiones reducidas.', 2),
(6, 'Pista de baloncesto 2', 2, 'Pista de baloncesto al aire libre.', 2),
(7, 'Pista de baloncesto 3', 2, 'Pista de baloncesto cubierta.', 2),
(8, 'Pista de pádel 4', 3, 'Pista de pádel con iluminación artificial.', 3),
(9, 'Pista de pádel 5', 3, 'Pista de pádel cubierta.', 3),
(10, 'Pista de fútbol 4', 1, 'Campo de fútbol con césped artificial.', 3),
(11, 'Pista de fútbol 5', 1, 'Campo de fútbol de dimensiones reducidas.', 3),
(12, 'Pista de baloncesto 4', 2, 'Pista de baloncesto al aire libre.', 3),
(13, 'Pista de baloncesto 5', 2, 'Pista de baloncesto cubierta.', 3),
(14, 'Pista de pádel 6', 3, 'Pista de pádel con iluminación artificial.', 4),
(15, 'Pista de pádel 7', 3, 'Pista de pádel cubierta.', 4),
(16, 'Pista de fútbol 6', 1, 'Campo de fútbol con césped artificial.', 4),
(17, 'Pista de fútbol 7', 1, 'Campo de fútbol de dimensiones reducidas.', 4),
(18, 'Pista de baloncesto 6', 2, 'Pista de baloncesto al aire libre.', 4),
(19, 'Pista de baloncesto 7', 2, 'Pista de baloncesto cubierta.', 4),
(20, 'Pista de pádel 8', 3, 'Pista de pádel con iluminación artificial.', 5),
(21, 'Pista de pádel 9', 3, 'Pista de pádel cubierta.', 5),
(22, 'Pista de fútbol 8', 1, 'Campo de fútbol con césped artificial.', 5),
(23, 'Pista de fútbol 9', 1, 'Campo de fútbol de dimensiones reducidas.', 5),
(24, 'Pista de baloncesto 8', 2, 'Pista de baloncesto al aire libre.', 5),
(25, 'Pista de baloncesto 9', 2, 'Pista de baloncesto cubierta.', 5),
(26, 'Pista de pádel 10', 3, 'Pista de pádel con iluminación artificial.', 6),
(27, 'Pista de pádel 11', 3, 'Pista de pádel cubierta.', 6),
(28, 'Pista de fútbol 10', 1, 'Campo de fútbol con césped artificial.', 6),
(29, 'Pista de fútbol 11', 1, 'Campo de fútbol de dimensiones reducidas.', 6),
(30, 'Pista de baloncesto 10', 2, 'Pista de baloncesto al aire libre.', 6),
(31, 'Pista de baloncesto 11', 2, 'Pista de baloncesto cubierta.', 6),
(32, 'Pista de pádel 12', 3, 'Pista de pádel con iluminación artificial.', 7),
(33, 'Pista de pádel 13', 3, 'Pista de pádel cubierta.', 7),
(34, 'Pista de fútbol 12', 1, 'Campo de fútbol con césped artificial.', 7),
(35, 'Pista de fútbol 13', 1, 'Campo de fútbol de dimensiones reducidas.', 7),
(36, 'Pista de baloncesto 12', 2, 'Pista de baloncesto al aire libre.', 7),
(37, 'Pista de baloncesto 13', 2, 'Pista de baloncesto cubierta.', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polideportivos`
--

CREATE TABLE `polideportivos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `horario_apertura` time NOT NULL,
  `horario_cierre` time NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `polideportivos`
--

INSERT INTO `polideportivos` (`id`, `nombre`, `direccion`, `horario_apertura`, `horario_cierre`, `ciudad`, `provincia`, `pais`, `telefono`, `email`, `id_usuario`) VALUES
(1, 'Centro Deportivo Municipal', 'Calle Gerona,  6', '09:00:00', '16:30:00', 'Madrid', 'Madrid', 'España', '654047518', 'municipalmadrid@info.com', 2),
(2, 'Polideportivo Ciudad Deportiva', 'Avenida del Deporte, 123', '09:00:00', '20:00:00', 'Madrid', 'Madrid', 'España', '654123456', 'ciudaddeportiva@info.com', 2),
(3, 'Polideportivo Las Palmas', 'Calle Gran Canaria, 456', '10:00:00', '22:00:00', 'Las Palmas', 'Las Palmas', 'España', '654789123', 'polideportivolaspalmas@info.com', 2),
(4, 'Polideportivo La Playa', 'Calle Arena, 789', '08:00:00', '18:00:00', 'Valencia', 'Valencia', 'España', '654456789', 'polideportivoplaya@info.com', 2),
(5, 'Polideportivo La Montaña', 'Calle Monte, 1011', '07:00:00', '21:00:00', 'Barcelona', 'Barcelona', 'España', '654987654', 'polideportivomontana@info.com', 2),
(6, 'Polideportivo Los Pinos', 'Avenida Pino, 1213', '09:00:00', '19:00:00', 'Sevilla', 'Sevilla', 'España', '654321987', 'polideportivolospinos@info.com', 2),
(7, 'Polideportivo Los Alamos', 'Calle Alamo, 1415', '08:30:00', '20:30:00', 'Madrid', 'Madrid', 'España', '654123789', 'polideportivolosalamos@info.com', 2);


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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `tipo` enum('cliente','admin_polideportivo','admin') NOT NULL,
  `confirmado` int(11) NOT NULL,
  `token` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `username`, `password`, `telefono`, `tipo`, `confirmado`, `token`) VALUES
(1, 'Admin', 'WeSports', 'admin@wesports.com', 'admin', '804f50ddbaab7f28c933a95c162d019acbf96afde56dba10e4c7dfcfe453dec4bacf5e78b1ddbdc1695a793bcb5d7d409425db4cc3370e71c4965e4ef992e8c4', '', 'admin', 1, ''),
(2, 'Alexandru', 'Kovacs', 'alexkovacs0045@gmail.com', 'alexandru.kovacs', '804f50ddbaab7f28c933a95c162d019acbf96afde56dba10e4c7dfcfe453dec4bacf5e78b1ddbdc1695a793bcb5d7d409425db4cc3370e71c4965e4ef992e8c4', '654047518', 'admin_polideportivo', 1, ''),
(3, 'Alexandru', 'Kovacs', 'alexkovacs27.06@gmail.com', 'alexandru.kovacs', '804f50ddbaab7f28c933a95c162d019acbf96afde56dba10e4c7dfcfe453dec4bacf5e78b1ddbdc1695a793bcb5d7d409425db4cc3370e71c4965e4ef992e8c4', '654047518', 'cliente', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `pistas`
--
ALTER TABLE `pistas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_polideportivo` (`id_polideportivo`),
  ADD KEY `pistas_ibfk_2` (`id_deporte`);

--
-- Indices de la tabla `polideportivos`
--
ALTER TABLE `polideportivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_cliente`),
  ADD KEY `id_pista` (`id_pista`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pistas`
--
ALTER TABLE `pistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `polideportivos`
--
ALTER TABLE `polideportivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pistas`
--
ALTER TABLE `pistas`
  ADD CONSTRAINT `pistas_ibfk_1` FOREIGN KEY (`id_polideportivo`) REFERENCES `polideportivos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pistas_ibfk_2` FOREIGN KEY (`id_deporte`) REFERENCES `deportes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `polideportivos`
--
ALTER TABLE `polideportivos`
  ADD CONSTRAINT `polideportivos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
