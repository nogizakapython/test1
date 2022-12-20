<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>var_dumptest1</title>
</head>
<body>
  <?php
    function sample1($msg){
      echo "<pre>";
      var_dump($msg);
      echo "</pre>";
    }
  
    $a = 'hello';
    $b = 10;
    $c = 3.14;
    $d = null;
    
    sample1($a);
    sample1($b);
    sample1($c);
    sample1($d);
    
  ?>
</body>
</html>