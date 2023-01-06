<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>関数テスト(返り値）</title>
  <style>
      p {
        color:#0FF;
        font-size:18px;
      }
  </style>  
</head>
<body>
  <?php
    function add($a,$b,$c){
      $sum = $a + $b + $c;
      return $sum;
    }
    function gain($a,$b,$c){
      $sum = $a + $b + $c;
      return $sum;
    }
    function result($sum){
      echo "<p>$sum</p>";
    }

    $num1 = add(10,20,30);
    result($num1);
    $num2 = add(5,10,15);
    result($num2);
    $num3 = gain(7,5,1);
    result($num3);
  ?>
</body>
</html>