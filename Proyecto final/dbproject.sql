-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-12-2019 a las 06:56:24
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbproject`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balances`
--

DROP TABLE IF EXISTS `balances`;
CREATE TABLE IF NOT EXISTS `balances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` float DEFAULT NULL,
  `mensaje` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_balance_users1_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `balances`
--

INSERT INTO `balances` (`id`, `cantidad`, `mensaje`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 20, 'hola', 1, '2019-11-22 00:18:10', '2019-11-22 00:25:59', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudretiros`
--

DROP TABLE IF EXISTS `solicitudretiros`;
CREATE TABLE IF NOT EXISTS `solicitudretiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(11) DEFAULT NULL,
  `cantidadretiro` float DEFAULT NULL,
  `tiporetiro_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_solicitudretiros_tiporetiros_idx` (`tiporetiro_id`),
  KEY `fk_solicitudretiros_users1_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitudretiros`
--

INSERT INTO `solicitudretiros` (`id`, `codigo`, `cantidadretiro`, `tiporetiro_id`, `user_id`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, '00001', 50.5, 6, 1, 'ESPERANDO', '2019-11-22 01:03:08', '2019-12-02 03:38:22', '2019-12-02 03:38:22'),
(10, '00001', 12, 6, 1, 'ESPERANDO', '2019-12-02 03:39:05', '2019-12-02 03:39:05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporetiros`
--

DROP TABLE IF EXISTS `tiporetiros`;
CREATE TABLE IF NOT EXISTS `tiporetiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `logo` blob,
  `cantidadminima` float DEFAULT NULL,
  `cantidadmaxima` float DEFAULT NULL,
  `cargofijo` float DEFAULT NULL,
  `porcentajecargo` double DEFAULT NULL,
  `tarifa` float DEFAULT NULL,
  `diaproceso` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiporetiros`
--

INSERT INTO `tiporetiros` (`id`, `nombre`, `logo`, `cantidadminima`, `cantidadmaxima`, `cargofijo`, `porcentajecargo`, `tarifa`, `diaproceso`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Paypal', NULL, 5, 1000, 2, 1, NULL, '5', 'DISPONIBLE', '2019-11-21 19:34:17', '2019-11-21 19:34:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellidos`, `celular`, `fechanacimiento`, `ciudad`, `pais`, `estado`, `email`, `password`, `remember_token`, `saldo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anna', 'Carrión', '987654322', NULL, 'Cd. Victoria', 'México', 'ACTIVO', 'elden.gm@gmail.com', '12345', '12345', 5150, '2019-11-21 18:01:21', '2019-11-22 01:15:33', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `balances`
--
ALTER TABLE `balances`
  ADD CONSTRAINT `fk_balance_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudretiros`
--
ALTER TABLE `solicitudretiros`
  ADD CONSTRAINT `fk_solicitudretiros_tiporetiros` FOREIGN KEY (`tiporetiro_id`) REFERENCES `tiporetiros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitudretiros_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
