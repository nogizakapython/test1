<?php
      // 変数の定義
      $error_msg = [];
      $out = "";
      $date = date("Y-m-d");
      $create_date = $date;
      $flag = 0;
      // work39Model.phpを読み込む
      require 'work39Model.php';  

      if($_POST['submit']){
        $out = "";
        if(isset($_POST['picname'] ) && $_POST['picname'] != ""){
          $str = $_POST['picname'];
          if(preg_match("/^[a-zA-Z0-9-_.]+$/", $str)){
              $flag += 1;
          } else {
              $out =  $out . "半角英数字以外の文字が入力されています。";
          }    
        } else {
          $out = $out . "画像名が入力されていません";
        }
        if(isset($_FILES['upfile'])){
            $save = 'img/' . basename($_FILES['upfile']['name']);
            $check = basename($_FILES['upfile']['name']);
            // echo $check;
            if(preg_match('/\.(jpe?g|png)\z/i', $check) == 1){
              if($str == $check){
                  $flag += 1;
              } else {
                  $out = $out . "ファイル名が一致していません";
              }    
            } else {
              $out = $out . "不正な拡張子です";
            }    
         } else {    
            $out = $out . 'ファイルが選択されていません';
         }
      }

      if($flag != 2){
        echo $out;
        echo "<br>";
        echo '<a href="http://localhost/gazou/work39.php">管理画面に戻る</a>';
        exit();
      }
      //ファイルを保存先ディレクトリに移動させる
      if(move_uploaded_file($_FILES['upfile']['tmp_name'], $save)){
          $out = $out . 'アップロード成功しました。';
      }else{
          $out = $out . 'アップロード失敗しました。';
      }
      $pdo = get_connection();
    
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['picname'])) {
          $image_name = $_POST['picname'];
        }
          $public_flag = 1;
          $create_date = $date;
          $pdo->begintransaction();	// トランザクション開始
    
          //INSERT文の実行
          $insert = "INSERT INTO pictable1(image_name,public_flg,create_date,update_date) VALUE 
            ('{$image_name}',{$public_flag}, '{$create_date}','{$create_date}');";
          if($result = $pdo->query($insert)) {
              $row = $pdo->affected_rows;
          } else {
              $out = $out . 'INSERT実行エラー [実行SQL]' . $insert;
          }
              //$error_msg[] = '強制的にエラーメッセージを挿入';
              
              //エラーメッセージ格納の有無によりトランザクションの成否を判定
          if (count($error_msg) == 0) {
              $out = $out . $row.'件追加しました。';
              echo $out; 
              $pdo->commit();	// 正常に終了したらコミット
              
                      
          } else {
              $out = $out . '追加が失敗しました。'; 
              $pdo->rollback();	// エラーが起きたらロールバック
              echo $out;
              echo "エラーコードコピーし、貼り付けてヘルプデスクにお伝えください";
              echo "<a href=http://localhost/gazou/work39.php>画像管理ページ</a>";
              
          }
          // 5秒後画像管理ページに自動で戻る
          header("location:work39.php");
              
      }    
      