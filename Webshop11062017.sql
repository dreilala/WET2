-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Jun 2017 um 15:53
-- Server-Version: 10.1.19-MariaDB
-- PHP-Version: 7.0.13

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
-- Tabellenstruktur für Tabelle `bestellkopf`
--

CREATE TABLE `bestellkopf` (
  `RNUM` int(5) NOT NULL,
  `RDAT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `KUND` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellung`
--

CREATE TABLE `bestellung` (
  `RNUM` int(5) NOT NULL,
  `PROD` varchar(30) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `MENG` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 'robin', 'Bankomatkarte', '81726374859273'),
(9, 'robin', 'Kreditkarte', '81726374859273'),
(10, 'lalala', 'Bankomatkarte', '1726374859384'),
(11, 'robin', 'Kreditkarte', '82938475637485'),
(12, 'robin', 'Bankomatkarte', '16273847594383'),
(13, 'kaspar', 'Bankomatkarte', '81726374859273'),
(14, 'aaa', '', ''),
(15, 'bbb', '', ''),
(16, 'ccc', 'Kreditkarte', '81726374859273'),
(17, 'ccc', 'Bankomatkarte', '16273847594383'),
(18, 'ccc', 'Bankomatkarte', '16273847594383'),
(19, 'ccc', 'Bankomatkarte', '82938475637485');

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
('4', '4', '4.png', '4.00'),
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
  `passwd` varchar(32) NOT NULL,
  `state` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `anrede`, `vorname`, `nachname`, `strasse`, `plz`, `ort`, `mail`, `username`, `passwd`, `state`) VALUES
(1, 'Herr', 'Admin', 'Admin', 'Hochstaedplatz', 1120, 'Vienna', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'active'),
(2, 'Herr', 'Robin', 'Redl', 'Fockygasse', 1120, 'Wien', 'robin@redl.com', 'robin', '8ee60a2e00c90d7e00d5069188dc115b', 'active'),
(3, 'Herr', 'Valentin', 'Rabitz', 'Kaerntnerstrasse', 1010, 'Wien', 'rabitz@admin.com', 'valentin', 'dee484ff7366319331b0d36e9d0958c1', 'active');

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
(5, '0FRU2', '2018-06-03', '10.0', 'offen'),
(6, 'X9RD3', '2018-06-04', '10.0', 'offen'),
(7, 'EUT5T', '2018-06-04', '10.0', 'offen'),
(8, '8EEGF', '2018-06-06', '10.0', 'offen'),
(9, 'MXU37', '2018-06-06', '10.0', 'offen'),
(10, 'HOQYF', '2018-06-09', '10.0', 'offen'),
(11, '4PRMQ', '2018-06-09', '15', 'offen'),
(12, 'YS59C', '2018-06-09', '20', 'offen'),
(13, '67SGC', '2018-06-09', '5', 'offen'),
(14, 'N8UUP', '2018-06-09', '30', 'offen'),
(15, '5FH82', '2018-06-10', '20', 'offen');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellkopf`
--
ALTER TABLE `bestellkopf`
  ADD PRIMARY KEY (`RNUM`);

--
-- Indizes für die Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  ADD PRIMARY KEY (`RNUM`,`PROD`);

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
-- AUTO_INCREMENT für Tabelle `bestellkopf`
--
ALTER TABLE `bestellkopf`
  MODIFY `RNUM` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10028;
--
-- AUTO_INCREMENT für Tabelle `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
