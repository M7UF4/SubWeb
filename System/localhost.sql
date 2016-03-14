-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2016 at 08:57 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

CREATE DATABASE IF NOT EXISTS `db_subweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_subweb`;

--
-- Base de datos: Drop All
--

DROP TABLE IF EXISTS `Licitacio`;
DROP TABLE IF EXISTS `Tipus`;
DROP TABLE IF EXISTS `Usuari`;
DROP TABLE IF EXISTS `Pagament`;
DROP TABLE IF EXISTS `Categoria`;
DROP TABLE IF EXISTS `Producte`;
DROP TABLE IF EXISTS `Subhasta`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_subweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categoria`
--

CREATE TABLE IF NOT EXISTS `Categoria` (
  `id_categoria` int(10) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(32) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `tipus` (`tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Licitacio`
--

CREATE TABLE IF NOT EXISTS `Licitacio` (
  `id_usuari` int(10) NOT NULL,
  `id_producte` int(10) NOT NULL,
  `valor` int(10) NOT NULL,
  `id_licitacio` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_licitacio`),
  KEY `id_usuari` (`id_usuari`),
  KEY `id_producte` (`id_producte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Pagament`
--

CREATE TABLE IF NOT EXISTS `Pagament` (
  `id_pagament` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuari` int(10) NOT NULL,
  `tipus` varchar(32) NOT NULL,
  `quantitat` int(10) NOT NULL,
  PRIMARY KEY (`id_pagament`),
  KEY `id_usuari` (`id_usuari`)
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

-- --------------------------------------------------------

--
-- Table structure for table `Subhasta`
--

CREATE TABLE IF NOT EXISTS `Subhasta` (
  `id_subhasta` int(10) NOT NULL AUTO_INCREMENT,
  `id_producte` int(10) NOT NULL,
  `num_licitacions` int(10) DEFAULT NULL,
  `temps` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_subhasta`),
  KEY `id_producte` (`id_producte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `nom` varchar(32) NOT NULL,
  `cognom` varchar(32) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `telefon` varchar(16) DEFAULT NULL,
  `adreça` varchar(32) NOT NULL,
  `id_tipus` int(10) NOT NULL,
  PRIMARY KEY (`id_usuari`),
  UNIQUE KEY `user` (`user`,`email`),
  KEY `id_tipus` (`id_tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Licitacio`
--
ALTER TABLE `Licitacio`
  ADD CONSTRAINT `Licitacio_ibfk_1` FOREIGN KEY (`id_usuari`) REFERENCES `Usuari` (`id_usuari`),
  ADD CONSTRAINT `Licitacio_ibfk_2` FOREIGN KEY (`id_producte`) REFERENCES `Producte` (`id_producte`);

--
-- Constraints for table `Pagament`
--
ALTER TABLE `Pagament`
  ADD CONSTRAINT `Pagament_ibfk_1` FOREIGN KEY (`id_usuari`) REFERENCES `Usuari` (`id_usuari`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;