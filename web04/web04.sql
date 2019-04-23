-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015 �?10 ??22 ??21:10
-- 伺服器版本: 5.6.24
-- PHP 版本： 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `web04`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(255) NOT NULL,
  `src` text NOT NULL,
  `name` text NOT NULL,
  `work` text NOT NULL,
  `text` text NOT NULL,
  `sort` text NOT NULL,
  `year` text NOT NULL,
  `view` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `book`
--

INSERT INTO `book` (`id`, `src`, `name`, `work`, `text`, `sort`, `year`, `view`) VALUES
(7, 'img/5628914697b10.png', '1234', '41234', '123', '2', '1234', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `num` text NOT NULL,
  `over` text NOT NULL,
  `my` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `data`
--

INSERT INTO `data` (`id`, `name`, `num`, `over`, `my`) VALUES
(8, '234', '0', '失敗', '5aijfehjrsm9gunrhf1btr32r75628dc166eb52'),
(9, '123', '0', '失敗', '5aijfehjrsm9gunrhf1btr32r75628deaf2ad8f'),
(10, '555', '8', '成功', '5aijfehjrsm9gunrhf1btr32r75628def5686ed'),
(11, '45456', '8', '成功', '5aijfehjrsm9gunrhf1btr32r75628df7c99bc6'),
(12, '12313', '0', '失敗', '5aijfehjrsm9gunrhf1btr32r75628dfb48ec7c'),
(13, '234234', '0', '失敗', '5aijfehjrsm9gunrhf1btr32r75628dfbba58f9'),
(14, '234234', '0', '失敗', '5aijfehjrsm9gunrhf1btr32r75628dfc149993'),
(15, '324234', '2', '失敗', '5aijfehjrsm9gunrhf1btr32r75628dfc75cb9f');

-- --------------------------------------------------------

--
-- 資料表結構 `sort`
--

CREATE TABLE IF NOT EXISTS `sort` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `sort`
--

INSERT INTO `sort` (`id`, `name`) VALUES
(2, '未分類');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `name` text NOT NULL,
  `noid` text NOT NULL,
  `mail` text NOT NULL,
  `phone` text NOT NULL,
  `power` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `name`, `noid`, `mail`, `phone`, `power`, `time`) VALUES
(1, '1', '1', '1', '1', '1', '1', '1', '1'),
(3, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'A1234', 'A@C', '', 'true', '0'),
(4, '1234', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'A1234', 'A@C', '', 'false', '0'),
(5, '321', 'caf1a3dfb505ffed0d024130f58c5cfa', '321', 'N1023', '1@1', '12398745', 'false', '0'),
(6, '321s', '81dc9bdb52d04dc20036dbd8313ed055', '321', 'N1023', '1@1', '12398745', 'false', '0');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sort`
--
ALTER TABLE `sort`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `data`
--
ALTER TABLE `data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- 使用資料表 AUTO_INCREMENT `sort`
--
ALTER TABLE `sort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
