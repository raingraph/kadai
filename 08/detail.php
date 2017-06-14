<?php
//////////////////
// 更新編集ページ //
//////////////////

// 変数の初期化
$status_checked0 = '';
$status_checked1 = '';
$status_checked2 = '';
$status_checked3 = '';
$status_checked4 = '';
$evaluate_checked0 = '';
$evaluate_checked1 = '';
$evaluate_checked2 = '';
$evaluate_checked3 = '';
$evaluate_checked4 = '';
$view="";

// 更新対象となるDB_idを取得(GET)
$id = $_GET["id"];


// DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db06;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

// SQLからGETで接続されたidのデータを取得する(SELECT文)
$stmt = $pdo->prepare("SELECT * FROM booklog WHERE id = $id");
$status = $stmt->execute();

// データ表示
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  // ステータス情報がどれにマッチするか
  switch($result["status"]){
  case '未設定':
    $status_checked0 = 'checked';
    break;
  case '読みたい':
    $status_checked1 = 'checked';
    break;
  case '今読んでる':
    $status_checked2 = 'checked';
    break;
  case '読み終わった':
    $status_checked3 = 'checked';
    break;
  case '積読':
    $status_checked4 = 'checked';
  }
  // 評価情報がどれにマッチするか
  switch($result["evaluate"]){
  case '★':
    $evaluate_checked0 = 'checked';
    break;
  case '★★':
    $evaluate_checked1 = 'checked';
    break;
  case '★★★':
    $evaluate_checked2 = 'checked';
    break;
  case '★★★★':
    $evaluate_checked3 = 'checked';
    break;
  case '★★★★★':
    $evaluate_checked4 = 'checked';
  }
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集画面</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">My本棚</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- My本棚に入れたい本をPOSTで送信する -->
<div style="background-color: #eee; margin-bottom: 20px;" width="400px" class="search_results">

<!-- POSTでデータをupdate.phpに送信する -->
<form method="post" action="update.php">
  <p><img src ="<?= $result["img"] ?>"></p>
  <p><?= $result["bookname"] ?></p>
  <p><?= $result["author"] ?></p>

  <!-- $idをhiddenで送信する -->
　<input type="hidden" name="update" value="<?= $id ?>"><br>
　<label>ステータス：<br>
	<input type="radio" name="status" value="未設定" <?= $status_checked0; ?>>未設定
	<input type="radio" name="status" value="読みたい" <?= $status_checked1; ?>>読みたい
	<input type="radio" name="status" value="今読んでる" <?= $status_checked2; ?>>今読んでる
	<input type="radio" name="status" value="読み終わった" <?= $status_checked3; ?>>読み終わった
	<input type="radio" name="status" value="積読" <?= $status_checked4; ?>>積読
  </label><br>
　<label>評価：<br>
	<input type="radio" name="evaluate" value="★" <?= $evaluate_checked0; ?> >★
	<input type="radio" name="evaluate" value="★★" <?= $evaluate_checked1; ?> >★★
	<input type="radio" name="evaluate" value="★★★" <?= $evaluate_checked2; ?> >★★★
	<input type="radio" name="evaluate" value="★★★★" <?= $evaluate_checked3; ?> >★★★★
	<input type="radio" name="evaluate" value="★★★★★" <?= $evaluate_checked4; ?> >★★★★★
  </label><br>
　<label>コメント：<br>
	<textArea name="comment" rows="4" cols="40"><?= $result["comment"] ?></textArea></label><br>
  <input type="submit" value="更新する"><br><br>
</form>
</div>


</body>
</html>
