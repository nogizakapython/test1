<!-- 新規作成 2023/2/3 -->
<!-- 新規会員登録画面 -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <h1>新規会員登録</h1>
    <!-- 処理を行う宛先を指定する -->
    <form action="register.php" method="post">
      <div>
        <label>
            名前：
            <input type="text" name="name" required>
        </label>
      </div>
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
      <input type="submit" value="新規登録">
    </form>
    <p>すでに登録済みの方は<a href="login.php">こちら</a></p>

</body>
</html>
