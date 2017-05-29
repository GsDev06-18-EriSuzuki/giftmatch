<?php
include("functions.php");
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["job_title"]) || $_POST["job_title"]=="" ||
  !isset($_POST["job_category"]) || $_POST["job_category"]=="" ||
  !isset($_POST["job_naiyou"]) || $_POST["job_naiyou"]=="" ||
  !isset($_POST["job_money"]) || $_POST["job_money"]=="" ||
  !isset($_POST["job_dead_line"]) || $_POST["job_dead_line"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$job_title   = $_POST["job_title"];
$job_category  = $_POST["job_category"];
$job_naiyou = $_POST["job_naiyou"];
$job_money  = $_POST["job_money"];
$job_dead_line = $_POST["job_dead_line"];

//2. DB接続します(エラー処理追加)
$pdo = db_con();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO job_table
(job_id, job_title, job_category, job_naiyou , job_money , job_dead_line)VALUES
(NULL, :a1, :a2, :a3, :a4, :a5)");
$stmt->bindValue(':a1', $job_title,   PDO::PARAM_STR);
$stmt->bindValue(':a2', $job_category,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $job_naiyou, PDO::PARAM_STR);
$stmt->bindValue(':a4', $job_money, PDO::PARAM_STR);
$stmt->bindValue(':a5', $job_dead_line, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  queryError($stmt);

}else{
  //５．mypage.phpへリダイレクト
  header("Location: mypage.php");
  exit;
}
?>
