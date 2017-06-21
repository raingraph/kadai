<?php
include("functions.php");
//1.POSTでParamを取得
// $id = $_GET["id"];
$del_id = $_POST['delete'];

//2.DB接続など
$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("DELETE FROM booklog WHERE id=:id");
$stmt->bindValue(':id',$del_id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  header("Location: select.php");
  exit;
}

?>
