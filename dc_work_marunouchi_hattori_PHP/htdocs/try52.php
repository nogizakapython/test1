<!-- program name try52.php -->
<!-- 新規作成 2022/12/28 -->
<?php setcookie('username','login_user',time()+60*60*24); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRY52</title>
</head>
<body>
    <?php
        if(isset($_COOKIE['username'])){
            echo $_COOKIE['username'];
        } else {
            echo 'Cookieのデータがありません';
        }
    ?>    
</body>
</html>