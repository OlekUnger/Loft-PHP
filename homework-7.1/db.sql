-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 17 2017 г., 11:22
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` varchar(300) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `text`, `picture`) VALUES
(68, 84, 'ddddd ea qui saepe omnis necessitatibus. Ut amet ', 'fddddddd qui officiis quis. Voluptatem harum qui qui ratione sed fuga recusandae ut. Veritatis voluptas quia quibusdam aut vero earum quod officiis. Harum et quis ut voluptas.', '68.jpg'),
(69, 84, 'Sint eveniet cupiditate voluptatem aut nisi aut. D', 'Beatae est aut et eos sunt. Id sit debitis necessitatibus iusto nesciunt maiores. Quis voluptas quod et repellendus nostrum iste.', '69.jpg'),
(70, 84, 'Dolore sed nisi hic et possimus. Consequatur volup', 'Necessitatibus quis earum non vel necessitatibus consequatur esse. Cupiditate eos voluptatum adipisci id temporibus deleniti ut quis.', '70.jpg'),
(91, 81, 'title', 'text', ''),
(96, 81, 'заголовок', 'статья', '96.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` varchar(3) NOT NULL,
  `description` text NOT NULL,
  `foto` varchar(11) NOT NULL,
  `ip` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `age`, `description`, `foto`, `ip`) VALUES
(81, 'Ann123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Maria', '15', 'Министр спорта против выступления россиян под нейтральным флагом', '81.jpg', ''),
(84, 'Pavel456', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 'Pavel', '51', 'В Петербурге подешевела аренда квартир', '84.jpg', ''),
(85, 'Rose654', 'db00e4fdc8a6d8fc749a23649c9ec9343051ec47', 'Донна Роза', '14', 'Радиостанция Эхо Москвы выполнила требования Росстехнадзора', '85.jpg', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;

