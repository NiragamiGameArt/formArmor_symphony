-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 15, 2022 at 08:50 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symfony5_formarmor`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut_id` int(11) NOT NULL,
  `nom` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbhcpta` smallint(6) NOT NULL,
  `nbhbur` smallint(6) NOT NULL,
  `tel` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C7440455F6203804` (`statut_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `statut_id`, `nom`, `password`, `adresse`, `cp`, `ville`, `email`, `nbhcpta`, `nbhbur`, `tel`) VALUES
(1, 1, 'DUPONT Alain', 'dupal', '3 rue de la gare', '22 200', 'Guingamp', 'dupont.alain127@gmail.com', 70, 175, '06.22.33.45.21'),
(2, 2, 'LAMBERT Alain', 'lamal', '17 rue de la ville', '22 200', 'Guingamp', 'lambert.alain12@gmail.com', 0, 105, '06.22.33.45.22'),
(3, 3, 'SARGES Annie', 'saran', '125 boulevard de Nantes', '35 000', 'Rennes', 'sarges.annie@laposte.net', 160, 70, '06.22.33.45.23'),
(4, 4, 'CHARLES Patrick', 'chapa', '27 Bd Lamartine', '22 000', 'Saint Brieuc', 'charles.patrick@hotmail.fr', 120, 105, '06.22.33.45.24'),
(5, 1, 'SYLVESTRE Marc', 'sylma', '17 rue des ursulines', '22 300', 'Lannion', 'sylvestre.ma@ymail.fr', 0, 70, '06.42.42.58.12');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221113174510', '2022-11-13 17:45:35', 821);

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_form` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diplomante` tinyint(1) NOT NULL,
  `duree` int(11) NOT NULL,
  `coutrevient` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id`, `libelle`, `niveau`, `type_form`, `description`, `diplomante`, `duree`, `coutrevient`) VALUES
(1, 'Access', 'Initiation', 'Bureautique', 'Découverte des fonctionnalités Access', 0, 35, 140),
(2, 'Access', 'Perfectionnement', 'Bureautique', 'Fonctions avancees du logiciel Access', 0, 35, 100),
(3, 'Compta1', 'Initiation compta', 'Compta', 'Découverte des principes d ecriture comptable', 1, 70, 120),
(4, 'Compta2', 'perfectionnement', 'Compta', 'Bilan et compte de résultat', 1, 70, 180),
(5, 'Compta3', 'Perfectionnement', 'Compta', 'Analyse du bilan', 0, 70, 100),
(6, 'Compta4', 'Perfectionnement', 'Bureautique', 'Operations d inventaire', 1, 70, 140),
(7, 'Excel', 'Initiation', 'Bureautique', 'Decouverte du logiciel Excel', 0, 35, 100),
(8, 'Excel', 'Perfectionnement', 'Bureautique', 'Fonctions avancees du logiciel Excel', 0, 35, 110),
(9, 'Word', 'Initiation', 'Bureautique', 'Decouverte du logiciel Word', 0, 35, 100),
(10, 'Word', 'Perfectionnement', 'Bureautique', 'Fonctions avancees du logiciel Word', 0, 35, 110);

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `session_formation_id` int(11) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5E90F6D619EB6921` (`client_id`),
  KEY `IDX_5E90F6D69C9D95AF` (`session_formation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_formation`
--

DROP TABLE IF EXISTS `plan_formation`;
CREATE TABLE IF NOT EXISTS `plan_formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formation_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `effectue` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F09EDCAA5200282E` (`formation_id`),
  KEY `IDX_F09EDCAA19EB6921` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_formation`
--

INSERT INTO `plan_formation` (`id`, `formation_id`, `client_id`, `effectue`) VALUES
(1, 7, 1, 0),
(2, 10, 1, 0),
(3, 2, 2, 0),
(5, 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `session_formation`
--

DROP TABLE IF EXISTS `session_formation`;
CREATE TABLE IF NOT EXISTS `session_formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formation_id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `nb_places` smallint(6) NOT NULL,
  `nb_inscrits` smallint(6) NOT NULL,
  `close` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3A264B55200282E` (`formation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_formation`
--

INSERT INTO `session_formation` (`id`, `formation_id`, `date_debut`, `nb_places`, `nb_inscrits`, `close`) VALUES
(1, 7, '2020-11-16', 18, 0, 0),
(2, 2, '2021-01-04', 16, 0, 0),
(3, 2, '2020-11-09', 16, 0, 0),
(5, 10, '2020-11-30', 18, 0, 0),
(6, 8, '2020-11-23', 18, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taux_horaire` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statut`
--

INSERT INTO `statut` (`id`, `type`, `taux_horaire`) VALUES
(1, '1%', 14),
(2, 'Autre', 9),
(3, 'CIF', 6),
(4, 'SIFE_collectif', 10),
(5, 'SIFE_individuel', 11);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C7440455F6203804` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`);

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `FK_5E90F6D619EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_5E90F6D69C9D95AF` FOREIGN KEY (`session_formation_id`) REFERENCES `session_formation` (`id`);

--
-- Constraints for table `plan_formation`
--
ALTER TABLE `plan_formation`
  ADD CONSTRAINT `FK_F09EDCAA19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_F09EDCAA5200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`);

--
-- Constraints for table `session_formation`
--
ALTER TABLE `session_formation`
  ADD CONSTRAINT `FK_3A264B55200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
