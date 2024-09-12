-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 10:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `12.09.2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `nazwisko_imie` varchar(100) DEFAULT NULL,
  `ulica` varchar(100) DEFAULT NULL,
  `numer_mieszkania` varchar(10) DEFAULT NULL,
  `miasto` varchar(100) DEFAULT NULL,
  `wojewodztwo` varchar(100) DEFAULT NULL,
  `kod_pocztowy` varchar(10) DEFAULT NULL,
  `kraj` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id`, `nazwisko_imie`, `ulica`, `numer_mieszkania`, `miasto`, `wojewodztwo`, `kod_pocztowy`, `kraj`) VALUES
(1, 'Jadowska Teresa', 'Boczna', '16 m. 2', 'Łódź', 'łódzkie', '68-942', 'Polska'),
(2, 'Płudowski Karol', 'Chełmska', '1 m. 1', 'Warszawa', 'mazowieckie', '04-608', 'Polska'),
(3, 'Karbowski Stefan', 'Podleśna', '18', 'Izabelin', 'mazowieckie', '08-830', 'Polska'),
(4, 'Sitecki Aleksander', 'Topolowa', '23 m. 4', 'Warszawa', 'mazowieckie', '01-388', 'Polska'),
(5, 'Habe Hans', 'Karpfangerstr', '11', 'Leipzię', 'Niedersachsen', '43-000', 'Niemcy');

-- --------------------------------------------------------

--
-- Table structure for table `towary`
--

CREATE TABLE `towary` (
  `kod` varchar(10) NOT NULL,
  `nazwa` varchar(100) DEFAULT NULL,
  `waga` int(11) DEFAULT NULL,
  `opis` varchar(255) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL,
  `stan_magazynowy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `towary`
--

INSERT INTO `towary` (`kod`, `nazwa`, `waga`, `opis`, `cena`, `stan_magazynowy`) VALUES
('ALPY', 'Kolekcja alpejska', 200, 'Alpejskie jagody', 20.75, 400),
('DELI', 'Delicja', 300, 'Masło orzechowe z czekoladą', 19.00, 3900),
('FANT', 'Fantazja', 300, 'Zestaw cukierków w polewie', 18.00, 400),
('GORZ', 'Słodko-gorzkie', 500, 'Gorzka czekolada z truskawkami', 27.75, 200),
('INTE', 'Międzynarodowe', 500, 'Asortyment międzynarodowy', 34.00, 500);

-- --------------------------------------------------------

--
-- Table structure for table `zakupy`
--

CREATE TABLE `zakupy` (
  `id` int(11) NOT NULL,
  `numer_faktury` int(11) DEFAULT NULL,
  `data_zakupu` datetime DEFAULT NULL,
  `klient_id` int(11) DEFAULT NULL,
  `towar_kod` varchar(10) DEFAULT NULL,
  `ilosc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `zakupy`
--

INSERT INTO `zakupy` (`id`, `numer_faktury`, `data_zakupu`, `klient_id`, `towar_kod`, `ilosc`) VALUES
(1, 237, '1998-01-02 00:00:00', 1, 'DELI', 2),
(2, 386, '1998-01-02 00:00:00', 2, 'ALPY', 4),
(3, 386, '1998-01-02 00:00:00', 2, 'DELI', 2),
(4, 131, '1998-01-02 00:00:00', 3, 'FANT', 1),
(5, 332, '1998-01-04 00:00:00', 4, 'GORZ', 3),
(6, 332, '1998-01-04 00:00:00', 4, 'INTE', 1),
(7, 373, '1998-01-06 00:00:00', 5, 'GORZ', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `towary`
--
ALTER TABLE `towary`
  ADD PRIMARY KEY (`kod`);

--
-- Indexes for table `zakupy`
--
ALTER TABLE `zakupy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klient_id` (`klient_id`),
  ADD KEY `towar_kod` (`towar_kod`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zakupy`
--
ALTER TABLE `zakupy`
  ADD CONSTRAINT `zakupy_ibfk_1` FOREIGN KEY (`klient_id`) REFERENCES `klienci` (`id`),
  ADD CONSTRAINT `zakupy_ibfk_2` FOREIGN KEY (`towar_kod`) REFERENCES `towary` (`kod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
