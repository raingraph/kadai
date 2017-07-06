<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/login.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>




<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4>Welcome back.</h4>
            <form name="form1" action="login_act.php" method="post">
            <input type="text" name="lid" id="userName" class="form-control input-sm chat-input" placeholder="ID" />
            </br>
            <input type="password" name="lpw" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
            </br>
            <div class="wrapper">
            <input type="submit" value="LOGIN" />
            </div>
            </div>
        	</form>
        </div>
    </div>
</div>




<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<!-- <form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form> -->


</body>
</html>