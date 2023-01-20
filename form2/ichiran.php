<!--   テキストエリア入力テスト -->
<!--   新規作成  2021/11/24-->
<!--   作成者  乃木坂好きのITエンジニア-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="ichiran.css">
    <title>テキストエリア表示</title>
</head>
    
<!--  ボディー部分-->    
<body>
    
	<h1>書き込み一覧</h1> 
    <h2>投稿一覧</h2>
	<?php
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");
	// データベースからデータを取得する
    try{
	   $sql = "SELECT hiduke,name,category,description FROM contents1";
	   $stmt = $pdo->prepare($sql);
	   $stmt -> execute();
    } catch(PDOException $e){
        echo "例外処理が発生しました";
        echo $e->getMessage();    
    }    
	?>
		<table border="1">
		<tr>
			<th>date</th>
            <th>name</th>
			<th>category</th>
			<th>description</th>
        </tr>
		<?php
		// 取得したデータを表示する
		while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td><?= $row["hiduke"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["category"] ?></td>
                <td><?= $row["description"] ?></td>
            </tr> 
        <?php } ?>
    </table>    
    <a href="form.html" id="return">入力画面に戻る</a>
</body>
<footer>
</footer>
</html>
