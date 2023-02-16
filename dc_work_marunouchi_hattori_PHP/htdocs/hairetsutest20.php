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

    // 先頭から３番目と４番目の要素を削除してつめる
    array_splice($scores,2,2);
    // 配列の中身を表示
    print_r($scores);
    // 先頭から３番目に要素を追加する
    array_splice($scores,2,0,25);
    // 配列の中身を表示
    print_r($scores);






  ?>
</body>
</html>
