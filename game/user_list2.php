<!-- スフィアンマスターズモンスター検索プログラム -->
<!-- 新規作成  2021/12/27  -->
<!-- 作成者 乃木坂好きのITエンジニア -->

<?php
try{
    //DBに接続
    $dsn = 'mysql:dbname=game;host=127.0.0.1;charset=utf8';
    $username = 'root';
    $password = '';
    
    
    $pdo = new PDO($dsn, $username, $password);
    
    //SQL文
    
    $stmt = $pdo->prepare(" SELECT * FROM info WHERE  name LIKE '%" . $_POST["name"] . "%' ");
    //実行する
    $stmt->execute();
    //echo "OK";
    echo "<br>";
	} catch(PDOException $e){
		echo "失敗:" . $e->getMessage() . "\n";
		exit();
	}
?>


<!-- user_list2.php -->
<html>
    <head>
        <h1 id="hyodai">検索結果</h1>
        <link rel="stylesheet" href="css/main2.css">
    </head>
    <body>
       <table>
            <tr><th>ID</th><th>モンスター名</th><th>配合</th></tr>
            <!-- ここでPHPのforeachを使って結果をループさせる -->
            <?php foreach ($stmt as $row): ?>
                <tr>
                	<td><?php echo $row[0]?></td>
                	<td><?php echo $row[1]?></td>
                    <td><?php echo $row[2]?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="index2.php" class="return">検索フォームに戻る</a>
    </body>
</html>
