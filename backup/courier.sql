-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 24 2024 г., 20:48
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
(19, '2024-03-03', '3425.42', '1900', '40', NULL, NULL, '2024-03-03 15:13:44', '2024-03-03 15:14:25', NULL, NULL, 'Вс', '1100', '352'),
(20, '2024-03-04', '839.84', NULL, '40', NULL, '399.67', '2024-03-04 07:20:01', '2024-03-04 17:33:54', NULL, NULL, 'Пн', NULL, '300'),
(21, '2024-03-05', '4262.31', '900', '40', NULL, '500', '2024-03-05 16:38:56', '2024-03-05 16:40:13', NULL, NULL, 'Вт', '1100', NULL),
(22, '2024-03-06', NULL, '4050', NULL, NULL, NULL, '2024-03-06 09:07:29', '2024-03-06 09:07:29', NULL, NULL, 'Ср', NULL, NULL),
(23, '2024-03-07', '1665.74', '1350', '40', NULL, '279.43', '2024-03-07 09:02:48', '2024-03-07 15:14:09', NULL, NULL, 'Чт', NULL, NULL),
(24, '2024-03-08', NULL, '4300', NULL, NULL, NULL, '2024-03-08 13:45:26', '2024-03-08 13:45:26', NULL, NULL, 'Пт', NULL, NULL),
(25, '2024-03-09', '2162.65', '1600', '40', NULL, '167.10', '2024-03-09 14:30:00', '2024-03-09 14:30:00', NULL, NULL, 'Сб', NULL, NULL),
(26, '2024-03-10', '4658.25', NULL, '40', NULL, '280.56', '2024-03-10 16:10:09', '2024-03-10 16:10:09', NULL, NULL, 'Вс', '1100', NULL),
(27, '2024-03-12', '1295.8', '3150', '40', NULL, '143.95', '2024-03-12 14:40:17', '2024-03-12 14:44:53', NULL, NULL, 'Вт', NULL, NULL),
(28, '2024-03-11', '914.85', NULL, '40', NULL, '508.05', '2024-03-12 14:42:10', '2024-03-12 14:42:10', NULL, NULL, 'Пн', NULL, NULL),
(29, '2024-03-13', '3535.02', '4750', '40', NULL, '282.25', '2024-03-13 15:44:19', '2024-03-13 15:44:19', NULL, NULL, 'Ср', '1100', '100'),
(30, '2024-03-15', '1965.67', '1600', '40', NULL, '489.99', '2024-03-15 15:38:06', '2024-03-15 15:40:54', NULL, NULL, 'Пт', NULL, NULL),
(31, '2024-03-14', NULL, '1200', NULL, NULL, NULL, '2024-03-15 15:39:20', '2024-03-15 15:39:20', NULL, NULL, 'Чт', NULL, NULL),
(32, '2024-03-16', '1213.79', '3850', '40', NULL, '282.25', '2024-03-16 12:26:02', '2024-03-16 12:26:02', NULL, NULL, 'Пн', NULL, NULL),
(33, '2024-03-17', NULL, '550', NULL, NULL, NULL, '2024-03-17 12:29:51', '2024-03-17 12:29:51', NULL, NULL, 'Вс', NULL, NULL),
(34, '2024-03-18', NULL, '1400', NULL, NULL, NULL, '2024-03-18 14:58:23', '2024-03-18 14:58:23', NULL, NULL, 'Пн', NULL, NULL),
(35, '2024-03-19', '3002.52', '1150', '40', NULL, '225.80', '2024-03-19 18:05:36', '2024-03-19 18:06:57', NULL, NULL, 'Вт', NULL, NULL),
(36, '2024-03-20', '2553.58', NULL, '40', NULL, '505.23', '2024-03-20 16:07:28', '2024-03-20 16:07:28', NULL, NULL, 'Ср', NULL, NULL),
(37, '2024-03-21', '3535', NULL, '40', NULL, '282.25', '2024-03-21 19:06:27', '2024-03-21 19:06:27', NULL, NULL, 'Чт', NULL, '100'),
(38, '2024-03-22', '1474.78', '1050', '40', NULL, '508.05', '2024-03-22 14:52:29', '2024-03-22 14:52:29', NULL, NULL, 'Пт', NULL, NULL),
(39, '2024-03-23', NULL, '4450', NULL, NULL, NULL, '2024-03-23 10:23:53', '2024-03-23 10:23:53', NULL, NULL, 'Сб', NULL, NULL),
(40, '2024-03-24', '194.96', '3500', '40', NULL, '263.06', '2024-03-24 13:21:35', '2024-03-24 13:21:35', NULL, NULL, 'Пн', NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
