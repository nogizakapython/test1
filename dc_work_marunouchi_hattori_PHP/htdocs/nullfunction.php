<?php
  declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>関数テスト(nullテスト)</title>
</head>
<body>
  <?php
    

    function getAward(int $score): ?string
    {
      return $score >= 100 ? 'Gold Medal' : null;
    } 

    echo getAward(150) . PHP_EOL;
    echo getAward(40) . PHP_EOL;
  ?>
</body>
</html>