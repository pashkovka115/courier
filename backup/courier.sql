-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 22 2024 г., 18:06
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `courier`
--

-- --------------------------------------------------------

--
-- Структура таблицы `processes`
--

CREATE TABLE `processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `earned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '---' COMMENT 'заработал',
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '---' COMMENT 'зарплата',
  `park_commission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '---' COMMENT 'комиссия парка',
  `gasoline_from_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '---' COMMENT 'заправка бензина со счёта парка',
  `gasoline_for_cash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '---' COMMENT 'заправка за свои',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `spare_parts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `comments` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `processes`
--

INSERT INTO `processes` (`id`, `date`, `earned`, `salary`, `park_commission`, `gasoline_from_account`, `gasoline_for_cash`, `created_at`, `updated_at`, `spare_parts`, `comments`) VALUES
(1, '2024-02-11', '2863.52', '---', '40', '---', '---', '2024-02-21 10:45:14', '2024-02-21 10:45:14', '', NULL),
(2, '2024-02-12', '3090.51', '1100', '40', '508.05', '---', '2024-02-21 10:49:57', '2024-02-21 11:58:40', NULL, NULL),
(3, '2024-02-13', '2560.6', '1950', '40', '---', '394.52', '2024-02-21 10:50:33', '2024-02-21 10:59:24', '', NULL),
(4, '2024-02-14', '---', '3000', NULL, '---', '---', '2024-02-21 10:50:54', '2024-02-21 10:50:54', '', NULL),
(5, '2024-02-15', '3494.44', '1600', '40', '---', '344.32', '2024-02-21 10:51:28', '2024-02-21 10:59:57', '', NULL),
(6, '2024-02-16', '2506.62', '---', '40', '---', '339.6', '2024-02-21 10:51:50', '2024-02-21 11:00:23', '', NULL),
(7, '2024-02-17', '---', '3450', NULL, '---', '---', '2024-02-21 10:52:42', '2024-02-21 10:52:42', '', NULL),
(8, '2024-02-18', '690.9', '2500', '40', '---', '---', '2024-02-21 10:53:10', '2024-02-21 10:53:10', '', NULL),
(9, '2024-02-19', '---', '650', NULL, '---', '---', '2024-02-21 10:53:41', '2024-02-22 11:59:43', '1875', 'Купил подушку на сиденье');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `processes`
--
ALTER TABLE `processes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `processes`
--
ALTER TABLE `processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
