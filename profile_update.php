<?php
include("functions.php");
//1.POSTでParamを取得
$id     = $_POST["id"];
$user_name   = $_POST["user_name"];
$user_mail  = $_POST["user_mail"];
$user_pass = $_POST["user_pass"];
$user_skil   = $_POST["user_skil"];
$user_profile  = $_POST["user_profile"];
$user_jobsearch_flg = $_POST["user_jobsearch_flg"];

//2.DB接続など
$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare(
  "UPDATE gm_user_table SET 
  user_name=:user_name,
  user_mail=:user_mail,
  user_pass=:user_pass,
  user_skil=:user_skil,
  user_profile=:user_profile,
  user_jobsearch_flg=:user_jobsearch_flg
  WHERE id=:id");

$stmt->bindValue(':user_name',  $user_name,   PDO::PARAM_STR);
$stmt->bindValue(':user_mail', $user_mail,  PDO::PARAM_STR);
$stmt->bindValue(':user_pass',$user_pass, PDO::PARAM_STR);
$stmt->bindValue(':user_skil',  $user_skil,   PDO::PARAM_INT);
$stmt->bindValue(':user_profile', $user_profile,  PDO::PARAM_STR);
$stmt->bindValue(':user_jobsearch_flg',$user_jobsearch_flg, PDO::PARAM_INT);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  queryError($stmt);
}else{
  header("Location: mypage.php");
  exit;
}

?>





