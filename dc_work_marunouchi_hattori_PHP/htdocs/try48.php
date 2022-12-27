<!-- 疑問符プレースホルダープレースホルダ -->
<!-- 2022/12/27 新規作成 -->
<!-- program name try48.php -->
<?php
   // ログイン情報
   $dsn = 'mysql:host=mysql34.conoha.ne.jp;dbname=bcdhm_nagoya_pf0005;';
   $login_user = 'bcdhm_nagoya_pf0005';
   $password = 'Mt3!+qa_';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY48</title>
</head>
<body>
  <?php
    try{
      $db = new PDO($dsn,$login_user,$password);
      // PDOのエラー時にPDOExceptionが発生するように設定
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      // トランザクションの開始
      $db->beginTransaction();
      // クエリを生成する
      $sql = "update product set price = ? where product_id = ?";
      $stmt = $db->prepare($sql);

      // 値をバインドする
      $stmt->bindValue(1,170);
      $stmt->bindValue(2,'1');

      // クエリの実行
      $stmt->execute();
      $row = $stmt->rowCount();
      echo $row . "件更新しました";
      $db->commit();

    } catch(PDOException $e){
      echo $e->getMessage();
      $db->rollback();
    }
  ?>
</body>
</html>