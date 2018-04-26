-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2017 a las 14:24:06
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hacienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento`
--

CREATE TABLE `alimento` (
  `COD_ALIMENTO` varchar(50) NOT NULL,
  `NOM_ALIMENTO` varchar(50) NOT NULL,
  `DESCRI_ALIMENTO` varchar(50) NOT NULL,
  `PREC_X_U_MEDIDA` decimal(10,2) NOT NULL,
  `UNIDAD_DE_MEDIDA` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alimento`
--

INSERT INTO `alimento` (`COD_ALIMENTO`, `NOM_ALIMENTO`, `DESCRI_ALIMENTO`, `PREC_X_U_MEDIDA`, `UNIDAD_DE_MEDIDA`) VALUES
('A001', 'MAÃZ AMARILLO', 'FORRAJE', '0.60', 'Gramos'),
('A002', 'TRIGO', 'FORRAJE', '0.76', 'Kilogramos'),
('A003', 'AVENA', 'FORRAJE', '0.56', 'Kilogramos'),
('A004', 'CEBADA', 'FORRAJE', '0.43', 'Kilogramos'),
('A005', 'hierba', 'FORRAJE', '5.00', 'Gramos'),
('A006', 'PASTO', 'FORRAJE', '0.98', 'Kilogramos'),
('A007', 'BORRA DE CERVEZA', 'CONCENTRADOS', '0.75', 'Kilogramos'),
('A008', 'AFRECHO DE ARROZ', 'CONCENTRADOS', '0.40', 'Kilogramos'),
('A009', 'ARROCILLO', 'CONCENTRADOS', '0.55', 'Kilogramos'),
('A010', 'UREA', 'CONCENTRADOS', '0.90', 'Kilogramos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bovino`
--

CREATE TABLE `bovino` (
  `COD_BOVINO` varchar(50) NOT NULL,
  `COD_ESTABLO` varchar(220) DEFAULT NULL,
  `COD_RAZA` varchar(50) DEFAULT NULL,
  `NOMBRE_B` varchar(50) NOT NULL,
  `FECHA_NAC` varchar(50) NOT NULL,
  `TIPO_ADQ` varchar(50) NOT NULL,
  `GENERO_B` char(1) NOT NULL,
  `BOVINO_ACTIVO` varchar(50) NOT NULL,
  `COLOR_B` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bovino`
--

INSERT INTO `bovino` (`COD_BOVINO`, `COD_ESTABLO`, `COD_RAZA`, `NOMBRE_B`, `FECHA_NAC`, `TIPO_ADQ`, `GENERO_B`, `BOVINO_ACTIVO`, `COLOR_B`) VALUES
('B001', 'E002', 'R001', 'Aceituna', '12/03/2008', 'COMPRA', 'F', 'SI', 'BLACO Y NEGRO'),
('B002', 'E001', 'R001', 'Alejo', '25/10/2013', 'NACIMIENTO', 'M', 'NO', 'CAFE'),
('B003', 'E001', 'R004', 'Mateo', '01/06/2015', 'COMPRA', 'M', 'NO', 'GRIS'),
('B005', 'E001', 'R005', 'Marta', '03/10/2012', 'NACIMIENTO', 'F', 'SI', 'NEGRA'),
('B006', 'E002', 'R001', 'Morena', '11/07/2016', 'COMPRA', 'F', 'NO', 'BLACO Y NEGRO'),
('B007', 'E003', 'R003', 'Andres', '10/10/2012', 'NACIMINETO', 'm', 'SI', 'BLANCO '),
('B008', 'E002', 'R005', 'Española', '10/10/2015', 'NACIMINETO', 'F', 'SI', 'BLANCO '),
('B009', 'E001', 'R003', 'Escogida', '22/01/2015', 'COMPRA', 'F', 'SI', 'BLANCO '),
('B010', 'E003', 'R005', 'Morita', '10/01/2017', 'COMPRA', 'F', 'SI', 'BLANCO '),
('B011', 'E003', 'R005', 'Esmeralda', '13/05/2014', 'NACIMINETO', 'F', 'SI', 'CAFE'),
('B012', 'E001', 'R003', 'Juan', '21/10/2015', 'NACIMINETO', 'M', 'SI', 'BLACO Y NEGRO'),
('B013', NULL, 'R001', 'PEPITO', '22/2/2016', 'COMPRA', 'M', 'SI', 'CAFE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establo`
--

CREATE TABLE `establo` (
  `COD_ESTABLO` varchar(220) NOT NULL,
  `COD_HACIENDA` varchar(20) NOT NULL,
  `CAP_MAXIMA` int(11) NOT NULL,
  `NUM_ANIMALES` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `establo`
--

INSERT INTO `establo` (`COD_ESTABLO`, `COD_HACIENDA`, `CAP_MAXIMA`, `NUM_ANIMALES`) VALUES
('E001', '001', 120, 12),
('E002', '001', 200, 20),
('E003', '001', 100, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_cab`
--

CREATE TABLE `factura_cab` (
  `id_factura_cab` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(1) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura_cab`
--

INSERT INTO `factura_cab` (`id_factura_cab`, `fecha`, `estado`, `total`) VALUES
(1, '2017-02-08', 'S', 0.6),
(2, '2017-02-08', 'S', 0.6),
(3, '2017-02-10', 'S', 98),
(4, '2017-02-10', 'S', 0.6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_det`
--

CREATE TABLE `factura_det` (
  `id_factura_det` int(11) NOT NULL,
  `COD_BOVINO` varchar(50) NOT NULL,
  `COD_ALIMENTO` varchar(50) NOT NULL,
  `NOMBRE_B` varchar(50) NOT NULL,
  `NOM_ALIMENTO` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `suubtotal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_medica`
--

CREATE TABLE `ficha_medica` (
  `COD_FICHA` varchar(50) NOT NULL,
  `COD_BOVINO` varchar(50) DEFAULT NULL,
  `CODIGO_MED` varchar(50) DEFAULT NULL,
  `FECHA_FICHA` varchar(50) NOT NULL,
  `OBS_FIC_MEDICA` varchar(50) NOT NULL,
  `NOM_VETERINARIO` varchar(50) NOT NULL,
  `DIAG_MEDICO` varchar(50) NOT NULL,
  `VALOR_CONSULTA` decimal(8,0) NOT NULL,
  `MOTIVO_DE_ATENCION` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hacienda`
--

CREATE TABLE `hacienda` (
  `COD_HACIENDA` varchar(20) NOT NULL,
  `NOM_HACIENDA` varchar(50) NOT NULL,
  `PROV_HACIENDA` varchar(50) NOT NULL,
  `CANT_HACIENDA` varchar(50) NOT NULL,
  `PARR_HACIENDA` varchar(50) NOT NULL,
  `DIREC_HACIENDA` varchar(50) NOT NULL,
  `TELEF_HACIENDA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hacienda`
--

INSERT INTO `hacienda` (`COD_HACIENDA`, `NOM_HACIENDA`, `PROV_HACIENDA`, `CANT_HACIENDA`, `PARR_HACIENDA`, `DIREC_HACIENDA`, `TELEF_HACIENDA`) VALUES
('H0401774872', 'SANTA ROSA', 'IMBABURA', 'CARCHI', 'CARCHI', 'PIMAMPIRO', 2545679);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_de_alimentacion`
--

CREATE TABLE `historico_de_alimentacion` (
  `COD_REGISTRO` varchar(50) NOT NULL,
  `COD_BOVINO` varchar(50) NOT NULL,
  `COD_ALIMENTO` varchar(50) NOT NULL,
  `FEC_ALIMENTACION` varchar(50) NOT NULL,
  `CANTIDAD` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `COD_MED` varchar(50) NOT NULL,
  `NOMBRE_MED` varchar(50) DEFAULT NULL,
  `FECHA_MED` varchar(50) DEFAULT NULL,
  `CONTRADICCIONES_MED` varchar(50) DEFAULT NULL,
  `DOSIS_MED` varchar(50) DEFAULT NULL,
  `PRECIO_MED` varchar(50) DEFAULT NULL,
  `DESCRIPCION_DEL_MEDICAMENTO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`COD_MED`, `NOMBRE_MED`, `FECHA_MED`, `CONTRADICCIONES_MED`, `DOSIS_MED`, `PRECIO_MED`, `DESCRIPCION_DEL_MEDICAMENTO`) VALUES
('M001', 'VETONIC', '06/02/2017', 'NINGUNA', '5-10MG 2L', '25', 'BIOESTIMULANTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion_cab`
--

CREATE TABLE `produccion_cab` (
  `COD_REGISTRO` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `ESTADO` varchar(1) NOT NULL,
  `TOTAL_PROD` float NOT NULL,
  `TOTAL_INGRESO` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion_leche`
--

CREATE TABLE `produccion_leche` (
  `COD_DETALLE` varchar(50) NOT NULL,
  `COD_BOVINO` varchar(50) NOT NULL,
  `COD_REGISTRO` int(11) NOT NULL,
  `SECC_ORDENO` varchar(50) NOT NULL DEFAULT 'D',
  `NUM_LITROS` int(11) NOT NULL,
  `HORA_ORDENO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `raza`
--

CREATE TABLE `raza` (
  `COD_RAZA` varchar(50) NOT NULL,
  `NOMBRE_RAZA` varchar(50) NOT NULL,
  `DESCRP_RAZA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `raza`
--

INSERT INTO `raza` (`COD_RAZA`, `NOMBRE_RAZA`, `DESCRP_RAZA`) VALUES
('R001', 'ANGUS', 'De Escocia tamaÃ±o mediano'),
('R002', 'BRAHMAN', 'DE EEUU Ganado cebÃº, tamaÃ±o medio '),
('R003', 'BROWS SUIS', 'De Croacia Marron oscuro'),
('R004', 'HOLSTEIN', 'De Holanada  Blancos y Negros'),
('R005', 'NORMANDO', 'De Francia Grandes ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`COD_ALIMENTO`);

--
-- Indices de la tabla `bovino`
--
ALTER TABLE `bovino`
  ADD PRIMARY KEY (`COD_BOVINO`),
  ADD KEY `FK_REFERENCE_12` (`COD_RAZA`),
  ADD KEY `FK_REFERENCE_8` (`COD_ESTABLO`);

--
-- Indices de la tabla `establo`
--
ALTER TABLE `establo`
  ADD PRIMARY KEY (`COD_ESTABLO`),
  ADD KEY `FK_REFERENCE_6` (`COD_HACIENDA`);

--
-- Indices de la tabla `factura_cab`
--
ALTER TABLE `factura_cab`
  ADD PRIMARY KEY (`id_factura_cab`);

--
-- Indices de la tabla `factura_det`
--
ALTER TABLE `factura_det`
  ADD PRIMARY KEY (`id_factura_det`);

--
-- Indices de la tabla `ficha_medica`
--
ALTER TABLE `ficha_medica`
  ADD PRIMARY KEY (`COD_FICHA`),
  ADD KEY `FK_REFERENCE_11` (`CODIGO_MED`),
  ADD KEY `FK_REFERENCE_3` (`COD_BOVINO`);

--
-- Indices de la tabla `hacienda`
--
ALTER TABLE `hacienda`
  ADD PRIMARY KEY (`COD_HACIENDA`);

--
-- Indices de la tabla `historico_de_alimentacion`
--
ALTER TABLE `historico_de_alimentacion`
  ADD PRIMARY KEY (`COD_REGISTRO`),
  ADD KEY `FK_REFERENCE_10` (`COD_ALIMENTO`),
  ADD KEY `FK_REFERENCE_9` (`COD_BOVINO`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`COD_MED`);

--
-- Indices de la tabla `produccion_cab`
--
ALTER TABLE `produccion_cab`
  ADD PRIMARY KEY (`COD_REGISTRO`);

--
-- Indices de la tabla `produccion_leche`
--
ALTER TABLE `produccion_leche`
  ADD PRIMARY KEY (`COD_DETALLE`),
  ADD KEY `FK_REFERENCE_4` (`COD_BOVINO`),
  ADD KEY `FK_REFERENCE_14` (`COD_REGISTRO`);

--
-- Indices de la tabla `raza`
--
ALTER TABLE `raza`
  ADD PRIMARY KEY (`COD_RAZA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura_det`
--
ALTER TABLE `factura_det`
  MODIFY `id_factura_det` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `produccion_cab`
--
ALTER TABLE `produccion_cab`
  MODIFY `COD_REGISTRO` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bovino`
--
ALTER TABLE `bovino`
  ADD CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`COD_RAZA`) REFERENCES `raza` (`COD_RAZA`),
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`COD_ESTABLO`) REFERENCES `establo` (`COD_ESTABLO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
