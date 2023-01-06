<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>関数テスト(引数とデフォルト)</title>
  <style>
      .a {
        font-size:18px;
        color:#2F7;
      }
      .b {
        font-weight: bold;
        color:#0725BA;
      }
      .c {
        font-weight: bold;
        color:#F7033C;
      }
  </style>  
</head>
<body>
  <?php
    function show($name ="梅澤美波"){
        if($name != "梅澤美波"):
          echo "<p class='a'><span class='b'>" . $name . "</span>は乃木坂46のメンバーです</p>";
        else:
          echo "<p class='a'><span class='c'>" . $name . "</span>は乃木坂46のメンバーです</p>";
        endif;  
    }
    show("秋元真夏");
    show("阪口珠美");
    show("小川彩");
    show();

  ?>

</body>
</html>