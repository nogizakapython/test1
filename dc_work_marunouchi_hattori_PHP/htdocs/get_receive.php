<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY20</title>
</head>
<body>
  <div>入力内容の取得</div>
  <?php
      if( isset( $_GET['display_text']) && $_GET['display_text'] != ""):
        print '入力した内容: ' . htmlspecialchars($_GET['display_text'],ENT_QUOTES,'UTF-8');
      else:
        print '入力されていません';
      endif;
  ?>

</body>
</html>