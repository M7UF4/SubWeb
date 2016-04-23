-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2016 at 08:57 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14
--
-- Database: `db_subweb`
--
DROP DATABASE IF EXISTS db_subweb;
CREATE DATABASE IF NOT EXISTS `db_subweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
grant all on `db_subweb`.* to 'subweb'@'localhost' identified by 'master';
USE `db_subweb`;

-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Table structure for table `Categoria`
--

CREATE TABLE IF NOT EXISTS `Categoria` (
  `id_categoria` int(10) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(32) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `tipus` (`tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `Categoria` (`id_categoria`, `tipus`) VALUES
(3, 'Consoles'),
(2, 'Fotografia'),
(6, 'Gran electrodomÃ¨stic'),
(4, 'Imatge i so'),
(1, 'Informatica'),
(7, 'Petit electrodomÃ¨stic'),
(5, 'Telefonia');
-- --------------------------------------------------------

--
-- Table structure for table `Licitacio`
--

CREATE TABLE IF NOT EXISTS `Licitacio` (
  `id_usuari` int(10) NOT NULL,
  `id_subhasta` int(10) NOT NULL,
  `valor` int(10) NOT NULL,
  `id_licitacio` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_licitacio`),
  KEY `id_usuari` (`id_usuari`),
  KEY `id_subhasta` (`id_subhasta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `Factures`
--

CREATE TABLE IF NOT EXISTS `Factura` (
  `id_factura` int(255) NOT NULL AUTO_INCREMENT,
  `id_producte` int(10) NOT NULL,
  `id_usuari` int(10),
  `id_subhasta` int(10) NOT NULL,
  `valor` varchar(50),
  `comprat` varchar(50) NOT NULL,
  `carrer` varchar(200),
  PRIMARY KEY (`id_factura`),
  KEY `id_usuari` (`id_usuari`),
  KEY `id_subhasta` (`id_subhasta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Producte`
--

CREATE TABLE IF NOT EXISTS `Producte` (
  `id_producte` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `descripcio` varchar(200) NOT NULL,
  `caracteristiques` varchar(200) NOT NULL,
  `link_img` varchar(200) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `preu_mercat` int(10) NOT NULL,
  PRIMARY KEY (`id_producte`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Inserts de datos para la tabla `Producte`
--

INSERT INTO `Producte` (`id_producte`, `nom`, `descripcio`, `caracteristiques`, `link_img`, `id_categoria`, `preu_mercat`) VALUES
(1, 'Play Station 4', 'PlayStation 4 tofereix experiencies mes espectaculars, mes realistes. Molt mes del que mai hauries pogut imaginar.', 
'CPU
AMD Jaguar x86-64 de baixa potencia, 8 nuclis
GPU
1,84 TFLOPS, targeta grafica AMD basada en Radeon de nova generacio
MEMORIA
GDDR5 de 8 GB
HDD
Unitat de disc dur de 500 GB
UNITAT OPTICA (NOMES LECTURA)
BD x 6 CAV; DVD x 8 CAV
PORTS USB
2,0', 
'ps4.png', 3, 400),
(2, 'Subwoofer Stereo ',' Endinsat en una nova experiencia audiovisual afegint un so mes ple i dinamic a la televisio. Es el complement perfecte per a gaudir del millor so dels teus programes de televisio, pel.licules, videojocs ... El seu elegant disseny amb acabat en fusta evita la formacio de pols i redueix la distorsio del so.
El subwoofer actiu es el complement perfecte per afegir al seu Home Cinema una presencia sonora real. Compta amb una potencia de 30W i reduides dimensions.', 'subwoofer passiu
Entrada: COAXIAL x 1
Potencia de sortida: 2 x 15 W + 30 W (Subwoofer)
Dimensions de Subwoofer: 16 x 20 x 25 cm / 1.8 kg', 'subwoofer.jpg', 1, 200),
(3, 'Fagor A860', 'Si busques Lavadoras de carrega frontal Fagor, compra la teva Fagor A860.', '- Garantia espanyola
- Programes reduits en temps (Turbo Time Plus)
- Indicador de fases de rentat
- Indicador de temps restant
- Velocitat maxima de centrifugacio (r.p.m.): 1200
- Tecla i / o funcions: Aclarit extra
- Tecla i / o funcions: Facil planxa
- Tecla i / o funcions: Regulació de centrif. i antiarrugues
- Tecla de exclusió centrifugacio
- Capacitat de rentat (kg.): 8
- Selector velocitats de centrifugat
- Exclusió centrifugat
- Programacio diferida (h): 24
- Sistema ABS (control de equilibratge)
- Programes: Rapids: 15 min. (2Kg) / 30 min. (4Kg)
- Effi Silent (súpersilencio)
- Programa especial: Edredo
- Color: Blanc

dimensions:
- Alt x ample x fons 85 x 59 x 59 cm', 'lavadoraFagor.jpg', 2, 250),
(4, 'ipad E-550', 'APPLE. 
iPad Air Wi-Fi 32 GB. 
Model: MD786TY/B', 'Processador Xip A7 amb arquitectura de 64 bits i coprocessador de moviment M7Sistema operativoiOS 8Tipo de pantallaPantalla Retina multi-touch retroiluminada per LED amb tecnologia IPS. Coberta oleofuga antihuellas. Tamany de la pantalla 9,7 "Resolució 2048x1536 pppCapacidad de disc duro1x32 GB', 'ipad-air.jpg', 4, 150),
(5, 'Nikon-d5100', 'Formato DX 16.2 megapixeles Se', 
'Live View amb Selector automatic descenes
Nitid sistema denfocament automatic 11 punts
4 fps de tret continu
La manera defectes especials
Maneres dEscena
Ampli a la cambra Retoc Menu
Sistema de reduccio de pols integrat Dual
Incorporat en el connector HDMI
so estereo', 'Nikon-d5100.jpg', 5, 550);

-- --------------------------------------------------------

--
-- Table structure for table `Subhasta`
--

CREATE TABLE IF NOT EXISTS `Subhasta` (
  `id_subhasta` int(10) NOT NULL AUTO_INCREMENT,
  `id_producte` int(10) NOT NULL,
  `num_licitacions` int(10) DEFAULT NULL,
  `temps` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `completada` int(1) NOT NULL,
  PRIMARY KEY (`id_subhasta`),
  KEY `id_producte` (`id_producte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `Subhasta`
--

INSERT INTO `Subhasta` (`id_subhasta`, `id_producte`, `num_licitacions`, `temps`) VALUES
(1, 1, 0, '2016-04-25 18:41:59'),
(2, 3, 0, '2016-04-26 18:44:43'),
(3, 2, 0, '2016-04-30 18:34:07'),
(4, 4, 0, '2016-04-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Tipus`
--

CREATE TABLE IF NOT EXISTS `Tipus` (
  `id_tipus` int(10) NOT NULL AUTO_INCREMENT,
  `rang` varchar(32) NOT NULL,
  `descripcio` varchar(250) NOT NULL,
  PRIMARY KEY (`id_tipus`),
  UNIQUE KEY `rang` (`rang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `Tipus` (`id_tipus`, `rang`, `descripcio`) VALUES
(1, 'Admin', 'Administrador de subweb'),
(2, 'User', 'Usuari de subweb');
-- --------------------------------------------------------

--
-- Table structure for table `Usuari`
--

CREATE TABLE IF NOT EXISTS `Usuari` (
  `id_usuari` int(10) NOT NULL AUTO_INCREMENT,
  `saldo` int(10) NOT NULL,
  `user` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nom` varchar(32),
  `cognom` varchar(32),
  `dni` varchar(9),
  `phone` varchar(16),
  `adreca` varchar(32),
  `pais` varchar(32),
  `poble` varchar(32),
  `provincia` varchar(32),
  `postal` varchar(5),
  `id_tipus` int(10) NOT NULL,
  PRIMARY KEY (`id_usuari`),
  UNIQUE KEY `user` (`user`),
  KEY `id_tipus` (`id_tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Constraints for dumped tables
--

--
-- Constraints for table `Licitacio`
--
ALTER TABLE `Licitacio`
  ADD CONSTRAINT `Licitacio_1` FOREIGN KEY (`id_usuari`) REFERENCES `Usuari` (`id_usuari`);

ALTER TABLE `Licitacio`
  ADD CONSTRAINT `Licitacio_2` FOREIGN KEY (`id_subhasta`) REFERENCES `Subhasta` (`id_subhasta`);


--
-- Constraints for table `Factura`
--
ALTER TABLE `Factura`
  ADD CONSTRAINT `Factura_ibfk_1` FOREIGN KEY (`id_usuari`) REFERENCES `Usuari` (`id_usuari`);

ALTER TABLE `Factura`
  ADD CONSTRAINT `Factura_ibfk_2` FOREIGN KEY (`id_subhasta`) REFERENCES `Subhasta` (`id_subhasta`);


--
-- Constraints for table `Producte`
--
ALTER TABLE `Producte`
  ADD CONSTRAINT `Producte_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`);

--
-- Constraints for table `Subhasta`
--
ALTER TABLE `Subhasta`
  ADD CONSTRAINT `Subhasta_ibfk_1` FOREIGN KEY (`id_producte`) REFERENCES `Producte` (`id_producte`);

--
-- Constraints for table `Usuari`
--
ALTER TABLE `Usuari`
ADD CONSTRAINT `Usuari_ibfk_1` FOREIGN KEY (`id_tipus`) REFERENCES `Tipus` (`id_tipus`);



INSERT INTO `Usuari` (`id_usuari`, `saldo`, `user`, `email`, `password`, `nom`, `cognom`, `dni`, `phone`, `adreca`, `pais`, `poble`, `provincia`, `postal`, `id_tipus`) VALUES
(1, 50000, 'Admin', 'subweb@gmail.com', 'eb0a191797624dd3a48fa681d3061212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

INSERT INTO `Usuari` (`id_usuari`, `saldo`, `user`, `email`, `password`, `nom`, `cognom`, `dni`, `phone`, `adreca`, `pais`, `poble`, `provincia`, `postal`, `id_tipus`) VALUES
(2, 50000, 'Usuari', 'usuari@gmail.com', 'eb0a191797624dd3a48fa681d3061212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);


