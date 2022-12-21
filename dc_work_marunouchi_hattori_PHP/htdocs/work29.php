<?php
  $host = 'mysql34.conoha.ne.jp';
  $login_user = 'bcdhm_nagoya_pf0005';
  $password = 'Mt3!+qa_';
  $database = 'bcdhm_nagoya_pf0005';
  $error_msg = [];
  $product_id;
  $product_code;
  $product_name;
  $price;
  $category_id;
  $product_id_val;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORK29</title>
</head>
<body>
  <?php
        // データベースへ接続
        $db = new mysqli($host, $login_user, $password, $database);
        if ($db->connect_error){
            echo $db->connect_error;
            exit();
        } else {
            $db->set_charset("utf8");
        }

        if($_SERVER["REQUEST_METHOD"] == "POST") {
             if (isset($_POST['price'])) {
                 $price = $_POST['price'];
             }
            $db->begin_transaction();	// トランザクション開始

            //INSERT文の実行
            $insert = "INSERT INTO product(product_id,product_code,product_name,price,category_id) VALUE 
            (21,1021,'エシャロット',200,1);";
            if($result = $db->query($insert)) {
                $row = $db->affected_rows;
            } else {
                $error_msg[] = 'INSERT実行エラー [実行SQL]' . $insert;
            }
            //$error_msg[] = '強制的にエラーメッセージを挿入';

            //エラーメッセージ格納の有無によりトランザクションの成否を判定
            if (count($error_msg) == 0) {
                echo $row.'件更新しました。'; 
                $db->commit();	// 正常に終了したらコミット
            } else {
                echo '更新が失敗しました。'; 
                $db->rollback();	// エラーが起きたらロールバック
            }
            // 下記はエラー確認用。エラー確認が必要な際にはコメントを外してください。
            //var_dump($error_msg); 
        }

        $select = "SELECT product_id, product_code, product_name, price, category_id FROM product WHERE product_id = 21;";
        if ($result = $db->query($select)) {
            // 連想配列を取得
            while ($row = $result->fetch_assoc()) {
                $product_id = $row["product_id"];
                $product_code = $row["product_code"];
                $product_name = $row["product_name"];
                $price = $row["price"];
                $category_id = $row["category_id"];
            }
            // 結果セットを閉じる
            $result->close();
        }
        if($product_id != 21 ){
            $product_id_val = 21;
        } else {
            $product_id_val = $product_id;
        }
        $db->close();		// 接続を閉じる

    ?>
    <form method="post">
        <p>現在、商品コード<?php echo $product_id_val ?>の名前は<?php echo $product_name ?>です。</p>
        <input type="radio" name="product_id" value="<?php echo $product_id_val ?>" checked>商品コード21のデータを挿入します。
        <input type="submit" value="追加">
    </form>
</body>
</html>