<?php 
// ini_set("display_errors", 1);
// error_reporting(E_ALL);

require_once('funcs.php');

//id取得
$name   = $_POST['name'];
$email  = $_POST['email'];
$content = $_POST['content'];
$id = $_POST['id'];

//DB接続
$pdo = db_conn();

//２．データ変更SQL作成
$stmt = $pdo->prepare('UPDATE gs_a_table SET name= :name,email=:email,content= :content WHERE id = :id');  //特定の物を取得するにはWHEREで

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
};

?>