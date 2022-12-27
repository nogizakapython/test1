<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRY49</title>
</head>
<body>
    <?php
        // 引数なし、返り値なしの関数
        function output_function(){
          echo "<p>引数なし、リターンコード:なしの関数</p>";
        }
        // 引数あり、返り値なしの関数
        function output_function_num($num){
          echo "<p>引数: ${num}、リターンコード:なしの関数</p>";
        }
        // 引数あり、返り値ありの関数
        function make_function_num($num){
          $str =  "<p>引数: ${num}、リターンコード:ありの関数</p>";
          return $str;
        }


        // 引数なし、リターンコードなし関数の実行
        output_function();

        // 引数あり、リターンコードなし関数の実行
        output_function_num(10);

        // 引数あり、リターンコードあり関数の実行
        $function_num = make_function_num(10);
        echo $function_num;



        
    ?>
</body>
</html>