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
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My本棚</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Facebook and Twitter integration -->
<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="favicon.ico">

<!-- Google Webfont -->
  <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'> -->
  <!-- Themify Icons -->
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- Superfish -->
  <link rel="stylesheet" href="css/superfish.css">
  <!-- Easy Responsive Tabs -->
  <link rel="stylesheet" href="css/easy-responsive-tabs.css">
  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>

  <style>div{padding: 10px;font-size:16px;}</style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<header>
<div>
  <p><?=$_SESSION["name"];?>さん、こんにちは</p>
</div>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">HOME</a>
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



<body>


 

    <footer role="contentinfo" id="fh5co-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 footer-box">
            <h3 class="fh5co-footer-heading">Company</h3>
            <ul class="fh5co-footer-links">
              <li><a href="#">About</a></li>
              <li><a href="#">Services</a></li>
            </ul>

          </div>
          <div class="col-md-4 col-sm-6 footer-box">
            <h3 class="fh5co-footer-heading">More Links</h3>
            <ul class="fh5co-footer-links">
              <li><a href="#">Support &amp; FAQ's</a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-12 footer-box">
            <h3 class="fh5co-footer-heading">Get in touch</h3>
            <ul class="fh5co-social-icons">

              <li><a href="#"><i class="ti-google"></i></a></li>
              <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
              <li><a href="#"><i class="ti-facebook"></i></a></li>  
              <li><a href="#"><i class="ti-instagram"></i></a></li>
              <li><a href="#"><i class="ti-dribbble"></i></a></li>
            </ul>
          </div>
          <div class="col-md-12 footer-box text-center">
            <div class="fh5co-copyright">
            <p>&copy; 2017 XXXXXXXXXX. All Rights Reserved. <br>Designed by <a href="#" target="_blank">XXXXXXXXXX</a> Images by: <a href="#" target="_blank">XXXXXXXX</a></p>
            </div>
          </div>
        </div>
        <!-- END row -->
        <div class="fh5co-spacer fh5co-spacer-md"></div>
      </div>
    </footer>


    <!-- jQuery -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.js"></script>
    <!-- Owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Superfish -->
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.js"></script>
    <!-- Easy Responsive Tabs -->
    <script src="js/easyResponsiveTabs.js"></script>
    <!-- FastClick for Mobile/Tablets -->
    <script src="js/fastclick.js"></script>
    <!-- Parallax -->
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>

</body>
</html>


<!-- <!DOCTYPE html>
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
<body id="main"> -->
<!-- Head[Start] -->

<!-- Main[End] -->

</body>
</html>
