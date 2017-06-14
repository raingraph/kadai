-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 6 月 14 日 16:26
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db06`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `booklog`
--

CREATE TABLE IF NOT EXISTS `booklog` (
`id` int(12) NOT NULL,
  `img` text COLLATE utf8_unicode_ci,
  `bookname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `status` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `evaluate` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `booklog`
--

INSERT INTO `booklog` (`id`, `img`, `bookname`, `author`, `url`, `status`, `evaluate`, `comment`, `indate`) VALUES
(25, 'https://images-fe.ssl-images-amazon.com/images/I/51of-IcKWRL._SL75_.jpg', '多動力 (NewsPicks Book)', '堀江 貴文', 'https://www.amazon.co.jp/%E5%A4%9A%E5%8B%95%E5%8A%9B-NewsPicks-Book-%E5%A0%80%E6%B1%9F-%E8%B2%B4%E6%96%87/dp/4344031156?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4344031156', '読みたい', '★★★', '今日のyahooニュースでボロカス書かれてました。', '2017-06-05 23:46:13'),
(29, 'https://images-fe.ssl-images-amazon.com/images/I/31JFYXK07GL._SL75_.jpg', '蛇にピアス (クイーンズコミックス)', '金原 ひとみ', 'https://www.amazon.co.jp/%E8%9B%87%E3%81%AB%E3%83%94%E3%82%A2%E3%82%B9-%E3%82%AF%E3%82%A4%E3%83%BC%E3%83%B3%E3%82%BA%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-%E9%87%91%E5%8E%9F-%E3%81%B2%E3%81%A8%E3%81%BF/dp/4088652584?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4088652584', '読みたい', '★★★', '一回は読んでみたい', '2017-06-07 18:04:18'),
(38, 'https://images-fe.ssl-images-amazon.com/images/I/41jJfO3l7EL._SL75_.jpg', 'チルドレン (講談社文庫)', '伊坂 幸太郎', 'https://www.amazon.co.jp/%E3%83%81%E3%83%AB%E3%83%89%E3%83%AC%E3%83%B3-%E8%AC%9B%E8%AB%87%E7%A4%BE%E6%96%87%E5%BA%AB-%E4%BC%8A%E5%9D%82-%E5%B9%B8%E5%A4%AA%E9%83%8E/dp/4062757249?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4062757249', '読み終わった', '★', '伊坂っぽくないんだよな', '2017-06-13 22:15:07'),
(39, 'https://images-fe.ssl-images-amazon.com/images/I/5181BF5ZJ1L._SL75_.jpg', 'オーデュボンの祈り (新潮文庫)', '伊坂 幸太郎', 'https://www.amazon.co.jp/%E3%82%AA%E3%83%BC%E3%83%87%E3%83%A5%E3%83%9C%E3%83%B3%E3%81%AE%E7%A5%88%E3%82%8A-%E6%96%B0%E6%BD%AE%E6%96%87%E5%BA%AB-%E4%BC%8A%E5%9D%82-%E5%B9%B8%E5%A4%AA%E9%83%8E/dp/4101250219?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4101250219', '読みたい', '★★★', '祈りの意味って結局なんだったのか', '2017-06-13 22:31:11'),
(40, 'https://images-fe.ssl-images-amazon.com/images/I/519TDnD5jOL._SL75_.jpg', '小説 君の名は。 (角川文庫)', '新海 誠', 'https://www.amazon.co.jp/%E5%B0%8F%E8%AA%AC-%E5%90%9B%E3%81%AE%E5%90%8D%E3%81%AF%E3%80%82-%E8%A7%92%E5%B7%9D%E6%96%87%E5%BA%AB-%E6%96%B0%E6%B5%B7-%E8%AA%A0/dp/4041026229?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4041026229', '読みたい', '★★★★', '映画は面白かった', '2017-06-14 21:45:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booklog`
--
ALTER TABLE `booklog`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booklog`
--
ALTER TABLE `booklog`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
