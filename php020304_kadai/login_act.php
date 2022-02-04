<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

session_start();

$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//DB接続します
require_once('funcs.php');
$pdo = db_conn();

//データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
// $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status === false){
    sql_error($stmt);
}

//抽出データ数を取得
$val = $stmt->fetch();

if($val['id'] != '' && password_verify($lpw,$val['lpw'])){
    //login成功時
    $_SESSION['chk_ssid'] = session_id(); 
    $_SESSION['kanri_flg'] = $val['kanri_flg']; 
    $_SESSION['name'] = $val['name'];
    header('Location: tour_select.php');
}else{
    //login失敗時
    header('Location: login.php');
};

exit();