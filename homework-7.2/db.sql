-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 16 2017 г., 21:40
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Категория 1'),
(2, 'Категория 2'),
(3, 'Категория 3'),
(4, 'Категория 4'),
(5, 'Категория 5');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `text`, `picture`) VALUES
(68, 84, 'ddddd ea qui saepe omnis necessitatibus. Ut amet ', 'fddddddd qui officiis quis. Voluptatem harum qui qui ratione sed fuga recusandae ut. Veritatis voluptas quia quibusdam aut vero earum quod officiis. Harum et quis ut voluptas.', '68.jpg'),
(69, 84, 'Sint eveniet cupiditate voluptatem aut nisi aut. D', 'Beatae est aut et eos sunt. Id sit debitis necessitatibus iusto nesciunt maiores. Quis voluptas quod et repellendus nostrum iste.', '69.jpg'),
(70, 84, 'Dolore sed nisi hic et possimus. Consequatur volup', 'Necessitatibus quis earum non vel necessitatibus consequatur esse. Cupiditate eos voluptatum adipisci id temporibus deleniti ut quis.', '70.jpg'),
(91, 81, 'title', 'text', ''),
(96, 81, 'заголовок', 'статья', '96.jpg'),
(126, 95, '333', '333', '126.jpg'),
(127, 96, '234', '234', '127.jpg'),
(128, 99, 'hgfhdf', 'dfhdgfh', '128.jpg'),
(129, 99, 'fgsdg', 'sdgdfg', '129.jpg'),
(130, 106, 'hghdgh', 'dghdgfhgbnbncncbvcnmhjkhcb bnchmhgmdghmcbnm nbcvgjdyjnbvnc', '130.jpg'),
(131, 107, 'hdjdghjdghjd', 'mchgmdghmdggnmcvbhm ghjdghjhgj etyjetyjdytjdtgyjtyj', '131.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `description`) VALUES
(1, 'qui', 4, 128.14, 'Molestias optio officiis numquam ut minus exercitationem.'),
(2, 'ratione', 2, 97.59, 'Iure qui ut aut optio eos aspernatur perferendis.'),
(3, 'odit', 3, 275.00, 'Ut provident dolorem dolor sapiente.'),
(4, 'veritatis', 2, 20.63, 'Doloribus omnis pariatur adipisci id.'),
(5, 'quia', 1, 162.07, 'Ipsam sit aut dolor eos quia voluptatum.'),
(6, 'et', 4, 255.49, 'Dolore nobis fugiat aut ut quia minus.'),
(7, 'tempore', 3, 112.68, 'Quia voluptas ad tempora molestias.'),
(8, 'molestiae', 3, 124.47, 'Non molestiae dolor eos dolores maiores iusto repellendus.'),
(9, 'non', 5, 275.47, 'Ad id asperiores animi et.'),
(10, 'corrupti', 5, 277.88, 'Magnam voluptas aut error nulla perferendis qui est.'),
(11, 'est', 4, 185.50, 'Reprehenderit rem sit quis accusantium eos nihil.'),
(12, 'ipsa', 2, 146.52, 'Quae qui consectetur sint optio unde omnis facilis.'),
(13, 'illum', 4, 179.41, 'Rerum autem perferendis debitis provident ut.'),
(14, 'velit', 3, 77.90, 'Consequatur pariatur ab beatae odio et.'),
(15, 'earum', 5, 76.66, 'Perspiciatis et consequatur deleniti aspernatur esse.'),
(16, 'illum', 1, 87.40, 'Quia in ratione impedit unde.'),
(17, 'velit', 2, 223.06, 'Hic et autem sapiente ut molestiae fugit quisquam laudantium.'),
(18, 'voluptatum', 1, 146.23, 'Dolor ea incidunt non nobis natus quia.'),
(19, 'est', 1, 183.39, 'Velit dicta dignissimos velit odio ea atque recusandae.'),
(20, 'non', 2, 195.20, 'Corporis aut sit laudantium officiis est aperiam.'),
(21, 'velit', 1, 109.49, 'Placeat iure tempore vitae quasi iste quod.'),
(22, 'repellendus', 5, 152.49, 'Temporibus magni sit cum voluptates accusamus corporis iure eum.'),
(23, 'blanditiis', 1, 94.00, 'Facilis omnis perferendis quam velit.'),
(24, 'quia', 4, 23.60, 'Qui est dolorem sint et nam nobis voluptatem.'),
(25, 'architecto', 2, 257.00, 'Earum ullam voluptatem eum.'),
(26, 'vel', 4, 289.05, 'Eaque nemo officiis quo odio voluptatem.'),
(27, 'delectus', 2, 258.15, 'Suscipit quo sint ipsam eveniet.'),
(28, 'exercitationem', 1, 242.20, 'Id placeat voluptate exercitationem ipsam dolor.'),
(29, 'sed', 5, 261.93, 'Atque nihil qui harum qui quia nemo corporis eum.'),
(30, 'aut', 3, 284.00, 'Incidunt at quia dolor accusantium repellendus.'),
(31, 'numquam', 2, 248.00, 'Tempore eveniet ipsa non blanditiis pariatur sint placeat unde.'),
(32, 'qui', 4, 272.53, 'Corporis et rerum rerum corrupti sint at.'),
(33, 'quia', 3, 274.60, 'Placeat porro id tempore culpa aut possimus sed.'),
(34, 'harum', 3, 193.14, 'Eos rerum nam possimus omnis.'),
(35, 'est', 2, 167.87, 'Ut eaque dolor esse minima cupiditate esse.'),
(36, 'ipsam', 2, 24.06, 'Harum ratione odio est consequatur.'),
(37, 'sed', 4, 115.68, 'Enim quia dolores nobis voluptatibus.'),
(38, 'aut', 3, 289.89, 'Repudiandae perspiciatis animi delectus iusto suscipit eius.'),
(39, 'ex', 4, 115.67, 'Ratione omnis accusamus sint laboriosam accusamus.'),
(40, 'aliquid', 3, 39.35, 'Nostrum qui voluptatem mollitia cum non.'),
(41, 'voluptatem', 5, 189.10, 'In voluptatibus quia architecto sed totam.'),
(42, 'veritatis', 2, 272.60, 'Sit ullam non dolor consequatur non dolor.'),
(43, 'omnis', 2, 55.38, 'Consequuntur aliquam culpa repellat vel ducimus suscipit voluptas in.'),
(44, 'dolores', 3, 168.00, 'Id ipsa est repellat nam dolorum at.'),
(45, 'ab', 3, 85.25, 'Molestiae doloremque sequi ullam nostrum.'),
(46, 'labore', 3, 82.53, 'Laudantium explicabo minus non repellendus alias nesciunt illum.'),
(47, 'voluptatem', 3, 155.00, 'Explicabo ratione provident optio et.'),
(48, 'animi', 5, 180.69, 'Repellendus animi magni ut.'),
(49, 'maiores', 3, 94.20, 'Dicta dolore minus numquam qui.'),
(50, 'voluptas', 5, 212.99, 'Minus sed veritatis soluta harum molestiae quasi.'),
(51, 'consequatur', 3, 231.74, 'Exercitationem nulla doloremque et et soluta quae consequatur dolorum.'),
(52, 'delectus', 1, 28.00, 'Libero nobis nihil libero et.'),
(53, 'voluptas', 1, 113.46, 'Repellendus inventore suscipit dicta labore.'),
(54, 'nisi', 4, 285.59, 'Odit veritatis quis natus impedit.'),
(55, 'non', 1, 293.13, 'Officia adipisci aut repellendus enim repellat.'),
(56, 'assumenda', 1, 197.17, 'Consequatur est sit autem mollitia.'),
(57, 'ab', 4, 126.40, 'Voluptatum sunt consequatur ab enim maxime vitae qui.'),
(58, 'dolorem', 5, 92.88, 'Voluptas autem dolorem ratione.'),
(59, 'quia', 3, 33.68, 'Consequatur hic non autem vero sed necessitatibus corrupti.'),
(60, 'ea', 5, 49.00, 'Vel dolorum rerum necessitatibus reprehenderit.'),
(61, 'et', 4, 186.53, 'Minus molestiae fugit explicabo ut.'),
(62, 'esse', 4, 213.48, 'Id sint dolor quia est.'),
(63, 'eos', 3, 243.16, 'Ad numquam fuga voluptatem natus mollitia voluptatum ipsa.'),
(64, 'maiores', 3, 204.63, 'Ipsam mollitia ut aut exercitationem placeat.'),
(65, 'expedita', 4, 146.46, 'Ducimus dignissimos non molestiae quasi quis.'),
(66, 'illo', 2, 215.10, 'Laudantium quo veniam ut in magni.'),
(67, 'ex', 2, 149.92, 'Sit eveniet eaque sed ut non.'),
(68, 'quo', 4, 156.60, 'Nulla odio harum laborum enim esse.'),
(69, 'ipsam', 2, 115.97, 'Ipsa voluptatem eveniet distinctio necessitatibus est.'),
(70, 'suscipit', 1, 77.00, 'Assumenda repellendus omnis aut error dignissimos omnis et.');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `age`, `description`, `foto`, `ip`) VALUES
(81, 'Ann123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Maria', '15', 'Министр спорта против выступления россиян под нейтральным флагом', '81.jpg', ''),
(84, 'Pavel456', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 'Pavel', '51', 'В Петербурге подешевела аренда квартир', '84.jpg', ''),
(85, 'Rose654', 'db00e4fdc8a6d8fc749a23649c9ec9343051ec47', 'Донна Роза', '14', 'Радиостанция Эхо Москвы выполнила требования Росстехнадзора', '85.jpg', ''),
(106, '123456', '1b6453892473a467d07372d45eb05abc2031647a', 'Noname', '', 'dfghdgfhdgfhdgfhnbnghdfhgfjjhg gdfhdfghdgfhdf dgfhdfhdfghdfghdfgh ', '106.jpg', '127.0.0.1'),
(107, 'Troy123', '58e6b3a414a1e090dfc6029add0f3555ccba127f', 'Noname', '', 'mhgdghd,fhj,fuhkfdghmdghmdtyjdtykdghmchjdgyjkdghmcghj', '107.jpg', '127.0.0.1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=196;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
