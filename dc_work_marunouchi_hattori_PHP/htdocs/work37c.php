<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK37C</title>
</head>
<body>
  <?php
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
        $sql = "select user_name from logintable where user_name = :user_name";
        // Prepareメソッドによるクエリの実行準備をする
        $stmt = $db->prepare($sql);
    
        // 値をバインドする
        // $stmt -> bindValue(':price',140);
        $stmt -> bindValue(':user_name',$_POST['user_name']);
    
        // クエリの実行
        $stmt->execute();
        $row = $stmt->fetch();
        echo $row;
        echo $row["user_name"] . "さん、こんにちは！";
        
    
      } catch(PDOException $e){
        echo $e->getMessage();
        // $db->rollBack();
      }
      


    
  ?>    
</body>
</html>