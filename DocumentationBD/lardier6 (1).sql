-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 18 avr. 2025 à 11:57
-- Version du serveur : 10.11.11-MariaDB-0+deb12u1
-- Version de PHP : 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lardier6`
--

-- --------------------------------------------------------

--
-- Structure de la table `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Comédie'),
(3, 'Drame'),
(4, 'Science-fiction'),
(5, 'Animation'),
(6, 'Thriller'),
(7, 'Horreur'),
(8, 'Aventure'),
(9, 'Fantaisie'),
(10, 'Documentaire');

-- --------------------------------------------------------

--
-- Structure de la table `Favoris`
--

CREATE TABLE `Favoris` (
  `id` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Favoris`
--

INSERT INTO `Favoris` (`id`, `id_profil`, `id_movie`) VALUES
(5, 6, 38),
(7, 10, 47),
(8, 6, 37),
(12, 6, 47),
(17, 8, 47),
(18, 7, 47),
(21, 9, 47),
(23, 10, 7),
(24, 8, 37);

-- --------------------------------------------------------

--
-- Structure de la table `Movie`
--

CREATE TABLE `Movie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `mise_en_avant` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `Movie`
--

INSERT INTO `Movie` (`id`, `name`, `year`, `length`, `description`, `director`, `id_category`, `image`, `trailer`, `min_age`, `mise_en_avant`) VALUES
(7, 'Interstellar', 2014, 169, 'Un groupe d\'explorateurs voyage à travers un trou de ver pour sauver l\'humanité.', 'Christopher Nolan', 4, 'interstellar.jpg', 'https://www.youtube.com/embed/VaOijhK3CRU?si=76Ke4uw4LYjuLuQ6', 12, 1),
(12, 'La Liste de Schindler', 1993, 195, 'Un industriel allemand sauve des milliers de Juifs pendant l\'Holocauste.', 'Steven Spielberg', 3, 'schindler.webp', 'https://www.youtube.com/embed/ONWtyxzl-GE?si=xC3ASGGPy5Ib-aPn', 16, 0),
(17, 'Your Name', 2016, 107, 'Deux adolescents échangent leurs corps de manière mystérieuse.', 'Makoto Shinkai', 5, 'your_name.jpg', 'https://www.youtube.com/embed/AROOK45LXXg?si=aUQyGk2VMCb_ToUL', 10, 0),
(27, 'Le Bon, la Brute et le Truand', 1966, 161, 'Trois hommes se lancent à la recherche d\'un trésor caché.', 'Sergio Leone', 8, 'bon_brute_truand.jpg', 'https://www.youtube.com/embed/WA1hCZFOPqs?si=TwNZAoM4oj4KpGja', 12, 1),
(37, 'Minecraft, le film', 2025, 90, 'Quatre outsiders, Garrett, Henry, Natalie et Dawn, sont soudainement projetés à travers un mystérieux portail menant à la Surface, un incroyable monde cubique qui prospère grâce à l\'imagination.', 'Jared Hess', 1, 'Mincraft.jpeg', 'https://www.youtube.com/embed/7wH09BTl5FU?si=pmhg2kopbquKvj65https://youtu.be/7wH09BTl5FU?si=ifLo10309iywQlox', 6, 0),
(38, 'Insaisissables', 2013, 125, 'Les Quatre Cavaliers, un groupe de brillants magiciens et illusionnistes, vient de donner deux spectacles de magie époustouflants : le premier en braquant une banque sur un autre continent, le deuxième en transférant la fortune d\'un banquier véreux sur les comptes en banque du public. Deux agents spéciaux du FBI et d\'Interpol sont déterminés à les arrêter avant qu\'ils ne mettent à exécution leur promesse de réaliser des braquages encore plus audacieux.', 'Louis Leterrier', 6, 'Insaisissable', 'https://www.youtube.com/embed/-FeFz-cXILA?si=XG4SJCfL3-lLluRj', 10, 1),
(42, 'Deadpool', 2016, 108, 'Wade Wilson, un ancien militaire des forces spéciales, est devenu mercenaire. Après avoir subi une expérimentation hors-norme qui va accélérer ses pouvoirs de guérison, il va devenir Deadpool. Armé de ses nouvelles capacités et d\'un humour noir survolté, il va traquer l\'homme qui a bien failli anéantir sa vie.', 'Tim Miller', 1, 'Deadpool.jpeg', 'https://www.youtube.com/embed/XWtH7anz7io?si=c1k31lijhNu0NWDR', 17, 0),
(43, 'Meurtre mode d\'emploi', 2024, 258, 'Pip Fitz-Amobi, une femme brillante, ne sait pas si l\'écolière Andie Bell a été tuée par son amant Sal Singh il y a cinq ans. Ils doivent voir jusqu\'où ils iront pour empêcher Pip d\'apprendre la vérité si Sal Singh s\'avère ne pas être le meurtrier.', 'Florence Walker', 6, 'Meutre.jpeg', 'https://www.youtube.com/embed/pflPQskcgo8?si=WJrNhykLPNbQxdsZ', 13, 1),
(47, 'La nounou: Mission afrique du sud ', 2018, 90, 'Henriette Höffner, une nounou allemande expérimentée, accepte une nouvelle mission en Afrique du Sud. Elle doit s\'occuper d\'Anton et Linus, deux jeunes garçons envoyés chez leur grand-père Konrad Eckstein, un vétérinaire et garde-chasse bourru. Au cœur des paysages sauvages sud-africains, Henriette va une fois de plus prouver que son instinct maternel et sa tendresse peuvent réparer les liens familiaux fragiles, tout en découvrant une aventure inattendue où faune, famille et sentiments s\'entremêlent.', 'Udo Witte', 2, 'No.JPEG', 'https://www.youtube.com/embed/HwHe71EIZDg?si=VoFg6zcY4KH2x1Ct', 1, 0),
(48, 'ef', 1, 3, 'lj', 'ede', 8, 'V.png', 'url', 1, 0),
(49, 'zcfes', 2, 4, 'VFVDV', 'scsc', 1, 'DVDV', 'DVDV', 2, 0),
(50, 'zcfes', 2, 4, 'VFVDV', 'scsc', 1, 'DVDV', 'DVDV', 2, 0),
(51, 'zcfes', 2, 4, 'VFVDV', 'scsc', 1, 'DVDV', 'DVDV', 2, 0),
(52, 'zcfes', 2, 4, 'VFVDV', 'scsc', 1, 'DVDV', 'DVDV', 2, 0),
(53, 'zcfes', 2, 4, 'VFVDV', 'scsc', 1, 'DVDV', 'DVDV', 2, 0),
(54, 'zcfes', 2, 4, 'VFVDV', 'scsc', 1, 'DVDV', 'DVDV', 2, 0),
(55, 'zcfes', 2, 4, 'VFVDV', 'scsc', 1, 'DVDV', 'DVDV', 2, 0),
(56, 'zcfes', 2, 4, 'VFVDV', 'scsc', 1, 'DVDV', 'DVDV', 2, 0),
(57, 'zcfes', 2, 4, 'VFVDV', 'scsc', 1, 'DVDV', 'DVDV', 2, 0),
(58, 'zcfes', 2, 4, 'VFVDV', 'scsc', 1, 'DVDV', 'DVDV', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Profil`
--

CREATE TABLE `Profil` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Profil`
--

INSERT INTO `Profil` (`id`, `nom`, `avatar`, `age`) VALUES
(6, 'Cyprien', 'coton-de-Tulear.png', 12),
(7, 'Alex', 'Alex.jpeg', 30),
(8, 'Sarah', 'Sarag.jpg', 8),
(9, 'TOM', 'Sony.jpeg', 5),
(10, 'Arthur', 'Spider.jpeg', 15),
(11, 'NRJGAB', 'nrjgab.png', 17);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Favoris`
--
ALTER TABLE `Favoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profil` (`id_profil`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Index pour la table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Index pour la table `Profil`
--
ALTER TABLE `Profil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `Favoris`
--
ALTER TABLE `Favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `Movie`
--
ALTER TABLE `Movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `Profil`
--
ALTER TABLE `Profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Favoris`
--
ALTER TABLE `Favoris`
  ADD CONSTRAINT `Favoris_ibfk_1` FOREIGN KEY (`id_profil`) REFERENCES `Profil` (`id`),
  ADD CONSTRAINT `Favoris_ibfk_2` FOREIGN KEY (`id_movie`) REFERENCES `Movie` (`id`);

--
-- Contraintes pour la table `Movie`
--
ALTER TABLE `Movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `Category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
