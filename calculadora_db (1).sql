-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2025 a las 05:22:56
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
-- Base de datos: `calculadora_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `numero1` decimal(10,2) DEFAULT NULL,
  `numero2` decimal(10,2) DEFAULT NULL,
  `operacion` enum('suma','resta','multiplicacion','division') DEFAULT NULL,
  `resultado` decimal(20,10) DEFAULT NULL,
  `es_error` tinyint(1) DEFAULT 0,
  `mensaje_error` varchar(255) DEFAULT NULL,
  `fecha_operacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`id`, `id_usuario`, `numero1`, `numero2`, `operacion`, `resultado`, `es_error`, `mensaje_error`, `fecha_operacion`) VALUES
(1, NULL, 10.00, 5.00, 'suma', 15.0000000000, 0, NULL, '2025-03-23 12:00:00'),
(2, NULL, 10.00, 0.00, 'division', NULL, 1, 'No se puede dividir entre 0', '2025-03-23 12:01:00'),
(3, NULL, 7.00, 2.00, 'multiplicacion', 14.0000000000, 0, NULL, '2025-03-23 12:02:00'),
(4, NULL, 1.00, 2.00, 'suma', 3.0000000000, 0, NULL, '2025-03-24 00:39:29'),
(5, NULL, 7.00, 8.00, 'suma', 15.0000000000, 0, NULL, '2025-03-24 00:40:18'),
(6, NULL, 2.00, 8.00, 'multiplicacion', 16.0000000000, 0, NULL, '2025-03-24 00:40:28'),
(7, NULL, 8.00, 0.00, 'division', NULL, 1, 'No se puede dividir entre 0', '2025-03-24 00:40:40'),
(8, 1, 1.00, 2.00, 'suma', 3.0000000000, 0, NULL, '2025-03-24 01:05:35'),
(9, 1, 8.00, 7.00, 'suma', 15.0000000000, 0, NULL, '2025-03-24 01:06:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasenia`, `created`) VALUES
(1, 'brayner', 'braynermc@gmail.com', '$2y$10$DvZdBOmuXHodF5tp4BhL/uZe7Dlpd5bQMAv9mWyRRWv1ZNGWPtc.m', '2025-03-24 01:02:38'),
(2, 'lenin', 'leninbk17@gmail.com', '$2y$10$eGiMkWu08TI1R3MCkGyCiOvHPP8fBusXxRMrEwlDY5SbQCq4tMAeC', '2025-03-24 02:11:15'),
(3, 'toreto', 'toretooconner23@gmail.com', '$2y$10$QoaJf01BKvvjfG3l8VlMcOmnHNDg84Iur.LUGq7TRIqE/WJT4WSZi', '2025-03-24 02:40:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_operaciones` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD CONSTRAINT `fk_usuario_operaciones` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
