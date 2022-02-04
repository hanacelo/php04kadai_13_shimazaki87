<?php
//ログインしてる人以外いじれなくする
session_start();
require_once('funcs.php'); 
loginCheck();


//id取得
$id = $_GET['id'];

//DB接続
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_b_table WHERE id = :id');  //特定の物を取得するにはWHEREで
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $sql_error($stmt);
} else {
    $view = $stmt->fetch();
    }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="tour_select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <form method="GET" action="tour_update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>詳細画面</legend>  <!--$viewで表示してあげる-->
                <label>アーティスト<input type="text" name="name" value= <?= $view['name'] ?>></label><br>
                <label>ツアー名<input type="text" name="email" value= <?= $view['email'] ?>></label>
                <label>概要<textarea name="content" rows="4" cols="40" value= <?= $view['content'] ?>></textarea></label><br>

                <label><input type="hidden" name="id" value= <?= $view['id'] ?>></label><br>

                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
