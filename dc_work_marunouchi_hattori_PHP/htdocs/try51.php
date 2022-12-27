<!-- 定数の定義 -->
<!-- 新規作成 2022/12/27 -->
<!-- program name try51.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY51</title>
</head>
<body>
  <?php
    // 定数の定義
    define('TAX_RATE',0.1);
    define('COMPANY_NAME',"ディーキャリア株式会社");

    function echo_const($price){
      echo "<p>税込価格は".($price + $price * TAX_RATE). "円です</p>";
      echo "<p>会社名" . COMPANY_NAME . "</p>";
    }

    echo_const(1000);
  ?>
</body>
</html>