<?php


require_once('funcs.php'); 
$pdo = db_conn();

//２．データ取得SQL作成
// -> classというらしい
$stmt = $pdo->prepare("SELECT * FROM gs_b_table"); //myadwinで取得用に書いたやつと一緒
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){  //$resultの中に取得した情報が1行1行入っていく
    $view .= '<li>';
        //ここでリンク挿入
        $view .= '<a href="tour_detail.php?id=' . $result['id'] . '">';  //?idとつけると、id別に分けられる
        $view .= $result['name'] . '&nbsp;&nbsp;' . $result['email'] . '&nbsp;&nbsp;' . $result['content'];
        $view .= '</a>';

        $view .= '<a href="tour_delete.php?id=' . $result['id'] . '">';  //?idとつけると、id別に分けられる
        $view .= '[削除]';
        $view .= '</a>';

        $view .= '<a href="select.php?id=' . $result['id'] . '">';  //?idとつけると、id別に分けられる
        $view .= '[詳細]';
        $view .= '</a>';

        $view .= '</li>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<style>

.flex{
  display: flex;
  background-color: lightgray;
  width: 750px;
}

.color{
  background-color: lightcyan;
  width: 750px; 
}

body{
  height: 1500px;
}

header{
  background-color: white;
  text-align: right;
  padding-right: 400px;
  font-size: 20px;
}


</style>
</head>
<body id="main">
<!-- Head[Start] -->
<!-- <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="select.php">ツアー詳細</a>
      </div>
    </div>
  </nav>
</header> -->
<header>
  <a  href="login.php">ログイン<a>
  <a  href="logout.php">ログアウト<a>
</header>


<div class="color">
  <h1>King & Prince コンサート情報まとめ</h1>
  <div class="gazou"><img src="images/kinpuri04.jpeg" width="600px" height="auto"></div>
</div>



<div class="flex">&nbsp;
  <div id="title">アーティスト</div>&nbsp;&nbsp;
  <div id="artist">ツアー名</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div id="memo">概要</div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  <div class="music_log"><a class="music_data" href="tour.php">データ登録</a></div>
</div>
<div>
    <div class="container jumbotron">
      <a href="tour_detail.php"></a>
      <?= $view ?>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
