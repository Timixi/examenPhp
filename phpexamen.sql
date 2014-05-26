-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 26 Mai 2014 à 14:15
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `phpexamen`
--
CREATE DATABASE IF NOT EXISTS `timixiphpexa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `timixiphpexa`;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `idMembre` int(11) NOT NULL AUTO_INCREMENT,
  `nomMembre` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `prenomMembre` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `emailMembre` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `passMembre` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idMembre`),
  UNIQUE KEY `idMembre` (`idMembre`),
  KEY `idMembre_2` (`idMembre`),
  KEY `idMembre_3` (`idMembre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`idMembre`, `nomMembre`, `prenomMembre`, `emailMembre`, `passMembre`) VALUES
(1, 'Beek', 'Timothy', 'timbeek@yahoo.fr', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
