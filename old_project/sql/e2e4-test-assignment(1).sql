-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2016 at 06:04 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e2e4-test-assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(6) UNSIGNED NOT NULL,
  `author` varchar(50) NOT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topic` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `text`, `date`, `topic`) VALUES
(13, 'Юра', 'Юра комментирует', '2016-07-31 10:00:51', 15);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(6) UNSIGNED NOT NULL,
  `header` varchar(500) NOT NULL,
  `text` text NOT NULL,
  `brief` varchar(1000) NOT NULL,
  `author` varchar(100) NOT NULL DEFAULT 'aleksander'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `header`, `text`, `brief`, `author`) VALUES
(15, 'Умер Фазиль Искандер', 'МОСКВА, 31 июл — РИА Новости. Известный советский и российский поэт и писатель Фазиль Искандер скончался в Москве на 88-м году жизни, сообщает телеканал "Россия 24".\r\n\r\nФазиль Искандер родился в Сухуми в 1929 году. Окончил Литературный институт им. А. М. Горького. Он прославился как прозаик и поэт. Среди его произведений: "Человек и его окрестности", "Тринадцатый подвиг Геракла", "Софичка", "Поэт", "Кролики и удавы", "Начало" и многие другие.\r\n\r\nИскандер получил множество государственных наград, в том числе орден "За заслуги перед Отечеством" II степени, Государственную премию Российской Федерации, Государственную премию СССР. В честь него назвали библиотеку в Москве на Кастанаевской улице.\r\n\r\nРИА Новости http://ria.ru/culture/20160731/1473262927.html#ixzz4Fyki3IJT\r\n', 'МОСКВА, 31 июл — РИА Новости. Известный советский и российский поэт и писатель Фазиль Искандер скончался в Москве на 88-м году жизни, сообщает телеканал "Россия 24".\r\n', 'aleksander'),
(16, 'В Ереване с территории захваченного полка ППС доносятся звуки выстрелов', '\r\nСреди полицейских, которые находятся за ограждением по дороге к полку ППС, никакой активности не наблюдается: они спокойно дежурят у оцепления, сообщает корреспондент РИА Новости.\r\n\r\nВооруженная группа удерживает здание полиции с 17 июля. Они требуют отставки президента Сержа Саргсяна и освобождения лидера радикальной оппозиционной организации "Учредительный парламент" Жирайра Сефиляна. В течение нескольких последних дней группировка удерживала в заложниках бригаду медиков, однако в воскресенье стало известно, что всех врачей освободили. Позже группа выступила с призывом к президенту Армении начать переговоры.\r\n\r\nВ районе полицейского оцепления постоянно проходят акции в поддержку группировки, несколько раз они перерастали в столкновения с полицией.\r\n\r\nРИА Новости http://ria.ru/world/20160731/1473262550.html#ixzz4Fyl0zZzs\r\n', 'ЕРЕВАН, 31 июл — РИА Новости, Гамлет Матевосян. С территории захваченного вооруженными людьми полка патрульно-постовой службы в Ереване время от времени слышны выстрелы и хлопки. При этом официальной информации пока нет.', 'mathew');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `nickname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`) VALUES
(1, 'aleksander'),
(2, 'mathew');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic` (`topic`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`topic`) REFERENCES `messages` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`nickname`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
