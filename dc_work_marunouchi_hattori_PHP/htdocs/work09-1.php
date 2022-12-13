<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK09</title>
</head>
<body>
  <?php $num = rand(1,100); ?>
  <?php  switch($num): 
      case ($num % 3 == 0 && $num % 6 == 0): ?>
        <p>3と6の倍数です</p>
        <?php break;
      case ($num % 3 == 0 && $num % 6 != 0 ): ?>
        <p>3の倍数で、6の倍数ではありません</p>
        <?php break;
      default: ?>
      <p>倍数ではありません</p>
  <?php  endswitch; ?>  
 
</body>
</html>