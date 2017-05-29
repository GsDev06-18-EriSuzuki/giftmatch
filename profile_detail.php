<?php
session_start();
include("functions.php");
ssidCheck();

//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続など
$pdo = db_con();

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM gm_user_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  $row = $stmt->fetch();
}

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>仕事を依頼する</title>
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
<!--ナビゲーションバー-->
  <div class="header-right">
    <nav class="global_Nav">
      <ul class="nav_wrap clearfix">
      <li class="nav_item"><a href="#">QA</a></li>
      <li class="nav_item"><a href="#">仕事を探す</a></li>
      <li class="nav_item"><a href="joborder.php">仕事を依頼する</a></li>
      <li class="nav_item"><a href="mypage.php">マイページ</a></li>
    </ul>
    </nav>
  </div>
</header>



<!--プロフィール詳細入力ー-->

<div class="container">
  <div class="profile_detail-wrapper">
  <h2>プロフィール詳細</h2>
  <h3>詳細プロフィールを入力しましょう！</h3>


<form class="form-horizontal" action="profile_update.php" method="post">
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">ユーザー名</label>
    <div class="col-sm-10">
      <input type="text" name="user_name" value="<?=$row["user_name"]?>" class="form-control" id="inputPassword3" placeholder="例）taro1234">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">メールアドレス</label>
    <div class="col-sm-10">
      <input type="email" name="user_mail" value="<?=$row["user_mail"]?>" class="form-control" id="inputEmail3" placeholder="例）info@giftmatch.co.jp">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">パスワード</label>
    <div class="col-sm-10">
      <input type="password" name="user_pass" value="<?=$row["user_pass"]?>" class="form-control" id="inputPassword3" placeholder="例）jhiuy-123">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">スキル</label>
    <div class="chkbox_list">
      <input type="checkbox" name="user_skil" value="1" >ビジネス・サイト運営
      <input type="checkbox" name="user_skil" value="2" >データ解析
      <input type="checkbox" name="user_skil" value="3" >Webデザイン
      <input type="checkbox" name="user_skil" value="4" >デザイン
      <br>
      <input type="checkbox" name="user_skil" value="5" >コピー・アイデア
      <input type="checkbox" name="user_skil" value="6" >ライティング・記事作成
      <input type="checkbox" name="user_skil" value="7" >取材・写真・動画
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">自己紹介</label>
    <div class="col-sm-10">
      <input type="text" name="user_profile" class="form-control" id="inputPassword3" placeholder="例）大学でデータサイエンスを勉強していました。データの解析が得意です。">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">求職状況</label>
    <div class="chkbox_list">
      <input type="radio" name="user_jobsearch_flg" value="1" >就職・転職を希望
      <input type="radio" name="user_jobsearch_flg" value="0" >就職・転職は考えていない
    </div>
  </div>

      <div class="form-group">
        <div class="btn-wrapper">
          <input type="submit" value="更新する" class="btn pink">
        </div>
      </div>
    </form>
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