<?php
      $host = 'localhost';
      $login_user = 'root';
      $password = '';
      $database = 'sample1';
      $error_msg = [];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK30</title>
</head>
<body>
<?php  
      $date = date("Y-m-d");
      $db = new mysqli($host, $login_user, $password, $database);
      if ($db->connect_error){
        echo $db->connect_error;
        exit();
      } else {
        $db->set_charset("utf8");
      }
      // 受け取ったデータのレコードを更新する
      if (isset($_POST["image_id"])) {
          $image_id = $_POST["image_id"];
      if($_POST["public_flag"] == 1){
          $update  = "update pictable set public_flg = 0,update_date = '${date}' WHERE image_id = ${image_id};";
      } else if ($_POST["public_flag"] == 0) {
          $update  = "update pictable set public_flg = 1,update_date = '${date}' WHERE image_id = ${image_id};";
      }    
      echo $update;
      if($result = $db->query($update)) {
            $row = $db->affected_rows;
      } else {
            $error_msg[] = 'UPDATE実行エラー [実行SQL]' . $update;
      }
      //$error_msg[] = '強制的にエラーメッセージを挿入';
      // print_r($error_msg);
      //エラーメッセージ格納の有無によりトランザクションの成否を判定
      if (count($error_msg) == 0) {
          echo $row.'件更新しました。'; 
          $db->commit();	// 正常に終了したらコミット
      } else {
          echo '更新が失敗しました。'; 
          $db->rollback();	// エラーが起きたらロールバック
      }
    }

    ?>
    <meta http-equiv="refresh" content="2;URL=http://localhost/chukan/work30.php">
</body>
</html>