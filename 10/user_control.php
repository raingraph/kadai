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
    $view_user .= '<tr>';
    $view_user .= '<th class="mdl-data-table__cell--non-numeric"></th>';
    $view_user .= '<th class="mdl-data-table__cell--non-numeric">ユーザ名</th>';
    $view_user .= '<th class="mdl-data-table__cell--non-numeric">User ID</th>';
    $view_user .= '<th class="mdl-data-table__cell--non-numeric">Password</th>';
    $view_user .= '<th class="mdl-data-table__cell--non-numeric">管理フラグ</th>';
    // $view .= '<th class="mdl-data-table__cell--non-numeric">入力日時</th>';
    $view_user .= '</tr>';
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view_user .= '<tr>';
    $view_user .= '<td class="mdl-data-table__cell--non-numeric"><a href="delete_user.php?id='.$result["id"].'">[削除]</a></td>';
    $view_user .= '<td class="mdl-data-table__cell--non-numeric">'.h($result["name"]).'</td>';
    $view_user .= '<td class="mdl-data-table__cell--non-numeric">'.h($result["lid"]).'</td>';
    $view_user .= '<td class="mdl-data-table__cell--non-numeric">'.h($result["lpw"]).'</td>';
    $view_user .= '<td class="mdl-data-table__cell--non-numeric">'.h($result["kanri_flg"]).'</td>';
    $view_user .= '</tr>';

    // $view_user .= '<td class="mdl-data-table__cell--non-numeric">'.h($result["name"])."[UserID:".h($result["lid"])."]"."[Password:".h($result["lpw"]."]"."[管理flg:".h($result["kanri_flg"])."]").'</td>';

    // if($_SESSION["kanri_flg"] == "1"){
    //   $view_user .= '<td class="mdl-data-table__cell--non-numeric">'.'<a href="delete_user.php?id='.$result["id"].'">'.'</td>';
    //   $view_user .= '<td class="mdl-data-table__cell--non-numeric">'.'[削除]'.'</td>';
    //   $view_user .= '<td class="mdl-data-table__cell--non-numeric">'.'</a>'.'</td>';
    // }
    // $view_user .= '<tr>';

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
      <a class="navbar-brand" href="index.php">HOME</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>

    <div class="container jumbotron">
    <table class="mdl-data-table mdl-js-data-table" width="100%" style="word-break:break-all;"">
    <?=$view_user?>
    </table>
    </div>
  </div>
</div>
<!-- Main[End] -->



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
