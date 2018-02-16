-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-11-27 14:02:30
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moduleb_myq`
--

-- --------------------------------------------------------

--
-- 表的结构 `moduleb_myq`
--

CREATE TABLE `moduleb_myq` (
  `id` int(255) NOT NULL,
  `touxiang` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `o` int(10) DEFAULT NULL,
  `x` int(10) DEFAULT NULL,
  `startime` int(255) DEFAULT NULL,
  `endtime` int(255) DEFAULT NULL,
  `zuitime` int(255) NOT NULL,
  `qiju` varchar(255) DEFAULT NULL,
  `win` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `moduleb_myq`
--

INSERT INTO `moduleb_myq` (`id`, `touxiang`, `name`, `o`, `x`, `startime`, `endtime`, `zuitime`, `qiju`, `win`) VALUES
(1, '../pictures/default.png', ' ', 0, 0, 1511785689, 0, 0, '0000000000', 0),
(22, '../uploads/123.jpg', 'm', 3, 3, 1511086999, 1511086977, 52, '111220020', 1),
(23, '../uploads/123.jpg', 'ss', 3, 3, 1511087097, 1511087084, 52, '111002202', 1),
(24, '../uploads/123.jpg', 'ww', 3, 2, 1511087491, 1511087483, 52, '102100102', 1),
(27, 'pictures/photo.jpg', 'n', 3, 2, 1511770699, 1511770710, 11, '111200020', 1),
(28, 'pictures/photo.jpg', 'n', 3, 2, 1511770699, 1511770710, 11, '111200020', 1),
(32, 'pictures/1.jpg', 'myq', 5, 4, 1511770841, 1511776886, 6045, '112122121', 1),
(33, 'pictures/2.jpg', 'qq', 3, 2, 1511777023, 1511779932, 2909, '111002002', 1),
(34, 'pictures/1.jpg', 'QQ', 4, 3, 1511785605, 1511785621, 16, '0101212102', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moduleb_myq`
--
ALTER TABLE `moduleb_myq`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `moduleb_myq`
--
ALTER TABLE `moduleb_myq`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
