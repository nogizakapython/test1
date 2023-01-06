<?php
  // セッション開始
  session_start();
  // Cookieの保存期間
  define('EXPIRATION_PERIOD',30);
  $cookie_expiration = time() + EXPIRATION_PERIOD * 60 * 24 * 365;
  
  // POSTされたフォームの値を変数に格納する
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['cookie_confirmation'])){
      $cookie_confirmation = $_POST['cookie_confirmation'];
    } else {
      $cookie_confirmation = '';
    }
    if(isset($_POST['login_id']) && preg_match('/^[a-zA-Z0-9]+$/',$_POST['login_id'])){
      $login_id = $_POST['login_id'];
      $_SESSION['login_id'] = $login_id;
    } else {
      $login_id = '';
      $_SESSION['err_flg'] = true;
    }
  }
  // ユーザー名の保存チェックがされている場合はCookieを保存
  if($cookie_confirmation === 'checked'){
    setcookie('cookie_confirmation',$cookie_confirmation,$cookie_expiration);
    setcookie('login_id',$login_id,$cookie_expiration);
  } else {
    // チェックされていない場合はCookieを削除する
    setcookie('cookie_confirmation','',time() - 30);
    setcookie('login_id','',time() - 30);
  }

  // ログイン中のユーザーであるかを確認する
  if (!isset($_SESSION['login_id'])){
    // ログイン中ユーザーでない場合は、try55.phpにリダイレクト(転送)する
    header('Location:try55.php');
    exit();
  } else {
    echo "<p>" . $_SESSION['login_id'] . "さん：ログイン中です。</p>";
  }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY55</title>
</head>
<body>
  <form action="try55.php" method="post">
    <input type="hidden" name="logout" value="logout">
    <input type="submit" value="ログアウト">
  </form>
</body>
</html>