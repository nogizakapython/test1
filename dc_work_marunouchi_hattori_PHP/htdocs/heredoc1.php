<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Heredocument1</title>
  <style>
    p {
      font-size:25px;
      color:pink;
    }
  </style>  
</head>
<body>
  <?php
    $name = "秋元真夏";

    $text  = <<< EOL
      $name は乃木坂46のキャプテンです <br>
      $name の必殺技は「ズッキュン」です <br>
      $name は乃木坂46最年長メンバーです <br>
    EOL;
    
    echo "<p>${text}</p>";
  ?>
</body>
</html>