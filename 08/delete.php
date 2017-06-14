<?php
//////////////////
// 削除実行ページ //
//////////////////


$del_id = $_POST['delete'];

// DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db06;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

// DELETE文を変数に格納
$sql = "DELETE FROM booklog WHERE id = :id";

// 削除するレコードのIDは空のまま、SQL実行の準備をする
$stmt = $pdo->prepare($sql);

// 削除するレコードのIDを配列に格納する
$params = array(':id'=>$del_id);

// 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
$stmt->execute($params);

// 削除完了のメッセージ
echo '削除完了しました';


?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>削除結果</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="select.php">My本棚</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->


</body>
</html>