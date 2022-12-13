<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY19</title>
</head>
<body>
    <?php
        $fruit = ['りんご','ばなな','ぶどう','もも'];
        $vegetable = ['きゃべつ','とまと','にんじん','なす'];
        $food = array($fruit,$vegetable);
    ?>
    <?php
          print_r($food);
          print $food[0][2];
    ?>    
        

</body>
</html>