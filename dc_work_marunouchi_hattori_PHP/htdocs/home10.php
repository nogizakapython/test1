<!-- 新規作成 2022/12/28 -->
<!-- ログイン判定 -->
<!-- ソースコード名 home.php -->

<?php
// Cookieの保存期間
define('EXPIRATION_PERIOD',30);
$cookie_expiration = time() + EXPIRATION_PERIOD * 60 * 24 * 365;
// POSTされたフォームの値を変数に格納する。
if (isset($_POST['cookie_confirmation']) === TRUE) {
    $cookie_confirmation = $_POST['cookie_confirmation'];
} else {
    $cookie_confirmation = "";
}
if (isset($_POST['login_id']) === TRUE ){
    $login_id = $_POST['login_id'];
} else {
    $login_id = '';
}
if (isset($_POST['password']) === TRUE ){
    $password = $_POST['password'];
} else {
    $password = '';
}



// ログインIDの入力省略にチェックがされている場合はCookieを保存
if ($cookie_confirmation === 'checked'){
    setcookie('cookie_confirmation',$cookie_confirmation,$cookie_expiration);
    setcookie('login_id',$login_id,$cookie_expiration);
    setcookie('password',$password,$cookie_expiration);
} else {
    // チェックされていない場合はCookieを削除する
    setcookie('cookie_confirmation','',time() - 30);
    setcookie('login_id','',time() - 30);
    setcookie('password','',time() - 30);
}

// DBに接続
// ログイン情報
$dsn = 'mysql:host=mysql34.conoha.ne.jp;dbname=bcdhm_nagoya_pf0005;';
$login_user = 'bcdhm_nagoya_pf0005';
$password = 'Mt3!+qa_';

try{
    // データベースへ接続
    $db = new PDO($dsn,$login_user,$password);
    // PDOエラー時にPDOExceptionが発生するように設定
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // トランザクション開始
    $db->beginTransaction();
    // クエリを生成する「:price」、「:id」は名前付きプレースホルダ
    $sql = "select password from logintable where user_name = :user_name";
    // Prepareメソッドによるクエリの実行準備をする
    $stmt = $db->prepare($sql);

    // 値をバインドする
    // $stmt -> bindValue(':price',140);
    $stmt -> bindValue(':user_name',$_POST['user_name']);

    // クエリの実行
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row["password"] == $_POST['password']){
        echo "ログインに成功しました";
    } else {
        echo "ログインに失敗しました";
    }
    

  } catch(PDOException $e){
    echo $e->getMessage();
    // $db->rollBack();
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRY53</title>
</head>
<body>
    <p>ログイン（疑似的)が完了しました</p>
    <?php
        // 3秒後にログイン画面に戻る
        header("refresh:3;url=work37.php");
    ?>
</body>
</html>