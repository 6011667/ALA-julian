-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 nov 2021 om 16:29
-- Serverversie: 10.4.19-MariaDB
-- PHP-versie: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `album`
--

CREATE TABLE `album` (
  `ID` smallint(6) NOT NULL,
  `titel` varchar(45) NOT NULL,
  `artiest` varchar(45) NOT NULL,
  `genre` varchar(15) NOT NULL,
  `prijs` decimal(4,2) NOT NULL,
  `voorraad` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `album`
--

INSERT INTO `album` (`ID`, `titel`, `artiest`, `genre`, `prijs`, `voorraad`) VALUES
(1, 'test', 'lol', 'rock', '10.00', 100),
(2, 'Rumba Azul', 'Caetano Velosa', 'Latin', '4.90', 50),
(3, 'Survivor', 'Destiny\'s Child', 'R&B', '3.00', 789),
(4, 'Oh Girl', 'The Chi-lites', 'Pop', '3.00', 2),
(5, 'Derr Herr ist mein getre', 'Ton Koopman', 'Klassiek', '5.50', 30),
(6, 'Closing Time', 'Tom Waits', 'Rock', '3.00', 0),
(7, 'Irrestible', 'Celia Cruz', 'Latin', '3.50', 23),
(8, 'Marvin Gaye ll', 'Marvin Gaye', 'R&B', '4.00', 154),
(9, 'Mi Sangre', 'Juanes', 'Latin', '3.90', 123),
(10, 'Greatest Hits 2', 'Queen', 'Rock', '3.00', 0),
(11, '3121', 'Prince', 'Rock', '3.45', 0),
(12, 'Antologia l', 'Paco de Lucia', 'World', '3.00', 320),
(13, 'Stairway to Heaven', 'Led Zeppelin', 'Rock', '0.99', 200),
(14, 'Stairway to Heaven', 'Led Zeppelin', 'Rock', '0.99', 200),
(15, 'The Wall', 'Pink Floyd', 'Rock', '0.99', 100),
(16, 'dream on', 'earosmith', 'rock', '10.00', 10),
(17, 'new york city', 'nora jones', 'blues', '49.00', 113);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `weborder_ID` int(20) NOT NULL,
  `klant_ID` int(20) NOT NULL,
  `album_ID` int(20) NOT NULL,
  `aantal` int(20) NOT NULL,
  `prijs_eenheid` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `item`
--

INSERT INTO `item` (`ID`, `weborder_ID`, `klant_ID`, `album_ID`, `aantal`, `prijs_eenheid`) VALUES
(1, 1, 1, 1, 1, '3'),
(2, 1, 1, 5, 2, '6'),
(3, 2, 5, 8, 1, '4'),
(4, 2, 5, 10, 2, '3'),
(5, 3, 3, 1, 1, '3'),
(6, 4, 2, 5, 1, '6'),
(7, 4, 2, 8, 1, '4'),
(8, 4, 2, 6, 1, '3'),
(9, 5, 6, 4, 2, '3'),
(10, 5, 6, 6, 1, '3'),
(11, 5, 6, 1, 1, '3'),
(12, 5, 6, 9, 1, '4'),
(13, 5, 6, 10, 3, '3'),
(14, 11, 11, 1, 10, '10'),
(15, 12, 11, 1, 2, '10'),
(16, 12, 11, 2, 3, '5'),
(17, 13, 11, 2, 2, '5'),
(18, 13, 11, 3, 4, '3'),
(19, 14, 11, 2, 5, '5'),
(20, 15, 11, 3, 2, '3');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `ID` int(11) NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `straat` varchar(75) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `woonplaats` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `wachtwoord` varchar(64) NOT NULL,
  `token` varchar(64) NOT NULL,
  `rol` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`ID`, `voornaam`, `achternaam`, `straat`, `postcode`, `woonplaats`, `email`, `wachtwoord`, `token`, `rol`) VALUES
(1, 'Dylano', 'huisden', 'Middenweg 11', '1088 VV', 'Amsterdam', 'dhuisden@roc.nl', '', '', 0),
(2, 'Nitin', 'Bosman', 'Leidseweg 22', '9900 BB', 'Amsterdam', 'nbosman@roc.nl', '', '', 0),
(3, 'Joseph', 'Demirel', 'Leidseplein 33', '9988 BB', 'Utrecht', 'josdem@hotmail.com', '', '', 0),
(4, 'Franco', 'Tasiyan', 'Kruislaan 444', '3300 VV', 'Utrecht', 'frantas@wanadoo.nl', '', '', 0),
(5, 'Akash', 'Kabli', 'Galileiplantsoen 111', '1010RR', 'Amstelveen', 'aka@hetnet.nl', '', '', 0),
(6, 'Tamara', 'Kabli', 'Mozartstraat 22', '3388 XX', 'Amsterdam', 'tamka@hotmail.com', '', '', 0),
(7, 'Arnold', 'Shaw', 'Kruislaan 1', '9876 FF', 'Rotterdam', 'asha@roc.nl', '', '', 0),
(10, 'test', 'test', 'test', 'test', 'test', 'test@test.nl', '$2y$10$ge0a4oi0R7b89mnL38V/ZudCTAjhe824NzU2EvRSQxAXDX0.TYVHu', '', 0),
(11, 'julian', 'elderson', '1', '1', 'zm', 'julian@test.nl', '$2y$10$HQ0bZrCAG0mGSxIabJON1.BmXJMspnKrdd.u9PjL39h/2clsxibiS', '', 0),
(12, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin@admin.nl', '$2y$10$Yuq9FQyhG9ccWYhdbrRdDOGncYG.54EWfdu5wR2O4bF.VsniGofU6', '', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `weborder`
--

CREATE TABLE `weborder` (
  `ID` int(11) NOT NULL,
  `klant_ID` int(11) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `weborder`
--

INSERT INTO `weborder` (`ID`, `klant_ID`, `datum`) VALUES
(1, 0, '2015-01-01 00:00:00'),
(2, 0, '2015-01-01 00:00:00'),
(3, 0, '2015-02-15 00:00:00'),
(4, 0, '2015-02-20 00:00:00'),
(5, 0, '2015-03-13 00:00:00'),
(6, 11, '2021-10-25 11:38:44'),
(7, 11, '2021-10-25 13:14:54'),
(8, 11, '2021-10-25 13:36:06'),
(9, 11, '2021-10-25 13:36:22'),
(10, 11, '2021-10-27 13:42:22'),
(11, 11, '2021-11-01 13:08:49'),
(12, 11, '2021-11-02 11:04:30'),
(13, 11, '2021-11-02 11:33:59'),
(14, 11, '2021-11-03 13:29:12'),
(15, 11, '2021-11-03 15:17:23');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `weborder`
--
ALTER TABLE `weborder`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `album`
--
ALTER TABLE `album`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `weborder`
--
ALTER TABLE `weborder`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
