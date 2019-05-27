DROP DATABASE headdicted;
CREATE DATABASE headdicted;
USE  headdicted;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `headdicted`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `status_id` INT(11) NOT NULL DEFAULT '2'
) ENGINE=INNODB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `user_id`, `status_id`) VALUES
(1, 6, 3),
(2, 7, 3),
(3, 4, 3),
(4, 5, 3),
(5, 3, 1),
(6, 8, 3),
(7, 4, 3),
(8, 8, 3),
(9, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `book_item`
--

CREATE TABLE `book_item` (
  `id` INT(11) NOT NULL,
  `book_id` INT(11) NOT NULL,
  `item_id` INT(11) NOT NULL,
  `price` FLOAT NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book_item`
--

INSERT INTO `book_item` (`id`, `book_id`, `item_id`, `price`) VALUES
(2, 2, 4, 38.99),
(3, 3, 5, 24.99),
(4, 3, 6, 19.99),
(5, 4, 7, 44.99),
(6, 4, 7, 44.99),
(7, 4, 6, 19.99),
(9, 5, 3, 39.99),
(10, 6, 3, 39.99),
(11, 1, 8, 4.99),
(12, 1, 9, 24.99),
(13, 1, 10, 15.99),
(14, 2, 12, 12.99),
(15, 2, 9, 24.99),
(16, 7, 10, 14.99),
(17, 8, 11, 39.99),
(18, 8, 11, 39.99),
(19, 9, 3, 39.99),
(20, 9, 3, 39.99),
(21, 9, 3, 39.99),
(22, 9, 3, 39.99),
(23, 9, 6, 19.99),
(24, 9, 6, 19.99),
(25, 9, 6, 19.99),
(26, 9, 7, 44.99),
(27, 9, 7, 44.99),
(28, 9, 9, 24.99);

-- --------------------------------------------------------

--
-- Structure de la table `info_item`
--

CREATE TABLE `info_item` (
  `id` INT(11) NOT NULL,
  `marque` VARCHAR(1000) NOT NULL,
  `style` VARCHAR(1000) NOT NULL,
  `item_id` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `info_item`
--


INSERT INTO `info_item` (`id`, `marque`, `style`, `item_id`) VALUES
(1, 'Jordan', 'Uni Noir', 3),
(2, 'Everlast', 'Classic', 4),
(3, 'Lacoste', ' Uni Rouge', 5),
(4, 'Jordan', 'Uni Noir', 6),
(5, 'Ellesse', 'Blanc', 7),
(6,'Neant','Facette',8),
(7,'Jordan','Noir éditions PSG',9),
(8,'Jordan','Grise',10),
(9,'Lacoste','Classic',11),
(10,'Lacoste','Carreaux',12);


-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` INT(11) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `price` FLOAT NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`id`, `title`, `price`) VALUES
(3, 'Casquette Jordan', 39.99),
(4, 'Casque de boxe', 38.99),
(5, 'Casquette Lacoste', 24.99),
(6, 'Bob Jordan', 19.99),
(7, 'Berret Ellesse', 44.99),
(8, 'Chappeau festif', 4.99),
(9, 'Bonnet Jordan', 24.99),
(10, 'Casquette Jordan', 14.99),
(11, 'Chappeau Lacoste', 39.99),
(12, 'Casquette Lacoste', 9.99);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'attente'),
(2, 'payee'),
(3, 'validee');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` INT(11) NOT NULL,
  `login` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role_id` INT(11) NOT NULL DEFAULT '2',
  images VARCHAR(100) NOT NULL 
) ENGINE=INNODB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `role_id`) VALUES
(1, 'Admin', '$2y$10$MXT2zHxb3hh06WsB7zFi4ezTPLca4SA3DNh/3d1rRJ7zPi2QTr2o6', 1),
(2, 'nouveau', '$2y$10$B6hXzjLETWNsahEBD/hoFuqWK0UE2DfQMVUxce.Z11U7.ee1..1Am', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Index pour la table `book_item`
--
ALTER TABLE `book_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Index pour la table `info_item`
--
ALTER TABLE `info_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_ibfk_1` (`item_id`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `book_item`
--
ALTER TABLE `book_item`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `info_item`
--
ALTER TABLE `info_item`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Contraintes pour la table `book_item`
--
ALTER TABLE `book_item`
  ADD CONSTRAINT `book_item_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `book_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Contraintes pour la table `info_item`
--
ALTER TABLE `info_item`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




