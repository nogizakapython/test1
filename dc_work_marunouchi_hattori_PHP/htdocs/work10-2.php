<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<p>九九の結果</p>
  <?php
    for($i=1;$i<=9;$i++){
      for($j=1;$j<=9;$j++){
        $sum = $i * $j;
        echo "<p>" . $i . " * " . $j . " = " . $sum . "</p>";
      }
    }
  ?>
</body>
</html>