<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK12</title>
</head>
<body>
  <p>1から100までの数で3の倍数かつ12の倍数は「FizzBuzz」、3の倍数は「Fizz」、4の倍数は「Buzz」、それ以外は数字を出力する
  <?php
      $i=1;
      while($i<=100){
        if ($i % 3 == 0 && $i % 4 == 0){
          echo "<p>Fizz Buzz</p>"; 
        } elseif ($i % 3 == 0){
          echo "<p>Fizz</p>";
        } elseif($i % 4 == 0){
          echo "<p>Buzz</p>";
        } else {
          echo "<p>" .$i . "</p>"; 
        }
        $i++;
      }
  ?>

  <p>九九の結果</p>
  <?php
  $i = 1;
    while($i<=9){
      $j = 1;
      while($j<=9){
        $sum = $i * $j;
        echo "<p>" . $i . " * " . $j . " = " . $sum . "</p>";
        $j++;
      }
      $i++;
    }
  ?>

  <p>*と!を交互に表示し、*は１つずつ増やす
    <?php
        $ans = "";
        $i = 1;
        while($i < 20){
          if($i % 2 == 1){
            $ans = $ans . "*"; 
            echo "<p>" . $ans . "</p>";
          } else {
            echo "<p>!</p>";
          }
          $i++;
      }
    ?>  
</body>
</html>