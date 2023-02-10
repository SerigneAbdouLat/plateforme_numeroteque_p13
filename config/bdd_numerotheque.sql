-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 03:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd_numerotheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteur_informateur`
--

CREATE TABLE `auteur_informateur` (
  `a_i_id` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `type` enum('auteur','informateur') NOT NULL,
  `age` int(10) DEFAULT NULL,
  `niveau_langue` enum('maternUsuelle','materNonUsuelle','autre') DEFAULT NULL,
  `etude` enum('primaire','secondaire','universitaire','aucune','autre') DEFAULT NULL,
  `sexe` enum('masc','fem','autre') DEFAULT NULL,
  `langue_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `calendaire`
--

CREATE TABLE `calendaire` (
  `calendaire_id` int(11) NOT NULL,
  `type_serie` enum('déictique','anaphorique') NOT NULL,
  `type_date` enum('jours','semaines','mois','années') NOT NULL,
  `decalage` varchar(255) NOT NULL,
  `expression` varchar(255) NOT NULL,
  `api` text NOT NULL,
  `commentaire` text NOT NULL,
  `langue_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `composants_regle`
--

CREATE TABLE `composants_regle` (
  `ComposantId` int(11) NOT NULL,
  `ComposantListe` text NOT NULL,
  `numeration_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `langue_id` int(11) NOT NULL,
  `nom_lang` varchar(255) NOT NULL,
  `famille` varchar(255) NOT NULL,
  `autre_famille` varchar(255) DEFAULT NULL,
  `aire` varchar(255) NOT NULL,
  `abreviation` varchar(255) NOT NULL,
  `epoque` varchar(255) NOT NULL,
  `autre_epoque` varchar(255) DEFAULT NULL,
  `ecriture` enum('oui','non') NOT NULL,
  `type_ecriture` varchar(255) DEFAULT NULL,
  `autre_type` varchar(255) DEFAULT NULL,
  `sens-lecture` varchar(255) DEFAULT NULL,
  `autre-sens` varchar(255) DEFAULT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lexemes_numeraux`
--

CREATE TABLE `lexemes_numeraux` (
  `id_lexeme` int(11) NOT NULL,
  `LexMot` varchar(255) NOT NULL,
  `LexValeur` varchar(255) NOT NULL,
  `LexCategorie` varchar(255) NOT NULL,
  `LexPivot` varchar(255) NOT NULL,
  `LexFormes` varchar(255) NOT NULL,
  `numeration_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mot_de_liaison`
--

CREATE TABLE `mot_de_liaison` (
  `m_id` int(11) NOT NULL,
  `MotLiaison` varchar(255) NOT NULL,
  `MotLiSignification` varchar(255) NOT NULL,
  `MotLiCategorie` varchar(255) NOT NULL,
  `MotLiCommentaire` varchar(255) NOT NULL,
  `numeration_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `numeration`
--

CREATE TABLE `numeration` (
  `id_numeration` int(11) NOT NULL,
  `base` varchar(255) NOT NULL,
  `autre-sys` varchar(255) DEFAULT NULL,
  `nombre-marg` varchar(255) DEFAULT NULL,
  `lexiqueNum` text DEFAULT NULL,
  `liaison` enum('oui','non') NOT NULL,
  `langue_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regle`
--

CREATE TABLE `regle` (
  `RegleId` varchar(255) NOT NULL,
  `RegleTitre` varchar(255) NOT NULL,
  `RegleNbComposants` text NOT NULL,
  `RegleListeComposants` text NOT NULL,
  `RegleSyntaxe` text NOT NULL,
  `RegleSemantique` text NOT NULL,
  `numeration_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sociolinguistique`
--

CREATE TABLE `sociolinguistique` (
  `situation` enum('vernaculaire','véhiculaire','classique','liturgique','langue de contact','autre') NOT NULL,
  `autre` varchar(255) DEFAULT NULL,
  `langue_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `typologie`
--

CREATE TABLE `typologie` (
  `typo_id` int(11) NOT NULL,
  `infoTypo` enum('agglutinante','flexionnelle','isolante','autre') NOT NULL,
  `autre_Typo` varchar(255) DEFAULT NULL,
  `declinaison` enum('oui','non') NOT NULL,
  `decli-autre` varchar(255) DEFAULT NULL,
  `genre_ou_classe` enum('genre','classe','aucun') NOT NULL,
  `genre` text DEFAULT NULL,
  `classe` text DEFAULT NULL,
  `nombre_grammatical` text NOT NULL,
  `classif` enum('oui','non') DEFAULT NULL,
  `avec_c` text DEFAULT NULL,
  `sans_c` text DEFAULT NULL,
  `langue_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `type` enum('visiteur','editeur','administrateur') DEFAULT 'visiteur',
  `biographie` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `prenom`, `nom`, `email`, `password`, `type`, `biographie`, `created_at`) VALUES
(1, 'Amadou', 'NGAM', 'amadoungam@gmail.com', '$2y$10$exSbqEXJB7aNXqzzlzNRzuglRycPr6.UnBt2Z/miXvTBSvvdO9zUK', 'visiteur', NULL, '2022-04-19 15:13:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteur_informateur`
--
ALTER TABLE `auteur_informateur`
  ADD PRIMARY KEY (`a_i_id`);

--
-- Indexes for table `calendaire`
--
ALTER TABLE `calendaire`
  ADD PRIMARY KEY (`calendaire_id`);

--
-- Indexes for table `composants_regle`
--
ALTER TABLE `composants_regle`
  ADD PRIMARY KEY (`ComposantId`);

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`langue_id`);

--
-- Indexes for table `lexemes_numeraux`
--
ALTER TABLE `lexemes_numeraux`
  ADD PRIMARY KEY (`id_lexeme`);

--
-- Indexes for table `mot_de_liaison`
--
ALTER TABLE `mot_de_liaison`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `numeration`
--
ALTER TABLE `numeration`
  ADD PRIMARY KEY (`id_numeration`);

--
-- Indexes for table `regle`
--
ALTER TABLE `regle`
  ADD PRIMARY KEY (`RegleId`);

--
-- Indexes for table `sociolinguistique`
--
ALTER TABLE `sociolinguistique`
  ADD PRIMARY KEY (`situation`);

--
-- Indexes for table `typologie`
--
ALTER TABLE `typologie`
  ADD PRIMARY KEY (`typo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auteur_informateur`
--
ALTER TABLE `auteur_informateur`
  MODIFY `a_i_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendaire`
--
ALTER TABLE `calendaire`
  MODIFY `calendaire_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langue`
--
ALTER TABLE `langue`
  MODIFY `langue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lexemes_numeraux`
--
ALTER TABLE `lexemes_numeraux`
  MODIFY `id_lexeme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mot_de_liaison`
--
ALTER TABLE `mot_de_liaison`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `numeration`
--
ALTER TABLE `numeration`
  MODIFY `id_numeration` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `typologie`
--
ALTER TABLE `typologie`
  MODIFY `typo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
