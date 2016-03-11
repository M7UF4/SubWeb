--
-- Base de datos: `DB_AniMaster`
--
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

--
-- TABLE: `Tipus`
--
CREATE TABLE IF NOT EXISTS `Tipus` (
  `id_tipus` int(10) NOT NULL AUTO_INCREMENT,
  `rang` varchar(32) NOT NULL UNIQUE,
  `descripcio` varchar(250) NOT NULL,
  PRIMARY KEY (`id_tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `Tipus` (`id_tipus`, `rang`, `descripcio`) VALUES
(1, 'Admin', 'Eres el que manda en la web'),
(2, 'User', 'Eres un usuario')

--
-- TABLE: `Usuari`
--
CREATE TABLE IF NOT EXISTS `Usuari` (
  `id_usuari` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `saldo` int(10) NOT NULL,
  `user` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `cognom` varchar(32) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `telefon` varchar(16),
  `adreça` varchar(32) NOT NULL,
  `id_tipus` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_usuari`),
  UNIQUE KEY `user` (`user`,`email`),
  FOREIGN KEY (`id_tipus`) REFERENCES `Tipus` (`id_tipus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `Usuari` (`id_usuari`, `saldo`, `user`, `email`, `password`, `nom`, `cognom`, `dni`, `telefon`, `adreça`, `id_tipus`) VALUES
(1, '1000', 'DaarkAssassin', 'DaarkAssassin@gmail.com', 'f62aa154f501a57ab7ee985a34d2c17c', 'David', 'Bonet','12345678I','681254694','C/cervantes nº 89', 1),
(2, '1000', 'smusaran', 'smusaran@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Marc', 'Gomez','12345678P','603414875','C/agusti nº 2', 1),
(3, '1000', 'gavi', 'gavi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Gurwinder', 'Singh','12345678X','666333222','C/Taj Majal 2', 1)

--
-- TABLE: `Pagament`
--
CREATE TABLE IF NOT EXISTS `Pagament` (
  `id_pagament` int(10) NOT NULL PRIMARY KEY,
  `id_usuari` int(10) NOT NULL,
  `tipus` varchar(32) NOT NULL,
  `quantitat` int(10) NOT NULL,
  FOREIGN KEY (`id_usuari`) REFERENCES `Usuari` (`id_usuari`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- TABLE: `Categoria`
--
CREATE TABLE IF NOT EXISTS `Categoria` (
  `id_enemigo` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tipus`  varchar(32) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `Categoria` (`id_categoria`, `tipus`) VALUES
(1, 'informàtica'),
(2, 'fotografia'),
(3, 'consoles i jocs'),
(4, 'imatge i so'),
(5, 'telefonia'),
(6, 'gran electrodomèstic'),
(7, 'petit electrodomèstic');

--
-- TABLE: `Producte`
--
CREATE TABLE IF NOT EXISTS `Producte` (
  `id_producte` int(10) NOT NULL PRIMARY KEY,
  `nom` varchar(32) NOT NULL,
  `descripcio` varchar(200) NOT NULL,
  `caracteristiques` varchar(200) NOT NULL,
  `link_img` varchar(200) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `preu_mercat` int(10) NOT NULL,
  FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Producte` (`id_producte`, `nom`, `descripcio`, `caracteristiques`, `link_img`, `id_categoria`, `preu_mercat`) VALUES
(1, 'PS4', 'Consola de 4a ', 'PS4', 'PS4', 'PS4', 'PS4', 'PS4', 'PS4', 'PS4'),
(2, 'fotografia'),

--
-- TABLE: `Subhasta`
--
CREATE TABLE IF NOT EXISTS `Subhasta` (
  `id_subhasta` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_producte` int(10) NOT NULL,
  `num_licitacions`  int(10),
  `temps`  TIMESTAMP,
  FOREIGN KEY (`id_producte`) REFERENCES `Producte` (`id_producte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- TABLE: `Licitacions`
--
CREATE TABLE IF NOT EXISTS `Licitacio` (
  `id_user` int(10) NOT NULL,
  `id_producte` int(10) NOT NULL,
  `valor` int(10) NOT NULL,
  `id_licitacio` int(1000) NOT NULL AUTO_INCREMENT,
  CONSTRAINT pk_idlicitacio PRIMARY KEY (id_partida, id_player, id_licitacio),
  FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`),
  FOREIGN KEY (`id_producte`) REFERENCES `Producte` (`id_producte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

