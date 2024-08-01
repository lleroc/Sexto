-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-08-2024 a las 23:52:44
-- Versión del servidor: 5.7.24
-- Versión de PHP: 8.2.14
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

--
-- Base de datos: `sexto`
--
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `alumnos`
--
CREATE TABLE
    `alumnos` (
        `IdAlumno` int (11) NOT NULL,
        `Nombre` text NOT NULL,
        `Apellido` text NOT NULL,
        `Edad` int (11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos` ADD PRIMARY KEY (`IdAlumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos` MODIFY `IdAlumno` int (11) NOT NULL AUTO_INCREMENT;

COMMIT;