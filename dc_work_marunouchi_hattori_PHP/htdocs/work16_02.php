<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK16</title>
</head>
<body>
  <div>入力内容の確認</div>
  <?php
      if( isset( $_GET['text']) && $_GET['text'] != ""):
        print '<p> 入力した内容: ' .$_GET['text'] . '</p>';
      else:
        print '入力されていません';
      endif;

      $array1 = $_GET['check'];
      foreach($array1 as $line){
        echo '<p>' . $line . "</p>";
      }
  ?>    
</body>
</html>