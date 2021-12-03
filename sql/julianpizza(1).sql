-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 dec 2021 om 13:30
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
-- Database: `julianpizza`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `ID` int(20) NOT NULL,
  `naam` varchar(55) DEFAULT NULL,
  `omschrijving` varchar(255) DEFAULT NULL,
  `afbeelding` varchar(155) DEFAULT NULL,
  `leverbaar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`ID`, `naam`, `omschrijving`, `afbeelding`, `leverbaar`) VALUES
(1, 'Pizza Veggi Pesto Pollost', ' Tomatensaus, mozzarella, vegetarische kip, verse tomaat, ui &amp; een swirl van pesto', 'PizzaVeggiPestoPollo.jpg', 0),
(2, 'Pizza New Four Cheese', '    Tomatensaus, mozzarella, Gouda en cheddar kaasmix & zachte Franse kaas', 'PizzaNewFourCheese.jpg', 0),
(3, 'Pizza Cheese & Bacon', 'Crème fraîche, mozzarella, ui, zachte Franse kaas & bacon\r\n', 'PizzaCheese&Bacon.jpg', 0),
(4, 'Pizza Cheese & Grilled Beef', 'Tomatensaus, mozzarella, champignons, grilled beef, Gouda en cheddar kaasmix, zachte Franse kaas & lente-ui', 'PizzaCheese&GrilledBeef.jpg', 0),
(5, 'Pizza Half! Half!', '    Kun je niet kiezen? Geniet dan van twee smaken uit het menu op één pizza!', 'PizzaHalfHalf.jpg', 0),
(6, 'Pizza American Supreme Meatlover', 'BBQ saus, mozzarella, pepperoni, rundergehakt, kip kebab, bacon & ui\r\nPizza Spicy Chicken Meatlover     Tomatensaus, mozzarella, gegrilde kip, kip kebab, jalapeños, paprika & ui', 'PizzaAmericanSupremeMeatlover.jpg', 0),
(7, 'Pizza Hawaii', 'Tomatensaus, ham, ananas & extra mozzarella', 'PizzaHawaii.jpg', 0),
(8, 'Pizza Grilled Beef Meatlover', '    Crème fraîche, BBQ swirl, mozzarella, grilled beef, bacon, ham, ui & lente-ui', 'PizzaGrilledBeefMeatlover.jpg', 0),
(9, 'Pizza Chicken Supreme', '    Tomatensaus, mozzarella, gegrilde kip, ui, paprika, verse tomaat & pizzakruiden', 'PizzaChickenSupreme.jpg', 0),
(10, 'Pizza Chicken Kebab', 'Tomatensaus, mozzarella, kip kebab, ui & een swirl van knoflooksaus', 'PizzaChickenKebab.jpg', 0),
(11, 'test1', 'test', NULL, 1),
(12, 'pizza slalalala', 'iwifauhvbwuhvbwrhbwhbvhsg', NULL, 0),
(13, 'pizza gezond', 'deze pizza is niet lekker', NULL, 0),
(14, 'pizza gezond', 'deze pizza is niet lekker', NULL, 0),
(15, 'pizza gezond', 'deze pizza is niet lekker', NULL, 0),
(16, 'pizza gezond', 'deze pizza is niet lekker', NULL, 0),
(17, 'pizza gezond', 'deze pizza is niet lekker', NULL, 0),
(18, 'pizza gezond', 'aievhaehigb', NULL, 0),
(19, 'pizza gezond', 'aievhaehigb', NULL, 0),
(20, 'pizza gezonddef', 'aievhaehigb', NULL, 0),
(21, 'wesley', 'test', NULL, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `formaat`
--

CREATE TABLE `formaat` (
  `formaat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `formaat`
--

INSERT INTO `formaat` (`formaat`) VALUES
('large'),
('medium'),
('small');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `weborder_ID` int(20) NOT NULL,
  `klant_ID` int(20) NOT NULL,
  `product_ID` int(20) NOT NULL,
  `aantal` int(20) NOT NULL,
  `prijs_eenheid` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `item`
