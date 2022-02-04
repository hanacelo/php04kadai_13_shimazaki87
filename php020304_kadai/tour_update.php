<?php 

//ログインしてる人以外いじれなくする
session_start();
require_once('funcs.php'); 
loginCheck();

//id取得
$name   = $_GET['name'];
$email  = $_GET['email'];
$content = $_GET['content'];
$id = $_GET['id'];

//DB接続
$pdo = db_conn();

//２．データ変更SQL作成
$stmt = $pdo->prepare('UPDATE gs_b_table SET name= :name,email=:email,content= :content WHERE id = :id');  //特定の物を取得するにはWHEREで

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('tour_select.php');
}

?>