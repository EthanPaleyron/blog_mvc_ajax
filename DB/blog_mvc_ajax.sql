-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 18 juin 2024 à 15:09
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_blog`, `id_user`, `title_blog`, `description_blog`, `file_blog`, `datetime_blog`) VALUES
(2, 1, 'cible', 'description', '48449973811708957115-clientele-cible.jpg', '2024-06-18 13:47:05'),
(4, 1, 'Javascript', 'use AJAX in my project', '4662195979e36ec678-7984-4cdd-8e4c-a3932772ff8e.gif', '2024-06-18 13:51:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_blog`, `id_user`, `datetime_comment`, `content_comment`) VALUES
(59, 2, 1, '2024-06-18 15:03:40', 'joli cible'),
(60, 4, 1, '2024-06-18 15:03:51', 'wow'),
(73, 2, 1, '2024-06-18 15:08:26', 'pourquoi elle est bugée'),
(74, 4, 1, '2024-06-18 15:08:50', 'c\'est galère le ajax');

-- --------------------------------------------------------

--
-- Structure de la table `sub_comment`
--

DROP TABLE IF EXISTS `sub_comment`;
CREATE TABLE IF NOT EXISTS `sub_comment` (
  `id_sub_comment` int NOT NULL AUTO_INCREMENT,
  `id_comment` int NOT NULL,
  `id_user` int NOT NULL,
  `datetime_sub_comment` datetime NOT NULL,
  `content_sub_comment` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_sub_comment`),
  KEY `id_comment` (`id_comment`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sub_comment`
--

INSERT INTO `sub_comment` (`id_sub_comment`, `id_comment`, `id_user`, `datetime_sub_comment`, `content_sub_comment`) VALUES
(31, 59, 1, '2024-06-18 15:07:40', 'je confirme !'),
(32, 59, 1, '2024-06-18 15:07:54', 'totalement d\'accord'),
(33, 74, 1, '2024-06-18 15:09:08', 'utilise le fetch');

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
-- Contraintes pour la table `sub_comment`
--
ALTER TABLE `sub_comment`
  ADD CONSTRAINT `sub_comment_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id_comment`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `sub_comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
