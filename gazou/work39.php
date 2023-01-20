<?php
       
    // work39Model.phpを読み込む
    require_once 'work39Model.php';  
    
    $date = date("Y-m-d");
    $out = '';
    $error_msg = [];
?>    
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画像投稿サイト</title>
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
             
        .disp1{
            margin-top:30px;
            width:820px;
            display:flex;
            flex-wrap:wrap;
            background-color: #FFF;
        }
        .disp1 .example1 {
            width:240px;
            margin-top:10px;
            margin-left:20px;
            border: solid 3px #6091d3;/*線*/
            border-radius: 10px;/*角の丸み*/

            
        }
        .disp1 .example1 .pic1 {
            width:220px;
            font-size:14px;
            height:20px;
            background-color:#FFF;
            padding: 0px 10px;
        }
        .disp1 .example1 .pic2 {
            width:220px;
            font-size:14px;
            height:20px;
            color:#F00;
            background-color:#808080;
            padding: 0px 10px;
        }
        .disp1 .example1 .test1{
            width:220px;
            height:200px;
            padding: 0px 10px;
        }
        .disp1 .example1 .form1{
            width:220px;
            height:40px;
            padding: 0px 10px;
            
        }
        

    </style>
</head>
<body>
    <h1>画像投稿</h1>
    <div id="out" name="out"><?php echo $out ?></div>
    <form method="post" action="work39insert.php" enctype="multipart/form-data">
        <p>画像名</p>    
        <input type="text" name="picname">
        <p>画像</p>
        <input type="file" name="upfile">
        <input type="submit" name="submit" value="送信">
    </form>
    <p>画像一覧ページへのリンク</p>
    <a href="http://localhost/gazou/work39ichiran.php">画像一覧ページへ</a>
    
    
    <?php
        $count = 0;
        $pdo = get_connection();
        $sql = "select image_id,public_flg,image_name from pictable1 order by image_id";
        if($result = $pdo->query($sql)) {
          echo "<div class=disp1>";
            
          foreach ($result as $row){
            
            echo "<div class=example1>";
            if($row['public_flg'] == 1){
                echo "<p class=pic1>" . $row["image_name"] . "</p>";
            } else {
                echo "<p class=pic2>" . $row["image_name"] . "</p>";
            } 
            echo "<img class=test1 src=http://localhost/gazou/img/" . $row["image_name"] . ">";
            echo "<br>";
            echo "<form action='work39update.php' method='post' class='form1'>";
			echo "<input type=hidden name=image_id value=" . $row['image_id'] . ">";
            echo "<input type=hidden name=public_flag value=" . $row['public_flg'] . ">";
            if ($row["public_flg"] == 1){
			    echo "<button class=update type='submit'>非表示</button>";
            } else {
                echo "<button class=update type='submit'>表示</button>";
            }    
			echo "</form>";
            echo "</div>";
            
          }
          echo "</div>";
          // $result->close();
          
      }
    ?>
</body>
</html>