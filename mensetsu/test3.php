<!--   賃貸物件一覧管理システム -->
<!--   新規作成  2021/08/08-->
<!--   作成者  乃木坂好きのITエンジニア-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="bukken.css"--> 
    <title>テスト</title>
    
</head>
    
<!--  ボディー部分-->    
<body>
    <?php
	// データベースに接続する
	$pdo = new PDO("mysql:host=127.0.0.1;dbname=test1;charset=utf8", "root", "");
	// print_r($_POST);
    
    // 受け取ったデータのレコードを削除する
    if (isset($_POST["delete_id"])) {
		$delete_id = $_POST["delete_id"];
		$sql  = "DELETE FROM sample2 WHERE id = :delete_id;";
		$stmt = $pdo->prepare($sql);
		$stmt -> bindValue(":delete_id", $delete_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
        
	// 受け取ったデータを書き込む
    if ((isset($_POST["id"])) && (isset($_POST["div1"])) && (isset($_POST["detail"])))
    { 
        try{
            $id = $_POST["id"];
            $div1 = $_POST["div1"];
            $detail = $_POST["detail"];
            //$sec = $_POST["sec"];
            //$cost = $_POST["cost"];
            $regist = $pdo->prepare("INSERT INTO sample2(id,div1,detail) VALUES(:id,:div1,:detail)");
            $regist ->bindValue(":id", $id);
            $regist ->bindValue(":div1", $div1);
            $regist ->bindValue(":detail", $detail);
            //$regist ->bindValue(":sec", $sec);
            //$regist ->bindValue(":cost", $cost);
            $regist->execute();
        } catch(PDOException $e) {
            echo "例外処理が発生しました";
            echo $e->getMessage();
        }
    }
    ?>

	<h1>賃貸物件一覧アプリケーション</h1> 
    
    <h2>賃貸物件一覧入力フォーム</h2>
	<form id = "entry" action="test2.php" method="post" role="form">
        <div class="form-group">
            <dd>IDを入力
            <dd> <label>名前</label></dd>
            <dd> <input type="text" name="id" id="id"></dd>
        </div>
        <div class="form-group">
            <dd>区分を選んでください
            <dd> <label>区分</label></dd>
            <dd><select name="div1">
                <option value="就労移行">就労移行</option>
                <option value="就労継続A型">就労継続A型</option>
                <option value="就労継続B型">就労継続B型</option>
                <option value="一般企業">一般企業</option>
            </select>    
            </dd>
        </div>
        <div class="form-group">
            <dd>詳細
            <dd> <label>詳細</label></dd>
            <dd> <textarea name="detail" row="5" cols="30" size="70"></textarea></dd>    
        </div>
        <p></p>
        <button type="submit" id="submit">データ登録</button>
     
	</form>
    <br>
    <br>
    
    <h2>一覧リスト</h2>
	<?php
	   // データベースからデータを取得する
       $sql = "SELECT id,div1,detail FROM sample2 ORDER BY id DESC;";
	   $stmt = $pdo->prepare($sql);
	   $stmt -> execute();
	?>
	<table>
		<tr>
            <th>id</th>
			<th>区分</th>
			<th>詳細</th>
            
		</tr>
		<?php
		// 取得したデータを表示する
		  while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
			 <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["div1"] ?></td>
                <td><?= $row["detail"] ?></td>
                 
				
				<td>
                    <form action="test2.php" method="post">
						<input type="hidden" name="delete_id" value=<?= $row["id"] ?>>
						<button class="delete" type="submit">削除</button>
					</form>
                    
                </td>
                
			
			 </tr>
		  <?php } ?>

                                 
	</table>
    <a href="../index.html" class="menu">メニュー画面に戻る</a>
    
</body>
<footer>
    <p class="hattori"> by 乃木坂好きのITエンジニア</p>
</footer>
</html>
