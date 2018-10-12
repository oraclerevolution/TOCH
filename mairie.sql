-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 12 oct. 2018 à 19:51
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `id` int(11) NOT NULL,
  `nom_commune` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mail_envoyes`
--

CREATE TABLE `mail_envoyes` (
  `id` int(11) NOT NULL,
  `register_date` datetime NOT NULL,
  `sujet` varchar(50) NOT NULL,
  `le_mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mairie_tables`
--

CREATE TABLE `mairie_tables` (
  `id` int(11) NOT NULL,
  `nom_mairie` varchar(50) NOT NULL,
  `date_register` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `newsletters`
--

INSERT INTO `newsletters` (`id`, `mail`, `register_date`) VALUES
(1, 'assia.ngoran@uvci.edu.ci', '2018-10-02 20:56:06'),
(2, 'zeed@n.nb', '2018-10-05 16:02:11');

-- --------------------------------------------------------

--
-- Structure de la table `services_acceptes`
--

CREATE TABLE `services_acceptes` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `services_attentes`
--

CREATE TABLE `services_attentes` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `services_effectues`
--

CREATE TABLE `services_effectues` (
  `id` int(11) NOT NULL,
  `nom_demandeur` varchar(100) NOT NULL,
  `numero_cni` varchar(100) NOT NULL,
  `email_demandeur` varchar(30) NOT NULL,
  `tel_demandeur` varchar(20) NOT NULL,
  `nom_services` varchar(50) NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `services_refuses`
--

CREATE TABLE `services_refuses` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `services_tables`
--

CREATE TABLE `services_tables` (
  `id` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `descr` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `services_tables`
--

INSERT INTO `services_tables` (`id`, `titre`, `descr`, `photo`, `register_date`) VALUES
(9, 'DÃ©claration de mariage', 'DÃ©clarez vos mariage ici maintenant', 'abeille1.png', '2018-10-05 16:14:09'),
(10, 'DÃ©claration de naissance', 'DÃ©clarez vos naissance ici maintenant', 'lab_separator.png', '2018-10-05 16:14:49');

-- --------------------------------------------------------

--
-- Structure de la table `users_tables`
--

CREATE TABLE `users_tables` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users_tables`
--

INSERT INTO `users_tables` (`id`, `nom`, `email`, `mot_de_passe`, `photo`, `ville`, `register_date`) VALUES
(4, 'oracle', 'assia.ngoran@uvci.edu.ci', 'test', 'profil.jpg', 'anyama', '2018-10-05 17:02:52'),
(5, 'assia', 'assia.ngoran@uvci.edu.ci', 'bonjour', '2.jpg', 'anyama', '2018-10-08 18:10:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mail_envoyes`
--
ALTER TABLE `mail_envoyes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mairie_tables`
--
ALTER TABLE `mairie_tables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services_acceptes`
--
ALTER TABLE `services_acceptes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services_attentes`
--
ALTER TABLE `services_attentes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services_effectues`
--
ALTER TABLE `services_effectues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services_refuses`
--
ALTER TABLE `services_refuses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services_tables`
--
ALTER TABLE `services_tables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_tables`
--
ALTER TABLE `users_tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mail_envoyes`
--
ALTER TABLE `mail_envoyes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mairie_tables`
--
ALTER TABLE `mairie_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `services_acceptes`
--
ALTER TABLE `services_acceptes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services_attentes`
--
ALTER TABLE `services_attentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services_effectues`
--
ALTER TABLE `services_effectues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services_refuses`
--
ALTER TABLE `services_refuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `services_tables`
--
ALTER TABLE `services_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users_tables`
--
ALTER TABLE `users_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
