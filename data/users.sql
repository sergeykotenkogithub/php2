-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 18 2021 г., 17:12
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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
