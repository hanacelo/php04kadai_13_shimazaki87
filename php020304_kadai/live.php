<?php
//ログインしてる人以外いじれなくする
session_start();
require_once('funcs.php'); 
loginCheck();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <style>

        body{
            height: 1300px;
        }
        header{
            width: 750px;
            padding: 20px;
        }

        .flex-box{
            display: flex;
            padding-top: 5px;
            padding-left: 20px;
        }

        .top{
            background-color: lightcyan;
            width: 750px;
            padding-bottom: 73px;
            padding-left: 55px;
            padding-top: 5px;
            margin-top: 15px;
        }

        .jumbotron{
            display: flex;
            padding-top: 5px;
            padding-bottom: 7px;
            padding-left: 20px;
        }

        .btn{
            padding-top: 40px;
            padding-left: 400px;
        }


    </style>
    
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <div class="navbar-header"><a class="navbar-brand" href="select.php">セットリストを確認する</a></div>
    </header>

    <div class="top">
        <h1>ツアー情報の登録</h1>
        <div class="gazou"><img src="images/kinpuri02.jpeg" width="600px" height="auto"></div>
    </div>
    

    <!-- Main[Start] -->
    <br>
    <div class="flex-box">
        <div>曲名：</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div>アーティスト：</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div>メモ：</div>
    </div>

    <form method="post" action="insert.php">
        <div class="jumbotron">
            <div><!--タイトル--><input type="text" name="name"></div><br>
            <div><!--アーティスト--><input type="text" name="email"></div><br>
            <div><!--メモ--><textArea name="content" rows="4" cols="40"></textArea></div><br>    
        </div>

        <div class="btn">
            <input type="submit" value="送信" class="submit">
        </div>
        
    </form>


</body>

</html>
