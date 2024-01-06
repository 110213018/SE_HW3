-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2024-01-05 14:39:24
-- 服务器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `shopping_online`
--

-- --------------------------------------------------------

--
-- 表的结构 `customer_list`
--

CREATE TABLE `customer_list` (
  `Id` char(11) NOT NULL,
  `Name` char(20) NOT NULL,
  `Register_Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `Sex` char(10) NOT NULL,
  `Password` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `customer_list`
--

INSERT INTO `customer_list` (`Id`, `Name`, `Register_Time`, `Sex`, `Password`) VALUES
('C0000000000', 'kskl', '2024-01-05 03:21:08', '男', '$2y$10$n4/AJ135avANCwk3N1.rvOOiM.gM9sCe6LhNKqYDqfgyQI/FTfp.O'),
('C0000000001', 'long', '2024-01-05 03:21:29', '男', '$2y$10$9Gso3cP9fnMflNul0P1NhOIAsPLNprDBxWGRA0CxvYZCz5NWvc09y');

-- --------------------------------------------------------

--
-- 表的结构 `merchant_list`
--

CREATE TABLE `merchant_list` (
  `Id` char(11) NOT NULL,
  `Name` char(20) NOT NULL,
  `Register_Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `Password` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `merchant_list`
--

INSERT INTO `merchant_list` (`Id`, `Name`, `Register_Time`, `Password`) VALUES
('M0000000000', 'qq1', '2024-01-05 05:38:30', '$2y$10$h34fWGmcrxW.Ac0JG9739OUZIr0sm6mAboSNmv.aA/eg/wp18EPIq'),
('M0000000001', 'qq2', '2024-01-05 05:38:46', '$2y$10$8d2aBaWEUyC9eVJbVdg0XevwppXz9vNWxlDp9Kn3rWFE4Fds5GukW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
