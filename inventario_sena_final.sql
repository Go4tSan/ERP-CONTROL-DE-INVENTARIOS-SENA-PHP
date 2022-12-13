-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2022 a las 21:49:17
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_sena_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `access_point_nuevo`
--

CREATE TABLE `access_point_nuevo` (
  `Id_Access` int(11) NOT NULL,
  `Switch` varchar(45) COLLATE utf16_spanish_ci DEFAULT NULL,
  `Ambiente` varchar(45) COLLATE utf16_spanish_ci DEFAULT NULL,
  `Piso` varchar(45) COLLATE utf16_spanish_ci DEFAULT NULL,
  `Seria` varchar(45) COLLATE utf16_spanish_ci NOT NULL,
  `Placa_Telefonica` varchar(30) COLLATE utf16_spanish_ci NOT NULL,
  `Foto_Objeto` text COLLATE utf16_spanish_ci DEFAULT NULL,
  `Foto_Ambiente` text COLLATE utf16_spanish_ci DEFAULT NULL,
  `Marca` varchar(45) COLLATE utf16_spanish_ci NOT NULL,
  `Observacion` varchar(200) COLLATE utf16_spanish_ci DEFAULT NULL,
  `Fecha_Observacion` varchar(45) COLLATE utf16_spanish_ci DEFAULT NULL,
  `MAC` varchar(45) COLLATE utf16_spanish_ci NOT NULL,
  `Estado` varchar(40) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `access_point_nuevo`
--

INSERT INTO `access_point_nuevo` (`Id_Access`, `Switch`, `Ambiente`, `Piso`, `Seria`, `Placa_Telefonica`, `Foto_Objeto`, `Foto_Ambiente`, `Marca`, `Observacion`, `Fecha_Observacion`, `MAC`, `Estado`) VALUES
(1, 'W024AP001', 'AULA 135 ', '1', '21500829322SK9602146YAP7050DE', 'COLTEL-011818', 'default.jpg', 'default.jpg', 'HUAWEI', '', '28-04-2022 - 18:49:51', '1C20DBC7C7E0-FF(32)', '1'),
(2, 'W024AP002', ' AULA 156', '1', '21500829322SK9602148YAP7050DE', 'COLTEL-011817', 'default.jpg', 'default.jpg', 'HUAWEI', '', '28-04-2022 - 18:52:23', '1C20DBC7C860-7F(32)', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_usuario` int(11) NOT NULL,
  `Tipo_Usuario` varchar(45) COLLATE utf16_spanish_ci NOT NULL,
  `correo` varchar(45) COLLATE utf16_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf16_spanish_ci NOT NULL,
  `contra` varchar(45) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_usuario`, `Tipo_Usuario`, `correo`, `nombre`, `contra`) VALUES
(1, '1', 'Aprendiz@gmail.com', 'Jhonatina', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresoras`
--

CREATE TABLE `impresoras` (
  `Id_Impresora` int(11) NOT NULL,
  `Ip` varchar(60) DEFAULT NULL,
  `Modelo` varchar(60) DEFAULT NULL,
  `Ambiente` varchar(60) NOT NULL,
  `Piso` varchar(45) CHARACTER SET utf16 COLLATE utf16_spanish_ci DEFAULT NULL,
  `Seria` varchar(45) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Placa_Telefonica` varchar(30) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Foto_Objeto` text DEFAULT NULL,
  `Foto_Ambiente` text DEFAULT NULL,
  `Marca` varchar(45) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Observacion` text CHARACTER SET utf16 COLLATE utf16_spanish_ci DEFAULT NULL,
  `Fecha_Observacion` varchar(45) CHARACTER SET utf16 COLLATE utf16_spanish_ci DEFAULT NULL,
  `MAC` varchar(45) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Estado` varchar(40) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `switch`
--

CREATE TABLE `switch` (
  `Id_Switch` int(11) NOT NULL,
  `IDF` varchar(20) COLLATE utf16_spanish_ci DEFAULT NULL,
  `Marquilla_Telefonica` varchar(45) COLLATE utf16_spanish_ci NOT NULL,
  `Puertos_Switch` varchar(45) COLLATE utf16_spanish_ci DEFAULT NULL,
  `Lugar` varchar(80) COLLATE utf16_spanish_ci DEFAULT NULL,
  `MAC` varchar(80) COLLATE utf16_spanish_ci NOT NULL,
  `Piso` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Seria` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Placa_Telefonica` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Foto_Objeto` text COLLATE utf16_spanish_ci NOT NULL,
  `Foto_Ambiente` text COLLATE utf16_spanish_ci NOT NULL,
  `Marca` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Observacion` text COLLATE utf16_spanish_ci NOT NULL,
  `Fecha_Observacion` varchar(30) COLLATE utf16_spanish_ci NOT NULL,
  `Estado` varchar(40) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `switch`
--

INSERT INTO `switch` (`Id_Switch`, `IDF`, `Marquilla_Telefonica`, `Puertos_Switch`, `Lugar`, `MAC`, `Piso`, `Seria`, `Placa_Telefonica`, `Foto_Objeto`, `Foto_Ambiente`, `Marca`, `Observacion`, `Fecha_Observacion`, `Estado`) VALUES
(1, 'IDF-1', 'ID 024_IDF5_ST1_5731', 'S5731-H24P4XC', 'SUBDIRECCION MATERIALES Y ENSAYOS', '18CF-24F7-04D0-DF(16)', '2', '1019A0026256', 'COLTEL-006494', 'default.jpg', 'default.jpg', 'HUAWEI', '', '28-04-2022 - 19:13:54', '1'),
(2, 'IDF-1', 'ID 024_IDF5_ST1_5731', 'S5731-H24P4XC', 'SUBDIRECCION MATERIALES Y ENSAYOS', '18CF-24F7-0470-7F(16)', '2', '1019A0026252', 'COLTEL-006565', 'default.jpg', 'default.jpg', 'HUAWEI', '', '02-05-2022 - 11:22:33', '1'),
(3, 'IDF-1', 'ID 024_IDF5_ST1_5731', 'S5731-H24P4XC', 'SUBDIRECCION MATERIALES Y ENSAYOS', 'E000-8498-22F0-FF(16)', '2', '1019A0042945', 'COLTEL-006503', 'default.jpg', 'default.jpg', 'HUAWEI', '', '02-05-2022 - 11:23:59', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `Id_Telefono` int(11) NOT NULL,
  `Usuarios` int(11) DEFAULT NULL,
  `Ambiente` varchar(45) COLLATE utf16_spanish_ci DEFAULT NULL,
  `MAC` varchar(80) COLLATE utf16_spanish_ci NOT NULL,
  `Piso` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Seria` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Placa_Telefonica` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Foto_Objeto` text COLLATE utf16_spanish_ci NOT NULL,
  `Foto_Ambiente` text COLLATE utf16_spanish_ci NOT NULL,
  `Marca` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Observacion` text COLLATE utf16_spanish_ci NOT NULL,
  `Fecha_Observacion` varchar(30) COLLATE utf16_spanish_ci NOT NULL,
  `Asignacion` varchar(40) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`Id_Telefono`, `Usuarios`, `Ambiente`, `MAC`, `Piso`, `Seria`, `Placa_Telefonica`, `Foto_Objeto`, `Foto_Ambiente`, `Marca`, `Observacion`, `Fecha_Observacion`, `Asignacion`) VALUES
(1, 2, 'COORDINACION AUTOMATIZACION CMM', '00908F9C9AFB', '1', 'SC10263291', 'COLTEL-014286', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 11:53:28', '1'),
(2, 3, 'CONTRATACION CMTC', '00908F9CA083', '2', 'SC10264707', 'COLTEL-014283', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 13:56:56', '1'),
(3, 4, 'ATENCION AL CIUDADANO CMM', '00908F9C9CF4', '1', 'SC10263796', 'COLTEL-014281', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:02:31', '1'),
(4, 5, 'ATENCION AL CIUDADANO CMM', '00908F9C9AFD', '1', 'SC10263293', 'COLTEL-014282', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:07:18', '1'),
(5, 6, 'ATENCION AL CIUDADANO CMM/SUBDIRECCIÓN CMM', '00908F9CA0E7', '1', 'SC10264807', 'COLTEL-014284', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:09:15', '1'),
(6, 7, 'COORDINACIÓN CMM', '00908F9C9D1F', '1', 'SC10263839', 'COLTEL-014219', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:11:38', '1'),
(7, 8, 'AREA ADMINISTRATIVA 2 CMM', '00908F9C9D06', '1', 'SC10263814', 'COLTEL-014443', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:13:22', '1'),
(8, 9, 'COORDINACION ACADEMICA CMM', '00908F9C9B4A', '1', 'SC10263370', 'COLTEL-014377', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:14:37', '1'),
(9, 10, 'COORDINACION MECANIZADO CMM', '00908F9C9D13', '1', 'SC10263827', 'COLTEL-014375', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:16:08', '1'),
(10, 24, 'COORDINACION MANTENIMIENTO CMM', '00908F9CA096', '1', 'SC10264726', 'COLTEL-014373', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:41:35', '1'),
(11, 12, 'COORDINACION DE FORMACION PROFESIONAL CMM', '00908F9C9B4E', '1', 'SC10263374', 'COLTEL-014371', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:20:52', '1'),
(12, 13, 'AREA ADMINISTRATIVA 2 CMM', '00908F9C9B54', '1', 'SC10263380', 'COLTEL-014369', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:22:55', '1'),
(13, 14, '', '00908F9CA091', '2', 'SC10264721', 'COLTEL-014367', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:23:51', '1'),
(14, 15, 'SUBDIRECCION MATERIALES Y ENSAYOS', '00908F9CA092', '2', 'SC10264722', 'COLTEL-014365', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:25:45', '1'),
(15, 16, 'COORDINACION FORMACION PROFESIONAL MATERIALES', '00908F9C9B5B', '1', 'SC10263387', 'COLTEL-014363', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:27:38', '1'),
(16, 17, 'COORDINACION DE FORMACION PROFESIONAL MATERIA', '00908F9C9C51', '2', 'SC10263633', 'COLTEL-014406', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:30:36', '1'),
(17, 18, 'SALA DE INSTRUCTORES MATERIALES Y ENSAYOS', '00908F9C9ADF', '2', 'SC10263263', 'COLTEL-014405', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:32:08', '1'),
(18, 19, 'SALA DE INSTRUCTORES MATERIALES Y ENSAYOS', '00908F9C9AEB', '2', 'SC10263275', 'COLTEL-014407', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:33:29', '1'),
(19, 20, 'RECEPCION  MATERIALES Y ENSAYOS', '00908F9CA0E6', '2', 'SC10264806', 'COLTEL-014403', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:34:45', '1'),
(20, 21, 'COORDINACION ACADEMICA MATERIALES Y ENSAYOS', '00908F9C9B6A', '2', 'SC10263402', 'COLTEL-014404', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:36:26', '1'),
(21, 22, '', '00908F9C9B13', '2', 'SC10263315', 'COLTEL-014352', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:38:09', '1'),
(22, 23, 'SEGUIMIENTO APRENDICES MATERIALES Y ENSAYOS', '00908F9C9B66', '2', 'SC10263398', 'COLTEL-014351', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:39:29', '1'),
(23, 24, 'ADMINISTRATIVA 1 MATERIALES Y ENSAYOS', '00908F9C9AE4', '2', 'SC10263268', 'COLTEL-014350', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:41:13', '1'),
(24, 25, 'ADMINISTRACION EDUCATIVA MATERIALES Y ENSAYOS', '00908F9CA451', '2', 'SC10265681', 'COLTEL-015248', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:42:49', '1'),
(25, 26, 'COORDINACION ACADEMICA MATERIALES Y ENSAYOS', '00908F9CA450', '2', 'SC10265680', 'COLTEL-015246', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:47:30', '1'),
(26, 27, 'CERTIFICACION DE COMPETENCIAS LABORALES MATER', '00908F9C9B01', '2', 'SC10263297', 'COLTEL-014360', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:49:04', '1'),
(27, 28, 'COORDINACION ACADEMICA MATERIALES Y ENSAYOS', '00908F9C9D1C', '2', 'SC10263836', 'COLTEL-014358', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:50:22', '1'),
(28, 29, 'ADMINISTRACION EDUCATIVA MATERIALES Y ENSAYOS', '00908F9C9B78', '2', 'SC10263416', 'COLTEL-014356', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:51:39', '1'),
(29, 30, 'COORDINACIÓN ACADEMICA CMTC', '00908F9C9AFF', '2', 'SC10263295', 'COLTEL-014354', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:53:23', '1'),
(30, 31, 'INTERVENTORIA-SUPERVISION CMTC', '00908F9C9CF1', '2', 'SC10263793', 'COLTEL-014381', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:54:33', '1'),
(31, 32, 'COORDINACION ACADEMICA CMTC', '00908F9C9B7A', '2', 'SC10263418', 'COLTEL-014379', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:56:02', '1'),
(32, 33, 'OFICINA CONTRATACION CMM', '00908F9C9CE6', '1', 'SC10263782', 'COLTEL-014434', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:57:15', '1'),
(33, 34, 'AREA CONTRATACION CMM', '00908F9C9D0F', '1', 'SC10263823', 'COLTEL-014432', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 14:59:01', '1'),
(34, 35, 'AREA ADMINISTRATIVA 2 CMM', '00908F9C5CE2', '1', 'SC10247394', 'COLTEL-015388', 'default.jpg', 'default.jpg', 'AUDIOCODES', 'Cambio por garantia al equipo 00908F9C9AFE ', '29-04-2022 - 15:05:32', '3'),
(35, 35, 'AREA ADMINISTRATIVA 2 CMM', '00908F9C9AFE', '1', 'SC10263294', 'COLTEL-014430', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:07:19', '1'),
(36, 36, 'BIENESTAR AL APRENDIZ CMM', '00908F9CA0EB', '1', 'SC10264811', 'COLTEL-014428', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:10:29', '1'),
(37, 37, 'VIDECONFERENCIA', '00908F9C9B6F', '1', 'SC10263407', 'COLTEL-014401', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:12:00', '1'),
(38, 38, 'RECEPCION-SUBDIRECCION CMTC', '00908F9C9B6C', '3', 'SC10263404', 'COLTEL-014426', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:14:11', '1'),
(39, 39, 'OFICINA SUBDIRECCION CMTC', '00908F9C9B88', '3', 'SC10263432', 'COLTEL-014424', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:15:10', '1'),
(40, 40, 'COORDINACION DE FORMACION PROFESIONAL CMTC', '00908F9C9AFC', '3', 'SC10263292', 'COLTEL-014399', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:22:35', '1'),
(41, 41, 'REECEPCION DE SUBDIRECCION CCET', '00908F9C9AE7', '3', 'SC10263271', 'COLTEL-014348', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:24:15', '1'),
(42, 42, 'OFICINA SUBDIRECCION CEET', '00908F9C9CE4', '3', 'SC10263780', 'COLTEL-014346', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:25:17', '1'),
(43, 43, 'COORDINACION MISIONAL CEET', '00908F9C9B40', '3', 'SC10263360', 'COLTEL-014349', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:27:17', '1'),
(44, 44, 'COORDINACION MISIONAL CEET', '00908F9C9B41', '3', 'SC10263361', 'COLTEL-014347', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:28:27', '1'),
(45, 45, 'RECEPCION-SUBDIRECCION CEET', '00908F9C9B48', '3', 'SC10263368', 'COLTEL-014345', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:29:30', '1'),
(46, 46, 'SALA DE JUNTAS CEET', '00908F9C9AE3', '3', 'SC10263267', 'COLTEL-014343', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:30:48', '1'),
(47, 47, 'OFICINA SUBDIRECCION CMM', '00908F9C9B59', '3', 'SC10263385', 'COLTEL-014344', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:32:43', '1'),
(48, 48, 'RECEPCION SUBDIRECCIONES CMTC CEET CMM.', '00908F9C9B51', '3', 'SC10263377', 'COLTEL-014341', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:34:11', '1'),
(49, 49, 'ALMACEN TEXTIL SOTANO', '00908F9C9CCA', '1', 'SC10263754', 'COLTEL-014366', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:35:33', '1'),
(50, 50, 'ALMACEN CEET', '00908F9C9C50', '1', 'SC10263632', 'COLTEL-014364', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:36:57', '1'),
(51, 51, 'AREA ADMINISTRATIVA 1 CONTRATACION CMTC', '00908F9C9CD1', '2', 'SC10263761', 'COLTEL-014441', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:39:33', '1'),
(52, 52, 'AREA ADMINISTRATIVA 1 CONTRATACION CMTC', '00908F9C9AEC', '2', 'SC10263276', 'COLTEL-014439', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:42:29', '1'),
(53, 53, 'SERVICIO AL CIUDADANO CMTC', '00908F9C9AF4', '2', 'SC10263284', 'COLTEL-014437', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:44:24', '1'),
(54, 54, 'OFICINA 313 CEET', '00908F9CA095', '3', 'SC10264725', 'COLTEL-014435', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:45:25', '1'),
(55, 55, 'SENNOVA CEET', '00908F9C9B61', '3', 'SC10263393', 'COLTEL-014433', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:47:54', '1'),
(56, 56, 'COORDINACION ACADEMICA 313 CEET', '00908F9C9AE6', '3', 'SC10263270', 'COLTEL-014431', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:48:50', '1'),
(57, 57, ' MESA SECTORIAL 313 CEET', '00908F9C9B3F', '3', 'SC10263359', 'COLTEL-014259', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:50:29', '1'),
(58, 58, ' CERTIFICACION DE COMPETENCIAS LABORALES 313 ', '00908F9C9B52', '3', 'SC10263378', 'COLTEL-014257', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:52:46', '1'),
(59, 59, ' ENCARGADO DE INGRESO CEET', '00908F9C9B50', '3', 'SC10263376', 'COLTEL-014280', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:55:35', '1'),
(60, 60, 'IDF 5 CEET', '00908F9C9B4D', '3', 'SC10263373', 'COLTEL-014278', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:56:49', '1'),
(61, 61, 'CONTRATACION DE APRENDIZAJE 330 CEET', '00908F9C9AFA', '3', 'SC10263290', 'COLTEL-014276', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:58:20', '1'),
(62, 62, '331 BIENESTAR AL APRENDIZ CEET ', '00908F9C9AE8', '3', 'SC10263272', 'COLTEL-014274', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 15:59:23', '1'),
(63, 63, '313 RECEPCION CEET', '00908F9C9AE5', '3', 'SC10263269', 'COLTEL-014272', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:00:30', '1'),
(64, 64, '313 REGISTRO Y CERTIFICACION CEET', '00908F9C9B53', '3', 'SC10263379', 'COLTEL-014270', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:01:40', '1'),
(65, 65, 'ENFERMERIA CONSULTORIO 1', '00908F9C9B1A', '1', 'SC10263322', 'COLTEL-014268', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:03:00', '1'),
(66, 66, 'ALMACEN CMM', '00908F9C9AF7', '1', 'SC10263287', 'COLTEL-014266', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:04:31', '1'),
(67, 67, 'ALMACEN CENTRO DE MATERIALES Y ENSAYOS', '00908F9C9D15', '1', 'SC10263829', 'COLTEL-014285', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:06:24', '1'),
(68, 68, 'TESORERIA GRUPO DE APOYO', '00908F9C9B62', '1', 'SC10263394', 'COLTEL-014264', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:07:51', '1'),
(69, 69, 'GRUPO DE APOYO ', '00908F9C9AF8', '1', 'SC10263288', 'COLTEL-014262', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:09:48', '1'),
(70, 1, '', '00908F9C9FD5', 'No aplica', 'SC10264533', 'COLTEL-014260', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:11:11', '2'),
(71, 70, 'GRUPO DE APOYO CONTABILIDAD', '00908F9C9B16', '1', 'SC10263318', 'COLTEL-014331', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:13:17', '1'),
(72, 1, '', '00908F9C9B69', 'No aplica', 'SC10263401', 'COLTEL-014258', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:14:33', '2'),
(73, 71, 'RECEPCION GRUPO DE APOYO', '00908F9C9AF1', '1', 'SC10263281', 'COLTEL-014329', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:16:58', '1'),
(74, 1, '', '00908F9C9D20', 'No aplica', 'SC10263840', 'COLTEL-014325', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:18:51', '2'),
(75, 1, '', '00908F9C908C', 'No aplica', 'SC10264716', 'COLTEL-014323', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:19:56', '2'),
(76, 1, '', '00908F9C909B', 'No aplica', 'SC10264731', 'COLTEL-014321', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:20:23', '2'),
(77, 76, 'SALA DE INSTRUCTORES', '00908F9C9B60', '2', 'SC10263392', 'COLTEL-014319', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 11:08:45', '1'),
(78, 1, '', '00908F9C9CEA ', 'No aplica', 'SC10263786', 'COLTEL-014317', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:21:56', '2'),
(79, 1, '', '00908F9C909A ', 'No aplica', 'SC10264730', 'COLTEL-014315', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:22:27', '2'),
(80, 1, '', '00908F9C9FD2', 'No aplica', 'SC10264530', 'COLTEL-014313', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:22:49', '2'),
(81, 1, '', '00908F9C9FD4', 'No aplica', 'SC10264532', 'COLTEL-014217', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:23:20', '2'),
(82, 1, '', '00908F9C9099', 'No aplica', 'SC10264726', 'COLTEL-014218', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:23:46', '2'),
(83, 1, '', '00908F9CAOE9', 'No aplica', 'SC10264809', 'COLTEL-014215', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:24:14', '2'),
(84, 1, '', '00908F9CAO94', 'No aplica', 'SC10264724', 'COLTEL-014216', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:24:36', '2'),
(85, 1, '', '00908F9CACEB', 'No aplica', 'SC10263787', 'COLTEL-014213', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:25:04', '2'),
(86, 1, '', '00908F9CA08E', 'No aplica', 'SC10264718', 'COLTEL-014214', 'default.jpg', 'default.jpg', 'AUDIOCODES', 'Telefono no enciende', '29-04-2022 - 16:41:18', '3'),
(87, 1, '', '00908F9CAB6B', 'No aplica', 'SC10263403', 'COLTEL-014211', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:25:47', '2'),
(88, 1, '', '00908F9CA088', 'No aplica', 'SC10264712', 'COLTEL-014212', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:26:53', '2'),
(89, 1, '', '00908F9C9CFA ', 'No aplica', 'SC10263802', 'COLTEL-014449', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:27:15', '2'),
(90, 77, 'SALA DE INSTRUCTORES', '00908F9CA099', '2', 'SC10264729', 'COLTEL-014218', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 11:10:10', '1'),
(91, 1, '', '00908F9CA0E9', 'No aplica', 'SC10264809', 'COLTEL-014215', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:31:37', '2'),
(92, 1, '', '00908F9C9B6B', 'No aplica', 'SC10263403', 'COLTEL-014211', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:33:02', '2'),
(93, 1, '', '00908F9C9CEB', 'No aplica', 'SC10263787', 'COLTEL-014213', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:34:43', '2'),
(94, 1, '', '00908F9CA094', 'No aplica', 'SC10264724', 'COLTEL-014216', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:44:52', '2'),
(95, 1, '', '00908F9CA1FA', 'No aplica', 'SC10265082', 'COLTEL-015316', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:48:09', '2'),
(96, 1, '', '00908F9CA1F6', 'No aplica', 'SC10265078', 'COLTEL-015315', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:48:31', '2'),
(97, 1, '', '00908F9C99B9', 'No aplica', 'SC10262969', 'COLTEL-015314', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:48:54', '2'),
(98, 1, '', '00908F9C99B2', 'No aplica', 'SC10262962', 'COLTEL-015313', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:49:22', '2'),
(99, 1, '', '00908F9CA026', 'No aplica', 'SC10264614', 'COLTEL-015317', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:49:40', '2'),
(100, 1, '', '00908F9C99C8', 'No aplica', 'SC10262984', 'COLTEL-015318', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:50:21', '2'),
(101, 1, '', '00908F9C99CD', 'No aplica', 'SC10262989', 'COLTEL-015320', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:50:52', '2'),
(102, 1, '', '00908F9C99D0', 'No aplica', 'SC10262992', 'COLTEL-015319', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '29-04-2022 - 16:51:52', '2'),
(103, 1, '', '00908F9CA386', 'No aplica', 'SC10265478', 'COLTEL-015349', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:06:32', '2'),
(104, 1, '', '00908F9CA384', 'No aplica', 'SC10265476', 'COLTEL-015350', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:07:27', '2'),
(105, 1, '', '00908F9CA388', 'No aplica', 'SC10265480', 'COLTEL-015348', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:09:10', '2'),
(106, 1, '', '00908F9CA51F', 'No aplica', 'SC10265887', 'COLTEL-015352', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:09:41', '2'),
(107, 1, '', '00908F9CA76B', 'No aplica', 'SC10266475', 'COLTEL-015347', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:10:03', '2'),
(108, 1, '', '00908F9CA855', 'No aplica', 'SC10266709', 'COLTEL-015354', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:10:28', '2'),
(109, 1, '', '00908F9CA48E', 'No aplica', 'SC10265742', 'COLTEL-015353', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:10:55', '2'),
(110, 1, '', '00908F9CA37F', 'No aplica', 'SC10265471', 'COLTEL-015351', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:11:22', '2'),
(111, 1, '', '00908F9CA36D', 'No aplica', 'SC10265453', 'COLTEL-015303', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:12:31', '2'),
(112, 1, '', '00908F9C9D03', 'No aplica', 'SC10263811', 'COLTEL-014452', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:12:58', '2'),
(113, 1, '', '00908F9C9CFC', 'No aplica', 'SC10263804', 'COLTEL-014445', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:13:58', '2'),
(114, 1, '', '00908F9C9CF0', 'No aplica', 'SC10263792', 'COLTEL-014447', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:14:26', '2'),
(115, 1, '', '00908F9C9D08', 'No aplica', 'SC10263816', 'COLTEL-014450', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:20:58', '2'),
(116, 1, '', '00908F9C9D07', 'No aplica', 'SC10263815', 'COLTEL-014448', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:21:19', '2'),
(117, 1, '', '00908F9C9B42', 'No aplica', 'SC10263362', 'COLTEL-014382', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:21:42', '2'),
(118, 1, '', '00908F9C9AF9', 'No aplica', 'SC10263289', 'COLTEL-014380', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:22:01', '2'),
(119, 1, '', '00908F9CA294', 'No aplica', 'SC10265236', 'COLTEL-015297', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:22:21', '2'),
(120, 1, '', '00908F9C9B55', 'No aplica', 'SC10263381', 'COLTEL-014374', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:22:49', '2'),
(121, 1, '', '00908F9C9B5D', 'No aplica', 'SC10263389', 'COLTEL-014372', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:23:08', '2'),
(122, 1, '', '00908F9CA459', 'No aplica', 'SC10265689', 'COLTEL-015299', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:23:51', '2'),
(123, 1, '', '00908F9C9B56', 'No aplica', 'SC10263382', 'COLTEL-014376', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:24:24', '2'),
(124, 1, '', '00908F9C9B49', 'No aplica', 'SC10263369', 'COLTEL-014368', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:25:11', '2'),
(125, 1, '', '00908F9CA09E', 'No aplica', 'SC10264734', 'COLTEL-014370', 'default.jpg', 'default.jpg', 'AUDIOCODES', 'Telefono no enciende', '02-05-2022 - 10:25:45', '3'),
(126, 1, '', '00908F9CA1EF', 'No aplica', 'SC10265071', 'COLTEL-015240', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:26:25', '2'),
(127, 1, '', '00908F9C9B5C', 'No aplica', 'SC10263388', 'COLTEL-014378', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:27:39', '2'),
(128, 1, '', '00908F9C9654', 'No aplica', 'SC10262100', 'COLTEL-015244', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:28:35', '2'),
(129, 1, '', '00908F9CA1DC', 'No aplica', 'SC10265052', 'COLTEL-015243', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:28:53', '2'),
(130, 1, '', '00908F9CA17A', 'No aplica', 'SC10264954', 'COLTEL-015239', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:29:14', '2'),
(131, 1, '', '00908F9CA1DC', 'No aplica', 'SC10265046', 'COLTEL-015242', 'default.jpg', 'default.jpg', 'AUDIOCODES', 'Telefono no enciende', '02-05-2022 - 10:45:27', '3'),
(132, 1, '', '00908F9CA1E7', 'No aplica', 'SC10265063', 'COLTEL-015237', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:36:21', '2'),
(133, 1, '', '00908F9C96CA', 'No aplica', 'SC10262218', 'COLTEL-015238', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:36:47', '2'),
(134, 1, '', '00908F9CA68D', 'No aplica', 'SC10266253', 'COLTEL-015234', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:37:21', '2'),
(135, 1, '', '00908F9CA79D', 'No aplica', 'SC10266525', 'COLTEL-015236', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:37:42', '2'),
(136, 1, '', '00908F9C99BC', 'No aplica', 'SC10262972', 'COLTEL-015241', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:38:03', '2'),
(137, 1, '', '00908F9C81BC', 'No aplica', 'SC10266828', 'COLTEL-003248', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:38:47', '2'),
(138, 1, '', '00908F9CA6EE', 'No aplica', 'SC10266350', 'COLTEL-015235', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:39:09', '2'),
(139, 1, '', '00908F9CA1F5', 'No aplica', 'SC10265077', 'COLTEL-015326', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:39:44', '2'),
(140, 1, '', '00908F9CA1F2', 'No aplica', 'SC10265074', 'COLTEL-015328', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:41:46', '2'),
(141, 1, '', '00908F9C9653', 'No aplica', 'SC10262099', 'COLTEL-015327', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:42:22', '2'),
(142, 1, '', '00908F9CA18D', 'No aplica', 'SC10264973', 'COLTEL-015331', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:42:47', '2'),
(143, 1, '', '00908F9C9E28', 'No aplica', 'SC10264104', 'COLTEL-015332', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:43:03', '2'),
(144, 1, '', '00908F9CA1FC', 'No aplica', 'SC10265084', 'COLTEL-015325', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:43:23', '2'),
(145, 1, '', '00908F9C81CE', 'No aplica', 'SC10256846', 'COLTEL-003187', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:43:45', '2'),
(146, 1, '', '00908F9C81FF', 'No aplica', 'SC10256895', 'COLTEL-003247', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:44:13', '2'),
(147, 1, '', '00908F9AF258', 'No aplica', 'SC10154584', 'COLTEL-000029', 'default.jpg', 'default.jpg', '?', 'Telefono de marca diferente', '02-05-2022 - 10:44:59', '2'),
(148, 1, '', '00908F9CA1FB', 'No aplica', 'SC10265083', 'COLTEL-015329', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:45:55', '2'),
(149, 1, '', '00908F9CA1F7', 'No aplica', 'SC10265079', 'COLTEL-015330', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:46:31', '2'),
(150, 1, '', '00908F9CA347', 'No aplica', 'SC10265415', 'COLTEL-015117', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:47:00', '2'),
(151, 1, '', '00908F9CA36A', 'No aplica', 'SC10265450', 'COLTEL-015121', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:47:39', '2'),
(152, 1, '', '00908F9CA340', 'No aplica', 'SC10265408', 'COLTEL-015123', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:49:33', '2'),
(153, 1, '', '00908F9CA570', 'No aplica', 'SC10265968', 'COLTEL-015118', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:49:51', '2'),
(154, 1, '', '00908F9CA56F', 'No aplica', 'SC10265967', 'COLTEL-015122', 'default.jpg', 'default.jpg', 'AUDIOCODES', 'Telefono no enciende', '02-05-2022 - 10:50:23', '3'),
(155, 1, '', '00908F9CA383', 'No aplica', 'SC10265475', 'COLTEL-015119', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:51:25', '2'),
(156, 1, '', '00908F9CA341', 'No aplica', 'SC10265409', 'COLTEL-015124', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:51:41', '2'),
(157, 1, '', '00908F9CA57A', 'No aplica', 'SC10265978', 'COLTEL-015120', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:51:58', '2'),
(158, 1, '', '00908F9C9B7E', 'No aplica', 'SC10263422', 'COLTEL-014362', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:52:15', '2'),
(159, 1, '', '00908F9CA573', 'No aplica', 'SC10265971', 'COLTEL-015295', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:52:33', '2'),
(160, 1, '', '00908F9CA45A', 'No aplica', 'SC10265690', 'COLTEL-015301', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:53:21', '2'),
(161, 1, '', '00908F9CA452', 'No aplica', 'SC10264682', 'COLTEL-015293', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:53:41', '2'),
(162, 1, '', '00908F9C9CCD', 'No aplica', 'SC10263757', 'COLTEL-014353', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:55:18', '2'),
(163, 1, '', '00908F9C7BB3', 'No aplica', 'SC10255283', 'COLTEL-003144', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 10:55:39', '2'),
(164, 1, '', '00908F9C8266', 'No aplica', 'SC10256998', 'COLTEL-003229', 'default.jpg', 'default.jpg', 'AUDIOCODES', 'Telefono con pantalla rota', '02-05-2022 - 10:59:46', '3'),
(165, 72, 'LABORATORIO ESPECTROMETRIA MATERIALES Y ENSAY', '00908F9C6198', '1', 'SC10248600', 'COLTEL-014686', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 11:00:42', '1'),
(166, 73, 'CONTRATACION MATERIALES Y ENSAYOS', '00908F9CA09A', '2', 'SC10264730', 'COLTEL-014315', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 11:01:46', '1'),
(167, 74, 'SERVICIO AL CLIENTE', '00908F9CA09B', '2', 'SC10264731', 'COLTEL-014321', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 11:03:23', '1'),
(168, 75, 'APOYO COMPLEMENTARIA', '00908F9C9B5F', '2', 'SC10263391', 'COLTEL-014327', 'default.jpg', 'default.jpg', 'AUDIOCODES', '', '02-05-2022 - 11:06:24', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf16_spanish_ci NOT NULL,
  `Ubicacion` varchar(90) COLLATE utf16_spanish_ci NOT NULL,
  `Observacion` varchar(90) COLLATE utf16_spanish_ci DEFAULT NULL,
  `Fecha_Observacion` varchar(30) COLLATE utf16_spanish_ci DEFAULT NULL,
  `Extencion` varchar(40) COLLATE utf16_spanish_ci DEFAULT NULL,
  `Estado` varchar(40) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Ubicacion`, `Observacion`, `Fecha_Observacion`, `Extencion`, `Estado`) VALUES
(1, 'No aplica', '-', '-', '29-04-2022 - 10:55:05', '-', '1'),
(2, 'LEONEL ALBERTO GOMEZ', '', '', '29-04-2022 - 11:31:58', '15045', '1'),
(3, 'MINERVA FRANCO', '', '', '29-04-2022 - 10:56:13', 'SIN MARQUILLA', '1'),
(4, 'SANDRA PACHON', '', '', '29-04-2022 - 10:56:36', '14952', '1'),
(5, 'CAROLINA RAMIREZ', '', '', '29-04-2022 - 10:57:16', '14938', '1'),
(6, 'KAREN MARTINEZ', '', '', '29-04-2022 - 10:57:31', '15034', '1'),
(7, 'JOAQUIN RUIZ', '', '', '29-04-2022 - 10:57:44', '14905', '1'),
(8, 'NIDYA AMADOR', '', '', '29-04-2022 - 10:57:59', '14940', '1'),
(9, 'YURI DANIELA ROJAS', '', '', '29-04-2022 - 10:58:26', '14923', '1'),
(10, 'OMAR HENOC PARRADO', '', '', '29-04-2022 - 10:58:50', '15145', '1'),
(11, 'ALEXANDER CAÑON', '', '', '29-04-2022 - 10:59:06', '15002', '1'),
(12, 'JESUS ALEJANDRO MORENO', '', '', '29-04-2022 - 11:00:13', '15059', '1'),
(13, 'MONICA ISABEL MORA', '', '', '29-04-2022 - 11:00:28', '15000', '1'),
(14, 'JULIO CAMACHO ', '', '', '29-04-2022 - 11:00:45', '14909', '1'),
(15, 'DORA IVON MORENO', '', '', '29-04-2022 - 11:01:36', '14910', '1'),
(16, 'LUIS NAON PACHECO ANDRADE', '', '', '29-04-2022 - 11:02:07', '14903', '1'),
(17, 'MIGUEL ANGEL VARGAS', '', '', '29-04-2022 - 11:02:56', '14992', '1'),
(18, 'RUBEN DARIO MONTOYA', '', '', '29-04-2022 - 11:03:11', '15022', '1'),
(19, 'MARIA CAMILA RICO', '', '', '29-04-2022 - 11:03:35', '14943', '1'),
(20, 'JENNIFER LOPEZ', '', '', '29-04-2022 - 11:03:55', '15408', '1'),
(21, 'JOSE ADRIANO SUESCA SANCHEZ', '', '', '29-04-2022 - 11:04:13', '14932', '1'),
(22, 'OMAR FERNANDO GUERRERO ERASO', '', '', '29-04-2022 - 11:04:32', '15021', '1'),
(23, 'LUZ EDITH TORRES CRUZ', '', '', '29-04-2022 - 11:05:57', '15038', '1'),
(24, 'PAULA CATALINA FUENTES PARRA', '', '', '29-04-2022 - 11:06:12', '14966', '1'),
(25, 'RICARDO ALFONSO PIRAGAUTA', '', '', '29-04-2022 - 11:06:26', '15039', '1'),
(26, 'VICTOR GUILLERMO BARRIENTOS', '', '', '29-04-2022 - 11:06:48', '15029', '1'),
(27, 'JENNY SARAIDA SANCHEZ', '', '', '29-04-2022 - 11:07:07', '14994', '1'),
(28, 'FABIO ALONSO CAMACHO', '', '', '29-04-2022 - 11:07:25', 'SIN MARQUILLA', '1'),
(29, 'PATRICIA RODRIGUEZ ARIAS', '', '', '29-04-2022 - 11:07:55', '14979', '1'),
(30, 'LUZ MARINA CASTRO', '', '', '29-04-2022 - 11:08:16', '14973', '1'),
(31, 'CARMEN LUCIA PACHECO RESTREPO', '', '', '29-04-2022 - 11:08:33', '14927', '1'),
(32, 'NOHORA MARROQUIN TORRES', '', '', '29-04-2022 - 11:08:43', 'SIN MARQUILLA', '1'),
(33, 'LUZ STELLA AMAYA JAIMES', '', '', '29-04-2022 - 11:09:41', '15020', '1'),
(34, 'MARIA CAROLINA CAÑAS JAIME', '', '', '29-04-2022 - 11:10:50', '15013', '1'),
(35, 'MARIA FERNANDA CUELLAR', '', '', '29-04-2022 - 11:11:05', '15099', '1'),
(36, 'GILMA AGUASACO', '', '', '29-04-2022 - 11:11:21', '14982', '1'),
(37, 'JHON MAURICIO CUELLAR', '', '', '29-04-2022 - 11:11:48', '15048', '1'),
(38, 'YULI ANDREA GONZALES', '', '', '29-04-2022 - 11:12:03', '14916', '1'),
(39, 'SONIA ENCISO', '', '', '29-04-2022 - 11:12:17', '14904', '1'),
(40, 'MARYLUZ RINCON PRIETO', '', '', '29-04-2022 - 11:12:28', '14908', '1'),
(41, 'LEIDY TATIANA VILLATORO', '', '', '29-04-2022 - 11:12:40', '14915', '1'),
(42, 'CLAUDIA JANNET GOMEZ', '', '', '29-04-2022 - 11:13:02', '14914', '1'),
(43, 'MARIO ANDRES RODRIGUEZ', '', '', '29-04-2022 - 11:13:14', '14917', '1'),
(44, 'JANETH CECILIA RODRIGUEZ', '', '', '29-04-2022 - 11:13:33', '15026', '1'),
(45, 'NANCY CADENA', '', '', '29-04-2022 - 11:14:43', 'SIN MARQUILLA', '1'),
(46, 'KATERINE TRIANA', '', '', '29-04-2022 - 11:14:54', 'SIN MARQUILLA', '1'),
(47, 'ALVARO CASTELLANOS', '', '', '29-04-2022 - 11:15:06', '14912', '1'),
(48, 'YULI ANDREA QUIROZ', '', '', '29-04-2022 - 11:15:14', 'SIN MARQUILLA', '1'),
(49, 'WILSON GUERRERO', '', '', '29-04-2022 - 11:15:50', '14942', '1'),
(50, 'LUZ DARY TARAZONA', '', '', '29-04-2022 - 11:16:01', '14974', '1'),
(51, 'DIANA MARITZA BOCANEGRA', '', '', '29-04-2022 - 11:16:15', '15109', '1'),
(52, 'FELIX GALINDO', '', '', '29-04-2022 - 11:16:29', '14950', '1'),
(53, 'CRISTIAN CAMILO MENDEZ', '', '', '29-04-2022 - 11:16:43', '15042', '1'),
(54, 'LUIS CARLOS GONZALES', '', '', '29-04-2022 - 11:16:54', '14968', '1'),
(55, 'PAULA MONTAÑO', '', '', '29-04-2022 - 11:17:06', '14980', '1'),
(56, 'JOSE IVAN SANCHEZ ALFONSO', '', '', '29-04-2022 - 11:17:45', '14968', '1'),
(57, 'SANDRA P OSPINA', '', '', '29-04-2022 - 11:17:59', '14956', '1'),
(58, 'MONICA CALDERON', '', '', '29-04-2022 - 11:18:09', 'SIN MARQUILLA', '1'),
(59, 'JHONATHAN PARADA', '', '', '29-04-2022 - 11:18:16', 'SIN MARQUILLA', '1'),
(60, 'EDWARD ARLEY ', '', '', '29-04-2022 - 11:18:35', 'SIN MARQUILLA', '1'),
(61, 'EIMY PEREZ', '', '', '29-04-2022 - 11:18:52', '15001', '1'),
(62, 'NURY ESMERALDA SASTOQUE', '', '', '29-04-2022 - 11:19:03', '14918', '1'),
(63, 'FLOR VELANDIA', '', '', '29-04-2022 - 11:19:18', '15412', '1'),
(64, 'MATEO IVAN PEÑA', '', '', '29-04-2022 - 11:19:31', '15008', '1'),
(65, 'AMPARO TRUJILLO', '', '', '29-04-2022 - 11:19:45', '14989', '1'),
(66, 'MARCO ANTONIO SALAMANCA', '', '', '29-04-2022 - 11:20:00', '14976', '1'),
(67, 'OLIVERO RODRIGUEZ', '', '', '29-04-2022 - 11:20:14', '14988', '1'),
(68, 'FABIOLA ANDREA MESA', '', '', '29-04-2022 - 11:20:22', 'SIN MARQUILLA', '1'),
(69, 'DIEGO CRISTANCHO', '', '', '29-04-2022 - 11:20:37', '15035', '1'),
(70, 'DORA DIAZ', '', '', '29-04-2022 - 11:20:47', 'SIN MARQUILLA', '1'),
(71, 'OLGA LUCIA ROJAS', '', '', '29-04-2022 - 11:21:03', '14911', '1'),
(72, 'ADRIANA HERRERA PARRA', '', '', '02-05-2022 - 10:57:17', '15006', '1'),
(73, 'SAMUEL EDIXON PEREZ CUBILLOS', '', '', '02-05-2022 - 10:57:38', '15030', '1'),
(74, 'ROLANDO GUERRERO TORRES', '', '', '02-05-2022 - 10:57:56', '14995', '1'),
(75, 'JENNY LUCILA HOLGUIN VILLANUEVA', '', '', '02-05-2022 - 10:58:10', '14958', '1'),
(76, 'MILENA ANDREA ROZO', '', '', '02-05-2022 - 10:58:26', '14945', '1'),
(77, 'MILENA ANDREA ROZO2', '', '', '02-05-2022 - 10:58:56', '15113', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `access_point_nuevo`
--
ALTER TABLE `access_point_nuevo`
  ADD PRIMARY KEY (`Id_Access`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `impresoras`
--
ALTER TABLE `impresoras`
  ADD PRIMARY KEY (`Id_Impresora`);

--
-- Indices de la tabla `switch`
--
ALTER TABLE `switch`
  ADD PRIMARY KEY (`Id_Switch`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`Id_Telefono`),
  ADD KEY `Usuarios` (`Usuarios`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `access_point_nuevo`
--
ALTER TABLE `access_point_nuevo`
  MODIFY `Id_Access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `impresoras`
--
ALTER TABLE `impresoras`
  MODIFY `Id_Impresora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `switch`
--
ALTER TABLE `switch`
  MODIFY `Id_Switch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `Id_Telefono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
