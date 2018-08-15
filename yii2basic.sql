-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Aug 15. 16:00
-- Kiszolgáló verziója: 10.1.34-MariaDB
-- PHP verzió: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `yii2basic`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `prolog` varchar(200) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `viewed` int(255) NOT NULL DEFAULT '0',
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `posts`
--

INSERT INTO `posts` (`id`, `userid`, `title`, `prolog`, `text`, `viewed`, `createdat`) VALUES
(1, 7, 'Csáá', 'Csáá', 'Cááááááááááááá\r\ná\r\náá\r\ná\r\nas\r\nűádéáas\r\ndé-áas\r\nd-', 22, '2018-08-15 02:53:11'),
(2, 7, 'asd', 'asd', 'asd', 5, '2018-08-15 00:00:00'),
(3, 8, 'asd', 'asd', 'asdasd  adsds aasd asd  sdasd a sdaasd asd asd asdasd', 1, '2018-08-15 03:54:09');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`) VALUES
(1, 'teszt', 'teszt@teszt.hu', '$2y$13$B2tN7n0a9bpzS9vAVEGVvOu4/wp0xiAdVZlVi6GNpMcMF53UiO4cO', '', ''),
(7, 'sasha', 'molnar.sandor.benjamin@gmail.com', '$2y$13$pc83K3ASKRrQV7rxUancKe7VNzYAjtioPQrHDCc0mxJbImHXV9f56', '', ''),
(8, 'teszt2', 'asd@asd.hu', '$2y$13$Sglcj0gOU8w/q.ZTPUux.e0dVOJBfrlwJUNcV/xMzHFU/UHaQzU96', '', '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
