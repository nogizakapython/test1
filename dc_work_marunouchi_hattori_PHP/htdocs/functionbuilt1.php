<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ビルトイン関数1</title>
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
      // 文字列の長さを取得する
      $num =strlen("hogehoge");
      echo "<p class=test1>" . $num . "</p>";

      $array1 = [1,4,7,6,6,1];
      // 配列の要素の重複を取り除く
      $array2 = array_unique($array1);
      foreach($array2 as $line){
        echo "<p class=test2>" . $line . "</p>";
      }

  ?>
</body>
</html>