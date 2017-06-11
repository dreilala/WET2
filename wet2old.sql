-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Jun 2017 um 20:46
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wet2`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `ID` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `paymentmethod` varchar(32) NOT NULL,
  `number` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `paymentinfo`
--

INSERT INTO `paymentinfo` (`ID`, `username`, `paymentmethod`, `number`) VALUES
(1, 'Testuser', 'Kreditkarte', '2147483647'),
(2, 'Testusernew', 'Kreditkarte', '2147483647'),
(3, 'user', 'Kreditkarte', '2147483647'),
(4, '7', 'Kreditkarte', '2147483647'),
(5, 'robin', 'Kreditkarte', '2147483647'),
(6, 'robin', 'Bankomatkarte', '2147483647'),
(7, 'robin', 'Kreditkarte', '2147483647'),
(8, 'robin', 'Bankomatkarte', '81726374859273');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `Name` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `pathtopicture` varchar(256) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`Name`, `Description`, `pathtopicture`, `price`) VALUES
('?', '?', '?', '0.00'),
('Kaffee', 'hierbei handelt es sich um Kaffee', 'Kaffee.png', '10.00'),
('WasAnderes', 'hierbei handelt es sich um was anderes', 'Other.png', '10.23');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `anrede` varchar(32) NOT NULL,
  `vorname` varchar(32) NOT NULL,
  `nachname` varchar(32) NOT NULL,
  `strasse` varchar(32) NOT NULL,
  `plz` int(32) NOT NULL,
  `ort` varchar(32) NOT NULL,
  `mail` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `passwd` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `anrede`, `vorname`, `nachname`, `strasse`, `plz`, `ort`, `mail`, `username`, `passwd`) VALUES
(1, 'Herr', 'Admin', 'Admin', 'Hochstaedplatz', 1120, 'Vienna', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'Herr', 'Robin', 'Redl', 'Fockygasse', 1120, 'Wien', 'robin@redl.com', 'robin', '8ee60a2e00c90d7e00d5069188dc115b'),
(8, 'Herr', 'Valentin', 'Rabitz', 'Kaerntnerstrasse', 1010, 'Wien', 'rabitz@admin.com', 'valentin', 'dee484ff7366319331b0d36e9d0958c1'),
(9, 'Frau', 'Test', 'Testuser', 'Teststrasse', 1120, 'Wien', 'test@test.com', 'test2', '2cd5e590bf0c16b7a611db24b668fbbf'),
(10, 'Herr', 'Testuser', 'Testuser', 'Teststrasse', 1200, 'Wien', 'test2@test.com', 'Testuser', '2cd5e590bf0c16b7a611db24b668fbbf'),
(11, 'Herr', 'Testusernew', 'Testusernew', 'Teststrasse', 1120, 'Wien', 'testusernew@test.com', 'Testusernew', '2cd5e590bf0c16b7a611db24b668fbbf'),
(12, 'Frau', 'User', 'User', 'Userstreet', 1120, 'Wien', 'user@test.com', 'user', '4645edce454afd5e41643fd9ca4ac853');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `voucher`
--

CREATE TABLE `voucher` (
  `id` int(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `valid` varchar(32) NOT NULL,
  `value` varchar(32) NOT NULL,
  `state` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `voucher`
--

INSERT INTO `voucher` (`id`, `code`, `valid`, `value`, `state`) VALUES
(1, 'F1TRA', '2018-06-03', '10.0', 'offen'),
(2, 'G7X34', '2018-06-03', '10.0', 'offen'),
(3, '7NYW8', '2018-06-03', '10.0', 'offen'),
(4, 'ZD7T7', '2018-06-03', '10.0', 'offen'),
(5, '0FRU2', '2018-06-03', '10.0', 'offen');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `price` (`price`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
