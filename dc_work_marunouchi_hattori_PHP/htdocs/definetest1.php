<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Define Test</title>
</head>
<body>
  <?php
    define('MAX_VALUE',10);
    for($i=1;$i<=MAX_VALUE;$i++):
      echo "<p>" . $i . "</p>";
    endfor;  
  ?>
</body>
</html>