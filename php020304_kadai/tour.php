<?php
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
        div {
            padding: 10px;
            font-size: 16px;
        }
        
        .flex-box{
            display: flex;
            background-color: lightgray;
            width: 700px;
        }

        header{
            background-color: lightcyan;
            width: 1000px;
        }
        .submit{
            margin-top: 30px;
            margin-bottom: 80px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="tour_select.php">情報を確認</a></div>
            </div>
        </nav>
    </header>

    <h1>ネタバレサイト・King & Prince</h1>
    <div class="gazou"><img src="images/kinpuri02.jpeg" width="600px" height="auto"></div>


    <form method="post" action="tour_insert.php">
        <div class="jumbotron">
            <div>アーティスト：<input type="text" name="name"></div><br>
            <div>ツアータイトル：<input type="text" name="email"></div><br>
            <div>概要：<textArea name="content" rows="4" cols="40"></textArea></div><br>    
        </div>
        <input type="submit" value="送信" class="submit">
    </form>


</body>

</html>
