<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY37</title>
</head>
<body>
  <?php
      // データベースへの接続
      try{
        $db = new mysqli('mysql34.conoha.ne.jp','bcdhm_nagoya_pf0005','Mt3!+qa_','bcdhm_nagoya_pf0005');
        echo "<p>DBの接続に成功しました</p>";
      } catch (Exception $e){
        echo $db->connect_error;
        exit();
      }
      while(true){
        try{
          $db->close();
          echo "<p>DBのクローズに成功しました</p>";
          break;
        } catch (Exception $e){
          echo "DBのクローズに失敗しました";
        }
      }  


    
  ?>    
</body>
</html>