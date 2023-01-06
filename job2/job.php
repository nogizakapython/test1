<!--   求人案件管理システム -->
<!--   新規作成  2023/01/26-->
<!--   作成者  Takao Hattori-->
<!DOCTYPE html>
<html lang="ja">

<!--  ヘッダー部分-->    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="job.css"-->
    <title>求人一覧システム</title>
    <script type="text/javascript"> 
        function check(){
            //変数の定義
            const company = document.getElementById('company');
            const address = document.getElementById('address');
            const job = document.getElementById('job');
            const submit = document.getElementById('submit');
  
            if((company.value.replace(/\s+/, '').length == 0 ) && (address.value.replace(/\s+/, '').length == 0 ) && (job.value.replace(/\s+/, '').length == 0 )){
                alert('会社名、住所、職種が入力されていません。');
            } else if ((company.value.replace(/\s+/, '').length == 0 ) && (address.value.replace(/\s+/, '').length == 0 )){
                alert('会社名、住所が入力されていません。');
            } else if ((address.value.replace(/\s+/, '').length == 0 ) && (job.value.replace(/\s+/, '').length == 0 )){
                alert('住所、職種が入力されていません。');
            } else if ((company.value.replace(/\s+/, '').length == 0 ) && (job.value.replace(/\s+/, '').length == 0 )){
                alert('会社名、職種が入力されていません。');
            } else if (company.value.replace(/\s+/, '').length == 0){
                alert('会社名が入力されていません。');
    
            } else if (address.value.replace(/\s+/, '').length ==0){
                alert('住所が入力されていません。');
            }  else if (job.value.replace(/\s+/, '').length ==0){
                alert('職種が入力されていません。');
            }  else {
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
	    $pdo = new PDO("mysql:host=127.0.0.1;dbname=job;charset=utf8", "root", "");
	    // print_r($_POST);
    
      // 受け取ったデータのレコードを削除する
      if (isset($_POST["delete_id"])) {
		    $delete_id = $_POST["delete_id"];
		    $sql  = "DELETE FROM work WHERE id = :delete_id;";
		    $stmt = $pdo->prepare($sql);
		    $stmt -> bindValue(":delete_id", $delete_id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
        
	    // 受け取ったデータを書き込む
      if ((isset($_POST["date"])) && (isset($_POST["company"])) && (isset($_POST["address"])) && (isset($_POST["job"])) && (isset($_POST["ql"])))
      { 
        try{
            $date = $_POST["date"];
            $company = $_POST["company"];
            $address = $_POST["address"];
            $job = $_POST["job"];
            $ql = $_POST["ql"];
            $regist = $pdo->prepare("INSERT INTO work(date,company,address,job,ql) VALUES(:date,:company,:address,:job,:ql)");
            $regist ->bindValue(":date", $date);
            $regist ->bindValue(":company", $company);
            $regist ->bindValue(":address", $address);
            $regist ->bindValue(":job", $job);
            $regist ->bindValue(":ql", $ql);
            $regist->execute();
        } catch(PDOException $e) {
            echo "例外処理が発生しました";
            echo $e->getMessage();
        }
    }
    ?>

	<h1>求人データシステム</h1> 
    
  <h2>データ入力</h2>
	<form id = "entry" action="job.php" method="post" role="form" onSubmit="return check()">
        <div class="form-group">
          <dt> <span class="must"> * </span></dt>     
          <dd>年月日を入力してください</dd>
          <dd> <label>年月日</label></dd>
          <dd> <input type="date" name="date"></dd>
        </div>
        <div class="form-group">
          <dt> <span class="must"> * </span></dt>    
            <dd><label>企業名</label></dd>
		      <dd><input type="text" name="company" id="company"></dd>
        </div>
        <div class="form-group">
          <dt> <span class="must"> * </span></dt>    
          <dd> <label>住所</label></dd>
          <dd> <input type="text" name="address" id="address"></dd>
        </div>
        <div class="form-group">
          <dt> <span class="must"> * </span></dt>     
          <dd><label>職種</label></dd>
		      <dd><input type="text" name="job" id="job"></dd>
        </div>
        <div class="form-group">
            <dd><label>どこで見つけたか</label></dd>
		    <input type="radio" name="ql" value="ハローワーク"> ハローワーク
            <input type="radio" name="ql" value="紹介会社"> 紹介会社   
            <input type="radio" name="ql" value="転職サイト"> 転職サイト
            <input type="radio" name="ql" value="SNS"> SNS
            <input type="radio" name="ql" value="その他"> その他
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
    <a href="job_ichiran.php" class="ichi">案件表示</a>
    <h2>結果リスト</h2>
	<?php
	  // データベースからデータを取得する
	  $sql = "SELECT id,date,company,address,job,ql FROM work;";
	  $stmt = $pdo->prepare($sql);
	  $stmt -> execute();
	?>
	<table>
		<tr>
            <th>id</th>
			      <th>年月日</th>
			      <th>企業名</th>
            <th>住所</th>
            <th>職種</th>
            <th>どこで見つけたか</th>
		</tr>
		<?php
		// 取得したデータを表示する
		while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["date"] ?></td>
                <td><?= $row["company"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["job"] ?></td>
                <td><?= $row["ql"] ?></td>
                <td>
                  <form action="job.php" method="post">
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
