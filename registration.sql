-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 30 Avril 2021 à 16:06
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `registration`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(3, 'Sport'),
(4, 'Cinema'),
(5, 'Culture'),
(6, 'Theatre'),
(7, 'Philosophie'),
(8, 'Jeux Videos'),
(9, 'Musique');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `auteur_id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `repondre`
--

CREATE TABLE `repondre` (
  `utilisateurs_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `reponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `genre` char(1) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `mot_de_passe`, `avatar`, `genre`, `date_inscription`, `role`) VALUES
(9, 'Tristan', 'tristan@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png', 'H', '2021-04-30 12:02:29', 'admin'),
(10, 'Victor', 'victor@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png', 'H', '2021-04-30 12:02:48', 'membre'),
(11, 'Arthur', 'arthur@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png', 'H', '2021-04-30 12:03:03', 'membre'),
(12, 'Alice', 'alice@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png', 'F', '2021-04-30 12:09:35', 'membre'),
(13, 'Lucie', 'lucie@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png', 'F', '2021-04-30 12:11:28', 'membre'),
(14, 'Jean', 'jean@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png', 'H', '2021-04-30 12:18:46', 'membre'),
(15, 'Mark', 'mark@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png', 'H', '2021-04-30 12:20:04', 'membre'),
(16, 'Nolan', 'nolan@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png', 'H', '2021-04-30 12:20:52', 'membre');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `auteur_id` (`auteur_id`);

--
-- Index pour la table `repondre`
--
ALTER TABLE `repondre`
  ADD PRIMARY KEY (`utilisateurs_id`,`questions_id`),
  ADD KEY `questions_id` (`questions_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`auteur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `repondre`
--
ALTER TABLE `repondre`
  ADD CONSTRAINT `repondre_ibfk_1` FOREIGN KEY (`utilisateurs_id`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `repondre_ibfk_2` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
