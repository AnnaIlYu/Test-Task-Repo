-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 26 2020 г., 11:26
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `service`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(2) NOT NULL AUTO_INCREMENT,
  `client_login` varchar(30) NOT NULL COMMENT 'Логин клиента',
  `client_password` varchar(30) NOT NULL COMMENT 'Пароль клиента',
  `client_email` varchar(30) NOT NULL COMMENT 'Адрес электронной почты клиента',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица с данными клиентов' AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`client_id`, `client_login`, `client_password`, `client_email`) VALUES
(1, 'Petya', 'petya', 'petya@domain.ru'),
(3, 'Irina', 'irina', 'irina@domain.ru'),
(4, 'Anna', 'Anna', 'ann@domain.ru'),
(5, 'Sam', 'Sam', 'sam@domain.ru'),
(6, 'Ivan', 'Ivan', 'ivan@domain.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `manager_id` int(2) NOT NULL AUTO_INCREMENT,
  `manager_login` varchar(30) NOT NULL COMMENT 'Логин менеджера',
  `manager_password` varchar(30) NOT NULL COMMENT 'Пароль менеджера',
  `manager_email` varchar(30) NOT NULL COMMENT 'Адрес электронной почты менеджера',
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица с данными менеджера' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_login`, `manager_password`, `manager_email`) VALUES
(1, 'Manager', 'Password', 'manager@company.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(2) NOT NULL AUTO_INCREMENT,
  `order_topic` varchar(30) NOT NULL COMMENT 'Тема заявки',
  `order_body` varchar(255) NOT NULL COMMENT 'Содержание заявки',
  `order_accepted` int(2) NOT NULL COMMENT 'Статус1 заявки (0-не принята/1-принята)',
  `order_finished` int(2) NOT NULL COMMENT 'Статус2 заявки (0-завршена/1 - не завершена)',
  `order_manager_reply` varchar(255) NOT NULL COMMENT 'Ответ менеджера',
  `order_client_email` varchar(30) NOT NULL COMMENT 'Адрес электронной почты клиента, оставившего данную заявку',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица с данными по заявкам' AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_topic`, `order_body`, `order_accepted`, `order_finished`, `order_manager_reply`, `order_client_email`) VALUES
(1, 'order1', 'Hello! I want to buy a table!', 1, 0, 'Hello! Unfortunately no tables this week.', 'ann@domain.ru'),
(2, 'order2', 'Hello! I wanna buy an arnchair!', 1, 1, 'Hello! What type do you want?', 'ann@domain.ru'),
(3, 'order3', 'Hello! I wanna buy a lamp!', 0, 0, '0', 'ann@domain.ru'),
(4, 'Orderrrr', 'Hello! I want to buy a wardrobe!', 1, 0, 'Hello! What colour do you want?', 'ann@domain.ru'),
(5, 'Hello!', 'I wanna buy a chair!', 0, 0, '0', 'ann@domain.ru'),
(6, 'Order!!!', 'A teapot #1279', 0, 0, '0', 'ann@domain.ru'),
(7, 'Order!!!', 'A teapot #1279', 0, 0, '0', 'ann@domain.ru'),
(8, '111', '11111', 0, 0, '0', 'ann@domain.ru'),
(9, '222', '222', 0, 0, '0', 'ann@domain.ru');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
