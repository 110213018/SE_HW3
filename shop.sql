-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-06 15:15:41
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `id` int(10) NOT NULL COMMENT 'AUTO_INCREMENT',
  `sId` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `goodsName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `goodsContent` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `buyNum` int(10) NOT NULL,
  `totalPrice` int(10) NOT NULL,
  `totalQuantity` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `shop`
--

INSERT INTO `shop` (`id`, `sId`, `goodsName`, `goodsContent`, `price`, `buyNum`, `totalPrice`, `totalQuantity`, `Quantity`) VALUES
(11, '1', '1', '11', 1, 0, 0, 9, 0),
(12, '1', '4', '4', 4, 0, 0, 2, 0),
(13, '1', '3', '3', 3, 0, 0, 3, 0),
(14, '2', '1', '2', 11, 0, 0, 11, 0),
(15, '2', '1', '22', 11, 0, 0, 11, 0),
(17, '2', '11', '11', 11, 0, 0, 12, 0),
(19, '1', '4', '3', 3, 0, 0, 3, 0),
(22, '2', '1', '11', 1, 0, 0, 30, 0),
(23, '2', '3', '3', 3, 0, 0, 20, 0),
(24, '2', '3', '3', 3, 0, 0, 10, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sId` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bId` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `sId`, `bId`, `pwd`) VALUES
('aaa', NULL, '2', 'aaa'),
('bbb', '1', NULL, 'bbb'),
('ccc', '2', NULL, 'ccc'),
('ddd', NULL, '1', 'ddd');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
