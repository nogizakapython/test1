<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK11</title>
</head>
<body>
  <p>1から100までの数で3の倍数かつ12の倍数は「FizzBuzz」、3の倍数は「Fizz」、4の倍数は「Buzz」、それ以外は数字を出力する
  <?php
      for($i=1;$i<=100;$i++):
        if ($i % 3 == 0 && $i % 4 == 0){
          echo "<p>Fizz Buzz</p>"; 
        } elseif ($i % 3 == 0){
          echo "<p>Fizz</p>";
        } elseif($i % 4 == 0){
          echo "<p>Buzz</p>";
        } else {
          echo "<p>" .$i . "</p>"; 
        }
      endfor;
  ?>

  <p>九九の結果</p>
  <?php
    for($i=1;$i<=9;$i++):
      for($j=1;$j<=9;$j++):
        $sum = $i * $j;
        echo "<p>" . $i . " * " . $j . " = " . $sum . "</p>";
      endfor;
    endfor;
  ?>

  <p>*と!を交互に表示し、*は１つずつ増やす
    <?php
        $ans = "";
        for($i=1;$i < 20;$i++):
          if($i % 2 == 1):
            $ans = $ans . "*"; 
             echo "<p>" . $ans . "</p>";
          else: ?>
            <p>!</p>
          <?php endif;
        endfor;
    ?>  
</body>
</html>