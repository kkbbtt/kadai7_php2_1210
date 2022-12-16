<?php
//1. POSTデータ取得
$name = $_POST['name'];
$genre = $_POST['genre'];
$point = $_POST['point'];
$comment = $_POST['comment'];

//2. DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=kadai_db; charset=utf8; host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_bm_table(id, name, genre, point, comment, indate)
                        VALUES(NULL, :name, :genre, :point, :comment ,sysdate())');

//Integer（数値の場合 PDO::PARAM_INT)
//String（文字列の場合 PDO::PARAM_STR)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':point', $point, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . print_r($error, true));
} else {
    header('Location: index.php');
}