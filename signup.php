<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新規会員登録</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <script src="js/jquery-2.1.0.min.js"></script>
</head>
<body>

<!--ヘッダーー-->
<header>
  <div class="container">
      <div class="header-left">
        <a href="index.php"> <img class="logo" src="image/logo-orange.png"></a>
      </div>
  </div>
</header>



<!--会員登録ー-->


<div class="container">
  <div class="signup-wrapper">
  <h2>新規会員登録</h2>

    <form class="form-horizontal" action="signup_act.php" method="post">
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">ユーザー名</label>
        <div class="col-sm-10">
          <input type="text" name="user_name" class="form-control" id="inputPassword3" placeholder="例）taro1234">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">メールアドレス</label>
        <div class="col-sm-10">
          <input type="email" name="user_mail" class="form-control" id="inputEmail3" placeholder="例）info@giftmatch.co.jp">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">パスワード</label>
        <div class="col-sm-10">
          <input type="password" name="user_pass" class="form-control" id="inputPassword3" placeholder="例）jhiuy-123">
        </div>
      </div>
      <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
           <div class="checkbox">
             <label>
               <input type="checkbox"> 会員情報を記憶する
             </label>
           </div>
         </div>
      </div>
      <div class="form-group">
        <div class="btn-wrapper">
          <input type="submit" value="アカウント登録" class="btn signup">
        </div>
      </div>
    </form>

  <div class="comment">
    <p>すでに登録済の方は</p><a href="login.php">ログイン</a>
  </div>

  </div>
</div>



<!--フッターー-->
<footer>
  <div class="container">
    <p>copyright (c) GiftMatch all rights reserved.</p>
  </div>
</footer>


</body>
</html>
