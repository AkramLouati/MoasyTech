-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 10:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `libelle`) VALUES
(1, 'Creme '),
(4, 'Deodorant'),
(2, 'Fond de teint'),
(3, 'Masque');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `Id` int(11) NOT NULL,
  `IMG` varchar(200) NOT NULL,
  `Nom` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `DateD` date NOT NULL,
  `DateF` date NOT NULL,
  `PrixA` float NOT NULL,
  `Remise` float NOT NULL,
  `PrixN` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`Id`, `IMG`, `Nom`, `DateD`, `DateF`, `PrixA`, `Remise`, `PrixN`) VALUES
(9, 'Fond de teint.png', 'Fond de teint', '2022-04-28', '2022-04-28', 18, 4, 17.28),
(66, 'masque.png', 'Masque', '2022-04-20', '2022-06-10', 15, 10.4, 13.44),
(100, 'creme.png', 'Creme', '2022-04-28', '2022-04-30', 200, 8, 184),
(104, 'Deodorant.png', 'Deodorant', '2022-03-02', '2022-05-07', 20.8, 10.8, 18.5536),
(22007, 'Bechir.jpg', 'Fond de teint', '2022-05-11', '2022-06-09', 200, 3, 194);

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `TexteR` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DateR` date NOT NULL,
  `Validee` varchar(20) DEFAULT 'Non'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`Id`, `Nom`, `Prenom`, `TexteR`, `Email`, `DateR`, `Validee`) VALUES
(10499999, 'Louati', 'Akram ', 'oo', 'akram.louati@esprit.tn', '2022-05-05', 'Oui'),
(22007999, 'Louati', 'Ando', 'x)', 'andoprocontact@gmail.com', '2022-05-05', 'Oui'),
(99888888, 'Hachicha', 'Dmax', ':)', 'Md.Hachicha@gmail.com', '2022-05-05', 'Oui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nom` (`libelle`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
