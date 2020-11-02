-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 02 2020 г., 17:00
-- Версия сервера: 5.6.41
-- Версия PHP: 5.6.38

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
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_strong` text NOT NULL,
  `text` text NOT NULL,
  `our_strong` text NOT NULL,
  `our_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `about_strong`, `text`, `our_strong`, `our_text`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget bibendum tellus. \r\n          Nunc vel imperdiet tellus. Mauris ornare aliquam urna, accumsan bibendum eros auctor ac.', 'Curabitur purus mi, pharetra vitae viverra et, mattis sit amet nunc. Quisque enim ipsum, \r\n          convallis sit amet molestie in, placerat vel urna. Praesent congue auctor elit, nec pretium ipsum \r\n          volutpat vitae. Vivamus eget ipsum sit amet ipsum tincidunt fermentum. Sed hendrerit neque ac erat\r\n          condimentum vulputate. Nulla velit massa, dictum etinterdum quis, tempus at velit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget bibendum \r\n          tellus. Nunc vel imperdiet tellus. Mauris ornare aliquam urna, accumsan bibendum eros auctor ac.', '>Maecenas vestibulum fermentum eleifend. Mauris erat sem, suscipit non tincidunt quis, vestibulum\r\n          eget elit. Duis eget arcu ante. Proin nulla elit, elementum sit amet commodo et, eleifend vitae quam.\r\n          Nam vel aliquam tortor. Aliquam bibendum erat a urna interdum quis mattis augue interdum. Phasellus fermentum \r\n          bibendum mauris, ut semper justo pharetra vestibulum. Duis dictum purus sed nibh commodo a congue elit lobortis. \r\n          Nunc sed feugiat tellus. Mauris aliquet lorem non enim euismod quis fermentum erat porta. Nullam non elit orci. \r\n          Aliquam blandit mattis feugiat. Cras pulvinar aliquet massa, quis laoreet mi pulvinar ac. Aliquam mi augue, \r\n          vehicula in consectetur in, porttitor sed tellus. Mauris convallis dapibus auctor. Integer in egestas lorem. \r\n          In nulla dolor, sollicitudin vitae sollicitudin quis, viverra at lorem.\r\n          Ut ullamcorper velit et nisi feugiat non sagittis tortor pharetra. Mauris ut urna et magna commodo cursus. \r\n          Curabitur quis elementum arcu. Maecenas eleifend, urna vitae vehicula bibendum, felis tellus tincidunt lorem, \r\n          at iaculis neque eros ac dui. Nunc malesuada pulvinar suscipit. Phasellus sed tortor quis ligula facilisis \r\n          aliquam. Aliquam quis magna eu dolor posuere malesuada. Quisque consequat, metus fermentum convallis imperdiet, \r\n          ante justo pharetra enim, vel commodo ipsum mauris eget purus. Morbi lacinia nisl urna, scelerisque suscipit lacus. \r\n          Nulla ac orci ut nunc venenatis gravida.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
