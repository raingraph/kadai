# 概要

書籍名または著者名の検索結果から、必要な情報をDBへ登録してブックマークできるサイト
（Amazon Web APIを利用）

## 説明

- トップページまたはマイ本棚（ブックマーク確認ページ）の検索バーに書籍名または著者名を入力して検索を実行すると、Amazon Web APIを利用して検索結果が表示される。
- ブックマークしたい書籍の評価,ステータス(読んだかどうか),コメントを追加して送信するとDBに情報が格納される。
- sign-up,sign-inの機能あり。ログインした状態では個別のブックマークページが利用できる


## 特徴

- Amazon web API

## 使用方法

1. Amazon web APIのAWSAccessKeyId,AWSSecretKey,AssociateTagを取得する
   [取得方法の参考ページ](https://www.ajaxtower.jp/ecs/pre/index1.html)
2. requesturl.phpの10,13,24行目にそれぞれAccessKeyId,AWSSecretKey,AssociateTagを入力して保存する
3. 準備OK
