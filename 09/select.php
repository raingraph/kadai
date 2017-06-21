<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");

sessChk();

$lid_ext = $_SESSION['lid'];
//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM booklog where lid = :lid_ext");
$stmt ->bindValue(':lid_ext', $lid_ext, PDO::PARAM_STR);
$status = $stmt->execute();


$control_link = "";
$login_link = "";

if($_SESSION["kanri_flg"] == "1"){
  $control_link .= '<a class="navbar-brand" href="user_control.php">';
  $control_link .= 'ユーザ管理画面';
  $control_link .= '</a>';
}

// ログインしている状態で表示するリンク
if(!$_SESSION["lid"] == ""){
  $login_link .= '<a class="navbar-brand" href="logout.php">';
  $login_link .= 'ログアウト';
  $login_link .= '</a>';
}

//３．データ表示
// $view="";
// if($status==false){
//   queryError($stmt);
// }else{
//   //Selectデータの数だけ自動でループしてくれる
//   while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
//     $view .= '<p>';
//     $view .= '<a href="detail.php?id='.$result["id"].'">';
//     $view .= h($result["name"])."[".h($result["indate"])."]";
//     $view .= '</a>　';

//     if($_SESSION["kanri_flg"] == "1"){
//       $view .= '<a href="delete.php?id='.$result["id"].'">';
//       $view .= '[削除]';
//       $view .= '</a>';
//     }
//     $view .= '</p>';
//   }
// }

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
<div>
  <p><?=$_SESSION["name"];?>さん、こんにちは</p>
</div>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      <?= $control_link;?>
      <?= $login_link;?>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

<div id="search_box">
もっとブックマークしよう！
  <form action="amasearch.php" method="GET">
    <input name="search_bname" placeholder="作品・著者名で検索" />
    <input type="submit" value="search"/>
  </form>
</div>
<div width="100%">
    <table class="mdl-data-table mdl-js-data-table" width="100%" style="word-break:break-all;""><?= $view ?></table>
</div>
<input id="php_id" type="hidden" value="<?php echo $result["id"]; ?>">
<!-- Main[End] -->

</body>
</html>
