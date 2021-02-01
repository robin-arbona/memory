-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 01 fév. 2021 à 11:33
-- Version du serveur :  8.0.22-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memory`
--

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `id` int NOT NULL,
  `type` int DEFAULT NULL,
  `points` int DEFAULT NULL,
  `shot` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `levels`
--

INSERT INTO `levels` (`id`, `type`, `points`, `shot`) VALUES
(1, 3, 3, 7),
(2, 4, 4, 9),
(3, 5, 5, 11),
(4, 6, 6, 13),
(5, 7, 7, 15),
(6, 8, 8, 17),
(7, 9, 9, 19),
(8, 10, 10, 21),
(9, 11, 11, 23),
(10, 12, 12, 25);

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

CREATE TABLE `scores` (
  `id` int NOT NULL,
  `id_levels` int DEFAULT NULL,
  `id_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `scores`
--

INSERT INTO `scores` (`id`, `id_levels`, `id_user`) VALUES
(12, 1, 1),
(13, 1, 5),
(14, 1, 1),
(15, 1, 1),
(16, 1, 5),
(17, 1, 5),
(39, 1, 1),
(49, 1, 1),
(51, 2, 1),
(52, 1, 12);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'robin', '$2y$10$3qYoYqocMqOyeFPPpp2a5Osc70slFiJujNOr7882xuHtBcBz3Hz1K'),
(2, 'marion', '$2y$10$8giSFKlpuFhgHoJWMl/2m./cFXBJLlUfIijdX0w7XJetZ1he3Ua3.'),
(3, 'nolan', '$2y$10$jRJh6rNEFRA9aPv7zv7LZ.ZFYDb8N.eim8I7lYwY7IhNnCxT0CM/.'),
(4, 'mathis', '$2y$10$kSPgsz5rMqrvIY6npqYrh.aMQzTtxitgHKere89zd3iKtquTCKDDO'),
(5, 'pierre', '$2y$10$rMKZH0a9LHH8qJihoNIvLOxU10d2/t94hh8tDb6hwGEBXo9fyzGg2'),
(6, 'fran', '$2y$10$74lrt3/aOhguddXMt1OqgOSx4STma8n0lyGIrAJ4bYG.4E6SWpgKS'),
(7, 'bertran', '$2y$10$sqEXzt22P6HTpp6xsxD0kOLBCK1aW0dd6Qu9uvthKmgtGhPmkFEBm'),
(8, 'elonmusk', '$2y$10$IJGZfFK.bYBWE6hNVqYL0usUJdI7FPxm8xfpBbZILG7uT42IOtqI2'),
(9, 'obione', '$2y$10$bxRlj4htC1sCZN4reCC5suFujmOqa.RVoE4GhsRVPQtsr8ljzmr5u'),
(10, 'jaba', '$2y$10$P8LtKN0Nyj.OAOnG1iwPK.qkrRQDnwAWIFRUsxD55f/hHdypBWr3q'),
(11, 'darthvader', 'd'),
(12, 'jambon', '$2y$10$uhpwsvKKzFTPztu7P8eCyOpwMVJl5BPp583gLewTVKGMixxxJYf6S');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_levels` (`id_levels`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`id_levels`) REFERENCES `levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
