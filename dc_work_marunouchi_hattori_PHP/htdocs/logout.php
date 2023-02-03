<!-- 新規作成 2023/2/3 -->
<!-- ログアウト画面 -->
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
    $_SESSION = array();//セッションの中身をすべて削除
    session_destroy();//セッションを破壊
  ?>

  <p>ログアウトしました。</p>
  <a href="login_form.php">ログインへ</a>
</body>
</html>
