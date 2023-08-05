-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 02:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monopoliodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugador` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `figura` varchar(10) NOT NULL,
  `id_partida` int(11) NOT NULL,
  `pos_actual` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `dinero` int(11) NOT NULL,
  `espera_carcel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `partida`
--

CREATE TABLE `partida` (
  `id_partida` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `numerojugadores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `propiedades`
--

CREATE TABLE `propiedades` (
  `nombre` varchar(20) NOT NULL,
  `valor` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `casas` int(11) NOT NULL,
  `hotel` tinyint(1) NOT NULL,
  `hipotecada` tinyint(1) NOT NULL,
  `id_propiedad` int(11) NOT NULL,
  `id_jugador` int(11) NOT NULL,
  `id_partida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `propiedades_juego`
--

CREATE TABLE `propiedades_juego` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `color` varchar(11) NOT NULL,
  `renta` int(11) NOT NULL,
  `hipoteca` int(11) NOT NULL,
  `casa1` int(11) NOT NULL,
  `casa2` int(11) NOT NULL,
  `casa3` int(11) NOT NULL,
  `casa4` int(11) NOT NULL,
  `hotel` int(11) NOT NULL,
  `player` int(11) NOT NULL,
  `costeInmueble` int(10) NOT NULL,
  `precio` int(4) NOT NULL,
  `hipotecada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propiedades_juego`
--

INSERT INTO `propiedades_juego` (`id`, `nombre`, `color`, `renta`, `hipoteca`, `casa1`, `casa2`, `casa3`, `casa4`, `hotel`, `player`, `costeInmueble`, `precio`, `hipotecada`) VALUES
(1, 'Mediterranean Avenue', 'brown', 2, 30, 10, 30, 90, 160, 250, 0, 50, 60, 0),
(3, 'Baltic Avenue', 'brown', 4, 30, 20, 60, 180, 320, 450, 0, 50, 60, 0),
(5, 'Reading Railroad', 'none', 25, 100, 0, 0, 0, 0, 0, 0, 0, 200, 0),
(6, 'Oriental Avenue', 'azure', 6, 50, 30, 90, 270, 400, 550, 0, 50, 100, 0),
(8, 'Vermont Avenue', 'azure', 6, 50, 30, 90, 270, 400, 550, 1, 50, 100, 0),
(9, 'Connecticut Avenue', 'azure', 8, 60, 40, 100, 300, 450, 600, 0, 50, 120, 0),
(11, 'St. Charles Place', 'purple', 10, 70, 50, 150, 450, 625, 750, 0, 100, 140, 0),
(12, 'Electrict Company', 'none', 4, 75, 0, 0, 0, 0, 0, 0, 0, 150, 0),
(13, 'States Avenue', 'purple', 10, 70, 50, 150, 450, 625, 750, 0, 100, 145, 0),
(14, 'Virginia Avenue', 'purple', 12, 80, 60, 80, 500, 700, 900, 0, 100, 160, 0),
(15, 'Pensylvania Railroad', 'none', 25, 100, 0, 0, 0, 0, 0, 0, 0, 200, 0),
(16, 'St. James Place', 'orange', 14, 90, 70, 200, 550, 750, 950, 0, 100, 180, 0),
(18, 'Tenessie Avenue', 'orange', 14, 90, 70, 200, 550, 750, 950, 0, 100, 185, 0),
(19, 'New York Avenue', 'orange', 16, 100, 80, 220, 600, 800, 1000, 0, 100, 200, 0),
(21, 'Kentucky', 'red', 18, 110, 90, 250, 700, 875, 1050, 0, 150, 220, 0),
(23, 'Indiana Avenue', 'red', 18, 110, 90, 250, 700, 875, 1050, 0, 150, 225, 0),
(24, 'Ilinois Avenue', 'red', 20, 120, 100, 300, 750, 925, 1100, 0, 150, 240, 0),
(25, 'B.&O. Railroad', 'none', 25, 100, 0, 0, 0, 0, 0, 0, 0, 200, 0),
(26, 'Atlantic Avenue', 'yellow', 22, 130, 110, 330, 800, 975, 1150, 0, 150, 260, 0),
(27, 'Ventnor Avenue', 'yellow', 22, 130, 110, 330, 800, 975, 1150, 0, 150, 260, 0),
(28, 'Wats Works', 'none', 4, 75, 0, 0, 0, 0, 0, 0, 0, 150, 0),
(29, 'Marvins Garden', 'yellow', 24, 140, 120, 360, 850, 1025, 1200, 0, 150, 280, 0),
(31, 'Pacific Avenue', 'green', 26, 150, 130, 360, 900, 1100, 1275, 0, 200, 300, 0),
(32, 'North Carolina Avenue', 'green', 26, 150, 130, 390, 900, 1100, 1275, 0, 200, 300, 0),
(34, 'Pensylvania Avenue', 'green', 28, 160, 150, 450, 1000, 1200, 1400, 0, 200, 340, 0),
(35, 'Short Line', 'none', 25, 100, 0, 0, 0, 0, 0, 0, 0, 200, 0),
(37, 'Park Place', 'blue', 35, 175, 175, 500, 1100, 1300, 1500, 0, 200, 350, 0),
(39, 'Brodwalk', 'blue', 50, 200, 200, 600, 1400, 1700, 2000, 0, 200, 400, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugador`),
  ADD UNIQUE KEY `id_partida` (`id_partida`);

--
-- Indexes for table `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`id_partida`);

--
-- Indexes for table `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id_propiedad`),
  ADD UNIQUE KEY `id_jugador` (`id_jugador`),
  ADD UNIQUE KEY `id_partida` (`id_partida`);

--
-- Indexes for table `propiedades_juego`
--
ALTER TABLE `propiedades_juego`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partida`
--
ALTER TABLE `partida`
  MODIFY `id_partida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
