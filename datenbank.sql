-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 12. Jun 2017 um 19:19
-- Server-Version: 5.5.42
-- PHP-Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `WET2`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellkopf`
--

CREATE TABLE `bestellkopf` (
  `RNUM` int(5) NOT NULL,
  `RDAT` datetime NOT NULL,
  `KUND` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10040 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bestellkopf`
--

INSERT INTO `bestellkopf` (`RNUM`, `RDAT`, `KUND`) VALUES
(10039, '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellung`
--

CREATE TABLE `bestellung` (
  `RNUM` int(5) NOT NULL,
  `PROD` varchar(30) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `MENG` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bestellung`
--

INSERT INTO `bestellung` (`RNUM`, `PROD`, `Price`, `MENG`) VALUES
(10039, 'Kaffee', '10.00', 1),
(10039, 'Tee', '10.23', 1),
(10039, 'Wasser', '4.00', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `ID` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `paymentmethod` varchar(32) NOT NULL,
  `number` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `paymentinfo`
--

INSERT INTO `paymentinfo` (`ID`, `username`, `paymentmethod`, `number`) VALUES
(5, 'robin', 'Kreditkarte', '2147483647'),
(11, 'robin', 'Kreditkarte', '82938475637485'),
(12, 'robin', 'Bankomatkarte', '16273847594383');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `Name` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `pathtopicture` varchar(256) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`Name`, `Description`, `pathtopicture`, `price`) VALUES
('Kaffee', 'Hierbei handelt es sich um Kaffee.', 'kaffee.jpg', '10.00'),
('Tee', 'Hierbei handelt es sich um Tee.', 'teebeutel.jpg', '10.23'),
('Wasser', 'Hochwertiges Wasser.', 'wasserflasche.jpg', '4.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `anrede`, `vorname`, `nachname`, `strasse`, `plz`, `ort`, `mail`, `username`, `passwd`, `state`) VALUES
(1, 'Herr', 'Admin', 'Admin', 'Hochstaedplatz', 1120, 'Vienna', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'active'),
(2, 'Herr', 'Robin', 'Redl', 'Fockygasse', 1120, 'Wien', 'robin@redl.com', 'robin', '8ee60a2e00c90d7e00d5069188dc115b', 'active');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

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
(7, 'EUT5T', '2018-06-04', '10.0', 'offen');

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
  MODIFY `RNUM` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10040;
--
-- AUTO_INCREMENT für Tabelle `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;