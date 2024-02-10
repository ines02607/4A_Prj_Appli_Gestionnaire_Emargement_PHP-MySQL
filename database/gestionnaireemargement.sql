-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 fév. 2024 à 00:53
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionnaireemargement`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `Numero_etu` int(11) NOT NULL,
  `Nom_etu` varchar(255) NOT NULL,
  `Prenom_etu` varchar(255) NOT NULL,
  `Signature_etu` varchar(255) DEFAULT '',
  `Heure_arrivee_etu` varchar(255) DEFAULT '',
  `Observation_etu` varchar(255) DEFAULT '',
  `Promo_etu` varchar(255) NOT NULL
) ;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Numero_etu`, `Nom_etu`, `Prenom_etu`, `Signature_etu`, `Heure_arrivee_etu`, `Observation_etu`, `Promo_etu`) VALUES
(13000602, 'MONTINI', 'Valentin', '', '', '', '3A FISA'),
(16006843, 'ARAB', 'Ryan', '', '', '', '4A'),
(16037391, 'SEKIAS', 'SHARBEL', '', '', '', '5A INSI'),
(18000087, 'KRAIMI', 'Yanis', '', '', '', '4A'),
(18000910, 'VALOT', 'CHARLES', '', '', '', '5A REVA'),
(18000956, 'GEANO', 'LORENZO', '', '', '', '5A INSI'),
(18001268, 'SOILIHI', 'RASSIMIA', '', '', '', '5A REVA'),
(18003417, 'CHEDED', 'RYAD', '', '', '', '5A INSI'),
(18006446, 'PARDUZI', 'ZANA', '', '', '', '5A INSI'),
(18009939, 'CAOUINI', 'YOUSSEF', '', '', '', '5A INSI'),
(18016884, 'BERGET', 'Loic', '', '', '', '4A'),
(18031231, 'GUIONNET', 'LUC', '', '', '', '5A INSI'),
(18032395, 'FAGOT', 'ROMAIN', '', '', '', '5A INSI'),
(19000243, 'RAOUL', 'FLORENCE', '', '', '', '5A INSI'),
(19000255, 'BELALOUI', 'SHYRIN', '', '', '', '5A INSI'),
(19002144, 'PIANA', 'CLEMENT', '', '', '', '5A REVA'),
(19002895, 'BAIDO', 'FLORIAN', '', '', '', '5A INSI'),
(19004149, 'BROCHART', 'ALEXANDRE', '', '', '', '5A REVA'),
(19006134, 'BEN AMAR', 'HASSENE', '', '', '', '5A REVA'),
(19007550, 'MARRO', 'Camille', '', '', '', '4A'),
(19007832, 'ELOY', 'VICTOR', '', '', '', '5A REVA'),
(19008093, 'DAOUD', 'Bichoy', '', '', '', '3A FISA'),
(19008324, 'GANNE', 'Loic', '', '', '', '4A'),
(19011930, 'BAROUF', 'NASMA', '', '', '', '5A INSI'),
(19013223, 'LEVREAU', 'GHISLAIN', '', '', '', '5A REVA'),
(19017199, 'BARAR', 'BILAL', '', '', '', '5A INSI'),
(19022305, 'LARICE', 'Stéphane', '', '', '', '4A'),
(19022614, 'CHAKER', 'Kamilia', '', '', '', '4A'),
(19028187, 'NGUYEN', 'Thi hang', '', '', '', '3A FISE'),
(19029665, 'BOP', 'Serigne falilou', '', '', '', '4A'),
(20001408, 'ZOUAOUI', 'Akim', '', '', '', '4A'),
(20002810, 'MOURALY', 'Mina', '', '', '', '3A FISE'),
(20003098, 'ARNIAUD', 'Alexandre', '', '', '', '3A FISA'),
(20003850, 'LARDET', 'Vincent', '', '', '', '4A'),
(20004894, 'CORTEZ', 'Fabien', '', '', '', '4A'),
(20005920, 'FEDYNA', 'Kevin', '', '', '', '4A'),
(20006762, 'BOUSMAHA', 'Imène', '', '', '', '4A'),
(20007512, 'MAZOUZ', 'Inès', '', '', '', '4A'),
(20008336, 'BOREL', 'Nathan', '', '', '', '3A FISA'),
(20008543, 'BOSCO', 'Benjamin', '', '', '', '4A'),
(20015034, 'FOURNIER', 'Bastien', '', '', '', '4A'),
(20016987, 'GRANGE', 'Logann', '', '', '', '3A FISA'),
(20017596, 'ABDALLAH', 'Karim', '', '', '', '3A FISE'),
(20019468, 'HOUSSAINI', 'NABIL', '', '', '', '5A INSI'),
(20019869, 'UNG', 'Willy', '', '', '', '3A FISE'),
(20028326, 'MOUDANE', 'HAMZA', '', '', '', '5A INSI'),
(20028424, 'EL AITA', 'Meriem', '', '', '', '3A FISA'),
(20029733, 'DIANI', 'Lina', '', '', '', '3A FISA'),
(20029831, 'EZZINE', 'Anass', '', '', '', '4A'),
(20029900, 'BABA', 'Salma', '', '', '', '3A FISA'),
(20030158, 'CHESNEAU', 'FLORIAN', '', '', '', '5A INSI'),
(20031358, 'HADDAD', 'Mohamed Mehdi', '', '', '', '4A'),
(21201068, 'ALBIN', 'LOLA', '', '', '', '5A INSI'),
(21201384, 'ARBEZ', 'BERENGER', '', '', '', '5A INSI'),
(21202299, 'BOZON', 'ALOIS', '', '', '', '5A INSI'),
(21202779, 'PIGA', 'Caroline', '', '', '', '3A FISE'),
(21203196, 'DUCLOS', 'Léa', '', '', '', '3A FISE'),
(21203799, 'LAZHARI', 'Haroun rachid', '', '', '', '3A FISE'),
(21205800, 'BELAHSEN', 'Ilyes', '', '', '', '3A FISE'),
(21206980, 'MITERAN', 'JUSTIN', '', '', '', '5A INSI'),
(21209607, 'COURT', 'Gabriel', '', '', '', '3A FISE'),
(21210237, 'DERUELLE', 'Olivier', '', '', '', '3A FISE'),
(21210268, 'GUEY', 'Mathis', '', '', '', '3A FISE'),
(21213966, 'SAHNOUN', 'SaIah Eddine', '', '', '', '3A FISE'),
(21214055, 'GUILLAUME', 'Maxime', '', '', '', '3A FISE'),
(21214780, 'BOUTELDJA', 'Wassim', '', '', '', '3A FISA'),
(21215569, 'CEDDAH', 'Mohamed', '', '', '', '3A FISE'),
(21216851, 'MEHALLI', 'Mohamed-Khalil', '', '', '', '3A FISE'),
(21217292, 'ROULLET', 'Alexandre', '', '', '', '3A FISE'),
(21217744, 'SCANDEL', 'Jean', '', '', '', '3A FISA'),
(21218098, 'LENORMAND', 'Yann', '', '', '', '3A FISE'),
(21218624, 'ZOUGGAGH', 'YASMINE', '', '', '', '5A INSI'),
(21219045, 'NTONGA MIMBE', 'CAMILLE', '', '', '', '5A INSI'),
(21220451, 'BOUSQUET', 'ALEXANDRE', '', '', '', '5A INSI'),
(21220826, 'LABROUZI', 'Dalil', '', '', '', '3A FISE'),
(21223248, 'MAHMOUD NEGM', 'KARIMA SALOME', '', '', '', '5A INSI'),
(21224825, 'NASSIH', 'Nabil', '', '', '', '4A'),
(21225143, 'BIROUKANE', 'WASSIM', '', '', '', '5A INSI'),
(21225303, 'TANAJYT', 'NOHAYLA', '', '', '', '5A INSI'),
(21225829, 'LAMY', 'STEPHANE', '', '', '', '5A REVA'),
(21225969, 'ROBERTSON', 'JULIE', '', '', '', '5A INSI'),
(21226226, 'FAKHAR', 'Abdellah', '', '', '', '4A'),
(21226229, 'EL ALLAM', 'AYMAN', '', '', '', '5A INSI'),
(21226279, 'BEN AHMED', 'RAYANE', '', '', '', '5A INSI'),
(21227408, 'MUNOS', 'Romain', '', '', '', '4A'),
(21227492, 'ELOMARI', 'LOKMANE', '', '', '', '5A INSI'),
(21227905, 'DREZEN', 'TRISTAN', '', '', '', '5A INSI'),
(21227960, 'MAFROUM', 'YOUNESS', '', '', '', '5A INSI'),
(21228494, 'DANIEL', 'JOHAN', '', '', '', '5A REVA'),
(21229404, 'CADENEL', 'Dorian', '', '', '', '3A FISE'),
(21232783, 'MBAIWODJI', 'BIENVENUE', '', '', '', '5A INSI'),
(22000733, 'RUNAVOT', 'Louise', '', '', '', '4A'),
(22002108, 'SICARD', 'Louna', '', '', '', '4A'),
(22002109, 'BRISSET', 'Hugo', '', '', '', '4A'),
(22004944, 'BONDON', 'Lucas', '', '', '', '4A'),
(22014217, 'DHUME-SONZOGNI', 'Tillian', '', '', '', '4A'),
(22021501, 'CURINIER', 'Melvin', '', '', '', '4A'),
(22021583, 'DEGRANGE', 'Jonathan', '', '', '', '4A'),
(22022373, 'KOUIDI', 'ISMAIL', '', '', '', '5A INSI'),
(22023639, 'ES-SMAHI', 'HUSSAM', '', '', '', '5A INSI'),
(22024172, 'BOUGLÉ', 'Paul', '', '', '', '4A'),
(22024390, 'LOESEL', 'Alexandre', '', '', '', '4A'),
(22024395, 'ISSAD', 'Aris', '', '', '', '4A'),
(22024431, 'ABBADI', 'Youssef', '', '', '', '4A'),
(22024795, 'OUVRY', 'Félix', '', '', '', '4A'),
(22024986, 'BARDIOT', 'Alexandre', '', '', '', '4A'),
(22024988, 'BENYAICH', 'Ghita', '', '', '', '4A'),
(22025578, 'RÉAUX', 'Renan', '', '', '', '4A'),
(22025659, 'MOISAN', 'Romuald', '', '', '', '4A'),
(22025753, 'FURNON', 'Clément', '', '', '', '3A FISA'),
(22026304, 'SMIRANI', 'IBTIHELL', '', '', '', '5A INSI'),
(22026918, 'SEBAI', 'Anass', '', '', '', '4A'),
(22028029, 'ZAITOUNI', 'Youness', '', '', '', '4A'),
(22028663, 'HEUB', 'Thibaud', '', '', '', '4A'),
(23013597, 'OUCHERIF', 'Roland', '', '', '', '3A FISE'),
(23018444, 'LIÉGEARD', 'Nicolas', '', '', '', '3A FISE'),
(23020230, 'CALLERA FILHO', 'Fernando', '', '', '', '4A'),
(23023719, 'BOUKHRIS', 'Mohamed lyazid', '', '', '', '3A FISE'),
(23024585, 'BARA', 'Soukaina', '', '', '', '4A'),
(23024748, 'RAMDAN', 'Taha', '', '', '', '3A FISE'),
(23024985, 'EL FOULDI', 'Ibtissam', '', '', '', '3A FISE'),
(23025316, 'BRUNET', 'Adrien', '', '', '', '3A FISE'),
(23025476, 'DE LILLO', 'Lorenzo', '', '', '', '3A FISA'),
(23025572, 'DEBBIOUI', 'Houria', '', '', '', '3A FISE'),
(23025620, 'AJELLABI', 'Imrane', '', '', '', '3A FISE'),
(23026015, 'MOUNSIF', 'Najib', '', '', '', '3A FISE'),
(23026066, 'SOARES DE OLIVERA', 'Dielson', '', '', '', '4A'),
(23026083, 'TEIXEIRA VENANCIO', 'Daniel Augusto', '', '', '', '4A'),
(23026139, 'DESAUBLIAUX', 'Arthur', '', '', '', '3A FISA'),
(23026204, 'BOUCHTITA', 'Achraf', '', '', '', '3A FISA'),
(23026217, 'CONTI', 'Jérémy', '', '', '', '3A FISA'),
(23026222, 'ECHARDOUR', 'Pollyanna-Eva', '', '', '', '3A FISA'),
(23026571, 'GOMAN', 'Valentine', '', '', '', '3A FISE'),
(23026742, 'ASMOUN', 'Anouar', '', '', '', '3A FISE'),
(23027168, 'HABOUZA', 'Nouhayla', '', '', '', '4A'),
(23028257, 'GUILLEM', 'Hugo', '', '', '', '3A FISA'),
(23028288, 'LAARABI', 'Hanif', '', '', '', '3A FISA'),
(23028892, 'BELHAMRA', 'Mohssine', '', '', '', '3A FISE'),
(24000001, 'HABOUZA', 'Nouhayla', '', '', '', '4A'),
(24000002, 'HABOUZA', 'Nouhayla', '', '', '', '4A'),
(24000003, 'HABOUZA', 'Nouhayla', '', '', '', '4A'),
(24000004, 'HABOUZA', 'Nouhayla', '', '', '', '4A'),
(24000005, 'HABOUZA', 'Nouhayla', '', '', '', '4A'),
(24000006, 'HABOUZA', 'Nouhayla', '', '', '', '4A'),
(24000007, 'HABOUZA', 'Nouhayla', '', '', '', '4A'),
(24000008, 'HABOUZA', 'Nouhayla', '', '', '', '4A'),
(24000009, 'HABOUZA', 'Nouhayla', '', '', '', '4A'),
(24000010, 'HABOUZA', 'Nouhayla', '', '', '', '4A');

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

CREATE TABLE `secretaire` (
  `Id_secretaire` varchar(255) NOT NULL,
  `Nom_secretaire` varchar(255) NOT NULL,
  `Prenom_secretaire` varchar(255) NOT NULL,
  `Adresse_mail` varchar(255) NOT NULL,
  `Mot_de_passe_hache` varchar(32) NOT NULL,
  `Departement_secretaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `secretaire`
--

INSERT INTO `secretaire` (`Id_secretaire`, `Nom_secretaire`, `Prenom_secretaire`, `Adresse_mail`, `Mot_de_passe_hache`, `Departement_secretaire`) VALUES
('MR001INFO', 'RECORD', 'Marie-Pierre', 'marie-pierre.record@univ-amu.fr', 'cc03380ffa0f747c9cd4645c7ec7fcd1', 'INFO');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`Numero_etu`);

--
-- Index pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD PRIMARY KEY (`Id_secretaire`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
