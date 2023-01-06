<?php
  session_start();
  if ($_SESSION['err_flg']){
    echo "<p>ログインが失敗しました:正しいログインID（半角英数字）を入力してください。</p>";
  }
  $_SESSION['err_flag'] = False;
  // ログアウト処理がされた場合
  if(isset($_POST["logout"])){
    // セッション名を取得する
    $session = session_name();
    // セッション変数を削除
    $_SESSION = [];

    // セッションID(ユーザー側に保存されている)を削除
    if (isset($_COOKIE[$session])){
      // sessionに関する設定を取得
      $param = session_get_cookie_params();

      // cookieの削除
      setcookie($session,'',time() - 30,'/');
      $message = "<p>ログアウトされました。</p>";
    }
  } else {
    // ログイン中のユーザーであるか確認する
    if(isset($_SESSION['login_id'])) {
      // ログイン中である場合は、top.phpにリダイレクト(転送)する
      header('Location:top.php');
      exit();
    }
  }
  // cookieに値がある場合、変数に格納する
  if(isset($_COOKIE['cookie_confirmation']) === TRUE) {
      $cookie_confirmation = "checked";
  } else {
    $cookie_confirmation = "";
  }

  if(isset($_COOKIE['login_id']) === TRUE) {
    $login_id = $_COOKIE['login_id'];
  } else {
    $login_id = "";
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
    <?php
      if(isset($message)){
        echo $message;
      }
    ?>
    <form action="top.php" method="post">
      <label for="login_id">ログインID</label>
      <input type="text" id="login_id" name="login_id" value="<?php  echo $login_id; ?>"><br>
      <input type="checkbox" name="cookie_confirmation" value="checked" <?php  echo $cookie_check; ?>>次回からログインIDの入力を省略する<br>
      <input type="submit" value="ログイン">
    </form>
</body>
</html>