<!--   就職活動記録管理システム -->
<!--   新規作成  2023/01/11-->
<!--   作成者  乃木坂好きのITエンジニア-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/syukatsu.css"--> 
    <title>就職活動管理Webアプリ</title>
    <script type="text/javascript">
        function check(){
            
            var msg = new Array(); 
            const name = document.getElementById('name');
            const address = document.getElementById('address');
            const submit = document.getElementById('submit');
            if (name.value.replace(/\s+/, '').length == 0 ){
                var count = msg.length;
                msg[count] = "施設名";
            }
            if (address.value.replace(/\s+/, '').length == 0 ){
                var count = msg.length;
                msg[count] = "住所";
            }
            
            var count=msg.length;
            if(count > 0){
                for(var i=0;i<msg.length;i++){
                    alert(msg[i] + "が入力されていません");
                }

                return false;
            } else {
                if(window.confirm('データを入力してよろしいですか？')){ // 確認ダイアログを表示

                  return true; // 「OK」時は送信を実行

                } else { // 「キャンセル」時の処理

                  window.alert('キャンセルされました'); // 警告ダイアログを表示
                  return false; // 送信を中止
               }
            }        

        }
    </script>    
    
</head>
    
<!--  ボディー部分-->    
<body>
    <?php
	// データベースに接続する
	$pdo = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8", "root", "");
	// print_r($_POST);
    
    // 受け取ったデータのレコードを削除する
    if (isset($_POST["delete_id"])) {
		$delete_id = $_POST["delete_id"];
		$sql  = "DELETE FROM sample4 WHERE id = :delete_id;";
		$stmt = $pdo->prepare($sql);
		$stmt -> bindValue(":delete_id", $delete_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
        
	// 受け取ったデータを書き込む
    if ((isset($_POST["name"])) && (isset($_POST["address"])) &&  (isset($_POST["div1"])) && (isset($_POST["eva"])) && (isset($_POST["day"])) && (isset($_POST["detail"])))
    { 
        try{
            $name = $_POST["name"];
            $address = $_POST["address"];
            $div1 = $_POST["div1"];
            $eva = $_POST["eva"];
            //echo $eva . "\n";
            $day = $_POST["day"];
            $detail = $_POST["detail"];
            //$sec = $_POST["sec"];
            //$cost = $_POST["cost"];
            $regist = $pdo->prepare("INSERT INTO sample4(name,address,div1,eva,day,detail) VALUES(:name,:address,:div1,:eva,:day,:detail)");
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

	<h1>就職活動管理Webアプリケーション</h1> 
    
    <h2>データ入力フォーム</h2>
	<form id = "entry" action="input.php" method="post" role="form" onSubmit= "return check()">
        <div class="form-group">
            <dd><label>企業名を入力してください<label></dd>
            <!--<dd> <label>名前</label></dd>-->
            <dd> <input type="text" name="name" id="name"></dd>
        </div>
        <div class="form-group">
            <dd><label>就職活動する企業の住所を入力してください<label></dd>
            <!--<dd> <label>住所</label></dd>-->
            <dd> <input type="text" name="address" id="address"></dd>
        </div>
        <div class="form-group">
            <dd><label>区分を選んでください</label></dd>
            <!--<dd> <label>区分</label></dd>-->
            <dd>
                <select name="div1" id="div1">
                    <option value="一般雇用">一般雇用</option>
                    <option value="障害者雇用">障害者雇用</option>
                </select>    
            </dd>
        </div>
        <div class="form-group">
            <dd><label>感想を選んでください</label></dd>
            <!--<dd> <label>感想</label></dd>-->
            <dd><select name="eva" id="eva">
                <option value="とても良い">とても良い</option>
                <option value="良い">良い</option>
                <option value="普通">普通</option>
                <option value="悪い">悪い</option>
                <option value="とても悪い">とても悪い</option>
            </select>    
            </dd>
        </div>
        <div class="form-group">
            <dd>就職活動した日付を入力してください
            <dd> <label>日付</label></dd>
            <dd> <input type="date" name="day" id="day"></dd>
        </div>
        <div class="form-group">
            <dd> <label>詳細</label></dd>
            <dd> <textarea name="detail" id="detail"></textarea></dd>    
        </div>
        <p></p>
        <button type="submit" id="submit">データ登録</button>
     
	</form>
    <br>
    <br>
    
    <h2>一覧リスト</h2>
	<?php
	   // データベースからデータを取得する
       $sql = "SELECT id,name,address,div1,eva,day,detail FROM sample4 ORDER BY id DESC;";
	   $stmt = $pdo->prepare($sql);
	   $stmt -> execute();
	?>
	<table>
		<tr>
            <th>id</th>
            <th>会社名</th>
            <th>会社の住所</th>
			<th>区分</th>
			<th>感想</th>
			<th>記録日</th>
			<th>詳細</th>
            
		</tr>
		<?php
		// 取得したデータを表示する
		  while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
			 <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["div1"] ?></td>
                <td><?= $row["eva"] ?></td>
                <td><?= $row["day"] ?></td>
                <td><?= $row["detail"] ?></td>
                 
				
				<td>
                    <form action="input.php" method="post">
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
