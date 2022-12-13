<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK10-1</title>
</head>
<body>
  <p>1から100までの数で3の倍数かつ12の倍数は「FizzBuzz」、3の倍数は「Fizz」、4の倍数は「Buzz」、それ以外は数字を出力する
  <?php
      for($i=1;$i<=100;$i++){
        if ($i % 3 == 0 && $i % 4 == 0){
          echo "<p>Fizz Buzz</p>"; 
        } elseif ($i % 3 == 0){
          echo "<p>Fizz</p>";
        } elseif($i % 4 == 0){
          echo "<p>Buzz</p>";
        } else {
          echo "<p>" .$i . "</p>"; 
        }
      }
  ?>


</body>
</html>