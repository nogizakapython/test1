<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>paiza prob(巨大な数の足し算(繰り上がりなし)</title>
  <style>
    .ans1 {
      font-size:20px;
      color:#F00;
      background-color:#0FFFFF;
    }
  </style>  
</head>
<body>
  <?php
    // 入力1文字列
    $str1 = 33333333333333;
    $str1 = (string) $str1;
    $array1 = preg_split('//',$str1);
    $str2 = 23232323232323;
    $str2 = (string) $str2;
    $array2 = preg_split('//',$str2);
    $num = count($array1);
    $ans = "";
    
    for($i=0;$i<$num;$i++){
        $data1 =  $array1[$i];
        $data2 =  $array2[$i];
        $data1 = (int) $data1;
        $data2 = (int) $data2;
        $data3 = (int) ($data1 + $data2);
        $ans = $ans . $data3;
    }
    $ans = (string) $ans;
    $ans1 = str_replace('0','',$ans);
    echo "<p class=ans1>" .  $ans1 . "</p>";
  ?>
</body>
</html>