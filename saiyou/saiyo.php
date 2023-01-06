<!--   求人採用経過システム -->
<!--   新規作成  2021/05/23-->
<!--   作成者  Takao Hattori-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="saiyo.css"-->
    <title>求人採用面談振り返りシステム</title>
    <script type="text/javascript"> 
    

        function check(){
            //変数の定義
            const company = document.getElementById('company');
            const dankai = document.getElementById('dankai');
            const detail = document.getElementById('detail');
            const submit = document.getElementById('submit');
               
        
            if((company.value.replace(/\s+/, '').length == 0 ) && (dankai.value.replace(/\s+/, '').length == 0 ) && (detail.value.replace(/\s+/, '').length == 0 )){
                window.alert('会社名、採用段階、面接の振り返りが入力されていません。');
                return false;
            } else if ((company.value.replace(/\s+/, '').length == 0 ) && (dankai.value.replace(/\s+/, '').length == 0 )){
                window.alert('会社名、採用段階が入力されていません。');
                return false;
            } else if ((company.value.replace(/\s+/, '').length == 0 ) && (detail.value.replace(/\s+/, '').length == 0 )){
                window.alert('会社名、面接の振り返りが入力されていません。');
                return false;
            } else if ((dankai.value.replace(/\s+/, '').length == 0 ) && (detail.value.replace(/\s+/, '').length == 0 )){
                window.alert('採用段階、面接の振り返りが入力されていません。');
                return false;
            } else if (company.value.replace(/\s+/, '').length == 0){
                window.alert('会社名が入力されていません。');
                return false;    
            } else if (dankai.value.replace(/\s+/, '').length ==0){
                window.alert('採用段階入力されていません。');
                return false;
            }  else if (detail.value.replace(/\s+/, '').length ==0){
                window.alert('面接の振り返りが入力されていません。');
                return false;
            } else {
                if(window.confirm('送信してよろしいですか？')){ // 確認ダイアログを表示
                    return true; // 「OK」時は送信を実行
	             }else{ // 「キャンセル」時の処理
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
	$pdo = new PDO("mysql:host=127.0.0.1;dbname=job;charset=utf8", "root", "");
	// print_r($_POST);
    
    // 受け取ったデータのレコードを削除する
    if (isset($_POST["delete_id"])) {
		$delete_id = $_POST["delete_id"];
		$sql  = "DELETE FROM job WHERE id = :delete_id;";
		$stmt = $pdo->prepare($sql);
		$stmt -> bindValue(":delete_id", $delete_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
        
	// 受け取ったデータを書き込む
    if ((isset($_POST["year"])) && (isset($_POST["month"])) && (isset($_POST["day"])) && (isset($_POST["company"])) && (isset($_POST["dankai"])) && isset($_POST["detail"])) 
    {
       try{
            $year = $_POST["year"];
            $month = $_POST["month"];
            $day = $_POST["day"];
            $company = $_POST["company"];
            $dankai = $_POST["dankai"];
            $detail = $_POST["detail"];
            $regist = $pdo->prepare("INSERT INTO job(year,month,day,company,dankai,detail) VALUES(:year,:month,:day,:company,:dankai,:detail)");
            $regist ->bindValue(":year", $year);
            $regist ->bindValue(":month", $month);
            $regist ->bindValue(":day", $day);
            $regist ->bindValue(":company", $company);
            $regist ->bindValue(":dankai", $dankai);
            $regist ->bindValue(":detail", $detail);
            $regist->execute();
        } catch(PDOException $e) {
            echo "例外処理が発生しました";
            echo $e->getMessage();
        }
    }
    ?>

	<h1>採用面接振り返りシステム</h1> 
    
    <h2>データ入力</h2>
	<form id = "entry" action="saiyo.php" method="post" role="form" onSubmit="return check()">
        <div class="form-group">
        <dd>年を入力してください
        <dd> <input type="text" name="year"></dd>
        </div>
        <div class="form-group">
        <dd>月を入力してください
        <dd> <input type="text" name="month"></dd>
        </div>
        <div class="form-group">
        <dd>日を入力してください
        <dd> <input type="text" name="day"></dd>
        </div>
        <div class="form-group">
        <dd><label>企業名</label></dd>
		<dd><input type="text" name="company" id="company"></dd>
        </div>
        <div class="form-group">
        <dd><label>採用段階</label></dd>
		<dd><input type="text" name="dankai" id="dankai"></dd>
        </div>
        <div class="form-group">
        <dd><label>面接を受けた振り返り</label></dd>
		<dd><textarea name="detail" id="detail" cols="50" rows="10"></textarea></dd>
        </div>
        <button type="submit" id="submit" onMouseOver="changeColor()" onMouseOut="revertColor()">データ登録</button>
    </form>    
    <script>
        function changeColor(){
            document.getElementById('submit').style.backgroundColor = 'yellow';
        }

        function revertColor(){
            document.getElementById('submit').style.backgroundColor = null;
        }
        
        
    </script>
	</form>
    <a href="rireki.php" class="ichi">面接の振り返り</a>
    <h2>結果リスト</h2>
	<?php
	// データベースからデータを取得する
	$sql = "SELECT id,year,month,day,company,dankai,detail FROM job;";
	$stmt = $pdo->prepare($sql);
	$stmt -> execute();
	?>
	<table>
		<tr>
            <th>id</th>
			<th>年</th>
			<th>月</th>
			<th>日</th>
            <th>企業名</th>
            <th>採用段階</th>
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
                <td>
                    <form action="saiyo.php" method="post">
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
    <p class="hattori"> by Takao Hattori</p>
</footer>
</html>
