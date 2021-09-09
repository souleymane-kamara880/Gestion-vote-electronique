-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 18 août 2021 à 16:42
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestvote`
--

-- --------------------------------------------------------

--
-- Structure de la table `arrondissement`
--

CREATE TABLE `arrondissement` (
  `id_arron` int(11) NOT NULL,
  `nom_arron` varchar(30) NOT NULL,
  `id_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `arrondissement`
--

INSERT INTO `arrondissement` (`id_arron`, `nom_arron`, `id_dep`) VALUES
(3, 'Dakar Plateau', 1),
(4, 'Almadie', 1),
(5, 'Parcelles Assainie', 1),
(6, 'Grand Dakar', 1),
(7, 'guediawaye', 4),
(8, 'Pikine Dagoudane', 3),
(9, 'Thiaroye', 3),
(10, 'Niayes', 3),
(11, 'rufisque', 5),
(12, 'sangalkam', 5),
(13, 'mbambilor', 5),
(14, 'thies nord', 6),
(15, 'thies sud', 6),
(16, 'Mbour arrondissement 1', 8),
(17, 'Mbour arrondissement 2', 8);

-- --------------------------------------------------------

--
-- Structure de la table `bureau`
--

CREATE TABLE `bureau` (
  `id_bureau` int(11) NOT NULL,
  `nom_bureau` varchar(40) NOT NULL,
  `id_commune` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bureau`
--

INSERT INTO `bureau` (`id_bureau`, `nom_bureau`, `id_commune`) VALUES
(1, 'bureau1', 1),
(2, 'bureau2', 1),
(3, 'bureau1', 2),
(4, 'bureau2', 2),
(5, 'bureau1', 6),
(6, 'bureau1', 5),
(7, 'bureau1', 3),
(8, 'bureau2', 3),
(9, 'bureau 1', 3),
(10, 'bureau 3', 5),
(11, 'bureau1', 7),
(12, 'bureau2', 7),
(13, 'bureau1', 8),
(14, 'bureau2', 8),
(15, 'bureau 3', 2),
(16, 'bureau1', 4),
(17, 'premier bureau mbour', 4);

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

CREATE TABLE `candidat` (
  `id_candidat` int(11) NOT NULL,
  `nom_candidat` varchar(60) NOT NULL,
  `nom_partie` text NOT NULL,
  `photo_parti` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id_candidat`, `nom_candidat`, `nom_partie`, `photo_parti`) VALUES
