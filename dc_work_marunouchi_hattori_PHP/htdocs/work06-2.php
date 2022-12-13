<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK06</title>
</head>
<body>
  <?
    $random01 = rand(1,10);
    $random02 = rand(1,10);
    $msg1 = "random01の方が大きいです。";
    $msg2 = "random02の方が大きいです。";
    $msg3 = "2つは同じ数です。";
    $ans = "";
    $count = 0;
    $ans = $ans . "random01=" . $random01 . "random02=" . $random02 . "です。"; 
    if ($random01 > $random02):
      $ans = $ans . $msg1; 
    elseif ($random01 == $random02):
      $ans = $ans . $msg3;
    elseif ($random01 < $random02):
      $ans = $ans . $msg2;
    endif;
    if ($random01 % 3 == 0):
      $count += 1;
    endif;
    if ($random02 % 3 == 0):
      $count += 1;
    endif;  
    if ($count == 2):
      $ans = $ans . "2つの数字の中には3の倍数が2つ含まれています。";
    elseif ($count == 1):
      $ans = $ans . "2つの数字の中には3の倍数が1つ含まれています。";
    else:
      $ans = $ans . "2つの数字の中に3の倍数が含まれていません";
    endif;

    echo $ans;



  ?>
</body>
</html>