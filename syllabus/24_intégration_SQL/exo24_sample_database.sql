-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2024 at 11:26 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4ipw3_sample`
--
CREATE DATABASE IF NOT EXISTS `4ipw3_sample` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `4ipw3_sample`;

-- --------------------------------------------------------

--
-- Table structure for table `t_catalogue`
--

DROP TABLE IF EXISTS `t_catalogue`;
CREATE TABLE IF NOT EXISTS `t_catalogue` (
  `id_cat` int NOT NULL AUTO_INCREMENT,
  `code_cat` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `description_cat` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `color_cat` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `price_cat` int DEFAULT NULL,
  `image_cat` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `t_catalogue`
--

INSERT INTO `t_catalogue` (`id_cat`, `code_cat`, `description_cat`, `color_cat`, `price_cat`, `image_cat`) VALUES
(1, 'DIGI', 'digipass BNP Paribas', 'green', 15, 'model/media/statue.jpg'),
(2, 'VERR', 'verre d\'eau', 'red', 3, 'model/media/statue.jpg'),
(3, 'MOUS1', 'souris d\'ordinateur Nokia', 'blue', 8, ''),
(4, 'MOUS2', 'souris autre d\'ordinateur portable', 'green', 8, ''),
(5, 'MOUS3', 'souris encore une autre d\'ordinateur', 'green', 8, ''),
(6, 'SMAR', 'smartphone Nokia 7.1', 'black', 250, 'model/media/statue.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_deal`
--

DROP TABLE IF EXISTS `t_deal`;
CREATE TABLE IF NOT EXISTS `t_deal` (
  `id_dea` int NOT NULL AUTO_INCREMENT,
  `name_dea` varchar(63) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `is_active_dea` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_dea`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `t_deal`
--

INSERT INTO `t_deal` (`id_dea`, `name_dea`, `is_active_dea`) VALUES
(4, 'vendredi soir', 1),
(5, 'samedi matin', 1),
(7, 'samedi midi', 1),
(8, 'dimanche après-midi', 1),
(13, 'lundi soir', 1),
(12, 'dimanche matin', 1),
(14, 'mardi  soir', 1),
(15, 'mercredi matin', 1),
(16, 'jeudi  soir', 1),
(17, 'vendredi matin', 1),
(18, 'samedi  soir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_player`
--

DROP TABLE IF EXISTS `t_player`;
CREATE TABLE IF NOT EXISTS `t_player` (
  `id_pla` int NOT NULL AUTO_INCREMENT,
  `name_pla` varchar(63) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fk_team_pla` int NOT NULL,
  PRIMARY KEY (`id_pla`),
  KEY `fk_team_pla` (`fk_team_pla`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `t_player`
--

INSERT INTO `t_player` (`id_pla`, `name_pla`, `fk_team_pla`) VALUES
(1, 'Alex', 1),
(2, 'Bertrand', 2),
(3, 'Cédric', 3),
(4, 'Damien', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_score`
--

DROP TABLE IF EXISTS `t_score`;
CREATE TABLE IF NOT EXISTS `t_score` (
  `id_sco` int NOT NULL AUTO_INCREMENT,
  `score_sco` int NOT NULL,
  `date_sco` datetime DEFAULT NULL,
  `fk_player_sco` int NOT NULL,
  `fk_deal_sco` int DEFAULT NULL,
  PRIMARY KEY (`id_sco`),
  KEY `fk_player_sco` (`fk_player_sco`),
  KEY `fk_deal_sco` (`fk_deal_sco`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `t_score`
--

INSERT INTO `t_score` (`id_sco`, `score_sco`, `date_sco`, `fk_player_sco`, `fk_deal_sco`) VALUES
(1, 100, NULL, 1, 1),
(2, 182, NULL, 2, 1),
(3, 197, NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_team`
--

DROP TABLE IF EXISTS `t_team`;
CREATE TABLE IF NOT EXISTS `t_team` (
  `id_tea` int NOT NULL AUTO_INCREMENT,
  `name_tea` varchar(63) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_tea`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `t_team`
--

INSERT INTO `t_team` (`id_tea`, `name_tea`) VALUES
(1, 'Ixelles'),
(2, 'Etterbeek'),
(3, 'Watermael');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_player_score_partie`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_player_score_partie`;
CREATE TABLE IF NOT EXISTS `v_player_score_partie` (
`name_pla` varchar(63)
,`score` decimal(32,0)
,`partie` varchar(63)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_player_team`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_player_team`;
CREATE TABLE IF NOT EXISTS `v_player_team` (
`player` varchar(63)
,`team` varchar(63)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_team_score`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `v_team_score`;
CREATE TABLE IF NOT EXISTS `v_team_score` (
`name` varchar(63)
,`score` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure for view `v_player_score_partie`
--
DROP TABLE IF EXISTS `v_player_score_partie`;

DROP VIEW IF EXISTS `v_player_score_partie`;
CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_player_score_partie`  AS SELECT `t_player`.`name_pla` AS `name_pla`, sum(`t_score`.`score_sco`) AS `score`, `t_deal`.`name_dea` AS `partie` FROM ((`t_score` join `t_player` on((`t_score`.`fk_player_sco` = `t_player`.`id_pla`))) join `t_deal` on((`t_deal`.`id_dea` = `t_score`.`fk_deal_sco`))) GROUP BY `t_player`.`name_pla`, `t_deal`.`name_dea``name_dea`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_player_team`
--
DROP TABLE IF EXISTS `v_player_team`;

DROP VIEW IF EXISTS `v_player_team`;
CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_player_team`  AS SELECT `t_player`.`name_pla` AS `player`, `t_team`.`name_tea` AS `team` FROM (`t_player` join `t_team` on((`t_player`.`fk_team_pla` = `t_team`.`id_tea`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_team_score`
--
DROP TABLE IF EXISTS `v_team_score`;

DROP VIEW IF EXISTS `v_team_score`;
CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_team_score`  AS SELECT `t_team`.`name_tea` AS `name`, sum(`t_score`.`score_sco`) AS `score` FROM ((`t_score` join `t_player` on((`t_score`.`fk_player_sco` = `t_player`.`id_pla`))) join `t_team` on((`t_team`.`id_tea` = `t_player`.`fk_team_pla`))) GROUP BY `t_team`.`name_tea``name_tea`  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
