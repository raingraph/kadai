<?php
////////////////////
// ブクマ実行ページ //
////////////////////


// POSTデータ取得
$img      = $_POST['img'];
$bookname = $_POST['bookname'];
$author   = $_POST['author'];
$url      = $_POST['url'];
$status   = $_POST['status'];
$evaluate = $_POST['evaluate'];
$comment  = $_POST['comment'];


// DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db06;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


// データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO booklog(id, img, bookname, author, url, status, evaluate, comment,
indate )VALUES(NULL,:img, :bookname, :author, :url, :status, :evaluate, :comment, sysdate())");
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':status', $status, PDO::PARAM_STR);
$stmt->bindValue(':evaluate', $evaluate, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
//Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

// データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  // select.phpへリダイレクト
  header("Location: select.php"); //Locationの後必ず半角スペースが必要
  exit;

}
?>
