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
		$sql  = "DELETE FROM sample1 WHERE id = :delete_id;";
		$stmt = $pdo->prepare($sql);
		$stmt -> bindValue(":delete_id", $delete_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
        
	// 受け取ったデータを書き込む
    if ((isset($_POST["name"])) && (isset($_POST["age"])) && (isset($_POST["sec"])))
    { 
        try{
            $name = $_POST["name"];
            $age = $_POST["age"];
            $sec = $_POST["sec"];
            //$cost = $_POST["cost"];
            $regist = $pdo->prepare("INSERT INTO sample1(name,age,sec) VALUES(:name,:age,:sec)");
            $regist ->bindValue(":name", $name);
            $regist ->bindValue(":age", $age);
            $regist ->bindValue(":sec", $sec);
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
	<form id = "entry" action="test.php" method="post" role="form">
        <div class="form-group">
            <dd>名前を入力
            <dd> <label>名前</label></dd>
            <dd> <input type="text" name="name" id="name"></dd>
        </div>
        <div class="form-group">
            <dd>年齢を入力
            <dd> <label>年齢</label></dd>
            <dd> <input type="text" name="age" id="age"></dd>
        </div>
        <div class="form-group">
            <dd>性別
            <dd> <label>性別</label></dd>
            <dd> <select name="sec">
                <option value="M">男</option>
                <option value="W">女</option>
            </select></dd>    
        </div>
        <p></p>
        <button type="submit" id="submit">データ登録</button>
     
	</form>
    <br>
    <br>
    <a href="bukken_ichiran.php" class="bukken_ichiran">一覧表</a>
    <h2>一覧リスト</h2>
	<?php
	   // データベースからデータを取得する
       $sql = "SELECT id,name,age,sec FROM sample1 ORDER BY id DESC;";
	   $stmt = $pdo->prepare($sql);
	   $stmt -> execute();
	?>
	<table>
		<tr>
            <th>id</th>
			<th>名前</th>
			<th>年齢</th>
            <th>性別</th>
		</tr>
		<?php
		// 取得したデータを表示する
		  while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
			 <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["age"] ?></td>
                <td><?= $row["sec"] ?></td> 
				
				<td>
                    <form action="test.php" method="post">
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
