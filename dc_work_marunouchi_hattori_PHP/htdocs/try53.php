<!-- 新規作成 2022/12/28 -->
<!-- code name try53.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRY53</title>
</head>
<body>
    <?php
        // cookieに値がある場合、変数に格納する
        if(isset($_COOKIE['cookie_confirmation'])){
            $cookie_confirmstion = "checked";
        } else {
            $cookie_confirmstion = "";
        }
        if(isset($_COOKIE['login_id']) === TRUE){

        } else {
            $log_in = '';
        }
    ?>
    <form action="home.php" method="post">
        <label for="login_id">ログインID</label><input type="text" id="login_id" name="login_id" value="<?php echo $login_id; ?>"><br>
        <input type="checkbox" name="cookie_confirmation" value="checked" <?php print $cookie_confirmation;?>>次回からログインIDの入力を省略する<br>
        <input type="submit" value="ログイン">
    </form>


</body>
</html>