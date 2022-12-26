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
        h1 {
            font-size:30px;
            color:#000;
        }
        #out {
            font-size:16px;
            color:#F00;
        }

        body {
            width:840px;
            max-width:840px;
        }
             
        body .disp1{
            margin-top:30px;
            width:820px;
            display:flex;
            background-color: #FFF;
        }
        body .disp1 .example1 {
            width:240px;
            margin-left:20px;
            border: solid 3px #6091d3;/*線*/
            border-radius: 10px;/*角の丸み*/
        }
        body .disp1 .example1 .pic1 {
            width:220px;
            font-size:14px;
            height:20px;
            background-color:#FFF;
            padding: 0px 10px;
        }
        
        body .disp1 .example1 .test1 {
            width:220px;
            height:200px;
            padding: 0px 10px;
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
          echo "<div class=example1>";
          echo "<p class=pic1>" . $row["image_name"] . "</p>";
          echo "<img class=test1 src=https://portfolio.dc-itex.com/nagoya/0005/htdocs/img/" . $row["image_name"] . ">";
          echo "</div>";
        }
        $result->close();
      }
      echo "</div>";
      
  ?> 
  <a href="https://portfolio.dc-itex.com/nagoya/0005/htdocs/work30.php" class="test2">投稿ページに戻る</a>     
</body>
      
</html>