--

INSERT INTO `item` (`ID`, `weborder_ID`, `klant_ID`, `product_ID`, `aantal`, `prijs_eenheid`) VALUES
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
(20, 15, 11, 3, 2, '3'),
(21, 16, 11, 2, 2, '5'),
(22, 16, 11, 3, 4, '3'),
(23, 17, 11, 19, 2, '4'),
(24, 17, 11, 22, 2, '2'),
(25, 18, 11, 21, 4, '4'),
(26, 18, 11, 24, 5, '2'),
(27, 19, 11, 24, 8, '2'),
(28, 20, 11, 24, 4, '2'),
(29, 22, 11, 1, 3, '4'),
(30, 23, 11, 5, 18, '4'),
(31, 24, 11, 9, 2, '4'),
(32, 26, 11, 9, 1, '4'),
(33, 27, 11, 9, 1, '4'),
(34, 28, 11, 9, 1, '4'),
(35, 29, 11, 9, 4, '4'),
(36, 30, 11, 9, 2, '4'),
(37, 30, 11, 10, 4, '4'),
(38, 31, 11, 9, 3, '4'),
(39, 32, 11, 9, 4, '4'),
(40, 33, 11, 19, 3, '4'),
(41, 34, 11, 1, 2, '4'),
(42, 35, 11, 1, 2, '4'),
(43, 36, 11, 9, 3, '4'),
(44, 37, 11, 9, 10, '4'),
(45, 38, 11, 10, 3, '4'),
(46, 39, 11, 1, 2, '4'),
(47, 41, 11, 10, 2, '4'),
(48, 42, 11, 10, 2, '4');

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
(1, 'Dylan', 'huisden', 'Middenweg 11', '1088 VV', 'Amsterdam', 'dhuisden@roc.nl', '', '', 0),
(2, 'Nitin', 'Bosman', 'Leidseweg 22', '9900 BB', 'Amsterdam', 'nbosman@roc.nl', '', '', 0),
(3, 'Joseph', 'Demirel', 'Leidseplein 33', '9988 BB', 'Utrecht', 'josdem@hotmail.com', '', '', 0),
(4, 'Franco', 'Tasiyan', 'Kruislaan 444', '3300 VV', 'Utrecht', 'frantas@wanadoo.nl', '', '', 0),
(5, 'Akash', 'Kabli', 'Galileiplantsoen 111', '1010RR', 'Amstelveen', 'aka@hetnet.nl', '', '', 0),
(6, 'Tamara', 'Kabli', 'Mozartstraat 22', '3388 XX', 'Amsterdam', 'tamka@hotmail.com', '', '', 0),
(7, 'Arnold', 'Shaw', 'Kruislaan 1', '9876 FF', 'Rotterdam', 'asha@roc.nl', '', '', 0),
(10, 'test', 'test', 'test', 'test', 'test', 'test@test.nl', '$2y$10$ge0a4oi0R7b89mnL38V/ZudCTAjhe824NzU2EvRSQxAXDX0.TYVHu', '', 2),
(11, 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl', '$2y$10$HQ0bZrCAG0mGSxIabJON1.BmXJMspnKrdd.u9PjL39h/2clsxibiS', '', 0),
(12, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin@admin.nl', '$2y$10$Yuq9FQyhG9ccWYhdbrRdDOGncYG.54EWfdu5wR2O4bF.VsniGofU6', '', 1),
(13, 'rock', 'rock', 'rock', '1', 'rock', 'rock@test.nl', '1234', '', 0),
(14, 'led', 'zeppelin', '12', '1', '1', 'led@test.nl', '$2y$10$8dcxnWcXj3coBzMGjzYopOKxAJHB0Et8yZ4usJgWEKjUnITyogfqW', '', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `permissie`
--

CREATE TABLE `permissie` (
  `toegang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `permissie`
--

INSERT INTO `permissie` (`toegang`) VALUES
(1),
(0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `ID` int(20) NOT NULL,
  `categorie_ID` int(20) NOT NULL,
  `formaat_ID` varchar(20) DEFAULT NULL,
  `prijs` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`ID`, `categorie_ID`, `formaat_ID`, `prijs`) VALUES
(1, 1, 'large', '4.00'),
(2, 2, 'medium', '3.00'),
(3, 3, 'small', '2.00'),
(11, 1, 'medium', '3.00'),
(12, 1, 'small', '2.02'),
(13, 2, 'large', '4.00'),
(14, 2, 'small', '2.01'),
(15, 3, 'large', '4.00'),
(16, 3, 'medium', '3.00'),
(17, 4, 'large', '4.00'),
(18, 4, 'medium', '3.00'),
(19, 4, 'small', '2.00'),
(20, 5, 'large', '4.00'),
(21, 5, 'medium', '3.00'),
(22, 5, 'small', '2.00'),
(23, 6, 'large', '4.00'),
(24, 6, 'medium', '2.01'),
(25, 6, 'small', '2.01'),
(26, 7, 'large', '2.01'),
(27, 7, 'medium', '2.01'),
(28, 8, 'large', '2.01'),
(29, 8, 'medium', '2.01'),
(30, 8, 'small', '2.01'),
(31, 9, 'large', '2.01'),
(32, 9, 'medium', '2.01'),
(33, 9, 'small', '2.01'),
(34, 10, 'large', '2.01'),
(35, 10, 'medium', '2.01'),
(36, 10, 'small', '2.01'),
(37, 20, 'medium', '2.01'),
(38, 20, 'large', '2.01'),
(39, 20, 'small', '2.01'),
(40, 21, 'medium', '3.00'),
(41, 21, 'large', '4.00'),
(42, 21, 'small', '2.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `ID` smallint(6) NOT NULL,
  `productennaam` varchar(45) NOT NULL,
  `beschrijving` varchar(45) NOT NULL,
  `soort` varchar(15) NOT NULL,
  `prijs` decimal(4,2) NOT NULL,
  `kindermaat` int(1) NOT NULL,
  `afbeelding` varchar(50) NOT NULL,
  `normaal` int(1) NOT NULL,
  `grotemaat` int(1) NOT NULL,
  `leverbaar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`ID`, `productennaam`, `beschrijving`, `soort`, `prijs`, `kindermaat`, `afbeelding`, `normaal`, `grotemaat`, `leverbaar`) VALUES
(19, 'pizza hawaii', 'de lekkerste hawaii van nederland', 'eten', '4.00', 0, 'hawaii.jpg', 1, 0, 1),
(20, 'pizza salami', 'de lekkerste salami van nederland', 'eten', '4.00', 0, 'salami.jpg', 1, 0, 1),
(21, 'pizza margherita', 'de lekkerste margherita van nederland', 'eten', '4.00', 0, 'margherita.jpg', 1, 0, 0),
(22, 'cola', 'merk: coca cola', 'drinken', '2.00', 0, 'cola.jpg', 1, 0, 1),
(23, 'cassis', 'fanta maar dan in het rood', 'drinken', '2.00', 0, 'cassis.jpg', 1, 0, 1),
(24, 'biertje', 'BIERTJE?', 'drinken', '2.00', 0, 'biertje.jpg', 1, 0, 1),
(25, 'kinder pizza hawaii', 'even lekker maar dan voor kinderen', 'eten', '4.00', 1, 'hawaii.jpg', 0, 0, 1),
(26, 'kinder pizza salami', 'even lekker maar dan voor kinderen', 'eten', '2.00', 1, 'salami.jpg', 0, 0, 1),
(27, 'kinder pizza margherita', 'even lekker maar dan voor kinderen', 'eten', '2.00', 1, 'margherita.jpg', 0, 0, 1),
(28, 'kleine cola', 'kleine cola', 'drinken', '1.00', 1, 'cola.jpg', 0, 0, 1),
(29, 'kleine cassis', 'kleine cassis', 'drinken', '1.00', 1, 'cassis.jpg', 0, 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `weborder`
--

CREATE TABLE `weborder` (
  `ID` int(11) NOT NULL,
  `klant_ID` int(11) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `voornaam` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `straat` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `woonplaats` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `weborder`
--

INSERT INTO `weborder` (`ID`, `klant_ID`, `datum`, `voornaam`, `achternaam`, `straat`, `postcode`, `woonplaats`, `email`) VALUES
(1, 0, '2015-01-01 00:00:00', '', '', '', '', '', ''),
(2, 0, '2015-01-01 00:00:00', '', '', '', '', '', ''),
(3, 0, '2015-02-15 00:00:00', '', '', '', '', '', ''),
(4, 0, '2015-02-20 00:00:00', '', '', '', '', '', ''),
(5, 0, '2015-03-13 00:00:00', '', '', '', '', '', ''),
(6, 11, '2021-10-25 11:38:44', '', '', '', '', '', ''),
(7, 11, '2021-10-25 13:14:54', '', '', '', '', '', ''),
(8, 11, '2021-10-25 13:36:06', '', '', '', '', '', ''),
(9, 11, '2021-10-25 13:36:22', '', '', '', '', '', ''),
(10, 11, '2021-10-27 13:42:22', '', '', '', '', '', ''),
(11, 11, '2021-11-01 13:08:49', '', '', '', '', '', ''),
(12, 11, '2021-11-02 11:04:30', '', '', '', '', '', ''),
(13, 11, '2021-11-02 11:33:59', '', '', '', '', '', ''),
(14, 11, '2021-11-03 13:29:12', '', '', '', '', '', ''),
(15, 11, '2021-11-03 15:17:23', '', '', '', '', '', ''),
(16, 11, '2021-11-03 21:47:16', '', '', '', '', '', ''),
(17, 11, '2021-11-04 08:47:58', '', '', '', '', '', ''),
(18, 11, '2021-11-04 08:59:37', '', '', '', '', '', ''),
(19, 11, '2021-11-04 11:06:51', '', '', '', '', '', ''),
(20, 11, '2021-11-05 09:50:01', '', '', '', '', '', ''),
(21, 11, '2021-11-06 14:48:26', '', '', '', '', '', ''),
(22, 11, '2021-11-06 15:00:14', '', '', '', '', '', ''),
(23, 11, '2021-11-06 15:01:14', '', '', '', '', '', ''),
(24, 11, '2021-11-06 16:11:10', '', '', '', '', '', ''),
(25, 11, '2021-11-06 16:30:03', '', '', '', '', '', ''),
(26, 11, '2021-11-06 16:30:40', '', '', '', '', '', ''),
(27, 11, '2021-11-06 17:00:41', '', '', '', '', '', ''),
(28, 11, '2021-11-06 17:02:41', '', '', '', '', '', ''),
(29, 11, '2021-11-06 17:03:14', '', '', '', '', '', ''),
(30, 11, '2021-11-06 17:04:11', '', '', '', '', '', ''),
(31, 11, '2021-11-07 12:10:36', '', '', '', '', '', ''),
(32, 11, '2021-11-07 12:11:51', '', '', '', '', '', ''),
(33, 11, '2021-11-07 12:14:51', '', '', '', '', '', ''),
(34, 11, '2021-11-07 12:17:59', '', '', '', '', '', ''),
(35, 11, '2021-11-07 12:18:15', '', '', '', '', '', ''),
(36, 11, '2021-11-07 12:22:08', '', '', '', '', '', ''),
(37, 11, '2021-11-07 12:59:07', '', '', '', '', '', ''),
(38, 11, '2021-11-07 13:03:07', '', '', '', '', '', ''),
(39, 11, '2021-11-08 21:08:03', '', '', '', '', '', ''),
(40, 11, '2021-11-08 21:08:16', '', '', '', '', '', ''),
(41, 11, '2021-11-08 21:08:32', '', '', '', '', '', ''),
(42, 11, '2021-11-09 10:08:21', '', '', '', '', '', ''),
(43, 11, '2021-11-09 20:02:17', '', '', '', '', '', ''),
(44, 11, '2021-11-10 20:43:02', '', '', '', '', '', ''),
(45, 11, '2021-11-10 20:58:38', '', '', '', '', '', ''),
(46, 11, '2021-11-12 10:26:23', '', '', '', '', '', ''),
(47, 11, '2021-11-12 10:29:38', '', '', '', '', '', ''),
(48, 11, '2021-11-12 10:32:10', '', '', '', '', '', ''),
(49, 11, '2021-11-12 10:53:39', '', '', '', '', '', ''),
(50, 11, '2021-11-12 10:54:13', '', '', '', '', '', ''),
(51, 11, '2021-11-12 10:58:08', '', '', '', '', '', ''),
(52, 11, '2021-11-12 11:00:04', '', '', '', '', '', ''),
(53, 11, '2021-11-12 11:01:40', '', '', '', '', '', ''),
(54, 11, '2021-11-12 11:02:24', '', '', '', '', '', ''),
(55, 11, '2021-11-12 11:06:38', '', '', '', '', '', ''),
(56, 11, '2021-11-12 11:09:12', '', '', '', '', '', ''),
(57, 11, '2021-11-15 08:59:12', '', '', '', '', '', ''),
(58, 11, '2021-11-15 13:58:00', '', '', '', '', '', ''),
(59, 11, '2021-11-16 13:42:28', '', '', '', '', '', ''),
(60, 11, '2021-11-17 21:00:15', '', '', '', '', '', ''),
(61, 11, '2021-11-18 08:53:06', '', '', '', '', '', ''),
(62, 11, '2021-11-18 09:16:21', '', '', '', '', '', ''),
(63, 11, '2021-11-18 09:27:27', '', '', '', '', '', ''),
(64, 11, '2021-11-18 10:54:43', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', ''),
(65, 11, '2021-11-18 10:55:31', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(66, 11, '2021-11-19 13:08:22', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(67, 11, '2021-11-19 13:10:15', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(68, 11, '2021-11-19 13:14:13', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(69, 11, '2021-11-19 13:22:04', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(70, 11, '2021-11-19 13:24:07', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(71, 11, '2021-11-19 13:27:04', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(72, 11, '2021-11-19 13:28:51', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(73, 11, '2021-11-19 13:33:38', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(74, 11, '2021-11-19 13:34:22', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(75, 11, '2021-11-19 13:36:46', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(76, 11, '2021-11-19 13:38:36', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(77, 11, '2021-11-19 13:39:41', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(78, 11, '2021-11-19 13:40:09', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(79, 11, '2021-11-19 13:40:55', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(80, 11, '2021-11-19 13:45:51', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(81, 11, '2021-11-19 13:48:56', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(82, 11, '2021-11-19 13:49:34', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(83, 11, '2021-11-19 19:42:38', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(84, 11, '2021-11-19 19:44:19', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(85, 11, '2021-11-19 19:49:16', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(86, 11, '2021-11-22 08:42:58', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl'),
(87, 11, '2021-11-22 12:54:43', 'julian', 'test', 'Asperenstraat 41', '2729AG', 'zm', 'julian@test.nl');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `formaat`
--
ALTER TABLE `formaat`
  ADD PRIMARY KEY (`formaat`);

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
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categorie_ID` (`categorie_ID`),
  ADD KEY `formaat_ID` (`formaat_ID`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
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
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `weborder`
--
ALTER TABLE `weborder`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categorie_ID`) REFERENCES `categorie` (`ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`formaat_ID`) REFERENCES `formaat` (`formaat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
