<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include("functions.php");
// sessChk();

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

$login_link  = "";
$signup_link = "";
$logout_link = "";
$data_select = "";
$welcome_message = "";

// ログインしていない状態で表示するリンク
if($_SESSION["lid"] == ""){
  $login_link .= '<a href="login.php">';
  $login_link .= 'ログイン';
  $login_link .= '</a>';

  $signup_link .= '<a href="signup.php">';
  $signup_link .= '新規登録';
  $signup_link .= '</a>';
}

// ログインしている状態で表示するリンク
if(!$_SESSION["lid"] == ""){
  $login_link .= '<a href="logout.php">';
  $login_link .= 'ログアウト';
  $login_link .= '</a>';

  $data_select .= '<a href="select.php">';
  $data_select .= 'マイ本棚';
  $data_select .= '</a>';

  $welcome_message .= $_SESSION["name"].'さん、こんにちは！';
}

// デモ用DB
$pdo_demo = db_con();
$stmt_demo = $pdo_demo->prepare("SELECT * FROM demo_booklog");
$status_demo = $stmt_demo->execute();

$view=""; // 初期化
$i = 0;
$bookname_demo = array();
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt_demo->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while($result_demo = $stmt_demo->fetch()){
    $img_demo[] = $result_demo["img"];
    $bookname_demo[] = $result_demo["bookname"];
    $author_demo[] = $result_demo["author"];
    $comment_demo[] = $result_demo["comment"];
  }
}
// var_dump($bookname_demo[0]);
// echo $bookname_demo[0];

?>



<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BOOK! Bookmark</title>
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
</head>

<body>
  <header id="fh5co-header-section" role="header" class="" >
    <div class="container">
        <h1 id="fh5co-logo" class="pull-left" style="color:#fff;"><?= $welcome_message;　?></h1>
        <nav id="fh5co-menu-wrap" role="navigation">
          <ul class="sf-menu" id="fh5co-primary-menu">
            <li class="active"><a href="index.php">Home</a></li>
            <li><?= $data_select ?></li>
            <li><?= $signup_link ?></li>
            <li><?= $login_link ?></li>
            <li><?= $logout_link ?></li>
          </ul>
        </nav>
    </div>
  </header>


    <div id="fh5co-hero" style="background-image: url(images/lib.jpg);">
      <div class="overlay"></div>
      <a href="#fh5co-main" class="smoothscroll fh5co-arrow to-animate hero-animate-4"><i class="ti-angle-down"></i></a>
      <!-- End fh5co-arrow -->
      <div class="container">
        <div class="col-md-12">
          <div class="fh5co-hero-wrap">
            <div class="fh5co-hero-intro">
              <h1 class="to-animate hero-animate-1">好きな本をブックマークしよう！</h1>
              <h2 class="to-animate hero-animate-1">Created by Gs</h2>
<!--               <p class="to-animate hero-animate-3"><a href="signup.php" class="btn btn-outline btn-md">Sign up</a></p> -->
              <p class="to-animate hero-animate-2">好きな本や作家をとことんブックマークして<br>あなただけの本棚を作ろう！
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="fh5co-main">
      <div class="fh5co-cards">
        <div class="container-fluid">
          <div class="row animate-box">
            <div id="search_box" class="col-md-12 heading text-center">
              <form action="amasearch.php" method="GET">
                <input name="search_bname" placeholder="作品・著者名で検索" />
                <input type="submit" value="search"/>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row text-center" id="fh5co-features">
        <div class="col-md-12 heading animate-box"><h2>人気のブックマークレビュー</h2></div>
        <div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box">
          <div class="fh5co-feature-icon">
            <img src="<?= $img_demo[0] ?>">
          </div>
          <h3 class="heading"><?= $bookname_demo[0] ?><br><?= $author_demo[0]?></h3>
          <p><?= $comment_demo[0] ?></p>
        </div>
        <div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box">
          <div class="fh5co-feature-icon">
            <img src="<?= $img_demo[1] ?>">
          </div>
          <h3 class="heading"><?= $bookname_demo[1] ?><br><?= $author_demo[1]?></h3>
          <p><?= $comment_demo[1] ?></p>
        </div>

        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box">
          <div class="fh5co-feature-icon">
            <img src="<?= $img_demo[2] ?>">
          </div>
          <h3 class="heading"><?= $bookname_demo[2] ?><br><?= $author_demo[2]?></h3>
          <p><?= $comment_demo[2] ?></p>
        </div>

        <div class="clearfix visible-md-block visible-lg-block"></div>
        <div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box">
          <div class="fh5co-feature-icon">
            <img src="<?= $img_demo[3] ?>">
          </div>
          <h3 class="heading"><?= $bookname_demo[3] ?><br><?= $author_demo[3]?></h3>
          <p><?= $comment_demo[3] ?></p>
        </div>

        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box">
          <div class="fh5co-feature-icon">
            <img src="<?= $img_demo[4] ?>">
          </div>
          <h3 class="heading"><?= $bookname_demo[4] ?><br><?= $author_demo[4]?></h3>
          <p><?= $comment_demo[4] ?></p>
        </div>
        <div class="col-md-4 col-sm-6 text-center fh5co-feature feature-box">
          <div class="fh5co-feature-icon">
            <img src="<?= $img_demo[5] ?>">
          </div>
          <h3 class="heading"><?= $bookname_demo[5] ?><br><?= $author_demo[5]?></h3>
          <p><?= $comment_demo[5] ?></p>
        </div>
      </div>
    </div>

    <footer role="contentinfo" id="fh5co-footer">
      <a href="#" class="fh5co-arrow fh5co-gotop footer-box"><i class="ti-angle-up"></i></a>
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
    <script src="js/jquery.parallax-scroll.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>

</body>
</html>
