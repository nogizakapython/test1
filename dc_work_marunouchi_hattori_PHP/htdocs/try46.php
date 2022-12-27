<!-- 新規作成 2022/12/27 -->
<!-- program name try46.php -->
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
  <title>TRY46</title>
</head>
<body>
  <?php
    try{
      // データベースへ接続
      $db = new PDO($dsn,$login_user,$password);
      // PDOエラー時にPDOException(例外処理)が発生するように設定
      $db-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      // トランザクションの開始
      $db->beginTransaction();

      // UPDATE文の実行
      $sql = "update product set price = 160 where product_id = 1;";
      $result = $db->query($sql);
      $row = $result->rowCount();
      echo $row . '件更新しました';
      // コミット
      $db->commit();
    } catch (PDOException $e){
      echo $e->getMessage();
      // ロールバック
      $db->rollback();
    }  
  ?>
</body>
</html>   