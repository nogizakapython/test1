<?php
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
  <title>TRY45</title>
</head>
<body>
  <?php
    try{
      // データベースへ接続
      $db = new PDO($dsn,$login_user,$password);
    } catch(PDOException $e){
      echo $e ->getMessage();
      exit();
    }
    // SELECT文の実行
    $sql = "SELECT product_name,price from product where price <= 100";
    if ($result = $db->query($sql)){
      // 連想配列を取得
      while($row = $result->fetch()){
        echo $row["product_name"] . $row["price"] . "<br>";
      }
    }
  ?>
</body>
</html>