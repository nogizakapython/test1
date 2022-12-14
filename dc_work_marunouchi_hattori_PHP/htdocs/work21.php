<?php
    // 変数を初期化
    $str1 = '';
    $str2 = '';
    if(isset($_POST['str1'])){
        $str1 = htmlspecialchars($_POST['str1'], ENT_QUOTES , 'UTF-8');
    }

    if(isset($_POST['str2'])){
        $str2 = htmlspecialchars($_POST['str2'], ENT_QUOTES , 'UTF-8');
    }
    
    

?>

<!DOCTYPE html>
<!-- 新規作成 2022/12/14 -->
<!-- 正規表現 -->

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORK21</title>
</head>
<body>
    <form method="post">
        <div>半角アルファベットの大文字または小文字のみ入力してください</div>
        <input type="text" name="str1" value=<?php echo $str1 ?>>
        <div>携帯番号を入力してください</div>
        <input type="text" name="str2" value=<?php echo $str2 ?>>
        <div>送信ボタンをクリックしてください</div>
        <input type="submit" value="送信">
    </form>    
    <?php
        if(!preg_match("/^[a-zA-Z]+$/", $str1 ) && $str1 !== '' ){
            echo "<div>正しい入力形式ではありません</div>";
        } 
        
        if(preg_match("/dc/", $str1 )){
            echo "<div>ディーキャリアが含まれています</div>";
        }

        if(preg_match("/^[a-zA-Z]+end$/", $str1)){
            echo "<div>終了です！</div>";
        }
        if(!preg_match("/^0[7-9]0-[0-9]{4}-[0-9]{4}$/" , $str2 )){
            echo "<div>携帯電話番号の形式ではありません</div>";
        } 
    ?>
</body>
</html>