-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2023 a las 21:16:52
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendavirtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `nombre` varchar(100) NOT NULL,
  `nseguimiento` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`nombre`, `nseguimiento`, `email`, `descripcion`) VALUES
('Manuel', '123456789', 'manu@gmail.com', 'No cargan las imagenes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidadDisponible` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `cantidadDisponible`, `imagen`) VALUES
(1, 'melón', 'fruta', 8.5, 100, 'imagesProducto\\producto1.jpg'),
(2, 'fresa', 'fruta', 5.37, 100, 'imagesProducto\\producto2.jpg'),
(3, 'manzana', 'fruta', 2.19, 100, 'imagesProducto\\producto3.jpg'),
(4, 'pera', 'fruta', 2.5, 100, 'imagesProducto\\producto4.jpg'),
(5, 'sandia', 'fruta', 7.25, 100, 'imagesProducto\\producto5.jpg'),
(6, 'plátano', 'fruta', 3.15, 100, 'imagesProducto\\producto6.jpg'),
(7, 'pimiento', 'verdura', 8.5, 100, 'imagesProducto\\producto7.jpg'),
(8, 'cebolla', 'verdura', 5.37, 100, 'imagesProducto\\producto8.jpg'),
(9, 'judias', 'verdura', 2.19, 100, 'imagesProducto\\producto9.jpg'),
(10, 'espinacas', 'verdura', 2.5, 100, 'imagesProducto\\producto10.jpg'),
(11, 'calabacin', 'verdura', 7.25, 100, 'imagesProducto\\producto11.jpg'),
(12, 'calabaza', 'verdura', 3.15, 100, 'imagesProducto\\producto12.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`nombre`, `apellido`, `email`, `contraseña`) VALUES
('Manuel', 'Perez ', 'manu@gmail.com', '12345'),
('Ester', 'Benavent', 'ester@gmail.com', '12345'),
('Fulanito', 'Lopez', 'fulanito@gmail.com', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
