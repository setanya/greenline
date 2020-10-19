-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 18 2020 г., 14:49
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `greenline`
--

-- --------------------------------------------------------

--
-- Структура таблицы `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `support`
--

INSERT INTO `support` (`id`, `title`, `text`) VALUES
(1, 'Комфортные тарифы', 'Мы стараемся работать для Вас! Цены технической поддержки сайта порадуют и удовлетворят запросы любого ресурса и клиента. Предоставим конкурентный лист.'),
(2, 'Решение любых задач', 'Не знаете где реализовать свои задумки? В рамках нашей техподдержки сайта возможно всё – сделаем любой функционал, который пожелаете.'),
(3, 'Личный менеджер', 'Стоимость поддержки сайта позволяет Вам иметь своего личного менеджера, который всегда на связи и готов ответить на текущие вопросы. Кроме этого, менеджер контролирует выполнение поставленных задач специалистами, следит за соблюдением сроков.'),
(4, 'Рост продаж', 'Одной из целей поддержки интернет-сайта может быть повышение объёма продаж, мы расскажем, как сделать площадку более продающей и конкурентоспособной.'),
(5, 'Ежемесячные отчёты', 'Каждый месяц клиент получает отчёт в удобной форме, исходя из которого он видит перечень работ и затраченное время.'),
(6, 'Качество гарантировано', 'Договор на техническую поддержку сайта под ключ включает в себя гарантии, мы несём ответственность за Ваш ресурс согласно договору');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
