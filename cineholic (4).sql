-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 mars 2021 à 14:00
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

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
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `idAvis` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `objet` varchar(100) NOT NULL,
  `contenu` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nomE` varchar(20) NOT NULL,
  `organisateur` varchar(20) NOT NULL,
  `date_debut` varchar(10) NOT NULL,
  `date_fin` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `nomE`, `organisateur`, `date_debut`, `date_fin`, `description`) VALUES
(5, 'oo', 'aa', 'hh', 'k', 'h'),
(12, 'aa', 'aa', 'aa', 'aa', 'aa'),
(55, 'oo', 'aa', 'hh', 'k', 'h');

-- --------------------------------------------------------

--
-- Structure de la table `fidelite`
--

CREATE TABLE `fidelite` (
  `ref` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fidelite`
--

INSERT INTO `fidelite` (`ref`, `id_client`, `point`) VALUES
(1, 10, 100);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `trailer` varchar(200) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `temps` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `description`, `trailer`, `datedebut`, `datefin`, `temps`) VALUES
(2, 'blindspotingg', 'un bon film', 'link', '2021-03-04', '2021-03-04', '2:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(8) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `contenu` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promo` int(25) NOT NULL,
  `pourcentage` int(25) NOT NULL,
  `date_debut` varchar(50) NOT NULL,
  `date_fin` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id_promo`, `pourcentage`, `date_debut`, `date_fin`) VALUES
(1, 10, '2', '5'),
(2, 20, '12/10/10', '12/25/25'),
(3, 20, '12/10/10', '12/25/25'),
(4, 20, '12/10/10', '12/25/25'),
(5, 20, '12/10/10', '12/25/25'),
(6, 30, '07/12/2020', '12/10/2520');

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `id_reservation` int(11) NOT NULL,
  `Titre` varchar(40) NOT NULL,
  `img` varchar(50) NOT NULL,
  `nb_entree` int(11) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`id_reservation`, `Titre`, `img`, `nb_entree`, `date_deb`, `date_fin`) VALUES
(1, 'ghazi', '', 0, '2021-03-04', '2021-03-05');

-- --------------------------------------------------------

--
-- Structure de la table `salledecinema`
--

CREATE TABLE `salledecinema` (
  `id` int(5) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `capacite` int(5) NOT NULL,
  `localisation` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salledecinema`
--

INSERT INTO `salledecinema` (`id`, `nom`, `capacite`, `localisation`) VALUES
(5, 'Pathé', 1500, 'Ariana'),
(6, 'Le Palace', 700, 'Tunis');

-- --------------------------------------------------------

--
-- Structure de la table `store`
--

CREATE TABLE `store` (
  `id_item` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `description` int(255) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `telephone` int(11) NOT NULL,
  `adresse` varchar(20) NOT NULL,
  `domaine` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `telephone`, `adresse`, `domaine`, `email`, `mdp`) VALUES
(3, 'bibouba', 'k', 10, 'az', 'az', 'az', 'az'),
(5, 'hibaa', 'sboui', 123, 'a', 'aa', 'aaa', 'aaaa'),
(6, 'ca', 'h', 66, 'aa', 'aa', 'aa', 'aaa'),
(10, 'hibou', 'sboui', 99, 'ariana', 'lolo', 'aaa', 'ssss'),
(31, 'bibouba', 'klo', 10, 'az', 'az', 'az', 'az'),
(65, 'Ahmed', 'Mahmoud', 55, 'zz', 'cc', 'll', 'ee');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idAvis`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fidelite`
--
ALTER TABLE `fidelite`
  ADD PRIMARY KEY (`ref`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promo`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD UNIQUE KEY `id_reservation` (`id_reservation`);

--
-- Index pour la table `salledecinema`
--
ALTER TABLE `salledecinema`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id_item`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promo` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reserver`
--
ALTER TABLE `reserver`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `salledecinema`
--
ALTER TABLE `salledecinema`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `store`
--
ALTER TABLE `store`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
