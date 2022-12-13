<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY14</title>
</head>
<body>
  <?php
      $random = rand(0,4);  //0～4までのランダムな数値を取得する。
  ?>    
  <p>$random: <?php echo $random ?>
      
  <?php  switch ($random):
        case 1: ?>
          <p>変数$randomの値は1です。</p>
          <?php break; 
        case 2: ?>
          <p>変数$randomの値は2です。</p>
          <?php break;
        default: ?>
          <p>変数$randomの値は1,2ではありません。</p>    
  <?php endswitch;  ?>    
</body>
</html>