-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 juil. 2023 à 10:49
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `app_organisation_contacts`
--
CREATE DATABASE app_organisation;
USE app_organisation;
-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--


CREATE TABLE IF NOT EXISTS `contacts` (
  `id_contacts` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`id_contacts`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id_contacts`, `nom`, `prenom`, `email`, `age`) VALUES
(11, 'Three Days Grace', 'World so cold', 'tw@gmail.com', 25),
(10, 'Rammstein', 'Zeit', 'rz@gmail.com', 30),
(3, 'tang', 'tang', 'tang@gmail.com', 2),
(9, 'civet', 'zourite', 'civet@gmail.com', 2),
(12, 'TRIVIUM', 'until the world goes', 'tu@gmail.com', 16);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
