-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: localhost:3306
-- Χρόνος δημιουργίας: 02 Οκτ 2017 στις 11:05:12
-- Έκδοση διακομιστή: 5.7.19-0ubuntu0.17.04.1
-- Έκδοση PHP: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `project`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Admin`
--

CREATE TABLE `Admin` (
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `Admin`
--

INSERT INTO `Admin` (`Username`, `Password`) VALUES
('admin', 'admin'),
('root', 'root');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `AssistantHub`
--

CREATE TABLE `AssistantHub` (
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HubID` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `AssistantHub`
--

INSERT INTO `AssistantHub` (`Username`, `Password`, `HubID`) VALUES
('AssistantHub1', 'AssistantHub1', 'Hub1'),
('AssistantHub2', 'AssistantHub2', 'Hub2'),
('AssistantHub3', 'AssistantHub3', 'Hub3'),
('AssistantHub4', 'AssistantHub4', 'Hub4'),
('AssistantHub5', 'AssistantHub5', 'Hub5'),
('AssistantHub6', 'AssistantHub6', 'Hub6'),
('AssistantHub7', 'AssistantHub7', 'Hub7'),
('AssistantHub8', 'AssistantHub8', 'Hub8'),
('AssistantHub9', 'AssistantHub9', 'Hub9');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `AssistantStore`
--

