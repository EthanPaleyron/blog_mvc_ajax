-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 18 juin 2024 à 09:35
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_mvc_ajax`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `title_blog` varchar(60) NOT NULL,
  `description_blog` varchar(850) NOT NULL,
  `file_blog` varchar(1000) NOT NULL,
  `datetime_blog` datetime NOT NULL,
  PRIMARY KEY (`id_blog`),
  UNIQUE KEY `id_blog` (`id_blog`),
  KEY `blog_fk1` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_blog`, `id_user`, `title_blog`, `description_blog`, `file_blog`, `datetime_blog`) VALUES
(2, 1, 'titleee', 'bfbrezvrev', '48449973811708957115-clientele-cible.jpg', '2024-06-18 07:18:42');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `id_blog` int NOT NULL,
  `id_user` int NOT NULL,
  `datetime_comment` datetime NOT NULL,
  `content_comment` varchar(250) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_user` (`id_user`),
  KEY `id_blog` (`id_blog`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_blog`, `id_user`, `datetime_comment`, `content_comment`) VALUES
(11, 2, 1, '2024-06-18 11:12:08', 'hello'),
(12, 2, 1, '2024-06-18 11:13:27', 'comment ca va'),
(13, 2, 1, '2024-06-18 11:14:05', 'main non'),
(14, 2, 1, '2024-06-18 11:14:15', 'quoi'),
(15, 2, 1, '2024-06-18 11:17:02', 'lol'),
(16, 2, 1, '2024-06-18 11:17:22', 'hel'),
(17, 2, 1, '2024-06-18 11:19:54', 'hell'),
(18, 2, 1, '2024-06-18 11:21:27', 'mais lol');

-- --------------------------------------------------------

--
-- Structure de la table `sub-comment`
--

DROP TABLE IF EXISTS `sub-comment`;
CREATE TABLE IF NOT EXISTS `sub-comment` (
  `id_sub_comment` int NOT NULL AUTO_INCREMENT,
  `id_comment` int NOT NULL,
  `id_user` int NOT NULL,
  `datetime_sub_comment` datetime NOT NULL,
  `content_sub_content` varchar(250) NOT NULL,
  PRIMARY KEY (`id_sub_comment`),
  KEY `id_comment` (`id_comment`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(120) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'Ethan', '$2y$10$eXkc2Tx/66iyNbV/cVErc.TSOneqkmjrA..Ljtxwo2cPrOxlqDZeu');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id_blog`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `sub-comment`
--
ALTER TABLE `sub-comment`
  ADD CONSTRAINT `sub-comment_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id_comment`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `sub-comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
