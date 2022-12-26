<?php
    $host = 'mysql34.conoha.ne.jp';
    $login_user = 'bcdhm_nagoya_pf0005';
    $password = 'Mt3!+qa_';
    $database = 'bcdhm_nagoya_pf0005';
    $error_msg = [];
    $file_name = "testgazou.txt";
    $out = '';
    $flag = 0;
    $host = 'mysql34.conoha.ne.jp';
    $login_user = 'bcdhm_nagoya_pf0005';
    $password = 'Mt3!+qa_';
    $database = 'bcdhm_nagoya_pf0005';
    $error_msg = [];
    $file_name = "testgazou.txt";
    $out = '';
    $flag = 0;
    if(!file_exists($file)) {
        touch($file_name);
    }   
    $fp = fopen($file_name,'r');
    while (($content = fgets($fp)) !== false){
        $out = trim($content); 
    }
    fclose($fp);
  
    $date = date("Y-m-d");
    $fp = fopen($file_name,"w");
    if($_POST['submit']){
        $out = "";
        if(isset($_POST['picname'] ) && $_POST['picname'] != ""){
            $str = $_POST['picname'];
            if(preg_match("/^[a-zA-Z0-9-_.]+$/", $str)){
                $flag += 1;
            } else {
                $out =  $out . "半角英数字以外の文字が入力されています。";
            }    
        } else {
            $out = $out . "画像名が入力されていません";
        }
        if(isset($_FILES['upfile'])){
            $save = 'img/' . basename($_FILES['upfile']['name']);
            $check = basename($_FILES['upfile']['name']);
            // echo $check;
            if(preg_match('/\.(jpe?g|png)\z/i', $check) == 1){
                if($str == $check){
                    $flag += 1;
                } else {
                    $out = $out . "ファイル名が一致していません";
                }    
            } else {
                $out = $out . "不正な拡張子です";
            }    
        } else {    
            $fp = fopen($file_name,"w");
            $out = $out . 'ファイルが選択されていません';
        }
    }
    if ($flag != 2){        
        fputs($fp,$out);
        fclose($fp);
    } else {
        //ファイルを保存先ディレクトリに移動させる
        if(move_uploaded_file($_FILES['upfile']['tmp_name'], $save)){
            $out = $out . 'アップロード成功しました。';
        }else{
            $out = $out . 'アップロード失敗しました。';
        }
        
        $db = new mysqli($host, $login_user, $password, $database);
        if ($db->connect_error){
            echo $db->connect_error;
            exit();
        } else {
            $db->set_charset("utf8");
        }
  
        if($_SERVER["REQUEST_METHOD"] == "POST") {
             if (isset($_POST['picname'])) {
                 $image_name = $_POST['picname'];
             }
             $public_flag = 1;
             $create_date = $date;
             $db->begin_transaction();	// トランザクション開始
  
             //INSERT文の実行
             $insert = "INSERT INTO pictable(image_name,public_flg,create_date,update_date) VALUE 
            ('{$image_name}',{$public_flag}, '{$create_date}','{$create_date}');";
            if($result = $db->query($insert)) {
                $row = $db->affected_rows;
            } else {
                $out = $out . 'INSERT実行エラー [実行SQL]' . $insert;
            }
            //$error_msg[] = '強制的にエラーメッセージを挿入';
            
            //エラーメッセージ格納の有無によりトランザクションの成否を判定
            if (count($error_msg) == 0) {
                $out = $out . $row.'件追加しました。'; 
                $db->commit();	// 正常に終了したらコミット
            } else {
                $out = $out . '追加が失敗しました。'; 
                $db->rollback();	// エラーが起きたらロールバック
            }
        }    
    }
?>    
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画像投稿サイト</title>
    <style>
        h1 {
            font-size:30px;
            color:#000;
        }
        #out {
            font-size:16px;
            color:#F00;
        }
        
        .disp1{
            margin-top:30px;
            width:780px;
            height:240px;
            display:flex;
            background-color: #FFF;
        }
        .pic1 {
            width:200px;
            font-size:14px;
            background-color:#FFF;
        }
        .pic2 {
            width:200px;
            font-size:14px;
            color:#F00;
            background-color:#808080;
        }
        .test1{
            width:200px;
        }

    </style>
</head>
<body>
    <h1>画像投稿</h1>
    <div id="out" name="out"><?php echo $out ?></div>
    <form method="post" action="work30.php" enctype="multipart/form-data">
        <p>画像名</p>    
        <input type="text" name="picname">
        <p>画像</p>
        <input type="file" name="upfile">
        <input type="submit" name="submit" value="送信">
    </form>
    <p>画像一覧ページへのリンク</p>
    <a href="https://portfolio.dc-itex.com/nagoya/0005/htdocs/work30ichiran.php">画像一覧ページへ</a>
    
    
    <?php
        $db = new mysqli($host, $login_user, $password, $database);
        if ($db->connect_error){
          echo $db->connect_error;
          exit();
        } else {
          $db->set_charset("utf8");
        }
        $sql = "select image_id,public_flg,image_name from pictable order by image_id";
        if($result = $db->query($sql)) {
          echo "<div class=disp1>";
            
          foreach ($result as $row){
            if($row['public_flg'] == 1){
                echo "<p class=pic1>" . $row["image_name"] . "</p>";
            } else {
                echo "<p class=pic2>" . $row["image_name"] . "</p>";
            }    
            echo "<img class=test1 src=https://portfolio.dc-itex.com/nagoya/0005/htdocs/img/" . $row["image_name"] . ">";
            echo "<form action='work30update.php' method='post'>";
			echo "<input type=hidden name=image_id value=" . $row['image_id'] . ">";
            echo "<input type=hidden name=public_flag value=" . $row['public_flg'] . ">";
            if ($row["public_flg"] == 1){
			    echo "<button class=update type='submit'>非表示</button>";
            } else {
                echo "<button class=update type='submit'>表示</button>";
            }    
			echo "</form>";
          }
          echo "</div>";
          $result->close();
        }

        // 受け取ったデータのレコードを更新する
         if (isset($_POST["image_id"])) {
            $image_id = $_POST["image_id"];
            if($_POST["public_flag"] == 1){
                $update  = "update pictable set public_flg = 0,update_date = '${date}' WHERE image_id = ${image_id};";
            } else if ($_POST["public_flag"] == 0) {
                $update  = "update pictable set public_flg = 1,update_date = '${date}' WHERE image_id = ${image_id};";
            }    
            echo $update;
            if($result = $db->query($update)) {
                $row = $db->affected_rows;
            } else {
                $error_msg[] = 'UPDATE実行エラー [実行SQL]' . $update;
            }
            //$error_msg[] = '強制的にエラーメッセージを挿入';
            print_r($error_msg);
            //エラーメッセージ格納の有無によりトランザクションの成否を判定
            if (count($error_msg) == 0) {
                echo $row.'件更新しました。'; 
                $db->commit();	// 正常に終了したらコミット
            } else {
                echo '更新が失敗しました。'; 
                $db->rollback();	// エラーが起きたらロールバック
            }
        }

    ?>
     
</body>
</html>