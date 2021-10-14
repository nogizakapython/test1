<!--   賃貸物件一覧作成システム -->
<!--   新規作成  2021/08/08-->
<!--   作成者  乃木坂好きのITエンジニア-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="ichiran.css">
    <title>賃貸物件一覧作成</title>
</head>
    
<!--  ボディー部分-->    
<body>
    
	<h1>賃貸物件一覧</h1> 
    <h2>物件リスト</h2>
	<?php
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=jissyu;charset=utf8", "root", "");
	// データベースからデータを取得する
    try{
	   $sql = "SELECT id,name,address,station,cost FROM bukken;";
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
			<th>物件名</th>
			<th>住所</th>
            <th>最寄り駅</th>
			<th>一ヶ月の家賃</th>
        </tr>
		<?php
		// 取得したデータを表示する
		while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["station"] ?></td>
				<td><?= $row["cost"] ?></td>
			</tr> 
        <?php } ?>
    </table>    
    <a href="bukken.php" id="return">入力画面に戻る</a>
</body>
<footer>
    <p class="hattori"> by 乃木坂好きのITエンジニア</p>
</footer>
</html>
