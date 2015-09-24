-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 24 2015 г., 10:39
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tree`
--

-- --------------------------------------------------------

--
-- Структура таблицы `objects`
--

CREATE TABLE IF NOT EXISTS `objects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `descr` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `objects`
--

INSERT INTO `objects` (`id`, `name`, `descr`, `parent_id`) VALUES
(1, 'Lorem', 'Нивелирование индивидуальности, согласно традиционным представлениям, иллюстрирует миракль. Выявляя устойчивые архетипы на примере художественного творчества, можно сказать, что художественное восприятие параллельно.', 0),
(2, 'Ipsum', 'Нивелирование индивидуальности, согласно традиционным представлениям, иллюстрирует миракль. Выявляя устойчивые архетипы на примере художественного творчества, можно сказать, что художественное восприятие параллельно.', 1),
(3, 'Dolor', 'Художественный ритуал многопланово использует символизм. Художественная эпоха, следовательно, аккумулирует модернизм. Художественный талант традиционен. Шиллер утверждал: художественная эпоха возможна.', 0),
(4, 'Amet', 'Эти слова совершенно справедливы, однако диахронический подход представляет собой суггестивный фабульный каркас.', 3),
(5, 'Траляля', 'Вот так вотт отывлоатвы', 2),
(6, 'Маркетинг', 'Направленный маркетинг естественно восстанавливает рекламоноситель. Рекламный макет, на первый взгляд, раскручивает институциональный PR.', 2),
(7, 'Геология', 'Лава, основываясь большей частью на сейсмических данных, анизотропно пододвигается под рисчоррит.', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
