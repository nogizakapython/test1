<!-- 名前付きプレースホルダ -->
<!-- 2022/12/27 新規作成 -->
<!-- program name work33b.php -->

<?php
   // ログイン情報
   $dsn = 'mysql:host=mysql34.conoha.ne.jp;dbname=bcdhm_nagoya_pf0005;';
   $login_user = 'bcdhm_nagoya_pf0005';
   $password = 'Mt3!+qa_';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK33</title>
</head>
<body>
  <?
    try{
      // データベースへ接続
      $db = new PDO($dsn,$login_user,$password);
      // PDOエラー時にPDOExceptionが発生するように設定
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      // トランザクション開始
      $db->beginTransaction();
      // クエリを生成する「:c_id」、「:price」は名前付きプレースホルダ
      $sql = "select product_code,product_name,price,category_name from product as p
      inner join category as c on p.category_id = c.category_id where p.category_id IN (:s_id,:e_id) and price >= :price";
      // Prepareメソッドによるクエリの実行準備をする
      $stmt = $db->prepare($sql);

      // 値をバインドする
      $stmt -> bindValue(':price',100);
      $stmt -> bindValue(':s_id',2);
      $stmt -> bindValue(':e_id',4);

      // クエリの実行
      $stmt->execute();
      while ($row = $stmt->fetch()){
        echo $row["product_code"] . " " . $row["product_name"] . " " . $row["price"] . " " . $row["category_name"] . "<br>";
      }

    } catch(PDOException $e){
      echo $e->getMessage();
      // $db->rollBack();
    }
  ?>
</body>
</html>