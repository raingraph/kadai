-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 6 月 10 日 16:05
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `booklog`
--

INSERT INTO `booklog` (`id`, `img`, `bookname`, `author`, `url`, `status`, `evaluate`, `comment`, `indate`) VALUES
(24, 'https://images-fe.ssl-images-amazon.com/images/I/412rWHC2eUL._SL75_.jpg', '永遠の0 (ゼロ)', '百田 尚樹', 'https://www.amazon.co.jp/%E6%B0%B8%E9%81%A0%E3%81%AE0-%E3%82%BC%E3%83%AD-%E7%99%BE%E7%94%B0-%E5%B0%9A%E6%A8%B9/dp/4778310268?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4778310268', '読みたい', '★★★', 'おかだくんかっこいいよね', '2017-06-05 22:48:33'),
(25, 'https://images-fe.ssl-images-amazon.com/images/I/51of-IcKWRL._SL75_.jpg', '多動力 (NewsPicks Book)', '堀江 貴文', 'https://www.amazon.co.jp/%E5%A4%9A%E5%8B%95%E5%8A%9B-NewsPicks-Book-%E5%A0%80%E6%B1%9F-%E8%B2%B4%E6%96%87/dp/4344031156?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4344031156', '読みたい', '★★★', '今日のyahooニュースでボロカス書かれてました。', '2017-06-05 23:46:13'),
(29, 'https://images-fe.ssl-images-amazon.com/images/I/31JFYXK07GL._SL75_.jpg', '蛇にピアス (クイーンズコミックス)', '金原 ひとみ', 'https://www.amazon.co.jp/%E8%9B%87%E3%81%AB%E3%83%94%E3%82%A2%E3%82%B9-%E3%82%AF%E3%82%A4%E3%83%BC%E3%83%B3%E3%82%BA%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-%E9%87%91%E5%8E%9F-%E3%81%B2%E3%81%A8%E3%81%BF/dp/4088652584?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4088652584', '読みたい', '★★★', '一回は読んでみたい', '2017-06-07 18:04:18'),
(30, 'https://images-fe.ssl-images-amazon.com/images/I/51p1PZPibxL._SL75_.jpg', '四月は君の嘘（１） (月刊少年マガジンコミックス)', '新川直司', 'https://www.amazon.co.jp/%E5%9B%9B%E6%9C%88%E3%81%AF%E5%90%9B%E3%81%AE%E5%98%98%EF%BC%88%EF%BC%91%EF%BC%89-%E6%9C%88%E5%88%8A%E5%B0%91%E5%B9%B4%E3%83%9E%E3%82%AC%E3%82%B8%E3%83%B3%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-%E6%96%B0%E5%B7%9D%E7%9B%B4%E5%8F%B8-ebook/dp/B00AF5PJOM?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00AF5PJOM', '読み終わった', '★★★★★', '最高', '2017-06-08 00:08:24'),
(32, 'https://images-fe.ssl-images-amazon.com/images/I/41T43dRdclL._SL75_.jpg', '砂漠 (新潮文庫)', '伊坂 幸太郎', 'https://www.amazon.co.jp/%E7%A0%82%E6%BC%A0-%E6%96%B0%E6%BD%AE%E6%96%87%E5%BA%AB-%E4%BC%8A%E5%9D%82-%E5%B9%B8%E5%A4%AA%E9%83%8E/dp/4101250251?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4101250251', '今読んでる', '★★★', '', '2017-06-08 18:44:03'),
(33, 'https://images-fe.ssl-images-amazon.com/images/I/51wBEcbDH7L._SL75_.jpg', '騎士団長殺し :第1部 顕れるイデア編', '村上 春樹', 'https://www.amazon.co.jp/%E9%A8%8E%E5%A3%AB%E5%9B%A3%E9%95%B7%E6%AE%BA%E3%81%97-%E7%AC%AC1%E9%83%A8-%E9%A1%95%E3%82%8C%E3%82%8B%E3%82%A4%E3%83%87%E3%82%A2%E7%B7%A8-%E6%9D%91%E4%B8%8A-%E6%98%A5%E6%A8%B9/dp/410353432X?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=410353432X', '読みたい', '★★★', 'タイトルから既に惹かれる', '2017-06-10 23:03:48'),
(34, 'https://images-fe.ssl-images-amazon.com/images/I/41yVq-uflrL._SL75_.jpg', '蹴りたい背中 (河出文庫)', '綿矢 りさ', 'https://www.amazon.co.jp/%E8%B9%B4%E3%82%8A%E3%81%9F%E3%81%84%E8%83%8C%E4%B8%AD-%E6%B2%B3%E5%87%BA%E6%96%87%E5%BA%AB-%E7%B6%BF%E7%9F%A2-%E3%82%8A%E3%81%95/dp/4309408419?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4309408419', '積読', '★★', '当時完読できなかった作品。蹴りたい背中は事実ある。', '2017-06-10 23:05:14');

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
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
