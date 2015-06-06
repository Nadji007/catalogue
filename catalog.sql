-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 29 Mai 2015 à 18:11
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `catalog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categorie_id` int(100) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`categorie_id`, `nom`) VALUES
(1, 'PC Portable'),
(2, 'PC Bureau'),
(3, 'MacBook'),
(4, 'Tablettes');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `produit_id` int(100) NOT NULL AUTO_INCREMENT,
  `categorie` int(100) NOT NULL,
  `tag` int(100) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `poids` int(100) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`produit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`produit_id`, `categorie`, `tag`, `titre`, `description`, `prix`, `poids`, `image`) VALUES
(1, 1, 4, 'Portable HP 17-f286nf 17,3 - Ordinateur Portable', 'HP 17-f286nf 17,3 - Ordinateur Portable\r\nPortable HP 17-f286nf 17,3 - Ordinateur PortablePortable HP 17-f286nf 17,3 - Ordinateur Portable', '399.50', 12, 'shopping.jpg'),
(2, 2, 6, 'Asus pc bureau', 'Description de produis Description de produis Description de produis Description de produis\r\nDescription de produis Description de produis', '700.00', 22, 'asusb.jpg'),
(3, 2, 2, 'AIO', 'Test ajout produits Test ajout produits Test ajout produits Test ajout produits Test ajout produits Test ajout produits', '455.00', 10, 'transformerAIO.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(100) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`tag_id`, `nom`) VALUES
(3, 'Dell'),
(4, 'HP'),
(6, 'Asus');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
