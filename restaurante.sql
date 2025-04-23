-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 13, 2020 at 11:11 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--

-- --------------------------------------------------------

--
-- Table structure for table `BEBIDA`
--

CREATE TABLE `BEBIDA` (
  `idBEBIDA` int(11) NOT NULL,
  `nombre_bebida` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BEBIDA`
--

INSERT INTO `BEBIDA` (`idBEBIDA`, `nombre_bebida`) VALUES
(123, 'Gaseosa'),
(321, 'Cerveza');

-- --------------------------------------------------------

--
-- Table structure for table `caja`
--

CREATE TABLE `caja` (
  `idCaja` int(11) NOT NULL,
  `fecha_caja` datetime NOT NULL,
  `monto_inicial` int(11) NOT NULL,
  `monto_final` int(11) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `USUARIO_idusuario` varchar(255) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `caja`
--

INSERT INTO `caja` (`idCaja`, `fecha_caja`, `monto_inicial`, `monto_final`, `observacion`, `USUARIO_idusuario`, `estado`) VALUES
(1, '2020-03-31 10:03:36', 50000, NULL, 'Primera apertura a ver', '3', 'CERRADA'),
(2, '2020-03-31 10:03:06', 25000, 150000, 'Otra de pruebas', '3', 'CERRADA'),
(3, '2020-04-02 05:04:24', 50000, 335000, 'Se inicia caja a las 12 del medio dia', '3', 'ABIERTA');

-- --------------------------------------------------------

--
-- Table structure for table `DETALLE_DE_COMANDAS`
--

CREATE TABLE `DETALLE_DE_COMANDAS` (
  `MENU_idMENU` int(11) NOT NULL,
  `PEDIDOS_Idpedidos` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `valor_unitario` int(11) DEFAULT '0',
  `cantidad` int(11) DEFAULT '0',
  `despachado` varchar(11) DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DETALLE_DE_COMANDAS`
--

INSERT INTO `DETALLE_DE_COMANDAS` (`MENU_idMENU`, `PEDIDOS_Idpedidos`, `descripcion`, `valor_unitario`, `cantidad`, `despachado`) VALUES
(123, 4, 'Sopa del día - Gaseosa - Arroz con pollo - Brevas con Arequipo', 50000, 4, 'SI'),
(123, 5, 'Sopa del día - Gaseosa - Arroz con pollo - Brevas con Arequipo', 50000, 5, 'SI'),
(123, 6, 'Sopa del día - Gaseosa - Arroz con pollo - Brevas con Arequipo', 50000, 3, 'SI'),
(123, 7, 'Sopa del día - Gaseosa - Arroz con pollo - Brevas con Arequipo', 55000, 5, 'SI'),
(123, 8, 'Sopa del día - Gaseosa - Arroz con pollo - Brevas con Arequipo', 55000, 2, 'SI'),
(321, 7, 'Sopa del día - Cerveza - Arroz con pollo - Brevas con Arequipo', 60000, 1, 'SI'),
(555, 8, '555 - Sopa del día - Gaseosa - Arroz con pollo - Brevas con Arequipo', 55000, 3, 'SI');

-- --------------------------------------------------------

--
-- Table structure for table `ENTRADA`
--

CREATE TABLE `ENTRADA` (
  `idsopa` int(11) NOT NULL,
  `nombre_entrada` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ENTRADA`
--

INSERT INTO `ENTRADA` (`idsopa`, `nombre_entrada`) VALUES
(321, 'Sopa del día');

-- --------------------------------------------------------

--
-- Table structure for table `FACTURA`
--

CREATE TABLE `FACTURA` (
  `idFACTURA` int(11) NOT NULL,
  `MESA_numero_de_mesa` int(11) NOT NULL,
  `PEDIDOS_Idpedidos` int(11) NOT NULL,
  `valor_unitario` int(20) DEFAULT NULL,
  `valor_total` int(20) DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `estado_factura` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FACTURA`
--

INSERT INTO `FACTURA` (`idFACTURA`, `MESA_numero_de_mesa`, `PEDIDOS_Idpedidos`, `valor_unitario`, `valor_total`, `fecha_factura`, `estado_factura`) VALUES
(5, 1, 5, NULL, 250000, '2020-03-31', 'FACTURADA'),
(6, 1, 6, NULL, 150000, '2020-03-31', 'FACTURADA'),
(7, 1, 7, NULL, 335000, '2020-04-02', 'FACTURADA');

-- --------------------------------------------------------

--
-- Table structure for table `INSUMOS`
--

CREATE TABLE `INSUMOS` (
  `idINSUMOS` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `precio` int(20) DEFAULT NULL,
  `unidad_de_medida` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `INSUMOS_has_PERSONA`
--

CREATE TABLE `INSUMOS_has_PERSONA` (
  `INSUMOS_idINSUMOS` int(11) NOT NULL,
  `PERSONA_cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `MENU`
--

CREATE TABLE `MENU` (
  `idMENU` int(11) NOT NULL,
  `ENTRADA_idsopa` int(11) NOT NULL,
  `POSTRE_idpostre` int(11) NOT NULL,
  `BEBIDA_idBEBIDA` int(11) NOT NULL,
  `PLATO_FUERTE_idPLATO_FUERTE` int(11) NOT NULL,
  `valor_menu` int(20) DEFAULT NULL,
  `estado_menu` varchar(20) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `cantidad_disponible` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MENU`
--

INSERT INTO `MENU` (`idMENU`, `ENTRADA_idsopa`, `POSTRE_idpostre`, `BEBIDA_idBEBIDA`, `PLATO_FUERTE_idPLATO_FUERTE`, `valor_menu`, `estado_menu`, `nombre`, `cantidad_disponible`) VALUES
(123, 321, 321, 123, 12, 55000, 'Agotado', '123 - Sopa del día - Gaseosa - Arroz con pollo - Brevas con Arequipo', 0),
(321, 321, 321, 321, 12, 60000, 'Disponible', '321 - Sopa del día - Cerveza - Arroz con pollo - Brevas con Arequipo', 1),
(555, 321, 321, 123, 12, 55000, 'Disponible', '555 - Sopa del día - Gaseosa - Arroz con pollo - Brevas con Arequipo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `MESA`
--

CREATE TABLE `MESA` (
  `numero_de_mesa` int(11) NOT NULL,
  `ubicacion` varchar(20) DEFAULT NULL,
  `numero_de_puestos` int(20) DEFAULT NULL,
  `estado_de_mesa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MESA`
--

INSERT INTO `MESA` (`numero_de_mesa`, `ubicacion`, `numero_de_puestos`, `estado_de_mesa`) VALUES
(1, NULL, 4, 'OCUPADA');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1585416563),
('m200328_173922_create_new_user_table', 1585417302),
('m200328_174130_create_user_table', 1585417302);

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `Idpedidos` int(11) NOT NULL,
  `MESA_numero_de_mesa` int(11) NOT NULL,
  `hora_comanda` time DEFAULT NULL,
  `fecha_comanda` date DEFAULT NULL,
  `estado_comanda` varchar(20) DEFAULT NULL,
  `PERSONA_cedula` int(11) DEFAULT NULL,
  `USUARIO_usuarioId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`Idpedidos`, `MESA_numero_de_mesa`, `hora_comanda`, `fecha_comanda`, `estado_comanda`, `PERSONA_cedula`, `USUARIO_usuarioId`) VALUES
(4, 1, '01:03:19', '2020-03-29', 'FACTURADA', NULL, '1'),
(5, 1, '22:03:42', '2020-03-30', 'FACTURADA', NULL, '2'),
(6, 1, '23:03:21', '2020-03-31', 'FACTURADA', NULL, '2'),
(7, 1, '17:04:51', '2020-04-02', 'FACTURADA', NULL, '2'),
(8, 1, '00:04:34', '2020-04-05', 'ENTREGADA', NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `PERSONA`
--

CREATE TABLE `PERSONA` (
  `cedula` int(11) NOT NULL,
  `TIPO_PERSONA_idTIPO_PERSONA` int(11) NOT NULL,
  `primer_nombre` varchar(20) DEFAULT NULL,
  `segundo_nombre` varchar(20) DEFAULT NULL,
  `primer_apellido` varchar(20) DEFAULT NULL,
  `segundo_apellido` varchar(20) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `estado_persona` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PLATO_FUERTE`
--

CREATE TABLE `PLATO_FUERTE` (
  `idPLATO_FUERTE` int(11) NOT NULL,
  `nombre_plato_fuerte` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PLATO_FUERTE`
--

INSERT INTO `PLATO_FUERTE` (`idPLATO_FUERTE`, `nombre_plato_fuerte`) VALUES
(12, 'Arroz con pollo');

-- --------------------------------------------------------

--
-- Table structure for table `POSTRE`
--

CREATE TABLE `POSTRE` (
  `idPOSTRE` int(11) NOT NULL,
  `nombre_postre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `POSTRE`
--

INSERT INTO `POSTRE` (`idPOSTRE`, `nombre_postre`) VALUES
(321, 'Brevas con Arequipo');

-- --------------------------------------------------------

--
-- Table structure for table `RESERVA`
--

CREATE TABLE `RESERVA` (
  `idRESERVA` int(11) NOT NULL,
  `SUCURSAL_idSUCURSAL` int(11) NOT NULL,
  `PERSONA_cedula` int(11) NOT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `hora_reserva` time DEFAULT NULL,
  `estado_reserva` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `RESERVA_has_MESA`
--

CREATE TABLE `RESERVA_has_MESA` (
  `MESA_numero_de_mesa` int(11) NOT NULL,
  `RESERVA_idRESERVA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SUCURSAL`
--

CREATE TABLE `SUCURSAL` (
  `idSUCURSAL` int(11) NOT NULL,
  `nombre_Sucursal` varchar(20) DEFAULT NULL,
  `ciudad_Sucursal` varchar(20) DEFAULT NULL,
  `direccion_Sucursal` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TIPO_PERSONA`
--

CREATE TABLE `TIPO_PERSONA` (
  `idTIPO_PERSONA` int(11) NOT NULL,
  `nombre_tipo_persona` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `nombre_tipo_usuario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipoUsuario`, `nombre_tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Cajero'),
(3, 'Mesero'),
(4, 'Chef');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`, `status`) VALUES
(101, 'admin', NULL, 'admin', 'testadminkey', 'admin-token', 10),
(102, 'mesero', NULL, '1234', 'testmeserokey', 'mesero-token', 10),
(103, 'cajero', NULL, '1234', 'testcajerokey', 'cajero-token', 10),
(104, 'chef', NULL, '1234', 'testchefkey', 'chef-token', 10);

-- --------------------------------------------------------

--
-- Table structure for table `USUARIO`
--

CREATE TABLE `USUARIO` (
  `idusuario` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `tipo_usuario_idperfil` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USUARIO`
--

INSERT INTO `USUARIO` (`idusuario`, `nombre`, `apellido`, `tipo_usuario_idperfil`, `user_id`) VALUES
('1', 'el', 'Administrador', 1, 101),
('2', 'el ', 'mesero', 3, 102),
('3', 'el', 'cajero', 2, 103),
('4', 'el', 'chef', 4, 104);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BEBIDA`
--
ALTER TABLE `BEBIDA`
  ADD PRIMARY KEY (`idBEBIDA`);

--
-- Indexes for table `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`idCaja`),
  ADD KEY `caja_usuario_fk` (`USUARIO_idusuario`);

--
-- Indexes for table `DETALLE_DE_COMANDAS`
--
ALTER TABLE `DETALLE_DE_COMANDAS`
  ADD PRIMARY KEY (`MENU_idMENU`,`PEDIDOS_Idpedidos`),
  ADD KEY `fk_PEDIDOS_Idpedidos` (`PEDIDOS_Idpedidos`);

--
-- Indexes for table `ENTRADA`
--
ALTER TABLE `ENTRADA`
  ADD PRIMARY KEY (`idsopa`);

--
-- Indexes for table `FACTURA`
--
ALTER TABLE `FACTURA`
  ADD PRIMARY KEY (`idFACTURA`,`MESA_numero_de_mesa`),
  ADD KEY `MESA_numero_de_mesa` (`MESA_numero_de_mesa`),
  ADD KEY `fk_PEDIDOS_Idpedidos_FACTURA` (`PEDIDOS_Idpedidos`);

--
-- Indexes for table `INSUMOS`
--
ALTER TABLE `INSUMOS`
  ADD PRIMARY KEY (`idINSUMOS`);

--
-- Indexes for table `INSUMOS_has_PERSONA`
--
ALTER TABLE `INSUMOS_has_PERSONA`
  ADD PRIMARY KEY (`INSUMOS_idINSUMOS`,`PERSONA_cedula`),
  ADD KEY `PERSONA_cedula` (`PERSONA_cedula`);

--
-- Indexes for table `MENU`
--
ALTER TABLE `MENU`
  ADD PRIMARY KEY (`idMENU`),
  ADD KEY `POSTRE_idpostre` (`POSTRE_idpostre`),
  ADD KEY `PLATO_FUERTE_idPLATO_FUERTE` (`PLATO_FUERTE_idPLATO_FUERTE`),
  ADD KEY `BEBIDA_idBEBIDA` (`BEBIDA_idBEBIDA`),
  ADD KEY `ENTRADA_idsopa` (`ENTRADA_idsopa`);

--
-- Indexes for table `MESA`
--
ALTER TABLE `MESA`
  ADD PRIMARY KEY (`numero_de_mesa`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Idpedidos`),
  ADD KEY `MESA_numero_de_mesa` (`MESA_numero_de_mesa`),
  ADD KEY `fk_PERSONA_cedula` (`PERSONA_cedula`),
  ADD KEY `fk_pedidos_USUARIO_usuarioId` (`USUARIO_usuarioId`);

--
-- Indexes for table `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `TIPO_PERSONA_idTIPO_PERSONA` (`TIPO_PERSONA_idTIPO_PERSONA`);

--
-- Indexes for table `PLATO_FUERTE`
--
ALTER TABLE `PLATO_FUERTE`
  ADD PRIMARY KEY (`idPLATO_FUERTE`);

--
-- Indexes for table `POSTRE`
--
ALTER TABLE `POSTRE`
  ADD PRIMARY KEY (`idPOSTRE`);

--
-- Indexes for table `RESERVA`
--
ALTER TABLE `RESERVA`
  ADD PRIMARY KEY (`idRESERVA`),
  ADD KEY `PERSONA_cedula` (`PERSONA_cedula`),
  ADD KEY `SUCURSAL_idSUCURSAL` (`SUCURSAL_idSUCURSAL`);

--
-- Indexes for table `RESERVA_has_MESA`
--
ALTER TABLE `RESERVA_has_MESA`
  ADD PRIMARY KEY (`MESA_numero_de_mesa`,`RESERVA_idRESERVA`),
  ADD KEY `RESERVA_idRESERVA` (`RESERVA_idRESERVA`);

--
-- Indexes for table `SUCURSAL`
--
ALTER TABLE `SUCURSAL`
  ADD PRIMARY KEY (`idSUCURSAL`);

--
-- Indexes for table `TIPO_PERSONA`
--
ALTER TABLE `TIPO_PERSONA`
  ADD PRIMARY KEY (`idTIPO_PERSONA`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `FK_tipo_usuario_idperfil` (`tipo_usuario_idperfil`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caja`
--
ALTER TABLE `caja`
  MODIFY `idCaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Idpedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `caja_usuario_fk` FOREIGN KEY (`USUARIO_idusuario`) REFERENCES `USUARIO` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `DETALLE_DE_COMANDAS`
--
ALTER TABLE `DETALLE_DE_COMANDAS`
  ADD CONSTRAINT `detalle_de_comandas_ibfk_2` FOREIGN KEY (`MENU_idMENU`) REFERENCES `MENU` (`idMENU`),
  ADD CONSTRAINT `fk_PEDIDOS_Idpedidos` FOREIGN KEY (`PEDIDOS_Idpedidos`) REFERENCES `PEDIDOS` (`Idpedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `FACTURA`
--
ALTER TABLE `FACTURA`
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`MESA_numero_de_mesa`) REFERENCES `MESA` (`numero_de_mesa`),
  ADD CONSTRAINT `fk_PEDIDOS_Idpedidos_FACTURA` FOREIGN KEY (`PEDIDOS_Idpedidos`) REFERENCES `PEDIDOS` (`Idpedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `INSUMOS_has_PERSONA`
--
ALTER TABLE `INSUMOS_has_PERSONA`
  ADD CONSTRAINT `insumos_has_persona_ibfk_1` FOREIGN KEY (`INSUMOS_idINSUMOS`) REFERENCES `INSUMOS` (`idINSUMOS`),
  ADD CONSTRAINT `insumos_has_persona_ibfk_2` FOREIGN KEY (`PERSONA_cedula`) REFERENCES `PERSONA` (`cedula`);

--
-- Constraints for table `MENU`
--
ALTER TABLE `MENU`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`POSTRE_idpostre`) REFERENCES `POSTRE` (`idPOSTRE`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`PLATO_FUERTE_idPLATO_FUERTE`) REFERENCES `PLATO_FUERTE` (`idPLATO_FUERTE`),
  ADD CONSTRAINT `menu_ibfk_3` FOREIGN KEY (`BEBIDA_idBEBIDA`) REFERENCES `BEBIDA` (`idBEBIDA`),
  ADD CONSTRAINT `menu_ibfk_4` FOREIGN KEY (`ENTRADA_idsopa`) REFERENCES `ENTRADA` (`idsopa`);

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_PERSONA_cedula` FOREIGN KEY (`PERSONA_cedula`) REFERENCES `PERSONA` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_USUARIO_usuarioId` FOREIGN KEY (`USUARIO_usuarioId`) REFERENCES `USUARIO` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`MESA_numero_de_mesa`) REFERENCES `MESA` (`numero_de_mesa`);

--
-- Constraints for table `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`TIPO_PERSONA_idTIPO_PERSONA`) REFERENCES `TIPO_PERSONA` (`idTIPO_PERSONA`);

--
-- Constraints for table `RESERVA`
--
ALTER TABLE `RESERVA`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`PERSONA_cedula`) REFERENCES `PERSONA` (`cedula`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`SUCURSAL_idSUCURSAL`) REFERENCES `SUCURSAL` (`idSUCURSAL`);

--
-- Constraints for table `RESERVA_has_MESA`
--
ALTER TABLE `RESERVA_has_MESA`
  ADD CONSTRAINT `reserva_has_mesa_ibfk_1` FOREIGN KEY (`RESERVA_idRESERVA`) REFERENCES `RESERVA` (`idRESERVA`),
  ADD CONSTRAINT `reserva_has_mesa_ibfk_2` FOREIGN KEY (`MESA_numero_de_mesa`) REFERENCES `MESA` (`numero_de_mesa`);

--
-- Constraints for table `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD CONSTRAINT `FK_tipo_usuario_idperfil` FOREIGN KEY (`tipo_usuario_idperfil`) REFERENCES `tipo_usuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
