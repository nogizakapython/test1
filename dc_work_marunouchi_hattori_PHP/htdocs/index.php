<!-- ホーム画面 -->
<!-- 新規作成 2023/2/3 -->
<?php
  setcookie('username', 'name',time()+60*60*24);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    session_start();
    $username = $_SESSION['name'];
    if (isset($_SESSION['id'])) {//ログインしているとき
      $msg = 'こんにちは' . htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . 'さん';
      $link = '<a href="logout.php">ログアウト</a>';
    } else {//ログインしていない時
      $msg = 'ログインしていません';
      $link = '<a href="login_form.php">ログイン</a>';
    }
?>
<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>
</body>
</html>
