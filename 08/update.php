<?php
////////////////////////////////////////
// detail.phpから連携するアプデ用のページ //
////////////////////////////////////////


echo ' アップデート用のページです';
if (isset($_POST['update'])) {
	echo $_POST['update'];
	}
//ここがうまくデータがわたせていない！
if (isset($_POST['status'])) {
	echo $_POST['status'];
}

if (isset($_POST['evaluate'])) {
	echo $_POST['evaluate'];
}

if (isset($_POST['comment'])) {
	echo $_POST['comment'];
}

$update_id = $_POST['update'];
$update_status = $_POST['status'];
$update_evaluate = $_POST['evaluate'];
$update_comment = $_POST['comment'];

//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db06;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$update = $pdo->prepare("UPDATE booklog SET status=:status,
evaluate=:evaluate, comment=:comment WHERE id=:id");

$update ->bindValue(':status', $update_status, PDO::PARAM_STR);
$update ->bindValue(':evaluate', $update_evaluate , PDO::PARAM_STR);
$update ->bindValue(':comment', $update_comment , PDO::PARAM_STR);
$update ->bindValue(':id', $update_id , PDO::PARAM_INT);

$status = $update->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  // ５．select.phpへリダイレクト
  header("Location: select.php"); //Locationの後必ず半角スペースが必要
  exit;

}

?>

