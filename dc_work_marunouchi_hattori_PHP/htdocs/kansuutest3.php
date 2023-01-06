<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>関数テスト</title>
  <style>
      .a {
        font-size:18px;
        color:#2F7;
      }
      .b {
        font-weight: bold;
        color:#0725BA;
      }
  </style>  
</head>
<body>
  <?php
    function show($name){
        
        echo "<p class='a'><span class='b'>" . $name . "</span>は乃木坂46のメンバーです</p>";
    }
    $array = ["秋元真夏","遠藤さくら","賀喜遥香","梅澤美波","山下美月"];

    foreach($array as $line){
      
      show($line);
    }

  ?>

</body>
</html>