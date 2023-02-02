<!-- ログインユーザー　パスワード　ログイン画面 -->
<!-- 新規作成 2023/2/2 -->
<!-- Program code work38.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORK38</title>
    <link rel="stylesheet" href="work38.css">
</head>
<body>
<?php
        // cookieに値がある場合、変数に格納する
        if(isset($_COOKIE['cookie_confirmation'])){
            $cookie_confirmation = "checked";
        } else {
            $cookie_confirmation = "";
        }
        if(isset($_COOKIE['user_name']) == TRUE){
            $user_name = "checked";
        } else {
            $user_name = '';
        }
        if(isset($_COOKIE['password']) == TRUE){
            $password = "checked";
        } else {
            $password = '';
        }


    ?>
    <!-- 入力フォーム -->
    <form action="home1.php" method="post" class="form1">
        <label for="login_id">ユーザー名</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo $user_name; ?>"><br>
        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>"><br>
        <input type="checkbox" name="cookie_confirmation" value="checked" <?php print $cookie_confirmation;?>>次回からユーザー名の入力を省略する<br>
        <input type="submit" value="ログイン">
    </form>

</body>
</html>
