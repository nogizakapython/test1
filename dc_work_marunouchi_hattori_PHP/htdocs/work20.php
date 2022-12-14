<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK20</title>
</head>
<body>
  <form method="post" enctype="multipart/form-data">
    <p>タイトルを入力してください</p>
    <input type="text" id="title" name="title">
    <p>書き込み内容を入力してください</p>
    <input type="text" id="detail" name="detail">
    <p>アップロードする画像ファイルを選択してください</p>
    <p><input type="file" name="up_image"></p>
    <p>書き込みボタンをクリックしてください</p>
    <input type="submit" name="submit" value="送信">
  </form>
  <?php
      $title = "";
      $detail = "";
      $ans = "";
      $file_name = "result.txt";
      $flag_T = 0;
      $flag_D = 0;

      if(isset($_POST['title'])){
          if(strlen($_POST['title']) > 0){
            $title = htmlspecialchars($_POST['title']);
          } else {
            $flag_T = 1;
          }  
      }  
      
      if(isset($_POST['detail'])){
        if(strlen($_POST['detail']) > 0){
          $detail = htmlspecialchars($_POST['detail']);
        } else {
          $flag_D = 1;
        }  
      }

      

      if($flag_T == 1 && $flag_D == 1){
        echo "タイトルと書き込み内容両方を入力してください";
        exit;
      } elseif  ($flag_T == 1 && $flag_D == 0){
        echo "タイトルを入力してください";
        exit; 
      } elseif  ($flag_T == 0 && $flag_D == 1){
        echo "書き込み内容を入力してください";
        exit;
      } else {
        $ans = $title . ":" . $detail . "\n";
        $fp = fopen($file_name,"w");
      
        fwrite($fp,$ans);

        echo "<p>正常に書き込みました。書き込み内容は下記の通りです";
        echo "<p>" . $ans . "</p>";

        fclose($fp);

        //ファイルが送信されていない場合はエラー
        if(!isset($_FILES['up_image'])){
          echo 'ファイルが送信されていません';
          exit;
        }
        $save = 'img/' . basename($_FILES['up_image']['name']);
        // ファイルを保存先ディレクトリに移動させる
        if(move_uploaded_file($_FILES['up_image']['tmp_name'], $save)){
            echo 'アップロード成功しました。';
            $file1 = basename($_FILES['up_image']['name']);
            // echo "<p>{$file1}</p>";
            // echo "<a href=/nagoya/0005/htdocs/img/{$file1}>" . "結果" . '</a>';
            echo "<br>";
            echo "<img src=./img/{$file1}>";
            
        } else {
            echo 'アップロード失敗しました。';
        }
        
      }  
      


  ?>
</body>
</html>