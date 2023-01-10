<?php
  /**
   * DB接続を行いPDOインスタンスを返す
   * 
   *  @return object PDO
   */
  function get_connection(){
    try{
      // PDOインスタンスの生成
      $pdo = new PDO('mysql:host=mysql34.conoha.ne.jp;dbname=bcdhm_nagoya_pf0005','bcdhm_nagoya_pf0005','Mt3!+qa_');
    } catch(PDOException $e){
      echo $e->getMessage();
      exit();
    }
    return $pdo;
  }

  /**
   * SQL文を実行・結果を配列で取得する
   * 
   * @param object $pdo
   * @param string $sql 実行されるSQL文
   * @return array 結果セットの配列
   */
  function get_sql_result($pdo,$sql){
    $data = [];
    if($result = $pdo-> query($sql)){
      if($result->rowCount() > 0){
        while($row = $result->fetch()){
          $data[] = $row;
        }
      }
    }
    return $data;
  }
  /**
   * 全商品の商品名データ取得
   * 
   * @param object
   * @return array
   */
  function get_product_list($pdo){
    $sql = 'SELECT  product_name,price FROM product';
    return get_sql_result($pdo,$sql);
  }

  /**
   * htmlspecialchars(特殊文字の変換)のラッパー関数
   * 
   * @param string
   * @return string
   */
  function h($str){
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
  }

  /**
   * 特殊文字の変換(二次元配列)
   * 
   * @param array
   * @return array
   */
  function h_array($array){
    // 二次元配列をforeach文でループさせる
    foreach ($array as $keys => $values){
      foreach($values as $key => $value){
        // ここの値にh関数を使用して置き換える
        $array[$keys][$key] = h($value);
      }
    }
    return $array;
  }
