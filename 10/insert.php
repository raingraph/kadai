<?php
session_start();
//0.外部ファイル読み込み
include("functions.php");
//1. POSTデータ取得
$lid = $_SESSION['lid'];
$img      = $_POST['img'];
$bookname = $_POST['bookname'];
$author   = $_POST['author'];
$url      = $_POST['url'];
$status   = $_POST['status'];
$evaluate = $_POST['evaluate'];
$comment  = $_POST['comment'];

//入力チェック(受信確認処理追加)
if(
  // !isset($_POST["name"]) || $_POST["name"]=="" ||
  // !isset($_POST["email"]) || $_POST["email"]=="" ||
  // !isset($_POST["naiyou"]) || $_POST["naiyou"]==""
	// !isset($img) || $img=="" ||
	!isset($bookname) || $bookname=="" ||
	!isset($status) || $status=="" ||
	!isset($evaluate) || $evaluate==""
)

{
  exit('ParamError');
}

//1. POSTデータ取得
// $img      = $_POST['img'];
// $bookname = $_POST['bookname'];
// $author   = $_POST['author'];
// $url      = $_POST['url'];
// $status   = $_POST['status'];
// $evaluate = $_POST['evaluate'];
// $comment  = $_POST['comment'];


//2. DB接続します(エラー処理追加)
$pdo = db_con();

// データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO booklog(id, lid, img, bookname, author, url, status, evaluate, comment,
indate )VALUES(NULL,:lid, :img, :bookname, :author, :url, :status, :evaluate, :comment, sysdate())");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
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
