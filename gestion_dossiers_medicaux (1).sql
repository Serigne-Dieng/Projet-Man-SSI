-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 juin 2024 à 01:36
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_dossiers_medicaux`
--

-- --------------------------------------------------------

--
-- Structure de la table `dossiers_medicaux`
--

CREATE TABLE `dossiers_medicaux` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `medecin_id` int(11) DEFAULT NULL,
  `date_consultation` date DEFAULT NULL,
  `diagnostic` text DEFAULT NULL,
  `prescription` text DEFAULT NULL,
  `etat` enum('Ouvert','En cours','Fermé') DEFAULT NULL,
  `commentaires` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

CREATE TABLE `medecins` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `specialite` varchar(100) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `medecins`
--

INSERT INTO `medecins` (`id`, `nom`, `prenom`, `specialite`, `adresse`, `ville`, `code_postal`, `pays`, `email`, `telephone`) VALUES
(1, 'Fall', 'Moussa', 'dentiste', 'dakar', 'dakar', '123', 'senegal', 'moussa@gmail.com', '76545522562'),
(2, 'Diop', 'Aminata', 'pediatre', 'Fann', 'Dakar', '125', 'senegal', 'aminata@gmail.com', '762564525'),
(3, 'Mérico', 'Ramatoulaye', 'pediatre', 'Almadies', 'Dakar', '162', 'Senegal', 'merico@gmail.com', '45866225'),
(4, 'dieng', 'mansour', 'chirurgien', 'Ouakam', 'dakar', '123', 'Senegal', 'dieng@gmail.com', '2655553');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `genre` enum('Masculin','Féminin') DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `nom`, `prenom`, `date_naissance`, `genre`, `adresse`, `ville`, `code_postal`, `pays`, `email`, `telephone`) VALUES
(1, 'Dianka', 'Oumy', '2024-05-12', 'Féminin', 'yoff', 'Dakar', '123', 'Senegal', 'dianka@gmail.com', '775654456'),
(2, 'Boye', 'Cheikh', '2024-05-15', 'Masculin', 'Sicap', 'Dakar', '123', 'Senegal', 'boycheikh@gmail.com', '76546895'),
(3, 'Boye', 'Modou', '2024-05-15', 'Masculin', 'dakar', 'dakar', '123', 'senegal', 'zoromansour@yahoo.fr', '455666'),
(4, 'Sy', 'Moustapha', '2024-05-17', 'Masculin', 'Ouakam', 'dakar', '123', 'Senegal', 'sy@gmail.com', '4585875'),
(5, 'Toure', 'Ndeye Fatou', '2007-12-29', 'Féminin', 'ouakam', 'Dakar', '123', 'Senegal', 'diengmansour29@gmail.com', '773030806'),
(6, 'ba', 'cheikh', '2024-05-21', 'Masculin', 'guediawaye', 'dakar', '123', 'senegal', 'ba@gmail.com', '55566'),
(7, 'diagne', 'khady', '2024-06-06', 'Masculin', 'dakar', 'dakar', '123', 'senegal', 'khady@gmail.com', '4511111');

-- --------------------------------------------------------

--
-- Structure de la table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `medecin_id` int(11) DEFAULT NULL,
  `date_prescription` date DEFAULT NULL,
  `medicament` varchar(255) DEFAULT NULL,
  `posologie` text DEFAULT NULL,
  `instructions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_id`, `medecin_id`, `date_prescription`, `medicament`, `posologie`, `instructions`) VALUES
(1, 1, 1, '2024-06-03', 'Paracétamol', '2 comprimés / jour (Le matin et le soir)', 'Prendre le médicament après avoir mangé'),
(2, 2, 2, '2024-05-28', 'Humex', '1 comprimé après chaque repas', 'Respecter la dose '),
(3, 4, 2, '2024-05-27', 'Fébrilex', '1 comprimé après chaque repas', 'Prendre le médicament après avoir mangé'),
(4, 5, 2, '2024-05-16', 'Litacol', '2 comprimés / jour (Le matin et le soir)', 'Respecter la dose '),
(5, 5, 1, '2024-06-14', 'Humex', '2 comprimés / jour (Le matin et le soir)', 'Respecter la dose ');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `medecin_id` int(11) DEFAULT NULL,
  `date_rendez_vous` date DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `etat` enum('Planifié','Confirmé','Annulé') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id`, `patient_id`, `medecin_id`, `date_rendez_vous`, `heure_debut`, `duree`, `etat`) VALUES