CREATE TABLE `AssistantStore` (
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Store` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `AssistantStore`
--

INSERT INTO `AssistantStore` (`Username`, `Password`, `Store`) VALUES
('AssistantStore1', 'AssistantStore1', 'Store1'),
('AssistantStore10', 'AssistantStore10', 'Store10'),
('AssistantStore11', 'AssistantStore11', 'Store11'),
('AssistantStore12', 'AssistantStore12', 'Store12'),
('AssistantStore13', 'AssistantStore13', 'Store13'),
('AssistantStore14', 'AssistantStore14', 'Store14'),
('AssistantStore15', 'AssistantStore15', 'Store15'),
('AssistantStore16', 'AssistantStore16', 'Store16'),
('AssistantStore17', 'AssistantStore17', 'Store17'),
('AssistantStore18', 'AssistantStore18', 'Store18'),
('AssistantStore2', 'AssistantStore2', 'Store2'),
('AssistantStore3', 'AssistantStore3', 'Store3'),
('AssistantStore4', 'AssistantStore4', 'Store4'),
('AssistantStore5', 'AssistantStore5', 'Store5'),
('AssistantStore6', 'AssistantStore6', 'Store6'),
('AssistantStore7', 'AssistantStore7', 'Store7'),
('AssistantStore8', 'AssistantStore8', 'Store8'),
('AssistantStore9', 'AssistantStore9', 'Store9');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Package`
--

CREATE TABLE `Package` (
  `TrackingID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Destination` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Express` tinyint(1) NOT NULL,
  `Delivered` tinyint(1) NOT NULL,
  `SentDate` date NOT NULL,
  `DeliveryDate` date NOT NULL,
  `Locations` text COLLATE utf8_unicode_ci NOT NULL,
  `Route` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `Package`
--

INSERT INTO `Package` (`TrackingID`, `Destination`, `Username`, `Express`, `Delivered`, `SentDate`, `DeliveryDate`, `Locations`, `Route`) VALUES
('TH1506926782KE', 'Store17', 'John Doe', 0, 1, '2017-10-02', '2017-10-04', 'ΑΓΙΟΥ ΔΗΜΗΤΡΙΟΥ,Hub Πολίχνη,Hub Ιωάννινα,Hub Πάτρα,ΚΕΦΑΛΛΟΝΙΑ,', 'Θεσσαλονίκη,Ιωάννινα,Πάτρα');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Store`
--

CREATE TABLE `Store` (
  `ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AddressNum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Latitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Longitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TransitHubID` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `Store`
--

INSERT INTO `Store` (`ID`, `Name`, `Address`, `AddressNum`, `City`, `TK`, `PhoneNum`, `Latitude`, `Longitude`, `TransitHubID`) VALUES
('Store1', 'ΑΓΙΟΥ ΔΗΜΗΤΡΙΟΥ', 'Αγίου Δημητρίου', '99', 'Θεσσαλονίκη', '54633', '2310-251604', '40.637705', '22.949223', 'Hub6'),
('Store10', 'ΚΑΛΑΒΡΥΤΑ', 'Βασιλεώς Κωνσταντίνου', '5', 'Καλάβρυτα', '25001', '26920-24200', '38.0276848', '22.1109853', 'Hub4'),
('Store11', 'ΘΗΒΑ', 'Αυλίδος', '35', 'Θήβα', '32200', '22620-29999', '38.3242428', '23.3199454', 'Hub3'),
('Store12', 'ΧΙΟΣ', 'Πολυτεχνείου', '31', 'Χίος', '82100', '22710-25468', '38.3768217', '26.1290861', 'Hub9'),
('Store13', 'ΠΑΤΡΑ', 'Πανεπιστημίου', '101', 'Πάτρα', '26441', '2610-223242', '38.2601998', '21.7494256', 'Hub4'),
('Store14', 'ΓΙΑΝΝΕΝΑ', 'Δωδώνης', '161', 'Ιωάννινα', '45221', '26510-66966', '39.650059', '20.8451133', 'Hub5'),
('Store15', 'ΛΑΡΙΣΑ', 'Φαρσάλων 140', '41335', 'Λάρισα', '41335', '', '39.6152589', '22.4280348', 'Hub7'),
('Store16', 'ΛΑΜΙΑ', 'Λαρίσης', '77', 'Λαμία', '35100', '22310-34565', '38.917564', '22.4248486', 'Hub7'),
('Store17', 'ΚΕΦΑΛΛΟΝΙΑ', 'Λεωφόρος Βεργώτη', '51', 'Κεφαλλονιά', '28100', '26710-28002', '38.1735306', '20.4876381', 'Hub4'),
('Store18', 'ΣΕΡΡΕΣ', 'Βενιζέλου', '91', 'Σέρρες', '62121', '23210-50889', '41.0877664', '23.5392965', 'Hub6'),
('Store2', 'ΑΓΙΑ ΠΑΡΑΣΚΕΥΗ', 'Μεσογείων', '389', 'Αθήνα', '15343', '210-6014131', '38.011796', '23.813282', 'Hub3'),
('Store3', 'ΑΓΡΙΝΙΟ', 'Εθνικής Αντιστάσεως', '102', 'Αγρίνιο', '30100', '', '38.6207475', '21.4187296', 'Hub4'),
('Store4', 'ΑΛΕΞΑΝΔΡΟΥΠΟΛΗ', 'Λεωφόρος Δημοκρατίας', '46', 'Αλεξανδρούπολη', '68100', '', '40.848435', '25.8861243', 'Hub1'),
('Store5', 'ΛΙΒΑΔΕΙΑ', 'Δημητρίου Παπασπύρου', '13', 'Λιβαδειά', '32100', '22610-88933', '38.4407143', '22.8861329', 'Hub3'),
('Store6', 'ΜΕΣΟΛΟΓΓΙ', 'Σπύρου Μουστακλή', '8', 'Μεσολόγγι', '30200', '26310-26310', '38.315375', '21.3539644', 'Hub4'),
('Store7', 'ΜΗΛΟΣ', 'Αδαμαντας Μήλου', '', 'Μήλος', '84800', '22870-23232', '36.727896', '24.446916', 'Hub3'),
('Store8', 'ΗΡΑΚΛΕΙΟ-ΚΕΝΤΡΟ', 'Σανουδάκη', '28', 'Ηράκλειο', '71202', '2810-336300', '35.328564', '25.132921', 'Hub2'),
('Store9', 'ΡΟΔΟΣ-ΑΦΑΝΤΟΥ', 'Πέρνου', '60', 'Ρόδος', '85103', '22410-52687', '36.2926204', '28.1602982', 'Hub2');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `StoreAbbr`
--

CREATE TABLE `StoreAbbr` (
  `City` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Abbreviation` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `StoreAbbr`
--

INSERT INTO `StoreAbbr` (`City`, `Abbreviation`) VALUES
('Αγρίνιο', 'AG'),
('Αθήνα', 'ΑΤ'),
('Αλεξανδρούπολη', 'AL'),
('Ηράκλειο', 'HR'),
('Θεσσαλονίκη', 'TH'),
('Θήβα', 'TH'),
('Ιωάννινα', 'IO'),
('Καλάβρυτα', 'KA'),
('Καλαμάτα', 'KA'),
('Κεφαλλονιά', 'KE'),
('Λαμία', 'LA'),
('Λάρισα', 'LA'),
('Λιβαδειά', 'LI'),
('Μεσολόγγι', 'ME'),
('Μήλος', 'MH'),
('Μυτιλήνη', 'MY'),
('Πάτρα', 'PA'),
('Ρόδος', 'RO'),
('Σέρρες', 'SE'),
('Χίος', 'XI');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `TransitHub`
--

CREATE TABLE `TransitHub` (
  `ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AddressNum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Latitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Longitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `TransitHub`
--

INSERT INTO `TransitHub` (`ID`, `Name`, `Address`, `AddressNum`, `City`, `TK`, `PhoneNum`, `Latitude`, `Longitude`) VALUES
('Hub1', 'Αλεξανδρούπολη', 'Αγίου Δημητρίου', '28', 'Αλεξανδρούπολη', '68100', '25513 51000  ', '40.8566454', '25.8591127'),
('Hub2', 'Ηράκλειο', 'Πάροδος 3 Ποσειδόνως', '1', 'Ηράκλειο', '71307', '2813 400300', '35.3397743', '25.1477051'),
('Hub3', 'Ασπρόπυργος', 'Σαλαμίνος', '72-76', 'Ασπρόπυργος', '19300', '21 0557 0384', '38.0562016', '23.5869598'),
('Hub4', 'Πάτρα', 'Μυκηνών', '40', 'Πάτρα', '26332', '261 062 3888', '38.2252352', '21.7391968'),
('Hub5', 'Ιωάννινα', 'Στρατάρχου Παπάγου', '51', 'Ιωάννινα', '45444', '2651 025014', '39.6709947', '20.8451573'),
('Hub6', 'Θεσσαλονίκη', 'Σοφοκλή Βενιζέλου', '12', 'Πολίχνη', '56429', '231 054 3451', '40.672306', '22.9394531'),
('Hub7', 'Λάρισα', 'Γρηγορίου Λαμπράκη', '23', 'Λάρισα', '41447', '241 056 7600', '39.6437676', '22.4121094'),
('Hub8', 'Καλαμάτα', 'Καλλιπάτειρας', '41-61', 'Καλαμάτα', '24100', '2721 021112', '37.0420244', '22.1209717'),
('Hub9', 'Μυτιλήνη', 'Μαύρου', '34', 'Μυτιλήνη', '81100', '22530 22100', '39.0945307', '26.5491757');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Username`);

--
-- Ευρετήρια για πίνακα `AssistantHub`
--
ALTER TABLE `AssistantHub`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `WorkingID` (`HubID`),
  ADD KEY `Username` (`Username`),
  ADD KEY `Password` (`Password`);

--
-- Ευρετήρια για πίνακα `AssistantStore`
--
ALTER TABLE `AssistantStore`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `Store` (`Store`);

--
-- Ευρετήρια για πίνακα `Package`
--
ALTER TABLE `Package`
  ADD PRIMARY KEY (`TrackingID`),
  ADD KEY `Username` (`Username`),
  ADD KEY `Destination` (`Destination`);

--
-- Ευρετήρια για πίνακα `Store`
--
ALTER TABLE `Store`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `TransitHubID` (`TransitHubID`);

--
-- Ευρετήρια για πίνακα `StoreAbbr`
--
ALTER TABLE `StoreAbbr`
  ADD PRIMARY KEY (`City`);

--
-- Ευρετήρια για πίνακα `TransitHub`
--
ALTER TABLE `TransitHub`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `AssistantHub`
--
ALTER TABLE `AssistantHub`
  ADD CONSTRAINT `Job` FOREIGN KEY (`HubID`) REFERENCES `TransitHub` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `AssistantStore`
--
ALTER TABLE `AssistantStore`
  ADD CONSTRAINT `Job2` FOREIGN KEY (`Store`) REFERENCES `Store` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `Package`
--
ALTER TABLE `Package`
  ADD CONSTRAINT `Destination` FOREIGN KEY (`Destination`) REFERENCES `Store` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `Store`
--
ALTER TABLE `Store`
  ADD CONSTRAINT `Hub` FOREIGN KEY (`TransitHubID`) REFERENCES `TransitHub` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
