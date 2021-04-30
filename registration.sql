-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 30 Avril 2021 à 20:21
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

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

--
-- Contenu de la table `likes`
--

INSERT INTO `likes` (`id`, `utilisateur_id`, `question_id`) VALUES
(1, 11, 13),
(2, 15, 15),
(3, 14, 11),
(4, 14, 13);

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

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `titre`, `categorie_id`, `auteur_id`, `date_creation`) VALUES
(10, 'Il fait froid dans l\'espace?', 5, 14, '2021-04-30 21:46:22'),
(11, 'Qui va gagner la coupe du monde de foot selon vous ?', 3, 11, '2021-04-30 21:47:15'),
(12, 'Est-ce que les thÃ©atre vont bientot rouvrir ?', 6, 12, '2021-04-30 21:48:57'),
(13, 'Peut-on Ãªtre heureux dans un mÃ©tier qui nous plaÃ®t pas ?', 7, 10, '2021-04-30 21:49:41'),
(14, 'La culture rend-elle libre ?', 7, 10, '2021-04-30 22:04:54'),
(15, 'Qui joue encore a call of duty ?', 8, 11, '2021-04-30 22:05:43');

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

--
-- Contenu de la table `repondre`
--

INSERT INTO `repondre` (`utilisateurs_id`, `questions_id`, `date`, `reponse`) VALUES
(9, 12, '2021-04-30 20:15:54', 'Le 19 mai 2021'),
(11, 10, '2021-04-30 20:08:58', 'Il fait chaud le jour et froid la nuit'),
(13, 13, '2021-04-30 20:10:26', 'Â¯\\_(ãƒ„)_/Â¯'),
(14, 13, '2021-04-30 20:12:44', 'Tu peut etre heureux dans tes activitÃ©s a coter...'),
(15, 15, '2021-04-30 20:11:31', 'Moi Ã§a m\'arrive de temps en temps');

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
(9, 'Tristan', 'tristan@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://pbs.twimg.com/media/D1pwqfSX0AE4sDH.jpg', 'H', '2021-04-30 12:02:29', 'admin'),
(10, 'Victor', 'victor@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/avatars/1e/1ee23d4bfbaa9bb8347547b565aef24b21ce645b_full.jpg', 'H', '2021-04-30 12:02:48', 'membre'),
(11, 'Arthur', 'arthur@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://images-ext-1.discordapp.net/external/YIT8NdK0R-ww551zkAUjoasz-xisj4LqQZ6cS2_QWqQ/https/static.cotemaison.fr/medias_10824/w_2048%2Ch_1146%2Cc_crop%2Cx_0%2Cy_184/w_640%2Ch_360%2Cc_fill%2Cg_north/v1456392403/10-conseils-pour-rendre-votre-chien-heureux_5542245.jpg?width=500&height=281', 'H', '2021-04-30 12:03:03', 'membre'),
(12, 'Alice', 'alice@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://i.pinimg.com/474x/ea/b2/4c/eab24ccc66ba99ada12e60d3a3924537.jpg', 'F', '2021-04-30 12:09:35', 'membre'),
(13, 'Lucie', 'lucie@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://pbs.twimg.com/media/EbHFJNfWoAAJbwI.jpg', 'F', '2021-04-30 12:11:28', 'membre'),
(14, 'Jean', 'jean@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://www.tenforums.com/geek/gars/images/2/types/thumb_15951118880user.png', 'H', '2021-04-30 12:18:46', 'membre'),
(15, 'Mark', 'mark@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://voi.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Fprismamedia_people.2F2019.2F06.2F05.2Fc75c0580-99ff-4bbd-9909-5c6fdff10e05.2Ejpeg/380x380/quality/80/mark-wahlberg.jpg', 'H', '2021-04-30 12:20:04', 'membre'),
(16, 'Nolan', 'nolan@gmail.com', '2081875a903c1f45fa320761d7c72ff591fddca3e341621543bc7ab8c9759ad1', 'https://www.thewrap.com/wp-content/uploads/2021/03/Invincible.jpeg', 'H', '2021-04-30 12:20:52', 'membre');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
