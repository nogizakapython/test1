<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>配列の重複値を取り除く</title>
</head>
<body>
  <?php
      $array1 = ['cat','dog','cat','rabbit','bear'];
      // 重複値を取り除くため、array_unique関数を使う。
      $array2 = array_unique($array1);
      // preタグで囲んでprint_r関数の出力結果を見やすくする。
      echo "<pre>";
      print_r($array2);
      echo "</pre>";
  ?>
</body>
</html>