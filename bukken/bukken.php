<!--   賃貸物件一覧管理システム -->
<!--   新規作成  2021/08/08-->
<!--   作成者  乃木坂好きのITエンジニア-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bukken.css"-->
    <title>賃貸物件管理システム</title>
    <script type="text/javascript"> 
        function check(){
            //変数の定義
            const name = document.getElementById('name');
            const submit = document.getElementById('submit');
  
            if(name.value.replace(/\s+/, '').length == 0 ){
                alert('物件名が入力されていません。');
                return false;
            } else {
                if(window.confirm('データを入力してよろしいですか？')){ // 確認ダイアログを表示

		          return true; // 「OK」時は送信を実行

	           }  else{ // 「キャンセル」時の処理

		          window.alert('キャンセルされました'); // 警告ダイアログを表示
		          return false; // 送信を中止
               }

	       }

        }

    // -->
    </script>
</head>
    
<!--  ボディー部分-->    
<body>
    <?php
	// データベースに接続する
	$pdo = new PDO("mysql:host=127.0.0.1;dbname=jissyu;charset=utf8", "root", "");
	// print_r($_POST);
    
    // 受け取ったデータのレコードを削除する
    if (isset($_POST["delete_id"])) {
		$delete_id = $_POST["delete_id"];
		$sql  = "DELETE FROM bukken WHERE id = :delete_id;";
		$stmt = $pdo->prepare($sql);
		$stmt -> bindValue(":delete_id", $delete_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
        
	// 受け取ったデータを書き込む
    if ((isset($_POST["name"])) && (isset($_POST["address"])) && (isset($_POST["station"])) && (isset($_POST["cost"])))
    { 
        try{
            $name = $_POST["name"];
            $address = $_POST["address"];
            $station = $_POST["station"];
            $cost = $_POST["cost"];
            $regist = $pdo->prepare("INSERT INTO bukken(name,address,station,cost) VALUES(:name,:address,:station,:cost)");
            $regist ->bindValue(":name", $name);
            $regist ->bindValue(":address", $address);
            $regist ->bindValue(":station", $station);
            $regist ->bindValue(":cost", $cost);
            $regist->execute();
        } catch(PDOException $e) {
            echo "例外処理が発生しました";
            echo $e->getMessage();
        }
    }
    ?>

	<h1>賃貸物件一覧アプリケーション</h1> 
    
    <h2>賃貸物件一覧入力フォーム</h2>
	<form id = "entry" action="bukken.php" method="post" role="form" onSubmit= "return check()">
        <div class="form-group">
            <dd>物件名を入力してください
            <dt> <span class="must"> * </span></dt>     
            <dd> <label>物件名</label></dd>
            <dd> <input type="text" name="name" id="name"></dd>
        </div>
        <div class="form-group">
            <dd>住所を入力してください
            <dd> <label>住所</label></dd>
            <dd> <input type="text" name="address" id="address"></dd>
        </div>
        <div class="form-group">
            <dd>最寄り駅を入力してください
            <dd> <label>最寄り駅</label></dd>
            <dd> <input type="text" name="station" id="station"></dd>
        </div>
        <div class="form-group">
            <dd>一ヶ月の家賃を入力してください
            <dd> <label>一ヶ月の家賃</label></dd>
            <dd> <input type="text" name="cost" id="cost"></dd>
        </div>
        <p></p>
        <button type="submit" id="submit" onMouseOver="changeColor()" onMouseOut="revertColor()">データ登録</button>
        <script>
            function changeColor(){
                document.getElementById('submit').style.backgroundColor = 'yellow';
            }

            function revertColor(){
                document.getElementById('submit').style.backgroundColor = null;
            }
        
        
        </script>
	</form>
    <br>
    <br>
    <a href="bukken_ichiran.php" class="bukken_ichiran">賃貸物件一覧表</a>
    <h2>一覧リスト</h2>
	<?php
	   // データベースからデータを取得する
       $sql = "SELECT id,name,address,station,cost FROM bukken ORDER BY id DESC;";
	   $stmt = $pdo->prepare($sql);
	   $stmt -> execute();
	?>
	<table>
		<tr>
            <th>id</th>
			<th>物件名</th>
			<th>住所</th>
            <th>最寄り駅</th>
			<th>月額費用</th>
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
				<td>
                    <form action="bukken.php" method="post">
						<input type="hidden" name="delete_id" value=<?= $row["id"] ?>>
						<button class="delete" type="submit" onclick="deleted()">削除</button>
					</form>
                    
                </td>
                
			
			 </tr>
		  <?php } ?>

        <script language="javascript" type="text/javascript">
                     

                    function deleted(){

                        if(window.confirm('データを削除してよいですか？')){ // 確認ダイアログを表示

		                  return true; // 「OK」時は送信を実行

	                   }  else{ // 「キャンセル」時の処理

		                  window.alert('キャンセルされました'); // 警告ダイアログを表示
		                  return false; // 送信を中止

	                   }

                    }
        </script>            

                                 
	</table>
    <a href="../index.html" class="menu">メニュー画面に戻る</a>
    
</body>
<footer>
    <p class="hattori"> by 乃木坂好きのITエンジニア</p>
</footer>
</html>
