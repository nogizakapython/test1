<?php
  $host = 'mysql34.conoha.ne.jp';
  $login_user = 'bcdhm_nagoya_pf0005';
  $password = 'Mt3!+qa_';
  $database = 'bcdhm_nagoya_pf0005';
  $error_msg = [];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
     .disp1{
            margin-top:30px;
            width:700px;
            height:240px;
            display:flex;
        }
        .pic1 {
            width:90px;
            font-size:14px;
        }
        .test1{
            width:200px;
        }
        .test2{
          width:250px;
          font-size:20px;
          color:#2F09C1;
        }
  </style>  
</head>
<body>
  <?php
      $db = new mysqli($host, $login_user, $password, $database);
      if ($db->connect_error){
        echo $db->connect_error;
        exit();
      } else {
        $db->set_charset("utf8");
      }
      $sql = "select image_name from pictable where public_flg = 1 order by image_id";
      echo "<div class=disp1>";
      if($result = $db->query($sql)) {
        foreach ($result as $row){
          echo "<p class=pic1>" . $row["image_name"] . "</p>";
          echo "<img class=test1 src=https://portfolio.dc-itex.com/nagoya/0005/htdocs/img/" . $row["image_name"] . ">";
        }
        $result->close();
      }
      echo "</div>";
      echo "<br>";
  ?> 
  <a href="https://portfolio.dc-itex.com/nagoya/0005/htdocs/gazou1.php" class="test2">投稿ページに戻る</a>     
</body>
      
</html>