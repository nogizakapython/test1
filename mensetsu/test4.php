<!--   施設見学管理システム -->
<!--   新規作成  2022/06/18-->
<!--   作成者  乃木坂好きのITエンジニア-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="bukken.css"--> 
    <title>施設見学管理Webアプリ</title>
    
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
		$sql  = "DELETE FROM sample3 WHERE id = :delete_id;";
		$stmt = $pdo->prepare($sql);
		$stmt -> bindValue(":delete_id", $delete_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
        
	// 受け取ったデータを書き込む
    if ((isset($_POST["name"])) && (isset($_POST["address"])) &&  (isset($_POST["div1"])) && (isset($_POST["eva"])) && (isset($_POST["detail"])))
    { 
        try{
            $name = $_POST["name"];
            $address = $_POST["address"];
            $div1 = $_POST["div1"];
            $eva = $_POST["eva"];
            $day = $_POST["day"];
            $detail = $_POST["detail"];
            //$sec = $_POST["sec"];
            //$cost = $_POST["cost"];
            $regist = $pdo->prepare("INSERT INTO sample3(name,address,div1,eva,day,detail) VALUES(:name,:address,:div1,:day,:eva,:detail)");
            $regist ->bindValue(":name", $name);
            $regist ->bindValue(":address", $address);
            $regist ->bindValue(":div1", $div1);
            $regist ->bindValue(":eva", $eva);
            $regist ->bindValue(":day", $day);
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

	<h1>施設見学管理Webアプリケーション</h1> 
    
    <h2>データ入力フォーム</h2>
	<form id = "entry" action="test4.php" method="post" role="form">
        <div class="form-group">
            <dd>施設名を入力してください
            <dd> <label>名前</label></dd>
            <dd> <input type="text" name="name" id="name" cols="40" size="50"></dd>
        </div>
        <div class="form-group">
            <dd>見学した施設の住所を入力してください
            <dd> <label>住所</label></dd>
            <dd> <input type="text" name="address" id="address" cols="100" size="100"></dd>
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
            <dd>感想を選んでください
            <dd> <label>感想</label></dd>
            <dd><select name="eva">
                <option value="とても良い">とても良い</option>
                <option value="良い">良い</option>
                <option value="普通">普通</option>
                <option value="悪い">悪い</option>
                <option value="とても悪い">とても悪い</option>
            </select>    
            </dd>
        </div>
        <div class="form-group">
            <dd>見学した日付を入力してください
            <dd> <label>名前</label></dd>
            <dd> <input type="date" name="day" id="day"></dd>
        </div>
        <div class="form-group">
            <dd>詳細
            <dd> <label>詳細</label></dd>
            <dd> <textarea name="detail" rows="10" cols="100"></textarea></dd>    
        </div>
        <p></p>
        <button type="submit" id="submit">データ登録</button>
     
	</form>
    <br>
    <br>
    
    <h2>一覧リスト</h2>
	<?php
	   // データベースからデータを取得する
       $sql = "SELECT id,name,address,div1,eva,day,detail FROM sample3 ORDER BY id DESC;";
	   $stmt = $pdo->prepare($sql);
	   $stmt -> execute();
	?>
	<table>
		<tr>
            <th>id</th>
            <th>施設名</th>
            <th>施設の住所</th>
			<th>区分</th>
			<th>感想</th>
			<th>見学日</th>
			<th>詳細</th>
            
		</tr>
		<?php
		// 取得したデータを表示する
		  while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
			 <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["eva"] ?></td>
                <td><?= $row["div1"] ?></td>
                <td><?= $row["day"] ?></td>
                <td><?= $row["detail"] ?></td>
                 
				
				<td>
                    <form action="test4.php" method="post">
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
