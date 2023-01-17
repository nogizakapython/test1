<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ビルトイン関数3</title>
  <style> 
      .test1 {
        color:#504;
      }

      .test2 {
        color:#ff18c1;
      }
      .test3 {
        color:#d7c109;
      }
      .test4 {
        color:#d7f139;
      }


  </style>
</head>
<body>
  <?php
      // 文字列の長さを取得する
      $str = ' nogizaka_python ';
      $num  =strlen($str); 
      echo "<p class=test1>" . $num . "</p>";
      // 空白を削除する
      $str = trim($str);
      $num =strlen($str);
      echo "<p class=test2>" . $num . "</p>";
      // str変数から「_」が最初から何番目にあるかを取得する
      echo "<p class=test3>" . strpos($str,'_') . PHP_EOL;
      // str変数から「_」を「-」に置換する
      $str2 = str_replace('_','-',$str);
      echo "<p class=test4>" . $str2 . PHP_EOL;

      

  ?>
</body>
</html>