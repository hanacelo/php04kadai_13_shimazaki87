<?php

require_once('funcs.php');

//1. POSTデータ取得
$name = $_POST['name'];
$email = $_POST['email'];
$content = $_POST['content'];

$pdo = db_conn();


//３．データ登録SQL作成

// 1. SQL文を用意
//INSERT＝記録する
//いきなりSQLの中に誰が書いたかわかんない物を入れるのは憚れるので、:nameなど:変数で置いている？らしい
$stmt = $pdo->prepare("INSERT INTO gs_a_table(id, name, email, content, date)VALUES(NULL, :name, :email, :content, sysdate())");

//  2. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':content', $content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status == false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: live.php');
  echo "登録完了！";
}
?>
