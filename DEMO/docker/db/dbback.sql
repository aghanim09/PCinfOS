-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 172.17.0.3
-- Erstellungszeit: 29. Jun 2023 um 17:23
-- Server-Version: 8.0.33
-- PHP-Version: 8.1.20

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dbback`

-- USE dbback;

--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `AcneTracking`
--

CREATE TABLE `AcneTracking` (
  `acneId` int NOT NULL,
  `date` date NOT NULL,
  `value` int NOT NULL,
  `profileId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Foodpreferences`
--

CREATE TABLE `Foodpreferences` (
  `preferenceId` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `Foodpreferences`
--

INSERT INTO `Foodpreferences` (`preferenceId`, `name`) VALUES
(1, 'Vegan'),
(2, 'Vegetarian'),
(3, 'Lactose free'),
(4, 'Keto'),
(5, 'Pescetarian'),
(6, 'No preference');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Foodrestrictions`
--

CREATE TABLE `Foodrestrictions` (
  `restrictionId` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `Foodrestrictions`
--

INSERT INTO `Foodrestrictions` (`restrictionId`, `name`) VALUES
(1, 'Nightshades'),
(2, 'Gluten'),
(3, 'Lactose'),
(4, 'Nuts');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Foods`
--

CREATE TABLE `Foods` (
  `foodId` int NOT NULL,
  `name` text NOT NULL,
  `isGood` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `Foods`
--

INSERT INTO `Foods` (`foodId`, `name`, `isGood`) VALUES
(1, 'Leafy Greens', 1),
(2, 'Legumes', 1),
(3, 'Shellfish', 1),
(4, 'Citrus Fruits', 1),
(5, 'Dairy', 0),
(6, 'Simple Carbs', 0),
(7, 'Nettle', 1),
(8, 'Fatty fish', 1),
(9, 'Nuts and seeds', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `FoodTracking`
--

CREATE TABLE `FoodTracking` (
  `eatenId` int NOT NULL,
  `date` date NOT NULL,
  `profileId` int NOT NULL,
  `foodId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `HairLossTracking`
--

CREATE TABLE `HairLossTracking` (
  `lhairId` int NOT NULL,
  `value` int NOT NULL,
  `date` date NOT NULL,
  `profileId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `HairGrowthTracking`
--

CREATE TABLE `HairGrowthTracking` (
  `ghairId` int NOT NULL,
  `value` int NOT NULL,
  `date` date NOT NULL,
  `profileId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Login`
--

CREATE TABLE `Login` (
  `userId` int NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `profileId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Login` (`userId`, `email`, `password`, `profileId`) VALUES
(1, 'admin@gmail.com', 'admin', 1);
-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `MenstruationTracking`
--

CREATE TABLE `MenstruationTracking` (
  `menId` int NOT NULL,
  `date` date NOT NULL,
  `status` int NOT NULL,
  `profileId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Profile`
--

CREATE TABLE `Profile` (
  `profileId` int NOT NULL,
  `dob` date,
  `ethnicity` text,
  `height` int,
  `weight` int,
  `name` text,
  `birthcontrol` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Profile` (`profileId`, `dob`, `ethnicity`, `height`, `weight`, `name`, `birthcontrol`) VALUES
(1, '2001-01-01', 'Asian', 176, 67, 'Admin', 'hormonal');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `SelectedFoodpreferences`
--

CREATE TABLE `SelectedFoodpreferences` (
  `selPreferenceId` int NOT NULL,
  `preferenceId` int NOT NULL,
  `profileId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `SelectedFoodrestrictions`
--

CREATE TABLE `SelectedFoodrestrictions` (
  `selRestrictionId` int NOT NULL,
  `restrictionId` int NOT NULL,
  `profileId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
--
-- Tabellenstruktur für Tabelle `Symptoms`
--

CREATE TABLE `Symptoms` (
  `symptomId` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `Symptoms`
--

INSERT INTO `Symptoms` (`symptomId`, `name`) VALUES
(1, 'Acne'),
(2, 'Weight'),
(3, 'Growth of Body Hair (Hirsutism)'),
(4, 'Menstruation'),
(5, 'Hair loss (Alopecia)');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `WeightTracking`
--

CREATE TABLE `WeightTracking` (
  `weightId` int NOT NULL,
  `date` date NOT NULL,
  `value` int NOT NULL,
  `profileId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Tabellenstruktur für Tabelle `Activity`
--

CREATE TABLE 'Activity' (
    activityId INTEGER PRIMARY KEY AUTOINCREMENT,
    userId INTEGER NOT NULL,
    activityDate DATE,
    activityType TEXT,
    distance INTEGER, -- in meters
    duration INTEGER, -- in minutes
    intensity TEXT
);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `AcneTracking`
--
ALTER TABLE `AcneTracking`
  ADD PRIMARY KEY (`acneId`),
  ADD KEY `profileId` (`profileId`);

--
-- Indizes für die Tabelle `Foodpreferences`
--
ALTER TABLE `Foodpreferences`
  ADD PRIMARY KEY (`preferenceId`);

--
-- Indizes für die Tabelle `Foodrestrictions`
--
ALTER TABLE `Foodrestrictions`
  ADD PRIMARY KEY (`restrictionId`);

--
-- Indizes für die Tabelle `Foods`
--
ALTER TABLE `Foods`
  ADD PRIMARY KEY (`foodId`);

--
-- Indizes für die Tabelle `FoodTracking`
--
ALTER TABLE `FoodTracking`
  ADD PRIMARY KEY (`eatenId`),
  ADD KEY `foodId` (`foodId`),
  ADD KEY `profileId` (`profileId`);

--
-- Indizes für die Tabelle `HairLossTracking`
--
ALTER TABLE `HairLossTracking`
  ADD PRIMARY KEY (`lhairId`),
  ADD KEY `profileId` (`profileId`);

--
-- Indizes für die Tabelle `HairGrowthTracking`
--
ALTER TABLE `HairGrowthTracking`
  ADD PRIMARY KEY (`ghairId`),
  ADD KEY `profileId` (`profileId`);

--
-- Indizes für die Tabelle `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `profileId` (`profileId`);

--
-- Indizes für die Tabelle `MenstruationTracking`
--
ALTER TABLE `MenstruationTracking`
  ADD PRIMARY KEY (`menId`),
  ADD KEY `profileId` (`profileId`);

--
-- Indizes für die Tabelle `Profile`
--
ALTER TABLE `Profile`
  ADD PRIMARY KEY (`profileId`);

--
-- Indizes für die Tabelle `SelectedFoodpreferences`
--
ALTER TABLE `SelectedFoodpreferences`
  ADD PRIMARY KEY (`selPreferenceId`),
  ADD KEY `preferenceId` (`preferenceId`),
  ADD KEY `profileId` (`profileId`);

--
-- Indizes für die Tabelle `SelectedFoodrestrictions`
--
ALTER TABLE `SelectedFoodrestrictions`
  ADD PRIMARY KEY (`selRestrictionId`),
  ADD KEY `restrictionId` (`restrictionId`),
  ADD KEY `profileId` (`profileId`);

--
-- Indizes für die Tabelle `Symptoms`
--
ALTER TABLE `Symptoms`
  ADD PRIMARY KEY (`symptomId`);

--
-- Indizes für die Tabelle `WeightTracking`
--
ALTER TABLE `WeightTracking`
  ADD PRIMARY KEY (`weightId`),
  ADD KEY `profileId` (`profileId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `AcneTracking`
--
ALTER TABLE `AcneTracking`
  MODIFY `acneId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Foodrestrictions`
--
ALTER TABLE `Foodrestrictions`
  MODIFY `restrictionId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `FoodTracking`
--
ALTER TABLE `FoodTracking`
  MODIFY `eatenId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `HairLossTracking`
--
ALTER TABLE `HairLossTracking`
  MODIFY `lhairId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `HairGrowthTracking`
--
ALTER TABLE `HairGrowthTracking`
  MODIFY `ghairId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Login`
--
ALTER TABLE `Login`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `MenstruationTracking`
--
ALTER TABLE `MenstruationTracking`
  MODIFY `menId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Profile`
--
ALTER TABLE `Profile`
  MODIFY `profileId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `SelectedFoodpreferences`
--
ALTER TABLE `SelectedFoodpreferences`
  MODIFY `selPreferenceId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `SelectedFoodrestrictions`
--
ALTER TABLE `SelectedFoodrestrictions`
  MODIFY `selRestrictionId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `WeightTracking`
--
ALTER TABLE `WeightTracking`
  MODIFY `weightId` int NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `AcneTracking`
--
ALTER TABLE `AcneTracking`
  ADD CONSTRAINT `AcneTracking_ibfk_1` FOREIGN KEY (`profileId`) REFERENCES `Profile` (`profileId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `Activity`
--
ALTER TABLE 'Activity'
  ADD CONSTRAINT 'Activity_ibfk_1' FOREIGN KEY ('userId') REFERENCES 'Login' ('userId') ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `FoodTracking`
--
ALTER TABLE `FoodTracking`
  ADD CONSTRAINT `FoodTracking_ibfk_1` FOREIGN KEY (`foodId`) REFERENCES `Foods` (`foodId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FoodTracking_ibfk_2` FOREIGN KEY (`profileId`) REFERENCES `Profile` (`profileId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `HairLossTracking`
--
ALTER TABLE `HairLossTracking`
  ADD CONSTRAINT `HairLossTracking_ibfk_1` FOREIGN KEY (`profileId`) REFERENCES `Profile` (`profileId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `HairGrowthTracking`
--
ALTER TABLE `HairGrowthTracking`
  ADD CONSTRAINT `HairGrowthTracking_ibfk_1` FOREIGN KEY (`profileId`) REFERENCES `Profile` (`profileId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `MenstruationTracking`
--
ALTER TABLE `MenstruationTracking`
  ADD CONSTRAINT `MenstruationTracking_ibfk_1` FOREIGN KEY (`profileId`) REFERENCES `Profile` (`profileId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `Profile`
--
ALTER TABLE `Login`
  ADD CONSTRAINT `Login_ibfk_1` FOREIGN KEY (`profileId`) REFERENCES `Profile` (`profileId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `SelectedFoodpreferences`
--
ALTER TABLE `SelectedFoodpreferences`
  ADD CONSTRAINT `SelectedFoodpreferences_ibfk_1` FOREIGN KEY (`preferenceId`) REFERENCES `Foodpreferences` (`preferenceId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `SelectedFoodpreferences_ibfk_2` FOREIGN KEY (`profileId`) REFERENCES `Profile` (`profileId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `SelectedFoodrestrictions`
--
ALTER TABLE `SelectedFoodrestrictions`
  ADD CONSTRAINT `SelectedFoodrestrictions_ibfk_1` FOREIGN KEY (`restrictionId`) REFERENCES `Foodrestrictions` (`restrictionId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `SelectedFoodrestrictions_ibfk_2` FOREIGN KEY (`profileId`) REFERENCES `Profile` (`profileId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints der Tabelle `WeightTracking`
--
ALTER TABLE `WeightTracking`
  ADD CONSTRAINT `WeightTracking_ibfk_1` FOREIGN KEY (`profileId`) REFERENCES `Profile` (`profileId`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;