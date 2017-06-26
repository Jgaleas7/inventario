-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2017 a las 02:28:21
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE `accesorios` (
  `id_accesorio` int(11) NOT NULL,
  `num_inventario` varchar(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `ubicacion` int(11) NOT NULL,
  `marca` int(11) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `cpu` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `descri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`id_accesorio`, `num_inventario`, `tipo`, `serie`, `ubicacion`, `marca`, `modelo`, `cpu`, `estado`, `descri`) VALUES
(1, '04-900-0327', 1, '', 1, 9, '500VA', 3, 'operando', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaaccesorios`
--

CREATE TABLE `categoriaaccesorios` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cpu`
--

CREATE TABLE `cpu` (
  `num_inventario` varchar(11) NOT NULL,
  `marca` int(11) DEFAULT NULL,
  `procesador` varchar(45) DEFAULT NULL,
  `serv_tag` varchar(45) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `fecha_ingreso` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `garantia` varchar(45) DEFAULT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `modelo` varchar(40) NOT NULL,
  `nombre_cpu` varchar(45) NOT NULL,
  `nombre_usu_cpu` varchar(45) NOT NULL,
  `clasificacion` varchar(4) NOT NULL COMMENT '1=render, 2=audio, 3=desktop, 4=editoraM, 5=ENL, 6=GenCar, 7=loop, 8=prompter, 9=playOut, 10=Vizuali, 11=animacion, 12=portatil',
  `id_increment` int(11) NOT NULL,
  `capacidadRam` varchar(20) NOT NULL,
  `tipoRam` varchar(10) NOT NULL,
  `num_modulosRam` varchar(10) NOT NULL,
  `frecuenciaRam` varchar(20) NOT NULL,
  `marcaTv` int(11) NOT NULL,
  `modeloTv` varchar(20) NOT NULL,
  `capacidadTv` varchar(20) NOT NULL,
  `hddtotal` varchar(20) NOT NULL,
  `canthdd` varchar(10) NOT NULL,
  `descrihdd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cpu`
--

INSERT INTO `cpu` (`num_inventario`, `marca`, `procesador`, `serv_tag`, `id_departamento`, `fecha_ingreso`, `id_usuario`, `garantia`, `observacion`, `estado`, `modelo`, `nombre_cpu`, `nombre_usu_cpu`, `clasificacion`, `id_increment`, `capacidadRam`, `tipoRam`, `num_modulosRam`, `frecuenciaRam`, `marcaTv`, `modeloTv`, `capacidadTv`, `hddtotal`, `canthdd`, `descrihdd`) VALUES
('01-405-2098', 2, 'Core 2 Quad 2.83 Ghz', '5SVCQ4J', 1, '2017-06-07', 1, '2010/01/07 - 2017/06/07', 'Tiene 2 discos fisicos', 'Operando', 'Precision Tower 7810', 'TVC-4', 'TVC-4', '5', 3, '4GB', 'drr2', '2', '4', 35, 'Quadro FX 580', '3', '1TB', '2', 'NO APLICA RAID'),
('01-405-3616', 2, 'Xeon 1.60 GHz', '', 1, '2017-06-07', 1, '2016/09/19 - 2017/06/07', 'Este equipo se compro a Lufergo\nTiene 2 discos fisicos', 'Operando', 'Precision Tower 7810', 'TN5ENL2', 'TN5ENL2', '5', 2, '16GB', 'drr2', '2', '5', 35, 'Quadro K2200', '8', '2TB', '2', 'No APLICA RAID'),
('01-405-3617', 2, 'Xeon 1.60 GHz', 'J4LQQD2', 1, '2017-06-07', 1, '2016/09/19 - 2017/06/07', 'Este equipo se compro a Lufergo\nTiene dos Discos Fisicos', 'Operando', 'Precision Tower 7810', 'TN5ENL1', 'TN5ENL1', '5', 1, '16 GB', 'sdram', '2', '5', 0, 'Quadro K2200', '8', '2TB', '2TB', 'NO APLICA RAID');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_dep` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_dep`) VALUES
(1, 'PRODUCCION'),
(2, 'PROMOCIONES'),
(3, 'FORMATO Y DESARROLLO'),
(4, 'IT BROADCAST'),
(5, 'INGESTA'),
(6, 'TN5'),
(7, 'OPERACIONES'),
(8, 'HOY MISMO'),
(9, 'FILMOTECA'),
(10, 'TRAFICO'),
(11, 'TVC'),
(12, 'ILUMINACION'),
(13, 'DEPORTES'),
(14, 'VENTAS'),
(16, 'MASTER DE EMISION'),
(17, 'RECEPCION SATELITAL'),
(18, 'AUDIO'),
(19, 'LA CEIBA'),
(21, 'TN5 MATUTINO'),
(22, 'TSI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cpu`
--

CREATE TABLE `detalle_cpu` (
  `id_detcpu` int(11) NOT NULL,
  `num_inventario_cpu` int(11) NOT NULL,
  `id_licencia` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_disco_duro` int(11) DEFAULT NULL,
  `id_monitor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_cpu`
--

INSERT INTO `detalle_cpu` (`id_detcpu`, `num_inventario_cpu`, `id_licencia`, `id_empleado`, `id_disco_duro`, `id_monitor`) VALUES
(1, 12584785, 1, 3, 1, 1),
(3, 82555555, NULL, 3, NULL, 0),
(4, 82555555, NULL, 4, NULL, 0),
(5, 82555555, NULL, 5, NULL, 0),
(6, 82555555, NULL, NULL, 1, 0),
(7, 82555555, 1, NULL, NULL, 0),
(8, 82555555, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cpu_discod`
--

CREATE TABLE `detalle_cpu_discod` (
  `id_det_disco` int(11) NOT NULL,
  `id_numinventario` varchar(11) NOT NULL,
  `id_disco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cpu_empleados`
--

CREATE TABLE `detalle_cpu_empleados` (
  `id_det_empleado` int(11) NOT NULL,
  `id_numinventario` varchar(11) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_cpu_empleados`
--

INSERT INTO `detalle_cpu_empleados` (`id_det_empleado`, `id_numinventario`, `id_empleado`) VALUES
(2, '01-405-3617', 1),
(3, '01-405-3616', 2),
(4, '01-405-2098', 3),
(5, '01-405-2098', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cpu_ip`
--

CREATE TABLE `detalle_cpu_ip` (
  `id_det_ip` int(11) NOT NULL,
  `id_numinventario` varchar(11) NOT NULL,
  `id_ip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_cpu_ip`
--

INSERT INTO `detalle_cpu_ip` (`id_det_ip`, `id_numinventario`, `id_ip`) VALUES
(2, '01-405-3617', 1),
(3, '01-405-3616', 2),
(4, '01-405-2098', 3),
(5, '01-315-0570', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cpu_licencia`
--

CREATE TABLE `detalle_cpu_licencia` (
  `id_det_licencia` int(11) NOT NULL,
  `id_numinventario` varchar(11) NOT NULL,
  `id_licencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_cpu_licencia`
--

INSERT INTO `detalle_cpu_licencia` (`id_det_licencia`, `id_numinventario`, `id_licencia`) VALUES
(2, '01-405-3617', 1),
(3, '01-405-3616', 1),
(4, '01-405-2098', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cpu_monitor`
--

CREATE TABLE `detalle_cpu_monitor` (
  `id_det_cpu` int(11) NOT NULL,
  `id_numinventario` varchar(11) NOT NULL,
  `id_cpu` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_cpu_monitor`
--

INSERT INTO `detalle_cpu_monitor` (`id_det_cpu`, `id_numinventario`, `id_cpu`) VALUES
(1, '04-900-0389', '01-405-3617'),
(2, '01-405-3616', '01-405-3616'),
(3, '01-405-2100', '01-405-2098'),
(4, '01-900-5140', '01-315-0570');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_sim`
--

CREATE TABLE `detalle_sim` (
  `id_det_sim` int(11) NOT NULL,
  `id_sim` int(11) NOT NULL,
  `num_inventario` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_users_licencia`
--

CREATE TABLE `detalle_users_licencia` (
  `id_detalle` int(11) NOT NULL,
  `id_licencia` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `id_edificio` int(11) NOT NULL,
  `nombre_edificio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `edificio`
--

INSERT INTO `edificio` (`id_edificio`, `nombre_edificio`) VALUES
(1, 'CNT'),
(2, 'TVC'),
(3, 'SPS'),
(4, 'CEIBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `id_departamento`) VALUES
(1, 'Carlos', 'Valladares', '', '', 6),
(2, 'Eduardo', 'Tinoco', '', '', 6),
(3, 'Edas', 'Carrasco', '', '', 6),
(4, 'Raquel', 'Lazo', '', '', 6),
(5, 'Eduardo', 'Tinoco', '', '', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ipv4`
--

CREATE TABLE `ipv4` (
  `id_ip` int(11) NOT NULL,
  `ip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ipv4`
--

INSERT INTO `ipv4` (`id_ip`, `ip`) VALUES
(3, '192.168.100.124'),
(1, '192.168.100.130'),
(2, '192.168.100.95');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ip_desocupadas`
--
CREATE TABLE `ip_desocupadas` (
`id_ip` int(11)
,`ip` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ip_ocupadas`
--
CREATE TABLE `ip_ocupadas` (
`id_ip` varchar(16)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `id_licencia` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `idioma` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_adqui` varchar(45) DEFAULT NULL,
  `fecha_vence` varchar(45) DEFAULT NULL,
  `fabricante` varchar(45) NOT NULL,
  `clave` varchar(70) NOT NULL,
  `usuario_lic` varchar(45) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `cant_lic` int(11) NOT NULL,
  `pag_web` varchar(60) NOT NULL,
  `tipo_contrato` varchar(20) NOT NULL COMMENT 'puede ser indefinido o con vigencia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `licencia`
--

INSERT INTO `licencia` (`id_licencia`, `nombre`, `idioma`, `descripcion`, `fecha_adqui`, `fecha_vence`, `fabricante`, `clave`, `usuario_lic`, `pass`, `cant_lic`, `pag_web`, `tipo_contrato`) VALUES
(1, 'Windows 10 Pro 64 Bits ', 'ingles', '', '2017-06-07', '', 'Microsoft', 'Propiedad del fabricante', '', '', 50, '', 'indefinido'),
(2, 'Windows 7 Pro 64 Bits', 'espanol', '', '2017-06-07', '', 'Microsoft', 'P3HX8-72MWF-C36TH-F2MJR-6Y3R3', '', '', 1, '', 'indefinido'),
(3, 'Windows 7 Pro 64Bits ', 'espanol', '', '2017-06-07', '', 'Microsoft', '6P3MD-KT3Y6-TKK6J-6HJ8D-WKTJM', '', '', 1, '', 'indefinido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liveu`
--

CREATE TABLE `liveu` (
  `id_liveu` int(11) NOT NULL,
  `nombre_liveu` varchar(40) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `asociado` int(11) NOT NULL,
  `inventario` varchar(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `fecha_compra` varchar(20) NOT NULL,
  `cant_moden` int(3) NOT NULL,
  `asignado` varchar(25) NOT NULL,
  `version_soft` varchar(15) NOT NULL,
  `descripcion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id` int(11) NOT NULL,
  `tipo_equipo` varchar(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha` varchar(25) NOT NULL,
  `precio` varchar(11) NOT NULL,
  `ubicacion` varchar(40) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `observaciones` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`) VALUES
(1, 'TEKNO'),
(2, 'DELL'),
(3, 'ROSS'),
(4, 'SAMSUNG'),
(5, 'VIEW SONIC'),
(6, 'NEWTEK'),
(7, 'COMPIX'),
(8, 'CLON'),
(9, 'EMERSON'),
(10, 'APPLE'),
(11, 'APC'),
(12, 'ACER'),
(13, 'LG'),
(14, 'HANNSG'),
(15, 'BenQ'),
(16, 'SUPERMICRO'),
(17, 'AOC'),
(18, 'TRIP_PLITE'),
(19, 'IBM'),
(20, 'COMPAQ'),
(21, '3COM'),
(22, 'FORTINET'),
(23, 'ALLIED TELLESIS'),
(24, 'SONY'),
(25, 'SHARP'),
(26, 'PLANAR'),
(27, 'ORAD'),
(28, 'SEAGATE'),
(29, 'AGILER'),
(30, 'ANTON BAUER'),
(31, 'ASUS'),
(32, 'KINSTONG'),
(33, 'TOSHIBA'),
(34, 'EVGA'),
(35, 'NVIDIA'),
(36, 'AMD'),
(37, 'HP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitor`
--

CREATE TABLE `monitor` (
  `id_monitor` int(11) NOT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  `serv_tag` varchar(45) DEFAULT NULL,
  `tamano` varchar(45) DEFAULT NULL,
  `inventario` varchar(11) NOT NULL,
  `tipo_monitor` varchar(45) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `fecha_compra` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monitor`
--

INSERT INTO `monitor` (`id_monitor`, `serie`, `marca`, `serv_tag`, `tamano`, `inventario`, `tipo_monitor`, `observacion`, `fecha_compra`) VALUES
(1, '', 4, '', '24 Pul', '04-900-0389', 'HD', '', ''),
(2, '', 17, '', '24 Pul', '01-405-3616', 'LCD', '', ''),
(3, '', 2, '', '22 Pul', '01-405-2100', 'LCD', '', ''),
(4, '', 37, '', '24 Pul', '01-900-5140', 'LCD', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simcard`
--

CREATE TABLE `simcard` (
  `id_sim` int(11) NOT NULL,
  `imei` varchar(30) NOT NULL,
  `numero` varchar(9) NOT NULL,
  `compania` varchar(14) NOT NULL,
  `conectividad` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `id_software` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `idioma` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_adqui` varchar(45) DEFAULT NULL,
  `id_licencia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `swt_rt`
--

CREATE TABLE `swt_rt` (
  `id_swt_rt` int(11) NOT NULL,
  `num_inventario` varchar(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `marca` int(11) NOT NULL,
  `port_dispo` int(3) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `ubicacion` int(11) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `sfp` int(3) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `red_fisica` int(3) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_accesorio`
--

CREATE TABLE `tipo_accesorio` (
  `id_taccesorio` int(11) NOT NULL,
  `tipo_accesorio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_accesorio`
--

INSERT INTO `tipo_accesorio` (`id_taccesorio`, `tipo_accesorio`) VALUES
(1, 'UPS'),
(2, 'PARLANTES'),
(3, 'MATROX'),
(4, 'SWITCHER NEWTEK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ups`
--

CREATE TABLE `ups` (
  `id_ups` int(11) NOT NULL,
  `id_inventario` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `capacidad` varchar(45) DEFAULT NULL,
  `num_inventario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usu` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_licencia`
--
CREATE TABLE `vista_licencia` (
`cant_lic` int(11)
,`fabricante` varchar(45)
,`id_licencia` int(11)
,`nombre` varchar(45)
,`descripcion` varchar(45)
,`fecha_adqui` varchar(45)
,`fecha_vence` varchar(45)
,`clave` varchar(70)
,`usuario_lic` varchar(45)
,`pass` varchar(50)
,`pag_web` varchar(60)
,`tipo_contrato` varchar(20)
,`usadas` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `ip_desocupadas`
--
DROP TABLE IF EXISTS `ip_desocupadas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ip_desocupadas`  AS  select `i`.`id_ip` AS `id_ip`,`i`.`ip` AS `ip` from `ipv4` `i` where (not(`i`.`id_ip` in (select `ip_ocupadas`.`id_ip` from `ip_ocupadas`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `ip_ocupadas`
--
DROP TABLE IF EXISTS `ip_ocupadas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ip_ocupadas`  AS  select `detalle_cpu_ip`.`id_ip` AS `id_ip` from `detalle_cpu_ip` union select `swt_rt`.`ip` AS `ip` from `swt_rt` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_licencia`
--
DROP TABLE IF EXISTS `vista_licencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_licencia`  AS  select `li`.`cant_lic` AS `cant_lic`,`li`.`fabricante` AS `fabricante`,`li`.`id_licencia` AS `id_licencia`,`li`.`nombre` AS `nombre`,`li`.`descripcion` AS `descripcion`,`li`.`fecha_adqui` AS `fecha_adqui`,`li`.`fecha_vence` AS `fecha_vence`,`li`.`clave` AS `clave`,`li`.`usuario_lic` AS `usuario_lic`,`li`.`pass` AS `pass`,`li`.`pag_web` AS `pag_web`,`li`.`tipo_contrato` AS `tipo_contrato`,(select count(`dl`.`id_licencia`) from `detalle_cpu_licencia` `dl` where (`dl`.`id_licencia` = `li`.`id_licencia`)) AS `usadas` from `licencia` `li` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id_accesorio`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `ubicacion` (`ubicacion`),
  ADD KEY `marca` (`marca`),
  ADD KEY `responsable` (`cpu`);

--
-- Indices de la tabla `categoriaaccesorios`
--
ALTER TABLE `categoriaaccesorios`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`num_inventario`),
  ADD UNIQUE KEY `id_increment` (`id_increment`),
  ADD KEY `id_edificio` (`id_departamento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `detalle_cpu`
--
ALTER TABLE `detalle_cpu`
  ADD PRIMARY KEY (`id_detcpu`),
  ADD KEY `id_monitor` (`id_monitor`),
  ADD KEY `id_disco_duro` (`id_disco_duro`),
  ADD KEY `id_licencia` (`id_licencia`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_disco_duro_2` (`id_disco_duro`),
  ADD KEY `num_inventario_cpu` (`num_inventario_cpu`);

--
-- Indices de la tabla `detalle_cpu_discod`
--
ALTER TABLE `detalle_cpu_discod`
  ADD PRIMARY KEY (`id_det_disco`),
  ADD KEY `id_numinventario` (`id_numinventario`);

--
-- Indices de la tabla `detalle_cpu_empleados`
--
ALTER TABLE `detalle_cpu_empleados`
  ADD PRIMARY KEY (`id_det_empleado`),
  ADD KEY `id_numinventario` (`id_numinventario`);

--
-- Indices de la tabla `detalle_cpu_ip`
--
ALTER TABLE `detalle_cpu_ip`
  ADD PRIMARY KEY (`id_det_ip`),
  ADD KEY `id_numinventario` (`id_numinventario`),
  ADD KEY `id_ip` (`id_ip`);

--
-- Indices de la tabla `detalle_cpu_licencia`
--
ALTER TABLE `detalle_cpu_licencia`
  ADD PRIMARY KEY (`id_det_licencia`),
  ADD KEY `id_numinventario` (`id_numinventario`);

--
-- Indices de la tabla `detalle_cpu_monitor`
--
ALTER TABLE `detalle_cpu_monitor`
  ADD PRIMARY KEY (`id_det_cpu`),
  ADD KEY `id_numinventario` (`id_numinventario`);

--
-- Indices de la tabla `detalle_sim`
--
ALTER TABLE `detalle_sim`
  ADD PRIMARY KEY (`id_det_sim`);

--
-- Indices de la tabla `detalle_users_licencia`
--
ALTER TABLE `detalle_users_licencia`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`id_edificio`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `ipv4`
--
ALTER TABLE `ipv4`
  ADD PRIMARY KEY (`id_ip`),
  ADD UNIQUE KEY `ip` (`ip`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`id_licencia`);

--
-- Indices de la tabla `liveu`
--
ALTER TABLE `liveu`
  ADD PRIMARY KEY (`inventario`),
  ADD UNIQUE KEY `id_liveu` (`id_liveu`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id_monitor`),
  ADD UNIQUE KEY `inventario` (`inventario`);

--
-- Indices de la tabla `simcard`
--
ALTER TABLE `simcard`
  ADD UNIQUE KEY `id_sim` (`id_sim`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id_software`);

--
-- Indices de la tabla `swt_rt`
--
ALTER TABLE `swt_rt`
  ADD PRIMARY KEY (`num_inventario`),
  ADD UNIQUE KEY `id_swt_rt` (`id_swt_rt`),
  ADD KEY `ubicacion` (`ubicacion`),
  ADD KEY `ip` (`ip`),
  ADD KEY `marca` (`marca`);

--
-- Indices de la tabla `tipo_accesorio`
--
ALTER TABLE `tipo_accesorio`
  ADD PRIMARY KEY (`id_taccesorio`);

--
-- Indices de la tabla `ups`
--
ALTER TABLE `ups`
  ADD PRIMARY KEY (`id_ups`),
  ADD KEY `num_inventario` (`num_inventario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  MODIFY `id_accesorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categoriaaccesorios`
--
ALTER TABLE `categoriaaccesorios`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id_increment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `detalle_cpu`
--
ALTER TABLE `detalle_cpu`
  MODIFY `id_detcpu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `detalle_cpu_discod`
--
ALTER TABLE `detalle_cpu_discod`
  MODIFY `id_det_disco` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_cpu_empleados`
--
ALTER TABLE `detalle_cpu_empleados`
  MODIFY `id_det_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `detalle_cpu_ip`
--
ALTER TABLE `detalle_cpu_ip`
  MODIFY `id_det_ip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `detalle_cpu_licencia`
--
ALTER TABLE `detalle_cpu_licencia`
  MODIFY `id_det_licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `detalle_cpu_monitor`
--
ALTER TABLE `detalle_cpu_monitor`
  MODIFY `id_det_cpu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `detalle_sim`
--
ALTER TABLE `detalle_sim`
  MODIFY `id_det_sim` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_users_licencia`
--
ALTER TABLE `detalle_users_licencia`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `id_edificio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ipv4`
--
ALTER TABLE `ipv4`
  MODIFY `id_ip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `id_licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `liveu`
--
ALTER TABLE `liveu`
  MODIFY `id_liveu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id_monitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `simcard`
--
ALTER TABLE `simcard`
  MODIFY `id_sim` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `swt_rt`
--
ALTER TABLE `swt_rt`
  MODIFY `id_swt_rt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_accesorio`
--
ALTER TABLE `tipo_accesorio`
  MODIFY `id_taccesorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ups`
--
ALTER TABLE `ups`
  MODIFY `id_ups` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
