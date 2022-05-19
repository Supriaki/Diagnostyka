-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Maj 2022, 23:15
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `3e_obmsl_diagnostyka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE `klasa` (
  `id_klasa` int(11) NOT NULL,
  `osoba` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(250) NOT NULL,
  `1wybor` varchar(30) NOT NULL,
  `2wybor` varchar(30) NOT NULL,
  `3wybor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id_klasa`, `osoba`, `login`, `haslo`, `1wybor`, `2wybor`, `3wybor`) VALUES
(1, '1', 'miloszb', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '16', '13', '14'),
(2, '2', 'tomekb', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '13', '7', '8'),
(3, '3', 'arturc', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '7', '11', '2'),
(4, '4', 'mateuszh', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '12', '13', '33'),
(5, '5', 'olap', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '19', '24', '32'),
(6, '6', 'martynaw', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '9', '25', '1'),
(7, '7', 'mariuszp', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '8', '1', '15'),
(8, '8', 'grzegorzs', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '7', '17', '15'),
(9, '9', 'kubaz', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '6', '1', '5'),
(10, '10', 'olah', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '18', '3', '11'),
(11, '11', 'polaks', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '8', '7', '15'),
(12, '12', 'adelac', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '1', '8', '13'),
(13, '13', 'sewerynae', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '16', '1', '4'),
(14, '14', 'normaj', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '30', '31', '25'),
(15, '15', 'alicjac', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '11', '7', '8'),
(16, '16', 'rafału', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '13', '1', '30'),
(17, '17', 'apoloniuszo', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '29', '28', '21'),
(18, '18', 'aldonae', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '21', '23', '29'),
(19, '19', 'lubomirn', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '32', '24', '5'),
(20, '20', 'marcjuszo', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '33', '24', '17'),
(21, '21', 'donatal', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '28', '29', '17'),
(22, '22', 'melanias', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '19', '5', '32'),
(23, '23', 'rudolfinab', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '18', '29', '21'),
(24, '24', 'eryki', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '32', '19', '5'),
(25, '25', 'wiwannau', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '14', '30', '31'),
(26, '26', 'alberc', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '7', '28', '21'),
(27, '27', 'margaretat', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '33', '13', '16'),
(28, '28', 'marcela', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '29', '21', '17'),
(29, '29', 'mirabellah', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '21', '28', '17'),
(30, '30', 'nastazjaf', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '14', '31', '25'),
(31, '31', 'bogdanae', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '25', '30', '14'),
(32, '32', 'emiliab', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '19', '24', '5'),
(33, '33', 'wacławu', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '20', '24', '13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tabela`
--

CREATE TABLE `tabela` (
  `id_tabela` int(2) NOT NULL,
  `table_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tabela`
--

INSERT INTO `tabela` (`id_tabela`, `table_name`) VALUES
(1, 'klasa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test1`
--

CREATE TABLE `test1` (
  `id_test1` int(11) NOT NULL,
  `osoba` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(250) NOT NULL,
  `1wybor` varchar(30) NOT NULL,
  `2wybor` varchar(30) NOT NULL,
  `3wybor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `test1`
--

INSERT INTO `test1` (`id_test1`, `osoba`, `login`, `haslo`, `1wybor`, `2wybor`, `3wybor`) VALUES
(1, '1', 'eurobita', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '', '', ''),
(2, '2', 'klaszok', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytk_spec`
--

CREATE TABLE `uzytk_spec` (
  `id_uzytkownicy` int(6) UNSIGNED NOT NULL,
  `uzytkownik` varchar(30) NOT NULL,
  `haslo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytk_spec`
--

INSERT INTO `uzytk_spec` (`id_uzytkownicy`, `uzytkownik`, `haslo`) VALUES
(1, 'admin', 'd5f12e53a182c062b6bf30c1445153faff12269a'),
(2, 'bartek', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klasa`
--
ALTER TABLE `klasa`
  ADD PRIMARY KEY (`id_klasa`);

--
-- Indeksy dla tabeli `tabela`
--
ALTER TABLE `tabela`
  ADD PRIMARY KEY (`id_tabela`);

--
-- Indeksy dla tabeli `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`id_test1`);

--
-- Indeksy dla tabeli `uzytk_spec`
--
ALTER TABLE `uzytk_spec`
  ADD PRIMARY KEY (`id_uzytkownicy`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klasa`
--
ALTER TABLE `klasa`
  MODIFY `id_klasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT dla tabeli `tabela`
--
ALTER TABLE `tabela`
  MODIFY `id_tabela` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `test1`
--
ALTER TABLE `test1`
  MODIFY `id_test1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `uzytk_spec`
--
ALTER TABLE `uzytk_spec`
  MODIFY `id_uzytkownicy` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
