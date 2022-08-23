-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 09:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prome`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actividad`
--

INSERT INTO `actividad` (`id`, `nombre`, `activo`) VALUES
(1, 'Ropa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `latitud` varchar(500) DEFAULT NULL,
  `longitud` varchar(500) DEFAULT NULL,
  `rubro_id` int(11) DEFAULT NULL,
  `actividad_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `facebook` varchar(2000) DEFAULT NULL,
  `instagram` varchar(500) DEFAULT NULL,
  `web` varchar(500) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cuentadni` int(11) DEFAULT NULL,
  `haceenvios` int(11) DEFAULT NULL,
  `estatus_id` int(11) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `eliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comercio`
--

INSERT INTO `comercio` (`id`, `nombre`, `direccion`, `latitud`, `longitud`, `rubro_id`, `actividad_id`, `municipio_id`, `facebook`, `instagram`, `web`, `whatsapp`, `telefono`, `email`, `cuentadni`, `haceenvios`, `estatus_id`, `activo`, `eliminado`) VALUES
(1, 'Indumentaria Total', 'Av Caseros 1010, Lomas de Zamora', '-34.6045816', '-58.3789308', 1, 1, NULL, 'https://www.facebook.com', '', 'https://www.google.com', '5491112345678', '5491112345678', 'info@indumentaria.com', NULL, NULL, 1, 1, 0),
(2, 'Inversiones Intel', 'Avenida 1 Calle 2', '-34.59586436614112', '-58.38111254936743', 2, 1, 1, NULL, NULL, NULL, '549111111111', NULL, NULL, 1, 1, 1, 1, 0),
(3, 'Panaderia Jose', 'Avenida 2 Cale 4', '-34.598925153899685', '-58.48659083926695', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `estatus`
--

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipoestatus_id` int(11) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `eliminado` int(11) DEFAULT NULL,
  `visibleresultado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estatus`
--

INSERT INTO `estatus` (`id`, `nombre`, `tipoestatus_id`, `activo`, `eliminado`, `visibleresultado`) VALUES
(1, 'Activado', 1, 1, 0, 1),
(2, 'Pendiente de Activar', 1, 1, 0, NULL),
(3, 'Rechazado', 1, 1, 0, NULL),
(4, 'Pendiente de Revision', 2, 1, 0, NULL),
(5, 'Aprobado', 2, 1, 0, NULL),
(6, 'Rechazado', 2, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `documento` varchar(100) DEFAULT NULL,
  `tipoformulario_id` int(11) DEFAULT NULL,
  `mensaje` varchar(4000) DEFAULT NULL,
  `estatus_id` int(11) DEFAULT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `eliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formulario`
--

INSERT INTO `formulario` (`id`, `documento`, `tipoformulario_id`, `mensaje`, `estatus_id`, `fecharegistro`, `activo`, `eliminado`) VALUES
(4, '2323', 3, '4', 0, '2022-08-23 04:19:12', 1, 0),
(5, '2323', 3, '4', 0, '2022-08-23 04:19:51', 1, 0),
(6, '2323', 3, '4', 0, '2022-08-23 04:20:00', 1, 0),
(7, '2323', 3, '4', 0, '2022-08-23 04:20:08', 1, 0),
(8, '1212', 1, '4', 0, '2022-08-23 04:29:16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`id`, `nombre`, `activo`) VALUES
(1, 'Caseros', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rubro`
--

CREATE TABLE `rubro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `icono` varchar(100) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rubro`
--

INSERT INTO `rubro` (`id`, `nombre`, `icono`, `activo`) VALUES
(1, 'Indumentaria y accesorios', 'styler', 1),
(2, 'Inversiones', 'cell_tower', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipoestatus`
--

CREATE TABLE `tipoestatus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipoestatus`
--

INSERT INTO `tipoestatus` (`id`, `nombre`, `activo`) VALUES
(1, 'Estatus del Comercio', 1),
(2, 'Estatus del Formulario', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipoformulario`
--

CREATE TABLE `tipoformulario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipoformulario`
--

INSERT INTO `tipoformulario` (`id`, `nombre`, `activo`) VALUES
(1, 'Alta', 1),
(2, 'Baja', 2),
(3, 'Modificacion', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipoestatus`
--
ALTER TABLE `tipoestatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipoformulario`
--
ALTER TABLE `tipoformulario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rubro`
--
ALTER TABLE `rubro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipoestatus`
--
ALTER TABLE `tipoestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipoformulario`
--
ALTER TABLE `tipoformulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
