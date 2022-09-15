-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-11-2021 a las 14:44:16
-- Versión del servidor: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_covid`
--
CREATE DATABASE IF NOT EXISTS `proyecto_covid` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto_covid`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `id` int(11) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `edad` int(11) NOT NULL,
  `rh` varchar(5) NOT NULL,
  `contactos` varchar(5) NOT NULL,
  `profesion` varchar(30) NOT NULL,
  `id_estado_caso` int(11) NOT NULL,
  `id_tipo_prueba` int(11) NOT NULL,
  `id_comunas` int(11) NOT NULL,
  `id_conglomerado` int(11) NOT NULL,
  `eps` varchar(10) NOT NULL,
  `fecha_inicio_aislamiento` date NOT NULL,
  `fecha_fin_aislamiento` date NOT NULL,
  `coomorbilidad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id`, `sexo`, `edad`, `rh`, `contactos`, `profesion`, `id_estado_caso`, `id_tipo_prueba`, `id_comunas`, `id_conglomerado`, `eps`, `fecha_inicio_aislamiento`, `fecha_fin_aislamiento`, `coomorbilidad`) VALUES
(1, 'M', 22, 'O+', '2', 'asd', 3, 1, 1, 1, 'EPS025', '2021-11-07', '2021-12-01', 'Hipertension'),
(5, 'M', 18, 'O+', '3', 'Mesero', 2, 1, 1, 1, 'EPS025', '2020-01-15', '2020-01-31', ''),
(6, 'M', 22, 'O+', '2', 'Mesero', 2, 2, 1, 1, 'EPS025', '2021-11-18', '2021-11-18', 'Diabetes'),
(8, 'M', 22, 'O+', '2', 'Mesero', 2, 2, 1, 1, 'EPS025', '2021-11-18', '2021-11-18', 'Diabetes'),
(13, 'M', 24, 'O+', '5', 'Profesor', 1, 2, 1, 1, 'EPS025', '2021-11-18', '2021-11-18', ''),
(14, 'F', 27, 'A+', '5', 'Ingeniero Sisrtemas', 3, 1, 3, 2, 'EPS025', '2021-11-01', '2021-11-15', ''),
(16, 'F', 45, 'O-', '4', 'Ingeniero Civil', 1, 2, 3, 3, 'EPS025', '2021-11-01', '2021-11-19', 'Diabetes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comorbilidad`
--

CREATE TABLE `comorbilidad` (
  `id` int(11) NOT NULL,
  `fecha_inicio_sintomas` varchar(30) NOT NULL,
  `sintomas` varchar(30) NOT NULL,
  `id_caso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id` int(11) NOT NULL,
  `comuna` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id`, `comuna`) VALUES
(1, 'COMUNA I'),
(2, 'COMUNA II'),
(3, 'COMUNA III'),
(4, 'COMUNA IV'),
(5, 'COMUNA V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conglomerados`
--

CREATE TABLE `conglomerados` (
  `id` int(11) NOT NULL,
  `conglomerado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `conglomerados`
--

INSERT INTO `conglomerados` (`id`, `conglomerado`) VALUES
(1, 'Familiar'),
(2, 'Institucional'),
(3, 'Laboral'),
(4, 'Exterior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_casos`
--

CREATE TABLE `estados_casos` (
  `id` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados_casos`
--

INSERT INTO `estados_casos` (`id`, `estado`) VALUES
(1, 'Activo'),
(2, 'Fallecido'),
(3, 'Recuperado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospitalzados`
--

CREATE TABLE `hospitalzados` (
  `id` int(11) NOT NULL,
  `fecha_inicio_hospitalizacion` date NOT NULL,
  `id_municipios` int(11) NOT NULL,
  `id_caso` int(11) NOT NULL,
  `fecha_fin_hospitalizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `municipio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `municipio`) VALUES
(1, 'AGUAZUL'),
(2, 'CHAMEZA'),
(3, 'AGUAZUL'),
(4, 'CHAMEZA'),
(5, 'HATO COROZAL'),
(6, 'LA SALINA'),
(7, 'MANI'),
(8, 'MONTERREY'),
(9, 'NUNCHIA'),
(10, 'OROCUE'),
(11, 'PAZ DE ARIPORO'),
(12, 'PORE'),
(13, 'RECETOR'),
(14, 'SABANALARGA'),
(15, 'SAN LUIS DE PALENQUE'),
(16, 'TAMARA'),
(17, 'TRINIDAD'),
(18, 'VILLANUEVA'),
(19, 'YOPAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Estandar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE `sintomas` (
  `id` int(11) NOT NULL,
  `sintoma` varchar(45) NOT NULL,
  `id_caso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sintomas`
--

INSERT INTO `sintomas` (`id`, `sintoma`, `id_caso`) VALUES
(1, 'Fiebre', 8),
(2, 'Fiebre', 8),
(3, 'Fiebre', 8),
(4, 'Cansancio', 8),
(5, 'Perdida del gusto', 8),
(6, 'Perdida del gusto', 13),
(7, 'Dolor de garganta', 13),
(8, 'Fiebre', 14),
(9, 'Perdida del gusto', 14),
(10, 'Dolor de garganta', 14),
(11, 'Perdida del gusto', 15),
(12, 'Dolor de garganta', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_pruebas`
--

CREATE TABLE `tipos_pruebas` (
  `id` int(11) NOT NULL,
  `tipo_prueba` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_pruebas`
--

INSERT INTO `tipos_pruebas` (`id`, `tipo_prueba`) VALUES
(1, 'ANT'),
(2, 'PCR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contrasena` text NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `img` varchar(80) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `id_rol`, `nombres`, `apellidos`, `img`, `estado`, `create_at`, `update_at`) VALUES
(1, 'usuario1', '123', 1, 'Julio', 'Quintero', '../Imgs/JulioQuintero.jpg', 'Activo', '2021-11-06 19:58:09', '2021-11-06 21:34:10'),
(2, 'usuario2', 'contraseña', 2, 'Laura  Sofia', 'Perez Castro', '', 'Inactivo', '2021-11-06 19:58:09', '2021-11-19 15:22:58'),
(3, 'andreyt', '123', 2, 'Andrey Samir', 'Tirado Torres', '', 'Activo', '2021-11-06 19:58:09', '2021-11-19 15:22:32'),
(4, 'usuario4', '123', 2, 'Sandra Milina', 'Goyeneche', '', 'Inactivo', '2021-11-06 19:58:09', '2021-11-09 06:20:39'),
(5, 'edin10', '123', 2, 'Edin', 'Mendivelso', '', 'Inactivo', '2021-11-06 19:58:09', '2021-11-09 06:20:44'),
(6, 'karol47', '123', 2, 'Karol', 'Ardila', '', 'Activo', '2021-11-06 19:58:09', '2021-11-09 06:20:48'),
(7, 'jmills', '123', 2, 'Jessica ', 'Mills', '../Imgs/Jessica Mills.jpg', 'Activo', '2021-11-06 19:58:09', '2021-11-06 20:00:23'),
(15, 'prueba123', '123', 2, 'nombre prueba', 'apellido prueba', '../Imgs/nombre pruebaapellido prueba.png', 'Activo', '2021-11-25 13:49:43', '2021-11-25 13:49:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado_casos` (`id_estado_caso`),
  ADD KEY `fk_tipoprueba` (`id_tipo_prueba`),
  ADD KEY `fk_conglomerado` (`id_conglomerado`),
  ADD KEY `fk_comunas` (`id_comunas`),
  ADD KEY `fk_eps` (`eps`);

--
-- Indices de la tabla `comorbilidad`
--
ALTER TABLE `comorbilidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conglomerados`
--
ALTER TABLE `conglomerados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_casos`
--
ALTER TABLE `estados_casos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hospitalzados`
--
ALTER TABLE `hospitalzados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_casos` (`id_caso`),
  ADD KEY `fk_municipios` (`id_municipios`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sintomas_casos` (`id_caso`);

--
-- Indices de la tabla `tipos_pruebas`
--
ALTER TABLE `tipos_pruebas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_roles` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `comorbilidad`
--
ALTER TABLE `comorbilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `conglomerados`
--
ALTER TABLE `conglomerados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estados_casos`
--
ALTER TABLE `estados_casos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipos_pruebas`
--
ALTER TABLE `tipos_pruebas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casos`
--
ALTER TABLE `casos`
  ADD CONSTRAINT `fk_comunas` FOREIGN KEY (`id_comunas`) REFERENCES `comunas` (`id`),
  ADD CONSTRAINT `fk_conglomerado` FOREIGN KEY (`id_conglomerado`) REFERENCES `conglomerados` (`id`),
  ADD CONSTRAINT `fk_estado_casos` FOREIGN KEY (`id_estado_caso`) REFERENCES `estados_casos` (`id`),
  ADD CONSTRAINT `fk_tipoprueba` FOREIGN KEY (`id_tipo_prueba`) REFERENCES `tipos_pruebas` (`id`);

--
-- Filtros para la tabla `hospitalzados`
--
ALTER TABLE `hospitalzados`
  ADD CONSTRAINT `fk_casos` FOREIGN KEY (`id_caso`) REFERENCES `casos` (`id`),
  ADD CONSTRAINT `fk_municipios` FOREIGN KEY (`id_municipios`) REFERENCES `municipios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
