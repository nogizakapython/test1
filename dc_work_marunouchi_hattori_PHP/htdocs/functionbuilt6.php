<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ビルトイン関数5</title>
</head>
<body>
  <?php
    $input = 'Manatsucute';
    $input = substr_replace($input,'very cute',7);

    $date = date('Ymd');
    $num = strlen($input);
    

    echo $date . PHP_EOL;
    echo $input . PHP_EOL;
    
    for($i=0;$i<$num;$i++){
      $str = substr($input,$i,1);
      echo "<p>" . $str . "</p>";
    }
  ?>
</body>
</html>