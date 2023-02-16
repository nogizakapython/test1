<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>配列テスト(array_rand)</title>
  <style>
    .test1 {
      color:#f1ca7a;
      font-size:20px;
      font-weight:bold;
    }
  </style>
</head>
<body>
  <?php
    $scores = [40,50,20,30];

    // 要素を昇順に並び替える
   $picked = array_rand($scores,2);

   print_r($scores);
   print_r($picked);






  ?>
</body>
</html>
