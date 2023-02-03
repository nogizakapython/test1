<!-- 新規作成 2023/2/3 -->
<!-- ログインフォーム画面 -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>ログインページ</h1>
  <form action="login.php" method="post">
    <div>
        <label>
            メールアドレス：
            <input type="text" name="mail" required>
        </label>
    </div>
    <div>
        <label>
            パスワード：
            <input type="password" name="pass" required>
        </label>
    </div>
    <input type="submit" value="ログイン">
  </form>
  <p>ユーザー登録されていない場合は、下記のリンクからユーザー新規登録してください</p>
  <a href="signup.php">ユーザー登録画面</a>
</body>
</html>
