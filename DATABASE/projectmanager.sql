-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Maj 2019, 19:35
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

DELIMITER $$
--
-- Procedury
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStates` ()  MODIFIES SQL DATA
BEGIN
DECLARE x int DEFAULT 0;
DECLARE y int DEFAULT 0;
SET x = (SELECT MAX(project.project_ID) From project);
WHILE x >= y DO
UPDATE `project` SET `state`=stateCheck(y) WHERE project.project_ID =y;
SET y = y + 1;
END WHILE;
END$$

--
-- Funkcje
--
CREATE DEFINER=`root`@`localhost` FUNCTION `stateCheck` (`ID_Project` INT) RETURNS VARCHAR(20) CHARSET utf16 COLLATE utf16_polish_ci READS SQL DATA
BEGIN

RETURN IF(DATE(now())>(SELECT finish FROM project Where project.project_ID = ID_Project), "Closed", "Active");
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `company`
--

CREATE TABLE `company` (
  `company_ID` int(11) NOT NULL,
  `company_name` varchar(1000) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `company`
--

INSERT INTO `company` (`company_ID`, `company_name`) VALUES
(1, 'Project Manager');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `company_informations`
--

CREATE TABLE `company_informations` (
  `company_ID` int(11) NOT NULL,
  `company_message` mediumtext COLLATE utf16_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

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
(66, 'Adam', 'Krówka', 'adamkrowka108@gmail.com', '$2y$10$NAwNjF7nPyiZM26uUI1zCO8mf3.ZMhHAsDgVcwv78XGn0NYdA63hC', 'Full-Stack Developer', 1, 537399743, 2147483647, 1),
(67, 'Dawid', 'Nienajadło', 'dawidnienajadlo96@gmail.com', '$2y$10$9QWF6K6KKY06OvxXAK/ec.rg7jEJUge3MYl9D8E0WXuKn1y1FDOyu', 'Project Manager', 1, 516804066, 1037142154, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `news_ID` int(11) NOT NULL,
  `news_content` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `company_ID` int(11) NOT NULL,
  `news_title` varchar(1000) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`news_ID`, `news_content`, `company_ID`, `news_title`) VALUES
(9, 'asddsa', 1, 'dsaasd'),
(10, 'Są tanio po 2zł za 10 kilo', 1, 'Parówki w biedrze'),
(11, 'Jest po 10zł za 0,6', 1, 'Wódka w sklepie na Brzózie '),
(12, 'hehe', 1, 'Kiełba 2 ziko za kilo');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `project`
--

CREATE TABLE `project` (
  `project_ID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  `team_ID` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `budget` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `project`
--

INSERT INTO `project` (`project_ID`, `name`, `state`, `start`, `finish`, `team_ID`, `description`, `budget`) VALUES
(2, 'NextProject', 'Active', '2019-04-01', '2019-07-26', 2, 'sadas', 150000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projectchat`
--

CREATE TABLE `projectchat` (
  `Chat_ID` int(11) NOT NULL,
  `team_ID` int(11) NOT NULL,
  `employee_ID` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `projectchat`
--

INSERT INTO `projectchat` (`Chat_ID`, `team_ID`, `employee_ID`, `message`) VALUES
(1, 2, 66, 'Hello Hello'),
(2, 2, 66, 'Jestem adam i popsułem czat'),
(3, 2, 66, 'i kaszle na Dawida komputer'),
(4, 2, 66, 'i mówie, że się zasłaniam'),
(5, 1, 66, 'Jestem Adam i nadal psuje czat'),
(6, 1, 66, 'i w dodatku sapie'),
(7, 1, 66, 'i lubie wazeline'),
(8, 2, 67, 'Dobra powiedzmy, że się nie gniewam, ale żeby to było ostatni raz!');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team`
--

CREATE TABLE `team` (
  `team_ID` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `leader_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `team`
--

INSERT INTO `team` (`team_ID`, `name`, `leader_ID`) VALUES
(1, 'FirstTeam', 66),
(2, 'Second Team', 67);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team_employee`
--

CREATE TABLE `team_employee` (
  `employee_ID` int(11) NOT NULL,
  `team_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `team_employee`
--

INSERT INTO `team_employee` (`employee_ID`, `team_ID`) VALUES
(67, 2),
(66, 2),
(66, 2),
(66, 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_ID`);

--
-- Indeksy dla tabeli `company_informations`
--
ALTER TABLE `company_informations`
  ADD KEY `company_ID` (`company_ID`);

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
-- Indeksy dla tabeli `projectchat`
--
ALTER TABLE `projectchat`
  ADD PRIMARY KEY (`Chat_ID`),
  ADD KEY `employee_ID` (`employee_ID`),
  ADD KEY `projectchat_ibfk_2` (`team_ID`);

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
  ADD KEY `employee_ID` (`employee_ID`),
  ADD KEY `team_ID` (`team_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `company`
--
ALTER TABLE `company`
  MODIFY `company_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `news_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `project`
--
ALTER TABLE `project`
  MODIFY `project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `projectchat`
--
ALTER TABLE `projectchat`
  MODIFY `Chat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `team`
--
ALTER TABLE `team`
  MODIFY `team_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `company_informations`
--
ALTER TABLE `company_informations`
  ADD CONSTRAINT `company_informations_ibfk_1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`company_ID`) ON UPDATE CASCADE;

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
-- Ograniczenia dla tabeli `projectchat`
--
ALTER TABLE `projectchat`
  ADD CONSTRAINT `projectchat_ibfk_1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`employee_ID`),
  ADD CONSTRAINT `projectchat_ibfk_2` FOREIGN KEY (`team_ID`) REFERENCES `team` (`team_ID`);

--
-- Ograniczenia dla tabeli `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`leader_ID`) REFERENCES `employee` (`employee_ID`) ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `team_employee`
--
ALTER TABLE `team_employee`
  ADD CONSTRAINT `team_employee_ibfk_1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`employee_ID`),
  ADD CONSTRAINT `team_employee_ibfk_2` FOREIGN KEY (`team_ID`) REFERENCES `team` (`team_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
