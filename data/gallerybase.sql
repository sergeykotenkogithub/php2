-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 22 2021 г., 05:31
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallerybase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `goods_id` int NOT NULL,
  `session_id` text NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` int NOT NULL,
  `price_origin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `goods_id`, `session_id`, `quantity`, `price`, `price_origin`) VALUES
(69, 1, 'd7gu0h0qcqro5852kmr432lm9bvifusg', 31, 19220, 620),
(70, 2, 'd7gu0h0qcqro5852kmr432lm9bvifusg', 21, 9492, 452),
(71, 3, 'd7gu0h0qcqro5852kmr432lm9bvifusg', 23, 5346, 198),
(72, 2, '645lldj1if1h5e4kms2gf6ihfdpof0gd', 20, 9040, 452),
(73, 3, '645lldj1if1h5e4kms2gf6ihfdpof0gd', 22, 4554, 198),
(74, 1, '645lldj1if1h5e4kms2gf6ihfdpof0gd', 29, 17980, 620),
(76, 3, '560aor0dl17a40a17agal3cif9ift7g1', 20, 3960, 198),
(82, 2, 'v4omlg2qtusf1lc7firj5gtfdsp7drae', 16, 7232, 452),
(112, 2, 'flm330dh7quvlfd5u2lis26ed0moe825', 12, 5424, 452),
(113, 2, 'kjr15394eqatelomuifqtr94gcoa6ctt', 11, 4972, 452),
(115, 2, 'vcog4mdvr3dt64vp21l307sp4s11t7e0', 12, 5424, 452),
(116, 3, 'cikglccihm4io7gdfd55kihb8tqatblv', 17, 3366, 198),
(117, 2, 'f2enqqgtm341dgdoolhvjfa0hbfs54ug', 11, 4972, 452),
(118, 3, 'f2enqqgtm341dgdoolhvjfa0hbfs54ug', 18, 3564, 198),
(120, 2, 's28n455cqlj61d8cf83bglflgi61hbq8', 11, 4972, 452),
(121, 2, '97t8gkb6m76cd3qbr5rosnru87qje1qp', 11, 4972, 452),
(122, 3, '97t8gkb6m76cd3qbr5rosnru87qje1qp', 17, 3366, 198),
(123, 1, '9sd9gb7uqhdjs6haaeji4q7rq52mpts1', 16, 9920, 620),
(124, 3, '9sd9gb7uqhdjs6haaeji4q7rq52mpts1', 17, 3366, 198),
(125, 2, 'mlebj4fho1cqtb6s03eoip6ofcklgt6j', 11, 4972, 452),
(126, 2, '3uvls7q32mskotocq1vm7sv52aohv0pu', 11, 4972, 452),
(127, 2, '4koa55c6ui0ju6nnnqlnqphpskl382u0', 11, 4972, 452),
(128, 3, 'g6mon3r3grp04en94lcf0g49sjte7an7', 17, 3366, 198),
(129, 2, 'drali1hv2mfvlt6c798396edr0qp0u5j', 11, 4972, 452),
(130, 2, 'bp76d1h5ue9u5grjei8o2tgq3pm594sf', 11, 4972, 452),
(131, 3, 'bp76d1h5ue9u5grjei8o2tgq3pm594sf', 17, 3366, 198),
(132, 1, 'bp76d1h5ue9u5grjei8o2tgq3pm594sf', 16, 9920, 620),
(141, 2, 'o2lstakershu9qpmvef56ue2rdnns54h', 9, 4068, 452),
(142, 3, 'hmn45vlnr1ge556fva6bbma40lhuar8f', 14, 2772, 198),
(143, 2, 'hmn45vlnr1ge556fva6bbma40lhuar8f', 9, 4068, 452),
(144, 1, 'hmn45vlnr1ge556fva6bbma40lhuar8f', 12, 7440, 620),
(145, 2, 'ale3mggvr2kvl6c1oftoi8lp0shpc31i', 10, 4520, 452),
(146, 3, 'ale3mggvr2kvl6c1oftoi8lp0shpc31i', 14, 2772, 198),
(147, 3, 'd13n6nhpm4rt1nsuajcr63rkvkn6i8e2', 13, 2574, 198),
(148, 2, 'i5juhlsknona6uc608db4u4eh1ck7h0a', 9, 4068, 452),
(149, 3, 'pauabuvfr7814tsoiu9ldqjjtgrnto0s', 14, 2772, 198),
(150, 2, 'pauabuvfr7814tsoiu9ldqjjtgrnto0s', 9, 4068, 452),
(151, 2, 'ijlliji2bb7ovhrha2opatj8flli6f19', 9, 4068, 452),
(152, 1, 'tlcpaag683l7i6eejbvhgjv3gmf04dvg', 12, 7440, 620),
(153, 2, 'vpf0i05j4n9jqrbmijom554p11ok66ng', 9, 4068, 452),
(154, 3, 'vpf0i05j4n9jqrbmijom554p11ok66ng', 13, 2574, 198),
(155, 1, 'vpf0i05j4n9jqrbmijom554p11ok66ng', 12, 7440, 620),
(156, 2, 'd1um3elct4grdvqtmmffo3v8vqnaasqq', 9, 4068, 452),
(157, 3, '46pdrnfd3n7dcldnops87qu4ha3v5vmv', 13, 2574, 198),
(158, 2, 'u694daofbtj00dtotj5s7ti545f25dd2', 9, 4068, 452),
(159, 3, 'u694daofbtj00dtotj5s7ti545f25dd2', 14, 2772, 198),
(160, 1, 'u694daofbtj00dtotj5s7ti545f25dd2', 12, 7440, 620),
(161, 1, 'ndt6m9v8il072sr2i1jjvgtcuj82gimr', 13, 8060, 620),
(162, 2, 'ndt6m9v8il072sr2i1jjvgtcuj82gimr', 9, 4068, 452),
(163, 3, 'ndt6m9v8il072sr2i1jjvgtcuj82gimr', 15, 2970, 198),
(164, 1, 'pilikpvgeaj43nudlvu2n5ej9ioseobk', 13, 8060, 620),
(165, 2, 'pilikpvgeaj43nudlvu2n5ej9ioseobk', 10, 4520, 452),
(166, 3, 'pilikpvgeaj43nudlvu2n5ej9ioseobk', 13, 2574, 198),
(167, 1, 'rcg41p22e45en9hpba5blobcbklaavu3', 15, 9300, 620),
(168, 2, 'rcg41p22e45en9hpba5blobcbklaavu3', 8, 3616, 452),
(169, 3, 'rcg41p22e45en9hpba5blobcbklaavu3', 12, 2376, 198),
(170, 2, 'ms1e75hqoqgc82ervt1tfru0r35qpi1k', 6, 2712, 452),
(171, 1, 'ms1e75hqoqgc82ervt1tfru0r35qpi1k', 11, 6820, 620),
(172, 3, 'ms1e75hqoqgc82ervt1tfru0r35qpi1k', 10, 1980, 198),
(173, 2, 'j8stsul5lkhdj3obg9nbk3rk3o78juee', 6, 2712, 452),
(174, 3, 'j8stsul5lkhdj3obg9nbk3rk3o78juee', 12, 2376, 198),
(175, 1, 'sa2ri1mi9ohhkhb3iic8je3h3vdqq5gs', 11, 6820, 620),
(176, 2, 'sa2ri1mi9ohhkhb3iic8je3h3vdqq5gs', 6, 2712, 452),
(177, 3, 'sa2ri1mi9ohhkhb3iic8je3h3vdqq5gs', 10, 1980, 198),
(185, 1, 'q75hcu1e7dus536o1adg9u7q7ttar733', 4, 2480, 620),
(189, 1, '6lq42juhom5ibo4s04cuamveoe7mlajv', 4, 2480, 620),
(190, 2, '6lq42juhom5ibo4s04cuamveoe7mlajv', 4, 1808, 452),
(194, 1, 'v92vsto21hftd7kst9dtbuj1fb7ob7am', 2, 1240, 620),
(195, 2, 'v92vsto21hftd7kst9dtbuj1fb7ob7am', 2, 904, 452),
(196, 1, '9grmeoljlmddql4pqu4k1muvm43i1em6', 1, 620, 620),
(197, 1, 'u4jprmmo5lvnijdn0ucobkgvnaokfns8', 2, 1240, 620),
(198, 2, 'u4jprmmo5lvnijdn0ucobkgvnaokfns8', 3, 1356, 452),
(199, 3, 'u4jprmmo5lvnijdn0ucobkgvnaokfns8', 2, 396, 198),
(201, 3, 'tcd1ddfc9dal0vlmr2gopv6934ndbu5v', 4, 792, 198),
(202, 1, 'tcd1ddfc9dal0vlmr2gopv6934ndbu5v', 4, 2480, 620),
(203, 2, 'pf08rjpmnqm3fnduq0ouoeormfq46dnl', 3, 1356, 452),
(204, 1, 'pf08rjpmnqm3fnduq0ouoeormfq46dnl', 2, 1240, 620),
(205, 3, 'pf08rjpmnqm3fnduq0ouoeormfq46dnl', 1, 198, 198),
(206, 1, '93tt73ltfkjgu85j6a4na216s2ukvgvt', 1, 620, 620),
(207, 3, 'fbujrf8rdh8cj47cjhfq8v5685ki22pk', 2, 396, 198),
(209, 3, 'e0to33sssn2hgvr7f4h6movutvk3vbup', 1, 198, 198),
(210, 1, 'e0to33sssn2hgvr7f4h6movutvk3vbup', 3, 1860, 620),
(211, 2, 'e0to33sssn2hgvr7f4h6movutvk3vbup', 1, 452, 452),
(217, 1, '', 4, 2480, 620),
(220, 2, 'abuqld9buqcjis1osjar4b4iehsgij1n', 2, 904, 452),
(221, 3, 'abuqld9buqcjis1osjar4b4iehsgij1n', 1, 198, 198),
(222, 1, 'abuqld9buqcjis1osjar4b4iehsgij1n', 4, 2480, 620),
(223, 1, 'en8e3jmn3ubf5doom5oedhd7u231e2ob', 2, 1240, 620),
(224, 2, 'en8e3jmn3ubf5doom5oedhd7u231e2ob', 1, 452, 452),
(225, 3, 'en8e3jmn3ubf5doom5oedhd7u231e2ob', 4, 792, 198),
(226, 2, 'oq647hoemhi8aa6uhb4g3htfiidqr4qh', 3, 1356, 452),
(227, 3, 'oq647hoemhi8aa6uhb4g3htfiidqr4qh', 6, 1188, 198),
(228, 1, 'oq647hoemhi8aa6uhb4g3htfiidqr4qh', 2, 1240, 620),
(229, 1, 'glqatpaavputqbvaui6c94gs694lkgbt', 3, 1860, 620),
(230, 2, 'glqatpaavputqbvaui6c94gs694lkgbt', 1, 452, 452),
(231, 3, 'glqatpaavputqbvaui6c94gs694lkgbt', 2, 396, 198),
(235, 1, '5ssq6lmv377adalhu4b3199nc9dhdsbv', 2, 1240, 620),
(236, 2, '5ssq6lmv377adalhu4b3199nc9dhdsbv', 4, 1808, 452),
(237, 1, 'ukp0dufjf7dbesam1pblvvihghe50mlm', 1, 620, 620),
(284, 2, '', 6, 2712, 452),
(285, 3, '', 3, 594, 198),
(303, 2, '55e8l49aj2ocqq4gf0thh8euagqcnrco', 1, 452, 452),
(304, 3, '55e8l49aj2ocqq4gf0thh8euagqcnrco', 2, 396, 198),
(305, 1, '55e8l49aj2ocqq4gf0thh8euagqcnrco', 2, 1240, 620);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `goods_id` int NOT NULL DEFAULT '0',
  `it_is` varchar(255) NOT NULL DEFAULT 'product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `goods_id`, `it_is`) VALUES
