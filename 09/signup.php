<?php
echo 'ここは新規登録のページです';


?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insertuser.php">
  <div class="jumbotron">
   <fieldset>
    <legend>登録する</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>ユーザID：<input pattern="^[0-9A-Za-z]+$" name="lid" title="半角英数字でご入力ください。"></label><br>
     <label>パスワード：<input type="password" name="lpw"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

