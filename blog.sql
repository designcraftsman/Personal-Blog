-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 nov. 2023 à 18:28
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categorieName` varchar(28) NOT NULL,
  `postsNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categorieName`, `postsNumber`) VALUES
('food', 0),
('health', 0),
('lifestyle', 0),
('science', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `idPost` int(11) NOT NULL,
  `postTitle` varchar(64) NOT NULL,
  `postImg` varchar(256) NOT NULL,
  `postContent` text NOT NULL,
  `postDate` date NOT NULL DEFAULT current_timestamp(),
  `categorie` varchar(128) NOT NULL,
  `postViews` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`idPost`, `postTitle`, `postImg`, `postContent`, `postDate`, `categorie`, `postViews`) VALUES
(11, 'new Post', 'uploads/pexels-alex-andrews-2295744.jpg', 'just some content and description of the page', '2023-11-15', 'science', 4),
(12, 'NEW POST', 'uploads/pexels-beladiya-nikunj-18636914.jpg', 'just some content and description of the page', '2023-11-15', 'science', 3),
(13, 'oussama', 'uploads/pexels-gantas-vaičiulėnas-12360591.jpg', 'just some content and description of the page', '2023-11-15', 'food', 2),
(14, 'oussama fayz is better then ever !', 'uploads/pexels-paul-jousseau-15835031.jpg', 'just some content and description of the page', '2023-11-15', 'health', 3),
(15, 'The effect of livestock on the physiological condition of roe de', 'uploads/pexels-beladiya-nikunj-18636914.jpg', 'Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far bald that roadrunner python inside held shrewdly the manatee.', '2023-11-16', 'health', 1),
(16, 'From Punch Cards to ChatGPT', 'uploads/pexels-beladiya-nikunj-18636914.jpg', 'just some content and description of the page', '2023-11-16', 'health', 1),
(17, 'From Punch Cards to ChatGPT', 'uploads/pexels-gantas-vaičiulėnas-12360591.jpg', 'just some content and description of the page', '2023-11-16', 'science', NULL),
(18, 'oussama fayz is better then ever !', 'uploads/pexels-paul-jousseau-15835031.jpg', 'sssssssssss', '2023-11-16', 'science', 2),
(19, 'oussama fayz is better then ever !', 'uploads/pexels-alex-andrews-2295744.jpg', 'just some content and description of the page', '2023-11-16', 'science', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorieName`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `postCategorie` (`categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `postCategorie` FOREIGN KEY (`categorie`) REFERENCES `categories` (`categorieName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
