<?php

// エスケープ用. htmlspecialcharsが長いので書き換え
function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/poll.php');

  $poll = new \MyApp\Poll();

$results = $poll->getResults();

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
            <!-- <p class="mt"><button type="button" class="btn btn-cta btn-lg">LEARN MORE</button></p> -->
        </div>
      </div>
      </div>
    </div>
  <h1>結果は...</h1>
        <?php for ($i = 0; $i < 2; $i++) : ?>
      <div class="box" id="box_<?= h($i); ?>"><?= h($results[$i]); ?></div>
      <?php endfor; ?>
    </div>
    <br><br>
    <a href="/"><div id="btn">戻る</div></a>
</body>
</html>