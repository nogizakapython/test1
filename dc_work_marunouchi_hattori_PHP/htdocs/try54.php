<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY54</title>
</head>
<body>
    <?php
      var_dump($_SESSION);

      $_SESSION['id'] = 1;
      $_SESSION['username'] = 'login_user';
      $_SESSION['year'] = date("Y");
      var_dump($_SESSION);

      unset($_SESSION['username']);
      var_dump($_SESSION);
    ?>  

</body>
</html>