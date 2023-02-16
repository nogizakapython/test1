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
    $scores = [30,40,90];

    // 先頭に配列の要素を追加
    array_unshift($scores,10,20);
    // 1番最後に配列の要素を追加
    array_push($scores,100,80);
    // 配列の中身を表示
    print_r($scores);


    $scores1 = [40,50,60];
    // 1番先頭の配列の要素を削除する
    array_shift($scores1);
    print_r($scores1);


    $scores2 = [20,40,60];
    // 1番最後の配列の要素を削除する
    array_pop($scores2);
    print_r($scores2);

  ?>
</body>
</html>
