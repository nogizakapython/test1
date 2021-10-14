<!--   引きこもり悪徳業者一覧管理システム -->
<!--   新規作成  2021/07/22-->
<!--   作成者  乃木坂好きのITエンジニア-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="hikikomori.css"-->
    <title>ひきこもり支援悪徳業者一覧管理システム</title>
    <script type="text/javascript"> 
        function check(){
            //変数の定義
            const company = document.getElementById('company');
            const submit = document.getElementById('submit');
  
            if(company.value.replace(/\s+/, '').length == 0 ){
                alert('運営会社名が入力されていません。');
                return false;
            } else {
                if(window.confirm('送信してよろしいですか？')){ // 確認ダイアログを表示

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
		$sql  = "DELETE FROM hikikomori WHERE id = :delete_id;";
		$stmt = $pdo->prepare($sql);
		$stmt -> bindValue(":delete_id", $delete_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
        
	// 受け取ったデータを書き込む
    if ((isset($_POST["company"])) && (isset($_POST["address"])) && (isset($_POST["hiyou"])))
    { 
        try{
            $company = $_POST["company"];
            $address = $_POST["address"];
            $hiyou = $_POST["hiyou"];
            $regist = $pdo->prepare("INSERT INTO hikikomori(company,address,hiyou) VALUES(:company,:address,:hiyou)");
            $regist ->bindValue(":company", $company);
            $regist ->bindValue(":address", $address);
            $regist ->bindValue(":hiyou", $hiyou);
            $regist->execute();
        } catch(PDOException $e) {
            echo "例外処理が発生しました";
            echo $e->getMessage();
        }
    }
    ?>

	<h1>引きこもり悪徳業者一覧アプリケーション</h1> 
    
    <h2>引きこもり悪徳業者一覧入力フォーム</h2>
	<form id = "entry" action="hikikomori.php" method="post" role="form" onSubmit= "return check()">
        <div class="form-group">
            <dd>ひきこもり悪徳業者名を入力してください
            <dt> <span class="must"> * </span></dt>     
            <dd> <label>ひきこもり悪徳業者名</label></dd>
            <dd> <input type="text" name="company" id="company"></dd>
        </div>
        <div class="form-group">
            <dd>住所を入力してください
            <dd> <label>住所</label></dd>
            <dd> <input type="text" name="address" id="address"></dd>
        </div>
        <div class="form-group">
            <dd>月額の費用を入力してください
            <dd> <label>月額の費用</label></dd>
            <dd> <input type="text" name="hiyou"></dd>
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
    <a href="hikikomori_ichiran.php" class="ichi">ひきこもり支援悪徳業者一覧</a>
    <h2>一覧リスト</h2>
	<?php
	   // データベースからデータを取得する
       $sql = "SELECT id,company,address,hiyou FROM hikikomori ORDER BY id DESC;";
	   $stmt = $pdo->prepare($sql);
	   $stmt -> execute();
	?>
	<table>
		<tr>
            <th>id</th>
			<th>ひきこもり支援悪徳業者名</th>
			<th>住所</th>
			<th>月額費用</th>
        </tr>
		<?php
		// 取得したデータを表示する
		  while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
			 <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["company"] ?></td>
                <td><?= $row["address"] ?></td>
				<td><?= $row["hiyou"] ?></td>
				<td>
                    <form action="hikikomori.php" method="post">
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
