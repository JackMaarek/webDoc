-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 28 juin 2018 à 14:28
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sportCorruption`
--
CREATE DATABASE IF NOT EXISTS `sportCorruption` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sportCorruption`;

-- --------------------------------------------------------

--
-- Structure de la table `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `sport_id` varchar(254) NOT NULL,
  `id_place` int(11) NOT NULL,
  `id_case` int(11) NOT NULL,
  `description` varchar(254) NOT NULL,
  `picture` int(254) NOT NULL,
  `video` int(254) NOT NULL,
  `case_number` int(11) NOT NULL,
  `anwser1` varchar(254) NOT NULL,
  `anwser2` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cases`
--

INSERT INTO `cases` (`id`, `sport_id`, `id_place`, `id_case`, `description`, `picture`, `video`, `case_number`, `anwser1`, `anwser2`) VALUES
(1, 'handball', 1, 1, 'first case ', 1, 1, 1, '', ''),
(2, 'handball', 2, 2, 'second case ', 2, 2, 2, '', ''),
(3, 'handball', 1, 1, 'first case ', 1, 1, 1, '', ''),
(4, 'handball', 2, 2, 'second case ', 2, 2, 2, '', ''),
(5, 'basket', 1, 1, 'first case ', 1, 1, 1, '', ''),
(6, 'basket', 2, 2, 'second case ', 2, 2, 2, '', ''),
(7, 'basket', 1, 1, 'first case ', 1, 1, 1, '', ''),
(8, 'basket', 2, 2, 'second case ', 2, 2, 2, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `sport_id` varchar(254) NOT NULL,
  `id_place` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `places`
--

INSERT INTO `places` (`id`, `sport_id`, `id_place`) VALUES
(1, 'basket', 'basketCas'),
(2, 'handball', 'handballCase'),
(3, 'tennis', 'tennisCase'),
(4, 'football', 'footballCase'),
(5, 'handball', 'handballCase');

-- --------------------------------------------------------

--
-- Structure de la table `sportTable`
--

DROP TABLE IF EXISTS `sportTable`;
CREATE TABLE `sportTable` (
  `id` int(11) NOT NULL,
  `sport` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sportTable`
--

INSERT INTO `sportTable` (`id`, `sport`) VALUES
(1, 'basket'),
(2, 'handball'),
(3, 'tennis'),
(4, 'football');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sportTable`
--
ALTER TABLE `sportTable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sportTable`
--
ALTER TABLE `sportTable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
