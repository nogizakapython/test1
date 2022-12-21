<?php
    $err_msg = '正しい入力形式ではありません';
    $msg1 = '';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORK30</title>
    <style>
        h1 {
            width:170px
            font-size:40px;
            text-align:left;
        }
        #message {
            font-size:15px;
            color:#F00;
        }

    </style>    
</head>
<body>
<body>
    <h1>画像投稿</h1>
    <div id="disp">
        <p id="message" name="message"><?php echo $msg1 ?></p>
    </div>
    <form method="post" action="work30.php" enctype="multipart/form-data">
        <div>画像名</div>
        <input type="text" name="name1">
        <div>画像</div>
        <p><input type="file" name="upload_image"></p>
        <p><input type="submit" value="画像投稿"></p>
    </form>    
    <?php
        if(!isset($_POST['name1'])){
            $msg1 = $msg1 . $err_msg;
            exit;
        } 
        //ファイルが送信されていない場合はエラー
        if(!isset($_FILES['upload_image'])){
            $msg1 = $msg1 . 'ファイルが送信されていません';
            exit;
        }
        // ファイル名を取得する
        $save = 'img/' . basename($_FILES['upload_image']['name']);

        if ((!preg_match("/.png/",$save)) || (!preg_match("/.jpeg/",$save))) {
            $msg1 = $msg1 . 'pngかjpeg以外のファイルはアップロードできません';
            exit;
        })
        
        // ファイルを保存先ディレクトリに移動させる
        if(move_uploaded_file($_FILES['upload_image']['tmp_name'], $save)){
            echo 'アップロード成功しました。';
        } else {
            echo 'アップロード失敗しました。';
        }

        // データベースへの接続
        $db = new mysqli('mysql34.conoha.ne.jp','bcdhm_nagoya_pf0005','Mt3!+qa_','bcdhm_nagoya_pf0005');
        if ($db->connect_error){
            echo $db->connect_error;
            exit();
        } else {
            $db->set_charset("utf8");
        }
        
        $sql = "insert into proctable(image_name,public_flag,create_date) values(" . $name ",0," . )";
        if($result = $db->query($sql)) {
            foreach ($result as $row){
                echo $row["product_name"] . " " . $row["price"] . "<br>";
            }
            $result->close();
        }
        $db->close();
        
         
    ?>
</body>
</html>
