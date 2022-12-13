<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK14</title>
</head>
<body>
  <?php
      $array1 = [];
      for($i=1;$i<=5;$i++){
        $num = rand(1,100);
        array_push($array1,$num);
      }
      $count = count($array1);
      for ($j=0;$j<$count;$j++){
        if($array1[$j] % 2 == 0){
          echo '<p>' . $array1[$j] . "(偶数)</p>";
        } else {
          echo '<p>' . $array1[$j] . "(奇数)</p>";
        }

      }
  ?>
</body>
</html>