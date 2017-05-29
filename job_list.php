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
<title>マイページ</title>
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
      <li class="nav_item"><a href="QA.php">QA</a></li>
      <li class="nav_item"><a href="job_list.php">仕事を探す</a></li>
      <li class="nav_item"><a href="joborder.php">仕事を依頼する</a></li>
      <li class="nav_item"><a href="mypage.php">マイページ</a></li>
    </ul>
    </nav>
  </div>
</header>


<!--仕事一覧ー-->
<div class="container">
  <div class="jobboard-wrapper">
    <h2>新着のお仕事</h2>

<table class="jobtable">
  <tr>
  <th>依頼タイトル</th>
  <th>依頼内容</th>
  <th>報酬</th>
  <th>納期</th>
  </tr>

  <div class="container jumbotron"><?=$view?></div>

</table>


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