<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>テスト1</title>
</head>
<body>
  <?php
      for ($i = 1; $i <= 10; $i++) {
        if ($i === 4){
          continue;
        }
        if ($i === 8){
          break;
        }
        echo $i . PHP_EOL;
      }
      
  ?>
</body>
</html>