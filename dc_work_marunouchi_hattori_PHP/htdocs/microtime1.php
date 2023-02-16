<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ミリ秒表示テスト</title>
  <style>
    .test1 {
      color:#705107;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <?php
    // 1970年1月1日からの秒を取得
    $w_time = microtime(true);
    // 配列で小数点で分ける
    $w_array = explode('.',$w_time);
    // 小数点以下の秒数を取得
    $mtime = $w_array[1];
    // ミリ秒の表示
    echo $mtime;
    $result = intval($mtime / 100);
    echo "<p class='test1'> {$result} </p>";
  ?>
</body>
</html>
