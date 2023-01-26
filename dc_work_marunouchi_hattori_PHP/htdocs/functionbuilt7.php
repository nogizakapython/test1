<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>スペースで区切られた文字を配列に分ける</title>
</head>
<body>
  <?php

    // スペース区切りで文字列を定義(文字列の最後はスペースで区切る)
    $input = 'Manatsu Akimoto ';
    // 配列の定義
    $array1 = [];
    

    // $date = date('Ymd');
    $num = strlen($input);
    echo $num;
    $ans = "";
    

    echo $date . PHP_EOL;
    
    
    for($i=0;$i<$num;$i++){
      $str = substr($input,$i,1);
      // echo $str;
      if (($str == ' ')){
        array_push($array1,$ans);
        $ans = "";
      } else {
        $ans = $ans . $str;
        
      }
      
    }
    foreach($array1 as $line){
      echo "<p> ${line} </p>" . "\n";
      
    }
  ?>
</body>
</html>