<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="このページの説明文">
  <title>このページのタイトル</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

<?php
  try {
    //DB名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=test;host=127.0.0.1;charset=utf8';
    $user = 'root';
    $password = '';

    $PDO = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    //form.htmlの値を取得
    $hiduke = $_POST['hiduke'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];


    $sql = "INSERT INTO contents1 (hiduke, name, category, description) VALUES (:hiduke, :name, :category, :description)"; // INSERT文を変数に格納。:nameや:categoryはプレースホルダという、値を入れるための単なる空箱
    $stmt = $PDO->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params = array( ':hiduke' => $hiduke, ':name' => $name, ':category' => $category, ':description' => $description); // 挿入する値を配列に格納する
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行
    echo "<p>hiduke: ".$hiduke."</p>";
    echo "<p>name: ".$name."</p>";
    echo "<p>category: ".$category."</p>";
    echo "<p>description: ".$description."</p>";
    echo '<p>で登録しました。</p>'; // 登録完了のメッセージ

  } catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
  }

?>
<a href="form.html" class="menu">入力画面に戻る</a>

</body>
</html>
