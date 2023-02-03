<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>正規表現テスト10</title>
</head>
<body>
  <?php
    $t = "16:22:29";
    $array1 = explode(':',$t);
    foreach($array1 as $var){
      echo $var . PHP_EOL;
    }
  ?>
</body>
</html>
