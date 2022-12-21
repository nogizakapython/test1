<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY38</title>
</head>
<body>
  <?php
    // データベースへの接続
    $db = new mysqli('mysql34.conoha.ne.jp','bcdhm_nagoya_pf0005','Mt3!+qa_','bcdhm_nagoya_pf0005');
    if ($db->connect_error){
      echo $db->connect_error;
      exit();
    } else {
      $db->set_charset("utf8");
    }
    $sql = "select product_name,price from product where price <= 100";
    if($result = $db->query($sql)) {
      while ($row = $result->fetch_assoc()){
        echo $row["product_name"] . " " . $row["price"] . "<br>";
      }
      $result->close();
    }
    $db->close();
  ?>
</body>
</html>