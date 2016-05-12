-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 12 Mai 2016 à 19:40
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Matchs`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admins`
--

CREATE TABLE `Admins` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `login` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Admins`
--

INSERT INTO `Admins` (`ID`, `login`, `password`, `date_creation`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2016-05-05 14:16:57');

-- --------------------------------------------------------

--
-- Structure de la table `Equipes`
--

CREATE TABLE `Equipes` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(10) NOT NULL,
  `idJ1` smallint(5) UNSIGNED NOT NULL,
  `idJ2` smallint(5) UNSIGNED NOT NULL,
  `idJ3` smallint(5) UNSIGNED NOT NULL,
  `idJ4` smallint(5) UNSIGNED NOT NULL,
  `idJ5` smallint(5) UNSIGNED NOT NULL,
  `points` smallint(5) UNSIGNED NOT NULL,
  `classement` smallint(5) UNSIGNED NOT NULL,
  `en_jeu` varchar(7) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Equipes`
--

INSERT INTO `Equipes` (`ID`, `nom`, `idJ1`, `idJ2`, `idJ3`, `idJ4`, `idJ5`, `points`, `classement`, `en_jeu`, `date_creation`) VALUES
(3, 'la troize', 1, 15, 3, 6, 4, 0, 3, 'en jeu', '2016-04-27 14:56:56'),
(4, 'Quatro', 7, 11, 23, 20, 4, 0, 3, 'en jeu', '2016-04-27 14:56:56'),
(5, 'La cinq!', 4, 11, 16, 24, 6, 0, 3, 'en jeu', '2016-04-27 14:56:56'),
(6, 'Sixxx', 1, 5, 16, 3, 0, 0, 3, 'repos', '2016-04-27 14:56:56'),
(7, 'Seven', 10, 17, 7, 1, 0, 0, 3, 'repos', '2016-04-27 14:56:56'),
(8, 'Ouite', 5, 2, 11, 25, 9, 9, 2, 'en jeu', '2016-04-27 14:56:56'),
(9, 'noeuf', 4, 12, 18, 8, 1, 0, 3, 'en jeu', '2016-04-27 14:56:56'),
(10, 'taine', 9, 8, 2, 19, 1, 50, 1, 'en jeu', '2016-04-27 14:56:56'),
(11, 'eleven', 27, 28, 29, 30, 26, 0, 3, 'en jeu', '2016-04-27 14:56:56'),
(13, 'Uno', 0, 0, 0, 0, 0, 0, 3, 'repos', '0000-00-00 00:00:00'),
(56, 'la deuze', 3, 5, 1, 22, 2, 0, 3, 'en jeu', '2016-04-27 14:56:56'),
(57, 'Dreamteam', 31, 0, 0, 0, 0, 0, 999, 'repos', '2016-05-05 15:16:16');

-- --------------------------------------------------------

--
-- Structure de la table `Joueurs`
--

CREATE TABLE `Joueurs` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(10) NOT NULL,
  `id_equipe1` smallint(5) UNSIGNED DEFAULT NULL,
  `id_equipe2` smallint(5) UNSIGNED DEFAULT NULL,
  `id_equipe3` smallint(5) UNSIGNED DEFAULT NULL,
  `id_equipe4` smallint(5) UNSIGNED DEFAULT NULL,
  `points` smallint(5) UNSIGNED DEFAULT NULL,
  `classement` smallint(5) UNSIGNED DEFAULT NULL,
  `validite` varchar(6) DEFAULT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Joueurs`
--

INSERT INTO `Joueurs` (`ID`, `nom`, `id_equipe1`, `id_equipe2`, `id_equipe3`, `id_equipe4`, `points`, `classement`, `validite`, `date_creation`) VALUES
(1, 'Michou', 9, 10, 7, NULL, 15, 2, 'blesse', '2016-05-05 14:16:16'),
(2, 'José', NULL, NULL, NULL, NULL, 18, 1, 'valide', '2016-05-05 14:16:16'),
(3, 'Josephine', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(4, 'Thierry', 3, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(5, 'Dupond', NULL, NULL, NULL, NULL, 3, 3, 'valide', '2016-05-05 14:16:16'),
(6, 'Milou', 3, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(7, 'Alphonse', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(8, 'Georgia', NULL, NULL, NULL, NULL, 15, 2, 'valide', '2016-05-05 14:16:16'),
(9, 'Matou', NULL, NULL, NULL, NULL, 18, 1, 'valide', '2016-05-05 14:16:16'),
(10, 'Tex', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(11, 'Albert', NULL, NULL, NULL, NULL, 3, 3, 'valide', '2016-05-05 14:16:16'),
(12, 'Noémie', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(13, 'Raoul', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(14, 'Gaston', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(15, 'Alex', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(16, 'Gégé', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(17, 'Renaud', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(18, 'Coco', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(19, 'Phiphi', NULL, NULL, NULL, NULL, 15, 2, 'valide', '2016-05-05 14:16:16'),
(20, 'Filou', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(21, 'Paulette', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(22, 'Yoyo', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(23, 'Mohamed', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(24, 'Mireille', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(25, 'Patou', NULL, NULL, NULL, NULL, 3, 3, 'valide', '2016-05-05 14:16:16'),
(26, 'Malette', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(27, 'Simone', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(28, 'Pulo', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(29, 'Cici', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(30, 'Goulard', NULL, NULL, NULL, NULL, 0, 4, 'valide', '2016-05-05 14:16:16'),
(31, 'Gabrielle', 57, NULL, NULL, NULL, 0, 999, 'valide', '2016-05-05 15:16:16');

-- --------------------------------------------------------

--
-- Structure de la table `Rencontres`
--

CREATE TABLE `Rencontres` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `id_equipe1` smallint(5) UNSIGNED DEFAULT NULL,
  `id_equipe2` smallint(5) UNSIGNED DEFAULT NULL,
  `date_rencontre` datetime DEFAULT NULL,
  `nom` varchar(15) DEFAULT NULL,
  `jouee_ou_non` tinyint(1) NOT NULL,
  `id_vainqueur` smallint(5) UNSIGNED DEFAULT NULL,
  `score_equipe_gagnante` smallint(5) UNSIGNED DEFAULT NULL,
  `score_equipe_perdante` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Rencontres`
--

INSERT INTO `Rencontres` (`ID`, `id_equipe1`, `id_equipe2`, `date_rencontre`, `nom`, `jouee_ou_non`, `id_vainqueur`, `score_equipe_gagnante`, `score_equipe_perdante`) VALUES
(1, 7, 11, '2016-05-10 08:00:00', NULL, 0, NULL, NULL, NULL),
(2, 8, 10, '2016-04-28 12:00:00', NULL, 1, 10, 6, 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Equipes`
--
ALTER TABLE `Equipes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `ind_unique_nom` (`nom`),
  ADD KEY `ind_bidon` (`idJ1`);

--
-- Index pour la table `Joueurs`
--
ALTER TABLE `Joueurs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Rencontres`
--
ALTER TABLE `Rencontres`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `Equipes`
--
ALTER TABLE `Equipes`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT pour la table `Joueurs`
--
ALTER TABLE `Joueurs`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `Rencontres`
--
ALTER TABLE `Rencontres`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
