-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 jan. 2022 à 19:38
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `meteo`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `id_capteur` int(11) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`id_capteur`, `lieu`, `actif`) VALUES
(1, 'Ma chambre', 1),
(2, 'Dehors', 1);

-- --------------------------------------------------------

--
-- Structure de la table `releves`
--

CREATE TABLE `releves` (
  `id_releve` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `temperature` int(11) NOT NULL,
  `humidite` int(11) NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `releves`
--

INSERT INTO `releves` (`id_releve`, `id_capteur`, `temperature`, `humidite`, `heure`) VALUES
(1, 1, 20, 40, '19:00:00'),
(2, 2, -1, 95, '19:10:00'),
(3, 1, 14, 74, '20:00:00'),
(4, 2, 12, 84, '18:44:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`id_capteur`);

--
-- Index pour la table `releves`
--
ALTER TABLE `releves`
  ADD PRIMARY KEY (`id_releve`),
  ADD KEY `FK_ID_CAPTEUR` (`id_capteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `capteurs`
--
ALTER TABLE `capteurs`
  MODIFY `id_capteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `releves`
--
ALTER TABLE `releves`
  MODIFY `id_releve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `releves`
--
ALTER TABLE `releves`
  ADD CONSTRAINT `FK_ID_CAPTEUR` FOREIGN KEY (`id_capteur`) REFERENCES `capteurs` (`id_capteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
