<!-- 新規作成 2023/1/12 -->
<?php

  // work39Model.phpを読み込む
  require 'work39Model.php';  

  $date = date("Y-m-d");
  $out = '';
  $error_msg = [];
  $pdo = get_connection();
  $pdo->begintransaction();
  // 受け取ったデータのレコードを更新する
  if (isset($_POST["image_id"])) {
    $image_id = $_POST["image_id"];
    if($_POST["public_flag"] == 1){
      $update  = "update pictable1 set public_flg = 0,update_date = '${date}' WHERE image_id = ${image_id};";
    } else if ($_POST["public_flag"] == 0) {
      $update  = "update pictable1 set public_flg = 1,update_date = '${date}' WHERE image_id = ${image_id};";
    }    
    
    if($result = $pdo->query($update)) {
      $row = $pdo->affected_rows;
    } else {
      $error_msg = 'UPDATE実行エラー [実行SQL]' . $update;
    }
    //$error_msg[] = '強制的にエラーメッセージを挿入';
    // print_r($error_msg);
    //エラーメッセージ格納の有無によりトランザクションの成否を判定
    if (count($error_msg) == 0) {
        $out = '情報を更新しました'; 
        echo $out;
        $pdo->commit();	// 正常に終了したらコミット
        
        
    } else {
        $out = $out . '更新が失敗しました。';
        echo $out; 
        $pdo->rollback();	// エラーが起きたらロールバック
        echo "エラーコードコピーし、貼り付けてヘルプデスクにお伝えください";
        echo "<a href=https://portfolio.dc-itex.com/nagoya/0005/htdocs/gazou/work39.php>画像管理ページ</a>";
        exit();
        
    }
    // 5秒後画像管理ページに自動で戻る
    header("location:work39.php");
  }