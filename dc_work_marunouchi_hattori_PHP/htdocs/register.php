<!-- ユーザー登録画面 -->
<!-- 新規作成 2023/2/3 -->
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
    //フォームからの値をそれぞれ変数に代入
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $dsn = "mysql:host=mysql34.conoha.ne.jp; dbname=bcdhm_nagoya_pf0005; charset=utf8";
    $username = "bcdhm_nagoya_pf0005";
    $password = "Mt3!+qa_";
    try {
      $dbh = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
      $msg = $e->getMessage();
    }

    //フォームに入力されたmailがすでに登録されていないかチェック
    $sql = "SELECT * FROM users WHERE mail = :mail";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();
    $member = $stmt->fetch();
    if ($member['mail'] === $mail) {
      $msg = '同じメールアドレスが存在します。';
      $link = '<a href="signup.php">戻る</a>';
    } else {
      //登録されていなければinsert
      $sql = "INSERT INTO users(name, mail, pass) VALUES (:name, :mail, :pass)";
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(':name', $name);
      $stmt->bindValue(':mail', $mail);
      $stmt->bindValue(':pass', $pass);
      $stmt->execute();
      $msg = '会員登録が完了しました';
      $link = '<a href="login_form.php">ログインページ</a>';
    }
?>

<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>
</body>
</html>
