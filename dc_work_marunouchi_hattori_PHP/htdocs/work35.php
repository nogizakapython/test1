<!-- 引数が偶数なら10倍、奇数なら100倍にして返す関数 -->
<!-- 新規作成 2022/12/27 -->
<!-- Program code work35.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK35</title>
</head>
<body>
  <?php
      // 引数が偶数なら10をかけて、引数が奇数なら100をかけて、返り値を返す関数
      function calc($num){
        if($num % 2 == 0){
          $ans = $num * 10;
        } else {
          $ans = $num * 100;
        }
        return $ans;
      }
      // 引数を設定して関数を呼び出して、返り値を変数に格納する
      $result_num = calc(rand(1,10));
      // ブラウザに出力する
      echo $result_num;

  ?>  
</body>
</html>