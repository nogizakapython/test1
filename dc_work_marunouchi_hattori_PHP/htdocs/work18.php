<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK18</title>
</head>
<body>
<?php
  define('MAX',3); // 1ページの表示数
 
  $customers = array( // 表示データの配列
          array('name' => '佐藤', 'age' => '10'),
          array('name' => '鈴木', 'age' => '15'),
          array('name' => '高橋', 'age' => '20'),
          array('name' => '田中', 'age' => '25'),
          array('name' => '伊藤', 'age' => '30'),
          array('name' => '渡辺', 'age' => '35'),
          array('name' => '山本', 'age' => '40'),
            );
            
  $customers_num = count($customers); // トータルデータ件数
 
  $max_page = ceil($customers_num / MAX); // トータルページ数 ceilは数値を切り上げる関数
  

  // データ表示、ページネーションを実装
  if(!isset($_GET['page_id'])){
    $now = 1;
  } else {
    $now = $_GET['page_id'];
  }

  // 配列の何番目から取得すればよいか
  $start_no = ($now - 1) * MAX;
  

  // array_slice(配列の何番目から何番目までを切り取る関数)
  $disp_data = array_slice($customers,$start_no,MAX,true);

  // データ表示
  foreach($disp_data as $val){
    echo $val['name']. ' '.$val['age'] . '<br />';
  }

  for($j=1;$j <= $max_page;$j++){
    if ($j == $now){
      echo $now . ' ';
    } else {
      echo "<a href='/nagoya/0005/htdocs/work18.php?page_id=$j'" . '>' . $j . '</a>' . ' ';
    }  
  }
  
?>

</body>
</html>