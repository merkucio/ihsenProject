-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 10 Décembre 2015 à 00:34
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `filmotheque`
--
CREATE DATABASE IF NOT EXISTS `filmotheque` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `filmotheque`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Comedy'),
(2, 'Drama'),
(3, 'Action'),
(4, 'War'),
(5, 'Adventure'),
(6, 'Horror'),
(7, 'Thriller'),
(8, 'Romance'),
(9, 'Fantasy'),
(10, 'Family'),
(11, 'Science-Fiction'),
(12, 'Crime');

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `picture` varchar(100) DEFAULT NULL,
  `trailer` varchar(100) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `duration` double DEFAULT NULL,
  `price` double NOT NULL,
  `year` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `movie`
--

INSERT INTO `movie` (`id`, `title`, `description`, `picture`, `trailer`, `director`, `duration`, `price`, `year`) VALUES
(2, 'The Woman in Black 2 Angel of Death', NULL, 'the-woman-in-black-2.jpg', 'http://teaser-trailer.com/movie/the-woman-in-black-2', 'Tom Harper', 130, 9, 2015),
(3, 'Taken 3', NULL, 'Taken 3.jpg', 'http://teaser-trailer.com/movie/taken-3', NULL, 125, 10, 2015),
(4, 'Cake', NULL, 'cake.jpg', 'http://teaser-trailer.com/movie/cake', 'Daniel Barnz', 120, 8, 2015),
(5, 'Paper Planes', NULL, 'paper-planes', 'http://teaser-trailer.com/movie/paper-planes', 'Robert Connolly', 138, 10, 2015),
(6, 'Blackhat', NULL, 'blackhat.jpg', 'http://teaser-trailer.com/movie/cyber', 'Michael Mann', 128, 10, 2015),
(7, 'Paddington', NULL, 'paddington.jpg', 'http://teaser-trailer.com/movie/paddington', 'Paul King', 110, 7, 2015),
(8, 'Spare Parts', NULL, 'spare-parts.jpg', 'Sean McNamara', 'Sean McNamara', 120, 9, 2015),
(9, 'The Wedding Ringer', NULL, 'the-wedding-ringer.jpg', 'http://teaser-trailer.com/movie/the-wedding-ringer', 'Jeremy Garelick', 118, 9, 2015),
(10, 'Vice', NULL, 'vice.jpg', 'http://teaser-trailer.com/movie/vice', ' Brian A. Miller', 140, 10, 2015),
(11, 'Black Sea', NULL, 'black-sea.jpg', 'http://teaser-trailer.com/movie/black-sea', 'Kevin Macdonald', 128, 10, 2015),
(12, 'Everly', NULL, 'everly.jpg', 'http://teaser-trailer.com/movie/everly', 'Joe Lynch', 120, 11, 2015),
(13, 'Strange Magic', NULL, 'strange-magic.jpg', 'http://teaser-trailer.com/movie/strange-magic', 'Gary Rydstrom', 135, 8, 2015),
(14, 'Black or White', NULL, 'black-or-white.jpg', 'http://teaser-trailer.com/movie/black-and-white', 'Mike Binder', 126, 9, 2015),
(15, 'Project Almanac', NULL, 'project-almanac.jpg', 'http://teaser-trailer.com/movie/wild-card', 'Dean Israelite', 110, 7, 2015),
(16, 'Wild Card', NULL, 'wild-card.jpg', 'http://teaser-trailer.com/movie/wild-card', 'Simon West', 138, 12, 2015),
(17, '5 Clips of Jupiter Ascending', NULL, 'jupiter-ascending.jpg', 'http://teaser-trailer.com/movie/jupiter-ascending', 'Andy Wachowski, Lana Wachowski', 126, 9, 2015),
(18, 'The Voices', NULL, 'the voices.jpg', 'http://teaser-trailer.com/movie/the-voices', 'Marjane Satrapi', 127, 8, 2015),
(19, 'Playing it Cool', NULL, 'a-many-splintered-thing.jpg', 'http://teaser-trailer.com/movie/a-many-splintered-thing', 'ustin Reardon', 118, 10, 2015),
(20, 'Wyrmwood Road of the Dead', NULL, 'wyrmwood.jpg', 'http://teaser-trailer.com/movie/wyrmwood', 'Kiah Roache-Turner', 140, 12, 2015),
(21, 'Dragon Blade', NULL, 'dragon-blade', 'http://teaser-trailer.com/movie/dragon-blade', 'Daniel Lee', 150, 10, 2015),
(22, 'the-duff', NULL, 'the-duff.jpg', 'http://teaser-trailer.com/movie/the-duff', 'Ari Sandel', 120, 10, 2015),
(23, '71', NULL, '71.jpg', 'http://teaser-trailer.com/movie/71', 'Yann Demange', 130, 12, 2015),
(24, 'The Lazarus Effect', NULL, 'the-lazarus-effect.jpg', 'http://teaser-trailer.com/movie/lazarus', 'David Gelb', 123, 11, 2015),
(25, 'mortdecai', NULL, 'mortdecai.jpg', 'http://teaser-trailer.com/movie/mortdecai', 'David Koepp', 126, 10, 2015);

-- --------------------------------------------------------

--
-- Structure de la table `movie_category`
--

CREATE TABLE IF NOT EXISTS `movie_category` (
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  KEY `movie_id` (`movie_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrateur du systeme'),
(2, 'user', 'Utilisateur du systeme');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `creationdate` date DEFAULT NULL,
  `addresse` text,
  `cellulaire` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `creationdate`, `addresse`, `cellulaire`) VALUES
(23, 'rafik', 'rafik', 'rafik', '900150983cd24fb0d6963f7d28e17f72', 'e@d.c', '2015-12-09', 'dddd', '(888) 777-8888'),
(24, 'ihsen', 'ihsen', 'ihsen', '900150983cd24fb0d6963f7d28e17f72', 'er@ttt.com', '2015-12-01', 'test', '(222) 585-8889');

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `Id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  KEY `Id_user` (`Id_user`,`id_role`),
  KEY `Id-role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_role`
--

INSERT INTO `user_role` (`Id_user`, `id_role`) VALUES
(23, 2),
(24, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `movie_category`
--
ALTER TABLE `movie_category`
  ADD CONSTRAINT `category_movie_fk` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_category_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `rolefk` FOREIGN KEY (`id_role`) REFERENCES `roles` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `userfk` FOREIGN KEY (`Id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
