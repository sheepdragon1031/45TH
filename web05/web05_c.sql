-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015 �?09 ??25 ??21:04
-- 伺服器版本: 5.6.24
-- PHP 版本： 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `web05_c`
--

-- --------------------------------------------------------

--
-- 資料表結構 `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `num` text NOT NULL,
  `LL` text NOT NULL,
  `mini` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `data`
--

INSERT INTO `data` (`id`, `name`, `num`, `LL`, `mini`) VALUES
(2, '123', '0', '失敗', 'pcbb89almec0oa6it48052mbu1560531d0ba48a'),
(3, '123', '0', '失敗', 'pcbb89almec0oa6it48052mbu1560531dc90c4e'),
(4, '55', '0', '失敗', '3pcbb89almec0oa6it48052mbu1560531ff03f5f1'),
(5, '555', '7', '失敗', 'pcbb89almec0oa6it48052mbu15605329941e23'),
(6, '222', '7', '成功', 'pcbb89almec0oa6it48052mbu1560533062b748'),
(7, '55', '18', '成功', 'pcbb89almec0oa6it48052mbu15605354f25438'),
(8, '555', '0', '失敗', 'pcbb89almec0oa6it48052mbu1560537ea323f7');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `data`
--
ALTER TABLE `data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
