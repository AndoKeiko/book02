-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-06-09 06:27:33
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_book`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bookcase_table`
--

CREATE TABLE `bookcase_table` (
  `fid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `bid` int(12) NOT NULL,
  `bcount` int(6) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `book_category`
--

CREATE TABLE `book_category` (
  `cid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `cname` varchar(525) NOT NULL,
  `ctext` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `book_detail`
--

CREATE TABLE `book_detail` (
  `did` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `status` int(2) NOT NULL,
  `cid` int(5) NOT NULL,
  `tid` int(5) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `book_table`
--

CREATE TABLE `book_table` (
  `bid` int(11) NOT NULL,
  `gid` varchar(128) NOT NULL,
  `title` varchar(566) NOT NULL,
  `authors` varchar(256) NOT NULL,
  `publisher` varchar(256) NOT NULL,
  `publishedDate` varchar(128) NOT NULL,
  `thumbnail` varchar(526) NOT NULL,
  `description` text NOT NULL,
  `buyLink` varchar(566) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `book_tag`
--

CREATE TABLE `book_tag` (
  `tid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `tname` varchar(526) NOT NULL,
  `ttext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `review_comment`
--

CREATE TABLE `review_comment` (
  `rcid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `bid` int(12) NOT NULL,
  `rid` int(12) NOT NULL,
  `comment` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `review_table`
--

CREATE TABLE `review_table` (
  `rid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `review` text NOT NULL,
  `publication` int(1) NOT NULL,
  `rate` int(1) NOT NULL,
  `netabare` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(225) NOT NULL,
  `lid` varchar(255) NOT NULL,
  `lpw` varchar(525) NOT NULL,
  `indate` datetime NOT NULL,
  `member_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `email`, `lid`, `lpw`, `indate`, `member_flg`) VALUES
(5, '安藤佳子', 'gajugaju', 'gajugaju', '$2y$10$oCGbwYzkPDNHmsOZAb6Bx.MobNDaKHSlLc8ZNUuWtuH3M2CuQtlzO', '2024-06-09 02:52:02', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `bookcase_table`
--
ALTER TABLE `bookcase_table`
  ADD PRIMARY KEY (`fid`);

--
-- テーブルのインデックス `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`cid`);

--
-- テーブルのインデックス `book_detail`
--
ALTER TABLE `book_detail`
  ADD PRIMARY KEY (`did`);

--
-- テーブルのインデックス `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`bid`);

--
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `bookcase_table`
--
ALTER TABLE `bookcase_table`
  MODIFY `fid` int(12) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `book_category`
--
ALTER TABLE `book_category`
  MODIFY `cid` int(12) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `book_detail`
--
ALTER TABLE `book_detail`
  MODIFY `did` int(12) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `book_table`
--
ALTER TABLE `book_table`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
