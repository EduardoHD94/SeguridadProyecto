-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2016 at 06:31 
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ETSEIT`
--

-- --------------------------------------------------------

--
-- Table structure for table `Aerolinea`
--

CREATE TABLE `Aerolinea` (
  `idAerolinea` int(11) NOT NULL,
  `NombreAerolinea` varchar(45) NOT NULL,
  `Imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Aerolinea`
--

INSERT INTO `Aerolinea` (`idAerolinea`, `NombreAerolinea`, `Imagen`) VALUES
(1, 'Aeromar', 'http://www.aeromar.com.mx/nosotros/flota/images/ATR72600_2.jpg'),
(2, 'Aeromexico', 'http://media.despegar.com/davinci/logo/airline/300x105/aeromexico.jpg'),
(3, 'Aeromexico Connect', 'http://aeromexico.com/export/sites/default/.galleries/conocenos/connect.jpg'),
(4, 'Interjet', 'http://f.tqn.com/y/gomexico/1/S/3/R/-/-/interjet_logo.PNG'),
(5, 'Magnicharters', 'http://media.despegar.com/davinci/logo/airline/300x105/magnicharters.jpg'),
(6, 'TAR', 'https://d2kj8gm5lnscm1.cloudfront.net/img-int/TAR-logo.jpg'),
(7, 'VivaAerobus', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwf6u8Ftzf9Qn_He27S6D4KdaLxpjpNWxHr7I1xGMmc2Rpgqg5'),
(8, 'Volaris', 'http://debybeard.com/wp-content/uploads/2015/11/volaris-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `AeroLineaPuerto`
--

CREATE TABLE `AeroLineaPuerto` (
  `idAerolineapuerto` int(11) NOT NULL,
  `idAerolinea` int(11) NOT NULL,
  `idAeropuerto` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AeroLineaPuerto`
--

