-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 03 Décembre 2015 à 21:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `locfilm`
--

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `username`) VALUES
(1, 'administrator'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `cellulaire` varchar(50) NOT NULL,
  `adresse` text NOT NULL,
  `datecreation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `cellulaire`, `adresse`, `datecreation`) VALUES
(1, 'chakchouk', 'aa', 'chakchouk@gmail.com', 'Mohamed', 'Salah', '', '', '2015-11-30'),
(2, 'kachkouch', 'bb', 'kachkouch@test.com', 'amine', 'behi', '', '', '2015-11-30'),
(5, 'fsdd', 'aa', '', 'sdf', 'dfd', '(514) 111-2222', '7', '0000-00-00'),
(6, 'fgd', 'cc', '', 'gfdg', 'dfdg', '(514) 111-2222', '77 sherbrook O Montreal', '0000-00-00'),
(7, 'fdf', 'oooo', 'test2@test.com', 'dsf', 'ca', '(514) 222-9658', '48 university Montrel, Qc ', '0000-00-00'),
(8, 'fsd', 'ss', 'tes3@test.com', 'sds', 'sd', '(514) 888-9999', 'dfdsf', '2012-03-15'),
(9, 'ds', 'ss', 'test3@test.com', 'sds', 'ds', '(514) 111-2225', '98 berlioz Montreal ', '2012-03-15');

-- --------------------------------------------------------

--
-- Structure de la table `userole`
--

CREATE TABLE IF NOT EXISTS `userole` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  KEY `id_user` (`id_user`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `userole`
--

INSERT INTO `userole` (`id_user`, `id_role`) VALUES
(1, 1),
(1, 2),
(2, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `userole`
--
ALTER TABLE `userole`
  ADD CONSTRAINT `role_fk` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
