<!-- global関数の使い方 -->
<!-- 新規作成 2022/12/27 -->
<!-- program name try50.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY50</title>
</head>
<body>
  <?php
      // グローバル関数
      $global_variable = "グローバル変数";

      function set_local_variable(){
        $local_variable = "ローカル変数";
        echo "<p>関数内のローカル変数：" . $local_variable . "</p>";
        // 関数内でグローバル変数使用の宣言
        global $global_variable;
        echo "<p>関数内のグローバル変数：" . $global_variable . "</p>";
      }

      echo set_local_variable();
      echo "<p>関数外のグローバル変数：" . $global_variable . "</p>";
      echo "<p>関数外のローカル変数：" . $local_variable . "</p>";
  ?>
</body>
</html>