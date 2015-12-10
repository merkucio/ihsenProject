-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Décembre 2015 à 05:19
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
(2, 'The Woman in Black 2 Angel of Death', NULL, 'Content/img/the-woman-in-black-2.jpg', 'http://teaser-trailer.com/movie/the-woman-in-black-2', 'Tom Harper', 130, 9, 2015),
(3, 'Taken 3', NULL, 'Content/img/Taken 3.jpg', 'http://teaser-trailer.com/movie/taken-3', NULL, 125, 10, 2015),
(4, 'Cake', NULL, 'Content/img/cake.jpg', 'http://teaser-trailer.com/movie/cake', 'Daniel Barnz', 120, 8, 2015),
(5, 'Paper Planes', NULL, 'Content/img/paper-planes', 'http://teaser-trailer.com/movie/paper-planes', 'Robert Connolly', 138, 10, 2015),
(6, 'Blackhat', NULL, 'Content/img/blackhat.jpg', 'http://teaser-trailer.com/movie/cyber', 'Michael Mann', 128, 10, 2015),
(7, 'Paddington', NULL, 'Content/img/paddington.jpg', 'http://teaser-trailer.com/movie/paddington', 'Paul King', 110, 7, 2015),
(8, 'Spare Parts', NULL, 'Content/img/spare-parts.jpg', 'Sean McNamara', 'Sean McNamara', 120, 9, 2015),
(9, 'The Wedding Ringer', NULL, 'Content/img/the-wedding-ringer.jpg', 'http://teaser-trailer.com/movie/the-wedding-ringer', 'Jeremy Garelick', 118, 9, 2015),
(10, 'Vice', NULL, 'Content/img/vice.jpg', 'http://teaser-trailer.com/movie/vice', ' Brian A. Miller', 140, 10, 2015),
(11, 'Black Sea', NULL, 'Content/img/black-sea.jpg', 'http://teaser-trailer.com/movie/black-sea', 'Kevin Macdonald', 128, 10, 2015),
(12, 'Everly', NULL, 'Content/img/everly.jpg', 'http://teaser-trailer.com/movie/everly', 'Joe Lynch', 120, 11, 2015),
(13, 'Strange Magic', NULL, 'Content/img/strange-magic.jpg', 'http://teaser-trailer.com/movie/strange-magic', 'Gary Rydstrom', 135, 8, 2015),
(14, 'Black or White', NULL, 'Content/img/black-or-white.jpg', 'http://teaser-trailer.com/movie/black-and-white', 'Mike Binder', 126, 9, 2015),
(15, 'Project Almanac', NULL, 'Content/img/project-almanac.jpg', 'http://teaser-trailer.com/movie/wild-card', 'Dean Israelite', 110, 7, 2015),
(16, 'Wild Card', NULL, 'Content/img/wild-card.jpg', 'http://teaser-trailer.com/movie/wild-card', 'Simon West', 138, 12, 2015),
(17, '5 Clips of Jupiter Ascending', NULL, 'Content/img/jupiter-ascending.jpg', 'http://teaser-trailer.com/movie/jupiter-ascending', 'Andy Wachowski, Lana Wachowski', 126, 9, 2015),
(18, 'The Voices', NULL, 'Content/img/the voices.jpg', 'http://teaser-trailer.com/movie/the-voices', 'Marjane Satrapi', 127, 8, 2015),
(19, 'Playing it Cool', NULL, 'Content/img/a-many-splintered-thing.jpg', 'http://teaser-trailer.com/movie/a-many-splintered-thing', 'ustin Reardon', 118, 10, 2015),
(20, 'Wyrmwood Road of the Dead', NULL, 'Content/img/wyrmwood.jpg', 'http://teaser-trailer.com/movie/wyrmwood', 'Kiah Roache-Turner', 140, 12, 2015),
(21, 'Dragon Blade', NULL, 'Content/img/dragon-blade', 'http://teaser-trailer.com/movie/dragon-blade', 'Daniel Lee', 150, 10, 2015),
(22, 'the-duff', NULL, 'Content/img/the-duff.jpg', 'http://teaser-trailer.com/movie/the-duff', 'Ari Sandel', 120, 10, 2015),
(23, '71', NULL, 'Content/img/71.jpg', 'http://teaser-trailer.com/movie/71', 'Yann Demange', 130, 12, 2015),
(24, 'The Lazarus Effect', NULL, 'Content/img/the-lazarus-effect.jpg', 'http://teaser-trailer.com/movie/lazarus', 'David Gelb', 123, 11, 2015),
(25, 'mortdecai', NULL, 'Content/img/mortdecai.jpg', 'http://teaser-trailer.com/movie/mortdecai', 'David Koepp', 126, 10, 2015);

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
