<?php
session_start();
include("functions.php");

//パラメータチェック
if(
  !isset($_POST["user_mail"]) || $_POST["user_mail"]=="" ||
  !isset($_POST["user_pass"]) || $_POST["user_pass"]==""
  )
{
  header("Location: login.php");
  exit();
}

//1. 接続します
$pdo = db_con();

//３．データ登録SQL作成
$sql="SELECT * FROM user_table WHERE user_mail=:user_mail AND user_pass=:user_pass ";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_mail', $_POST["user_mail"]);
$stmt->bindValue(':user_pass', $_POST["user_pass"]);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
    queryError($stmt);
}

//５．抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//6. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  $_SESSION["schk"] = session_id();
  $_SESSION["user_id"]=$val["user_id"];
  header("Location: mypage.php");
}else{
  //logout処理を経由して全画面へ
  header("Location: login.php");
}
exit();
?>

