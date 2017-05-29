<?php
session_start();
include("functions.php");
ssidCheck(); //セッションチェック

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM job_table ORDER BY JOB_ID DESC");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<tr><td>';
    $view .= '<a href="job_detail.php?job_id='.$result["job_id"].'">';
    $view .= h($result["job_title"]);
    $view .= '</a></td>';
    $view .= '<td>';
    $view .= h($result["job_naiyou"]);
    $view .= '</td>';
    $view .= '<td>';
    $view .= h($result["job_money"]);
    $view .= '</td>';
    $view .= '<td>';
    $view .= h($result["job_dead_line"]);
    $view .= '</td></tr>';
  }
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



<!--仕事入力ー-->

<div class="container">
  <div class="joborder-wrapper">
  <h2>仕事を依頼する</h2>
  <h3>お願いしたい仕事の内容を入力しましょう！</h3>


    <form class="form-horizontal" action="joborder_act.php" method="post">
      <div class="form-group">
        <label class="col-sm-2 control-label">タイトル</label>
        <div class="col-sm-10">
          <input type="text" name="job_title" class="form-control"  placeholder="例）データ解析の仕事">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">カテゴリ</label>
        <div class="chkbox_list">
          <input type="checkbox" name="job_category" value="1" >ビジネス・サイト運営
          <input type="checkbox" name="job_category" value="2" >データ解析
          <input type="checkbox" name="job_category" value="3" >Webデザイン
          <input type="checkbox" name="job_category" value="4" >デザイン
          <br>
          <input type="checkbox" name="job_category" value="5" >コピー・アイデア
          <input type="checkbox" name="job_category" value="6" >ライティング・記事作成
          <input type="checkbox" name="job_category" value="7" >取材・写真・動画
        </div>
      </div>


      <div class="form-group">
        <label class="col-sm-2 control-label">仕事内容</label>
        <div class="col-sm-10">
          <input type="text" name="job_naiyou" class="form-control form-large" placeholder="例）ECサイトのデータ解析と課題の分析をお願いしたいです。">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">希望報酬</label>
        <div class="col-sm-10">
          <input type="text" name="job_money" class="form-control"  placeholder="例）一式20000円">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">希望納期</label>
        <div class="col-sm-10">
          <input type="text" name="job_dead_line" class="form-control" placeholder="例）8月1日まで">
        </div>
      </div>

      <div class="form-group">
        <div class="btn-wrapper">
          <input type="submit" value="仕事を依頼" class="btn pink">
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