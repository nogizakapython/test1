<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY13</title>
</head>
<body>
  <?php
      $random = rand(0,4);  //0～4までのランダムな数値を取得する。
      print '<p>$random: ' . $random . '</p>';
      
      switch ($random){
        case 1:
          print '<p>変数$randomの値は1です。</p>';
          break;
        case 2:
          print '<p>変数$randomの値は2です。</p>';
          break;
        default:
        print '<p>変数$randomの値は1,2ではありません。</p>';    
      }
  ?>    
</body>
</html>