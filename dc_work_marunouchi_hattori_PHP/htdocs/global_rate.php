<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>global関数テスト</title>
</head>
<body>
  <?php
    // グローバル関数
    $rate = 1.1;
    
    
    function sum($a, $b, $c)
    {
      // グローバル関数の宣言
      global $rate;
      return ($a + $b + $c) * $rate;
    }
    
    echo sum(100, 200, 300) + sum(300, 400, 500) . PHP_EOL;
  ?>
</body>
</html>