-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2017 a las 08:48:48
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendabd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Categoria_id` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cliente_id` int(11) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `Direccion` varchar(80) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Pais` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `Id` int(11) NOT NULL,
  `numeroventa` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `imagen` text NOT NULL,
  `precio` text NOT NULL,
  `cantidad` text NOT NULL,
  `subtotal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripción` text NOT NULL,
  `imagen` text NOT NULL,
  `precio` double NOT NULL,
  `categoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripción`, `imagen`, `precio`, `categoria`, `stock`) VALUES
(1, 'camara', 'Marca: Canon   Modelo: MX380     Detalles: 25Mpx Autofoco-Vision Nocturna-Zoom 13 capas', 'camara.jpg', 1400, 1, 50),
(2, 'celular', 'Marca: Samsung   Modelo: Galaxy S4   Detalles:  Blanco 2GB RAM 64GB Memoria 20Mpx', 'celular.jpg', 2300, 2, 350),
(3, 'laptop', 'Marca: HP   Modelo: Pavillion-g4    Detalles: Negro 320GB DDR3 8GB RAM Quad-core', 'laptop.jpg', 2500, 3, 80),
(4, 'playstation3', 'Marca: SONY   Modelo: CTT27  Detalles:  500GB Conectividad Wifi', 'playstation3.jpg', 2000, 4, 80),
(5, 'reloj', 'Marca: CITYZEN   Modelo: 270-XZ   Detalles: Cuerina Sintetica Crema', 'reloj.jpg', 150, 5, 400),
(6, 'tablet', 'Marca: LENOVO   Modelo: Lexus  Detalles: Blanco 32GB 13px', 'tablet.png', 400, 2, 300),
(7, 'usb', 'Marca: DATATRAVELER   Modelo: 34gtx  Detalles: Negro 64GB', 'usb.jpg', 60, 6, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `Sucursal_id` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Direccion` varchar(120) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Id_encargado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `Trabajador_id` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL,
  `Direccion` int(11) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Correo` int(11) NOT NULL,
  `Fecha_Ingreso` int(11) NOT NULL,
  `Salario` int(11) NOT NULL,
  `Sucursal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `Usuario` text NOT NULL,
  `Password` text NOT NULL,
  `Imagen` text NOT NULL,
  `Correo` text NOT NULL,
  `Telefono` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
