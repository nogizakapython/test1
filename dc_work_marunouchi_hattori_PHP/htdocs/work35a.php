<!-- 定数のWORKプログラム作成 -->
<!-- 新規作成 2022/12/27 -->
<!-- Program name work35a.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK35A</title>
  <style>
    .test1 {
      color:#F00;
      font-weight:bold;
    }
  </style>  
</head>
<body>
  <?php
      // チーム名を定義する。
      define('TEAM_NAME','really?Madrid');
      // 加わる人数を定義する
      define('ADD',10);

      // チームに関する関数 
      function echo_team($person){
        echo "<p>チーム名は<span class=test1>" . TEAM_NAME . "</span>です</p>";
        echo "<p>現在所属人数は" . $person . "人で、来月" . ($person + ADD) . "人になります。</p>";
      }
      // 関数の呼び出し
      echo_team(30);

  ?>
</body>
</html>