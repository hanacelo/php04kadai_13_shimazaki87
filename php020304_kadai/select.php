<?php

require_once('funcs.php'); //require_onceで呼び出して使えるようにする
$pdo = db_conn();

//２．データ取得SQL作成
// -> classというらしい
$stmt = $pdo->prepare("SELECT * FROM gs_a_table"); //myadwinで取得用に書いたやつと一緒
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    $sql_error($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){  //$resultの中に取得した情報が1行1行入っていく
    $view .= '<p>'; 
    
    //リンク挿入
    $view .= '<a href="live_detail.php?id=' . $result['id'] . '">';  //?idとつけると、id別に分けられる
    $view .=  $result['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $result['email'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $result['content'];
    $view .= '</a>';

    $view .= '<a href="live_delete.php?id=' . $result['id'] . '">';  //?idとつけると、id別に分けられる
        $view .= '[削除]';
        $view .= '</a>';

    $view .= '</p>';
  }

}


//２．データ取得SQL作成
// -> classというらしい
$stmt = $pdo->prepare("SELECT * FROM gs_b_table WHERE id = 3"); //myadwinで取得用に書いたやつと一緒
$status = $stmt->execute();

//３．データ表示
$view2="";
if ($status==false) {
    $sql_error($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){  //$resultの中に取得した情報が1行1行入っていく
    $view2 .= '<p>'; 
    $view2 .=  $result['name'] . '&nbsp;&nbsp;' .  $result['email'] .  "ツアー";
    $view2 .= '</p>';
  }}





?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>キンプリ</title>
<style>
.flex-box{
  display: flex;
  background-color: lightgray;
  width: 750px;
  height: 50px;
  margin-top: 5px;
  padding-top: 10px;
}
.tour{
  padding-bottom:250px;
  padding-top: 100px;
}

h1{
  background-color: lightcyan;
  width: 700px;
  padding: 21.440px;
}


</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  
</header>

<h1><?= $view2 ?></h1>
<div class="flex-box">
  <div id="title">曲名</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div id="artist">アーティスト</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div id="memo">メモ</div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="music_log"><a class="music_data" href="live.php">データ登録</a></div>
</div>
<div>
    <div class="container jumbotron">
      <a href="live_detail.php"></a>
      <?= $view ?>
    </div>
</div>

<div class="tour"><a class="tour_back" href="tour_select.php">ツアー情報に戻る</a></div>


</body>
</html>
