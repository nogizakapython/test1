<!-- 新規作成 2023/2/3 -->
<!-- ログイン画面 -->

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
  $mail = $_POST['mail'];
  $dsn = "mysql:host=mysql34.conoha.ne.jp; dbname=bcdhm_nagoya_pf0005; charset=utf8";
  $username = "bcdhm_nagoya_pf0005";
  $password = "Mt3!+qa_";
  try {
    $dbh = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    $msg = $e->getMessage();
  }

  $sql = "SELECT * FROM users WHERE mail = :mail";
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':mail', $mail);
  $stmt->execute();
  $member = $stmt->fetch();
  //指定したハッシュがパスワードにマッチしているかチェック
  if ($_POST['pass'] == $member['pass']) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'ログインしました。';
    $link = '<a href="index.php">ホーム</a>';
  } else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
  }
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>
</body>
</html>
