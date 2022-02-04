<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

//htmlspecialchars() を関数化
//h関数の中に入れた引数が処理される？意味わからん
function h($str){
    return htmlspecialchars($str,ENT_QUOTES);
};

//DB接続のやり方
function db_conn(){
    try {
        $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
        return $pdo;
      } catch (PDOException $e) {
        exit('DBConnectError'.$e->getMessage());
      }
};

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
  $error = $stmt->errorInfo();
  exit('SQLError:' . print_r($error, true));  //exit = これ以上処理するな的な関数
}



//リダイレクト関数: redirect($file_name)

function redirect($file_name){   //$file_nameが{}の中のものと置き換わるイメージ
  header('Location:' . $file_name);
  exit();
}

//ログインチェック
function loginCheck(){
  if( $_SESSION['chk_ssid'] != session_id() ){
    exit('LOGIN ERROR');
  }else{
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
  }
};



?>