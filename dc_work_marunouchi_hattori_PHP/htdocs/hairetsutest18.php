<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>配列テスト(push pop shift unshift)</title>
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
    $scores = [30,40,50,60,70];

    // 先頭に配列の要素を追加
    $partial = array_slice($scores,2,3);
    // 配列の中身を表示
    print_r($scores);
    print_r($partial);




  ?>
</body>
</html>
