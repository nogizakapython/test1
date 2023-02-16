<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>配列テスト(連想配列)</title>
  <style>
    .test1 {
      color:#c8a700;
      font-size:20px;
      font-weight:bold;
    }
  </style>
</head>
<body>
  <?php
    $colors = ["red" => "赤","blue" => "青","yellow" => "黄"];



   foreach($colors as $key => $value){
    echo "<p class='test1'> {$key}は日本語で{$value}です";
    echo "<br>";
   }






  ?>
</body>
</html>
