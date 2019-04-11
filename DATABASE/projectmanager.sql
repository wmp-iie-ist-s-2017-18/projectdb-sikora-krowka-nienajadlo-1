-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Kwi 2019, 23:26
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projectmanager`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `company`
--

CREATE TABLE `company` (
  `company_ID` int(11) NOT NULL,
  `company_name` varchar(1000) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employee`
--

CREATE TABLE `employee` (
  `employee_ID` int(11) NOT NULL,
  `first_Name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `last_Name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `tel_number` int(9) DEFAULT NULL,
  `activation_code` int(10) NOT NULL,
  `company_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `employee`
--

INSERT INTO `employee` (`employee_ID`, `first_Name`, `last_Name`, `email`, `password`, `position`, `activated`, `tel_number`, `activation_code`, `company_ID`) VALUES
(65, 'Dawid', 'Nienajadło', 'dawidnienajadlo96@gmail.com', '$2y$10$So7AInaIBGQ9/qAYIx.j9.Y0FQDVPA9cRpus8YXWNfLxM8AWGM6rm', 'Admin', 1, 516804066, 1337608171, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `news_ID` int(11) NOT NULL,
  `news_content` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `company_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `project`
--

CREATE TABLE `project` (
  `project_ID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  `team_ID` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team`
--

CREATE TABLE `team` (
  `team_ID` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `leader_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team_employee`
--

CREATE TABLE `team_employee` (
  `employee_ID` int(11) NOT NULL,
  `team_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_ID`);

--
-- Indeksy dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `company_ID` (`company_ID`);

--
-- Indeksy dla tabeli `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_ID`),
  ADD KEY `company_ID` (`company_ID`);

--
-- Indeksy dla tabeli `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_ID`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `team_ID` (`team_ID`);

--
-- Indeksy dla tabeli `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_ID`),
  ADD KEY `leader_ID` (`leader_ID`);

--
-- Indeksy dla tabeli `team_employee`
--
ALTER TABLE `team_employee`
  ADD KEY `team_ID` (`team_ID`),
  ADD KEY `employee_ID` (`employee_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `company`
--
ALTER TABLE `company`
  MODIFY `company_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `news_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `project`
--
ALTER TABLE `project`
  MODIFY `project_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `team`
--
ALTER TABLE `team`
  MODIFY `team_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`company_ID`) ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`company_ID`);

--
-- Ograniczenia dla tabeli `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`team_ID`) REFERENCES `team` (`team_ID`) ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`leader_ID`) REFERENCES `employee` (`employee_ID`) ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `team_employee`
--
ALTER TABLE `team_employee`
  ADD CONSTRAINT `team_employee_ibfk_1` FOREIGN KEY (`team_ID`) REFERENCES `team` (`team_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_employee_ibfk_2` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
