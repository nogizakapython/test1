<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>配列テスト(sort,rsort,shuffle)</title>
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
    sort($scores);
    // 配列の中身を表示
    print_r($scores);
    // 要素をランダムに並び替える
    shuffle($scores);
    // 配列の中身を表示
    print_r($scores);






  ?>
</body>
</html>
