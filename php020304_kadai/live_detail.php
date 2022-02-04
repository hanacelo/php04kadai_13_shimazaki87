<?php

//ログインしてる人以外いじれなくする
session_start();
require_once('funcs.php'); 
loginCheck();

//DB接続
$pdo = db_conn();


//id取得
$id = $_GET['id'];


//データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_a_table WHERE id = :id;');  //特定の物を取得するにはWHEREで
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

        .jumbotron{
            width: 500px;

        }

        .btn{
            padding-left: 350px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>


    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="live_update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>登録画面</legend>  <!--$viewで表示してあげる-->
                <label>曲名：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" value= <?= $view['name'] ?>></label><br>
                <label>アーティスト名：<input type="text" name="email" value= <?= $view['email'] ?>></label><br>
                <label>メモ：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="content" rows="4" cols="40" value= <?= $view['content'] ?>></textarea></label><br>

                <label><input type="hidden" name="id" value= "<?= $view['id'] ?>"></label><br>

                <div class="btn">
                    <input type="submit" value="送信">
                </div>
                
            </fieldset>
        </div>
    </form>
</body>

</html>
