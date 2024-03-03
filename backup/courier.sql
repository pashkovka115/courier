-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 03 2024 г., 22:13
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
  `comments` text COLLATE utf8mb4_unicode_ci,
  `day_week` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tea` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `processes`
--

INSERT INTO `processes` (`id`, `date`, `earned`, `salary`, `park_commission`, `gasoline_from_account`, `gasoline_for_cash`, `created_at`, `updated_at`, `spare_parts`, `comments`, `day_week`, `bonus`, `tea`) VALUES
(1, '2024-02-11', '2863.52', '---', '40', '---', '---', '2024-02-21 10:45:14', '2024-02-24 02:33:56', NULL, NULL, 'Вс', NULL, NULL),
(2, '2024-02-12', '3090.51', '1100', '40', '508.05', '---', '2024-02-21 10:49:57', '2024-02-24 02:33:47', NULL, NULL, 'Пн', NULL, NULL),
(3, '2024-02-13', '2560.6', '1950', '40', '---', '394.52', '2024-02-21 10:50:33', '2024-02-24 02:33:33', NULL, NULL, 'Вт', NULL, NULL),
(4, '2024-02-14', '---', '3000', NULL, '---', '---', '2024-02-21 10:50:54', '2024-02-24 02:33:22', NULL, NULL, 'Ср', NULL, NULL),
(5, '2024-02-15', '3494.44', '1600', '40', '---', '344.32', '2024-02-21 10:51:28', '2024-02-24 02:33:09', NULL, NULL, 'Чт', NULL, NULL),
(6, '2024-02-16', '2506.62', '---', '40', '---', '339.6', '2024-02-21 10:51:50', '2024-02-24 02:32:54', NULL, NULL, 'Пт', NULL, NULL),
(7, '2024-02-17', '---', '3450', NULL, '---', '---', '2024-02-21 10:52:42', '2024-02-24 02:32:45', NULL, NULL, 'Сб', NULL, NULL),
(8, '2024-02-18', '690.9', '2500', '40', '---', '---', '2024-02-21 10:53:10', '2024-02-24 02:32:35', NULL, NULL, 'Вс', NULL, NULL),
(9, '2024-02-19', NULL, '650', NULL, NULL, NULL, '2024-02-21 10:53:41', '2024-02-29 08:01:54', '3428', 'Купил подушку на сиденье и дождевик', 'Пн', NULL, NULL),
(10, '2024-02-24', '3664.36', NULL, '40', NULL, NULL, '2024-02-24 15:58:59', '2024-02-25 12:04:04', NULL, NULL, 'Сб', '1100', '370'),
(11, '2024-02-25', NULL, '700', NULL, NULL, '282.81', '2024-02-25 10:20:54', '2024-02-25 14:29:19', NULL, NULL, 'Вс', NULL, NULL),
(12, '2024-02-26', '2127.65', NULL, '40', NULL, NULL, '2024-02-26 13:31:01', '2024-02-26 13:31:01', NULL, NULL, 'Пн', NULL, NULL),
(13, '2024-02-27', '3006.51', NULL, '40', NULL, '314.43', '2024-02-27 15:48:51', '2024-02-28 04:09:35', NULL, NULL, 'Вт', NULL, '50'),
(14, '2024-02-28', '1295.8', '3900', '40', NULL, '381.04', '2024-02-28 04:12:33', '2024-02-29 01:08:01', NULL, NULL, 'Ср', NULL, NULL),
(15, '2024-02-29', '2860.54', '1250', '40', NULL, NULL, '2024-02-29 07:40:42', '2024-02-29 14:35:47', NULL, NULL, 'Чт', NULL, NULL),
(16, '2024-02-20', NULL, NULL, NULL, NULL, NULL, '2024-02-29 08:00:06', '2024-02-29 08:00:33', '438', 'Купил перчатки', 'Вт', NULL, NULL),
(17, '2024-03-01', NULL, '4600', NULL, NULL, '547.57', '2024-03-01 13:08:36', '2024-03-01 13:08:36', NULL, NULL, 'Пт', NULL, NULL),
(18, '2024-03-02', NULL, '1450', NULL, NULL, NULL, '2024-03-03 02:19:11', '2024-03-03 02:19:11', NULL, NULL, 'Сб', NULL, NULL),
(19, '2024-03-03', '3425.42', '1900', '40', NULL, NULL, '2024-03-03 15:13:44', '2024-03-03 15:14:25', NULL, NULL, 'Вс', '1100', '352');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
