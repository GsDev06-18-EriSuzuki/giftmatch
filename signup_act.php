<?php
include("functions.php");
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["user_name"]) || $_POST["user_name"]=="" ||
  !isset($_POST["user_mail"]) || $_POST["user_mail"]=="" ||
  !isset($_POST["user_pass"]) || $_POST["user_pass"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$user_name   = $_POST["user_name"];
$user_mail  = $_POST["user_mail"];
$user_pass = $_POST["user_pass"];

//2. DB接続します(エラー処理追加)
$pdo = db_con();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gm_user_table(id, user_name, user_mail, user_pass )VALUES(NULL, :a1, :a2, :a3)");
$stmt->bindValue(':a1', $user_name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $user_mail,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $user_pass, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  queryError($stmt);

}else{
  //５．login.phpへリダイレクト
  header("Location: login.php");
  exit;
}
?>