INSERT INTO `AeroLineaPuerto` (`idAerolineapuerto`, `idAerolinea`, `idAeropuerto`, `Precio`, `Stock`) VALUES
(1, 1, 1, 2223, 100),
(2, 2, 1, 2441, 39),
(3, 3, 1, 2300, 56),
(4, 4, 1, 1899, 23),
(5, 5, 1, 2100, 82),
(6, 6, 1, 1723, 122),
(7, 7, 1, 2500, 46),
(8, 1, 2, 2399, 65),
(9, 2, 2, 1099, 83),
(10, 3, 2, 1599, 12),
(11, 4, 2, 1899, 73),
(12, 5, 2, 1723, 33),
(13, 1, 3, 1549, 44),
(14, 3, 3, 1899, 88),
(15, 5, 3, 1549, 99),
(16, 7, 3, 1699, 72),
(17, 8, 5, 2100, 20),
(18, 1, 5, 1999, 12),
(19, 2, 5, 2099, 44),
(20, 1, 6, 1755, 32),
(21, 7, 5, 1800, 65),
(22, 4, 6, 1999, 88),
(23, 5, 6, 2500, 72),
(24, 7, 6, 999, 2),
(25, 2, 6, 1688, 34),
(26, 1, 6, 3199, 99),
(27, 3, 7, 1250, 15),
(28, 1, 7, 1823, 25),
(29, 6, 7, 2299, 35),
(30, 8, 7, 1999, 100),
(31, 7, 7, 1238, 19),
(32, 4, 8, 1622, 83),
(33, 8, 8, 2399, 81),
(34, 1, 9, 999, 0),
(35, 2, 9, 3199, 100),
(36, 4, 9, 1234, 64),
(37, 5, 9, 1723, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Aeropuerto`
--

CREATE TABLE `Aeropuerto` (
  `idAeropuerto` int(11) NOT NULL,
  `NombreAeropuerto` varchar(80) DEFAULT NULL,
  `idTasa` int(11) DEFAULT NULL,
  `idCategoria` int(10) DEFAULT NULL,
  `idCiudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Aeropuerto`
--

INSERT INTO `Aeropuerto` (`idAeropuerto`, `NombreAeropuerto`, `idTasa`, `idCategoria`, `idCiudad`) VALUES
(1, 'Aeropuerto Internacional General Juan N. Álvarez', 1, 1, 1),
(2, 'Aeropuerto Internacional General José María Yáñez', 2, 2, 3),
(3, 'Aeropuerto Internacional Licenciado Gustavo Díaz Ordaz', 1, 1, 6),
(5, 'Aeropuerto Internacional de Ensenada', 1, 1, 2),
(6, 'Base Aérea No. 3 El Ciprés', 2, 2, 6),
(7, 'Aeropuerto Internacional General Rafael Buelna', 2, 2, 5),
(8, 'Aeropuerto Internacional de Tampico', 3, 3, 8),
(9, 'Aeropuerto de Altamira', 3, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `Automovil`
--

CREATE TABLE `Automovil` (
  `idAutomovil` int(11) NOT NULL,
  `NombreAutomovil` varchar(45) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Gama` int(11) DEFAULT NULL,
  `Imagen` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Automovil`
--

INSERT INTO `Automovil` (`idAutomovil`, `NombreAutomovil`, `Precio`, `Gama`, `Imagen`) VALUES
(1, 'Chevy', 528, 1, 'http://automecanica.repair7.com/wp-content/uploads/2011/08/Manual-De-Propietario-o-Usuario-Chevrolet-Chevy-2006.jpg'),
(2, 'Spark', 550, 1, 'http://www.eclipserent.com/images/i10.jpg'),
(3, 'Tiida', 935, 2, 'http://www.eclipserent.com/images/tiida2.jpg'),
(6, 'Bora', 1430, 3, 'http://www.eclipserent.com/images/bora2.jpg'),
(7, 'Jetta clasico', 1650, 3, 'http://www.eclipserent.com/images/jetta.jpg'),
(8, 'Frontier', 979, 2, 'http://www.eclipserent.com/images/nissan-frontier.jpg'),
(9, 'Suburban', 2200, 5, 'http://www.eclipserent.com/images/suburban2.jpg'),
(10, 'Passat', 2090, 5, 'http://www.eclipserent.com/images/passat.jpg'),
(11, 'Tiguan', 1760, 4, 'http://www.eclipserent.com/images/tiguan.jpg'),
(12, 'C200', 2400, 5, 'http://www.eclipserent.com/images/mb-c200.jpg'),
(13, 'Civic', 1045, 3, 'http://www.eclipserent.com/images/civic.jpg'),
(14, 'Hiace', 2200, 4, 'http://www.eclipserent.com/images/hiace.jpg'),
(15, 'Traverse', 2200, 5, 'http://www.eclipserent.com/images/traverse.jpg'),
(16, 'F-150', 935, 3, 'http://www.eclipserent.com/images/f-150.jpg'),
(17, 'Routan', 2090, 4, 'http://www.eclipserent.com/images/routan2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Barco`
--

CREATE TABLE `Barco` (
  `idBarco` int(11) NOT NULL,
  `NombreBarco` varchar(45) NOT NULL,
  `idPuerto` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Barco`
--

INSERT INTO `Barco` (`idBarco`, `NombreBarco`, `idPuerto`, `Precio`, `Stock`) VALUES
(1, 'Acapulco Acarey', 1, 1300, 83),
(2, 'El Cazador', 2, 1599, 199),
(3, 'Ferry Santa Rosalia', 3, 899, 76),
(4, 'Baja Ferries', 5, 749, 34),
(5, 'Pirata Marigalante', 6, 599, 12),
(6, 'El Barco', 7, 1000, 23),
(7, 'Topolobambon', 4, 1299, 10),
(8, 'El Altamira Veloz', 7, 1600, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Categoria`
--

CREATE TABLE `Categoria` (
  `idCategoria` int(11) NOT NULL,
  `NombreCategoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categoria`
--

INSERT INTO `Categoria` (`idCategoria`, `NombreCategoria`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Table structure for table `Ciudad`
--

CREATE TABLE `Ciudad` (
  `idCiudad` int(11) NOT NULL,
  `NombreCiudad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ciudad`
--

INSERT INTO `Ciudad` (`idCiudad`, `NombreCiudad`) VALUES
(1, 'Acapulco'),
(2, 'Ensenada'),
(3, 'Guaymas'),
(4, 'Topolobampo'),
(5, 'Mazatlan'),
(6, 'Puerto Vallarta'),
(7, 'Altamira'),
(8, 'Tampico');

-- --------------------------------------------------------

--
-- Table structure for table `ClasificacionColor`
--

CREATE TABLE `ClasificacionColor` (
  `idClasificacionColor` int(11) NOT NULL,
  `NombreClasificacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ClasificacionColor`
--

INSERT INTO `ClasificacionColor` (`idClasificacionColor`, `NombreClasificacion`) VALUES
(1, 'Oro'),
(2, 'Plata'),
(3, 'Bronce'),
(4, 'Piedra');

-- --------------------------------------------------------

--
-- Table structure for table `Correos`
--

CREATE TABLE `Correos` (
  `idCorreos` int(11) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Correos`
--

INSERT INTO `Correos` (`idCorreos`, `Email`, `idUsuario`) VALUES
(1, 'half_definition@hotmail.com', 1),
(2, 'laloherreradominguez@gmail.com', 1),
(3, 'yhoshua6@gmail.com', 2),
(4, 'josue.mateo@hotmail.com', 2),
(5, 'nevermindXD@gmail.com', 3),
(6, 'juan.jasso@hotmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Hotel`
--

CREATE TABLE `Hotel` (
  `idHotel` int(11) NOT NULL,
  `NombreHotel` varchar(45) NOT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Clasificacion` int(10) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  `Habitaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Hotel`
--

INSERT INTO `Hotel` (`idHotel`, `NombreHotel`, `Precio`, `Clasificacion`, `imagen`, `idCiudad`, `Habitaciones`) VALUES
(1, 'Hacienda Guadalupe', 3077, 1, 'http://imgec.trivago.com/itemimages/10/06/1006381_v2_isq.jpeg', 2, 20),
(2, 'Ensenada Inn Motel', 1529, 4, 'http://imgec.trivago.com/itemimages/14/21/1421022_v1_isq.jpeg', 2, 15),
(3, ' Las Rosas ', 2223, 2, 'http://imgec.trivago.com/itemimages/25/68/2568850_isq.jpeg', 2, 30),
(4, 'Quintas Papagayo Resort', 916, 4, 'http://imgec.trivago.com/itemimages/11/37/1137629_isq.jpeg', 2, 25),
(5, ' Estero Beach ', 1890, 3, 'http://imgec.trivago.com/itemimages/20/54/2054018_v3_isq.jpeg', 2, 12),
(6, 'Fiesta Americana Villas ', 1307, 2, 'http://imgec.trivago.com/itemimages/34/33/34338_v4_isq.jpeg', 1, 8),
(7, 'Crowne Plaza Acapulco', 753, 4, 'http://imgec.trivago.com/itemimages/43/17/43174_v3_isq.jpeg', 1, 12),
(8, 'Ritz Acapulco', 3322, 1, 'http://imgec.trivago.com/itemimages/42/40/42402_v2_isq.jpeg', 1, 23),
(9, 'The Resort At Mundo Imperial', 1789, 2, 'imgec.trivago.com/itemimages/94/86/948643_v2_isq.jpeg', 1, 34),
(10, ' Encanto', 3706, 1, 'http://imgec.trivago.com/itemimages/13/50/1350878_v4_isq.jpeg', 1, 10),
(11, 'Holiday Inn Express Guaymas', 901, 3, 'http://imgec.trivago.com/itemimages/22/69/2269520_isq.jpeg', 3, 4),
(12, 'San Carlos Plaza Resort & Convention Center', 1237, 4, 'http://imgec.trivago.com/itemimages/32/11/321106_v1_isq.jpeg', 3, 30),
(13, 'Hacienda Tetakawi', 859, 3, 'http://imgec.trivago.com/itemimages/50/79/507941_v3_isq.jpeg', 3, 23),
(14, ' Marinaterra', 2211, 1, 'http://imgec.trivago.com/itemimages/43/77/437716_v1_isq.jpeg', 3, 32),
(15, 'Playa De Cortes', 1143, 2, 'http://imgec.trivago.com/itemimages/10/09/1009211_v1_isq.jpeg', 3, 35),
(16, 'The Inn at Mazatlán', 2441, 1, 'http://imgec.trivago.com/itemimages/42/87/42873_v2_isq.jpeg', 5, 28),
(17, 'Coral Island & Spa', 2116, 2, 'http://imgec.trivago.com/itemimages/11/05/1105762_v4_isq.jpeg', 5, 20),
(18, 'Sea Garden Mazatlan ', 1063, 3, 'http://imgec.trivago.com/itemimages/43/09/43092_v1_isq.jpeg', 5, 34),
(19, 'El Quijote Inn', 1063, 4, 'http://imgec.trivago.com/itemimages/42/79/42797_v4_isq.jpeg', 5, 16),
(20, 'Maria Coral', 933, 4, 'http://imgec.trivago.com/itemimages/23/89/2389731_v2_isq.jpeg', 5, 19);

-- --------------------------------------------------------

--
-- Table structure for table `Perfiles`
--

CREATE TABLE `Perfiles` (
  `idPerfiles` int(11) NOT NULL,
  `TipoPerfil` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Perfiles`
--

INSERT INTO `Perfiles` (`idPerfiles`, `TipoPerfil`) VALUES
(1, 'Agencia de Viajes'),
(2, 'Clientes Particulares');

-- --------------------------------------------------------

--
-- Table structure for table `Puerto`
--

CREATE TABLE `Puerto` (
  `idPuerto` int(11) NOT NULL,
  `NombrePuerto` varchar(45) DEFAULT NULL,
  `idCategoria` int(11) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  `idTasa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Puerto`
--

INSERT INTO `Puerto` (`idPuerto`, `NombrePuerto`, `idCategoria`, `idCiudad`, `idTasa`) VALUES
(1, 'Puerto de Acapulco', 1, 1, 1),
(2, 'Puerto de Ensenada', 2, 2, 2),
(3, 'Puerto de Guaymas', 2, 3, 2),
(4, 'Puerto de Topolobampo', 3, 4, 3),
(5, 'Puerto de Mazatlan', 1, 5, 1),
(6, 'Puerto de Puerto Vallarta', 1, 6, 1),
(7, 'Puerto de Altamira', 2, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ReservaAvion`
--

CREATE TABLE `ReservaAvion` (
  `idReservaAvion` int(11) NOT NULL,
  `Aerolinea_idAerolinea` int(11) NOT NULL,
  `NoBoletos` int(11) DEFAULT NULL,
  `FechaVuelo` date DEFAULT NULL,
  `PagoAnticipado` int(11) DEFAULT NULL,
  `CosteAsociado` int(11) DEFAULT NULL,
  `Azafatas` int(11) DEFAULT NULL,
  `idTipoVUelo` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ReservaBarco`
--

CREATE TABLE `ReservaBarco` (
  `idReservaBarco` int(11) NOT NULL,
  `Barco_idBarco` int(11) NOT NULL,
  `BoletosBarco` int(11) DEFAULT NULL,
  `FechaBarco` date DEFAULT NULL,
  `PagoAnticipado` int(11) DEFAULT NULL,
  `CosteAsociado` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ReservaHotel`
--

CREATE TABLE `ReservaHotel` (
  `idReserva` int(11) NOT NULL,
  `Hotel_idHotel` int(11) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFinal` date NOT NULL,
  `PagoAnticipado` int(11) DEFAULT NULL,
  `CosteAsociado` int(11) DEFAULT NULL,
  `NoHabitaciones` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tasa`
--

CREATE TABLE `Tasa` (
  `idTasa` int(11) NOT NULL,
  `NombreTasa` varchar(20) NOT NULL,
  `Porcentaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tasa`
--

INSERT INTO `Tasa` (`idTasa`, `NombreTasa`, `Porcentaje`) VALUES
(1, 'Alta', 15),
(2, 'Media', 12),
(3, 'Baja', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Telefonos`
--

CREATE TABLE `Telefonos` (
  `idTelefonos` int(11) NOT NULL,
  `Telefono` varchar(25) DEFAULT NULL,
  `idUsuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Telefonos`
--

INSERT INTO `Telefonos` (`idTelefonos`, `Telefono`, `idUsuario`) VALUES
(1, '2717407752', 1),
(2, '2711681376', 1),
(3, '2721346815', 3),
(4, '2721706233', 2);

-- --------------------------------------------------------

--
-- Table structure for table `TipoVuelo`
--

CREATE TABLE `TipoVuelo` (
  `idTipoVuelo` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TipoVuelo`
--

INSERT INTO `TipoVuelo` (`idTipoVuelo`, `Tipo`) VALUES
(1, 'Charter'),
(2, 'Linea Regular');

-- --------------------------------------------------------

--
-- Table structure for table `Usuarios`
--

CREATE TABLE `Usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `NombreCompleto` varchar(65) DEFAULT NULL,
  `Contrasena` varchar(25) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `Perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Usuarios`
--

INSERT INTO `Usuarios` (`idUsuarios`, `Usuario`, `NombreCompleto`, `Contrasena`, `Status`, `Perfil`) VALUES
(1, 'EduardoHD94', 'Eduardo Herrera Dominguez', 'eduardo', 1, 1),
(2, 'Josue94', 'Josue Hernandez Mateo', 'Josue', 1, 2),
(3, 'Yeizah', 'Juan Carlos Olivier Jasso', 'jasso', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Aerolinea`
--
ALTER TABLE `Aerolinea`
  ADD PRIMARY KEY (`idAerolinea`);

--
-- Indexes for table `AeroLineaPuerto`
--
ALTER TABLE `AeroLineaPuerto`
  ADD PRIMARY KEY (`idAerolineapuerto`);

--
-- Indexes for table `Aeropuerto`
--
ALTER TABLE `Aeropuerto`
  ADD PRIMARY KEY (`idAeropuerto`);

--
-- Indexes for table `Automovil`
--
ALTER TABLE `Automovil`
  ADD PRIMARY KEY (`idAutomovil`);

--
-- Indexes for table `Barco`
--
ALTER TABLE `Barco`
  ADD PRIMARY KEY (`idBarco`);

--
-- Indexes for table `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `Ciudad`
--
ALTER TABLE `Ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indexes for table `ClasificacionColor`
--
ALTER TABLE `ClasificacionColor`
  ADD PRIMARY KEY (`idClasificacionColor`);

--
-- Indexes for table `Correos`
--
ALTER TABLE `Correos`
  ADD PRIMARY KEY (`idCorreos`);

--
-- Indexes for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`idHotel`);

--
-- Indexes for table `Perfiles`
--
ALTER TABLE `Perfiles`
  ADD PRIMARY KEY (`idPerfiles`);

--
-- Indexes for table `Puerto`
--
ALTER TABLE `Puerto`
  ADD PRIMARY KEY (`idPuerto`);

--
-- Indexes for table `ReservaAvion`
--
ALTER TABLE `ReservaAvion`
  ADD PRIMARY KEY (`idReservaAvion`),
  ADD KEY `Aerolinea_idAerolinea` (`Aerolinea_idAerolinea`),
  ADD KEY `idTipoVUelo` (`idTipoVUelo`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `ReservaBarco`
--
ALTER TABLE `ReservaBarco`
  ADD PRIMARY KEY (`idReservaBarco`),
  ADD KEY `Barco_idBarco` (`Barco_idBarco`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `ReservaHotel`
--
ALTER TABLE `ReservaHotel`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `fk_ReservaHotel_Hotel_idx` (`Hotel_idHotel`),
  ADD KEY `fk_idx` (`idUsuario`);

--
-- Indexes for table `Tasa`
--
ALTER TABLE `Tasa`
  ADD PRIMARY KEY (`idTasa`);

--
-- Indexes for table `Telefonos`
--
ALTER TABLE `Telefonos`
  ADD PRIMARY KEY (`idTelefonos`);

--
-- Indexes for table `TipoVuelo`
--
ALTER TABLE `TipoVuelo`
  ADD PRIMARY KEY (`idTipoVuelo`);

--
-- Indexes for table `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `fk1_idx` (`Perfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Aerolinea`
--
ALTER TABLE `Aerolinea`
  MODIFY `idAerolinea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `AeroLineaPuerto`
--
ALTER TABLE `AeroLineaPuerto`
  MODIFY `idAerolineapuerto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `Aeropuerto`
--
ALTER TABLE `Aeropuerto`
  MODIFY `idAeropuerto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Automovil`
--
ALTER TABLE `Automovil`
  MODIFY `idAutomovil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `Barco`
--
ALTER TABLE `Barco`
  MODIFY `idBarco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Ciudad`
--
ALTER TABLE `Ciudad`
  MODIFY `idCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ClasificacionColor`
--
ALTER TABLE `ClasificacionColor`
  MODIFY `idClasificacionColor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Correos`
--
ALTER TABLE `Correos`
  MODIFY `idCorreos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Hotel`
--
ALTER TABLE `Hotel`
  MODIFY `idHotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `Puerto`
--
ALTER TABLE `Puerto`
  MODIFY `idPuerto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ReservaAvion`
--
ALTER TABLE `ReservaAvion`
  MODIFY `idReservaAvion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ReservaBarco`
--
ALTER TABLE `ReservaBarco`
  MODIFY `idReservaBarco` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ReservaHotel`
--
ALTER TABLE `ReservaHotel`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Tasa`
--
ALTER TABLE `Tasa`
  MODIFY `idTasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Telefonos`
--
ALTER TABLE `Telefonos`
  MODIFY `idTelefonos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `TipoVuelo`
--
ALTER TABLE `TipoVuelo`
  MODIFY `idTipoVuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ReservaAvion`
--
ALTER TABLE `ReservaAvion`
  ADD CONSTRAINT `ReservaAvion_ibfk_1` FOREIGN KEY (`Aerolinea_idAerolinea`) REFERENCES `Aerolinea` (`idAerolinea`),
  ADD CONSTRAINT `ReservaAvion_ibfk_2` FOREIGN KEY (`idTipoVUelo`) REFERENCES `TipoVuelo` (`idTipoVuelo`),
  ADD CONSTRAINT `ReservaAvion_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ReservaBarco`
--
ALTER TABLE `ReservaBarco`
  ADD CONSTRAINT `ReservaBarco_ibfk_1` FOREIGN KEY (`Barco_idBarco`) REFERENCES `Barco` (`idBarco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ReservaBarco_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ReservaHotel`
--
ALTER TABLE `ReservaHotel`
  ADD CONSTRAINT `fk` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ReservaHotel_Hotel` FOREIGN KEY (`Hotel_idHotel`) REFERENCES `Hotel` (`idHotel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`Perfil`) REFERENCES `Perfiles` (`idPerfiles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
