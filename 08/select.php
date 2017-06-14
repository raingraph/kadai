<?php
/////////////////
// My本棚ページ //
/////////////////

// DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db06;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

// データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM booklog");
$status = $stmt->execute();

// データ表示
$view=""; // 初期化
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
    $view .= '<tr>';
    $view .= '<th class="mdl-data-table__cell--non-numeric"></th>';
    $view .= '<th class="mdl-data-table__cell--non-numeric">画像</th>';
    $view .= '<th class="mdl-data-table__cell--non-numeric">書籍/著者名</th>';
    $view .= '<th class="mdl-data-table__cell--non-numeric">ステータス</th>';
    $view .= '<th class="mdl-data-table__cell--non-numeric">評価</th>';
    $view .= '<th class="mdl-data-table__cell--non-numeric">コメント</th>';
    // $view .= '<th class="mdl-data-table__cell--non-numeric">入力日時</th>';
    $view .= '</tr>';

  // Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<tr>';
    // 削除実行ボタン
    $view .= '<form action=delete.php method=post><td class="mdl-data-table__cell--non-numeric"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" value="'.$result["id"].'" name="delete" id="delete_'.$result["id"].'">削除</button></td></form>';
    $view .= '<td class="mdl-data-table__cell--non-numeric">'.'<a href="'.$result["url"].' " target="_blank">'.'<img src="'.$result["img"].'">'.'</td>';
    // 編集実行
    $view .= '<td class="mdl-data-table__cell--non-numeric">'.'<a href="detail.php?id='.$result["id"].' " >'.$result["bookname"].'</a><br>'.$result["author"].'</td>';
    $view .= '<td class="mdl-data-table__cell--non-numeric">'.$result["status"].'</td>';
    $view .= '<td class="mdl-data-table__cell--non-numeric">'.$result["evaluate"].'</td>';
    $view .= '<td class="mdl-data-table__cell--non-numeric">'.$result["comment"].'</td>';
    $view .= '</tr>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
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
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div width="100%">
    <table class="mdl-data-table mdl-js-data-table" width="100%" style="word-break:break-all;""><?= $view ?></table>
</div>
<input id="php_id" type="hidden" value="<?php echo $result["id"]; ?>">
<!-- Main[End] -->

</body>
</html>
