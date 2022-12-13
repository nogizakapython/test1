<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY08</title>
</head>
<body>
  <?php
    $fruit01 = "りんご";
    $fruit02 = "バナナ";

    if($fruit01 == "りんご" && $fruit02 == "バナナ"){
      echo "<p>fruit01はりんごで、かつ、fruit02はバナナです</p>";
    }
    if($fruit01 == "りんご" || $fruit02 == "りんご"){
      echo "<p>fruit01がりんご、あるいは、fruit02がりんごのどちらかです</p>";
    }
    if(!($fruit01 == "バナナ")){
      echo "<p>fruit01はバナナではありません</p>";
    }

  ?>
</body>
</html>