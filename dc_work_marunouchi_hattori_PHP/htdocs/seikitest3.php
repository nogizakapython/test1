<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>正規表現テスト</title>
</head>
<body>
  <?php
    $array1 = ['乃木坂46','櫻坂46','日向坂46','AKB48','吉本坂46','SKE48'];
    foreach($array1 as $line){
      if(preg_match('/坂/',$line) == 1){
        echo "<p>{$line}</p>";
        
      } else {
        echo "";
      }
    }
  ?>
</body>
</html>