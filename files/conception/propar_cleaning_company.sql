-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 09 sep. 2020 à 12:06
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `propar_cleaning_company`
--

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `city` varchar(30) COLLATE utf8_bin NOT NULL,
  `zipCode` varchar(20) COLLATE utf8_bin NOT NULL,
  `street` varchar(30) COLLATE utf8_bin NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id_customer`, `firstName`, `lastName`, `email`, `city`, `zipCode`, `street`, `number`) VALUES
(1, 'Auguste', 'Julii', 'auguste.julii@gmail.com', 'Rome', '00100', 'Via Apia', 1);

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

DROP TABLE IF EXISTS `operations`;
CREATE TABLE IF NOT EXISTS `operations` (
  `id_operation` int(11) NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8_bin NOT NULL,
  `creation_date` date NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_worker` int(11) DEFAULT NULL,
  `id_customer` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id_operation`) USING BTREE,
  KEY `Operations_fk0` (`id_worker`),
  KEY `Operations_fk1` (`id_customer`),
  KEY `Operations_fk2` (`id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `operations`
--

INSERT INTO `operations` (`id_operation`, `description`, `creation_date`, `date_start`, `date_end`, `status`, `id_worker`, `id_customer`, `id_type`) VALUES
(1, 'Je dois faire nettoyer mon palais', '2020-09-09', '2020-09-20', NULL, 'Available', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `operation_type`
--

DROP TABLE IF EXISTS `operation_type`;
CREATE TABLE IF NOT EXISTS `operation_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8_bin NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `operation_type`
--

INSERT INTO `operation_type` (`id_type`, `type`, `price`) VALUES
(1, 'Petite', '1000'),
(2, 'Moyenne', '2500'),
(3, 'Grosse', '10000');

-- --------------------------------------------------------

--
-- Structure de la table `workers`
--

DROP TABLE IF EXISTS `workers`;
CREATE TABLE IF NOT EXISTS `workers` (
  `id_worker` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(50) COLLATE utf8_bin NOT NULL,
  `role` varchar(20) COLLATE utf8_bin NOT NULL,
  `birthday` date NOT NULL,
  `hiring_date` date NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_worker`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `workers`
--

INSERT INTO `workers` (`id_worker`, `firstName`, `lastName`, `role`, `birthday`, `hiring_date`, `email`, `login`, `password`) VALUES
(1, 'Esteban', 'Leroy', 'Expert', '1995-02-15', '2020-09-09', 'leroy.esteban15@gmail.com', 'admin1', '$2y$12$HhOkyirbnX626GO0v5mInOYKuXXLRJPkaEln/axu02QKJVFzWm3TS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
