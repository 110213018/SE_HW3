-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-06 08:19:26
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
  `mId` char(11) CHARACTER SET utf8mb4 NOT NULL,
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

INSERT INTO `shop` (`id`, `mId`, `goodsName`, `goodsContent`, `price`, `buyNum`, `totalPrice`, `totalQuantity`, `Quantity`) VALUES
(11, 'M0000000000', '1', '11', 1, 0, 0, 9, 0),
(12, 'M0000000000', '4', '4', 4, 0, 0, 2, 0),
(13, 'M0000000000', '3', '3', 3, 0, 0, 3, 0),
(14, 'M0000000001', '1', '2', 11, 0, 0, 11, 0),
(15, 'M0000000001', '1', '22', 11, 0, 0, 11, 0),
(16, 'M0000000001', '1', '1', 1, 0, 0, 1, 0),
(17, 'M0000000000', '11', '11', 11, 0, 0, 12, 0),
(19, 'M0000000000', '4', '3', 3, 0, 0, 3, 0),
(21, 'M0000000001', '3', '3', 3, 0, 0, 30, 0),
(22, 'M0000000001', '1', '11', 1, 0, 0, 30, 0),
(23, 'M0000000001', '3', '3', 3, 0, 0, 20, 0),
(24, 'M0000000001', '3', '3', 3, 0, 0, 10, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
