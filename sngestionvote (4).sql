-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 août 2021 à 21:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sngestionvote`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IDAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(225) NOT NULL,
  `Nom` varchar(225) NOT NULL,
  `Login` varchar(225) NOT NULL,
  `MD` varchar(225) NOT NULL,
  PRIMARY KEY (`IDAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`IDAdmin`, `Prenom`, `Nom`, `Login`, `MD`) VALUES
(1, 'Djibril', 'Sadji', 'dsaye', 'pape');

-- --------------------------------------------------------

--
-- Structure de la table `arrondissement`
--

DROP TABLE IF EXISTS `arrondissement`;
CREATE TABLE IF NOT EXISTS `arrondissement` (
  `IDArrondissement` int(11) NOT NULL AUTO_INCREMENT,
  `NomArrondissement` varchar(30) NOT NULL,
  `IDCommune` int(11) NOT NULL,
  PRIMARY KEY (`IDArrondissement`),
  KEY `Arrondissement_Departement_FK` (`IDCommune`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `arrondissement`
--

INSERT INTO `arrondissement` (`IDArrondissement`, `NomArrondissement`, `IDCommune`) VALUES
(1, 'Sam Notaire', 1),
(2, 'Golf Sud', 1),
(3, 'Medina Gounass', 1),
(4, 'Wakhinane Nimzatt', 1),
(5, ' Ndiareme Limamoulaye', 1),
(6, 'Almadies', 8),
(7, 'Arrondissement de Fissel', 13),
(8, 'Arrondissement de Séssène', 13);

-- --------------------------------------------------------

--
-- Structure de la table `bureau_de_vote`
--

DROP TABLE IF EXISTS `bureau_de_vote`;
CREATE TABLE IF NOT EXISTS `bureau_de_vote` (
  `IDBureau_de_vote` int(11) NOT NULL AUTO_INCREMENT,
  `NomBureau_de_vote` varchar(30) NOT NULL,
  `IDRegion` int(11) NOT NULL,
  `IDDepartement` int(11) NOT NULL,
  `IDArrondissement` int(11) NOT NULL,
  PRIMARY KEY (`IDBureau_de_vote`),
  KEY `Bureau_de_vote_Region_FK` (`IDRegion`),
  KEY `Bureau_de_vote_Departement_FK` (`IDDepartement`),
  KEY `Bureau_de_vote_Arrondissement_FK` (`IDArrondissement`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bureau_de_vote`
--

INSERT INTO `bureau_de_vote` (`IDBureau_de_vote`, `NomBureau_de_vote`, `IDRegion`, `IDDepartement`, `IDArrondissement`) VALUES
(1, 'bureau1', 1, 1, 1),
(2, 'bureau2', 1, 2, 6),
(3, 'bureau1', 2, 7, 7),
(4, 'bureau2', 2, 7, 7);

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `IDCandidat` int(11) NOT NULL AUTO_INCREMENT,
  `NomCandidat` varchar(30) NOT NULL,
  `NomParti` varchar(10) NOT NULL,
  `nomfic` varchar(225) NOT NULL,
  PRIMARY KEY (`IDCandidat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`IDCandidat`, `NomCandidat`, `NomParti`, `nomfic`) VALUES
(1, 'Ousmane SONKO', 'PASTEF', 'sonko.jpg'),
(2, 'Macky SALL', 'APR', 'mac.jpg'),
(3, 'Khalifa SALL', 'PS', 'kha.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `IDCommune` int(10) NOT NULL AUTO_INCREMENT,
  `NomCommune` varchar(100) NOT NULL,
  `IDDepartement` int(10) NOT NULL,
  PRIMARY KEY (`IDCommune`),
  KEY `IDArrondissement` (`IDDepartement`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`IDCommune`, `NomCommune`, `IDDepartement`) VALUES
(1, 'Guediawaye', 1),
(2, 'Sébikhotane', 2),
(3, 'Diamniadio ', 2),
(6, 'Bargny', 2),
(7, 'Pikine', 2),
(8, 'Dakar', 2),
(9, 'Somone', 7),
(10, 'Saly Portudal', 7),
(11, 'Pout', 4),
(12, 'Thies', 4),
(13, 'Mbour', 7);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `IDDepartement` int(11) NOT NULL AUTO_INCREMENT,
  `NomDepartement` varchar(30) NOT NULL,
  `IDRegion` int(11) NOT NULL,
  PRIMARY KEY (`IDDepartement`),
  KEY `Departement_Region_FK` (`IDRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`IDDepartement`, `NomDepartement`, `IDRegion`) VALUES
(1, 'Guediawaye', 1),
(2, 'Dakar', 1),
(3, 'Rufisque', 1),
(4, 'Thies', 2),
(5, 'Pikine', 1),
(6, 'Tivaouane', 2),
(7, 'Mbour', 2);

-- --------------------------------------------------------

--
-- Structure de la table `electeur`
--

DROP TABLE IF EXISTS `electeur`;
CREATE TABLE IF NOT EXISTS `electeur` (
  `IDElecteur` int(11) NOT NULL AUTO_INCREMENT,
  `CNIElecteur` varchar(20) NOT NULL,
  `NumElecteur` varchar(20) NOT NULL,
  `NomElecteur` varchar(30) NOT NULL,
  `PrenomElecteur` varchar(30) NOT NULL,
  `Sexe` varchar(10) NOT NULL,
  `DateNaiss` date NOT NULL,
  `Lieu` varchar(30) NOT NULL,
  `IDDepartement` int(11) NOT NULL,
  `IDCommune` int(11) NOT NULL,
  `IDArrondissement` int(11) NOT NULL,
  `IDBureau_de_vote` int(11) NOT NULL,
  `IDRegion` int(11) NOT NULL,
  `Profil` varchar(30) NOT NULL,
  `Mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`IDElecteur`),
  KEY `Arrondissement_Electeur_PK` (`IDArrondissement`),
  KEY `Bureau_de_vote_Electeur_PK` (`IDBureau_de_vote`),
  KEY `IDCommune` (`IDCommune`),
  KEY `IDDepartement` (`IDDepartement`),
  KEY `IDRegion` (`IDRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `electeur`
--

INSERT INTO `electeur` (`IDElecteur`, `CNIElecteur`, `NumElecteur`, `NomElecteur`, `PrenomElecteur`, `Sexe`, `DateNaiss`, `Lieu`, `IDDepartement`, `IDCommune`, `IDArrondissement`, `IDBureau_de_vote`, `IDRegion`, `Profil`, `Mdp`) VALUES
(3, '8754432345687', '4556779', 'Mbodje', 'Sokhna Awa', 'femme', '2021-08-10', 'Rufisque', 7, 13, 7, 4, 2, 'sam', 'f02368945726d5fc2a14eb576f7276c0'),
(4, '1234567890', '9876543210', 'Sadji', 'Djibril', 'homme', '2013-06-20', 'Rufisque', 7, 13, 7, 3, 2, 'dsaye', '7a9d438f5bd00a76862ab5b147f9f2b6'),
(5, '52367899', '345478977', 'Fall', 'Samba', 'homme', '2002-06-16', 'pikine', 7, 13, 7, 3, 2, 'samba', '1a1dc91c907325c69271ddf0c944bc72'),
(6, '2344778', '837431444', 'fall', 'Khemitt', 'homme', '2006-03-16', 'guediawaye', 7, 13, 7, 4, 2, 'khemit', '96f223040672ea79c655dceda08e0830'),
(7, '8665553', '5465778', 'Diouf', 'Moussa', 'homme', '1996-06-07', 'pikine', 7, 13, 7, 3, 2, 'Moussa', 'a3c0f833831d2680572c89bec6305fc3'),
(8, '1', '0', 'saye', 'samba', 'homme', '2021-08-19', 'pikine', 7, 13, 7, 4, 2, 'saye', '7a9d438f5bd00a76862ab5b147f9f2b6');

-- --------------------------------------------------------

--
-- Structure de la table `election`
--

DROP TABLE IF EXISTS `election`;
CREATE TABLE IF NOT EXISTS `election` (
  `IDElection` int(11) NOT NULL AUTO_INCREMENT,
  `NomElection` varchar(30) NOT NULL,
  `DateElection` date NOT NULL,
  PRIMARY KEY (`IDElection`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `IDRegion` int(11) NOT NULL AUTO_INCREMENT,
  `NomRegion` varchar(30) NOT NULL,
  PRIMARY KEY (`IDRegion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`IDRegion`, `NomRegion`) VALUES
(1, 'Dakar'),
(2, 'Thies');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `IDVote` int(11) NOT NULL AUTO_INCREMENT,
  `IDCandidat` int(11) NOT NULL,
  `IDElecteur` int(11) NOT NULL,
  PRIMARY KEY (`IDVote`),
  UNIQUE KEY `IDElecteur_2` (`IDElecteur`),
  KEY `Electeur_Vote_PK` (`IDElecteur`),
  KEY `IDCandidat_2` (`IDCandidat`),
  KEY `IDCandidat_3` (`IDCandidat`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`IDVote`, `IDCandidat`, `IDElecteur`) VALUES
(1, 1, 3),
(42, 2, 4),
(46, 1, 5),
(49, 1, 6),
(53, 3, 7),
(54, 1, 8);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `arrondissement`
--
ALTER TABLE `arrondissement`
  ADD CONSTRAINT `arrondissement_ibfk_2` FOREIGN KEY (`IDCommune`) REFERENCES `commune` (`IDCommune`);

--
-- Contraintes pour la table `bureau_de_vote`
--
ALTER TABLE `bureau_de_vote`
  ADD CONSTRAINT `Bureau_de_vote_Arrondissement_FK` FOREIGN KEY (`IDArrondissement`) REFERENCES `arrondissement` (`IDArrondissement`),
  ADD CONSTRAINT `Bureau_de_vote_Departement_FK` FOREIGN KEY (`IDDepartement`) REFERENCES `departement` (`IDDepartement`),
  ADD CONSTRAINT `Bureau_de_vote_Region_FK` FOREIGN KEY (`IDRegion`) REFERENCES `region` (`IDRegion`);

--
-- Contraintes pour la table `commune`
--
ALTER TABLE `commune`
  ADD CONSTRAINT `commune_ibfk_1` FOREIGN KEY (`IDDepartement`) REFERENCES `departement` (`IDDepartement`);

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `Departement_Region_FK` FOREIGN KEY (`IDRegion`) REFERENCES `region` (`IDRegion`);

--
-- Contraintes pour la table `electeur`
--
ALTER TABLE `electeur`
  ADD CONSTRAINT `Arrondissement_Electeur_PK` FOREIGN KEY (`IDArrondissement`) REFERENCES `arrondissement` (`IDArrondissement`),
  ADD CONSTRAINT `Bureau_de_vote_Electeur_PK` FOREIGN KEY (`IDBureau_de_vote`) REFERENCES `bureau_de_vote` (`IDBureau_de_vote`),
  ADD CONSTRAINT `electeur_ibfk_1` FOREIGN KEY (`IDCommune`) REFERENCES `commune` (`IDCommune`),
  ADD CONSTRAINT `electeur_ibfk_2` FOREIGN KEY (`IDDepartement`) REFERENCES `departement` (`IDDepartement`),
  ADD CONSTRAINT `electeur_ibfk_3` FOREIGN KEY (`IDRegion`) REFERENCES `region` (`IDRegion`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `Candidat_Vote_PK` FOREIGN KEY (`IDCandidat`) REFERENCES `candidat` (`IDCandidat`),
  ADD CONSTRAINT `Electeur_Vote_PK` FOREIGN KEY (`IDElecteur`) REFERENCES `electeur` (`IDElecteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
