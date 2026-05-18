-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 18 2026 г., 23:00
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `voditrf`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `choosing_date` date NOT NULL,
  `method_payment` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `transport`, `choosing_date`, `method_payment`, `status`, `review`) VALUES
(1, 1, 'Круизный лайнер', '2026-05-13', 'Оплата картой МИР', 'Обучение завершено', 'супер'),
(2, 4, 'Круизный лайнер', '0200-08-31', 'Оплата картой МИР', 'Обучение завершено', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `phone` varchar(36) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fullname`, `birth_date`, `phone`, `email`, `login`, `password`) VALUES
(1, 'Ксюша', '2006-04-12', '8(888)888-88-88', 'ksy@mail.ru', 'Ksysha', '$2y$10$Dnx8NzqdUWTT8Q6nh.JXQue0n0AdWUc/N/U9qcGN3GhfuqfhLErL2'),
(2, 'Админ', '2006-05-14', '8(888)888-88-88', 'admin@gmail.ru', 'Admin26', '$2y$10$UKtI0njkIRM5Iorgplc3bOHbfE3hzt1E/Jsrx5XiVj5.gj0Q5CZra'),
(3, 'Артем', '2006-05-16', '8(888)888-88-88', 'artem@mail.ru', 'Artemm', '$2y$10$4jYuImHqi0dy9ms2QNuO7.bM3tKufC4sAmJLjviKM9gPj8JuQ0M2S'),
(4, 'Никита', '2007-05-12', '8(888)888-88-88', 'artem@mail.ru', 'Nikita', '$2y$10$5WTh/woVhmm0vXMl9vuCtuOENAp8OJpVYTShpN0rmZldbYO0oa3bu');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