(1, 'Андрей', 'Яблоко очень вкусное.', 3, 'product'),
(2, 'Павел', 'Кофе очень насыщенный и ароматный.', 1, 'product'),
(3, 'Иван', 'Чай понравится любителям различных плодово-ягодных чайных композиций и тем, кто не относится скептически к каркаде в составе.', 2, 'product'),
(4, 'Андрей', 'Всё хорошо', 3, 'product'),
(5, 'Василий', 'Мне нравиться всё', 3, 'product'),
(21, 'asdas', 'asd\r\n                                ', 0, 'site'),
(22, 'aasd', 'asdsad                              ', 0, 'site'),
(23, 'asdas', 'asdasdasd                              ', 0, 'site'),
(24, 'asdas', 'asdasd                            ', 0, 'site'),
(25, 'asd', 'Нормально всё\r\n                                ', 0, 'site'),
(26, 'Артем', 'Супер!                    ', 2, 'product'),
(27, 'Петя', 'яыв ыфвфы                    ', 0, 'site'),
(30, 'sadsa', 'asddddd                             ', 0, 'site'),
(32, 'ывфы', 'ййййййййй\r\n                                ', 0, 'site'),
(33, 'Валера', 'Мне нравится, очень приятный вкус\r\n                                ', 1, 'product'),
(34, 'Алиса', 'Очень хорошо!\r\n                                ', 2, 'product'),
(35, 'ыыыы', 'ыфв                           ', 0, 'site'),
(36, 'ыфв', 'фывывв                          ', 0, 'site'),
(37, 'ааааааа', 'ффффф          ', 0, 'site'),
(38, 'asd', 'asdds                              ', 0, 'site'),
(39, 'Артём', 'Очень крутой сайт                     ', 0, 'site'),
(40, 'Инакентий', '           Всё супер\r\n  огонь!\r\n                                ', 0, 'site'),
(42, 'Нина', 'Всё хорошо                         ', 0, 'site'),
(43, 'Нина', 'Мне нравится', 2, 'product'),
(45, 'ewqe', 'asds                      ', 0, 'site'),
(46, 'asd11', 'asda12\r\n                                ', 0, 'site');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `views`) VALUES
(7, '07.jpg', 33),
(8, '08.jpg', 9),
(15, '09.jpg', 5),
(16, '10.jpg', 3),
(17, '11.jpg', 3),
(18, '12.jpg', 1),
(19, '13.jpg', 2),
(20, '14.jpg', 14),
(21, '15.jpg', 12),
(98, '16.jpg', 5),
(157, '17.jpg', 0),
(166, '18.jpg', 1),
(168, '19.jpg', 1),
(169, '20.jpeg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Кофе', 'Кофе в зернах - сбалансированный и ароматный кофе, средняя обжарка. Богатый вкус с приятным послевкусием для настоящих мужчин', 620, 'coffee.jpg'),
(2, 'Чай', 'Травяной чай в пакетиках Милфорд Иммунити с эхинацеей и имбирем 3 упаковки по 20 пакетиков по 1,75 гр (35 грамм). Чайный напиток Милфорд - 100% натуральный продукт с уникальной рецептурой, отличным вкусом и ароматом чая. Чай создан на основе шиповника, корня имбиря, эхинацеи и корня элеутерококка. Польза чайного напитка заключается в его составе: Шиповник - источник витамина С Эхинацея укрепляет иммунитет, оказывает тонизирующее влияние, подавляет симптомы стресса. Отличное средство для повышения защитных сил организма Корень имбиря - в составе, в котором содержится множество биологически активных компонентов (около 400 соединений), предопределяющих лечебные свойства имбиря. Химический состав имбирного корня богат на содержание витамин С - главного \"борца\" с различного рода ОРЗ и ОРВИ Состав чайного напитка: сорго лимонное, листья ежевики, шиповник, корень имбиря, трава эхинацеи, ройбуш, цедра апельсина, корица, корень элеутерококка, корень эхинацеи.', 452, 'tea.jpg'),
(3, 'Яблоко', 'Яблоки Роял Гала среднего размера имеют красноватую кожуру с характерными немногочисленными вертикальными полосками желтого или желто-зеленого цвета. Хрустящая сочная мякоть этих плодов отличается приятным десертным вкусом.', 198, 'apple.jpg'),
(42, 'Кофе', 'Хороший', 500, 'coffee.jpg'),
(43, 'Кофе', 'Хороший', 500, 'coffee.jpg'),
(44, 'Кофе', 'Хороший', 500, 'coffee.jpg'),
(45, 'Кофе', 'Хороший', 500, 'coffee.jpg'),
(46, 'Кофе', 'Хороший', 500, 'tea.jpg'),
(47, 'Кофе', 'Хороший', 500, 'tea.jpg'),
(48, 'Кофе', 'Хороший', 500, 'tea.jpg'),
(49, 'Кофе', 'Хороший', 500, 'tea.jpg'),
(50, 'Кофе', 'Хороший', 500, 'tea.jpg'),
(51, 'Кофе', 'Хороший', 500, 'tea.jpg'),
(52, 'Кофе', 'Хороший', 500, 'tea.jpg'),
(53, 'Кофе', 'Хороший', 500, 'tea.jpg'),
(54, 'Кофе', 'Хороший', 500, 'apple.jpg'),
(55, 'Кофе', 'Хороший', 500, 'apple.jpg'),
(56, 'Кофе', 'Хороший', 500, 'apple.jpg'),
(57, 'Кофе', 'Хороший', 500, 'apple.jpg'),
(58, 'Кофе', 'Хороший', 500, 'apple.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`) VALUES
(1, 'Google Project Starline: «голографический» видеочат с максимальным эффектом присутствия собеседника', 'Возможно, лучшее, что показали на прошедшей презентации.\r\nНакануне вечером прошло открытие конференции Google I/O 2021. На нём поисковый гигант показал много чего интересного: новейшие разработки в поиске и искусственном интеллекте, Android 12, новый «язык дизайна» Material You.\r\n<br>\r\nНо одним из самых интересных анонсов оказался Project Starline. Если говорить кратко, то это «голографический Zoom».\r\n<h3>Что такое Project Starline?</h3>\r\nЭто набор хардверных и программных технологий, с помощью которых пользователи могут общаться через голографическую видеосвязь.\r\nПредставьте, что смотрите сквозь своеобразное магическое окно. И через это окно вы видите другого человека: в натуральную величину и полноценном трёхмерном измерении. Вы можете максимально натуралистично общаться, жестикулировать, установить контакт.\r\n<h3>Как устроена технология?</h3>\r\nТочных данных Google не опубликовала. Известно лишь, что техногигант объединил свои наработки в компьютерном зрении, машинном обучении, пространственном звуке и компрессии в реальном времени.\r\nВместе с тем компани разработала «революционный» дисплей, создающий ощущение объёма и глубины без необходимости использовать дополнительные очки или шлемы.\r\n<h3>Как оформить заказ на Project Starline?</h3>\r\nПока что никак. Google установила наборы проекта в нескольких своих офисах. Но представители компании уже заявили, что видят будущее виртуального общения именно таким, каким его показывает Project Starline.\r\nИнтенсив «Data Science — это проще, чем кажется». День 1\r\n26 мая в 20:00, Онлайн, Беcплатно\r\ntproger.ru\r\nСобытия и курсы на tproger.ru\r\nТакже ИТ-гигант пообещал поделиться новыми подробностями о новинке до конца 2021 года.'),
(2, 'В GitHub появилась возможность загружать видео', 'Внезапно, это очень полезная функция.\r\nВ блоге GitHub появилась запись о необычном нововведении. Теперь хранилище проектов позволяет загружать в репозитории полноценные видеофайлы в формате .mp4 and .mov.\r\nТестирование новой функции началось ещё в декабре 2020 года. Сейчас же она стала доступна всем пользователям GitHub. Загружать видео можно в совершенно разных разделах сервиса: в pull request, комментариях и т.д.\r\nЗачем вообще это может быть нужно?\r\nНапример, чтобы показать разработчику баг. Теперь не придётся объяснять всё на словах либо загружать видео с ошибкой на YouTube — всё можно «провернуть» прямо внутри GitHub. Так девелоперам будет проще воспроизвести неверную работу программы.\r\nНа каких платформах новая функция доступна?\r\nПредставители сервиса заявили, что загружать видео можно как через веб-версию, так и приложения для iOS и Android. Причём мобильные устройства позволяют напрямую загружать видео, сделанные во время тестирования приложений с GitHub.'),
(71, '592sa', 'sqqqw');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `hash` text NOT NULL,
  `tel` bigint NOT NULL,
  `email` text NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `users_id` int DEFAULT NULL,
  `status` varchar(300) NOT NULL DEFAULT 'Ожидайте звонка от оператора',
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `hash`, `tel`, `email`, `date`, `users_id`, `status`, `total`) VALUES
(15, 'd7gu0h0qcqro5852kmr432lm9bvifusg', 896262, 'sdasas', '2021-06-03 23:39:42', NULL, 'Ожидайте звонка от оператора', 0),
(16, '645lldj1if1h5e4kms2gf6ihfdpof0gd', 78651651, 'asdsda', '2021-06-03 23:44:57', NULL, 'Ожидайте звонка от оператора', 0),
(17, 'vcog4mdvr3dt64vp21l307sp4s11t7e0', 965962, '12asd', '2021-06-04 20:32:36', NULL, 'Ожидайте звонка от оператора', 0),
(18, 'vcog4mdvr3dt64vp21l307sp4s11t7e0', 56953, 'sadas', '2021-06-04 20:33:17', NULL, 'Ожидайте звонка от оператора', 0),
(19, 'vcog4mdvr3dt64vp21l307sp4s11t7e0', 2313, 'sadsad', '2021-06-04 20:35:03', NULL, 'Ожидайте звонка от оператора', 0),
(20, 'cikglccihm4io7gdfd55kihb8tqatblv', 2312, 'assd', '2021-06-04 20:36:11', NULL, 'Ожидайте звонка от оператора', 0),
(21, 'f2enqqgtm341dgdoolhvjfa0hbfs54ug', 7865, 'asddsa', '2021-06-04 20:37:41', NULL, 'Ожидайте звонка от оператора', 0),
(22, 's28n455cqlj61d8cf83bglflgi61hbq8', 45613, 'sadas', '2021-06-04 20:39:54', 2, 'Ожидайте звонка от оператора', 0),
(23, 's28n455cqlj61d8cf83bglflgi61hbq8', 8963203, 'asd', '2021-06-04 20:44:03', 2, 'Ожидайте звонка от оператора', 0),
(24, 's28n455cqlj61d8cf83bglflgi61hbq8', 5626, 'sadas', '2021-06-04 20:44:37', 2, 'Ожидайте звонка от оператора', 0),
(25, '97t8gkb6m76cd3qbr5rosnru87qje1qp', 96, 's', '2021-06-04 20:45:13', NULL, 'Ожидайте звонка от оператора', 0),
(26, '9sd9gb7uqhdjs6haaeji4q7rq52mpts1', 123, 'sad', '2021-06-04 20:47:07', 2, 'Ожидайте звонка от оператора', 0),
(27, '9sd9gb7uqhdjs6haaeji4q7rq52mpts1', 123, 'sad', '2021-06-04 20:47:07', 2, 'Ожидайте звонка от оператора', 0),
(28, 'mlebj4fho1cqtb6s03eoip6ofcklgt6j', 12, 'asd', '2021-06-04 20:48:30', NULL, 'Ожидайте звонка от оператора', 0),
(29, '3uvls7q32mskotocq1vm7sv52aohv0pu', 12, 's', '2021-06-04 20:48:51', 2, 'Ожидайте звонка от оператора', 0),
(30, '3uvls7q32mskotocq1vm7sv52aohv0pu', 1212, 'asd', '2021-06-04 20:49:28', 2, 'Ожидайте звонка от оператора', 0),
(31, '4koa55c6ui0ju6nnnqlnqphpskl382u0', 1212, 'a', '2021-06-04 20:50:42', 2, 'Ожидайте звонка от оператора', 0),
(32, 'g6mon3r3grp04en94lcf0g49sjte7an7', 565, 'sd', '2021-06-04 20:51:17', 2, 'Ожидайте звонка от оператора', 0),
(33, 'g6mon3r3grp04en94lcf0g49sjte7an7', 565, 'sd', '2021-06-04 20:51:18', 2, 'Ожидайте звонка от оператора', 0),
(34, 'drali1hv2mfvlt6c798396edr0qp0u5j', 1, 'sa', '2021-06-04 20:52:10', 2, 'Ожидайте звонка от оператора', 0),
(35, 'bp76d1h5ue9u5grjei8o2tgq3pm594sf', 12332, 'sad', '2021-06-04 21:52:59', 2, 'Ожидайте звонка от оператора', 0),
(36, 'hmn45vlnr1ge556fva6bbma40lhuar8f', 12, 'ыф', '2021-06-05 02:27:21', 2, 'Ожидайте звонка от оператора', 0),
(37, 'ale3mggvr2kvl6c1oftoi8lp0shpc31i', 232, 'asd', '2021-06-05 02:51:02', 2, 'Ожидайте звонка от оператора', 2),
(38, 'd13n6nhpm4rt1nsuajcr63rkvkn6i8e2', 12, 'asas', '2021-06-05 02:53:22', 2, 'Ожидайте звонка от оператора', 1),
(39, 'i5juhlsknona6uc608db4u4eh1ck7h0a', 12312, 'as', '2021-06-05 02:54:58', 2, 'Ожидайте звонка от оператора', 1),
(42, 'tlcpaag683l7i6eejbvhgjv3gmf04dvg', 12, 'ss', '2021-06-05 03:13:08', 2, 'Ожидайте звонка от оператора', 620),
(43, 'vpf0i05j4n9jqrbmijom554p11ok66ng', 12, 'as', '2021-06-05 03:13:56', 2, 'Ожидайте звонка от оператора', 1270),
(44, 'd1um3elct4grdvqtmmffo3v8vqnaasqq', 12, 'ы', '2021-06-05 03:27:43', 2, 'Ожидайте звонка от оператора', 452),
(45, 'd1um3elct4grdvqtmmffo3v8vqnaasqq', 123, 'ф', '2021-06-05 03:28:20', 2, 'Ожидайте звонка от оператора', 452),
(46, 'd1um3elct4grdvqtmmffo3v8vqnaasqq', 213, 'sas', '2021-06-05 03:28:46', 2, 'Ожидайте звонка от оператора', 452),
(47, '46pdrnfd3n7dcldnops87qu4ha3v5vmv', 12, 'as', '2021-06-05 03:29:47', 2, 'Ожидайте звонка от оператора', 198),
(48, 'u694daofbtj00dtotj5s7ti545f25dd2', 12, 'as', '2021-06-05 03:31:33', 2, 'Ожидайте звонка от оператора', 1920),
(49, 'ndt6m9v8il072sr2i1jjvgtcuj82gimr', 12, 'juik', '2021-06-05 03:38:47', 2, 'Ожидайте звонка от оператора', 2936),
(50, 'pilikpvgeaj43nudlvu2n5ej9ioseobk', 23, 'ghj', '2021-06-05 03:40:51', 2, 'Ожидайте звонка от оператора', 4262),
(51, 'rcg41p22e45en9hpba5blobcbklaavu3', 2231, 'kilm', '2021-06-05 03:44:54', 2, 'Ожидайте звонка от оператора', 5050),
(52, 'ms1e75hqoqgc82ervt1tfru0r35qpi1k', 125165, '', '2021-06-05 03:46:05', 2, 'Ожидайте звонка от оператора', 1722),
(53, 'j8stsul5lkhdj3obg9nbk3rk3o78juee', 123, 'sdas', '2021-06-05 03:54:52', 2, 'Ожидайте звонка от оператора', 1498),
(54, 'sa2ri1mi9ohhkhb3iic8je3h3vdqq5gs', 21, 'asd', '2021-06-05 03:57:00', 2, 'Ожидайте звонка от оператора', 2992),
(55, '9grmeoljlmddql4pqu4k1muvm43i1em6', 123, 'as', '2021-06-05 13:18:26', NULL, 'Ожидайте звонка от оператора', 620),
(56, 'u4jprmmo5lvnijdn0ucobkgvnaokfns8', 56512, 'sda', '2021-06-05 14:05:37', 3, 'Ожидайте звонка от оператора', 2992),
(57, 'tcd1ddfc9dal0vlmr2gopv6934ndbu5v', 12, 'as', '2021-06-05 14:11:55', 4, 'Ожидайте звонка от оператора', 3272),
(58, 'pf08rjpmnqm3fnduq0ouoeormfq46dnl', 213, 'asd', '2021-06-05 14:59:22', 7, 'Ожидайте звонка от оператора', 2794),
(59, '93tt73ltfkjgu85j6a4na216s2ukvgvt', 213, 'we', '2021-06-05 15:00:13', 6, 'Ожидайте звонка от оператора', 620),
(60, 'fbujrf8rdh8cj47cjhfq8v5685ki22pk', 32, 'sad', '2021-06-05 15:01:06', 5, 'Ожидайте звонка от оператора', 396),
(61, 'e0to33sssn2hgvr7f4h6movutvk3vbup', 1221, 'as', '2021-06-05 15:21:45', 4, 'Выполнен', 2510),
(62, 'abuqld9buqcjis1osjar4b4iehsgij1n', 8451, 'saddsa', '2021-06-06 20:08:53', 2, 'Ожидайте звонка от оператора', 3582),
(63, 'en8e3jmn3ubf5doom5oedhd7u231e2ob', 12312, 'as', '2021-06-06 20:09:36', NULL, 'Ожидайте звонка от оператора', 2484),
(64, 'oq647hoemhi8aa6uhb4g3htfiidqr4qh', 12, 'sa', '2021-06-06 20:19:35', 2, 'Едет в пункт выдачи', 3784),
(65, 'glqatpaavputqbvaui6c94gs694lkgbt', 213, 'asd', '2021-06-06 20:21:42', 2, 'Выполнен', 2708),
(66, '5ssq6lmv377adalhu4b3199nc9dhdsbv', 789925626, 'ываыыв', '2021-06-11 06:26:38', NULL, 'Ожидайте звонка от оператора', 3048),
(67, 'ukp0dufjf7dbesam1pblvvihghe50mlm', 8796126, 'sdaas', '2021-06-11 06:27:30', 10, 'Подготовлен счёт на оплату', 620),
(68, '55e8l49aj2ocqq4gf0thh8euagqcnrco', 526562, 'sdssaa', '2021-06-14 09:31:49', 4, 'Ожидайте звонка от оператора', 2088);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$7MPBsjZJQvTdH2YQh6RLg.ql7roG.LsoRuSrmTtQjXs//VstSR5j2', '57762278460bb81bf01df73.04760971'),
(2, 'lop', '$2y$10$h8VYBRsfOf/vh/n97OYUh..iDm8ZDMnlW/hYtg3zyx7jlbvEx92lS', '62656287460bb81cb726773.74618670'),
(3, 'two', '$2y$10$yQtBYEdFGNIzjULV4GepcOgRAckGDbrbbmKIu85ybNyKxjAvNKWT.', NULL),
(4, 'one', '$2y$10$MewJ.hJtznVH8EvYfJTpaOv/NN/5zou/nOs3T2WtCPlOe6bSAh6v2', '3074121460c2d89224b3a5.25371529'),
(5, 'tree', '$2y$10$SreEqZGrAmGfIsONzen5rOQrpsio3Ppm4Zc1eUMDQwOsxg/2r6g.u', NULL),
(6, 'for', '$2y$10$xGWA.MLdQaoICxQCdnuw.ub6wTJzqQQ1zFtYWFZa5dyNx3qst134W', NULL),
(7, 'five', '$2y$10$CgWVbEcTbiYiprUjt9Knv.7XQM1KRhqIALrapoqIgpB1c0lFDefcy', NULL),
(8, 'six', '$2y$10$ls2uK.Fpfg.GcsX.k/dj3Oaz78FrLnVaOQtztL3kIMAtlpuHAW8cK', NULL),
(9, 'seven', '$2y$10$x92TdV6gMiZbBF9dKN5YBuhxH1slTuylFAMzguSxEqORgZcpyISdS', NULL),
(10, 'nina', '$2y$10$T08t9pCO8zLh2zOoczQG.ut8aPvX/gaR2CZvrmarKnha1UMYzPZd6', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goods_id` (`goods_id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`goods_id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
