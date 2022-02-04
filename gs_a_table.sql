-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 2 月 04 日 16:54
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_a_table`
--

CREATE TABLE `gs_a_table` (
  `id` int(50) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_a_table`
--

INSERT INTO `gs_a_table` (`id`, `name`, `email`, `content`, `date`) VALUES
(11, 'koi-wazurai', 'King & Prince', '恋煩い', '2022-01-22 01:37:13'),
(12, 'Mazy Night', 'King & Prince', '衣装がいい！', '2022-01-22 01:38:38'),
(19, 'Key of Heart', 'King & Prince', '『弱虫ペダル』主題歌', '2022-01-22 14:18:46'),
(21, '恋降る月夜に君想ふ', 'King&Prince', 'かぐや様は告らせたい主題歌', '2022-01-27 00:00:23'),
(23, 'ARASHI', '嵐', '', '2022-01-29 03:13:25');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_a_table`
--
ALTER TABLE `gs_a_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_a_table`
--
ALTER TABLE `gs_a_table`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
