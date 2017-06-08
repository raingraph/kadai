<!--
きのこ たけのこ 投票ページ
好きな方（画像）をクリックして投票すればMySQLにデータが1ずつカウントアップされ
結果を画像の上に文字として表示させる

 -->



<?php

// エスケープ用. htmlspecialcharsが長いので書き換え
function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

require_once(__DIR__ . '/config.php');  // DB接続
require_once(__DIR__ . '/poll.php');    // 色々な処理を格納

$poll = new \MyApp\Poll();  // インスタンス生成

// POSTで送られたらClass Pollのpostを実行する
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $poll->post();
}
$err = $poll->getError();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>voteSystem2</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/animations.css" rel="stylesheet">

</head>
<body>
  <?php if (isset($err)) : ?>
  <div class="error"><?= h($err); ?></div>
  <?php endif; ?>
      <div id="headerwrap">
      <div class="container">
      <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2 mt">
          <h1 class="animation slideDown">Your vote is important! Have your say!</h1>
        </div>
      </div>
      </div>
    </div>
  <h1>Which do you like?</h1>
  <form action="" method="post">
    <div class="row">
    <!-- 投票写真設置 -->
      <div class="box" id="box_0" data-id="0"></div>
      <div class="box" id="box_1" data-id="1"></div>
      <!-- <div class="box" id="box_2" data-id="2"></div> -->

      <!-- 画像クリックされたらその値をタグで保管する -->
      <input type="hidden" id="answer" name="answer" value="">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </div>
    <div id="btn">投票する</div>
  </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
  $(function() {

    // 写真を押した時の処理
    $('.box').on('click', function() {
      $('.box').removeClass('selected');     // 一旦selectedを破棄して全て半透明にする
      $(this).addClass('selected');          // 選ばれたものにselectedを付与して半透明を外す
      $('#answer').val($(this).data('id'));  // 選択された写真のIDをanswerに保存
    });

    // 結果ボタンを押した時の処理
    $('#btn').on('click', function() {
      if ($('#answer').val() === '') {
        alert('きのこを選んでください!');       // 写真を選んでいなかったらアラートを出す
      } else {
        $('form').submit();
      }
    });
  });
  </script>
</body>
</html>