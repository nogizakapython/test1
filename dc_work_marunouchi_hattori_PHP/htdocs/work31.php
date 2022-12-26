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
  <title>WORK31</title>
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
    $sql = "SELECT product_name,price,c.category_id,category_name from product as p 
    inner join category as c
    on p.category_id = c.category_id where c.category_id = 1";
    if ($result = $db->query($sql)){
      // 連想配列を取得
      while($row = $result->fetch()){
        echo $row["product_name"] . " " . $row["price"] . " " . $row["category_id"] . " " . $row["category_name"] . "<br>";
      }
    }
  ?>
</body>
</html>