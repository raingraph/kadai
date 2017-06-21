<!-- Amazon web APIから連携して検索結果を表示する -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>検索結果</title>
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

<?php
require_once(__DIR__ . '/requesturl.php');  // Amazon request URL作成

?>

<?php
  $count = 0;
  // リクエストURLからXMLを取得し、必要なデータのみ変数へ入力
  $amazon_xml=simplexml_load_string(file_get_contents($request_url));
  foreach($amazon_xml->Items->Item as $item) :
?>

<?php
    $item_title  = $item->ItemAttributes->Title;   // 商品名
    $item_author = $item->ItemAttributes->Author;  // 著者
    $item_image  = $item->MediumImage->URL;        // 商品画像(Medium):検索結果用
    $item_simage = $item->SmallImage->URL;         // 商品画像(Small):My本棚用
    $item_url    = $item->DetailPageURL;           // 商品へのURL
    $item_price  = $item->OfferSummary->LowestNewPrice->FormattedPrice; // 商品の価格
    $count++;
?>

<!-- My本棚に入れたい本をPOSTで送信する -->
<div style="background-color: #eee; margin-bottom: 20px;" width="400px" class="search_results">
<form method="post" action="insert.php">
  <p><a href="<?= $item_url ?>" target="_blank"><img src="<?= $item_image ?>"></a></p>
  <p id="title<?= $count ?>"><?= $item_title ?></p>
  <p id="author<?= $count ?>""><?= $item_author ?></p>

  <!-- POSTしたい送信データをhiddenで入れ込む -->
  <input type="hidden" name="img" value="<?= $item_simage ?>">
  <input type="hidden" name="bookname" value="<?= $item_title ?>">
  <input type="hidden" name="author" value="<?= $item_author ?>">
  <input type="hidden" name="url" value="<?= $item_url ?>">

     <label>ステータス：<br>
        <input type="radio" name="status" value="未設定">未設定
        <input type="radio" name="status" value="読みたい">読みたい
        <input type="radio" name="status" value="今読んでる">今読んでる
        <input type="radio" name="status" value="読み終わった">読み終わった
        <input type="radio" name="status" value="積読">積読
        <br>
     <label>評価：<br>
        <input type="radio" name="evaluate" value="★">★
        <input type="radio" name="evaluate" value="★★">★★
        <input type="radio" name="evaluate" value="★★★">★★★
        <input type="radio" name="evaluate" value="★★★★">★★★★
        <input type="radio" name="evaluate" value="★★★★★">★★★★★
        <br>
     <label>コメント：<br>
       <textArea name="comment" rows="4" cols="40"></textArea></label><br>
  <input type="submit" value="ブックマークする！"><br><br>
</form>
</div>

<?php
endforeach;
?>

</body>
</html>
