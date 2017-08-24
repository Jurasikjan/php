-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 24 2017 г., 18:31
-- Версия сервера: 5.5.53
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `real`
--

-- --------------------------------------------------------

--
-- Структура таблицы `deatelnost`
--

CREATE TABLE `deatelnost` (
  `id` int(11) NOT NULL,
  `human` int(11) NOT NULL,
  `prihod` int(11) NOT NULL,
  `rashod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `emkost`
--

CREATE TABLE `emkost` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deatelnost` int(11) NOT NULL,
  `ostatok` int(11) NOT NULL,
  `pl` double NOT NULL,
  `kg` int(11) NOT NULL,
  `sred_chena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `emkost`
--

INSERT INTO `emkost` (`id`, `name`, `vid`, `deatelnost`, `ostatok`, `pl`, `kg`, `sred_chena`) VALUES
(4, '20', 'dt', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `human`
--

CREATE TABLE `human` (
  `id` int(11) NOT NULL,
  `imy` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `prihod`
--

CREATE TABLE `prihod` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kol` int(11) NOT NULL,
  `pl` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `rashod`
--

CREATE TABLE `rashod` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kol` int(11) NOT NULL,
  `pl` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `deatelnost`
--
ALTER TABLE `deatelnost`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `human` (`human`),
  ADD KEY `prihod` (`prihod`),
  ADD KEY `rashod` (`rashod`);

--
-- Индексы таблицы `emkost`
--
ALTER TABLE `emkost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deatelnost` (`deatelnost`);

--
-- Индексы таблицы `human`
--
ALTER TABLE `human`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `prihod`
--
ALTER TABLE `prihod`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rashod`
--
ALTER TABLE `rashod`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `deatelnost`
--
ALTER TABLE `deatelnost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `emkost`
--
ALTER TABLE `emkost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `human`
--
ALTER TABLE `human`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `prihod`
--
ALTER TABLE `prihod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `rashod`
--
ALTER TABLE `rashod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
