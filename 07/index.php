<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録(TOP)</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
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

<h2 id="top_message">好きな本を検索してブックマークしよう！</h2>
<!-- 書籍名や著者名の入力でAmazon APIから結果を戻す -->
<div id="search_box">
  <form action="amasearch.php" method="GET">
    <input name="search_bname" placeholder="作品・著者名で検索" />
    <input type="submit" value="search"/>
  </form>
</div>

</body>
</html>
