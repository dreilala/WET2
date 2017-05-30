-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Mai 2017 um 22:54
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mysql`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `strasse` varchar(32) NOT NULL,
  `ort` varchar(32) NOT NULL,
  `plz` int(32) NOT NULL,
  `tel` varchar(32) NOT NULL,
  `mail` varchar(32) NOT NULL,
  `passwd` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `strasse`, `ort`, `plz`, `tel`, `mail`, `passwd`) VALUES
(1, 'Nico Hansi', 'Jï¿½gerweg 4', 'Lassee', 2291, '069917101995', 'nico.hansi@projectaward.at', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Vivian Redl', 'Kaiserebersdorferstraße 79/6/12', 'Wien', 1110, '06605152792', 'vivian.redl@gmx.at', '4920fbc73dc9e741e74edab01eb3e0bd'),
(3, 'Nico', 'Jägerweg 4', 'Lassee', 2291, '0699170101995', 'h.nico@aon.at', '4920fbc73dc9e741e74edab01eb3e0bd'),
(4, 'Waltraud Hansi', 'Jägerweg 4', 'Lassee', 2291, '0699170101995', 'walt.hansi@aon.at', '60474c9c10d7142b7508ce7a50acf414'),
(5, 'robin', 'Fockygasse', 'Wien', 1120, '06641143462', 'robin@redl.com', '8ee60a2e00c90d7e00d5069188dc115b'),
(6, 'robinredl', 'Test1', 'Wien', 1120, '06641143462', 'robin2@redl.com', '8ee60a2e00c90d7e00d5069188dc115b');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
