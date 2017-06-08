<?php

// ブラウザ側でエラーを表示する
ini_set('display_errors', 1);

// DB接続
define('DSN', 'mysql:host=localhost;dbname=votesystem'); // 決まり文句
define('DB_USERNAME', 'XXXXXXXXX');   // DBのユーザーネーム
define('DB_PASSWORD', 'XXXXXXXXX'); // DBのパスワード

session_start();
