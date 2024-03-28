-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 10:08 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget_app`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL,
  `expense_amount` decimal(8,2) NOT NULL,
  `expense_date` date NOT NULL,
  `expense_category_assigned_to_user_id` int(11) NOT NULL,
  `payment_method_assigned_to_user_id` int(11) NOT NULL,
  `expense_note` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expense_amount`, `expense_date`, `expense_category_assigned_to_user_id`, `payment_method_assigned_to_user_id`, `expense_note`, `user_id`) VALUES
(2, 150.00, '2024-01-08', 52, 1, '', 20),
(3, 30.00, '2024-01-07', 51, 1, '', 20),
(4, 456.00, '2024-03-28', 58, 1, 'Trip to Iceland', 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses_category_assigned_to_users`
--

CREATE TABLE `expenses_category_assigned_to_users` (
  `expense_category_assigned_to_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expense_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses_category_assigned_to_users`
--

INSERT INTO `expenses_category_assigned_to_users` (`expense_category_assigned_to_user_id`, `user_id`, `expense_category_name`) VALUES
(1, 14, 'Food'),
(2, 14, 'Fuel'),
(3, 14, 'Urban transport'),
(4, 14, 'Entertainment'),
(5, 14, 'Health'),
(6, 14, 'Clothes'),
(7, 14, 'Sport activities'),
(8, 14, 'Trip'),
(9, 14, 'Savings'),
(10, 14, 'Other'),
(11, 16, 'Food'),
(12, 16, 'Fuel'),
(13, 16, 'Urban transport'),
(14, 16, 'Entertainment'),
(15, 16, 'Health'),
(16, 16, 'Clothes'),
(17, 16, 'Sport activities'),
(18, 16, 'Trip'),
(19, 16, 'Savings'),
(20, 16, 'Other'),
(21, 17, 'Food'),
(22, 17, 'Fuel'),
(23, 17, 'Urban transport'),
(24, 17, 'Entertainment'),
(25, 17, 'Health'),
(26, 17, 'Clothes'),
(27, 17, 'Sport activities'),
(28, 17, 'Trip'),
(29, 17, 'Savings'),
(30, 17, 'Other'),
(31, 18, 'Food'),
(32, 18, 'Fuel'),
(33, 18, 'Urban transport'),
(34, 18, 'Entertainment'),
(35, 18, 'Health'),
(36, 18, 'Clothes'),
(37, 18, 'Sport activities'),
(38, 18, 'Trip'),
(39, 18, 'Savings'),
(40, 18, 'Other'),
(41, 19, 'Food'),
(42, 19, 'Fuel'),
(43, 19, 'Urban transport'),
(44, 19, 'Entertainment'),
(45, 19, 'Health'),
(46, 19, 'Clothes'),
(47, 19, 'Sport activities'),
(48, 19, 'Trip'),
(49, 19, 'Savings'),
(50, 19, 'Other'),
(51, 20, 'Food'),
(52, 20, 'Fuel'),
(53, 20, 'Urban transport'),
(54, 20, 'Entertainment'),
(55, 20, 'Health'),
(56, 20, 'Clothes'),
(57, 20, 'Sport activities'),
(58, 20, 'Trip'),
(59, 20, 'Savings'),
(60, 20, 'Other');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expenses_category_default`
--

CREATE TABLE `expenses_category_default` (
  `expense_category_default_id` int(11) NOT NULL,
  `expense_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses_category_default`
--

INSERT INTO `expenses_category_default` (`expense_category_default_id`, `expense_category_name`) VALUES
(1, 'Food'),
(2, 'Fuel'),
(3, 'Urban transport'),
(4, 'Entertainment'),
(5, 'Health'),
(6, 'Clothes'),
(7, 'Sport activities'),
(8, 'Trip'),
(9, 'Savings'),
(10, 'Other');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `incomes`
--

CREATE TABLE `incomes` (
  `income_id` int(11) NOT NULL,
  `income_amount` decimal(8,2) NOT NULL,
  `income_date` date NOT NULL,
  `income_category_assigned_to_user_id` int(11) NOT NULL,
  `income_note` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`income_id`, `income_amount`, `income_date`, `income_category_assigned_to_user_id`, `income_note`, `user_id`) VALUES
(1, 312.00, '2024-03-27', 0, 'Hello', 10),
(3, 10.00, '2024-03-29', 33, 'new money', 20),
(4, 2000.00, '2024-01-10', 33, 'My first salary', 20),
(5, 500.00, '2024-01-16', 35, 'Renting', 20),
(6, 20.00, '2024-01-25', 36, '', 20),
(7, 45.00, '2024-01-28', 36, '', 20),
(8, 95.00, '2024-01-30', 36, '', 20),
(9, 2100.00, '2024-02-10', 33, 'My second salary', 20),
(10, 300.00, '2024-02-14', 35, 'Renting', 20),
(11, 450.00, '2024-02-20', 34, 'Bitcoin', 20),
(12, 310.00, '2024-02-23', 34, 'Bitcoin', 20),
(13, 3100.00, '2024-03-10', 33, 'My third salary', 20),
(14, 600.00, '2024-03-17', 35, 'Renting + bonus', 20),
(15, 100.00, '2024-03-26', 34, 'Bitcoin again', 20),
(16, 1223.00, '2024-03-14', 34, 'Stock investment', 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `incomes_category_assigned_to_users`
--

CREATE TABLE `incomes_category_assigned_to_users` (
  `income_category_assigned_to_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `income_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incomes_category_assigned_to_users`
--

INSERT INTO `incomes_category_assigned_to_users` (`income_category_assigned_to_user_id`, `user_id`, `income_category_name`) VALUES
(1, 12, 'Salary'),
(2, 12, 'Investments'),
(3, 12, 'Passive income'),
(4, 12, 'Another'),
(5, 13, 'Salary'),
(6, 13, 'Investments'),
(7, 13, 'Passive income'),
(8, 13, 'Another'),
(9, 14, 'Salary'),
(10, 14, 'Investments'),
(11, 14, 'Passive income'),
(12, 14, 'Another'),
(13, 14, 'Salary'),
(14, 14, 'Investments'),
(15, 14, 'Passive income'),
(16, 14, 'Another'),
(17, 16, 'Salary'),
(18, 16, 'Investments'),
(19, 16, 'Passive income'),
(20, 16, 'Another'),
(21, 17, 'Salary'),
(22, 17, 'Investments'),
(23, 17, 'Passive income'),
(24, 17, 'Another'),
(25, 18, 'Salary'),
(26, 18, 'Investments'),
(27, 18, 'Passive income'),
(28, 18, 'Another'),
(29, 19, 'Salary'),
(30, 19, 'Investments'),
(31, 19, 'Passive income'),
(32, 19, 'Another'),
(33, 20, 'Salary'),
(34, 20, 'Investments'),
(35, 20, 'Passive income'),
(36, 20, 'Another');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `incomes_category_default`
--

CREATE TABLE `incomes_category_default` (
  `income_category_default_id` int(11) NOT NULL,
  `income_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incomes_category_default`
--

INSERT INTO `incomes_category_default` (`income_category_default_id`, `income_category_name`) VALUES
(1, 'Salary'),
(2, 'Investments'),
(3, 'Passive income'),
(4, 'Another');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment_method_assigned_to_users`
--

CREATE TABLE `payment_method_assigned_to_users` (
  `payment_method_assigned_to_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment_method_default`
--

CREATE TABLE `payment_method_default` (
  `payment_method_default_id` int(11) NOT NULL,
  `payment_method_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `user_name`, `password`, `address_email`) VALUES
(5, 'pawel', 'helloworld', 'pawel@gmail.pl'),
(6, 'Jakub', 'wojnaswiatow', 'jakub@gmail.com'),
(7, 'ready', 'readyplayerone', 'ready@gmail.com'),
(8, 'Karolina', 'berlinberlin', 'karolina@gmail.com'),
(10, 'Mary', 'maryjane', 'mary@gmail.com'),
(11, 'Tom', 'tomandjerry', 'tom@gmail.com'),
(12, 'Peter', 'peterparker', 'peter@gmail.com'),
(13, 'Harry', 'harrystyles', 'harry@gmail.com'),
(14, 'Brad', 'bradpitt', 'brad@gmail.com'),
(16, 'Angelina', 'angelinajolie', 'angelina@gmail.com'),
(17, 'Jerry', 'jerryisdead', 'jerry@gmail.com'),
(18, 'Jon', 'jonsnowrocks', 'jon@gmail.com'),
(19, 'Mastermind', 'mastermindgo', 'mastermind@gmail.com'),
(20, 'Josh', 'joshbrolin', 'josh@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indeksy dla tabeli `expenses_category_assigned_to_users`
--
ALTER TABLE `expenses_category_assigned_to_users`
  ADD PRIMARY KEY (`expense_category_assigned_to_user_id`);

--
-- Indeksy dla tabeli `expenses_category_default`
--
ALTER TABLE `expenses_category_default`
  ADD PRIMARY KEY (`expense_category_default_id`);

--
-- Indeksy dla tabeli `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`income_id`);

--
-- Indeksy dla tabeli `incomes_category_assigned_to_users`
--
ALTER TABLE `incomes_category_assigned_to_users`
  ADD PRIMARY KEY (`income_category_assigned_to_user_id`);

--
-- Indeksy dla tabeli `incomes_category_default`
--
ALTER TABLE `incomes_category_default`
  ADD PRIMARY KEY (`income_category_default_id`);

--
-- Indeksy dla tabeli `payment_method_assigned_to_users`
--
ALTER TABLE `payment_method_assigned_to_users`
  ADD PRIMARY KEY (`payment_method_assigned_to_user_id`);

--
-- Indeksy dla tabeli `payment_method_default`
--
ALTER TABLE `payment_method_default`
  ADD PRIMARY KEY (`payment_method_default_id`);

--
-- Indeksy dla tabeli `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses_category_assigned_to_users`
--
ALTER TABLE `expenses_category_assigned_to_users`
  MODIFY `expense_category_assigned_to_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `expenses_category_default`
--
ALTER TABLE `expenses_category_default`
  MODIFY `expense_category_default_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `incomes_category_assigned_to_users`
--
ALTER TABLE `incomes_category_assigned_to_users`
  MODIFY `income_category_assigned_to_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `incomes_category_default`
--
ALTER TABLE `incomes_category_default`
  MODIFY `income_category_default_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_method_assigned_to_users`
--
ALTER TABLE `payment_method_assigned_to_users`
  MODIFY `payment_method_assigned_to_user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_method_default`
--
ALTER TABLE `payment_method_default`
  MODIFY `payment_method_default_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
