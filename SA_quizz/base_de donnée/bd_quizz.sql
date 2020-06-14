-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 14 Juin 2020 à 23:19
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd_quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id_quest` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `Npoint` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_quest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id_quest`, `libelle`, `Npoint`, `type`) VALUES
(1, 'Quelle est la capitale du senegal?', 10, 'type texte'),
(12, 'Capitale du galsen ?', 1, 'type texte'),
(13, 'galsen', 15, 'type texte'),
(14, 'Quelle est la capitale du gana', 15, 'type radio'),
(15, 'Cochez les fruits ?', 18, 'type checkbox'),
(16, 'prÃ©sident de la rÃ©publique', 3, 'type texte'),
(17, 'Cochez les langages de programmation ', 4, 'type checkbox'),
(20, 'Quelle est la capitale de la france', 4, 'type texte'),
(21, 'Le senegal compte combien de regions ?', 3, 'type radio');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `id_rep` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` varchar(100) NOT NULL,
  `etat` varchar(10) NOT NULL,
  `id_quest` int(11) NOT NULL,
  PRIMARY KEY (`id_rep`),
  KEY `reponse_question_FK` (`id_quest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id_rep`, `reponse`, `etat`, `id_quest`) VALUES
(1, 'Dakar', 'true', 1),
(3, 'dakar', 'ok', 12),
(4, 'thies', 'ok', 13),
(5, 'dakar', 'false', 14),
(6, 'accra', 'true', 14),
(7, 'saly', 'false', 14),
(8, 'banane', 'true', 15),
(9, 'orange', 'true', 15),
(10, 'rouge', 'false', 15),
(11, 'macky', 'ok', 16),
(12, 'php', 'true', 17),
(13, 'java', 'true', 17),
(17, 'paris', 'ok', 20),
(18, '14', 'true', 21),
(19, '10', 'false', 21),
(20, '16', 'false', 21);

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `id_score` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(11) NOT NULL,
  `Login` varchar(50) NOT NULL,
  PRIMARY KEY (`id_score`),
  KEY `score_utilisateur_FK` (`Login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `score`
--

INSERT INTO `score` (`id_score`, `score`, `Login`) VALUES
(2, 126, 'mfs'),
(5, 100, 'dabs'),
(67, 0, 'diengsalla95'),
(68, 18, 'joueur'),
(69, 0, 'zoo');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `prenom` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `privilege` varchar(50) NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`Login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`prenom`, `Nom`, `Login`, `pass`, `image`, `privilege`, `statut`) VALUES
('admin', 'admin', 'admin', 'admin', 'lds.jpg', 'admin', 1),
('kalidou', 'Dieng', 'd', 'd', 'C:fakepatha.jpg', 'admin', 1),
('daba', 'diop', 'dabs', '12', 'jM.PNG', 'joueur', 1),
('ASSANE', 'NDIAYE', 'diengsalla95', 's', '', 'joueur', 1),
('joueur', 'joueur', 'joueur', 'joueur', 'lam.jpg', 'joueur', 1),
('Lamane', 'Dieng', 'lds', 'pass', 'IMG-20190323-WA0020.jpg', 'admin', 1),
('Momo', 'Sarr', 'mfs', 'pass', 'lamane.jpg', 'joueur', 1),
('daba', 'seck', 's', 's', '', 'joueur', 1),
('talla', 'gueye', 'tals', 'AA', 'bonne fete.PNG', 'admin', 1),
('cherif', 'mane', 'zoo', 'z', 'C:fakepathaa.jpg', 'joueur', 1),
('assane', 'niang', 'zou', 'z', 'C:fakepathaaa.jpg', 'admin', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_question_FK` FOREIGN KEY (`id_quest`) REFERENCES `question` (`id_quest`);

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_utilisateur_FK` FOREIGN KEY (`Login`) REFERENCES `utilisateur` (`Login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
