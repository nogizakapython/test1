<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK19</title>
</head>
<body>
  <form method="get">
    <p>タイトルを入力してください</p>
    <input type="text" id="title" name="title">
    <p>書き込み奈用を入力してください</p>
    <input type="text" id="detail" name="detail">
    <p>書き込みボタンをクリックしてください</p>
    <input type="submit" name="submit" value="送信">
  </form>
  <?php
      $title = "";
      $detail = "";
      $ans = "";
      $file_name = "article.txt";
      $flag_T = 0;
      $flag_D = 0;

      if(isset($_GET['title'])){
          if(strlen($_GET['title']) > 0){
            $title = htmlspecialchars($_GET['title']);
          } else {
            $flag_T = 1;
          }  
      }  
      
      if(isset($_GET['detail'])){
        if(strlen($_GET['detail']) > 0){
          $detail = htmlspecialchars($_GET['detail']);
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
        $fp = fopen($file_name,"a+");
      
        fwrite($fp,$ans);

        echo "<p>正常に書き込みました。書き込み内容は下記の通りです";
        echo "<p>" . $ans . "</p>";

        fclose($fp);
      }  
      


  ?>
</body>
</html>