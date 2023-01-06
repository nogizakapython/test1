<!--   求人データ一覧システム -->
<!--   新規作成  2023/01/06-->
<!--   作成者  Takao Hattori-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="rireki.css">
    <title>就職管理Webアプリ</title>
</head>
    
<!--  ボディー部分-->    
<body>
    
	<h1>求人データ一覧</h1> 
    <h2>結果リスト</h2>
	<?php
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=job;charset=utf8", "root", "");
	// データベースからデータを取得する
    try{
	   $sql = "SELECT id,year,month,day,company,dankai,detail FROM job;";
	   $stmt = $pdo->prepare($sql);
	   $stmt -> execute();
    } catch(PDOException $e){
        echo "例外処理が発生しました";
        echo $e->getMessage();    
    }    
	?>
		<table>
		<tr>
            <th>id</th>
			<th>年</th>
			<th>月</th>
			<th>日</th>
            <th>企業名</th>
            <th>採用の段階</th>
            <th>面接の振り返り</th>
        </tr>
		<?php
		// 取得したデータを表示する
		while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["year"] ?></td>
                <td><?= $row["month"] ?></td>
				<td><?= $row["day"] ?></td>
				<td><?= $row["company"] ?></td>
                <td><?= $row["dankai"] ?></td>
                <td><?= $row["detail"] ?></td>
            </tr> 
        <?php } ?>
    </table>    
    <a href="saiyo.php" id="return">入力画面に戻る</a>
</body>
<footer>
    <p class="hattori"> by Takao Hattori</p>
</footer>
</html>
