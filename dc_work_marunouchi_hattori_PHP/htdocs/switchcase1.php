<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SWITCH1</title>
</head>
<body>
  <?php
    $num = rand(1,4);
    switch($num){
      case 1:
        echo "大吉";
        break;
      case 2:
        echo "中吉";
        break;
      case 3:
        echo "小吉";
        break;
      default:
        echo "末吉"; 
        break;     
    }
    
  ?>  
</body>
</html>