<?php
// echo "ユーザ管理画面";
session_start();
//0.外部ファイル読み込み
include("functions.php");
sessChk();

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view_user="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view_user .= '<p>';
    $view_user .= h($result["name"])."[UserID:".h($result["lid"])."]"."[Password:".h($result["lpw"]."]"."[管理flg:".h($result["kanri_flg"])."]");

    if($_SESSION["kanri_flg"] == "1"){
      $view_user .= '<a href="delete_user.php?id='.$result["id"].'">';
      $view_user .= '[削除]';
      $view_user .= '</a>';
    }
    $view_user .= '</p>　';

    // if($_SESSION["kanri_flg"] == "1"){
    //   $view_user .= '<a href="delete.php?id='.$result["id"].'">';
    //   $view_user .= '[削除]';
    //   $view_user .= '</a>';
    }
  }



?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザ管理画面</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
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
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view_user?></div>
  </div>
</div>
<!-- Main[End] -->

</body>
</html>