-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 24 2017 г., 18:14
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
-- Структура таблицы `azsrashod`
--

CREATE TABLE `azsrashod` (
  `id` int(11) NOT NULL,
  `human_id` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `vid` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `kol` int(11) NOT NULL,
  `price` double NOT NULL,
  `summ` double NOT NULL,
  `Ddate` date NOT NULL,
  `izmeneniy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `azsrashod`
--

INSERT INTO `azsrashod` (`id`, `human_id`, `vid`, `kol`, `price`, `summ`, `Ddate`, `izmeneniy`) VALUES
(12, '3', 'dt', 10, 10, 100, '2017-11-17', 0),
(13, '3', 'a95', 20, 20, 400, '2017-11-17', 0),
(14, '3', 'dt', 30, 30, 900, '2017-11-17', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `azsrashod_b`
--

CREATE TABLE `azsrashod_b` (
  `id` int(11) NOT NULL,
  `human_id` int(11) NOT NULL,
  `vid` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `kol` int(11) NOT NULL,
  `Ddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `azsrashod_b`
--

INSERT INTO `azsrashod_b` (`id`, `human_id`, `vid`, `kol`, `Ddate`) VALUES
(4, 2, 'dt', 20, '2017-11-20'),
(5, 1, 'a95', 40, '2017-11-20'),
(6, 1, 'dt', 40, '2017-11-24');

-- --------------------------------------------------------

--
-- Структура таблицы `emkost`
--

CREATE TABLE `emkost` (
  `id` int(11) NOT NULL,
  `namess` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `emkost` (`id`, `namess`, `vid`, `deatelnost`, `ostatok`, `pl`, `kg`, `sred_chena`) VALUES
(4, '20', 'dt', 0, 0, 0, 0, 0),
(5, '21', 'dt', 0, 0, 0, 0, 0),
(6, '22', 'dt', 0, 0, 0, 0, 0),
(8, '23', 'dt', 0, 0, 0, 0, 0),
(9, 'azs_dt', 'dt', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `human`
--

CREATE TABLE `human` (
  `id` int(11) NOT NULL,
  `imy` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `firma` int(11) NOT NULL,
  `B_nal` int(11) NOT NULL,
  `sliv` int(11) NOT NULL,
  `ostatok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `human`
--

INSERT INTO `human` (`id`, `imy`, `firma`, `B_nal`, `sliv`, `ostatok`) VALUES
(1, 'СашаСлив', 0, 0, 1, 0),
(2, 'Мир-Масел', 0, 1, 0, 0),
(3, 'Кипаренко', 1, 0, 0, 0),
(4, 'миша', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `polzovatel`
--

CREATE TABLE `polzovatel` (
  `id` int(11) NOT NULL,
  `imy` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `parol` int(11) NOT NULL,
  `yroven` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `polzovatel`
--

INSERT INTO `polzovatel` (`id`, `imy`, `parol`, `yroven`) VALUES
(1, 'Yura', 555554444, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `prihod`
--

CREATE TABLE `prihod` (
  `id` int(11) NOT NULL,
  `id_emkost` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_vid` int(11) NOT NULL,
  `kol` int(11) NOT NULL,
  `pl` double NOT NULL,
  `id_human` int(11) NOT NULL,
  `vid_prihod` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `rashod`
--

CREATE TABLE `rashod` (
  `id` int(11) NOT NULL,
  `id_emkost` int(11) NOT NULL,
  `data` date NOT NULL,
  `id_vid` int(11) NOT NULL,
  `kol` int(11) NOT NULL,
  `pl` double NOT NULL,
  `id_human` int(11) NOT NULL,
  `vid_rashod` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `vid`
--

CREATE TABLE `vid` (
  `id` int(11) NOT NULL,
  `toplivo` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vid`
--

INSERT INTO `vid` (`id`, `toplivo`) VALUES
(1, 'dt'),
(2, 'a80'),
(3, 'a95'),
(4, 'a92');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `azsrashod`
--
ALTER TABLE `azsrashod`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `azsrashod_b`
--
ALTER TABLE `azsrashod_b`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `emkost`
--
ALTER TABLE `emkost`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `human`
--
ALTER TABLE `human`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `polzovatel`
--
ALTER TABLE `polzovatel`
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
-- Индексы таблицы `vid`
--
ALTER TABLE `vid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `azsrashod`
--
ALTER TABLE `azsrashod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `azsrashod_b`
--
ALTER TABLE `azsrashod_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `emkost`
--
ALTER TABLE `emkost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `human`
--
ALTER TABLE `human`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `polzovatel`
--
ALTER TABLE `polzovatel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
--
-- AUTO_INCREMENT для таблицы `vid`
--
ALTER TABLE `vid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
