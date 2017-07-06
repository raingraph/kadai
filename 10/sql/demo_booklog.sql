-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 6 月 22 日 00:03
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
-- テーブルの構造 `demo_booklog`
--

CREATE TABLE IF NOT EXISTS `demo_booklog` (
  `id` int(12) NOT NULL DEFAULT '0',
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci,
  `bookname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `status` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `evaluate` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL,
`key` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `demo_booklog`
--

INSERT INTO `demo_booklog` (`id`, `lid`, `img`, `bookname`, `author`, `url`, `status`, `evaluate`, `comment`, `indate`, `key`) VALUES
(29, '', 'https://images-fe.ssl-images-amazon.com/images/I/31JFYXK07GL._SL75_.jpg', '蛇にピアス (クイーンズコミックス)', '金原 ひとみ', 'https://www.amazon.co.jp/%E8%9B%87%E3%81%AB%E3%83%94%E3%82%A2%E3%82%B9-%E3%82%AF%E3%82%A4%E3%83%BC%E3%83%B3%E3%82%BA%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-%E9%87%91%E5%8E%9F-%E3%81%B2%E3%81%A8%E3%81%BF/dp/4088652584?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4088652584', '読み終わった', '★★★★★', 'あの蛇にピアスのコミック化です。 どんなどろどろした内容になるかと思いきや、プロとしては初コミック という渡辺ペコさんがさらっと書いています。  性描写も初めてという彼女の絵と、小説とは違った台詞やモチーフや キャラの追加が、ピタリとはまっており、金原ひとみの作品とはまた別に 文学的に思えます。  一読の価値があると思います。', '2017-06-07 18:04:18', 1),
(38, '', 'https://images-fe.ssl-images-amazon.com/images/I/41jJfO3l7EL._SL75_.jpg', 'チルドレン (講談社文庫)', '伊坂 幸太郎', 'https://www.amazon.co.jp/%E3%83%81%E3%83%AB%E3%83%89%E3%83%AC%E3%83%B3-%E8%AC%9B%E8%AB%87%E7%A4%BE%E6%96%87%E5%BA%AB-%E4%BC%8A%E5%9D%82-%E5%B9%B8%E5%A4%AA%E9%83%8E/dp/4062757249?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4062757249', '読み終わった', '★★', ' 陣内、陣内、陣内、‼︎笑 小説を読みながらここまで笑ったのは初めてです。 とにかく彼の世界観はキレッキレでエグくてスゴい。  虚構の世界の登場人物なのに、 まるですぐそこにいるような。 そんな不思議な親近感を抱かずにはいられない。  本を閉じたあと、みんなが日常に戻って何かと闘い、闇と対峙せねばならない。 当たり前に据えられた現実と肩を組んで歩けたら御の字です。  私にとってこの作品は、 日常の壁を壊すひとつの突破口になりました。', '2017-06-13 22:15:07', 2),
(39, '', 'https://images-fe.ssl-images-amazon.com/images/I/5181BF5ZJ1L._SL75_.jpg', 'オーデュボンの祈り (新潮文庫)', '伊坂 幸太郎', 'https://www.amazon.co.jp/%E3%82%AA%E3%83%BC%E3%83%87%E3%83%A5%E3%83%9C%E3%83%B3%E3%81%AE%E7%A5%88%E3%82%8A-%E6%96%B0%E6%BD%AE%E6%96%87%E5%BA%AB-%E4%BC%8A%E5%9D%82-%E5%B9%B8%E5%A4%AA%E9%83%8E/dp/4101250219?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4101250219', '読みたい', '★★★', 'まずは登場人物が多すぎる。 案山子の優午が殺されその後も殺人事件がおきるが、？？？こんな人物いたっけ？って 読み直す始末（笑）  これならアヒルと鴨のコインロッカー、 死神の精度の方が何倍も面白い！', '2017-06-13 22:31:11', 3),
(46, '', 'https://images-fe.ssl-images-amazon.com/images/I/6130cLPgb0L._SL75_.jpg', 'ぐるぐる♡博物館', '三浦 しをん', 'https://www.amazon.co.jp/%E3%81%90%E3%82%8B%E3%81%90%E3%82%8B%252661%E5%8D%9A%E7%89%A9%E9%A4%A8-%E4%B8%89%E6%B5%A6-%E3%81%97%E3%82%92%E3%82%93/dp/4408537071?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4408537071', '今読んでる', '★★★★', '毎日小学生新聞などで紹介されていたので、 子供と行く博物館選びに良いのかなと思って買ってみたのだが まったく子供向けではなく、大人のエッセー集のようなものだった。  作者の作品は好きだけどね。今回はしくじった。 勝手に勘違いした自分が悪いのだけど・・・ 自分用としてじっくり読んでみる。', '2017-06-20 22:54:55', 4),
(47, '', 'https://images-fe.ssl-images-amazon.com/images/I/51u%2BIkvz3AL._SL75_.jpg', '神様のバレー 13 (芳文社コミックス)', '西崎泰正', 'https://www.amazon.co.jp/%E7%A5%9E%E6%A7%98%E3%81%AE%E3%83%90%E3%83%AC%E3%83%BC-13-%E8%8A%B3%E6%96%87%E7%A4%BE%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-%E8%A5%BF%E5%B4%8E%E6%B3%B0%E6%AD%A3/dp/4832235478?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=4832235478', '読み終わった', '★★★★★', 'かなり面白いです。 バレーボール漫画でここまでいい作品は見たことがありません。 なぜか知名度が低い気がしますが、じつは新刊をかなり楽しみにしている作品です。', '2017-06-20 23:03:01', 5),
(48, 'test1', 'https://images-fe.ssl-images-amazon.com/images/I/51AvRbVdAsL._SL75_.jpg', '改訂新版JavaScript本格入門 ~モダンスタイルによる基礎から現場での応用まで', '山田 祥寛', 'https://www.amazon.co.jp/%E6%94%B9%E8%A8%82%E6%96%B0%E7%89%88JavaScript%E6%9C%AC%E6%A0%BC%E5%85%A5%E9%96%80-~%E3%83%A2%E3%83%80%E3%83%B3%E3%82%B9%E3%82%BF%E3%82%A4%E3%83%AB%E3%81%AB%E3%82%88%E3%82%8B%E5%9F%BA%E7%A4%8E%E3%81%8B%E3%82%89%E7%8F%BE%E5%A0%B4%E3%81%A7%E3%81%AE%E5%BF%9C%E7%94%A8%E3%81%BE%E3%81%A7-%E5%B1%B1%E7%94%B0-%E7%A5%A5%E5%AF%9B/dp/477418411X?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=477418411X', '読みたい', '★★★', '他の方も書かれている通り、ここまで詳細に書かれたjavascript本は無い！と思ったので購入しました。永久保存版として書籍ではなくKindleで。これを教科書として、狩野さんの入門書を参考書として勉強しています。 星を１つ減らしたのは《入門書》というタイトルの付け方が明らかに間違っているため。初心者向けではありません。', '2017-06-20 23:05:08', 6),
(49, 'inoue', 'https://images-fe.ssl-images-amazon.com/images/I/61q%2BAteQVjL._SL75_.jpg', 'いいよね！米澤先生 5 (ジャンプコミックスDIGITAL)', '地獄のミサワ', 'https://www.amazon.co.jp/%E3%81%84%E3%81%84%E3%82%88%E3%81%AD%EF%BC%81%E7%B1%B3%E6%BE%A4%E5%85%88%E7%94%9F-5-%E3%82%B8%E3%83%A3%E3%83%B3%E3%83%97%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9DIGITAL-%E5%9C%B0%E7%8D%84%E3%81%AE%E3%83%9F%E3%82%B5%E3%83%AF-ebook/dp/B06ZZYSGKX?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B06ZZYSGKX', '読み終わった', '★★★★', '面白いよ', '2017-06-20 23:10:48', 7),
(50, 'inoue', 'https://images-fe.ssl-images-amazon.com/images/I/51E0uVrgSYL._SL75_.jpg', 'カッコカワイイ宣言! コミック 全5巻完結セット (ジャンプコミックス)', '地獄のミサワ', 'https://www.amazon.co.jp/%E3%82%AB%E3%83%83%E3%82%B3%E3%82%AB%E3%83%AF%E3%82%A4%E3%82%A4%E5%AE%A3%E8%A8%80-%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF-%E5%85%A85%E5%B7%BB%E5%AE%8C%E7%B5%90%E3%82%BB%E3%83%83%E3%83%88-%E3%82%B8%E3%83%A3%E3%83%B3%E3%83%97%E3%82%B3%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-%E5%9C%B0%E7%8D%84%E3%81%AE%E3%83%9F%E3%82%B5%E3%83%AF/dp/B00IWM2CVI?SubscriptionId=AKIAIDRXMBAVWKGARRGA&tag=raingraph08-22&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00IWM2CVI', '読みたい', '★★★', '女子のパワーがすごい', '2017-06-20 23:24:31', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demo_booklog`
--
ALTER TABLE `demo_booklog`
 ADD PRIMARY KEY (`key`), ADD UNIQUE KEY `key` (`key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demo_booklog`
--
ALTER TABLE `demo_booklog`
MODIFY `key` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
