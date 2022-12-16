<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);

}


//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=kadai_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table;");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<tr><td class="a">' . $result['indate'] . '</td>' . '<td class="a">' . h($result['name']) . '</td>' . '<td class="a">' . h($result['point']) . '</td>' . '<td class="a">' . h($result['genre']) . '</td>' . '<td>' . h($result['comment']) . '</td></tr>' ;
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
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
  div{padding: 10px;font-size:16px;}
  th.a { text-align: center; }
  td.a { text-align: center; padding: 3px; }
</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <table class="container jumbotron">
    <tr>
    <th class="a">登録日</th>
    <th class="a">店名</th>
    <th class="a">得点</th>
    <th class="a">ジャンル</th>
    <th class="a">コメント</th>
    </tr>
    <?= $view ?>
    </table>
</div>
<!-- Main[End] -->

</body>
</html>