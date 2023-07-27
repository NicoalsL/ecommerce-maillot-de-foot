-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 27 juil. 2023 à 16:43
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce_maillot`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `Id_achat` int NOT NULL AUTO_INCREMENT,
  `date_achat` datetime DEFAULT NULL,
  `prix_totale` int DEFAULT NULL,
  `Id_users` int NOT NULL,
  PRIMARY KEY (`Id_achat`),
  KEY `Id_users` (`Id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `affiliation`
--

DROP TABLE IF EXISTS `affiliation`;
CREATE TABLE IF NOT EXISTS `affiliation` (
  `Id_club` int NOT NULL,
  `Id_equipementier` int NOT NULL,
  `date_debut` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_club`,`Id_equipementier`),
  KEY `Id_equipementier` (`Id_equipementier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `affiliation`
--

INSERT INTO `affiliation` (`Id_club`, `Id_equipementier`, `date_debut`, `date_fin`) VALUES
(1, 4, '2023-04-25 11:12:50', NULL),
(2, 4, '2023-04-25 11:13:11', NULL),
(3, 7, '2023-05-20 19:06:10', NULL),
(4, 10, '2023-06-04 19:45:38', NULL),
(5, 9, '2023-06-04 19:45:47', NULL),
(6, 7, '2023-06-04 19:46:05', NULL),
(7, 8, '2023-06-04 19:46:15', NULL),
(8, 9, '2023-06-04 19:46:29', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_categorie` int NOT NULL AUTO_INCREMENT,
  `categorie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`Id_categorie`, `categorie`) VALUES
(1, 'maillot'),
(2, 'short'),
(3, 'chausette'),
(4, 'Survêtement');

-- --------------------------------------------------------

--
-- Structure de la table `championnat`
--

DROP TABLE IF EXISTS `championnat`;
CREATE TABLE IF NOT EXISTS `championnat` (
  `Id_championnat` int NOT NULL AUTO_INCREMENT,
  `championnat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo_championnat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_championnat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `championnat`
--

INSERT INTO `championnat` (`Id_championnat`, `championnat`, `logo_championnat`) VALUES
(1, 'Ligue 1', '_Ligue 1.png'),
(2, 'Serie A', '_Serie A.png'),
(3, 'Bundesliga', '_Bundesliga.png'),
(4, 'Liga BBVA', '_Liga BBVA.png'),
(6, 'Premier League', '_Premier League.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `Id_club` int NOT NULL AUTO_INCREMENT,
  `club` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_club`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`Id_club`, `club`, `logo`) VALUES
(3, 'Olympique Lyonnais', '_Olympique Lyonnais.png'),
(4, 'Olympique de Marseille', '_Olympique de Marseille.png'),
(5, 'As Monaco', '_As Monaco.png'),
(6, 'Arsenal', '_Arsenal.png'),
(7, 'Chelsea Fc', '_Chelsea Fc.png'),
(8, 'Fc Nantes', '_Fc Nantes.png');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Id_produit_fini` int NOT NULL,
  `Id_panier` int NOT NULL,
  `quantiter` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_produit_fini`,`Id_panier`),
  KEY `Id_panier` (`Id_panier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`Id_produit_fini`, `Id_panier`, `quantiter`) VALUES
(1, 3, '1'),
(2, 2, '1'),
(4, 2, '1'),
(6, 3, '1'),
(8, 2, '1'),
(9, 2, '1'),
(15, 1, '1'),
(25, 1, '1'),
(43, 1, '1');

-- --------------------------------------------------------

--
-- Structure de la table `equipementier`
--

DROP TABLE IF EXISTS `equipementier`;
CREATE TABLE IF NOT EXISTS `equipementier` (
  `Id_equipementier` int NOT NULL AUTO_INCREMENT,
  `equipementier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo_equipementier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_equipementier`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipementier`
--

INSERT INTO `equipementier` (`Id_equipementier`, `equipementier`, `logo_equipementier`) VALUES
(7, 'Adidas', '_Adidas.jpg'),
(8, 'Nike', '_Nike.jpg'),
(9, 'Kappa', '_Kappa.webp'),
(10, 'Puma', '_Puma.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `Id_panier` int NOT NULL AUTO_INCREMENT,
  `date_panier` datetime DEFAULT CURRENT_TIMESTAMP,
  `Id_users` int NOT NULL,
  PRIMARY KEY (`Id_panier`),
  KEY `Id_users` (`Id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`Id_panier`, `date_panier`, `Id_users`) VALUES
(1, NULL, 1),
(2, NULL, 2),
(3, '2023-05-26 13:38:51', 3);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `Id_produits` int NOT NULL AUTO_INCREMENT,
  `produits` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `couleur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Id_saison` int NOT NULL,
  `Id_type_maillot` int NOT NULL,
  `Id_championnat` int NOT NULL,
  `Id_club` int NOT NULL,
  `Id_categorie` int NOT NULL,
  PRIMARY KEY (`Id_produits`),
  KEY `Id_saison` (`Id_saison`),
  KEY `Id_type_maillot` (`Id_type_maillot`),
  KEY `Id_championnat` (`Id_championnat`),
  KEY `Id_club` (`Id_club`),
  KEY `Id_categorie` (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`Id_produits`, `produits`, `image`, `couleur`, `Id_saison`, `Id_type_maillot`, `Id_championnat`, `Id_club`, `Id_categorie`) VALUES
(1, NULL, 'maillot_ol_d.jpg', 'Blanc', 1, 1, 1, 3, 1),
(2, NULL, 'maillot_ol_ex.jpg', 'rouge', 1, 2, 1, 3, 1),
(3, NULL, 'H25652ShortArsenalDomicile202223.jpg', 'Blanc', 1, 1, 1, 3, 2),
(4, NULL, 'maillot_om_d.jpg', 'Blanc', 1, 1, 1, 4, 1),
(5, NULL, 'maillot_arsenal_d.jpg', 'rouge', 1, 1, 6, 6, 1),
(6, NULL, 'H25652ShortArsenalDomicile202223.jpg', 'Blanc', 1, 1, 6, 6, 2),
(7, NULL, 'DN2712253MaillotChelseaEurope20222023.webp', 'bleu', 1, 2, 6, 7, 1),
(8, NULL, 'HF0709MaillotArsenalEurope202223.webp', 'Rose', 1, 2, 1, 6, 1),
(9, NULL, 'maillot_asmonaco_d.jpg', 'rouge', 1, 1, 1, 5, 1),
(10, NULL, 'HA5328MaillotArsenalJuniorExterieur202223.webp', 'noir', 1, 3, 6, 6, 1),
(11, NULL, 'short_om_ex.jpg', 'bleu', 1, 2, 1, 4, 2),
(12, NULL, '36183PWA14ShortMonacoExterieur202223.webp', 'noir', 1, 2, 1, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit_fini`
--

DROP TABLE IF EXISTS `produit_fini`;
CREATE TABLE IF NOT EXISTS `produit_fini` (
  `Id_produit_fini` int NOT NULL AUTO_INCREMENT,
  `Id_taille` int NOT NULL,
  `Id_produits` int NOT NULL,
  PRIMARY KEY (`Id_produit_fini`),
  KEY `Id_taille` (`Id_taille`),
  KEY `Id_produits` (`Id_produits`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit_fini`
--

INSERT INTO `produit_fini` (`Id_produit_fini`, `Id_taille`, `Id_produits`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 1, 2),
(7, 2, 2),
(8, 3, 2),
(9, 4, 2),
(10, 5, 2),
(11, 6, 3),
(12, 7, 3),
(13, 8, 3),
(14, 10, 3),
(15, 1, 5),
(16, 2, 5),
(17, 3, 5),
(18, 4, 5),
(19, 5, 5),
(20, 1, 9),
(21, 2, 9),
(22, 3, 9),
(23, 4, 9),
(24, 5, 9),
(25, 1, 8),
(26, 2, 8),
(27, 3, 8),
(28, 4, 8),
(29, 5, 8),
(30, 1, 7),
(31, 2, 7),
(32, 3, 7),
(33, 4, 7),
(34, 5, 7),
(35, 6, 6),
(36, 7, 6),
(37, 8, 6),
(38, 10, 6),
(39, 6, 11),
(40, 7, 11),
(41, 8, 11),
(42, 10, 11),
(43, 6, 12),
(44, 7, 12),
(45, 8, 12),
(46, 10, 12),
(47, 1, 10),
(48, 2, 10),
(49, 3, 10),
(50, 4, 10),
(51, 5, 10),
(52, 1, 4),
(53, 2, 4),
(54, 3, 4),
(55, 4, 4),
(56, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

DROP TABLE IF EXISTS `saison`;
CREATE TABLE IF NOT EXISTS `saison` (
  `Id_saison` int NOT NULL AUTO_INCREMENT,
  `saison` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_saison`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `saison`
--

INSERT INTO `saison` (`Id_saison`, `saison`) VALUES
(1, '2022/2023'),
(2, '2021/2022');

-- --------------------------------------------------------

--
-- Structure de la table `stocker`
--

DROP TABLE IF EXISTS `stocker`;
CREATE TABLE IF NOT EXISTS `stocker` (
  `Id_produit_fini` int NOT NULL,
  `Id_taille` int NOT NULL,
  `quantite` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_produit_fini`,`Id_taille`),
  KEY `Id_taille` (`Id_taille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stocker`
--

INSERT INTO `stocker` (`Id_produit_fini`, `Id_taille`, `quantite`) VALUES
(1, 1, '52'),
(2, 2, '53'),
(3, 3, '54'),
(4, 4, '55'),
(5, 5, '56'),
(6, 1, '130'),
(7, 2, '136'),
(8, 3, '142'),
(9, 4, '148'),
(10, 5, '156'),
(11, 6, '10'),
(12, 7, '10'),
(13, 8, '10'),
(14, 10, '9'),
(15, 1, '10'),
(16, 2, '10'),
(17, 3, '10'),
(18, 4, '9'),
(19, 5, '10'),
(20, 1, '13'),
(21, 2, '15'),
(22, 3, '14'),
(23, 4, '12'),
(24, 5, '11'),
(25, 1, '1'),
(26, 2, '3'),
(27, 3, '4'),
(28, 4, '5'),
(29, 5, '5'),
(30, 1, '4'),
(31, 2, '4'),
(32, 3, '5'),
(33, 4, '4'),
(34, 5, '6'),
(35, 6, '9'),
(36, 7, '6'),
(37, 8, '5'),
(38, 10, '6'),
(39, 6, '20'),
(40, 7, '20'),
(41, 8, '20'),
(42, 10, '19'),
(43, 6, '0'),
(44, 7, '10'),
(45, 8, '10'),
(46, 10, '10'),
(47, 1, '10'),
(48, 2, '10'),
(49, 3, '10'),
(50, 4, '10'),
(51, 5, '10'),
(52, 1, '10'),
(53, 2, '10'),
(54, 3, '10'),
(55, 4, '10'),
(56, 5, '10');

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

DROP TABLE IF EXISTS `taille`;
CREATE TABLE IF NOT EXISTS `taille` (
  `Id_taille` int NOT NULL AUTO_INCREMENT,
  `libeller` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ordre` int DEFAULT NULL,
  PRIMARY KEY (`Id_taille`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `taille`
--

INSERT INTO `taille` (`Id_taille`, `libeller`, `ordre`) VALUES
(1, 'S', 1),
(2, 'M', 2),
(3, 'L', 3),
(4, 'XL', 4),
(5, 'XXL', 5),
(6, '36', 1),
(7, '38', 2),
(8, '40', 3),
(10, '42', 4);

-- --------------------------------------------------------

--
-- Structure de la table `tarification`
--

DROP TABLE IF EXISTS `tarification`;
CREATE TABLE IF NOT EXISTS `tarification` (
  `Id_tarification` int NOT NULL AUTO_INCREMENT,
  `date_tarification` datetime DEFAULT CURRENT_TIMESTAMP,
  `prix` int DEFAULT NULL,
  `Id_produits` int NOT NULL,
  PRIMARY KEY (`Id_tarification`),
  KEY `Id_produits` (`Id_produits`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tarification`
--

INSERT INTO `tarification` (`Id_tarification`, `date_tarification`, `prix`, `Id_produits`) VALUES
(1, '2023-05-20 19:06:59', 7999, 1),
(2, '2023-05-21 02:54:53', 6999, 2),
(3, '2023-05-30 10:40:36', 3999, 3),
(4, '2023-06-04 19:47:12', 7999, 4),
(5, '2023-06-04 19:47:39', 8999, 5),
(6, '2023-06-04 21:53:40', 3999, 6),
(7, '2023-06-04 21:54:11', 6999, 7),
(8, '2023-06-04 21:54:47', 7999, 8),
(9, '2023-06-04 21:55:44', 7000, 9),
(10, '2023-06-04 21:59:47', 5999, 10),
(11, '2023-06-05 17:12:08', 3999, 11),
(12, '2023-06-05 17:25:24', 3999, 12);

-- --------------------------------------------------------

--
-- Structure de la table `type_maillot`
--

DROP TABLE IF EXISTS `type_maillot`;
CREATE TABLE IF NOT EXISTS `type_maillot` (
  `Id_type_maillot` int NOT NULL AUTO_INCREMENT,
  `type_maillot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_type_maillot`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_maillot`
--

INSERT INTO `type_maillot` (`Id_type_maillot`, `type_maillot`) VALUES
(1, 'Domicile'),
(2, 'Exterieur'),
(3, 'Europe');

-- --------------------------------------------------------

--
-- Structure de la table `unite_valeur`
--

DROP TABLE IF EXISTS `unite_valeur`;
CREATE TABLE IF NOT EXISTS `unite_valeur` (
  `Id_categorie` int NOT NULL,
  `Id_taille` int NOT NULL,
  PRIMARY KEY (`Id_categorie`,`Id_taille`),
  KEY `Id_taille` (`Id_taille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `unite_valeur`
--

INSERT INTO `unite_valeur` (`Id_categorie`, `Id_taille`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id_users` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registerDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id_users`, `pseudo`, `email`, `password`, `registerDate`, `admin`) VALUES
(1, 'PremierUser', 'premieruser@gmail.com', '$2y$10$utyY5S9zPwK1l4IYnNog0eZzOnn3bZqv43JprVhkpIZ9BRIueCKE.', '2023-04-25 11:03:34', 1),
(2, 'pamplemousse', 'pamplemousse@gmail.com', '$2y$10$2Y48Lu30JTPbmlecYNV.fOMZ8rIS6XZxBRsuhFGmOCwCRVw6JjQlm', '2023-05-26 09:49:26', 0),
(3, 'pomme', 'pomme@gmail.com', '$2y$10$9lbhjy9XR0tebT5zfbVyU.faN2Tfa.I5EYfTTa4rs2KbEOUedhYBK', '2023-05-26 13:37:01', 0),
(4, 'Poire', 'poire@gmail.com', '$2y$10$uTy93M7ai8/QyCRoDEzQmuwNHFZVf2o5YL9IylD7eLK3S51LpE4ge', '2023-06-01 01:50:13', 0),
(6, 'Ananas', 'ananas@gmail.com', '$2y$10$Wg/T5YmRRoxHir6P.qRUKOjV1KQRaww/qeAlea90wE7Uvmf5q9kWC', '2023-06-01 02:56:38', 0),
(7, 'Raisin', 'raisin@gmail.com', '$2y$10$YVJLvbEVsUlCm4O4Ok3maeL4NYaDlPw8Afo2n50XicntYlusRtup6', '2023-06-01 15:57:56', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `achat_ibfk_1` FOREIGN KEY (`Id_users`) REFERENCES `users` (`Id_users`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`Id_produit_fini`) REFERENCES `produit_fini` (`Id_produit_fini`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`Id_panier`) REFERENCES `panier` (`Id_panier`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`Id_users`) REFERENCES `users` (`Id_users`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`Id_saison`) REFERENCES `saison` (`Id_saison`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`Id_type_maillot`) REFERENCES `type_maillot` (`Id_type_maillot`),
  ADD CONSTRAINT `produits_ibfk_3` FOREIGN KEY (`Id_championnat`) REFERENCES `championnat` (`Id_championnat`),
  ADD CONSTRAINT `produits_ibfk_4` FOREIGN KEY (`Id_club`) REFERENCES `club` (`Id_club`),
  ADD CONSTRAINT `produits_ibfk_5` FOREIGN KEY (`Id_categorie`) REFERENCES `categorie` (`Id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
