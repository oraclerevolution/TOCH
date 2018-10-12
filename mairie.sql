-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Octobre 2018 à 14:51
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE IF NOT EXISTS `communes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_commune` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mail_envoyes`
--

CREATE TABLE IF NOT EXISTS `mail_envoyes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `register_date` datetime NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `le_mail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mairie_tables`
--

CREATE TABLE IF NOT EXISTS `mairie_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mairie` varchar(50) NOT NULL,
  `date_register` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `newsletters`
--

INSERT INTO `newsletters` (`id`, `mail`, `register_date`) VALUES
(1, 'assia.ngoran@uvci.edu.ci', '2018-10-02 20:56:06'),
(2, 'zeed@n.nb', '2018-10-05 16:02:11');

-- --------------------------------------------------------

--
-- Structure de la table `services_acceptes`
--

CREATE TABLE IF NOT EXISTS `services_acceptes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `services_attentes`
--

CREATE TABLE IF NOT EXISTS `services_attentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `services_effectues`
--

CREATE TABLE IF NOT EXISTS `services_effectues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_demandeur` varchar(100) NOT NULL,
  `numero_cni` varchar(100) NOT NULL,
  `email_demandeur` varchar(30) NOT NULL,
  `tel_demandeur` varchar(20) NOT NULL,
  `nom_services` varchar(50) NOT NULL,
  `register_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `services_refuses`
--

CREATE TABLE IF NOT EXISTS `services_refuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `services_tables`
--

CREATE TABLE IF NOT EXISTS `services_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `descr` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `services_tables`
--

INSERT INTO `services_tables` (`id`, `titre`, `descr`, `photo`, `register_date`) VALUES
(8, 'Declaration de mariage', 'rÃ©cuperer vos extrait de naissance ici', 'image1.jpg', '2018-10-05 16:13:26'),
(9, 'DÃ©claration de naissance', 'DÃ©clarez dÃ©sormais vos enfants ici', 'image2.jpg', '2018-10-05 16:14:09'),
(10, 'DÃ©claration de dÃ©cÃ¨s', 'DÃ©clarez vos dÃ©cÃ¨s ici maintenant', 'image3.jpg', '2018-10-05 16:14:49'),
(11, 'Copie d''extrait de naissance', 'Faites la demande d''extrait de naissance ici dÃ¨s maintenant', 'image4.jpg', '2018-10-05 16:16:35');

-- --------------------------------------------------------

--
-- Structure de la table `users_tables`
--

CREATE TABLE IF NOT EXISTS `users_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users_tables`
--

INSERT INTO `users_tables` (`id`, `nom`, `email`, `mot_de_passe`, `photo`, `ville`, `register_date`) VALUES
(4, 'oracle', 'assia.ngoran@uvci.edu.ci', 'test', 'profil.jpg', 'anyama', '2018-10-05 17:02:52'),
(5, 'assia', 'assia.ngoran@uvci.edu.ci', 'bonjour', '2.jpg', 'anyama', '2018-10-08 18:10:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
