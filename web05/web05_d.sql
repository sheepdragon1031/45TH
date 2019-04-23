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
-- 資料庫： `web05_d`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(4) unsigned zerofill NOT NULL,
  `name` text NOT NULL,
  `file` text NOT NULL,
  `work` text NOT NULL,
  `sort` text NOT NULL,
  `text` text NOT NULL,
  `year` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `book`
--

INSERT INTO `book` (`id`, `name`, `file`, `work`, `sort`, `text`, `year`) VALUES
(0003, '235345', 'img/55f279389d33a.png', 'asda', '3', 'asd', '3333'),
(0005, '3124', 'img/55f27d0975c4d.png', '1234', '2', '1234', '1234'),
(0006, '3124', 'img/55f27d0b4e941.png', '1234', '2', '1234', '1234'),
(0007, '3124', 'img/55f27d0ba9a5e.png', '1234', '2', '1234', '1234'),
(0008, '3124', 'img/55f27d0c0d28a.png', '1234', '2', '1234', '1234'),
(0009, '3124', 'img/55f27d0c61646.png', '1234', '2', '1234', '1234'),
(0010, '3124', 'img/55f27d0cbd704.png', '1234', '2', '1234', '1234'),
(0011, '3124', 'img/55f27d1163588.png', '1234', '2', '1234', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id` int(255) NOT NULL,
  `user` text NOT NULL,
  `book` text NOT NULL,
  `time1` text NOT NULL,
  `time2` text NOT NULL,
  `see` text NOT NULL,
  `one` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `list`
--

INSERT INTO `list` (`id`, `user`, `book`, `time1`, `time2`, `see`, `one`) VALUES
(9, '2', '0003', '1441956213', '1444030583', 'false', 'true'),
(10, '2', '0003', '1441956994', '1441957202', 'false', 'true'),
(11, '2', '0003', '1441957236', '1443167297', 'false', 'false'),
(12, '2', '0005', '1441958759', '1443110401', 'true', 'false'),
(13, '4', '0003', '1443168599', '1444320001', 'true', 'false');

-- --------------------------------------------------------

--
-- 資料表結構 `sort`
--

CREATE TABLE IF NOT EXISTS `sort` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `sort`
--

INSERT INTO `sort` (`id`, `name`) VALUES
(2, '未分類'),
(3, '454');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `name` text NOT NULL,
  `power` text NOT NULL,
  `noid` text NOT NULL,
  `mail` text NOT NULL,
  `phone` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `name`, `power`, `noid`, `mail`, `phone`, `time`) VALUES
(2, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'true', '123456789', '234@dd.vvv', '', '0'),
(4, '1234', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'false', 'A1234', '1234@11.cc', '123489874', '0');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `list`
--
ALTER TABLE `list`
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
  MODIFY `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `list`
--
ALTER TABLE `list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- 使用資料表 AUTO_INCREMENT `sort`
--
ALTER TABLE `sort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