(1, 1, 1, '2024-06-05', '08:00:00', 30, 'Confirmé'),
(2, 4, 1, '2024-06-23', '12:29:00', 30, 'Confirmé'),
(3, 7, 3, '2024-06-05', '08:00:00', 45, 'Confirmé');

-- --------------------------------------------------------

--
-- Structure de la table `traitements`
--

CREATE TABLE `traitements` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `commentaires` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom_utilisateur`, `mot_de_passe`) VALUES
(1, 'mansour', '$2y$10$a5wiAYe6WEohmSQWR2Dl4e9NZy3tpMjIY0O.hfremupm9CKIAuT6C'),
(2, 'cheikh', '$2y$10$TYtp38yPUkzWdY2mOb1FReJyDOx9yaoxyQA9MmzOUeesIDzFYbyrK'),
(3, 'moustapha', '$2y$10$B6tbtsjBEyB65IQH6Ab4LuiokNmr5wvY3RlnSo4mrayCTMjhs0C/y'),
(4, 'Ndeye Fatou Toure', '$2y$10$5KIpnupeLsCCs7DL9mo.H.e8ILmLeT4OnK6.chVlimZM4dsdLB.Ue'),
(5, 'Ndeye Fatou', '$2y$10$cjEBjk42fZ4V1yTS2G1t9uFsugq4lH.BjmgmME8XNcTI0JEaY59FW'),
(6, 'doudou', '$2y$10$otM6V.xb5.ybhpD0nOvGouRshR5b9aSK.Qn4yRxpNIgDMhEb/Oftu'),
(7, 'doudou', '$2y$10$HFINrKWJ9VWIVUif3QYroOKnbIFkVTtdSS4tK3VQh/UUZTR1sauJO'),
(8, 'moussa', '$2y$10$MMfgczzrmVIvwSBOQJKQOujnobj3KesqbCi4Fsop69oni8kZ9iMR2'),
(9, 'oumyy', '$2y$10$BLyqt/bebTeNQF0.VkkkSe5O4C87RNxVEik/YnR.PfXTzjoLTPr/y'),
(10, 'khady', '$2y$10$AEYKHBEVJgCj4unElA.lKeBov66A5y0Y0.5rIE/msLQA.x4fkwXvW'),
(11, 'idy', '$2y$10$8lrtwthGJaMA0j6bqDG9fu7fs9IYJcUbKqnQtXzFXVu45DFwuLvr.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dossiers_medicaux`
--
ALTER TABLE `dossiers_medicaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `medecin_id` (`medecin_id`);

--
-- Index pour la table `medecins`
--
ALTER TABLE `medecins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `medecin_id` (`medecin_id`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `medecin_id` (`medecin_id`);

--
-- Index pour la table `traitements`
--
ALTER TABLE `traitements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `prescription_id` (`prescription_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dossiers_medicaux`
--
ALTER TABLE `dossiers_medicaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `medecins`
--
ALTER TABLE `medecins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `traitements`
--
ALTER TABLE `traitements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dossiers_medicaux`
--
ALTER TABLE `dossiers_medicaux`
  ADD CONSTRAINT `dossiers_medicaux_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `dossiers_medicaux_ibfk_2` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`);

--
-- Contraintes pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`);

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `rendez_vous_ibfk_2` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`);

--
-- Contraintes pour la table `traitements`
--
ALTER TABLE `traitements`
  ADD CONSTRAINT `traitements_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `traitements_ibfk_2` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
