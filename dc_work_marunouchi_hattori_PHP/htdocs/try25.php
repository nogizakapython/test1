<?php
    // 初期化
    $check_data = '';
    if(isset($_POST['check_data'])):
        $check_data = htmlspecialchars($_POST['check_data'] , ENT_QUOTES , 'UTF-8');
    endif;    
        
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRY25</title>
</head>
<body>
    <form method="post">
        <div>半角英数字で入力を行ってください。</div>
        <input type="text" name="check_data" value= <?php echo $check_data ;?>>
        <input type="submit" value="送信">
    </form>
    <?php
        if (!preg_match("/^[a-zA-Z0-9]+$/",$check_data) && $check_data !== '') {
            echo "<div> 半角英数字以外が入力されています</div>";
        }
    ?>
</body>
</html>