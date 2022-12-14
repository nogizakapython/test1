<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRY24</title>
</head>
<body>
    <?php
        //ファイルが送信されていない場合はエラー
        if(!isset($_FILES['upload_image'])){
            echo 'ファイルが送信されていません';
            exit;
        }
        $save = 'img/' . basename($_FILES['upload_image']['name']);
        // ファイルを保存先ディレクトリに移動させる
        if(move_uploaded_file($_FILES['upload_image']['tmp_name'], $save)){
            echo 'アップロード成功しました。';
        } else {
            echo 'アップロード失敗しました。';
        }
    ?>
</body>
</html>