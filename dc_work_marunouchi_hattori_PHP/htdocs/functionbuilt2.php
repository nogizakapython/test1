<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ビルトイン関数2</title>
  <style> 
      .test1 {
        color:#504;
      }

      .test2 {
        color:#ff18c1;
      }

  </style>
</head>
<body>
  <?php

      function br() {
        echo "<br>";
      }

      $name = 'Apple';
      $score = 32.246;

      $info = "[$name][$score]";
      echo $info . PHP_EOL;
      br();

      $info = sprintf("[%15s][%10.f]",$name,$score);
      echo $info . PHP_EOL;
      br();

      $info = sprintf("[%-15s][%010.f]",$name,$score);
      echo $info . PHP_EOL;
      br();

      printf("[%-15s][%010.2f]" . PHP_EOL ,$name,$score);
      
  ?>
</body>
</html>