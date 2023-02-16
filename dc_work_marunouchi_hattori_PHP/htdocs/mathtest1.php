<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>数学系関数</title>
</head>
<body>
  <?php
    $n = 5.6283;
    // 6
    echo ceil($n) . PHP_EOL;
    // 5
    echo floor($n) . PHP_EOL;
    // 6
    echo round($n) . PHP_EOL;
    // 5.63
    echo round($n,2) . PHP_EOL;

    echo mt_rand(1,6) . PHP_EOL;
    echo max(3,9,4) . PHP_EOL;
    echo min(3,9,4) . PHP_EOL;

    echo M_PI . PHP_EOL;
    echo M_SQRT2 . PHP_EOL;

  ?>
</body>
</html>
