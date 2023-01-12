-- phpMyAdmin SQL Dump
-- version 5.1.1-1.el7.remi
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 12 日 01:44
-- サーバのバージョン： 5.7.27-log
-- PHP のバージョン: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `bcdhm_nagoya_pf0005`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `pictable`
--

CREATE TABLE `pictable1` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `public_flg` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `pictable`
--

INSERT INTO `pictable` (`image_id`, `image_name`, `public_flg`, `create_date`, `update_date`) VALUES
(19, 'test1.jpg', 1, '2022-12-26', '2023-01-11'),
(20, 'test3.jpg', 0, '2022-12-26', '2023-01-11'),
(21, 'hono.jpg', 0, '2022-12-26', '2023-01-11'),
(22, 'renaa.jpg', 0, '2022-12-26', '2023-01-11'),
(23, 'hono.jpg', 0, '2022-12-26', '2022-12-26'),
(24, 'test20.jpg', 1, '2022-12-28', '2022-12-28'),
(25, 'test20.jpg', 0, '2022-12-28', '2023-01-05'),
(26, 'test10.jpg', 0, '2023-01-05', '2023-01-05'),
(27, 'test10.jpg', 0, '2023-01-05', '2023-01-11'),
(28, 'test1000.jpg', 0, '2023-01-11', '2023-01-11');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `pictable`
--
ALTER TABLE `pictable1`
  ADD PRIMARY KEY (`image_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `pictable`
--
ALTER TABLE `pictable1`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
