-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.25a


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;



-- Definition of table `actividades`
--

DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades` (
  `id_actividad` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_actividad` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aprendizaje` mediumint(8) unsigned NOT NULL,
  `dura_actividad` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_actividad`),
  KEY `fk_aprendizaje_actividad` (`aprendizaje`),
  CONSTRAINT `fk_aprendizaje_actividad` FOREIGN KEY (`aprendizaje`) REFERENCES `aprendizajes` (`id_aprendizaje`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `actividades`
--

/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;


--
-- Definition of table `ambientes`
--

DROP TABLE IF EXISTS `ambientes`;
CREATE TABLE `ambientes` (
  `id_ambiente` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_ambiente` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_ambiente` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_ambiente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ambientes`
--

/*!40000 ALTER TABLE `ambientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `ambientes` ENABLE KEYS */;


--
-- Definition of table `aprendizajes`
--

DROP TABLE IF EXISTS `aprendizajes`;
CREATE TABLE `aprendizajes` (
  `id_aprendizaje` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_aprendizaje` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `capacidad` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id_aprendizaje`),
  KEY `fk_capacidad_aprendizaje` (`capacidad`),
  CONSTRAINT `fk_capacidad_aprendizaje` FOREIGN KEY (`capacidad`) REFERENCES `capacidades` (`id_capacidades`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `aprendizajes`
--

/*!40000 ALTER TABLE `aprendizajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `aprendizajes` ENABLE KEYS */;


--
-- Definition of table `aula`
--

DROP TABLE IF EXISTS `aula`;
CREATE TABLE `aula` (
  `id_aula` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `modulo` smallint(5) unsigned NOT NULL,
  `turno` tinyint(3) unsigned NOT NULL,
  `seccion_aula` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `id_docente` smallint(5) unsigned NOT NULL,
  `id_ambiente` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_aula`),
  UNIQUE KEY `aula_index01` (`modulo`,`turno`,`seccion_aula`),
  KEY `fk_turno_aula` (`turno`),
  CONSTRAINT `fk_modulos_aula` FOREIGN KEY (`modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `aula`
--

/*!40000 ALTER TABLE `aula` DISABLE KEYS */;
/*!40000 ALTER TABLE `aula` ENABLE KEYS */;


--
-- Definition of table `capacidades`
--

DROP TABLE IF EXISTS `capacidades`;
CREATE TABLE `capacidades` (
  `id_capacidades` mediumint(8) unsigned NOT NULL,
  `nombre_capacidad` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `unidad` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id_capacidades`),
  KEY `fk_unidad` (`unidad`),
  CONSTRAINT `fk_unidad` FOREIGN KEY (`unidad`) REFERENCES `unidades` (`id_unidades`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `capacidades`
--

/*!40000 ALTER TABLE `capacidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `capacidades` ENABLE KEYS */;


--
-- Definition of table `cobros`
--

DROP TABLE IF EXISTS `cobros`;
CREATE TABLE `cobros` (
  `num_cobro` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `venta` int(10) unsigned NOT NULL,
  `fecha_cobro` datetime NOT NULL,
  `monto_cobro` decimal(6,2) unsigned NOT NULL,
  `id_cobro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_cobro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `cobros`
--

/*!40000 ALTER TABLE `cobros` DISABLE KEYS */;
/*!40000 ALTER TABLE `cobros` ENABLE KEYS */;


--
-- Definition of table `conceptuales`
--

DROP TABLE IF EXISTS `conceptuales`;
CREATE TABLE `conceptuales` (
  `id_conceptual` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_conceptual` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aprendizaje` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id_conceptual`),
  KEY `fk_aprendizaje` (`aprendizaje`),
  CONSTRAINT `fk_aprendizaje` FOREIGN KEY (`aprendizaje`) REFERENCES `aprendizajes` (`id_aprendizaje`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `conceptuales`
--

/*!40000 ALTER TABLE `conceptuales` DISABLE KEYS */;
/*!40000 ALTER TABLE `conceptuales` ENABLE KEYS */;


--
-- Definition of table `criterios`
--

DROP TABLE IF EXISTS `criterios`;
CREATE TABLE `criterios` (
  `id_criterio` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_criterio` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `capacidades` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id_criterio`),
  KEY `foreign_key01` (`capacidades`),
  CONSTRAINT `criterios_ibfk_1` FOREIGN KEY (`capacidades`) REFERENCES `capacidades` (`id_capacidades`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `criterios`
--

/*!40000 ALTER TABLE `criterios` DISABLE KEYS */;
/*!40000 ALTER TABLE `criterios` ENABLE KEYS */;


--
-- Definition of table `cuenta_egresos`
--

DROP TABLE IF EXISTS `cuenta_egresos`;
CREATE TABLE `cuenta_egresos` (
  `id_cuenta_egreso` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_cuenta_egreso` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cuenta_egreso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `cuenta_egresos`
--

/*!40000 ALTER TABLE `cuenta_egresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuenta_egresos` ENABLE KEYS */;


--
-- Definition of table `detalle_egresos`
--

DROP TABLE IF EXISTS `detalle_egresos`;
CREATE TABLE `detalle_egresos` (
  `id_detalle_egreso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cuenta_egreso` smallint(5) unsigned NOT NULL,
  `monto_detalle_egreso` decimal(7,2) unsigned NOT NULL,
  `producto_detalle_egreso` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cant_detalle_egreso` tinyint(3) unsigned NOT NULL,
  `preuni_detalle_egreso` decimal(6,2) unsigned NOT NULL,
  `egreso` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_detalle_egreso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `detalle_egresos`
--

/*!40000 ALTER TABLE `detalle_egresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_egresos` ENABLE KEYS */;


--
-- Definition of table `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
CREATE TABLE `detalle_ventas` (
  `producto_detalle_venta` tinyint(3) unsigned NOT NULL,
  `valor_detalle_venta` decimal(6,2) unsigned NOT NULL,
  `cant_detalle_venta` tinyint(3) unsigned DEFAULT NULL,
  `preuni_detalle_venta` decimal(6,2) unsigned DEFAULT NULL,
  `id_detalle_venta` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `venta_modulo` int(10) unsigned NOT NULL,
  `aula` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id_detalle_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `detalle_ventas`
--

/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;


--
-- Definition of table `egresos`
--

DROP TABLE IF EXISTS `egresos`;
CREATE TABLE `egresos` (
  `id_egreso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_egreso` datetime NOT NULL,
  `proveedor` smallint(5) unsigned NOT NULL,
  `total_egreso` decimal(7,2) unsigned NOT NULL,
  PRIMARY KEY (`id_egreso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `egresos`
--

/*!40000 ALTER TABLE `egresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `egresos` ENABLE KEYS */;


--
-- Definition of table `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE `estudiantes` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `role` tinyint(3) unsigned DEFAULT NULL,
  `estado` tinyint(3) unsigned DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `codigo` bigint(20) unsigned DEFAULT NULL,
  `ape_pat` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ape_mat` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fech_nac` date DEFAULT NULL,
  `tipo_doc` tinyint(3) unsigned DEFAULT NULL,
  `num_doc` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais` smallint(5) unsigned DEFAULT NULL,
  `departamento` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `provincia` char(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `distrito` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lugar` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `domicilio` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `est_civil` tinyint(3) unsigned DEFAULT NULL,
  `especialidad` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `trabaja` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `estudiantes`
--

/*!40000 ALTER TABLE `estudiantes` DISABLE KEYS */;
INSERT INTO `estudiantes` (`id`,`nombre`,`usuario`,`pass`,`email`,`role`,`estado`,`fecha`,`codigo`,`ape_pat`,`ape_mat`,`sexo`,`fech_nac`,`tipo_doc`,`num_doc`,`pais`,`departamento`,`provincia`,`distrito`,`lugar`,`telefono`,`celular`,`domicilio`,`est_civil`,`especialidad`,`trabaja`) VALUES 
 (3,'fernando','nando','d1b254c9620425f582e27f0044be34bee087d8b4','nando@hotmail.com',2,1,'2013-01-15 01:14:09',1545740749,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (4,'Carmen','carmin','d1b254c9620425f582e27f0044be34bee087d8b4','carmin@hotmail.com',2,1,'2013-01-15 23:20:33',1455699799,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (5,'pulpito','saltado','d1b254c9620425f582e27f0044be34bee087d8b4','saltado@hotmail.com',2,1,'2013-01-16 00:13:54',1612953136,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (6,'Angie','eigna','d1b254c9620425f582e27f0044be34bee087d8b4','eigna@hotmail.com',2,1,'2013-01-19 11:06:25',1628380607,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (7,'Rafael','rafaelillo','d1b254c9620425f582e27f0044be34bee087d8b4','enkee@hotmail.com',5,NULL,'2013-01-19 11:06:25',1628380607,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `estudiantes` ENABLE KEYS */;


--
-- Definition of table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id_horario` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `turno` tinyint(3) unsigned NOT NULL,
  `texto_horario` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `horas_semana` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `horarios`
--

/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;


--
-- Definition of table `id_mueble_detalle`
--

DROP TABLE IF EXISTS `id_mueble_detalle`;
CREATE TABLE `id_mueble_detalle` (
  `id_mueble` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_mueble` int(11) DEFAULT NULL,
  `ambiente` tinyint(3) unsigned DEFAULT NULL,
  `tipo_mueble` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id_mueble`),
  KEY `fk_ambiente` (`ambiente`),
  CONSTRAINT `fk_ambiente` FOREIGN KEY (`ambiente`) REFERENCES `ambientes` (`id_ambiente`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `id_mueble_detalle`
--

/*!40000 ALTER TABLE `id_mueble_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `id_mueble_detalle` ENABLE KEYS */;


--
-- Definition of table `indicadores`
--

DROP TABLE IF EXISTS `indicadores`;
CREATE TABLE `indicadores` (
  `id_indicador` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_indicador` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `actividad` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id_indicador`),
  KEY `fk_actividad_indicador` (`actividad`),
  CONSTRAINT `fk_actividad_indicador` FOREIGN KEY (`actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `indicadores`
--

/*!40000 ALTER TABLE `indicadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicadores` ENABLE KEYS */;


--
-- Definition of table `matricula`
--

DROP TABLE IF EXISTS `matricula`;
CREATE TABLE `matricula` (
  `id_matricula` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fech_matricula` datetime NOT NULL,
  `periodo` tinyint(4) NOT NULL,
  `aula` mediumint(8) unsigned NOT NULL,
  `estudiante` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id_matricula`),
  KEY `fk_aula_matricula` (`aula`),
  KEY `fk_estudiante_matricula` (`estudiante`),
  CONSTRAINT `estudiante_matricula` FOREIGN KEY (`estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_aula_matricula` FOREIGN KEY (`aula`) REFERENCES `aula` (`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `matricula`
--

/*!40000 ALTER TABLE `matricula` DISABLE KEYS */;
/*!40000 ALTER TABLE `matricula` ENABLE KEYS */;


--
-- Definition of table `matricula_criterio`
--

DROP TABLE IF EXISTS `matricula_criterio`;
CREATE TABLE `matricula_criterio` (
  `matricula` int(10) unsigned NOT NULL,
  `criterio` mediumint(8) unsigned NOT NULL,
  `nota` tinyint(3) unsigned NOT NULL,
  UNIQUE KEY `matricula_criterio_index01` (`matricula`,`criterio`),
  KEY `fk_criterio_matricula` (`criterio`),
  CONSTRAINT `fk_criterio_matricula` FOREIGN KEY (`criterio`) REFERENCES `criterios` (`id_criterio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_matricula_criterio` FOREIGN KEY (`matricula`) REFERENCES `matricula` (`id_matricula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `matricula_criterio`
--

/*!40000 ALTER TABLE `matricula_criterio` DISABLE KEYS */;
/*!40000 ALTER TABLE `matricula_criterio` ENABLE KEYS */;


--
-- Definition of table `matricula_indicadores`
--

DROP TABLE IF EXISTS `matricula_indicadores`;
CREATE TABLE `matricula_indicadores` (
  `matricula` int(10) unsigned NOT NULL,
  `indicador` mediumint(8) unsigned DEFAULT NULL,
  `nota` tinyint(3) unsigned NOT NULL,
  UNIQUE KEY `matricula_indicadores_index01` (`matricula`,`indicador`),
  KEY `fk_indicador` (`indicador`),
  CONSTRAINT `fk_indicador` FOREIGN KEY (`indicador`) REFERENCES `indicadores` (`id_indicador`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_matricula_indicador` FOREIGN KEY (`matricula`) REFERENCES `matricula` (`id_matricula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `matricula_indicadores`
--

/*!40000 ALTER TABLE `matricula_indicadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `matricula_indicadores` ENABLE KEYS */;


--
-- Definition of table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos` (
  `id_modulo` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `especialildad` tinyint(3) unsigned NOT NULL,
  `nivel` tinyint(3) unsigned NOT NULL,
  `nombre_modulo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dura_modulo` tinyint(3) unsigned DEFAULT NULL,
  `periodo` tinyint(3) unsigned NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `modulos`
--

/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;


--
-- Definition of table `mueble_clase`
--

DROP TABLE IF EXISTS `mueble_clase`;
CREATE TABLE `mueble_clase` (
  `id_clase_mueble` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_clase_mueble` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_clase_mueble`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mueble_clase`
--

/*!40000 ALTER TABLE `mueble_clase` DISABLE KEYS */;
/*!40000 ALTER TABLE `mueble_clase` ENABLE KEYS */;


--
-- Definition of table `mueble_tipo`
--

DROP TABLE IF EXISTS `mueble_tipo`;
CREATE TABLE `mueble_tipo` (
  `id_mueble_tipo` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_mueble_tipo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `mueble_clase` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id_mueble_tipo`),
  KEY `fk_mueble_clase` (`mueble_clase`),
  CONSTRAINT `fk_mueble_clase` FOREIGN KEY (`mueble_clase`) REFERENCES `mueble_clase` (`id_clase_mueble`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `mueble_tipo`
--

/*!40000 ALTER TABLE `mueble_tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `mueble_tipo` ENABLE KEYS */;


--
-- Definition of table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE `pagos` (
  `num_pago` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `egreso` int(10) unsigned NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `id_pago` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `monto_pago` decimal(6,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `pagos`
--

/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;


--
-- Definition of table `procedimentales`
--

DROP TABLE IF EXISTS `procedimentales`;
CREATE TABLE `procedimentales` (
  `nombre_procedimental` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aprendizaje` mediumint(8) unsigned NOT NULL,
  `id_procedimental` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_procedimental`),
  KEY `foreign_key01` (`aprendizaje`),
  CONSTRAINT `fk_aprendizaje_actitudinal` FOREIGN KEY (`aprendizaje`) REFERENCES `aprendizajes` (`id_aprendizaje`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `procedimentales_ibfk_1` FOREIGN KEY (`aprendizaje`) REFERENCES `aprendizajes` (`id_aprendizaje`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `procedimentales`
--

/*!40000 ALTER TABLE `procedimentales` DISABLE KEYS */;
/*!40000 ALTER TABLE `procedimentales` ENABLE KEYS */;


--
-- Definition of table `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `nombre_producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `productos`
--

/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


--
-- Definition of table `secuencias`
--

DROP TABLE IF EXISTS `secuencias`;
CREATE TABLE `secuencias` (
  `id_secuencias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_secuencia` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `actividad` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id_secuencias`),
  KEY `fk_actividad_secuencia` (`actividad`),
  CONSTRAINT `fk_actividad_secuencia` FOREIGN KEY (`actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `secuencias`
--

/*!40000 ALTER TABLE `secuencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `secuencias` ENABLE KEYS */;


--
-- Definition of table `unidades`
--

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE `unidades` (
  `id_unidades` smallint(5) unsigned NOT NULL,
  `nombre_unidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `modulo` smallint(5) unsigned NOT NULL,
  `dura_unidad` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_unidades`),
  KEY `unidades_ibfk_1` (`modulo`),
  CONSTRAINT `unidades_ibfk_1` FOREIGN KEY (`modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `unidades`
--

/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;


--
-- Definition of table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` tinyint(3) unsigned DEFAULT NULL,
  `estado` tinyint(3) unsigned DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `codigo` int(10) unsigned DEFAULT NULL,
  `ape_pat` varchar(20) DEFAULT NULL,
  `ape_mat` varchar(20) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `fech_nac` date DEFAULT NULL,
  `tipo_doc` tinyint(3) unsigned DEFAULT NULL,
  `num_doc` varchar(20) DEFAULT NULL,
  `pais` smallint(5) unsigned DEFAULT NULL,
  `departamento` char(2) DEFAULT NULL,
  `provincia` char(4) DEFAULT NULL,
  `distrito` varchar(6) DEFAULT NULL,
  `lugar` varchar(40) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `domicilio` int(40) DEFAULT NULL,
  `est_civil` tinyint(3) unsigned DEFAULT NULL,
  `especialidad` varchar(20) DEFAULT NULL,
  `trabaja` tinyint(1) DEFAULT NULL,
  `cetpro` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`,`nombre`,`usuario`,`pass`,`email`,`role`,`estado`,`fecha`,`codigo`,`ape_pat`,`ape_mat`,`sexo`,`fech_nac`,`tipo_doc`,`num_doc`,`pais`,`departamento`,`provincia`,`distrito`,`lugar`,`telefono`,`celular`,`domicilio`,`est_civil`,`especialidad`,`trabaja`,`cetpro`) VALUES 
 (1,'Carlota','libia','d1b254c9620425f582e27f0044be34bee087d8b4','admin@admin.adm',5,1,'0321-12-20 20:53:07',1963007335,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
 (2,'Maricruza','quina','d1b254c9620425f582e27f0044be34bee087d8b4','mmiguel1414@hotmail.com',4,1,'0321-12-20 20:53:07',1963007335,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
 (3,'Liliana','lula','d1b254c9620425f582e27f0044be34bee087d8b4','tula@hotmail.com',2,1,'0321-12-20 20:53:07',1963007335,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
 (4,'Rosa','rosy','d1b254c9620425f582e27f0044be34bee087d8b4','isabel@hotmail.com',1,1,'0321-12-20 20:53:07',1963007335,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),
 (5,'Manuelito','manue','d1b254c9620425f582e27f0044be34bee087d8b4','beato@hotmail.com',3,1,'0321-12-20 20:53:07',1963007335,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


--
-- Definition of table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `fecha_venta` datetime NOT NULL,
  `cliente` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `total_venta` decimal(7,2) unsigned DEFAULT NULL,
  `id_venta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ventas`
--

/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
