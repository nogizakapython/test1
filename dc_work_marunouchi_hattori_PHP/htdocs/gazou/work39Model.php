<!-- 新規作成 2023/1/11 -->
<!-- Program code work39Model.php -->
<!-- 各データの処理を関数化する -->

<?php
/**
 * 
 * DB接続を行い、PDOインスタンスを返す
 * 
 *  @return Object $pdo
 * 
 * 
 */
 function get_connection() {
  try{
    // PDOインスタンスの生成
    $pdo = new PDO ('mysql:host=mysql34.conoha.ne.jp;dbname=bcdhm_nagoya_pf0005;charset=utf8','bcdhm_nagoya_pf0005','Mt3!+qa_');
  } catch (PDOException $e){
    echo $e->getMessage();
    exit();
  }          
  
  return $pdo;
 }

/**
* SQL文を実行・結果を配列で取得する
*
* @param object $pdo
* @param string $sql 実行されるSQL文章
* @return array 結果セットの配列
*/
function get_sql_result($pdo, $sql) {
  $data = [];
  if ($result = $pdo->query($sql)) {
    if ($result->rowCount() > 0) {
      while ($row = $result->fetch()) {
        $data[] = $row;
      }
    }
  }
  return $data;
}

/**
* 全画像データの取得
* 
* @param object 
* @return array
*/
function get_data_list($pdo) {
  $sql = 'SELECT product_name, price FROM product';
  return get_sql_result($pdo, $sql);
}

/**
* htmlspecialchars（特殊文字の変換）のラッパー関数
*
* @param string 
* @return string 
*/
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
 
/**
* 特殊文字の変換（二次元配列対応）
* 
* @param array
* @return array 
*/
function h_array($array) {
  //二次元配列をforeachでループさせる
  foreach ($array as $keys => $values) {
    foreach ($values as $key => $value) {
      //ここの値にh関数を使用して置き換える
      $array[$keys][$key] = h($value);
    }
  }
  return $array;
}


