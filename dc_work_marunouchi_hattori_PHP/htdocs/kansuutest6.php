<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>関数テスト(引数とデフォルト)</title>
  <style>
      .a {
        font-size:18px;
        color:#2F7;
        font-weight: bold;
      }
     
  </style>  
</head>
<body>
  <?php
    function sum($a,$b,$c) {
      $total = $a + $b + $c;
      // 条件演算子($total>=0ならそのまま、$total<0なら0を返す)
      return $total >= 0 ? $total : 0;
    }
    function show($num){
      echo "<p class=a>$num</p>";
    }
    $a = sum(40,200,70);
    show($a);
    $b = sum(-400,200,70);
    show($b);

  ?>

</body>
</html>