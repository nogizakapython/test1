<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>正規表現テスト</title>
</head>
<body>
  <?php
      $str = "test1.xls";
      
      if ((preg_match("/\.jpg/",$str) == 1) || (preg_match("/\.png/",$str) == 1)){
        echo "YES";
      } else {
        echo "NO";
      }

      
  ?>
</body>
</html>