(1, 'Macky Sall', 'carantech', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQka_kqfAJ7JkwTm3XEsyziKh0MmuqLai0ErVlK4DMe3P3VVf3xY3TQC6-mx_oHlP81s4E&usqp=CAU'),
(2, 'Ousmane Sonko', 'PASTEF', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHxPtBtn6P5_EkpC5zAGKEbpGpotsG9g0Anc3V31vJH-q9g_e8ywnvSgxXdiI87MsDm24&usqp=CAU'),
(8, 'Baytir ANE', 'ACS', 'https://upload.wikimedia.org/wikipedia/fr/4/46/Rewmi_logo_du_parti.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `id_commune` int(11) NOT NULL,
  `nom_commune` varchar(30) NOT NULL,
  `id_arron` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`id_commune`, `nom_commune`, `id_arron`) VALUES
(1, 'commune thiaroye sud', 9),
(2, 'commune thiaroye nord', 9),
(3, 'commune mbour', 16),
(4, 'Mbour commune', 17),
(5, 'Commune GD', 6),
(6, 'Commune DP', 3),
(7, 'commune des plateau', 3),
(8, 'commune des plateau 2', 3);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id_dep` int(11) NOT NULL,
  `nom_dep` varchar(30) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id_dep`, `nom_dep`, `id_region`) VALUES
(1, 'dakar', 1),
(3, 'pakine', 1),
(4, 'guediawaye', 1),
(5, 'rufisque', 1),
(6, 'thies', 2),
(7, 'tivaoune', 2),
(8, 'mbour', 2);

-- --------------------------------------------------------

--
-- Structure de la table `electeur`
--

CREATE TABLE `electeur` (
  `id_electeur` int(11) NOT NULL,
  `nom_electeur` varchar(40) NOT NULL,
  `prenom_electeur` varchar(40) NOT NULL,
  `cni` double NOT NULL,
  `num_electeur` double NOT NULL,
  `sexe` varchar(30) NOT NULL,
  `date_nais` date NOT NULL,
  `lieu_nais` varchar(30) NOT NULL,
  `adress` varchar(30) NOT NULL,
  `type` varchar(40) NOT NULL DEFAULT 'electeur',
  `status_vote` tinyint(1) NOT NULL DEFAULT 0,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `region` int(11) NOT NULL,
  `dep` int(11) NOT NULL,
  `arron` int(11) NOT NULL,
  `commune` int(11) NOT NULL,
  `id_bureau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `electeur`
--

INSERT INTO `electeur` (`id_electeur`, `nom_electeur`, `prenom_electeur`, `cni`, `num_electeur`, `sexe`, `date_nais`, `lieu_nais`, `adress`, `type`, `status_vote`, `login`, `mdp`, `region`, `dep`, `arron`, `commune`, `id_bureau`) VALUES
(4, 'diouf', 'moussa', 12345, 22222, 'masculin', '2021-08-13', 'khar yalla', 'grand yoff', 'admin', 1, 'diouf', 'pass', 1, 3, 9, 2, 4),
(5, 'kama', 'dior', 12345, 11111, 'feminin', '2021-08-17', 'mbour', 'mbour', 'electeur', 1, 'kama', 'kama', 1, 3, 9, 2, 4),
(6, 'gueye', 'yoro', 12345, 12345, 'masculin', '2021-08-12', 'pikine', 'dakar', 'electeur', 1, 'yoro', 'yoyo', 1, 3, 9, 2, 4),
(7, 'ndiaye', 'abdou khadre', 99999, 99999, 'masculin', '2021-07-28', 'keur massar', 'khar massar', 'electeur', 1, 'ndiaye', 'NDIAYE', 1, 3, 9, 2, 15),
(8, 'kheum', 'Madiambal', 123456, 147852, 'masculin', '2021-08-04', 'dakar', 'fass', 'electeur', 1, 'toto', '1234', 1, 3, 9, 2, 3),
(9, 'diop', 'alpha', 15356987, 15, 'masculin', '2021-08-12', 'dakar', 'fass', 'electeur', 1, 'toto', '12356', 1, 3, 9, 2, 3),
(10, 'saye', 'djibril', 12346, 123654, 'masculin', '2021-08-13', 'khombole', 'fass', 'electeur', 1, 'jojo', '1478', 1, 3, 9, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `id_region` int(11) NOT NULL,
  `nom_region` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`id_region`, `nom_region`) VALUES
(1, 'Dakar'),
(2, 'Thies');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id_vote` int(11) NOT NULL,
  `nom_candidat` varchar(100) NOT NULL,
  `id_candidat` int(11) NOT NULL,
  `id_electeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`id_vote`, `nom_candidat`, `id_candidat`, `id_electeur`) VALUES
(21, 'Ousmane Sonko', 2, 5),
(22, 'Macky Sall', 1, 4),
(23, 'Ousmane Sonko', 2, 6),
(24, 'Ousmane Sonko', 2, 7),
(25, 'Baytir ANE', 8, 8),
(26, 'Macky Sall', 1, 9),
(27, 'Ousmane Sonko', 2, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  ADD PRIMARY KEY (`id_arron`),
  ADD KEY `id_dep` (`id_dep`);

--
-- Index pour la table `bureau`
--
ALTER TABLE `bureau`
  ADD PRIMARY KEY (`id_bureau`),
  ADD KEY `id_commune` (`id_commune`);

--
-- Index pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id_candidat`),
  ADD UNIQUE KEY `photo` (`id_candidat`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id_commune`),
  ADD KEY `id_arron` (`id_arron`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_dep`),
  ADD KEY `id_region` (`id_region`);

--
-- Index pour la table `electeur`
--
ALTER TABLE `electeur`
  ADD PRIMARY KEY (`id_electeur`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id_region`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `id_candidat` (`id_candidat`),
  ADD KEY `id_electeur` (`id_electeur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  MODIFY `id_arron` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `bureau`
--
ALTER TABLE `bureau`
  MODIFY `id_bureau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id_candidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `id_commune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `electeur`
--
ALTER TABLE `electeur`
  MODIFY `id_electeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  ADD CONSTRAINT `arrondissement_ibfk_1` FOREIGN KEY (`id_dep`) REFERENCES `departement` (`id_dep`);

--
-- Contraintes pour la table `bureau`
--
ALTER TABLE `bureau`
  ADD CONSTRAINT `bureau_ibfk_1` FOREIGN KEY (`id_commune`) REFERENCES `commune` (`id_commune`);

--
-- Contraintes pour la table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `commune_ibfk_1` FOREIGN KEY (`id_arron`) REFERENCES `arrondissement` (`id_arron`);

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`id_candidat`) REFERENCES `candidat` (`id_candidat`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`id_electeur`) REFERENCES `electeur` (`id_electeur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
