<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY23</title>
</head>
<body>
    <form method="post">
      <?php
        // ファイルを開く
        $fp = fopen("file_write.txt","w");
        // ファイルへ書き込む
        fwrite($fp,'ファイルへ書き込む');
        // ファイルを閉じる
        fclose($fp);
      ?>
    </form>
</body>
</html>