-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2017 a las 00:33:38
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
  `responsable` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `descri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`id_accesorio`, `num_inventario`, `tipo`, `serie`, `ubicacion`, `marca`, `modelo`, `responsable`, `estado`, `descri`) VALUES
(1, '', 1, 'senseye', 2, 2, 'rwerwer', 3, 'desechado', 'este es un accesorio x'),
(2, '', 2, 'sfsdfdsfdf', 2, 2, 'dfsdfsdfsdfsdf', 4, 'bodega', 'dsfsdfsdfsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaaccesorios`
--

CREATE TABLE `categoriaaccesorios` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoriaaccesorios`
--

INSERT INTO `categoriaaccesorios` (`id_categoria`, `nombre`) VALUES
(1, 'cable utp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cpu`
--

CREATE TABLE `cpu` (
  `num_inventario` varchar(11) NOT NULL,
  `marca` int(11) DEFAULT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `serv_tag` varchar(45) DEFAULT NULL,
  `id_ram` int(11) DEFAULT NULL,
  `id_tarjetaV` int(11) DEFAULT NULL,
  `id_edificio` int(11) DEFAULT NULL,
  `fecha_ingreso` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `garantia` varchar(45) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `modelo` varchar(40) NOT NULL,
  `nombre_cpu` varchar(45) NOT NULL,
  `nombre_usu_cpu` varchar(45) NOT NULL,
  `clasificacion` varchar(40) NOT NULL,
  `id_increment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cpu`
--

INSERT INTO `cpu` (`num_inventario`, `marca`, `serie`, `serv_tag`, `id_ram`, `id_tarjetaV`, `id_edificio`, `fecha_ingreso`, `id_usuario`, `garantia`, `observacion`, `estado`, `modelo`, `nombre_cpu`, `nombre_usu_cpu`, `clasificacion`, `id_increment`) VALUES
('01-111-1111', 1, 'aaaaa', 'aaaaaaaaaaaa', 1, 1, 1, '2017-02-02', 1, '2017/02/02 - 2017/02/02', '', 'Operando', 'aaaaa', 'aaaaaaa', 'aaaaa', 'Editora', 1),
('01-222-2222', 1, '', '', 1, 1, 2, '2017-02-02', 1, '2017/02/02 - 2017/02/02', '', 'Operando', '', '', '', 'Editora', 2),
('01-255-6666', 1, '', '', 1, 1, 1, '2017-02-02', 2, '2017/02/02 - 2017/02/02', '', 'Operando', '', '', '', 'Editora', 3),
('01-255-7777', 1, '', '', 1, 1, 1, '2017-02-02', 1, '2017/02/02 - 2017/02/02', '', 'Operando', '', '', '', 'Editora', 4),
('01-315-1287', 1, '3454234der34', 'dw6wlc2', 1, 1, 1, '2017-02-02', 1, '2016/12/20 - 2017/02/24', '  esta es una nueva nota', 'Operando', 'Latitude E5470', 'ITBJefatura', 'Wesly Lopez', 'Editora', 5),
('01-900-3653', 1, 'hola', 'hola', 1, 1, 1, '2017-02-01', 1, '2017/02/01 - 2017/02/01', 'obs hola', 'Operando', 'hola', 'hola', 'hola', 'Animadora', 7),
('01-900-3654', 1, 'ser1', 'tag1', 2, 2, 1, '2017-02-02', 1, '2017/02/06 - 2017/03/23', '', 'Operando', 'mo1', 'usuario', 'namequipo', 'Editora', 8),
('01-900-3658', 2, 'serproof', 'proof', 1, 1, 1, '2017-02-01', 1, '2017/02/06 - 2017/03/31', 'obs', 'Operando', 'madsmi93', 'algo-pc', 'usu-pc', 'Animadora', 6),
('01900-3699', 2, 'serie1', 'serv1', 1, 1, 1, '2017-01-23', 1, '2017/01/09 - 2017/03/10', '', 'Operando', 'model1', 'nombre1', '', '', 9),
('02158-2356', 1, 'Serie prueba ', 'tag', 2, 1, 1, '2017-01-24', 1, '2017/05/08 - 2017/06/11', 'Obs ', 'Prestamo', 'Compac', 'Name pc', '', '', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_dep` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_dep`) VALUES
(3, 'ITbroadcast'),
(4, 'trafico'),
(6, 'mercadeo'),
(7, 'promociones');

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
(24, '1900', 3),
(25, '1900', 4),
(26, '2158', 4),
(27, '2158', 5),
(33, '1', 3),
(34, '1', 3),
(35, '1', 3),
(38, '1', 3),
(39, '1', 6);

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
(6, '1', 1),
(7, '1', 2),
(8, '1', 6),
(10, '1', 8);

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
(16, '1900', 1),
(17, '2158', 3),
(22, '1', 6),
(23, '1', 6),
(24, '1', 6),
(29, '1', 4),
(30, '1', 5);

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
(33, '01-230-2002', '01-315-1287'),
(34, '01-900-2522', '01-222-2222'),
(35, '01-900-2522', '01-315-1287'),
(40, '01-234-5697', '01-315-1287'),
(41, '13-333-1122', '01-111-1111'),
(44, '01-232-3233', '01-315-1287');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_departamento`
--

CREATE TABLE `detalle_departamento` (
  `id_det_departamento` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_edificio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_departamento`
--

INSERT INTO `detalle_departamento` (`id_det_departamento`, `id_departamento`, `id_edificio`) VALUES
(3, 6, 1),
(4, 6, 2),
(5, 7, 1),
(6, 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_sim`
--

CREATE TABLE `detalle_sim` (
  `id_det_sim` int(11) NOT NULL,
  `id_sim` int(11) NOT NULL,
  `num_inventario` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_sim`
--

INSERT INTO `detalle_sim` (`id_det_sim`, `id_sim`, `num_inventario`) VALUES
(1, 1, '0909909'),
(2, 2, '0909909'),
(3, 1, '01-900-6688'),
(4, 1, '01-236-5489'),
(6, 2, '01-232-5364');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ubicaciones`
--

CREATE TABLE `detalle_ubicaciones` (
  `id_det_ubicaciones` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_ubicaciones`
--

INSERT INTO `detalle_ubicaciones` (`id_det_ubicaciones`, `id_ubicacion`, `id_departamento`) VALUES
(2, 2, 3),
(3, 3, 6),
(4, 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disco_duro`
--

CREATE TABLE `disco_duro` (
  `id_discoDuro` int(11) NOT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `cant_ray` varchar(45) DEFAULT NULL,
  `marca` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `almacenamiento` varchar(20) NOT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disco_duro`
--

INSERT INTO `disco_duro` (`id_discoDuro`, `observacion`, `cant_ray`, `marca`, `tipo`, `almacenamiento`, `fecha_compra`) VALUES
(1, 'buen estado', '4', 1, 'E solido', '10 GB', '0000-00-00'),
(2, 'mal estado', '5', 2, 'estado sol', '20 MG', '2017-01-26');

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
(1, 'CNT-tgu'),
(2, 'tvc'),
(3, 'emisoras unidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `telefono`, `id_ciudad`, `id_departamento`) VALUES
(3, 'Juan', 'Galeas', '31682180', 1, 1),
(4, 'Wilson', 'X', '888888', 1, 1),
(5, 'Luis', 'Zelaya', '32362536', 1, 1),
(6, 'Jose', 'Manuel', '32112233', 1, 1);

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
(1, '125.128.22'),
(2, '12554.255.255'),
(6, '125.128.221'),
(7, '128.168.12.4'),
(8, '128.25.23.2'),
(9, '12.253532'),
(10, '168.25.36.35'),
(11, '165.222.222.80'),
(12, '192.168.100.20');

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
(1, 'ilustrador', 'español', 'de paga', '12', '30-03-2017', 'adobe', '', '', '', 1, '', ''),
(2, 'after effects', 'ingles', 'trial', NULL, '21-03-2017', 'adobe', '', 'itboperaciones', '123', 1, 'adobe.com', 'vigencia'),
(3, 'phpstorm', 'espanol', 'editor de texto', '2017-01-24', '20-03-2017', 'jetbrains', 'jdjsallÃ±sÃ±Ã±soodmmdikk', '', '', 3, '', 'vigencia'),
(4, 'windows', 'espanol', 'trial', '2017-01-24', '20-01-2017', 'microsoft', 'jdfgnÃ±dfgmÃ±dfmgdfmgÃ±dfmklgÃ±dlmkgdmg', '', '', 3, '', 'vigencia'),
(5, 'microsoft office', 'espanol', 'word, excel', '2017-01-24', '20-03-2017', 'microsoft', 'jkskmsflmsldkfmsdifj', '', '', 1, '', 'vigencia'),
(6, 'outlook', 'espanol', 'de paga ', '2017-01-26', '22-03-2017', 'microsoft', 'kadsjdjsdnhsdjdsdjdj', 'usuario', 'usuario123', 4, 'microsoft.com', 'vigencia'),
(7, '3dMax', 'ingles', '2da suscripcion', '2017-02-02', '20-01-2017', 'Autodesk', 'wedsewrfd-errdsd', 'itboperaciones@televicentro.hn', '123556', 4, 'autodesk.com', 'vigencia'),
(8, 'optical flares', 'espanol', 'pro presets, pro presets', '2017-02-21', '31-03-2017', 'video copilot', '', 'itboperaciones', 'tvc', 0, 'www.videocopilot.net', 'vigencia'),
(9, 'windows server', 'espanol', '', '2017-03-21', '31-03-2017', 'microsoft', '23432rejedj234', '', '', 45, 'microsoft.com', 'vigencia');

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

--
-- Volcado de datos para la tabla `liveu`
--

INSERT INTO `liveu` (`id_liveu`, `nombre_liveu`, `tipo`, `asociado`, `inventario`, `modelo`, `serie`, `fecha_compra`, `cant_moden`, `asignado`, `version_soft`, `descripcion`) VALUES
(3, 'nombre live u', 'mochila', 34, '01-232-5364', 'sdfsdf', 'sfsdf', '', 4, 'noticierocnt', 'sfsdf', ''),
(1, 'name3', 'mochila', 1, '01-236-5489', 'modelojjf', 'dfgdfgser', '2017-03-27', 1, 'noticierolcb', '4.0', 'des'),
(15, 'liveu 300', 'mochila', 0, '01-900-6688', 'modelo', 'seriw', '2017-03-21', 4, 'noticierosps', '4.0', '44rrwewe'),
(4, 'nombre', 'mochila', 0, '01-9000-56', 'model', 'serie', '2017-02-20', 3, 'noticierocnt', 'vs', ''),
(13, 'fgbfghn', 'mochila', 0, '011222222', 'modelo', 'serie', '', 7, 'noticierocnt', 'vs', ''),
(12, 'nombre', 'mochila', 0, '0112222222', 'modelo', 'serie', '2017-02-21', 7, 'noticierocnt', 'vs', 'ds'),
(14, '025kkkk', 'extender', 0, '0909909', 'md', 'sr', '2017-02-23', 8, 'noticierocnt', 'vs', 'ds'),
(7, 'name3', 'mochila', 0, '094555nam4', 'model4', 'ser4', '2017-02-20', 4, 'noticierocnt', 'v4', 'des4'),
(8, 'live5', 'mochila', 0, '123456789', 'fhfhfghfghfgh', 'fhfghfg', '2017-02-21', 55, 'noticierosps', 'fghfghfg', 'dddddd'),
(6, 'fgdgdname', 'mochila', 0, '3333', '3resdf', '3rr', '2017-02-21', 3, 'noticierocnt', 'fdf', 'edwe'),
(9, 'sdf', 'mochila', 0, '333322', '32eeee', 'e3e3', '2017-02-21', 3, 'noticierocnt', '323eddd', 'ee'),
(11, 'mmmm', 'mochila', 0, '3333222', '32eeee', 'e3e3', '', 3, 'noticierocnt', '323eddd', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(25) NOT NULL,
  `descri` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`, `descri`) VALUES
(2, 'ASUS', 'server'),
(3, 'hp', ''),
(4, 'Dell', '');

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
  `observacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monitor`
--

INSERT INTO `monitor` (`id_monitor`, `serie`, `marca`, `serv_tag`, `tamano`, `inventario`, `tipo_monitor`, `observacion`) VALUES
(1, 'ex100', 3, '01222', '17*19', '01-232-3233', 'LCD', 'buen estado'),
(2, 'bx90090', 2, '1254asas112', '11*9', '012555522', 'hd', 'buen estado'),
(3, 'serie', 0, 'ser', '18*9', '01290-1234', 'lcd', 'obs'),
(4, 'serie', 3, 'serv', '12.3', '01-234-5697', 'LED', 'obs'),
(5, 'sdfdfdfdf', 4, 'sef44', '17x78', '01-300-2000', 'LCD', 'etertretett'),
(6, 'wererer', 3, 'rrrr', '34', '01-230-2002', 'LCD', '4rrfvbb'),
(7, 'sv ahsd2343nnd', 3, 'ndn222', '22x11', '01-900-2522', 'LCD', 'este monitor tatatata...'),
(8, 'd sdfs', 2, 'sfddsf', '22 pulg', '13-333-1122', 'LCD', 'sin obs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ram`
--

CREATE TABLE `ram` (
  `id_ram` int(11) NOT NULL,
  `voltage` varchar(45) DEFAULT NULL,
  `capacidad` varchar(45) DEFAULT NULL,
  `tipo_ram` varchar(45) DEFAULT NULL,
  `num_modulos` varchar(45) DEFAULT NULL,
  `frecuencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ram`
--

INSERT INTO `ram` (`id_ram`, `voltage`, `capacidad`, `tipo_ram`, `num_modulos`, `frecuencia`) VALUES
(1, '120', '8 MB', '2 ', '4', ''),
(2, '120', '4 MG', '2 ', '2', '90 MGHZ'),
(3, '120', '8', '2', '4', '120');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simcard`
--

CREATE TABLE `simcard` (
  `id_sim` int(11) NOT NULL,
  `imei` varchar(30) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `numero` varchar(9) NOT NULL,
  `compania` varchar(14) NOT NULL,
  `conectividad` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `simcard`
--

INSERT INTO `simcard` (`id_sim`, `imei`, `nombre`, `numero`, `compania`, `conectividad`) VALUES
(1, 'dfgndfjgn', 'jdfgndfjgn', '444444', 'jdfnsf', '3g'),
(2, '12324343423432432', 'nombre', '32682180', 'tigo', '3g');

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

--
-- Volcado de datos para la tabla `swt_rt`
--

INSERT INTO `swt_rt` (`id_swt_rt`, `num_inventario`, `nombre`, `marca`, `port_dispo`, `serial`, `modelo`, `ubicacion`, `ip`, `sfp`, `usuario`, `pass`, `red_fisica`, `tipo`, `estado`, `descripcion`, `responsable`) VALUES
(1, '01-220-0333', 'switcher4', 2, 1, 'serie', 'modelo', 1, '11', 2, 'admin', 'videoadmin', 10, 'switch', 'operando', 'descr', 3),
(2, '01-321-3155', 'router3', 3, 4, 'ser4', 'model', 2, '190.266.233.566', 0, 'user1', 'pass1', 10, 'router', 'operando', 'wew', 4),
(3, '019552233', 'router1', 1, 5, '', 'modelo', 2, '7', 0, 'admin', 'videoadmin', 100, 'router', 'operando', '', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarj_video`
--

CREATE TABLE `tarj_video` (
  `id_tvideo` int(11) NOT NULL,
  `marca` int(11) NOT NULL,
  `modelo` varchar(19) NOT NULL,
  `memoria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarj_video`
--

INSERT INTO `tarj_video` (`id_tvideo`, `marca`, `modelo`, `memoria`) VALUES
(1, 1, '0122', '2 GB'),
(2, 2, 'm83', '2 GB');

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
(1, 'cable11'),
(2, 'ups');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `nombre_ubicacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubicacion`, `nombre_ubicacion`) VALUES
(2, 'itb2'),
(3, 'mercadeo2'),
(4, 'merca3');

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

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usu`, `pass`, `id_empleado`) VALUES
(1, 'juan', '123', 3),
(2, 'wilson', '123', 4);

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
-- Estructura Stand-in para la vista `vista_ubicaciones`
--
CREATE TABLE `vista_ubicaciones` (
`id_edificio` int(11)
,`nombre_edificio` varchar(45)
,`nombre_dep` varchar(45)
,`id_ubicacion` int(11)
,`nombre_ubicacion` varchar(30)
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

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_ubicaciones`
--
DROP TABLE IF EXISTS `vista_ubicaciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_ubicaciones`  AS  select `e`.`id_edificio` AS `id_edificio`,`e`.`nombre_edificio` AS `nombre_edificio`,`d`.`nombre_dep` AS `nombre_dep`,`du`.`id_ubicacion` AS `id_ubicacion`,`u`.`nombre_ubicacion` AS `nombre_ubicacion` from ((((`edificio` `e` join `detalle_departamento` `dp` on((`e`.`id_edificio` = `dp`.`id_edificio`))) join `departamento` `d` on((`dp`.`id_departamento` = `d`.`id_departamento`))) join `detalle_ubicaciones` `du` on((`d`.`id_departamento` = `du`.`id_departamento`))) join `ubicacion` `u` on((`du`.`id_ubicacion` = `u`.`id_ubicacion`))) group by `e`.`nombre_edificio`,`du`.`id_ubicacion` ;

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
  ADD KEY `responsable` (`responsable`);

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
  ADD KEY `id_tarjetaV` (`id_tarjetaV`),
  ADD KEY `id_edificio` (`id_edificio`),
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
-- Indices de la tabla `detalle_departamento`
--
ALTER TABLE `detalle_departamento`
  ADD PRIMARY KEY (`id_det_departamento`);

--
-- Indices de la tabla `detalle_sim`
--
ALTER TABLE `detalle_sim`
  ADD PRIMARY KEY (`id_det_sim`);

--
-- Indices de la tabla `detalle_ubicaciones`
--
ALTER TABLE `detalle_ubicaciones`
  ADD PRIMARY KEY (`id_det_ubicaciones`);

--
-- Indices de la tabla `disco_duro`
--
ALTER TABLE `disco_duro`
  ADD PRIMARY KEY (`id_discoDuro`);

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
  ADD KEY `id_ciudad` (`id_ciudad`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `ipv4`
--
ALTER TABLE `ipv4`
  ADD PRIMARY KEY (`id_ip`);

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
-- Indices de la tabla `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id_ram`);

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
-- Indices de la tabla `tarj_video`
--
ALTER TABLE `tarj_video`
  ADD PRIMARY KEY (`id_tvideo`);

--
-- Indices de la tabla `tipo_accesorio`
--
ALTER TABLE `tipo_accesorio`
  ADD PRIMARY KEY (`id_taccesorio`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

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
  MODIFY `id_accesorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `categoriaaccesorios`
--
ALTER TABLE `categoriaaccesorios`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cpu`
--
ALTER TABLE `cpu`
  MODIFY `id_increment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id_det_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `detalle_cpu_ip`
--
ALTER TABLE `detalle_cpu_ip`
  MODIFY `id_det_ip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `detalle_cpu_licencia`
--
ALTER TABLE `detalle_cpu_licencia`
  MODIFY `id_det_licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `detalle_cpu_monitor`
--
ALTER TABLE `detalle_cpu_monitor`
  MODIFY `id_det_cpu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `detalle_departamento`
--
ALTER TABLE `detalle_departamento`
  MODIFY `id_det_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detalle_sim`
--
ALTER TABLE `detalle_sim`
  MODIFY `id_det_sim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detalle_ubicaciones`
--
ALTER TABLE `detalle_ubicaciones`
  MODIFY `id_det_ubicaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `disco_duro`
--
ALTER TABLE `disco_duro`
  MODIFY `id_discoDuro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `id_edificio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ipv4`
--
ALTER TABLE `ipv4`
  MODIFY `id_ip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `id_licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `liveu`
--
ALTER TABLE `liveu`
  MODIFY `id_liveu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id_monitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ram`
--
ALTER TABLE `ram`
  MODIFY `id_ram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `simcard`
--
ALTER TABLE `simcard`
  MODIFY `id_sim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `swt_rt`
--
ALTER TABLE `swt_rt`
  MODIFY `id_swt_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tarj_video`
--
ALTER TABLE `tarj_video`
  MODIFY `id_tvideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_accesorio`
--
ALTER TABLE `tipo_accesorio`
  MODIFY `id_taccesorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ups`
--
ALTER TABLE `ups`
  MODIFY `id_ups` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
