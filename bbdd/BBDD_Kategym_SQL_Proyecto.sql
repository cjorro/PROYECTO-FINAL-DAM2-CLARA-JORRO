-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2022 a las 22:10:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kategym_proyecto03`
--
CREATE DATABASE IF NOT EXISTS `kategym_proyecto03` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kategym_proyecto03`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblactividades`
--

DROP TABLE IF EXISTS `tblactividades`;
CREATE TABLE `tblactividades` (
  `IdActividad` int(11) NOT NULL,
  `NombreActividad` varchar(45) DEFAULT NULL,
  `IdTipoActividad` int(11) NOT NULL,
  `Sala` int(11) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tblactividades`
--

TRUNCATE TABLE `tblactividades`;
--
-- Volcado de datos para la tabla `tblactividades`
--

INSERT INTO `tblactividades` (`IdActividad`, `NombreActividad`, `IdTipoActividad`, `Sala`, `Foto`, `Descripcion`) VALUES
(1, 'Pilates-stretch', 1, 12, './Imagenes/ImagenesActividades/Pilates.jpg', 'Clase de ejercicios de control muscular, flexibilidad y aumento de la conciencia corporal, con trabajo especial de la cintura abdominal.'),
(2, 'Tai Chi', 1, 13, './Imagenes/ImagenesActividades/taichi.jpg', 'Arte marcial de origen Chino. Entrenamiento psicof&iacute;sico que consiste en la realizaci&oacute;n de movimientos que favorecen el equilibrio psico-f&iacute;sico.'),
(3, 'Yoga', 1, 8, './Imagenes/ImagenesActividades/yoga.jpg', 'Sesi&oacute;n de introducci&oacute;n al Yoga, que incluye ejercicios b&aacute;sicos (asanas), de relajaci&oacute;n, respiratorios, etc.'),
(4, 'Aero Latino', 2, 3, './Imagenes/ImagenesActividades/Aero_latino.jpg', 'Un trabajo cardiovascular basado en una clase de aer&oacute;bic, pero con m&uacute;sica y movimientos de estilo latino,para que te dejes llevar por el ritmo, al tiempo que quemas calor&iacute;as.'),
(5, 'Cardio-Combat', 2, 2, './Imagenes/ImagenesActividades/Cardio_Combat.jpg', 'Combinaci&oacute;n de Aerobic y t&eacute;cnica de boxeo sin contacto f&iacute;sico. Ideal para quemar calor&iacute;as y tonificar la musculatura.'),
(6, 'Danza', 2, 6, './Imagenes/ImagenesActividades/Danza.jpg', 'Actividad que ofrece, a trav&eacute;s de la danza, una importante ayuda en el desarrollo personal y al estado psicol&oacute;gico.'),
(7, 'Fitness Condition', 2, 1, './Imagenes/ImagenesActividades/Fitness_condition.jpg', 'Sesi&oacute;n de entrenamiento de intensidad media, que combina trabajo cardiovascular, tonificaci&oacute;n y movilidad articular, favoreciendo una mejor condici&oacute;n f&iacute;sica general.'),
(8, 'Cycling', 3, 9, './Imagenes/ImagenesActividades/Cycling.jpg', 'Actividad cardiovascular de intensidad variable, que utiliza bicicletas espec&iacute;ficas donde se pueden adecuar la resistencia y la cadencia del pedaleo a tus necesidades.'),
(9, 'Runnig Club', 3, 0, './Imagenes/ImagenesActividades/runnigClub.jpg', 'Entrenamiento de carrera en grupo al aire libre, por las proximidades del gimnasio.'),
(10, 'Gap', 4, 5, './Imagenes/ImagenesActividades/Gap.jpg', 'Programa de ejercicios orientado al trabajo de gl&uacute;teos, abdominales y piernas.'),
(11, 'Tonificación', 4, 7, './Imagenes/ImagenesActividades/tonificacion.jpg', 'Sesi&oacute;n orientada al trabajo intenso de toda la musculatura, utilizando distintos materiales: mancuernas, bandas el&aacute;sticas, tensores..., y finalizando con estiramientos.'),
(12, 'Abd. Stretch', 5, 4, './Imagenes/ImagenesActividades/Abd_strech.jpg', 'Ejercicios espec&iacute;ficos para la musculatura del abdomen y para mejorar la movilidad articular general, orientado a un control postural m&aacute;s eficaz.'),
(13, 'SpeedBak', 5, 10, './Imagenes/ImagenesActividades/speedback.jpg', 'Programa de 20\' de trabajo cardiovascular orientado a consumir el mayor numero de calor&iacute;as. Ideal para completar tu trabajo muscular en la sala.'),
(16, 'Haterofilia', 5, 10, './Imagenes/ImagenesActividades/Hater9.jpg', 'Actividad que a través del levantamiento del mayor peso posible, se gestiona el alto gasto calórico y el rendimiento de uno mismo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblactividadesmonitor`
--

DROP TABLE IF EXISTS `tblactividadesmonitor`;
CREATE TABLE `tblactividadesmonitor` (
  `ID` int(11) NOT NULL,
  `IdMonitor` int(11) NOT NULL,
  `IdActividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tblactividadesmonitor`
--

TRUNCATE TABLE `tblactividadesmonitor`;
--
-- Volcado de datos para la tabla `tblactividadesmonitor`
--

INSERT INTO `tblactividadesmonitor` (`ID`, `IdMonitor`, `IdActividad`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 1, 8),
(9, 2, 9),
(10, 1, 10),
(11, 2, 11),
(12, 1, 12),
(13, 2, 13),
(16, 1, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblactividadesusuario`
--

DROP TABLE IF EXISTS `tblactividadesusuario`;
CREATE TABLE `tblactividadesusuario` (
  `ID` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdActividad` int(11) NOT NULL,
  `IdMonitor` int(11) DEFAULT NULL,
  `FechaInicio` datetime DEFAULT NULL,
  `FechaFinal` datetime DEFAULT NULL,
  `Borrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tblactividadesusuario`
--

TRUNCATE TABLE `tblactividadesusuario`;
--
-- Volcado de datos para la tabla `tblactividadesusuario`
--

INSERT INTO `tblactividadesusuario` (`ID`, `IdUsuario`, `IdActividad`, `IdMonitor`, `FechaInicio`, `FechaFinal`, `Borrado`) VALUES
(1, 7, 1, 1, '2022-01-15 15:01:04', NULL, 0),
(2, 7, 2, 1, '2022-01-15 15:01:21', NULL, 0),
(3, 7, 5, 2, '2022-01-15 15:04:43', NULL, 0),
(4, 7, 8, 1, '2022-01-15 15:04:45', NULL, 0),
(5, 8, 5, 2, '2022-01-15 19:59:12', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontrol`
--

DROP TABLE IF EXISTS `tblcontrol`;
CREATE TABLE `tblcontrol` (
  `ID` int(11) NOT NULL,
  `Nick` varchar(45) DEFAULT NULL,
  `Contrasenia` varchar(45) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `IP` varchar(45) DEFAULT NULL,
  `Valido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tblcontrol`
--

TRUNCATE TABLE `tblcontrol`;
--
-- Volcado de datos para la tabla `tblcontrol`
--

INSERT INTO `tblcontrol` (`ID`, `Nick`, `Contrasenia`, `Fecha`, `IP`, `Valido`) VALUES
(1, 'Admin', '123456', '2022-01-15 14:36:08', '127.0.0.1', 1),
(2, 'dos', 'dos', '2022-01-15 15:00:45', '127.0.0.1', 1),
(3, 'Admin', '123456', '2022-01-15 16:50:27', '127.0.0.1', 1),
(4, 'Admin', '123456', '2022-01-15 19:53:10', '127.0.0.1', 1),
(5, 'Admin', '123456', '2022-01-15 19:57:56', '127.0.0.1', 1),
(6, 'Isa', 'isa', '2022-01-15 19:58:59', '127.0.0.1', 1),
(7, 'Jessica_monitor', 'monitor', '2022-01-15 19:59:50', '127.0.0.1', 1),
(8, 'Isa', 'isa', '2022-01-15 20:01:06', '127.0.0.1', 1),
(9, 'Pelayo_monitor', 'monitor', '2022-01-15 20:01:58', '127.0.0.1', 1),
(10, 'Admin', '123456', '2022-01-15 20:03:40', '127.0.0.1', 1),
(11, 'Pelayo_monitor', 'monitor', '2022-01-15 21:16:22', '127.0.0.1', 1),
(12, 'Isa', 'isa', '2022-01-15 21:28:47', '127.0.0.1', 1),
(13, 'Admin', '123456', '2022-01-15 21:35:26', '127.0.0.1', 1),
(14, 'isabel', 'isabel', '2022-01-15 21:35:55', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblexcomentariorealizado`
--

DROP TABLE IF EXISTS `tblexcomentariorealizado`;
CREATE TABLE `tblexcomentariorealizado` (
  `Id` int(11) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `IdComentario` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Voto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tblexcomentariorealizado`
--

TRUNCATE TABLE `tblexcomentariorealizado`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblexcomentarios`
--

DROP TABLE IF EXISTS `tblexcomentarios`;
CREATE TABLE `tblexcomentarios` (
  `Id` int(11) NOT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Comentario` varchar(2000) DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `VotPositivos` int(11) DEFAULT NULL,
  `VotNegativos` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tblexcomentarios`
--

TRUNCATE TABLE `tblexcomentarios`;
--
-- Volcado de datos para la tabla `tblexcomentarios`
--

INSERT INTO `tblexcomentarios` (`Id`, `Titulo`, `Comentario`, `IdUsuario`, `VotPositivos`, `VotNegativos`, `Fecha`) VALUES
(13, 'Cambio de horario', 'Queria saber cuando se va a realizar el cambio de horario de las nuevas clases.\r\nun saludo', 8, 0, 0, '2022-01-15 21:33:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmonitor`
--

DROP TABLE IF EXISTS `tblmonitor`;
CREATE TABLE `tblmonitor` (
  `IdMonitor` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `NumCuenta` varchar(45) DEFAULT NULL,
  `DiasVacaciones` int(11) DEFAULT NULL,
  `Sueldo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tblmonitor`
--

TRUNCATE TABLE `tblmonitor`;
--
-- Volcado de datos para la tabla `tblmonitor`
--

INSERT INTO `tblmonitor` (`IdMonitor`, `IdUsuario`, `NumCuenta`, `DiasVacaciones`, `Sueldo`) VALUES
(1, 9, NULL, NULL, NULL),
(2, 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblprogresosfisicos`
--

DROP TABLE IF EXISTS `tblprogresosfisicos`;
CREATE TABLE `tblprogresosfisicos` (
  `ID` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IndiceMasaCorporal` int(11) DEFAULT NULL,
  `Peso` int(11) DEFAULT NULL,
  `Altura` int(11) DEFAULT NULL,
  `IndiceMasaMuscular` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tblprogresosfisicos`
--

TRUNCATE TABLE `tblprogresosfisicos`;
--
-- Volcado de datos para la tabla `tblprogresosfisicos`
--

INSERT INTO `tblprogresosfisicos` (`ID`, `IdUsuario`, `IndiceMasaCorporal`, `Peso`, `Altura`, `IndiceMasaMuscular`, `Fecha`) VALUES
(1, 8, 8, 79, 2, 20, '2022-01-15 20:00:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblprovincias`
--

DROP TABLE IF EXISTS `tblprovincias`;
CREATE TABLE `tblprovincias` (
  `CodProvincia` int(11) NOT NULL,
  `Provincia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tblprovincias`
--

TRUNCATE TABLE `tblprovincias`;
--
-- Volcado de datos para la tabla `tblprovincias`
--

INSERT INTO `tblprovincias` (`CodProvincia`, `Provincia`) VALUES
(1, 'Álava'),
(2, 'Albacete'),
(3, 'Alicante'),
(4, 'Almería'),
(5, 'Ávila'),
(6, 'Badajoz'),
(7, 'Baleares (Illes)'),
(8, 'Barcelona'),
(9, 'Burgos'),
(10, 'Cáceres'),
(11, 'Cádiz'),
(12, 'Castellón'),
(13, 'Ciudad Real'),
(14, 'Córdoba'),
(15, 'A Coruña'),
(16, 'Cuenca'),
(17, 'Girona'),
(18, 'Granada'),
(19, 'Guadalajara'),
(20, 'Guipúzcoa'),
(21, 'Huelva'),
(22, 'Huesca'),
(23, 'Jaén'),
(24, 'León'),
(25, 'Lleida'),
(26, 'La Rioja'),
(27, 'Lugo'),
(28, 'Madrid'),
(29, 'Málaga'),
(30, 'Murcia'),
(31, 'Navarra'),
(32, 'Ourense'),
(33, 'Asturias'),
(34, 'Palencia'),
(35, 'Las Palmas'),
(36, 'Pontevedra'),
(37, 'Salamanca'),
(38, 'Santa Cruz de Tenerife'),
(39, 'Cantabria'),
(40, 'Segovia'),
(41, 'Sevilla'),
(42, 'Soria'),
(43, 'Tarragona'),
(44, 'Teruel'),
(45, 'Toledo'),
(46, 'Valencia'),
(47, 'Valladolid'),
(48, 'Vizcaya'),
(49, 'Zamora'),
(50, 'Zaragoza'),
(51, 'Ceuta'),
(52, 'Melilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipoactividad`
--

DROP TABLE IF EXISTS `tbltipoactividad`;
CREATE TABLE `tbltipoactividad` (
  `IdTipoActividad` int(11) NOT NULL,
  `TipoActividad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tbltipoactividad`
--

TRUNCATE TABLE `tbltipoactividad`;
--
-- Volcado de datos para la tabla `tbltipoactividad`
--

INSERT INTO `tbltipoactividad` (`IdTipoActividad`, `TipoActividad`) VALUES
(1, 'Body-Mind'),
(2, 'Coreografiadas'),
(3, 'Alto Comp. Cardio.'),
(4, 'Tonificación'),
(5, 'Alto Gasto Calórico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

DROP TABLE IF EXISTS `tblusuario`;
CREATE TABLE `tblusuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellidos` varchar(45) DEFAULT NULL,
  `EstadoUsuario` int(11) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `CodProvincia` int(11) NOT NULL,
  `CodPostal` varchar(5) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Nick` varchar(45) NOT NULL,
  `Contrasenia` varchar(45) NOT NULL,
  `TipoUsuario` int(3) NOT NULL,
  `Foto` varchar(45) DEFAULT NULL,
  `Borrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `tblusuario`
--

TRUNCATE TABLE `tblusuario`;
--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`IdUsuario`, `Nombre`, `Apellidos`, `EstadoUsuario`, `Email`, `Direccion`, `CodProvincia`, `CodPostal`, `Telefono`, `FechaNacimiento`, `Nick`, `Contrasenia`, `TipoUsuario`, `Foto`, `Borrado`) VALUES
(1, 'Clara', 'Jorro Aragoneses', NULL, 'clarajorro@gmail.com', 'calle la princesa 85', 28, '28541', '638954785', '1994-11-25', 'Admin', '123456', 0, './Imagenes/ImagenesUsuarios/ImaAdmin.jpg', 0),
(7, 'Felipe', 'Lopez NAvarro', 0, 'felipelopez@hotmail.com', 'Plaza cordillera 23', 2, '28745', '698587848', '1932-10-02', 'Felipe', 'Felipe', 2, './Imagenes/ImagenesUsuarios/ImaUser7.jpg', 0),
(8, 'Isabel', 'Gutierrez', 0, 'isa.guti@hotmail.com', 'Calle los castillos 8', 29, '25478', '698547858', '1958-04-24', 'Isa', 'Isa', 2, './Imagenes/ImagenesUsuarios/ImaUser8.jpg', 0),
(9, 'Pelayo', 'Lopez', 1, 'manuelLopez@gmail.com', 'Calle de la iglesia 24', 1, '12346', '645789123', '1949-01-01', 'Pelayo_monitor', 'monitor', 1, './Imagenes/ImagenesUsuarios/ImaMon.jpg', 0),
(10, 'Jessica', 'Lopez NAvarro', 1, 'moni1@monitor.com', 'Calle los castillos 8', 1, '12346', '620314781', '1941-01-01', 'Jessica_monitor', 'monitor', 1, './Imagenes/ImagenesUsuarios/ImaMon.jpg', 0),
(12, 'Carolina', 'Tartaro Navarro', 0, 'carolina.tartaro@hotmail.com', 'Plaza cordillera 23', 28, '28754', '698745825', '1991-10-25', 'Carolina', 'cAROLINA', 2, NULL, 0),
(13, 'Carlos', 'Megias Andreu', 0, 'marigasandreu.Carlos@hotmail.com', 'calle del medio 789', 40, '42580', '625455885', '1975-01-16', 'Carlos', 'carlos', 2, NULL, 0),
(14, 'Nacho', 'Llanos Hernandez', 0, 'nacho.llanos@hotmail.com', 'Avenida ensanche vallecas 852', 28, '28547', '614789881', '1987-08-18', 'Nacho', 'nacho', 2, NULL, 0),
(15, 'Alejandro', 'De cabo Velasco', 0, 'alexdecabo@hotmail.com', 'Calle sin salida 23', 37, '25784', '612225470', '1992-07-14', 'Alex', 'alex', 2, NULL, 0),
(16, 'Miguel', 'Navarro Sanchis', 0, 'miguel.ns@hotmail.com', 'Plaza mayor 1', 9, '58748', '633214585', '1990-05-10', 'Miguel', 'miguel', 2, NULL, 0),
(17, 'Sandra', 'Vicente Navas', 0, 'sandravicente@hotmail.com', 'Calle monte hernanz 8', 28, '40500', '654787854', '1990-09-05', 'Sandra', 'sandra', 2, NULL, 0),
(18, 'Jose Luis', 'Aragoneses Garre', 1, 'jl.aragoneses@hotmail.com', 'Calle larra 9', 28, '28054', '659987445', '1987-07-09', 'Jose', 'jose', 2, NULL, 1),
(19, 'Irene', 'Gonzalez  Hernandez', 0, 'gonzalez.irene@hotmail.com', 'calle pico balaitus 10', 28, '25854', '658785478', '1988-12-29', 'Irene', 'irene', 2, NULL, 0),
(20, 'Alfonso', 'Hernández Pizarro', 1, 'alfonsohernandez@hotmail.com', 'Avenida ensanche vallecas 852', 8, '54785', '658745821', '1984-05-12', 'Alfonso', 'alfonso', 2, NULL, 0),
(21, 'Isabel', 'Guieterrez', 1, 'isa.guti@hotmail.com', 'Calle los castillos 8', 29, '25478', '123456789', '1958-04-24', 'Isabel', 'isabel', 2, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblactividades`
--
ALTER TABLE `tblactividades`
  ADD PRIMARY KEY (`IdActividad`),
  ADD KEY `FK_IdTipoAct` (`IdTipoActividad`);

--
-- Indices de la tabla `tblactividadesmonitor`
--
ALTER TABLE `tblactividadesmonitor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_activ` (`IdActividad`),
  ADD KEY `Fk_monit` (`IdMonitor`);

--
-- Indices de la tabla `tblactividadesusuario`
--
ALTER TABLE `tblactividadesusuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_usu` (`IdUsuario`),
  ADD KEY `FK_actt` (`IdActividad`);

--
-- Indices de la tabla `tblcontrol`
--
ALTER TABLE `tblcontrol`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblexcomentariorealizado`
--
ALTER TABLE `tblexcomentariorealizado`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tblexcomentarios`
--
ALTER TABLE `tblexcomentarios`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tblmonitor`
--
ALTER TABLE `tblmonitor`
  ADD PRIMARY KEY (`IdMonitor`);

--
-- Indices de la tabla `tblprogresosfisicos`
--
ALTER TABLE `tblprogresosfisicos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_uss` (`IdUsuario`);

--
-- Indices de la tabla `tblprovincias`
--
ALTER TABLE `tblprovincias`
  ADD PRIMARY KEY (`CodProvincia`);

--
-- Indices de la tabla `tbltipoactividad`
--
ALTER TABLE `tbltipoactividad`
  ADD PRIMARY KEY (`IdTipoActividad`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `FK_prov` (`CodProvincia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblactividades`
--
ALTER TABLE `tblactividades`
  MODIFY `IdActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tblactividadesmonitor`
--
ALTER TABLE `tblactividadesmonitor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tblactividadesusuario`
--
ALTER TABLE `tblactividadesusuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblcontrol`
--
ALTER TABLE `tblcontrol`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tblexcomentariorealizado`
--
ALTER TABLE `tblexcomentariorealizado`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblexcomentarios`
--
ALTER TABLE `tblexcomentarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tblmonitor`
--
ALTER TABLE `tblmonitor`
  MODIFY `IdMonitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tblprogresosfisicos`
--
ALTER TABLE `tblprogresosfisicos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbltipoactividad`
--
ALTER TABLE `tbltipoactividad`
  MODIFY `IdTipoActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblactividades`
--
ALTER TABLE `tblactividades`
  ADD CONSTRAINT `FK_IdTipoAct` FOREIGN KEY (`IdTipoActividad`) REFERENCES `tbltipoactividad` (`IdTipoActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblactividadesmonitor`
--
ALTER TABLE `tblactividadesmonitor`
  ADD CONSTRAINT `FK_activ` FOREIGN KEY (`IdActividad`) REFERENCES `tblactividades` (`IdActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_monit` FOREIGN KEY (`IdMonitor`) REFERENCES `tblmonitor` (`IdMonitor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblactividadesusuario`
--
ALTER TABLE `tblactividadesusuario`
  ADD CONSTRAINT `FK_actt` FOREIGN KEY (`IdActividad`) REFERENCES `tblactividades` (`IdActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_usu` FOREIGN KEY (`IdUsuario`) REFERENCES `tblusuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblprogresosfisicos`
--
ALTER TABLE `tblprogresosfisicos`
  ADD CONSTRAINT `FK_uss` FOREIGN KEY (`IdUsuario`) REFERENCES `tblusuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD CONSTRAINT `FK_prov` FOREIGN KEY (`CodProvincia`) REFERENCES `tblprovincias` (`CodProvincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
