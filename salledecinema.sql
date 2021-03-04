-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 mars 2021 à 19:08
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cineholic`
--

-- --------------------------------------------------------

--
-- Structure de la table `salledecinema`
--

DROP TABLE IF EXISTS `salledecinema`;
CREATE TABLE IF NOT EXISTS `salledecinema` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `capacite` int(5) NOT NULL,
  `localisation` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salledecinema`
--

INSERT INTO `salledecinema` (`id`, `nom`, `capacite`, `localisation`) VALUES
(35, 'iheb', 16, 'Ariana'),
(34, 'Le ColisÃ©e', 500, 'Tunis');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
